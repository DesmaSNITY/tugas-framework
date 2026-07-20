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

$routes->group('admin', ['namespace' => 'App\Controllers\Admin' /*, 'filter' => 'session' */], function ($routes) {

    // // Donation Posts
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