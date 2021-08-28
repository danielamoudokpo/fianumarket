<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdminClasses\Type_evenement;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class TypeEvenementController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $type = Type_evenement::all();
        return view('shop_@_admin_@_2020.type_evenement.index', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop_@_admin_@_2020.type_evenement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeEvent = new Type_evenement();
        $message = "";
        $status = "";
        $data = $request->validate([
            "libelle" => "required|string"
        ]);
        if ($data) {
            // $typeEvent->setLibelle($data);
            Type_evenement::create($data);
            $message = "Entrégistrer avec succès";
            $status = "success";
        }else{
            $message = "Erreur d 'enrégistrement";
            $status = "erreur";
        }
        return redirect(route('shop_@_admin_@_2020.type_evenement.create'))->with($status, $message);

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
        
        $infos = Type_evenement::where('id', $id)->first();
        return view('shop_@_admin_@_2020.type_evenement.edit', compact('infos'));
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
        $typeEntreprise = new Type_evenement();
        $message = "";
        $status = "";
        $data = $request->validate([
            "libelle" => "required|string"
        ]);
        if ($data) {
            $typeEntreprise->setLibelle($data);
            Type_evenement::whereId($id)->first()->update($typeEntreprise->getLibelle());
            $message = "Mise à jour avec succès";
            $status = "success";
        }else{
            $message = "Erreur de mise à jour";
            $status = "erreur";
        }
        return redirect(route('shop_@_admin_@_2020.type_evenement.index'))->with($status, $message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = "";
        $status = "";
        try {
            if(Type_evenement::find($id)->delete()){
                $status = "success";
                $message = "Supprimer avec succès";
            }else {
                $status = "erreur";
                $message = "Erreur de suppression";
            }
        } catch (Exception $ex) {
            $status = "erreur";
            $message = $ex;
        }
        
        return redirect(route('shop_@_admin_@_2020.type_evenement.index'))->with($status, $message);
    
    }
}
