<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage your-clean-template-3
*/
?>
<?php get_header(); // подключаем header.php ?>
<section>
	<div class="second-page-container">
		<div class="container">
			<div class="row">

				<div class="col-md-9">
					<!-- <div class="block-breadcrumb">
						<ul class="breadcrumb">
							<li><a href="#">Home</a></li>
							<li><a href="#">Pages</a></li>
							<li class="active">Products grid</li>
						</ul>
					</div> -->

					<div class="header-for-light">
						<h1 class="wow fadeInRight animated" data-wow-duration="1s"><span><?php the_title() ?></h1>

					</div>
					<!-- <div class="block-products-modes color-scheme-2">
						<div class="row">
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="product-view-mode">
									<a href="products-grid.html" class="active"><i class="fa fa-th-large"></i></a>
									<a href="products-list.html"><i class="fa fa-th-list"></i></a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
								<div class="row">
									<div class="col-md-3 col-md-offset-1">
										<label class="pull-right">Sort by</label>
									</div>
									<div class="col-md-5">
										<select name="sort-type" class="form-control">
											<option value="position:asc">--</option>
											<option value="price:asc"	selected="selected">Price: Lowest first</option>
											<option value="price:desc">Price: Highest first</option>
											<option value="name:asc">Product Name: A to Z</option>
											<option value="name:desc">Product Name: Z to A</option>
											<option value="quantity:desc">In stock</option>
										</select>
									</div>
									<div class="col-md-3">
										<select name="products-per-page" class="form-control">
											<option value="10" selected="selected">10</option>
											<option value="20">20</option>
											<option value="30">30</option>
											<option value="100">100</option>
											<option value="all">All</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<div class="row">
						<?php
						global $post;
						// $category = get_queried_object()->term_id;
						$category = get_queried_object()->slug;
						$args	 = array(
						'post_type'		 => 'product',
						// 'posts_per_page' => 3,
						'product_cat'	 => $category,
						);
						$loop	 = new WP_Query( $args );

						while ( $loop->have_posts() ) : $loop->the_post();
						global $product;
							?>
							<div class="col-xs-12 col-sm-6 col-md-4 text-center mb-25">
							<article class="product light">								
								<figure class="figure-hover-overlay">																		
									<a href="#"	class="figure-href"></a>
									<!-- <div class="product-new">new</div>
									<div class="product-sale">7% <br> off</div> -->
									<!-- <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
									<a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a> -->
									<?php 
										$post_thumbnail_id = $product->get_image_id();
										$thumbnail_size = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
										$thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'full');
										echo '<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-overlay img-responsive" alt="" ></img>';	
										echo '<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-responsive" alt="" ></img>';	
										// $post_thumbnail_id = $product->get_image_id();
										// $thumbnail_size = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
										// $thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size);
										
										// echo '<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-overlay img-responsive" alt="" />';
										// echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );	
										// $html='<img src="http://placehold.it/400x500" class="img-responsive" alt="" ></img>';
										// echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );			
									?>
									<!-- <img src="http://placehold.it/400x500" class="img-overlay img-responsive" alt=""> -->
									<!-- <img src="http://placehold.it/400x500" class="img-responsive" alt=""> -->
								</figure>
								<div class="product-caption">
									<div class="block-name">
										<a href="<?php echo get_the_permalink(); ?>" class="product-name"><?php echo $product->name; ?></a>
										<?php 
										if (empty($product->sale_price))
											echo '<p class="product-price">₽'. $product->regular_price .'</p>';
										else
											echo '<p class="product-price"><span>₽'.$product->regular_price.'</span> ₽'.$product->sale_price.'</p>';
										?>

									</div>
									<div class="product-cart">
										
											<?php woocommerce_template_loop_add_to_cart(); ?>
										
										<!-- <a href=""><i class="fa fa-shopping-cart"></i> </a> -->
									</div>
									<!-- <div class="product-rating">
										<div class="stars">
											<span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
										</div>
										<a href="" class="review">8 Reviews</a>
									</div> -->
									<p class="description"><?php the_excerpt() ?></p>
								</div>
							</article> 
						</div>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
						<!-- <div class="col-xs-12 col-sm-6 col-md-4 text-center mb-25">
							<article class="product light">								
								<figure class="figure-hover-overlay">																		
									<a href="#"	class="figure-href"></a>
									<div class="product-new">new</div>
									<div class="product-sale">7% <br> off</div>
									<a href="#" class="product-compare"><i class="fa fa-random"></i></a>
									<a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
									<img src="http://placehold.it/400x500" class="img-overlay img-responsive" alt="">
									<img src="http://placehold.it/400x500" class="img-responsive" alt="">
								</figure>
								<div class="product-caption">
									<div class="block-name">
										<a href="#" class="product-name">Product name</a>
										<p class="product-price"><span>$330</span> $320.99</p>

									</div>
									<div class="product-cart">
										<a href="#"><i class="fa fa-shopping-cart"></i> </a>
									</div>
									<div class="product-rating">
										<div class="stars">
											<span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
										</div>
										<a href="" class="review">8 Reviews</a>
									</div>
									<p class="description">Lorem ipsum dolor sit amet, con sec tetur adipisicing elit, sed do eiusmod</p>
								</div>
							</article> 
						</div> -->
						
					</div>

				</div>
				<aside class="col-md-3">

					<div class="main-category-block ">
						<div class="main-category-title">
							<i class="fa fa-list"></i> Каталог

						</div>
					</div>
					<div class="widget-block">
						<?php
							$args = array(
								'taxonomy' => 'product_cat',
								'orderby'	=> 'count',
								'order'		=> 'DESC',
								'hide_empty' => false,
								'parent'	 => 0,
								'exclude' => 17,
							);

							$product_categories = get_terms( $args );

							$count = count($product_categories);
							if ( $count > 0 )
							{
								echo '<ul class="list-unstyled ul-side-category">';
								foreach ( $product_categories as $product_category )
								{
									$args = array(
										'taxonomy' => 'product_cat',
										'orderby'	=> 'count',
										'order'		=> 'DESC',
										'hide_empty' => false,
										'parent'	 => $product_category->term_id,
									);
									$product_sub_categories = get_terms( $args );
									$product_category_link = '';
									if (empty($product_sub_categories))
									{
										$product_category_link = get_term_link( $product_category );
									}
									echo '<li><a	href="'.$product_category_link.'"><i class="fa fa-angle-right"></i> '.$product_category->name . '</a>';
									if (!empty($product_sub_categories))
									{
										echo '<ul class="sub-category">';
										foreach ( $product_sub_categories as $product_sub_category )
										{
											echo '<li><a	href="' . get_term_link( $product_sub_category ) . '">'.$product_sub_category->name . '</a></li>';
										}
										echo "</ul>";
									}
									echo "</li>";
								}
								echo "</ul>";
							}
						?>
					</div>
					<div class="product light last-sale">
