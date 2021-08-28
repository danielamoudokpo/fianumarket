<?php

namespace App\Http\Controllers\AdsControllers;

use App\AdminClasses\Categorie;
use App\AdminClasses\Produit;
use App\AdsClasses\Clients;
use App\AdsClasses\Commande;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF as PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    //
    public function index(){
        $les_categories = [];
        $les_categories = Categorie::all();
        $les_produits = Produit::with('belongto_categorie', 'belongto_sous_categorie')->get();
        return view('panier.panier',  compact('les_categories', 'les_produits'));
    }

    // checkout index
    public function checkout_index()
    {
        $userinfos = Auth::user();
        $les_categories = [];
        $les_categories = Categorie::all();   
       return view('checkout.checkout', compact('les_categories' , 'userinfos'));
    }
  
// ajout d'un élément dans le panier
    public function ajout_panier(Request $request , $id){
        $produit = Produit::find($id);
        $qte = 0;
        if (!isset($request->qte) || $request->qte== "") {
           $qte = 1;
        }else {
            $qte = $request->qte;
        }
 
        if(!$produit) {
 
            abort(404);
 
        }
 
        $panier = session()->get('vinedos_client_digital_sopping_cart');
 
        // si le panier est vide on insert le premier produit
        if(!$panier) {
 
            $panier = [
                    $id => [
                        "name" => $produit->designation,
                        "reference" => $produit->reference,
                        "quantite" => $qte,
                        "prix_unitaire" => $produit->prix_vente,
                        "photo" => $produit->photo
                    ]
            ];
 
            session()->put('vinedos_client_digital_sopping_cart', $panier);
 
            return redirect()->back()->with('success', 'Produit ajouté au panier');
        }
 
        // si le panier n'est panier vide on voit si le produit existe déjà et on incrémente la quantité
        if(isset($panier[$id])) {
 
            $panier[$id]['quantite']++;
 
            session()->put('vinedos_client_digital_sopping_cart', $panier);
 
            return redirect()->back()->with('success', 'Produit ajouté avec succès');
 
        }
 
        // if item not exist in panier then add to panier with quantite = 1
        $panier[$id] = [
            "name" => $produit->designation,
            "reference" => $produit->reference,
            "quantite" => 1,
            "prix_unitaire" => $produit->prix_vente,
            "photo" => $produit->photo
        ];
 
        session()->put('vinedos_client_digital_sopping_cart', $panier);
 
        return redirect()->back()->with('success', 'Produit ajouté avec succès');
    }

    // suppression d'un élément dans le panier
    public function update_panier(Request $request)
    {
        {
            if($request->id and $request->quantite)
            {
                $panier = session()->get('vinedos_client_digital_sopping_cart');
     
                $panier[$request->id]["quantite"] = $request->quantite;
     
                session()->put('vinedos_client_digital_sopping_cart', $panier);
     
                session()->flash('success', 'Mise à jour avec succès');
            }
        }
    }

    // Mdification de la quantité 
    public function remove_panier(Request $request)
    {
        if($request->id) {
 
            $panier = session()->get('vinedos_client_digital_sopping_cart');
 
            if(isset($panier[$request->id])) {
 
                unset($panier[$request->id]);
 
                session()->put('vinedos_client_digital_sopping_cart', $panier);
            }
 
            session()->flash('success', 'Produit supprimé avec succès');
        }
    }

    // validation information 
    public function info_validation(Request $request)
    {
        $return = [];
        $panier = [];
        $produits = [];
        $current_user_id = 0;
        $total = 0;
        $livraison = 5000;
        $i = 0;
        $session_id = session()->getId();
        $date_commande = date('YY-dd-mm');
        $data = $request->validate([
           'nom' => 'required|min:3',
           'prenom' => 'required|min:3',
           'email' => 'required|email',
           'telephone' => '',
           'pays' => 'required',
        //    'pays' => 'in:Togo,Burkina-faso,Mali, Côte d\'ivoire, Niger',
           'ville' => 'required|string',
       ]);

       $validation = Clients::create([
           'email' => $request->email,
           'nom' => $request->nom,
           'prenom' => $request->prenom,
           'telephone' => $request->telephone,
           'pays' => $request->pays,
           'ville' => $request->ville,
           'session_id' => $session_id
       ]);
       if ($validation) {
           $current_user_id = $validation->id;
           if (session('vinedos_client_digital_sopping_cart')) {
               $panier = session('vinedos_client_digital_sopping_cart');

            foreach($panier as $id => $details){
                $total += $details['prix_unitaire'] * $details['quantite'] ;
                    $produits['produit'.$i]['id'] = $id;
                    $produits['produit'.$i]['reference'] = $details['reference'];
                    $produits['produit'.$i]['qteCommande'] = $details['quantite'];
                    $produits['produit'.$i]['nom'] = $details['name'];
                    $produits['produit'.$i]['prix_unitaire'] = $details['prix_unitaire'];
                    $i++;
            }
                    
           }

           $insert_commande = Commande::create([
               'user_id' => $current_user_id,
               'produits' => serialize($produits),
               'total' => $total,
               'session_id' => $session_id,
               'date_commande' => now(),
               'frais_livraison' => $livraison
           ]);
          

           if ($insert_commande) {
            
            return redirect(route('emvor.index_checkout'))->with('success', 'Commande éffectué');
           

           }
       }
    }

    public function ma_commande()
    {
        # code... 
        return view('checkout.ma_commande');
    }

    // Generate PDF
    public function createPDF(Request $request) {
        // $data = Produit::all();
  
        // if ($request->ajax()) {
            $pdf = PDF::loadView('checkout.liste_achat');
            // download PDF file with download method
            return $pdf->download('ma_commande_chez_emvor.pdf');
        // }
        
      }

      public function commandes_client()
      {
         return view('checkout.liste_achat');
      }
  
}
