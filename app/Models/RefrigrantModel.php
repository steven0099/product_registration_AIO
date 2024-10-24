<?php

namespace App\Models;

use CodeIgniter\Model;

class RefrigrantModel extends Model
{
    protected $table = 'refrigrant_type';
    protected $allowedFields = ['code', 'type'];
}