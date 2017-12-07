<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
                   
wp_reset_postdata();

// Vars of portfolio
$query_vars['posts_per_page'] = $posts_per_page;
$query_vars['categories'] = cl_atts_to_array($categories);
$query_vars['orderby'] = $orderby;
$query_vars['order'] = $order;
// Set Query

wp_enqueue_style('owl-carousel', CODELESS_BASE_URL.'css/owl.carousel.min.css' ); 

$new_query = codeless_set_testimonial_query( $query_vars );
$the_query = new WP_Query( $new_query );

// Display posts
if ( is_object($the_query) && $the_query->have_posts() ) :


// Start displaying testimonials                            
?>
<div id="testimonial-entries" class="owl-carousel cl-carousel owl-theme cl-element <?php echo esc_attr( $this->generateClasses('#testimonial-entries') ) ?>" <?php $this->generateStyle('#testimonial-entries', '', true) ?> >
            
<?php
                                
    // Loop counter
    $i = 0;
    codeless_loop_counter($i);
                                
    // Start loop
    while ( $the_query->have_posts() ) : $the_query->the_post();
        
        codeless_loop_counter(++$i);
                                    
        /*
         * Single Testimonial Layout and style
         */
        ?>

        <div class="testimonial_item" id="cl_testimonial_item_<?php echo get_the_ID() ?>">
        	<div class="content">"<?php

                echo wp_strip_all_tags( get_the_content() );
                


            ?>"</div>
        	<div class="title">- <?php echo get_the_title() ?></div>
            <?php codeless_hook_custom_post_end( 'testimonial', get_the_ID() ); ?>
        </div>

        <?php
            
    // End loop
    endwhile; 

    
    ?>
    

</div><!-- #testimonial-entries -->

  

<?php
    
    wp_reset_postdata();      ?>      

<?php else : ?>
            
    <article class="content-none"><?php esc_html_e( 'No Posts found.', 'folie' ); ?></article>
            
<?php endif; ?>

<?php codeless_hook_custom_post_loop_end( 'testimonial' ); ?> 