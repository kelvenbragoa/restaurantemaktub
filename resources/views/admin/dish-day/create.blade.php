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
        <h2><i class="fa fa-file"></i>Adicionar Prato do Dia</h2>
    </div>
    <p>Campos marcados <span style="color: tomato">*</span> são obrigatórios</p>
    <form action="{{route('dishday.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="row">
          
          <div class="col-md-12 add_top_30">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nome <span style="color: tomato">*</span></label>
                  <input type="text" class="form-control" placeholder="Nome" name="name" required value="{{ old('name') }}">
                </div>
              </div>
             
            </div>
            <!-- /row-->
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Descrição curta do produto <span style="color: tomato">*</span></label>
                    <input type="text" class="form-control" placeholder="Nome" name="short_description" value="{{ old('short_description') }}" required>
                  </div>
                </div>
               
              </div>
            <!-- /row-->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Descrição longa da categoria <span style="color: tomato">*</span></label>
                  <textarea style="height:100px;" class="form-control" placeholder="Descrição da categoria" name="long_description" value="{{ old('long_description') }}" required></textarea>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Preço <span style="color: tomato">*</span></label>
                    <input type="text" class="form-control" placeholder="Preço" name="price" value="{{ old('price') }}" required>
                  </div>
                </div>
               
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Categoria <span style="color: tomato">*</span></label>
                    <select type="text" class="form-control" placeholder="Nome" name="category_id" value="{{ old('category_id') }}" required>
                        <option value="">Selecionar</option>
                        @foreach (App\Models\Category::all() as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                    <select>
                  </div>
                </div>
               
              </div>

            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Imagem</label>
                    <input type="file" class="form-control" placeholder="Image" name="image" value="{{ old('image') }}" >
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