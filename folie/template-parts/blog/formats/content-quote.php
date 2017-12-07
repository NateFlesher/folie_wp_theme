<?php 
		/**
		 * Entry Content
		 * Output content of post for single and not single page
		 */ 
		?>
		<div class="entry-content">
		    
			<i class="cl-icon-quote-left"></i>
			
			<div class="post-quote-entry-inner clr">
        		<?php
        		// Content for single posts
        		if ( is_singular( 'post' ) ) : ?>
        			<div class="quote-entry-content">
        				<?php the_content(); ?>
        			</div><!-- .quote-entry-content -->
        		<?php else :
        			// Content for entries ?>
        			<div class="quote-entry-content">
        				<a href="<?php echo get_permalink() ?>"><?php the_content(); ?></a>
        			</div><!-- .quote-entry-content -->
        		<?php endif; ?>
        		<h6 class="quote-entry-author">
        			- <?php the_title(); ?>
        		</h6><!-- .quote-entry-author -->
        	</div><!-- .post-quote-entry-inner -->
			
		</div><!-- .entry-content -->