<?php
/**
 * Template part for displaying portfolio filter
 * Switch styles at Theme Options (WP Customizer)
 *
 *
 * @package Folie
 * @subpackage Templates
 * @since 1.0.0
 *
 */

?>

<?php 

	$extra_class = '';
	if( codeless_get_from_element( 'portfolio_columns' ) == 1 )
		$extra_class = 'centered'; 

	if( codeless_get_mod( 'portfolio_filter_fullwidth_shadow', false ) )
		$extra_class .= ' with-shadow '; 

	if( codeless_get_mod( 'portfolio_filter_fullwidth_sticky', false ) )
		$extra_class .= ' sticky '; 
	
?>
<div class="cl-filters <?php echo esc_attr( $extra_class ) ?> cl-filter-align-<?php echo esc_attr( codeless_get_mod( 'portfolio_filters_align', 'dark' ) ) ?> cl-filter-color-<?php echo esc_attr( codeless_get_mod( 'portfolio_filters_color', 'dark' ) ) ?> cl-portfolio-filter cl-filter-<?php echo esc_attr( codeless_get_from_element( 'portfolio_filters' ) ) ?>">

<?php
	$categories = codeless_get_from_element( 'portfolio_categories' );

?>
	<div class="inner">

		<button data-filter="*" class="selected"><?php esc_html_e( 'All', 'folie' ) ?></button>
		

		<?php if( empty( $categories ) ):

			$categories = get_terms( 'portfolio_entries' );

		endif; ?>

		<?php foreach( $categories as $category ): ?>
  	
			<?php 

				if( is_string( $category ) )
					$category = get_term_by( 'slug', $category, 'portfolio_entries' );

			?>

			  <button data-filter=".portfolio_entries-<?php echo esc_attr( $category->slug ) ?>"><?php echo esc_attr( $category->name ) ?></button>

		<?php endforeach; ?>

	</div><!-- .inner -->

</div><!-- .cl-filters -->