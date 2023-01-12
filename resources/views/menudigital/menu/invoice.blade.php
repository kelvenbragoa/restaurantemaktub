<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 44mm;
  background: #FFF;
  
  
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em; color: #222;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
 
#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}

#top{min-height: 100px;}
#mid{min-height: 80px;} 
#bot{ min-height: 50px;}

#top .logo{
  //float: left;
	height: 60px;
	width: 60px;
	
	background-size: 60px 60px;
}
.clientlogo{
  float: left;
	height: 60px;
	width: 60px;

	background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  display: block;
  //float:left;
  margin-left: 0;
}
.title{
  float: right;
}
.title p{text-align: right;} 
table{
  width: 100%;
  border-collapse: collapse;
}
td{
  //padding: 5px 0 5px 15px;
  //border: 1px solid #EEE
}
.tabletitle{
  //padding: 5px;
  font-size: .5em;
  background: #EEE;
}
.service{border-bottom: 1px solid #EEE;}
.item{width: 24mm;}
.itemtext{font-size: .5em;}

.Rate{width: 15mm;}

#legalcopy{
  margin-top: 1mm;
}

  
  
}
    </style>
</head>
<body>
    
    
  <div id="invoice-POS">
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2 style="color: black">Recibo - Maktub</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info">
        <h2 style="color: black">Contacto</h2>
        <p> 
            Endereço : Bairro da Manga</br>
            Email   : maktub@maktub.com</br>
            Telefone   : 258 8400000</br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot">

					<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="item"><h2>Item</h2></td>
								<td class="Hours"><h2>Qtd</h2></td>
								<td class="Rate"><h2>Sub Total</h2></td>
							</tr>
                            @foreach ($sell->sell_detail as $item)
                            <tr class="service">
								<td class="tableitem"><p class="itemtext">{{$item->product->name}}</p></td>
								<td class="tableitem"><p class="itemtext">{{$item->qtd}}</p></td>
								<td class="tableitem"><p class="itemtext">{{$item->product->price * $item->qtd}} MT</p></td>
							</tr>
                            @endforeach
							

							<!--<tr class="service">
								<td class="tableitem"><p class="itemtext">Asset Gathering</p></td>
								<td class="tableitem"><p class="itemtext">3</p></td>
								<td class="tableitem"><p class="itemtext">$225.00</p></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">Design Development</p></td>
								<td class="tableitem"><p class="itemtext">5</p></td>
								<td class="tableitem"><p class="itemtext">$375.00</p></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">Animation</p></td>
								<td class="tableitem"><p class="itemtext">20</p></td>
								<td class="tableitem"><p class="itemtext">$1500.00</p></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">Animation Revisions</p></td>
								<td class="tableitem"><p class="itemtext">10</p></td>
								<td class="tableitem"><p class="itemtext">$750.00</p></td>
							</tr>-->


							<tr class="tabletitle">
								<td></td>
								<td class="Rate"><h2>Entrega</h2></td>
								<td class="payment"><h2>{{$sell->delivery_tax}} MT</h2></td>
							</tr>

							<tr class="tabletitle">
								<td></td>
								<td class="Rate"><h2>Total</h2></td>
								<td class="payment"><h2>{{$sell->total}} MT</h2></td>
							</tr>

						</table>
					</div><!--End Table-->

					<div id="legalcopy">
						<p class="legal"><strong>Obrigado pela sua preferência!</strong>  
						</p>
                        <p style="text-align: center">Volte Sempre. </p>
					</div>

				</div><!--End InvoiceBot-->
  </div><!--End Invoice-->


</body>
</html>