<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\admin\Admin;
use App\Controllers\admin\Donationpost;
use App\Controllers\admin\Fondation;
use App\Controllers\admin\UsersController;
use App\Controllers\admin\DonationPostsController;
use App\Controllers\Admin\FoundationsController;
use App\Controllers\Admin\ExpensesController;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/admin',[Admin::class, 'index']);
$routes->get('/admin/yayasan',[Fondation::class,'index']);
$routes->get('/admin/donation',[Donationpost::class,'index']);
$routes->get('/admin/listdonation', static function () {
    return view('admin/donationlist.php');
});
$routes->get('/admin/listyayasan', static function () {
    return view('admin/yayasanlist.php');
});
$routes->get('/admin/listexpense', static function () {
    return view('admin/expenselist.php');
});
$routes->get('/admin/create/expense', static function () {
    return view('admin/expense.php');
});
$routes->get('/admin/listexpenses', static function () {
    return view('admin/expenselist.php');
});
// $routes->get('/admin/listuser', static function () {
//     return view('admin/userslist.php');
// });
$routes->get('/admin/create/admin', static function () {
    return view('admin/addadmin.php');
});
// $routes->get('/admin/listuser/detail', static function () {
//     return view('admin/userdetails.php');
// });
service('auth')->routes($routes);

// $routes->get('test-user-fields', 'TestController::userFields');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin' , 'filter' => 'session' ], function ($routes) {

     // Donation Posts
    $routes->get('donationposts', [DonationPostsController::class, 'index']);
    $routes->get('donationposts/data', [DonationPostsController::class, 'data']);
    $routes->get('donationposts/create', [DonationPostsController::class, 'create']);
    $routes->post('donationposts', [DonationPostsController::class, 'store']);
    $routes->get('donationposts/edit/(:num)', [DonationPostsController::class, 'edit']);
    $routes->post('donationposts/update/(:num)', [DonationPostsController::class, 'update']);
    $routes->delete('donationposts/(:num)', [DonationPostsController::class, 'delete']);

    // Foundations
    $routes->get('foundations', [FoundationsController::class, 'index']);
    $routes->get('foundations/data', [FoundationsController::class, 'data']);
    $routes->get('foundations/create', [FoundationsController::class, 'create']);
    $routes->post('foundations', [FoundationsController::class, 'store']);
    $routes->get('foundations/edit/(:num)', [FoundationsController::class, 'edit']);
    $routes->post('foundations/update/(:num)', [FoundationsController::class, 'update']);
    $routes->delete('foundations/(:num)', [FoundationsController::class, 'delete']);

    // Expenses
    $routes->get('expenses', [ExpensesController::class, 'index']);
    $routes->get('expenses/data', [ExpensesController::class, 'data']);
    $routes->get('expenses/create', [ExpensesController::class, 'create']);
    $routes->get('expenses/edit/(:num)', [ExpensesController::class, 'edit']);
    $routes->post('expenses/update/(:num)', [ExpensesController::class, 'update']);
    $routes->post('expenses', [ExpensesController::class, 'store']);
    $routes->patch('expenses/(:num)/status', [ExpensesController::class, 'updateStatus']);
    $routes->delete('expenses/(:num)', [ExpensesController::class, 'delete']);

    // Users
    $routes->get('users', [UsersController::class, 'index']);
    $routes->get('users/data', [UsersController::class, 'data']);
    $routes->get('users/create', [UsersController::class, 'create']);
    $routes->post('users', [UsersController::class, 'store']);
    $routes->get('users/view/(:num)', [UsersController::class, 'view']);
    $routes->get('users/view/(:num)/data', [UsersController::class, 'viewData']);
    $routes->get('users/edit/(:num)', [UsersController::class, 'edit']);
    $routes->post('users/update/(:num)', [UsersController::class, 'update']);
    $routes->delete('users/(:num)', [UsersController::class, 'delete']);

});
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
