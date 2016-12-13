<?php
session_start();
$senha = $_POST['senha'];
$em = $_SESSION['Augusto'];
$custo = '08';
$salt = 'Cf1f11ePArKlBJomM0F6aJ';
$hash= crypt($senha, '$2a$' . $custo  . $salt);

require_once("conexao.php");

				$consu = $conexao -> query("select * from user where email= '$em'");
				 if ($consu == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
                $usuarios = mysqli_num_rows($consu);
                if($usuarios == 1){
					while ($row = mysqli_fetch_assoc($consu)) {
						$id = $row["id_user"];
					}
					}

                }


  if ($conexao == false) {
            echo("Erro de conexão com o banco de dados. Entre em contato com o administrador.");
            $erro = mysqli_connect_error($conexao);
            echo ($erro);
        } else {
			$alter = $conexao->query("update user SET senha = '$hash' WHERE email='$em'");
            if ($alter == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
				header("location: login.php");
            }
        }
?>
