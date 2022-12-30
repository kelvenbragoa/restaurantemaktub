<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Delivery e entrega de refeições">
    <meta name="author" content="Kelven Bragoa">
    <title>Delivery</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('template/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('template/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('template/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset('template/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset('template/img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('template/css/bootstrap_customized.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{asset('template/css/error.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('template/css/custom.css')}}" rel="stylesheet">

</head>

<body>
				
	<header class="header_in clearfix">
        <div class="container">
            <div id="logo">
                <a href="/">
                    <img src="{{asset('template/img/logo_sticky.png')}}" width="140" height="35" alt="">
                </a>
            </div>
            <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
            <ul id="top_menu">
                @auth
               
                <li>
                    <div class="dropdown user clearfix">
                        <a href="#" data-toggle="dropdown">
                            <span>{{auth()->user()->name}}</span><figure><img src="/storage/{{auth()->user()->image}}" alt=""></figure>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-content">
                                <ul>
                                    <li><a href="/home"><i class="icon_cog"></i>Home</a></li>
                                    
                                    <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();"><i class="icon_key"></i>Log out</a></li>
                                </ul>
                            </div>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <!-- /dropdown -->
                </li>
              
                @endauth
            </ul>
            <!-- /top_menu -->
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
                        <a href="/">Inicio</a>
                    </li>
                    <!--<li class="submenu">
                        <a href="/home">Home</a>
                    </li>-->

                    <li class="submenu">
                        <a href="{{URL::to('/product')}}" class="show-submenu">Produtos</a>
                    </li>
                    <li class="submenu">
                        <a href="{{route('menu.index')}}" class="show-submenu">Menu Digital</a>
                    </li>
                    @auth
                    <li class="submenu">
                        <a href="{{route('carts.index')}}">Carrinho</a>
                    </li>
                    <li class="submenu">
                        <a href="{{URL::to('/myorder')}}">Minhas Compras</a>
                    </li>
                    
                    @else
                    <li class="submenu">
                        <a href="{{ route('login') }}" class="show-submenu">Entrar</a>
                    </li>
                    @endauth
                  
                    
                    
                </ul>
            </nav>
        </div>
    </header>
    <!-- /header -->
	
	<main class="">
        @if (Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="container">
            <form method="POST" action="{{route('clients.update',auth()->user()->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                   
                    <img src="/storage/{{auth()->user()->image}}" class="rounded-circle w-100" width="300" height="300">
                    <br>
                    <input type="file" name="image">
                    </div>
                </div>
                <div class="col-md-8 add_top_30">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" placeholder="Nome" name="name" value="{{auth()->user()->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" readonly value="{{auth()->user()->email}}" >
                            </div>
                        </div>
                    </div>
                    <!-- /row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="number" class="form-control" name="mobile" placeholder="Telefone" value="{{auth()->user()->mobile}}">
                            </div>
                        </div>
                        
                    </div>
                    <!-- /row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Informação pessoal</label>
                                <textarea style="height:100px;" name="description" class="form-control" placeholder="Personal info">{{auth()->user()->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <p><button type="submit" class="btn_1 medium">Salvar</button></p>
                    <!-- /row-->
                </div>
            </div>
           </form>
        </div>

                    
    </main>
    <!-- /main -->

    <footer>
        <div class="wave footer"></div>
        <div class="container margin_60_40 fix_mobile">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h3 data-target="#collapse_1">Ligações</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_1">
                        <ul>
                           <!-- <li><a href="{{URL::to('/about')}}">Acerca de nós</a></li>-->
                            <li><a href="{{URL::to('/all-reviews')}}">Comentários</a></li>
                            <li><a href="{{URL::to('/home')}}">Minha conta</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 data-target="#collapse_2">Métodos pagamento</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_2">
                        <ul>
                            <li><a href="#">{{\App\Models\Settings::find(1)->company_bank_name1}} | {{\App\Models\Settings::find(1)->company_bank_account1}} </a></li>
                            <li><a href="#">{{\App\Models\Settings::find(1)->company_bank_name2}} | {{\App\Models\Settings::find(1)->company_bank_account2}}</a></li>
                            <li><a href="#">{{\App\Models\Settings::find(1)->company_bank_name3}} | {{\App\Models\Settings::find(1)->company_bank_account3}}</a></li>
                        
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8">
                        <h3 data-target="#collapse_3">Contactos</h3>
                    <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                        <ul>
                            <li><i class="icon_house_alt"></i>{{\App\Models\Settings::find(1)->company_address}}<br>{{\App\Models\Settings::find(1)->company_city}} - {{\App\Models\Settings::find(1)->company_province}}</li>
                            <li><i class="icon_mobile"></i>{{\App\Models\Settings::find(1)->company_mobile}}</li>
                            <li><i class="icon_mail_alt"></i><a href="#0">{{\App\Models\Settings::find(1)->company_email}}</a></li>
                        </ul>
                    </div>
                </div>
                <!--
                <div class="col-lg-3 col-md-6">
                        
                    <div class="collapse dont-collapse-sm" id="collapse_4">
                       
                        <div class="follow_us">
                            <h5>Siga nos</h5>
                            <ul>
                                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('template/img/twitter_icon.svg')}}" alt="" class="lazy"></a></li>
                                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('template/img/facebook_icon.svg')}}" alt="" class="lazy"></a></li>
                                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('template/img/instagram_icon.svg')}}" alt="" class="lazy"></a></li>
                                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('template/img/youtube_icon.svg')}}" alt="" class="lazy"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>-->
            </div>
            <!-- /row-->
            <hr>
            <div class="row add_bottom_25">
                <div class="col-lg-6">
                    <ul class="footer-selector clearfix">
                        <!--<li>
                            <div class="styled-select lang-selector">
                                <select>
                                    <option value="English" selected>English</option>
                                    <option value="French">French</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="Russian">Russian</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="styled-select currency-selector">
                                <select>
                                    <option value="US Dollars" selected>US Dollars</option>
                                    <option value="Euro">Euro</option>
                                </select>
                            </div>
                        </li>-->
                        <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('template/img/cards_all.svg')}}" alt="" width="230" height="35" class="lazy"></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="additional_links">
                        <!--<li><a href="{{URL::to('/terms')}}">Termos e condições / Privacidade</a></li>-->
                        <li><span>© {{\App\Models\Settings::find(1)->company_name}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--/footer-->

	<div id="toTop"></div><!-- Back to top button -->
	


    <!-- Modal dialog -->
    <div id="modal-dialog" class="zoom-anim-dialog mfp-hide">
        <div class="small-dialog-header">
            <h3>Modal</h3>
        </div>
        <div class="content">
            <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
        </div>
    </div>
    <!-- /Modal dialog -->
	
	<!-- COMMON SCRIPTS -->
<script src="{{asset('template/js/common_scripts.min.js')}}"></script>
<script src="{{asset('template/js/common_func.js')}}"></script>
<script src="{{asset('template/assets/validate.js')}}"></script>
<!-- SPECIFIC SCRIPTS -->
<script src="{{asset('template/js/specific_review.js')}}"></script>
</body>
</html>