<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\admin\Admin;
use App\Controllers\admin\Donationpost;
use App\Controllers\admin\Fondation;

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
$routes->get('/admin/expense', static function () {
    return view('admin/expense.php');
});
service('auth')->routes($routes);
