<?php
/**
 * Template Name: Quick Order page
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
		
		<?php astra_content_page_loop(); ?>
		
		<div class="quick-order woocommerce">
		  <div class="quick-order-right">
		    <h1>הזמנה מהירה</h1>
			
			<div class="cart-search">
				<div class="search-by-sku">
					<input type="search" placeholder="הוספה מהירה ע''י מקט #">
				</div>
				<div class="search-by-name">
					<input type="search" placeholder="הוספה מהירה ע''י שם המוצר">
				</div>
			</div>

			<div class="quick-order-accordion">
			
				<!-- Accordion row -->
				<button class="accordion">משקאות</button>
				<div class="panel">
				  <form class="woocommerce-cart-form" action="" method="post">
				  <table class="quick-order-accordion-table" cellspacing="0">
				    <thead>
					<tr>
					  <th class="product-sku">מק"ט</th>
					  <th class="product-name">מוצר</th>
					  <th class="product-cc">ערך <span class="cc-font"> CC</span></th>
					  <th class="product-quantity">כמות</th>
					  <th class="product-subtotal">מחיר ליחידה</th>
					</tr>
					</thead>
					<tbody>
					<!-- First example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /First example row -->
					<!-- Second example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /Second example row -->
					
					<tbody>
				  </table>
				  </form>
				</div>
				<!-- /Accordion row -->
				
				<!-- Accordion row -->
				<button class="accordion">תוספי תזונה</button>
				<div class="panel">
				  <form class="woocommerce-cart-form" action="" method="post">
				  <table class="quick-order-accordion-table" cellspacing="0">
				    <thead>
					<tr>
					  <th class="product-sku">מק"ט</th>
					  <th class="product-name">מוצר</th>
					  <th class="product-cc">ערך <span class="cc-font"> CC</span></th>
					  <th class="product-quantity">כמות</th>
					  <th class="product-subtotal">מחיר ליחידה</th>
					</tr>
					</thead>
					<tbody>
					<!-- First example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /First example row -->
					<!-- Second example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /Second example row -->
					
					<tbody>
				  </table>
				  </form>
				</div>
				<!-- /Accordion row -->

				<!-- Accordion row -->
				<button class="accordion">מהכוורת</button>
				<div class="panel">
				  <form class="woocommerce-cart-form" action="" method="post">
				  <table class="quick-order-accordion-table" cellspacing="0">
				    <thead>
					<tr>
					  <th class="product-sku">מק"ט</th>
					  <th class="product-name">מוצר</th>
					  <th class="product-cc">ערך <span class="cc-font"> CC</span></th>
					  <th class="product-quantity">כמות</th>
					  <th class="product-subtotal">מחיר ליחידה</th>
					</tr>
					</thead>
					<tbody>
					<!-- First example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /First example row -->
					<!-- Second example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /Second example row -->
					
					<tbody>
				  </table>
				  </form>
				</div>
				<!-- /Accordion row -->
				
				<!-- Accordion row -->
				<button class="accordion">טיפוח אישי</button>
				<div class="panel">
				  <form class="woocommerce-cart-form" action="" method="post">
				  <table class="quick-order-accordion-table" cellspacing="0">
				    <thead>
					<tr>
					  <th class="product-sku">מק"ט</th>
					  <th class="product-name">מוצר</th>
					  <th class="product-cc">ערך <span class="cc-font"> CC</span></th>
					  <th class="product-quantity">כמות</th>
					  <th class="product-subtotal">מחיר ליחידה</th>
					</tr>
					</thead>
					<tbody>
					<!-- First example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /First example row -->
					<!-- Second example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /Second example row -->
					
					<tbody>
				  </table>
				  </form>
				</div>
				<!-- /Accordion row -->
				
				<!-- Accordion row -->
				<button class="accordion">טיפוח העור</button>
				<div class="panel">
				  <form class="woocommerce-cart-form" action="" method="post">
				  <table class="quick-order-accordion-table" cellspacing="0">
				    <thead>
					<tr>
					  <th class="product-sku">מק"ט</th>
					  <th class="product-name">מוצר</th>
					  <th class="product-cc">ערך <span class="cc-font"> CC</span></th>
					  <th class="product-quantity">כמות</th>
					  <th class="product-subtotal">מחיר ליחידה</th>
					</tr>
					</thead>
					<tbody>
					<!-- First example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /First example row -->
					<!-- Second example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /Second example row -->
					
					<tbody>
				  </table>
				  </form>
				</div>
				<!-- /Accordion row -->
				
				<!-- Accordion row -->
				<button class="accordion">טיפוח עור הפנים</button>
				<div class="panel">
				  <form class="woocommerce-cart-form" action="" method="post">
				  <table class="quick-order-accordion-table" cellspacing="0">
				    <thead>
					<tr>
					  <th class="product-sku">מק"ט</th>
					  <th class="product-name">מוצר</th>
					  <th class="product-cc">ערך <span class="cc-font"> CC</span></th>
					  <th class="product-quantity">כמות</th>
					  <th class="product-subtotal">מחיר ליחידה</th>
					</tr>
					</thead>
					<tbody>
					<!-- First example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /First example row -->
					<!-- Second example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /Second example row -->
					
					<tbody>
				  </table>
				  </form>
				</div>
				<!-- /Accordion row -->
				
				<!-- Accordion row -->
				<button class="accordion">ניהול משקל ותזונה</button>
				<div class="panel">
				  <form class="woocommerce-cart-form" action="" method="post">
				  <table class="quick-order-accordion-table" cellspacing="0">
				    <thead>
					<tr>
					  <th class="product-sku">מק"ט</th>
					  <th class="product-name">מוצר</th>
					  <th class="product-cc">ערך <span class="cc-font"> CC</span></th>
					  <th class="product-quantity">כמות</th>
					  <th class="product-subtotal">מחיר ליחידה</th>
					</tr>
					</thead>
					<tbody>
					<!-- First example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /First example row -->
					<!-- Second example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /Second example row -->
					
					<tbody>
				  </table>
				  </form>
				</div>
				<!-- /Accordion row -->
				
				<!-- Accordion row -->
				<button class="accordion">עזרים</button>
				<div class="panel">
				  <form class="woocommerce-cart-form" action="" method="post">
				  <table class="quick-order-accordion-table" cellspacing="0">
				    <thead>
					<tr>
					  <th class="product-sku">מק"ט</th>
					  <th class="product-name">מוצר</th>
					  <th class="product-cc">ערך <span class="cc-font"> CC</span></th>
					  <th class="product-quantity">כמות</th>
					  <th class="product-subtotal">מחיר ליחידה</th>
					</tr>
					</thead>
					<tbody>
					<!-- First example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /First example row -->
					<!-- Second example row -->
					<tr>
					  <td class="product-sku" data-title="מקט">
					    015
					  </td>
					  <td class="product-name" data-title="מוצר">
					    <a href="https://forever.ussl.shop/product/%d7%90%d7%9c%d7%95-%d7%a4%d7%99%d7%a8%d7%a1%d7%98/">אלו פירסט</a>
					  </td>
					  <td class="product-cc" data-title="CC">
					    0.101
					  </td>
					  <td class="product-quantity" data-title="כמות">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
							<label class="screen-reader-text" for="quantity_608ff0c48e907">כמות של אלו פירסט</label>
							<input type="number" id="quantity_608ff0c48e907" class="input-text qty text" step="1" min="0" max="" name="cart[8c19f571e251e61cb8dd3612f26d5ecf][qty]" value="3" title="כמות" size="4" placeholder="" inputmode="numeric">
							<a href="javascript:void(0)" class="plus">+</a>
							</div>
					  </td>
					  <td class="product-subtotal" data-title="סכום ביניים">
					    <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>54.99</bdi></span>
					  </td>
					</tr>
					<!-- /Second example row -->
					
					<tbody>
				  </table>
				  </form>
				</div>
				<!-- /Accordion row -->
				
				
				<!-- Script for accordion -->
				<script>
				var acc = document.getElementsByClassName("accordion");
				var i;

				for (i = 0; i < acc.length; i++) {
				  acc[i].addEventListener("click", function() {
					this.classList.toggle("active");
					var panel = this.nextElementSibling;
					if (panel.style.maxHeight) {
					  panel.style.maxHeight = null;
					} else {
					  panel.style.maxHeight = panel.scrollHeight + "px";
					} 
				  });
				}
				</script>
			
			</div>
		  </div>
		  <div class="quick-order-left">
		    <div class="quick-order-review">
				<h3 id="order_review_heading">ההזמנה שלי</h3>
				<div id="order_review" class="">
				  <table class="shop_table quick_table">
					<tbody>
					  <!-- Cart item -->
					  <tr class="cart_item">
						<td class="product-name">
							<div class="ts-product-image">
								<img width="600" height="600" src="https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-600x600.png" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" srcset="https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-600x600.png 600w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-100x100.png 100w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-700x700.png 700w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-300x300.png 300w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-1024x1024.png 1024w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-150x150.png 150w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-768x768.png 768w, 
								https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3.png 1100w" sizes="(max-width: 600px) 100vw, 600px">
							</div>
							<div class="ts-product-details">
								<div class="quick-table-name">אלו פירסט</div>
								<div class="quick-table-cc">CC <span>0.012</span></div>
								<div class="quick-table-sku">מק''ט <span>#123</span></div>
								<div class="product-quantity">כמות: <span>1</span></div>
							</div>
						</td>
						<td class="product-total">
						<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>164.97</bdi></span>					
						</td>
					  </tr>
					  <!-- /Cart item -->
					  <!-- Cart item -->
					  <tr class="cart_item">
						<td class="product-name">
							<div class="ts-product-image">
								<img width="600" height="600" src="https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-600x600.png" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" srcset="https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-600x600.png 600w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-100x100.png 100w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-700x700.png 700w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-300x300.png 300w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-1024x1024.png 1024w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-150x150.png 150w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-768x768.png 768w, 
								https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3.png 1100w" sizes="(max-width: 600px) 100vw, 600px">
							</div>
							<div class="ts-product-details">
								<div class="quick-table-name">אלו פירסט</div>
								<div class="quick-table-cc">CC <span>0.012</span></div>
								<div class="quick-table-sku">מק''ט <span>#123</span></div>
								<div class="product-quantity">כמות: <span>1</span></div>
							</div>
						</td>
						<td class="product-total">
						<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>164.97</bdi></span>					
						</td>
					  </tr>
					  <!-- /Cart item -->
					  <!-- Cart item -->
					  <tr class="cart_item">
						<td class="product-name">
							<div class="ts-product-image">
								<img width="600" height="600" src="https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-600x600.png" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" srcset="https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-600x600.png 600w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-100x100.png 100w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-700x700.png 700w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-300x300.png 300w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-1024x1024.png 1024w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-150x150.png 150w, https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3-768x768.png 768w, 
								https://forever.ussl.shop/wp-content/uploads/2021/02/aloe-first-3.png 1100w" sizes="(max-width: 600px) 100vw, 600px">
							</div>
							<div class="ts-product-details">
								<div class="quick-table-name">אלו פירסט</div>
								<div class="quick-table-cc">CC <span>0.012</span></div>
								<div class="quick-table-sku">מק''ט <span>#123</span></div>
								<div class="product-quantity">כמות: <span>1</span></div>
							</div>
						</td>
						<td class="product-total">
						<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>164.97</bdi></span>					
						</td>
					  </tr>
					  <!-- /Cart item -->
					</tbody>
					<tfoot>
					  <tr class="cart-subtotal quick-subtotal">
						<th>סה"כ</th>
						<td><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>164.97</bdi></span></td>
					  </tr>
					  <tr class="cart-subtotal quick-vat">
						<th>מע"מ</th>
						<td><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>164.97</bdi></span></td>
					  </tr>
					  <tr class="cart-subtotal quick-shipping">
						<th>משלוח</th>
						<td><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>164.97</bdi></span></td>
					  </tr>
					  <tr class="order-total quick-total">
						<th>סה"כ לתשלום</th>
						<td><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₪</span>164.97</bdi></span></strong> </td>
					  </tr>
					  <tr class="order-total quick-cc">
						<th>סה"כ CC</th>
						<td><strong>0.101</strong> </td>
					  </tr>
					</tfoot>
				  </table>
				  
				  <div class="cart-page-buttons success-pages">
					<div class="wc-proceed-to-checkout">
						<a class="button back-to-shop" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">חזרה לחנות</a>
					</div>
					<div class="wc-proceed-to-checkout">
						<!-- Change to dynamic link!!! --><a class="button go-to-account" href="https://forever.ussl.shop/checkout/">לתשלום</a>
					</div>
				  </div>
		
		
				</div>
			</div>
		  </div>
		  
		</div>
		<!-- /quick-order woocommerce -->
		
		
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->



<?php get_footer(); ?>
