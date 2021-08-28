<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ma commande</title>
      <!-- Favicon -->
      <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('emvor/assets/ico/apple-touch-icon-144-precomposed.png') }}" />
      <link rel="shortcut icon" href="{{ asset('emvor/assets/ico/emvor_icone.ico') }}" />

      <!-- Font Icon -->
      {{-- <link href="{{ asset('emvor/assets/css/plugin/font-awesome.min.css') }}" rel="stylesheet" type="text/css">   --}}

      <!-- CSS Global -->
      <link href="{{ asset('emvor/assets/css/plugin/bootstrap.min.css') }}" rel="stylesheet" type="text/css">  
      <link href="{{ asset('emvor/assets/css/plugin/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">           
      <link href="{{ asset('emvor/assets/css/plugin/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
      <!-- Custom CSS -->
      <link href="{{ asset('emvor/assets/css/theme.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    


    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    {{-- message --}}
    @if($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
  @endif

{{-- <div class="row"> --}}
  {{-- <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Data Table</h6>
        <div class="table-responsive">
        <div class="row"> --}}
<div class="col-md-12">
  <div class="card">
    <div class="card-body">
      <div class="container-fluid d-flex justify-content-between">
        <div class="col-lg-3 pl-0">
          <a href="#" class="noble-ui-logo logo-light d-block mt-3">Covides<span></span></a>                 
          <p class="mt-1 mb-1"><b>Vente de boissons</b></p>
          <p>0000<br> Rue Hédzranawoé,<br>Radio, Maria.</p>
          {{-- <h5 class="mt-5 mb-2 text-muted">Invoice to :</h5>
          <p>Joseph E Carr,<br> 102, 102  Crown Street,<br> London, W3 3PR.</p> --}}
        </div>
        <div class="col-lg-3 pr-0">
          <h4 class="font-weight-medium text-uppercase text-right mt-4 mb-2">RECU</h4>
          <h6 class="text-right mb-5 pb-4">N° REC-0001110022</h6>
          <h6 class="mb-0 mt-3 text-right font-weight-normal mb-2"><span class="text-muted">Date :</span> 08 Aout 2020</h6>
          <h6 class="text-right font-weight-normal"><span class="text-muted">Payé le :</span> 08 Aout 2020</h6>
        </div>
      </div>
      <div class="container-fluid mt-5 d-flex justify-content-center w-100">
        <div class="table-responsive w-100">
            <table class="table table-bordered">
              <thead>
                <tr>
                    <th>Ref</th>
                    <th>Désignation</th>
                    <th class="text-right">Quantité</th>
                    <th class="text-right">Prix</th>
                    <th class="text-right">Total</th>
                  </tr>
              </thead>
              <tbody>
                <tr class="text-right">
                  <td class="text-left">1</td>
                  <td class="text-left">Fanta petite modele</td>
                  <td>02</td>
                  <td>450 Fcfa</td>
                  <td>900 fcfa</td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
      <div class="container-fluid mt-5 w-100">
        <div class="row">
          <div class="col-md-6 ml-auto">
              <div class="table-responsive">
                <table class="table">
                    <tbody>
                      <tr>
                        <td>Sub Total</td>
                        <td class="text-right">900 fcfa</td>
                      </tr>
                      <tr>
                        <td>TAX (0%)</td>
                        <td class="text-right">900 Fcfa</td>
                      </tr>
                      <tr>
                        <td class="text-bold-800">Total</td>
                        <td class="text-bold-800 text-right">900 FCFA</td>
                      </tr>
                      <tr>
                        <td>Mode de paiement</td>
                        <td class="text-danger text-right">espèce</td>
                      </tr>
                      <tr class="">
                        <td class="text-bold-800">Total à payer</td>
                        <td class="text-bold-800 text-right">900 facfa</td>
                      </tr>
                    </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
      <div class="container-fluid w-100">
        <a href="#" class="btn btn-primary float-right mt-4 ml-2"><i data-feather="send" class="mr-3 icon-md"></i>Send Invoice</a>
        <a href="#" class="btn btn-outline-primary float-right mt-4"><i data-feather="printer" class="mr-2 icon-md"></i>Print</a>
      </div>
    </div>
  </div>


   <!-- JS Global -->
   <script src="{{ asset('emvor/assets/js/plugin/jquery-2.2.4.min.js')}}"></script>     
   <script src="{{ asset('emvor/assets/js/plugin/bootstrap.min.js') }}"></script>  
   <script src="{{ asset('emvor/assets/js/plugin/bootstrap-select.min.js') }}"></script>  
   <script src="{{ asset('emvor/assets/js/plugin/owl.carousel.min.js') }}"></script>  
   <script src="{{ asset('emvor/assets/js/plugin/jquery.plugin.min.js') }}"></script>  
   <script src="{{ asset('emvor/assets/js/plugin/jquery.countdown.js') }}"></script>  
   <script src="{{ asset('emvor/assets/js/plugin/jquery.subscribe-better.min.js') }}"></script>  
   <script src="{{ asset('emvor/assets/js/plugin/jquery-ui.min.js') }}"></script>  
   <!-- Custom JS -->   
   <script src="{{ asset('emvor/assets/js/theme.js') }}"></script>  

</body>
</html>

