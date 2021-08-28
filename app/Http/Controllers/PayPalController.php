<?php

namespace App\Http\Controllers;

use App\AdsClasses\Clients;
use App\AdsClasses\Commande;
use App\Paiement;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{
    public function payment(Request $request)
    {
        //    client/session
        $return = [];
        $panier = [];
        $produits = [];
        $current_user_id = 0;
        $total = 0;
        $livraison = 5000;
        $i = 0;
        $session_id = session()->getId();
        $date_commande = date('YY-dd-mm');
        $data = [];
        // paypal code
        if (session('emvor_client_digital_sopping_cart')) {
            $panier = session('emvor_client_digital_sopping_cart');

         foreach($panier as $id => $details){
                $total += $details['prix_unitaire'] * $details['quantite'] ;
                $data['items'] = [
                    [
                        'name' => 'emvor.com',
                        'price' => $total,
                        'desc'  => 'Description goes herem',
                        'qty' => $details['quantite']
                    ]
                ];
                $i++;
            }

        }
  
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $total;
  
        $provider = new ExpressCheckout;
  
        $response = $provider->setExpressCheckout($data);
  
        $response = $provider->setExpressCheckout($data, true);
  
        return redirect($response['paypal_link']);
        // /end paypal code


    
        $data_client = $request->validate([
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
            if (session('emvor_client_digital_sopping_cart')) {
                $panier = session('emvor_client_digital_sopping_cart');
 
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

            $insert_paiment = Paiement::create([
                'user_id' => $current_user_id,
                'user_session' =>  $session_id,
                'paiment_montant' => $total,
                'paiement_status' => '1',
                'paiement_description' => 'Paiement chez emvor.com',
                'paiment_date' => NOW(),
                'paiement_id' => $data['invoice_id'],
                'commande_id' => $insert_commande['id']
            ]);
           
 
            if ($insert_commande) {
             
             return redirect(route('emvor.index_checkout'))->with('success', 'Commande éffectué');
            
 
            }
        }
        // end
        
    }
   
    public function cancel()
    {
        dd('Sorry you payment is canceled');
    }
  
    public function success(Request $request)
    {
        $provider = new ExpressCheckout();
        $response = $provider->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Your payment was successful. You can create success page here.');
        }
  
        dd('Something is wrong.');
    }
}
