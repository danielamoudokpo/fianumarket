@extends('layouts.ads')

@section('content')
<section class="checkout-section spad " >
    <div class="container" style="margin-left: auto; margin-right: auto; display:block;  width: 100%; right: 100px">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 order-2 order-lg-1">
                <form class="checkout-form " action="{{ route('user.envoie.connexion') }}" method="POST">
                    {{csrf_field() }}

                <div class="" style="margin: 10px; margin-top: -50px; width: 80px; display: block; margin-left: auto; margin-right: auto; border-radius: 70px;">
                    <img class="img circle" src="{{asset('ads_x/img/icons/registration.png')}}" alt=""><br>
                    <span><strong>Connexion</strong> </span>
                    {{-- On test si l'action a été bien étffectuée --}}
                </div>
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
                @elseif($message = Session::get('erreur_souhait'))
                <div class="alert alert-danger">
                <p>{{ $message }}</p>
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
                    <div class="col-md">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}" placeholder="Entrer l'email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md">
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password')}}" placeholder="Entrer un mot de passe">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @enderror
                    </div>
                        <div class="form-group row col-md" >
                            @if (Route::has('password.request'))
                                <a style="text-decoration: none;" class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublié ?') }}
                                </a>
                            @endif
                        </div>
                        <div class="col-md">
                            <button class="site-btn submit-order-btn inscription">Connexion</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    
@endsection