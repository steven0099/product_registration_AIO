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
        $selectedSubcategoryIds = [31,32,47,50,51]; 
    
        $data['subcategories'] = $this->subcategoryModel
            ->select('subcategories.*, categories.name AS category_name') // Select subcategory and category name
            ->join('categories', 'categories.id = subcategories.category_id') // Join with categories table
            ->groupStart()
                ->whereIn('category_id', $selectedCategoryIds)
                ->orWhereIn('subcategories.id', $selectedSubcategoryIds)
            ->groupEnd()
            ->findAll();
    
        // Fetch the capacities (no change here)
        $data['ukuran'] = $this->ukuranModel->getUkuranWithSubcategory();
    
        return view('ukuran/ukuran', $data);
    }

    public function saveUkuran()
    {
        $ukuranModel = new UkuranModel();
        
        // Validate input
        $this->validate([
            'size' => 'required',
            'subcategory_id' => 'required|is_not_unique[subcategories.id]', // Check if category_id exists
        ]);
    
        // Save subcategory with the category_id
        $data = [
            'size' => $this->request->getPost('size'),
            'subcategory_id' => $this->request->getPost('subcategory_id'), // Get category_id from the form
        ];
        
        
    $data['size'] = strtoupper($data['size']);
        $ukuranModel->save($data);
        
        return redirect()->to('/admin/ukuran');
    }

    public function updateUkuran($id)
    {
        $ukuranModel = new UkuranModel();
    
        // Validate input
        $this->validate([
            'size' => 'required',
            'subcategory_id' => 'required|is_not_unique[subcategories.id]', // Check if category_id exists
        ]);
    
        $data = [
            'size' => $this->request->getPost('size'),
            'subcategory_id' => $this->request->getPost('subcategory_id'), // Update category_id
        ];
    
        $data['size'] = strtoupper($data['size']);
        // Update the Subkategori in the database
        if (!$ukuranModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Subkategori.');
        }
    
        return redirect()->to('/admin/ukuran');
    }
    public function deleteUkuran($id)
    {
        $this->ukuranModel->delete($id);

        return redirect()->to('/admin/ukuran');
    }      
}