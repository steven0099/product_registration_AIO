<?php

namespace App\Models;

use CodeIgniter\Model;

class WheelFXModel extends Model
{
    protected $table = 'wheel_effects';
    protected $primaryKey = 'id';
    
    // Sesuaikan dengan field pada tabel gambar
    protected $allowedFields = [
        'spin_sfx', 'prize_sfx', 'jackpot_vid', 'jackpot_bg'
    ];
}
