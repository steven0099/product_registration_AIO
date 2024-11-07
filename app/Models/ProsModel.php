<?php

namespace App\Models;

use CodeIgniter\Model;

class ProsModel extends Model
{
    protected $table = 'product_advantages'; // The name of your products table
    protected $primaryKey = 'id'; // Primary key of the products table
    protected $allowedFields = [
        'product_id', 'advantage1', 'advantage2', 'advantage3', 
        'advantage4', 'advantage5', 'advantage6', 'created_at', 'updated_at'
    ];
}