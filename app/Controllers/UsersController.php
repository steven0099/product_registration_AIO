<?php

namespace App\Controllers;

class UsersController extends BaseController
{
    public function step1(): string
    {
        return view('product/step1');
    }
}