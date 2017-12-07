<?php
/**
 * Template part for displaying portfolio items
 * Inline Style
 * Switch styles at Theme Options (WP Customizer)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Folie
 * @subpackage Templates
 * @since 1.0.0
 *
 */

?>

<div id="cl-portfolio-item-<?php the_ID(); ?>" <?php post_class( codeless_extra_classes( 'portfolio_item' ) ); ?> <?php echo codeless_extra_attr( 'portfolio_item' ) ?>>
	
	

	 <?php 
	        	
	        /**
	         * Generate Post Thumbnail, slider or video for portfolio entries
	         */ 
	
	        get_template_part( 'template-parts/portfolio/parts/media', codeless_portfolio_item_format() );

	        ?>
	
        	<?php 
	        	
	        /**
	         * Generate extra HTML for each portfolio style
	         */ 
	
	        get_template_part( 'template-parts/portfolio/parts/style', codeless_portfolio_style() );

	 ?>

     <?php codeless_hook_custom_post_end( 'portfolio', get_the_ID() ); ?>
</div><!-- #post-## -->
