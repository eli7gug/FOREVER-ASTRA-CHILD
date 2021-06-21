<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="woocommerce-shipping-fields">
	<?php if ( true === WC()->cart->needs_shipping_address() ) : ?>

		<h3 id="ship-to-different-address">
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
				<input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" /> <span><?php esc_html_e( 'Ship to a different address?', 'woocommerce' ); ?></span>
			</label>
		</h3>

		<div class="shipping_address">

			<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

			<div class="woocommerce-shipping-fields__field-wrapper">
				<?php
				$fields = $checkout->get_checkout_fields( 'shipping' );

				foreach ( $fields as $key => $field ) {
					woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
				}
				?>
			</div>

			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>

	<?php endif; ?>
</div>
<div class="woocommerce-additional-fields">
	<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

	<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

		<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

			<h3><?php esc_html_e( 'Additional information', 'woocommerce' ); ?></h3>

		<?php endif; ?>

		<div class="woocommerce-additional-fields__field-wrapper">
			<?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
				<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
			<?php endforeach; ?>
		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
</div>
<?php 
$users = get_users(); 
$user_id = get_current_user_id(); 
$current_meta_agent = get_user_meta($user_id, 'agent_name')[0];
?>
<?php if ( ! is_user_logged_in()):?>
	<div class="step-3-form">
		<div class="join-form-sponsor woocommerce-signup-fields" id="agent_box">
			<h3><?php esc_html_e( 'My agent in - Forever', 'astra-child' ); ?></h3>
			<?php if (isset($_COOKIE['agent'])) {
				$user_info = get_userdata($_COOKIE['agent']);
				$user_name = $user_info->display_name;
				?>
				<p ><?php echo $user_name; ?></p>
				<input name="agent_name" aria-hidden="true" class="hide_input" value="<?php echo $user_info->ID; ?>"/>
			<?php 
			}				
			else {?>
			<p class="form-row form-row-wide sponsor-field sponsor-search-field">
				<p>
					<input type="radio" class="input-radio" name="sponsor_find" id="signup_sponsor_find_checkout" value="sponsor_name">
					<label for="signup_sponsor_find_checkout" class="label-tooltip">
						<?php echo __('Search Sponsor by name/ email/ number','astra-child')?>
						<span class="info tooltip">?
							<span class="tooltiptext">לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף.</span>
						</span>
					</label>
				</p>

				<select name="agent_name" disabled class="agent_name" placeholder="<?php echo __('Search Sponsor','astra-child')?>">
					<option value="0" selected ><?php echo __('Search Sponsor','astra-child')?></option>
					<?php 
					foreach ($users as $user) {
						$user_info = get_userdata($user->ID);
						$meta_number = get_user_meta($user->ID, 'priority_customer_number')[0];
						$meta_name = get_user_meta($user->ID, 'first_name')[0].' '.get_user_meta($user->ID, 'last_name')[0];
						$meta_email = $user_info->user_email;
						$checked = ($current_meta_agent == $user->ID) ? 'selected="selected"' : '';
						$user_id = $user->ID;
						?>
						<option data-num="<?php echo strtolower($meta_number) ?>" data-email="<?php echo $meta_email ?>" value="<?php echo $user_id ?>" <?php echo $checked ?>>
							<?php echo $meta_name;  ?>
						</option>
					<?php } ?>
				</select>
				<div class="clear"></div>
				<br>
				<p>
					<input type="radio" class="input-radio" name="sponsor_find" id="sponsor_city_checkout" value="sponsor_city">
					<label for="sponsor_city_checkout" class="label-tooltip">
						<?php echo __('I do not have a sponsor yet. Find a sponsor for me','astra-child')?>
						<!-- אין לי חונך עדיין. מצא חונך עבורי -->
						<span class="info tooltip">?
							<span class="tooltiptext">לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסי טידום בעליק. הועניב היושבב שערש שמחויט - שלושע ותלברו חשלו שעותלשך וחאית נובש ערששף.</span>
						</span>
					</label>
				</p>
				<input type="text" placeholder="<?php esc_html_e( 'City or locality of residence', 'astra-child' ); ?>" disabled class="input-text autocomplete-google" name="sponsor_by_city" id="sponsor_by_city" placeholder="" autocomplete="off" value="<?php echo ( ! empty( $_POST['sponsor_city'] ) ) ? esc_attr( wp_unslash( $_POST['sponsor_city'] ) ) : ''; ?>">
			</p>
			<?php }?>
			<div class="clear"></div>
		</div>
	</div>
<?php endif;?>

