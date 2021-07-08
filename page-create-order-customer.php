<?php

/**
 * Create Customer Order
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>


	<div class="dsh-account dsh-create-customer-order">
        <h1><?php echo  __( 'Create an order for a customer', 'astra-child' ) ?></h1>

        <?php 
              if ( ! WC()->cart->is_empty() ) { 
                echo  __( 'Empty your bag first!', 'astra-child' );
                $disabled = 'disabled="disabled"';?>
                <form action="" method="post">
                    <input type="submit" class="deleteAll" name="empty_cart" value="מחק הכל" />
                </form> 
              <?php }
              else{
                $disabled = '';
              }
        ?>
		
        <p><?php echo  __( 'In this screen, you can create a cart for a customer and share the cart with him.', 'astra-child' ) ?></p>
        <p><?php echo  __( 'The simple and fast way to give good service to your customers.', 'astra-child' ) ?></p>
        <p><?php echo  __( 'Select a customer type', 'astra-child' ) ?></p>
        <input type="radio" id="retail_customer" name="cust_type" value="retail_customer">
        <label for="retail_customer"><?php echo  __( 'Retail customer', 'astra-child' ) ?></label><br>
        <input type="radio" id="club_customer" name="cust_type" value="club_customer">
        <label for="club_customer"><?php echo  __( 'Club customer / marketer', 'astra-child' ) ?></label><br>
        <button type='button' <?php echo $disabled; ?> name='create_order_submit' id='create_order_submit'><?php echo  __( 'Continue', 'astra-child' ) ?></button>
        

        <?php

        ?>
		


	</div><!-- #primary -->



<?php get_footer(); ?>
