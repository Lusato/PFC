<?php
$pergunta = $_POST['pergunta'];
$resposta = $_POST['resposta'];

$custo= '08';
$salt = 'Cf1f11ePArKlBJomM0F6aJ';
$hash2= crypt($pergunta, '$2a$' . $custo  . $salt);

$custo= '08';
$salt = 'Cf1f11ePArKlBJomM0F6aJ';
$hash3= crypt($resposta, '$2a$' . $custo  . $salt);

 require_once("conexao.php");
 
 $consu = $conexao -> query("select * from user where pergunta_secreta = '$hash2'");
				 if ($consu == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
                $usuarios = mysqli_num_rows($consu);
                if($usuarios == 1){
					while ($row = mysqli_fetch_assoc($consu)) {
						$pergunta_user = $row["pergunta_secreta"];
					}
					}

                }
 
 $cons = $conexao -> query("select * from user where resposta_secreta = '$hash3'");
				 if ($cons == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
                $usuarios = mysqli_num_rows($cons);
                if($usuarios == 1){
					while ($row = mysqli_fetch_assoc($cons)) {
						$respostah_user = $row["resposta_secreta"];
					}
					}

                }
                if($hash2 == $pergunta_user){
					if($hash3 == $respostah_user){
						header("location: conf_email.php");
					}else{
						header("location: erro_rec_senha.php");
					}
				}else{
					header("location: erro_rec_senha.php");
				}

?>
