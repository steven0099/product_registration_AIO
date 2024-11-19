<?php
namespace App\Controllers\Admin;

use App\Models\CapacityModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Controllers\BaseController;

class KapasitasController extends BaseController
{
    protected $capacityModel;
    protected $categoryModel;
    protected $subcategoryModel;

    public function __construct()
    {
        $this->capacityModel = new CapacityModel();
        $this->subcategoryModel = new SubcategoryModel();
        $this->categoryModel = new CategoryModel();
    }
    // Dashboard view
    public function index()
    {
        $selectedCategoryIds = [3, 4, 5, 6, 7];
        $selectedSubcategoryIds = [33, 34, 37, 38, 41, 43, 44, 45, 46, 48, 49, 53, 54];
    
        // Modify the query to include category name
        $data['subcategories'] = $this->subcategoryModel
            ->select('subcategories.*, categories.name AS category_name') // Select subcategory and category name
            ->join('categories', 'categories.id = subcategories.category_id') // Join with categories table
            ->groupStart()
                ->whereIn('category_id', $selectedCategoryIds)
                ->orWhereIn('subcategories.id', $selectedSubcategoryIds)
            ->groupEnd()
            ->findAll();
    
        // Fetch the capacities (no change here)
        $data['kapasitas'] = $this->capacityModel->getCapacitiesWithSubcategory();
    
        return view('kapasitas/kapasitas', $data);
    }
    

    public function saveKapasitas()
    {
        $capacityModel = new CapacityModel();
        
        // Validate input
        $this->validate([
            'value' => 'required',
            'subcategory_id' => 'required|is_not_unique[subcategories.id]', // Check if category_id exists
        ]);
    
        // Save subcategory with the category_id
        $data = [
            'value' => $this->request->getPost('value'),
            'subcategory_id' => $this->request->getPost('subcategory_id'), // Get category_id from the form
        ];
        
        
    $data['value'] = strtoupper($data['value']);
        $capacityModel->save($data);
        
        return redirect()->to('/admin/kapasitas');
    }

    public function updateKapasitas($id)
    {
        $capacityModel = new CapacityModel();
    
        // Validate input
        $this->validate([
            'value' => 'required',
            'subcategory_id' => 'required|is_not_unique[subcategories.id]', // Check if category_id exists
        ]);
    
        $data = [
            'value' => $this->request->getPost('value'),
            'subcategory_id' => $this->request->getPost('subcategory_id'), // Update category_id
        ];
    
        $data['value'] = strtoupper($data['value']);
        // Update the Subkategori in the database
        if (!$capacityModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Subkategori.');
        }
    
        return redirect()->to('/admin/kapasitas');
    }

    public function deleteKapasitas($id)
    {
        $this->capacityModel->delete($id);

        return redirect()->to('/admin/kapasitas');
    }

     
}