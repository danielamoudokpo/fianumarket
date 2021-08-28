<?php

namespace App\AdminClasses;

use Illuminate\Database\Eloquent\Model;

class Evenements extends Model
{
    //
    protected $guarded = [];
    protected $table = 'evenements';


    public function belongto_typeEvenement(){
        return $this->belongsTo('App\AdminClasses\Type_evenement' , 'id_type_evenement' , 'id');
    }

}
