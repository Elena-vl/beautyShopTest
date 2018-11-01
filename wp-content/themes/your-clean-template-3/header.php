<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>	  <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>		 <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>		 <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="en" class="no-js" <?php language_attributes(); // вывод атрибутов языка ?>>
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">``
	<![endif]-->
	<title>Бьюти Шоп - интернет магазин профессиональной косметики</title>
	<meta name="description" content="ИНТЕРНЕТ МАГАЗИН BEAUTY SHOP ДЛЯ ПРОФЕССИОНАЛОВ ИНДУСТРИИ КРАСОТЫ">
	<meta name="author" content="NetoLab">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- <link rel="stylesheet" type="text/css" href="css\theme-style.css"> -->
	<!-- <link rel="stylesheet" href="css\ie.style.css"> -->
	<!-- Fav and touch icons -->
<!-- 	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="..\img\ico\apple-touch-icon-144.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="..\img\ico\apple-touch-icon-114.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="..\img\ico\apple-touch-icon-72.png">
	<link rel="apple-touch-icon-precomposed" href="..\img\ico\apple-touch-icon-57.png">
	<link rel="shortcut icon" href="..\img\ico\favicon.ico"> -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php get_template_directory_uri() ?>\img\ico\apple-touch-icon-144.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php get_template_directory_uri() ?>\img\ico\apple-touch-icon-72.png">
	<link rel="apple-touch-icon-precomposed" href="<?php get_template_directory_uri() ?>\img\ico\apple-touch-icon-57.png">
	<link rel="shortcut icon" href="<?php get_template_directory_uri() ?>\img\ico\favicon.ico">
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<!--[if IE 7]>
	  <link rel="stylesheet" href="css/font-awesome-ie7.css">
	<![endif]-->
	<!-- <script src="js\vendor\modernizr.js"></script> -->
	<!--[if IE 8]><script src="js/vendor/less-1.3.3.js"></script><![endif]-->
	<!--[if gt IE 8]><!-->
	<!-- <script src="js\vendor\less.js"></script> -->
	<!--<![endif]-->
	<?php /* Все скрипты и стили теперь подключаются в functions.php */ ?>
	<meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php /* RSS и всякое */ ?>
	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); // необходимо для работы плагинов и функционала ?>
</head>
<body <?php body_class(); // все классы для body ?>>
	<!-- Header-->
	<header id="header">
		<div class="header-top-row">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="top-welcome hidden-xs hidden-sm">
							<p>Интернет магазин профессиональной косметики &nbsp;&nbsp;<i class="fa fa-phone"></i> +7-922-829-91-15 &nbsp; <i class="fa fa-envelope"></i> beautyshop56@mail.ru</p> 
						</div>
					</div>
					<div class="col-md-4">
						<div class="pull-right">
							<!-- header-account menu -->
							<div id="account-menu" class="pull-right">
								<a href="<?php site_url() ?>/my-account" class="account-menu-title"> <i class="fa fa-user"></i>&nbsp; Профиль <i class="fa fa-angle-down"></i> </a>
								<ul class="list-unstyled account-menu-item">
									<li><a href=""><i class="fa fa-list"></i>&nbsp; Контакты</a></li>
									<li><a href=""><i class="fa fa-heart"></i>&nbsp; Желания</a></li>
									<li><a href=""><i class="fa fa-tasks"></i>&nbsp; Заказы</a></li>
									<li><a href=""><i class="fa fa-sign-out"></i>&nbsp; Выход</a></li>
								</ul>
							</div>
							<!-- /header-account menu -->

							<!-- header - currency -->
							<div class="socials-block pull-right">
								<ul class="list-unstyled list-inline">
									<li><a href="https://vk.com/beautyshop56" target="_blank"><i class="fa fa-vk"></i></a></li>
									<li><a href="https://www.instagram.com/56beautyshop/" target="_blank"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
							<!-- /header - currency -->
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- /header-top-row -->
		<div class="header-bg">
			<div class="header-main" id="header-main-fixed">
				<div class="header-main-block1">
					<div class="container">
						<div id="container-fixed">
							<div class="row">
								<div class="col-md-3">
									<a href="<?php echo get_site_url(); ?>" class="header-logo"> 
										<img src="<?php get_template_directory_uri() ?>\img\logo-big-shop.png" alt="Интернет магазин профессиональной косметики"></a>		
								</div>

								<div class="col-md-5">
									<div class="top-search-form pull-left">
										<form role="search" method="get" class="search-form form-inline" action="<?php echo home_url( '/' ); ?>">
											<input type="search" class="form-control" id="search-field"placeholder="Поиск ..." class="form-control" value="<?php echo get_search_query() ?>" name="s" style="width: 100%;">
											<button type="submit"><i class="fa fa-search"></i></button>
										</form>
									</div>
								</div>
								<div class="col-md-4">
									<div class="header-mini-cart  pull-right">
										<a class="cart-contents" href="" 
											title="<?php _e('Перейти в корзину', 'woothemes'); ?>" data-toggle="dropdown"> Корзина
											<span>
												<?php echo sprintf(_n('%d товар', '%d товаров', WC()->cart->cart_contents_count,        'woothemes'), WC()->cart->cart_contents_count);?> 
												<?php echo WC()->cart->get_cart_total(); ?>
											</span>
										</a>
									<div class="dropdown-menu shopping-cart-content pull-right">
											<div class="shopping-cart-items">
											<?php if ( ! WC()->cart->is_empty() ) : ?>
												<?php 
													global $woocommerce;
													$items = $woocommerce->cart->get_cart();
													
													foreach($items as $cart_item_key => $cart_item) { 
														$_product = $cart_item['data']->post; 
														$price = get_post_meta($cart_item['product_id'] , '_price', true);
														$count = $cart_item['quantity'];
														?>
														<div class="item pull-left">
															<img src="http://placehold.it/56x70" alt="Название товара" class="pull-left">
															<div class="pull-left">
																<p><?php echo $_product->post_title; ?></p>
																<p><?php echo $price; ?>&nbsp;<strong>x <?php echo $count; ?></strong></p>
															</div>
															<!-- <a href="" class="trash"><i class="fa fa-trash-o pull-left"></i></a> -->
														</div>													
														<?php
												    } 
												?>
