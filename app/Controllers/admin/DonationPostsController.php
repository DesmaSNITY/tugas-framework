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
        return view('admin/donationposts/create');
    }

    public function store()
    {
        $data = $this->request->getJSON(true) ?? $this->request->getPost();

        if (! $this->model->validate($data)) {
            return $this->response->setStatusCode(422)->setJSON([
                'errors' => $this->model->errors(),
            ]);
        }

        $data['status'] = 'draft'; // always start as draft, matches earlier decision
        $id = $this->model->insert($data);

        return $this->response->setJSON([
            'id' => $id,
        ] + $this->model->find($id));
    }

    public function edit($id)
    {
        $post = $this->model->find($id);
        if (! $post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/donationposts/edit', ['post' => $post]);
    }

    public function update($id)
    {
        $data = $this->request->getJSON(true) ?? $this->request->getPost();

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