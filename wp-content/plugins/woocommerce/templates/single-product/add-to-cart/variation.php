<?php
/**
 * Single variation display
 *
 * This is a javascript-based template for single variations (see https://codex.wordpress.org/Javascript_Reference/wp.template).
 * The values will be dynamically replaced after selecting attributes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

defined( 'ABSPATH' ) || exit;

?>
<script type="text/template" id="tmpl-variation-template">
	<!-- <div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div> -->
	<div class="clearfix"><label class="pull-left">Цена:</label><p class="product-price"><span>₽{{{ data.variation.display_regular_price}}}</span>₽{{{ data.variation.display_price  }}} </p></div>

	<!-- <div><img src= esc_url( {{{data.variation.image_src}}} ) class="wp-post-image"> <p>{{{data.variation.variation_id}}} </p>  </div> -->
	<?php
//		$post_thumbnail_id = <script> {{{data.variation.variation_id}}} </script>;
//		$thumbnail_size = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
//		$thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
//		echo '<img src="' . esc_url( $thumbnail_src[0] ) . '" class="img-responsive" alt="" ></img>';
	?>


	<!-- <div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div> -->
	<!-- <div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div> -->
</script>
<script type="text/template" id="tmpl-unavailable-variation-template">
	<p><?php _e( 'Sorry, this product is unavailable. Please choose a different combination.', 'woocommerce' ); ?></p>
</script>
