<?php

namespace App\Models;

use CodeIgniter\Model;

class SpecificationModel extends Model
{
    protected $table = 'product_specifications'; // The name of your products table
    protected $primaryKey = 'id'; // Primary key of the products table
    protected $allowedFields = [
        'product_id', 'produk_p', 'produk_l', 'produk_t', 
        'kemasan_p', 'kemasan_l', 'kemasan_t', 'berat',
        'daya', 'pembuat', 'created_at', 'updated_at'
    ];
}
