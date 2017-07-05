<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    //relationship btn tag and post (Many to Many)

    public function  posts()
    {
        return $this->belongsToMany('App\Model\user\post','post_tags');
    }
}
