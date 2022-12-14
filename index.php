<?php

include_once("./php/conexao.php");

$email = isset($_POST['email'])?$_POST['email']:"";
$senha = isset($_POST['senha'])?$_POST['senha']:"";

$sql = "select * from cadastro where email like '%$email%'";
$consulta = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
	<title>Orange's Love</title>
</head>
<script>
	<?php
		$erro = "";
		if($email != ""){
			$usuario = mysqli_fetch_array($consulta);
			if($email == $usuario[2] && $senha == $usuario[3]){
				print "window.location = './routes/homepage.html';";
			}else{
				$erro = "Endereço de e-mail ou senha incorretos.";
			}
		}
	?>
</script>
<body class="body-colors">
	<section class="main-container">
		<div class="logo">
			<img src="./imgs/logo 02.png" alt="">
		</div>
		<div>
			<div class="main-card">
				<div class="main-title">
					<h1><strong class="main-title-orange">Orange's</strong> Love</h1>
				</div>
				<?php
					if($erro != ""){
						print "<div style='font-size: 12px; color: red;' >
								$erro
								</div>";
					}
					
				?>
				<form method="post" class="main-card-content">
					<input type="text" name="email" maxlength="40" required placeholder="Endereço de E-mail">
					<input type="password" name="senha" maxlength="20" required placeholder="Senha">

					<input id="entrar" type="submit" value="Entrar" style="display: none;" >
					<label for="entrar" class="main-card-button">
						Entrar
					</label>
					<!-- <a href="./routes/homepage.html" class="main-card-button">Entrar</a> -->

					<p>ou</p>

					<a href="#" class="main-card-password">Esqueceu a senha?</a>
				</form>
			</div>
			<div class="main-card-footer">
				<p>
					Não tem uma conta? 
					<a href="./routes/signup.php" class="main-card-footer-password">Cadastre-se</a>
				</p>
			</div>
		</div>
	</section>
</body>
</html>