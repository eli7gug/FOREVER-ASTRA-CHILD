<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>
<h1 class="step-3-title"><?php esc_html_e( 'Account details:', 'woocommerce' ); ?></h1>
<div class="step-3-form">
	<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >
		<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
		<div class="join-form-personal-details woocommerce-signup-fields" id="details_box">
			<h3><?php esc_html_e( 'My details', 'astra-child' ); ?></h3>
			<div class="woocommerce-signup-fields__field-wrapper">
				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
					<label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
					<label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
					<label for="account_first_name_english"><?php _e( 'First name english', 'astra-child' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--phone input-text" name="account_first_name_english" id="account_first_name_english" value="<?php echo esc_attr(get_user_meta( $user->ID, 'account_first_name_english', true )); ?>" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
					<label for="account_last_name_english"><?php _e( 'Last name english', 'astra-child' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--phone input-text" name="account_last_name_english" id="account_last_name_english" value="<?php echo esc_attr(get_user_meta( $user->ID, 'account_last_name_english', true )); ?>" />
				</p>

				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first display-name-row">
					<label for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span>
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
					<label for="billing_phone"><?php _e( 'phone', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--phone input-text" name="billing_phone" id="billing_phone" value="<?php echo esc_attr( $user->billing_phone ); ?>" />
				</p>
			
				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
					<label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
				<label for="account_confirm_email"><?php esc_html_e( 'Confirm Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_confirm_email" id="account_confirm_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
				</p>
		
				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
					<label for="account_birth_date"><?php _e( 'Birth date', 'astra-child' ); ?> <span class="required">*</span></label>
					<input type="date" class="woocommerce-Input woocommerce-Input--birth_date input-text" name="account_birth_date" id="account_birth_date" placeholder="mm/dd/yyyy" value="<?php echo esc_attr(get_user_meta( $user->ID, 'account_birth_date', true )); ?>" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
					<label for="account_id"><?php esc_html_e( 'ID number', 'astra-child' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--id input-text" name="account_id" id="account_id" value="<?php echo esc_attr(get_user_meta( $user->ID, 'account_id', true )); ?>" />
				</p>
	
			</div>
		</div>
		<div class="dsh-changepw-form">
			<h3><?php esc_html_e( 'Password change', 'woocommerce' ); ?></h1>
			<div class="dsh-changepw-form-inner">
				<fieldset>
				<?php 
					$user_id = get_current_user_id(); 
					$current_meta_agent = get_user_meta($user_id, 'priority_customer_number')[0];
					?>
					<span class="dsh-changepw-retailer">
						<!-- מס' משווק:  -->
					<?php esc_html_e( 'Priority customer number:', 'astra-child' ); ?><span class="dsh-changepw-retailer-number"><?php echo ' '.$current_meta_agent;?></span><span class="info">?</span>
					</span>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="password_current"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="password_1"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?>
						<!-- Change to dynamic--><span class="info">?</span>
						</label>
						<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" /> 
						
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
					</p>
				</fieldset>
				
				<div class="clear"></div>

				<?php do_action( 'woocommerce_edit_account_form' ); ?>

			
			</div>
		</div>
		<div class="join-form-address woocommerce-signup-fields" id="address_box">
			<h3><?php esc_html_e( 'My address', 'astra-child' ); ?></h3>
			<div class="woocommerce-signup-fields__field-wrapper">
				<p class="form-row form-row-first address-field validate-required" id="signup_city_field">
					<label for="billing_city" class=""><?php _e( 'City', 'woocommerce' ); ?><abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="" value="<?php echo esc_attr(get_user_meta( $user->ID, 'billing_city', true )); ?>">
					</span>
				</p>
				<p class="form-row form-row-last address-field validate-required" id="signup_street_field">
				<label for="billing_address_1" class=""><?php _e( 'Street address', 'woocommerce' ); ?>&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="" value="<?php echo esc_attr(get_user_meta( $user->ID, 'billing_address_1', true )); ?>">
				</span>
				</p>
				<p class="form-row form-row-first address-field validate-required" id="billing_address_2">
				<label for="billing_address_2" class=""><?php _e( 'Apartment, suite, unit, etc. (optional)', 'woocommerce' ); ?>&nbsp;</label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="" value="<?php echo esc_attr(get_user_meta( $user->ID, 'billing_address_2', true )); ?>">
				</span>
				</p>
				<p class="form-row form-row-first address-field validate-required validate-postcode" id="billing_postcode">
				<label for="billing_postcode" class=""><?php _e( 'Postcode', 'woocommerce' ); ?>&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
				<span class="woocommerce-input-wrapper">
					<input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="" value="<?php echo esc_attr(get_user_meta( $user->ID, 'billing_postcode', true )); ?>">
				</span>
				</p>
			</div>
			
		</div>
		<div class="join-form-sponsor-contact woocommerce-signup-fields">
			<h3><?php echo __('Contact with the agent','astra-child')?> </h3>
			<!-- התקשרות עם החונך -->
			<div class="woocommerce-signup-fields__field-wrapper">
				<p><?php echo __('I want my agent to contact me','astra-child')?></p>
				<!-- <p>אני מעוניינ/ת שהחונך שלי יצור עמי קשר</p> -->
				<p>
					<span class="woocommerce-input-wrapper">
						<input type="radio" class="input-radio" name="sponsor_contact"  <?php  checked( get_user_meta( get_current_user_id(), 'sponsor_contact', true ), 'yes' ); ?> value="yes">כן<br>
						<input type="radio" class="input-radio" name="sponsor_contact"  <?php  checked( get_user_meta( get_current_user_id(), 'sponsor_contact', true ), 'no' ); ?> value="no">לא
					</span>
				</p>
			</div>	
		</div>
		<p>
			<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
			<button type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
			<input type="hidden" name="action" value="save_account_details" />
		</p>

		<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
	</form>
	
</div>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
