<?php

namespace App\Http\Controllers;


use App\AccountActivation;
use App\Http\Middleware\ActivateAccount;
use App\Http\Requests\updateAccount;
use App\Http\Requests\updatePassword;
use App\User;

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

            $data['profile_image'] = 'public/profile/'.$profileImg;
        }

        auth()->user()->update($data);

        return back()->with('notification','Your profile was successfully updated');
    }

    public function updatePassword(updatePassword $updatePassword)
    {
        auth()->user()->update(['password' => bcrypt($updatePassword->get('password'))]);

        return back()->with('notification','Your password was successfully updated');
    }

    public function activate($token,AccountActivation $accountActivation)
    {
        $account = $accountActivation->where('token',$token)->first();

        if(!$account) abort(404);

        $account->update(['verified' => 1]);

        return redirect()->route('login')
            ->with('error','Account successfully activated, provide your login details to continue');
    }
}