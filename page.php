<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);  
if (isset($_POST['reg']))
	$n=1;
if (isset($_POST['log']))
	$n=2;
switch($n){
	default:
	echo "ERROR",$n;
	break;
	case 1 :
	//registration
	$user= $_POST["username"];
	$_SESSION[$user]=[$_POST["username"],$_POST["pwd"]];
    print_r($_SESSION);
	echo '<h2>Registrazione finita</h2>';
	break;
	case 2:
	//login
    $user= $_POST["nome"];
	$password= $_POST["password"];
	if (in_array($user , $_SESSION[$user])){
		//nickname esistente
		if ($password==$_SESSION[$user][1]){
			echo '<h2>Ciao ',$user,' <h2/>';
		}			
	}
	else {
		echo '<h2>Password errata</h2>';
	}
	break;
}
?>
