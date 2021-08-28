@extends('layouts.admin')

@section('content')
<div class="content__inner">
    <header class="content__title">
        <h1>commande</h1>
        <div class="actions">
            <a href="{{route('admin.commande.sans_paiment')}}" class="actions__item zwicon-refresh-double"></a>
            <a href="{{route('admin.commande.paiement')}}" class="actions__item zwicon-plus"></a>

            <div class="dropdown actions__item">
                <i data-toggle="dropdown" class="zwicon-more-h"></i>
                <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('admin.commande.show', ['id' => $commande->id])}}" class="dropdown-item">Refresh</a>
                <a href="{{route('admin.commande.sans_paiment')}}" class="dropdown-item">Retour</a>
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
            {{-- <h4 class="card-title">Commande</h4> --}}
            <h6 >Détail sur la commande sélectionnée</h4><br>
            <div class="container row">
                <div class="col-sm">
                    <p>Nom client</p>
                    <p>{{$commande->nom}}</p>
                </div>
                <div class="col-sm">
                    <p>Prénom client</p>
                    <p>{{$commande->prenom}}</p>
                </div>
                <div class="col-sm">
                    <p>ville</p>
                    <p>{{$commande->ville}}</p>
                </div>
                <div class="col-sm">
                    <p>Pays</p>
                    <p>{{$commande->pays}}</p>
                </div>
                <div class="col-sm">
                    <p>Téléphone client</p>
                    <p>{{$commande->telephone}}</p>
                </div>
                <div class="col-sm">
                    <p>Email client</p>
                    <p>{{$commande->email}}</p>
                </div>
            </div><br>
            <div class="">
                <h6>Liste des produit commandés</h6><br>
                <table class=" table table-responsive">
                    <thead>
                        <th>Numéro</th>
                        <th>Designation</th>
                        <th>Prix unitaire</th>
                        <th>Quantite commandée</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                        <?php $le_produit = unserialize($commande->produits); 
                        $i = 1;
                            foreach ($le_produit as $item) {
                                echo'<tr>';
                                echo'<td>'.$i.'</td>';
                                echo'<td>'.$item['nom'].'</td>';
                                echo'<td>'.$item['prix_unitaire'].'</td>';
                                echo'<td>'.$item['qteCommande'].'</td>';
                                echo'<td>'.$item['qteCommande'] * $item['prix_unitaire'].'</td>';
                                // echo ' '.$i.') '.$item['nom'].' <p>Prix '.$item['prix_unitaire'].'<br> Quantite commandé '.$item['qteCommande'].'</p><br>';
                            
                                echo'</tr>';
                                $i++;
                            }
                         ?>
                    </tbody>
                </table>
                <div>
                <button class="btn btn-default bg-info ">Total de la commande <button class="btn btn-warning">{{$commande->total}} Fcfa</button></button>
                </div>
            </div>
            {{-- @foreach ($le_produit as $item)
                {{$item['qteCommande']}}
            @endforeach --}}
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