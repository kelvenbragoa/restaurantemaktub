@extends('layouts_menu.master')
@section('content')
<main>
    <div style="height: 60px">

    </div>
    
    <!-- /filters_full -->
    <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div>
    <!-- /Map -->

   
    <div class="container margin_30_20">

        <div class="promo mb_30">
            <h2>MENU DIGITAL.</h2>
            <h3>Taxas de Entregas Aplicada.</h3>
            <p>Entregas feitas dentro da cidade, veja tabela.</p>
            <p>{{\App\Models\Settings::find(1)->company_worktime}}.</p>
            <i class="icon-food_icon_delivery"></i>
        </div>
        <!-- /promo -->
        <!-- /promo -->
        @if (Session::has('message'))
        <div class="alert alert-success">
            
           <a href="/carts">{{Session::get('message')}}</a> 
        </div>
        @endif
       
        

       <div class="row">
        <div class="col">
            <a href="{{URL::to('/menudigital/'.$usermenu->id.'/user/'.$table->id.'/table')}}" class="btn_1 gradient full-width">Voltar as categorias</a> 
        </div>
        <div class="col">
            <a href="{{URL::to('/menudigital/'.$usermenu->id.'/user/'.$table->id.'/table/cart')}}" class="btn_1 gradient full-width">Clique aqui para ver seu carrinho</a>
        </div>
       </div>
        
        <p>Categoria: {{$category->name}}</p>
        <p>Mesa: {{$table->name}}</p>
       
        
        <div class="row isotope-wrapper">
           
            
            @foreach ($products as $item)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 isotope-item delivery">
                <div class="strip">
                    <figure>
                        <span class="ribbon off">{{$item->price}} MT</span>
                        <img src="img/lazy-placeholder.png" data-src="/storage/{{$item->image}}" class="img-fluid lazy" alt="">
                        <a href="" data-toggle="modal" data-target="#exampleModal{{$item->id}}" class="strip_info">
                            <small>{{$item->category->name}}</small>
                            <div class="item_title">
                                <h3>{{$item->name}}</h3>
                                <small>{{$item->short_description}}</small>
                            </div>
                        </a>
                    </figure>
                    <ul>
                        <li><span class="deliv yes">Maktub</span></li>
                        <li>
                            <!-- /strip grid  <div class="score"><strong>8.9</strong></div>-->
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /strip grid -->
            @include('menudigital.menu.modal')
            
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