<?php
session_start();

$pergunta = $_POST['per'];
$id_user = $_SESSION['id'];
$tip = $_SESSION['user_type'];
$name_user  = $_SESSION['nome'];

 require_once("conexao.php");
 
 if($tip == 2){
 
  if ($conexao == false) {
            echo("Erro de conexão com o banco de dados. Entre em contato com o administrador.");
            $erro = mysqli_connect_error($conexao);
            echo ($erro);
        } else {
			$comando = mysqli_query($conexao, "INSERT INTO pergunta (id_user_fk,conteudo_pergunta, atividade_pergunta) VALUES ('$id_user','$pergunta',1)");
            if ($comando == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
				header("location:forum.php");
            }
        }
        
}else{
	echo("error");
}
?>
