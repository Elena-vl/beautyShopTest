<div class="wrap">
<?php 
$dplugin_name = 'WooCommerce Products of Day';
$dplugin_link = 'http://berocket.com/product/woocommerce-products-of-day';
$dplugin_price = 20;
$dplugin_lic   = 31;
$dplugin_desc = '';
@ include 'settings_head.php';
@ include 'discount.php';
?>
<div class="wrap br_settings br_products_of_day_settings show_premium">
    <div id="icon-themes" class="icon32"></div>
    <h2>Products of Day Settings</h2>
    <?php settings_errors(); ?>

    <h2 class="nav-tab-wrapper">
        <a href="#general" class="nav-tab nav-tab-active general-tab" data-block="general"><?php _e('General', 'BeRocket_products_of_day_domain') ?></a>
        <a href="#css" class="nav-tab css-tab" data-block="css"><?php _e('CSS', 'BeRocket_products_of_day_domain') ?></a>
        <a href="#javascript" class="nav-tab javascript-tab" data-block="javascript"><?php _e('JavaScript', 'BeRocket_products_of_day_domain') ?></a>
    </h2>

    <form class="products_of_day_submit_form" method="post" action="options.php">
        <?php 
        $options = BeRocket_products_of_day::get_option(); ?>
        <div class="nav-block general-block nav-block-active">
            <table class="form-table license">
            <?php 
            $day_weeks = array(
                '0' => __('Sunday', 'BeRocket_products_of_day_domain'),
                '1' => __('Monday', 'BeRocket_products_of_day_domain'),
                '2' => __('Tuesday', 'BeRocket_products_of_day_domain'),
                '3' => __('Wednesday', 'BeRocket_products_of_day_domain'),
                '4' => __('Thursday', 'BeRocket_products_of_day_domain'),
                '5' => __('Friday', 'BeRocket_products_of_day_domain'),
                '6' => __('Saturday', 'BeRocket_products_of_day_domain'),
                '7' => __('Sunday', 'BeRocket_products_of_day_domain'),
            );
            for( $i = 1; $i < 8; $i++ ) {
                echo '<tr><th>', $day_weeks[$i], '</th><td>';
                br_generate_product_selector( array( 
                    'option' => $options['products'][$i], 
                    'block_name' => 'products_of_day', 
                    'name' => 'br-products_of_day-options[products]['.$i.'][]' 
                ) );
                echo '</td></tr>';
            }
            ?>
            </table>
            <script>
                (function ($){
                    $(document).ready( function () {
                        jQuery( ".br_products_search" ).sortable({
                            items: "li:not(.br_products_suggest_search)",
                            distance: 5
                        });
                    });
                })(jQuery);
            </script>
        </div>
        <div class="nav-block css-block">
            <table class="form-table license">
                <tr>
                    <th scope="row"><?php _e('Custom CSS', 'BeRocket_products_of_day_domain') ?></th>
                    <td>
                        <textarea name="br-products_of_day-options[custom_css]"><?php echo $options['custom_css']?></textarea>
                    </td>
                </tr>
            </table>
        </div>
        <div class="nav-block javascript-block">
            <table class="form-table license">
                <tr>
                    <th scope="row"><?php _e('On Page Load', 'BeRocket_products_of_day_domain') ?></th>
                    <td>
                        <textarea name="br-products_of_day-options[script][js_page_load]"><?php echo $options['script']['js_page_load']?></textarea>
                    </td>
                </tr>
            </table>
        </div>
        <input type="submit" class="button-primary" value="<?php _e('Save Changes', 'BeRocket_products_of_day_domain') ?>" />
        <div class="br_save_error"></div>
    </form>
</div>
<?php
$feature_list = array(
    'Show random products from list of products for this day',
    'Shortcode to display products of day',
    'Slider type of widget and shortcode',
    'Add products before content, after content and before footer on pages',
);
@ include 'settings_footer.php';
?>
</div>
