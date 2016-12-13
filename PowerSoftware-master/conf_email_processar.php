<?php
$email = $_POST['Augusto'];

require_once("conexao.php");

$cons = $conexao -> query("select * from user where email = '$email'");
				 if ($cons == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
                $usuarios = mysqli_num_rows($cons);
                if($usuarios == 1){
					while ($row = mysqli_fetch_assoc($cons)) {
						$email_user = $row["email"];
						
					}
					}
                }
                
                if($email == $email_user){
					session_start();
					$_SESSION['Augusto'] = $email;
					header("location: nova_senha.php");
				}else{
					header("location: conf_email_erro.php");
				}
?>
