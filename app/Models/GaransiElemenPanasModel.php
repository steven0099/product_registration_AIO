<?php

namespace App\Models;

use CodeIgniter\Model;

class GaransiElemenPanasModel extends Model
{
    protected $table = 'garansi_elemen_panas';
    protected $allowedFields = ['value'];
}
