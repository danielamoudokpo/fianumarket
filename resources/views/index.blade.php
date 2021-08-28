@extends('layouts.ads')

@section('content')

     <!-- Main Slider Start -->
     <section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="{{asset('ads_x/img/bg.jpg')}}">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span style="font-size: 40px;">FIANUMARKET</span>
							<p style="font-size: 25px;">Votre platforme de vente de toutes catégories d'articles</p> 
							<p style="margin-top: -25px;">Nous vous livrons partout où vous êtes dans la sous région</p>
							<p style="margin-top: -25px;">Paiment  sécurisé ! </p>
							{{-- <a href="#" class="site-btn sb-line">BOUTIQUES</a> --}}
							<a href="{{route('shop.boutique')}}" class="site-btn sb-white">Je découvre</a>
						</div>
					</div>
				</div>
			</div>
			{{-- <div class="hs-item set-bg" data-setbg="{{asset('ads_x/img/bg-2.jpg') }}">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>denim jackets</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$29</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div> --}}
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->



	<!-- Features section -->
	<section class="features-section" >
		<div class="container-fluid" style="margin-bottom: 5px;">
			<div class="row">
				<div class="col-md-4 p-0 feature" style="background: rgb(255, 187, 0);">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="{{ asset('ads_x/img/icons/1.png') }}" alt="#">
						</div>
						<h2 style="color: white;">EVENEMENT</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature" >
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="{{ asset('ads_x/img/icons/2.png') }}" alt="#">
						</div>
						<h2>Produits à bon prix</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature" style="background: rgb(0, 0, 0); color: white;">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="{{ asset('ads_x/img/icons/3.png') }}" alt="#">
						</div>
						<h2 class="text-white">Livraison gratuite</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->


	<!-- letest product section -->
	{{-- <section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>LATEST PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
				<div class="product-item">
					<div class="pi-pic">
						<img src="{{asset('ads_x/img/product/1.jpg') }}" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<div class="tag-new">New</div>
						<img src="{{asset('ads_x/img/product/2.jpg') }}" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Black and White Stripes Dress</p>
					</div>
				</div>
				<div class="product-item">
					<div class="pi-pic">
						<img src="{{asset('ads_x/img/product/3.jpg') }}" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
						<div class="pi-pic">
							<img src="{{asset('ads_x/img/product/4.jpg') }}" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				<div class="product-item">
						<div class="pi-pic">
							<img src="{{asset('ads_x/img/product/6.jpg') }}" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
			</div>
		</div>
	</section> --}}
	<!-- letest product section end -->

	{{-- message --}}
	@if($message = Session::get('success'))
		<div class="alert alert-success alert-dismissible fade show">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">X</span>
			</button>
		<p>{{ $message }}</p>
		</div>
			@elseif($message = Session::get('erreur'))
				<div class="alert alert-danger">
				<p>{{ $message }}</p>
				</div>
				@elseif($message = Session::get('erreur_ref'))
					<div class="alert alert-danger">
					<p>{{ $message }}</p>
					</div>
			@elseif($message = Session::get('succes_souhait'))
				<div class="alert alert-danger">
				<p>{{ $message }}</p>
				</div>
	@endif

	{{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="{{asset('ads_x/assets/img/blog/blog-1.jpg')}}" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="{{asset('ads_x/assets/img/blog/blog-1.jpg')}}" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="{{asset('ads_x/assets/img/blog/blog-1.jpg')}}" alt="Third slide">
			</div>
			<div class="carousel-item active">
				<div class="d-block">
					<button class="btn bg-success text-white"> {{$les_categories[0]->designation}}</button>				
				</div>
			</div>
			@foreach ($les_categories as $categories)
				<div class="carousel-item">
					<div class="d-block">
						<button class="btn bg-success text-white "> {{$categories->designation}}</button>				
					</div>
				</div>
			@endforeach

		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div> --}}

	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container"><br><br>
			<div class="">
				<h4>Catégories phares</h4>
				<hr style="background-color: red; height: 0.5px;">
			</div><br>
			{{-- <ul class="product-filter-menu">
				@foreach ($les_categories as $categories)
				<li class="categories" id="{{$categories->id}}"><button class="site-btn sb-line sb-dark text-dark"> {{$categories->designation}}</button></li>
				@endforeach
				<h5><strong id="total_produit"></strong></h5>
			</ul> --}}

			<div  class="owl-carousel"  id="category_slider">
				@foreach ($les_categories as $categories)
					<div style="margin-left: 45px;" class="wow" data-wow-delay=".5s">
						<div class="d-block">
							<button class="site-btn sb-line sb-dark text-dark categories" id="{{$categories->id}}"> {{$categories->designation}}</button>				
						</div>
					</div>
				@endforeach

			</div>

			<div class="row" id="liste_produit">
				@if ($les_produits != "")
					@foreach ($les_produits as $produit)
					<div class="col-lg-4" style="padding-bottom:15px;">
						{{-- <div class="col-lg-4" style="padding-bottom:15px;"> --}}
						<div class="card" style="border-radius: 20px;">
							<div class="product-item">
							<a style="background: none;" href="{{route('shop.produit.detail', ['id' => $produit->id])}}">
								<div class="card-body" style="padding:0%;">
									<div class="pi-pic">
										@if ($produit->quantite > 0)
										<div class="tag-sale">Disponible</div>
										@else
											<div class="tag-sale">Stock épuisé</div>
										@endif
										<img style="border-radius: 20px;" src="{{ asset('images/image_produits/'.$produit->photo.'') }}" alt="">
										@if ($produit->quantite > 0)
										<div class="pi-links">
											<a href="{{route('shop.ajout_panier', ['id' => $produit->id])}}" class="add-card"><i class="flaticon-bag"></i><span>Ajouter au panier</span></a>
											<a href="{{route('shop.ajout_souhait', ['id' => $produit->id])}}" class="wishlist-btn"><i class="flaticon-heart"></i></a>
										</div>
										@else
											<div class="pi-links">
												<a href="{{route('shop.ajout_souhait', ['id' => $produit->id])}}" class="wishlist-btn"><i class="flaticon-heart"></i></a>
											</div>
										@endif

									</div>
								</div>
							</a>
							<div class="card-footer" style="padding: 5px; height: 150px;">
								<div class="pi-text">
										<?php
											$final_price = intval($produit->prix_vente);
											echo '<h6>';
											echo number_format($final_price, 0 , '.' , ' ') ;
											echo 'FCFA</h6>';
											?> 
									<span>{{$produit->designation}}  </span>
								</div>
							</div>
							</div>
						</div>
					</div>
					@endforeach
				@else
					<div>
						<p>Pas de produit maitenant</p>
					</div>
				@endif
			</div>
			<div class="text-center pt-5">
				<a href="{{route('shop.boutique')}}">
					<button class="site-btn">ALLER A LA BOUTIQUE</button>
				</a>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->
