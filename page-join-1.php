<?php
/**
 * Template Name: Join First Page
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>



	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>
		
		<ul class="steps">
			<li class="step first-step active-step"><span class="step-link">1</span></li>
			<li class="step second-step"><span class="step-link">2</span></li>
			<li class="step third-step"><span class="step-link">3</span></li>
			<li class="step last-step"><span class="step-link">4</span></li>
		</ul>
		
		<?php astra_content_page_loop(); ?>
		
		<div class="cart-page-buttons success-pages">
			<div class="wc-proceed-to-checkout">
				<a class="button back-to-shop" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">למוצרים נוספים</a>
			</div>
			<div class="wc-proceed-to-checkout">
				<!-- Change to dynamic link!!! --><a class="button go-to-account" href="https://forever.ussl.shop/join-step-2/">המשך</a>
			</div>
		</div>
		
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->



<?php get_footer(); ?>
