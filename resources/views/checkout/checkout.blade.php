@extends('layouts.ads')

@section('content')
    	<!-- Page info -->
	<div class="page-top-info" style="background-image: url('../ads_x/img/banner-boutique2.jpg')">
		<div class="container">
			<h4 class="text-white">Checkout</h4>
			<div class="site-pagination">
			<a class="text-white" href="{{route('shop.index')}}">Accueil</a> /
				<a class="text-white" href="">Votre panier</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			{{-- Accueil --}}
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<?php 
						$total = 0;
						if (Session::has('vinedos_client_digital_sopping_cart')) {
							// session()->flush();
							// dd(session('vinedos_client_digital_sopping_cart'));
							$row = count(session('vinedos_client_digital_sopping_cart'));
							if ($row > 0) {
						?>
					<form class="checkout-form" action="" method="POST">
						{{csrf_field() }}

						<div class="cf-title">Information de livraison</div>
						@if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                            @endif
						{{-- <div class="row">
							<div class="col-md-7">
								<p>*Billing Information</p>
							</div>
							<div class="col-md-5">
								<div class="cf-radio-btns address-rb">
									<div class="cfr-item">
										<input type="radio" name="pm" id="one">
										<label for="one">Use my regular address</label>
									</div>
									<div class="cfr-item">
										<input type="radio" name="pm" id="two">
										<label for="two">Use a different address</label>
									</div>
								</div>
							</div>
						</div> --}}
						<div class="row address-inputs">
							<div class="col-md-6">
								<input type="text" name="nom" value="{{ Auth::user() ? Auth::user()->name : '' }}{{ old('nom')}}" placeholder="Votre Nom" >
							</div>
							<div class="col-md-6">
								<input type="text" name="prenom" value="{{ Auth::user() ? Auth::user()->prenom : '' }}{{ old('prenom')}}" placeholder="Votre Prénom">
							</div>
							<div class="col-md-6">
								<input type="text" name="email" value="{{ Auth::user() ? Auth::user()->email : '' }}{{ old('email')}}" placeholder="Votre adresse mail">
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<div class="input-group-prepend">
									<div class="input-group-text num" >+228</div>
									<input type="text" class="form-control" id="num" value="{{ old('telephone')}}" name="telephone" placeholder="Votre téléphone">
								</div>
								</div>
							</div>
							{{-- <div class="col-auto">
							<label class="sr-only" for="inlineFormInputGroup">Username</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
								<div class="input-group-text num" >+228</div>
								<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
							</div>
							</div>
							</div> --}}

							<div class="col-md-12">
								<select name="quartier"  id="quartier" class="form-control">
									<option value="{{ old('quartier')}}" selected>Sélectionner la ville</option>
									<option value="Lomégan">Lomé</option>
									{{-- <option value="Bè kpota">Bè Kpota</option> --}}
								</select>
								<input type="text" name="adresse" value="{{ old('adresse')}}" placeholder="Entrer l'adresse complete">
							</div>

						</div>
						<div class="cf-title">Frais de livraison</div>
						<div class="row shipping-btns">
							<div class="col-6" style="margin-top: -25px;">
								<h4>Sous-regions</h4>
							</div>
							<div class="col-6"  style="margin-top: -25px;">
								<div class="">
									<div class="">
										{{-- <input type="radio" name="shipping" id="ship-1"> --}}
										<label for="ship-1">Gratuit</label>
									</div>
								</div>
							</div>
							{{-- <div class="col-6">
								<h4>Next day delievery  </h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" id="ship-2">
										<label for="ship-2">$3.45</label>
									</div>
								</div>
							</div> --}}
						</div>
						<div class="cf-title"  style="margin-top: -25px;">Méthode de paiement</div>
						{{-- <ul class="payment-list">
							<li> --}}
								
								{{-- <div class="cf-radio-btns"  style="margin-top: -25px;">
									<div class="cfr-item">
										<input type="radio" name="paiement" value="flooz" id="ship-2">
										<label for="ship-2"><img style="width: 70px;" src="{{asset('ads_x/img/flooz.jpg') }}" alt=""></a></label>
									</div>
								</div>
								<div class="cf-radio-btns" >
									<div class="cfr-item">
										<input type="radio" name="paiement" value="tmoney" id="ship-3">
										<label for="ship-3"><img style="width: 70px;" src="{{asset('ads_x/img/tmoney_logo.png') }}" alt=""></a></label>
									</div>
								</div>	 --}}
							{{-- <a href="#"><img style="width: 70px;" src="{{asset('ads_x/img/flooz.jpg') }}" alt=""></a>Flooz</li>
							<li>T-Money<a href="#"><img src="{{ asset('ads_x/img/tmoney.png') }}" alt=""></a></li>
						</ul> --}}
						<button type="submit" class="site-btn submit-order-btn">Valider la commande</button>
					</form>

				<?php 
					}else {
						echo '<p>Vous n\avez pas de produit dans la panier</p>';
					}
						}else {
						echo '<div class="order-1 order-lg-2 checkout-cart">Vous n\'avez pas de produit dans la panier</div>';
					}
						?>
				</div>

				{{-- le contenu de votre panier --}}
				<div class="col-lg-4 order-1 order-lg-2" style="margin-top: -25px;" >
					<div class="checkout-cart">
						<h3>Votre Panier</h3>
						<?php 
								$total = 0;
								if (Session::has('vinedos_client_digital_sopping_cart')) {
									// session()->flush();
									// dd(session('vinedos_client_digital_sopping_cart'));
									$row = count(session('vinedos_client_digital_sopping_cart'));
									if ($row > 0) {
								?>
								<ul class="product-list">
								@foreach(session('vinedos_client_digital_sopping_cart') as $id => $details)
								<?php 
									$total += $details['prix_unitaire'] * $details['quantite'] ;?>
										<li>
										<div class="pl-thumb"><img src="{{asset('images/image_produits/'.$details['photo'].'')}}" alt=""></div>
										<h6>{{$details['name']}}</h6><strong>X</strong><span>{{$details['quantite']}}({{$details['quantite'] * $details['prix_unitaire']}}) Fcfa</span>
											<p>{{$details['prix_unitaire']}} Fcfa</p>
										</li>
									
									@endforeach
								</ul>
									<?php 
										}else {
											echo '<tr>Pas de produit dans le panier</tr>';
										}
									?>

						<ul class="price-list">
							<li>Total<span>{{$total}} Fcfa</span> </li>
							<li>Livrason<span>Gratuit</span></li>
							<li class="total">Total Commande<span>{{$total}} Fcfa</span> </li>
						</ul>
						<?php
							}else {
								echo '<tr><td>Pas de produit dans le panier</td></tr>';
							}
						?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->

	<!-- Footer section -->

	<!-- Footer section end -->
@endsection

@section('script')
{{-- <script>
	$("input").intlTelInput({
		  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
	});
</script> --}}
@endsection