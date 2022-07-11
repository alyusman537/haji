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
$routes->setDefaultController('Jamaah');
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
$routes->get('/', 'Dash::index');
$routes->get('/dash/jamaahByStatus', 'Dash::jamaahByStatus');
$routes->get('/dash/jamaahByKelamin', 'Dash::kelompokKelamin');
$routes->get('/dash/jamaahByCabang', 'Dash::jamaahByCabang');
$routes->get('/dash/jamaahByKabupaten', 'Dash::jamaahByKabupaten');
$routes->get('/dash/jamaahByKabupatenNonaktif', 'Dash::jamaahByKabupatenNonaktif');
$routes->get('/dash/kelompokUmur', 'Dash::kelompokUmur');
$routes->get('/dash/jamaahByBulan', 'Dash::jamaahByBulan');

$routes->get('/jamaah', 'Jamaah::index');
$routes->post('/jamaah/getJamaah', 'Jamaah::getJamaah');
//$routes->post('/jamaah/nonaktif/(:any)/(:num)', 'Jamaah::getJamaahNonaktif/$1/$2');
$routes->post('/jamaah/cariJamaah', 'Jamaah::cariJamaah');
$routes->get('/jamaah/detail/(:num)', 'Jamaah::getJamaahById/$1');
$routes->get('/jamaah/baseUrl', 'Jamaah::getBaseUrl');
$routes->post('/jamaah/insertJamaah', 'Jamaah::insertJamaah');
$routes->put('/jamaah/updateData/(:num)', 'Jamaah::updateDataJamaah/$1');
$routes->post('/jamaah/fileUpload', 'Jamaah::fileUpload');
$routes->put('/jamaah/updateFoto/(:num)', 'Jamaah::updateFoto/$1');
$routes->get('/jamaah/profile/(:num)', 'Jamaah::jamaahDetail/$1');

$routes->get('/alamat/propinsi', 'Alamat::getPropinsi');
$routes->get('/alamat/kota/(:num)', 'Alamat::getKota/$1');
$routes->get('/alamat/kecamatan/(:num)', 'Alamat::getKecamatan/$1');
$routes->get('/alamat/desa/(:num)', 'Alamat::getDesa/$1');
$routes->get('/alamat/kabupaten', 'Alamat::getKabupaten');

$routes->get('/cabang/semua', 'Cabang::getCabang');

$routes->get('/renderImage/(:any)', 'RenderImage::index/$1');
$routes->get('/renderJs/(:any)', 'RenderJs::index/$1');
$routes->post('/renderTabel', 'Jamaah::renderTabel');


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
