<?php
namespace App\Controllers\Admin;

use App\Models\CapacityModel;
use App\Controllers\BaseController;

class KapasitasController extends BaseController
{
    // Dashboard view
    public function index()
    {   
        $kapasitasModel = new CapacityModel();
        // Get the kapasitas value from the session
        $data['kapasitas'] = $kapasitasModel->findAll();
    
        // Pass the kapasitas value to the view
        return view('kapasitas/kapasitas', $data);
    }

    public function addKapasitas()
    {
        $data['title'] = "Add Kapasitas";
        return view('kapasitas/add_kapasitas',$data);
    }

    public function saveKapasitas()
    {
    $kapasitasModel = new CapacityModel();

    $data = [
        'value' => $this->request->getPost('value'),
    ];
    if (!$kapasitasModel->save($data)) {
        return redirect()->back()->with('error', 'Failed to add Capacity.');
    }

    return redirect()->to('/admin/kapasitas')->with('success', 'Capacity added successfully.');
    }

    public function editKapasitas($id)
    {
        $kapasitasModel = new CapacityModel();
        $data['capacity'] = $kapasitasModel->find($id);
        $data['title'] = "Edit Kapasitas";

        if (!$data['capacity']) {
            return redirect()->to('/admin/kapasitas')->with('error', 'Kapasitas  not found.');
        }

        return view('kapasitas/edit_Kapasitas', $data);
    }

    public function updateKapasitas($id)
    {

        $kapasitasModel = new CapacityModel();

        $data = [
            'value' => $this->request->getPost('value'),
        ];
        // Update the Kapasitas  in the database
        if (!$kapasitasModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Kapasitas.');
        }

        return redirect()->to('/admin/kapasitas')->with('success', 'Kapasitas  updated successfully.');
    }

    public function deleteKapasitas($id)
    {
        $kapasitasModel = new CapacityModel();
        $kapasitasModel->delete($id);
        return redirect()->to('/admin/kapasitas');
    }
}