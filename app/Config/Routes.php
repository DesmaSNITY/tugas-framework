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
$routes->get('donate/checkout/(:num)', 'Donate::checkout/$1');
$routes->post('donate/store', 'Donate::store');
$routes->get('donate/confirm/(:num)', 'Donate::confirm/$1');
$routes->post('donate/pay/(:num)', 'Donate::pay/$1');
$routes->get('donate/success/(:num)', 'Donate::success/$1');

// ==================== DASHBOARD (butuh login) ====================
$routes->group('dashboard', ['filter' => 'auth'], static function ($routes) {
    $routes->get('laporan', 'Dashboard::laporan');
});
