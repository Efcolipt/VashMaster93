<?php 

session_start();
	if (!empty($_SESSION['tokenAdmin']) || !empty($_SESSION['tokenGuest'])) {
		header('Location:index.php');
		exit;
	}
	
require 'db.php';
function generateRandomString($length) {
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
	$randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;
}

$data = $_POST;



if (isset($data['sendData'])) {
$data['login'] = stripslashes($data['login']);
$data['login'] = htmlspecialchars($data['login']);
$data['password'] = stripslashes($data['password']);
$data['password'] = htmlspecialchars($data['password']);
$data['login'] = mysqli_real_escape_string($link,$data['login']);
$data['password'] = mysqli_real_escape_string($link,$data['password']);
$MessageError = array();


if ($data['password'] == '' || $data['password'] == ' ' ) {
	$MessageError[] = 'Введите пароль';
}
if (strlen(trim($data['login'])) < 3  && !(strlen(trim($data['login'])) > 25) ) {
	$MessageError[] = 'Логин должен быть не меньше 3 символов и не больше 25';
}
if (strlen($data['password']) < 6 ) {
	$MessageError[] = 'Длина пароля должна быть не меньше 6 символов';
}



if (empty($MessageError)) {

	$result_person = mysqli_query($link,"SELECT * FROM ".$datatablePerson." Where login = '".$data['login']."' ");               
	$result_person = mysqli_fetch_array($result_person);


	if (!password_verify($data['password'],$result_person['password']) && empty($result_person)) {
		$MessageError[] = 'Не верный логин или пароль';

	}

	
	



	if (empty($MessageError)) {

		$token = generateRandomString(49);

		if ($result_person['isAdmin']) {
			$_SESSION['tokenAdmin'] = $token;
		}else{
			$_SESSION['tokenGuest'] = $token;
		}

		$query = mysqli_query($link,"UPDATE $datatablePerson SET token='$token' WHERE login='".$data['login']."'");

		
		$_SESSION['id'] = $result_person['id'];
		$_SESSION['name'] = $result_person['name'];
		 mysqli_close($link);

			if (!empty($_SESSION['tokenAdmin']) && !empty($_SESSION['id']) && !empty($_SESSION['name'])) {
				header('Location:applications.php');
			}
			if (!empty($_SESSION['id']) && !empty($_SESSION['name']) && !empty($_SESSION['tokenGuest'])  ) {
				header('Location:index.php');
			}
			
			
		
	}


}

}



?>
 <!DOCTYPE html>
 <html lang="ru" dir="ltr">
 <head>
 	<title>Вход</title>
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
 		<div class="reg_auth">
 			<div class="container">
	 			<div class="reg_auth__inner">
		 				<div class="reg_auth__content">
			 				<div class="headline">
			 					<h2>Вход</h2>
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
			 				<form action="" method="post">
				 				<input type="text" class="inp__contact" name="login" placeholder="Логин" required>
				 				<input type="password" class="inp__contact" name="password" placeholder="Пароль" required>
			 					<button class="btn__default" type="submit" name="sendData">Войти</button>
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