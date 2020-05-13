<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function departments()
    {
        return $this->belongsToMany('App\Models\Department');
    }
}
