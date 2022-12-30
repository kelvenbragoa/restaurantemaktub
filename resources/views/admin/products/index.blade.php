@extends('layouts_admin.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/home">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Produtos</li>

        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Produtos
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="text-left">
                            <a class="btn btn-info" href="{{route('products.create')}}">Adicionar</a> 
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="text-right">
                            <a class="btn btn-warning" href="{{URL::to('/garbage/products')}}"><i class="fa fa-trash"></i>Lixeira</a> 
                        </div>
                    </div>
                    
                    
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
                            @if ($products->count() == 0)
                               <tr><td>Nenhum item</td> </tr> 
                            @endif
                            @foreach ($products as $item)
                            <tr @if ($item->is_dish_day == 1 && $item->date_dish_day == date('Y-m-d')) style='background-color:orange' @endif>
                                <td>{{$item->name}} @if ($item->is_dish_day == 1 && $item->date_dish_day == date('Y-m-d')) (Prato do dia) @endif</td>
                                <td>{{$item->short_description}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->category->name}}</td>
                                <td>@if ($item->status == 1) <span style="color: green">Ativo</span> @endif @if ($item->status == 0) <span style="color: red">Desativado</span> @endif</td>

                                <td> <img src="/storage/{{$item->image}}" alt="" width="50" height="50"></td>
                               
                                <td>
                                    <a href="{{URL::to('/products/'.$item->id.'/edit')}}"><i class="fa fa-edit"></i></a> 
                                    <a href="{{URL::to('/products/'.$item->id)}}"><i class="fa fa-eye"></i></a>
                                    <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @include('admin.products.modaldelete')
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