<?php

namespace App\AdsClasses;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    //
     //
     protected $guarded = [];
     protected $table = 'projets';
 
     public function belongto_service()
     {
         return $this->belongsTo('AdminClasses/Service' , "id_service");
     }
}
