<?php
/**
 * Template part for displaying posts
 * Media Style
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

<article id="post-<?php the_ID(); ?>" <?php post_class( codeless_extra_classes( 'entry' ) ); ?> <?php echo codeless_extra_attr( 'entry' ) ?>>
	
	<div class="grid-holder">

        <div class="grid-holder-inner">
	 
        	<?php 
        	
        	$post_format = get_post_format() || '';
        	
        	/**
        	 * Generate Post Thumbnail for Single Post and Blog Page and Overlay
        	 */ 
        		
        	?>

            <div class="entry-media entry-overlay-zoom_color">

                <div class="entry-overlay">
                
                        <div class="inner">
                            <div class="content">
                                <?php echo codeless_get_entry_meta_date() . ' - ' . codeless_get_entry_meta_author() ?>
                                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                            </div>
                        </div>

                </div><!-- .entry-overlay -->

                <div class="post-thumbnail">
    
                    <?php if( codeless_get_mod( 'blog_image_filter', 'normal' ) != 'normal' ): ?>
                        <figure class="<?php echo codeless_get_mod( 'blog_image_filter' ) ?>">
                    <?php endif; ?>

                        <?php the_post_thumbnail( codeless_get_post_thumbnail_size() ); ?>
                        
                    <?php if( codeless_get_mod( 'blog_image_filter', 'normal' ) != 'normal' ): ?>
                        </figure>
                    <?php endif; ?>

                </div><!-- .post-thumbnail --> 
                <a href="<?php echo get_permalink() ?>" class="entry-link"></a>    
            </div><!-- .entry-media -->
            
            <div class="shadow"></div>

            

            

        </div><!-- .grid-holder-inner -->

    </div><!-- .grid-holder -->
    
</article><!-- #post-## -->