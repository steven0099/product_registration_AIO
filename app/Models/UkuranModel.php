<?php

namespace App\Models;

use CodeIgniter\Model;

class UkuranModel extends Model
{
    protected $table = 'ukuran_tv'; // The name of your products table
    protected $primaryKey = 'id'; // Primary key of the products table
    protected $allowedFields = ['size', 'subcategory_id'];

    public function getBySubcategory($subcategoryId)
    {
        return $this->where('subcategory_id', $subcategoryId)->findAll();
    }
}