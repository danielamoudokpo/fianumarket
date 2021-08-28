<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ma commande</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('emvor/assets/css/plugin/bootstrap.min.css') }}" rel="stylesheet" type="text/css">  
        <link href="{{ asset('emvor/assets/css/plugin/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">           
       <!-- Font Icon -->
       <link href="{{ asset('emvor/assets/css/plugin/font-awesome.min.css') }}" rel="stylesheet" type="text/css">  
  

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background-image: url('../emvor/assets/img/slider/slide-2-commande.jpg');
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                /* border-right: 2px solid; */
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="code">
                {{-- @yield('message') --}}
                <h4 style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; color:white"><p> Merci de votre commande ! <br> Veiller cliquer sur le bouton ci-dessous <br>
                    pour télécharger la carte des produits et vous rendre dans l'un des sièges mentionnés <br> pour 
                    vous proccurer vos produits !</p></h4>
                <a style="text-decoration: none;" href="{{route('emvor.generate')}}"><button class="btn btn-info bg-info download_btn"><i class="fa fa-download"></i> Télécharger</button></a><br>
                <a style="text-decoration: none;" href="{{route('emvor.index')}}"><span>Accueil</span></a>
            </div>
        </div>


        <!-- JS Global -->
        <script src="{{ asset('emvor/assets/js/plugin/jquery-2.2.4.min.js')}}"></script> 

        <script>
            $(document).ready(function (params) {
                $('.download_btn').click(function() {
                    $.ajax({
                    // url: "{{route('emvor.generate')}}",
                    // method:"get",
                    data:{"_token":"{{@csrf_token()}}"},

                    beforeSend:function(){
                        $('.download_btn').text('Téléchargement en cour');

                    },
                    success: function(data) {
                        setTimeout(function(){
                            // window.location.replace("{{route('emvor.ma_commande')}}");
                            $('.download_btn').text('Téléchargement terminé');
                        }, 7000);

                    },
                    error: function(data){
                        console.log(data);
                    }
                        });
                        // return false;
                    });
                });
                
        </script>

    </body>
</html>
