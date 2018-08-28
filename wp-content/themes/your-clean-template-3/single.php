<?php
/*
Template Name: Product Detail
*/
?>
<?php get_header(); // подключаем header.php ?>
<section>
	<div class="second-page-container">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
<!-- 					<div class="block-breadcrumb">
						<ul class="breadcrumb">
							<li><a href="#">Home</a></li>
							<li><a href="#">Shirts</a></li>
							<li class="active">Lolo</li>
						</ul>
					</div> -->

					<div class="header-for-light">
						<h1 class="wow fadeInRight animated" data-wow-duration="1s"><span><?php the_title() ?></span> </h1>

					</div>

					<div class="block-product-detail">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="product-image">
									<?php 
									global $product;
									$product_id = get_the_ID();
									$product = wc_get_product( $product_id );

									// $post_thumbnail_id = $product->get_image_id();
									// $thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'full');
									
									// $html='<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-overlay img-responsive" alt="" ></img>';
									// echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );	
									$post_thumbnail_id = $product->get_image_id();
									 $thumbnail_size = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
									$thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id,'full' );
									$html='<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-responsive" alt="" ></img>';
									echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );	

									?>
<!-- 									<img id="product-zoom"	src='img/preview/product/small/product2.jpg' data-zoom-image="img/preview/product/large/product2.jpg" alt=""> -->
									<div id="gal1">

										<a href="javascript:;" data-image="img/preview/product/small/product1.jpg" data-zoom-image="img/preview/product/large/product1.jpg">
											<img id="img_01" src="img/preview/product/thumb/product1.jpg" alt="">
										</a>

										<a href="javascript:;" data-image="img/preview/product/small/product2.jpg" data-zoom-image="img/preview/product/large/product2.jpg">
											<img id="img_01" src="img/preview/product/thumb/product2.jpg"	alt="">
										</a>

										<a href="javascript:;"	data-image="img/preview/product/small/product3.jpg" data-zoom-image="img/preview/product/large/product3.jpg">
											<img id="img_01" src="img/preview/product/thumb/product3.jpg" />
										</a>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">


								<div class="product-detail-section">
									<h3><span><?php the_title() ?></h3>
									<div class="product-rating">
										<div class="stars">
											<span class="star"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
										</div>
										<a href="" class="review">150 Reviews</a> 
									</div>

									<div class="product-information">
										<div class="clearfix"> 
											<label class="pull-left">Бренд:</label> <a href="#">
											<?php 
											$values = get_the_terms($product_id , 'pa_brand');
											if (empty($values))
												echo "—";
											else 
												foreach ( $values as $value ) 
													echo $value->name; 	
											?>
											</a><br>
										</div>
										<div class="clearfix"> 
											<label class="pull-left">Коллекция:</label> 
											<?php 
												$values = get_the_terms($product_id , 'pa_collection');
												if (empty($values))
												echo "—";
												else 
													foreach ( $values as $value ) 
														echo $value->name; 
											?>
										</div>
										<div class="clearfix"> 
											<label class="pull-left">Артикул:</label>
											<?php 
												echo 'ID ' . $product->get_sku();
											?>
										</div>
										<div class="clearfix">
											<label class="pull-left">Размер:</label>
											<select name="size" class="form-control">
												<option value="" selected="selected">...</option>
												<?php 
													$product_id = get_the_ID();
													$values = get_the_terms( $product_id, 'pa_size');
													if (empty($values))
														echo "—";
													else
														foreach ( $values as $value ) { ?>
															<option value="1"><?php	echo $value->name; ?></option>				
													<?php }
												 ?>
												<!-- <option value="1">L</option>
												<option value="2">XL</option>
												<option value="3">XLL</option> -->
											</select>
										</div>
										<div class="clearfix">
											<label class="pull-left">В запасе:</label>
											<!-- <p>150 in stock</p> -->
											<p>
												<?php 
												$chistovar = $product->get_stock_quantity();
												if ($chistovar==0) {
												echo 'Нет в наличии';}
												else {
													echo ($chistovar) . ' в наличии';}
												 ?>
											</p>
										</div>
										<div class="clearfix">
											<label class="pull-left">Краткое описание:</label>
											<p class="description"><?php the_excerpt() ?></p>
										</div>
										<div class="clearfix">
											<label class="pull-left">Цена:</label>
											<p class="product-price"><span>₽<?php echo $product->regular_price; ?></span> ₽<?php echo $product->sale_price; ?></p>
										</div>
										<!-- <div class="clearfix">
											<label class="pull-left">Quantity:</label>
											<input type="number" class="form-control">
										</div> -->
										<div class="clearfix">
											<label class="pull-left">Total:</label>
											<p class="product-price">$850</p>
										</div>
										<div class="shopping-cart-buttons">
