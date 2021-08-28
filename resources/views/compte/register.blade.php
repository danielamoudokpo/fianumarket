@extends('layouts.ads')

@section('content')
<section class="checkout-section spad " >
    <div class="container" style="margin-top:-50px; margin-left: auto; margin-right: auto; display:block;  width: 100%; right: 100px">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 order-2 order-lg-1">
                <div class="" style="margin: 10px; width: 100px; display: block; margin-left: auto; margin-right: auto; border-radius: 70px;">
                    <img class="img circle" src="{{asset('ads_x/img/icons/registration.png')}}" alt=""><br>
                <span><strong>Inscription</strong> </span>ou <a href="{{route('user.envoie.connexion')}}">connexion</a>
                </div>
                <form class="checkout-form " action="{{ route('user.envoie.inscription') }}" method="POST">
                    {{-- {{csrf_field() }} --}}
                    @csrf
                    <div class="address-inputs">
                        <div class="col-md">
                            <input type="text" name="name" value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Entrez votre nom" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md">
                            <input type="text" name="prenom" value="{{ old('prenom')}}" class="form-control @error('prenom') is-invalid @enderror" placeholder="Entrez votre prénom" >
                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('prenom') }}</strong>
                                </span>
                            @enderror
                        </div>

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

                        <div class="col-md">
                            <input type="text" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation')}}" placeholder="Retaper la mot de passe">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md">
                            <input type="checkbox" id="cc" required><label for="cc">J'ai lu et j'accepte les termes d'utiilisation de fianumarket.com</label>
                        </div>
                        <div class="form-group col-md">
                            <a href="{{route('admin.connexion')}}">J'ai déjà un compte</a>
                        </div>
                        <div class="col-md">
                            <button type="submit" class="site-btn submit-order-btn inscription">S'inscrire</button>
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