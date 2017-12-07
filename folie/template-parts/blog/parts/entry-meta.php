<div class="entry-meta">
				
	<?php foreach( codeless_get_post_entry_meta() as $entry_meta ): ?>
		<div class="entry-meta-single <?php echo esc_attr( $entry_meta['id'] ) ?>">
			<span class="entry-meta-prepend"><?php echo esc_html( $entry_meta['prepend']) ?></span>
				<?php echo wp_kses_post( $entry_meta['value'] ); ?>
		</div><!-- .entry-meta-single -->
	<?php endforeach; ?>
				
</div><!-- .entry-meta -->