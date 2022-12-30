@extends('layouts_admin.master')
@section('content')
<div class="content-wrapper">

<div class="box_general padding_bottom">
    
      <div class="modal-body">
        <div class="row">
           
          <div class="col-md-12 add_top_30">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Categoria : {{$category->name}}</h2>
            </div>
            <p>Nome do categoria: {{$category->name}}</p>
           <p>Descrição da categoria: {{$category->description}}</p>
           <p>Número de produtos na categoria: {{count($category->product)}}</p>
           <img src="/storage/{{$category->image}}"  width="250" height="250" alt="">
            <!-- /row-->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" href="{{route('categories.index')}}">Voltar</a>
        
      </div>
    </form>
    <!-- /row-->
</div>
</div>

<!-- /box_general-->
@endsection