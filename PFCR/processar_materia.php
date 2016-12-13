<?php
session_start();

$nome_art = $_POST['nome'];
$artigo = $_POST['mat'];
$id_user = $_SESSION['id'];
$tip = $_SESSION['user_type'];

 $conexao = mysqli_connect("localhost", "root", "", "prfc");
 
 if($tip == 1){
 
  if ($conexao == false) {
            echo("Erro de conexão com o banco de dados. Entre em contato com o administrador.");
            $erro = mysqli_connect_error($conexao);
            echo ($erro);
        } else {
			$comando = mysqli_query($conexao, "INSERT INTO artigos (id_user_fk,conteudo_artigo,nome_artigo) VALUES ('$id_user','$artigo','$nome_art')");
            if ($comando == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
				header("location:materias.php");
            }
        }
        
}else{
	echo("error");
}
?>
