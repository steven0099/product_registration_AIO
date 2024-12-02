<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 */
$routes->get('/', 'AuthController::login', ['as' => 'login']);
$routes->get('register', 'AuthController::register');
$routes->post('register/send', 'AuthController::registration');
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

    $routes->get('getBrands', 'ProductController::getBrands');
    $routes->post('updateBrand', 'ProductController::updateBrand');
    $routes->post('deleteProduct/(:num)', 'ProductController::deleteProduct/$1');
    $routes->get('thank_you', 'ProductController::thank_you');
});

$routes->group('catalog', function ($routes) {
$routes->get('', 'CatalogController::catalog');
$routes->get('details/(:num)', 'CatalogController::details/$1');
$routes->get('filterProducts', 'CatalogController::filterProducts');
$routes->get('getSubcategories', 'CatalogController::getSubcategories');
$routes->get('getCapacities', 'CatalogController::getCapacities');
$routes->get('getComparisonWidget', 'CatalogController::getComparisonWidget');
$routes->get('compare', 'CatalogController::CompareDetails');
});

$routes->group('reset', ['filter' => 'auth'], function ($routes) {
    $routes->get('reset-password', 'AuthController::resetPassword');
    $routes->post('reset_password', 'AuthController::updatePassword');
});
// Routes for Superadmins
$routes->group('superadmin', ['filter' => 'role:superadmin'], function($routes) {
    $routes->get('dashboard', 'SuperadminController::dashboard');

    $routes->get('product', 'SuperadminController::product');

    $routes->get('details/(:num)', 'ProductController::productDetails/$1');
    $routes->get('approve/(:num)', 'ProductController::approveProduct/$1');
    $routes->get('reject/(:num)', 'ProductController::rejectProduct/$1');

    
    // User management routes for superadmin
    $routes->get('user', 'Superadmin\UserController::index'); // This should match your directory structure
    $routes->get('user/addUser', 'Superadmin\UserController::addUser');
    $routes->post('user/saveUser', 'Superadmin\UserController::saveUser');
    $routes->get('user/editUser/(:num)', 'Superadmin\UserController::editUser/$1');
    $routes->post('user/resetPassword/(:num)', 'Superadmin\UserController::resetPassword/$1');
    $routes->post('user/updateUser/(:num)', 'Superadmin\UserController::updateUser/$1');
    $routes->get('user/deleteUser/(:num)', 'Superadmin\UserController::deleteUser/$1'); // Correct namespace

    $routes->get('marketplace', 'SuperadminController::marketplace');
    $routes->post('marketplace/saveMarketplace', 'SuperadminController::saveMarketplace');
    $routes->post('marketplace/updateMarketplace/(:num)', 'SuperadminController::updateMarketplace/$1');
    $routes->get('marketplace/deleteMarketplace/(:num)', 'SuperadminController::deleteMarketplace/$1');
    // Superadmin product approvals/rejections
    $routes->get('product/approved', 'ProductController::approved');
    $routes->get('product/rejected', 'ProductController::rejected');
    $routes->post('updateColor', 'ProductController::updateColor');
    $routes->post('updatePower', 'ProductController::updatePower');
    $routes->post('updateWeight', 'ProductController::updateWeight');
    $routes->post('updateColdCap', 'ProductController::updateColdCap');
    $routes->post('updatePics', 'ProductController::updatePics');
    $routes->post('updateVideo', 'ProductController::updateVideo');
    $routes->post('updateHarga', 'ProductController::updateHarga');
    $routes->post('updateHotCap', 'ProductController::updateHotCap');
    $routes->post('updateCooling', 'ProductController::updateCooling');
    $routes->post('updateCspf', 'ProductController::updateCspf');
    $routes->post('updateManufacturer', 'ProductController::updateManufacturer');
    $routes->post('updateProductType', 'ProductController::updateProductType');
    $routes->post('updateAdvantages', 'ProductController::updateAdvantages');
    $routes->post('updateProductDimensions', 'ProductController::updateProductDimensions');
    $routes->post('updatePackagingDimensions', 'ProductController::updatePackagingDimensions');
    $routes->post('updateStandDimensions', 'ProductController::updateStandDimensions');
    $routes->post('updateResolution', 'ProductController::updateResolution');
});

