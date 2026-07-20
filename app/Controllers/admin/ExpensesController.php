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

    public function delete($id)
    {
        if (! $this->model->find($id)) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']);
        }
        $this->model->delete($id);
        return $this->response->setJSON(['deleted' => true]);
    }
}