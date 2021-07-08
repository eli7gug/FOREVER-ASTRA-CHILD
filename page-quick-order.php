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
					<select name="search_sku_term" class="search_sku_term">
						<option value="0" selected ><?php echo __('Added by SKU #','astra-child')?></option>
						<?php
						$args = array(
							'post_type' => 'product', 
							'posts_per_page' => -1
						);
						
						$wcProductsArray = get_posts($args);
						
						if (count($wcProductsArray)) {
							foreach ($wcProductsArray as $productPost) {
								$productSKU = get_post_meta($productPost->ID, '_sku', true);
								$productTitle = get_the_title($productPost->ID);
						
								echo '<option value="'.$productSKU.'" >' . $productSKU . '</option>';
							}
						}
						?>
					</select>
				</div>
				<div class="search-by-name">
					<select name="search_name_term" class="search_name_term">
						<option value="0" selected ><?php echo __('Added by product name','astra-child')?></option>
						<?php
						$args = array(
							'post_type' => 'product', 
							'posts_per_page' => -1
						);
						
						$wcProductsArray = get_posts($args);
						
						if (count($wcProductsArray)) {
							foreach ($wcProductsArray as $productPost) {
								$productSKU = get_post_meta($productPost->ID, '_sku', true);
								$productTitle = get_the_title($productPost->ID);
						
								echo '<option value="'.$productTitle.'" >' . $productTitle . '</option>';
							}
						}
						?>
					</select>
				</div>

			</div>
			<div class="pdt_msg_error"></div>
			<div class="quick-order-accordion">
				<?php
					$args = array(
					'orderby'    => 'title',
					'order'      => 'ASC',
					'hide_empty'   => true,
				);
				$product_categories = get_terms( 'product_cat', $args );
				$count = count($product_categories);
				if ( $count > 0 ){
					foreach ( $product_categories as $product_category ) {
						echo '<button class="accordion">' . $product_category->name . '</button>';
						$args = array(
							'posts_per_page' => -1,
							'tax_query' => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'product_cat',
									'field' => 'slug',
									'terms' => $product_category->slug
								)
							),
							'post_type' => array('product', 'product_variation'),
							'orderby' => 'title,'
						);
						$products = new WP_Query( $args );

						?>
						<div class="panel">
							
								<table class="quick-order-accordion-table" cellspacing="0">
									<thead>
										<tr>
											<th class="product-sku"><?php esc_html_e( 'SKU', 'woocommerce' ); ?></th>
											<th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
											<th class="product-cc"><!--<?php esc_html_e( 'value', 'woocommerce' ); ?>--><span class="cc-font"> CC</span></th>
											<th class="product-quantity"><?php esc_html_e( 'Count', 'woocommerce' ); ?></th>
											<th class="product-subtotal"><?php esc_html_e( 'Unit Price', 'ti-woocommerce-wishlist' ); ?> </th>
										</tr>
									</thead>
									<tbody>
										<?php while ( $products->have_posts() ) {
											$products->the_post();
											global $post, $product;
											?>
												<tr class="<?php echo $product->get_id();?>">
													<td class="product-sku" data-title="מקט">
														<?php echo $product->get_sku(); ?>
													</td>
													<td class="product-name" data-title="מוצר">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</td>
													<td class="product-cc" data-title="CC">
														<?php echo $product->get_meta('cc_value');?>
													</td>
													
														<td class="product-quantity" data-title="כמות">
                                                        <?php
                                                         if(isset($_GET['agent'])){
                                                             $agent = $_GET['agent'];
                                                         }
                                                        ?>
														<form class="cart" action="<?php echo esc_url( $product->add_to_cart_url().'&agent='.$agent.'' ); ?>"  method="post" enctype="multipart/form-data">
															<?php 
															
															$link = array(
																'url'   => '',
																'label' => '',
																'class' => ''
															);
															if ( $product->is_purchasable() ) {
																$link['url']    = apply_filters( 'add_to_cart_url', esc_url( $product->add_to_cart_url() ) );
																$link['label']  = apply_filters( 'add_to_cart_text', __( 'Add to cart', 'woocommerce' ) );
																$link['class']  = apply_filters( 'add_to_cart_class', 'add_to_cart_button' );
															} else {
																$link['url']    = apply_filters( 'not_purchasable_url', get_permalink( $product->id ) );
																$link['label']  = apply_filters( 'not_purchasable_text', __( 'Product is invalid.', 'woocommerce' ) );
															}
															
															
															woocommerce_quantity_input();
															echo sprintf( '<button type="submit" data-product_id="%s" data-product_sku="%s" data-quantity="1" class="%s button product_type_simple">%s</button>', esc_attr( $product->id ), esc_attr( $product->get_sku() ), esc_attr( $link['class'] ), esc_html( $link['label'] ) ); 
															?>
															</form>
														</td>
													
													<td class="product-subtotal" data-title="סכום ביניים">
														<?php echo wc_price($product->get_price());?>
													</td>
												</tr>
											<?php
										}?>
									</tbody>
								</table>
							
						</div>
					<?php }
				}
				?>
				
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
				<h3 id="order_review_heading"><?php echo __('My order', 'astra-child')?></h3>
				<div id="order_review" class="">
					<table class="shop_table woocommerce-checkout-review-order-table quick_table">
						<tbody>
							<?php
							do_action( 'woocommerce_review_order_before_cart_contents' );

							foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
								$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

								if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
									?>
									<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
										<td class="product-name">
											<div class="ts-product-image">
												<?php  $thumbnail = $_product->get_image();
												echo $thumbnail;
												?>

											</div>
											<div class="ts-product-details">
												<div class="quick-table-name">
													<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
												</div>
												<div class="quick-table-cc">
													<?php 
														$cc_val_unit     = $_product->get_meta( 'cc_value', true );
														$qtty = $cart_item['quantity'];
														$cc_val = (float)$cc_val_unit * $qtty;
													echo sprintf( '%s&nbsp;%s', __('CC', 'woocommerce'),$cc_val );?>
												</div>
												<div class="quick-table-sku">
													<?php echo sprintf( '%s&nbsp;%s', __('SKU', 'woocommerce'),$_product->get_sku() );?>
												</div>
												<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <div class="product-quantity">' . sprintf( '%s:&nbsp;%s', __('Quantity', 'woocommerce'),$cart_item['quantity'] ) . '</div>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
												<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
											</div>	
										</td>
										<td class="product-total">
											<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										</td>
									</tr>
									<?php
								}
							}

							do_action( 'woocommerce_review_order_after_cart_contents' );
							?>
						</tbody>
						<tfoot>

							<tr class="cart-subtotal quick-subtotal">
								<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
								<td><?php wc_cart_totals_subtotal_html(); ?></td>
							</tr>

							<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
								<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
									<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
									<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
								</tr>
							<?php endforeach; ?>

							<tr class="cart-subtotal quick-shipping">
								<th><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></th>
								<td><?php echo WC()->cart->get_cart_shipping_total() ?></td>
							</tr>
						
							

							<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
								<tr class="fee">
									<th><?php echo esc_html( $fee->name ); ?></th>
									<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
								</tr>
							<?php endforeach; ?>

							<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
								<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
									<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
										<tr class="cart-subtotal quick-vat tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
											<th><?php echo esc_html( $tax->label ); ?></th>
											<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
										</tr>
									<?php endforeach; ?>
								<?php else : ?>
									<tr class="cart-subtotal quick-vat">
										<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
										<td><?php wc_cart_totals_taxes_total_html(); ?></td>
									</tr>
								<?php endif; ?>
							<?php endif; ?>

							<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

							<tr class="order-total">
								<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
								<td><?php wc_cart_totals_order_total_html(); ?></td>
							</tr>
							<tr class="order-total quick-cc">
								<th><?php esc_html_e( 'Total', 'woocommerce' ); ?><span class="cc-font"> CC</span></th>
								<td><strong><?php echo get_total_CC();?></strong> </td>
							</tr>

							<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

						</tfoot>
					</table>

					<div class="cart-page-buttons success-pages">
						<div class="wc-proceed-to-checkout">
							<a class="button back-to-shop" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">חזרה לחנות</a>
						</div>
						<div class="wc-proceed-to-checkout">
							<a class="button go-to-account" href="<?php echo WC()->cart->get_checkout_url() ?>"><?php echo __('Checkout', 'woocommerce');?></a>
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
