@extends('layouts.ads')

@section('content')
    	<!-- Page info -->
	<div class="page-top-info" style="background-image: url('../ads_x/img/banner-boutique2.jpg')">
		<div class="container">
			<h4 class="text-white">Panier</h4>
			<div  class="site-pagination">
			<a class="text-white" href="{{route('shop.index')}}">Accueil</a> /
				<a class="text-white" href="">Votre panier</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->
	@if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    {{-- message --}}
    @if($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
  @endif

	<!-- cart section end -->
	<section class="cart-section spad" style="margin-top: -30px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Votre panier</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Produit</th>
									<th class="quy-th">Quantité</th>
									<th class="total-th">PU</th>
									<th class="total-th">Total</th>
									<th class="total-th">Supp</th>
									<th class="total-th">Modifier</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$total = 0;
								if (Session::has('vinedos_client_digital_sopping_cart')) {
									// session()->flush();
									// dd(session('vinedos_client_digital_sopping_cart'));
									$row = count(session('vinedos_client_digital_sopping_cart'));
									if ($row > 0) {
								?>
								@foreach(session('vinedos_client_digital_sopping_cart') as $id => $details)
								<?php 
									$total += $details['prix_unitaire'] * $details['quantite'] ;?>
									<tr>
										<td style="width: 200px;" class="product-col">
										<a href="{{route('shop.produit.detail', ['id'=> $id , 'nom' => $details['name']])}}">
											<img src="{{asset('images/image_produits/'.$details['photo'].'')}}" alt="">
										</a>
											<div class="pc-title">
												<h4>{{$details['name']}}</h4>
												<p>{{$details['prix_unitaire']}}</p>
											</div>
										</td>
										<td class="quy-col">
											<div class="quantity">
												<div class="pro-qty">
												<input type="text" name="qte" class="quantite" value="{{$details['quantite']}}">
												</div>
											</div>
										</td>
										<td class="total-col"><h6>{{$details['prix_unitaire']}}</h6> F</td>
										<td class="total-col"><h6>{{$details['prix_unitaire'] * $details['quantite']}}</h6> F</td>
										<td class="total-col"> 
                                            <a href="#" data-id="{{$id}}" class="remove remove-panier fa fa-trash clr-txt text-danger"></a>
                                        </td>
                                        <td class="total-col"> 
                                            <a href="#" data-id="{{$id}}" class="remove update-panier fa fa-refresh clr-txt text-warning"></a>
                                        </td> 
									</tr>
								@endforeach
								<?php 
									}else {
										echo '<tr>Pas de produit dans le panier</tr>';
									}
								}else {
									echo '<tr><td>Pas de produit dans le panier</td></tr>';
								}
								?>

							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<?php 
								if (Session::has('vinedos_client_digital_sopping_cart')) {
									$row = count(session('vinedos_client_digital_sopping_cart'));
									if ($row > 0) {
								?>
                                <h6>Total <span>{{$total}}</span> Fcfa</h6>
									<?php 
								}else {
									echo '<tr><td><h6>Total <span>0</span> Fcfa</h6></td></tr>';
								}
							}else {
								echo '<tr><td><h6>Total <span>0</span> Fcfa</h6></td></tr>';
							}
							?>

						</div>
					</div>
				</div>
				<div class="col-lg-4 card-right">
					{{-- <form class="promo-code-form">
						<input type="text" placeholder="Enter promo code">
						<button>Submit</button>
					</form> --}}
				<a href="{{route('shop.index_checkout')}}" class="site-btn">Proceder à la validation</a>
					<a href="" class="site-btn sb-dark">Continuer l'achat</a>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->

	<!-- Related product section -->
	<section class="related-product-section" style="margin-top: -10px;">
		<div class="container">
			<div class="section-title text-uppercase">
				<h2>Vous aimerez aussi</h2>
			</div>
			<div class="row">
            @if ($les_produits != "")
            @foreach ($les_produits as $produit)
				<div class="col-lg-3 col-sm-6 col-6">
					<div class="product-item">
					<a style="background: none;j" href="{{route('shop.produit.detail', ['id' => $produit->id])}}">
						<div class="pi-pic">
							@if ($produit->quantite > 0)
							<div class="tag-sale">Disponible</div>
							@else
								<div class="tag-sale">Stock épuisé</div>
							@endif
							<img src="{{ asset('images/image_produits/'.$produit->photo.'') }}" alt="">
							@if ($produit->quantite > 0)
							<div class="pi-links">
								<a href="{{route('shop.ajout_panier', ['id' => $produit->id])}}" class="add-card"><i class="flaticon-bag"></i><span>Ajouter au panier</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
							@else
								<div class="pi-links">
									<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
								</div>
							@endif

						</div>
					</a>
						<div class="pi-text">
							<h6>
								<?php
									$final_price = intval($produit->prix_vente);
									echo number_format($final_price, 0 , '.' , ' ') ?> FCFA
								</h6>
							<p>{{$produit->designation}}  </p>
						</div>
					</div>
				</div>
			@endforeach
			@else
			<div>
				<p>Pas de produit maitenant</p>
			</div>
            @endif
            
				{{-- <div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<div class="tag-new">New</div>
							<img src="./img/product/2.jpg" alt="">
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
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/5.jpg" alt="">
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
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/9.jpg" alt="">
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
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="./img/product/1.jpg" alt="">
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
				</div> --}}
			</div>
		</div>
	</section>
	<!-- Related product section end -->


@endsection

@section('script')
    <script>
        $(".update-panier").click(function (e) {
       e.preventDefault();

       var ele = $(this);

        $.ajax({
           url: "{{ route('shop.update_panier') }}",
           method: "patch",
           data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantite: ele.parents("tr").find(".quantite").val()},
           success: function (response) {
               window.location.reload();
           }
        });
    });

    $(".remove-panier").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Le produit va être supprimé")) {
            $.ajax({
                url: "{{ route('shop.remove_panier') }}",
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
    </script>
@endsection