<?php
require_once("conexao.php");

$id = $_POST["id"];
$NOME = $_POST["Nome"];
$EMAIL = $_POST["email"];
$TIPO_USER = $_POST["Tipo_user"];
$ATIVIDADE_USER = $_POST["Atividade_user"];


$resultado = mysqli_query($conexao, "update user set nome = '$NOME', email = '$EMAIL', tipo_user_fk = '$TIPO_USER',atividade_user_fk = '$ATIVIDADE_USER' where id_user = '$id'");
if ($resultado == false) {
    $erro = mysqli_error($conexao);
    header("location:erro.php?erro=".$erro);
}
else {
    header("location:alter_user.php");
}
?>
