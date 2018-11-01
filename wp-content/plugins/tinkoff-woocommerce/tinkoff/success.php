<?php
set_error_handler('exceptions_error_handler', E_ALL);
function exceptions_error_handler($severity) {
    if (error_reporting() == 0) {
        return;
    }
    if (error_reporting() & $severity) {
        die('NOTOK1');
    }
}
try{
    require( dirname( __FILE__ ) . '../../../../../wp-blog-header.php' );
    $request = (array) json_decode(file_get_contents('php://input'));
    header("HTTP/1.1 200 ok");
    //woocommerce_tinkoff_settings
    $settings = $wpdb->get_results("select * from ".$wpdb->prefix."options where option_name='woocommerce_tinkoff_settings'");
    $settings = unserialize($settings[0]->option_value);
    $request['Password'] = $settings['secret_key'];
    ksort($request);
    $request_str = json_encode($request);
    $original_token = $request['Token'];
    unset($request['Token']);

    $request['Success'] = $request['Success'] === true ? 'true' : 'false';

    $values = '';
    foreach ($request as $key => $val) {
        $values .= $val;
    }
    $token = hash('sha256', $values);

    if($token == $original_token){
        $order = $wpdb->get_results("select * from ".$wpdb->prefix."woocommerce_order_items where order_id=". (int) $request['OrderId']);
        $order_status = $wpdb->get_results("select * from ".$wpdb->prefix."posts where ID=".  $order[0]->order_id);
        $status = $order_status[0]->post_status;

        if($request['Status'] == 'AUTHORIZED' && $status == 'wc-pending'){
            die('OK');
        }
        switch ($request['Status']) {
            case 'AUTHORIZED': $order_status = 'wc-on-hold'; break; /*Деньги на карте захолдированы. Корзина очищается.*/
            case 'CONFIRMED': $order_status = 'wc-processing'; break; /*Платеж подтвержден.*/
            case 'CANCELED': $order_status = 'wc-cancelled'; break; /*Платеж отменен*/
            case 'REJECTED': $order_status = 'wc-failed'; break; /*Платеж отклонен.*/
            case 'REVERSED': $order_status = 'wc-cancelled'; break; /*Платеж отменен*/
            case 'REFUNDED': $order_status = 'wc-refunded'; break; /*Произведен возврат денег клиенту*/
        }


        if($request['Status'] === 'CONFIRMED' && $settings['auto_complete'] === 'yes'){
            $order_status = 'wc-completed';
        }

        $order = wc_get_order( (int) $request['OrderId'] );
        $order->update_status( $order_status );
        do_action( 'woocommerce_order_edit_status', (int) $request['OrderId'], $order_status );
        WC()->cart->empty_cart();
        die('OK');
    } else {
        die('NOTOK');
    }
}
catch(Exception $e){
    die('NOTOK');
}