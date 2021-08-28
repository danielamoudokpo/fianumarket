<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/shop_@_admin_@_2020', function () {
//     return view('welcome');
// });

Auth::routes();
// Route::get('/shop_@_admin_@_2020/logout', 'AdminControllers\Auth\LoginController@adminLogout')->name('admin.logout');

Route::get('/shop_@_admin_@_2020/home', 'AdminControllers\HomeController@index')->name('admin.home');
Route::get('/shop_@_admin_@_2020/connexion', 'AdminControllers\LoginController@showLoginPage')->name('admin.connexion');
Route::post('/shop_@_admin_@_2020/connexion', 'AdminControllers\LoginController@connexion')->name('admin.envoie.connexion');
Route::post('/shop_@_admin_@_2020/logout', 'auth@logout')->name('admin.logout');
Route::get('/shop_@_admin_@_2020', 'AdminControllers\HomeController@index')->name('admin.home');

// category route
Route::get('/shop_@_admin_@_2020/categrories' , 'AdminControllers\CategorieController@index')->name('admin.categorie.liste');
Route::get('/shop_@_admin_@_2020/categrories/ajout' , 'AdminControllers\CategorieController@create')->name('admin.categorie.create');
Route::get('/shop_@_admin_@_2020/categrories/{id}/edit' , 'AdminControllers\CategorieController@edit')->name('admin.categorie.edit');
Route::patch('/shop_@_admin_@_2020/categrories/update/{id}' , 'AdminControllers\CategorieController@update')->name('admin.categorie.update');
Route::delete('/shop_@_admin_@_2020/categrories/{id}' , 'AdminControllers\CategorieController@destroy')->name('admin.categorie.destroy');
Route::post('/shop_@_admin_@_2020/categrories/ajout' , 'AdminControllers\CategorieController@store')->name('admin.categorie.store');

// sous_categorie route
Route::get('/shop_@_admin_@_2020/sous_categories' , 'AdminControllers\Sous_categorieController@index')->name('admin.sous_categorie.liste');
Route::get('/shop_@_admin_@_2020/sous_categories/ajout' , 'AdminControllers\Sous_categorieController@create')->name('admin.sous_categorie.create');
Route::get('/shop_@_admin_@_2020/sous_categories/{id}/edit' , 'AdminControllers\Sous_categorieController@edit')->name('admin.sous_categorie.edit');
Route::patch('/shop_@_admin_@_2020/sous_categories/update/{id}' , 'AdminControllers\Sous_categorieController@update')->name('admin.sous_categorie.update');
Route::delete('/shop_@_admin_@_2020/sous_categories/{id}' , 'AdminControllers\Sous_categorieController@destroy')->name('admin.sous_categorie.destroy');
Route::post('/shop_@_admin_@_2020/sous_categories/ajout' , 'AdminControllers\Sous_categorieController@store')->name('admin.sous_categorie.store');

// / products route
Route::get('/shop_@_admin_@_2020/produits' , 'AdminControllers\ProduitController@index')->name('admin.produit.liste');
Route::get('/shop_@_admin_@_2020/produits/ajout' , 'AdminControllers\ProduitController@create')->name('admin.produit.create');
Route::get('/shop_@_admin_@_2020/produits/{id}/edit' , 'AdminControllers\ProduitController@edit')->name('admin.produit.edit');
Route::patch('/shop_@_admin_@_2020/produits/update/{id}' , 'AdminControllers\ProduitController@update')->name('admin.produit.update');
Route::delete('/shop_@_admin_@_2020/produits/{id}' , 'AdminControllers\ProduitController@destroy')->name('admin.produit.destroy');
Route::get('/shop_@_admin_@_2020/produits/{id}' , 'AdminControllers\ProduitController@show')->name('admin.produit.show');
Route::post('/shop_@_admin_@_2020/produits/ajout' , 'AdminControllers\ProduitController@store')->name('admin.produit.store');
Route::post('/shop_@_admin_@_2020/produits/fetch' , 'AdminControllers\ProduitController@fetch_sous_categorie')->name('admin.produit.fetch_sous_categorie');

