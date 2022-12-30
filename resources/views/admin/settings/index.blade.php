@extends('layouts_admin.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/home">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Configurações do Estabelecimento</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <h5>Configure as informações do estabelecimento</h5>
               
                @if (Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
            </div>
            <div class="card-body">
                <h5>Menu Digital:</h5> 
                <div class="row">
                    <div class="mb-3 col-md-3">
                        {{QrCode::color(255, 0, 0)->generate('http://localhost:8000/menudigital');}}
                    </div>
                    <div class="mb-3 col-md-6">
                        <p>QrCode usado para aceder o menu digital</p>
                        <a href="{{URL::to('/print-template')}}" class="btn btn-primary">Clique aqui para imprimir modelo</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('settings.update', $settings->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputFirstName">Nome</label>
                            <input type="text" class="form-control" id="inputFirstName" name="company_name"  value="{{$settings->company_name}}">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputLastName">Endereço</label>
                            <input type="text" class="form-control" id="inputLastName" name="company_address" value="{{$settings->company_address}}">
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputCity">Número/Codigo</label>
                            <input type="text" class="form-control" id="inputCity" name="company_number" value="{{$settings->company_number}}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputState">Flat</label>
                            <input type="text" class="form-control" id="inputCity" name="company_flat" value="{{$settings->company_flat}}">
                        </div>
                        <div class="mb-3 col-md-2">
                            <label class="form-label" for="inputZip">Cidade</label>
                            <input type="text" class="form-control" id="inputCity" name="company_city" value="{{$settings->company_city}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputCity">Província</label>
                            <input type="text" class="form-control" id="inputCity" name="company_province" value="{{$settings->company_province}}">
                        </div>
                        
                        <div class="mb-3 col-md-2">
                            <label class="form-label" for="inputZip">Telefone</label>
                            <input type="text" class="form-control" id="inputCity" name="company_mobile" value="{{$settings->company_mobile}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputFirstName">Email</label>
                            <input type="text" class="form-control" id="inputFirstName" name="company_email"  value="{{$settings->company_email}}">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputLastName">Website</label>
                            <input type="text" class="form-control" id="inputLastName" name="company_web"  value="{{$settings->company_web}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputFirstName">Horário de Abertura e dias de trabalho</label>
                            <textarea type="text" class="form-control" id="inputFirstName" name="company_worktime" >{{$settings->company_worktime}}</textarea>

                        </div>
                       
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="inputFirstName">NUIT</label>
                            <input type="text" class="form-control" id="inputFirstName" name="company_nuit"  value="{{$settings->company_nuit}}">

                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputCity">Forma de Pagamento 1</label>
                            <input type="text" class="form-control" id="inputCity" name="company_bank_name1" value="{{$settings->company_bank_name1}}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputState">Forma de Pagamento 2</label>
                            <input type="text" class="form-control" id="inputCity" name="company_bank_name2" value="{{$settings->company_bank_name2}}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputZip">Forma de Pagamento 3</label>
                            <input type="text" class="form-control" id="inputCity" name="company_bank_name3" value="{{$settings->company_bank_name3}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputCity">Número forma de pagamento 1</label>
                            <input type="text" class="form-control" id="inputCity" name="company_bank_account1" value="{{$settings->company_bank_account1}}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputState">Número forma de pagamento 1</label>
                            <input type="text" class="form-control" id="inputCity" name="company_bank_account2" value="{{$settings->company_bank_account2}}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputZip">Número forma de pagamento 1</label>
                            <input type="text" class="form-control" id="inputCity" name="company_bank_account3" value="{{$settings->company_bank_account3}}">
                        </div>
                    </div>

                    <div class="row">
                       
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputZip">Tempo de atualização da tela do pedido 1 - 60 (segundos)</label>
                            <input type="number" class="form-control" id="inputCity" name="time" value="{{$settings->time}}" min="1" max="60">
                        </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
                <div class="card-footer small text-muted">Ultima atualização feita em: {{$last->updated_at ?? ''}}</div>
            </div>
        </div>
        <!-- /tables-->
    </div>
    <!-- /container-fluid-->
</div>
@endsection