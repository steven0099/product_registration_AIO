<?php
namespace App\Controllers\Superadmin;

use App\Models\UserModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    // Dashboard view
    public function index()
    {   
        $userModel = new UserModel();
        // Get the brand code from the session
        $data['user'] = $userModel->findAll();
    
        // Pass the brand code to the view
        return view('user/manage_user', $data);
    }

    public function addUser()
    {   
        return view('user/add_user');
    }

    public function saveUser()
    {
        // Get the request data
        $data = $this->request->getPost();

        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'    => 'required|max_length[255]',
            'username' => 'required|min_length[3]|max_length[255]',
            'email'    => 'required|valid_email|max_length[255]',
            'brand'    => 'required|max_length[255]',
            'address'    => 'required|max_length[255]',
            'phone'    => 'required|max_length[255]',
            'password' => 'required|min_length[6]',
            'password-confirm'  => 'required|matches[password]',
            'role'     => 'required|in_list[admin,user]',  // Restrict to 'admin' and 'user'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // If validation fails, return to the form with errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Hash the password
        $passwordHash = password_hash($data['password'], PASSWORD_BCRYPT);

        // Save user data to the database
        $userModel = new UserModel();
        $userModel->insert([
            'name' => $data['name'],
            'brand' => $data['brand'],
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => $passwordHash,
            'address' => $data['address'],
            'phone' => $data['phone'],
            'role'     => $data['role'],  // 'admin' or 'user'
        ]);
                // Redirect to the user list or a success page
                return redirect()->to('superadmin/user')->with('success', 'User created successfully');
}
}