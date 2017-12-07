<?php
/**
 * Portfolio Template Part for displaying entry-thumnail image
 * Used for entry overlay too.
 *
 * @package Folie
 * @subpackage Portfolio Parts
 * @since 1.0.0
 *
 */

?>

<div class="entry-media entry-overlay-<?php echo codeless_get_from_element( 'portfolio_overlay', 'color' ) ?>">
	
	<?php 
	
	/**
	 * Portfolio Overlay Styles with the appropiate icon
	 * Portfolio Entry Link
	 */ 
	
	codeless_portfolio_overlay();

	?>
	
	
	<div class="post-thumbnail">
		
	<?php if( codeless_get_from_element( 'portfolio_image_filter' ) != 'normal' ): ?>
		<figure class="<?php echo codeless_get_from_element( 'portfolio_image_filter' ) ?>">
	<?php endif; ?>

		<?php the_post_thumbnail( codeless_get_portfolio_thumbnail_size() ); ?>
		
	<?php if( codeless_get_from_element( 'portfolio_image_filter' ) != 'normal' ): ?>
		</figure>
	<?php endif; ?>
	
	</div><!-- .post-thumbnail --> 
</div><!-- .entry-media --> 