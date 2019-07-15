<?php

namespace App\Http\Controllers;

use App\Mail\UpdateFromNASC;
use Facades\App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommunicationController extends Controller
{
    public function mailApplicant(Request $request)
    {
        $applicant = $request->get('name');
        $subject = $request->get('subject');
        $message = $request->get('message');
        $email = $request->get('email');

        Mail::to($email)->send(new UpdateFromNASC($applicant,$subject,$message));

        $name = auth()->user()->name;

        Log::add("$name sent an email to $email");

        return back()->with('notification',"Your email to $applicant was successfully delivered!");
    }
}