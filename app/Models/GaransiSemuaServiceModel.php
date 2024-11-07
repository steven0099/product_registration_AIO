<?php

namespace App\Models;

use CodeIgniter\Model;

class GaransiSemuaServiceModel extends Model
{
    protected $table = 'garansi_semua_service';
    protected $primaryKey = 'id';
    protected $allowedFields = ['value'];
}
