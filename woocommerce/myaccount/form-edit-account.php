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
<h1 class="step-3-title">יצירת חשבון</h1>
<div class="step-3-form">
	<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >
		<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
		<div class="join-form-personal-details woocommerce-signup-fields">
			<h3>הפרטים שלי</h3>
			<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				<label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
				<label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
			</p>
			<div class="clear"></div>
			<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				<label for="account_full_name"><?php _e( 'Full name', 'astra-child' ); ?> <span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--phone input-text" name="account_full_name" id="account_full_name" value="<?php echo esc_attr(get_user_meta( $user->ID, 'account_full_name', true )); ?>" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-last">
				<label for="billing_phone"><?php _e( 'phone', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--phone input-text" name="billing_phone" id="billing_phone" value="<?php echo esc_attr( $user->billing_phone ); ?>" />
			</p>
			<div class="clear"></div>
			<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				<label for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-last">
				<label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
			</p>
			<div class="clear"></div>
			<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				<label for="account_birth_date"><?php _e( 'Birth date', 'astra-child' ); ?> <span class="required">*</span></label>
				<input type="date" class="woocommerce-Input woocommerce-Input--birth_date input-text" name="account_birth_date" id="account_birth_date" placeholder="mm/dd/yyyy" value="<?php echo esc_attr(get_user_meta( $user->ID, 'account_birth_date', true )); ?>" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-last">
				<label for="account_id"><?php esc_html_e( 'ID number', 'astra-child' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--id input-text" name="account_id" id="account_id" autocomplete="id" value="<?php echo esc_attr(get_user_meta( $user->ID, 'account_id', true )); ?>" />
			</p>
			<div class="clear"></div>
		</div>
		<div class="dsh-changepw-form">
			<h3>שינוי סיסמה</h1>
			<div class="dsh-changepw-form-inner">
				<fieldset>
					<span class="dsh-changepw-retailer">מס' משווק: 
					<!-- Change to dynamic--><span class="dsh-changepw-retailer-number">000-123-456-789</span> <!-- Change to dynamic--><span class="info">?</span>
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
		<?php 
		 $users = get_users(); 
		 $user_id = get_current_user_id(); 
		 $current_meta_agent = get_user_meta($user_id, 'agent_name')[0];
		 $members = get_users(array(
			'meta_key' => 'priority_customer_number', 
			'meta_value' =>$current_meta_agent , 
		));

		foreach($members as $member) {
			//echo '<li id="user_' . $member->ID . '">' . $member->user_login . '</li>';
		}
		?>
		<div class="join-form-sponsor woocommerce-signup-fields">
				<h3>החונך שלי ב-Forever</h3>
				<select name="agent_name" class="agent_name" id="agent_name" data-placeholder="'.__('Search Sponsor by name/ email/ number','astra-child').'">
					<option disabled value> -- select an option -- </option>
					<?php 
					foreach ($users as $user) {
						$meta = get_user_meta($user->ID, 'priority_customer_number')[0];
						$checked = ($current_meta_agent == $meta) ? 'selected="selected"' : '';
						 ?>
						<option value="<?php echo $meta ?>" <?php echo $checked ?>>
							<?php echo $meta;  ?>
						</option>
					<?php } ?>
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
