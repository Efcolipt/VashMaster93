<?php 


	$host = "localhost";
	$user = "u0800927_default";
	$pass = "IKo2_5Wt";
	$datatableContact = "Contact";
	$datatablePerson = "Users";
	$datatablePortfolio = "Portfolio";
	$datatableTestimonial = "Testimonials";
	$database = "u0800927_default";

	$link = mysqli_connect($host, $user, $pass, $database); 
	if (mysqli_connect_errno( $link )) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
	
	mysqli_query($link,"SET NAMES 'utf8'"); 
    mysqli_query($link,"SET CHARACTER SET 'utf8'");
    mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci'");

?>