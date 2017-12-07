<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
                   
wp_reset_postdata();

// Element ID
$element_id = uniqid();


// Vars of portfolio
$query_vars['posts_per_page'] = $posts_per_page;
$query_vars['categories'] = cl_atts_to_array($categories);
$query_vars['orderby'] = $orderby;
$query_vars['order'] = $order;
// Set Query

// Set some global vars for use with codeless_get_from_element
global $cl_from_element;
$cl_from_element['portfolio_overlay'] = $portfolio_overlay;
$cl_from_element['portfolio_overlay_distance'] = $portfolio_overlay_distance;
$cl_from_element['portfolio_overlay_icon_bool'] = $portfolio_overlay_icon_bool;
$cl_from_element['portfolio_overlay_title_bool'] = (int) $portfolio_overlay_title_bool;
$cl_from_element['portfolio_overlay_title_style'] = $portfolio_overlay_title_style;
$cl_from_element['portfolio_overlay_categories_bool'] = $portfolio_overlay_categories_bool;
$cl_from_element['portfolio_overlay_icon'] = $portfolio_overlay_icon;
$cl_from_element['portfolio_pagination_style'] = $portfolio_pagination_style;
$cl_from_element['portfolio_animation'] = $portfolio_animation;
$cl_from_element['portfolio_filters'] = $portfolio_filters;
$cl_from_element['portfolio_style'] = $style;
$cl_from_element['portfolio_distance'] = $distance;
$cl_from_element['portfolio_overlay_color'] = $portfolio_overlay_color;
$cl_from_element['portfolio_overlay_content_color'] = $portfolio_overlay_content_color;
$cl_from_element['portfolio_item_title_style'] = $portfolio_item_title_style;
$cl_from_element['portfolio_image_filter'] = $image_filter;
$cl_from_element['portfolio_layout'] = $layout;
$cl_from_element['portfolio_columns'] = (int) $columns;
$cl_from_element['portfolio_image_size'] = $image_size;
$cl_from_element['portfolio_overlay_gradient'] = $overlay_gradient;
$cl_from_element['portfolio_filter_fullwidth_sticky'] = $filter_fullwidth_sticky;
$cl_from_element['portfolio_filter_fullwidth_shadow'] = $filter_fullwidth_shadow;
$cl_from_element['portfolio_filters_align'] = $portfolio_filters_align;
$cl_from_element['portfolio_filters_color'] = $portfolio_filters_color;
$cl_from_element['portfolio_custom_link_target'] = $portfolio_custom_link_target;
$cl_from_element['portfolio_categories'] = cl_atts_to_array($categories);

/* Add Custom Styles */
wp_enqueue_style('codeless-portfolio', CODELESS_BASE_URL.'css/codeless-portfolio.css' );


/* Image Filters */
if( $image_filter != 'normal' )
    wp_enqueue_style('codeless-image-fitlers', CODELESS_BASE_URL.'css/codeless-image-filters.css' );

if( $portfolio_overlay_icon == 'lightbox' || $portfolio_overlay == 'two_icons' ){
    wp_enqueue_style('ilightbox', CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css' );
}

if( $carousel )
    wp_enqueue_style('owl-carousel', CODELESS_BASE_URL.'css/owl.carousel.min.css' );
                     
$css_classes[] = $layout.'-entries';
$css_classes[] = 'portfolio-entries-'.$element_id;

if( $portfolio_filters != 'disabled' )
    $css_classes[] = 'filterable-entries';

if( $portfolio_animation != 'none' )
    $css_classes[] = 'animated-entries';

// Load Filters if needed
if( $portfolio_filters != 'disabled' )
    get_template_part( 'template-parts/portfolio/parts/filters' );


$new_query = codeless_set_portfolio_query( $query_vars );
$the_query = new WP_Query( $new_query );

// Display posts
if ( is_object( $the_query ) && $the_query->have_posts() ) :


// Start displaying portfolio layout                              
?>
<div id="portfolio-entries" class="<?php echo esc_attr( implode(' ', $css_classes) ) ?> <?php echo esc_attr( $this->generateClasses('#portfolio-entries') ) ?> cl-element" <?php $this->generateStyle('#portfolio-entries', '', true) ?> >
            
<?php
                                
    // Loop counter
    $i = 0;
    codeless_loop_counter($i);
                                
    // Start loop
    while ( $the_query->have_posts() ) : $the_query->the_post();
        
        codeless_loop_counter(++$i);
                                    
        /*
         * Get Portfolio Template Style
         * Codeless_portfolio_layout returns the style selected
         * from Theme Options or a custom filter
         */
        get_template_part( 'template-parts/portfolio/layout', $layout );
        
        
    // End loop
    endwhile; 

    
    ?>
    

</div><!-- #portfolio-entries -->
           
<?php
    // Display post pagination (next/prev - 1,2,3,4..)
    if( ! $carousel && $portfolio_pagination_style != 'none' )
        codeless_portfolio_pagination( $the_query ) ;
    
    wp_reset_postdata();      ?>      

<?php else : ?>
            
    <article class="content-none"><?php esc_html_e( 'No Posts found.', 'folie' ); ?></article>
            
<?php endif; ?>

<?php codeless_hook_custom_post_loop_end( 'portfolio' ); ?> 



