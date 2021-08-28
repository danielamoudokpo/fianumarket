<?php

namespace App\AdsClasses;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    //
    protected $guarded = [];
    protected $table = 'clients';


public function has_many_commandes()
{
    return $this->hasMany('App\AdsClasses\Commande');
}

}
