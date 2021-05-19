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
    wp_register_script('custom-js',get_stylesheet_directory_uri().'/js/custom.js', ['jquery'],time());
    wp_enqueue_script( 'custom-js' );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );
add_theme_support('woocommerce');

if (!session_id()){
    session_start();
}


/**
 * Ajax Functions
 */
require get_theme_file_path() . '/ajax-functions.php';


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
    if( is_singular( 'product' ) ) {
        $custom_terms = get_the_terms(0, 'product_cat');
        if ($custom_terms) {
          foreach ($custom_terms as $custom_term) {
            $classes[] = 'product_cat_' . $custom_term->slug;
          }
        }
    }
    
    return $tabs;
}
/**
 * Add custom CSS class to body tag.
 * We shall use this class into the CSS
 */
/**
 * Add custom CSS class to body tag.
 * We shall use this class into the CSS
 */
add_filter( 'body_class', 'wpd_add_new_class' );
function wpd_add_new_class( $classes ) {
    if( comments_open() && is_singular( 'product' ) ) {
        $classes[] = 'has-reviews';
    }
    if( is_singular( 'product' ) ) {
      $custom_terms = get_the_terms(0, 'product_cat');
      if ($custom_terms) {
        foreach ($custom_terms as $custom_term) {
          $classes[] = 'product_cat_' . $custom_term->slug;
        }
      }
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
 		
		'dashboard'          => __( 'Dashboard', 'woocommerce' ),
        'edit-account'    	=> __( 'Account details', 'woocommerce' ),
        'orders'             => __( 'Order history', 'asta-child' ),
        'saved-carts'        => __( 'Saved Carts', 'asta-child' ),
		//'orders'             => __( 'היסטוריית הזמנות', 'woocommerce' ),
        'edit-address'       => __( 'Addresses', 'woocommerce' ),
		'savedaddresses'     => __( 'כתובות שמורות', 'woocommerce' ),
 		//'savedorders'        => __( 'הזמנות שמורות', 'woocommerce' ),
 		'customer-logout'    => __( 'Logout', 'woocommerce' )
 	);
 	return $menuOrder;
 }
 add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );


 /* elicheva */


// Check and validate the extra account field
add_action( 'woocommerce_save_account_details_errors','extra_field_validation', 20, 1 );
function extra_field_validation( $args ){

    if ( isset($_POST['billing_phone']) && empty($_POST['billing_phone']) )
        $args->add( 'error', __( 'Please fill in your phone', 'woocommerce' ),'');
    if ( isset($_POST['account_first_name_english']) && empty($_POST['account_first_name_english']) )
        $args->add( 'error', __( 'Please fill in your first name english', 'woocommerce' ),'');
    if ( isset($_POST['account_last_name_english']) && empty($_POST['account_last_name_english']) )
        $args->add( 'error', __( 'Please fill in your last name english', 'woocommerce' ),'');
    if ( isset($_POST['account_birth_date']) && empty($_POST['account_birth_date']) )
        wc_add_notice( __( 'Please enter your date of birth.', 'astra-child' ), 'error' );
    if ( isset($_POST['account_id']) && empty($_POST['account_id']) )
        wc_add_notice( __( 'Please enter your id.', 'astra-child' ), 'error' );
    if (  isset($_POST['agent_name']) &&  ($_POST['agent_name'])=='0' )
        wc_add_notice( __( 'Please choose your agent.', 'astra-child' ), 'error' );
    if ( isset($_POST['billing_city']) && empty($_POST['billing_city']) )
        wc_add_notice( __( 'Please enter your city.', 'astra-child' ), 'error' );
    if ( isset($_POST['billing_address_1']) && empty($_POST['billing_address_1']) )
        wc_add_notice( __( 'Please enter your address.', 'astra-child' ), 'error' );
    if ( isset($_POST['billing_postcode']) && empty($_POST['billing_postcode']) )
        wc_add_notice( __( 'Please enter your postcode.', 'astra-child' ), 'error' );
    if ( isset($_POST['account_confirm_email']) && empty($_POST['account_confirm_email']) )
        wc_add_notice( __( 'Please enter your confirmation email.', 'astra-child' ), 'error' );
    if ( isset($_POST['account_confirm_email']) && !empty($_POST['account_confirm_email']) ){
        $email1 = $_POST['account_email'];
        $email2 = $_POST['account_confirm_email'];
        if ( $email2 !== $email1 ) {
            wc_add_notice(  __( 'Your email addresses do not match', 'astra-child' ), 'error' );
        }
    }
}

