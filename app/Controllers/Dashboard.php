<?php

namespace App\Controllers;

use App\Models\DonationModel;
use App\Models\ProgramModel;

class Dashboard extends BaseController
{
    public function laporan(): string
    {
        $donationModel = new DonationModel();
        $programModel  = new ProgramModel();

        $totalIncome   = $donationModel->totalIncome();
        $totalPrograms = $programModel->where('is_active', 1)->countAllResults();
        $totalTarget   = (float) ($programModel->selectSum('target_amount')->first()['target_amount'] ?? 0);
        $donorCount    = $donationModel->donorCount();

        $monthly = $donationModel->monthlyIncome((int) date('Y'));

        // susun data 12 bulan agar grafik tetap lengkap walau datanya kosong
        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $chartData  = [];
        foreach ($monthNames as $i => $name) {
            $monthNumber      = $i + 1;
            $found            = array_filter($monthly, static fn ($row) => (int) $row['month'] === $monthNumber);
            $chartData[$name] = $found ? array_sum(array_column($found, 'total')) : 0;
        }

        return view('dashboard/laporan', [
            'title'         => 'Mirae — Laporan Donasi',
            'totalIncome'   => $totalIncome,
            'totalPrograms' => $totalPrograms,
            'totalTarget'   => $totalTarget,
            'donorCount'    => $donorCount,
            'chartData'     => $chartData,
        ]);
    }
}
