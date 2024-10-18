<?php

namespace App\Controllers;

class SuperadminController extends BaseController
{
    public function dashboard(): string
    {
        return view('superadmin/dashboard');
    }
}