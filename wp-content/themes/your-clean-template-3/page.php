<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); // подключаем header.php ?>
<?php 
	if(is_product_category($post)) {
		get_template_part('my_category'); // для отображения каждой записи берем шаблон loop.php 
		}
	else { ?>
		<section style="margin-top: 170px;">
			<div class="container">
				<div class="row">
						<div class="<?php content_class_by_sidebar(); // функция подставит класс в зависимости от того есть ли сайдбар, лежит в functions.php ?>">
							<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
									<h1><?php the_title(); // заголовок поста ?></h1>
									<h1><?php is_post_type_archive( 'product' )  ?></h1>
									<?php the_content(); // контент ?>
								</article>
							<?php endwhile; // конец цикла ?>
						</div>
					<?php get_sidebar(); // подключаем sidebar.php ?>
				</div>
			</div>
		</section>
<?php } get_footer(); // подключаем footer.php ?>