<?php
namespace App\Controllers\Admin;

use App\Models\UkuranModel;
use App\Models\SubcategoryModel;
use App\Controllers\BaseController;

class UkuranController extends BaseController
{
    protected $ukuranModel;
    protected $subcategoryModel;

    public function __construct()
    {
        $this->ukuranModel = new UkuranModel();
        $this->subcategoryModel = new SubcategoryModel();
    }
    // Dashboard view
    public function index()
    {
        $data['ukuran'] = $this->ukuranModel->getUkuranWithSubcategory();
        $data['subcategories'] = $this->subcategoryModel->findAll();

        return view('ukuran/ukuran', $data);
    }

    public function saveUkuran()
    {
        $this->ukuranModel->save([
            'size' => $this->request->getPost('size'),
            'subcategory_id' => $this->request->getPost('subcategory_id')
        ]);

        return redirect()->to('/admin/ukuran');
    }

    public function updateUkuran($id)
    {
        $this->ukuranModel->update($id, [
            'size' => $this->request->getPost('size'),
            'subcategory_id' => $this->request->getPost('subcategory_id')
        ]);

        return redirect()->to('/admin/ukuran');
    }

    public function deleteUkuran($id)
    {
        $this->ukuranModel->delete($id);

        return redirect()->to('/admin/ukuran');
    }      
}