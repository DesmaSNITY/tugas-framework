<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DonationPostModel;

class DonationPostsController extends BaseController
{
    protected DonationPostModel $model;

    public function __construct()
    {
        $this->model = new DonationPostModel();
    }

    public function index()
    {
        return view('admin/donationlist');
    }

    public function data()
    {
        return $this->response->setJSON($this->model->getWithFoundation());
    }

    public function create()
    {
        $foundationModel = new \App\Models\FoundationModel();

        return view('admin/adddonationpost', [
            'foundations' => $foundationModel->findAll(),
        ]);
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

        $data['status'] = 'draft';
        $id = $this->model->insert($data);

        if ($this->request->is('json')) {
            return $this->response->setJSON($this->model->find($id));
        }
        return redirect()->to(site_url('admin/donationposts'))->with('success', 'Donation post created successfully.');
    }

    public function edit($id)
    {
        $post = $this->model->find($id);
        if (! $post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $foundationModel = new \App\Models\FoundationModel();

        return view('admin/editdonation', [
            'post'        => $post,
            'foundations' => $foundationModel->findAll(),
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

        $this->model->update($id, $data);

        if ($this->request->is('json')) {
            return $this->response->setJSON($this->model->find($id));
        }

        return redirect()->to(site_url('admin/donationposts'))->with('success', 'Donation post updated successfully.');
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