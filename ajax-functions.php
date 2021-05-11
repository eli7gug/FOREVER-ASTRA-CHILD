<?php

function child_ajax_enqueue() {
	// Enqueue javascript on the frontend.
	wp_enqueue_script('child-ajax-scripts', get_stylesheet_directory_uri() . '/js/ajax-scripts.js', array('jquery'));
	// The wp_localize_script allows us to output the ajax_url path for our script to use.
	wp_localize_script('child-ajax-scripts', 'ajax_obj', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
}

add_action( 'wp_enqueue_scripts', 'child_ajax_enqueue' );

//  get product by sku
add_action( 'wp_ajax_get_pdt_by_sku', 'get_pdt_by_sku' );
add_action( 'wp_ajax_nopriv_get_pdt_by_sku', 'get_pdt_by_sku' );

function get_pdt_by_sku() {
    //if(isset($_POST['pdt_sku']) && $_POST['pdt_sku'] != '') {
        $product_sku = $_POST['pdt_sku'];
        global $wpdb;
        $product_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key='_sku' AND meta_value='%s' LIMIT 1", $product_sku ) );
        $request_url= strtok($_SERVER["HTTP_REFERER"], '?');
        $cart_url =  wc_get_cart_url();
        if($request_url == $cart_url) {
            if(!empty($product_id)){
                $product_id = apply_filters('ql_woocommerce_add_to_cart_product_id', $product_id);
                $quantity = 1;
                $passed_validation = apply_filters('ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity);
                $product_status = get_post_status($product_id); 
                if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity) && 'publish' === $product_status) { 
                    do_action('ql_woocommerce_ajax_added_to_cart', $product_id);
                    if ('yes' === get_option('ql_woocommerce_cart_redirect_after_add')) { 
                        wc_add_to_cart_message(array($product_id => $quantity), true); 
                    } 
                    WC_AJAX :: get_refreshed_fragments(); 
                }
                else { 
                    $data = array( 
                        'error' => true,
                        'product_url' => apply_filters('ql_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
                    echo wp_send_json($data);
                }
                wp_die();
            }
            else{
                $sku_msg =  __('This product sku does not exist','astra-child');
                $data = array( 
                    'error' => true,
                    'pdt_msg' =>  $sku_msg);
                echo wp_send_json($data);
           
            }
        }
        else{
            if(!empty($product_id)){
                $sku_msg='';
                wp_send_json_success( ['pdt_msg' => $sku_msg,'pdt_response' => $product_id ]);
            }
            else{
                $sku_msg =  __('This product sku does not exist','astra-child');
                    wp_send_json_success(['pdt_msg' => $sku_msg]);
            }
        }
    //}

}

//  get product by name
add_action( 'wp_ajax_get_pdt_by_name', 'get_pdt_by_name' );
add_action( 'wp_ajax_nopriv_get_pdt_by_name', 'get_pdt_by_name' );

function get_pdt_by_name() {
    if(isset($_POST['pdt_name']) && $_POST['pdt_name'] != '') {
        $product_name = $_POST['pdt_name'];
        $product = get_page_by_title( $product_name, OBJECT, 'product' );
        $product_id = $product->ID;
        $request_url= strtok($_SERVER["HTTP_REFERER"], '?');
        $cart_url =  wc_get_cart_url();
        if($request_url == $cart_url) {
            if(!empty($product_id)){
                $product_id = apply_filters('ql_woocommerce_add_to_cart_product_id', $product_id);
                $quantity = 1;

                $passed_validation = apply_filters('ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity);
                $product_status = get_post_status($product_id); 
                if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity) && 'publish' === $product_status) { 
                    do_action('ql_woocommerce_ajax_added_to_cart', $product_id);
                    if ('yes' === get_option('ql_woocommerce_cart_redirect_after_add')) { 
                        wc_add_to_cart_message(array($product_id => $quantity), true); 
                    } 
                    WC_AJAX :: get_refreshed_fragments(); 
                }
                else { 
                    $data = array( 
                        'error' => true,
                        'product_url' => apply_filters('ql_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
                    echo wp_send_json($data);
                }
                wp_die();
            }
            else{
                $sku_msg =  __('This product name does not exist','astra-child');
                $data = array( 
                    'error' => true,
                    'pdt_msg' =>  $sku_msg);
                echo wp_send_json($data);
           
            }
        }
        else{
            if(!empty($product_id)){
                $sku_msg='';
                wp_send_json_success( ['pdt_msg' => $sku_msg,'pdt_response' => $product_id ]);
           }
           else{
            $sku_msg =  __('This product name does not exist','astra-child');
                wp_send_json_success(['pdt_msg' => $sku_msg]);
           }
        }
    }

}

