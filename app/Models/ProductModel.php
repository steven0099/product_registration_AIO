<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products'; // The name of your products table
    protected $primaryKey = 'id'; // Primary key of the products table

    // Specify which fields are allowed to be inserted or updated
    protected $allowedFields = [
        'brand_id',
        'category_id',
        'subcategory_id',
        'capacity_id',
        'compressor_warranty_id',
        'sparepart_warranty_id',
        'color',
        'product_type'
    ];

    // Optional: Use timestamps if your table has 'created_at' and 'updated_at' columns
    protected $useTimestamps = true;

    public function getProductData($productId)
    {
        return $this->select('products.*, brands.name as brand, categories.name as category, subcategories.name as subcategory, capacities.value as capacity, compressor_warranties.value as compressor_warranty, sparepart_warranties.value as sparepart_warranty')
            ->join('brands', 'products.brand_id = brands.id')
            ->join('categories', 'products.category_id = categories.id')
            ->join('subcategories', 'products.subcategory_id = subcategories.id')
            ->join('capacities', 'products.capacity_id = capacities.id')
            ->join('compressor_warranties', 'compressor_warranties.id = products.compressor_warranty_id', 'left')
            ->join('sparepart_warranties', 'sparepart_warranties.id = products.sparepart_warranty_id', 'left')
            ->where('products.id', $productId)
            ->get() // Use `get()` to fetch the data
            ->getRowArray(); // Use `getRowArray()` to return a single row as an array
    }

    public function saveProductSubmission($data)
{
    $this->db->table('product_submissions')->insert($data);
}

}
