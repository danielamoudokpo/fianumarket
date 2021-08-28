<?php

namespace App\Http\Controllers\AdminControllers;

use App\AdminClasses\Projet;
use App\AdminClasses\Service;
use App\AdminClasses\User;
use App\AdsClasses\Commande;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\AdminAuth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projets = Projet::all();
        $projetTotal = Projet::count();
        $serviceTotal = Service::count();
        $clientTotal = User::count();
        $commandeTotal = Commande::count();
        return view('shop_@_admin_@_2020.home', compact('projets' ,'commandeTotal'  ,'clientTotal' , 'projetTotal' , 'serviceTotal'));
    }
}
