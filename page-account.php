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
			<h3>
			<?php esc_html_e( 'My actions', 'astra-child' ); ?>
			<!-- הפעולות שלי -->
			</h3>
				<ul class="quick-actions-list">
					<li><a href="https://forever.ussl.shop/updates/" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-news.png" />
					<!-- חדשות ועדכונים -->
					<?php esc_html_e( 'News and Updates', 'astra-child' ); ?>
					</a></li>
					<li><a href="https://forever.ussl.shop/forms/" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-document.png" />
					<!-- טפסים להורדה -->
					<?php esc_html_e( 'Download forms', 'astra-child' ); ?>
					</a></li>
					<li><a href="https://forever.ussl.shop/%d7%a2%d7%93%d7%9b%d7%95%d7%a0%d7%99-%d7%9e%d7%9c%d7%90%d7%99/" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-clipboard.png" />
					<!-- עדכוני מלאי -->
					<?php esc_html_e( 'Inventory updates', 'astra-child' ); ?>
					</a>
					</li>
				</ul>
			</div>
			<div class="quick-actions-container qa-yellow">
			<h4>
			<!-- אפשרויות חנות -->
			<?php esc_html_e( 'Store options', 'astra-child' ); ?>
			</h4>
				<ul class="quick-actions-list">
					<?php
						    $retail_link_page = get_pages(
								array(
									'meta_key' => '_wp_page_template',
									'meta_value' => 'page-create-link.php'
								)
							);
							$retail_link_id = $retail_link_page[0]->ID;

							$quick_order_link_page = get_pages(
								array(
									'meta_key' => '_wp_page_template',
									'meta_value' => 'page-quick-order.php'
								)
							);
							$quick_order_link_id = $quick_order_link_page[0]->ID;
					?>
					<li><a href="<?php echo get_permalink( $retail_link_id );?>" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-smartphone.png" />
					<!-- צור לינק קמעונאי -->
					<?php esc_html_e( 'Create a retail link', 'astra-child' ); ?>
					</a></li>
					<li><a href="<?php echo get_permalink( $quick_order_link_id );?>" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-send.png" />
					<!-- הזמנה מהירה -->
					<?php esc_html_e( 'Quick order', 'astra-child' ); ?>
					</a></li>
					<li><a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-write.png" />
					<!-- צור הזמנה עבור לקוח -->
					<?php esc_html_e( 'Create an order for a customer', 'astra-child' ); ?>
					</a>
					</li>
				</ul>
			</div>
			<div class="quick-actions-container">
			<h4>
			<!-- שמורים -->
			<?php esc_html_e( 'Saved', 'astra-child' ); ?>
			</h4>
				<ul class="quick-actions-list">
					<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-clock.png" />
					<!-- היסטוריית ההזמנות שלי -->
					<?php esc_html_e( 'my orders history', 'astra-child' ); ?>
					</a></li>
					<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-address' ) ); ?>" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-home.png" />
					<!-- כתובות שמורות שלי -->
					<?php esc_html_e( 'my saved address', 'astra-child' ); ?>
					</a></li>
					<li><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'saved-carts' ) ); ?>" class="qa-link-wrapper"><img src="https://forever.ussl.shop/wp-content/uploads/2021/03/ico-notes.png" />
					<!-- הזמנות שמורות שלי -->
					<?php esc_html_e( 'my saved orders', 'astra-child' ); ?>
					</a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php
	$user = wp_get_current_user();
	$user_info = get_userdata($user->ID);
	$meta_phone = get_user_meta($user->ID, 'billing_phone')[0];
	$meta_name = get_user_meta($user->ID, 'first_name')[0].' '.get_user_meta($user->ID, 'last_name')[0];
	$meta_email = $user_info->user_email;
	$meta_priority_num = get_user_meta($user->ID, 'priority_customer_number')[0];
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
	<div class="account-left">
		<div class="account-left-header">
			<h2>
			<img src="https://forever.ussl.shop/wp-content/uploads/2021/03/badge-supervisor.png" alt="" />
			<?php echo $meta_name; ?>
			</h2>
			<ul class="account-prof-details">
				<li><span><?php esc_html_e( 'Authorized marketer', 'astra-child' ); ?>
				<!-- משווק/ת מורש/ה -->
				</span></li>
				<li>
				<!-- מספר משווק:  -->
				<?php esc_html_e( 'Marketer number:', 'astra-child' ); ?>
				<span><strong><?php echo $meta_priority_num ?></strong></span>
				<li>
				<!-- ספונסר:  -->
				<?php esc_html_e( 'Sponsor:', 'astra-child' ); ?>
				<span><?php echo $current_meta_agent_name ?> <span><?php echo $current_meta_agent_num ?></span></span>
			</ul>
		</div>
		<div class="account-left-details">
			<h3><?php esc_html_e( 'My details', 'astra-child' ); ?></h3>
			<a class="account-edit" href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-account' ) ); ?>"><?php esc_html_e( 'Edit', 'woocommerce' ); ?></a>
			<p>
			<!-- כאן ניתן לראות ולעדכן את פרטיך האישיים -->
			<?php esc_html_e( 'Here you can see and update your personal details', 'astra-child' ); ?>
			</p>
			<ul class="account-personal-details">
				<li><span class="account-detail account-phone"><?php echo $meta_phone ?></span>
				<li><span class="account-detail account-email"><?php echo $meta_email ?></span>
				<li><span class="account-detail account-address">
					<?php echo $meta_address1.',  '.$meta_city.', '.$meta_postcode  ?>
				</span>
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