<!-- 											<form class="cart" method="post" enctype='multipart/form-data'>
											<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
											 	<label class="pull-left">Количество:</label>
												<?php if ( ! $product->is_sold_individually() )
													 woocommerce_quantity_input( array(
														'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
														'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
													 ) );
												 ?>
												<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
											 
												<a type="submit" class="shoping">
												 	<i class="fa fa-shopping-cart">&nbsp; В корзину</i>
												</a>
												<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
												<a href="#" title="Wishlist"><i class="fa fa-heart-o"></i></a>
												<a href="#" title="Compare"><i class="fa fa-random"></i></a>
											</form> -->
											<?php 
											if ( ! $product->is_purchasable() ) {
													return;
											}

											echo wc_get_stock_html( $product ); // WPCS: XSS ok.

											if ( $product->is_in_stock() ) : ?>

												<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

												<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
													<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

													<?php
													do_action( 'woocommerce_before_add_to_cart_quantity' );

													woocommerce_quantity_input( array(
														'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
														'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
														'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
													) );

													do_action( 'woocommerce_after_add_to_cart_quantity' );
													?>

													<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt ajax_add_to_cart"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

													<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
												</form>			

												<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

											<?php endif; ?>		
												<a href="#" title="Wishlist"><i class="fa fa-heart-o"></i></a>
												<a href="#" title="Compare"><i class="fa fa-random"></i></a>
											</form>

											<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
											<!-- <a href="#" class="shoping"><i class="fa fa-shopping-cart"></i>	Add to cart</a> -->
											<!-- <a href="#" title="Wishlist"><i class="fa fa-heart-o"></i></a>
											<a href="#" title="Compare"><i class="fa fa-random"></i></a> -->
										</div>



									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-border block-form">
						<!-- Nav tabs -->
						<ul class="nav nav-pills	nav-justified">
							<li class="active"><a href="#description" data-toggle="tab">Описание</a></li>
							<!-- <li><a href="#additional" data-toggle="tab" class="disabled">Дополнительно</a></li> -->
							<li><a href="#review" data-toggle="tab">Комментарий</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active" id="description">
								<br>
								<h3>Описание</h3>
								<hr>
								<p>
									<?php echo $product->description; ?>
								</p>
							</div>
							<div class="tab-pane" id="additional">
								<br>
								<div class="row">
									<div class="col-md-4">
										<h3>Размер:</h3>
										<hr>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
										</p>

									</div>
									<div class="col-md-4 block-color">
										<h3>Colors</h3>
										<hr>
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
											<li><a href="" rel="ff9bb5"></a></li>
											<li><a href="" rel="8c56a9"></a></li>
										</ul>

									</div>
									<div class="col-md-4">
										<h3>Other</h3>
										<hr>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit ollit anim id est laborum.
										</p>
									</div>
								</div>

							</div>
							<div class="tab-pane" id="review">
								<!-- <br> -->
								<!-- <div class="row">
									<div class="col-md-12">
										<h3>Clients review</h3>
										<hr>
										<div class="review-header">
											<h5>John Smith</h5>
											<div class="product-rating">
												<div class="stars">
													<span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
												</div>
											</div>
											<small class="text-muted">26/06/2014</small>
										</div>
										<div class="review-body">
											<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>

										</div>
										<hr>
										<div class="review-header">
											<h5>Tom Carry</h5>
											<div class="product-rating">
												<div class="stars">
													<span class="star"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
												</div>
											</div>
											<small class="text-muted">05/07/2014</small>
										</div>
										<div class="review-body">
											<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>

										</div>
										<hr>
									</div>
								</div> -->
								<form role="form" method="post" action="#">
									<!-- <div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="inputFirstName" class="control-label">First Name:<span class="text-error">*</span></label>
												<div>
													<input type="text" class="form-control" id="inputFirstName">
												</div>
											</div>


										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="inputCompany" class="control-label">Company:</label>
												<div>
													<input type="text" class="form-control" id="inputCompany">
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<textarea class="form-control">	</textarea>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label	class="control-label">Your Rate:</label>
												<div class="product-rating">
													<div class="stars">
														<span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<input type="submit"	class="btn-default-1" value="Add Review"> -->
									<div class="row">

										<?php 
										global $withcomments;
										$withcomments = true;

										if (comments_open() || get_comments_number()) comments_template('', true); 
										// если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев 
										?> 
									
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
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
						<!-- <figure class="figure-hover-overlay">																
							<a href="#"	class="figure-href"></a>
							<div class="product-sale">Sale <br> 7%</div>
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
							<a href="#"	class="figure-href"></a>
							<!-- <div class="product-sale-time"><p class="time"></p></div> -->
							<a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
							<?php the_widget( 'berocket_products_of_day_widget'); ?>
						</figure>
					</div>
					<!-- <div class="widget-title">
						<i class="fa fa-money"></i> Price range
					</div> -->
					<!-- <div class="widget-block">
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
					</div> -->

					<!-- <div class="widget-title">
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
									<a href="<?php echo get_the_permalink() ?>" class="product-name"><?php echo $product->name; ?></a>
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
					<!-- <div class="widget-block">
						<div class="row">
							<div class="col-md-4">
								<img class="img-responsive" src="http://placehold.it/400x500" alt="" title="">	 
							</div>
							<div class="col-md-8">
								<div class="block-name">
									<a href="#" class="product-name">Product name</a>
									<p class="product-price"><span>$330</span> $320.99</p>

								</div>
								<div class="product-rating">
									<div class="stars">
										<span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
									</div>
									<a href="" class="review">8 Reviews</a>
								</div>
								<p class="description">Lorem ipsum dolor.</p>
							</div>
						</div>
					</div> -->
				</div>

			</div>
		</div>	
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>