<?php if ( ! empty($feature_list) && count($feature_list) > 0 ) { ?>
    <div class="paid_features">
        <?php
        $feature_text = '';
        foreach ( $feature_list as $feature ) {
            $feature_text .= '<li>' . $feature . '</li>';
        }
        $text = '<h3>Unlock all the features with Premium version!</h3>
        <div>
        <ul>
            %feature_list%
        </ul>
        </div>
        <div class="premium_buttons">
            <span>Read more about</span>
            <a class="get_premium_version" href="%link%" target="_blank">PREMIUM VERSION</a>
            <span class="divider">OR</span>
            <a class="buy_premium_version" href="http://berocket.com/checkout/%licence%/promo/SAVE15" target="_blank">BUY NOW</a>
            <span>and get <b>%discount% discount</b></span>
        </div>
        <p>Support the plugin by purchasing paid version. This will provide faster growth,
        better support and much more functionality for the plugin</p>';

        $dpdiscount = '15%';
        if ( isset( $start_time ) and isset( $end_time ) and isset( $discount ) and time() > $start_time && time() < $end_time and (int) $discount > 15 ) {
            $dpdiscount = $discount;
        }

        $text = str_replace( '%feature_list%', $feature_text,               $text );
        $text = str_replace( '%link%',         $dplugin_link,               $text );
        $text = str_replace( '%licence%',      $dplugin_lic,                $text );
        $text = str_replace( '%discount%',     $dpdiscount,                 $text );
        $text = str_replace( '%plugin_name%',  @ $plugin_info['Name'],      $text );
        $text = str_replace( '%plugin_link%',  @ $plugin_info['PluginURI'], $text );
        echo $text;
        ?>
    </div>

    <style>
        .paid_features {
            border-radius: 3px;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.06);
            overflow: auto;
            position: relative;
            background-color: white;
            color: rgba(0, 0, 0, 0.87);
            padding: 0 25px;
            margin-bottom: 30px;
            box-sizing: border-box;
            text-align: center;
            float: right;
            clear: right;
            width: 28%;
        }
        .berocket_subscribe {
            background: white;
            float: right;
            clear: right;
            width: 28%;
            box-sizing: border-box;
            text-align: center;
            padding: 0 25px;
            margin-bottom: 30px;
            border-radius: 3px;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.06);
        }
        .paid_features ul li {
            text-align: left;
        }
        .berocket_subscribe {
            background-color: #2c3644;
            background-image: url(<?php echo plugin_dir_url( __FILE__ ) . 'mail.png'; ?>);
            background-position: right top;
            background-repeat: no-repeat;
            color: #aaa;
            font-size: 16px;
            overflow: hidden;
        }
        .berocket_subscribe h3 {
            color: white;
        }
        .berocket_subscribe p {
            font-size: 15px;
            text-align: center;
        }
        .berocket_subscribe .berocket_subscribe_email {
            background-color: #404c5d;
            border: 0;
            outline: 0;
            color: #aaa;
            width: 100%;
            line-height: 2em;
            font-size: 16px;
            padding-left: 15px;
            padding-right: 15px;
        }
        .berocket_subscribe .berocket_notice_submit,
        .get_premium_version,
        .buy_premium_version {
            margin-top: 30px;
            margin-bottom: 20px;
            color: #fff;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
            text-shadow: none;
            border: 0 none;
            min-width: 120px;
            width: 90%;
            -moz-user-select: none;
            background: #ff5252 none repeat scroll 0 0;
            box-sizing: border-box;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            outline: 0 none;
            padding: 8px;
            position: relative;
            text-align: center;
            text-decoration: none;
            transition: box-shadow 0.4s cubic-bezier(0.25, 0.8, 0.25, 1) 0s, background-color 0.4s cubic-bezier(0.25, 0.8, 0.25, 1) 0s;
            white-space: nowrap;
            height: auto;
            vertical-align: top;
            line-height: 25px;
            border-radius: 3px;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
            font-weight: bold;
        }
        .get_premium_version {
            margin: 5px 0;
            background: transparent;
            border: 2px solid #97b9cf;
            color: #7496ad;
        }
        .buy_premium_version {
            margin: 5px 0 15px;
            padding: 10px;
        }
        .premium_buttons {
            margin-top: 30px;
            margin-bottom: 20px;
        }
        .premium_buttons span {
            display: block;
            color: #7496ad;
        }
        .premium_buttons span.divider {
            line-height: 2.4em;
            font-size: 20px;
            font-weight: bold;
            position: relative;
        }
        .premium_buttons span.divider:before,
        .premium_buttons span.divider:after{
            position: absolute;
            top: 50%;
            left: 5%;
            right: 60%;
            height: 1px;
            background: #97b9cf;
            content: "";
        }
        .premium_buttons span.divider:after{
            left: 60%;
            right: 5%;
        }
        .premium_buttons span:last-child b{
            font-size: 16px;
        }
        .berocket_subscribe .berocket_notice_submit{
            width: 100%;
            margin-top: 20px;
        }
        .berocket_subscribe .berocket_notice_submit:hover,
        .berocket_subscribe .berocket_notice_submit:focus,
        .berocket_subscribe .berocket_notice_submit:active,
        .buy_premium_version:hover,
        .buy_premium_version:focus,
        .buy_premium_version:active {
            background: #ff6e68 none repeat scroll 0 0;
            color: white;
        }
        .get_premium_version:hover,
        .get_premium_version:focus,
        .get_premium_version:active{
            background: #97b9cf;
            color: white;
        }

        .berocket_subscribe .berocket_notice_submit:hover {
            color: white;
            background-color: rgb(222, 72, 72);
            box-shadow: none;
            border: none;
        }
        .berocket_subscribe .berocket_notice_submit:focus,
        .berocket_subscribe .berocket_notice_submit:active {
            color: white;
            background-color: rgb(222, 72, 72);
            -webkit-box-shadow: 0 0 0 1px #5b9dd9, 0 0 2px 1px rgba(30,140,190,.8);
            box-shadow: 0 0 0 1px #5b9dd9, 0 0 2px 1px rgba(30,140,190,.8);
        }
        .paid_features ul li{
            list-style: initial;
            margin-left: 2em;
        }
        .show_premium {
            float: left;
            width: 68%;
            box-sizing: border-box;
        }
        @media screen and (min-width: 901px) and (max-width: 1200px) {
            .paid_features,
            .berocket_subscribe {
                padding-left: 10px;
                padding-right: 10px;
            }

        }
        @media screen and (max-width: 900px) {
            .show_premium,
            .paid_features,
            .get_premium_version,
            .berocket_subscribe,
            .buy_premium_version{
                float: none;
                width: 100%;
            }

            .paid_features,
            .berocket_subscribe {
                margin-top: 30px;
                margin-bottom: 0;
            }

            .premium_buttons span.divider:before{
                left: 0;
            }

            .premium_buttons span.divider:after{
                right: 0;
            }
        }
    </style>
    <?php
    $subscribed = get_option('berocket_email_subscribed');
    if ( ! $subscribed ) {
        $user_email = wp_get_current_user();
        if ( isset( $user_email->user_email ) ) {
            $user_email = $user_email->user_email;
        } else {
            $user_email = '';
        }
        ?>
        <div class="berocket_subscribe">
            <h3>OUR NEWSLETTER</h3>
            <p>Get awesome content delivered straight to your inbox</p>
            <form class="berocket_subscribe_form" method="POST" action="<?php echo admin_url( 'admin-ajax.php' ); ?>">
                <input type="hidden" name="plugin" value="<?php echo $paid_plugin_info['id']; ?>" class="berocket_plugin_id_subscribe">
                <input type="hidden" name="action" value="berocket_subscribe_email">
                <input class="berocket_subscribe_email" type="email" name="email" placeholder="Enter your email address" value="<?php echo $user_email; ?>">
                <input type="submit" class="berocket_notice_submit" value="SUBSCRIBE">
            </form>
        </div>
        <?php
        berocket_admin_notices::echo_jquery_functions();
    }
    $text = '<h4 style="clear:both;">Both <a href="%plugin_link%" target="_blank">Free</a> and <a href="%link%" target="_blank">Paid</a> versions of %plugin_name% developed by <a href="http://berocket.com" target="_blank">BeRocket</a></h4>';
} else {
    $text = '<h4 style="clear:both;"><a href="%plugin_link%" target="_blank">%plugin_name%</a> developed by <a href="http://berocket.com" target="_blank">BeRocket</a></h4>';
}

$text = str_replace( '%link%',        $dplugin_link,               $text );
$text = str_replace( '%plugin_name%', @ $plugin_info['Name'],      $text );
$text = str_replace( '%plugin_link%', @ $plugin_info['PluginURI'], $text );
echo $text;
?>
