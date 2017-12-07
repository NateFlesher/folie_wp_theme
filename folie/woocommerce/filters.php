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
	
?>
<div class="cl-filters <?php echo esc_attr( $extra_class ) ?> cl-shop-filter cl-filter-<?php echo esc_attr( codeless_get_mod( 'shop_filters' ) ) ?>">

<?php
	$categories = get_terms( 'product_cat' );

?>
	<div class="inner">

		<button data-filter="*" class="selected"><?php esc_html_e( 'All', 'folie' ) ?></button>
		

		<?php foreach( $categories as $category ): ?>

	  	<button data-filter=".product_cat-<?php echo esc_attr( $category->slug ) ?>"><?php echo esc_attr( $category->name ) ?></button>

		<?php endforeach; ?>

	</div><!-- .inner -->

</div><!-- .cl-filters -->