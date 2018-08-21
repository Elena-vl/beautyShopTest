<?php 
$options = BeRocket_products_of_day::get_option();
$week_day = date('N', current_time( 'timestamp' ));
$products = $options['products'][$week_day];
$products = array_merge($products, array(0));
$current_language= apply_filters( 'wpml_current_language', NULL );
foreach($products as &$product) {
    $product = apply_filters( 'wpml_object_id', $product, 'product', true, $current_language );
}
$rand = rand();
$query_args = array(
    'posts_per_page'    => $products_count,
    'post_type'         => 'product',
    'post_status'       => 'publish',
    'post__in'          => $products,
    'nopaging'          => false,
    'orderby'           => 'post__in'
);
if( br_woocommerce_version_check() ) {
    $query_args['tax_query'] = array( 
        array(
            'taxonomy'          => 'product_visibility',
            'field'             => 'slug',
            'terms'             => array('exclude-from-catalog'),
            'operator'          => 'NOT IN',
            'include_children'  => true,
        )
    );
} else {
    if( empty( $query_args['meta_query']) || ! is_array($query_args['meta_query']) ) {
        $query_args['meta_query'] = array();
    }
    $query_args['meta_query'][] = array(
        'key'       => '_visibility',
        'value'     => array( 'catalog', 'visible' ),
        'compare'   => 'IN',
    );
}
if( $hide_outofstock ) {
    if( empty( $query_args['meta_query']) || ! is_array($query_args['meta_query']) ) {
        $query_args['meta_query'] = array();
    }
    $query_args['meta_query'][] = array(
        'key'       => '_stock_status',
        'value'     => 'outofstock',
        'compare'   => 'NOT IN'
    );
}
global $wp_query;
$old_wp_query = $wp_query;
$wp_query = new WP_Query( $query_args );
if( have_posts() ) {
    if( $title ) echo $args['before_title'].$title.$args['after_title']; 
    echo '<style>.br_product_day_'.$rand.' .br_product_day{width:'.(100/$count_line).'%!important;}</style>';
    echo '<style>.br_product_day_'.$rand.' .br_product_day:nth-child('.$count_line.'n+1){clear:both!important;}</style>';
    echo '<div class="br_product_for_day br_product_day_'.$rand.'">';
    $product_i = 1;
    while( have_posts() ) {
    the_post();

        echo '<div class="br_product_day">';
        echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';

        if( $thumbnails ) {
            do_action('product_of_day_before_thumbnail_widget');
            echo woocommerce_template_loop_product_thumbnail();
        }
        do_action('product_of_day_before_title_widget');
        echo woocommerce_template_loop_product_title();

        echo '</a>';

        echo '<span class="price br_price">';
        woocommerce_template_loop_price();
        echo '</span>';

        if( $add_to_cart ) {
            woocommerce_template_loop_add_to_cart();
        }
        if( $quick_view ) {
            apply_filters('br_get_preview_box', '_preview', 'content', 'preview_product');
            do_action('br_get_preview_button', '_preview');
        }

        echo '</div>';
        $product_i++;
    }

    echo '</div>';
    echo '<div style="clear:both;"></div>';
    wp_reset_query();
}
$wp_query = $old_wp_query;
?>
