<?php
/**
 * Portfolio Classic Template Part for showing title and categories
 *
 * @package Folie
 * @subpackage Portfolio Parts
 * @since 1.0.0
 *
 */

?>
<div class="entry-wrapper-content">

	<div class="entry-content">

		<h3 class="portfolio-title custom_font <?php echo codeless_get_mod( 'portfolio_item_title_style', 'h4' ) ?>">

			<a href="<?php echo codeless_portfolio_item_permalink() ?>" class="cl-portfolio-title" title="<?php the_title() ?>"><?php the_title() ?></a>
			
		</h3>

		<div class="portfolio-categories">

			<?php echo get_the_term_list( get_the_ID(), 'portfolio_entries', '', ', ', '' ); ?>

		</div><!-- portfolio-categories -->

	</div><!-- entry-content -->

</div><!-- entry-wrapper-content -->