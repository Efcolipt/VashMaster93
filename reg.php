<?php 
session_start();

	if (empty($_SESSION['tokenAdmin']) && empty($_SESSION['tokenGuest'])) {
		header("Location:auth.php");
		exit;
	}

	if (!empty($_SESSION['tokenGuest'])){
		header("Location:index.php");
		exit;
	}

	require_once 'db.php';
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
	$data['login'] = mysqli_real_escape_string($link,$data['login']);
	$data['password'] = stripslashes($data['password']);
	$data['password'] = htmlspecialchars($data['password']);
	$data['password'] = mysqli_real_escape_string($link,$data['password']);
	$data['rePassword'] = stripslashes($data['rePassword']);
	$data['rePassword'] = htmlspecialchars($data['rePassword']);
	$data['rePassword'] = mysqli_real_escape_string($link,$data['rePassword']);
	$data['username'] = stripslashes($data['username']);
	$data['username'] = htmlspecialchars($data['username']);
	$data['username'] = mysqli_real_escape_string($link,$data['username']);
	$data['isAdmin'] = stripslashes($data['isAdmin']);
	$data['isAdmin'] = htmlspecialchars($data['isAdmin']);
	$data['isAdmin'] = mysqli_real_escape_string($link,$data['isAdmin']);
	$MessageError = array();
	$MessageSuccess = array();


	if ($data['password'] == '' || $data['password'] == ' ' ) {
		$MessageError[] = 'Введите пароль';
	}
	if ($data['password'] != $data['rePassword'] ) {
		$MessageError[] = 'Пароли не совпадают';
	}
	if (strlen(trim($data['login'])) <= 3  && !(strlen(trim($data['login'])) > 25) ) {
		$MessageError[] = 'Логин должен быть не меньше 3 символов и не больше 25';
	}
	if (strlen(trim($data['username'])) <= 1 ) {
		$MessageError[] = 'Введите имя';
	}
	$isAdmin = $data['isAdmin'];
	if ($isAdmin != "1" && $isAdmin != "0"){
		$MessageError[] = 'Заполните верно поле Админ';
	}
		// $pattern_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
	// if (!preg_match($pattern_email, $data['email']) !==0 && !strlen($data['email']) > 3) {
	// 	$MessageError[] = 'Не корректно введен Email';
	// }
	if (strlen($data['password']) <= 6) {
		$MessageError[] = 'Длина пароля должна быть не меньше 6 символов';
	}

	// var_dump($data);
	$user = $data['username'];
	$login = $data['login'];
	$pass = $data['password'];

	if (empty($MessageError)) {
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		
		$result_person = mysqli_query($link,"SELECT * FROM ".$datatablePerson." WHERE login = '$login'");		

		$result_person = mysqli_fetch_array($result_person);		
		if (!empty($result_person)) {
			$MessageError[] = 'Пользователь уже существует ';
		}     

		$token = generateRandomString(49);

		if (empty($MessageError)) {

			if ($isAdmin == '1' ) {
				$_SESSION['tokenAdmin'] = $token;
			}else{
				$_SESSION['tokenGuest'] = $token;
			}
			$isAdmin = (int) $isAdmin;
			$isAdmin = (boolean) $isAdmin;

			$result = mysqli_query($link,"INSERT INTO ".$datatablePerson." (login,password,name,token,isAdmin) VALUES ('$login','$pass','$user','$token','$isAdmin')"); 
			if ($result) {
				$_SESSION['name'] = $user;
				$MessageSuccess[] = "Пользователь успешно зарегистрирован";
				 mysqli_close($link);
			}else{
				$MessageError[] = 'Произошла ошибка , разработчик уже знает о ней! Попробуйте снова.';
			}

		}


	}

}

 ?>

 <!DOCTYPE html>
 <html lang="ru" dir="ltr">
 <head>
 	<title>Регистрация</title>
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
			 					<h2>Регистрация</h2>
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
				 				<input type="password" class="inp__contact" name="password" placeholder="Введите пароль" required>
				 				<input type="password" class="inp__contact" name="rePassword" placeholder="Введите пароль еще раз" required>
				 				<input type="text" class="inp__contact" name="username" placeholder="Как вас звать" required>
				 				<input type="text" class="inp__contact" name="isAdmin" placeholder="Вы админ(напишите ('1' - Да) или '(0'- Нет) )" required>
			 					<button class="btn__default" type="submit" name="sendData">Зарегистрироваться</button>
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