<?php
$nome=$_POST['nome'];
$email=$_POST['email'];
$senha=$_POST['senha'];

$custo= '08';
$salt = 'Cf1f11ePArKlBJomM0F6aJ';
$hash= crypt($senha, '$2a$' . $custo  . $salt);
 $conexao = mysqli_connect("localhost", "root", "", "prfc");
 
 $consu = $conexao -> query("select * from user where email= '$email'");
				 if ($consu == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
                $usuarios = mysqli_num_rows($consu);
                if($usuarios == 1){
					while ($row = mysqli_fetch_assoc($consu)) {
						$email_user = $row["email"];
					}
					}

                }
                if($email != $email_user){
 
  if ($conexao == false) {
            echo("Erro de conexão com o banco de dados. Entre em contato com o administrador.");
            $erro = mysqli_connect_error($conexao);
            echo ($erro);
        } else {
			$comando = mysqli_query($conexao, "INSERT INTO user (nome,email, senha,tipo_user) VALUES ('$nome','$email','$hash', 2)");
            if ($comando == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
				header("location:index.php");
            }
        }
	}else{
		header("location:cadastro_error.php");;
	}
?>
