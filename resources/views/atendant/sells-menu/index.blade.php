@extends('layouts_atendant.master')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/home">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Pedidos em Curso {{ Request::get('total') }}</li> 
            
        </ol>
       

        

        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Pedidos em Curso(Legenda)
                <div class="row">
                    <div class="col-lg" style="background: rgb(237, 109, 86)">Pendente(4)</div>
                    <div class="col-lg" style="background: rgb(81, 153, 235)">Confirmado(3)</div>
                    <div class="col-lg" style="background: rgb(230, 250, 116)">Preparando(2)</div>
                    <div class="col-lg" style="background: rgb(153, 247, 110)">Pronto(1)</div>
                    
                </div>
                
                @if (Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif

                @if (Request::get('total') < count($sells))
                <div class="alert alert-success">
                    Novo pedido
                    <audio autoplay="true">
                        <source src="/storage/sound/success.mp3" type="audio/mpeg">
                    </audio>
                </div>
                 @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID/REF</th>
                                <th>Horas/Data</th>
                                <th>Total</th>
                                <th>Telefone cliente</th>
                                <th>Estado</th>
                                <th>Ações</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID/REF</th>
                                <th>Horas/Data</th>
                                <th>Total</th>
                                <th>Telefone cliente</th>
                                <th>Estado</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($sells->count() == 0)
                               <tr><td>Nenhum item</td> </tr> 
                            @endif
                            @foreach ($sells as $item)
                            <tr 
                            @if ($item->status == 4) style="background: rgb(237, 109, 86)" @endif
                            @if ($item->status == 3) style="background: rgb(81, 153, 235)" @endif
                            @if ($item->status == 2) style="background: rgb(230, 250, 116)" @endif
                            @if ($item->status == 1) style="background: rgb(153, 247, 110)" @endif
                            
                            >
                                <td>{{$item->id}}</td>
                                <td>{{$item->created_at->format('H:i:s')}} / {{$item->created_at->format('d-m-Y')}}</td>
                                <td>{{$item->total}} MT</td>
                                <td>{{$item->user->mobile}}</td>
                                <td >
                                    <a href="#" data-toggle="modal" data-target="#exampleModal{{$item->id}}" style="color: black">
                                        @if ($item->status == 4) Pendente  @endif
                                        @if ($item->status == 3) Confirmado  @endif
                                        @if ($item->status == 2) Preparando @endif
                                        @if ($item->status == 1) Despachado @endif
                                    </a>
                                </td>

                                @include('atendant.sells-menu.modalview')
                                
                               
                               
                                <td> <a href="{{URL::to('/invoice-menu/'.$item->id)}}"><i style="color: black" class="fa fa-file"></i></a></td>
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
<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location = "https://maktub.diveandcode.com/sells-menu?total="+{{count($sells)}};
    }
    setInterval('autoRefreshPage()', {{\App\Models\Settings::find(1)->time * 1000}} );
</script>
@endsection