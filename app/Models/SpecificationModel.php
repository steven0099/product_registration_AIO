<?php

namespace App\Models;

use CodeIgniter\Model;

class SpecificationModel extends Model
{
    protected $table = 'product_specifications'; // The name of your products table
    protected $primaryKey = 'id'; // Primary key of the products table
    protected $allowedFields = [
        'product_id', 'produk_p', 'produk_l', 'produk_t', 
        'kemasan_p', 'kemasan_l', 'kemasan_t',  'pstand_p', 'pstand_l',
        'pstand_t', 'berat', 'daya', 'pembuat', 'refrigrant_id',
        'cspf', 'cooling_capacity', 'resolusi_x', 'resolusi_y',
        'created_at', 'updated_at'
    ];

    public function getRefrigrantData($productId)
    {
        return $this->select('refrigrant_type.*, refrigrant_type.id as refrigrant_id, refrigrant_type.type as refrigrant_type')
        ->join('product_specifications', 'product_specifications.refrigrant_id = refrigrant_type.id')
        ->FindAll();
    }

}
