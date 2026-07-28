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
            if ($this->request->is('json')) {
                return $this->response->setStatusCode(422)->setJSON(['errors' => $this->model->errors()]);
            }
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }

        $data['status'] = $data['status'] ?? 'active';
        $id = $this->model->insert($data);

        if ($this->request->is('json')) {
            return $this->response->setJSON($this->model->find($id));
        }

        return redirect()->to(site_url('admin/foundations'))->with('success', 'Foundation created successfully.');
    }

    public function edit($id)
    {
        $foundation = $this->model->find($id);
        if (! $foundation) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/edityayasan', ['foundation' => $foundation]);
    }

    public function update($id)
    {
        $data = $this->request->is('json') ? $this->request->getJSON(true) : $this->request->getPost();
    
        if (! $this->model->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    
        if (! $this->model->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }
    
        $this->model->update($id, $data);
    
        return redirect()->to(site_url('admin/foundations'))->with('success', 'Foundation updated successfully.');
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