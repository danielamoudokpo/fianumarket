    
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title>Fianumaket Tableau de bord</title>
    <meta name="keywords" content="HTML5 Template, CSS3, All Purpose Admin Template, " />
    <meta name="description" content="Responsive Admin Template for e-commerce dashboard">
    <meta name="author" content="Venmond">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    
    
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
    <!-- <link rel="shortcut icon" href="img/ico/favicon.png"> -->
    
    
   
    <link href="{{ asset('user_dash/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('user_dash/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    {{-- <!--[if IE 7]><link type="text/css" rel="stylesheet" href="{{ asset('user_dash/css/font-awesome-ie7.min.css') }}"><![endif]--> --}}
    <link href="{{ asset('user_dash/css/font-entypo.css') }}" rel="stylesheet" type="text/css">    

    <!-- Fonts CSS -->
    <link href="{{ asset('user_dash/css/fonts.css') }}"  rel="stylesheet" type="text/css">
               
    <!-- Plugin CSS -->
    <link href="{{ asset('user_dash/plugins/jquery-ui/jquery-ui.custom.min.css') }}" rel="stylesheet" type="text/css">    
    <link href="{{ asset('user_dash/plugins/prettyPhoto-plugin/css/prettyPhoto.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('user_dash/plugins/isotope/css/isotope.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('user_dash/plugins/pnotify/css/jquery.pnotify.css') }}" media="screen" rel="stylesheet" type="text/css">    
	<link href="{{ asset('user_dash/plugins/google-code-prettify/prettify.css') }}" rel="stylesheet" type="text/css"> 
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css'" rel="stylesheet">

         
    <link href="{{ asset('user_dash/plugins/mCustomScrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('user_dash/plugins/tagsInput/jquery.tagsinput.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('user_dash/plugins/bootstrap-switch/bootstrap-switch.css') }}" rel="stylesheet" type="text/css">    
    <link href="{{ asset('user_dash/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css">    
    <link href="{{ asset('user_dash/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('user_dash/plugins/colorpicker/css/colorpicker.css') }}" rel="stylesheet" type="text/css"> 

	<!-- Specific CSS -->
    <link href="{{ asset('user_dash/plugins/introjs/css/introjs.min.css') }}" rel="stylesheet" type="text/css">  
    <link href="{{ asset('user_dash/plugins/dataTables/css/jquery.dataTables.html') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('user_dash/plugins/dataTables/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">    
     
    <!-- Theme CSS -->
    <link href="{{ asset('user_dash/css/theme.min.css') }}" rel="stylesheet" type="text/css">
    <!--[if IE]> <link href="{{ asset('user_dash/css/ie.css') }}" rel="stylesheet" > <![endif]-->
    <link href="{{ asset('user_dash/css/chrome.css') }}" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->    
    <!-- Responsive CSS -->
    <link href="{{ asset('user_dash/css/theme-responsive.min.css') }}" rel="stylesheet" type="text/css"> 
    <!-- for specific page in style css -->
    <link href="{{ asset('user_dash/plugins/jquery-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('user_dash/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('user_dash/plugins/bootstrap-wysiwyg/css/bootstrap-wysihtml5-0.0.2.css') }}" rel="stylesheet" type="text/css">
        
    <!-- for specific page responsive in style css -->
        
    <!-- Custom CSS -->
    <link href="{{ asset('user_dash/custom/custom.css') }}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{ asset('user_dash/js/modernizr.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('user_dash/js/mobile-detect.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('user_dash/js/mobile-detect-modernizr.js') }}"></script>

    
</head>    

