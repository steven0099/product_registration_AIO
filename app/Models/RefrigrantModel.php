<?php

namespace App\Models;

use CodeIgniter\Model;

class RefrigrantModel extends Model
{
    protected $table = 'refrigrant_type';
    protected $allowedFields = ['code', 'type'];


public function getRefrigrantData($productId)
{
    return $this->select('refrigrant_type.*, refrigrant_type.id as refrigrant_id, refrigrant_type.type as refrigrant_type')
    ->join('product_specifications', 'product_specifications.refrigrant_id = refrigrant_type.id')
    ->FindAll();
}
}