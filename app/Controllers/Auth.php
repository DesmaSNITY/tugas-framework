<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // ==================== LOGIN ====================

    public function login(): string
    {
        return view('auth/login', [
            'title' => 'Mirae — Login',
        ]);
    }

    public function attemptLogin()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                              ->withInput()
                              ->with('errors', $this->validator->getErrors());
        }

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user      = $userModel->findByEmail($email);

        if (! $user || ! password_verify($password, $user['password'])) {
            return redirect()->back()
                              ->withInput()
                              ->with('error', 'Email atau password salah.');
        }

        session()->set([
            'user_id'     => $user['id'],
            'user_name'   => $user['first_name'],
            'user_email'  => $user['email'],
            'isLoggedIn'  => true,
        ]);

        return redirect()->to('/dashboard/laporan');
    }

    // ==================== REGISTER ====================

    public function register(): string
    {
        return view('auth/register', [
            'title' => 'Mirae — Create An Account',
        ]);
    }

    public function attemptRegister()
    {
        $rules = [
            'first_name' => 'required|min_length[2]',
            'email'      => 'required|valid_email|is_unique[users.email]',
            'password'   => 'required|min_length[6]',
            'agree'      => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                              ->withInput()
                              ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $userModel->insert([
            'first_name' => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'email'      => $this->request->getPost('email'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/login')
                          ->with('success', 'Akun berhasil dibuat, silakan login.');
    }

    // ==================== LOGOUT ====================

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}
