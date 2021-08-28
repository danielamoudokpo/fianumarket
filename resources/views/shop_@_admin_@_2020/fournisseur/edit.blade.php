@extends('layouts.admin')

@section('content')

<header class="content__title">
    <h1>FOURNISSEUR -  EDITION</h1>

    <div class="actions">
        <a href="{{route('admin.fournisseur.liste')}}" class="actions__item zwicon-back"></a>
        <a href="{{route('admin.fournisseur.edit' , ['id' => $fournisseur->id])}}" class="actions__item zwicon-refresh-double"></a>

        {{-- <div class="dropdown actions__item">
            <i data-toggle="dropdown" class="zwicon-more-h"></i>
            <div class="dropdown-menu dropdown-menu-right">
            <a href="{{route('admin.categorie.create')}}" class="dropdown-item">Refresh</a>
            <a href="{{route('admin.categorie.liste')}}" class="dropdown-item">Retour</a>
            </div>
        </div> --}}
    </div>
</header>
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
                    <span aria-hidden="true">X</span>
                </button>
            <p>{{ $message }}</p>
            </div>
            @elseif($message = Session::get('erreur'))
            <div class="alert alert-danger">
            <p>{{ $message }}</p>
            </div>
            @endif

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Fournisseur</h4>
        <h6 class="card-subtitle">Edition du fournisseur sélectionné</h6>

        <form action="{{route('admin.fournisseur.update' , ['id' => $fournisseur->id])}}" method="POST">
        @csrf

        <div class="input-group mb-3" id="nom">
            <div class="input-group-prepend">
                <span class="input-group-text">Nom du fournisseur</span>
            </div>
            <input type="text" class="form-control  @error('nom') is-invalid @enderror" value="{{$fournisseur->nom}}  {{ old('nom')}}" name="nom">
            @error('nom')
            <div class="invalid-feedback">
              {{ $errors->first('nom') }}
              </div>
          @enderror
        </div>

        <div class="input-group mb-3" id="prenom">
            <div class="input-group-prepend">
                <span class="input-group-text">Prénom du fournisseur</span>
            </div>
            <input type="text" class="form-control  @error('prenom') is-invalid @enderror" value="{{$fournisseur->prenom}} {{ old('prenom')}}" name="prenom">
            @error('prenom')
            <div class="invalid-feedback">
              {{ $errors->first('prenom') }}
              </div>
          @enderror
        </div>

        <div class="input-group mb-3" id="email">
            <div class="input-group-prepend">
                <span class="input-group-text">Email</span>
            </div>
            <input type="email" class="form-control  @error('email') is-invalid @enderror" value="{{$fournisseur->email}} {{ old('email')}}" name="email">
            @error('email')
            <div class="invalid-feedback">
              {{ $errors->first('email') }}
              </div>
          @enderror
        </div>

        <div class="input-group mb-3" id="telephone">
            <div class="input-group-prepend">
                <span class="input-group-text">Téléphone</span>
            </div>
            <input type="text" class="form-control  @error('telephone') is-invalid @enderror" value="{{$fournisseur->telephone}} {{ old('telephone')}}" name="telephone">
            @error('telephone')
            <div class="invalid-feedback">
              {{ $errors->first('telephone') }}
              </div>
          @enderror
        </div>

        <div class="input-group mb-3" id="adresse">
            <div class="input-group-prepend">
                <span class="input-group-text">Adresse</span>
            </div>
            <input type="text" class="form-control  @error('adresse') is-invalid @enderror" value="{{$fournisseur->adresse}} {{ old('adresse')}}" name="adresse">
            @error('adresse')
            <div class="invalid-feedback">
              {{ $errors->first('adresse') }}
              </div>
          @enderror
        </div>

        <div class="input-group mb-3" id="societe">
            <div class="input-group-prepend">
                <span class="input-group-text">Nom de la societé</span>
            </div>
            <input type="text" class="form-control  @error('societe') is-invalid @enderror" value="{{$fournisseur->societe}} {{ old('societe')}}" name="societe">
            @error('societe')
            <div class="invalid-feedback">
              {{ $errors->first('societe') }}
              </div>
          @enderror
        </div>

        <input type="hidden" value="1" name="numero_compte">

        <button type="submit" class="btn btn-success btn--icon-text">
            <i class="zwicon-checkmark-circle"></i>
            Valider
        </button>
        <a href="{{route('admin.fournisseur.liste') }}">
            <button type="button" class="btn btn-danger btn--icon-text">
                <i class="zwicon-back"></i>
                Annuler
            </button>
        </a>
    </form>

    </div>
</div>

@endsection

@section('script')

@endsection