// Routes for Admin and Superadmin (Admin Management)
$routes->group('admin', ['filter' => 'role:admin,superadmin'], function($routes) {
    
    // Admin Dashboard
    $routes->get('dashboard', 'AdminController::dashboard');

    $routes->get('product', 'AdminController::product');
    $routes->get('details/(:num)', 'AdminController::productDetails/$1');
    $routes->get('reports', 'ProductController::reports');
    $routes->post('generateReport', 'ProductController::generateReport');

    $routes->get('wheel', 'WheelController::index'); // Management page
    $routes->post('wheel/saveSegment', 'WheelController::saveSegment'); // Save a segment
    $routes->post('wheel/updateSegment/(:num)', 'WheelController::updateSegment/$1'); // Save a segment
    $routes->get('wheel/deleteSegment/(:num)', 'WheelController::deleteSegment/$1'); // Delete a segment
  
    // Brand Management
    $routes->get('brand', 'Admin\BrandController::index');
    $routes->post('brand/saveBrand', 'Admin\BrandController::saveBrand');
    $routes->post('brand/updateBrand/(:num)', 'Admin\BrandController::updateBrand/$1');
    $routes->get('brand/deleteBrand/(:num)', 'Admin\BrandController::deleteBrand/$1');

    // Kategori Management
    $routes->get('kategori', 'Admin\KategoriController::index');
    $routes->post('kategori/saveKategori', 'Admin\KategoriController::saveKategori');
    $routes->post('kategori/updateKategori/(:num)', 'Admin\KategoriController::updateKategori/$1');
    $routes->get('kategori/deleteKategori/(:num)', 'Admin\KategoriController::deleteKategori/$1');

    // Subkategori Management
    $routes->get('subkategori', 'Admin\SubkategoriController::index');
    $routes->post('subkategori/saveSubkategori', 'Admin\SubkategoriController::saveSubkategori');
    $routes->post('subkategori/updateSubkategori/(:num)', 'Admin\SubkategoriController::updateSubkategori/$1');
    $routes->get('subkategori/deleteSubkategori/(:num)', 'Admin\SubkategoriController::deleteSubkategori/$1');

    // Kapasitas Management
    $routes->get('kapasitas', 'Admin\KapasitasController::index');
    $routes->post('kapasitas/saveKapasitas', 'Admin\KapasitasController::saveKapasitas');
    $routes->post('kapasitas/updateKapasitas/(:num)', 'Admin\KapasitasController::updateKapasitas/$1');
    $routes->get('kapasitas/deleteKapasitas/(:num)', 'Admin\KapasitasController::deleteKapasitas/$1');

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
    $routes->get('ukuran/deleteUkuran/(:num)', 'Admin\UkuranController::deleteUkuran/$1');

    $routes->get('refrigrant', 'Admin\RefrigrantController::index');
    $routes->post('refrigrant/saveRefrigrant', 'Admin\RefrigrantController::saveRefrigrant');
    $routes->post('refrigrant/updateRefrigrant/(:num)', 'Admin\RefrigrantController::updateRefrigrant/$1');
    $routes->get('refrigrant/deleteRefrigrant/(:num)', 'Admin\RefrigrantController::deleteRefrigrant/$1');

    $routes->get('garansi_motor', 'Admin\GaransiMotorController::index');
    $routes->post('garansi_motor/saveGaransiMotor', 'Admin\GaransiMotorController::saveGaransiMotor');
    $routes->post('garansi_motor/updateGaransiMotor/(:num)', 'Admin\GaransiMotorController::updateGaransiMotor/$1');
    $routes->post('garansi_motor/deleteGaransiMotor/(:num)', 'Admin\GaransiMotorController::deleteGaransiMotor/$1');

    $routes->get('garansi_panel', 'Admin\GaransiPanelController::index');
    $routes->post('garansi_panel/saveGaransiPanel', 'Admin\GaransiPanelController::saveGaransiPanel');
    $routes->post('garansi_panel/updateGaransiPanel/(:num)', 'Admin\GaransiPanelController::updateGaransiPanel/$1');
    $routes->post('garansi_panel/deleteGaransiPanel/(:num)', 'Admin\GaransiPanelController::deleteGaransiPanel/$1');

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
$routes->get('get-capacities/(:num)', 'ProductController::getCapacities/$1');
$routes->get('get-ukuran-tv/(:num)', 'ProductController::getUkuranTv/$1');
$routes->get('fetch-warranty-options', 'ProductController::fetchWarrantyOptions');
$routes->get('getOptions', 'ProductController::getOptions');
$routes->post('updateProductField', 'ProductController::updateProductField');
$routes->get('clear-subcategory-id', 'ProductController::clearSubcategoryId');
$routes->get('/spinwheel', 'WheelController::wheel'); // Spin the wheel
$routes->get('/wheel/getSegments', 'WheelController::getSegments'); // Spin the wheel
$routes->get('/spinwheel/spin', 'WheelController::spinWheel'); // Spin the wheel


$routes->get('no-access', 'AuthController::NoAccess');



