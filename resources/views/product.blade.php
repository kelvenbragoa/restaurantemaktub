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

        <div class="promo mb_30">
            <h3>Taxas de Entregas Aplicada.</h3>
            <p>Entregas feitas dentro da cidade, veja tabela.</p>
            <p>{{\App\Models\Settings::find(1)->company_worktime}}.</p>
            <i class="icon-food_icon_delivery"></i>
        </div>
        <!-- /promo -->
       
        

       
        
        <p>Todos Produtos ({{$products->count()}})</p>
       
        
        <div class="row isotope-wrapper">
           
            
            @foreach ($products as $item)
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
        
             
                {!! $products->links() !!}
            
                
            
       
       
        <!-- /strip row 
        <div class="pagination_fg">
            <a href="#">&laquo;</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">&raquo;</a>
        </div>-->
    </div>
    <!-- /container -->
</main>
<!-- /main -->
@endsection