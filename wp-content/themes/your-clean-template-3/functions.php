<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */

add_theme_support('title-tag'); // теперь тайтл управляется самим вп

add_action(' wp_enqueue_script', 'woocust_child_enqueue_style');
function woocust_child_enqueue_style(){
	wp_enqueue_style('parent', get_template_directory_uri() . 'style.css');
}
register_nav_menus(array( // Регистрируем 2 меню
	'top' => 'Верхнее', // Верхнее
	'bottom' => 'Внизу' // Внизу
));

add_theme_support('post-thumbnails'); // включаем поддержку миниатюр
set_post_thumbnail_size(250, 150); // задаем размер миниатюрам 250x150
add_image_size('big-thumb', 400, 400, true); // добавляем еще один размер картинкам 400x400 с обрезкой

register_sidebar(array( // регистрируем левую колонку, этот кусок можно повторять для добавления новых областей для виджитов
	'name' => 'Сайдбар', // Название в админке
	'id' => "sidebar", // идентификатор для вызова в шаблонах
	'description' => 'Обычная колонка в сайдбаре', // Описалово в админке
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // разметка до вывода каждого виджета
	'after_widget' => "</div>\n", // разметка после вывода каждого виджета
	'before_title' => '<span class="widgettitle">', //  разметка до вывода заголовка виджета
	'after_title' => "</span>\n", //  разметка после вывода заголовка виджета
));

if (!class_exists('clean_comments_constructor')) { // если класс уже есть в дочерней теме - нам не надо его определять
	class clean_comments_constructor extends Walker_Comment { // класс, который собирает всю структуру комментов
		public function start_lvl( &$output, $depth = 0, $args = array()) { // что выводим перед дочерними комментариями
			$output .= '<ul class="children">' . "\n";
		}
		public function end_lvl( &$output, $depth = 0, $args = array()) { // что выводим после дочерних комментариев
			$output .= "</ul><!-- .children -->\n";
		}
	    protected function comment( $comment, $depth, $args ) { // разметка каждого комментария, без закрывающего </li>!
	    	$classes = implode(' ', get_comment_class()).($comment->comment_author_email == get_the_author_meta('email') ? ' author-comment' : ''); // берем стандартные классы комментария и если коммент пренадлежит автору поста добавляем класс author-comment
	        echo '<li id="comment-'.get_comment_ID().'" class="'.$classes.' media">'."\n"; // родительский тэг комментария с классами выше и уникальным якорным id
	    	echo '<div class="media-left">'.get_avatar($comment, 64, '', get_comment_author(), array('class' => 'media-object'))."</div>\n"; // покажем аватар с размером 64х64
	    	echo '<div class="media-body">';
	    	echo '<span class="meta media-heading">Автор: '.get_comment_author()."\n"; // имя автора коммента
	    	//echo ' '.get_comment_author_email(); // email автора коммента, плохой тон выводить почту
	    	echo ' '.get_comment_author_url(); // url автора коммента
	    	echo ' Добавлено '.get_comment_date('F j, Y в H:i')."\n"; // дата и время комментирования
	    	if ( '0' == $comment->comment_approved ) echo '<br><em class="comment-awaiting-moderation">Ваш комментарий будет опубликован после проверки модератором.</em>'."\n"; // если комментарий должен пройти проверку
	    	echo "</span>";
	        comment_text()."\n"; // текст коммента
	        $reply_link_args = array( // опции ссылки "ответить"
	        	'depth' => $depth, // текущая вложенность
	        	'reply_text' => 'Ответить', // текст
				'login_text' => 'Вы должны быть залогинены' // текст если юзер должен залогинеться
	        );
	        echo get_comment_reply_link(array_merge($args, $reply_link_args)); // выводим ссылку ответить
	        echo '</div>'."\n"; // закрываем див
	    }
	    public function end_el( &$output, $comment, $depth = 0, $args = array() ) { // конец каждого коммента
			$output .= "</li><!-- #comment-## -->\n";
		}
	}
}

