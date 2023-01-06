@extends('layouts.master')
@section('content')

<div class="hero_single version_1">
    <div class="opacity-mask">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <h1>Entrega de Refeições ao domicilio</h1>
                    <p>Com melhor preço do mercado</p>
                    <form method="get" action="/search">
                        <div class="row no-gutters custom-search-input">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <input class="form-control no_border_r" type="text" id="search" name="search" placeholder="Oque deseja comer...">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn_1 gradient" type="submit">Search</button>
                            </div>
                        </div>
                        <!-- /row -->
                        <div class="search_trends">
                            <h5>Oque procurar:</h5>
                            <ul>
                                <li><a href="#0">Hamburguer</a></li>
                                <li><a href="#0">Pizza</a></li>
                                <li><a href="#0">Acompanhantes</a></li>
                                <li><a href="#0">Mariscos</a></li>
                            </ul>
                        </div>
                        <div class="search_trends">
                        <h4>{{\App\Models\Settings::find(1)->company_worktime}}</h4> 
                        </div>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <div class="wave hero"></div>
</div>
<!-- /hero_single -->

<div class="container margin_30_60">
    <div class="main_title center">
        <span><em></em></span>
        <h2>Categorias Populares</h2>
        <p>Todas categorias dos nossos pratos</p>
    </div>
    @if ($categories->count() == 0)
        <h5 class="text-center">Não há categorias disponiveis no momento</h5> 
        @endif
    <!-- /main_title -->

    <div class="owl-carousel owl-theme categories_carousel">
        
        @foreach ($categories as $item)
        <div class="item_version_2">
            <a href="/category/{{$item->id}}">
                <figure>
                    <!--<span>98</span>-->
                    <img src="{{asset('template/img/home_cat_placeholder.jpg')}}" data-src="/storage/{{$item->image}}" alt="" class="owl-lazy" width="1000" height="1000">
                    <div class="info">
                        <h3>{{$item->name}}</h3>
                        <small>{{$item->description}}</small>
                    </div>
                </figure>
            </a>
        </div>
        @endforeach
       
</div>
<!-- /container -->

<div class="bg_gray">
    <div class="container margin_60_40">
        @if ($dish_day != null)
                <div class="main_title">
                    <span><em></em></span>
                    <h2>Prato do Dia!</h2>
                    <p>Veja o nosso prato para o dia de hoje,{{$dish_day->name}}</p>
                
                    
                </div>
                <!--Banner para prato do dia-->
                <div class="banner lazy" data-bg="url(/storage/{{$dish_day->image}})">
                    <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                        <div>
                            <h3>{{$dish_day->name}}</h3>
                            <small>{{$dish_day->short_description}}</small>
                            <p>Preço: {{$dish_day->price}} MT<span class="ribbon off">{{$dish_day->price}} MT</span></p>
                            <a href="{{URL::to('/addcart/'.$dish_day->id)}}" class="btn_1 gradient">Pedir já</a>
                        </div>
                    </div>
                    <!-- /wrapper -->
                </div> 
                <!-- /banner -->
        @else
            
        @endif
        

        <div class="main_title">
            <span><em></em></span>
            <h2>Nossos produtos</h2>
            <p>Confira todos nossos produtos.</p>
            @if ($products1->count() == 0)
            <h5 class="text-center">Não há produtos disponiveis no momento</h5> 
            @else
            <a href="{{URL::to('/product')}}">Ver todos &rarr;</a>
            @endif
            
        </div>
        <div class="row add_bottom_25">
            <div class="col-lg-6">
                <div class="list_home">
                    <ul>
                        @foreach ($products1 as $item)
                            
                       
                        <li>
                            <a href="/addcart/{{$item->id}}">
                                <figure>
                                    <img src="{{asset('template/img/location_list_placeholder.png')}}" data-src="/storage/{{$item->image}}" alt="" class="lazy" width="350" height="233">
                                </figure>
                                <!--<div class="score"><strong>9.5</strong></div>-->
                                <em>Categoria: {{$item->category->name}}</em>
                                <h3>{{$item->name}}</h3>
                                <small>{{$item->short_description}}</small>
                                <ul>
                                    <li><span class="ribbon off">{{$item->price}} MT</span></li>
                                    
                                </ul>
                            </a>
                        </li>
                    
                        @endforeach
                      
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="list_home">
                    <ul>
                        @foreach ($products2 as $item)
                        <li>
                            <a href="/addcart/{{$item->id}}">
                                <figure>
                                    <img src="{{asset('template/img/location_list_placeholder.png')}}" data-src="/storage/{{$item->image}}" alt="" class="lazy" width="350" height="233">
                                </figure>
                                
                                <em>Categoria: {{$item->category->name}}</em>
                                <h3>{{$item->name}}</h3>
                                <small>{{$item->short_description}}</small>
                                <ul>
                                    <li><span class="ribbon off">{{$item->price}} MT</span></li>
                                    
                                </ul>
                            </a>
                        </li>
                       
                        @endforeach
                       
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
        <div class="banner lazy" data-bg="url({{asset('template/img/prancheta.jpg')}})">
            <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                <div>
                    <small>Delivery</small>
                    <h3>Fazemos entregas ao domicilio</h3>
                    <p>Desfrute de uma comida deliciosa em minutos!</p>
                    <a href="{{URL::to('/product')}}" class="btn_1 gradient">Pedir já!</a>
                </div>
            </div>
            <!-- /wrapper -->
        </div>
        <!-- /banner -->
    </div>
