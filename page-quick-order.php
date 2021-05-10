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
					<input type="search" placeholder="הוספה מהירה ע''י מקט #" id="search_sku_term" name="search_sku_term">
				</div>
				<div class="search-by-name">
					<input type="search" id="search_name_term" name="search_name_term" value="<?php echo get_search_query(); ?>" placeholder="הוספה מהירה ע''י שם המוצר">
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
											<th class="product-sku">מק"ט</th>
											<th class="product-name">מוצר</th>
											<th class="product-cc">ערך <span class="cc-font"> CC</span></th>
											<th class="product-quantity">כמות</th>
											<th class="product-subtotal">מחיר ליחידה</th>
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
																$link['label']  = apply_filters( 'not_purchasable_text', __( 'Product not available', 'astra-child' ) );
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