<!-- 											<div class="item pull-left">
													<img src="http://placehold.it/56x70" alt="Название товара" class="pull-left">
													<div class="pull-left">
														<p>Название товара</p>
														<p>₽251.00&nbsp;<strong>x 3</strong></p>
													</div>
													<a href="" class="trash"><i class="fa fa-trash-o pull-left"></i></a>
												</div> -->
											</div>
											<div class="total pull-left">	
												<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="btn-read pull-right">В корзину</a>
												<a href="<?php site_url() ?>/checkout" class="btn-read pull-right">Заказать</a>
											</div>
											<?php else : ?>
												<p class="woocommerce-mini-cart__empty-message"><?php _e( 'No products in the cart.', 'woocommerce' ); ?></p>
											<?php endif; ?>	
									</div>
									</div>	<!--header-mini-cart -->
									<!-- <div class="top-icons">
										<div class="top-icon"><a href="" title="Оповещения"><i class="fa fa-bell"></i></a><span>12</span></div>
									</div> -->
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="header-main-block2">
					<nav class="navbar yamm  navbar-main" role="navigation">
						<div class="container">
							<div class="navbar-header">
								<button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
								<a href="<?php echo get_site_url(); ?>" class="navbar-brand"><i class="fa fa-home"></i></a>
							</div>
							<div id="navbar-collapse-1" class="navbar-collapse collapse ">
								<ul class="nav navbar-nav">
									<!-- Classic list -->
									<?php $args = array( // опции для вывода верхнего меню, чтобы они работали, меню должно быть создано в админке
										'theme_location' => 'top', // идентификатор меню, определен в register_nav_menus() в functions.php
										'container'=> false, // обертка списка, тут не нужна
										'menu_id' => 'top-nav-ul', // id для ul
										'items_wrap' => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
										'menu_class' => 'top-menu', // класс для ul, первые 2 обязательны
										'walker' => new bootstrap_menu(true) // верхнее меню выводится по разметке бутсрапа, см класс в functions.php, если по наведению субменю не раскрывать то передайте false		  		
										);
										wp_nav_menu($args); // выводим верхнее меню
									?>
								</ul>
							</div>
						</div>
					</nav>
				</div>
			</div>
			<!-- /header-main-menu -->
		</div>
	</header>
	<!-- End header -->