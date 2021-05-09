<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra-child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'ASTRA_CHILD_THEME_VERSION', '1.0.1' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), ASTRA_CHILD_THEME_VERSION, 'all' );
    wp_enqueue_style( 'select2', get_stylesheet_directory_uri().'/css/select2.css' );
	wp_enqueue_script( 'select2', get_stylesheet_directory_uri() . '/js/select2.min.js', array( 'jquery' ) );
    wp_register_script('custom-js',get_stylesheet_directory_uri().'/js/custom.js',array(),time());
    wp_enqueue_script( 'custom-js' );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );
add_theme_support('woocommerce');


/**
 * Add SKU before price
 */
add_filter( 'woocommerce_get_price_html', 'custom_sku_after_price_loop' );
function custom_sku_after_price_loop( $price ) { 
    global $product;
    if ( $product->get_sku() ) {
        $sku = $product->get_sku();
        return $price . '<span class="product-sku">' . $sku . '</span>';
    }else { 
        return $price; 
    } 
}

/**
 * Remove Reviews tab
 */
add_filter( 'woocommerce_product_tabs', 'wpd_wc_remove_product_review_tab', 15 );
function wpd_wc_remove_product_review_tab( $tabs ) {
    //Removing Reviews tab
    if ( comments_open() ) {
        unset( $tabs['reviews'] );
    }
    
    return $tabs;
}
/**
 * Add custom CSS class to body tag.
 * We shall use this class into the CSS
 */
add_filter( 'body_class', 'wpd_add_new_class' );
function wpd_add_new_class( $classes ) {
    if( comments_open() && is_singular( 'product' ) ) {
        $classes[] = 'has-reviews';
    }
    
    return $classes;
}
/**
 * Add the product reviews
 */
add_action( 'woocommerce_after_single_product_summary', 'wpd_wc_add_product_reviews', 25 );
function wpd_wc_add_product_reviews() {
    global $product;
 
    if ( ! comments_open() )
        return;
?>
    <div class="product-reviews">
        <h2 class="review-title" itemprop="headline">
            <?php printf( __( 'Reviews (%d)', 'woocommerce' ), $product->get_review_count() ); ?>
        </h2>
        <?php call_user_func( 'comments_template', 999 ); ?>
    </div>
    <div class="clearfix clear"></div>
<?php
}

/**
 *Remove all possible fields
 **/
function wc_remove_checkout_fields( $fields ) {

    // Billing fields
    //unset( $fields['billing']['billing_company'] );
    //unset( $fields['billing']['billing_email'] );
    //unset( $fields['billing']['billing_phone'] );
    unset( $fields['billing']['billing_state'] );
	unset( $fields['billing']['billing_country'] );
    //unset( $fields['billing']['billing_first_name'] );
    //unset( $fields['billing']['billing_last_name'] );
    //unset( $fields['billing']['billing_address_1'] );
    unset( $fields['billing']['billing_address_2'] );
    //unset( $fields['billing']['billing_city'] );
    //unset( $fields['billing']['billing_postcode'] );

    // Shipping fields
    //unset( $fields['shipping']['shipping_company'] );
    //unset( $fields['shipping']['shipping_phone'] );
    unset( $fields['shipping']['shipping_state'] );
	unset( $fields['shipping']['shipping_country'] );
    //unset( $fields['shipping']['shipping_first_name'] );
    //unset( $fields['shipping']['shipping_last_name'] );
    //unset( $fields['shipping']['shipping_address_1'] );
    unset( $fields['shipping']['shipping_address_2'] );
    //unset( $fields['shipping']['shipping_city'] );
    //unset( $fields['shipping']['shipping_postcode'] );

    // Order fields
    //unset( $fields['order']['order_comments'] );

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'wc_remove_checkout_fields' );

/**
*Reorder billing fields
**/
add_filter( 'woocommerce_checkout_fields', 'forever_city_first' );
 
function forever_city_first( $checkout_fields ) {
	$checkout_fields['billing']['billing_postcode']['priority'] = 64;
	return $checkout_fields;
}

