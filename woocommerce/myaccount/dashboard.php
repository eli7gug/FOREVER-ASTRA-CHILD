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
?>

<div class="dsh-account dsh-user">
	<h3>החשבון שלי
	<button type="button" class="dsh-edit">
	עריכה
	</button>
	</h3>
	<div class="dsh-box">
	  <div class="dsh-right">
	  <!-- spans need to be dynamic -->
	    <p>שם: <span>תמר דובלין</span></p>
		<p>כתובת מייל: <span>tamar@domain.com</span></p>
		<p>טלפון: <span>000-0000000</span></p>
		<p>מס' תעודת זהות: <span>000000000</span></p>
	  </div>
	  <div class="dsh-left">
	    <!-- spans need to be dynamic -->
	    <p>מספר משווק: <span>00000000000000</span></p>
		<p>דרגה: <span>משווק/ת מורשה</span></p>
		<p>תאריך לידה <span>31/12/1990</span></p>
		<p>תאריך התטרפות: <span>31/12/2012</span></p>
	  </div>
	</div>
</div>

<div class="dsh-account dsh-address">
	<h3>הכתובת שלי
	<span class="dsh-edit">
	עריכה
	<span>
	</h3>
	<div class="dsh-box">
	<!-- spans need to be dynamic -->
	  <p>
	  <span>כתובת רחוב 123</span><br>
	  <span>עיר / יישוב</span><br>
	  <span>ישראל</span>
	  </p>
	</div>
</div>

<div class="dsh-account dsh-sponsor">
	<h3>החונך/ת שלי</h3>
	<div class="dsh-box">
	  <div class="dsh-right">
	  <!-- spans need to be dynamic -->
	  <p>
		<span class="sponsor-avatar"><img src="https://forever.ussl.shop/wp-content/uploads/2021/04/placeholder-1.png" /></span>
		<span class="sponsor-title">שם חונך</span>
	  </p>	  
	  </div>
	  <div class="dsh-left">
	    <!-- spans need to be dynamic -->
		<p>כתובת מייל: <span>sponsor@domain.com</span></p>
	    <p>מספר משווק: <span>00000000000000</span></p>
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
