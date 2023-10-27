<?php
session_start();
include_once("database/conexao.php");

	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT user_id, user_login, user_senha, user_status FROM users WHERE user_login='$usuario' and user_status='1' and user_lixeira ='1' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['user_senha'])) {
				$_SESSION['user_id'] = $row_usuario['user_id'];
				$_SESSION['user_nome'] = $row_usuario['user_nome'];
				
				header("Location: home");
			}else{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: logar.php");
			}
		} else {
			$_SESSION['msg'] = "Login e senha incorreto!";
			header("Location: logar.php");
		}
	}else{
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: logar.php");
	}

