<?php

namespace App\AdminClasses;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    //
    protected $guarded = [];
    protected $table = 'fournisseurs';

    public function hasmany_produits()
    {
        return $this->hasMany('App\AdminClasses\Produit' , 'id_fournisseur', 'id');
    }
}
