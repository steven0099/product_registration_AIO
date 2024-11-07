<?php

namespace App\Controllers;

use App\Models\ProductModel;

class BarangController extends BaseController
{
    public function detail($id)
    {
        $model = new ProductModel();
        $data['barang'] = $model->find($id);

        return view('barang/detail', $data);
    }
}