/**
 *Add Product images to checkout Page
**/

add_filter( 'woocommerce_cart_item_name', 'ts_product_image_on_checkout', 10, 3 );

function ts_product_image_on_checkout( $name, $cart_item, $cart_item_key ) {  

    /* Return if not checkout page */
    if ( ! is_checkout() ) {
        return $name;
    }

    /* Get product object */
    $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

    /* Get product thumbnail */
    $thumbnail = $_product->get_image();

    /* Add wrapper to image and add some css */
    $image = '<div class="ts-product-image" style="width: 52px; height: 45px; display: inline-block; padding-right: 7px; vertical-align: middle;">'
                . $thumbnail .
            '</div>';

    /* Prepend image to name and return it */
    return $image . $name;

}


/**
* Add Product images to checkout Page
**/

function astra_get_search_form( $echo = true ) {

    $form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
        <label>
            <span class="screen-reader-text">' . _x( 'Search for:', 'label', 'astra' ) . '</span>
            <input type="search" class="search-field" ' . apply_filters( 'astra_search_field_toggle_data_attrs', '' ) . ' placeholder="' . esc_attr_x( 'חיפוש', 'placeholder', 'astra' ) . '" value="' . get_search_query() . '" name="s" role="search" tabindex="-1"/>
        </label>
        <button type="submit" class="search-submit" value="' . esc_attr__( 'Search', 'astra' ) . '"><i class="astra-search-icon"></i></button>
    </form>';
  
  // Replace My Placeholder with your desired string.

    $result = apply_filters( 'astra_get_search_form', $form );

    if ( null === $result ) {
        $result = $form;
    }

    if ( $echo ) {
        echo $result;
    } else {
        return $result;
    }
}


/**
* Add Custom Attributes CC to single product
**/
function sp_titles_template_variables_array($array) {
	$array[] = 'wc_product_attributes';
	return $array;
}
add_filter('seopress_titles_template_variables_array', 'sp_titles_template_variables_array');

function sp_titles_template_replace_array($array) {
	$data = get_post_meta(get_the_ID(), '_product_attributes');

	if (!empty($data)) {
		$html = NULL;
		foreach($data as $key => $value) {
			foreach($value as $_key => $_value) {
				if ($_value['is_taxonomy'] == 0) {//include only custom product attributes
					$html .= esc_attr($_value['value']) . ' - ';
				}
			}	
		} 
	}
	$array[] = $html;
	return $array;
}
add_filter('seopress_titles_template_replace_array', 'sp_titles_template_replace_array');

/**
* Display Attributes CC in meta of single product
**/
add_action ( 'woocommerce_product_meta_end', 'show_attributes', 25 );
function show_attributes() {
  global $product;
  wc_display_product_attributes( $product );
}


/**
  * Register new endpoints to use inside My Account page.
  */
 add_action( 'init', 'my_account_new_endpoints' );

 function my_account_new_endpoints() {
 	add_rewrite_endpoint( 'savedorders', EP_ROOT | EP_PAGES );
	add_rewrite_endpoint( 'savedaddresses', EP_ROOT | EP_PAGES );
 }

  /**
  * Get new endpoint content
  */
  // Saved Orders
 add_action( 'woocommerce_account_savedaddresses_endpoint', 'savedaddresses_endpoint_content' );
 function savedaddresses_endpoint_content() {
     get_template_part('my-account-savedaddresses');
 } 
 /**
  * Get new endpoint content
  */
  // Saved Orders
 add_action( 'woocommerce_account_savedorders_endpoint', 'savedorders_endpoint_content' );
 function savedorders_endpoint_content() {
     get_template_part('my-account-savedorders');
 }

 

 
 
 
 /**
  * Edit my account menu order
  */

 function my_account_menu_order() {
 	$menuOrder = array(
 		
		'dashboard'          => __( 'החשבון שלי', 'woocommerce' ),
		'orders'             => __( 'היסטוריית הזמנות', 'woocommerce' ),
		'savedaddresses'     => __( 'כתובות שמורות', 'woocommerce' ),
 		'savedorders'        => __( 'הזמנות שמורות', 'woocommerce' ),
 		'edit-account'    	 => __( 'שינוי סיסמה', 'woocommerce' ),
 		'customer-logout'    => __( 'Logout', 'woocommerce' )
 	);
 	return $menuOrder;
 }
 //add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );


 /* elicheva */


