<?php
/**
 * Template part for displaying posts filter
 * Switch styles at Theme Options (WP Customizer)
 *
 *
 * @package Folie
 * @subpackage Templates
 * @since 1.0.0
 * @version 1.0.7
 *
 */

?>

<div class="cl-filters cl-blog-filter cl-filter-<?php echo codeless_get_mod( 'blog_filters' ) ?> cl-filter-color-<?php echo esc_attr( codeless_get_mod( 'blog_filters_color', 'dark' ) ) ?>">

<?php
	$categories = get_categories( array(
	    'orderby' => 'name',
	    'order'   => 'ASC'
	) );

?>
	<div class="inner">

		<button data-filter="*"><?php esc_html_e( 'All', 'folie' ) ?></button>
		

		<?php foreach( $categories as $category ): ?>

	  	<button data-filter=".category-<?php echo esc_attr( $category->slug ) ?>"><?php echo esc_attr( $category->name ) ?></button>

		<?php endforeach; ?>

	</div><!-- .inner -->

</div><!-- .cl-filters -->