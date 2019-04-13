<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountActivation extends Model
{
   protected $guarded = ['id'];

    public function applicant()
    {
        return $this->belongsTo(User::class);
   }
}
