<?php
/**
 * Saved Addresses Dashboard
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<div class="dsh-account dsh-addresses">
	<h1>כתובות שמורות</h1>
	<table>
	<tr>
	  <th>שם</th>
	  <th>פרטים</th>
	  <th class="dsh-addresses-edit"></th>
	</tr>
	<tr>
	  <td><span>שם פרטי</span> <span>שם משפחה</span></td>
	  <td><span>רחוב</span> <span>מס' בית</span> <span>דירה</span> <span>עיר</span> <span>מיקוד</span></td>
	  <td class="dsh-addresses-edit"><span class="dsh-edit">עריכה</span></td>
	</tr>
	<tr>
	  <td><span>שם פרטי</span> <span>שם משפחה</span></td>
	  <td><span>רחוב</span> <span>מס' בית</span> <span>דירה</span> <span>עיר</span> <span>מיקוד</span></td>
	  <td class="dsh-addresses-edit"><span class="dsh-edit">עריכה</span></td>
	</tr>
	<tr>
	  <td><span>שם פרטי</span> <span>שם משפחה</span></td>
	  <td><span>רחוב</span> <span>מס' בית</span> <span>דירה</span> <span>עיר</span> <span>מיקוד</span></td>
	  <td class="dsh-addresses-edit"><span class="dsh-edit">עריכה</span></td>
	</tr>
	</table>
	
	<div class="dsh-saved-addresses-wrapper">
	<h2>הוספת כתובת שמורה</h2>
	</div>

<div class="step-3-form">
		
		<form>
		<!-- the IDs in the form can be changed, I used the same model as in woocommerce checkout, only replaced "billing" with "adresses" -->
		
			<div class="join-form-personal-details woocommerce-adresses-fields">
				<div class="woocommerce-adresses-fields__field-wrapper">
					<p class="form-row form-row-first validate-required" id="adresses_first_name_field">
					<label for="adresses_first_name" class="">שם פרטי&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="adresses_first_name" id="adresses_first_name" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-last validate-required" id="adresses_last_name_field">
					<label for="adresses_last_name" class="">שם משפחה&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="adresses_last_name" id="adresses_last_name" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-first validate-required" id="adresses_city_field">
					<label for="adresses_city" class="">עיר&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="adresses_city" id="adresses_city" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-last validate-required" id="adresses_street_field">
					<label for="adresses_street" class="">רחוב&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="adresses_street" id="adresses_street" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-first validate-required" id="adresses_house_field">
					<label for="adresses_house" class="">מספר בית&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="adresses_house" id="adresses_house" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-last" id="adresses_apartment_field">
					<label for="adresses_apartment" class="">דירה&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="adresses_apartment" id="adresses_apartment" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-first validate-required" id="adresses_zipcode_field">
					<label for="adresses_zipcode" class="">מספר בית&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="adresses_zipcode" id="adresses_zipcode" placeholder="" value="">
					</span>
					</p>
					<p class="form-row form-row-last" id="adresses_phone_field">
					<label for="adresses_phone" class="">דירה&nbsp;<abbr class="required" title="נדרש">*</abbr></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text " name="adresses_phone" id="adresses_phone" placeholder="" value="">
					</span>
					</p>
				</div>
		</form>
</div>



</div>

</div>

<?php
	/**
	 * My Saved Addresses dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_savedaddresses' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */