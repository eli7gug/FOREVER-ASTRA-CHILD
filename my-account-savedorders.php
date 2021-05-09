<?php
/**
 * Saved Orders Dashboard
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

<div class="dsh-account dsh-saved-orders">
	<h1>הזמנות שמורות</h1>
	<div class="dsh-saved-orders-wrapper">
		<div class="dsh-saved-orders-item">
		<div class="widget_shopping_cart_content"><?php woocommerce_mini_cart(); ?></div>
		</div>
		<div class="dsh-saved-orders-item">
		<div class="widget_shopping_cart_content"><?php woocommerce_mini_cart(); ?></div>
		</div>
	</div>
</div>





<?php
	/**
	 * My Saved Orders dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_savedorders' );

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