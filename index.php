<?php 

session_start();
	
require 'db.php';

$data = $_POST;



if (isset($data['sendContact'])) {

	$data['userName'] = stripslashes($data['userName']);
	$data['userName'] = htmlspecialchars($data['userName']);

	$data['work'] = stripslashes($data['work']);
	$data['work'] = htmlspecialchars($data['work']);

	$data['phone'] = stripslashes($data['phone']);
	$data['phone'] = htmlspecialchars($data['phone']);

	$data['userName'] = mysqli_real_escape_string($link,$data['userName']);
	$data['phone'] = mysqli_real_escape_string($link,$data['phone']);
	$data['work'] = mysqli_real_escape_string($link,$data['work']);

	$MessageError = array();
	$MessageSuccess = array();



	if (strlen(trim($data['userName'])) <= 1  && !(strlen(trim($data['userName'])) >= 40) ) {
		$MessageError[] = 'Введите корректно имя';
	}

	if (strlen(trim($data['work'])) <= 3  && !(strlen(trim($data['work'])) >= 430) ) {
		$MessageError[] = 'Сообщение должно быть больше 3-х символов';
	}

	if (strlen(trim($data['phone'])) != 16 ) {
		$MessageError[] = 'Телефон введен не корректно';
	}

	$name = $data['userName'];
	$phone = $data['phone'];
	$work = $data['work'];



	if (empty($MessageError)) {
		$result = mysqli_query($link,"INSERT INTO ".$datatableContact." (name,phone,work) VALUES ('$name','$phone','$work')");
		 mysqli_close($link);
		
		if (!$result) {
		 	$MessageError[] = 'Произошла ошибка, попробуйте еще раз.';
		 } else{
		 	$MessageSuccess[] = 'Спасибо за заявку!';
		 }
	}

}


?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
	<title>VashMaster93</title>
	<meta charset="UTF-8">
	<!-- Media -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Skype toolbar none -->
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">

	<!-- Meta for search -->
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="">
	<meta name="description" content="Электромонтажные работы в Краснодаре">
	<meta name="author" content="Libils Team">
	<meta name="copyright" content="Libils Team">

	<!-- Open Graph Meta -->
	<meta property="og:title" content="VashMaster98">
	<meta property="og:locale" content="ru_RU">
	<meta property="og:description" content="Электромонтажные работы в Краснодаре">
	<meta property="og:image" content="">
	<meta property="og:site_name" content="VashMaster98">
	<meta property="og:url" content="">
	<meta property="og:type" content="website">

	<!-- Css -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/media.css">
	<link rel="shortcut icon" href="image/favicon/fav.ico" type="image/x-icon">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="owlcarousel/css/owl.carousel.min.css">
	<link rel="stylesheet" href="owlcarousel/css/owl.theme.default.min.css">
