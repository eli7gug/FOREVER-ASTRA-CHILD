<?php
/**
 * Template Name: Join Second Page
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
			<!-- Change link to dynamic!!! --><li class="step first-step past-step"><a class="step-link" href="https://forever.ussl.shop/join-step-1/">1</a></li>
			<li class="step second-step active-step"><span class="step-link">2</span></li>
			<li class="step third-step"><span class="step-link">3</span></li>
			<li class="step last-step"><span class="step-link">4</span></li>
		</ul>
		
		<?php astra_content_page_loop(); ?>
		
		<div class="second-step-box">
			<div class="second-step-title">
				<h1>ברוכים הבאים למשפחת Forever!</h1>
				<a class="second-step-to-shop" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">המשך קנייה</a>
			</div>
			
			<p>ברכות על הצטרפותכם . אתה זכאי ל -30% הנחה על רכישות עתידיות ויש לך הזדמנות להרוויח בונוסים ותמריצים באמצעות תוכנית השיווק שלנו. אנא הסכים להודעת הפרטיות ולמדיניות החברה, והצטרף להיות בעל עסק לנצח על ידי סימון התיבות שלהלן.</p>
			
			<form >
				<div>
					<input type="checkbox" id="agree" name="agree">
					<label for="agree">אני מסכימ/ה להצטרף כבעלת עסק ב-Forever</label>
				</div>
				<div>
					<input type="checkbox" id="terms" name="terms">
					<label for="terms">קראתי ואני מסכימ/ה לנהלי החברה </label>
				</div>
				<div>
					<input type="checkbox" id="privacy" name="privacy">
					<label for="privacy">אני מסכימ/ה לתנאי הפרטיות</label>
				</div>
			</form>
		</div>
		
		<div class="cart-holder">
		<!-- Checkout button needs to lead to Signup page first -->
			<?php echo do_shortcode( '[woocommerce_cart]' ); ?>
		</div>

		<div class="cart-page-buttons success-pages">
			<div class="wc-proceed-to-checkout">
				<a class="button back-to-shop" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">חזרה לחנות</a>
			</div>
			<div class="wc-proceed-to-checkout">
				<!-- Change to dynamic link!!! --><a class="button go-to-account" href="http://localhost/forever/my-account/edit-account/">המשך</a>
			</div>
		</div>
		
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->



<?php get_footer(); ?>
