<?php
namespace App\Controllers\Admin;

use App\Models\RefrigrantModel;
use App\Controllers\BaseController;

class RefrigrantController extends BaseController
{
    // Dashboard view
    public function index()
    {   
        $refrigrantModel = new RefrigrantModel();
        // Get the kategori code from the session
        $data['refrigrant'] = $refrigrantModel->findAll();
    
        // Pass the kategori code to the view
        return view('refrigrant/refrigrant_type', $data);
    }

    public function saveRefrigrant()
    {
    $refrigrantModel = new RefrigrantModel();

    $data = [
        'type' => $this->request->getPost('type'),
    ];
    if (!$refrigrantModel->save($data)) {
        return redirect()->back()->with('error', 'Failed to add Refrigrant Type.');
    }

    return redirect()->to('/admin/refrigrant')->with('success', 'Refrigrant Type added successfully.');
    }

    public function updateRefrigrant($id)
    {

        $refrigrantModel = new RefrigrantModel();

        $data = [
            'type' => $this->request->getPost('type'),
        ];
        // Update the Kategori  in the database
        if (!$kategoriModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Failed to update Refrigrant Type.');
        }

        return redirect()->to('/admin/refrigrant')->with('success', 'Refrigrant updated successfully.');
    }

    public function deleteRefrigrant($id)
    {
        $refrigrantModel = new RefrigrantModel();
        $refrigrantModel->delete($id);
        return redirect()->to('/admin/refrigrant');
    }
}