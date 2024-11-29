<?php

namespace App\Models;

use CodeIgniter\Model;

class GaransiElemenPanasModel extends Model
{
    protected $table = 'garansi_elemen_panas';
    protected $allowedFields = ['value'];

    public function getGaransiValueById($id)
{
    return $this->where('id', $id)->first(); // Fetch the row by garansi_panel_id
}
}
