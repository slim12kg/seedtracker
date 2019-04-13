<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $guarded = ['id','user_id'];

    protected $dates = [
        'last_reviewed_by_admin',
        'certification_start_date',
        'certification_end_date'
    ];

//    protected $casts = [
//        'place_of_businesses' => 'array',
//        'name_of_proprietors' => 'array',
//        'name_of_board_of_directors' => 'array',
//        'list_of_crop_to_be_handled' => 'array',
//        'other_facilities_available' => 'array',
//        'trainings' => 'array',
//    ];

    public function getFullNameAttribute()
    {
        return $this->applicant_firstname.' '.$this->applicant_lastname;
    }

    public function getPlaceOfBusinessesAttribute($value)
    {
        return unserialize($value);
    }

    public function getNameOfProprietorsAttribute($value)
    {
        return unserialize($value);
    }

    public function getNameOfBoardOfDirectorsAttribute($value)
    {
        return unserialize($value);
    }

    public function getListOfCropToBeHandledAttribute($value)
    {
        return unserialize($value);
    }

    public function getOtherFacilitiesAvailableAttribute($value)
    {
        return unserialize($value);
    }

    public function getTrainingsAttribute($value)
    {
        return unserialize($value);
    }

    public function applicant()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}