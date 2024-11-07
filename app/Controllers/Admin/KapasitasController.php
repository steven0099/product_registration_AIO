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
        $data['kapasitas'] = $this->capacityModel->getCapacitiesWithSubcategory();
        $data['subcategories'] = $this->subcategoryModel->findAll();

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

    public function getCapacitiesBySubcategory($subcategoryId)
    {
        $capacityModel = new CapacityModel();

        // Fetch capacities based on subcategory_id
        $capacities = $capacityModel->where('subcategory_id', $subcategoryId)->findAll();

        // Return capacities in JSON format
        return $this->response->setJSON($capacities);
    }
     
}