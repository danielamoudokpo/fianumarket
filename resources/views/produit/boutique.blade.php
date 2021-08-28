@extends('layouts.ads')

@section('content')
    	<!-- Page info -->
	<div class="page-top-info" style="background-image: url('ads_x/img/banner-boutique1.jpg')">
		<div class="container" id="produit-liste">
			<h4 class="text-white">Boutique - FIANUMARKET</h4>
			<div class="site-pagination">
			<a class="text-white" href="{{route('shop.index')}}">Accueil</a> /
				<a class="text-white" href="">Boutique</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				{{-- filtre --}}
				<div class="col-lg-3 order-2 order-lg-1" id="filtre-section" style="margin-top: -50px;">
					Filtre personnalisé
					<div class="filter-widget mb-0">
						{{-- <h2 class="fw-title">refine by</h2> --}}
						{{-- <div class="list-group">
							<div class="list-group-item">
								<h5>GENRE</h5>
							</div>
							@foreach ($postures as $posture)
							<div class="list-group-item">
								<input type="checkbox" name="posture" id="{{$posture->id}}" value="{{$posture->id}}" class="selecteur posture">
								<label for="{{$posture->id}}">{{$posture->designation}}</label>
							</div>
							@endforeach
                        </div> --}}
					</div><br>

					<div class="filter-widget mb-0">
						<div class="list-group">
							<div class="list-group-item">
								<h5>Categories</h5>
							</div>
							{{-- categorie --}}
							@foreach ($les_categories as $categorie)
							<div class="list-group-item">
								<input type="checkbox" name="type" id="{{$categorie->id}}" value="{{$categorie->id}}" class="selecteur categorie">
								<label for="{{$categorie->id}}">{{$categorie->designation}}</label>
								{{-- sous categorie --}}
								<ul class="sub-menu">
								@foreach ($les_sous_categories as $sous_categorie)
									@if ($categorie->id == $sous_categorie->categorie_id)
									<li style="list-style: none;" id="{{$sous_categorie->id}}">
										<input type="checkbox" name="sous_categorie" id="{{$sous_categorie->id}}" value="{{$sous_categorie->id}}" class="selecteur sous_categorie">
										<label for="{{$sous_categorie->id}}">{{$sous_categorie->designation}}</label>
									</li>
									@endif
								@endforeach
								</ul>

							</div>
							@endforeach
                        </div>
					</div><br>

					{{-- <div class="filter-widget mb-0">
						<div class="list-group">
							<div class="list-group-item">
								<h5>COULEUR</h5>
							</div>
							@foreach ($couleurs as $couleur)
							<div class="list-group-item">
								<input type="checkbox" name="type" id="{{$couleur->id}}" value="{{$couleur->id}}" class="selecteur couleur">
								<label for="couleur">{{$couleur->designation}}</label>
							</div>
							@endforeach
                        </div>
					</div><br> --}}

					{{-- <div class="filter-widget mb-0">
						<div class="list-group">
							<div class="list-group-item">
								<h5>TAILLES</h5>
							</div>
							@foreach ($tailles as $taille)
							<div class="list-group-item">
								<input type="checkbox" name="type" id="{{$taille->id}}" value="{{$taille->id}}" class="selecteur taille">
								<label for="taille">{{$taille->designation}}</label>
							</div>
							@endforeach
                        </div>
					</div><br> --}}

					<div class="filter-widget mb-0">
						{{-- <h2 class="fw-title">refine by</h2> --}}
							<div class="list-group">
								<div class="price-range-wrap">
								<div class="list-group-item">
									<h5>PRIX</h5> <span>(F)</span>
								</div>
								<div class="list-group-item">
									<div class="price-range-wrap">
										<div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="500" data-max="50000">
											<div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
											<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
											</span>
											<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
											</span>
										</div>
										<div class="range-slider">
											<div class="price-input">
												<input type="text" id="minamount">
												<input type="text" id="maxamount">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0"  style="margin-top: -50px;">
					{{-- Rechercer avec des filtres personnalisé	 --}}
					<a href="#filtre-section" >
						<button  class="btn  bg-warning text-white" style="margin-bottom: 10px; font-size: 18px; border-radius: 25px;"  ><i class="fa fa-search"></i> <strong>Je cherche !</strong>  </button>
					</a>
						@if (sizeof($les_produits) == 0)
							<h6 style="margin-left: 15px;"><strong>Accun produit trouvé pour cette catégorie</strong></h6>
							
						@endif

					<div class="row filter_data">
						@foreach ($les_produits as $produit)
						<div class="col-lg-4 col-sm-6 col-6" style="padding-bottom:15px;">
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
										<h6>
											<?php
												$final_price = intval($produit->prix_vente);
												echo number_format($final_price, 0 , '.' , ' ') ?> FCFA
											</h6>
										<span>{{$produit->designation}}  </span>
									</div>
								</div>
								</div>
							</div>
						</div>
						@endforeach

						<div class="text-center w-100 pt-3">
							<div class="pagination-wrap" id="pagin">
								<ul class="pagination">                                    
								<li>{{$les_produits->links()}}</li>                               
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->
@endsection

@section('script')
<script src="{{asset('ads_x/js/main.js') }}"></script>

<script>
	
	// $(document).ready(function () {
		// recuperer la valeur du checkbox sélectionné dans un tableau
		function get_filter(class_name){
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
					return filter;
	        	}
		
            $('.selecteur').click(function(){
						$('.filter_data').empty();
                    load_data($("#minamount").val(),$("#maxamount").val());
					window.location = '#produit-liste';
            });
		
		// gestion du clique sur les checkbox
		function load_data(minimum_price, maximum_price){
                // var minimum_price = $('#minimun_price').val();
			    // var maximum_price = $('#maximum_price').val();
                // var category =      get_filter('category');
			    var categorie = get_filter('categorie');
			    var sous_categorie = get_filter('sous_categorie');
                $.ajax({
                    url:"{{route('shop.boutique.fetch')}}",
                    method:"POST",
                    data:{"_token":"{{@csrf_token()}}",minimum_price:minimum_price,maximum_price:maximum_price,categorie:categorie, sous_categorie:sous_categorie},
					
					beforeSend:function(){
						// $(".preloder").show();
						// $(".loader").fadeOut();
						// $("#preloder").delay(400).fadeOut("slow");
						$(".lds-roller").show();

					},
                    success:function(data){

						setTimeout(function(){
							var obj = jQuery.parseJSON(data);
							// $(".loader").fadeOut();
							// $("#preloder").delay(400).fadeOut("slow");
						$(".lds-roller").hide();

					if ( obj.length > 0) {
					for (let i = 0; i < obj.length; i++) {

					if (obj[i].quantite == 0) {
						$('.filter_data').append(
							'<div class="col-lg-4 col-sm-6 col-6" style="padding-bottom:15px;">'+
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
							} else{
								$('.filter_data').append(
								'<div class="col-lg-4 col-sm-6 col-6" style="padding-bottom:15px;">'+
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

						}//en for
						
                    	}else {
							$('.filter_data').append('Aucun résultat trouvé pour ce filtre');
						}
						}, 2000); //settimeout end
					}//end success

            });//end ajax

		}//end function

	// }); //end document

</script>
@endsection