// / clients route
Route::get('/shop_@_admin_@_2020/clients' , 'AdminControllers\ClientsController@index')->name('admin.client.liste');
Route::get('/shop_@_admin_@_2020/clients/detail' , 'AdminControllers\ClientsController@show')->name('admin.client.show');
Route::delete('/shop_@_admin_@_2020/clients/{id}' , 'AdminControllers\ClientsController@destroy')->name('admin.client.destroy');

// / commande route
Route::get('/shop_@_admin_@_2020/commande/avec_paiement' , 'AdminControllers\CommandeController@avec_paiement')->name('admin.commande.paiement');
Route::get('/shop_@_admin_@_2020/commande/sans_paiment' , 'AdminControllers\CommandeController@sans_paiement')->name('admin.commande.sans_paiment');
Route::delete('/shop_@_admin_@_2020/commande/supprimer/{id}' , 'AdminControllers\CommandeController@destroy')->name('admin.commande.destroy');
Route::get('/shop_@_admin_@_2020/commande/infos/{id}' , 'AdminControllers\CommandeController@show')->name('admin.commande.show');

// contact root
Route::get('/shop_@_admin_@_2020/contacts' , 'AdminControllers\ContactController@index')->name('admin.contact.liste');
Route::get('/shop_@_admin_@_2020/contact/detail' , 'AdminControllers\ContactController@show')->name('admin.contact.show');
Route::delete('/shop_@_admin_@_2020/contact/{id}' , 'AdminControllers\ContactController@destroy')->name('admin.contact.destroy');

//admin type entreprise
Route::get('/shop_@_admin_@_2020/type_evenement', 'AdminControllers\TypeEvenementController@index')->name('admin.type_evenement.liste');
Route::get('/shop_@_admin_@_2020/type_evenement/nouveau', 'AdminControllers\TypeEvenementController@create')->name('admin.type_evenement.create');
Route::post('/shop_@_admin_@_2020/type_evenement/nouveau', 'AdminControllers\TypeEvenementController@store')->name('admin.type_evenement.store');
Route::delete('/shop_@_admin_@_2020/type_evenement/{id}/delete', 'AdminControllers\TypeEvenementController@destroy')->name('admin.type_evenement.delete');
Route::get('/shop_@_admin_@_2020/type_evenement/{id}/detail', 'AdminControllers\TypeEvenementController@show')->name('admin.type_evenement.detail');
Route::get('/shop_@_admin_@_2020/type_evenement/{id}/edit', 'AdminControllers\TypeEvenementController@show')->name('admin.type_evenement.edit');
Route::post('/shop_@_admin_@_2020/type_evenement/{id}/update', 'AdminControllers\TypeEvenementController@update')->name('admin.type_evenement.update');
Route::post('/shop_@_admin_@_2020/type_evenement/{id}/detail', 'AdminControllers\TypeEvenementController@show')->name('admin.type_evenement.show');

//admin evenement
Route::get('/shop_@_admin_@_2020/evenement', 'AdminControllers\EvenementController@index')->name('admin.evenement.liste');
Route::get('/shop_@_admin_@_2020/evenement/nouveau', 'AdminControllers\EvenementController@create')->name('admin.evenement.create');
Route::post('/shop_@_admin_@_2020/evenement/nouveau', 'AdminControllers\EvenementController@store')->name('admin.evenement.store');
Route::delete('/shop_@_admin_@_2020/evenement/{id}/delete', 'AdminControllers\EvenementController@destroy')->name('admin.evenement.destroy');
Route::get('/shop_@_admin_@_2020/evenement/{id}/detail', 'AdminControllers\EvenementController@show')->name('admin.evenement.detail');
Route::get('/shop_@_admin_@_2020/evenement/{id}/edit', 'AdminControllers\EvenementController@edit')->name('admin.evenement.edit');
Route::post('/shop_@_admin_@_2020/evenement/{id}/update', 'AdminControllers\EvenementController@update')->name('admin.evenement.update');
Route::post('/shop_@_admin_@_2020/evenement/{id}/detail', 'AdminControllers\EvenementController@show')->name('admin.evenement.show');

