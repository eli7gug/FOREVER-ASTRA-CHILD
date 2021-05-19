<?php
/**
 * Template Name: Create Link
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
		
        <?php 
            global $wp;
            $current_url = home_url( $_SERVER['REQUEST_URI'] );
            echo do_shortcode('[addtoany url="' . $current_url . '"]') ;
        ?>
		
		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->



<?php get_footer(); ?>
