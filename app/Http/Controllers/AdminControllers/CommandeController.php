<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sans_paiement()
    {
        //
        $commandes = [];
        $commandes = DB::table('commandes')
        ->join('clients', 'clients.id', 'commandes.user_id')
        ->select('commandes.id as id', 'commandes.produits as produits','clients.nom as nom', 'commandes.date_commande as date_commande' , 'commandes.total as total')
        ->get();
        return view('shop_@_admin_@_2020.commande.nonPayer', compact('commandes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function avec_paiement(Request $request)
    {
        //
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
        $commande = [];
        $commande = DB::table('commandes')
        ->join('clients', 'clients.id' , 'commandes.user_id')
        ->where('commandes.id' , '=' , $id)
        ->select('commandes.id as id', 'commandes.produits as produits','clients.nom as nom',
        'clients.ville as ville', 'clients.pays as pays', 'clients.telephone as telephone', 'clients.prenom as prenom' ,
        'clients.email as email','commandes.date_commande as date_commande' , 'commandes.total as total')
        ->first();
        return view('shop_@_admin_@_2020.commande.infos', compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function facture($id)
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
