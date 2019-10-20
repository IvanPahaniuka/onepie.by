<?php
	require 'bd/rb.php';

	R::setup( 'mysql:host=localhost;dbname=onepie', 'root', '');

	require_once 'bd/functions.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Интернет-магазин пирогов – OnePie.by</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jQuery.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<div class="cover"></div>

	<header>
		<ul>
			<li><img src="img/shop.svg">Главная</li><!--
		 --><li><img src="img/sell.svg">Акции</li><!--
		 --><li><img src="img/review.svg">Отзывы</li><!--
		 --><li><img src="img/us.svg">О нас</li><!--
		 --><li class="login"><img src="img/login.svg"><span>Вход</span></li>
		</ul>
	</header>

	<div class="main">
		<div class="filter">
			<div class="open" title="Критерии поиска"><img src="img/filter.svg">Критерии</div><!--
		 --><div class="search"> 
				<input placeholder="поиск">
				<button></button>
			</div>
		</div>
		<div class="shop">
			<?php 
				$items = get_items();
			?>
			<?php foreach($items as $item): 
			?><div class="item">
				<div class="title"><?=$item["title"]?></div>
				<img class="pieimg" src="img/pies/<?=$item["images"]?>/1.png">
				<div class="bottom">
					<img class="rate" src="img/rate.svg" style="clip-path: inset(0 <?=(5-$item["rate"])*20?>% 0 0);">
					<div class="mass"><?=$item["mass"]?>г</div>
					<div class="buttcost">
						<button>В корзину</button><!--
				 	 --><div class="cost"><?=$item["cost"]?> руб</div>
				 	</div>
			 	</div>
			</div><!--
			--><?php endforeach; ?>
		</div>
	</div>

	<footer>
		<div class="content">	
			<div class="info">
				<div><a href="#" target="_blank"><img src="img/fb.svg"></a></div><!--
			 --><div><a href="#" target="_blank"><img src="img/vk.svg"></a></div><!--
		 	 --><div><label class="home connect"><input type="radio" name="rd1"><img src="img/point.svg" title="Ул. Пушкина, дом Колотушкина"><a>Ул. <strong>Пушкина</strong><br> дом <strong>Колотушкина</strong></a></label></div><!--
			 --><div><label class="mail connect"><input type="radio" name="rd1"><img src="img/mail.svg" title="ivan-pog12@mail.ru"><a href="#" target="_blank"><strong>ivan-pog12@mail.ru</strong></a></label></div><!--
			 --><div><label class="tel connect"><input type="radio" name="rd1"><img src="img/tel.svg" title="+375 (29) 139-01-22"><a><strong>+375 (29) 139-01-22</strong></a></label></div><!--
			 --><div><a href="#" target="_blank"><img src="img/in.svg"></a></div><!--
			 --><div><a href="#" target="_blank"><img src="img/tw.svg"></a></div>
			</div>
		</div>
	</footer>

	<form class="entry" method="get">
		<h1>Вход</h1>
		<input placeholder="логин или e-mail"><br>
		<input placeholder="пароль" type="password"><br>
		<label class="remember"><input type="checkbox" name="remember" checked><span> Запомнить меня</span></label><label class="lostpass">Забыли пароль?</label><br>
		<button type="submit">Войти</button><br>	
	</form>

	<form class="reg" name="reg" action="reg.php" method="post">
		<h1>Регистрация</h1>
		<input class="login flt" name="login" placeholder="логин" title="Используется только для входа"><br>
		<input name="e-mail" placeholder="e-mail" title="Используется для входа и связи"><br>
		<input name="password" class="password flt" placeholder="пароль" type="password"><input name="password2" class="password flt" placeholder="повтор пароля" type="password"><br>
		<input name="name" placeholder="имя" title="Вы можете ввести свое реальное имя или никнейм(будет видно другим пользователям)"><br>
		<div class="g-recaptcha" data-sitekey="6Ld1D2UUAAAAAFOeZvHI-T80MzyDAIqZOIEklkAQ"></div>
		<button type="submit">Зарегистрироваться</button><br>	
	</form>

	<div class="help"><span></span></div>

	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>