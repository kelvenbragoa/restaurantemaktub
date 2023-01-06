<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Delivery Beira, Sofala, Entrega , Refeições">
    <meta name="author" content="Kelven Bragoa">
    <title>Maktub</title>

    <!-- Favicons Icons para renderizar-->
    <link rel="shortcut icon" href="{{asset('template/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('template/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('template/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset('template/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset('template/img/apple-touch-icon-144x144-precomposed.png')}}">
    <!-- Fim Favicons Icons para renderizar-->

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FIM GOOGLE WEB FONT -->

    <!-- BASE CSS DO MODELO -->
    <link href="{{asset('template/css/table-style.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/bootstrap_customized.min.css')}}" rel="stylesheet">
    <!-- FIM BASE CSS DO MODELO -->
    
    <link href="{{asset('template/css/order-sign_up.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/detail-page.css')}}" rel="stylesheet">

    <!-- ESPECIFICOS CSS PARA PARTE DE REVIEW - ESTILO DE ROLLUP -->
    <link href="{{asset('template/css/home.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/review.css')}}" rel="stylesheet">
    <!-- FIM ESPECIFICOS CSS PARA PARTE DE REVIEW - ESTILO DE ROLLUP -->
    
    <!-- CSS ADICIONAIS TABELA DE PRECO ETC -->
    <link href="{{asset('template/css/custom.css')}}" rel="stylesheet">
    <!-- FIM CSS ADICIONAIS TABELA DE PRECO ETC -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
         <!--INICIO CABECALHO-->       
    <header class="header black_nav clearfix element_to_stick">
        <div class="container">
            <div id="logo">
                <a href="/">
                    <img src="{{asset('template/img/logo_sticky.png')}}" width="162" height="35" alt="">
                </a>
            </div>
            <div class="layer"></div><!-- MASCARA PARA O MENU DE CELULAR -->
            <ul id="top_menu" class="drop_user">
                @auth
               
                    
                    
                    <!-- MENU DROP DOWN -->
               
                <li>
                    <div class="dropdown user clearfix">
                        <a href="#" data-toggle="dropdown">
                            Menu
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-content">
                                <ul>
                                    <li><a href="/home"><i class="icon_cog"></i>Home</a></li>
                                    
                                    <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();"><i class="icon_key"></i>Terminar Sessão</a></li>
                                </ul>
                            </div>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                     <!-- MENU DROP DOWN -->
                </li>
              
                @endauth
                
                
            </ul>
            <!-- <ul id="top_menu">
               AINDA POR REVER . TOP MENU
               
            </ul>
            /top_menu -->

            <!-- MENU NORMAL PRA TELAS DE 1200 PARA LA -->
            <a href="#0" class="open_close">
                <i class="icon_menu"></i><span>Menu</span>
            </a>
           <nav class="main-menu">
                <div id="header_menu">
                    <a href="#0" class="open_close">
                        <i class="icon_close"></i><span>Menu</span>
                    </a>
                    <a href="/"><img src="{{asset('template/admin_section/img/logo.png')}}" width="162" height="35" alt=""></a>
                </div>
                <ul>
                    <li class="submenu">
                        <a href="/">Carrinho</a>
                    </li>
                    <!--<li class="submenu">
                        <a href="/home">Home</a>
                    </li>-->
                    <li class="submenu">
                        <a href="/product" class="show-submenu">Minhas Compras</a>
                    </li>
                   
                  
                    <!-- MENU NORMAL PRA TELAS DE 1200 PARA LA -->
                    
                </ul>
            </nav>
        </div>
    </header>
    <!-- /CABECALHO -->
