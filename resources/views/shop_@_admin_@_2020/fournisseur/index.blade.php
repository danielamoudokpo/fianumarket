@extends('layouts.admin')

@section('content')
<div class="content__inner">
    <header class="content__title">
        <h1>fournisseurS</h1>
        <div class="actions">
            <a href="{{route('admin.fournisseur.liste')}}" class="actions__item zwicon-refresh-double"></a>
            <a href="{{route('admin.fournisseur.create')}}" class="actions__item zwicon-plus"></a>

            <div class="dropdown actions__item">
                <i data-toggle="dropdown" class="zwicon-more-h"></i>
                <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('admin.fournisseur.liste')}}" class="dropdown-item">Actualisé</a>
                <a href="{{route('admin.fournisseur.create')}}" class="dropdown-item">Ajout</a>
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
            <h4 class="card-title">Fournisseurs</h4>
            <h6 class="card-subtitle">Liste des fournisseurs</h6>
            <div class="table-responsive data-table">
                <table id="data-table" class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom - Prenom</th>
                        <th>Email</th>
                        <th>Société</th>
                        <th>Adresse</th>
                        <th>Numéro de compte</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($fournisseurs as $fournisseur)
                    <tr>
                        <td>{{$fournisseur->id}}</td>
                        <td>{{$fournisseur->nom}} {{$fournisseur->prenom}}</td>
                        <td>{{$fournisseur->email}}</td>
                        <td>{{$fournisseur->societe}}</td>
                        <td>{{$fournisseur->adresse}}</td>
                        <td>{{$fournisseur->numero_compte}}</td>
                        <td>
                            <div class="action">
                                <a href="{{route('admin.fournisseur.edit', ['id' =>$fournisseur->id])}}" class="actions__item zwicon-pencil bg-warning"></a>
                            </div>
                        </td>
                        <td>
                            <form action="{{route('admin.fournisseur.delete',['id' => $fournisseur->id])}}" method="POST">
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

    
</div>
@endsection

@section('script')
    
@endsection