</head>
<body>

	<div class="wrapper ind">
		<?php require 'header.php'; ?>
		<section class="intro">
			<div class="container">
				<div class="intro__inner">
					<div class="intro__about">
						<div class="headline">
							<h1>ЭЛЕКТРОМОНТАЖНЫЕ РАБОТЫ В КРАСНОДАРЕ</h1>
							<p>От простого переноса розеток в квартире до монтажа электропроводки в коммерческих и административных помещениях</p>
						</div>
						<div class="img__intro img__intro__mobile">
							<img src="image/intro/electric.png" alt="electric">
						</div>
						<div class="qualities">
							<div class="qualite">
								<div class="qualite__img">
									<i class="fas fa-poll-h"></i>
								</div>
								<div class="about__this__qualite">
									<p>Соблюдение всех правил СНиП и ПУЭ</p>
								</div>
							</div>
							<div class="qualite">
								<div class="qualite__img">
									<i class="fas fa-shield-alt"></i>
								</div>
								<div class="about__this__qualite">
									<p>Гарантия</p>
								</div>
							</div>
							<div class="qualite">
								<div class="qualite__img">
									<i class="fas fa-hard-hat"></i>
								</div>
								<div class="about__this__qualite">
									<p>Опыт более 10 лет</p>
								</div>
							</div>
							<div class="qualite">
								<div class="qualite__img">
									<i class="fas fa-broom"></i>
								</div>
								<div class="about__this__qualite">
									<p>Уборка рабочего места после проведенной работы</p>
								</div>
							</div>
						</div>
						<div class="btn__call">
							<a href="#Contact" class="call__me btn__default">Заказать звонок</a>
						</div>
					</div>
					<div class="img__intro">
						<img src="image/intro/electric.png" alt="electric">
					</div>
				</div>
			</div>
		</section>
		<section class="services" id="Services">
			<div class="container">
				<div class="services__inner">
					<div class="services__about">
						<div class="headline">
							<h2>Наши услуги</h2>
						</div>
						<div class="service__elements">
							<div class="service__element">
								<div class="img__service__element">
									<img src="image/services/project.svg" alt="project">
								</div>
								<div class="about__this__service__element">
									<p>Сделаем комплексный проект и монтаж проводки на кухне и в других помещениях</p>
								</div>
							</div>
							<div class="service__element">
								<div class="img__service__element">
									<img src="image/services/tiles.svg" alt="tiles">
								</div>
								<div class="about__this__service__element">
									<p>Проведем "чистое" штробление потолка и стен</p>
								</div>
							</div>
							<div class="service__element">
								<div class="img__service__element">
									<img src="image/services/chandelier.svg" alt="chandelier">
								</div>
								<div class="about__this__service__element">
									<p>Установим светильники и люстры любого размера</p>
								</div>
							</div>
							<div class="service__element">
								<div class="img__service__element">
									<img src="image/services/wall-socket.svg" alt="tiles">
								</div>
								<div class="about__this__service__element">
									<p>Организуем быстрый перенос розеток</p>
								</div>
							</div>
							<div class="service__element">
								<div class="img__service__element">
									<img src="image/services/wire.svg" alt="wire">
								</div>
								<div class="about__this__service__element">
									<p>Заменим проводку в нужных комнатах</p>
								</div>
							</div>
							<div class="service__element">
								<div class="img__service__element">
									<img src="image/services/plug.svg" alt="plug">
								</div>
								<div class="about__this__service__element">
									<p>Подключим любую электротехнику</p>
								</div>
							</div>
							<div class="service__element">
								<div class="img__service__element">
									<img src="image/services/counter.svg" alt="counter">
								</div>
								<div class="about__this__service__element">
									<p>Подключим электросчётчики</p>
								</div>
							</div>
							<div class="service__element">
								<div class="img__service__element">
									<img src="image/services/innovation.svg" alt="innovation">
								</div>
								<div class="about__this__service__element">
									<p>Рассчитаем необходимую мощность и распределим ее по группам</p>
								</div>
							</div>
							<div class="service__element">
								<div class="img__service__element">
									<img src="image/services/sketch.svg" alt="sketch">
								</div>
								<div class="about__this__service__element">
									<p>Сделаем полный проект электропроводки</p>
								</div>
							</div>
							<div class="service__element">
								<div class="img__service__element">
									<img src="image/services/bolt.svg" alt="bolt">
								</div>
								<div class="about__this__service__element">
									<p>Протянем питающий кабель в дом</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="price" id="Price">
			<div class="container">
				<div class="price__inner">
					<div class="headline">
						<h2>Цены</h2>
						<p>Скачайте наш прайс-лист и ознакомьтесь со всеми ценами </p>
					</div>
					<p><a href="price.xlsx" download class="btn__downloadPrice btn__default">Скачать</a></p>
					<small class="warning__price">*Файл в формате xlsx</small>
				</div>
			</div>
		</section>
		<section class="portfolio" id="Portfolio">
			<div class="container">
				<div class="portfolio__inner">
					<div class="headline">
						<h2>Наши работы</h2>
					</div>
					<div class="portfolios">
						<?php
						$query = mysqli_query($link,"SELECT * FROM Portfolio");
						 while($rowPortfolio = mysqli_fetch_assoc($query)): ?>
						<div class="portfolio__element" data-id="<?php echo $rowPortfolio['id'];?>">
							<p class="title__img__portfolio"><?php echo $rowPortfolio['name'];?></p>
							<div class="img__portfolio">
								<img src="image/portfolio/<?php echo $rowPortfolio['path'];?>" alt="<?php echo $rowPortfolio['name'];?>">
							</div>
						</div>
						<? endwhile; ?>
					</div>
				</div>
			</div>
		</section>
		<section class="testimonials" id="Testimonials">
			<div class="container">
				<div class="headline">
					<h2>Наши отзывы</h2>
				</div>
				<div class="owl-carousel owl-theme">
					<?php
						$queryTestimonials = mysqli_query($link,"SELECT * FROM Testimonials");
						 while($rowTestimonials = mysqli_fetch_assoc($queryTestimonials)): ?>
						<div class="item__carousel__testimonial">
							<div class="img__testimonier">
								<img src="image/testimonials/<?php echo $rowTestimonials['path']; ?>" alt="<?php echo $rowTestimonials['name']; ?>testimonier">
							</div>
							<p>
							<?php echo $rowTestimonials['aboutTestimonial']; ?></p>
							<p class="date__publication__testimonial"><?php echo $rowTestimonials['author']; ?>, <?php 
							$dateAdd = $rowTestimonials['date_add'];
							$findI = strpos($dateAdd, ' ');
							$replaceseStrD = substr($dateAdd, 0,10);
							$replaceseStrT = substr($dateAdd, -9,6);

							echo $replaceseStrD; ?> в <?php echo $replaceseStrT; ?></p>
						</div>
						<? endwhile; ?>
				</div>
			</div>
		</section>
		<footer class="contact" id="Contact">
			<div class="container">
				<div class="headline">
					<h2>Контакты</h2>
				</div>
				<div class="inner__contact">

					<div class="social">
						<h3>Мы в соц. сетях</h3>
						<div class="soc__btn">
							<p><a href="https://vk.com/public185286620"><i class="fab fa-vk"></i></a><span>Мы есть в ВК</span></p>
							<p><a href="https://www.instagram.com/viatkin.master/"><i class="fab fa-instagram"></i></a><span>Мы есть в Instagram</span></p>
							<p><i class="fas fa-phone"></i><span><a href="tel:+79189848121">8(918)984-81-21</a></span></p>
							<p><i class="fas fa-globe"></i><span>г.Краснодар</span></p>
						</div>
					</div>
					<div class="contact__form">
						<h3>Оставьте заявку</h3>
						<form  method="post">
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
							<input type="text" class="userName__inp inp__contact" placeholder="Ваше имя" required name="userName">
							<input type="text" class="phone__reg inp__contact" placeholder="Ваш телефон" required name="phone">
							<input type="text" class="txt__about__workIs inp__contact" placeholder="Что вас заинтересовало" required name="work">
							<button type="submit" class="btn__default" name="sendContact">Отправить</button>
						</form>
					</div>
				</div>
			</div>
		</footer>
		<div class="LibilsTeam">
			<div class="container">
		   	 	<p>Site created <a href="https://vk.com/libils_team" title="Группа в Вк">Libils Team</a> 2019©</p>
			</div>
		</div>
	</div>



	
	
	<!-- Optional JS and Jquery -->
	<script src="https://kit.fontawesome.com/de8f891afd.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
	<!-- Owl Carousel And My script -->
	<script src="owlcarousel/js/owl.carousel.min.js"></script>
	<script src="js/mask.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
</body>
</html>