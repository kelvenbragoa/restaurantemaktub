<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

h2 {
    text-align:center;
}

p {
    text-align:center;
}


/* Create two equal columns that floats next to each other */
.column {
  align-content: center;
  margin-left: 180px;
  margin-right: 200px ;
  margin-top: 50px ;
  width: 50%;
  padding: 5px;
   /* Should be removed. Only for demonstration */
}

.row {
  align-content: center;
}

/* Clear floats after the columns */




.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
</head>
<body>

<h2>Modelo Autocolante</h2>
<br>

<div class="row">
 
    <div class="column" style="background-color:rgb(240, 240, 240);">
      <p style="text-align:center;"><img src="http://maktub.diveandcode.com/template/img/logo_sticky.png" width="162" height="35" alt="" class="center"></p>
      <h2>Menu Digital</h2>
      <h3 style="text-align:center;">{{$table->name}}</h3>
      <hr>
      <p>Para acessar o nosso menu digital utilize o QrCode abaixo com seu smartphone:</p>

      
      <p style="text-align:center;"><img src="data:image/png;base64, {!! base64_encode(QrCode::color(255, 0, 0)->format('svg')->size(100)->generate('https://maktub.diveandcode.com/menudigital/'.$table->id.'/table')) !!}"></p>
    </div>
 
  
  {{-- <div class="column" style="background-color:rgb(240, 240, 240);">
    <p style="text-align:center;"><img src="http://maktub.diveandcode.com/template/img/logo_sticky.png" width="162" height="35" alt="" class="center"></p>
    
    <h2>Menu Digital</h2>
    <hr>
    <p>Para acessar o nosso menu digital acesse o link:</p>
    <p>https://www.havanaclub.terkelven.tech</p>
   
    <p>Ou utilize o QrCode abaixo com seu smartphone:</p>
    
    <p style="text-align:center;"><img src="data:image/png;base64, {!! base64_encode(QrCode::color(255, 0, 0)->format('svg')->size(100)->generate('http://localhost:8000/menudigital')) !!}"></p>
  </div> --}}
  
</div>

{{-- <div class="row">
    <div class="column" style="background-color:rgb(240, 240, 240);">
      <p style="text-align:center;"><img src="http://maktub.diveandcode.com/template/img/logo_sticky.png" width="162" height="35" alt="" class="center"></p>
      <h2>Menu Digital</h2>
      <hr>
      <p>Para acessar o nosso menu digital acesse o link:</p>
      <p>https://www.havanaclub.terkelven.tech</p>
     
      <p>Ou utilize o QrCode abaixo com seu smartphone:</p>
      
      <p style="text-align:center;"><img src="data:image/png;base64, {!! base64_encode(QrCode::color(255, 0, 0)->format('svg')->size(100)->generate('http://localhost:8000/menudigital')) !!}"></p>
    </div>
    <div class="column" style="background-color:rgb(240, 240, 240);">
      <p style="text-align:center;"><img src="http://maktub.diveandcode.com/template/img/logo_sticky.png" width="162" height="35" alt="" class="center"></p>
      
      <h2>Menu Digital</h2>
      <hr>
      <p>Para acessar o nosso menu digital acesse o link:</p>
      <p>https://www.havanaclub.terkelven.tech</p>
     
      <p>Ou utilize o QrCode abaixo com seu smartphone:</p>
      
      <p style="text-align:center;"><img src="data:image/png;base64, {!! base64_encode(QrCode::color(255, 0, 0)->format('svg')->size(100)->generate('http://localhost:8000/menudigital')) !!}"></p>
    </div>
    
  </div> --}}

  

</body>
</html>