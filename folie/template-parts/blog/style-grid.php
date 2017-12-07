<?php
/**
 * Template part for displaying posts
 * Grid Style
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
        	 * Generate Post Thumbnail for Single Post and Blog Page
        	 */ 
        	
        	if ( has_post_thumbnail() && $post_format != 'gallery' ) :
        		
        		get_template_part( 'template-parts/blog/parts/entry', 'thumbnail' );
        	
        	endif; ?>
        	
        	
        	<?php
        	
        	/**
        	 * Generate Slider if needed
        	 */ 
        	if ( get_post_format() == 'gallery' && get_post_gallery() ):
        	
        		get_template_part( 'template-parts/blog/parts/entry', 'slider' );
        	
        	endif; ?>
        	
        	<?php
        	
        	/**
        	 * Generate Video Output
        	 */ 
        	if ( get_post_format() == 'video' ):
        	
        		get_template_part( 'template-parts/blog/parts/entry', 'video' );
        	
        	endif; ?>
        	
        	<?php
        	
        	/**
        	 * Generate Audio Output
        	 */ 
        	if ( get_post_format() == 'audio' ):
        	
        		get_template_part( 'template-parts/blog/parts/entry', 'audio' );
        	
        	endif; ?>
        		
        	
        	<div class="entry-wrapper">
        	
        	
        	
        		<?php
        		
        		/**
        		 * Add entry-wrapper
        		 * Used only on blog page
        		 */ 
        		if( ! codeless_is_single_post() ): ?>
        		<div class="entry-wrapper-content">
        		<?php endif; ?>
        			
        			<?php	
        			/**
        			 * Entry Header
        			 * Output Entry Meta and title
        			 */ 
        			?>
        			<header class="entry-header">
		
        				<?php
        					if ( codeless_is_single_post() ) {
        						the_title( '<h1 class="entry-title">', '</h1>' );
        					} elseif( get_post_format() != 'quote' ) {
        						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        					}
        				?>

                        <?php get_template_part( 'template-parts/blog/parts/entry', 'meta' ); ?>
        			</header><!-- .entry-header -->
        				
        			<?php 
                        add_filter( 'excerpt_length', 'codeless_custom_excerpt_length', 999 );
                        get_template_part( 'template-parts/blog/formats/content', get_post_format() ) ?>
	
        		<?php
        		/**
        		 * Close Entry Wrapper
        		 */ 
        		if ( ! codeless_is_single_post() ) : ?>
        		</div><!-- .entry-wrapper-content -->
        		<?php endif; ?>
        		
        	</div><!-- .entry-wrapper -->

            <div class="entry-tools-wrapper">

                <?php get_template_part( 'template-parts/blog/parts/entry', 'readmore' ); ?>

                <?php 
                /**
                 * Output Entry Tools
                 * Only on Blog Page, not single post
                 */ 

                $entry_tools = codeless_get_post_entry_tools();

                if( ! codeless_is_single_post() && ! empty( $entry_tools ) ): ?>
                        
                    <?php get_template_part( 'template-parts/blog/parts/entry', 'tools' ); ?>
                            
                <?php endif; ?>

            </div><!-- .entry-tools -->

        </div><!-- .grid-holder-inner -->

    </div><!-- .grid-holder -->
    
</article><!-- #post-## -->
