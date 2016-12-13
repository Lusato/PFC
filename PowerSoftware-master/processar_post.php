<?php
session_start();

$user_id = $_POST['user_id'];
$title = $_POST['title'];
$conteudo_post = $_POST['conteudo_post'];
if (!isset($_POST['imagem_post']))
{
	$imagem_post = null;
}
else
{
	$imagem_post = $POST['imagem_post'];
}
$id_user = $_SESSION['id'];
$tip = $_SESSION['user_type'];
$name_user  = $_SESSION['nome'];

require_once("conexao.php");

if($tip == 1){
 
  if ($conexao == false) {
            echo("Erro de conexão com o banco de dados. Entre em contato com o administrador.");
            $erro = mysqli_connect_error($conexao);
            echo ($erro);
        } else {
			$comando = mysqli_query($conexao, "INSERT INTO post (nome_post,conteudo_post, id_user_fk, imagem_post) VALUES ('$title','$conteudo_post', '$user_id', '$imagem_post')");
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
