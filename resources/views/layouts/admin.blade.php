<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>FIANU MARKET - ADMIN</title>

        <link href="{{ asset('fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
        <link href="{{ asset('fonts/font-awesome-4/css/font-awesome.css') }}" rel="stylesheet" />
        <link href="{{ asset('fonts/font-awesome-4/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('fonts/fontawesome-pro-5/css/fontawesome.css') }}" rel="stylesheet" />
        <link href="{{ asset('fonts/fontawesome-pro-5/css/fontawesome.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('resources/vendors/select2/css/select2.min.css') }}">
        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{asset('resources/vendors/flatpickr/flatpickr.min.css') }}" />

        <link rel="stylesheet" href="{{asset('resources/vendors/zwicon/zwicon.min.css') }}">
        <link rel="stylesheet" href="{{asset('resources/vendors/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{asset('resources/vendors/overlay-scrollbars/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{asset('resources/vendors/fullcalendar/core/main.min.css') }}">
        <link rel="stylesheet" href="{{asset('resources/vendors/fullcalendar/daygrid/main.min.css') }}">

        <!-- App styles -->
        <link rel="stylesheet" href="{{asset('resources/css/app.min.css') }}">
    </head>

    <body data-sa-theme="1">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <header class="header" style="background-color: rgb(2, 3, 88)">
                
                <div class="navigation-trigger d-xl-none" data-sa-action="aside-open" data-sa-target=".sidebar">
                    <i class="zwicon-hamburger-menu"></i>
                </div>

                <div class="logo d-none d-sm-inline-flex">
                    <a  href="{{route('admin.home')}}"><img style="width: 200px;" src="{{asset('fianu-market-tblanc.png') }}" alt="logo-vinedos"></a>
                </div>

                <ul class="top-nav">
                    <li class="d-xl-none"><a href="#" data-sa-action="search-open"><i class="zwicon-search"></i></a></li>

                    <li class="dropdown d-none d-sm-inline-block">
                        <a href="#" data-toggle="dropdown"><i class="zwicon-grid"></i></a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
                            <div class="row app-shortcuts">
                                <a class="col-4 app-shortcuts__item" href="#">
                                    <i class="zwicon-calendar-never"></i>
                                    <small class="">Message reçus</small>
                                </a>
                                <a class="col-4 app-shortcuts__item" href="#">
                                    <i class="zwicon-document"></i>
                                    <small class="">Parametre du Compte</small>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="d-none d-sm-inline-block">
                        <a href="#" class="top-nav__themes" data-sa-action="aside-open" data-sa-target=".themes"><i class="zwicon-palette"></i></a>
                    </li>

                </ul>

                <div class="clock d-none d-md-inline-block">
                    <div class="time">
                        <span class="time__hours"></span>
                        <span class="time__min"></span>
                        <span class="time__sec"></span>
                    </div>
                </div>
            </header>

            <aside class="sidebar " style="background-color: rgb(2, 1, 26)">
                <div class="scrollbar">
                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                            <img class="user__img" src="{{asset('demo/img/profile-pics/8.jpg') }}" alt="">
                            <div>
                                @if (Auth::check())
                                <div class="user__name">{{ Auth::user()->name }}</div>
                                <div class="user__email">{{ Auth::user()->email }}</div>
                                @endif
                                
                            </div>
                        </div>

                        <div class="dropdown-menu dropdown-menu--invert">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Deconnexion</a>
                        </div>
                    </div>

                    <ul class="navigation">
                    <li class="{{Route::currentRouteNamed('admin.home') ? 'navigation__active' : ''}}">
                        <a href="{{route('admin.home')}}"><i class="zwicon-home"></i> Accueil</a>
                    </li>

                        <li class="navigation__sub {{ Route::currentRouteNamed('admin.categorie.liste')
                        ||Route::currentRouteNamed('admin.categorie.create')
                        ||Route::currentRouteNamed('admin.produit.create')
                        ||Route::currentRouteNamed('admin.produit.liste')
                         ? 'navigation__sub--active navigation__sub--toggled' : ''}}">
                            <i class="arrow" data-feather="chevron-down"></i>
                            <a href="#"><i class="zwicon-three-h"></i> Catalogue</a>
                            <ul>
                                <li class="{{Route::currentRouteNamed('admin.produit.liste') 
                                ||Route::currentRouteNamed('admin.produit.create') ? 'navigation__active' : ''}}">
                                    <a href="{{route('admin.produit.liste')}}">Produits</a>
                                </li>
                                <li class="{{Route::currentRouteNamed('admin.categorie.liste') 
                                 ||Route::currentRouteNamed('admin.categorie.create') ? 'navigation__active' : ''}}">
                                    <a href="{{route('admin.categorie.liste')}}">Catégories</a>
                                </li>
                                <li class="{{Route::currentRouteNamed('admin.sous_categorie.liste') 
                                 ||Route::currentRouteNamed('admin.sous_categorie.create') ? 'navigation__active' : ''}}">
                                    <a href="{{route('admin.sous_categorie.liste')}}">Sous catégories</a>
                                </li>
                            </ul>
                        </li>

                        <li class="">
                            <a href="{{route('admin.fournisseur.liste')}}"><i class="zwicon-home"></i> Fournisseurs</a>
                        </li>

                        <li class="navigation__sub {{ Route::currentRouteNamed('admin.commande.paiement')
                        ||Route::currentRouteNamed('admin.commande.sans_paiment')
                         ? 'navigation__sub--active navigation__sub--toggled' : ''}}">
                            <i class="arrow" data-feather="chevron-down"></i>
                            <a href="#"><i class="zwicon-three-h"></i> Commande</a>
                            
                            <ul>
                                <li class="{{Route::currentRouteNamed('admin.commande.sans_paiment') ? 'navigation__active' : ''}}">
                                    <a href="{{route('admin.commande.sans_paiment')}}">Commandes reçues</a>
                                </li>
                                {{-- <li class="{{Route::currentRouteNamed('admin.commande.paiement') ? 'navigation__active' : ''}}">
                                    <a href="{{route('admin.commande.paiement')}}">Avec paiement</a>
                                </li> --}}
                            </ul>
                        </li>

                        {{-- evenement --}}
                        <li class="navigation__sub {{ Route::currentRouteNamed('admin.evenement.create')
                        ||Route::currentRouteNamed('admin.evenement.liste')
                        ||Route::currentRouteNamed('admin.type_evenement.liste')
                        ||Route::currentRouteNamed('admin.type_evenement.create')
                         ? 'navigation__sub--active navigation__sub--toggled' : ''}}">
                            <i class="arrow" data-feather="chevron-down"></i>
                            <a href="#"><i class="zwicon-three-h"></i> Evenement</a>
                            <ul>
                                <li class="{{Route::currentRouteNamed('admin.evenement.create')  ? 'navigation__active' : ''}}">
                                    <a href="{{route('admin.evenement.create')}}">Créer un évenement</a>
                                </li>
                                <li class="{{Route::currentRouteNamed('admin.evenement.liste') ? 'navigation__active' : ''}}">
                                    <a href="{{route('admin.evenement.liste')}}">Les évenements</a>
                                </li>
                                <li class="{{Route::currentRouteNamed('admin.type_evenement.liste') 
                                 || Route::currentRouteNamed('admin.type_evenement.create') ? 'navigation__active' : ''}}">
                                    <a href="{{route('admin.type_evenement.liste')}}">Catégorie évenements</a>
                                </li>
                            </ul>
                        </li>

                        {{-- evenement --}}
                        <li class="navigation__sub {{ Route::currentRouteNamed('admin.service.create')
                        ||Route::currentRouteNamed('admin.service.liste')
                         ? 'navigation__sub--active navigation__sub--toggled' : ''}}">
                            <i class="arrow" data-feather="chevron-down"></i>
                            <a href="#"><i class="zwicon-three-h"></i> Services</a>
                            <ul>
                                <li class="{{Route::currentRouteNamed('admin.service.create')  ? 'navigation__active' : ''}}">
                                    <a href="{{route('admin.service.create')}}">Ajouter un service</a>
                                </li>
                                <li class="{{Route::currentRouteNamed('admin.service.liste') ? 'navigation__active' : ''}}">
                                    <a href="{{route('admin.service.liste')}}">Services</a>
                                </li>
                                <li class="{{Route::currentRouteNamed('admin.projet.liste') ? 'navigation__active' : ''}}">
                                    <a href="{{route('admin.projet.liste')}}">Les projets</a>
                                </li>
                            </ul>
                        </li>

                        <li class="navigation__sub">
                            <a href="#"><i class="zwicon-repository"></i>Statistique</a>

                            <ul>
                                <li>
                                    <a href="">Chiffre d'affaire</a>
                                </li>
                                <li>
                                <a href="">Commandes</a>
                                </li>
                                <li>
                                    <a href="">Paiements</a>
                                </li>
                                
                            </ul>
                        </li>


                        <li class="{{Route::currentRouteNamed('admin.client.liste') ? 'navigation__active' : ''}}">
                            <a href="{{route('admin.client.liste')}}"><i class="zwicon-home"></i> Clients</a>
                        </li>

                        <li class="{{Route::currentRouteNamed('admin.contact.liste') ? 'navigation__active' : ''}}">
                            <a href="{{route('admin.contact.liste')}}"><i class="zwicon-home"></i> Contacts</a>
                        </li>

                        <li class="navigation__sub">
                            <a href="#"><i class="zwicon-layout-2"></i> Livraison</a>
                            <ul>
                                <li>
                                    <a href="">Zone</a>
                                </li>
                            </ul>
                        </li>

                        

                        <li class="navigation__sub">
                            <a href="#"><i class="zwicon-repository"></i>Plus</a>

                            <ul>
                                <li>
                                    <a href="profile-about.html">Compte</a>
                                </li>
                                <li>
                                <a href="{{route('admin.logout')}}">Deconnexion</a>
                                </li>
                                <li>
                                    <a href="lockscreen.html">Veille</a>
                                </li>
                                
                            </ul>
                        </li>
                    </ul>
                </div>
            </aside>
            <div class="themes">
                <div class="scrollbar">
                    <a href="#" class="themes__item active" data-sa-value="1"><img src="{{asset('resources/img/bg/1.jpg') }}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="2"><img src="{{asset('resources/img/bg/2.jpg') }}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="3"><img src="{{asset('resources/img/bg/3.jpg') }}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="4"><img src="{{asset('resources/img/bg/4.jpg') }}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="5"><img src="{{asset('resources/img/bg/5.jpg') }}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="6"><img src="{{asset('resources/img/bg/6.jpg') }}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="7"><img src="{{asset('resources/img/bg/7.jpg') }}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="8"><img src="{{asset('resources/img/bg/8.jpg') }}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="9"><img src="{{asset('resources/img/bg/9.jpg') }}" alt=""></a>
                    <a href="#" class="themes__item" data-sa-value="10"><img src="{{asset('resources/img/bg/10.jpg') }}" alt=""></a>
                </div>
            </div>

            <section class="content" style="background-color: rgb(12, 1, 73)">
                {{-- <header class="content__title">
                <h1>Dashboard <small>Bienvenu {{Auth::User()->name}}</small></h1>

                    <div class="actions">
                    <a href="{{route('admin.home')}}" class="actions__item zwicon-refresh-double"></a> --}}

                        {{-- <div class="dropdown actions__item">
                            <i data-toggle="dropdown" class="zwicon-more-h"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Rafraichir</a>
                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                <a href="#" class="dropdown-item">Settings</a>
                            </div>
                        </div> --}}
                    {{-- </div>
                </header> --}}


                @yield('content')

                {{-- <div class="row">
                    
                </div> --}}
            </section>
        </main>


        <footer class="footer d-none d-sm-block bottom-0">
            <p>© FIANU MARKET Tout droit reservé</p>

            <ul class="footer__nav">
                {{-- <a href="#">Homepage</a>
                <a href="#">Company</a>
                <a href="#">Support</a>
                <a href="#">News</a>
                <a href="#">Contacts</a> --}}
            </ul>
        </footer>
        <!-- Javascript -->
        <!-- Vendors -->
        <script src="{{asset('resources/vendors/jquery/jquery.min.js') }}"></script>
        <script src="{{asset('resources/vendors/popper.js/popper.min.js') }}"></script>
        <script src="{{asset('resources/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{asset('resources/vendors/overlay-scrollbars/jquery.overlayScrollbars.min.js')}}"></script>
        <script src="{{asset('resources/vendors/select2/js/select2.full.min.js') }}"></script>
        <script src="{{asset('resources/vendors/flatpickr/flatpickr.min.js') }}"></script>

        <script src="{{asset('resources/vendors/flot/jquery.flot.js') }}"></script>
        <script src="{{asset('resources/vendors/flot/jquery.flot.resize.js') }}"></script>
        <script src="{{asset('resources/vendors/flot/flot.curvedlines/curvedLines.js') }}"></script>
        <script src="{{asset('resources/vendors/peity/jquery.peity.min.js') }}"></script>
        <script src="{{asset('resources/vendors/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{asset('resources/vendors/jqvmap/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{asset('resources/vendors/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
        <script src="{{asset('resources/vendors/fullcalendar/core/main.min.js') }}"></script>
        <script src="{{asset('resources/vendors/fullcalendar/daygrid/main.min.js') }}"></script>

        {{-- vendor data table --}}
        <script src="{{asset('resources/vendors/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('resources/vendors/datatables/datatables-buttons/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('resources/vendors/datatables/datatables-buttons/buttons.print.min.js')}}"></script>
        <script src="{{asset('resources/vendors/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('resources/vendors/datatables/datatables-buttons/buttons.html5.min.js')}}"></script>

        <!-- App functions and actions -->
        <script src="{{asset('resources/js/app.min.js') }}"></script>

        @yield('script')
    </body>

</html>