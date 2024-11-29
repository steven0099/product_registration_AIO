<?php

namespace App\Models;

use CodeIgniter\Model;

class GaransiPanelModel extends Model
{
    protected $table = 'garansi_panel';
    protected $allowedFields = ['value'];

    // In GaransiModel.php
public function getGaransiValueById($id)
{
    return $this->where('id', $id)->first(); // Fetch the row by garansi_panel_id
}

}

