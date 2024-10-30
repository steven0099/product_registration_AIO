<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ConfirmationModel;

class SuperadminController extends BaseController
{
    public function dashboard(): string
    {
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/no-access'); // Redirect if unauthorized
        }
        // Authorized users (admins and superadmins) proceed with fetching the data
        $confirmation_model = new ConfirmationModel();
    
        // Fetch records where the status is either "confirmed", "rejected", or "approved"
        $data['all_products'] = $confirmation_model->whereIn('status', ['confirmed', 'rejected', 'approved'])->findAll();
    
        // Pass data to the view
        return view('admin/dashboard', $data);
    }

    public function product()
    {
        // Check if the user has the required role (admin or superadmin)
        if (session()->get('role') !== 'superadmin') {
            return redirect()->to('/no-access'); // Redirect if unauthorized
        }
    
    // Authorized users (admins and superadmins) proceed with fetching the data
    $confirmation_model = new ConfirmationModel();

    // Fetch only records where status is "confirmed"
    $data['confirmed_products'] = $confirmation_model->where('status', 'confirmed')->findAll();

        // Pass data to the view
        return view('superadmin/list_product', $data);
    }
}