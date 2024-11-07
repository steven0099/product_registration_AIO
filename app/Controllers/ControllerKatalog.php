<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Katalog extends BaseController
{
    public function index()
    {
        $model = new ProdukModel();
        $data['produk'] = $model->getProduk();

        return view('katalog', $data);
    }
}