/**
* register fields Validating.
*/
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
    if ( isset( $_POST['first_name'] ) && empty( $_POST['first_name'] ) ) {
        $validation_errors->add( 'first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['last_name'] ) && empty( $_POST['last_name'] ) ) {
           $validation_errors->add( 'last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
    if ( isset($_POST['billing_phone']) && empty($_POST['billing_phone']) )
        $validation_errors->add( 'billing_phone_error', __( '<strong>Error</strong>: phone is required!.', 'woocommerce' ) );
    if ( isset($_POST['account_first_name_english']) && empty($_POST['account_first_name_english']) )
        $validation_errors->add( 'account_first_name_english_error', __( '<strong>Error</strong>: first name english is required!.', 'woocommerce' ) );
    if ( isset($_POST['account_last_name_english']) && empty($_POST['account_last_name_english']) )
        $validation_errors->add( 'account_last_name_english_error', __( '<strong>Error</strong>: Last name english is required!.', 'woocommerce' ) );
    if ( isset($_POST['account_birth_date']) && empty($_POST['account_birth_date']) )
        $validation_errors->add( 'account_birth_date_error', __( '<strong>Error</strong>: date of birth is required!.', 'woocommerce' ) );
    if ( isset($_POST['account_id']) && empty($_POST['account_id']) )
        $validation_errors->add( 'account_id_error', __( '<strong>Error</strong>: Id is required!.', 'woocommerce' ) );
    if ( isset($_POST['agent_name']) && ($_POST['agent_name'])=='0' )
        $validation_errors->add( 'agent_name_error', __( '<strong>Error</strong>: Agent is required!.', 'woocommerce' ) );
    if ( isset($_POST['billing_city']) && empty($_POST['billing_city']) )
        $validation_errors->add( 'billing_city_error', __( '<strong>Error</strong>: City of birth is required!.', 'woocommerce' ) );
    if ( isset($_POST['billing_address_1']) && empty($_POST['billing_address_1']) )
        $validation_errors->add( 'billing_address_1_error', __( '<strong>Error</strong>: Address is required!.', 'woocommerce' ) );
    if ( isset($_POST['billing_postcode']) && empty($_POST['billing_postcode']) )
        $validation_errors->add( 'billing_postcode_error', __( '<strong>Error</strong>: Postcode is required!.', 'woocommerce' ) );
    if ( isset($_POST['account_confirm_email']) && empty($_POST['account_confirm_email']) )
        $validation_errors->add( 'account_confirm_email_error', __( '<strong>Error</strong>: Confirmation email is required!.', 'woocommerce' ) );
    if ( isset($_POST['account_confirm_email']) && !empty($_POST['account_confirm_email']) ){
        $email1 = $_POST['email'];
        $email2 = $_POST['account_confirm_email'];
        if ( $email2 !== $email1 ) {
            $validation_errors->add( 'account_confirm_email_error', __( '<strong>Error</strong>: Your email addresses do not match.', 'woocommerce' ) );
            //wc_add_notice(  __( 'Your email addresses do not match', 'astra-child' ), 'error' );
        }
    }
    return $validation_errors;
}
add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );

add_action( 'woocommerce_created_customer', 'register_saving_extra_field' );
function register_saving_extra_field( $user_id ) {
    if ( isset( $_POST['first_name'] ) ) {
		update_user_meta( $user_id, 'first_name', wc_clean( $_POST['first_name'] ) );
	}
    if ( isset( $_POST['last_name'] ) ) {
		update_user_meta( $user_id, 'last_name', wc_clean( $_POST['last_name'] ) );
	}

}
// Save the extra field value to user data
add_action( 'woocommerce_created_customer', 'my_account_saving_extra_field' );
add_action( 'woocommerce_save_account_details', 'my_account_saving_extra_field', 20, 1 );
add_action( 'personal_options_update', 'my_account_saving_extra_field' );
add_action( 'edit_user_profile_update', 'my_account_saving_extra_field' );
function my_account_saving_extra_field( $user_id ) {

    if( isset($_POST['billing_phone']) && ! empty($_POST['billing_phone']) )
        update_user_meta( $user_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']) );
    if( isset($_POST['account_first_name_english']) && ! empty($_POST['account_first_name_english']) )
        update_user_meta( $user_id, 'account_first_name_english', sanitize_text_field($_POST['account_first_name_english']) );
    if( isset($_POST['account_last_name_english']) && ! empty($_POST['account_last_name_english']) )
        update_user_meta( $user_id, 'account_last_name_english', sanitize_text_field($_POST['account_last_name_english']) );
    if( isset($_POST['account_birth_date']) && ! empty($_POST['account_birth_date']) )
        update_user_meta( $user_id, 'account_birth_date', sanitize_text_field($_POST['account_birth_date']) );
    if( isset($_POST['account_id']) && ! empty($_POST['account_id']) )
        update_user_meta( $user_id, 'account_id', sanitize_text_field($_POST['account_id']) );
    if( isset($_POST['agent_name']))
        update_user_meta( $user_id, 'agent_name', $_POST['agent_name'] );
    if( isset($_POST['sponsor_contact']) )
        update_user_meta( $user_id, 'sponsor_contact', $_POST['sponsor_contact'] );
    if( isset($_POST['billing_city']) && ! empty($_POST['billing_city']) )
        update_user_meta( $user_id, 'billing_city', sanitize_text_field($_POST['billing_city']) );
    if( isset($_POST['billing_address_1']) && ! empty($_POST['billing_address_1']) )
        update_user_meta( $user_id, 'billing_address_1', sanitize_text_field($_POST['billing_address_1']) );
    if( isset($_POST['billing_address_2']) && ! empty($_POST['billing_address_2']) )
        update_user_meta( $user_id, 'billing_address_2', sanitize_text_field($_POST['billing_address_2']) );
    if( isset($_POST['billing_postcode']) && ! empty($_POST['billing_postcode']) )
        update_user_meta( $user_id, 'billing_postcode', sanitize_text_field($_POST['billing_postcode']) );
        
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
                <th><label for="account_first_name_english"><?php _e("First name english", "astra-child"); ?> </label></th>
                <td><input type="text" name="account_first_name_english" value="<?php echo esc_attr(get_user_meta( $user->ID, 'account_first_name_english', true )); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="account_last_name_english"><?php _e("Last name english", "astra-child"); ?> </label></th>
                <td><input type="text" name="account_last_name_english" value="<?php echo esc_attr(get_user_meta( $user->ID, 'account_last_name_english', true )); ?>" class="regular-text" /></td>
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
                <th><label for="agent_name"><?php _e("Agent ID", "astra-child"); ?> </label></th>
                <td><input type="text" readonly  name="agent_name" value="<?php echo esc_attr(get_user_meta( $user->ID, 'agent_name', true )); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="sponsor_contact"><?php _e("Sponsor Contact?", "astra-child"); ?> </label></th>
                <td>						
                    <input type="radio" class="input-radio" name="sponsor_contact" id="signup_sponsor_contact_yes"  <?php  checked( get_user_meta( $user->ID, 'sponsor_contact', true ), 'yes' ); ?>  value="yes">
                    <label for="signup_sponsor_contact_yes" class="">כן</label><br>
                    <input type="radio" class="input-radio" name="sponsor_contact" id="signup_sponsor_contact_no"  <?php  checked( get_user_meta( $user->ID, 'sponsor_contact', true ), 'no' ); ?> value="no">
                    <label for="signup_sponsor_contact_no" class="">לא</label></td>
            </tr>
        </table>
        <br />
    <?php
}

function ur_theme_start_session()
{

}
add_action("init", "ur_theme_start_session", 1);


// add to url agent id on registration
function add_agent_param(){
    $user_id = get_current_user_id();
    $current_meta_agent = get_user_meta($user_id, 'agent_name', true);
    $userdata = get_userdata( $user_id );
    $location = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];


    //if register
    if ( is_user_logged_in()){
        if(isset($_COOKIE['agent'])){
             unset($_COOKIE['agent']);
             setcookie('agent', '', time() - 3600,'/');
        }
        if( !is_admin() && !isset($_GET['agent']) ){
            //some parameters are set
            if(count($_GET)) {
                $location .= "&agent=$user_id";
            }
            else{
            $location .= "?agent=$user_id";
            }
            //$location = esc_url(add_query_arg('agent', $current_meta_agent));
            // setcookie('agent', $_GET['agent'],'','/');
             wp_redirect( $location );
        }
    }
    // not register 
    else{
        if(isset($_COOKIE['agent'])){
            if(!$_GET['agent']){
                //$location = esc_url(add_query_arg('agent', $_COOKIE['agent']));
                //wp_redirect($location);
            }
            else{
                $agent_cookie = $_COOKIE['agent'];
                $agent_get =  $_GET['agent'];
                if($agent_get != $agent_cookie){
                    // empty value and expiration one hour before
                    // unset($agent_cookie); 
                    // setcookie('agent', '', time() - 3600);
                    setcookie('agent', $agent_get,'','/');
                }
            }
        }
        else{
            if(isset($_GET['agent'])){
                $agent= $_GET['agent'];
                setcookie('agent', $_GET['agent'],'',"/");
            }
        }
          
    }

}

add_action('template_redirect', 'add_agent_param'); 


add_action( 'wp_login','wpdocs_ahir_redirect_after_logout' );
add_action( 'wp_logout','wpdocs_ahir_redirect_after_logout' );
function wpdocs_ahir_redirect_after_logout() {
    wp_safe_redirect( home_url() );
    exit();
}


//add CC field under price in product
add_action( 'woocommerce_product_options_pricing', 'misha_adv_product_options');
function misha_adv_product_options(){
 
	echo '<div class="options_group">';
 
	woocommerce_wp_text_input( array(
		'id'      => 'cc_value',
		'value'   => get_post_meta( get_the_ID(), 'cc_value', true ),
		'label'   => __('CC value', 'astra-child'),
	) );
 
	echo '</div>';
 
}
 
add_action( 'woocommerce_process_product_meta', 'misha_save_fields', 10, 2 );
function misha_save_fields( $id, $post ){
		update_post_meta( $id, 'cc_value', $_POST['cc_value'] );
}



/*
* quick order update quantity for adding to cart
*/
function cs_wc_loop_add_to_cart_scripts() {
    $classes = get_body_class();
    if (in_array('page-template-page-quick-order',$classes))  : ?>

<script>
    jQuery( document ).ready( function( $ ) {
        $( document ).on( 'change', '.quantity .qty', function() {
            $( this ).parent( '.quantity' ).next( '.add_to_cart_button' ).attr( 'data-quantity', $( this ).val() );
        });
    });
</script>

    <?php endif;
}

add_action( 'wp_footer', 'cs_wc_loop_add_to_cart_scripts' );

/*
* Calculate total CC
*/

function get_total_CC(){
    $total_cc = 0;
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
        $qtty = $cart_item['quantity'];
        $cc = $_product->get_meta( 'cc_value', true );
        $total_cc += ($qtty * (float)$cc);
   }
   return $total_cc;

}



