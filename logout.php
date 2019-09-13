<?php 
	
	session_start();
	if (empty($_SESSION['tokenAdmin']) && empty($_SESSION['tokenGuest'])) {
		header('Location:index.php');
	}
		unset($_SESSION['tokenAdmin']);
		unset($_SESSION['tokenGuest']);
		unset($_SESSION['id']);
		unset($_SESSION['name']);
		header('Location:index.php');
	
	exit;
	

 ?>