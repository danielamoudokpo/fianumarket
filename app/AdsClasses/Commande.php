<?php

namespace App\AdsClasses;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    //
    protected $guarded = [];
    protected $table = 'commandes';


    public function belongto_client()
    {
        return $this->belongsTo('App\AdsClasses\Clients', 'client_id');
    }

    public function belongto_produit()
    {
        return $this->belongsTo('App\AdminClasses\Produit', 'produit_id');
    }
}
