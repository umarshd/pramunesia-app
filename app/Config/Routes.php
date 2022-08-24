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

$routes->get('/wisatawan/logout', 'Auth::logoutWisatawan');
$routes->get('/admin/logout', 'Auth::logoutAdmin');
$routes->get('/pemandu/logout', 'Auth::logoutPemandu');

$routes->get('/wisatawan/login', 'Auth::loginWisatawan');
$routes->post('/wisatawan/login/proses', 'Auth::prosesLoginWisatawan');
$routes->get('/wisatawan/registrasi', 'Auth::registrasiWisatawan');
$routes->post('/wisatawan/registrasi/proses', 'Auth::prosesRegistrasiWisatawan');

$routes->get('/pemandu/login', 'Auth::loginPemandu');
$routes->post('/pemandu/login/proses', 'Auth::prosesLoginPemandu');
$routes->get('/pemandu/registrasi', 'Auth::registrasiPemandu');
$routes->post('/pemandu/registrasi/proses', 'Auth::prosesRegistrasiPemandu');

$routes->get('/admin/login', 'Auth::loginAdmin');
$routes->post('/admin/login/proses', 'Auth::prosesLoginAdmin');

$routes->get('/', 'Landing::index');
$routes->get('/tentang-kami', 'Landing::tentangKami');

$routes->group('wisatawan', ['filter' => 'authWisatawanFilter'], function ($routes) {
    $routes->get('/', 'Wisatawan::index');

    $routes->get('profile', 'Wisatawan::profile');
    $routes->get('profile/edit/(:segment)', 'Wisatawan::editProfile/$1');
    $routes->post('profile/edit/proses', 'Wisatawan::prosesEditProfile');

    $routes->get('pemesanan', 'Wisatawan::pemesanan');

    $routes->get('pemesanan/tiket/(:segment)', 'Wisatawan::tiketPemesanan/$1');
    $routes->get('pemesanan/tiket/cetak/(:segment)', 'Wisatawan::cetakTiket/$1');

    $routes->get('pembayaran/(:segment)', 'Wisatawan::pembayaran/$1');

    $routes->get('transaksi/konfirmasi', 'Wisatawan::konfirmasiPesanan');
    $routes->post('transaksi/konfirmasi/proses', 'Wisatawan::setPesanan');


    $routes->get('pemandu/(:segment)', 'Wisatawan::detailPemandu/$1');
});

$routes->group('pemandu', ['filter' => 'authPemanduFilter'], function ($routes) {
    $routes->get('/', 'Pemandu::index');

    $routes->get('profile', 'Pemandu::profile');
    $routes->get('profile/edit/(:segment)', 'Pemandu::editProfile/$1');
    $routes->post('profile/edit/proses', 'Pemandu::prosesEditProfile');

    $routes->get('kegiatan', 'Pemandu::kegiatan');
    $routes->get('kegiatan/tambah', 'Pemandu::tambahKegiatan');
    $routes->post('kegiatan/tambah/proses', 'Pemandu::prosesTambahKegiatan');
    $routes->get('kegiatan/delete/(:segment)', 'Pemandu::deleteKegiatan/$1');

    $routes->get('jadwal', 'Pemandu::jadwal');

    $routes->get('manual/transaksi/tambah', 'Pemandu::tambahManualTransaksi');
    $routes->post('manual/transaksi/tambah/proses', 'Pemandu::prosesTambahManualTransaksi');
});

$routes->group('admin', ['filter' => 'authAdminFilter'], function ($routes) {

    $routes->get('dashboard', 'Admin::index');

    $routes->get('wisatawan', 'Admin::indexWisatawan');
    $routes->get('wisatawan/tambah', 'Admin::tambahWisatawan');
    $routes->post('wisatawan/tambah/proses', 'Admin::prosestambahWisatawan');
    $routes->post('wisatawan/edit/proses', 'Admin::prosesEditWisatawan');
    $routes->get('wisatawan/delete/(:segment)', 'Admin::deleteWisatawan/$1');
    $routes->get('wisatawan/edit/(:segment)', 'Admin::editWisatawan/$1');

    $routes->get('pemandu', 'Admin::indexPemandu');
    $routes->get('pemandu/tambah', 'Admin::tambahPemandu');
    $routes->post('pemandu/tambah/proses', 'Admin::prosestambahPemandu');
    $routes->post('pemandu/edit/proses', 'Admin::prosesEditPemandu');
    $routes->get('pemandu/delete/(:segment)', 'Admin::deletePemandu/$1');
    $routes->get('pemandu/edit/(:segment)', 'Admin::editPemandu/$1');

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

    $routes->get('transaksi', 'Transaksi::index');
    $routes->get('transaksi/tambah', 'Transaksi::tambah');
    $routes->post('transaksi/tambah/proses', 'Transaksi::prosestambah');
    $routes->post('transaksi/edit/proses', 'Transaksi::prosesEdit');
    $routes->get('transaksi/delete/(:segment)', 'Transaksi::delete/$1');
    $routes->get('transaksi/edit/(:segment)', 'Transaksi::edit/$1');

    $routes->post('transaksi/manual/edit/proses', 'Transaksi::prosesEditManual');
    $routes->get('transaksi/manual/delete/(:segment)', 'Transaksi::deleteManual/$1');
    $routes->get('transaksi/manual/edit/(:segment)', 'Transaksi::editManual/$1');
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
