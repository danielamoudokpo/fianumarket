@extends('layouts.ads')

@section('content')
    	<!-- Page info -->
	<div class="page-top-info" style="background-image: url('../ads_x/img/banner-projet.jpg')">
		<div class="container">
			<h4 class="text-white">SOUMETTRE UN PROJET</h4>
			<div class="site-pagination">
			<a class="text-white" href="{{route('service.projet')}}">Services</a> /
				<a class="text-white" href="">Projet</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->

{{-- <div class="row"> --}}
    {{-- On test si l'action a été bien étffectuée --}}
    @if($errors->any())
    <div class="alert alert-success alert-dismissible fade show">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
    @endif

    {{-- message --}}
    @if($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    <p>{{ $message }}</p>
    </div>
    @elseif($message = Session::get('erreur'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">X</span>
        </button>
    <p>{{ $message }}</p>
    </div>
    @endif

{{-- </div> --}}
	<!-- checkout section  -->
    <section class="checkout-section spad" style="margin-top: -50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 order-2 order-lg-1">
                <form class="checkout-form" action="{{route('service.projet.store')}}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="cf-title" style="background-color: #F50500">Formulaire de demande de devis</div>
                    <div class="row">
                        <div class="col-md-7">
                            <p>Je suis</p>
                        </div>
                        <div class="col-md-5" style="margin-top: -20px;">
                            <div class="cf-radio-btns address-rb">
                                <div class="cfr-item">
                                    <input type="radio" value="Un particulier" name="type_client" id="one">
                                    <label for="one">Un particulier</label>
                                </div>
                                <div class="cfr-item">
                                    <input type="radio" value="Une entreprise"  name="type_client" id="two">
                                    <label for="two">Une entreprise</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row address-inputs">
                        <div class="col-md-12">
                            <select class="form-cntrol " name="id_service" id="service">
                                @foreach ($services as $service)
                                    <option value="{{$service->id}} ">{{$service->designation}}</option>
                                @endforeach
                            </select>
                            <input type="text" placeholder="Titre du projet" value="{{old('titre')}}" name="titre">
                            <input type="text" placeholder="Votre nom" name="nom" value="{{old('nom')}}">
                            <input type="text" placeholder="Votre prénom" name="prenom" value="{{old('prenom')}}">
                            <input type="email" placeholder="Votre adresse mail" name="email" value="{{old('email')}}">
                            <input type="text" placeholder="Votre adresse complète" name="adresse" value="{{old('adresse')}}">
                            <input type="text" placeholder="Votre numéro de téléphone" name="telephone" value="{{old('telephone')}}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="Votre pays" name="pays" value="{{old('pays')}}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="Votre budget pour ce projet" name="budget" value="{{old('budget')}}">
                        </div>

                        <div class="col-md-12">
                         <textarea type="text" placeholder="Bref description de votre projet" name="description" id="description" cols="100" rows="5">{{old('description')}}</textarea>
                        </div>
                        {{-- <div class="col-md-12"> --}}
                            {{-- <textarea data-placeholder="Decrivez en quelques mots votre projet" name="description" >
                            <textarea> --}}
                        {{-- </div> --}}
                    </div>
                    <h6>Vous aurez une reponse de notre part dans un délai de 48 h</h6><br><br>

                    <button type="submit" class="site-btn submit-order-btn">Soumettre</button><br><br>
                </form>
            </div>
        </div>
    </div>
</section>
	<!-- checkout section end -->

@endsection

@section('script')
{{-- <script>
	$("input").intlTelInput({
		  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
	});
</script> --}}
@endsection