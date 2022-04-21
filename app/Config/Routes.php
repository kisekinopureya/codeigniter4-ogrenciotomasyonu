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
$routes->setDefaultController('main');
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
$routes->get('/', 'main::index', ['filter' => 'noauth']);
$routes->get('cikis', 'main::cikis');
$routes->match(['get','post'], 'kayit', 'main::kayit', ['filter' => 'auth']);
$routes->get('notgiris', 'main::notgiris', ['filter' => 'auth']);
$routes->get('transkriptpdf', 'main::transkriptpdf', ['filter' => 'auth']);
$routes->get('transkriptcsv', 'main::transkriptcsv', ['filter' => 'auth']);
$routes->get('dersdurum/', 'main::dersdurum', ['filter' => 'auth']);
$routes->match(['get','post'],'ogrencilistesi', 'main::ogrencilistesi',['filter' => 'auth']);
$routes->get('anamenu', 'main::anamenu',['filter' => 'auth']);

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
