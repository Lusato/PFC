<?php
$nome=$_POST['nome'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$pergunta=$_POST['pergunta'];
$resposta=$_POST['resposta'];

$custo= '08';
$salt = 'Cf1f11ePArKlBJomM0F6aJ';
$hash2= crypt($pergunta, '$2a$' . $custo  . $salt);

$custo= '08';
$salt = 'Cf1f11ePArKlBJomM0F6aJ';
$hash3= crypt($resposta, '$2a$' . $custo  . $salt);

$custo= '08';
$salt = 'Cf1f11ePArKlBJomM0F6aJ';
$hash= crypt($senha, '$2a$' . $custo  . $salt);
require_once("conexao.php");



 
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
               
               
               
                if(isset ($email_user)== FALSE){
 
  if ($conexao == false) {
            echo("Erro de conexão com o banco de dados. Entre em contato com o administrador.");
            $erro = mysqli_connect_error($conexao);
            echo ($erro);
        } else {
			$comando = mysqli_query($conexao, "INSERT INTO user (nome, email, senha, pergunta_secreta, resposta_secreta,tipo_user_fk, atividade_user_fk) 
			VALUES ('$nome','$email','$hash','$hash2','$hash3',1,1)");
            if ($comando == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
				header("location:index.php");
            }
        }
	}else{
		header("location:cadastro_adm_error.php");
	}
?>
