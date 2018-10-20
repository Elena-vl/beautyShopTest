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

					<div class="header-for-light">
						<h1 class="wow fadeInRight animated" data-wow-duration="1s"><span><?php the_title() ?></span> </h1>
					</div>

					 <div class="block-product-detail">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<?php
									global $product;
									$product_id = get_the_ID();
									$product = wc_get_product( $product_id );
									remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
									do_action( 'woocommerce_before_single_product_summary' );
									?>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="product-detail-section">
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
											</a>
										</div>

										<div class="clearfix">
											<label class="pull-left">Артикул:</label>
											<?php echo 'ID ' . $product->get_sku();?>
										</div>

										<?php
											switch ( $product->product_type ) {
                                            case "variable" :
                                                 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
                                                 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
                                                 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
                                                 remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
                                                 do_action( 'woocommerce_single_product_summary' );
                                             break;
                                             case "simple": ?>
                                                <div class="clearfix">
                                                    <label class="pull-left">Цена:</label>
                                                    <?php
                                                    if (empty($product->sale_price))
                                                        echo '<p class="product-price">₽'. $product->regular_price .'</p>';
                                                    else
                                                        echo '<p class="product-price"><span>₽'.$product->regular_price.'</span> ₽'.$product->sale_price.'</p>';
                                                    ?>
                                                </div>
                                                <?php
                                                $attributes = $product->get_attributes();
                                                foreach ($attributes as $attribute ) {
                                                    if($attribute[name]!="pa_brand" && $attribute[name]!="pa_collection") {
                                                        echo '<div class="clearfix">';
                                                        echo '<label class="pull-left">Объем:</label> <a href="#">';
                                                        $values = get_the_terms($product_id , $attribute[name]);
                                                            if (empty($values))
                                                                echo "—";
                                                            else
                                                                foreach ( $values as $value )
                                                                    echo '<a href="#">' . $value->name . '</a>';
                                                        echo '</div>';
                                                    }
                                                }

                                                do_action( 'woocommerce_before_add_to_cart_form' ); ?>

                                                <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
                                                    <label class="pull-left">Количество:</label>
                                                    <?php do_action( 'woocommerce_before_add_to_cart_button' );
                                                    do_action( 'woocommerce_before_add_to_cart_quantity' );
                                                    woocommerce_quantity_input( array(
                                                        'min_value'	 => 1,
                                                        'max_value'	 => 999,
                                                        'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(),
                                                    ) );
                                                    do_action( 'woocommerce_after_add_to_cart_quantity' );
                                                    ?>
                                                    <br>
                                                    <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
                                                    <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
                                                </form>
                                                <?php do_action( 'woocommerce_after_add_to_cart_form' );
                                            break;	}
                                        ?>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
<!--Описание-->
					<div class="box-border block-form">
						<div class="tab-content">
							<div class="tab-pane active" id="description">
								<br>
								<h3>Описание</h3>
								<hr>
								<p>
									<?php echo $product->description; ?>
								</p>
							</div>
							<div class="tab-pane" id="review">
								<form role="form" method="post" action="#">
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
<!--Каталог-->
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
						<figure class="figure-hover-overlay">
							<?php the_widget( 'berocket_products_of_day_widget'); ?>
						</figure>
					</div>
                    <!--Бестселлеры-->
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
								<!-- <img class="img-responsive" src="http://placehold.it/400x500.jpg" alt="" title="">		-->
							</div>
							<div class="col-md-8">
								<div class="block-name">
									<a href="<?php echo get_the_permalink() ?>" class="product-name"><?php echo $product->name; ?></a>
									<p class="product-price"><span>₽<?php echo $product->regular_price; ?></span> ₽<?php echo $product->regular_price; ?></p>
								</div>
								<p class="description"><?php echo $product->description; ?></p>
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
</section>
<?php get_footer(); // подключаем footer.php ?>