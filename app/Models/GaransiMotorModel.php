<?php

namespace App\Models;

use CodeIgniter\Model;

class GaransiMotorModel extends Model
{
    protected $table = 'garansi_motor';
    protected $allowedFields = ['value'];

    public function getGaransiValueById($id)
{
    return $this->where('id', $id)->first(); // Fetch the row by garansi_panel_id
}
}
