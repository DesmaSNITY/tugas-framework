<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ==================== PUBLIC PAGES ====================
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');

// ==================== AUTH ====================
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::attemptRegister');
$routes->get('logout', 'Auth::logout');

// ==================== DONATION PROGRAM ====================
$routes->get('donate', 'Donate::index');
$routes->get('donate/checkout/(:num)', 'Donate::checkout/$1', ['filter' => 'auth']);
$routes->post('donate/store', 'Donate::store', ['filter' => 'auth']);
$routes->get('donate/confirm/(:num)', 'Donate::confirm/$1', ['filter' => 'auth']);
$routes->post('donate/pay/(:num)', 'Donate::pay/$1', ['filter' => 'auth']);
$routes->get('donate/success/(:num)', 'Donate::success/$1', ['filter' => 'auth']);

// ==================== DASHBOARD (butuh login) ====================
$routes->group('dashboard', ['filter' => 'auth'], static function ($routes) {
    $routes->get('laporan', 'Dashboard::laporan');
});

// ==================== RIWAYAT DONASI USER (butuh login) ====================
$routes->get('donate/history', 'Donate::history', ['filter' => 'auth']);
