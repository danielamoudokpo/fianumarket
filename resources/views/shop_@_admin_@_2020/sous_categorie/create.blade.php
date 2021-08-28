@extends('layouts.admin')

@section('content')

<header class="content__title">
    <h1>SOUS CATEGORIE</h1>

    <div class="actions">
        <a href="{{route('admin.categorie.liste')}}" class="actions__item zwicon-back"></a>
        <a href="{{route('admin.categorie.create')}}" class="actions__item zwicon-refresh-double"></a>

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
                    <span aria-hidden="true">×</span>
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
        <h4 class="card-title">Sous catégorie</h4>
        <h6 class="card-subtitle">Ajout de nouvelle sous catégorie</h6>

        <form action="{{route('admin.sous_categorie.store')}}" method="POST">
        @csrf

        <div class="input-group mb-3">
            <select class="select2 select2-hidden-accessible" data-placeholder="Categorie d'appartenance" name="categorie_id" tabindex="-1" aria-hidden="true">
                <option></option>
                @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->designation}}</option>
                @endforeach
            </select>
            @error('categorie_id')
                <div class="invalid-feedback">
                  {{ $errors->first('categorie_id') }}
                  </div>
              @enderror
            </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Désignation</span>
            </div>
            <input type="text" class="form-control  @error('designation') is-invalid @enderror" value="{{ old('designation')}}" name="designation">
            @error('designation')
            <div class="invalid-feedback">
              {{ $errors->first('designation') }}
              </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-success btn--icon-text">
            <i class="zwicon-checkmark-circle"></i>
            Valider
        </button>
        <a href="{{route('admin.sous_categorie.liste') }}">
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