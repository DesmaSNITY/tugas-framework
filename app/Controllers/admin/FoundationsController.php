<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FoundationModel;

class FoundationsController extends BaseController
{
    protected FoundationModel $model;

    public function __construct()
    {
        $this->model = new FoundationModel();
    }

    public function index()
    {
        return view('admin/yayasanlist.php');
    }

    public function data()
    {
        return $this->response->setJSON($this->model->findAll());
    }

    public function create()
    {
        return view('admin/addyayasan.php');
    }

    public function store()
    {
        $data = $this->request->is('json') ? $this->request->getJSON(true) : $this->request->getPost();
    
        if (! $this->model->validate($data)) {
            return $this->response->setStatusCode(422)->setJSON(['errors' => $this->model->errors()]);
        }
    
        $data['status'] = $data['status'] ?? 'active';
        $id = $this->model->insert($data);
    
        return $this->response->setJSON($this->model->find($id));
    }

    public function edit($id)
    {
        $foundation = $this->model->find($id);
        if (! $foundation) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/foundations/edit', ['foundation' => $foundation]);
    }

    public function update($id)
    {
        $data = $this->request->is('json') ? $this->request->getJSON(true) : $this->request->getPost();

        if (! $this->model->find($id)) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']);
        }
        if (! $this->model->validate($data)) {
            return $this->response->setStatusCode(422)->setJSON(['errors' => $this->model->errors()]);
        }

        $this->model->update($id, $data);
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