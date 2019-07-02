<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $guarded = [
        'id'
    ];

    public function add($description)
    {
        $this->create([
            'description' => $description
        ]);
    }
}
