<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();
        
        // Verify the password
        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            $sessionData = [
                'id'       => $user['id'],
                'username' => $user['username'],
                'name' => $user['name'],
                'role'     => $user['role'], // admin, superadmin, or user
                'isLoggedIn' => true
            ];
            session()->set($sessionData);

            // Redirect based on role
            switch ($user['role']) {
                case 'superadmin':
                    return redirect()->to('/superadmin/dashboard');
                case 'admin':
                    return redirect()->to('/admin/dashboard');
                case 'user':
                    return redirect()->to('/product/step1');
                default:
                    return redirect()->to('/login')->with('error', 'Invalid role');
            }
        } else {
            // Invalid login
            return redirect()->back()->with('error', 'Invalid credentials')->withInput();
        }
    }
    public function resetPassword()
    {
        return view('reset_password');
    }
    
    public function updatePassword()
    {
        $current_password = $this->request->getPost('current_password');
        $new_password = $this->request->getPost('new_password');
        $confirm_password = $this->request->getPost('confirm_password');
    
        // Fetch user based on session ID
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('id')); 
    
        // Check if current password is correct
        if (!password_verify($current_password, $user['password'])) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }
    
        // Check if new passwords match
        if ($new_password !== $confirm_password) {
            return redirect()->back()->with('error', 'New passwords do not match.');
        }
    
        // Update the user's password in the database
        $userModel->update($user['id'], ['password' => password_hash($new_password, PASSWORD_DEFAULT)]);
    
        return redirect()->to('/')->with('success', 'Password successfully updated.');
    }
    
    public function noAccess()
{
    return view('errors/no-access');
}
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
