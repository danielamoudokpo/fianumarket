<?php

namespace App\AdminClasses;

use Illuminate\Database\Eloquent\Model;

class Sous_categorie extends Model
{
    //
    protected $guarded = [];
    protected $table = 'sous_categories';


    public function belongto_categorie(){
        return $this->belongsTo('App\AdminClasses\Categorie' , 'categorie_id');
    }

    public function many_produits(){
        return $this->hasMany('App\AdminClasses\Produit');
    }
}
