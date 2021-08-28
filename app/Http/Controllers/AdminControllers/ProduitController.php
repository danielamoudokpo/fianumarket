<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdminClasses\Fournisseur;
use App\Http\Controllers\Controller;

use App\AdminClasses\Categorie;
use App\AdminClasses\Produit;
use App\AdminClasses\Sous_categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

    public function __construct()
    {
     return $this->middleware('auth');   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produits = Produit::with('belongto_categorie', 'belongto_sous_categorie')->get();
        return view('shop_@_admin_@_2020.produit.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Categorie::all();
        $fournisseurs = Fournisseur::all();
        $sous_categories = Sous_categorie::all();
        return view('shop_@_admin_@_2020.produit.create', compact('categories' ,'fournisseurs' , 'sous_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $form_data = [];
        $f_form_data = [];
        if (isset($request->sous_categorie_id)) {
            $form_data = $request->validate([
                'sous_categorie_id' => 'required',
                'categorie_id' => 'required',
                'status' => 'required',
                'designation' => 'required',
                'reference' => 'required|unique:produits,reference',
                'prix_achat' => 'required',
                'prix_vente' => 'required',
                'description' => 'required',
                'quantite' => 'required|integer',
                'photo' => 'required|image|mimes:png,jpg,jpeg',
            ]);
        } else {
            $form_data = $request->validate([
                'categorie_id' => 'required',
                'designation' => 'required',
                'status' => 'required',
                'reference' => 'required|unique:produits,reference',
                'prix_achat' => 'required',
                'prix_vente' => 'required',
                'description' => 'required',
                'quantite' => 'required',
                'photo' => 'required|image|mimes:png,jpg,jpeg',
            ]);
        }

        $photo = $request->photo;
        
        $nom_photo=rand() . '.' . $photo->getClientOriginalName();
        $photo->move(public_path().'/images/image_produits/', $nom_photo); 
        
        $form_data['photo'] = $nom_photo;

        // $test_ref = Produit::where('reference', $request->reference)->first()->get();
        // if ($test_ref == "") {
            $create = Produit::create($form_data);
            return redirect(route('admin.produit.create'))->with('success', 'Produit ajouté avec succès');
        // }else {
        //     return redirect(route('produit.create'))->with('erreur_ref', 'Cette réference existe déjà');
        // }
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $produit = Produit::find($id);
        $fournisseurs = Fournisseur::all();
        $sous_categories = Sous_categorie::all();
        $categories = Categorie::all();
        return view('shop_@_admin_@_2020.produit.edit', compact('produit','fournisseurs' , 'categories' , 'sous_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $form_img = array();
        $new_image = $request->file('photo');//si le client choisi autre image
        $old_image = $request->input('old_image');//ancienne image reçue dans le hidden input

        if ($request->hasFile('photo')) {

            if (isset($request->sous_categorie_id)) {

                $form_data = $request->validate([
                    'sous_categorie_id' => 'required',
                    'categorie_id' => 'required',
                    'status' => 'required',
                    'id_fournisseur' => 'required',
                    'designation' => 'required',
                    'reference' => 'required',
                    'prix_achat' => 'required',
                    'prix_vente' => 'required',
                    'description' => 'required',
                    'quantite' => 'required|integer',
                    'photo' => 'required|image|mimes:png,jpg,jpeg',
                ]);

            } else {
                $form_data = $request->validate([
                    'categorie_id' => 'required',
                    'id_fournisseur' => 'required',
                    'status' => 'required',
                    'designation' => 'required',
                    'reference' => 'required',
                    'prix_achat' => 'required',
                    'prix_vente' => 'required',
                    'description' => 'required',
                    'quantite' => 'required',
                    'photo' => 'required|image|mimes:png,jpg,jpeg',
                ]);
            }

            // on supprime l'ancienne photo dans le dossier
            if ($new_image != $old_image) {
                $img_path = public_path('images/image_produits/'.$old_image.'');
                // dd($img_path);
                unlink($img_path);
            }


            // et on upload la nouvelle dans le dossier
            $photo = $new_image;
            
            $nom_photo=rand(). '.'.$photo->getClientOriginalName();
            $photo->move(public_path().'/images/image_produits/', $nom_photo); 
            
            $form_data['photo'] = $nom_photo;
        }else {

            if (isset($request->sous_categorie_id)) {

                $form_data = $request->validate([
                    'sous_categorie_id' => 'required',
                    'categorie_id' => 'required',
                    'id_fournisseur' => 'required',
                    'status' => 'required',
                    'designation' => 'required',
                    'reference' => 'required',
                    'prix_achat' => 'required',
                    'prix_vente' => 'required',
                    'description' => 'required',
                    'quantite' => 'required|integer',
                ]);
            } else {

                $form_data = $request->validate([
                    'categorie_id' => 'required',
                    'id_fournisseur' => 'required',
                    'status' => 'required',
                    'designation' => 'required',
                    'reference' => 'required',
                    'prix_achat' => 'required',
                    'prix_vente' => 'required',
                    'description' => 'required',
                    'quantite' => 'required',
                ]);

            }
        }
        Produit::whereId($id)->update($form_data);
        return redirect(route('admin.produit.liste'))->with('success', 'Donnée mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Produit::whereId($id)->delete();
        return redirect(route('admin.produit.liste'))->with('success', 'donnée supprimée avec succès');
    }

    public function fetch_sous_categorie(Request $request){
        if ($request->ajax()) {
           $sous_categorie = Sous_categorie::where('categorie_id', $request->categorie_id)->get();
           if ($sous_categorie != "") {
               echo json_encode($sous_categorie);
           }else {
               $vide = 1;
               echo json_encode($vide);
           }
        }
    }
    
}
