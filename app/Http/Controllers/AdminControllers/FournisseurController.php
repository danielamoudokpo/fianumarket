<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdminClasses\Fournisseur;
use App\AdminClasses\Produit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fournisseurs = Fournisseur::all();

        return view('shop_@_admin_@_2020.fournisseur.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('shop_@_admin_@_2020.fournisseur.create');
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
        $form_data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'societe' => 'nullable',
            'email' => 'required|unique:fournisseurs,email',
            'adresse' => 'required',
            'telephone' => 'required',
            'numero_compte' => 'required',
            'password' => 'required|string|confirmed'
            // 'password_confirmation' => 'required'
        ]);

        
        $num_auto = rand(100, 100000);
        $photo = $request->photo;
        $nom = substr($request->nom, 0,5);
        $numcompte = 'FIANU-'.$num_auto.'-'.$nom;
        $form_data['numero_compte'] = strtoupper($numcompte);

        try {
            if(Fournisseur::create($form_data)){

                return redirect(route('admin.fournisseur.create'))->with('success', 'Ajoute avec succès');
        
                }else {
                    return redirect(route('admin.fournisseur.create'))->with('erreur', 'Une erreur inattendue s\'est produite');
            }
        } catch (\Throwable $th) {
            // return redirect(route('admin.fournisseur.create'))->with('erreur', $th->getMessage());
            die($th->getMessage());
        }
        
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
        //
        $fournisseur = Fournisseur::find($id);
        return view('shop_@_admin_@_2020.fournisseur.edit', compact('fournisseur'));
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
        //
        if ($request && $id) {
            $data = $request->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'societe' => 'nullable',
                'email' => 'required|unique:fournisseurs,email',
                'adresse' => 'required',
                'telephone' => 'required',
                'numero_compte' => 'required',
            ]);

            if (Fournisseur::whereId($id)->first()->update($data)) {

            return redirect(route('admin.fournisseur.liste'))->with('success', 'Donnée mise à jour avec succès');
            }else{
                return redirect(route('admin.fournisseur.liste'))->with('erreur', 'Echèque de mise ajour veillez-réessayer!');
            }
            # code...
        }
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
        //
        // On supprime tous les produits de ce fournisseur
        // $produit = Produit::where('id_fournisseur', $id)->get();
        // if ($produit != "") {

        //     Produit::where('id_fournisseur', $id)->delete();
        //     Fournisseur::whereId($id)->first()->delete();
        //     return redirect(route('admin.fournisseur.liste'))->with('success', 'Donnée supprimée avec succès');

        // }else if($produit == ""){

            Fournisseur::whereId($id)->first()->delete();
            return redirect(route('admin.fournisseur.liste'))->with('success', 'Donnée supprimée avec succès');

        // }
    }
}
