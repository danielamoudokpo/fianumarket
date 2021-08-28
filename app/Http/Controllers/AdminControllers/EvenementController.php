<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdminClasses\Evenements;
use App\AdminClasses\Type_evenement;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            // $evenements = array();
            // $evenements = Evenements::with('belongTo_type_event' , 'belongTo_entreprise')->get();
            $evenements = Evenements::with('belongto_typeEvenement')->get();
            // $categories = Type_evenement::all();
            return view('shop_@_admin_@_2020.evenement.index', compact('evenements'));
   
        } catch (Exception $th) {
           die($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Type_evenement::all();
        return view('shop_@_admin_@_2020.evenement.create', compact('categories'));
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
        $message = "";
        $status = "";
        $new_image = $request->file('photo');//si le client choisi autre image
        $data = $request->validate([
            "nom" => "required",
            "id_type_evenement" => "required",
            "status" => "required",
            "date_time" => "required",
            "organisateur" => "required",
            "description" => "string",
            "lieu" => "required",
            "exigence" => "required|string",
            "pays" => "required|string",
            "ville" => "required|string",
            "contact" => "required|string",
            'photo' => 'required|image|mimes:png,jpg,jpeg'
         ]);

                $photo = $new_image;
                
                $nom_photo=rand(). '.'.$photo->getClientOriginalName();
                $photo->move(public_path().'/event_cover/', $nom_photo); 
                $data['photo'] = $nom_photo;

         $date_f = date("Y-m-d", strtotime($request->date));
         $data["date"] = $date_f;
         //dd($date_f);
         if ($data) {
            Evenements::create($data);
             $status = "success";
             $message = "Enrégistrer avec succès";
         }else {
            $status = "erreur";
            $message = "Erreur d'enrégistrement";
         }

         return redirect(route('admin.evenement.create'))->with($status, $message);
         
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
        try {
            $evenement = Evenements::where('id', $id)->first();
            $types = Type_evenement::all();
            return view('shop_@_admin_@_2020.evenement.edit', compact('evenement', 'types' ));
   
        } catch (\Throwable $th) {
           die($th);
        }
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
        $date_f = 
        $form_img = array();
        $new_image = $request->file('photo');//si le client choisi autre image
        $old_image = $request->input('old_image');//ancienne image reçue dans le hidden input

        // $message = "";
        $status = "";
        if ($request->hasFile('photo')) {

        $data = $request->validate([
            "nom" => "required",
            "id_type_evenement" => "required",
            "descriptio" => "string",
            "status" => "required",
            "date_time" => "required",
            "organisateur" => "required",
            "lieu" => "required",
            "exigence" => "required|string",
            "pays" => "required|string",
            "ville" => "required|string",
            "contact" => "required|string",
            'photo' => 'required|image|mimes:png,jpg,jpeg'
         ]);


                // // on supprime l'ancienne photo dans le dossier
                // if ($new_image != $old_image) {
                //     $img_path = public_path('event_cover/'.$old_image.'');
                //     // dd($img_path);
                //     unlink($img_path);
                // }


                // et on upload la nouvelle dans le dossier
                $photo = $new_image;
                
                $nom_photo=rand(). '.'.$photo->getClientOriginalName();
                $photo->move(public_path().'/event_cover/', $nom_photo); 
                
                $data['photo'] = $nom_photo;

        }else {
            $data = $request->validate([
            "nom" => "required",
            "id_type_evenement" => "required",
            "status" => "required",
            "date_time" => "required",
            "organisateur" => "required",
            "lieu" => "required",
            "exigence" => "required|string",
            "pays" => "required|string",
            "ville" => "required|string",
            "contact" => "required|string",
            "description" => "string"
            ]);
        }

         $date_f = date("Y-m-d", strtotime($request->date));
         $data["date"] = $date_f;

         
         if ($data) {
            Evenements::whereId($id)->first()->update($data);
             $status = "success";
             $message = "Mis à jour avec succès";
         }else {
            $status = "erreur";
            $message = "Erreur de mise à jour";
         }

         return redirect(route('admin.evenement.liste'))->with($status, $message);
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evenements::whereId($id)->first()->delete();
        $status = "success";
        $message = "Mis à jour avec succès";
        return redirect(route('admin.evenement.index'))->with($status, $message);
    }
}
