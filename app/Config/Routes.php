<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 */
$routes->get('/', 'AuthController::login', ['as' => 'login']);
$routes->post('login/auth', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');

// Superadmin routes
$routes->group('superadmin', ['filter' => 'role:superadmin'], function($routes) {
    $routes->get('dashboard', 'SuperadminController::dashboard');
    $routes->get('users', 'UsersController::index');
    // Other superadmin routes
});

// Admin routes
$routes->group('admin', ['filter' => 'role:admin'], function($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    // Other admin routes
});

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

    $routes->get('success', 'ProductController::success');
});

$routes->group('reset', ['filter' => 'auth'], function ($routes) {
    $routes->get('reset-password', 'AuthController::resetPassword');
    $routes->post('reset_password', 'AuthController::updatePassword');
});
// Routes for Superadmins
$routes->group('superadmin', ['filter' => 'role:superadmin'], function($routes) {
    $routes->get('dashboard', 'SuperadminController::dashboard');
    
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

    // Brand Management
    $routes->get('brand', 'Admin\BrandController::index');
    $routes->get('brand/addBrand', 'Admin\BrandController::addBrand');
    $routes->post('brand/saveBrand', 'Admin\BrandController::saveBrand');
    $routes->get('brand/editBrand/(:num)', 'Admin\BrandController::editBrand/$1');
    $routes->post('brand/updateBrand/(:num)', 'Admin\BrandController::updateBrand/$1');
    $routes->get('brand/deleteBrand/(:num)', 'Admin\BrandController::deleteBrand/$1');

    // Kategori Management
    $routes->get('kategori', 'Admin\KategoriController::index');
    $routes->get('kategori/addKategori', 'Admin\KategoriController::addKategori');
    $routes->post('kategori/saveKategori', 'Admin\KategoriController::saveKategori');
    $routes->get('kategori/editKategori/(:num)', 'Admin\KategoriController::editKategori/$1');
    $routes->post('kategori/updateKategori/(:num)', 'Admin\KategoriController::updateKategori/$1');
    $routes->post('kategori/deleteKategori/(:num)', 'Admin\KategoriController::deleteKategori/$1');

    // Subkategori Management
    $routes->get('subkategori', 'Admin\SubkategoriController::index');
    $routes->get('subkategori/addSubkategori', 'Admin\SubkategoriController::addSubkategori');
    $routes->post('subkategori/saveSubkategori', 'Admin\SubkategoriController::saveSubkategori');
    $routes->get('subkategori/editSubkategori/(:num)', 'Admin\SubkategoriController::editSubkategori/$1');
    $routes->post('subkategori/updateSubkategori/(:num)', 'Admin\SubkategoriController::updateSubkategori/$1');
    $routes->get('subkategori/deleteSubkategori/(:num)', 'Admin\SubkategoriController::deleteSubkategori/$1');

    // Kapasitas Management
    $routes->get('kapasitas', 'Admin\KapasitasController::index');
    $routes->get('kapasitas/addKapasitas', 'Admin\KapasitasController::addKapasitas');
    $routes->post('kapasitas/saveKapasitas', 'Admin\KapasitasController::saveKapasitas');
    $routes->get('kapasitas/editKapasitas/(:num)', 'Admin\KapasitasController::editKapasitas/$1');
    $routes->post('kapasitas/updateKapasitas/(:num)', 'Admin\KapasitasController::updateKapasitas/$1');
    $routes->post('kapasitas/deleteKapasitas/(:num)', 'Admin\KapasitasController::deleteKapasitas/$1');

    // Garansi Kompresor Management
    $routes->get('garansi_kompresor', 'Admin\GaransiKompresorController::index');
    $routes->get('garansi_kompresor/addGaransiKompresor', 'Admin\GaransiKompresorController::addGaransiKompresor');
    $routes->post('garansi_kompresor/saveGaransiKompresor', 'Admin\GaransiKompresorController::saveGaransiKompresor');
    $routes->get('garansi_kompresor/editGaransiKompresor/(:num)', 'Admin\GaransiKompresorController::editGaransiKompresor/$1');
    $routes->post('garansi_kompresor/updateGaransiKompresor/(:num)', 'Admin\GaransiKompresorController::updateGaransiKompresor/$1');
    $routes->post('garansi_kompresor/deleteGaransiKompresor/(:num)', 'Admin\GaransiKompresorController::deleteGaransiKompresor/$1');

    // Garansi Sparepart Management
    $routes->get('garansi_sparepart', 'Admin\GaransiSparepartController::index');
    $routes->get('garansi_sparepart/addGaransiSparepart', 'Admin\GaransiSparepartController::addGaransiSparepart');
    $routes->post('garansi_sparepart/saveGaransiSparepart', 'Admin\GaransiSparepartController::saveGaransiSparepart');
    $routes->get('garansi_sparepart/editGaransiSparepart/(:num)', 'Admin\GaransiSparepartController::editGaransiSparepart/$1');
    $routes->post('garansi_sparepart/updateGaransiSparepart/(:num)', 'Admin\GaransiSparepartController::updateGaransiSparepart/$1');
    $routes->post('garansi_sparepart/deleteGaransiSparepart/(:num)', 'Admin\GaransiSparepartController::deleteGaransiSparepart/$1');

});

// Public Routes (no authentication required)
$routes->get('get-subcategories/(:num)', 'ProductController::getSubcategories/$1');
$routes->get('no-access', 'AuthController::NoAccess');

// List of products (viewable by admin and superadmin)
$routes->group('', ['filter' => 'role:admin,superadmin'], function($routes) {
    $routes->get('product', 'ProductController::index');
});


