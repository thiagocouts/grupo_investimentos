<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Investimentos | Login</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
</head>
<body>

	<div class="background">
		
	</div>

	<section id="conteudo-view" class="login">

		<h1>Investimentos</h1>
		<h3>O nosso gerenciador de investimentos</h3>

		{!! Form::open(['route' => 'user.login']) !!}

			<p>Acesse o sistema</p>

			<label>
				{!!Form::text('user_name', null, ['class' => 'input', 'placeholder' => 'Usuario']) !!}
			</label>

			<label>
				{!!Form::password('password', ['class' => 'input', 'placeholder' => 'Senha']) !!}
			</label>

			{!! Form::submit('Entrar') !!}
		{!! Form::close() !!}
	</section>

</body>
</html>