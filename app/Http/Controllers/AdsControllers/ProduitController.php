<?php

namespace App\Http\Controllers\AdsControllers;

use App\AdminClasses\Categorie;
use App\AdminClasses\Produit;
use App\AdminClasses\Sous_categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    //

    public function getInfo($id)
    {
        $data_fetch = [];
        $donnee = [];

        $les_produits = [];
        $les_categories = [];
        $les_categories_menu = [];
        $les_sous_categories = [];
        $les_categories = Categorie::all();
        $les_sous_categories = Sous_categorie::all();
        $meme_cat = Produit::with('belongto_categorie', 'belongto_sous_categorie')->get();
        $les_categories_menu = Categorie::all();

        if (isset($id) && !empty($id)) {
            // dd($request);
            $total_row = count(Produit::with('belongto_categorie', 'belongto_sous_categorie')->get());
            $les_produits = DB::table('produits')
            ->join('categories', 'categories.id', 'produits.categorie_id')
            ->where('produits.id', '=', $id)
            ->select('produits.id as idProduit' , 'produits.designation as designation', 'produits.quantite as quantite', 'produits.description as description', 'produits.prix_vente as prix_vente', 'produits.photo as photo')
            ->first();
            // dd($les_produits);

        }else{
           return redirect(route('shop.index'));
        }
        return view('produit.details', compact('les_produits','meme_cat', 'les_categories', 'les_sous_categories' , 'total_row', 'les_categories_menu'));
    }
}
