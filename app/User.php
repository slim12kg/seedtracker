<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname','email', 'password','phone','user_type','gender','profession','profile_image','registered','type_category'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return $this->firstname.' '.$this->lastname;
    }

    public function seedCompany()
    {
        return $this->user_type === 'seed company';
    }

    public function communitySeedProducer()
    {
        return $this->user_type === 'community seed producer';
    }

    public function registeredBusiness()
    {
        return (boolean) $this->registered;
    }

    public function getIsAdminAttribute()
    {
        return $this->user_type === "admin" || $this->user_type === "super admin";
    }

    public function getIsDgAttribute()
    {
        return $this->user_type === "super admin";
    }

    public function getNameAttribute()
    {
        return $this->firstname.' '. $this->lastname;
    }

    public function registration()
    {
        return $this->hasOne(Registration::class);
    }

    public function updateRegistration($data)
    {
        $registration = $this->registration;

        if($registration) {
            $this->registration()->update($data);
            $this->update(['registered' => true]);
        }else{
            $registration = $this->registration()->create($data);
        }

        return $registration;
    }

    public function activationToken()
    {
       return $this->hasOne(AccountActivation::class,'user_id');
    }

    public function generateActivationToken()
    {
        return $this->activationToken()->create([
           'token' => str_random(60),
        ]);
    }

    public function getActivationStringAttribute()
    {
        return $this->activationToken->token;
    }
}
