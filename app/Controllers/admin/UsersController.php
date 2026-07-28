<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UsersController extends BaseController
{
    protected UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index()
    {
        return view('admin/userslist.php');
    }

    public function data()
    {
        // still excluding email/phone from the list view, per your earlier decision
        $users = $this->model
            ->select('id, username, first_name, last_name, status_message, active, last_active, created_at')
            ->findAll();

        return $this->response->setJSON($users);
    }

    public function create()
    {
        return view('admin/addadmin.php');
    }

public function store()
{
    $data = $this->request->is('json') ? $this->request->getJSON(true) : $this->request->getPost();

    if (empty($data['username']) || empty($data['email']) || empty($data['password'])) {
        return $this->response->setStatusCode(422)->setJSON(['error' => 'Missing required fields']);
    }

    // 1. Create and save the user WITHOUT the identity first
    $user = new \CodeIgniter\Shield\Entities\User([
        'username'   => $data['username'],
        'active'     => $data['active'] ?? 1,
        'first_name' => $data['first_name'] ?? null,
        'last_name'  => $data['last_name'] ?? null,
        'phone'      => $data['phone'] ?? null,
    ]);

    $this->model->save($user);

    // 2. Re-fetch — this one has a real id
    $newUser = $this->model->find($this->model->getInsertID());

    // 3. NOW create the email identity — id exists at this point
    $newUser->createEmailIdentity([
        'email'    => $data['email'],
        'password' => $data['password'],
    ]);

    // 4. Assign role/group if provided
    if (! empty($data['role'])) {
        $newUser->syncGroups($data['role']);
    }

    return $this->response->setJSON(['id' => $newUser->id]);
}

    public function view($id)
    {
        $user = $this->model->find($id);
        if (! $user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // email/role still need the join, since those live in separate Shield tables
        $email = $this->getEmailForUser($id);
        $role  = $this->getRoleForUser($id);

        return view('admin/userdetails', [
            'user'  => $user,
            'email' => $email,
            'role'  => $role,
        ]);
    }

    public function edit($id)
    {
        $user = $this->model->find($id);
        if (! $user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    
        $email = $this->getEmailForUser($id);
        $role  = $this->getRoleForUser($id);
    
        return view('admin/edituser', [
            'user'  => $user->toArray(),
            'email' => $email,
            'role'  => $role,
        ]);
    }

    public function viewData($id)
    {
        $user = $this->model->find($id);
        if (! $user) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']);
        }

        $data = $user->toArray();
        $data['email'] = $this->getEmailForUser($id);
        $data['role']  = $this->getRoleForUser($id);

        return $this->response->setJSON($data);
    }

    public function update($id)
    {
        $data = $this->request->is('json') ? $this->request->getJSON(true) : $this->request->getPost();

        $user = $this->model->find($id);
        if (! $user) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']);
        }

        $user->fill([
            'first_name' => $data['first_name'] ?? null,
            'last_name'  => $data['last_name'] ?? null,
            'phone'      => $data['phone'] ?? null,
            'active'     => isset($data['active']) ? (int) $data['active'] : $user->active,
        ]);

        // Only touch password if a new one was actually submitted
        if (! empty($data['new_password'])) {
            $user->password = $data['new_password'];
        }

        $this->model->save($user); // saves profile fields AND password identity (if set) in one call

        if (! empty($data['role'])) {
            $user->syncGroups($data['role']);
        }

        return $this->response->setJSON($this->model->find($id));
    }

    public function delete($id)
    {
        $user = $this->model->find($id);
        if (! $user) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']);
        }

        $this->model->delete($id); // soft delete, assuming Shield's default is preserved
        return $this->response->setJSON(['deleted' => true]);
    }

    private function getEmailForUser($id)
    {
        return $this->db()->table('auth_identities')
            ->select('secret as email')
            ->where('user_id', $id)
            ->where('type', 'email_password')
            ->get()
            ->getRowArray()['email'] ?? null;
    }

    private function getRoleForUser($id)
    {
        return $this->db()->table('auth_groups_users')
            ->select('group')
            ->where('user_id', $id)
            ->get()
            ->getRowArray()['group'] ?? null;
    }

    private function db()
    {
        return \Config\Database::connect();
    }
}