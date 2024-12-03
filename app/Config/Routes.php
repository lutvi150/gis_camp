<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::home');
$routes->get('login', 'Home::login');
$routes->post('login', 'Home::login_process');
$routes->get('register', 'Home::register');
$routes->post('register', 'Home::register_process');
$routes->get('logout', 'Home::logout');

// use for admin
$routes->group('admin', ['filter' => 'administrator'], function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('users', 'Admin::users');
    $routes->get('users/add', 'Admin::add_user');
    $routes->post('users/add', 'Admin::add_user_process');
    $routes->get('users/edit/(:num)', 'Admin::edit_user/$1');
    // reset password
    $routes->post('user-reset-password', 'Admin::user_reset_password');
});
// use for wisatawan
$routes->group('user', ['filter' => ['user', 'profil']], function ($routes) {
    $routes->get('/', 'User::index');
    $routes->get('profile', 'User::profile_update');
});
// use for owner camp
$routes->group('owner', ['filter' => 'owner'], function ($routes) {
    $routes->get('/', 'Owner::index');
    $routes->get('produk', 'Owner::produk');
    $routes->post('produk', 'Owner::produk_store');
    $routes->get('produk/edit/(:num)', 'Owner::produk_edit/$1');
    $routes->post('produk/edit/(:num)', 'Owner::produk_update/$1');
    $routes->get('produk/delete/(:num)', 'Owner::produk_delete/$1');
    // detail location
    $routes->get('detail', 'Owner::detail');
});

// use for update profil
$routes->get('update-profil', 'Home::update_profil');
$routes->post('update-profil', 'Home::update_profil_process');
// get location
$routes->post('location', 'Home::location');
