<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadsModel extends Model
{
    protected $table = 'product_uploads';
    protected $primaryKey = 'id';
    
    // Sesuaikan dengan field pada tabel gambar
    protected $allowedFields = [
        'gambar_depan',
        'gambar_belakang',
        'gambar_atas',
        'gambar_bawah',
        'gambar_samping_kiri',
        'gambar_samping_kanan',
        'video_produk',
    ];
}
