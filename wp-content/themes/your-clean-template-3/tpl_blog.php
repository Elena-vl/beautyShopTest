<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); // подключаем header.php ?>
		<section>
			<div>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="block">
                                <div class="header-for-light">
                                    <h1 class="wow fadeInRight animated" style="margin-top: 130px;" data-wow-duration="1s"><span>Блог</span></h1>
                                </div>
                                <div class="row">
                                	<?php
										if ( have_posts() ) :
										query_posts('cat=3');
										while (have_posts()) : the_post();
									?>
									<article class="col-md-4 text-center">
                                        <div class="blog">
                                            <figure class="figure-hover-overlay">                                                                        
                                                <a href="<?php echo get_the_permalink() ?>"  class="figure-href"></a>
                                                <img class="img-responsive" src="<?php the_post_thumbnail_url();?>" alt="" title="">

                                                <span class="bar"></span>
                                            </figure>
                                            <div class="blog-caption">
                                                <h3><a href="<?php echo get_the_permalink() ?>" class="blog-name"><?php the_title(); ?></a></h3>
                                                <p class="post-information">
                                                </p>
                                                <p>
                                                    <?php the_content(); ?>
                                                </p>
                                                <a href="<?php echo get_permalink() ?>" class="btn-read">Читать полностью</a>
                                            </div>
                                        </div>
                                    </article>						
									
									<?php
										endwhile;
										endif;
										wp_reset_query();
									?>
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