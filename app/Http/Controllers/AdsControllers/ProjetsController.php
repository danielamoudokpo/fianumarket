<?php

namespace App\Http\Controllers\AdsControllers;

use App\AdminClasses\Categorie;
use App\AdminClasses\Projet;
use App\AdminClasses\Service;
use App\AdminClasses\Sous_categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $servces = [];
        $les_categories = [];
        $les_categories_menu = [];
        $les_sous_categories = [];
        $les_categories = Categorie::all();
        $les_categories_menu = Categorie::all();
        $les_sous_categories = Sous_categorie::all();
        $services = Service::all();
        return view('projet.create', compact('services', 'les_categories', 'les_categories_menu' , 'les_sous_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
            'type_client' => 'required|string',
            'pays' => 'required|string',
            'telephone' => 'required',
            'adresse' => 'required|string',
            'budget' => 'required',
            'titre' => 'required|string',
            'id_service' => 'required',
            // 'pays' => 'required|string',
        ]);
        
        Projet::create($data);
        return redirect(route('service.projet'))->with('success' , 'Votre projet a été soumis avec succès ! Merci de nous faire confiance');
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
    }
}
