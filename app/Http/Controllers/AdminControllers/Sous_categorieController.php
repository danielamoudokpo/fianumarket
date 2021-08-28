<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\AdminClasses\Categorie;
use App\AdminClasses\Sous_categorie;
use Illuminate\Http\Request;


class Sous_categorieController extends Controller
{
    public function __construct()
    {
        // authoriser l'authentification a chaque opération
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
        $sous_categories = Sous_categorie::with('belongto_categorie')->get();
        return view('shop_@_admin_@_2020.sous_categorie.index', compact('sous_categories'));
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
        return view('shop_@_admin_@_2020.sous_categorie.create', compact('categories'));
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
        $data = $request->validate([
            'categorie_id' => 'required',
            'designation' =>   'required'
        ]);

        $add = Sous_categorie::create($data);
        if ($add) {
            return redirect(route('admin.sous_categorie.create'))->with('success', 'Donnée ajoutée avec succès');
        }else {
            return redirect(route('admin.sous_categorie.create'))->with('erreur', 'Erreur de suppression de donnée');
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
        $categories = Categorie::all();
        $sous_categorie = Sous_categorie::find($id);
        return view('shop_@_admin_@_2020.sous_categorie.edit', compact('sous_categorie', 'categories'));
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
                'designation' => 'required',
                'categorie_id' => 'required'
            ]);

            if (Sous_categorie::whereId($id)->first()->update($data)) {

            return redirect(route('admin.sous_categorie.liste'))->with('success', 'Donnée mis à jour avec succès');
            }else{
                return redirect(route('admin.sous_categorie.liste'))->with('erreur', 'Echèque de mis ajour veillez-réessayer!');
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
        $destroy = Sous_categorie::find($id)->delete();
        return redirect(route('admin.sous_categorie.liste'))->with('success', 'Donnée supprimée avec succès');
    }
}
