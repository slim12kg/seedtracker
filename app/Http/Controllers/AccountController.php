<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function edit()
    {
        return view('account.edit');
    }

    public function editPassword()
    {
        return view('account.password');
    }
}