<?php
session_start();

$new = $_POST['pass'];

$custo= '08';
$salt = 'Cf1f11ePArKlBJomM0F6aJ';
$hash= crypt($new, '$2a$' . $custo  . $salt);

			
if($hash === $_SESSION['senha']){
	$_SESSION['password'] = $hash;
	header("location: alter_info.php");
}else{
	header("location: conf_error.php");
	}

?>
