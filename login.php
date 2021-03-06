<?php

$erro = addslashes($_GET['erro']);

switch ($erro){
	case 0;
	$mensagem = '
	<div class="alert alert-warning text-center" role="alert" id="mensagem">
	Usuário não autenticado!
	</div>
	';
	break;

	case 1;
	$mensagem = '
	<div class="alert alert-warning text-center" role="alert" id="mensagem">
	Email incorreto ou inexistente!
	</div>
	';
	break;

	case 2;
	$mensagem = '
	<div class="alert alert-warning text-center" role="alert" id="mensagem">
	Senha incorreta!
	</div>
	';
	break;

	case 3;
	$mensagem = '
	<div class="alert alert-warning text-center" role="alert" id="mensagem">
	Logout efetuado com sucesso!
	</div>
	';
	break;

	//ERROS GERAR SENHA

	case 10;
	$mensagem = '
	<div class="alert alert-warning text-center" role="alert" id="mensagem">
	Este email não está cadastrado no sistema. Impossível gerar nova senha!
	</div>
	';
	break;

	//NOVA SENHA GERADA COM SUCESSO
	case 11;
	$mensagem = '
	<div class="alert alert-warning text-center" role="alert" id="mensagem">
	Sua nova senha foi gerada e enviada para seu email!
	</div>
	';
	break;
	
	default;
	$mensagem = '';
	break;
}

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Entre com seus dados de acesso!</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<style>
	@keyframes auto {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}
	.sumir{

    animation: auto 3s;

}

.sumirGeral{
	display: none;
}

	</style>

</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3 class="mt-3">Gestão Social</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><a href="https://dev.guerra.app.br" target="_blank"><i class="fab fa-dev"></i></a></span>
					<span><a href="https://github.com/guerramg/insanos" target="_blank"><i class="fab fa-git-square"></i></a></span>
					<span><a href="https://www.instagram.com/devguerra/" target="_blank"><i class="fab fa-instagram-square"></i></a></span>
				</div>
			</div>
			<div class="card-body">
				<form action="valida.php" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-at"></i></span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="email" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="senha" class="form-control" placeholder="senha" required>
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center">
					<a href="relembrar.php">Esqueceu sua senha?</a>
				</div>
			</div>

			<?= $mensagem ?>
		</div>

	</div>

</div>
</body>
</html>

<script src="js/login.js"></script>