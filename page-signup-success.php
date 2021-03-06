<?php
/**
 * Template Name: Signup Success Page
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>



	<div id="primary" class="success-pages" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>
		
		<p class="success-email-message">
			<?php echo __('Email Information sent to email', 'astra-child')?> 
			<span>
				<?php 
					$current_user = wp_get_current_user();
					echo $current_user->user_email;
				?>
			</span>
		</p>
		<div class="cart-page-buttons">
			<div class="wc-proceed-to-checkout">
				<a class="button back-to-shop" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php echo __('Back to shop', 'astra-child')?></a>
			</div>
			<div class="wc-proceed-to-checkout">
				<a class="button go-to-account" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php echo __('To my account', 'astra-child')?> </a>
			</div>
		</div>
		
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->



<?php get_footer(); ?>
