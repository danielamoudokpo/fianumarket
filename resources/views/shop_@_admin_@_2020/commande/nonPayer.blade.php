@extends('layouts.admin')

@section('content')
<div class="content__inner">
    <header class="content__title">
        <h1>Commande</h1>
        <div class="actions">
            <a href="{{route('admin.commande.sans_paiment')}}" class="actions__item zwicon-refresh-double"></a>
            <a href="{{route('admin.commande.paiement')}}" class="actions__item zwicon-plus"></a>

            <div class="dropdown actions__item">
                <i data-toggle="dropdown" class="zwicon-more-h"></i>
                <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('admin.commande.sans_paiment')}}" class="dropdown-item">Refresh</a>
                <a href="{{route('admin.commande.sans_paiment')}}" class="dropdown-item">Ajout</a>
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
            <h4 class="card-title">Commandes</h4>
            <h6 class="card-subtitle">Liste des commandes reçues</h6>
            <div class="table-responsive data-table">
                <table id="data-table" class="table">
                    <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nom client</th>
                        {{-- <th>Quantité</th> --}}
                        <th>Total commande</th>
                        <th>Date commande</th>
                        <th>Methode de paiement</th>
                        {{-- <th>En stock</th>
                        <th>Descrition</th>
                        <th>photo</th> --}}
                        {{-- <th>Modifier</th> --}}
                        <th>Details</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($commandes as $commande)
                    <?php $la_commande = unserialize($commande->produits) ?>
                    <tr>
                        <td>{{$commande->id}}</td>
                        <td>{{$commande->nom}}</td>
                        {{-- @foreach ($la_commande as $commande_) --}}
                        {{-- <td>{{$commande_['qteCommande']}}</td> --}}
                        {{-- @endforeach --}}
                        <td>{{$commande->total}}</td>
                        <td>{{$commande->date_commande}}</td>
                        <td>
                            <a href="{{route('admin.commande.show',['id' => $commande->id])}}">
                                <div class="action">
                                    <button type="submit" class="btn actions__item zwicon-eye bg-info"></button>
                                </div>
                            </a>
                        </td>

                        <td>
                            <form action="{{route('admin.commande.destroy',['id' => $commande->id])}}" method="POST">
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