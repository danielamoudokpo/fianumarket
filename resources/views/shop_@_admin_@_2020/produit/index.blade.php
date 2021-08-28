@extends('layouts.admin')

@section('content')
<div class="content__inner">
    <header class="content__title">
        <h1>PRODUIT</h1>
        <div class="actions">
            <a href="{{route('admin.produit.liste')}}" class="actions__item zwicon-refresh-double"></a>
            <a href="{{route('admin.produit.create')}}" class="actions__item zwicon-plus"></a>

            <div class="dropdown actions__item">
                <i data-toggle="dropdown" class="zwicon-more-h"></i>
                <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('admin.produit.liste')}}" class="dropdown-item">Refresh</a>
                <a href="{{route('admin.produit.create')}}" class="dropdown-item">Ajout</a>
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
            <h4 class="card-title">Produits</h4>
            <h6 class="card-subtitle">Liste des produits</h6>
            <div class="table-responsive data-table">
                <table id="data-table" class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Réference</th>
                        <th>Désignation</th>
                        <th>Prix achat</th>
                        <th>Prix vente</th>
                        <th>En stock</th>
                        <th>Descrition</th>
                        <th>photo</th>
                        <th>Modifier</th>
                        <th>Details</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($produits as $produit)
                    <tr>
                        <td>{{$produit->id}}</td>
                        <td>{{$produit->reference}}</td>
                        <td>{{$produit->designation}}</td>
                        <td>{{$produit->prix_achat}}</td>
                        <td>{{$produit->prix_vente}}</td>
                        <td>{{$produit->quantite}}</td>
                        <td>{{$produit->description}}</td>
                    <td><img src="{{asset('images/image_produits/'.$produit->photo.'')}}" alt="{{$produit->photo}}" class="avatar-img"></td>
                        <td>
                            <div class="action">
                                <a href="{{route('admin.produit.edit', ['id' =>$produit->id])}}" class="actions__item zwicon-pencil bg-warning"></a>
                            </div>
                        </td>

                        <td>
                            <a href="{{route('admin.produit.show',['id' => $produit->id])}}">
                                <div class="action">
                                    <button type="submit" class="btn actions__item zwicon-eye bg-info"></button>
                                </div>
                            </a>
                        </td>

                        <td>
                            <form action="{{route('admin.produit.destroy',['id' => $produit->id])}}" method="POST">
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