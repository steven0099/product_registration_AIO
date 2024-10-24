<?php
namespace App\Controllers\Admin;

use App\Models\CompressorwarrantyModel;
use App\Controllers\BaseController;

class GaransiKompresorController extends BaseController
{
    // Dashboard view
    public function index()
    {   
        $garansikompresorModel = new CompressorwarrantyModel();
        // Get the garansi_kompresor value from the session
        $data['garansi_kompresor'] = $garansikompresorModel->findAll();
    
        // Pass the garansi_kompresor value to the view
        return view('garansi_kompresor/garansi_kompresor', $data);
    }

    public function saveGaransiKompresor()
    {
    $garansikompresorModel = new CompressorwarrantyModel();

    $data = [
        'value' => $this->request->getPost('value'),
    ];
    if (!$garansikompresorModel->save($data)) {
        return redirect()->back()->with('error', 'Failed to add Compressor Warranty.');
    }

    return redirect()->to('/admin/garansi_kompresor')->with('success', 'Compressor Warranty added successfully.');
    }

    public function updateGaransiKompresor($id)
    {

        $garansikompresorModel = new CompressorwarrantyModel();

        $data = [
            'value' => $this->request->getPost('value'),
        ];
        // Update the GaransiKompresor  in the database
        if (!$garansikompresorModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Compressor Warranty.');
        }

        return redirect()->to('/admin/garansi_kompresor')->with('success', 'Compressor Warranty updated successfully.');
    }

    public function deleteGaransiKompresor($id)
    {
        $garansikompresorModel = new CompressorwarrantyModel();
        $garansikompresorModel->delete($id);
        return redirect()->to('/admin/garansi_kompresor');
    }
}