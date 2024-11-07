<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'category', 'subcategory', 'type', 'capacity', 'power_consumption',
        'cooling_capacity', 'product_dimensions', 'package_dimensions', 'weight', 'refrigerant_type', 'gambar_depan'
    ];

    // Method untuk mendapatkan produk berikutnya berdasarkan ID
    public function getNextProduct($currentId)
    {
        return $this->where('id >', $currentId)->orderBy('id', 'ASC')->first();
    }
}