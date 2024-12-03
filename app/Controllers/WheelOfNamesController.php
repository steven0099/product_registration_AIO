<?php

namespace App\Controllers;

use App\Models\WheelOfNamesModel;

class WheelController extends BaseController
{
    public function createWheel()
    {
        $model = new WheelOfNamesModel();

        // Handle form submission and validation
        if ($this->request->getMethod() === 'post') {
            $name = $this->request->getPost('name');
            $entries = $this->request->getPost('entries');

            $wheelId = $model->createWheel($name, $entries);

            // Redirect to a success page or display a success message
            return redirect()->to('/wheel/' . $wheelId);
        }

        // Display the create wheel form
        return view('create_wheel');
    }

    public function editWheel($wheelId)
    {
        $model = new WheelOfNamesModel();

        // Fetch the wheel details from the database
        $wheelData = $model->find($wheelId);

        // Handle form submission and validation
        if ($this->request->getMethod() === 'post') {
            $name = $this->request->getPost('name');
            $entries = $this->request->getPost('entries');

            $model->updateWheel($wheelId, $name, $entries);

            // Redirect to the wheel details page or display a success message
            return redirect()->to('/wheel/' . $wheelId);
        }

        // Display the edit wheel form with pre-filled data
        return view('edit_wheel', ['wheelData' => $wheelData]);
    }

    public function deleteWheel($wheelId)
    {
        $model = new WheelOfNamesModel();

        // Delete the wheel from the database
        $model->delete($wheelId);

        // Delete the wheel from the Wheel of Names API (optional)
        // $model->deleteWheelFromApi($wheelId);

        // Redirect to a list of wheels or display a success message
        return redirect()->to('/wheels');
    }
}