if (!function_exists('pagination')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function pagination() { // функция вывода пагинации
		global $wp_query; // текущая выборка должна быть глобальной
		$big = 999999999; // число для замены
		$links = paginate_links(array( // вывод пагинации с опциями ниже
			'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
			'format' => '?paged=%#%', // формат, %#% будет заменено
			'current' => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
			'type' => 'array', // нам надо получить массив
			'prev_text'    => 'Назад', // текст назад
	    	'next_text'    => 'Вперед', // текст вперед
			'total' => $wp_query->max_num_pages, // общие кол-во страниц в пагинации
			'show_all'     => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
			'end_size'     => 15, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
			'mid_size'     => 15, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
			'add_args'     => false, // массив GET параметров для добавления в ссылку страницы
			'add_fragment' => '',	// строка для добавления в конец ссылки на страницу
			'before_page_number' => '', // строка перед цифрой
			'after_page_number' => '' // строка после цифры
		));
	 	if( is_array( $links ) ) { // если пагинация есть
		    echo '<ul class="pagination">';
		    foreach ( $links as $link ) {
		    	if ( strpos( $link, 'current' ) !== false ) echo "<li class='active'>$link</li>"; // если это активная страница
		        else echo "<li>$link</li>"; 
		    }
		   	echo '</ul>';
		 }
	}
}

add_action('wp_footer', 'add_scripts'); // приклеем ф-ю на добавление скриптов в футер
if (!function_exists('add_scripts')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function add_scripts() { // добавление скриптов
	    if(is_admin()) return false; // если мы в админке - ничего не делаем
	    wp_deregister_script('jquery'); // выключаем стандартный jquery
	    wp_enqueue_script('jquery','//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js','','',true); // добавляем свой
	    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js','','',true); // бутстрап
	    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js','','',true); // и скрипты шаблона
	}
}

add_action('wp_print_styles', 'add_styles'); // приклеем ф-ю на добавление стилей в хедер
if (!function_exists('add_styles')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function add_styles() { // добавление стилей
	    if(is_admin()) return false; // если мы в админке - ничего не делаем
	    wp_enqueue_style( 'bs', get_template_directory_uri().'/css/bootstrap.min.css' ); // бутстрап
		wp_enqueue_style( 'main', get_template_directory_uri().'/style.css' ); // основные стили шаблона
	}
}

if (!class_exists('bootstrap_menu')) {
	class bootstrap_menu extends Walker_Nav_Menu { // внутри вывод 
		private $open_submenu_on_hover; // параметр который будет определять раскрывать субменю при наведении или оставить по клику как в стандартном бутстрапе

		function __construct($open_submenu_on_hover = true) { // в конструкторе
	        $this->open_submenu_on_hover = $open_submenu_on_hover; // запишем параметр раскрывания субменю
	    }

		function start_lvl(&$output, $depth = 0, $args = array()) { // старт вывода подменюшек
			$output .= "\n<ul class=\"dropdown-menu\">\n"; // ул с классом
		}
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) { // старт вывода элементов
			$item_html = ''; // то что будет добавлять
			parent::start_el($item_html, $item, $depth, $args); // вызываем стандартный метод родителя
			if ( $item->is_dropdown && $depth === 0 ) { // если элемент содержит подменю и это элемент первого уровня
			   if (!$this->open_submenu_on_hover) $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"', $item_html); // если подменю не будет раскрывать при наведении надо добавить стандартные атрибуты бутстрапа для раскрытия по клику
			   $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html); // ну это стрелочка вниз
			}
			$output .= $item_html; // приклеиваем теперь
		}
		function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) { // вывод элемента
			if ( $element->current ) $element->classes[] = 'active'; // если элемент активный надо добавить бутстрап класс для подсветки
			$element->is_dropdown = !empty( $children_elements[$element->ID] ); // если у элемента подменю
			if ( $element->is_dropdown ) { // если да
			    if ( $depth === 0 ) { // если li содержит субменю 1 уровня
			        $element->classes[] = 'dropdown'; // то добавим этот класс
			        if ($this->open_submenu_on_hover) $element->classes[] = 'show-on-hover'; // если нужно показывать субменю по хуверу
			    } elseif ( $depth === 1 ) { // если li содержит субменю 2 уровня
			        $element->classes[] = 'dropdown-submenu'; // то добавим этот класс, стандартный бутстрап не поддерживает подменю больше 2 уровня по этому эту ситуацию надо будет разрешать отдельно
			    }
			}
			parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output); // вызываем стандартный метод родителя
		}
	}
}

