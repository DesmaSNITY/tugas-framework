<?php

declare(strict_types=1);

use App\Models\UserModel;

if (! function_exists('logged_in')) {
    function logged_in(): bool
    {
        return session()->get('is_logged_in') === true
            && (int) session()->get('user_id') > 0;
    }
}

if (! function_exists('current_user')) {
    function current_user(): ?array
    {
        static $loaded = false;
        static $user   = null;

        if ($loaded) {
            return $user;
        }

        $loaded = true;

        if (! logged_in()) {
            return null;
        }

        /** @var UserModel $userModel */
        $userModel = model(UserModel::class);
        $result    = $userModel->find((int) session()->get('user_id'));

        if (! is_array($result) || (int) ($result['active'] ?? 0) !== 1) {
            session()->remove([
                'is_logged_in',
                'user_id',
                'username',
                'email',
                'role',
            ]);

            return null;
        }

        $user = $result;

        return $user;
    }
}
