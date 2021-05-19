<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
do_action( 'woocommerce_before_customer_login_form' ); ?>

<ul id="reg-tabs">

      <li><a id="tab1"><?php esc_html_e( 'Login', 'woocommerce' ); ?></a></li>
      <li><a id="tab2"><?php esc_html_e( 'Register', 'woocommerce' ); ?></a></li>

</ul>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-1 tab-reg" id="tab1C">

<?php endif; ?>
		<h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

		<form class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
			</p>
			<p class="woocommerce-LostPassword lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	</div>

	<div class="u-column2 col-2 tab-reg" id="tab2C">

		<h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>
		<div class="step-3-form">
			<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

				<?php do_action( 'woocommerce_register_form_start' ); ?>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
					</p>

				<?php endif; ?>
				<div class="join-form-personal-details woocommerce-signup-fields" id="details_box">
					<h3><?php esc_html_e( 'My details', 'astra-child' ); ?></h3>
					<div class="woocommerce-signup-fields__field-wrapper">
						<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
							<label for="reg_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="first_name" id="reg_first_name" autocomplete="first_name" value="<?php echo ( ! empty( $_POST['first_name'] ) ) ? esc_attr( wp_unslash( $_POST['first_name'] ) ) : ''; ?>" />
						</p>
						<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
							<label for="reg_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="last_name" id="reg_last_name" autocomplete="last_name" value="<?php echo ( ! empty( $_POST['last_name'] ) ) ? esc_attr( wp_unslash( $_POST['last_name'] ) ) : ''; ?>" />
						</p>
						<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
							<label for="reg_first_name_english"><?php _e( 'First name english', 'astra-child' ); ?> <span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--phone input-text" name="account_first_name_english" id="reg_first_name_english" value="<?php echo ( ! empty( $_POST['account_first_name_english'] ) ) ? esc_attr( wp_unslash( $_POST['account_first_name_english'] ) ) : ''; ?>" />
						</p>
						<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
							<label for="reg_last_name_english"><?php _e( 'Last name english', 'astra-child' ); ?> <span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--phone input-text" name="account_last_name_english" id="reg_last_name_english" value="<?php echo ( ! empty( $_POST['account_last_name_english'] ) ) ? esc_attr( wp_unslash( $_POST['account_last_name_english'] ) ) : ''; ?>" />
						</p>

						<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
							<label for="reg_id"><?php esc_html_e( 'ID number', 'astra-child' ); ?>&nbsp;<span class="required">*</span></label>
							<input type="text" pattern="\d{9}"  maxlength="9" class="woocommerce-Input woocommerce-Input--id input-text" name="account_id" id="reg_id" value="<?php echo ( ! empty( $_POST['account_id'] ) ) ? esc_attr( wp_unslash( $_POST['account_id'] ) ) : ''; ?>" />
						</p>
						<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
							<label for="reg_billing_phone"><?php _e( 'phone', 'woocommerce' ); ?> <span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--phone input-text" name="billing_phone" id="reg_billing_phone" value="<?php echo ( ! empty( $_POST['billing_phone'] ) ) ? esc_attr( wp_unslash( $_POST['billing_phone'] ) ) : ''; ?>" />
						</p>
					
						<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
							<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
							<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
						</p>
						<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
						<label for="reg_confirm_email"><?php esc_html_e( 'Confirm Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
							<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_confirm_email" id="reg_confirm_email" autocomplete="reg_confirm_email" value="<?php echo ( ! empty( $_POST['account_confirm_email'] ) ) ? esc_attr( wp_unslash( $_POST['account_confirm_email'] ) ) : ''; ?>" />
						</p>
				
						<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
							<label for="reg_birth_date"><?php _e( 'Birth date', 'astra-child' ); ?> <span class="required">*</span></label>
							<input type="date" class="woocommerce-Input woocommerce-Input--birth_date input-text" name="account_birth_date" id="reg_birth_date" placeholder="mm/dd/yyyy" value="<?php echo ( ! empty( $_POST['account_birth_date'] ) ) ? esc_attr( wp_unslash( $_POST['account_birth_date'] ) ) : ''; ?>" />
						</p>
				
						<div class="clear"></div>
					</div>	
				</div>
				<div class="join-form-address woocommerce-signup-fields" id="address_box">
					<h3><?php esc_html_e( 'My address', 'astra-child' ); ?></h3>
					<div class="woocommerce-signup-fields__field-wrapper">
						<p class="form-row form-row-first address-field validate-required" id="signup_city_field">
							<label for="billing_city" class=""><?php _e( 'City', 'woocommerce' ); ?><abbr class="required" title="נדרש">*</abbr></label>
							<span class="woocommerce-input-wrapper">
								<input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="" value="<?php echo ( ! empty( $_POST['billing_city'] ) ) ? esc_attr( wp_unslash( $_POST['billing_city'] ) ) : ''; ?>">
							</span>
						</p>
						<p class="form-row form-row-last address-field validate-required" id="signup_street_field">
						<label for="billing_address_1" class=""><?php _e( 'Street address', 'woocommerce' ); ?>&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="" value="<?php echo ( ! empty( $_POST['billing_address_1'] ) ) ? esc_attr( wp_unslash( $_POST['billing_address_1'] ) ) : ''; ?>">
						</span>
						</p>
						<p class="form-row form-row-first address-field validate-required" id="billing_address_2">
						<label for="billing_address_2" class=""><?php _e( 'Apartment, suite, unit, etc. (optional)', 'woocommerce' ); ?>&nbsp;</label>
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="" value="<?php echo ( ! empty( $_POST['billing_address_2'] ) ) ? esc_attr( wp_unslash( $_POST['billing_address_2'] ) ) : ''; ?>">
						</span>
						</p>
						<p class="form-row form-row-first address-field validate-required validate-postcode" id="billing_postcode">
						<label for="billing_postcode" class=""><?php _e( 'Postcode', 'woocommerce' ); ?>&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
						<span class="woocommerce-input-wrapper">
							<input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="" value="<?php echo ( ! empty( $_POST['billing_postcode'] ) ) ? esc_attr( wp_unslash( $_POST['billing_postcode'] ) ) : ''; ?>">
						</span>
						</p>
					</div>
				</div>
				<?php 
				$users = get_users(); 
				$user_id = get_current_user_id(); 
				$current_meta_agent = get_user_meta($user_id, 'agent_name')[0];
				?>
				<div class="join-form-sponsor woocommerce-signup-fields" id="agent_box">
					<h3><?php esc_html_e( 'My agent in - Forever', 'astra-child' ); ?></h3>
					<?php if (isset($_GET['agent'])) {
						$user_info = get_userdata($_GET['agent']);
						$user_name = $user_info->display_name;
					?>
						<p ><?php echo $user_name; ?></p>
						<input name="agent_name" aria-hidden="true" class="hide_input" value="<?php echo $user_info->ID; ?>"/>
					<?php }
					elseif (isset($_COOKIE['agent'])) {
						$user_info = get_userdata($_COOKIE['agent']);
						$user_name = $user_info->display_name;
						?>
						<p ><?php echo $user_name; ?></p>
						<input name="agent_name" aria-hidden="true" class="hide_input" value="<?php echo $user_info->ID; ?>"/>
					<?php 
					}
								 
					else {?>
					<p class="form-row form-row-wide sponsor-field sponsor-search-field">
						<label for="signup_sponsor_find" class=""><?php echo __('Search Sponsor by name/ email/ number','astra-child')?><span class="info">?</span></label>
					</p>
					<?php 
					?>
					<p class="form-row form-row-wide sponsor-field" id="signup_sponsor_search_number_field">
						<select name="agent_name" class="agent_name" id="agent_name">
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
					</p>
					<?php }?>
				</div>
				<div class="join-form-sponsor-contact woocommerce-signup-fields">
					<h3><?php echo __('Contact with the agent','astra-child')?></h3>
					<div class="woocommerce-signup-fields__field-wrapper">
						<p><?php echo __('I want my agent to contact me','astra-child')?></p>
						<p>
							<span class="woocommerce-input-wrapper">
								<input type="radio" class="input-radio" name="sponsor_contact"  <?php  checked( get_user_meta( get_current_user_id(), 'sponsor_contact', true ), 'yes' ); ?> value="yes">כן<br>
								<input type="radio" class="input-radio" name="sponsor_contact"  <?php  checked( get_user_meta( get_current_user_id(), 'sponsor_contact', true ), 'no' ); ?> value="no">לא
							</span>
						</p>
					</div>	
				</div>


				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
					</p>

				<?php else : ?>

					<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

				<?php endif; ?>

				<?php do_action( 'woocommerce_register_form' ); ?>

				<p class="woocommerce-form-row form-row">
					<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
					<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
				</p>

				<?php do_action( 'woocommerce_register_form_end' ); ?>

			</form>
		</div>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
