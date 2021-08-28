@extends('layouts.admin')

@section('content')
<div class="content__inner">
    <header class="content__title">
        <h1>EVENEMENT</h1>
        <div class="actions">
            <a href="{{route('admin.evenement.liste')}}" class="actions__item zwicon-refresh-double"></a>
            <a href="{{route('admin.evenement.create')}}" class="actions__item zwicon-plus"></a>

            <div class="dropdown actions__item">
                <i data-toggle="dropdown" class="zwicon-more-h"></i>
                <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('admin.evenement.liste')}}" class="dropdown-item">Actualiser</a>
                <a href="{{route('admin.evenement.create')}}" class="dropdown-item">Ajouter</a>
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
            <h4 class="card-title">EVENEMENT</h4>
            <h6 class="card-subtitle">Liste des evenements</h6>
            <div class="table-responsive data-table">
                <table id="data-table" class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Nom</th>
                        <th>Organisateur</th>
                        <th>Addresse</th>
                        <th>Date-Heure</th>
                        <th>Descrition</th>
                        <th>photo</th>
                        <th>Modifier</th>
                        <th>Details</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($evenements as $evenement)
                    <tr>
                        <td>{{$evenement->id}}</td>
                        <td>{{$evenement->belongto_typeEvenement->libelle}}</td>
                        <td>{{$evenement->nom}}</td>
                        <td>{{$evenement->organisateur}}</td>
                        <td>{{$evenement->pays}} {{$evenement->ville}} {{$evenement->lieu}}</td>
                        <td>{{$evenement->date_time}}</td>
                        <td>{{$evenement->description}}</td>
                    <td><img src="{{asset('event_cover/'.$evenement->photo.'')}}" alt="{{$evenement->photo}}" class="avatar-img"></td>
                        <td>
                            <div class="action">
                                <a href="{{route('admin.evenement.edit', ['id' =>$evenement->id])}}" class="actions__item zwicon-pencil bg-warning"></a>
                            </div>
                        </td>

                        <td>
                            <a href="{{route('admin.evenement.show',['id' => $evenement->id])}}">
                                <div class="action">
                                    <button type="submit" class="btn actions__item zwicon-eye bg-info"></button>
                                </div>
                            </a>
                        </td>

                        <td>
                            <form action="{{route('admin.evenement.destroy',['id' => $evenement->id])}}" method="POST">
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
        <p>© Super Admin Responsive. All rights reserved.</p>

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