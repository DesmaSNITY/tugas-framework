<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login', [
            'title' => 'Login',
            'body_class' => 'auth-login-page'
        ]);
    }

    public function attemptLogin()
{
    $credentials = [
        'email'    => $this->request->getPost('email'),
        'password' => $this->request->getPost('password'),
    ];

    $auth = auth('session');

    // kalau sudah login, logout dulu
    if ($auth->loggedIn()) {
        $auth->logout();
    }

    $result = $auth->attempt($credentials);

    if (! $result->isOK()) {
        return redirect()->back()
            ->withInput()
            ->with('error', $result->reason());
    }

    return redirect()->to('/');
}

    public function register()
    {
        return view('auth/register', [
            'title' => 'Register'
        ]);
    }

    public function attemptRegister()
    {
        $rules = [
            'first_name' => 'required|min_length[2]',
            'last_name'  => 'permit_empty',
            'email'      => 'required|valid_email|is_unique[auth_identities.secret]',
            'password'   => 'required|min_length[8]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $users = model(UserModel::class);

        $user = new User([
            'username'   => explode('@', $this->request->getPost('email'))[0],
            'first_name' => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'active'     => 1,
        ]);

        $users->save($user);

        $user = $users->findById($users->getInsertID());

        $user->createEmailIdentity([
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ]);

        return redirect()->to('/login')
            ->with('success', 'Akun berhasil dibuat.');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->to('/login');
    }
}