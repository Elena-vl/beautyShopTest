<?php

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

require_once('tinkoff/TinkoffMerchantAPI.php');

/**
 * Plugin Name: Тинькофф Банк
 * Plugin URI: https://oplata.tinkoff.ru/
 * Description: Проведение платежей через Tinkoff EACQ
 * Version: 1.4.0
 * Author: Tinkoff
 */


/* Add a custom payment class to WC
  ------------------------------------------------------------ */
register_activation_hook(__FILE__, 'create_table_recurrent_tinkoff');

add_action('plugins_loaded', 'woocommerce_tinkoff', 0);

function create_table_recurrent_tinkoff()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "recurrent_tinkoff";
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
              id int(10) NOT NULL AUTO_INCREMENT,
              rebillId VARCHAR (15) NOT NULL,
              paymentId int(10) NOT NULL,
              PRIMARY KEY  (id)
            ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function woocommerce_tinkoff()
{
    if (!class_exists('WC_Payment_Gateway')) {
        return;
    } // if the WC payment gateway class is not available, do nothing
    if (class_exists('WC_Tinkoff')) {
        return;
    }

    class WC_Tinkoff extends WC_Payment_Gateway
    {
        public function __construct()
        {
            $plugin_dir = plugin_dir_url(__FILE__);

            global $woocommerce;

            $this->id = 'tinkoff';
            $this->icon = apply_filters('woocommerce_tinkoff_icon', '' . $plugin_dir . 'tinkoff/tinkoff.png');
            $this->has_fields = false;

            // Load the settings
            $this->init_form_fields();
            $this->init_settings();

            // Define user set variables
            $this->title = $this->get_option('title');
            $this->merchant_id = $this->get_option('merchant_id');
            $this->secret_key = $this->get_option('secret_key');
            $this->lifetime = $this->get_option('lifetime');
            $this->testmode = $this->get_option('testmode');

            $this->description = $this->get_option('description');
            $this->instructions = $this->get_option('instructions');
            $this->check_data_tax = $this->get_option('check_data_tax');
            $this->taxation = $this->get_option('taxation');

            // Actions
            add_action('woocommerce_receipt_tinkoff', array($this, 'receipt_page'));

            // Save options
            add_action('woocommerce_update_options_payment_gateways_tinkoff', array($this, 'process_admin_options'));

            // Payment listener/API hook
            add_action('woocommerce_api_wc_tinkoff', array($this, 'check_assistant_response'));

            if (!$this->is_valid_for_use()) {
                $this->enabled = false;
            }

            $this->supports = array_merge(
                $this->supports,
                array(
                    'subscriptions',
                    'subscription_cancellation',
                    'subscription_reactivation',
                    'subscription_suspension',
                    'multiple_subscriptions',
                    'subscription_payment_method_change_customer',
                    'subscription_payment_method_change_admin',
                    'subscription_amount_changes',
                    'subscription_date_changes',
                )
            );

            $this->_maybe_register_callback_in_subscriptions_t();
        }

        /**
         * Check if this gateway is enabled and available in the user's country
         */
        function is_valid_for_use()
        {
            return true;
        }

        protected function _maybe_register_callback_in_subscriptions_t()
        {
            add_action('woocommerce_scheduled_subscription_payment_' . $this->id, array($this, 'scheduled_subscription_payment'), 10, 2);
        }

        public function scheduled_subscription_payment($amount, $order)
        {
            global $wpdb;

            if (0 == $amount) {
                $order->payment_complete();
                return;
            }

            $order_id = $order->id;
            $order = new WC_Order($order_id);
            $arrFields = $this->send_data($order, $order_id);

            $arrFields = $this->get_setting_language($arrFields);

            $Tinkoff = new TinkoffMerchantAPI($this->get_option('merchant_id'), $this->get_option('secret_key'));
            $request = $Tinkoff->buildQuery('Init', $arrFields);

            $this->logs($arrFields, $request);

            if ($paymentId = json_decode($request)->PaymentId) {
                // поиск родительского заказа у рекуррентоного платежа
                $subscriptions_for_order = wcs_get_subscriptions_for_order($order_id, array('order_type' => 'any'));
                if (!empty($subscriptions_for_order)) {
                    $subscription = array_pop($subscriptions_for_order);
                    $parentOrder = $subscription->get_parent_id();

                    $table_name = $wpdb->prefix . "recurrent_tinkoff";
                    $rebillId = $wpdb->get_var(
                        " SELECT rebillId
                            FROM $table_name WHERE paymentId = $parentOrder "
                    );

                    $chargeFields = array(
                        'PaymentId' => $paymentId,
                        'RebillId' => $rebillId,
                    );

                    $TinkoffCharge = new TinkoffMerchantAPI($this->get_option('merchant_id'), $this->get_option('secret_key'));
                    $request1 = $TinkoffCharge->buildQuery('Charge', $chargeFields);

                    $this->logs($chargeFields, $request1);
                }
            }
        }

        public function get_setting_language($arrFields)
        {
            if ($this->get_option('payment_form_language') == 'en') {
                $arrFields['Language'] = "en";
            }

            return $arrFields;
        }

        public function send_data($order, $order_id)
        {
            $arrCartItems = $order->get_items();
            $description = $this->description_tinkoff($arrCartItems);

            $arrFields = array(
                'OrderId' => $order_id,
                'Amount' => round($order->get_total() * 100),
                'Description' => $description,
                'DATA' => array('Email' => $order->get_billing_email(), 'Connection_type' => 'wp-woocommerce',),
            );

            if ($this->check_data_tax == 'yes') {
                $arrFields['Receipt'] = array(
                    'Email' => $order->get_billing_email(),
                    'Phone' => $order->get_billing_phone(),
                    'Taxation' => $this->taxation,
                    'Items' => $this->get_receipt_items($order_id),
                );
            }

            return $arrFields;
        }

        function description_tinkoff($arrCartItems)
        {
            $strDescription = '';

            foreach ($arrCartItems as $arrItem) {
                $strDescription .= $arrItem['name'];
                if ($arrItem['qty'] > 1) {
                    $strDescription .= '*' . $arrItem['qty'] . "; ";
                } else {
                    $strDescription .= "; ";
                }
            }

            if (strlen($strDescription) > 250) {
                $strDescription = mb_substr($strDescription, 0, 247) . '...';
            }

            return $strDescription;
        }

        /**
         * Форма оплаты
         **/
        function receipt_page($order_id)
        {
            $order = new WC_Order($order_id);
            $arrFields = $this->send_data($order, $order_id);

            if ( ! function_exists( 'get_plugins' ) ) {
                // подключим файл с функцией get_plugins()
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            // получим данные плагинов
            $all_plugins = get_plugins();

            foreach ($all_plugins as $key => $plugin) {
                preg_match_all('#woocommerce-subscriptions-[0-9.-]+\/woocommerce-subscriptions.php#uis', $key, $pluginSubscriptions);

                if (!empty($pluginSubscriptions[0])) {
                    // активирован ли плагин woocommerce-subscriptions
                    if (is_plugin_active($key)) {

                        if (wcs_order_contains_subscription($order)) {
                            $arrFields['Recurrent'] = "Y";
                            $arrFields['CustomerKey'] = (string)$order->get_user_id();
                        }
                    }
                }
            }

            $arrFields = $this->get_setting_language($arrFields);

            $Tinkoff = new TinkoffMerchantAPI($this->get_option('merchant_id'), $this->get_option('secret_key'));
            $request = $Tinkoff->buildQuery('Init', $arrFields);

            $this->logs($arrFields, $request);

            $request = json_decode($request);

            if (!empty($this->payment_system_name)) {
                $arrFields['payment_system_name'] = $this->payment_system_name;
            }

            foreach ($arrFields as $strFieldName => $strFieldValue) {
                $args_array[] = '<input type="hidden" name="' . esc_attr($strFieldName) . '" value="' . esc_attr($strFieldValue) . '" />';
            }

            if (isset($request->PaymentURL)) {
                try {
                    wc_reduce_stock_levels($order_id);
                } catch (Exception $e) {

                }
                setcookie('tinkoffReturnUrl', $this->get_return_url($order), time() + 3600, "/");
                wp_redirect($request->PaymentURL);
            } else {
                echo '<p>' . 'Запрос к платежному сервису был отправлен некорректно' . '</p>';
            }
        }


        /**
         * Admin Panel Options
         * - Options for bits like 'title' and availability on a country-by-country basis
         *
         * @since 0.1
         **/
        public function admin_options()
        {
            ?>
            <h3><?php _e('Tinkoff', 'woocommerce'); ?></h3>
            <p><?php _e('Настройка приема электронных платежей через Tinkoff.', 'woocommerce'); ?></p>

            <?php if ($this->is_valid_for_use()) : ?>

            <table class="form-table">
                <?php
                // Generate the HTML For the settings form.
                $this->generate_settings_html();
                ?>
            </table>

        <?php else : ?>
            <div class="inline error"><p>
                    <strong><?php _e('Шлюз отключен',
                            'woocommerce'); ?></strong>: <?php _e('Tinkoff не поддерживает валюты Вашего магазина.',
                        'woocommerce'); ?>
                </p></div>
            <?php
        endif;

        } // End admin_options()

        /**
         * Initialise Gateway Settings Form Fields
         *
         * @access public
         * @return void
         */
        function init_form_fields()
        {
            $this->form_fields = array(
                'enabled' => array(
                    'title' => __('Активность способа оплаты', 'woocommerce'),
                    'type' => 'checkbox',
                    'label' => __('Активен', 'woocommerce'),
                    'default' => 'yes'
                ),
                'title' => array(
                    'title' => __('Название способа оплаты', 'woocommerce'),
                    'type' => 'text',
                    'description' => __('Название способа оплаты, которое увидит пользователь при оформлении заказа', 'woocommerce'),
                    'default' => __('Тинькофф Банк', 'woocommerce')
                ),
                'merchant_id' => array(
                    'title' => __('Терминал', 'woocommerce'),
                    'type' => 'text',
                    'description' => __('Указан в Личном кабинете https://oplata.tinkoff.ru', 'woocommerce'),
                    'default' => ''
                ),
                'secret_key' => array(
                    'title' => __('Пароль', 'woocommerce'),
                    'type' => 'text',
                    'description' => __('Указан в Личном кабинете https://oplata.tinkoff.ru', 'woocommerce'),
                    'default' => ''
                ),
                'description' => array(
                    'title' => __('Description', 'woocommerce'),
                    'type' => 'textarea',
                    'description' => __('Описание способа оплаты, которое клиент будет видеть на вашем сайте.',
                        'woocommerce'),
                    'default' => 'Оплата через www.tinkoff.ru'
                ),
                'auto_complete' => array(
                    'title' => __('Автозавершение заказа', 'woocommerce'),
                    'type' => 'checkbox',
                    'label' => __('Автоматический перевод заказа в статус "Выполнен" после успешной оплаты',
                        'woocommerce'),
                    'description' => __('', 'woocommerce'),
                    'default' => '0'
                ),
                'check_data_tax' => array(
                    'title' => __('Передавать данные для формирования чека', 'woocommerce'),
                    'type' => 'checkbox',
                    'label' => __('Передача данных', 'woocommerce'),
                    'description' => __('Передавать данные для формирования чека', 'woocommerce'),
                    'default' => '0'
                ),
                'taxation' => array(
                    'title' => __('Система налогообложения', 'woocommerce'),
                    'type' => 'select',
                    'description' => __('Выберите систему налогообложения для Вашего магазина'),
                    'default' => 'error',
                    'options' => array(
                        'error' => __('', 'woocommerce'),
                        'osn' => __('Общая СН', 'woocommerce'),
                        'usn_income' => __('Упрощенная СН (доходы)', 'woocommerce'),
                        'usn_income_outcome' => __('Упрощенная СН (доходы минус расходы)', 'woocommerce'),
                        'envd' => __('Единый налог на вмененный доход', 'woocommerce'),
                        'esn' => __('Единый сельскохозяйственный налог', 'woocommerce'),
                        'patent' => __('Патентная СН', 'woocommerce'),
                    ),
                ),
                'payment_form_language' => array(
                    'title' => __('Язык платежной формы', 'woocommerce'),
                    'type' => 'select',
                    'description' => __('Выберите язык платежной формы для Вашего магазина'),
                    'default' => 'ru',
                    'options' => array(
                        'ru' => __('Русский', 'woocommerce'),
                        'en' => __('Английский', 'woocommerce'),
                    ),
                ),
            );

        }

        /**
         * Дополнительная информация в форме выбора способа оплаты
         **/
        function payment_fields()
        {
            if ($this->description) {
                echo wpautop(wptexturize($this->description));
            }
        }

        /**
         * Process the payment and return the result
         **/
        function process_payment($order_id)
        {
            $order = new WC_Order($order_id);

            return array(
                'result' => 'success',
                'redirect' => add_query_arg('order', $order->id,
                    add_query_arg('key', $order->order_key, get_permalink(wc_get_page_id('pay'))))
            );
        }

        protected static function getTaxForSend($tax)
        {
            switch ($tax) {
                case 18:
                    $vat = 'vat18';
                    break;
                case 10:
                    $vat = 'vat10';
                    break;
                case 0:
                    $vat = 'vat0';
                    break;
                default:
                    $vat = 'none';
            }
            return $vat;
        }

        function logs($arrFields, $request)
        {
            // log send
            $log = '[' . date('D M d H:i:s Y', time()) . '] ';
            $log .= json_encode($arrFields, JSON_UNESCAPED_UNICODE);
            $log .= "\n";
            file_put_contents(dirname(__FILE__) . "/tinkoff.log", $log, FILE_APPEND);

            $log = '[' . date('D M d H:i:s Y', time()) . '] ';
            $log .= $request;
            $log .= "\n";
            file_put_contents(dirname(__FILE__) . "/tinkoff.log", $log, FILE_APPEND);
        }

        function get_receipt_items($order_id)
        {
            global $wpdb;

            $order = new WC_Order($order_id);
            $vat = '';
            $items = array();

            foreach ($order->get_items() as $item) {
                if ($item->get_product()->get_tax_status() != 'none') {
                    $_tax = new WC_Tax();
                    $ratesData = $_tax->get_rates($item->get_product()->get_tax_class());
                    $rates = array_shift($ratesData);
                    $ratOne = $rates['rate'];
                    $compoundOne = $rates['compound'];
                    //Take only the item rate and round it.
                    if ($rates)
                        $item_rate = round(array_shift($rates));

                    $vat = self::getTaxForSend($item_rate);
                    $rate = array(
                        array(
                            'rate' => $ratOne,
                            'compound' => $compoundOne,
                        )
                    );
                    $price = $item->get_product()->get_price();

                    $tax = 0;
                    /* если настройка на Нет */
                    if (!wc_prices_include_tax()) {
                        $tax = WC_Tax::calc_tax($price, $rate, false);
                        foreach ($tax as $tax) {
                            $price += $tax;
                        }
                    }
                } else {
                    $price = $item->get_product()->get_price();
                    $vat = 'none';
                }

                $quantity = $item->get_quantity();
                $newItem = array(
                    'Name' => mb_substr($item->get_product()->get_name(), 0, 64),
                    'Price' => round($price * 100),
                    'Quantity' => round($quantity, 2),
                    'Amount' => round($price * $quantity * 100),
                    'Tax' => $vat,
                );

                array_push($items, $newItem);
            }

            $shippingPrice = $order->get_shipping_total();
            $isShipping = false;
            if ($shippingPrice > 0) {
                $shippingPriceTax = round($order->get_shipping_tax() * 100);
                $shippingPrice = round($shippingPrice * 100);
                $shippingPriceTax += $shippingPrice;

                $orderItemId = $wpdb->get_row("
                  SELECT order_item_id FROM " . $wpdb->prefix . "woocommerce_order_items WHERE order_item_type = 'tax' and order_id = $order_id
                ");

                if (!empty($orderItemId)) {
                    $taxRateData = $wpdb->get_row("
                    SELECT * FROM " . $wpdb->prefix . "woocommerce_tax_rates WHERE tax_rate_id =
                        (SELECT meta_value FROM " . $wpdb->prefix . "woocommerce_order_itemmeta WHERE meta_key = 'rate_id' and order_item_id = $orderItemId->order_item_id)
                    ");
                    // налог на доставку вкл
                    if ($taxRateData->tax_rate_shipping == 1) {
                        $shippingTax = self::getTaxForSend(round($taxRateData->tax_rate));
                    } else {
                        $shippingTax = 'none';
                    }
                } else {
                    $shippingTax = 'none';
                }

                $shippingItem = array(
                    'Name' => mb_substr($order->get_shipping_method(), 0, 64),
                    'Price' => $shippingPriceTax,
                    'Quantity' => 1,
                    'Amount' => $shippingPriceTax,
                    'Tax' => $shippingTax,
                );
                array_push($items, $shippingItem);
                $isShipping = true;
            }

            $amount = round($order->get_total() * 100);

            return $this->balance_amount($isShipping, $items, $amount);
        }

        function balance_amount($isShipping, $items, $amount)
        {
            $itemsWithoutShipping = $items;

            if ($isShipping) {
                $shipping = array_pop($itemsWithoutShipping);
            }

            $sum = 0;

            foreach ($itemsWithoutShipping as $item) {
                $sum += $item['Amount'];
            }

            if (isset($shipping)) {
                $sum += $shipping['Amount'];
            }

            if ($sum != $amount) {
                $sumAmountNew = 0;
                $difference = $amount - $sum;
                $amountNews = array();

                foreach ($itemsWithoutShipping as $key => $item) {
                    $itemsAmountNew = $item['Amount'] + floor($difference * $item['Amount'] / $sum);
                    $amountNews[$key] = $itemsAmountNew;
                    $sumAmountNew += $itemsAmountNew;
                }

                if (isset($shipping)) {
                    $sumAmountNew += $shipping['Amount'];
                }

                if ($sumAmountNew != $amount) {
                    $max_key = array_keys($amountNews, max($amountNews))[0];    // ключ макс значения
                    $amountNews[$max_key] = max($amountNews) + ($amount - $sumAmountNew);
                }

                foreach ($amountNews as $key => $item) {
                    $items[$key]['Amount'] = $amountNews[$key];
                }
            }
            return $items;
        }

        /**
         * Check Response
         **/
        function check_assistant_response()
        {
            global $woocommerce;

            if (!empty($_POST)) {
                $arrRequest = $_POST;
            } else {
                $arrRequest = $_GET;
            }

            $objOrder = new WC_Order($arrRequest['pg_order_id']);

            $arrResponse = array();
            $aGoodCheckStatuses = array('pending', 'processing');
            $aGoodResultStatuses = array('pending', 'processing', 'completed');

            switch ($_GET['type']) {
                case 'check':
                    $bCheckResult = 1;
                    if (empty($objOrder) || !in_array($objOrder->status, $aGoodCheckStatuses)) {
                        $bCheckResult = 0;
                        $error_desc = 'Order status ' . $objOrder->status . ' or deleted order';
                    }
                    if (intval($objOrder->order_total) != intval($arrRequest['pg_amount'])) {
                        $bCheckResult = 0;
                        $error_desc = 'Wrong amount';
                    }

                    $arrResponse['pg_salt'] = $arrRequest['pg_salt'];
                    $arrResponse['pg_status'] = $bCheckResult ? 'ok' : 'error';
                    $arrResponse['pg_error_description'] = $bCheckResult ? "" : $error_desc;

                    $objResponse = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><response/>');
                    $objResponse->addChild('pg_salt', $arrResponse['pg_salt']);
                    $objResponse->addChild('pg_status', $arrResponse['pg_status']);
                    $objResponse->addChild('pg_error_description', $arrResponse['pg_error_description']);
                    $objResponse->addChild('pg_sig', $arrResponse['pg_sig']);
                    break;

                case 'result':
                    if (intval($objOrder->order_total) != intval($arrRequest['pg_amount'])) {
                        $strResponseDescription = 'Wrong amount';
                        if ($arrRequest['pg_can_reject'] == 1) {
                            $strResponseStatus = 'rejected';
                        } else {
                            $strResponseStatus = 'error';
                        }
                    } elseif ((empty($objOrder) || !in_array($objOrder->status, $aGoodResultStatuses)) &&
                        !($arrRequest['pg_result'] == 0 && $objOrder->status == 'failed')
                    ) {
                        $strResponseDescription = 'Order status ' . $objOrder->status . ' or deleted order';
                        if ($arrRequest['pg_can_reject'] == 1) {
                            $strResponseStatus = 'rejected';
                        } else {
                            $strResponseStatus = 'error';
                        }
                    } else {
                        $strResponseStatus = 'ok';
                        $strResponseDescription = "Request cleared";
                        if ($arrRequest['pg_result'] == 1) {
                            $objOrder->update_status('completed', __('Платеж успешно оплачен', 'woocommerce'));
                            WC()->cart->empty_cart();
                        } else {
                            $objOrder->update_status('failed', __('Платеж не оплачен', 'woocommerce'));
                            WC()->cart->empty_cart();
                        }
                    }

                    $objResponse = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><response/>');
                    $objResponse->addChild('pg_salt', $arrRequest['pg_salt']);
                    $objResponse->addChild('pg_status', $strResponseStatus);
                    $objResponse->addChild('pg_description', $strResponseDescription);

                    break;
                case 'success':
                    wp_redirect($this->get_return_url($objOrder));
                    break;
                case 'failed':
                    wp_redirect($objOrder->get_cancel_order_url());
                    break;
                default :
                    die('wrong type');
            }

            header("Content-type: text/xml");
            echo $objResponse->asXML();
            die();
        }

        function showMessage($content)
        {
            return '
        <h1>' . $this->msg['title'] . '</h1>
        <div class="box ' . $this->msg['class'] . '-box">' . $this->msg['message'] . '</div>
        ';
        }

        function showTitle($title)
        {
            return false;
        }
    }

    /**
     * Add the gateway to WooCommerce
     **/
    function add_tinkoff_gateway($methods)
    {
        $methods[] = 'WC_Tinkoff';
        return $methods;
    }

    add_filter('woocommerce_payment_gateways', 'add_tinkoff_gateway');
}

/////////////// success page

add_filter('query_vars', 'tinkoff_success_query_vars');
function tinkoff_success_query_vars($query_vars)
{
    $query_vars[] = 'tinkoff_success';
    return $query_vars;
}


add_action('parse_request', 'tinkoff_success_parse_request');
function tinkoff_success_parse_request(&$wp)
{
    if (array_key_exists('tinkoff_success', $wp->query_vars)) {
        if (isset($_COOKIE['tinkoffReturnUrl'])) {
            $tinkoffReturnUrl = $_COOKIE['tinkoffReturnUrl'];
            unset($_COOKIE['tinkoffReturnUrl']);
            echo "<script language=\"javascript\" type=\"text/javascript\">document.location.replace('" . $tinkoffReturnUrl . "');</script>";
        } else {
            $a = new WC_Tinkoff();
            add_action('the_title', array($a, 'showTitle'));
            add_action('the_content', array($a, 'showMessage'));
            if ($wp->query_vars['tinkoff_success'] == 1) {
                $a->msg['title'] = 'Платеж успешно совершен';
                $a->msg['message'] = 'Благодарим вас за покупку!';
                $a->msg['class'] = 'woocommerce_message woocommerce_message_info';
            } else {
                $a->msg['title'] = 'Платеж не прошел';
                $a->msg['message'] = 'Во время платежа произошла ошибка. Повторите попытку или обратитесь к администратору';
                $a->msg['class'] = 'woocommerce_message woocommerce_message_info';
            }
        }
    }
    return;
}

/////////////// success page end
?>