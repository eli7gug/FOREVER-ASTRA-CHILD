<?php

function child_ajax_enqueue() {
	// Enqueue javascript on the frontend.
    wp_enqueue_script( 'select2-script',  get_stylesheet_directory_uri() . '/js/select2.min.js', array('jquery') );
    wp_enqueue_style( 'select2', get_stylesheet_directory_uri().'/css/select2.css' );
    wp_enqueue_script( 'select2-he',  get_stylesheet_directory_uri() . '/js/select2-he.js', array('jquery') );
    wp_enqueue_script('child-ajax-scripts', get_stylesheet_directory_uri() . '/js/ajax-scripts.js', array('jquery'));
    // The wp_localize_script allows us to output the ajax_url path for our script to use.
	wp_localize_script('child-ajax-scripts', 'ajax_obj', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ),'woo_shop_url' => get_permalink( wc_get_page_id( 'shop' ) ) ));
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
        //$product_name = $_POST['pdt_name'];
        // for product with special character
        $product_name = stripslashes($_POST['pdt_name']);
        $product = get_page_by_title( $product_name , OBJECT, 'product' );
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


add_action( 'wp_ajax_get_sponsor_by_city', 'get_sponsor_by_city' );
add_action( 'wp_ajax_nopriv_get_sponsor_by_city', 'get_sponsor_by_city' );

function get_sponsor_by_city(){
    if(isset($_POST['city_selected']) && $_POST['city_selected'] != '') {
        $sponsor_city = $_POST['city_selected'];

        $user_by_city_array = array();

        global $wpdb;
        $sql = "SELECT DISTINCT u.ID FROM $wpdb->users u INNER JOIN $wpdb->usermeta m ON m.user_id = u.ID WHERE 
        (m.meta_key = 'billing_city' AND m.meta_value LIKE '%$sponsor_city%')
        ORDER BY u.user_registered";
        $user_by_city_array = $wpdb->get_results($sql);
        //$users = get_users(); 
        // foreach ($users as $user) {
        //     $user_info = get_userdata($user->ID);
        //     $meta_city = get_user_meta($user->ID, 'billing_city')[0];
        //     // if($meta_city == $sponsor_city){
        //     if (strpos(strtolower($sponsor_city), $meta_city) !== false) {
        //         $user_by_city_array[] = $user->ID;
        //     }
        // }
        $city_key = array_rand($user_by_city_array);
        $city_value = $user_by_city_array[$city_key];
        if(!empty($city_value)){
            $user_id= $city_value->ID;
            $current_meta_agent_name = get_user_meta($user_id, 'first_name')[0].' '.get_user_meta($current_meta_agent, 'last_name')[0] ;
            $current_meta_agent_num = get_user_meta($user_id, 'priority_customer_number')[0];
            $meta_city = get_user_meta($user_id, 'billing_city')[0];
            $meta_address1 = get_user_meta($user_id, 'billing_address_1')[0];
            $meta_phone = get_user_meta($user_id, 'billing_phone')[0];
            
            $sponsor_details[] = array(
                'user_id' => $user_id,
                'current_meta_agent_num' => $current_meta_agent_num,
                'current_meta_agent_name' => $current_meta_agent_name,
                'meta_address1' => $meta_address1 ,
                'meta_phone' => $meta_phone,
                'meta_city' => $meta_city,
            );
            $sponsor_msg='';
            wp_send_json_success( ['msg' => $sponsor_msg, 'sponsor' => $sponsor_details ]); 
        }
        else{
            $sponsor_msg =  __('No Sponsors available for the last search.','astra-child');
            wp_send_json_success(['msg' => $sponsor_msg]);
        }
    }
}

add_action( 'wp_ajax_get_sponsor_by_name', 'get_sponsor_by_name' );
add_action( 'wp_ajax_nopriv_get_sponsor_by_name', 'get_sponsor_by_name' );

function get_sponsor_by_name(){
    if(isset($_POST['sponsor_selected']) && $_POST['sponsor_selected'] != '') {
        $sponsor_id = $_POST['sponsor_selected'];
        if(!empty($sponsor_id)){
            $current_meta_agent_name = get_user_meta($sponsor_id, 'first_name')[0].' '.get_user_meta($current_meta_agent, 'last_name')[0] ;
            $current_meta_agent_num = get_user_meta($sponsor_id, 'priority_customer_number')[0];
            $meta_city = get_user_meta($sponsor_id, 'billing_city')[0];
            $meta_address1 = get_user_meta($sponsor_id, 'billing_address_1')[0];
            $meta_phone = get_user_meta($sponsor_id, 'billing_phone')[0];
            
            $sponsor_details[] = array(
                'user_id' => $city_value,
                'current_meta_agent_num' => $current_meta_agent_num,
                'current_meta_agent_name' => $current_meta_agent_name,
                'meta_address1' => $meta_address1 ,
                'meta_phone' => $meta_phone,
                'meta_city' => $meta_city,
            );
            $sponsor_msg='';
            wp_send_json_success( ['msg' => $sponsor_msg, 'sponsor' => $sponsor_details ]); 
        }
        else{
            $sponsor_msg =  __('No Sponsors available for the last search.','astra-child');
            wp_send_json_success(['msg' => $sponsor_msg]);
        }
    }
}

add_action( 'wp_ajax_search_sponsor', 'search_sponsor' );
add_action( 'wp_ajax_nopriv_search_sponsor', 'search_sponsor' );
function search_sponsor(){

    $search = $_GET['q'] ;
    global $wpdb;
    $sql = "SELECT DISTINCT u.ID FROM $wpdb->users u INNER JOIN $wpdb->usermeta m ON m.user_id = u.ID WHERE 
    (m.meta_key = 'first_name' AND m.meta_value LIKE '%$search%') OR 
    (m.meta_key = 'last_name' AND m.meta_value LIKE '%$search%') OR
    (m.meta_key = 'priority_customer_number' AND m.meta_value LIKE '%$search%') OR
    (u.user_email LIKE '%$search%') OR
    (m.meta_key = 'billing_phone' AND m.meta_value LIKE '%$search%') 
    ORDER BY u.user_registered";
    $results = $wpdb->get_results($sql);
    $user_detail = array();
    foreach ( $results as $key=>$user ) {
        $meta_number = get_user_meta($user->ID, 'priority_customer_number')[0];
        $meta_name = get_user_meta($user->ID, 'first_name')[0].' '.get_user_meta($user->ID, 'last_name')[0];
        $user_detail[] = array(
            'id' => $user->ID,
            'text' => $meta_name.' '.$meta_number
        );
 
    }
    echo json_encode($user_detail);die;
    

}


add_action( 'wp_ajax_create_customer_order', 'create_customer_order' );
add_action( 'wp_ajax_nopriv_create_customer_order', 'create_customer_order' );

function create_customer_order(){
    $retrive_data = WC()->session->get( 'session_vars' );
    if(!empty($retrive_data )){
        WC()->session->set('session_vars',array('customertype' => '' ));
    }
    if(isset($_POST['cust_type'])){
        $customer_type = $_POST['cust_type'];   
        WC()->session->set('session_vars', array('customertype' => $customer_type )); 
    }
}


add_action( 'wp_ajax_unset_customer_order_session', 'unset_customer_order_session' );
add_action( 'wp_ajax_nopriv_unset_customer_order_session', 'unset_customer_order_session' );

function unset_customer_order_session(){
    $retrive_data = WC()->session->get( 'session_vars' );
    if(!empty($retrive_data )){
        WC()->session->set('session_vars',array('customertype' => '' ));
    }
}
