@extends('layouts.ads')

@section('content')
    	<!-- Page info -->
	<div class="page-top-info" style="background-image: url('ads_x/img/banner-main-event.jpg')">
		<div class="container">
			<h4 class="text-white">Evenement - Togo-Mall</h4>
			<div class="site-pagination">
			<a class="text-white" href="{{route('liste.evenements')}}">Accueil</a> /
				<a class="text-white" href="">Evenements</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1" style="margin-top: -80px;">
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
								<label for="{{$posture->id}}">{{$posture->libelle}}</label>
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
							@foreach ($categorie_evenement as $categorie)
							<div class="list-group-item">
								<input type="checkbox" name="type" id="{{$categorie->id}}" value="{{$categorie->id}}" class="selecteur categorie">
								<label for="{{$categorie->id}}">{{$categorie->libelle}}</label>
                            </div>
							@endforeach
                        </div>
					</div><br>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0" style="margin-top: -90px;">
					{{-- Rechercer avec des filtres personnalisé	 --}}
					<div class="row filter_data">
						@foreach ($les_evenements as $evenement)
                        <div class="col-lg-4 col-sm-6 col-6" style="padding-bottom:15px;">
                            <div class="card" style="border-radius: 20px;">
                                <div class="product-item">
                                <a style="background: none;" href="{{route('evenement.detail', ['id' => $evenement->id])}}">
                                    <div class="card-body" style="padding:0%;">
                                        <div class="pi-pic" style="overflow: hidden; border-radius: 20px; height: 200px;">
                                            <div class="tag-sale">{{$evenement->date_time}}</div>
                                            <img src="{{ asset('event_cover/'.$evenement->photo.'') }}" alt="">
                                            {{-- @if ($evenement->quantite > 0)
                                            <div class="pi-links">
                                                <a href="{{route('shop.ajout_panier', ['id' => $evenement->id])}}" class="add-card"><i class="flaticon-bag"></i><span>Ajouter au panier</span></a>
                                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                            </div>
                                            @else
                                                <div class="pi-links">
                                                    <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                                </div>
                                            @endif --}}

							</div>
						</div>
					</a>
					<div class="card-footer" style="padding: 5px;">
						<div class="pi-text">
							<h6>{{$evenement->belongto_typeEvenement->libelle}}</h6>
							<p>{{$evenement->ville}} {{$evenement->lieu}}  </p>
						</div>
					</div>
					</div>
				</div>
				</div>
			@endforeach
            <div class="text-center w-100 pt-3">
                <div class="pagination-wrap" id="pagin">
                    <ul class="pagination">                                    
                    <li>{{$les_evenements->links()}}</li>                               
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
                    load_data();
            });
		
		// gestion du clique sur les checkbox
		function load_data(){
			    var categorie = get_filter('categorie');
			    // var sous_categorie = get_filter('sous_categorie');
                $.ajax({
                    url:"{{route('liste.evenements.fetch')}}",
                    method:"POST",
                    data:{"_token":"{{@csrf_token()}}", categorie:categorie},
					
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
							$('.filter_data').append(
							'<div class="col-lg-4 col-sm-6 col-6" >'+
								'<div class="card" style="border-radius: 20px;">'+
									'<div class="product-item">'+
										'<a style="background: none;" href="/evenement/'+obj[i].idEvenements+'/detail">'+
											'<div class="card-body" style="padding:0%;">'+
												'<div class="pi-pic" style="overflow: hidden; border-radius: 20px; height: 200px;">'+
													'<div class="tag-sale">Disponble</div>'+
													'<img src="event_cover/'+obj[i].photo+'" alt="'+obj[i].libelle+'">'+
													// '<div class="pi-links">'+
													// 		'<a href="/ajout/'+obj[i].idEvenements+'/panier" class="add-card"><i class="flaticon-bag"></i><span>Ajouter au panier</span></a>'+
													// 		'<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>'+
													// '</div>'+
												'</div>'+
											'</div>'+
										'</a>'+
										'<div class="card-footer" style="padding: 5px;">'+
											'<div class="pi-text">'+
												'<h6>'+obj[i].categorie+'</h6>'+
												'<p>'+obj[i].libelle+'</p>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>' );
							} //end for   						
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