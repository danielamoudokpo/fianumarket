<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>FIANU MARKET-Accueil</title>
	<meta charset="UTF-8">
	<meta name="description" content=" FIANU MARKET | Meilleur site d'ecommerce | Vente de produit de toutes cartégorie | Livraison partout dans le monde | Prestation de services | Promotion d'évèments ">
	<meta name="keywords" content="achat, vêtements, eCommerce, évènement , service , togo site ecommerce , meilleur site ecommerce , site de vente fiable , ">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('ads_x/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" href="{{asset('ads_x/css/bootstrap.css') }}"/>
	<link rel="stylesheet" href="{{asset('ads_x/css/font-awesome.min.css') }}"/>
	<link rel="stylesheet" href="{{asset('ads_x/css/flaticon.css') }}"/>
	<link rel="stylesheet" href="{{asset('ads_x/css/slicknav.min.css') }}"/>
	<link rel="stylesheet" href="{{asset('ads_x/css/jquery-ui.min.css') }}"/>
	<link rel="stylesheet" href="{{asset('ads_x/css/owl.carousel.min.css') }}"/>
	<link rel="stylesheet" href="{{asset('ads_x/css/animate.css') }}"/>
	<link rel="stylesheet" href="{{asset('ads_x/css/style.css') }}"/>

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<div class="lds-roller" style="display: none;"><div id="myloader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>

	{{-- <div id="preloder filter_loader">
		<div class="loader"></div>
	</div> --}}

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="{{route('shop.index')}}" class="site-logo">
							<strong>Logo</strong>
							{{-- <img style="height: 60px;" src="{{asset('fianu-market-trouge.png') }}" alt=""> --}}
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Lancer une recherche ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
							<a href="{{route('user.connexion')}}">Connexion</a> || <a href="{{route('user.inscription')}}">Inscription</a>
							</div>
							
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<?php $total = 0 ;?>
                                    @if(session('vinedos_client_digital_sopping_cart'))
                                        <?php echo '<span>'.count(session('vinedos_client_digital_sopping_cart')).'</span>' ;?>
                                        @else
										<span>0</span>
                                    @endif
								</div>
							<a href="{{route('shop.panier_index')}}">Votre panier</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
                <li><a href="{{route('shop.index')}}">Accueil</a></li>
					{{-- <li><a href="#">Chaussure</a></li>
					<li><a href="#">Habit</a></li> --}}
					{{-- <li><a href="#">Jewelry
						<span class="new">New</span>
					</a></li> --}}
					<li><a href="#">Catégories</a>
						<ul class="sub-menu">
							@foreach ($les_categories as $categories)
								<li id="{{$categories->id}}"><a href="{{route('shop.boutique.categorie', ['categorie_key' => $categories->id])}}">{{$categories->designation}}</a></li>
							@endforeach
						</ul>
                    </li>
				<li><a href="{{route('shop.boutique')}}">Boutique</a></li>
				<li><a href="{{route('liste.evenements')}}">Evenement</a></li>
				<li><a href="{{route('service.projet')}}">Services</a></li>
				<li style="float: right;"><a href="{{route('user.dashbord')}}">Compte</a></li>
					<li style="float: right;"><a href="#">Nous contacter</a></li>
					{{-- <li style="float: right;"><a href="#">A propos</a></li> --}}
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->

	@yield('content')


	<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<div class="banner set-bg" data-setbg="{{asset('ads_x/img/banner-bg.jpg') }}">
				<div class="tag-new">FIANUMARKET</div>
				<span class="text-white" >FAITE VOTRE CHOIX</span>
				<h2 class="text-white" >NOUS VOUS LIVRONS</h2>
				<a href="#" class="site-btn" >BOUTIQUE</a>
			</div>
		</div>
	</section>
	<!-- Banner section end  -->


	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.html">
					<h6 style="color: wheat;">Logo</h6>
					{{-- <img style="height: 100px;" src="{{asset('fianu-market-trouge.png') }}" alt=""> --}}
				</a>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-3">
					<div class="footer-widget about-widget">
						<h2>A propos</h2>
						<p>Nous vendons et nous livrons dans la plus grande partie du Togo. .</p>
						<img src="{{asset('ads_x/img/cards.png') }}" alt="">
					</div>
				</div>
				<div class="col-lg-3 col-sm-3">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<ul>
							<li><a href="">A propos de nous</a></li>
							<li><a href="">Retour de commande</a></li>
							<li><a href="">Livraison</a></li>
						</ul>
						<ul>
							<li><a href="">Support</a></li>
							<li><a href="">Condition d'utilisation</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-3">
					<div class="footer-widget contact-widget">
						<h2>ADRESSE</h2>
						<div class="con-info">
							<span>Créateur.</span>
							<p> </p>
						</div>
						<div class="con-info">
							<span>Lieu.</span>
							<p>Lomé Togo </p>
						</div>
						<div class="con-info">
							<span>Tel.</span>
							<p>+228 </p>
						</div>
						<div class="con-info">
							<span>Email.</span>
							<p>contact@togo-mall.com</p>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<div class="footer-widget about-widget">
							<h2>Nos réseau sociaux</h2>
							<ul>
								<li><i class="fa fa-facebook text-white" style="padding: 10px"></i> <a href="">Facebook </a></li>
								<li><i class="fa fa-instagram text-white" style="padding: 10px"></i><a href="">Instagram </a></li>
								<li><i class="fa fa-twitter text-white" style="padding: 10px"></i><a href="">Twitter </a>   </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<p class="text-white text-center mt-5">Togo Mall  &copy;<script>document.write(new Date().getFullYear());</script> <a href="" target="_blank"></a></p>
			</div>
		</div>
    </section>
    
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('ads_x/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{asset('ads_x/js/bootstrap.min.js') }}"></script>
	<script src="{{asset('ads_x/js/jquery.slicknav.min.js') }}"></script>
	<script src="{{asset('ads_x/js/owl.carousel.min.js') }}"></script>
	<script src="{{asset('ads_x/js/jquery.nicescroll.min.js') }}"></script>
	<script src="{{asset('ads_x/js/jquery.zoom.min.js') }}"></script>
	<script src="{{asset('ads_x/js/jquery-ui.min.js') }}"></script>
	<script src="{{asset('ads_x/js/main.js') }}"></script>
	<script src="{{asset('ads_x/js/bootstrap.js') }}"></script>

	{{-- <script src="{{asset('ads_x/js/range.js') }}"></script> --}}

    @yield('script')
	</body>
</html>
