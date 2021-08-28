@extends('layouts.ads')

{{-- content --}}
@section('content')

<div class="page-top-info" style="background-image: url('../../ads_x/img/banner-event.jpg')">
    <div class="container">
        <h4 class="text-white">DETAILS sur L'EVENEMENT</h4>
        <div class="site-pagination text-white">
            <a href="" class="text-white">Accueil</a> /
        <a href="" class="text-white">{{$les_evenements->nom}}</a>
        </div>
    </div>
</div>
<!-- Page info end -->


<!-- product section -->
<section class="product-section" style="margin-top: -40px;">
    <div class="container">
        <div class="back-link">
            <a href="{{route('liste.evenements')}}"> &lt;&lt; Retour</a>
        </div>
        <div class="row">
            <div class="col-lg-6" style="margin-top: -30px">
                <div class="product-pic-zoom">
                    <img class="product-big-img" src="{{asset('event_cover/'.$les_evenements->photo.'')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 product-details">
                <span><p>Nom de l'évenement : <strong class="title">{{$les_evenements->nom}} </strong></p>  </span>
                <h3 class="p-price">
                    <span><p>Lieu : <strong class="title">{{$les_evenements->ville}}- 
                    {{$les_evenements->pays}}; {{$les_evenements->lieu}} </strong></p>  </span>
                </h3>
                <div class="p-rating">

                </div>
                
                <div class="p-price">
                    <p><?php
                        setlocale(LC_TIME,'fr');
                        // $date = date_create($les_evenements->date_time);
                        echo 'Date-Heure : <strong>'.strftime("%A le %d %B %Y à %H:%M" , strtotime($les_evenements->date_time)).'</strong>';
                        ?></p>
                </div> 
                <h3 class="p-price">
                    <span><p>Exigence : <strong class="title">{{$les_evenements->exigence}} </strong></p>  </span>
                </h3>               
                <div id="accordion" class="accordion-area">
                    <div class="panel">
                        <div class="panel-header" id="headingOne">
                            <button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">DESCRIPTION</button>
                        </div>
                        <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="panel-body">
                                <p>{{$les_evenements->description}}.</p>
                                {{-- <p>{{$les_evenements->nom}}</p> --}}
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
            @foreach ($meme_cat as $evenement)
				{{-- <div class="col-lg-3 col-sm-6 col-6"> --}}
					<div class="product-item">
					<a style="background: none;" href="{{route('evenement.detail', ['id' => $evenement->id])}}">
						<div class="pi-pic" style="overflow: hidden; border-radius: 20px; height: 200px;">
							<div class="tag-sale">{{$evenement->date_time}}</div>
							<img src="{{ asset('event_cover/'.$evenement->photo.'') }}" alt="">
						</div>
					</a>
						<div class="pi-text">
							<h6>{{$les_evenements->belongTo_typeEvenement->libelle}}</h6>
							<p>{{$evenement->nom}}  </p>
						</div>
					</div>
				{{-- </div> --}}
			@endforeach
			@else
			<div>
				<p>Pas de evenement relatif au evenement sélectionné</p>
			</div>
            @endif
          
        </div>
    </div>
</section>
<!-- RELATED PRODUCTS section end -->

@endsection


{{-- scripti --}}
@section('script')
    
@endsection