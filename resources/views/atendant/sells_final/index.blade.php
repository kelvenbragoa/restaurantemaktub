@extends('layouts_atendant.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/home">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Pedidos em Finalizados</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Pedidos em Finalizados
                
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
                                <th>ID/REF</th>
                                <th>Horas</th>
                                <th>Total</th>
                                <th>Pagamento</th>
                                <th>Ações</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID/REF</th>
                                <th>Horas</th>
                                <th>Total</th>
                                <th>Pagamento</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($sells->count() == 0)
                               <tr><td>Nenhum item</td> </tr> 
                            @endif
                            @foreach ($sells as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->created_at->format('H:i:s')}}</td>
                                <td>{{$item->total}} MT</td>
                                <td>{{$item->payment}}</td>
                               
                               
                                <td> <a href="{{URL::to('/invoice/'.$item->id)}}"><i style="color: black" class="fa fa-file"></i></a></td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Ultima atualização </div>
        </div>
        <!-- /tables-->
    </div>
    <!-- /container-fluid-->
</div>
@endsection