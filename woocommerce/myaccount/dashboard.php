<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
$user = wp_get_current_user();
$user_info = get_userdata($user->ID);
$meta_phone = get_user_meta($user->ID, 'billing_phone')[0];
$meta_name = get_user_meta($user->ID, 'first_name')[0].' '.get_user_meta($user->ID, 'last_name')[0];
$meta_email = $user_info->user_email;
$registered_date = $user_info->user_registered;
$meta_birthday = get_user_meta($user->ID, 'account_birth_date')[0];  
$meta_id = get_user_meta($user->ID, 'account_id')[0]; 
$meta_num = get_user_meta($user->ID, 'priority_customer_number')[0]; 
$meta_city = get_user_meta($user->ID, 'billing_city')[0];
$meta_address1 = get_user_meta($user->ID, 'billing_address_1')[0];
$meta_address2 = get_user_meta($user->ID, 'billing_address_2')[0];
$meta_postcode = get_user_meta($user->ID, 'billing_postcode')[0];

$current_meta_agent = get_user_meta($user->ID, 'agent_name')[0];
$current_meta_agent_name = get_user_meta($current_meta_agent, 'first_name')[0].' '.get_user_meta($current_meta_agent, 'last_name')[0] ;
$current_meta_agent_info = get_userdata($current_meta_agent);
$current_meta_agent_email = $current_meta_agent_info->user_email;
$current_meta_agent_num = get_user_meta($current_meta_agent, 'priority_customer_number')[0];
?>

<div class="dsh-account dsh-user">
	<h3>החשבון שלי
	<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account', $name ) ).'#details_box'; ?>" class="dsh-edit"><?php  esc_html__( 'Edit', 'woocommerce' )  ?></a>
	</h3>
	<div class="dsh-box">
	  <div class="dsh-right">
			<p>שם: <span><?php echo $meta_name ?></span></p>
			<p>כתובת מייל: <span><?php echo $meta_email ?></span></p>
			<p>טלפון: <span><?php echo $meta_phone ?></span></p>
			<p>מס' תעודת זהות: <span><?php echo $meta_id ?></span></p>
	  </div>
	  <div class="dsh-left">
		<p>מספר משווק: <span><?php echo $meta_num ?></span></p>
		<p>דרגה: <span>איזה שדה אמור להיות???</span></p> 
		<p>תאריך לידה <span><?php echo $meta_birthday ?></span></p>
		<p>תאריך התטרפות: <span><?php echo $registered_date ?></span></p>
	  </div>
	</div>
</div>

<div class="dsh-account dsh-address">
	<h3><?php esc_html_e( 'My address', 'astra-child' ); ?>
	<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account', $name ) ).'#address_box'; ?>" class="dsh-edit"><?php  esc_html__( 'Edit', 'woocommerce' )  ?></a>
	</h3>
	<div class="dsh-box">
	  <p>
	  <span><?php echo $meta_address1 ?><br>
	  <span><?php echo $meta_address2 ?><br>
	  <span><?php echo $meta_city ?></span><br>
	  <span><?php echo $meta_postcode ?></span>
	  </p>
	</div>
</div>

<div class="dsh-account dsh-sponsor">
	<h3><?php esc_html_e( 'My agent', 'astra-child' ); ?></h3>
	<!-- החונך/ת שלי -->
	<div class="dsh-box">
	  <div class="dsh-right">
	  <!-- spans need to be dynamic -->
	  <p>
		<span class="sponsor-avatar"><img src="https://forever.ussl.shop/wp-content/uploads/2021/04/placeholder-1.png" /></span>
		<span class="sponsor-title"><?php echo $current_meta_agent_name ?></span>
	  </p>	  
	  </div>
	  <div class="dsh-left">
	    <!-- spans need to be dynamic -->
		<p><?php esc_html_e( 'Email:', 'astra-child' ); ?> <span><?php echo ' '.$current_meta_agent_email ?></span></p>
		<!-- כתובת מייל: -->
	    <p><?php esc_html_e( 'Priority customer number:', 'astra-child' ); ?> <span><?php echo ' '.$current_meta_agent_num ?></span></p>
		<!-- מספר משווק: -->
	  </div>
	</div>
</div>



<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
