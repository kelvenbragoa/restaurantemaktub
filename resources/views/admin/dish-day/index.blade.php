@extends('layouts_admin.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/home">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Prato do Dia</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Prato do Dia
                <div class="text-left">
                    <a class="btn btn-info" href="{{route('dishday.create')}}">Adicionar</a> 
                </div>
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Categoria</th>
                                <th>Estado</th>
                                <th>Imagem</th>
                                <th>Ações</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Categoria</th>
                                <th>Estado</th>
                                <th>Imagem</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($dishday->count() == 0)
                               <tr><td>Nenhum item</td> </tr> 
                            @endif
                            @foreach ($dishday as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->short_description}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->category->name}}</td>
                                <td>@if ($item->status == 1) <span style="color: green">Ativo</span> @endif @if ($item->status == 0) <span style="color: red">Desativado</span> @endif</td>

                                <td> <img src="/storage/{{$item->image}}" alt="" width="50" height="50"></td>
                               
                                <td>
                                    <a href="{{URL::to('/dishday/'.$item->id.'/edit')}}"><i class="fa fa-edit"></i></a> 
                                    <a href="{{URL::to('/dishday/'.$item->id)}}"><i class="fa fa-eye"></i></a>
                                    <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @include('admin.dishday.modaldelete')
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