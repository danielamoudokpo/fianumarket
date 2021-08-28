<?php

namespace App\Http\Controllers\AdsControllers;

use App\AdminClasses\Categorie;
use App\AdminClasses\Produit;
use App\AdminClasses\User;
use App\AdsClasses\Commande;
use App\AdsClasses\souhait;
use App\Http\Controllers\Controller;
use App\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompteController extends Controller
{

    public function __construct()
    {
        // $this->middleware('App\Http\Middleware\AdsAuth');
    }

    // afficher la page de connexion
    public function showLoginPage(){
        $les_produits = [];
        $les_categories = [];
        $les_sous_categories = [];
        $les_categories = Categorie::limit(6)->get();
        $les_categories_menu = Categorie::all();
        $les_produits = Produit::with('belongto_categorie', 'belongto_sous_categorie')->get();
        return view('compte.login', compact('les_produits', 'les_categories', 'les_sous_categories' , 'les_categories_menu'));
    }

    // afficher la page du tableau de bord
    public function showDash(){
        $userinfos = Auth::user();
        $totalSouhaits = souhait::where('user_id', '=' , $userinfos->id)->count();
        $totalCommandes = Commande::where('user_id', '=' , $userinfos->id)->count();
        $totalPaiements = Paiement::where('user_id', '=' , $userinfos->id)->count();
        return view("compte.dashboard" , compact('userinfos', 'totalCommandes' , 'totalPaiements' , 'totalSouhaits'));
    }

    public function deconnexion()
    {
        Auth::logout();
        return redirect(route('shop.index'));
    }

    // afficher la page d'inscription
    public function showRegisterPage(){
        $les_produits = [];
        $les_categories = [];
        $les_sous_categories = [];
        $les_categories = Categorie::limit(6)->get();
        $les_categories_menu = Categorie::all();
        $les_produits = Produit::with('belongto_categorie', 'belongto_sous_categorie')->get();
        return view('compte.register', compact('les_produits', 'les_categories', 'les_sous_categories' , 'les_categories_menu'));
    }


    // inscription d'un nouvel utilisateur
    public function inscription(Request $request){
        $validator = $request->validate( 
        [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string|min:3|string',
            'prenom' => 'required|string|min:3|string',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
       
         if(User::create([
            'name' => $request['name'],
            'prenom' => $request['prenom'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ])){
                $credidentials = \request(['email' , 'password']);
                Auth::attempt($credidentials);
                $userinfos = Auth::user(); 
                $totalSouhaits = souhait::where('user_id', '=' , $userinfos->id)->count();
                $totalCommandes = Commande::where('user_id', '=' , $userinfos->id)->count();
                $totalPaiements = Paiement::where('user_id', '=' , $userinfos->id)->count();
                return view("compte.dashboard" , compact('userinfos', 'totalCommandes' , 'totalPaiements' , 'totalSouhaits'));
        }else{
            return redirect(route("user.inscription"))->with('erreur', 'Une erreur inattendue s\'est produite');
        }
    }


    // connexion au compte utilisateur;
    public function connexion(Request $request){
        $validator = $request->validate( 
        [
            'email' => 'required|email|max:30',
            'password' => 'required|string'
        ]);
        
        $credidentials = \request(['email' , 'password']);

        if(Auth::attempt($credidentials)) {
                $userinfos = $request->user()  ; 
                $totalSouhaits = souhait::where('user_id', '=' , $userinfos->id)->count();
                $totalCommandes = Commande::where('user_id', '=' , $userinfos->id)->count();
                $totalPaiements = Paiement::where('user_id', '=' , $userinfos->id)->count();
                return view("compte.dashboard" , compact('userinfos', 'totalCommandes' , 'totalPaiements' , 'totalSouhaits'));
         }else{
            return redirect(route('user.connexion'))->with('erreur', 'Identifiants ou mot de passe incorrects');
         }
    }

    public function commandeUser()
    {
        $userinfos = Auth::user();
        $commandes = [];
        $totalCommandes = Commande::where('user_id', '=' , $userinfos->id)->count();                
        $totalSouhaits = souhait::where('user_id', '=' , $userinfos->id)->count();
        $totalPaiements = Paiement::where('user_id', '=' , $userinfos->id)->count();
        $commandes = DB::table('commandes')
        ->join('clients', 'clients.id', 'commandes.user_id')
        ->select('commandes.id as id', 'commandes.produits as produits','clients.nom as nom' , 'commandes.date_commande as date_commande' , 'commandes.total as total')
        ->where('commandes.user_id', '=' , $userinfos->id)
        ->get();
        return view('compte.commandes', compact('commandes', 'userinfos', 'totalCommandes' , 'totalPaiements' , 'totalSouhaits'));
    }

    // liste de souhait
    public function souhaits()
    {
        $userinfos = Auth::user();
        $souhaits = [];
        $totalCommandes = Commande::where('user_id', '=' , $userinfos->id)->count();                
        $totalSouhaits = souhait::where('user_id', '=' , $userinfos->id)->count();
        $totalPaiements = Paiement::where('user_id', '=' , $userinfos->id)->count();
        $souhaits = souhait::where('user_id', '=' , $userinfos->id)->get();
        return view('compte.souhaits', compact('souhaits', 'userinfos', 'totalCommandes' , 'totalPaiements' , 'totalSouhaits'));
    }

    // historique des paiements
    public function paiements()
    {
        $userinfos = Auth::user();
        $souhaits = [];
        $totalCommandes = Commande::where('user_id', '=' , $userinfos->id)->count();                
        $totalSouhaits = souhait::where('user_id', '=' , $userinfos->id)->count();
        $totalPaiements = Paiement::where('user_id', '=' , $userinfos->id)->count();
        $paiements = Paiement::where('user_id', '=' , $userinfos->id)->get();
        return view('compte.paiements', compact('paiements', 'userinfos', 'totalCommandes' , 'totalPaiements' , 'totalSouhaits'));
    }

    //afficher les infos de l'utilisateur connecté
    public function infosUser()
    {
        $userinfos = Auth::user();
        return view('compte.infoscompte', compact('userinfos'));
    }

    //supprimer la commande
    public function destroyCommande()
    {
        
    }

    //supprimer la commande
    public function destroySouhait($id)
    {
        souhait::whereId($id)->first()->delete();
        return redirect()->back()->with('success', 'Supprimer avec succès');
    }

    //mise a jours des infos de l'utilisateur connecté
    public function infosEdit()
    {
        $userinfos = Auth::user();
        return view('compte.edit', compact('userinfos'));
    }

    //envoi des donné a modifier dans la base
    public function editer(Request $request)
    {

        $user = Auth::user();
        if (isset($request->password) && !empty($request->password)) {
            $request->validate([
                'email' => 'required|string|email|max:255',
                'name' => 'required|string|min:3|string',
                'prenom' => 'required|string|min:3|string',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required'
            ]);

            $data = $request->validate([
                'email' => 'required|string|email|max:255',
                'name' => 'required|string|min:3|string',
                'prenom' => 'required|string|min:3|string',
                'password' => 'required|string|min:8|confirmed',
            ]);
        }else {
            $data = $request->validate([
                'email' => 'required|string|email|max:255',
                'name' => 'required|string|min:3|string',
                'prenom' => 'required|string|min:3|string'
            ]);
        }
        
        if( User::whereId($user['id'])->update($data)){
            return redirect(route('user.infos'))->with('success', 'Compte mise à jour');
        }else {
            return redirect(route('user.infos'))->with('error', 'Une erreur est survenue, veillez réssayer');
        }

       
        // $userinfos = Auth::user();
        // return view('compte.edit', compact('userinfos'));
    }

    public function ajouterSouhait($id)
    {
       if (Auth::user()) {
           $produits = Produit::whereId($id)->first();
           $souhaits = souhait::create([
                "designation" => $produits->designation,
                "prix" => $produits->prix_vente,
                "quantite" => '1',
                "photo" => $produits->photo,
                "produit_id" => $produits->id,
                "user_id" => Auth::user()->id
           ]);
           return redirect(route('user.dashbord'))->with('success_souhait' , 'Produit ajouté avec succès');
       }else {
           return redirect(route('user.connexion'))->with('erreur_souhait' , 'Connectez vous ou Inscrivez vous pour ajouter ce 
           produit à votre liste de souhait');
       }
    }
}
