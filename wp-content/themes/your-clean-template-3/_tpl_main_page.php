<?php
/*
Template Name: Main Page
*/
?>
<?php get_header(); // подключаем header.php ?>
		<section>
			<div class="revolution-container">
				<div class="revolution">
					<ul class="list-unstyled">	<!-- SLIDE	-->
						<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
							<!-- MAIN IMAGE -->
							<img src="<?php echo carbon_get_theme_option( 'header_slider_slide_1_background' ); ?>"	alt="slidebg1"	data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
							<!-- LAYERS -->
							<div class="tp-caption skewfromrightshort customout"
								 data-x="20"
								 data-y="160"
								 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								 data-speed="500"
								 data-start="300"
								 data-easing="Power4.easeOut"
								 data-endspeed="500"
								 data-endeasing="Power4.easeIn"
								 data-captionhidden="on"
								 style="z-index: 4">
								<img src="<?php echo carbon_get_theme_option( 'header_slider_slide_1_label_1' ); ?>" alt="">
							</div>
							<div class="tp-caption skewfromrightshort customout"
								 data-x="20"
								 data-y="224"
								 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								 data-speed="500"
								 data-start="500"
								 data-easing="Power4.easeOut"
								 data-endspeed="500"
								 data-endeasing="Power4.easeIn"
								 data-captionhidden="on"
								 style="z-index: 4">
								<img src="<?php echo carbon_get_theme_option( 'header_slider_slide_1_label_2' ); ?>" alt="">
							</div>
							<div class="tp-caption skewfromrightshort customout"
								 data-x="20"
								 data-y="335"
								 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								 data-speed="500"
								 data-start="700"
								 data-easing="Power4.easeOut"
								 data-endspeed="500"
								 data-endeasing="Power4.easeIn"
								 data-captionhidden="on"
								 style="z-index: 4">
								<img src="<?php echo carbon_get_theme_option( 'header_slider_slide_1_label_3' ); ?>" alt="">
							</div>
							<!-- <div class="tp-caption customin customout hidden-xs"
								 data-x="20"
								 data-y="430"
								 data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
								 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								 data-speed="500"
								 data-start="1000"
								 data-easing="Power4.easeOut"
								 data-endspeed="500"
								 data-endeasing="Power4.easeIn"
								 data-captionhidden="on"
								 style="z-index: 2">
								<a href="#" class="btn-home">Каталог</a>
							</div> -->
							<!-- <div class="tp-caption customin customout hidden-xs"
								 data-x="145"
								 data-y="430"
								 data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
								 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								 data-speed="500"
								 data-start="1200"
								 data-easing="Power4.easeOut"
								 data-endspeed="500"
								 data-endeasing="Power4.easeIn"
								 data-captionhidden="on"
								 style="z-index: 2">
								<a href="#" class="btn-home">О магазине</a>
							</div> -->
						</li>
						<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
							<!-- MAIN IMAGE -->
							<img src="<?php echo carbon_get_theme_option( 'header_slider_slide_2_background' ); ?>"	alt="slidebg1"	data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
							<!-- LAYERS -->
							<div class="tp-caption skewfromrightshort customout"
								 data-x="20"
								 data-y="160"
								 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								 data-speed="500"
								 data-start="300"
								 data-easing="Power4.easeOut"
								 data-endspeed="500"
								 data-endeasing="Power4.easeIn"
								 data-captionhidden="on"
								 style="z-index: 4">
								<img src="<?php echo carbon_get_theme_option( 'header_slider_slide_2_label_1' ); ?>" alt="">
							</div>
							<div class="tp-caption skewfromrightshort customout"
								 data-x="20"
								 data-y="224"
								 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								 data-speed="500"
								 data-start="500"
								 data-easing="Power4.easeOut"
								 data-endspeed="500"
								 data-endeasing="Power4.easeIn"
								 data-captionhidden="on"
								 style="z-index: 4">
								<img src="<?php echo carbon_get_theme_option( 'header_slider_slide_2_label_2' ); ?>" alt="">
							</div>
							<div class="tp-caption skewfromrightshort customout"
								 data-x="20"
								 data-y="335"
								 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								 data-speed="500"
								 data-start="700"
								 data-easing="Power4.easeOut"
								 data-endspeed="500"
								 data-endeasing="Power4.easeIn"
								 data-captionhidden="on"
								 style="z-index: 4">
								<img src="<?php echo carbon_get_theme_option( 'header_slider_slide_2_label_3' ); ?>" alt="">
							</div>
							<!-- <div class="tp-caption customin customout hidden-xs"
								 data-x="20"
								 data-y="430"
								 data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
								 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								 data-speed="500"
								 data-start="1000"
								 data-easing="Power4.easeOut"
								 data-endspeed="500"
								 data-endeasing="Power4.easeIn"
								 data-captionhidden="on"
								 style="z-index: 2">
								<a href="#" class="btn-home">Каталог</a>
							</div> -->
							<!-- <div class="tp-caption customin customout hidden-xs"
								 data-x="145"
								 data-y="430"
								 data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
								 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								 data-speed="500"
								 data-start="1200"
								 data-easing="Power4.easeOut"
								 data-endspeed="500"
								 data-endeasing="Power4.easeIn"
								 data-captionhidden="on"
								 style="z-index: 2">
								<a href="#" class="btn-home">О магазине</a>
							</div> -->
						</li>
						<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
							<!-- MAIN IMAGE -->
							<img src="<?php echo carbon_get_theme_option( 'header_slider_slide_3_background' ); ?>"	alt="slidebg2"	data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
							<!-- LAYERS -->
							<div class="tp-caption skewfromrightshort customout"
								 data-x="20"
								 data-y="160"
								 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								 data-speed="500"
								 data-start="300"
								 data-easing="Power4.easeOut"
								 data-endspeed="500"
								 data-endeasing="Power4.easeIn"
								 data-captionhidden="on"
								 style="z-index: 4">
								<img src="<?php echo carbon_get_theme_option( 'header_slider_slide_3_label_1' ); ?>" alt="">
							</div>
							<div class="tp-caption skewfromrightshort customout"
								 data-x="20"
								 data-y="224"
								 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								 data-speed="500"
								 data-start="500"
								 data-easing="Power4.easeOut"
								 data-endspeed="500"
								 data-endeasing="Power4.easeIn"
								 data-captionhidden="on"
								 style="z-index: 4">
								<img src="<?php echo carbon_get_theme_option( 'header_slider_slide_3_label_2' ); ?>" alt="">
							</div>
							<div class="tp-caption skewfromrightshort customout"
								 data-x="20"
								 data-y="335"
								 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								 data-speed="500"
								 data-start="700"
								 data-easing="Power4.easeOut"
								 data-endspeed="500"
								 data-endeasing="Power4.easeIn"
								 data-captionhidden="on"
								 style="z-index: 4">
								<img src="<?php echo carbon_get_theme_option( 'header_slider_slide_3_label_3' ); ?>" alt="">
							</div>
						</li>
					</ul>
					<div class="revolutiontimer"></div>
				</div>
			</div>
		</section>

		<section>
			<div>
				<div class="container">
					<div class="row">
						<aside class="col-md-3">
							<!-- вывод категорий -->
							<div class="main-category-block ">
								<div class="main-category-title">
									<i class="fa fa-list"></i> Каталог
								</div>
								<div class="main-category-items">
									<div class="widget-block">
										
										<?php								
											$args = array(
												'taxonomy' => 'product_cat',
												'orderby'	=> 'count',
												'order'		=> 'DESC',
												'hide_empty' => false,
												'parent'	 => 0,
												'exclude' => array(17,88),
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
															echo '<li><a href="' . get_term_link( $product_sub_category ) . '">'.$product_sub_category->name . '</a></li>';
														}
														echo "</ul>";
													}
													echo "</li>";
												}
												echo "</ul>";
											}
										?>
									</div>
								</div>
							</div>

							<article class="product light last-sale">
								<figure class="figure-hover-overlay">
									<?php the_widget( 'berocket_products_of_day_widget'); ?>
								</figure>
							</article>

							<div class="widget-title">
								<i class="fa fa-thumbs-up"></i> Хиты продаж
							</div>
								<?php

									$args	 = array(
										'post_type'		 => 'product',
										'posts_per_page' => 3,
										'product_cat'	 => $term_slug,
										
										'tax_query'		 => array(
											array(
												'taxonomy'	 => 'product_visibility',
												'field'		 => 'name',
												'terms'		 => 'exclude-from-catalog',
												'operator'	 => 'NOT IN',
												// 'product_tag' => $term,
											),
										),
									);
									$loop	 = new WP_Query( $args );

									while ( $loop->have_posts() ) : $loop->the_post();
										global $product;
										//Хиты продаж
										if( has_term(24 , 'product_tag') ){
								?>
								<div class="widget-block">
									<div class="row">
										<div class="col-md-4 col-sm-2 col-xs-3">
										<?php 
											$post_thumbnail_id = $product->get_image_id();
											$thumbnail_size = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
											$thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
											echo '<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-responsive" alt="" ></img>';											
										?>
											<!-- <img class="img-responsive" src="http://placehold.it/400x500" alt="" title="">	  -->
										</div>
										<div class="col-md-8 col-sm-10 col-xs-9">
											<div class="block-name">
												<a href="<?php echo get_the_permalink() ?>" class="product-name"><?php echo $product->name; ?></a>
												<?php 
												if (empty($product->sale_price))
													echo '<p class="product-price">₽'. $product->regular_price .'</p>';
												else
													echo '<p class="product-price"><span>₽'.$product->regular_price.'</span> ₽'.$product->sale_price.'</p>';
												?>
											</div>
											<!-- <div class="product-rating">
												<div class="stars">
													<span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
												</div>
												<a href="" class="review hidden-md">8 голосов</a>
											</div> -->
											<p class="description"><?php echo $product->product_cat_details; ?></p>
										</div>
									</div>
								</div>
								<?php }; ?>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<div class="widget-title">
								<i class="fa fa-comments"></i> Последние новости
							</div>
							<?php
								if ( have_posts() ) :
								query_posts('cat=3');
								while (have_posts()) : the_post();
							?>							
							<div class="widget-block">
								<div class="row">
									<div class="col-md-4	col-sm-2 col-xs-4">
										<img class="img-responsive" src="<?php the_post_thumbnail_url();?>" alt="" title="">	 
									</div>
									<div class="col-md-8	col-sm-10 col-xs-8">
										<div class="block-name">
											<a href="<?php echo get_the_permalink() ?>" class="product-name"><?php the_title(); ?></a>
										</div>
										<p class="description">
											<?php the_content(); ?>
										</p>
									</div>
								</div>
							</div>
							<?php
								endwhile;
								endif;
								wp_reset_query();
							?>
						</aside>
						<div class="col-md-9">
							<div class="banner">
								<!-- <a href="#"> -->
									<img src="<?php echo carbon_get_theme_option( 'horizontal_banner_after_slider' ); ?>" class="img-responsive" alt="">
								<!-- </a>  -->
							</div>
							<div class="block-product-tab">
								<div class="tab-bg"></div>
								<div class="toolbar-for-light" id="nav-tabs2">
									<a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
									<a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
								</div>	
								<ul class="nav nav-pills">
									<li class="active"><a href="#new" data-toggle="tab">Новинки</a><div class="header-bottom-line"></div></li>
									<li><a href="#featured" data-toggle="tab" class="disabled">Избранные товары</a><div class="header-bottom-line"></div></li>
								</ul>

								<div class="tab-content">
									<!-- новинки -->
									<div class="tab-pane active animated fadeIn" id="new">
										<div id="owl-new2"	class="owl-carousel">

											<?php

												$args	 = array(
													'post_type'		 => 'product',
													// 'posts_per_page' => 3,
													// 'product_cat'	 => $term_slug,
													
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
													if( has_term(21 , 'product_tag') ){
											?>

											<div class="text-center">
												<div class="product light">
													<figure class="figure-hover-overlay">			
														<a href="#"	class="figure-href"></a>
														<!-- <div class="product-sale">11% <br> off</div> -->
														<!-- <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
														<a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a> -->
														<?php 
															$post_thumbnail_id = $product->get_image_id();
															$thumbnail_size = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
															$thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'full');
															echo '<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-overlay img-responsive" alt="" ></img>';	
															echo '<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-responsive" alt="" ></img>';							
														?>
														<!-- <img src="http://placehold.it/400x500" class="img-overlay img-responsive" alt="">
														<img src="http://placehold.it/400x500" class="img-responsive" alt=""> -->
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
														</div>
													</div>
												</div>
											</div>
											<?php }; ?>
											<?php endwhile; ?>
											<?php wp_reset_postdata(); ?>
										</div>
									</div>

									<!-- Избранное -->
									<div class="tab-pane animated fadeIn" id="featured">
										<div id="owl-featured2"	class="owl-carousel">
											<?php
											$args	 = array(
												'post_type'		 => 'product',
												// 'posts_per_page' => 3,
												// 'product_cat'	 => $term_slug,
												
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
												//избранные
												if( has_term(42 , 'product_tag') ){
											?>
											<div class="text-center">
												<div class="product light">
													<figure class="figure-hover-overlay">			
														<a href="#"	class="figure-href"></a>
														<!-- <div class="product-new">new</div> -->
														<!-- <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
														<a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a> -->
														<?php 
															$post_thumbnail_id = $product->get_image_id();
															$thumbnail_size = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
															$thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'full');
															echo '<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-overlay img-responsive" alt="" ></img>';	
															echo '<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-responsive" alt="" ></img>';							
														?>
														<!-- <img src="http://placehold.it/400x500" class="img-overlay img-responsive" alt="">
														<img src="http://placehold.it/400x500" class="img-responsive" alt=""> -->
													</figure>
													<div class="product-caption">
														<div class="block-name">
															<a href="<?php echo get_the_permalink() ?>" class="product-name"><?php echo $product->name; ?></a>
															<?php 
															if (empty($product->sale_price))
																echo '<p class="product-price">₽'. $product->regular_price .'</p>';
															else
																echo '<p class="product-price"><span>₽'.$product->regular_price.'</span> ₽'.$product->sale_price.'</p>';
															?>
														</div>
														<div class="product-cart">
															<!-- <a href="#"><i class="fa fa-shopping-cart"></i> </a> -->
															<?php woocommerce_template_loop_add_to_cart(); ?>
														</div>
													</div>
												</div>
											</div>
											<?php }; ?>
											<?php endwhile; ?>
											<?php wp_reset_postdata(); ?>							
										</div>
									</div>
								</div>				 
							</div>
							
							<!-- Эксклюзивно -->
							<div class="row">				
								<!-- <div class="header-with-icon">
									<i class="fa fa-tags"></i> Эксклюзивно в БЬЮТИ-ШОП.РФ
									<div class="toolbar-for-light" id="nav-summer-sale">
										<a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
										<a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
									</div>
								</div> -->
								<div id="owl-summer-sale" class="owl-carousel">
									<?php
										$args	 = array(
											'post_type'		 => 'product',
											// 'posts_per_page' => 3,
											// 'product_cat'	 => $term_slug,
											
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
											//эксклюзив
											if( has_term(23 , 'product_tag') ){
									?>
										<div class="text-center">
											<article class="product light wow fadeInUp">
												<figure class="figure-hover-overlay">			
													<a href="#"	class="figure-href"></a>
													<!-- <div class="product-new">new</div> -->
													<!-- <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
													<a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a> -->
													<?php 
														$post_thumbnail_id = $product->get_image_id();
														$thumbnail_size = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
														$thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'full');
														echo '<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-overlay img-responsive" alt="" ></img>';	
														echo '<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-responsive" alt="" ></img>';							
													?>
													<!-- <img src="http://placehold.it/400x500" class="img-overlay img-responsive" alt="">
													<img src="http://placehold.it/400x500" class="img-responsive" alt=""> -->
												</figure>
												<div class="product-caption">
													<div class="block-name">
														<a href="<?php echo get_the_permalink() ?>" class="product-name"><?php echo $product->name; ?></a>
														<?php 
														if (empty($product->sale_price))
															echo '<p class="product-price">₽'. $product->regular_price .'</p>';
														else
															echo '<p class="product-price"><span>₽'.$product->regular_price.'</span> ₽'.$product->sale_price.'</p>';
														?>
													</div>
													<div class="product-cart">
														<!-- <a href="#"><i class="fa fa-shopping-cart"></i> </a> -->
														<?php woocommerce_template_loop_add_to_cart(); ?>
													</div>
												</div>
											</article>
										</div>
									<?php }; ?>
									<?php endwhile; ?>
									<?php wp_reset_postdata(); ?>
								</div>
							</div>
							<!-- Отзывы покупателей -->
							<div class="block">
								<div class="header-for-light">
									<h4 class="wow fadeInRight animated" data-wow-duration="1s">Отзывы <span>покупателей</span></h4>
								</div>
								<ul class="media-list list-unstyled">
									<?php
										comments_template('', true);
									?>
								 </ul>
									<!-- <form method="post" action="#">
										<div class="row">
											<div class="col-md-12">
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<div>
														<textarea class="form-control" id="inputText"></textarea>
													</div>
												</div>
											</div>
										</div>
										<hr>
										<input type="submit" class="btn-default-1" value="Отправить">
									</form> -->
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</section>
		
		<section class="partners">
			<div class="block color-scheme-dark-90">
				<div class="container">
					<div class="header-for-dark">
						<h1 class="wow fadeInRight animated" data-wow-duration="2s">Известные <span>бренды</span></h1>
					</div>
					<div id="owl-partners"	class="owl-carousel">
						<?php
									$args = array(
										'taxonomy' => 'product_cat',
										'orderby'	=> 'count',
										'order'		=> 'DESC',
										'hide_empty' => false,
										'parent'	 => 88,
									);
									$product_sub_categories = get_terms( $args );
									$product_category_link = '';

									if (!empty($product_sub_categories))
									{
										foreach ( $product_sub_categories as $product_sub_category )
										{
											global $wp_query;
										    $thumbnail_id = get_woocommerce_term_meta( $product_sub_category->term_id, 'thumbnail_id', true ); 
										    $thumbnail_size = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
										    $image = wp_get_attachment_image_src( $thumbnail_id, $thumbnail_size );; 
										    echo '<div class="partner"><a href="' . get_term_link( $product_sub_category ) . '"><img src="' . $image[0] . '" class="img-responsive" alt="" ></a></div>';

										}
									}

						?>
					<!-- 	<div class="partner">
							<img src="<?php get_template_directory_uri() ?>/img/preview/logo1.png" class="img-responsive" alt="">
						</div>
						<div class="partner">
							<img src="<?php get_template_directory_uri() ?>/img/preview/logo2.png" class="img-responsive"	alt="">
						</div>
						<div class="partner">
							<img src="<?php get_template_directory_uri() ?>/img/preview/logo3.png" class="img-responsive"	alt="">
						</div>
						<div class="partner">
							<img src="<?php get_template_directory_uri() ?>/img/preview/logo4.png" class="img-responsive"	alt="">
						</div>
						<div class="partner">
							<img src="<?php get_template_directory_uri() ?>/img/preview/logo5.png" class="img-responsive"	alt="">
						</div>
						<div class="partner">
							<img src="<?php get_template_directory_uri() ?>/img/preview/logo6.png" class="img-responsive"	alt="">
						</div>
						<div class="partner">
							<img src="<?php get_template_directory_uri() ?>/img/preview/logo7.png" class="img-responsive"	alt="">
						</div> -->
					</div>
				</div>
			</div>
		</section>
		
		<section>
			<div class="block">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<article class="payment-service">
								<!-- <a href="#"></a> -->
								<div class="row">
									<div class="col-md-4 text-center">
										<i class="fa <?php echo carbon_get_theme_option( 'feature_1_icon' ); ?>"></i>
									</div>
									<div class="col-md-8">
										<h3 class="color-active"><?php echo carbon_get_theme_option( 'feature_1_title' ); ?></h3>
										<p><?php echo carbon_get_theme_option( 'feature_1_subtitle' ); ?></p>
									</div>
								</div>
							</article>
						</div>
						<div class="col-md-4">
							<article class="payment-service">
								<!-- <a href="#"></a> -->
								<div class="row">
									<div class="col-md-4 text-center">
										<i class="fa <?php echo carbon_get_theme_option( 'feature_2_icon' ); ?>"></i>
									</div>
									<div class="col-md-8">
										<h3 class="color-active"><?php echo carbon_get_theme_option( 'feature_2_title' ); ?></h3>
										<p><?php echo carbon_get_theme_option( 'feature_2_subtitle' ); ?></p>
									</div>
								</div>
							</article>
						</div>
						<div class="col-md-4">
							<article class="payment-service">
								<!-- <a href="#"></a> -->
								<div class="row">
									<div class="col-md-4 text-center">
										<i class="fa <?php echo carbon_get_theme_option( 'feature_3_icon' ); ?>"></i>
									</div>
									<div class="col-md-8">
										<h3 class="color-active"><?php echo carbon_get_theme_option( 'feature_3_title' ); ?></h3>
										<p><?php echo carbon_get_theme_option( 'feature_3_subtitle' ); ?></p>
									</div>
								</div>
							</article>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php get_footer(); // подключаем footer.php ?>