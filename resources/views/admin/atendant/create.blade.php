@extends('layouts_admin.master')
@section('content')
<div class="content-wrapper">

<div class="box_general padding_bottom">
  @if (Session::has('messageSuccess'))
  <div class="alert alert-success">
      {{Session::get('messageSuccess')}}
  </div>
  @endif

  @if (Session::has('messageError'))
  <div class="alert alert-danger">
      {{Session::get('messageError')}}
  </div>
  @endif
    <div class="header_box version_2">
        <h2><i class="fa fa-file"></i>Adicionar Recepcionista</h2>
    </div>
    <p>Campos marcados <span style="color: tomato">*</span> são obrigatórios</p>
    <form action="{{route('atendants.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="row">
          
          <div class="col-md-12 add_top_30">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nome <span style="color: tomato">*</span></label>
                  <input type="text" class="form-control" placeholder="Nome" name="name" value="{{ old('name') }}"  required>
                </div>
              </div>
             
            </div>
            <!-- /row-->
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Telefone <span style="color: tomato">*</span></label>
                    <input type="number" class="form-control" placeholder="Telefone" name="mobile" value="{{ old('mobile') }}"  required>
                  </div>
                </div>
               
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email <span style="color: tomato">*</span></label>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"  required>

                    <input type="hidden" class="form-control"  name="role_id" value="2" required>
                  </div>
                </div>
               
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Sexo <span style="color: tomato">*</span></label>
                    <select type="number" class="form-control" placeholder="Taxa de Entrega" name="gender" required>
                        <option value="">Selecionar Sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                  </div>
                </div>
               
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Password <span style="color: tomato">*</span></label>
                    <input type="text" class="form-control" placeholder="Password" name="password" required>
                  </div>
                </div>
               
              </div>
            <!-- /row-->
       
            <!-- /row-->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" href="{{route('atendants.index')}}">Cancelar</a>
        <button class="btn btn-primary" type="input">Salvar</button>
      </div>
    </form>
    <!-- /row-->
</div>
</div>

<!-- /box_general-->
@endsection