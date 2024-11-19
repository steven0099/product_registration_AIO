<?php
namespace App\Controllers\Admin;

use App\Models\GaransiPanelModel;
use App\Controllers\BaseController;

class GaransiPanelController extends BaseController
{
    // Dashboard view
    public function index()
    {   
        $garansipanelModel = new GaransiPanelModel();
        // Get the garansi_panel value from the session
        $data['garansi_panel'] = $garansipanelModel->findAll();
    
        // Pass the garansi_panel value to the view
        return view('garansi_panel/garansi_panel', $data);
    }

    public function saveGaransiPanel()
    {
    $garansipanelModel = new GaransiPanelModel();

    $data = [
        'value' => $this->request->getPost('value'),
    ];
    if (!$garansipanelModel->save($data)) {
        return redirect()->back()->with('error', 'Failed to add Panel Warranty.');
    }

    return redirect()->to('/admin/garansi_panel')->with('success', 'Panel Warranty added successfully.');
    }

    public function updateGaransiPanel($id)
    {

        $garansipanelModel = new GaransiPanelModel();

        $data = [
            'value' => $this->request->getPost('value'),
        ];
        // Update the GaransiPanel  in the database
        if (!$garansipanelModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Panel Warranty.');
        }

        return redirect()->to('/admin/garansi_panel')->with('success', 'Panel Warranty updated successfully.');
    }

    public function deleteGaransiPanel($id)
    {
        $garansipanelModel = new GaransiPanelModel();
        $garansipanelModel->delete($id);
        return redirect()->to('/admin/garansi_panel');
    }
}