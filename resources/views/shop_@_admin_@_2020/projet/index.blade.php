@extends('layouts.admin')

@section('content')
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

    <footer class="footer d-none d-sm-block">
        <p>© Fianumarket Admin</p>

        <ul class="footer__nav">
            <a href="#">Homepage</a>
            <a href="#">Company</a>
            <a href="#">Support</a>
            <a href="#">News</a>
            <a href="#">Contacts</a>
        </ul>
    </footer>
</div>
@endsection

@section('script')
    
@endsection