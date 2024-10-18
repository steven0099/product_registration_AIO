<?php

namespace App\Controllers;

use App\Models\ProductModel;

class AdminController extends BaseController
{
    public function dashboard(): string
    {
        return view('admin/dashboard');
    }

    public function product()
    {
        // Check if the user has the required role (admin or superadmin)
        if (session()->get('role') !== 'admin' && session()->get('role') !== 'superadmin') {
            return redirect()->to('/no-access'); // Redirect if unauthorized
        }
    
        // Authorized users (admins and superadmins) proceed with fetching the data
        $product_model = new ProductModel();
    
        // Fetch products with joins to related tables (brands, categories, etc.)
        $data['products'] = $product_model->select('products.id, products.color, products.product_type, brands.name as brand_name, categories.name as category_name, subcategories.name as subcategory_name, capacities.value as capacity, compressor_warranties.value as compressor_warranty, sparepart_warranties.value as sparepart_warranty')
            ->join('brands', 'brands.id = products.brand_id')
            ->join('categories', 'categories.id = products.category_id')
            ->join('subcategories', 'subcategories.id = products.subcategory_id')
            ->join('capacities', 'capacities.id = products.capacity_id')
            ->join('compressor_warranties', 'compressor_warranties.id = products.compressor_warranty_id')
            ->join('sparepart_warranties', 'sparepart_warranties.id = products.sparepart_warranty_id')
            ->findAll();
    
        // Pass data to the view
        return view('admin/list_product', $data);
    }
}