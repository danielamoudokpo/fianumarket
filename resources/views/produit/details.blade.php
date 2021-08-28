@extends('layouts.ads')

{{-- content --}}
@section('content')

<div class="page-top-info" style="background-image: url('../../ads_x/img/banner-boutique2.jpg')">
    <div class="container">
        <h4>DETAILS DU PRODUIT</h4>
        <div class="site-pagination">
            <a href="">Accueil</a> /
        <a href="">{{$les_produits->designation}}</a>
        </div>
    </div>
</div>
<!-- Page info end -->


<!-- product section -->
<section class="product-section" style="margin-top: -40px;">
    <div class="container">
        <div class="back-link">
        <a href="{{route('shop.index')}}"> &lt;&lt; Retour</a>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="product-pic-zoom">
                    <img class="product-big-img" src="{{asset('images/image_produits/'.$les_produits->photo.'')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 product-details">
            <h2 class="p-title">{{$les_produits->designation}}</h2>
                <h3 class="p-price">
                    <?php
                        $final_price = intval($les_produits->prix_vente);
                            echo number_format($final_price, 0 , '.' , ' ') ?> FCFA
                        </h6>
                    </h3>
                    @if ($les_produits->quantite > 0)
                        <h4 class="p-stock">Disponible: <span>en Stock</span></h4>
                    @else
                    <h4 class="p-stock">Stock épuisé</h4>
                    @endif
                <div class="p-rating">

                </div>
                
                @if ($les_produits->quantite > 0)
                <div class="quantity">
                    <p>Quantity</p>
                    <div class="pro-qty"><input type="text" name="qte" value="1"></div>
                </div>                
                @else
                             
                @endif

                @if ($les_produits->quantite > 0)
                    <a href="{{route('shop.ajout_panier', ['id' => $les_produits->idProduit])}}" class="site-btn">Ajouter au panier</a>
                @else
                <button href="#" class="site-btn">NON DISPONIBLE</button>
                @endif
                <div id="accordion" class="accordion-area">
                    <div class="panel">
                        <div class="panel-header" id="headingOne">
                            <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">information</button>
                        </div>
                        <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="panel-body">
                                <p>{{$les_produits->description}}.</p>
                                <p>{{$les_produits->designation}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social-sharing">
                    <p><span>Partager sur</span></p>
                    <a href=""><i style="height: 50%;" class="fa fa-whatsapp text-success"></i></a>
                    <a href=""><i class="fa fa-instagram text-danger"></i></a>
                    <a href=""><i class="fa fa-facebook text-info"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- RELATED PRODUCTS section -->
<section class="related-product-section">
    <div class="container">
        <div class="section-title">
            <h2>DE LA MEME CATEGORIE</h2>
        </div>
        <div class="product-slider owl-carousel">
            @if ($meme_cat != "")
            @foreach ($meme_cat as $produit)
				{{-- <div class="col-lg-3 col-sm-6 col-6"> --}}
					<div class="product-item">
					<a style="background: none;" href="{{route('shop.produit.detail', ['id' => $produit->id])}}">
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
				{{-- </div> --}}
			@endforeach
			@else
			<div>
				<p>Pas de produit relatif au produit sélectionné</p>
			</div>
            @endif
            
            {{-- <div class="product-item">
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
            <div class="product-item">
                <div class="pi-pic">
                    <img src="./img/product/3.jpg" alt="">
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
                        <img src="./img/product/4.jpg" alt="">
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
                    <img src="./img/product/6.jpg" alt="">
                    <div class="pi-links">
                        <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                        <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                    </div>
                </div>
                <div class="pi-text">
                    <h6>$35,00</h6>
                    <p>Flamboyant Pink Top </p>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- RELATED PRODUCTS section end -->

@endsection


{{-- scripti --}}
@section('script')
    
@endsection