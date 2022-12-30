@extends('layouts_admin.master')
@section('content')
<div class="content-wrapper">

<div class="box_general padding_bottom">
    
      <div class="modal-body">
        <div class="row">
           
          <div class="col-md-12 add_top_30">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Prato do Dia : {{$dishday->name}}</h2>
            </div>
          

           <p>Nome: {{$dishday->name}}</p>
           <p>Descrição breve: {{$dishday->short_description}}</p>
           <p>Descrição longa: {{$dishday->long_description}}</p>
           <p>Preço: {{$dishday->price}} MT</p>
           <p>Número de vendas: {{count($dishday->sells)}}</p>
           <img src="/storage/{{$dishday->image}}"  width="250" height="250" alt="">
            <!-- /row-->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" href="{{route('dishday.index')}}">Voltar</a>
        
      </div>
    </form>
    <!-- /row-->
</div>
</div>

<!-- /box_general-->
@endsection