<?php
/**
 * Template Name: Join Third Page
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
			<li class="step second-step past-step"><a class="step-link" href="https://forever.ussl.shop/join-step-2/">2</a></li>
			<li class="step third-step active-step"><span class="step-link">3</span></li>
			<li class="step last-step"><span class="step-link">4</span></li>
		</ul>
		
		<?php astra_content_page_loop(); ?>
		
		<h1 class="step-3-title">יצירת חשבון</h1>
		
		<div class="step-3-form">
		
		<form>
		<!-- the IDs in the form can be changed, I used the same model as in woocommerce checkout, only replaced "billing" with "signup" -->
		
			<div class="join-form-personal-details woocommerce-signup-fields">
				<h3>הפרטים שלי</h3>
				<div class="woocommerce-signup-fields__field-wrapper">
					<p class="form-row form-row-first validate-required" id="signup_first_name_field">
					<label for="signup_first_name" class="">שם פרטי&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="signup_first_name" id="signup_first_name" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-last validate-required" id="signup_last_name_field">
					<label for="signup_last_name" class="">שם משפחה&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="signup_last_name" id="signup_last_name" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-first validate-required" id="signup_english_name_field">
					<label for="signup_english_name" class="">שם מלא באנגלית&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="signup_english_name" id="signup_english_name" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-last validate-required validate-phone" id="signup_phone_field">
					<label for="signup_phone" class="">טלפון&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="tel" class="input-text " name="signup_phone" id="signup_phone" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-first validate-required validate-email" id="signup_email_field">
					<label for="signup_email" class="">כתובת מייל&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="email" class="input-text " name="signup_email" id="signup_email" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-last validate-required validate-email" id="signup_validate_email_field">
					<label for="signup_validate_email" class="">אישור כתובת מייל&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="email" class="input-text " name="signup_validate_email" id="signup_validate_email" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-first validate-required validate-" id="signup_password_field">
					<label for="signup_password" class="">סיסמה&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="password" class="input-text " name="signup_password" id="signup_password" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-last validate-required validate-" id="signup_validate_password_field">
					<label for="signup_validate_password" class="">אישור סיסמה&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="password" class="input-text " name="signup_validate_password" id="signup_validate_password" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-last validate-required validate-birth_date" id="signup_birthdate_field">
					<label for="signup_birth_date" class="">תאריך לידה&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="date" class="input-text " name="signup_birth_date" id="signup_birth_date" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-first validate-required" id="signup_id_number_field">
					<label for="signup_id_number" class="">מס' ת.ז.&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="number" class="input-text " name="signup_id_number" id="signup_id_number" placeholder="" value="">
					</span>
					</p>
				</div>
				
			</div>
			<div class="join-form-address woocommerce-signup-fields">
				<h3>הכתובת שלי</h3>
				<div class="woocommerce-signup-fields__field-wrapper">
					<p class="form-row form-row-first address-field validate-required" id="signup_city_field">
					<label for="signup_city" class="">עיר&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="signup_city" id="signup_city" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-last address-field validate-required" id="signup_street_field">
					<label for="signup_street" class="">רחוב&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="signup_street" id="signup_street" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-first address-field validate-required" id="signup_street_number_field">
					<label for="signup_street_number" class="">מספר בית&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="number" class="input-text " name="signup_street_number" id="signup_street_number" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-last address-field" id="signup_street_number_field">
					<label for="signup_street_number" class="">דירה</label>
					<span class="woocommerce-input-wrapper">
						<input type="number" class="input-text " name="signup_street_number" id="signup_street_number" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-first address-field validate-required validate-postcode" id="signup_postcode_field">
					<label for="signup_postcode" class="">מיקוד&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="signup_postcode" id="signup_postcode" placeholder="" value="">
					</span>
					</p>
				</div>
				
			</div>
			<div class="join-form-sponsor woocommerce-signup-fields">
				<h3>החונך שלי ב-Forever</h3>
				<div class="woocommerce-signup-fields__field-wrapper">
					<p class="form-row form-row-wide sponsor-field sponsor-search-field">
					<span class="woocommerce-input-wrapper">
						<input type="radio" class="input-radio" name="sponsor_find" id="signup_sponsor_find" placeholder="" value="sponsor">
					</span>
					<label for="signup_sponsor_find" class="">חיפוש על פי שם/ מספר המשווק שהפנה אותי&nbsp;<span class="info">?</span></label>
					</p>
					<p class="form-row form-row-wide sponsor-field" id="signup_sponsor_search_number_field">
					<span class="woocommerce-input-wrapper">
						<input type="search" id="signup_sponsor_search_number" name="signup_sponsor_search_number" placeholder="מס' משווק או כתובת המייל של החונך" aria-label="מס' משווק או כתובת המייל של החונך">
						<button>מצא</button>
					</span>
					</p>
					<h4>חיפוש על פי שם</h4>
					<div class="sponsor-search-name">
						<p class="form-row form-row-wide sponsor-field sponsor-search-field">
						<span class="woocommerce-input-wrapper">
							<input type="search" id="signup_sponsor_search_first_name" name="signup_sponsor_search_first_name" placeholder="שם פרטי" aria-label="שם פרטי">
						</span>
						<span class="woocommerce-input-wrapper">
							<input type="search" id="signup_sponsor_search_last_name" name="signup_sponsor_search_last_name" placeholder="שם משפחה" aria-label="שם משפחה">
						</span>
						</p>
						<p class="form-row form-row-wide" style="text-align:center">
							<button>מצא</button>
						</p>
					</div>
					
					<p class="form-row form-row-wide sponsor-field" id="signup_sponsor_none_field">
					<span class="woocommerce-input-wrapper">
						<input type="radio" class="input-radio" name="sponsor_find" id="signup_sponsor_none" value="none">
					</span>
					<label for="signup_sponsor_none" class="">אין לי חונך עדיין. מצא חונך עבורי&nbsp;<span class="info">?</span></label>
					</p>
					<p class="form-row form-row-wide sponsor-field" id="signup_sponsor_search_city_field">
					<span class="woocommerce-input-wrapper">
						<input type="search" id="signup_sponsor_search_city" name="signup_sponsor_search_city" placeholder="עיר או יישוב מגורים" aria-label="עיר או יישוב מגורים">
						<button>מצא</button>
					</span>
					</p>
				</div>
				
			</div>
			<div class="join-form-sponsor-contact woocommerce-signup-fields">
				<h3>התקשרות עם החונך </h3>
				<div class="woocommerce-signup-fields__field-wrapper">
					<p>אני מעוניינ/ת שהחונך שלי יצור עמי קשר</p>
					<p><span class="woocommerce-input-wrapper">
						<input type="radio" class="input-radio" name="sponsor_if" id="signup_sponsor_contact_yes" value="yes">
						<label for="signup_sponsor_contact_yes" class="">כן</label><br>
						<input type="radio" class="input-radio" name="sponsor_if" id="signup_sponsor_contact_no" value="no">
						<label for="signup_sponsor_contact_no" class="">לא</label>
					   </span>
					</p>
				</div>
				
			</div>
			</div>
			
			<div class="cart-page-buttons success-pages">
				<div class="join-form-submit">
					<!-- Change to dynamic link!!! --><a class="button go-to-account" href="https://forever.ussl.shop/signup-success/">אישור והמשך</a>
				</div>
			</div>
		
		
		</form>
		
		
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->



<?php get_footer(); ?>
