<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_reset_query();

$query_vars['posts_per_page'] = $posts_per_page;
$query_vars['categories'] = cl_atts_to_array($categories);
$query_vars['orderby'] = $orderby;
$query_vars['order'] = $order;
if( (int) $is_single )
    $query_vars['team_id'] = $team_id;

global $cl_from_element;
$cl_from_element['team_items_distance'] = $team_items_distance;
$cl_from_element['team_animation'] = $team_animation;
$cl_from_element['team_grid_layout'] = $grid_layout;
$cl_from_element['team_image_size'] = $image_size;
$cl_from_element['team_title_typography'] = $title_typography;

// Load neccessary css files
if( $carousel )
    wp_enqueue_style('owl-carousel', CODELESS_BASE_URL.'css/owl.carousel.min.css' );

// Execute Query
$new_query = codeless_set_team_query( $query_vars );
$the_query = new WP_Query( $new_query );

// Display posts
if ( is_object($the_query) && $the_query->have_posts() ) :
?>

<div class="cl_team cl-element <?php echo esc_attr( $this->generateClasses('.cl_team') ) ?>" <?php $this->generateStyle('.cl_team', '', true) ?>>

<?php
                                
    // Loop counter
    $i = 0;
    codeless_loop_counter($i);
                                
    // Start loop
    while ( $the_query->have_posts() ) : $the_query->the_post();
        
        codeless_loop_counter(++$i);
                                    
        /*
         * Single Team Layout and style
         */
        ?>

        <?php get_template_part( 'template-parts/team/style', $style ) ?>

        <?php
            
    // End loop
    endwhile; 

    
    ?>

</div><!-- .cl_team -->
        
<?php wp_reset_query(); ?>      

<?php else : ?>
            
    <article class="content-none"><?php esc_html_e( 'No Posts found.', 'folie' ); ?></article>
            
<?php endif; ?>

<?php codeless_hook_custom_post_loop_end( 'staff' ); ?>