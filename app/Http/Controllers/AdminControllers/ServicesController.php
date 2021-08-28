<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdminClasses\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('App\Http\Middleware\AdminAuth');
    // }


    public function index()
    {
        //
        $services = Service::all();
        return view('shop_@_admin_@_2020.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop_@_admin_@_2020.service.create');
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

        if($cat = service::create($data)){

        return redirect(route('admin.service.create'))->with('success', 'Ajoute avec succès');

        }else {
            return redirect(route('admin.service.create'))->with('erreur', 'Une erreur inattendue s\'est produite');
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
        $service = service::find($id);
        return view('shop_@_admin_@_2020.service.edit', compact('service'));
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

            if (service::whereId($id)->first()->update($data)) {

            return redirect(route('admin.service.liste'))->with('success', 'Donnée mis à jour avec succès');
            }else{
                return redirect(route('admin.service.liste'))->with('erreur', 'Echèque de mis ajour veillez-réessayer!');
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
        
            Service::whereId($id)->first()->delete();
            return redirect(route('admin.service.liste'))->with('success', 'Donnée supprimée avec succès');

        
    }
}
