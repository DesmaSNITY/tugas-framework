<?php

namespace App\Controllers;

class Home extends BaseController
{
    /**
     * Halaman utama (Hero + About + Footer).
     */
    public function index(): string
    {
        return view('home/index', [
            'title' => 'Mirae — Kelola Donasi dengan Lebih Mudah',
        ]);
    }

    /**
     * Halaman About Me terpisah (opsional, isi sama dengan section about di index).
     */
    public function about(): string
    {
        return view('home/about', [
            'title' => 'Mirae — About Me',
        ]);
    }
}