//admin services
Route::get('/shop_@_admin_@_2020/service', 'AdminControllers\ServicesController@index')->name('admin.service.liste');
Route::get('/shop_@_admin_@_2020/service/nouveau', 'AdminControllers\ServicesController@create')->name('admin.service.create');
Route::post('/shop_@_admin_@_2020/service/nouveau', 'AdminControllers\ServicesController@store')->name('admin.service.store');
Route::delete('/shop_@_admin_@_2020/service/{id}/delete', 'AdminControllers\ServicesController@destroy')->name('admin.service.destroy');
Route::get('/shop_@_admin_@_2020/service/{id}/detail', 'AdminControllers\ServicesController@show')->name('admin.service.detail');
Route::get('/shop_@_admin_@_2020/service/{id}/edit', 'AdminControllers\ServicesController@edit')->name('admin.service.edit');
Route::post('/shop_@_admin_@_2020/service/{id}/update', 'AdminControllers\ServicesController@update')->name('admin.service.update');
Route::post('/shop_@_admin_@_2020/service/{id}/detail', 'AdminControllers\ServicesController@show')->name('admin.service.show');

//admin services
Route::get('/shop_@_admin_@_2020/projet', 'AdminControllers\ProjetController@index')->name('admin.projet.liste');
Route::delete('/shop_@_admin_@_2020/projet/{id}/delete', 'AdminControllers\ProjetController@destroy')->name('admin.projet.destroy');
Route::get('/shop_@_admin_@_2020/projet/{id}/detail', 'AdminControllers\ProjetController@show')->name('admin.projet.show');


//fournisseur 
Route::get('/shop_@_admin_@_2020/fournisseur/liste', 'AdminControllers\FournisseurController@index')->name('admin.fournisseur.liste');
Route::get('/shop_@_admin_@_2020/fournisseur/nouvel', 'AdminControllers\FournisseurController@create')->name('admin.fournisseur.create');
Route::post('/shop_@_admin_@_2020/fournisseur/post', 'AdminControllers\FournisseurController@store')->name('admin.fournisseur.store');
Route::get('/shop_@_admin_@_2020/{id}/fournisseur/edit', 'AdminControllers\FournisseurController@edit')->name('admin.fournisseur.edit');
Route::get('/shop_@_admin_@_2020/{id}/fournisseur/detail', 'AdminControllers\FournisseurController@show')->name('admin.fournisseur.info');
Route::delete('/shop_@_admin_@_2020/{id}/fournisseur/delete', 'AdminControllers\FournisseurController@destroy')->name('admin.fournisseur.delete');
Route::post('/shop_@_admin_@_2020/{id}/fournisseur/update', 'AdminControllers\FournisseurController@update')->name('admin.fournisseur.update');



// --------------------------------------------------------------------------------------------------------------//
// ADS
// --------------------------------------------------------------------------------------------------------------//
// index
Route::get('/', 'AdsControllers\HomeController@index')->name('shop.index');
Route::get('/filtre/categogie/{categorie}' , 'AdsControllers\HomeController@get_cat_filter')->name('shop.index_filtre');
Route::post('/tous/produits', 'AdsControllers\HomeController@ajax_data')->name('shop.fetch_all_data');
Route::post('/index/fetch/categorie', 'AdsControllers\BoutiqueController@fetch_product_index')->name('shop.index.fetch');


Route::get('/user/connexion', 'AdsControllers\CompteController@showLoginPage')->name('user.connexion');
Route::get('/user/deconexion', 'AdsControllers\CompteController@deconnexion')->name('user.deconnexion');
Route::get('/user/inscription', 'AdsControllers\CompteController@showRegisterPage')->name('user.inscription');
Route::get('/user/compte/infos', 'AdsControllers\CompteController@infosUser')->name('user.infos')->middleware('App\Http\Middleware\AdsAuth');;
Route::post('/inscription', 'AdsControllers\CompteController@inscription')->name('user.envoie.inscription');
Route::post('/connexion', 'AdsControllers\CompteController@connexion')->name('user.envoie.connexion');

//user tableau de bord
Route::get('/user/compte', 'AdsControllers\CompteController@showDash')->name('user.dashbord')->middleware('App\Http\Middleware\AdsAuth');
Route::get('/user/compte/edit', 'AdsControllers\CompteController@infosEdit')->name('user.show.edit')->middleware('App\Http\Middleware\AdsAuth');
Route::post('/user/compte/editer', 'AdsControllers\CompteController@editer')->name('user.editer');

