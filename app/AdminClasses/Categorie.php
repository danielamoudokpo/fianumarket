<?php

namespace App\AdminClasses;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //
    protected $fillable = ['designation'];
    protected $table = 'categories';

    public function many_sous_categories(){
        return $this->hasMany('App\AdminClasses\Sous_categorie');
    }

    public function many_produits(){
        return $this->hasMany('App\AdminClasses\Produit');
    }
}
