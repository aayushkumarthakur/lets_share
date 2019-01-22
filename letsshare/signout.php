<?php

session_start();

	session_destroy();
unset($_SESSION['redirect']);
unset($_SESSION['password']);

        unset($_SESSION['redirect2']);

	

if(isset($_COOKIE['email'])){

		setcookie("email", '', time() - (3600));

	
    
       

	

}

	header('location:index.php');



?>

