<?php

namespace App\AdminClasses;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $guarded = [];
    protected $table = 'services';

    public function hasmany_projet()
    {
        return $this->hasMany('AdminClasses/Projet');
    }
}
