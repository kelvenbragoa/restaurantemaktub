@extends('layouts.master')
@section('content')
<main>
    <div style="height: 60px">

    </div>
    <div class="page_header ">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
                    <h1>Encontre oque procuras</h1>
                    
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <form method="get" action="/search">
                    <div class="search_bar_list">
                        <input type="text" class="form-control" name="search" placeholder="Pizza, Hamburguer, 2M">
                        <button type="submit"><i class="icon_search"></i></button>
                    </div>
                </form>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /page_header -->
   
    <!-- /filters_full -->
    <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div>
    <!-- /Map -->

   
    <div class="container margin_30_20">
        @if (Session::has('message'))
                <div class="alert alert-success">
                    
                   <a href="/carts">{{Session::get('message')}}</a> 
                </div>
                @endif

      <h3>Adicionar ao Carrinho</h3>
        <form action="{{route('carts.store')}}" method="POST">
            @csrf
      <div class="row">
          <div class="col">
          
              <img src="/storage/{{$product->image}}" class="w-100" width="300" height="280">
          </div>
          <div class="col-md-8">
              <p>Nome: {{$product->name}}</p>
              <p>Descrição: {{$product->short_description}}</p>
              <p>Preço: {{$product->price}} MT</p>
              <p>Quantidade: <input type="number" value="1" name="qtd" min="1" max="10" class="class"> </p>
              @auth
              <input type="hidden" value="{{$product->id}}" name="product_id">
              <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                @if ($product->is_deleted == 0 && $product->status ==1 )
                <button class="btn_1 medium gradient pulse_bt mt-2" type="submit">Adicionar ao carrinho</button>
                @else
                <a class="btn_1 medium gradient pulse_bt mt-2" type="">Este produto está indisponível</a>
                @endif
              

              @else
              <p style="color: tomato">Entra com sua conta para fazer adicionar ao carrinho, <span><a href="{{route('login')}}">Clique aqui</a></span></p>
              @endauth
            
          </div>

      </div>
    </form>
    <br>

    <h3>Veja mais produtos relacionados</h3>

    <div class="row isotope-wrapper">
        
           
            
        @foreach ($rel_products as $item)
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 isotope-item delivery">
            <div class="strip">
                <figure>
                    <span class="ribbon off">{{$item->price}} MT</span>
                    <img src="img/lazy-placeholder.png" data-src="/storage/{{$item->image}}" class="img-fluid lazy" alt="">
                    <a href="/addcart/{{$item->id}}" class="strip_info">
                        <small>{{$item->category->name}}</small>
                        <div class="item_title">
                            <h3>{{$item->name}}</h3>
                            <small>{{$item->short_description}}</small>
                        </div>
                    </a>
                </figure>
                <ul>
                    <li><span class="deliv yes">Delivery</span></li>
                    <li>
                        <!-- /strip grid  <div class="score"><strong>8.9</strong></div>-->
                    </li>
                </ul>
            </div>
        </div>
        <!-- /strip grid -->
        
        @endforeach
    
      
        

        
        
        
        
        
    </div>
    
    </div>
    <!-- /container -->
</main>
<!-- /main -->
@endsection