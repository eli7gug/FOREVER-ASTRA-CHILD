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
        $args = array(
            'post_type'       => 'product',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => '_sku',
                    'value' => $product_sku,
                    'compare' => 'LIKE'
                )
            )
        );
        $posts = get_posts($args);
        $get_post_ids = array();
        foreach($posts as $post){
            $get_post_ids[] = $post->ID;
        }
       if(!empty($get_post_ids)){
            $sku_msg='';
            wp_send_json_success( ['pdt_msg' => $pdt_msg,'pdt_response' => $get_post_ids ]);
       }
       else{
        $sku_msg =  __('This product sku does not exist','astra-child');
            wp_send_json_success(['pdt_msg' => $sku_msg]);
       }
    //}

}

//  get product by name
add_action( 'wp_ajax_get_pdt_by_name', 'get_pdt_by_name' );
add_action( 'wp_ajax_nopriv_get_pdt_by_name', 'get_pdt_by_name' );

function get_pdt_by_name() {
    //if(isset($_POST['pdt_name']) && $_POST['pdt_name'] != '') {
        $product_sku = $_POST['pdt_name'];
        $args = array(
            'post_type'       => 'product',
            'posts_per_page' => -1,
            'name' => $product_sku

        );
        $posts = get_posts($args);
        $get_post_ids = array();
        foreach($posts as $post){
            $get_post_ids[] = $post->ID;
        }
       if(!empty($get_post_ids)){
            $sku_msg='';
            wp_send_json_success( ['pdt_msg' => $pdt_msg,'pdt_response' => $get_post_ids ]);
       }
       else{
        $sku_msg =  __('This product name does not exist','astra-child');
            wp_send_json_success(['pdt_msg' => $sku_msg]);
       }
    //}

}