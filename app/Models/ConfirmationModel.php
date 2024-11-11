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
        'advantage2', 'advantage3','advantage4', 'advantage5', 'advantage6', 'garansi_motor', 'garansi_semua_service', 'harga',
        'status', 'submitted_by', 'confirmed_at', 'approved_at', 'rejected_at', 'kapasitas_air_panas', 'kapasitas_air_dingin'
    ];
    
    public function getRelatedProducts($category, $capacity, $ukuran, $excludeId = null)
    {
        $builder = $this->db->table('product_submissions'); // Assuming the table is called 'products'
        
        // Build the query based on category and capacity/ukuran
        $builder->where('category', $category);
        $builder->where('capacity', $capacity);
        $builder->where('ukuran', $ukuran);
        
        // If the category is 'SMALL APPLIANCES', also filter by subcategory
        if ($category == 'SMALL APPLIANCES') {
            $builder->where('subcategory', $category); // Match products within the same subcategory
        }
        
        // Exclude the current product
        if ($excludeId) {
            $builder->where('id !=', $excludeId);
        }
        
        // Fetch the related products
        return $builder->get()->getResultArray();
    }
    
    public function getRelatedProductsBySubcategoryOnly($subcategory, $excludeId = null)
    {
        $builder = $this->db->table('product_submissions'); // Assuming the table is 'products'
        
        // Filter by subcategory only (ignoring kapasitas and ukuran)
        $builder->where('subcategory', $subcategory);
        
        // Exclude the current product by its ID
        if ($excludeId) {
            $builder->where('id !=', $excludeId); // Exclude the product with the same ID
        }
        
        // Fetch the related products
        return $builder->get()->getResultArray();
    }
    

    
    
    
    
    
}
