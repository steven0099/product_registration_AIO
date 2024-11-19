<?php
namespace App\Controllers\Admin;

use App\Models\GaransiMotorModel;
use App\Controllers\BaseController;

class GaransiMotorController extends BaseController
{
    // Dashboard view
    public function index()
    {   
        $garansimotorModel = new GaransiMotorModel();
        // Get the garansi_motor value from the session
        $data['garansi_motor'] = $garansimotorModel->findAll();
    
        // Pass the garansi_motor value to the view
        return view('garansi_motor/garansi_motor', $data);
    }

    public function saveGaransiMotor()
    {
    $garansimotorModel = new GaransiMotorModel();

    $data = [
        'value' => $this->request->getPost('value'),
    ];
    if (!$garansimotorModel->save($data)) {
        return redirect()->back()->with('error', 'Failed to add Motor Warranty.');
    }

    return redirect()->to('/admin/garansi_motor')->with('success', 'Motor Warranty added successfully.');
    }

    public function updateGaransiMotor($id)
    {

        $garansimotorModel = new GaransiMotorModel();

        $data = [
            'value' => $this->request->getPost('value'),
        ];
        // Update the GaransiMotor  in the database
        if (!$garansimotorModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Motor Warranty.');
        }

        return redirect()->to('/admin/garansi_motor')->with('success', 'Motor Warranty updated successfully.');
    }

    public function deleteGaransiMotor($id)
    {
        $garansimotorModel = new GaransiMotorModel();
        $garansimotorModel->delete($id);
        return redirect()->to('/admin/garansi_motor');
    }
}