<?php

declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Memeriksa session sebelum controller dijalankan.
     */
    public function before(
        RequestInterface $request,
        $arguments = null
    ) {
        $isLoggedIn =
            session()->get('is_logged_in') === true
            && (int) session()->get('user_id') > 0;

        if (! $isLoggedIn) {
            return redirect()
                ->to(site_url('login'))
                ->with(
                    'error',
                    'Silakan login terlebih dahulu.'
                );
        }

        return null;
    }

    /**
     * Tidak ada proses setelah response.
     */
    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        return null;
    }
}