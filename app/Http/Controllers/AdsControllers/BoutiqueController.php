<?php

namespace App\Http\Controllers\AdsControllers;

use App\AdminClasses\Categorie;
use App\AdminClasses\Produit;
use App\AdminClasses\Sous_categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoutiqueController extends Controller
{
    //
    public function lesProduits()
    {
        $les_produits = [];
        $les_categories = [];
        $les_categories_menu = [];
        $les_sous_categories = [];
        $les_categories = Categorie::all();
        $les_categories_menu = Categorie::all();
        $les_sous_categories = Sous_categorie::all();
        $les_produits = Produit::with('belongto_categorie', 'belongto_sous_categorie')->paginate(12);
        $total_row = count(Produit::with('belongto_categorie', 'belongto_sous_categorie')->get());
        return view('produit.boutique', compact('les_produits', 'les_categories', 'les_sous_categories' , 'total_row', 'les_categories_menu'));
    }

    // filtre par categorie
    // donnée par filtre
    public function get_cat_filter(Request $request)
    {
        $data_fetch = [];
        if ($request->ajax()) {
           $categorie = $request->categorie;
           if ($categorie == "Produits de la ruche") {

            $data_fetch = DB::table('produits')
            ->join('categories', 'categories.id', 'produits.categorie_id')
            ->where('categories.designation', '=','Produits de la ruche')
            ->select('produits.id as idProduits' , 'produits.designation as nom', 'produits.prix_vente as prix_vente', 'produits.photo as photo')
            ->get();

            //    $data_fetch = Produit::with('belongto_categorie', 'belongto_sous_categorie')
            //    ->where('belongto_categorie.designation', '=', 'Produits de la ruche"')->get();

           }elseif ($categorie == "Bases du bien-être") {
            
            $data_fetch = DB::table('produits')
            ->join('categories', 'categories.id', 'produits.categorie_id')
            ->where('categories.designation', '=', 'Bases du bien-être')
            ->select('produits.id as idProduits' , 'produits.designation as nom', 'produits.prix_vente as prix_vente', 'produits.photo as photo')
            ->get();

           }elseif ($categorie == "Fitness & Minceur") {

            $data_fetch = DB::table('produits')
            ->join('categories', 'categories.id', 'produits.categorie_id')
            ->where('categories.designation', '=', 'Fitness & Minceur')
            ->select('produits.id as idProduits' , 'produits.designation as nom', 'produits.prix_vente as prix_vente', 'produits.photo as photo')
            ->get();

           }else {
            $data_fetch = Produit::with('belongto_categorie', 'belongto_sous_categorie')->get();
           }

        }
        return view();
    }

    public function getCategorie(Request $request)
    {
        $data_fetch = [];
        $donnee = [];

        $les_produits = [];
        $les_categories = [];
        $les_categories_menu = [];
        $les_sous_categories = [];
        $les_categories = Categorie::all();
        $les_sous_categories = Sous_categorie::all();
        $les_categories_menu = Categorie::all();

        if (isset($request->categorie_key)) {
            // dd($request);
            $total_row = count(Produit::with('belongto_categorie', 'belongto_sous_categorie')->get());
            $les_produits = DB::table('produits')
            ->join('categories', 'categories.id', 'produits.categorie_id')
            ->where('categories.id', '=', $request->categorie_key)
            ->select('produits.id as id' , 'produits.designation as designation' , 'produits.quantite as quantite', 'produits.prix_vente as prix_vente', 'produits.photo as photo')
            ->paginate(12);
            // dd($les_produits);

        }else{
            $les_produits = Produit::with('belongto_categorie', 'belongto_sous_categorie')->paginate(12);
            $total_row = count(Produit::with('belongto_categorie', 'belongto_sous_categorie')->get());
        }
        return view('produit.boutique', compact('les_produits', 'les_categories', 'les_sous_categories' , 'total_row', 'les_categories_menu'));
    }


    //filtre accueil
    public function fetch_product_index(Request $request)
    {
        if ($request->ajax()) {

            $data_fetch = [];
        $donnee = [];

        $les_produits = [];
        $les_categories = [];
        $les_sous_categories = [];
        $les_categories = Categorie::all();
        $les_sous_categories = Sous_categorie::all();

        $sql = "
            SELECT P.designation as designation, P.photo as photo, P.prix_vente as prix_vente, P.id as idProduits, P.quantite as quantite,P.categorie_id as idCategorie
            FROM produits P, categories C where P.categorie_id = C.id
            ";
        
            if (isset($request->categorie) && !empty($request->categorie)) {
                $categorie_filter = $request->categorie;
                $sql .= "
                AND C.id = '".$categorie_filter."'
                ";
                // $row_name = 'articles.categorie_id';
                // $propriete = $request->categorie;

            }

            // DB::enableQueryLog();
            $query = DB::select( DB::raw($sql));

            // dd(DB::getQueryLog());


            // dd($data_fetch);
            echo json_encode($query);



        }
    }

    //filtre boutique
    public function fetch_product(Request $request)
    {
        if ($request->ajax()) {
            # code...

        $data_fetch = [];
        $donnee = [];

        $les_produits = [];
        $les_categories = [];
        $les_sous_categories = [];
        $les_categories = Categorie::all();
        $les_sous_categories = Sous_categorie::all();

        $sql = "
            SELECT P.designation as designation, P.photo as photo, P.prix_vente as prix_vente, P.id as idProduits, P.quantite as quantite,P.categorie_id as idCategorie
            FROM produits P, categories C where P.categorie_id = C.id
            ";


            if (isset($request->minimum_price , $request->maximum_price) && !empty($request->minimum_price)  && !empty($request->maximum_price)) {
                $min = $request->minimum_price;
                $max = $request->maximum_price;
                $sql .= "
                    AND P.prix_vente  BETWEEN $min AND $max
                ";
            }

            if (isset($request->categorie) && !empty($request->categorie)) {
                $categorie_filter = implode("','", $request->categorie);
                $sql .= "
                AND C.id IN('".$categorie_filter."')
                ";
                // $row_name = 'articles.categorie_id';
                // $propriete = $request->categorie;

            }

            if (isset($request->sous_categorie) && !empty($request->sous_categorie)) {
                $sous_categorie_filter = implode("','", $request->sous_categorie);
                $sql .= "
                AND P.sous_categorie_id IN('".$sous_categorie_filter."')
                ";
                // $row_name = 'articles.categorie_id';
                // $propriete = $request->categorie;

            }

        // if (isset($request->categorie) && !empty($request->categorie)) {

        //     $data_fetch = DB::table('produits')
        //     ->join('categories', 'categories.id', 'produits.categorie_id')
        //     // ->where('categories.id', '=', 'produits.categorie_id')
        //     ->where('produits.categorie_id', '=', $request->categorie)
        //     ->select('produits.id as idProduits' , 'produits.designation as designation', 'produits.quantite as quantite', 'produits.prix_vente as prix_vente', 'produits.photo as photo')
        //     ->get();

        // }
        // if (isset($request->sous_categorie) && !empty($request->sous_categorie)) {

        //     $data_fetch = DB::table('produits')
        //     ->join('sous_categories', 'sous_categories.id', 'produits.sous_categorie_id')
        //     ->where('produits.sous_categorie_id', '=', $request->sous_categorie)
        //     ->select('produits.id as idProduits' , 'produits.designation as designation','produits.quantite as quantite', 'produits.prix_vente as prix_vente', 'produits.photo as photo')
        //     ->get();

        // }
        // if (isset($request->produit) && !empty($request->produit)) {

        //     $data_fetch = DB::table('produits')
        //     ->join('categories', 'categories.id', 'produits.categorie_id')
        //     ->join('sous_categories', 'sous_categories.id', 'produits.sous_categorie_id')
        //     ->where('produits.designation', '=', $request->produit)
        //     ->select('produits.id as idProduits' , 'produits.designation as designation','produits.quantite as quantite', 'produits.prix_vente as prix_vente', 'produits.photo as photo')
        //     ->get();

        // }
        // if (isset($request->min_prix , $request->max_prix) && !empty($request->min_prix)  && !empty($request->max_prix)) {
        //     $data_fetch = DB::table('produits')
        //     ->join('categories', 'categories.id', 'produits.categorie_id')
        //     ->join('sous_categories', 'sous_categories.id', 'produits.sous_categorie_id')
        //     ->whereBetween('produits.prix_vente', [$request->min_prix, $request->max_prix])
        //     ->select('produits.id as idProduits' , 'produits.designation as designation','produits.quantite as quantite', 'produits.prix_vente as prix_vente', 'produits.photo as photo')
        //     ->get();
        // }else {
        //     // $data_fetch = Produit::with('belongto_categorie', 'belongto_sous_categorie')->paginate(6);
        //     $total_row = count(Produit::with('belongto_categorie', 'belongto_sous_categorie')->get());
        // }
        
        // var_dump($data_fetch);


        // DB::enableQueryLog();
        $query = DB::select( DB::raw($sql));

        // dd(DB::getQueryLog());


        // dd($data_fetch);
        echo json_encode($query);
    }

    }
}
