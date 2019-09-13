<?php 
session_start();
	if (empty($_SESSION['tokenAdmin']) && empty($_SESSION['tokenGuest'])) {
		header("Location:auth.php");
		exit;
	}

	require "db.php";
	function generateRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function can_upload($file){
	 	global $MessageError;
    
    if(empty($file['name'])){$MessageError[] = 'Вы не выбрали файл.';}
	
	
	if($file['size'] >= 20000000){
		$MessageError[] = 'Файл слишком большой.';
	}
	
	$getMime = explode('.', $file['name']);
	$mime = strtolower(end($getMime));
	$types = array('jpg', 'png', 'jpeg');
	
	if(!in_array($mime, $types)){
		$MessageError[] = 'Недопустимый тип файла.';
	}

	return true;
	
  }
  
  function make_upload($file){	
  	global $nameFile;
	$formatFile = substr($file['name'], strrpos($file['name'], '.')+1);
	$nameFile = generateRandomString(78).".".$formatFile;
	copy($file['tmp_name'], 'image/portfolio/' . $nameFile);
  }
$data = $_POST;
	if (isset($data['addPortfolio'])) {
		$photo = $_FILES['photoPortfolio']; 
		$namePortfolio = $_POST['namePortfolio'];
		$MessageError = array();
		$MessageSuccess = array();

		$namePortfolio = stripslashes($namePortfolio);
		$namePortfolio = htmlspecialchars($namePortfolio);
		$namePortfolio = mysqli_real_escape_string($link,$namePortfolio);

		if (strlen($namePortfolio) <= 3) {
			$MessageError[] = "Имя должно быть не меньше 3-х символов";
		}

		$checkFile = can_upload($photo);
		
		if (empty($MessageError)) {
			if ($checkFile) {
				make_upload($photo);
				$result = mysqli_query($link,"INSERT INTO ".$datatablePortfolio." (name,path) VALUES ('$namePortfolio','$nameFile')");
				if ($result) {
					$MessageSuccess[] = "Портфолио добавлено";
					mysqli_close($link);
				}else{
					$MessageError[] = "Произошла ошибка , разработчик уже о ней знает.";

				}
			}
		}

	}


 ?>
 <!DOCTYPE html>
 <html lang="ru" dir="ltr">
 <head>
 	<title>Добавление портфолио</title>
 	<meta charset="UTF-8">
 	<!-- Media -->
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<!-- Skype toolbar none -->
 	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
 
 	<!-- Meta for search -->
 	<meta name="robots" content="noindex, nofollow">
 	<meta name="author" content="Libils Team">
 	<meta name="copyright" content="Libils Team">
 	<!-- Css -->
 	
 	<link rel="stylesheet" href="css/main.css">
 	<link rel="stylesheet" href="css/media.css">
 	<link rel="shortcut icon" href="image/favicon/fav.ico" type="image/x-icon">
 </head>
 <body>
 
 	<div class="wrapper">
 		<?php require 'header.php'; ?>
 		<div class="portfolio">
 			<div class="container">
	 			<div class="portfolio__inner">
		 				<div class="portfolio__content">
			 				<div class="headline">
			 					<h2>Добавление портфолио</h2>
			 				</div>
			 				<div class="error__message">
								<?php if (!empty($MessageError)) {
									// echo "<p>".array_shift($MessageError)."</p>";
									for($i = 0; $i < count($MessageError); $i++){
										echo "<p>".$MessageError[$i]."</p>";
									}
								} ?>
							</div>
							<div class="success__message">
								<?php if (!empty($MessageSuccess)) {
									// echo "<p>".array_shift($MessageError)."</p>";
									for($i = 0; $i < count($MessageSuccess); $i++){
										echo "<p>".$MessageSuccess[$i]."</p>";
									}
								} ?>
							</div>
			 				<form action="" method="post" enctype="multipart/form-data">
			 					<input type="text" class="inp__contact" name="namePortfolio" placeholder="Введите имя" required>
				 				<input type="file" class="inp__contact" name="photoPortfolio" placeholder="Загрузите файл" required>
				 				
			 					<button class="btn__default" type="submit" name="addPortfolio">Загрузить</button>
			 			</form>
		 			</div>
	 			</div>
	 		</div>
 		</div>
 	</div>
 
 
 
 
 	<!-- Optional JS and Jquery -->
 	<script src="https://kit.fontawesome.com/de8f891afd.js"></script>
 	<script src="https://code.jquery.com/jquery-3.3.1.js"
 	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
 	crossorigin="anonymous"></script>
 	<script src="js/admin.js"></script>
 </body>
 </html>