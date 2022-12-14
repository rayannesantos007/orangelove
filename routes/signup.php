<?php

include_once("../php/conexao.php");

$sucesso = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$sql = "select * from cadastro where email like '%$email%'";
	$consulta = mysqli_query($conexao, $sql);
	$registros = mysqli_num_rows($consulta);

	if($registros == 0){
		$sql = "insert into cadastro (nome, email, senha) values ('$nome', '$email', '$senha')";
		$salvar = mysqli_query($conexao, $sql);

		$linhas = mysqli_affected_rows($conexao);

		if($linhas == 1){
			$sucesso = "Cadastro efetuado com sucesso!";
		}else{
			$sucesso = "Ocorreu um erro ao cadastrar esse usuário.";
		}
	}else{
		$sucesso = "Cadastro NÃO efetuado. Já existe um usuário com este e-mail.";
	}
}

mysqli_close($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/main.css">
	<title>Criar uma conta</title>
</head>

<script>
	<?php
		if($sucesso != ""){
			print "window.alert('$sucesso');";
			
			if($sucesso == "Cadastro efetuado com sucesso!"){
				print "window.location = './homepage.html'";
			}
		}
	?>
</script>
<body class="body-colors">
	<section>
		<div class="main-card">
			<div class="main-title">
				<h1><strong class="main-title-orange">Orange's</strong> Love</h1>
				<p>
					Saia do fundo do poço e encontre a sua metade da laranja
				</p>
			</div>
			<form class="main-card-content" method="post" action="">
				<input type="text" name="nome" maxlength="40" required placeholder="Nome Completo">
				<input type="email" name="email" maxlength="40" required placeholder="Endereço de E-mail">
				<input type="password" name="senha" maxlength="20" required placeholder="Senha">

				<input id="cadastrese" type="submit" value="Cadastrar-se" style="display: none;" >
				<label for="cadastrese" class="main-card-button">
					Cadastre-se
				</label>
				<!-- <a href="./homepage.html" class="main-card-button">Cadastrar-se</a> -->
			</form>
		</div>
		<div class="main-card-footer">
			<p>
				possui uma conta? 
				<a href="../index.php" class="main-card-footer-password">Conecte-se</a>
			</p>
		</div>
	</section>
</body>
</html>