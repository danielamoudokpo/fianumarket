@extends('layouts.admin')

@section('content')

<header class="content__title">
    <h1>SERVICES</h1>

    <div class="actions">
        <a href="{{route('admin.service.liste')}}" class="actions__item zwicon-back"></a>
        <a href="{{route('admin.service.edit' , ['id' => $service->id])}}" class="actions__item zwicon-refresh-double"></a>
        {{-- <div class="dropdown actions__item">
            <i data-toggle="dropdown" class="zwicon-more-h"></i>
            <div class="dropdown-menu dropdown-menu-right">
            <a href="{{route('admin.service.create')}}" class="dropdown-item">Refresh</a>
            <a href="{{route('admin.service.liste')}}" class="dropdown-item">Retour</a>
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
        <h4 class="card-title">Catégorie</h4>
        <h6 class="card-subtitle">Edition de la catégorie sélectionnée</h6>

        <form action="{{route('admin.service.update', ['id' => $service->id])}}" method="post">
        @csrf
        @method('POST')

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Désignation</span>
            </div>
        <input type="text" class="form-control  @error('designation') is-invalid @enderror" value="{{ old($service->designation)}}{{$service->designation}}" name="designation">
            @error('designation')
            <div class="invalid-feedback">
              {{ $errors->first('designation') }}
              </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-success btn--icon-text">
            <i class="zwicon-checkmark-circle"></i>
            Mettre à jour
        </button>

        <a href="{{route('admin.service.liste') }}">
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