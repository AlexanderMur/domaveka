<?php
$GLOBALS['template_directory_uri'] = get_template_directory_uri();
?>
<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">

	<title>Дома Века</title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta property="og:image" content="path/to/image.jpg">
	<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">

	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#000">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#000">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#000">

	<style>body { opacity: 0; overflow-x: hidden; } html { background-color: #fff; }</style>
	<?php wp_head() ?>
</head>


<body>
	<header class="header border-bottom">
		<div class="container container-md-fluid">
			<div class="row">
				<div class="col-md-12 col-lg-6 t-md-center">
					<a href="#" class="logo">
						<img src="<?php echo get_template_directory_uri() . '/' ?>img/logo.png" alt="логотип сайта">
					</a>
					<h5 class="text-up mt-10 logo-deskription va-top"><?php echo get_option('blogdescription') ?></h5>					
				</div>
				<div class="col-md-12 col-lg-6 t-right t-md-center">
					<div class="contact-info va-top">
						<p class="phone "><?php echo get_text_mod('header_phone_number','8 (8332) <font color="#6ea903">560-198</font>') ?></p>
						<p class="c-gray phone-bottom">Киров и Кировская область</p>
					</div>
					<a href="<?php echo get_theme_mod('header_button_link','http://google.com') ?>" class="btn va-top"><?php echo get_text_mod('header_button_text','ПЕСКОСТРУЙНАЯ ОБРАБОТКА СРУБОВ') ?></a>
				</div>
			</div>
		</div>
		<div class="header-bottom" style="width: 100%; background-color: #fff">
			<div class="container container-md-fluid">
				<a id="toggle-menu" href="" class="hamburger hamburger--minus">
					<span class="hamburger-box">
					  <span class="hamburger-inner"></span>
					</span>
				</a>
				<nav id="top-menu">
					<ul>
						<li><a href="#about-us">о нас</a></li>
						<li><a href="#advantages">наши приемущества</a></li>
						<li><a href="#production">производство</a></li>
						<li><a href="#projects">проекты домов</a></li>
						<li><a href="#completed-projects">реализованные проекты</a></li>
						<li><a href="#our_geography">наша география</a></li>
						<li><a href="#reviews">отзывы</a></li>
						<li><a href="#contacts">контакты</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<main>