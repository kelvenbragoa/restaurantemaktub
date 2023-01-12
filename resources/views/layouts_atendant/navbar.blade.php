<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="/home"><img src="{{asset('template/admin_section/img/logo.png')}}" alt="" width="167" height="36"></a>
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

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My listings">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMylistings1">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">Pedidos delivery</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMylistings1">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Orders Page">
                        <a class="nav-link" href="{{route('sells.index')}}">
                            <i class="fa fa-fw fa-shopping-basket"></i>
                            <span class="nav-link-text">Pedidos Em Curso</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Orders Page">
                        <a class="nav-link" href="{{URL::to('sells-final')}}">
                            <i class="fa fa-fw fa-check"></i>
                            <span class="nav-link-text">Pedidos Finalizados</span>
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
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Orders Page">
                        <a class="nav-link" href="{{route('sells-menu.index')}}">
                            <i class="fa fa-fw fa-shopping-basket"></i>
                            <span class="nav-link-text">Pedidos Em Curso</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pedidos Finalizados">
                        <a class="nav-link" href="{{URL::to('sells-menu-final')}}">
                            <i class="fa fa-fw fa-shopping-basket"></i>
                            <span class="nav-link-text">Pedidos Finalizados</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            
            <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Edit Order">
                <a class="nav-link" href="{{route('categories.index')}}">
                    <i class="fa fa-fw fa-pencil"></i>
                    <span class="nav-link-text">Categorias</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My listings">
                <a class="nav-link"  href="{{route('products.index')}}">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">Produtos</span>
                </a>
                
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add listing + Menu List">
                <a class="nav-link" href="{{route('locals.index')}}">
                    <i class="fa fa-fw fa-plus-circle"></i>
                    <span class="nav-link-text">Locais</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Orders Page">
                <a class="nav-link" href="orders.html">
                    <i class="fa fa-fw fa-shopping-basket"></i>
                    <span class="nav-link-text">Pedidos</span>
                </a>
            </li>
           
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
                <a class="nav-link" href="messages.html">
                    <i class="fa fa-fw fa-envelope-open"></i>
                    <span class="nav-link-text">Messages</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Invoice">
                <a class="nav-link" href="invoice.html" target="_blank">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">Invoice</span>
                </a>
            </li>
             <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
                <a class="nav-link" href="reviews.html">
                    <i class="fa fa-fw fa-star"></i>
                    <span class="nav-link-text">Reviews</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookmarks">
                <a class="nav-link" href="bookmarks.html">
                    <i class="fa fa-fw fa-heart"></i>
                    <span class="nav-link-text">Bookmarks</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
                <a class="nav-link" href="user-profile.html">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">My Profile</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents">
                    <i class="fa fa-fw fa-gear"></i>
                    <span class="nav-link-text">Components</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="charts.html">Charts</a>
                    </li>
                    <li>
                        <a href="tables.html">Tables</a>
                    </li>
                </ul>
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