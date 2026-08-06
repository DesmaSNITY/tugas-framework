<?php

declare(strict_types=1);

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RedirectResponse;

class UsersController extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index(): string
    {
        return view('admin/users/index', [
            'title' => 'Data Pengguna',
            'users' => $this->userModel->orderBy('id', 'DESC')->findAll(),
        ]);
    }

    public function store(): RedirectResponse
    {
        $data = $this->validatedData();

        if ($data instanceof RedirectResponse) {
            return $data;
        }

        $password = (string) $this->request->getPost('password');
        $data['password_hash'] = password_hash($password, PASSWORD_DEFAULT);
        $data['active'] = 1;

        if (! $this->userModel->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }

        return redirect()->back()->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function update(int $id): RedirectResponse
    {
        $user = $this->userModel->find($id);

        if (! is_array($user)) {
            throw PageNotFoundException::forPageNotFound('Pengguna tidak ditemukan.');
        }

        $data = $this->validatedData($id, false);

        if ($data instanceof RedirectResponse) {
            return $data;
        }

        $password = (string) $this->request->getPost('password');

        if ($password !== '') {
            $data['password_hash'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if (! $this->userModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }

        return redirect()->back()->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function delete(int $id): RedirectResponse
    {
        $current = current_user();

        if ($current !== null && (int) $current['id'] === $id) {
            return redirect()->back()->with('error', 'Akun yang sedang digunakan tidak dapat dihapus.');
        }

        $this->userModel->delete($id);

        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }

    private function validatedData(?int $ignoreId = null, bool $passwordRequired = true): array|RedirectResponse
    {
        $rules = [
            'username'   => 'required|min_length[3]|max_length[30]|regex_match[/^[a-zA-Z0-9._-]+$/]',
            'email'      => 'required|valid_email|max_length[100]',
            'first_name' => 'required|max_length[100]',
            'last_name'  => 'permit_empty|max_length[100]',
            'phone'      => 'permit_empty|max_length[20]',
            'role'       => 'required|in_list[user,admin]',
            'active'     => 'required|in_list[0,1]',
            'password'   => ($passwordRequired ? 'required|' : 'permit_empty|') . 'min_length[8]|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = strtolower(trim((string) $this->request->getPost('username')));
        $email    = strtolower(trim((string) $this->request->getPost('email')));

        if ($this->userModel->usernameExists($username, $ignoreId)) {
            return redirect()->back()->withInput()->with('error', 'Username sudah digunakan.');
        }

        if ($this->userModel->emailExists($email, $ignoreId)) {
            return redirect()->back()->withInput()->with('error', 'Email sudah digunakan.');
        }

        return [
            'username'   => $username,
            'email'      => $email,
            'first_name' => trim((string) $this->request->getPost('first_name')),
            'last_name'  => trim((string) $this->request->getPost('last_name')) ?: null,
            'phone'      => trim((string) $this->request->getPost('phone')) ?: null,
            'role'       => (string) $this->request->getPost('role'),
            'active'     => (int) $this->request->getPost('active'),
        ];
    }
}
