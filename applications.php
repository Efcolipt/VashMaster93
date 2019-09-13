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
require 'db.php';
$contact = mysqli_query($link,"SELECT * FROM ".$datatableContact.""); 
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
	<title>Заявки</title>
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

	
	<!-- CSS -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/media.css">
	<link rel="shortcut icon" href="image/favicon/fav.ico" type="image/x-icon">
</head>
<body>

	<div class="wrapper">
		<?php require 'header.php'; ?>
		<div class="applications">
			<div class="container">
				<div class="applications__all">	
					<div class="headline">
						<h2>Список заявок</h2>
					</div>
					<?php ?>
					<div class="inner__applications">
					<div class="error__message"><p></p></div>
						<div class="applications__row">
						<? while($rows = mysqli_fetch_assoc($contact)): ?>
								<p data-id="<?=$rows["id"];?>">
									<span>Номер: <?=$rows['id']; ?></span>
									<span>Имя: <?=$rows['name']; ?></span>
									<span>Телефон: <?=$rows['phone']; ?></span>
									<span>Комментарий: <?=$rows['Work']; ?></span>
									<span>Дата: <?=$rows['date_send']; ?></span>
									<span class="delete__app" data-name-page="applications"><button class="btn__default">Удалить</button></span>
								</p>
						<? endwhile; ?>
						<?php  mysqli_close($link); ?>
						</div>
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