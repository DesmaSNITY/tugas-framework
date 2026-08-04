<?php

namespace App\Controllers;

use App\Models\ProgramModel;
use App\Models\DonationModel;

class Donate extends BaseController
{
    protected ProgramModel $programModel;
    protected DonationModel $donationModel;

    public function __construct()
    {
        $this->programModel  = new ProgramModel();
        $this->donationModel = new DonationModel();
    }

    /**
     * Halaman listing "Program Donasi Terbaru".
     */
    public function index(): string
    {
        $programs = $this->programModel->getActivePrograms();

        foreach ($programs as &$program) {
            $program['progress'] = $this->programModel->progressPercentage($program);
        }

        return view('donate/index', [
            'title'    => 'Mirae — Program Donasi',
            'programs' => $programs,
        ]);
    }

    /**
     * Halaman form "Donate Sekarang" (langkah 1: Isi Donasi).
     */
    public function checkout(int $programId): string
    {
        $program = $this->programModel->find($programId);

        if (! $program) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $program['progress'] = $this->programModel->progressPercentage($program);

        return view('donate/checkout', [
            'title'   => 'Mirae — Donate Sekarang',
            'program' => $program,
        ]);
    }

    /**
     * Simpan data donasi (langkah 1 -> 2), status masih "pending".
     */
    public function store()
    {
        $rules = [
            'program_id'  => 'required|numeric',
            'donor_name'  => 'required|min_length[3]',
            'donor_email' => 'required|valid_email',
            'donor_phone' => 'required|min_length[8]',
            'amount'      => 'required|numeric|greater_than[0]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                              ->withInput()
                              ->with('errors', $this->validator->getErrors());
        }

        $donationId = $this->donationModel->insert([
            'program_id'  => $this->request->getPost('program_id'),
            'donor_name'  => $this->request->getPost('donor_name'),
            'donor_email' => $this->request->getPost('donor_email'),
            'donor_phone' => $this->request->getPost('donor_phone'),
            'donor_city'  => $this->request->getPost('donor_city'),
            'amount'      => $this->request->getPost('amount'),
            'admin_fee'   => 0,
            'message'     => $this->request->getPost('message'),
            'show_name'   => $this->request->getPost('show_name') ? 1 : 0,
            'status'      => 'pending',
        ]);

        return redirect()->to('/donate/confirm/' . $donationId);
    }

    /**
     * Halaman konfirmasi & pilih metode pembayaran (langkah 2 -> 3).
     */
    public function confirm(int $donationId): string
    {
        $donation = $this->donationModel->find($donationId);

        if (! $donation) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $program = $this->programModel->find($donation['program_id']);

        return view('donate/confirm', [
            'title'    => 'Mirae — Konfirmasi Donasi',
            'donation' => $donation,
            'program'  => $program,
        ]);
    }

    /**
     * Proses pembayaran: update status donasi & saldo program.
     */
    public function pay(int $donationId)
    {
        $donation = $this->donationModel->find($donationId);

        if (! $donation) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $method = $this->request->getPost('payment_method');

        $this->donationModel->update($donationId, [
            'payment_method' => $method,
            'status'         => 'paid',
        ]);

        // update saldo terkumpul & jumlah donatur pada program terkait
        $program = $this->programModel->find($donation['program_id']);
        $this->programModel->update($program['id'], [
            'collected_amount' => $program['collected_amount'] + $donation['amount'],
            'donor_count'      => $program['donor_count'] + 1,
        ]);

        return redirect()->to('/donate/success/' . $donationId);
    }

    public function success(int $donationId): string
    {
        $donation = $this->donationModel->find($donationId);

        return view('donate/success', [
            'title'    => 'Mirae — Donasi Berhasil',
            'donation' => $donation,
        ]);
    }
}
