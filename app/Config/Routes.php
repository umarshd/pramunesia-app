<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->post('/login/proses', 'Auth::prosesLogin');
$routes->post('/register/proses', 'Auth::prosesRegister');
$routes->get('/logout', 'Auth::logout');


$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin::dashboard');


    $routes->get('kota', 'Kota::index');
    $routes->get('kota/tambah', 'Kota::tambah');
    $routes->get('kota/edit/(:segment)', 'Kota::edit/$1');
    $routes->get('kota/delete/(:segment)', 'Kota::delete/$1');
    $routes->post('kota/tambah/proses', 'Kota::prosesTambah');
    $routes->post('kota/edit/proses', 'Kota::prosesEdit');

    $routes->get('sidang', 'Sidang::listSidang');
    $routes->get('sidang/tambah', 'Sidang::tambah');
    $routes->get('sidang/edit/(:segment)', 'Sidang::edit/$1');
    $routes->get('sidang/delete/(:segment)', 'Sidang::delete/$1');
    $routes->post('sidang/tambah/proses', 'Sidang::prosesTambah');
    $routes->post('sidang/edit/proses', 'Sidang::prosesEdit');

    $routes->get('dosen', 'Dosen::listDosen');
    $routes->get('dosen/tambah', 'Dosen::tambah');
    $routes->get('dosen/edit/(:segment)', 'Dosen::edit/$1');
    $routes->get('dosen/delete/(:segment)', 'Dosen::delete/$1');
    $routes->post('dosen/tambah/proses', 'Dosen::prosesTambah');
    $routes->post('dosen/edit/proses', 'Dosen::prosesEdit');

    $routes->get('mahasiswa', 'Mahasiswa::listMahasiswa');
    $routes->get('mahasiswa/tambah', 'Mahasiswa::tambah');
    $routes->get('mahasiswa/edit/(:segment)', 'Mahasiswa::edit/$1');
    $routes->get('mahasiswa/delete/(:segment)', 'Mahasiswa::delete/$1');
    $routes->post('mahasiswa/tambah/proses', 'Mahasiswa::prosesTambah');
    $routes->post('mahasiswa/edit/proses', 'Mahasiswa::prosesEdit');
});

$routes->group('mahasiswa', ['filter' => 'authfilter'], function ($routes) {
    $routes->get('/', 'Mahasiswa::dashboard');

    $routes->get('pendaftaransidang', 'PendaftaranSidang::daftarSidang');
    $routes->get('pendaftaransidang/status', 'PendaftaranSidang::statusSidang');
    $routes->post('pendaftaransidang/proses', 'PendaftaranSidang::prosesDaftar');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
