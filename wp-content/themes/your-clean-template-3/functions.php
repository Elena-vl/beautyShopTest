<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */

/*Подключение CSS-стилей*/
function add_styles() {
	wp_register_style('animate', get_template_directory_uri().'/css/animate.css');
	wp_enqueue_style('animate');
	wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('bootstrap');
	wp_register_style('bootstrap.min', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap.min');
	wp_register_style('dark-version', get_template_directory_uri().'/css/dark-version.css');
	wp_enqueue_style('dark-version');
	wp_register_style('elusive-webfont', get_template_directory_uri().'/css/elusive-webfont.css');
	wp_enqueue_style('elusive-webfont');
	wp_register_style('font-awesome', get_template_directory_uri().'/css/font-awesome.css');
	wp_enqueue_style('font-awesome');
	wp_register_style('ie.style', get_template_directory_uri().'/css/ie.style.css');
	wp_enqueue_style('ie.style');
	wp_register_style('lightbox', get_template_directory_uri().'/css/lightbox.css');
	wp_enqueue_style('lightbox');
	wp_register_style('main', get_template_directory_uri().'/css/main.css');
	wp_enqueue_style('main');
	wp_register_style('owl.carousel', get_template_directory_uri().'/css/owl.carousel.css');
	wp_enqueue_style('owl.carousel');
	wp_register_style('responsive-adjustments', get_template_directory_uri().'/css/responsive-adjustments.css');
	wp_enqueue_style('responsive-adjustments');
	wp_register_style('responsiveslides', get_template_directory_uri().'/css/responsiveslides.css');
	wp_enqueue_style('responsiveslides');
	wp_register_style('revolution-settings', get_template_directory_uri().'/css/revolution-settings.css');
	wp_enqueue_style('revolution-settings');
	wp_register_style('theme-style', get_template_directory_uri().'/css/theme-style.css');
	wp_enqueue_style('theme-style');
	wp_register_style('yamm', get_template_directory_uri().'/css/yamm.css');
	wp_enqueue_style('yamm');
}
/*Подключение JS-скриптов*/
function add_scripts() {
	// 0
	wp_deregister_script('jquery'); // выключаем стандартный jquery
	wp_enqueue_script('jquery','http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js','','',true); // добавляем свой
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js','','',true); // бутстрап
	wp_enqueue_script('main', get_template_directory_uri().'/js/main.js','','',true); // и скрипты шаблона


	wp_enqueue_script('less', get_template_directory_uri().'/js/vendor/less.js','','',true);
	wp_enqueue_script('less-1.3.3', get_template_directory_uri().'/js/vendor/less-1.3.3.js','','',true);

	wp_enqueue_script('lightbox', get_template_directory_uri().'/js/vendor/lightbox.js','','',true);
	wp_enqueue_script('modernizr', get_template_directory_uri().'/js/vendor/modernizr.js','','',true);
	wp_enqueue_script('tab', get_template_directory_uri().'/js/vendor/tab.js','','',true);
	wp_enqueue_script('carousel', get_template_directory_uri().'/js/vendor/carousel.js','','',true);

	// 1
	wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery.js','','',true);
	wp_enqueue_script('jquery.easing.1.3', get_template_directory_uri().'/js/vendor/jquery.easing.1.3.js','','',true);
	wp_enqueue_script('bootstrap.min', get_template_directory_uri().'/js/bootstrap.js','','',true);
	// 2
	wp_enqueue_script('jquery.flexisel', get_template_directory_uri().'/js/vendor/jquery.flexisel.js','','',true);
	wp_enqueue_script('wow.min', get_template_directory_uri().'/js/vendor/wow.min.js','','',true);
	wp_enqueue_script('jquery.transit', get_template_directory_uri().'/js/vendor/jquery.transit.js','','',true);
	wp_enqueue_script('jquery.jcountdown', get_template_directory_uri().'/js/vendor/jquery.jcountdown.js','','',true);
	wp_enqueue_script('jquery.jPages', get_template_directory_uri().'/js/vendor/jquery.jPages.js','','',true);
	wp_enqueue_script('owl.carousel', get_template_directory_uri().'/js/vendor/owl.carousel.js','','',true);
	wp_enqueue_script('owlCarousel', get_template_directory_uri().'/js/vendor/owl.carousel.js','','',true);
	// 3
	wp_enqueue_script('responsiveslides.min', get_template_directory_uri().'/js/vendor/responsiveslides.min.js','','',true);
	wp_enqueue_script('jquery.elevateZoom-3.0.8.min', get_template_directory_uri().'/js/vendor/jquery.elevateZoom-3.0.8.min.js','','',true);
	// 4

	// jQuery REVOLUTION Slider
	wp_enqueue_script('jquery.themepunch.plugins.min', get_template_directory_uri().'/js/vendor/jquery.themepunch.plugins.min.js','','',true);
	wp_enqueue_script('jquery.themepunch.revolution.min', get_template_directory_uri().'/js/vendor/jquery.themepunch.revolution.min.js','','',true);
	wp_enqueue_script('jquery.scrollTo-1.4.2-min', get_template_directory_uri().'/js/vendor/jquery.scrollTo-1.4.2-min.js');
	//  Custome Slider 
	wp_enqueue_script('main', get_template_directory_uri().'/js/main.js','','',true); // и скрипты шаблона
}


add_theme_support('title-tag'); // теперь тайтл управляется самим вп

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
	    // wp_deregister_script('jquery'); // выключаем стандартный jquery
	    // wp_enqueue_script('jquery','//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js','','',true); // добавляем свой
	    // wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js','','',true); // бутстрап
	    // wp_enqueue_script('main', get_template_directory_uri().'/js/main.js','','',true); // и скрипты шаблона
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