<?php
/**
 * Template part for displaying posts
 * News Style
 * Switch styles at Theme Options (WP Customizer)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Folie
 * @subpackage Templates
 * @since 1.0.0
 *
 */

codeless_hook_news_grid_item_before();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( codeless_extra_classes( 'entry' ) ); ?> <?php echo codeless_extra_attr( 'entry' ) ?>>
	
	<div class="grid-holder">

        <div class="grid-holder-inner">
	 
        	<?php 
        	
        	$post_format = get_post_format() || '';
        	
        	/**
        	 * Generate Post Thumbnail for Single Post and Blog Page
        	 */ 
        		
        	?>

            <div class="entry-media">

                <div class="post-thumbnail">
    
                    <?php the_post_thumbnail( codeless_get_post_thumbnail_size() ); ?>

                </div><!-- .post-thumbnail --> 

            </div><!-- .entry-media -->
            
            <div class="shadow"></div>

            <div class="content">

                <?php $category = get_the_category() ?>
                <ul class="post-categories"><li><?php echo esc_attr( $category[0]->cat_name ) ?></ul>

                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

            </div><!-- .content -->

            <a href="<?php echo get_permalink() ?>" class="entry-link"></a>

        </div><!-- .grid-holder-inner -->

    </div><!-- .grid-holder -->
    
</article><!-- #post-## -->

<?php codeless_hook_news_grid_item_after() ?>