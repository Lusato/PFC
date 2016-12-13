<?php
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	$custo= '08';
	$salt = 'Cf1f11ePArKlBJomM0F6aJ';
	$hash= crypt($senha, '$2a$' . $custo  . $salt);

	include("conexao.php");
	
	
	$sintaxesql = "SELECT * FROM user WHERE email = '$email' AND senha = '$hash'";
	$passe = mysqli_query($conexao, $sintaxesql);
	if ($passe == false) {
		echo ("erro ao enviar comando para o banco de dados.");
		$erro = mysqli_error($conexao);
		echo($erro);
	}
	else {
		$usuarios = mysqli_num_rows($passe);
		if($usuarios == 1){
			while ($row = mysqli_fetch_assoc($passe)){ 
				session_start();
				$_SESSION['email'] = $email;
				$_SESSION['senha'] = $hash;
				$_SESSION['id'] = $row['id_user'];
				$_SESSION['user_type'] = $row['tipo_user_fk'];
				$_SESSION['nome'] = $row['nome'];
				$atividade = $row['atividade_user_fk'];
				$consu = $conexao -> query("select * from user where email= '$email'");
				if ($consu == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
                $usuarios = mysqli_num_rows($consu);
                if($usuarios == 1){
					while ($row = mysqli_fetch_assoc($consu)) {
						$tipo_user = $row["tipo_user_fk"];
						$_SESSION['user_type'] = $tipo_user;
					}
					}if($tipo_user==1 && $atividade == 1){
						$_SESSION['user_type'] = $tipo_user;
						header("location:tela_user_adm.php");
					}elseif($atividade == 1){
						header("location:tela_user.php");
					}else{
						header("location:login_error.php");
					}
					
                }
				
			}
		} 
		else {
			header("location:login_error.php");
		}
	}
?>
