<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfirmationModel extends Model
{
    protected $table = 'product_submissions';  // Table name for final submissions
    protected $primaryKey = 'id';  // Define the primary key for the table

    protected $allowedFields = [
        'product_id', 'brand', 'category', 'subcategory', 'product_type', 'color',
        'capacity', 'ukuran', 'daya', 'panel_resolution', 'product_dimensions', 'packaging_dimensions', 'berat', 'pembuat',
        'refrigrant', 'compressor_warranty', 'sparepart_warranty', 'cspf', 'pstand_dimensions',
        'gambar_depan', 'gambar_belakang', 'gambar_atas', 'gambar_bawah', 'cooling_capacity', 'garansi_panel',
        'gambar_samping_kiri', 'gambar_samping_kanan', 'video_produk', 'advantage1', 'garansi_elemen_panas',
        'advantage2', 'advantage3','advantage4', 'advantage5', 'advantage6', 'garansi_motor', 'garansi_semua_service',
        'status', 'submitted_by', 'confirmed_at', 'approved_at', 'rejected_at', 'kapasitas_air_panas', 'kapasitas_air_dingin'
    ];
    
    public function getRelatedProducts($category, $capacity, $ukuran, $excludeId) {
        $query = $this->db->table('product_submissions')
                          ->where('category', $category)
                          ->where('status', 'approved')
                          ->where('id !=', $excludeId)  // Exclude the current product
                          ->limit(8);                   // Limit to 8 products
    
        // Apply both capacity and ukuran conditions if they are set
        if ($capacity && $ukuran) {
            $query->groupStart() // Start a grouped condition
                  ->where('capacity', $capacity)
                  ->where('ukuran', $ukuran)
                  ->groupEnd(); // End the grouped condition
        } elseif ($capacity) {
            // Only filter by capacity if ukuran is not set
            $query->where('capacity', $capacity);
        } elseif ($ukuran) {
            // Only filter by ukuran if capacity is not set
            $query->where('ukuran', $ukuran);
        }
    
        return $query->get()->getResultArray();
    }
    
    
    
    
    
    
}
