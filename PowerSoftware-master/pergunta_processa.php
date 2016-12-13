<?php
require_once("conexao.php");

$id_pergunta = $_POST["id_pergunta"];
$CONTEUDO = $_POST["conteudo"];
$id_user_fk = $_POST["id_user_fk"];
$ATIVIDADE_PERGUNTA = $_POST["atividade_pergunta"];


$resultado = mysqli_query($conexao, "update pergunta set conteudo_pergunta = '$CONTEUDO',atividade_pergunta = '$ATIVIDADE_PERGUNTA' where id_pergunta = '$id_pergunta'");
if ($resultado == false) {
    $erro = mysqli_error($conexao);
    header("location:erro.php?erro=".$erro);
}
else {
    header("location:alter_pergunta.php");
}
?>
