<?php

namespace App\Http\Controllers\AdsControllers;

use App\AdminClasses\Categorie;
use App\AdminClasses\Evenements;
use App\AdminClasses\Type_evenement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvenementController extends Controller
{
    //
    public function lesevenements()
    {
        $les_evenements = [];
        $les_categories = [];
        $les_categories_menu = [];
        $les_sous_categories = [];
        $les_categories = Categorie::all();
        $les_categories_menu = Categorie::all();
        $categorie_evenement = Type_evenement::all();
        $les_evenements = Evenements::with('belongto_typeEvenement')->paginate(12);
        $total_row = count(Evenements::with('belongto_typeEvenement')->get());
        return view('evenements.index', compact('les_evenements','categorie_evenement' , 'les_categories', 'total_row', 'les_categories_menu'));
    }

    // filtre par categorie
    // donnée par filtre
    public function get_cat_filter(Request $request)
    {
        $data_fetch = [];
        if ($request->ajax()) {
           $categorie = $request->categorie;
           if ($categorie == "evenements de la ruche") {

            $data_fetch = DB::table('evenements')
            ->join('categories', 'categories.id', 'evenements.categorie_id')
            ->where('categories.libelle', '=','evenements de la ruche')
            ->select('evenements.id as idEvenements' , 'evenements.libelle as nom', 'evenements.prix_vente as prix_vente', 'evenements.photo as photo')
            ->get();

            //    $data_fetch = evenement::with('belongto_typeEvenement')
            //    ->where('belongto_typeEvenement.libelle', '=', 'evenements de la ruche"')->get();

           }elseif ($categorie == "Bases du bien-être") {
            
            $data_fetch = DB::table('evenements')
            ->join('categories', 'categories.id', 'evenements.categorie_id')
            ->where('categories.libelle', '=', 'Bases du bien-être')
            ->select('evenements.id as idEvenements' , 'evenements.libelle as nom', 'evenements.prix_vente as prix_vente', 'evenements.photo as photo')
            ->get();

           }elseif ($categorie == "Fitness & Minceur") {

            $data_fetch = DB::table('evenements')
            ->join('categories', 'categories.id', 'evenements.categorie_id')
            ->where('categories.libelle', '=', 'Fitness & Minceur')
            ->select('evenements.id as idEvenements' , 'evenements.libelle as nom', 'evenements.prix_vente as prix_vente', 'evenements.photo as photo')
            ->get();

           }else {
            $data_fetch = Evenements::with('belongto_typeEvenement')->get();
           }

        }
        return view();
    }

    public function getCategorie(Request $request)
    {
        $data_fetch = [];
        $donnee = [];

        $les_evenements = [];
        $les_categories = [];
        $les_categories_menu = [];
        $les_sous_categories = [];
        $les_categories = Evenements::all();
        $categorie_evenement = Type_evenement::all();
        $les_categories_menu = Evenements::all();

        if (isset($request->categorie) && !empty($request->categorie_key)) {
            // dd($request);
            $total_row = count(Evenements::with('belongto_typeEvenement')->get());
            $les_evenements = DB::table('evenements')
            ->join('categories', 'categories.id', 'evenements.categorie_id')
            ->where('categories.id', '=', $request->categorie_key)
            ->select('evenements.id as idEvenements' ,  'evenements.photo as photo')
            ->paginate(6);
            // dd($les_evenements);

        }else{
            $les_evenements = Evenements::with('belongto_typeEvenement')->paginate(6);
            $total_row = count(Evenements::with('belongto_typeEvenement')->get());
        }
        return view('evenements.index', compact('les_evenements', 'les_categories', 'total_row', 'les_categories_menu', 'categorie_evenement'));
    }


    //filtre accueil
    public function fetch_product_index(Request $request)
    {
        if ($request->ajax()) {

            $data_fetch = [];
        $donnee = [];

        $les_evenements = [];
        $les_categories = [];
        $les_sous_categories = [];
        $les_categories = Evenements::all();

        $sql = "
            SELECT E.nom as libelle, E.photo as photo, E.description as description, 
            E.exigence as exigence, E.contact as contact, E.lieu as lieu, E.id as idEvenements, 
            E.organisateur as organisateur, E.date_time as date_time, E.ville as ville , E.pays as pays ,E.id_type_evenement as idCategorie
            FROM evenements E, type_evenements T where E.id_type_evenement = T.id
            ";
        
            if (isset($request->categorie) && !empty($request->categorie)) {
                $categorie_filter = $request->categorie;
                $sql .= "
                AND T.id = '".$categorie_filter."'
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

    public function getInfo($id)
    {
        $data_fetch = [];
        $donnee = [];

        $les_evenements = [];
        $les_categories = [];
        $les_categories_menu = [];
        $les_sous_categories = [];
        $les_categories = Categorie::all();
        $meme_cat = Evenements::with('belongTo_typeEvenement')->where('id_type_evenement', $id)->get();
        $les_evenements = Evenements::with('belongTo_typeEvenement')->where('id', $id)->first();
        $les_categories_menu = Categorie::all();
        // if (isset($id) && !empty($id)) {
        //     // dd($request);
        //     $total_row = count(Evenements::with('belongTo_typeEvenement')->get());
        //     $les_evenements = DB::table('evenements')
        //     ->join('type_evenements', 'type_evenements.id', 'evenements.id_type_evenement')
        //     ->where('evenements.id', '=', $id)
        //     ->select('evenements.nom as nom, evenements.photo as photo, evenements.description as description, 
        //     evenements.exigence as exigence, evenements.contact as contact, evenements.lieu as lieu, evenements.id as idEvenements, 
        //     evenements.organisateur as organisateur, evenements.date_time as date_time, evenements.ville as ville ,
        //     evenements.pays as pays , evenements.id_type_evenement as idCategorie')
        //     ->first();
        //     // dd($les_evenements);

        // }else{
        //    return redirect(route('shop.index'));
        // }
        return view('evenements.detail', compact('les_evenements','meme_cat', 'les_categories', 'les_categories_menu'));
    }

    //filtre boutique
    public function fetch_evenement(Request $request)
    {
        if ($request->ajax()) {
            # code...

        $data_fetch = [];
        $donnee = [];

        $les_evenements = [];
        $les_categories = [];
        $les_sous_categories = [];
        $les_categories = Evenements::all();

        $sql = "
        SELECT E.nom as libelle, E.photo as photo, E.description as description, 
        E.exigence as exigence, E.contact as contact, E.lieu as lieu, E.id as idEvenements, 
        E.organisateur as organisateur, T.libelle as categorie, E.date_time as date_time, E.ville as ville , E.pays as pays ,E.id_type_evenement as idCategorie
        FROM evenements E, type_evenements T where E.id_type_evenement = T.id
            ";

            if (isset($request->categorie) && !empty($request->categorie)) {
                $categorie_filter = implode("','", $request->categorie);
                $sql .= "
                AND T.id IN('".$categorie_filter."')
                ";
                // $row_name = 'articles.categorie_id';
                // $propriete = $request->categorie;

            }

        // if (isset($request->categorie) && !empty($request->categorie)) {

        //     $data_fetch = DB::table('evenements')
        //     ->join('categories', 'categories.id', 'evenements.categorie_id')
        //     // ->where('categories.id', '=', 'evenements.categorie_id')
        //     ->where('evenements.categorie_id', '=', $request->categorie)
        //     ->select('evenements.id as idEvenements' , 'evenements.libelle as libelle', 'evenements.quantite as quantite', 'evenements.prix_vente as prix_vente', 'evenements.photo as photo')
        //     ->get();

        // }
        // if (isset($request->sous_categorie) && !empty($request->sous_categorie)) {

        //     $data_fetch = DB::table('evenements')
        //     ->join('sous_categories', 'sous_categories.id', 'evenements.sous_categorie_id')
        //     ->where('evenements.sous_categorie_id', '=', $request->sous_categorie)
        //     ->select('evenements.id as idEvenements' , 'evenements.libelle as libelle','evenements.quantite as quantite', 'evenements.prix_vente as prix_vente', 'evenements.photo as photo')
        //     ->get();

        // }
        // if (isset($request->evenement) && !empty($request->evenement)) {

        //     $data_fetch = DB::table('evenements')
        //     ->join('categories', 'categories.id', 'evenements.categorie_id')
        //     ->join('sous_categories', 'sous_categories.id', 'evenements.sous_categorie_id')
        //     ->where('evenements.libelle', '=', $request->evenement)
        //     ->select('evenements.id as idEvenements' , 'evenements.libelle as libelle','evenements.quantite as quantite', 'evenements.prix_vente as prix_vente', 'evenements.photo as photo')
        //     ->get();

        // }
        // if (isset($request->min_prix , $request->max_prix) && !empty($request->min_prix)  && !empty($request->max_prix)) {
        //     $data_fetch = DB::table('evenements')
        //     ->join('categories', 'categories.id', 'evenements.categorie_id')
        //     ->join('sous_categories', 'sous_categories.id', 'evenements.sous_categorie_id')
        //     ->whereBetween('evenements.prix_vente', [$request->min_prix, $request->max_prix])
        //     ->select('evenements.id as idEvenements' , 'evenements.libelle as libelle','evenements.quantite as quantite', 'evenements.prix_vente as prix_vente', 'evenements.photo as photo')
        //     ->get();
        // }else {
        //     // $data_fetch = evenement::with('belongto_typeEvenement')->paginate(6);
        //     $total_row = count(evenement::with('belongto_typeEvenement')->get());
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
