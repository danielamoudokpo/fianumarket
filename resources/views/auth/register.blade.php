@extends('layouts.app')

@section('content')
<div class="login ">

    <div class="login__block active" id="l-register">
                <div class="login__block__header">
                    <i class="zwicon-user-circle"></i>
                    Création de compte

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zwicon-more-h actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"  href="{{ route('admin.login') }}">Se connecter</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="#">Mot de passe oublié ?</a>
                            </div>
                        </div>
                    </div>
                </div>

                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf
                        <div class="login__block__body">
                        <div class="form-group">
                                <input id="name" type="text" class="form-control text-center @error('name') is-invalid @enderror " name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nom" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                                <input id="email" type="email" class="form-control text-center @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                                <input id="password" type="password" class="form-control text-center @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Nouveau mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                                <input id="password-confirm" type="password" class="form-control text-center" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirmation du mot de passe">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Valider') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
            
    </div>
</div>
@endsection

