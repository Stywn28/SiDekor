<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/login/register', 'Login::register');
$routes->post('/login/save', 'Login::save');
$routes->post('/login/proses', 'Login::proses');
$routes->get('/login/keluar', 'Login::keluar');
$routes->get('/login/masuk', 'Login::masuk');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/dekorasi', 'Dekorasi::index');
$routes->get('/dekorasi/pesan/(:segment)', 'Dekorasi::pesan/$1');
$routes->post('/dekorasi/proses', 'Dekorasi::proses');
$routes->get('/dekorasi/bayar', 'Dekorasi::bayar');

$routes->group('admin', function ($routes) {
    $routes->add('/', 'admin\Home::index');
    // $routes->add('/home', 'admin\Home::index');
    $routes->add('/dekorasi', 'admin\Dekorasi::index');
    $routes->add('/dekorasi/add', 'admin\Dekorasi::add');
    $routes->add('/dekorasi/save', 'admin\Dekorasi::save');
    $routes->get('/dekorasi/edit/(:segment)', 'admin\Dekorasi::edit/$1');
    $routes->post('/dekorasi/update', 'admin\Dekorasi::update');
    $routes->get('/dekorasi/delete/(:segment)', 'admin\Dekorasi::delete/$1');

    $routes->get('/login', 'admin\Login::index');
    $routes->post('/login/cek', 'admin\Login::cek');
    $routes->get('/login/keluar', 'admin\Login::keluar');

    $routes->get('/petugas', 'admin\Petugas::index');
    $routes->get('/petugas/add', 'admin\Petugas::add');
    $routes->post('/petugas/save', 'admin\Petugas::save');
    $routes->get('/petugas/edit/(:segment)', 'admin\Petugas::edit/$1');
    $routes->get('/petugas/update', 'admin\Petugas::update');
    $routes->get('/petugas/delete/(:segment)', 'admin\Petugas::delete/$1');
});
