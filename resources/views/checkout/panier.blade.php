@extends('layouts.ads')

@section('ads_content')
    <!--Breadcrumb Section Start-->
    <section class="breadcrumb-bg" style="background-image: url('../ads_x/img/banner-boutique2.jpg')">                
        <div class="theme-container container ">                       
            <div class="site-breadcumb white-clr">                        
                <h2 class="section-title"> <strong class="clr-txt">Emvor </strong> <span class="light-font">Shop </span> </h2>
                <ol class="breadcrumb breadcrumb-menubar">
                    <li> <a href="#"> Accueil </a> Panier  </li>                             
                </ol>
            </div>  
        </div>
    </section>


    <!-- Cart Starts-->
    <section class="shop-wrap sec-space">
        <div class="container"> 
            @if($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif
            <!-- Shopping Cart Starts -->
            <?php $total = 0 ;?>
            @if(session('emvor_client_digital_sopping_cart'))
                <div class="cart-table">
                    <form class="cart-form">
                    <table class="product-table">
                        <thead class="">
                            <tr>                                                                       
                                <th>Produits</th>  
                                <th></th> 
                                <th>Prix unitaire</th> 
                                <th>Quantité</th>
                                <th>Total</th>                                        
                                <th>Supprimer</th>                                        
                                <th>Modifier</th>                                        
                            </tr>
                        </thead>
                        <tbody>
                                @foreach(session('emvor_client_digital_sopping_cart') as $id => $details)
                    
                                    <?php 
                                    $total += $details['prix_unitaire'] * $details['quantite'] ;?>
                                        <tr >
                                            <td class="image">
                                                <div class="white-bg" >
                                                    <a class="media-link" href="#"><img style="height: 100px;" src="{{asset('images/image_produits/'.$details['photo'].'')}}" alt=""></a> 
                                                </div>
                                            </td>
                                            <td class="description">
                                                <h3 class="product-title no-margin"> <a href="#"> <strong>{{$details['name']}} </strong> </a> </h3>
                                            </td>    
                                            <td> 
                                                <div class="price fontbold-2"> 
                                                    <strong class="fsz-20"><?php echo number_format(intval($details['prix_unitaire']) , 0 , '.' , ' ') ?> Fcfa</strong>
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="prod-btns fontbold-2">
                                                    <div class="quantity">
                                                        <input title="Qty" placeholder="03" class="form-control qty quantite" value="{{ $details['quantite'] }}" name="quantite" type="number">
                                                    </div>
                                                </div>
                                            </td>
                                            <td> 
                                                <strong class="clr-txt fsz-20 fontbold-2"><?php echo number_format(intval($details['prix_unitaire'] * $details['quantite']) ,0, '.' ,' '); ?> Fcfa</strong>
                                            </td>
                                            <td> 
                                                 <a href="#" data-id="{{$id}}" class="remove remove-panier fa fa-trash clr-txt color-danger"></a>
                                            </td>
                                            <td> 
                                            <a href="#" data-id="{{$id}}" class="remove update-panier fa fa-refresh clr-txt color-warning"></a>
                                           </td>                                       
                                        </tr>   
                                @endforeach  
                        </tbody>                               
                    </table>

                    <div class="continue-shopping">
                        <div class="left">
                            {{-- <h6>ENTER VOUCHER CODE IF YOU HAVE ONE. <span class="clr-txt-2"> APPLY HERE </span> </h6>
                            <div class="coupan-form"> 
                                <input class="form-control" >
                                <button class="btn" type="submit"> APPLY CODE </button>
                            </div> --}}
                        </div>
                        <div class="right"> 
                            <table class="table table-striped">
                                <tr>
                                    <td><strong class="fsz-20 fontbold-2">Sous total : </td>
                                    <td><strong class="fsz-20 fontbold-2"> <span class="clr-txt"> {{$total}} </span>Fcfa </strong></td>
                                    </tr>
                                <tr>
                                    <td><strong class="fsz-20 fontbold-2">Total panier : </td>
                                    <td><strong class="fsz-20 fontbold-2"><span class="clr-txt"> {{$total}} </span>Fcfa </strong></td>
                                </tr>
                                <tr>
                                    <td><strong class="fsz-20 fontbold-2">Frais livraison : </td>
                                    <td><h6 class=""> Seront calculés <br> à létape suivante </h6></td>
                                </tr>
                            </table>
                            {{-- <strong class="fsz-20 fontbold-2">Sous total : <span class="clr-txt"> 150.00 </span>Fcfa </strong><br>
                            <strong class="fsz-20 fontbold-2">Total commande : <span class="clr-txt"> 150.00 </span>Fcfa </strong> --}}
                        </div>
                    </div>
                </form>
                    <div class="shp-btn col-sm-12 text-center">
                    <a href="{{route('emvor.boutique')}}"><button class="theme-btn-2 btn"> <b> CONTINUER L'ACHAT </b> </button></a>
                    <a href="{{route('emvor.index_checkout')}}"><button class="theme-btn bg-success"> <b> VALIDER LA PANIER </b> </button></a>
                    </div>                                   


                   
                </div>    
            @else
            <div class="cart-table">
                <form class="cart-form">
                <table class="product-table">
                <thead class="">
                    <tr>                                                                       
                        <th>Produits</th>  
                        <th></th> 
                        <th>Prix unitaire</th> 
                        <th>Quantité</th>
                        <th>Total</th>                                        
                    </tr>
                </thead>
                <tbody>
                    <tr>Vous n'avez pas ajouté de produit dans le panier</tr>
                </tbody>
                </table>
                </form>
            </div>
            <div class="continue-shopping">
                <div class="left">
                    {{-- <h6>ENTER VOUCHER CODE IF YOU HAVE ONE. <span class="clr-txt-2"> APPLY HERE </span> </h6>
                    <div class="coupan-form"> 
                        <input class="form-control" >
                        <button class="btn" type="submit"> APPLY CODE </button>
                    </div> --}}
                </div>
                <div class="right"> 
                    <table class="table table-striped">
                        <tr>
                            <td><strong class="fsz-20 fontbold-2">Sous total : </td>
                            <td><strong class="fsz-20 fontbold-2"> <span class="clr-txt"> 0 </span>Fcfa </strong></td>
                            </tr>
                        <tr>
                            <td><strong class="fsz-20 fontbold-2">Total panier : </td>
                            <td><strong class="fsz-20 fontbold-2"><span class="clr-txt"> 0 </span>Fcfa </strong></td>
                        </tr>
                        <tr>
                            <td><strong class="fsz-20 fontbold-2">Frais livraison : </td>
                            <td><h6 class=""> Seront calculés <br> Commandez d'abord un produit </h6></td>
                        </tr>
                    </table>
                    {{-- <strong class="fsz-20 fontbold-2">Sous total : <span class="clr-txt"> 150.00 </span>Fcfa </strong><br>
                    <strong class="fsz-20 fontbold-2">Total commande : <span class="clr-txt"> 150.00 </span>Fcfa </strong> --}}
                </div>
            </div>

            <div class="shp-btn col-sm-12 text-center">
                <a href="{{route('emvor.boutique')}}"><button class="theme-btn-2 btn"> <b> ACCUEIL </b> </button></a>
                {{-- <button class="theme-btn bg-success"> <b> VALIDER LA PANIER </b> </button> --}}
            </div>
        @endif                
            <!-- / Shopping Cart Ends -->
        </div>
    </section>
    <!-- / Cart Ends -->  
@endsection

@section('ads_script')
    

<script type="text/javascript">
 
    $(".update-panier").click(function (e) {
       e.preventDefault();

       var ele = $(this);

        $.ajax({
           url: "{{ route('emvor.update_panier') }}",
           method: "patch",
           data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantite: ele.parents("tr").find(".quantite").val()},
           success: function (response) {
               window.location.reload();
           }
        });
    });

    $(".remove-panier").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Le produit va être supprimé")) {
            $.ajax({
                url: "{{ route('emvor.remove_panier') }}",
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>

@endsection