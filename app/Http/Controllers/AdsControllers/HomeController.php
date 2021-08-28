<?php

namespace App\Http\Controllers\AdsControllers;

use App\AdminClasses\Categorie;
use App\AdminClasses\Produit;
use App\AdminClasses\Sous_categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //

    public function index(Request $request){

        $les_produits = [];
        $les_categories = [];
        $les_sous_categories = [];
        $les_categories = Categorie::limit(6)->get();
        $les_categories_menu = Categorie::all();
        $les_sous_categories = Sous_categorie::all();
        $les_produits = Produit::with('belongto_categorie', 'belongto_sous_categorie')->get();
        return view('index', compact('les_produits', 'les_categories', 'les_sous_categories' , 'les_categories_menu'));

    }

    // donnée par filtre
    public function get_cat_filter(Request $request)
    {
        $les_produits = [];
        $les_categories = Categorie::limit(3)->get();
        $les_categories_menu = Categorie::all();
        $les_sous_categories = Sous_categorie::all();
        if (isset($request) && $request != "") {
           $categorie = $request->categorie;
           if ($categorie == "Produits de la ruche") {

            $les_produits = DB::table('produits')
            ->join('categories', 'categories.id', 'produits.categorie_id')
            ->where('categories.designation', '=','Produits de la ruche')
            ->select('produits.id as id' , 'produits.designation as designation', 'produits.prix_vente as prix_vente', 'produits.photo as photo')
            ->get();
           }elseif ($categorie == "Bases du bien-être") {
            
            $les_produits = DB::table('produits')
            ->join('categories', 'categories.id', 'produits.categorie_id')
            ->where('categories.designation', '=', 'Bases du bien-être')
            ->select('produits.id as id' , 'produits.designation as designation', 'produits.prix_vente as prix_vente', 'produits.photo as photo')
            ->get();

           }elseif ($categorie == "Fitness & Minceur") {

            $les_produits = DB::table('produits')
            ->join('categories', 'categories.id', 'produits.categorie_id')
            ->where('categories.designation', '=', 'Fitness & Minceur')
            ->select('produits.id as id' , 'produits.designation as designation', 'produits.prix_vente as prix_vente', 'produits.photo as photo')
            ->get();

           }else if ($categorie == "Accueil") {
               return redirect(route('emvor.index'));
           }
           else {
            $les_produits = Produit::with('belongto_categorie', 'belongto_sous_categorie')->get();
        }
        }
        return view('index', compact('les_produits', 'les_categories', 'les_sous_categories', 'les_categories_menu'));
    }

    public function ajax_data(Request $request)
    {
        $data_fetch = [];
        $output = '';
       if ($request->ajax()) {
       $data_fetch = Produit::with('belongto_categorie', 'belongto_sous_categorie')->get();
       }
       foreach ($data_fetch as $row) {
        $output .='
        <div class="owl-item" style="width: 328px; margin-right: 0px;">
        <div class="item">
            <div class="product-box">
                <div class="product-media">
                    <img class="prod-img" alt="" src="images/image_produits/'.$row['photo'].'"/>
                    <div class="prod-icons">
                        <a href="#" class="fa fa-shopping-basket"></a>
                    </div>
                </div>                                 
                <div class="product-caption">
                    <h3 class="product-title">
                        <a href="#"> <span class="light-font"><strong>'.$row['designation'].'</strong></span></a>
                    </h3>
                    <div class="price"> 
                        <strong class="clr-txt price">'.number_format(intval($row['photo']), 2 , '.' , ' ' ).'FCFA</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
    }
    echo json_encode($output);
    }
}
