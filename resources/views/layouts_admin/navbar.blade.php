<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="#"><img src="{{asset('template/admin_section/img/logo.png')}}" alt="" width="167" height="36"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="/home">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Categorias">
                <a class="nav-link" href="{{route('categories.index')}}">
                    <i class="fa fa-fw fa-pencil"></i>
                    <span class="nav-link-text">Categorias</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Produtos">
                <a class="nav-link"  href="{{route('products.index')}}">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">Produtos</span>
                </a>
                
            </li>

            {{-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Prato do dia">
                <a class="nav-link"  href="{{route('dishday.index')}}">
                    <i class="fa fa-fw fa-birthday-cake"></i>
                    <span class="nav-link-text">Prato do Dia</span>
                </a>
                
            </li> --}}
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My listings">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMylistings1">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">Pedidos delivery</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMylistings1">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Locais de Entrega">
                        <a class="nav-link" href="{{route('locals.index')}}">
                            <i class="fa fa-fw fa-plus-circle"></i>
                            <span class="nav-link-text">Locais</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pedidos Finalizados">
                        <a class="nav-link" href="{{URL::to('sells-final-admin')}}">
                            <i class="fa fa-fw fa-shopping-basket"></i>
                            <span class="nav-link-text">Pedidos Finalizados</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Comentários">
                        <a class="nav-link" href="{{URL::to('/reviews-admin')}}">
                            <i class="fa fa-fw fa-star"></i>
                            <span class="nav-link-text">Comentários</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My listings">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMylistings">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">Pedidos mesas</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMylistings">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Locais de Entrega">
                        <a class="nav-link" href="{{route('tables.index')}}">
                            <i class="fa fa-fw fa-plus-circle"></i>
                            <span class="nav-link-text">Mesas</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pedidos Finalizados">
                        <a class="nav-link" href="{{URL::to('sells-final-menu-admin')}}">
                            <i class="fa fa-fw fa-shopping-basket"></i>
                            <span class="nav-link-text">Pedidos Finalizados</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            
            
           
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Recepcionista">
                <a class="nav-link" href="{{route('atendants.index')}}">
                    <i class="fa fa-fw fa-users"></i>
                    <span class="nav-link-text">Recepcionista</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configurações">
                <a class="nav-link" href="{{route('settings.index')}}">
                    <i class="fa fa-fw fa-gear"></i>
                    <span class="nav-link-text">Configurações</span>
                </a>
            </li>
            <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Meu perfil">
                <a class="nav-link" href="user-profile.html">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">Meu Perfil</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configurações">
                <a class="nav-link" href="user-profile.html">
                    <i class="fa fa-fw fa-gear"></i>
                    <span class="nav-link-text">Configurações</span>
                </a>
            </li>-->
          
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
            </li>
        </ul>
    </div>
</nav>
<!-- /Navigation-->