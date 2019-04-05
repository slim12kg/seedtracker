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
        'name', 'email', 'password','phone','user_type'
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
}
