@extends('layouts.master')
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
                            {{-- <a href="{{URL::to('/addcart/'.$dish_day->id)}}" class="btn_1 gradient">Pedir já</a> --}}
                        </div>
                    </div>
                    <!-- /wrapper -->
                </div> 
                <!-- /banner -->
        @else
            
        @endif
        
        
        <div class="row isotope-wrapper">
           
            
            @foreach ($categories as $item)
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 isotope-item delivery">
                <figure>
                <div class="item_version_2">
                    <a href="{{URL::to('/menu/'.$item->id.'')}}">
                        <figure>
                            <!--<span>98</span>-->
                            <img src="/storage/{{$item->image}}" data-src="/storage/{{$item->image}}" alt="" class="owl-lazy" width="500" height="500">
                            <div class="info">
                                <h3>{{$item->name}}</h3>
                                <small>{{$item->description}}</small>
                            </div>
                        </figure>
                    </a>
               
            </div>
        </figure>
            </div>
            <!-- /strip grid -->
            
            @endforeach
        </div>
        
             
              
    </div>
    <!-- /container -->
</main>
<!-- /main -->
@endsection