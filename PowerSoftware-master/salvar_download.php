<?php 
	require_once("conexao.php");
	session_start();
	$nome_arquivo = $_POST['nome_arquivo'];
	//$_SESSION['nome_arquivo'] = $_POST['nome_arquivo'];
	//$type = $_SESSION['user_type'];
	
// Verifica se o campo PDF está vazio
if ($_FILES['pdf']['name'] != "") {

// Caso queira mudar o nome do arquivo basta descomentar a linha abaixo e fazer a modificação
//$_FILES['pdf']['name'] = "nome_do_arquivo.pdf";

// Move o arquivo para uma pasta
move_uploaded_file($_FILES['pdf']['tmp_name'], "documentos/".$_FILES['pdf']['name']);
//var_dump($_FILES);
// $pdf_path é a variável que guarda o endereço em que o PDF foi salvo (para adicionar na base de dados)
	$pdf_path = "../documentos/".$_FILES['pdf']['name'];

$_SESSION['pdf'] = $pdf_path;
$comando = mysqli_query($conexao, "INSERT INTO arquivo (nome_arquivo, arquivo_download) values ('$nome_arquivo', '$pdf_path')");
header("location: download.php");
//echo($_SESSION['pdf']);
} else {
// Caso seja falso, retornará o erro
 echo ("Não foi possível enviar o arquivo");
}

?>

