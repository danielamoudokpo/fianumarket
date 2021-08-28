<?php

namespace App\AdminClasses;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    //
    protected $guarded = [];
    protected $table = 'produits';


    public function belongto_categorie(){
        return $this->belongsTo('App\AdminClasses\Categorie', 'categorie_id');
    }

    public function belongto_sous_categorie(){
        return $this->belongsTo('App\AdminClasses\Sous_categorie', 'sous_categorie_id');
    }

    public function belongto_fournisseur(){
        return $this->belongsTo('App\AdminClasses\Fournisseur', 'id_fournisseur');
    }
}