//user commande
Route::get('/user/commandes/liste', 'AdsControllers\CompteController@commandeUser')->name('user.commades.liste');
Route::get('/user/commandes/{id}/details', 'AdsControllers\CompteController@detailsCommande')->name('user.commades.details');
Route::patch('/user/commandes/{id}/supprimer', 'AdsControllers\CompteController@destroyCommande')->name('user.commades.supprimer');

//user souhait list
Route::get('/user/souhaits/liste', 'AdsControllers\CompteController@souhaits')->name('user.souhaits.liste');
Route::get('/user/souhaits/{id}/details', 'AdsControllers\CompteController@detailsSouhaits')->name('user.souhaits.detail');
Route::patch('/user/souhaits/{id}/supprimer', 'AdsControllers\CompteController@destroySouhaits')->name('user.souhaits.supprimer');
//Supprimer souhait
Route::patch('/user/souhaits/{id}/supprimer', 'AdsControllers\CompteController@destroySouhait')->name('user.souhaits.supprimer');

//user paiements story
Route::get('/user/paiements/liste', 'AdsControllers\CompteController@paiements')->name('user.paiements.liste');
Route::get('/ajout/souhait/{id}', 'AdsControllers\CompteController@ajouterSouhait')->name('shop.ajout_souhait');


// ads produits- Boutique
Route::get('/boutique', 'AdsControllers\BoutiqueController@lesProduits')->name('shop.boutique');
Route::get('/boutique/categorie/{categorie_key}', 'AdsControllers\BoutiqueController@getCategorie')->name('shop.boutique.categorie');
Route::post('/boutique/fetch', 'AdsControllers\BoutiqueController@fetch_product')->name('shop.boutique.fetch');
Route::get('/boutique/{categorie}', 'AdsControllers\BoutiqueController@filtre_categorie')->name('shop.filtre_categorie');

// ads produit detail
Route::get('/produit/{id}/detail', 'AdsControllers\ProduitController@getInfo')->name('shop.produit.detail');

// panier
Route::get('/ajout/{id}/panier', 'AdsControllers\PanierController@ajout_panier')->name('shop.ajout_panier');
Route::get('/panier/liste-produit', 'AdsControllers\PanierController@index')->name('shop.panier_index');
Route::patch('/panier/mis-a-jour', 'AdsControllers\PanierController@update_panier')->name('shop.update_panier');
Route::delete('/panier/suppresion', 'AdsControllers\PanierController@remove_panier')->name('shop.remove_panier');
Route::get('/checkout/recapitulatif', 'AdsControllers\PanierController@checkout_index')->name('shop.index_checkout');
Route::post('/checkout/validation', 'AdsControllers\PanierController@info_validation')->name('shop.validation_checkout');
Route::get('/checkout/pdf-page', 'AdsControllers\PanierController@commandes_client')->name('shop.commandes_client');
Route::get('/checkout/ma-commande', 'AdsControllers\PanierController@ma_commande')->name('shop.ma_commande');
Route::get('/checkout/generate', 'AdsControllers\PanierController@createPDF')->name('shop.generate');


// paypal
Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');

// contact
Route::get('contact', 'AdsControllers\ContactController@index')->name('contact.index');
Route::post('contact/store', 'AdsControllers\ContactController@store')->name('contact.store');

// ads evenements liste
Route::get('/evenement', 'AdsControllers\EvenementController@lesEvenements')->name('liste.evenements');
Route::get('/evenement/{categorie_key}', 'AdsControllers\EvenementController@getCategorie')->name('liste.evenements.categorie');
Route::post('/evenement/fetch', 'AdsControllers\EvenementController@fetch_evenement')->name('liste.evenements.fetch');
Route::get('/evenement/{categorie}', 'AdsControllers\EvenementController@filtre_evenement')->name('evenement.filtre_categorie');

// ads produit detail
Route::get('/evenement/{id}/detail', 'AdsControllers\EvenementController@getInfo')->name('evenement.detail');


// ads projet
Route::get('/service/soumettre-un-projet', 'AdsControllers\ProjetsController@create')->name('service.projet');
Route::post('/service/soumettre-un-projet', 'AdsControllers\ProjetsController@store')->name('service.projet.store');
