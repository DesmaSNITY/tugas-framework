<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;
use RuntimeException;
use Throwable;

class Profile extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function update(): RedirectResponse
    {
        if (! logged_in()) {
            return redirect()->to('/login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = current_user();

        if ($user === null) {
            return redirect()->to('/login')
                ->with('error', 'Sesi login tidak valid.');
        }

        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[30]|regex_match[/^[a-zA-Z0-9._-]+$/]',
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[100]',
            ],
            'first_name' => [
                'label' => 'Nama depan',
                'rules' => 'required|min_length[2]|max_length[100]',
            ],
            'last_name' => [
                'label' => 'Nama belakang',
                'rules' => 'permit_empty|max_length[100]',
            ],
            'phone' => [
                'label' => 'Nomor telepon',
                'rules' => 'permit_empty|max_length[20]',
            ],
            'current_password' => [
                'label' => 'Password saat ini',
                'rules' => 'permit_empty|max_length[255]',
            ],
            'new_password' => [
                'label' => 'Password baru',
                'rules' => 'permit_empty|min_length[8]|max_length[255]',
            ],
            'new_password_confirm' => [
                'label' => 'Konfirmasi password baru',
                'rules' => 'permit_empty|matches[new_password]',
            ],
        ];

        $avatar    = $this->request->getFile('avatar');
        $hasAvatar = $avatar !== null
            && $avatar->getError() !== UPLOAD_ERR_NO_FILE;

        if ($hasAvatar) {
            $rules['avatar'] = [
                'label' => 'Foto profil',
                'rules' => [
                    'uploaded[avatar]',
                    'is_image[avatar]',
                    'mime_in[avatar,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[avatar,2048]',
                ],
            ];
        }

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('profile_errors', $this->validator->getErrors())
                ->with('open_settings', true);
        }

        $userId      = (int) $user['id'];
        $username    = strtolower(trim((string) $this->request->getPost('username')));
        $email       = strtolower(trim((string) $this->request->getPost('email')));
        $firstName   = trim((string) $this->request->getPost('first_name'));
        $lastName    = trim((string) $this->request->getPost('last_name'));
        $phone       = trim((string) $this->request->getPost('phone'));
        $currentPass = (string) $this->request->getPost('current_password');
        $newPass     = (string) $this->request->getPost('new_password');
        $newPassConf = (string) $this->request->getPost('new_password_confirm');

        if ($this->userModel->usernameExists($username, $userId)) {
            return redirect()->back()
                ->withInput()
                ->with('profile_errors', ['username' => 'Username sudah digunakan.'])
                ->with('open_settings', true);
        }

        if ($this->userModel->emailExists($email, $userId)) {
            return redirect()->back()
                ->withInput()
                ->with('profile_errors', ['email' => 'Email sudah digunakan.'])
                ->with('open_settings', true);
        }

        $changingPassword = $currentPass !== '' || $newPass !== '' || $newPassConf !== '';

        if ($changingPassword) {
            if ($currentPass === '' || $newPass === '' || $newPassConf === '') {
                return redirect()->back()
                    ->withInput()
                    ->with('profile_errors', [
                        'password' => 'Semua kolom password harus diisi untuk mengganti password.',
                    ])
                    ->with('open_settings', true);
            }

            if (! password_verify($currentPass, (string) ($user['password_hash'] ?? ''))) {
                return redirect()->back()
                    ->withInput()
                    ->with('profile_errors', [
                        'current_password' => 'Password saat ini salah.',
                    ])
                    ->with('open_settings', true);
            }
        }

        $data = [
            'username'   => $username,
            'email'      => $email,
            'first_name' => $firstName,
            'last_name'  => $lastName !== '' ? $lastName : null,
            'phone'      => $phone !== '' ? $phone : null,
        ];

        if ($changingPassword) {
            $data['password_hash'] = password_hash($newPass, PASSWORD_DEFAULT);
        }

        $newAvatarAbsolutePath = null;
        $oldAvatarAbsolutePath = null;
        $db                    = db_connect();

        try {
            if ($hasAvatar && $avatar->isValid() && ! $avatar->hasMoved()) {
                $uploadDirectory = FCPATH
                    . 'uploads'
                    . DIRECTORY_SEPARATOR
                    . 'avatars';

                if (
                    ! is_dir($uploadDirectory)
                    && ! mkdir($uploadDirectory, 0775, true)
                    && ! is_dir($uploadDirectory)
                ) {
                    throw new RuntimeException('Folder upload avatar gagal dibuat.');
                }

                $newAvatarName = $avatar->getRandomName();
                $avatar->move($uploadDirectory, $newAvatarName);

                $data['avatar'] = 'uploads/avatars/' . $newAvatarName;
                $newAvatarAbsolutePath = $uploadDirectory
                    . DIRECTORY_SEPARATOR
                    . $newAvatarName;

                $oldAvatar = trim((string) ($user['avatar'] ?? ''));

                if ($oldAvatar !== '' && ! preg_match('#^https?://#i', $oldAvatar)) {
                    $oldAvatarAbsolutePath = FCPATH
                        . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, ltrim($oldAvatar, '/\\'));
                }
            }

            $db->transBegin();

            if (! $this->userModel->update($userId, $data)) {
                $modelErrors = $this->userModel->errors();

                throw new RuntimeException(
                    $modelErrors !== []
                        ? implode(', ', $modelErrors)
                        : 'Data profil gagal diperbarui.'
                );
            }

            if ($db->transStatus() === false) {
                throw new RuntimeException('Transaksi database gagal.');
            }

            $db->transCommit();

            session()->set([
                'username' => $username,
                'email'    => $email,
            ]);

            if (
                $oldAvatarAbsolutePath !== null
                && is_file($oldAvatarAbsolutePath)
                && realpath($oldAvatarAbsolutePath) !== realpath((string) $newAvatarAbsolutePath)
            ) {
                @unlink($oldAvatarAbsolutePath);
            }
        } catch (Throwable $exception) {
            $db->transRollback();

            if ($newAvatarAbsolutePath !== null && is_file($newAvatarAbsolutePath)) {
                @unlink($newAvatarAbsolutePath);
            }

            log_message('error', 'Pembaruan profil gagal: {message}', [
                'message' => $exception->getMessage(),
            ]);

            return redirect()->back()
                ->withInput()
                ->with('profile_errors', [
                    'database' => ENVIRONMENT === 'development'
                        ? $exception->getMessage()
                        : 'Profil gagal diperbarui.',
                ])
                ->with('open_settings', true);
        }

        return redirect()->back()
            ->with('profile_success', 'Profil berhasil diperbarui.');
    }
}
