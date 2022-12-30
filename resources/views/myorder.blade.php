@extends('layouts.master')
@section('content')
<main class="bg_gray">
    <div style="height: 30px">

    </div>
    <div class="container margin_60_20">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12">
                <div class="box_order_form">
                    <div class="head">
                        <div class="title">
                            <h3>Minhas Compras</h3>
                        </div>
                    </div>
                    <!-- /head -->
                    @if (Session::has('message'))
                <div class="alert alert-success">
                    
                   <a href="#">{{Session::get('message')}}</a> 
                </div>
                @endif
                    <div class="main">
                        <table class="styled-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>ID/REF</th>
                                    <th>Metodo Pagamento</th>
                                    <th>Total</th>
                                    <th>Transação Confirmada</th>
                                    <th>Estado Atual</th>
                                    <th>Acompanhar no mapa</th>
                                    <th>Feedback</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $item)
                                <tr>
                                    <td>{{$item->id}} (<a href="{{URL::to('/client-invoice/'.$item->id)}}">Ver recibo</a>)</td>
                                    <td>{{$item->payment}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>@if ($item->sold ==1 ) <span style="color: green">Confirmada</span> @else <span style="color: tomato">Não Confirmada</span> @endif</td>
                                    <td>
                                        @if ($item->status == 0)<span style="color: green">Entregue</span> @endif 
                                        @if ($item->status == 1)<span style="color: rgb(87, 87, 10)">Despachado</span> @endif 
                                        @if ($item->status == 2)<span style="color: blue">Preparando</span> @endif 
                                        @if ($item->status == 3)<span style="color: rgb(177, 135, 57)">Confirmado</span>@endif
                                        @if ($item->status == 4)<span style="color: red">Pendente</span> @endif
                                    </td>
                                    <td>Brevemente Disponível</td>
                                    <?php $a = App\Models\Review::where('sell_id',$item->id)->first('sell_id')?>
                                    @if (@$a['sell_id'] == $item->id)
                                    <td>@if ($item->status == 0) <a href="{{URL::to('/all-reviews')}}">Ver comentario</a>  @endif </td>
                                    @else
                                    <td>@if ($item->status == 0) <a href="{{URL::to('/create/'.$item->id)}}">Adicionar comentario</a>  @endif </td>
                                    @endif
                                    
                                    
                                    
                                 
                                </tr>
                                @endforeach
                               
                                
                                
                                <!-- and so on... -->
                            </tbody>
                        </table>
                        
                
                    </div>
                </div>
              
                </div>
              
                <!-- /box_order_form -->
            </div>
            <!-- /col -->
            

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    
</main>


@endsection