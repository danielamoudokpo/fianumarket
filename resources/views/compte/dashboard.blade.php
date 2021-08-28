@extends('layouts.usercompte')

@section('content')
{{-- <div class="vd_content-section clearfix" id="vd_content-section"> --}}
    <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 mgbt-sm-15">
    <div class="vd_status-widget vd_bg-green widget">
    <div class="vd_panel-menu">
    <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> 
    </div>
    </div>
    <!-- vd_panel-menu -->                         
        <a class="panel-body" href="#">
                <div class="clearfix">
                    <span class="menu-icon">
                        <i class="fa fa-shopping-cart"></i>
                    </span>
                    <span class="menu-value">
                        {{$totalCommandes}} commande(s)
                    </span>  
                </div>   
                <div class="menu-text clearfix">
                    Produits commandés
                </div>                                                               
            </a>        
        </div>                
        </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mgbt-sm-15">
    <div class="vd_status-widget vd_bg-red  widget">
        <div class="vd_panel-menu">
            <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
        </div>
    <!-- vd_panel-menu -->                       
        <a class="panel-body" href="#">                                
            <div class="clearfix">
                <span class="menu-icon">
                    <i class="fa fa-heart" style="height:  10%;"></i>
                </span>
                <span class="menu-value">
                    {{$totalSouhaits}} produit(s)
                </span>  
            </div>   
            <div class="menu-text clearfix">
                Liste de souhait
            </div>  
         </a>                                                                
        </div>                
    </div>
    
    <!-- Card -->
        <div class="col-lg-3 col-md-6 col-sm-6 mgbt-xs-15">
            <div class="vd_status-widget vd_bg-blue widget">
                <div class="vd_panel-menu">
                <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
                </div>
                <!-- vd_panel-menu -->                        
                    <a class="panel-body"  href="#">                                  
                        <div class="clearfix">
                            <span class="menu-icon">
                                <i class="fa fa-money"></i>
                            </span>
                            <span class="menu-value">
                                {{$totalPaiements}} Paiement(s)
                            </span>  
                        </div>   
                        <div class="menu-text clearfix">
                            Paiements éffectués
                        </div>
                    </a>                                                                  
            </div>               
        </div>
    
        <div class="col-lg-3 col-md-6 col-sm-6 mgbt-xs-15">
            <div class="vd_status-widget vd_bg-yellow widget">
            <div class="vd_panel-menu">
            <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
            </div>
            <!-- vd_panel-menu -->                          
                {{-- <a class="panel-body"  href="#">                                
                    <div class="clearfix">
                        <span class="menu-icon">
                            <i class="icon-users"></i>
                        </span>
                        <span class="menu-value">
                            250
                        </span>  
                    </div>   
                    <div class="menu-text clearfix">
                        New Users
                    </div>  
                </a>                                                                 --}}
            </div>                
        </div>
    </div>
    
    
        <div class="row">
        <!-- <div class="col-md-7"> -->
        <div class="row">
        <div class="col-md-12">
     
    </div>
    </div>
    <!-- </div> -->
    <!-- Tab end -->
    </div><!-- .row --> 
    {{-- </div> --}}
@endsection