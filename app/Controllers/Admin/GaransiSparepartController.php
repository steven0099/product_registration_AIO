<?php
namespace App\Controllers\Admin;

use App\Models\SparepartwarrantyModel;
use App\Controllers\BaseController;

class GaransiSparepartController extends BaseController
{
    // Dashboard view
    public function index()
    {   
        $garansisparepartModel = new SparepartwarrantyModel();
        // Get the garansi_sparepart value from the session
        $data['garansi_sparepart'] = $garansisparepartModel->findAll();
    
        // Pass the garansi_sparepart value to the view
        return view('garansi_sparepart/garansi_sparepart', $data);
    }

    public function saveGaransiSparepart()
    {
    $garansisparepartModel = new SparepartwarrantyModel();

    $data = [
        'value' => $this->request->getPost('value'),
    ];
    if (!$garansisparepartModel->save($data)) {
        return redirect()->back()->with('error', 'Failed to add Sparepart Warranty.');
    }

    return redirect()->to('/admin/garansi_sparepart')->with('success', 'Sparepart Warranty added successfully.');
    }

    public function updateGaransiSparepart($id)
    {

        $garansisparepartModel = new SparepartwarrantyModel();

        $data = [
            'value' => $this->request->getPost('value'),
        ];
        // Update the GaransiSparepart  in the database
        if (!$garansisparepartModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Sparepart Warranty.');
        }

        return redirect()->to('/admin/garansi_sparepart')->with('success', 'Sparepart Warranty updated successfully.');
    }

    public function deleteGaransiSparepart($id)
    {
        $garansisparepartModel = new SparepartwarrantyModel();
        $garansisparepartModel->delete($id);
        return redirect()->to('/admin/garansi_sparepart');
    }
}