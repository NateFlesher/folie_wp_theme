<?php
/**
 * Woocommerce Template File
 *
 * Used for generate woocommerce pages layout
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Folie WordPress Theme
 * @subpackage Templates
 * @version 1.0.0
 */

codeless_routing_template();

get_header(); ?>

	<section id="site_content" class="<?php echo esc_attr( codeless_extra_classes( 'site_content' ) ) ?>" <?php echo codeless_extra_attr( 'site_content' ) ?>>

		<?php codeless_hook_content_before(); ?>

		<div id="content" class="<?php echo esc_attr( codeless_extra_classes( 'content' ) ) ?>" <?php echo codeless_extra_attr( 'content' ) ?> >

			<?php
        
            /**
             * Functions hooked into codeless_hook_content_begin action
             *
             * @hooked codeless_add_page_header                     - 0
             * @hooked codeless_add_post_header                     - 10
             * @hooked codeless_layout_modern                       - 20
             * @hooked codeless_blog_filterable                     - 30
             */
            codeless_hook_content_begin(); ?>
		
				<div class="inner-content <?php echo esc_attr( codeless_extra_classes( 'inner_content' ) ) ?>">
				
					<div class="inner-content-row <?php echo esc_attr( codeless_extra_classes( 'inner_content_row' ) ) ?>">
								
						<?php codeless_hook_content_column_before() ?>
								
						<div class="content-col <?php echo esc_attr( codeless_extra_classes( 'content_col' ) ) ?>">
						
							<?php 
								// Generate WooCommerce Plugin Content
								codeless_woocommerce_content(); 
								
							?> 

						<?php codeless_hook_content_column_end() ?>

						</div><!-- .content-col -->
					
						<?php
        
	                    /**
	                     * Functions hooked into codeless_hook_content_column_after action
	                     *
	                     * @hooked codeless_get_sidebar                     - 0
	                     */
	                    codeless_hook_content_column_after() ?>
					
					</div><!-- .row -->
				
				</div><!-- .inner-content -->
			
			<?php codeless_hook_content_end(); ?>
			
		</div><!-- #content -->

		<?php codeless_hook_content_after(); ?>

	</section><!-- #site-content -->
	
<?php get_footer(); ?>