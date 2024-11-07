<?php
namespace App\Controllers\Admin;

use App\Models\GaransiElemenPanasModel;
use App\Controllers\BaseController;

class GaransiElemenPanasController extends BaseController
{
    // Dashboard view
    public function index()
    {   
        $garansiEPModel = new GaransiElemenPanasModel();
        // Get the garansi_elemen_panas value from the session
        $data['garansi_elemen_panas'] = $garansiEPModel->findAll();
    
        // Pass the garansi_elemen_panas value to the view
        return view('garansi_elemen_panas/garansi_elemen_panas', $data);
    }

    public function saveGaransiElemenPanas()
    {
    $garansiEPModel = new GaransiElemenPanasModel();

    $data = [
        'value' => $this->request->getPost('value'),
    ];
    if (!$garansiEPModel->save($data)) {
        return redirect()->back()->with('error', 'Failed to add Elemen Panas Warranty.');
    }

    return redirect()->to('/admin/garansi_elemen_panas')->with('success', 'Elemen Panas Warranty added successfully.');
    }

    public function updateGaransiElemenPanas($id)
    {

        $garansiEPModel = new GaransiElemenPanasModel();

        $data = [
            'value' => $this->request->getPost('value'),
        ];
        // Update the GaransiElemenPanas  in the database
        if (!$garansiEPModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update ElemenPanas Warranty.');
        }

        return redirect()->to('/admin/garansi_elemen_panas')->with('success', 'ElemenPanas Warranty updated successfully.');
    }

    public function deleteGaransiElemenPanas($id)
    {
        $garansiEPModel = new GaransiElemenPanasModel();
        $garansiEPModel->delete($id);
        return redirect()->to('/admin/garansi_elemen_panas');
    }
}