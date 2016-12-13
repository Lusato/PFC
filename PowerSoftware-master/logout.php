<?php
session_start();

    session_destroy();
	unset($_SESSION["nome"]); 
	unset($_SESSION["id"]); 
	unset($_SESSION["user_type"]);
	unset($_SESSION["email"]); 
	unset($_SESSION["senha"]); 
    header("Location:index.php");

?>
