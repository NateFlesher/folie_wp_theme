<?php 

		/**
		 * Entry Content
		 * Output content of post for single and not single page
		 */ 
		?>
		<div class="entry-content <?php echo esc_attr( codeless_extra_classes('entry_content') ) ?>">
			
			<?php
            	
            	get_template_part( 'template-parts/blog/parts/entry', 'content' );
            	    
            ?>
			
		</div><!-- .entry-content -->