if (!function_exists('content_class_by_sidebar')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function content_class_by_sidebar() { // функция для вывода класса в зависимости от существования виджетов в сайдбаре
		if (is_active_sidebar( 'sidebar' )) { // если есть
			echo 'col-sm-9'; // пишем класс на 80% ширины
		} else { // если нет
			echo 'col-sm-12'; // контент на всю ширину
		}
	}
}

if ( ! function_exists( 'cart_link' ) ) {
 function cart_link() {
 ?>
<a class="cart-contents" href="/cart/" title="<?php _e( 'Перейти в корзину' ); ?>"><i class="fa fa-shopping-cart"></i><?php echo sprintf (_n( '%d товар', '%d товаров', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a> 
 <?php
 }
}

  add_filter("the_content", "plugin_myContentFilter");

  function plugin_myContentFilter($content)
  {
    // Take the existing content and return a subset of it
    return substr($content, 0, 100).'...';
  }

// remove_all_actions('woocommerce_before_single_product');
// remove_all_actions('woocommerce_before_single_product_summary');
// remove_all_actions('woocommerce_single_product_summary');
// remove_all_actions('woocommerce_after_single_product_summary');
// remove_all_actions('woocommerce_after_single_product');

// add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_price', 1);
// add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_rating', 1);
// remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);

//add_action('woocommerce_single_product_summary', 'tpl_product_detail', 61);
// function tpl_product_detail(){
// 	global $product;
// <section>
// 	<div class="second-page-container">
// 		<div class="container">
// 			<div class="row">

// 				<div class="col-md-9">
// 					<div class="block-breadcrumb">
// 						<ul class="breadcrumb">
// 							<li><a href="#">Home</a></li>
// 							<li><a href="#">Shirts</a></li>
// 							<li class="active">Lolo</li>
// 						</ul>
// 					</div>

// 					<div class="header-for-light">
// 						<h1 class="wow fadeInRight animated" data-wow-duration="1s">Shirt <span>"LOLO"</span> </h1>

// 					</div>

// 					<div class="block-product-detail">
// 						<div class="row">
// 							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
// 								<div class="product-image">
// 									<img id="product-zoom"  src='img/preview/product/small/product2.jpg' data-zoom-image="img/preview/product/large/product2.jpg" alt="">
// 									<div id="gal1">

// 										<a href="javascript:;" data-image="img/preview/product/small/product1.jpg" data-zoom-image="img/preview/product/large/product1.jpg">
// 											<img id="img_01" src="img/preview/product/thumb/product1.jpg" alt="">
// 										</a>

// 										<a href="javascript:;" data-image="img/preview/product/small/product2.jpg" data-zoom-image="img/preview/product/large/product2.jpg">
// 											<img id="img_01" src="img/preview/product/thumb/product2.jpg"  alt="">
// 										</a>

// 										<a href="javascript:;"  data-image="img/preview/product/small/product3.jpg" data-zoom-image="img/preview/product/large/product3.jpg">
// 											<img id="img_01" src="img/preview/product/thumb/product3.jpg" />
// 										</a>
// 									</div>
// 								</div>
// 							</div>
// 							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">


// 								<div class="product-detail-section">
// 									<h3>Shirt "Lolo"</h3>
// 									<div class="product-rating">
// 										<div class="stars">
// 											<span class="star"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
// 										</div>
// 										<a href="" class="review">150 Reviews</a> 
// 									</div>

// 									<div class="product-information">
// 										<div class="clearfix"> 
// 											<label class="pull-left">Brand:</label> <a href="#">MusaicDesign</a><br>
// 										</div>
// 										<div class="clearfix"> 
// 											<label class="pull-left">Collection:</label> Effect collection
// 										</div>
// 										<div class="clearfix"> 
// 											<label class="pull-left">Product Code:</label> ID 175482451
// 										</div>
// 										<div class="clearfix">
// 											<label class="pull-left">Size:</label>
// 											<select name="size" class="form-control">
// 												<option value="" selected="selected">...</option>
// 												<option value="1">L</option>
// 												<option value="2">XL</option>
// 												<option value="3">XLL</option>
// 											</select>
// 										</div>
// 										<div class="clearfix">
// 											<label class="pull-left">Availability:</label>
// 											<p>150 in stock</p>
// 										</div>
// 										<div class="clearfix">
// 											<label class="pull-left">Description:</label>
// 											<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
// 										</div>
// 										<div class="clearfix">
// 											<label class="pull-left">Price:</label>
// 											<p class="product-price"><span>$469.99</span> $450.99</p>
// 										</div>
// 										<div class="clearfix">
// 											<label class="pull-left">Quantity:</label>
// 											<input type="number" class="form-control">
// 										</div>
// 										<div class="clearfix">
// 											<label class="pull-left">Total:</label>
// 											<p class="product-price">$850</p>
// 										</div>
// 										<div class="shopping-cart-buttons">

// 											<a href="#" class="shoping"><i class="fa fa-shopping-cart"></i>  Add to cart</a>
// 											<a href="#" title="Wishlist"><i class="fa fa-heart-o"></i></a>
// 											<a href="#" title="Compare"><i class="fa fa-random"></i></a>
// 										</div>



// 									</div>
// 								</div>
// 							</div>
// 						</div>
// 					</div>
// 					<div class="box-border block-form"> -->
// 						<!-- Nav tabs -->
// 					<!--	<ul class="nav nav-pills  nav-justified">
// 							<li class="active"><a href="#description" data-toggle="tab">Description</a></li>
// 							<li><a href="#additional" data-toggle="tab" class="disabled">Additional</a></li>
// 							<li><a href="#review" data-toggle="tab">Review</a></li>
// 						</ul> -->

// 						<!-- Tab panes -->
// 					<!--	<div class="tab-content">
// 							<div class="tab-pane active" id="description">
// 								<br>
// 								<h3>Product Details</h3>
// 								<hr>
// 								<p>
// 									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
// 								</p>
// 								<p>
// 									Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.
// 								</p>
// 							</div>
// 							<div class="tab-pane" id="additional">
// 								<br>
// 								<div class="row">
// 									<div class="col-md-4">
// 										<h3>Sizes</h3>
// 										<hr>
// 										<p>
// 											Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
// 										</p>

// 									</div>
// 									<div class="col-md-4 block-color">
// 										<h3>Colors</h3>
// 										<hr>
// 										<ul class="colors clearfix list-unstyled">
// 											<li><a href="" rel="003d71"></a></li>
// 											<li><a href="" rel="c42c39"></a></li>
// 											<li><a href="" rel="f4bc08"></a></li>
// 											<li><a href="" rel="02882c"></a></li>
// 											<li><a href="" rel="000000"></a></li>
// 											<li><a href="" rel="caccce"></a></li>
// 											<li><a href="" rel="ffffff"></a></li>
// 											<li><a href="" rel="f9e7b6"></a></li>
// 											<li><a href="" rel="ef8a07"></a></li>
// 											<li><a href="" rel="5a433f"></a></li>
// 											<li><a href="" rel="ff9bb5"></a></li>
// 											<li><a href="" rel="8c56a9"></a></li>
// 										</ul>

// 									</div>
// 									<div class="col-md-4">
// 										<h3>Other</h3>
// 										<hr>
// 										<p>
// 											Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
// 										</p>
// 									</div>
// 								</div>

// 							</div>
// 							<div class="tab-pane" id="review">
// 								<br>
// 								<div class="row">
// 									<div class="col-md-12">
// 										<h3>Clients review</h3>
// 										<hr>
// 										<div class="review-header">
// 											<h5>John Smith</h5>
// 											<div class="product-rating">
// 												<div class="stars">
// 													<span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
// 												</div>
// 											</div>
// 											<small class="text-muted">26/06/2014</small>
// 										</div>
// 										<div class="review-body">
// 											<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>

// 										</div>
// 										<hr>
// 										<div class="review-header">
// 											<h5>Tom Carry</h5>
// 											<div class="product-rating">
// 												<div class="stars">
// 													<span class="star"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
// 												</div>
// 											</div>
// 											<small class="text-muted">05/07/2014</small>
// 										</div>
// 										<div class="review-body">
// 											<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>

// 										</div>
// 										<hr>
// 									</div>
// 								</div>
// 								<form role="form" method="post" action="#">
// 									<div class="row">
// 										<div class="col-md-6">
// 											<div class="form-group">
// 												<label for="inputFirstName" class="control-label">First Name:<span class="text-error">*</span></label>
// 												<div>
// 													<input type="text" class="form-control" id="inputFirstName">
// 												</div>
// 											</div>


// 										</div>
// 										<div class="col-md-6">
// 											<div class="form-group">
// 												<label for="inputCompany" class="control-label">Company:</label>
// 												<div>
// 													<input type="text" class="form-control" id="inputCompany">
// 												</div>
// 											</div>
// 										</div>
// 										<div class="col-md-12">
// 											<div class="form-group">
// 												<textarea class="form-control">	</textarea>
// 											</div>
// 										</div>
// 										<div class="col-md-12">
// 											<div class="form-group">
// 												<label  class="control-label">Your Rate:</label>
// 												<div class="product-rating">
// 													<div class="stars">
// 														<span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
// 													</div>
// 												</div>
// 											</div>
// 										</div>
// 									</div>
// 									<input type="submit"  class="btn-default-1" value="Add Review">
// 								</form>

// 							</div>

// 						</div>



// 					</div>



// 				</div>
// 				<div class="col-md-3">
// 					<div class="main-category-block ">
// 						<div class="main-category-title">
// 							<i class="fa fa-list"></i> Category

// 						</div>
// 					</div>
// 					<div class="widget-block">
// 						<ul class="list-unstyled ul-side-category">
// 							<li><a href=""><i class="fa fa-angle-right"></i> Man / 2</a>
// 								<ul class="sub-category">
// 									<li><a href="">Dress / 2</a>
// 										<ul class="sub-category">
// 											<li><a href="#">Dress 1</a></li>
// 											<li><a href="#">Dress 2</a></li>
// 										</ul>
// 									</li>
// 									<li><a href="">Shirt / 2</a>
// 										<ul class="sub-category">
// 											<li><a href="#">Shirt 1</a></li>
// 											<li><a href="#">Shirt 2</a></li>
// 										</ul>
// 									</li>
// 								</ul>
// 							</li>
// 							<li><a href=""><i class="fa fa-angle-right"></i> Woman / 2</a>
// 								<ul class="sub-category">
// 									<li><a href="">Dress / 2 </a>
// 										<ul class="sub-category">
// 											<li><a href="#">Dress 1</a></li>
// 											<li><a href="#">Dress 2</a></li>
// 										</ul>
// 									</li>
// 									<li><a href="">Shirt / 2</a>
// 										<ul class="sub-category">
// 											<li><a href="#">Shirt 1</a></li>
// 											<li><a href="#">Shirt 2</a></li>
// 										</ul>
// 									</li>
// 								</ul>
// 							</li>
// 							<li>
// 								<a href="#"><i class="fa fa-angle-right"></i> Tablet / 0</a>
// 							</li>
// 							<li>
// 								<a href="#"><i class="fa fa-angle-right"></i> Laptop / 0</a>
// 							</li>

// 						</ul>

// 					</div>
// 					<div class="product light last-sale">
// 						<figure class="figure-hover-overlay">																		
// 							<a href="#"  class="figure-href"></a>
// 							<div class="product-sale">Sale <br> 7%</div>
// 							<div class="product-sale-time"><p class="time"></p></div>
// 							<a href="#" class="product-compare"><i class="fa fa-random"></i></a>
// 							<a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
// 							<img src="http://placehold.it/400x500" class="img-overlay img-responsive" alt="">
// 							<img src="http://placehold.it/400x500" class="img-responsive" alt="">
// 						</figure>
// 						<div class="product-caption">
// 							<div class="block-name">
// 								<a href="#" class="product-name">Product name</a>
// 								<p class="product-price"><span>$330</span> $320.99</p>

// 							</div>
// 							<div class="product-cart">
// 								<a href="#"><i class="fa fa-shopping-cart"></i> </a>
// 							</div>
// 						</div>

// 					</div>
// 					<div class="widget-title">
// 						<i class="fa fa-money"></i> Price range

// 					</div>
// 					<div class="widget-block">
// 						<div class="row">
// 							<div class="col-md-6">
// 								<div class="input-group">
// 									<span class="input-group-addon">$</span>
// 									<input type="text" id="price-from" class="form-control" value="0">
// 								</div>
// 							</div>
// 							<div class="col-md-6">
// 								<div class="input-group">
// 									<span class="input-group-addon">$</span>
// 									<input type="text" id="price-to" class="form-control" value="500">
// 								</div>
// 							</div>
// 						</div> 
// 					</div>
// 					<div class="widget-title">
// 						<i class="fa fa-dashboard"></i> Colors

// 					</div>
// 					<div class="widget-block">
// 						<ul class="colors clearfix list-unstyled">
// 							<li><a href="" rel="003d71"></a></li>
// 							<li><a href="" rel="c42c39"></a></li>
// 							<li><a href="" rel="f4bc08"></a></li>
// 							<li><a href="" rel="02882c"></a></li>
// 							<li><a href="" rel="000000"></a></li>
// 							<li><a href="" rel="caccce"></a></li>
// 							<li><a href="" rel="ffffff"></a></li>
// 							<li><a href="" rel="f9e7b6"></a></li>
// 							<li><a href="" rel="ef8a07"></a></li>
// 							<li><a href="" rel="5a433f"></a></li>
// 						</ul>
// 					</div>
// 					<div class="widget-title">
// 						<i class="fa fa-thumbs-up"></i> Bestseller
// 					</div>
// 					<div class="widget-block">
// 						<div class="row">
// 							<div class="col-md-4">
// 								<img class="img-responsive" src="http://placehold.it/400x500.jpg" alt="" title="">   
// 							</div>
// 							<div class="col-md-8">
// 								<div class="block-name">
// 									<a href="#" class="product-name">Product name</a>
// 									<p class="product-price"><span>$330</span> $320.99</p>

// 								</div>
// 								<div class="product-rating">
// 									<div class="stars">
// 										<span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
// 									</div>
// 									<a href="" class="review">8 Reviews</a>
// 								</div>
// 								<p class="description">Lorem ipsum dolor.</p>
// 							</div>
// 						</div>
// 					</div>
// 					<div class="widget-block">
// 						<div class="row">
// 							<div class="col-md-4">
// 								<img class="img-responsive" src="http://placehold.it/400x500" alt="" title="">   
// 							</div>
// 							<div class="col-md-8">
// 								<div class="block-name">
// 									<a href="#" class="product-name">Product name</a>
// 									<p class="product-price"><span>$330</span> $320.99</p>

// 								</div>
// 								<div class="product-rating">
// 									<div class="stars">
// 										<span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
// 									</div>
// 									<a href="" class="review">8 Reviews</a>
// 								</div>
// 								<p class="description">Lorem ipsum dolor.</p>
// 							</div>
// 						</div>
// 					</div>

// 				</div>

// 			</div>
// 		</div>  
// 	</div>
// </section> -->
//<?}

