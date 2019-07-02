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

    public function filterApplicants($filters = [])
    {
        $applications = $this->whereHas('applicant',function($q){
            $q->where('registered',true);
        });
        $filters = array_filter($filters);

        if(!empty($filters)){
            $applications = $this->buildFilterQuery($this, $filters);
        }

        //dd($applications->toSql());
        return $applications->get();
    }

    private function buildFilterQuery($model, $filters)
    {
        foreach ($filters as $filter => $value){
            $model = call_user_func_array([$this,camel_case('filter by '. $filter)],[$model, $value, $filters]);
        }

        return $model;
    }

    private function filterByIssueDate($model, $value)
    {
        return $model->whereYear('certification_start_date',$value);
    }

    private function filterByCompanyName($model, $value)
    {
        return $model->where('business_name','LIKE',"%$value%");
    }

    private function filterByProducerType($model, $value)
    {
        return $model->whereHas('applicant',function ($query) use($value) {
            $query->where('user_type',$value);
        });
    }

    private function filterByApplicationStatus($model, $value)
    {
        return $model->where('application_status',$value);
    }

    private function filterByState($model, $value)
    {
        return $model->where('state',$value);
    }

    private function filterByRegistrationNo($model, $value)
    {
        return $model->where('certificate_id',$value);
    }
}