// Check and validate the mobile phone
add_action( 'woocommerce_save_account_details_errors','extra_field_validation', 20, 1 );
function extra_field_validation( $args ){
    if ( isset($_POST['billing_phone']) && empty($_POST['billing_phone']) )
        $args->add( 'error', __( 'Please fill in your phone', 'woocommerce' ),'');
    if ( isset($_POST['account_full_name']) && empty($_POST['account_full_name']) )
        $args->add( 'error', __( 'Please fill in your full name', 'woocommerce' ),'');
    if ( isset($_POST['account_birth_date']) && empty($_POST['account_birth_date']) )
        wc_add_notice( __( 'Please enter your date of birth.', 'astra-child' ), 'error' );
}

// Save the mobile phone value to user data
add_action( 'woocommerce_save_account_details', 'my_account_saving_extra_field', 20, 1 );
add_action( 'personal_options_update', 'my_account_saving_extra_field' );
add_action( 'edit_user_profile_update', 'my_account_saving_extra_field' );
function my_account_saving_extra_field( $user_id ) {
    if( isset($_POST['billing_phone']) && ! empty($_POST['billing_phone']) )
        update_user_meta( $user_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']) );
    if( isset($_POST['account_full_name']) && ! empty($_POST['account_full_name']) )
        update_user_meta( $user_id, 'account_full_name', sanitize_text_field($_POST['account_full_name']) );
    if( isset($_POST['account_birth_date']) && ! empty($_POST['account_full_name']) )
        update_user_meta( $user_id, 'account_birth_date', sanitize_text_field($_POST['account_birth_date']) );
    if( isset($_POST['account_id']) && ! empty($_POST['account_id']) )
        update_user_meta( $user_id, 'account_id', sanitize_text_field($_POST['account_id']) );
    if( isset($_POST['agent_name']) ){
        $selected = $_POST['agent_name'];
        echo  $selected ;
        update_user_meta( $user_id, 'agent_name', $_POST['agent_name'] );
    }
        
}


// ADDING CUSTOM FIELD TO INDIVIDUAL USER SETTINGS PAGE IN BACKEND
add_action( 'show_user_profile', 'add_extra_fields' );
add_action( 'edit_user_profile', 'add_extra_fields' );
function add_extra_fields( $user )
{
    ?>
        <h3><?php _e("Extra fields", "astra-child"); ?></h3>
        <table class="form-table">
            <tr>
                <th><label for="account_full_name"><?php _e("Full name", "astra-child"); ?> </label></th>
                <td><input type="text" name="account_full_name" value="<?php echo esc_attr(get_user_meta( $user->ID, 'account_full_name', true )); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="account_birth_date"><?php _e("Birth Date", "astra-child"); ?> </label></th>
                <td><input type="date" name="account_birth_date" value="<?php echo esc_attr(get_user_meta( $user->ID, 'account_birth_date', true )); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="account_id"><?php _e("ID Number", "astra-child"); ?> </label></th>
                <td><input type="text" name="account_id" value="<?php echo esc_attr(get_user_meta( $user->ID, 'account_id', true )); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="agent_name"><?php _e("Agent Name", "astra-child"); ?> </label></th>
                <td><input type="text" readonly  name="agent_name" value="<?php echo esc_attr(get_user_meta( $user->ID, 'agent_name', true )); ?>" class="regular-text" /></td>
            </tr>
        </table>
        <br />
    <?php
}





/*
* Remove Default Billing and Shipping Fields
*/
add_filter( 'woocommerce_default_address_fields', 'misha_remove_fields' );
 
function misha_remove_fields( $fields ) {
 
	//unset( $fields[ 'first_name' ] );
	return $fields;
 
}
 