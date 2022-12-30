@extends('layouts_admin.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/home">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Comentários</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Comentários
                
                @if (Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Respondido</th>
                                <th>Comida</th>
                                <th>Pontualidade</th>
                                <th>Serviço</th>
                                <th>Preço</th>
                                <th>Média</th>
                                <th>Ações</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Respondido</th>
                                <th>Comida</th>
                                <th>Pontualidade</th>
                                <th>Serviço</th>
                                <th>Preço</th>
                                <th>Média</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($reviews->count() == 0)
                               <tr><td>Nenhum item</td> </tr> 
                            @endif
                            @foreach ($reviews as $item)
                            <tr>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->user->mobile}}</td>
                                <td>@if ($item->reply == null) <span style="color: tomato">Não respondido</span>  @else <span style="color: green">Respondido</span> @endif</td>
                                <td>{{$item->food}}</td>
                                <td>{{$item->pontual}}</td>
                                <td>{{$item->service}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{($item->price+$item->service+$item->pontual+$item->food)/5}}</td>
                                <td><a href="#"data-toggle="modal" data-target="#exampleModal{{$item->id}}"><i class="fa fa-eye"></i></a></td>
                            </tr>
                            @include('admin.modalreview')
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Ultima atualização {{$last->updated_at ?? ''}}</div>
        </div>
        <!-- /tables-->
    </div>
    <!-- /container-fluid-->
</div>
@endsection