<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;
use RuntimeException;
use Throwable;

class Auth extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login(): string|RedirectResponse
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('/');
        }

        return view('auth/login', [
            'title'       => 'Login',
            'body_class'  => 'auth-login-page',
            'hide_layout' => true,
            'show_footer' => false,
        ]);
    }

    public function attemptLogin(): RedirectResponse
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('/');
        }

        $identity = strtolower(trim((string) $this->request->getPost('identity')));
        $password = (string) $this->request->getPost('password');

        $data = [
            'identity' => $identity,
            'password' => $password,
        ];

        $rules = [
            'identity' => [
                'label' => 'Email atau username',
                'rules' => 'required|max_length[100]',
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|max_length[255]',
            ],
        ];

        if (! $this->validateData($data, $rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $user = $this->userModel->findForLogin($identity);

        if (
            $user === null
            || empty($user['password_hash'])
            || ! password_verify($password, (string) $user['password_hash'])
        ) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email, username, atau password salah.');
        }

        if ((int) ($user['active'] ?? 0) !== 1) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Akun Anda sedang tidak aktif.');
        }

        if (password_needs_rehash((string) $user['password_hash'], PASSWORD_DEFAULT)) {
            $this->userModel->update((int) $user['id'], [
                'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            ]);
        }

        $session = session();
        $session->regenerate(true);
        $session->set([
            'is_logged_in' => true,
            'user_id'      => (int) $user['id'],
            'username'     => (string) ($user['username'] ?? ''),
            'email'        => (string) ($user['email'] ?? ''),
            'role'         => (string) ($user['role'] ?? 'user'),
        ]);

        $this->userModel->updateLastActive((int) $user['id']);

        return redirect()->to('/')
            ->with('success', 'Login berhasil. Selamat datang kembali.');
    }

    public function register(): string|RedirectResponse
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('/');
        }

        return view('auth/register', [
            'title'       => 'Register',
            'body_class'  => 'auth-register-page',
            'hide_layout' => true,
            'show_footer' => false,
        ]);
    }

    public function attemptRegister(): RedirectResponse
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('/');
        }

        $firstName      = trim((string) $this->request->getPost('first_name'));
        $lastName       = trim((string) $this->request->getPost('last_name'));
        $username       = strtolower(trim((string) $this->request->getPost('username')));
        $email          = strtolower(trim((string) $this->request->getPost('email')));
        $password       = (string) $this->request->getPost('password');
        $passwordConfirm = (string) $this->request->getPost('password_confirm');
        $agree          = (string) $this->request->getPost('agree');

        $data = [
            'first_name'       => $firstName,
            'last_name'        => $lastName,
            'username'         => $username,
            'email'            => $email,
            'password'         => $password,
            'password_confirm' => $passwordConfirm,
            'agree'            => $agree,
        ];

        $rules = [
            'first_name' => [
                'label' => 'Nama depan',
                'rules' => 'required|min_length[2]|max_length[100]',
            ],
            'last_name' => [
                'label' => 'Nama belakang',
                'rules' => 'permit_empty|max_length[100]',
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[30]|regex_match[/^[a-zA-Z0-9._-]+$/]',
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[100]',
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]|max_length[255]',
            ],
            'password_confirm' => [
                'label' => 'Konfirmasi password',
                'rules' => 'required|matches[password]',
            ],
            'agree' => [
                'label' => 'Syarat dan ketentuan',
                'rules' => 'required|in_list[1]',
            ],
        ];

        if (! $this->validateData($data, $rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        if ($this->userModel->usernameExists($username)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', ['username' => 'Username sudah digunakan.']);
        }

        if ($this->userModel->emailExists($email)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', ['email' => 'Email sudah terdaftar.']);
        }

        $db = db_connect();

        try {
            $db->transBegin();

            $userId = $this->userModel->insert([
                'username'       => $username,
                'email'          => $email,
                'password_hash'  => password_hash($password, PASSWORD_DEFAULT),
                'first_name'     => $firstName,
                'last_name'      => $lastName !== '' ? $lastName : null,
                'phone'          => null,
                'avatar'         => null,
                'role'           => 'user',
                'status'         => 'active',
                'status_message' => null,
                'active'         => 1,
                'last_active'    => null,
            ], true);

            if ($userId === false) {
                $modelErrors = $this->userModel->errors();

                throw new RuntimeException(
                    $modelErrors !== []
                        ? implode(', ', $modelErrors)
                        : 'Akun gagal dibuat.'
                );
            }

            if ($db->transStatus() === false) {
                throw new RuntimeException('Transaksi database gagal.');
            }

            $db->transCommit();
        } catch (Throwable $exception) {
            $db->transRollback();

            log_message('error', 'Registrasi gagal: {message}', [
                'message' => $exception->getMessage(),
            ]);

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    ENVIRONMENT === 'development'
                        ? 'Registrasi gagal: ' . $exception->getMessage()
                        : 'Akun gagal dibuat.'
                );
        }

        return redirect()->to('/login')
            ->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    public function logout(): RedirectResponse
    {
        $session = session();

        $session->remove([
            'is_logged_in',
            'user_id',
            'username',
            'email',
            'role',
        ]);

        $session->destroy();

        return redirect()->to('/login')
            ->with('success', 'Anda berhasil logout.');
    }

    private function isLoggedIn(): bool
    {
        return session()->get('is_logged_in') === true
            && (int) session()->get('user_id') > 0;
    }
}