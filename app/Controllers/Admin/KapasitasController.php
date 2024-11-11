<?php
namespace App\Controllers\Admin;

use App\Models\CapacityModel;
use App\Models\SubcategoryModel;
use App\Controllers\BaseController;

class KapasitasController extends BaseController
{
    protected $capacityModel;
    protected $subcategoryModel;

    public function __construct()
    {
        $this->capacityModel = new CapacityModel();
        $this->subcategoryModel = new SubcategoryModel();
    }
    // Dashboard view
    public function index()
    {
        // Define the list of category IDs and subcategory IDs you want to fetch
        $selectedCategoryIds = [3, 4, 5, 6, 7, 8]; 
        $selectedSubcategoryIds = [37, 38]; 
    
        $data['subcategories'] = $this->subcategoryModel
        ->groupStart() // Start a grouped condition
            ->whereIn('category_id', $selectedCategoryIds) // Condition 1: category IDs
            ->orWhereIn('id', $selectedSubcategoryIds) // OR Condition 2: subcategory IDs
        ->groupEnd() // End the grouped condition
        ->findAll();
    
        // Fetch the capacities (no change here)
        $data['kapasitas'] = $this->capacityModel->getCapacitiesWithSubcategory();
    
        return view('kapasitas/kapasitas', $data);
    }
    

    public function saveKapasitas()
    {
        $this->capacityModel->save([
            'value' => $this->request->getPost('value'),
            'subcategory_id' => $this->request->getPost('subcategory_id')
        ]);

        return redirect()->to('/admin/kapasitas');
    }

    public function updateKapasitas($id)
    {
        $this->capacityModel->update($id, [
            'value' => $this->request->getPost('value'),
            'subcategory_id' => $this->request->getPost('subcategory_id')
        ]);
        
        return redirect()->to('/admin/kapasitas');
    }

    public function deleteKapasitas($id)
    {
        $this->capacityModel->delete($id);

        return redirect()->to('/admin/kapasitas');
    }

     
}