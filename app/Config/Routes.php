<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 */
$routes->get('/', 'AuthController::login', ['as' => 'login']);
$routes->post('login/auth', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');

// User routes (non-admin users)
$routes->group('user', ['filter' => 'role:user'], function($routes) {
    $routes->get('products/step1', 'UsersController::step1');
    // Other user routes
});

// Authentication routes
$routes->get('login', 'AuthController::login', ['as' => 'login']);
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');

// Product registration (accessible by superadmin, admin, and user)
$routes->group('product', ['filter' => 'auth'], function ($routes) {
    
    $routes->get('step1', 'ProductController::step1');
    $routes->post('save-step1', 'ProductController::saveStep1');
    
    $routes->get('step2', 'ProductController::step2');
    $routes->post('save-step2', 'ProductController::saveStep2');
    
    $routes->get('step3', 'ProductController::step3');
    $routes->post('save-step3', 'ProductController::saveStep3');

    $routes->get('step4', 'ProductController::step4');
    $routes->post('save-step4', 'ProductController::saveStep4');

    $routes->get('confirm', 'ProductController::confirm');
    $routes->post('confirmSubmission', 'ProductController::finalizeProductSubmission');

    $routes->post('updateField', 'ProductController::updateField');
    $routes->get('thank_you', 'ProductController::thank_you');
});

$routes->group('reset', ['filter' => 'auth'], function ($routes) {
    $routes->get('reset-password', 'AuthController::resetPassword');
    $routes->post('reset_password', 'AuthController::updatePassword');
});
// Routes for Superadmins
$routes->group('superadmin', ['filter' => 'role:superadmin'], function($routes) {
    $routes->get('dashboard', 'SuperadminController::dashboard');

    $routes->get('product', 'SuperadminController::product');
    
    // User management routes for superadmin
    $routes->get('user', 'Superadmin\UserController::index'); // This should match your directory structure
    $routes->get('user/addUser', 'Superadmin\UserController::addUser');
    $routes->post('user/saveUser', 'Superadmin\UserController::saveUser');
    $routes->get('user/editUser/(:num)', 'Superadmin\UserController::editUser/$1');
    $routes->post('user/updateUser/(:num)', 'Superadmin\UserController::updateUser/$1');
    $routes->get('user/deleteUser/(:num)', 'Superadmin\UserController::deleteUser/$1'); // Correct namespace

    // Superadmin product approvals/rejections
    $routes->get('product/approved', 'ProductController::approved');
    $routes->get('product/rejected', 'ProductController::rejected');
    $routes->get('product/deleteProduct/(:num)', 'ProductController::deleteProduct/$1');
});

// Routes for Admin and Superadmin (Admin Management)
$routes->group('admin', ['filter' => 'role:admin,superadmin'], function($routes) {
    
    // Admin Dashboard
    $routes->get('dashboard', 'AdminController::dashboard');

    $routes->get('product', 'AdminController::product');

    // Brand Management
    $routes->get('brand', 'Admin\BrandController::index');
    $routes->post('brand/saveBrand', 'Admin\BrandController::saveBrand');
    $routes->post('brand/updateBrand/(:num)', 'Admin\BrandController::updateBrand/$1');
    $routes->get('brand/deleteBrand/(:num)', 'Admin\BrandController::deleteBrand/$1');

    // Kategori Management
    $routes->get('kategori', 'Admin\KategoriController::index');
    $routes->post('kategori/saveKategori', 'Admin\KategoriController::saveKategori');
    $routes->post('kategori/updateKategori/(:num)', 'Admin\KategoriController::updateKategori/$1');
    $routes->post('kategori/deleteKategori/(:num)', 'Admin\KategoriController::deleteKategori/$1');

    // Subkategori Management
    $routes->get('subkategori', 'Admin\SubkategoriController::index');
    $routes->post('subkategori/saveSubkategori', 'Admin\SubkategoriController::saveSubkategori');
    $routes->post('subkategori/updateSubkategori/(:num)', 'Admin\SubkategoriController::updateSubkategori/$1');
    $routes->get('subkategori/deleteSubkategori/(:num)', 'Admin\SubkategoriController::deleteSubkategori/$1');

    // Kapasitas Management
    $routes->get('kapasitas', 'Admin\KapasitasController::index');
    $routes->post('kapasitas/saveKapasitas', 'Admin\KapasitasController::saveKapasitas');
    $routes->post('kapasitas/updateKapasitas/(:num)', 'Admin\KapasitasController::updateKapasitas/$1');
    $routes->post('kapasitas/deleteKapasitas/(:num)', 'Admin\KapasitasController::deleteKapasitas/$1');

    // Garansi Kompresor Management
    $routes->get('garansi_kompresor', 'Admin\GaransiKompresorController::index');
    $routes->post('garansi_kompresor/saveGaransiKompresor', 'Admin\GaransiKompresorController::saveGaransiKompresor');
    $routes->post('garansi_kompresor/updateGaransiKompresor/(:num)', 'Admin\GaransiKompresorController::updateGaransiKompresor/$1');
    $routes->post('garansi_kompresor/deleteGaransiKompresor/(:num)', 'Admin\GaransiKompresorController::deleteGaransiKompresor/$1');

    // Garansi Sparepart Management
    $routes->get('garansi_sparepart', 'Admin\GaransiSparepartController::index');
    $routes->post('garansi_sparepart/saveGaransiSparepart', 'Admin\GaransiSparepartController::saveGaransiSparepart');
    $routes->post('garansi_sparepart/updateGaransiSparepart/(:num)', 'Admin\GaransiSparepartController::updateGaransiSparepart/$1');
    $routes->post('garansi_sparepart/deleteGaransiSparepart/(:num)', 'Admin\GaransiSparepartController::deleteGaransiSparepart/$1');

    $routes->get('ukuran', 'Admin\UkuranController::index');
    $routes->post('ukuran/saveUkuran', 'Admin\UkuranController::saveUkuran');
    $routes->post('ukuran/updateUkuran/(:num)', 'Admin\UkuranController::updateUkuran/$1');
    $routes->post('ukuran/deleteUkuran/(:num)', 'Admin\UkuranController::deleteUkuran/$1');

    $routes->get('refrigrant', 'Admin\RefrigrantController::index');
    $routes->post('refrigrant/saveRefrigrant', 'Admin\RefrigrantController::saveRefrigrant');
    $routes->post('refrigrant/updateRefrigrant/(:num)', 'Admin\RefrigrantController::updateRefrigrant/$1');
    $routes->post('refrigrant/deleteRefrigrant/(:num)', 'Admin\RefrigrantController::deleteRefrigrant/$1');

    $routes->get('garansi_motor', 'Admin\GaransiMotorController::index');
    $routes->post('garansi_motor/saveGaransiMotor', 'Admin\GaransiMotorController::saveGaransiMotor');
    $routes->post('garansi_motor/updateGaransiMotor/(:num)', 'Admin\GaransiMotorController::updateGaransiMotor/$1');
    $routes->post('garansi_motor/deleteGaransiMotor/(:num)', 'Admin\GaransiMotorController::deleteGaransiMotor/$1');

    $routes->get('garansi_service', 'Admin\GaransiServiceController::index');
    $routes->post('garansi_service/saveGaransiService', 'Admin\GaransiServiceController::saveGaransiService');
    $routes->post('garansi_service/updateGaransiService/(:num)', 'Admin\GaransiServiceController::updateGaransiService/$1');
    $routes->post('garansi_service/deleteGaransiService/(:num)', 'Admin\GaransiServiceController::deleteGaransiService/$1');

    $routes->get('garansi_elemen_panas', 'Admin\GaransiElemenPanasController::index');
    $routes->post('garansi_elemen_panas/saveGaransiElemenPanas', 'Admin\GaransiElemenPanasController::saveGaransiElemenPanas');
    $routes->post('garansi_elemen_panas/updateGaransiElemenPanas/(:num)', 'Admin\GaransiElemenPanasController::updateGaransiElemenPanas/$1');
    $routes->post('garansi_elemen_panas/deleteGaransiElemenPanas/(:num)', 'Admin\GaransiElemenPanasController::deleteGaransiElemenPanas/$1');
});

// Public Routes (no authentication required)
$routes->get('get-subcategories/(:num)', 'ProductController::getSubcategories/$1');
$routes->get('get-capacities', 'ProductController::getCapacities');
$routes->get('get-capacities/(:num)', 'ProductController::getCapacities/$1');
$routes->get('get-ukuran-tv', 'ProductController::getUkuranTv');
$routes->get('get-ukuran-tv/(:num)', 'ProductController::getUkuranTv/$1');
$routes->get('get-garansi-motor', 'ProductController::getGaransiMotor');
$routes->get('get-garansi-panel', 'ProductController::getGaransiPanel');
$routes->get('get-garansi-service', 'ProductController::getGaransiSemuaService');
$routes->get('get-compressor-warranties', 'ProductController::getCompressorWarranties');
$routes->get('get-panel-warranties', 'ProductController::getPanelWarranties');
$routes->get('get-heat-warranties', 'ProductController::getHeatWarranties');
$routes->get('get-motor-warranties', 'ProductController::getMotorWarranties');
$routes->get('fetch-brands', 'ProductController::fetchBrands');



$routes->get('no-access', 'AuthController::NoAccess');

// List of products (viewable by admin and superadmin)
$routes->group('', ['filter' => 'role:admin,superadmin'], function($routes) {
    $routes->get('product', 'ProductController::index');
});