<!-- 						<figure class="figure-hover-overlay">																		
							<a href="#"	class="figure-href"></a>
							<div class="product-sale">Save <br> 7%</div>
							<div class="product-sale-time"><p class="time"></p></div>
							<a href="#" class="product-compare"><i class="fa fa-random"></i></a>
							<a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
							<img src="http://placehold.it/400x500" class="img-overlay img-responsive" alt="">
							<img src="http://placehold.it/400x500" class="img-responsive" alt="">
						</figure>
						<div class="product-caption">
							<div class="block-name">
								<a href="#" class="product-name">Product name</a>
								<p class="product-price"><span>$330</span> $320.99</p>

							</div>
							<div class="product-cart">
								<a href="#"><i class="fa fa-shopping-cart"></i> </a>
							</div>
						</div> -->
						<figure class="figure-hover-overlay">
							<!-- <a href="#"	class="figure-href"></a> -->
							<!-- <div class="product-sale-time"><p class="time"></p></div> -->
							<!-- <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a> -->
							<?php the_widget( 'berocket_products_of_day_widget'); ?>
						</figure>
					</div>
					<!-- <div class="widget-title">
						<i class="fa fa-money"></i> Price range

					</div>
					<div class="widget-block">
						<div class="row">
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="text" id="price-from" class="form-control" value="0">
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group">
									<span class="input-group-addon">$</span>
									<input type="text" id="price-to" class="form-control" value="500">
								</div>
							</div>
						</div> 
					</div>
					<div class="widget-title">
						<i class="fa fa-dashboard"></i> Colors

					</div>
					<div class="widget-block">
						<ul class="colors clearfix list-unstyled">
							<li><a href="" rel="003d71"></a></li>
							<li><a href="" rel="c42c39"></a></li>
							<li><a href="" rel="f4bc08"></a></li>
							<li><a href="" rel="02882c"></a></li>
							<li><a href="" rel="000000"></a></li>
							<li><a href="" rel="caccce"></a></li>
							<li><a href="" rel="ffffff"></a></li>
							<li><a href="" rel="f9e7b6"></a></li>
							<li><a href="" rel="ef8a07"></a></li>
							<li><a href="" rel="5a433f"></a></li>
						</ul>
					</div> -->
					<div class="widget-title">
						<i class="fa fa-thumbs-up"></i> Бестселлеры
					</div>
					<?php

						$args	 = array(
							'post_type'		 => 'product',
							'posts_per_page' => 2,
							'product_cat'	 => $term_slug,
							
							'tax_query'		 => array(
								array(
									'taxonomy'	 => 'product_visibility',
									'field'		 => 'name',
									'terms'		 => 'exclude-from-catalog',
									'operator'	 => 'NOT IN',
								),
							),
						);
						$loop	 = new WP_Query( $args );

						while ( $loop->have_posts() ) : $loop->the_post();
							global $product;
							//новинки
							if( has_term(85 , 'product_tag') ){
					?>
					<div class="widget-block">
						<div class="row">
							<div class="col-md-4">
								<?php 
										$post_thumbnail_id = $product->get_image_id();
										 $thumbnail_size = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
										$thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
										$html='<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-responsive" alt="" ></img>';
										echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );		
									?>
								<!-- <img class="img-responsive" src="http://placehold.it/400x500.jpg" alt="" title="">	  -->
							</div>
							<div class="col-md-8">
								<div class="block-name">
									<a href="<?php echo get_the_permalink(); ?>" class="product-name"><?php echo $product->name; ?></a>
									<p class="product-price"><span>₽<?php echo $product->regular_price; ?></span> ₽<?php echo $product->regular_price; ?></p>
								</div>
								<div class="product-rating">
									<div class="stars">
										<span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
									</div>
									<a href="" class="review">8 Reviews</a>
								</div>
								<p class="description"><?php echo $product->description; ?></p>
							</div>
						</div>
					</div>
					<?php }; ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
<!-- 					<div class="widget-block">
						<div class="row">
							<div class="col-md-4 col-sm-2 col-xs-3">
								<img class="img-responsive" src="http://placehold.it/400x500.jpg" alt="" title="">	 
							</div>
							<div class="col-md-8	col-sm-10 col-xs-9">
								<div class="block-name">
									<a href="#" class="product-name">Product name</a>
									<p class="product-price"><span>$330</span> $320.99</p>

								</div>
								<div class="product-rating">
									<div class="stars">
										<span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
									</div>
									<a href="" class="review hidden-md">8 Reviews</a>
								</div>
								<p class="description">Lorem ipsum dolor sit amet, con sec tetur adipisicing elit.</p>
							</div>
						</div>
					</div> -->
				</aside>

			</div>
		</div>	
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>