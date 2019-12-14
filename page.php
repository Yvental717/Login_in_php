<?php
session_start();
//selezione registrazione
if (isset($_POST['reg']))
	$n=1;
//selezione login
if (isset($_POST['log']))
	$n=2;
switch($n){
	default:
	echo "ERROR",$n;
	break;
	case 1 :
	//registration
	$user= $_POST["username"];
	$pwd=$_POST["pwd"];
	$_SESSION[$user]=[$_POST["username"],password_hash($pwd ,PASSWORD_DEFAULT)];
    print_r($_SESSION);
	echo '<h2>Registrazione finita</h2>';
	break;
	case 2:
	//login
    $user= $_POST["nome"];
	$password= $_POST["password"];
	if (isset($_SESSION[$user])){
		//nickname esistente
		if(password_verify($password, $_SESSION[$user][1])){
			echo '<h2>Ciao ',$user,' <h2/>';
		}
	// else password errata
	else{
		echo '<h2>Password o nome utente errati</h2>';
	}
	}
	// else nome utente errato
	else {
		echo '<h2>Password o nome utente errati</h2>';
	}
	break;
}

$DEBUG=TRUE;
function myecho($s){
	global $DEBUG;
	if($DEBUG){
		echo $s;
}}

?>
