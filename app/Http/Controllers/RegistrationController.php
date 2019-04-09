<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function company()
    {
        $registration = auth()->user()->registration;

        return view('registration-form',compact('registration'));
    }
}