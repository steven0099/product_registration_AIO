<?php

namespace App\Models;

use CodeIgniter\Model;

class WheelModel extends Model
{
    protected $table = 'wheel_segments';
    protected $primaryKey = 'id';

    protected $allowedFields = ['image','label', 'odds','stock'];
    protected $useTimestamps = true; // Enables `created_at` and `updated_at`

    // Fetch all segments
    public function getSegments()
    {
        return $this->findAll();
    }

    // In WheelModel.php


}
