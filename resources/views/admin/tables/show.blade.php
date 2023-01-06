@extends('layouts_admin.master')
@section('content')
<div class="content-wrapper">

<div class="box_general padding_bottom">
    
      <div class="modal-body">
        <div class="row">
           
          <div class="col-md-12 add_top_30">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Mesa : {{$table->name}}</h2>
            </div>
            <p>Nome: {{$table->name}}</p>
           
           
            <!-- /row-->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" href="{{route('tables.index')}}">Voltar</a>
        
      </div>
    </form>
    <!-- /row-->
</div>
</div>

<!-- /box_general-->
@endsection