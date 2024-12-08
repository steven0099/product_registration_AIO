<?php

namespace App\Models;

use CodeIgniter\Model;

class CompressorwarrantyModel extends Model
{
    protected $table = 'compressor_warranties';
    protected $allowedFields = ['value'];

    public function getGaransiValueById($id)
{
    return $this->where('id', $id)->first(); // Fetch the row by garansi_panel_id
}
}
