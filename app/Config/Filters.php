<?php

declare(strict_types=1);

namespace Config;

use App\Filters\AuthFilter;
use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    /**
     * Alias untuk seluruh filter yang digunakan aplikasi.
     */
    public array $aliases = [
        /*
         * Filter bawaan CodeIgniter.
         */
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,

        /*
         * Filter login tanpa CodeIgniter Shield.
         */
        'auth' => AuthFilter::class,
    ];

    /**
     * Filter wajib milik CodeIgniter.
     *
     * Jangan menghapus alias yang digunakan di sini
     * dari properti $aliases.
     */
    public array $required = [
        'before' => [
            'forcehttps',
            'pagecache',
        ],

        'after' => [
            'pagecache',
            'performance',
            'toolbar',
        ],
    ];

    /**
     * Filter global.
     */
    public array $globals = [
        'before' => [
            /*
             * Aktifkan CSRF setelah seluruh form POST
             * memiliki csrf_field() atau form_open().
             */
            // 'csrf',

            // 'honeypot',
            // 'invalidchars',
        ],

        'after' => [
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * Filter berdasarkan metode HTTP.
     */
    public array $methods = [];

    /**
     * Filter berdasarkan pola URI.
     *
     * Route yang membutuhkan login lebih baik
     * menggunakan:
     *
     * ['filter' => 'auth']
     *
     * pada Routes.php.
     */
    public array $filters = [];
}