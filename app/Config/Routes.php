<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system"s routing file first, so that the app and ENVIRONMENT
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
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don"t want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don"t have to scan directories.

$routes->group('midtrans', static function ($routes) {
    $routes->post('handling', 'Midtrans::handling');
    $routes->post('error', 'Midtrans::error');
    $routes->post('finish', 'Midtrans::finish');
    $routes->post('unfinish', 'Midtrans::unfinish');
    $routes->get('finish/(:num)', 'Midtrans::finish/$1');
});

// View index
$routes->get('/', 'Home::index');

// Routes for User
$routes->get('/profile', 'User::profile');
$routes->post('/profile/(:num)', 'User::updateProfile/$1');
$routes->get('/user/pembayaran', 'User::pembayaran', ['filter' => 'role:user']);

// Routes for Admin
$routes->group('admin', static function ($routes) {
    $routes->get('/', 'Admin::index', ['filter' => 'role:admin']);
    $routes->get('/index', 'Admin::index', ['filter' => 'role:admin']);
    $routes->get('/data_santri', 'Admin::data_santri', ['filter' => 'role:admin',]);
    $routes->get('/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
    $routes->get('/tagihan', 'Admin::tagihan', ['filter' => 'role:admin']);
    $routes->get('/laporan', 'Admin::laporan', ['filter' => 'role:admin']);
    $routes->get('/santri/(:num)', 'Admin::laporan_syahriah/$1', ['filter' => 'role:admin']);
    $routes->get('/pembayaran', 'Pembayaran::index', ['filter' => 'role:admin']);
    $routes->get('/spp_bulanan/(:num)/(:num)', 'Pembayaran::spp_bulanan/$1/$1', ['filter' => 'role:admin',]);
    $routes->post('save', 'Admin::save', ['filter' => 'role:admin']);
});

$routes->get('/tagihan/auto-add', 'TagihanController::autoAddTagihan');
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
