<?php
/**
 * Template Name: Account Page
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>
	<div class="account-right">

		<?php astra_content_page_loop(); ?>
		
		
		<!-- Change to dynamic link!!! -->
		<div class="account-quick-actions">
			<div class="quick-actions-container">
			<h3>הפעולות שלי</h3>
				<ul class="quick-actions-list">
					<li><a href="https://forever.ussl.shop/updates/" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-news.png" />חדשות ועדכונים</a></li>
					<li><a href="https://forever.ussl.shop/forms/" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-document.png" />טפסים להורדה</a></li>
					<li><a href="https://forever.ussl.shop/%d7%a2%d7%93%d7%9b%d7%95%d7%a0%d7%99-%d7%9e%d7%9c%d7%90%d7%99/" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-clipboard.png" />עדכוני מלאי</a></li>
				</ul>
			</div>
			<div class="quick-actions-container qa-yellow">
			<h4>אפשרויות חנות</h4>
				<ul class="quick-actions-list">
					<li><a href="#" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-smartphone.png" />צור לינק קמעונאי</a></li>
					<li><a href="#" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-send.png" />הזמנה מהירה</a></li>
					<li><a href="#" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-write.png" />צור הזמנה עבור לקוח</a></li>
				</ul>
			</div>
			<div class="quick-actions-container">
			<h4>שמורים</h4>
				<ul class="quick-actions-list">
					<li><a href="https://forever.ussl.shop/my-account/orders/" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-clock.png" />היסטוריית ההזמנות שלי</a></li>
					<li><a href="#" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-home.png" />כתובות שמורות שלי</a></li>
					<li><a href="#" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-notes.png" />הזמנות שמורות שלי</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="account-left">
		<div class="account-left-header">
			<h2>
			<img src="https://forever.ussl.shop/wp-content/uploads/2021/03/badge-supervisor.png" alt="" />
			תמר דובלין
			</h2>
			<ul class="account-prof-details">
				<li><span>משווק/ת מורש/ה</span></li>
				<li>מספר משווק: <span><strong>972000030888</strong></span>
				<li>ספונסר: <span>דיאנה קוטלר <span>972000030888</span></span>
			</ul>
		</div>
		<div class="account-left-details">
			<h3>הפרטים שלי</h3>
			<p>כאן ניתן לראות ולעדכן את פרטיך האישיים</p>
			<ul class="account-personal-details">
				<li><a class="account-edit" href="#">עריכה</a><span class="account-detail account-phone">03-751-0444</span>
				<li><a class="account-edit" href="#">עריכה</a><span class="account-detail account-email">Tamar@flpil.com</span>
				<li><a class="account-edit" href="#">עריכה</a><span class="account-detail account-address">ז'בוטינסקי 1, רמת גן, ישראל, 00386754</span>
			</ul>
		</div>
		
		<div class="account-upcoming-events">
			<img src="https://forever.ussl.shop/wp-content/uploads/2021/03/account-banner.jpg" alt="" /><br>
	</div>
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
