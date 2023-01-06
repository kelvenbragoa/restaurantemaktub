@extends('layouts_admin.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/home">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Mesas</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Mesas
                <div class="text-left">
                    <a class="btn btn-info" href="{{route('tables.create')}}">Adicionar</a> 
                </div>
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
                                <th>Mesa</th>
                               
                                <th>Ações</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mesa</th>
                               
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($tables->count() == 0)
                               <tr><td>Nenhum item</td> </tr> 
                            @endif
                            @foreach ($tables as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                               
                               
                                <td> 
                                    <a href="{{URL::to('/tables/'.$item->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                    <a href="{{URL::to('/tables/'.$item->id)}}"><i class="fa fa-eye"></i></a>
                                    {{-- <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}"><i class="fa fa-trash"></i></a>     --}}
                                </td>
                            </tr>
                            @include('admin.tables.modaldelete')
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