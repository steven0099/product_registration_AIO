<?php
namespace App\Controllers\Admin;

use App\Models\GaransiSemuaServiceModel;
use App\Controllers\BaseController;

class GaransiServiceController extends BaseController
{
    // Dashboard view
    public function index()
    {   
        $garansiserviceModel = new GaransiSemuaServiceModel();
        // Get the garansi_motor value from the session
        $data['garansi_service'] = $garansiserviceModel->findAll();
    
        // Pass the garansi_motor value to the view
        return view('garansi_service/garansi_semua_service', $data);
    }

    public function saveGaransiService()
    {
    $garansiserviceModel = new GaransiSemuaServiceModel();

    $data = [
        'value' => $this->request->getPost('value'),
    ];
    if (!$garansiserviceModel->save($data)) {
        return redirect()->back()->with('error', 'Failed to add Service Warranty.');
    }

    return redirect()->to('/admin/garansi_service')->with('success', 'Service Warranty added successfully.');
    }

    public function updateGaransiService($id)
    {

        $garansiserviceModel = new GaransiSemuaServiceModel();

        $data = [
            'value' => $this->request->getPost('value'),
        ];
        // Update the GaransiMotor  in the database
        if (!$garansiserviceModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Service Warranty.');
        }

        return redirect()->to('/admin/garansi_service')->with('success', 'Service Warranty updated successfully.');
    }

    public function deleteGaransiService($id)
    {
        $garansiserviceModel = new GaransiSemuaServiceModel();
        $garansiserrviceModel->delete($id);
        return redirect()->to('/admin/garansi_service');
    }
}