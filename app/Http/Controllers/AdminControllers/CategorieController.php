<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;

use App\AdminClasses\Categorie;
use App\AdminClasses\Sous_categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\AdminAuth');
    }
    public function index()
    {
        //
        $categories = Categorie::all();
        return view('shop_@_admin_@_2020.categorie.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop_@_admin_@_2020.categorie.create');
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
            'designation' => 'required'
        ]);

        if($cat = Categorie::create($data)){

        return redirect(route('admin.categorie.create'))->with('success', 'Ajoute avec succès');

        }else {
            return redirect(route('admin.categorie.create'))->with('erreur', 'Une erreur inattendue s\'est produite');
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
        $categorie = Categorie::find($id);
        return view('shop_@_admin_@_2020.categorie.edit', compact('categorie'));
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
        if ($request && $id) {
            $data = $request->validate([
                'designation' => 'required'
            ]);

            if (Categorie::whereId($id)->first()->update($data)) {

            return redirect(route('admin.categorie.liste'))->with('success', 'Donnée mis à jour avec succès');
            }else{
                return redirect(route('admin.categorie.liste'))->with('erreur', 'Echèque de mis ajour veillez-réessayer!');
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
        $sous_cat = Sous_categorie::where('categorie_id', $id)->get();
        if ($sous_cat != "") {

            Sous_categorie::where('categorie_id', $id)->delete();
            Categorie::whereId($id)->first()->delete();
            return redirect(route('admin.categorie.liste'))->with('success', 'Donnée supprimée avec succès');

        }else if($sous_cat == ""){

            Categorie::whereId($id)->first()->delete();
            return redirect(route('admin.categorie.liste'))->with('success', 'Donnée supprimée avec succès');

        }
    }
}