<body id="dashboard" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix" data-active="dashboard "  data-smooth-scrolling="1">     
<div class="vd_body">
<!-- Header Start -->
  <header class="header-1" id="header">
      <div class="vd_top-menu-wrapper">
        <div class="container ">
          <div class="vd_top-nav vd_nav-width  ">
          <div class="vd_panel-header">
          	<div class="logo">
            	<a href="{{route('shop.index')}}"><img alt="logo" src="{{asset('fianu-market-trouge.png') }}" style="width: 100px;"></a>
            </div>
            <!-- logo -->
            <div class="vd_panel-menu  hidden-sm hidden-xs" data-intro="<strong>Minimize Left Navigation</strong><br/>Toggle navigation size to medium or small size. You can set both button or one button only. See full option at documentation." data-step=1>
            		<span class="nav-medium-button menu" data-toggle="tooltip" data-placement="bottom" data-original-title="Medium Nav Toggle" data-action="nav-left-medium">
                        <i class="fa fa-bars"></i>
                    </span>
                                		                    
                	<span class="nav-small-button menu" data-toggle="tooltip" data-placement="bottom" data-original-title="Small Nav Toggle" data-action="nav-left-small">
	                    <i class="fa fa-ellipsis-v"></i>
                    </span>                    
            </div>
            <div class="vd_panel-menu left-pos visible-sm visible-xs">      
                    <span class="menu" data-action="toggle-navbar-left">
                        <i class="fa fa-ellipsis-v"></i>
                    </span>         
            </div>

            <div class="vd_panel-menu visible-sm visible-xs">
                	<span class="menu visible-xs" data-action="submenu">
	                    <i class="fa fa-bars"></i>
                    </span>         
                        <span class="menu visible-sm visible-xs" data-action="toggle-navbar-right">
                            <i class="fa fa-comments"></i>
                        </span>                   
            </div>                                     
          </div>
          </div>    
          <div class="vd_container">
    <div class="row">

<div class="col-sm-5 col-xs-12">	
<!-- espace entre le items du menus gauche et ceux du menu droit -->
</div>


<div class="col-sm-7 col-xs-12">
<div class="vd_mega-menu-wrapper">
<div class="vd_mega-menu pull-right">
<!-- Menus droits -->
<ul class="mega-ul">
<!-- Les messages réçu -->
<!-- profile setting -->
    <li id="top-menu-profile" class="profile mega-li"> 
        <a href="#" class="mega-link"  data-action="click-trigger"> 
            {{-- <span  class="mega-image">
                <img src="imgprofile/<?=$imgProfile ?>" alt="example image" />               
            </span> --}}
            <span class="mega-name">
            <?=$userinfos->name ?> <i class="fa fa-caret-down fa-fw"></i> 
            </span>
        </a> 
      <div class="vd_mega-menu-content  width-xs-2  left-xs left-sm" data-action="click-target">
        <div class="child-menu"> 
        	<div class="content-list content-menu">
                <ul class="list-wrapper pd-lr-10">
                <li class="admin"> <a href="{{route('user.infos')}}" onclick="loader($('#vd_content-section'),'src/view/Admin/index.php', $('.admin'))" > 
                        <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Compte</div> </a>
                     </li>
                    <li class="line"></li>                
                    <li id="deconnexion"> <a href="{{route('user.deconnexion')}}"><div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  <div class="menu-text">Se déconnecté</div> </a> </li>
                    <li class="line"></li>                
                </ul>
            </div> 
        </div> 
      </div>     
    </li>               
	</ul>
<!-- Head menu search form ends -->                         
</div>
</div>
</div>
</div>
</div>
</div>
        <!-- container --> 
</div>
      <!-- vd_primary-menu-wrapper --> 

  </header>
  <!-- Header Ends --> 

<div class="content">
  <div class="container">
    <div class="vd_navbar vd_nav-width vd_navbar-tabs-menu vd_navbar-left  ">
	<div class="navbar-tabs-menu clearfix">
    <div class="menu-container">
    <div class="vd_mega-menu-wrapper">
    <div class="vd_mega-menu"  data-intro="<strong>Tabs Menu</strong><br/>Can be placed for dropdown menu, tabs, or user profile. Responsive for medium and small size navigation." data-step=3>
<ul class="mega-ul" >
    <!--  -->
    <li id="test" class="one-icon mega-li" style="margin-left: 200px;"> 
        <a class="mega-link vd_bg-red" href="javascript:void(0);" data-action="click-trigger">
            <span class="mega-icon">
                <i class="fa fa-plus"></i>
            </span>
        </a>
        <div class="vd_mega-menu-content  width-xs-2  center-xs-2" data-action="click-target" >
                <div class="child-menu" > 
                    <div class="content-list content-menu">
                        <ul class="list-wrapper pd-lr-10">
                            <!-- <li> <a href="#"> <span class="menu-icon"><i class=" fa fa-user"></i></span> <span class="menu-text">Write Article</span> </a> </li> -->
                            <!-- <li> <a href="#"> <span class="menu-icon"><i class=" fa fa-trophy"></i></span> <span class="menu-text">Write News</span> </a> </li> -->
                        <li> <a href="{{route('shop.boutique')}}"> <span class="menu-icon"><i class=" fa fa-flask"></i></span> <span class="menu-text">Nouvelle commande</span> </a>  </li>
                                       
                        </ul>
                    </div> 
                </div> 
           </div>   <!-- vd_mega-menu-content  -->      
    </li>      
