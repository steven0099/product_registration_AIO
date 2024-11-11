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
        // Define the list of category IDs and subcategory IDs you want to fetch
        $selectedCategoryIds = [9]; 
        $selectedSubcategoryIds = [31,32]; 
    
        $data['subcategories'] = $this->subcategoryModel
        ->groupStart() // Start a grouped condition
            ->whereIn('category_id', $selectedCategoryIds) // Condition 1: category IDs
            ->orWhereIn('id', $selectedSubcategoryIds) // OR Condition 2: subcategory IDs
        ->groupEnd() // End the grouped condition
        ->findAll();
    
        // Fetch the capacities (no change here)
        $data['ukuran'] = $this->ukuranModel->getUkuranWithSubcategory();
    
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