@extends('layouts_admin.master')
@section('content')
<div class="content-wrapper">

<div class="box_general padding_bottom">
    @if (Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
    <div class="header_box version_2">
        <h2><i class="fa fa-file"></i>Editar Categoria</h2>
    </div>
    <p>Campos marcados <span style="color: tomato">*</span> são obrigatórios</p>
    <form action="{{ route('categories.update', $category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
      <div class="modal-body">
        <div class="row">
          
          <div class="col-md-12 add_top_30">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nome <span style="color: tomato">*</span></label>
                  <input type="text" class="form-control" placeholder="Nome" name="name" required value="{{$category->name}}">
                </div>
              </div>
             
            </div>
            <!-- /row-->
           
            <!-- /row-->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Descrição da categoria <span style="color: tomato">*</span></label>
                  <textarea style="height:100px;" class="form-control" placeholder="Descrição da categoria" name="description" required>{{$category->description}}</textarea>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <img src="/storage/{{$category->image}}" width="250" height="250">
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Imagem</label>
                    <input type="file" class="form-control" placeholder="Image" name="image">
                  </div>
                </div>
              </div>
            <!-- /row-->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" href="{{route('categories.index')}}">Cancelar</a>
        <button class="btn btn-primary" type="input">Salvar</button>
      </div>
    </form>
    <!-- /row-->
</div>
</div>

<!-- /box_general-->
@endsection