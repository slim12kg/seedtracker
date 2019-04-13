<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','activated'])->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @param Registration $registration
     * @return \Illuminate\Http\Response
     */
    public function index(Registration $registration)
    {
        $pending = $registration->where('application_status','pending')->whereHas('applicant',function($q){
            $q->where('registered',true);
        })->count();

        return view('home',compact('pending'));
    }

    public function about()
    {
        return view('about');
    }

    public function faq()
    {
        return view('faq');
    }

    public function contact()
    {
        return view('contact');
    }
}
