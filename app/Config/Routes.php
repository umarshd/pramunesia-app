<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/wisatawan/login', 'Auth::loginWisatawan');
$routes->post('/wisatawan/login/proses', 'Auth::prosesLoginWisatawan');
$routes->get('/wisatawan/registrasi', 'Auth::registrasiWisatawan');
$routes->post('/wisatawan/registrasi/proses', 'Auth::prosesRegistrasiWisatawan');

$routes->get('/', 'Landing::index');
$routes->get('/tentang-kami', 'Landing::tentangKami');

$routes->group('admin', function ($routes) {
    $routes->get('kota', 'Kota::index');
    $routes->get('kota/tambah', 'Kota::tambah');
    $routes->post('kota/tambah/proses', 'Kota::prosestambah');
    $routes->post('kota/edit/proses', 'Kota::prosesEdit');
    $routes->get('kota/delete/(:segment)', 'Kota::delete/$1');
    $routes->get('kota/edit/(:segment)', 'Kota::edit/$1');

    $routes->get('destinasi', 'Destinasi::index');
    $routes->get('destinasi/tambah', 'Destinasi::tambah');
    $routes->post('destinasi/tambah/proses', 'Destinasi::prosestambah');
    $routes->post('destinasi/edit/proses', 'Destinasi::prosesEdit');
    $routes->get('destinasi/delete/(:segment)', 'Destinasi::delete/$1');
    $routes->get('destinasi/edit/(:segment)', 'Destinasi::edit/$1');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}