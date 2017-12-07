<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
                   
wp_reset_postdata();

// Element ID
$blog_id = 'cl_blog_' . str_replace( ".", '-', uniqid("", true) );


if( $carousel )
    wp_enqueue_style('owl-carousel', CODELESS_BASE_URL.'css/owl.carousel.min.css' );

/* Image Filters */
if( $image_filter != 'normal' )
    wp_enqueue_style('codeless-image-fitlers', CODELESS_BASE_URL.'css/codeless-image-filters.css' );

// Vars of portfolio
$categories = cl_atts_to_array($categories);

$posts_per_page_ = (int) $posts_per_page;
// Blog News Posts Per page
if( $blog_style == 'news' && $blog_news == 'grid_1' )
	$posts_per_page_ = 4;
if( $blog_style == 'news' && $blog_news == 'grid_2' )
	$posts_per_page_ = 5;
if( $blog_style == 'news' && $blog_news == 'grid_3' )
	$posts_per_page_ = 4;


// Build New Query
$new_query = array( 'orderby'   => $orderby, 
                    'order'     => $order,
                    'posts_per_page' => $posts_per_page
); 

if( ! empty( $categories ) && is_array( $categories ) && count( $categories ) > 0 && !empty($categories[0]) )
	$new_query['cat'] = $categories;

$paged_attr = 'paged';

if( is_front_page() )
	$paged_attr = 'page';

if( get_query_var( $paged_attr ) )
	$new_query['paged'] = get_query_var( $paged_attr );


/* Used for related posts */

if( isset( $related ) && (int) $related != 0 ){
	$tags = wp_get_post_tags($related);

	if ($tags){
		$first_tag = $tags[0]->term_id;
		$new_query = array(
			'tag__in' => array($first_tag),
			'post__not_in' => array($related),
			'posts_per_page' => $posts_per_page,
			'caller_get_posts'=>1
		);
	}
}
	

global $cl_from_element;
$cl_from_element['blog_style'] = $blog_style;
$cl_from_element['blog_grid_layout'] = $blog_grid_layout;
$cl_from_element['blog_pagination'] = $blog_pagination;
$cl_from_element['blog_boxed'] = $blog_pagination;
$cl_from_element['blog_button_style'] = $blog_pagination;
$cl_from_element['blog_animation'] = $blog_pagination;
$cl_from_element['blog_excerpt_length'] = 29;
$cl_from_element['blog_remove_meta'] = $blog_remove_meta;
$cl_from_element['blog_animation'] = $blog_animation;
$cl_from_element['blog_news'] = $blog_news;
$cl_from_element['blog_image_filter'] = $image_filter;
$cl_from_element['blog_lazyload'] = $blog_image_lazyload;
$cl_from_element['blog_from_element'] = true;
$cl_from_element['blog_image_size'] = $image_size;

if( $blog_style == 'masonry' ){
	$cl_from_element['blog_entry_meta_author'] = false;
    $cl_from_element['blog_entry_meta_categories'] = false;
}


add_filter( 'excerpt_length', 'codeless_custom_excerpt_length', 999 );

$the_query = new WP_Query( $new_query );
						
// Display posts
if ( $the_query->have_posts() ) :
								
?>
<div id="<?php echo esc_attr( $blog_id ) ?>" class="cl_blog cl-element <?php echo esc_attr( $this->generateClasses('.cl_blog') ) ?>" <?php $this->generateStyle('.cl_blog', '', true) ?>>

	<div id="blog-entries" class="<?php echo esc_attr( $this->generateClasses('.cl_blog > #blog-entries') ) ?> <?php echo esc_attr( codeless_extra_classes( 'blog_entries' ) ) ?>" <?php echo codeless_extra_attr( 'blog_entries' ) ?> <?php  $this->generateStyle('.cl_blog > #blog-entries', '', true) ?>>
				
	<?php
									
		// Loop counter
		$i = 0;
		codeless_loop_counter($i);
									
		// Start loop
		while ( $the_query->have_posts() && $posts_per_page_ >= ( $i + 1 ) ) : $the_query->the_post();
			
			if( ! has_post_thumbnail() && ( $blog_style == 'media' || $blog_style == 'news' ) )
				continue;

			codeless_loop_counter(++$i);
								
			/*
			 * Get Blog Template Style
			 * Codeless_blog_style returns the style selected
			 * from Theme Options or a custom filter
			 */
			get_template_part( 'template-parts/blog/style', codeless_blog_style() );
				
		// End loop
		endwhile; ?>
				
	</div><!-- #blog-entries -->
				
	<?php
		// Display post pagination (next/prev - 1,2,3,4..)
		if( $blog_pagination )
			codeless_blog_pagination( $the_query ) ; 
		wp_reset_postdata();
				
	else : ?>
				
		<article class="content-none"><?php esc_html_e( 'No Posts found.', 'folie' ); ?></article>
				
	<?php endif; ?>
</div><!-- .cl_blog -->