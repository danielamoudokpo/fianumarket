<?php

namespace App\AdsClasses;

use Illuminate\Database\Eloquent\Model;
use Barryvdh\DomPDF\Facade as PDF;

class Panier extends Model
{
    //
    protected $guarded = [];
    protected $table = 'paniers';

    // public function __construct()
    // {

    // }

    // public function createPDF($view){
    //     $pdf = PDF::loadView($view);
    //     return $pdf->download('ma_commande_chez_emvor.pdf', $pdf);
    // }
}
