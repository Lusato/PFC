<?php
session_start();

$pergunta = $POST['per'];
$id_user = $_SESSION['id'];
$tip = $_SESSION['user_type'];
$name_user  = $_SESSION['nome'];

 $conexao = mysqli_connect("localhost", "root", "", "prfc");
 
 if($tip == 2){
 
  if ($conexao == false) {
            echo("Erro de conexão com o banco de dados. Entre em contato com o administrador.");
            $erro = mysqli_connect_error($conexao);
            echo ($erro);
        } else {
			$comando = mysqli_query($conexao, "INSERT INTO artigos (id_user_fk,conteudo_perguntas, nome_user_fk) VALUES ('$id_user','$pergunta','$nome_user')");
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
