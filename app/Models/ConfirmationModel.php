<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfirmationModel extends Model
{
    protected $table = 'product_submissions';  // Table name for final submissions
    protected $primaryKey = 'id';  // Define the primary key for the table

    protected $allowedFields = [
        'product_id', 'brand', 'category', 'subcategory', 'product_type', 'color',
        'capacity', 'daya', 'product_dimensions', 'packaging_dimensions', 'berat', 'pembuat',
        'refrigerant_type', 'compressor_warranty', 'sparepart_warranty', 'cspf_rating',
        'gambar_utama', 'gambar_samping_kiri', 'gambar_samping_kanan', 'video_produk',
        'status', 'submitted_by', 'confirmed_at'
    ];

    // Optionally, you can define any validation rules here
}
