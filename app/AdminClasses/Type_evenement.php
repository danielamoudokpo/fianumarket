<?php

namespace App\AdminClasses;

use Illuminate\Database\Eloquent\Model;

class Type_evenement extends Model
{
    //
    protected $guarded = [];

    public function hasMa_evenements(){
        return $this->hasMany('App\AdminClasses\Evenements');
    }
}
