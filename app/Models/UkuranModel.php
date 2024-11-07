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

    public function getUkuranWithSubcategory()
    {
        return $this->select('ukuran_tv.*, ukuran_tv.id as ukuran_id, ukuran_tv.size as ukuran_size, subcategories.name as subcategory_name')
                    ->join('subcategories', 'subcategories.id = ukuran_tv.subcategory_id')
                    ->findAll();
    }
}