</div>
<!-- /bg_gray -->
<div class="shape_element_2">
    <div class="container margin_60_0 ">
        <div class="main_title center">
            <span><em></em></span>
            <h2>Regiões que estamos a entregar e suas tarifas</h2>
                

            
            
            <table class="styled-table centertable">
                <thead>
                    <tr>
                        <th>Região</th>
                        <th>Tarifa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locals as $item)
                    <tr>
                        <td>{{$item->local}}</td>
                        <td>{{$item->delivery_tax}} MT</td>
                    </tr>
                    @endforeach
                   
                    
                    
                    <!-- and so on... -->
                </tbody>
            </table>
      
        </div>
    
    </div>
</div>
<!-- /shape_element_2 -->

<div class="shape_element_2">
    <div class="container margin_60_0">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box_how">
                            <figure><img src="{{asset('template/img/lazy-placeholder-100-100-white.png')}}" data-src="{{asset('template/img/how_1.svg')}}" alt="" width="150" height="167" class="lazy"></figure>
                            <h3>Encomende já</h3>
                            <p>Encontre tudo que precisa com um clique.</p>
                        </div>
                        <div class="box_how">
                            <figure><img src="{{asset('template/img/lazy-placeholder-100-100-white.png')}}" data-src="{{asset('template/img/how_2.svg')}}" alt="" width="130" height="145" class="lazy"></figure>
                            <h3>Entregas rápidas</h3>
                            <p>Fazemos entregas em menos de 30 minutos ao redor da cidade</p>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="box_how">
                            <figure><img src="{{asset('template/img/lazy-placeholder-100-100-white.png')}}" data-src="{{asset('template/img/how_3.svg')}}" alt="" width="150" height="132" class="lazy"></figure>
                            <h3>Curte a nossa comida</h3>
                            <p>Sabor delicioso e maravilhosos.</p>
                        </div>
                    </div>
                </div>
                <p class="text-center mt-3 d-block d-lg-none"><a href="#0" class="btn_1 medium gradient pulse_bt mt-2">Register Now!</a></p>
            </div>
            <div class="col-lg-5 offset-lg-1 align-self-center">
                <div class="intro_txt">
                    <div class="main_title">
                        <span><em></em></span>
                        <h2>Clique aqui e encomende já</h2>
                    </div>
                    <p class="lead">Entregas ao domicilio em um tempo curto.</p>
                    <p>Desfrute da sua comida sem sair de casa.</p>
                    @auth
                    <p><a href="/product" class="btn_1 medium gradient pulse_bt mt-2">Ver produtos</a></p> 
                    @else
                    <p><a href="{{ route('login') }}" class="btn_1 medium gradient pulse_bt mt-2">Entrar</a></p> 
                    @endauth
                    <p><a href="{{ URL::to('/all-reviews') }}" class="btn_1 medium gradient pulse_bt mt-2">Veja os comentários</a></p> 
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- /shape_element_2 -->
@if ($dish_day != null)
@include('modalprato')
@endif

<script>
    $(document).ready(function(){
        $("#exampleModalprato").modal('show');
    });
</script>



@endsection