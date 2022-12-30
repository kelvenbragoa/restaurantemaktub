@extends('layouts.master')
@section('content')
<main class="bg_gray">
    <div style="height: 30px">

    </div>
    <div class="container margin_60_20">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6">
                <div class="box_order_form">
                    <div class="head">
                        <div class="title">
                            <h3>Detalhes Pessoais</h3>
                        </div>
                    </div>
                    <!-- /head -->
                    <div class="main">
                        @if (Session::has('message'))
                <div class="alert alert-danger" style="color: tomato">
                    {{Session::get('message')}}
                </div>
                @endif

                        @error('total')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: tomato">{{ $message }}</strong>
                        </span>
        @enderror
        @error('delivery_tax')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: tomato">{{ $message }}</strong>
                        </span>
        @enderror
        @error('number')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: tomato">{{ $message }}</strong>
                        </span>
        @enderror
                        <div class="form-group">
                           
                            <label>Nome</label>
                            <input class="form-control" placeholder="First and Last Name" value="{{auth()->user()->name}}" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" placeholder="Email Address" value="{{auth()->user()->email}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input class="form-control" placeholder="Phone" value="{{auth()->user()->mobile}}" readonly>
                                </div>
                            </div>
                        </div>
                        
                
                    </div>
                </div>
                 <div class="box_order_form">
                    <div class="head">
                        <div class="title">
                            <h3>Detalhes da Entrega</h3>
                        </div>
                    </div>
                    <!-- /head -->
                    <div class="main">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input class="form-control" placeholder="Email Address" value="Beira,Sofala" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <select class="form-control" onchange="val()" id="select_id">
                                        <option value="">Selecionar</option>
                                        @foreach (App\Models\Local_Delivery::orderBy('local','asc')->get() as $item)
                                            <option value="{{$item->delivery_tax}}">{{$item->local}} - {{$item->delivery_tax}} MT</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                       
                        
                    </div>
                </div>
                <!-- /box_order_form -->
                <div class="box_order_form">
                    <div class="head">
                        <div class="title">
                            <h3>Metodo de Pagamento</h3>
                        </div>
                    </div>
                    <!-- /head -->
                    <div class="main">
                        <form method="POST" action="{{ route('sells-client.store') }}" id="cart-form">
                        @csrf
                        <!--<div class="payment_select" id="paypal">
                            <label class="container_radio">Pagar Com PagaFácil
                                <input type="radio" value="pagafacil" checked name="payment">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        
                        <div class="form-group">
                            <label>Numero de Ref</label>
                            <input type="text" class="form-control" id="name_card_order" name="ref" placeholder="First and last name">
                        </div>-->
                        <div class="payment_select">
                            <label class="container_radio">Pagar Com Mpesa
                                <input type="radio" value="mpesa" checked name="payment">
                                <span class="checkmark"></span>
                            </label>
                            <i class="icon_wallet"></i>
                        </div>
                        <div class="form-group">
                            <label>Numero de Telefone</label>
                            <input type="text" class="form-control" id="name_card_order" name="number" placeholder="84xxxxxxx">
                        </div>
                      
                        <input type="hidden" class="form-control @error('total') is-invalid @enderror"  name="total" id="totaltaxinput" placeholder="Total" required>
                        <input type="hidden" class="form-control"  name="user_id" value="{{auth()->user()->id}}" placeholder="First and last name" required>
                        <input type="hidden" class="form-control @error('delivery_tax') is-invalid @enderror" id="taxinput" name="delivery_tax" placeholder="taxa" required>
                    </form>
                        <!--End row -->
                    </div>
                </div>
                <!-- /box_order_form -->
            </div>
            <!-- /col -->
            <div class="col-xl-6 col-lg-6" id="sidebar_fixed">
                <div class="box_order">
                    <div class="head">
                        <h3>Resumo do Pedido</h3>
                        
                    </div>
                    <!-- /head -->
                    <div class="main">
                        <ul>
                            <li>Data<span>{{date('d-m-Y')}}</span></li>
                            <li>Horas:<span>{{date('H:i')}}</span></li>
                            <li>Tipo<span>Entrega ao domicilio</span></li>
                        </ul>
                        <hr>
                        <ul class="clearfix">
                        <?php $sum_total = 0 ?>
                          @foreach ($carts as $item)
                          
                          <li><form action="{{route('carts.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                              <button type="submit" style="border: none; background:none; color:"><span style="color: red">(Apagar)</span>{{$item->qtd}}x {{$item->product->name}}</button><span>{{$item->product->price * $item->qtd}} MT</span>
                            </form>
                            </li>
                          <?php $sum_total =$sum_total + ($item->product->price * $item->qtd) ?>
                          @endforeach
                        
                            
                            
                        </ul>
                        
                        <ul class="clearfix">
                            <li>Subtotal<span >{{$sum_total}} MT</span></li>
                            <input type="hidden" id="totalOrder" value="{{$sum_total}}">
                            <li>Taxa de Entrega <span id="tax"></span> </li>
                            <li class="total">Total<span id="totaltax"></span></li>
                            
                        </ul>
                        <a href="#" onclick="event.preventDefault();document.getElementById('cart-form').submit();" class="btn_1 gradient full-width mb_5" id="buttonpagar" style="display: none">Pagar Agora</a>
                        <div class="text-center"><small>Ou liga <strong>258 842648618</strong></small></div>
                    </div>
                </div>
                <!-- /box_booking -->
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    
</main>

<script>
    function val() {
        taxa = document.getElementById("select_id").value;
        totalOrder = document.getElementById("totalOrder").value;
        totaltaxa = parseFloat(taxa) + parseFloat(totalOrder);
        
        document.getElementById("tax").innerHTML = taxa;
        document.getElementById("totaltax").innerHTML = totaltaxa;
        var x = document.getElementById("buttonpagar");
        document.getElementById("taxinput").value = taxa;
        document.getElementById("totaltaxinput").value = totaltaxa;
        document.getElementById("totaltaxinput").setAttribute('value',totaltaxa);
        
        x.style.display = "block";
    }
    </script>
@endsection