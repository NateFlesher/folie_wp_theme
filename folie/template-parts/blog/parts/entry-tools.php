<div class="entry-tools">
		
	<?php foreach( codeless_get_post_entry_tools() as $entry_tool ): ?>
		<div class="entry-tool-single <?php echo esc_attr( $entry_tool['id'] ) ?>">
			<?php echo codeless_complex_esc( $entry_tool['html'] ); ?>
		</div><!-- .entry-tool-single -->
	<?php endforeach; ?>
		
</div><!-- .entry-tools -->