add_action( 'wp_loaded', 'custom_woocommerce_empty_cart_action', 20 );
function custom_woocommerce_empty_cart_action() {
    // delete all products in cart
	if( isset( $_POST['empty_cart'] ) && $_SERVER['REQUEST_METHOD'] == "POST" ) {
		WC()->cart->empty_cart();
		//$referer  = wp_get_referer() ? esc_url( remove_query_arg( 'empty_cart' ) ) : wc_get_cart_url();
		wp_safe_redirect(  wc_get_cart_url() );
	}
    // //search product by sku
    // if(isset($_REQUEST['search-by-sku']) && $_REQUEST['search-by-sku'] != '') {
    //     $sku= $_REQUEST['search-by-sku'];
    //     global $wpdb;
    //     $product_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key='_sku' AND meta_value='%s' LIMIT 1", $sku ) );
    //     if ( $product_id ){
    //         WC()->cart->add_to_cart( $product_id, 1 );
    //         wp_safe_redirect( wc_get_cart_url() );
    //     }
    //     else{
    //         $msg = "<p class='pdt_msg_error'>".__('This product sku does not exist','astra-child'). "</p>";
    //     }
    // }
    // //search product by name
    // if(isset($_REQUEST['search-by-name']) && $_REQUEST['search-by-name'] != '') {
    //     $product_name= $_REQUEST['search-by-name'];
    //     $product = get_page_by_title( $product_name, OBJECT, 'product' );
    //     $product_id = $product->ID;
    //     if ( $product_id ){
    //         WC()->cart->add_to_cart( $product_id, 1 );
    //         wp_safe_redirect( wc_get_cart_url() );
    //     }
    //     else{
    //         $msg = "<p class='pdt_msg_error'>".__('This product name does not exist','astra-child'). "</p>";
    //         echo $msg;
    //     }
    // }
}

// display cc value after price
add_filter( 'woocommerce_get_price_html', 'cc_value_after_price_loop' );
function cc_value_after_price_loop( $price ) { 
    global $product;
    $cc = $product->get_meta( 'cc_value', true );
    if ( !empty($cc) ) {
        return $price . '<span class="product-cc">' .' | '. $cc .' CC</span>';
    }else { 
        return $price; 
    } 
}