@endsection

@section('script')
<script>

$(document).on( 'click', '.categories' ,function(){
        var categorie = $(this).attr('id');
        // $('#produit_cherche').empty();
        $('#liste_produit').empty();
        load_data('', '', categorie, '', '');

    });

	function load_data(min_prix, max_prix, categorie , sous_categorie, produit) {

$(document).ready(function (e) {
// $(document).on( 'click', '.categories' ,function(){
// var categorie = $(this).attr('id');
$.ajax({
	url: "{{route('shop.index.fetch')}}",
	method: "post",
	data: {"_token":"{{@csrf_token()}}", min_prix:min_prix, max_prix:max_prix, categorie:categorie, sous_categorie:sous_categorie, produit:produit},

	beforeSend:function(){
		$(".lds-roller").show();
	},
	
	success: function(data) {

	setTimeout(function(){
		$(".lds-roller").hide();
		var obj = jQuery.parseJSON(data);
		// console.log(obj.data.length);
		var total_row = obj.length;
		var stock_status = "";
		var panier_ajout = "";
		$('#total_produit').empty();
		if (total_row == 0) {
			$('#liste_produit').append('<h6 style="margin-left: 30px;" class="text-center">Aucun produit trouvé pour l\'instant</h6>')
		}
		$('#total_produit').append(total_row+' produit trouvé(s)');
		for (var i = 0; i < obj.length; i++) {
			if (obj[i].quantite == 0) {
				$('#liste_produit').append(
					'<div class="col-lg-4" style="padding-bottom:15px;">'+
						'<div class="card" style="border-radius: 20px;">'+
							'<div class="product-item">'+
								'<a style="background: none;" href="/produit/'+obj[i].idProduits+'/detail">'+
									'<div class="pi-pic">'+
										'<div class="tag-sale">Stock épuisé</div>'+
										'<img style="border-radius: 20px;" src="images/image_produits/'+obj[i].photo+'" alt="'+obj[i].designation+'">'+
										'<div class="pi-links">'+
											'<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>'+
										'</div>'+
									'</div>'+
								'</a>'+
								'<div class="card-footer" style="padding: 5px; height: 150px;">'+
									'<div class="pi-text" style="padding: 5px;">'+
										'<h6>'+obj[i].prix_vente+' Fcfa</h6>'+
										'<span>'+obj[i].designation+'</span>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>');
			}else{
				$('#liste_produit').append(
					'<div class="col-lg-4" style="padding-bottom:15px;">'+
						'<div class="card" style="border-radius: 20px;">'+
							'<div class="product-item">'+
								'<a style="background: none;" href="/produit/'+obj[i].idProduits+'/detail">'+
									'<div class="pi-pic">'+
										'<div class="tag-sale">Disponble</div>'+
										'<img style="border-radius: 20px;" src="images/image_produits/'+obj[i].photo+'" alt="'+obj[i].designation+'">'+
										'<div class="pi-links">'+
												'<a href="/ajout/'+obj[i].idProduits+'/panier" class="add-card"><i class="flaticon-bag"></i><span>Ajouter au panier</span></a>'+
												'<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>'+
										'</div>'+
									'</div>'+
								'</a>'+
								'<div class="card-footer" style="padding: 5px; height: 150px;">'+
									'<div class="pi-text" style="padding: 5px;">'+
										'<h6>'+obj[i].prix_vente+' Fcfa</h6>'+
										'<span>'+obj[i].designation+'</span>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>');
			}   
		}
	}, 2000); 

		// $('#pagin').empty();
		// $('#pagin').append(
		//     '<div class="pagination-wrap" id="pagin">'+
		//         '<ul class="pagination">'+                          
		//             '<li>'+obj.links+'</li>'+                               
		//         '</ul>'+
		//     '</div>'
		// );
				

	},
	error: function (data) {
		console.log(data);
	}
})
// });
});
}

	$("#category_slider").owlCarousel({
			autoplay: true,
			autoplayTimeout: 4000,
			loop: true,
			margin: 18,
			nav: true,
			pagination: true,
			dots: true,
			smartSpeed:900,
			responsiveClass: true,
			responsive: {
				0: {
						items: 1,
				},
				575: {
						items: 2,
				},
				767: {
						items: 3,
				},
				1199: {
						items: 4,
				}
		  }
	  });
</script>
@endsection