{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.admin')

@section('content')
<div class="row quick-stats">
    <div class="col-sm-6 col-md-3">
        <div class="quick-stats__item">
            <div class="quick-stats__info">
                <h2>{{$projetTotal}}</h2>
                <small>Total de projet reçus</small>
            </div>

            <div class="quick-stats__chart peity-bar">6,4,8,6,5,6,7,8,3,5,9</div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="quick-stats__item">
            <div class="quick-stats__info">
                <h2>{{$clientTotal}}</h2>
                <small>Total d'utilisateur</small>
            </div>

            <div class="quick-stats__chart peity-bar">4,7,6,2,5,3,8,6,6,4,8</div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="quick-stats__item">
            <div class="quick-stats__info">
                <h2>{{$commandeTotal}}</h2>
                <small>Total de commandes reçus</small>
            </div>

            <div class="quick-stats__chart peity-bar">9,4,6,5,6,4,5,7,9,3,6</div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="quick-stats__item">
            <div class="quick-stats__info">
                <h2>{{$serviceTotal}}</h2>
                <small>Total de service</small>
            </div>

            <div class="quick-stats__chart peity-bar">5,6,3,9,7,5,4,6,5,6,4</div>
        </div>
    </div>
</div>

<div class="content__inner">
    <header class="content__title">
        <h1>projet</h1>
        <div class="actions">
            <a href="{{route('admin.projet.liste')}}" class="actions__item zwicon-refresh-double"></a>

            <div class="dropdown actions__item">
                <i data-toggle="dropdown" class="zwicon-more-h"></i>
                <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('admin.projet.liste')}}" class="dropdown-item">Refresh</a>
                </div>
            </div>
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
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">X</span>
        </button>
    <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">projets</h4>
            <h6 class="card-subtitle">Liste des projets reçus</h6>
            <div class="table-responsive data-table">
                <table id="data-table" class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Status Client</th>
                        <th>Nom-Prénom client</th>
                        <th>Pays</th>
                        <th>Adresse</th>
                        <th>Contact</th>
                        <th>Budget</th>
                        <th>Description</th>
                        <th>Details</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($projets as $projet)
                    <tr>
                        <td>{{$projet->id}}</td>
                        <td>{{$projet->titre}}</td>
                        <td>{{$projet->type_client}}</td>
                        <td>{{$projet->prenom}} {{$projet->nom}}</td>
                        <td>{{$projet->pays}}</td>
                        <td>{{$projet->adresse}}</td>
                        <td>E-mail :{{$projet->email}}- Tel : {{$projet->telephone}}</td>
                        <td>{{$projet->budget}}</td>
                        <td>{{$projet->description}}</td>
                        <td>
                            <a href="{{route('admin.projet.show',['id' => $projet->id])}}">
                                <div class="action">
                                    <button type="submit" class="btn actions__item zwicon-eye bg-info"></button>
                                </div>
                            </a>
                        </td>

                        <td>
                            <form action="{{route('admin.projet.destroy',['id' => $projet->id])}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <div class="action">
                                    <button type="submit" class="btn actions__item zwicon-trash bg-danger"></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    
@endsection
