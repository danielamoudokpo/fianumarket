<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdsClasses\Clients;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    //
    public function index(){
        $clients = [];
        $clients = Clients::all();
        return view('shop_@_admin_@_2020.client.index', compact('clients'));
    }

    // suppresion d'un client
    public function destroy($id){
        // $clients = [];
        Clients::whereId($id)->delete();
        // $clients->delete();
        return redirect(route('admin.client.liste'))->with('success', 'client supprimé avec succès');
    }

    // afficher les infos d'un client
    public function show(Request $request){
        $clients = [];
        if ($request->ajax()) {
            $clients['donnee'] = Clients::find($request->id);
            // dd($clients);

        }else {
            $clients['erreur'] = 'Erreur lors d\'envoie de la requete! Veillez réesayer';
        }
        echo json_encode($clients);
    }
}
