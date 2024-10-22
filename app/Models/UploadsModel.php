<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadsModel extends Model
{
    protected $table = 'product_uploads';
    protected $primaryKey = 'id';
    
    // Sesuaikan dengan field pada tabel gambar
    protected $allowedFields = [
        'gambar_utama',
        'gambar_samping_kiri',
        'gambar_samping_kanan',
        'video_produk',
    ];
}
