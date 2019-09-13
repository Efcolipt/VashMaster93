<header>
	<div class="container ">
		<div class="menu">
			<div class="logo"><a href="index.php"><i class="fas fa-plug"></i> <span>Ваш Мастер</span></a></div>
			<div class="menu__nav">
				<ul class="nav">
					<li class="nav__item"><a class="nav__link" href="#Services">Услуги</a></li>
					<li class="nav__item"><a class="nav__link" href="#Portfolio">Галерея</a></li>
					<li class="nav__item"><a class="nav__link" href="#Price">Цены</a></li>
					<li class="nav__item"><a class="nav__link" href="#Testimonials">Отзывы</a></li>
					<li class="nav__item"><a class="nav__link" href="#Contact">Контакты</a></li>
					
					<li class="nav__item phone__item">
						<a href="tel:+79189848121" class="nav__link__phone"> 8(918)984-81-21 </a>
					</li>
				</ul>
				<div class="menu__bar" data-id="0">
					<i class="fas fa-bars"></i>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (!empty($_SESSION['tokenAdmin'])) {
		$isAdmin = '<li class="nav__item"><a class="nav__link" href="reg.php">Регистрация</a></li>
					<li class="nav__item"><a class="nav__link" href="portfolios.php">Работы</a></li>
					<li class="nav__item"><a class="nav__link" href="persons.php">Пользователи</a></li>
					<li class="nav__item"><a class="nav__link" href="addTestimonials.php">Добавление отзыва</a></li>
					<li class="nav__item"><a class="nav__link" href="testimonials.php">Отзывы</a></li>
					<li class="nav__item"><a class="nav__link" href="applications.php">Заявки</a></li>';
	}else{
		$isAdmin = "";
	}

	 if (!empty($_SESSION['tokenAdmin']) || !empty($_SESSION['tokenGuest'])){ 

		echo '<div class="admin__panel">
			<div class="container">
			<div class="inner__panel">
				<div class="menu__admin__bar" data-id="0">
					<span>Админ панель</span><i class="fas fa-bars"></i>
				</div>
				<ul class="nav__admin">
				'.$isAdmin.'
					<li class="nav__item"><a class="nav__link" href="addPortfolio.php">Добавить портфолио</a></li>
					<li class="nav__item"><a class="nav__link" href="logout.php">Выход</a></li>
				</ul>
			</div>
		</div>
	</div>';

	}
	?>
		

</header>