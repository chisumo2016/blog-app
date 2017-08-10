<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    //Save Role
    public function  permissions()
    {
        return $this->belongsToMany('App\Model\admin\Permission');
    }
}
