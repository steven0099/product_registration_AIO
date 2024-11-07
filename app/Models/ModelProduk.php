<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama', 'kategori', 'subkategori', 'ukuran', 'gambar', 'deskripsi'];

    public function getProduk()
    {
        return $this->findAll();
    }

    // Tambahkan method lain untuk filtering jika diperlukan
}
