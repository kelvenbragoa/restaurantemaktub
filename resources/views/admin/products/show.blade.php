@extends('layouts_admin.master')
@section('content')
<div class="content-wrapper">

<div class="box_general padding_bottom">
    
      <div class="modal-body">
        <div class="row">
           
          <div class="col-md-12 add_top_30">
            <div class="header_box version_2">
                <h2><a href="{{ route('products.index')}}"><i class="fa fa-arrow-left"></i></a>Produto : {{$product->name}}</h2>
            </div>
          

           <p>Nome: {{$product->name}}</p>
           <p>Descrição breve: {{$product->short_description}}</p>
           <p>Descrição longa: {{$product->long_description}}</p>
           <p>Preço: {{$product->price}} MT</p>
           <p>Número de vendas: {{count($product->sells)}}</p>
           <img src="/storage/{{$product->image}}"  width="250" height="250" alt="">
            <!-- /row-->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" href="{{route('products.index')}}">Voltar</a>
        
      </div>
    </form>
    <!-- /row-->
</div>
</div>

<!-- /box_general-->
@endsection