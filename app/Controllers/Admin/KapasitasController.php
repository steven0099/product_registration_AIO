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
        $data['kapasitas'] = $this->capacityModel->getCapacitiesBySubcategory();
        $data['subcategories'] = $this->subcategoryModel->findAll();

        return view('kapasitas/kapasitas', $data);
    }

    public function addKapasitas()
    {
        $data['title'] = "Add Kapasitas";
        return view('kapasitas/add_kapasitas',$data);
    }

    public function saveKapasitas()
    {
        $this->capacityModel->save([
            'value' => $this->request->getPost('value'),
            'subcategory_id' => $this->request->getPost('subcategory_id')
        ]);

        return redirect()->to('/admin/kapasitas');
    }

    public function editKapasitas($id)
    {
        $capacityModel = new CapacityModel();
        $data['capacity'] = $capacityModel->find($id);
        $data['title'] = "Edit Kapasitas";

        if (!$data['capacity']) {
            return redirect()->to('/admin/kapasitas')->with('error', 'Kapasitas  not found.');
        }

        return view('kapasitas/edit_Kapasitas', $data);
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

    public function getCapacitiesBySubcategory($subcategoryId)
    {
        $capacityModel = new CapacityModel();

        // Fetch capacities based on subcategory_id
        $capacities = $capacityModel->where('subcategory_id', $subcategoryId)->findAll();

        // Return capacities in JSON format
        return $this->response->setJSON($capacities);
    }

    
     // Fetch Ukuran TV data
     public function getCapacities($subcategoryId) {
        try {
            $this->capacityModel = new \App\Models\CapacityModel();
            
            // Fetch capacities based on the subcategory ID
            $capacities = $this->capacityModel->getCapacitiesBySubcategory($subcategoryId);
    
            return $this->response->setJSON($capacities);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => 'An error occurred: ' . $e->getMessage()])->setStatusCode(500);
        }
    }    
     
}