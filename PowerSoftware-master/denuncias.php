<?php
	require_once("conexao.php");
	session_start();
	$s=$_SESSION['conteudo_pergunta'];
	
	$resultado = mysqli_query($conexao, "update pergunta set id_denuncia_fk = '2' where  = '$s'");

	header("location: forum.php");
?>