</ul>                        	
</div>                
</div>
</div>                                                   
</div>
<!-- home_'''''''''''''''''''''''''''''''''''''''' -->
<div class="navbar-menu clearfix" >
        <div class="vd_panel-menu hidden-xs">
            <span data-original-title="Expand All" data-toggle="tooltip" data-placement="bottom" data-action="expand-all" class="menu" data-intro="<strong>Expand Button</strong><br/>To expand all menu on left navigation menu." data-step=4 >
                <i class="fa fa-sort-amount-asc"></i>
            </span>                   
        </div>
<!-- <h3 class="menu-title hide-nav-medium hide-nav-small">ADMIN CONTROLE</h3> -->
<!-- menus -->
<div class="vd_menu" style="font-size: 17px;">
        <ul>
            <!-- home -->
            <li class="Accueil {{Route::currentRouteNamed('user.dashbord') ? 'active' : ''}}">
                <a href="{{route('user.dashbord')}}" class="{{Route::currentRouteNamed('user.dashbord') ? 'open' : ''}}">
                    <span class="menu-icon"><i class="fa fa-home"></i></span> 
                    <span class="menu-text">Accueil</span>  
                    <span class="menu-badge"></span>
                </a>
            </li> 
             <!--Produit  -->
             <li class="Commandes {{Route::currentRouteNamed('user.commades.liste') ? 'active' : ''}}">
                <a href="{{route('user.commades.liste')}}" >
                    <span class="menu-icon"><i class="fa fa-shopping-cart"> </i></span>
                    <span class="menu-text">Mes commandes</span>
                    <span class="menu-badge"></span>            
                </a>
            </li>

             <!--Produit  -->
             <li class="Commandes {{Route::currentRouteNamed('user.paiements.liste') ? 'active' : ''}}">
                <a href="{{route('user.paiements.liste')}}" >
                    <span class="menu-icon"><i class="fa fa-shopping-cart"> </i></span>
                    <span class="menu-text">Historique des paiements</span>
                    <span class="menu-badge"></span>            
                </a>
            </li>

            <!-- Catégorie -->
            <li class="Souhait {{Route::currentRouteNamed('user.souhaits.liste') 
            || Route::currentRouteNamed('user.souhaits.details')   ? 'active' : ''}}">
            <a href="{{route('user.souhaits.liste')}}">
                <span class="menu-icon"><i class="fa fa-heart"></i></span> 
                <span class="menu-text">Liste de souhait</span>  
                <span class="menu-badge"></span>
                </a> 
            </li>  

        <!--Client  -->      
        {{-- <li class="client">
            <a href="#" onclick="loader($('#vd_content-section'),'src/view/Client/index.php', $('.client'))" data-action="click-trigger">
                <span class="menu-icon"><i class="fa fa-users"> </i></span> 
                <span class="menu-text">Clients</span>  
                <span class="menu-badge"></span>
            </a>
        </li>  --}}
        <!-- Commande -->
    <li class="CompteInfos {{Route::currentRouteNamed('user.infos')
        || Route::currentRouteNamed('user.show.edit') ? 'active' : ''}}">
        <a href="#" data-action="click-trigger" class="{{Route::currentRouteNamed('user.infos')
        || Route::currentRouteNamed('user.show.edit') ? 'open' : ''}}">
        <span class="menu-icon"><i class="fa fa-user"></i></span>    
            <span class="menu-text">Mon Compte</span>  
            <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
       	</a>
     	<div class="child-menu"  data-action="click-target">
            <ul>  
                <li class="CompteInfos {{Route::currentRouteNamed('user.infos')
                || Route::currentRouteNamed('user.show.edit')  ? 'active' : ''}}">
                <a href="{{route('user.infos')}}">
                        <span class="menu-text">Infos personnelles</span>  
                    </a>
                </li>                                                                                                                                                                                                        
            </ul>   
      	</div>
    </li>   

   
    <!--Statistique  -->

    <!-- aide -->
    {{-- <li class="aide">
    	<a href="#" onclick="loader($('#vd_content-section'),'src/view/Aide/index.php', $('.aide'))">
        	<span class="menu-icon"><i class="fa fa-question"></i></span> 
            <span class="menu-text">Support</span>  
            <span class="menu-badge"><span class="badge vd_bg-yellow"><i class="fa fa-star"></i></span></span>
       	</a>
    </li>    --}}
    </ul>
<!-- Head menu search form ends -->         
</div>             

</div>
    <div class="navbar-spacing clearfix">
    </div>
    <div class="vd_menu vd_navbar-bottom-widget">
        <ul>
            <li class="deconecte">
            <a href="{{route('user.deconnexion')}}">
                <span class="menu-icon"><i class="fa fa-sign-out"></i></span> 
                <span class="menu-text">Se deconnecter</span>  
                <span class="menu-badge"><span class="badge vd_bg-yellow"><i class="fa fa-star"></i></span></span>
            </a>
            </li>       
        </ul>
    </div>     
</div>   

<!-- Middle Content Start -->
<div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a href="index.html">Accueil</a> </li>
                <li class="active">Fianumarket</li>
              </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
             <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      </div>
    </div>
    </div>

<!-- On doit charger d'autre page ici -->
<!-- Content princopal -->
<div class="vd_content-section clearfix" id="vd_content-section">
@yield('content')
<!-- .vd_content --> 
</div>
<!-- .vd_container --> 
</div>
<!-- .vd_content-wrapper --> 
    <!-- Middle Content End -->  
  </div>
</div>
  </div>
</div>
<!-- Footer Start -->
  <footer class="footer-1"  id="footer">      
    <div class="vd_bottom ">
        <div class="container">
            <div class="row">
              <div class=" col-xs-12">
                <div class="copyright">
                  Fianumarket Copyright &copy;2021 . Tout droit reservé
                </div>
              </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
  </footer>
<!-- Footer END -->
<!-- Head menu search form ends -->  
          </div>   
      </div>      
  </div>

</div>
<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>
<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="{{ asset('user_dash/js/jquery.js') }}"></script> 
<!--[if lt IE 9]>
  <script type="text/javascript" src="{{ asset('user_dash/js/excanvas.js') }}"></script>      
<![endif]-->
<script type="text/javascript" src="{{ asset('user_dash/js/bootstrap.min.js') }}"></script> 
<script type="text/javascript" src='{{ asset('user_dash/plugins/jquery-ui/jquery-ui.custom.min.js') }}'></script>
<script type="text/javascript" src="{{ asset('user_dash/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('user_dash/js/caroufredsel.js') }}"></script> 
<script type="text/javascript" src="{{ asset('user_dash/js/plugins.js') }}"></script>

<script type="text/javascript" src="{{ asset('user_dash/plugins/breakpoints/breakpoints.js') }}"></script>
<script type="text/javascript" src="{{ asset('user_dash/plugins/dataTables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('user_dash/plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js') }}"></script> 

<script type="text/javascript" src="{{ asset('user_dash/plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('user_dash/plugins/tagsInput/jquery.tagsinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('user_dash/plugins/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('user_dash/plugins/blockUI/jquery.blockUI.js') }}"></script>
<script type="text/javascript" src="{{ asset('user_dash/plugins/pnotify/js/jquery.pnotify.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('user_dash/js/theme.js') }}"></script>
<script type="text/javascript" src="{{ asset('user_dash/custom/custom.js') }}"></script>
 
<!-- Specific Page Scripts Put Here -->
<!-- Flot Chart  -->
<script type="text/javascript" src="{{ asset('user_dash/plugins/flot/jquery.flot.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('user_dash/plugins/flot/jquery.flot.resize.js') }}"></script>
<script type="text/javascript" src="{{ asset('user_dash/plugins/flot/jquery.flot.pie.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('user_dash/plugins/flot/jquery.flot.categories.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('user_dash/plugins/flot/jquery.flot.animator.min.js') }}"></script>

<!-- Vector Map -->
<script type="text/javascript" src="{{ asset('user_dash/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('user_dash/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>


<!-- Intro JS (Tour) -->
<script type="text/javascript" src='{{ asset('user_dash/plugins/introjs/js/intro.min.js') }} '></script>
<script src="{{ asset('user_dash/jQuery/loader.js') }}"></script>
<script src="{{ asset('user_dash/jQuery/bootstrap-notify.js') }}"></script>
<script src="{{ asset('user_dash/jQuery/bootstrap-notify.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('user_dash/plugins/dataTables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('user_dash/plugins/dataTables/dataTables.bootstrap.js') }}"></script>

<script type="text/javascript">
		$(document).ready(function() {
				"use strict";
				
				$('#data-tables').dataTable();
		} );
</script>

<script type="text/javascript">
$(window).load(function() 
	{
	
		"use strict";
	
		$(window).on("resize", function(){
			plot.resize();
			plot.setupGrid();
			plot.draw();
		});
				

		$.fn.UseTooltip = function () {
			var previousPoint = null;
			 
			$(this).bind("plothover", function (event, pos, item) {        
					if (item) {
						if (previousPoint != item.dataIndex) {
		
							previousPoint = item.dataIndex;
		
							$("#tooltip").remove();
							var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);
		
							showTooltip(item.pageX, item.pageY,
								"<p class='vd_bg-green'><strong class='mgr-10 mgl-10'>" + Math.round(x)  + " NOV 2013 </strong></p>" +
								"<div style='padding: 0 10px 10px;'>" +
								"<div>" + item.series.label +": <strong>"+ Math.round(y)  +"</strong></div>" +
								"<div> Profit: <strong>$"+ Math.round(y)*7  +"</strong></div>" +
								"</div>"
							);
						}
					} else {
						$("#tooltip").remove();
						previousPoint = null;            
					}
			});
		};
		 
		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css({
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 20,    
				size: '10',  
//				'border-top' : '3px solid #1FAE66',
				'background-color': '#111111',
				color: "#FFFFFF",
				opacity: 0.85
			}).appendTo("body").fadeIn(200);
		}


/* REVENUE LINE CHART */

	var d2 = [ [1, 250],
            [2, 150],
            [3, 50],
            [4, 200],
            [5,50],
            [6, 150],
            [7, 150],
            [8, 200],
            [9, 100],
            [10, 250],
            [11,250],
            [12, 200],
            [13, 300]			

];
	var d1 = [
			[1, 650],
            [2, 550],
            [3, 450],
            [4, 550],
            [5, 350],
            [6, 500],
            [7, 600],
            [8, 450],
            [9, 300],
            [10, 600],
            [11, 400],
            [12, 500],
            [13, 700]					
			
];
	var plot = $.plotAnimator($("#revenue-line-chart"), [
			{  	label: "Revenue",
				data: d2, 	
				lines: {				
					fill: 0.4,
					lineWidth: 0,				
				},
				color:['#f2be3e']
			},{ 
				data: d1, 
				animator: {steps: 60, duration: 1000, start:0}, 		
				lines: {lineWidth:2},	
				shadowSize:0,
				color: '#F85D2C'
			},{
				label: "Revenue",
				data: d1, 
				points: { show: true, fill: true, radius:6,fillColor:"#F85D2C",lineWidth:3 },	
				color: '#fff',				
				shadowSize:0
			},
			{	label: "Cost",
				data: d2, 
				points: { show: true, fill: true, radius:6,fillColor:"#f2be3e",lineWidth:3 },	
				color: '#fff',				
				shadowSize:0
			}
		],{	xaxis: {
		tickLength: 0,
		tickDecimals: 0,
		min:2,

				font :{
					lineHeight: 13,
					style: "normal",
					weight: "bold",
					family: "sans-serif",
					variant: "small-caps",
					color: "#6F7B8A"
				}
			},
			yaxis: {
				ticks: 3,
                tickDecimals: 0,
				tickColor: "#f0f0f0",
				font :{
					lineHeight: 13,
					style: "normal",
					weight: "bold",
					family: "sans-serif",
					variant: "small-caps",
					color: "#6F7B8A"
				}
			},
			grid: {
				backgroundColor: { colors: [ "#fff", "#fff" ] },
				borderWidth:1,borderColor:"#f0f0f0",
				margin:0,
				minBorderMargin:0,							
				labelMargin:20,
				hoverable: true,
				clickable: true,
				mouseActiveRadius:6
			},
			legend: { show: false}
		});

 		$("#revenue-line-chart").UseTooltip();		



/* REVENUE DONUT CHART */
	
		var data2 = [],
			series = 3;
		var data2 = [
			{ label: "Men",  data: 35},
			{ label: "Women",  data: 65}
		];
		var revenue_donut_chart = $("#revenue-donut-chart");
		
		$("#revenue-donut-chart").bind("plotclick", function (event, pos, item) {
			if (item) {
				$("#clickdata").text(" - click point " + item.dataIndex + " in " + item.series.label);
				plot.highlight(item.series, item.datapoint);
			}
		});
		$.plot(revenue_donut_chart, data2, {
			series: {
				pie: { 
					innerRadius: 0.4,
					show: true
				}
			},
			grid: {
				hoverable: true,
				clickable: true,
			},
			colors: ["#1FAE66", "#F85D2C "]				
		});
		
		
/* REVENUE BAR CHART */	
	
		var bar_chart_data = [ ["Jan", 10], ["Feb", 8], ["Mar", 4], ["Apr", 13], ["May", 17], ["Jun", 9], ["Jul", 10], ["Aug", 8], ["Sep", 4], ["Oct", 13], ["Nov", 17], ["Dec", 9] ];
		
        var bar_chart = $.plot(
        $("#revenue-bar-chart"), [{
            data: bar_chart_data,
 //           color: "rgba(31,174,102, 0.8)",
 			color: "#F85D2C" ,
            shadowSize: 0,
            bars: {
                show: true,
                lineWidth: 0,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 1
                    }, {
                        opacity: 1
                    }]
                }
            }
        }], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.9,
					align: "center"
                }
            },
            grid: {
                show: true,
                hoverable: true,
                borderWidth: 0
            },
            yaxis: {
                min: 0,
                max: 20,
				show: false
            },
			xaxis: {
				mode: "categories",
				tickLength: 0,
				color: "#FFFFFF",				
			}			
        });
		
	   var previousPoint2 = null;
       $("#revenue-bar-chart").bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint2 != item.dataIndex) {
                    previousPoint2 = item.dataIndex;
                    $("#tooltip").remove();
                    var x = item.datapoint[0] + 1,
                        y = item.datapoint[1].toFixed(2);
                    showTooltip(item.pageX, item.pageY, 
								"<p class='vd_bg-green'><strong class='mgr-10 mgl-10'>" + x + " - 2013 </strong></p>" +
								"<div style='padding: 0 10px 10px;'>" +
								"<div> Sales: <strong>"+ Math.round(y)*17  +"</strong></div>" +
								"<div> Profit: <strong>$"+ Math.round(y)*280  +"</strong></div>" +
								"</div>"										
					);
                }
            }
        });

        $('#revenue-bar-chart').bind("mouseleave", function () {
            $("#tooltip").remove();
        });



/* PIE CHART */

		var pie_placeholder = $("#pie-chart");

		var pie_data = [];
		
		pie_data[0] = {
			label: "IE",
			data: 10
		}
		pie_data[1] = {
			label: "Safari",
			data: 8
		}	
		pie_data[2] = {
			label: "Opera",
			data: 8
		}				
		pie_data[3] = {
			label: "Chrome",
			data: 13
		}	
		pie_data[4] = {
			label: "Firefox",
			data: 17
		}	
		pie_data[5] = {
			label: "Other",
			data: 3
		}					
		$.plot(pie_placeholder, pie_data, {
			series: {
				pie: { 
					show: true,
					label:{
						show: true,
						radius: .5,
						formatter: labelFormatter,
						background: {
							opacity: 0
						}
					},

				}
			},
			grid: {
				hoverable: true,
				clickable: true
			},
			colors: ["#FCB660", "#ce91db", "#56A2CF", "#52D793", "#FC8660", "#CCCCCC"]
		});

		pie_placeholder.bind("plothover", function(event, pos, obj) {
			if (!obj) {
				return;
			}
			var percent = parseFloat(obj.series.percent).toFixed(2);
			$("#hover").html("<span style='font-weight:bold; color:" + obj.series.color + "'>" + obj.series.label + " (" + percent + "%)</span>");
		});

		pie_placeholder.bind("plotclick", function(event, pos, obj) {
			if (!obj) {
				return;
			}
			percent = parseFloat(obj.series.percent).toFixed(2);
			alert(""  + obj.series.label + ": " + percent + "%");
		});

	function labelFormatter(label, series) {
		return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
	}
		



		
// Notification
	  setTimeout(function() { notification("topright","notify","fa fa-exclamation-triangle vd_yellow","Welcome to Vendroid","Click on <i class='fa fa-question-circle vd_red'></i> Question Mark beside filter to take a view layout tour guide"); },1500)	 ; 
	  

});
</script>
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXX-X']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script> 


<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script> 
</body>

</html>