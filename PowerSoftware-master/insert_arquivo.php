<?php
require_once("conexao.php");
	session_start();
	
	$pdf = $_SESSION['pdf'];
	$nome1 = $_SESSION['nome_arquivo'];
	
$comando = mysqli_query($conexao, "INSERT INTO arquivo (nome_arquivo, arquivo_download, fk_id_user) values ('$nome1 ', '$pdf', '$type')");

?>
