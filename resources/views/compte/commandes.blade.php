@extends('layouts.usercompte')

@section('content')

<body id="tables" class="full-layout  nav-right-hide nav-right-start-hide"  data-active="tables "  data-smooth-scrolling="1">     
    <div class="content">
        <!-- <div class="vd_content-wrapper"> -->
          <!-- <div class="vd_container"> -->
            <div class="vd_content clearfix">
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header">
                  <h1>Historique de vos commandes</h1>
                  <small class="subtitle">Détail / Suppression</small> </div>
              </div>
               
              <div class="vd_content-section clearfix">
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                        </div>
                        @elseif($message = Session::get('erreur'))
                    <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                    </div>
                    @elseif($message = Session::get('erreur_ref'))
                        <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            </div> 
              <div class="container"> 
                <div class="row">
                  <div class="col-md-12">
                    <div class="panel widget">
                      <div class="panel-heading vd_bg-red">
                        <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Liste des commandes passées </h3>
                      </div>
                      <div class="panel-body table-responsive">
                        <table class="table table-striped" id="data-tables">
                          <thead>
                            <tr>
                                <th>Nom client</th>
                                {{-- <th>Quantité</th> --}}
                                <th>Total commande</th>
                                <th>Date commande</th>
                                {{-- <th>En stock</th>
                                <th>Descrition</th>
                                <th>photo</th> --}}
                                {{-- <th>Modifier</th> --}}
                                <th>Opération</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($commandes as $commande)
                            <?php $la_commande = unserialize($commande->produits) ?>
                            <tr>
                                <td>{{$commande->nom}}</td>
                                {{-- @foreach ($la_commande as $commande_) --}}
                                {{-- <td>{{$commande_['qteCommande']}}</td> --}}
                                {{-- @endforeach --}}
                                <td>{{$commande->total}}</td>
                                <td>{{$commande->date_commande}}</td>
                                <td>
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle btn-success" type="button" id="menu1" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-v"></i></button>

                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">

                                      <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="{{route('user.commandes.detail',['id' => $commande->id])}}">
                                        <i class="fa fa-pencil vd_yellow" style="margin-right: 10px;"></i>Details</a>
                                      </li>

                                      <li > 
                                        <i class="fa fa-trash vd_red" style="margin-right: 10px;"></i>
                                        <form action="{{route('user.commandes.supprimer',['id' => $commande->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
            
                                            <div class="action">
                                                <button type="submit" class="btn actions__item zwicon-trash bg-danger"></button>
                                            </div>
                                        </form>
                                        </a>
                                      </li>

                                    </ul>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- Panel Widget --> 
                  </div>
                  <!-- col-md-12 --> 
                </div>
                <!-- row --> 
                
              </div>
              <!-- .vd_content-section --> 
              
            </div>
            <!-- .vd_content --> 
          <!-- </div> -->
          <!-- .vd_container --> 
        <!-- </div> -->
        <!-- .vd_content-wrapper --> 
        
        <!-- Middle Content End --> 
    <!-- .content -->
    
    </div>
    

@endsection