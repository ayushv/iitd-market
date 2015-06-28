<?php session_start();

if(isset($_SESSION['login']) && $_SESSION['login']==true){

	session_unset();
	session_destroy();
	//home redirection

}

else{

	//error 404
	}?>
