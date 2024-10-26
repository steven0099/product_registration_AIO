<?php

namespace App\Controllers;

use App\Models\ConfirmationModel;

class AdminController extends BaseController
{
    public function dashboard(): string
    {
        return view('admin/dashboard');
    }

    public function product()
    {
        // Check if the user has the required role (admin or superadmin)
        if (session()->get('role') !== 'admin' && session()->get('role') !== 'superadmin') {
            return redirect()->to('/no-access'); // Redirect if unauthorized
        }
    
    // Authorized users (admins and superadmins) proceed with fetching the data
    $confirmation_model = new ConfirmationModel();

    // Fetch only records where status is "confirmed"
    $data['confirmed_products'] = $confirmation_model->where('status', 'confirmed')->findAll();

        // Pass data to the view
        return view('admin/list_product', $data);
    }
}