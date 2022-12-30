<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Delivery Beira, Sofala, Entrega , Refeições">
    <meta name="author" content="Kelven Bragoa">
    <title>Delivery</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('template/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('template/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('template/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset('template/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset('template/img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('template/css/bootstrap_customized.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{asset('template/css/order-sign_up.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('template/css/custom.css')}}" rel="stylesheet">
    
</head>

<body id="register_bg">
	
	<div id="register">
		<aside>
			<figure>
				<a href="/"><img src="{{asset('template/img/logo_sticky.png')}}" width="140" height="35" alt=""></a>
			</figure>
			
			<form autocomplete="off" method="POST" action="{{ route('register') }}">
                @csrf
				<div class="form-group">
					<input class="form-control @error('name') is-invalid @enderror" name="name" id="name" type="text" placeholder="Nome" required>
					<i class="icon_pencil-edit"></i>
                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
				</div>
				
				<div class="form-group">
					<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Email" required>
					<i class="icon_mail_alt"></i>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                   @enderror
				</div>
                <div class="form-group">
					<input class="form-control @error('mobile') is-invalid @enderror" type="number" name="mobile" id="mobile" placeholder="Telefone" required>
					<i class="icon_mail_alt"></i>
                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                   @enderror
				</div>
                <div class="form-group">
					<select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender" placeholder="Sexo" required>
                        <option value="">Selecionar Sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                    <i class="cell_phone_alt"></i>
					
                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                   @enderror
				</div>
				<div class="form-group">
					<input class="form-control @error('password') is-invalid @enderror" type="password" id="password"  name="password" required  placeholder="Password" required>
					<i class="icon_lock_alt"></i>
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
				</div>
				<div class="form-group">
					<input class="form-control" type="password" id="password-confirm" name="password_confirmation" placeholder="Confirmar Password" required>
					<i class="icon_lock_alt"></i>
				</div>
				<div id="pass-info" class="clearfix"></div>
				<button type="submit" class="btn_1 gradient full-width">Registrar</button>
				<div class="text-center mt-2"><small>Já tem uma conta? <strong><a href="{{ route('login') }}">Entrar</a></strong></small></div>
			</form>
			<div class="copy">© {{date('Y')}} {{env('APP_NAME')}}</div>
		</aside>
	</div>
	<!-- /login -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/common_func.js"></script>
    <script src="assets/validate.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/pw_strenght.js"></script>	
  
</body>
</html>