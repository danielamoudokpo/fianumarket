<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdminClasses\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //

    public function showLoginPage(){
        return view("shop_@_admin_@_2020.auth.login");
    }

    public function connexion(Request $request){
        $validator = Validator::make($request->all(), 
        [
            'email' => 'required|email|max:30',
            'password' => 'required|string'
        ]);
        if ($validator->fails()) {
            return redirect(route("admin.connexion"))->with("erreur", "Certains champ sont incorrects");
        }

        $root = User::where('email' , $request->email)->first();
        if($root != ''){
            $check = User ::whereNotNull('role')
            ->where('email' , $root->email)
            ->first();
            // dd($check);
            if ($check != '') {

                $credidentials = \request(['email' , 'password']);
                if(Auth::attempt($credidentials)) {
                    $user = $request->user()  ;  
                    return redirect(route('admin.home'));
                }else{
                    return redirect(route("admin.connexion"))->with("erreur ", "Identifiants ou mot de passe incorrects");
                }

            }else {
                return redirect(route("admin.connexion"))->with("erreur", "Vous n'avez pas les droit nécessaire pour accéder à cette ressource");
            }

        }else {
            return redirect(route("admin.connexion"))->with("erreur", "Utilisateur non trouver !");

        }
        
    }
}
