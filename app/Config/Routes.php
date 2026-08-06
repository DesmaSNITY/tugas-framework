<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\admin\Admin;
use App\Controllers\admin\Donationpost;
use App\Controllers\admin\Fondation;
use App\Controllers\admin\UsersController;
use App\Controllers\admin\DonationPostsController;
use App\Controllers\admin\FoundationController;
use App\Controllers\admin\ExpensesController;

/**
 * @var RouteCollection $routes
 */

// ==================== HOME ====================

$routes->get('/', 'Home::index');

$routes->get('about', 'Home::about');

$routes->post(
    'profile/update',
    'Profile::update',
    ['filter' => 'auth']
);

// ==================== ADMIN OLD ROUTES ====================

$routes->get('admin', [Admin::class, 'index']);

$routes->get('admin/yayasan', [Fondation::class,'index']);

$routes->get('admin/donation', [Donationpost::class,'index']);

$routes->get('admin/listdonation', function () {
    return view('admin/donationlist');
});


$routes->get('admin/listyayasan', function () {
    return view('admin/yayasanlist');
});


$routes->get('admin/listexpense', function () {
    return view('admin/expenselist');
});


$routes->get('admin/create/expense', function () {
    return view('admin/expense');
});


$routes->get('admin/create/admin', function () {
    return view('admin/addadmin');
});


// ==================== ADMIN CRUD ====================

$routes->group('admin', [
    'namespace'=>'App\Controllers\admin'
], function($routes){


    // ================= DONATION POSTS =================

    $routes->get(
        'donationposts',
        'DonationPostsController::index'
    );

    $routes->get(
        'donationposts/data',
        'DonationPostsController::data'
    );

    $routes->get(
        'donationposts/create',
        'DonationPostsController::create'
    );

    $routes->post(
        'donationposts',
        'DonationPostsController::store'
    );

    $routes->get(
        'donationposts/edit/(:num)',
        'DonationPostsController::edit/$1'
    );

    $routes->post(
        'donationposts/update/(:num)',
        'DonationPostsController::update/$1'
    );

    $routes->delete(
        'donationposts/(:num)',
        'DonationPostsController::delete/$1'
    );



    // ================= FOUNDATION =================


    $routes->get(
        'foundations',
        'FoundationController::index'
    );


    $routes->get(
        'foundations/data',
        'FoundationController::data'
    );


    $routes->get(
        'foundations/create',
        'FoundationController::create'
    );


    $routes->post(
        'foundations',
        'FoundationController::store'
    );


    $routes->get(
        'foundations/edit/(:num)',
        'FoundationController::edit/$1'
    );


    $routes->post(
        'foundations/update/(:num)',
        'FoundationController::update/$1'
    );


    $routes->delete(
        'foundations/(:num)',
        'FoundationController::delete/$1'
    );



    // ================= EXPENSE =================


    $routes->get(
        'expenses',
        'ExpensesController::index'
    );


    $routes->get(
        'expenses/data',
        'ExpensesController::data'
    );


    $routes->get(
        'expenses/create',
        'ExpensesController::create'
    );


    $routes->post(
        'expenses',
        'ExpensesController::store'
    );


    $routes->patch(
        'expenses/(:num)/status',
        'ExpensesController::updateStatus/$1'
    );


    $routes->delete(
        'expenses/(:num)',
        'ExpensesController::delete/$1'
    );



    // ================= USERS =================


    $routes->get(
        'users',
        'UsersController::index'
    );


    $routes->get(
        'users/data',
        'UsersController::data'
    );


    $routes->get(
        'users/create',
        'UsersController::create'
    );


    $routes->post(
        'users',
        'UsersController::store'
    );


    $routes->get(
        'users/view/(:num)',
        'UsersController::view/$1'
    );


    $routes->get(
        'users/view/(:num)/data',
        'UsersController::viewData/$1'
    );


    $routes->get(
        'users/edit/(:num)',
        'UsersController::edit/$1'
    );


    $routes->post(
        'users/update/(:num)',
        'UsersController::update/$1'
    );


    $routes->delete(
        'users/(:num)',
        'UsersController::delete/$1'
    );

});




// ==================== AUTH ====================

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');

$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::attemptRegister');

$routes->post('logout', 'Auth::logout');

// ==================== DONATE ====================

$routes->get('donate', 'Donate::index');

$routes->get(
    'donate/history',
    'Donate::history',
    ['filter' => 'auth']
);

$routes->get(
    'donate/checkout/(:num)',
    'Donate::checkout/$1',
    ['filter' => 'auth']
);

$routes->post(
    'donate/store',
    'Donate::store',
    ['filter' => 'auth']
);

$routes->get(
    'donate/confirm/(:num)',
    'Donate::confirm/$1',
    ['filter' => 'auth']
);

$routes->post(
    'donate/pay/(:num)',
    'Donate::pay/$1',
    ['filter' => 'auth']
);

$routes->post(
    'donate/expire/(:num)',
    'Donate::expire/$1',
    ['filter' => 'auth']
);

$routes->get(
    'donate/success/(:num)',
    'Donate::success/$1',
    ['filter' => 'auth']
);

$routes->get(
    'donate/failed/(:num)',
    'Donate::failed/$1',
    ['filter' => 'auth']
);

$routes->post(
    'profile/update',
    'Profile::update',
    ['filter' => 'auth']
);

// ==================== DASHBOARD ====================


$routes->group('dashboard', function($routes){

    $routes->get(
        'laporan',
        'Dashboard::laporan'
    );

});