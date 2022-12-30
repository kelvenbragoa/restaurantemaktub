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
        <h2><i class="fa fa-file"></i>Adicionar Locais de Entrega</h2>
    </div>
    <p>Campos marcados <span style="color: tomato">*</span> são obrigatórios</p>
    <form action="{{route('locals.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="row">
          
          <div class="col-md-12 add_top_30">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nome Local <span style="color: tomato">*</span></label>
                  <input type="text" class="form-control" placeholder="Nome" name="local" required>
                </div>
              </div>
             
            </div>
            <!-- /row-->
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Taxa de Entrega(MT) <span style="color: tomato">*</span></label>
                    <input type="number" class="form-control" placeholder="Taxa de Entrega" name="delivery_tax" required>
                  </div>
                </div>
               
              </div>
            <!-- /row-->
       
            <!-- /row-->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" href="{{route('locals.index')}}">Cancelar</a>
        <button class="btn btn-primary" type="input">Salvar</button>
      </div>
    </form>
    <!-- /row-->
</div>
</div>

<!-- /box_general-->
@endsection