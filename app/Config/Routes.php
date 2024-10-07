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
$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('users', 'Admin::users');
    $routes->get('users/add', 'Admin::add_user');
    $routes->post('users/add', 'Admin::add_user_process');
    $routes->get('users/edit/(:num)', 'Admin::edit_user/$1');
});
