<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ExpenseModel;

class ExpensesController extends BaseController
{
    protected ExpenseModel $model;

    public function __construct()
    {
        $this->model = new ExpenseModel();
    }

    public function index()
    {
        return view('admin/expenseslist.php');
    }

    public function data()
    {
        return $this->response->setJSON($this->model->getWithDonationPostTitle());
    }

    public function create()
    {
        return view('admin/addexpense');
    }

    public function store()
    {
        $data = $this->request->is('json') ? $this->request->getJSON(true) : $this->request->getPost();

        if (! $this->model->validate($data)) {
            return $this->response->setStatusCode(422)->setJSON(['errors' => $this->model->errors()]);
        }

        $data['status'] = 'pending'; // enforced server-side, matches the create form's UI lock
        $id = $this->model->insert($data);

        return $this->response->setJSON($this->model->find($id));
    }

    // Enforces the pending -> approved/rejected -> paid workflow server-side,
    // so the API can't be called directly to skip states even if the UI allows it.
    public function updateStatus($id)
    {
        $expense = $this->model->find($id);
        if (! $expense) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']);
        }

        $data = $this->request->getJSON(true);
        $newStatus = $data['status'] ?? null;

        if (! $newStatus || ! $this->model->canTransition($expense['status'], $newStatus)) {
            return $this->response->setStatusCode(422)->setJSON([
                'error' => "Cannot transition from {$expense['status']} to {$newStatus}",
            ]);
        }

        $this->model->update($id, ['status' => $newStatus]);
        return $this->response->setJSON($this->model->find($id));
    }

    public function edit($id)
    {
        $expense = $this->model->find($id);
        if (! $expense) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $donationPostModel = new \App\Models\DonationPostModel();

        return view('admin/editexpense', [
            'expense'       => $expense,
            'donationposts' => $donationPostModel->findAll(),
        ]);
    }

    public function update($id)
    {
        $data = $this->request->is('json') ? $this->request->getJSON(true) : $this->request->getPost();

        if (! $this->model->find($id)) {
            if ($this->request->is('json')) {
                return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']);
            }
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if (! $this->model->validate($data)) {
            if ($this->request->is('json')) {
                return $this->response->setStatusCode(422)->setJSON(['errors' => $this->model->errors()]);
            }
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }

        // status is intentionally NOT editable here — it only changes via the
        // dedicated updateStatus() endpoint with its enforced transition rules
        $this->model->update($id, [
            'donationpost_id' => $data['donationpost_id'],
            'beneficiary'     => $data['beneficiary'],
            'amount'          => $data['amount'],
        ]);

        if ($this->request->is('json')) {
            return $this->response->setJSON($this->model->find($id));
        }

        return redirect()->to(site_url('admin/expenses'))->with('success', 'Expense updated successfully.');
    }

    public function delete($id)
    {
        if (! $this->model->find($id)) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']);
        }
        $this->model->delete($id);
        return $this->response->setJSON(['deleted' => true]);
    }
}