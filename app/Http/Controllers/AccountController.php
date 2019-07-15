<?php

namespace App\Http\Controllers;


use App\AccountActivation;
use App\Http\Middleware\ActivateAccount;
use App\Http\Requests\updateAccount;
use App\Http\Requests\updatePassword;
use Facades\App\Log;
use App\Registration;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;


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

    public function update(updateAccount $updateAccount)
    {
        $data = $updateAccount->only(['firstname', 'lastname','email','phone','gender','profession']);

        if($updateAccount->hasFile('profile_image')){
            $ext = $updateAccount->file('profile_image')->getClientOriginalExtension();
            $imageName = md5(auth()->user()->email . time()) .'.'. $ext;

            $profileImg = $updateAccount->file('profile_image')
                ->storeAs('',$imageName,['disk' => 'profile']);

            $data['profile_image'] = 'storage/profile/'.$profileImg;
        }

        auth()->user()->update($data);

        $name = auth()->user()->name;

        Log::add("$name updated account profile");

        return back()->with('notification','Your profile was successfully updated');
    }

    public function updatePassword(updatePassword $updatePassword)
    {
        auth()->user()->update(['password' => bcrypt($updatePassword->get('password'))]);

        $name = auth()->user()->name;

        Log::add("$name updated account password");

        return back()->with('notification','Your password was successfully updated');
    }

    public function activate($token,AccountActivation $accountActivation)
    {
        $account = $accountActivation->where('token',$token)->first();

        if(!$account) abort(404);

        $account->update(['verified' => 1]);

        $name = $account->applicant->name;
        $type = $account->applicant->user_type;

        Log::add("$name activated account on NST as a $type");

        return redirect()->route('login')
            ->with('error','Account successfully activated, provide your login details to continue');
    }

    public function verifyCertificate($certificateId, Registration $registration)
    {
        $applicant = $registration->where('application_status','approved')->where('certificate_id',$certificateId)->first();

        if(!$applicant) abort('404');

        $data = ['registration' => $applicant];
        $orgName = $applicant->business_name;

        return PDF::loadView('certificate', $data)
            ->setPaper('a4', 'landscape')
            ->setWarnings(false)
            ->stream("$orgName.pdf");
    }
}