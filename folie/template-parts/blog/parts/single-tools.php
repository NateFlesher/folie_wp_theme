<?php
/**
 * Blog Template Part for displaying single blog tools
 * Share tools and Post Tags
 *
 * @package Folie
 * @subpackage Blog Parts
 * @since 1.0.0
 *
 */

?>

<div class="entry-single-tools">

	<?php if( codeless_get_mod( 'single_blog_share', false ) ): ?>
		<div class="entry-single-share entry-single-tool">
			<span class="tool-title"><?php esc_html_e( 'Share', 'folie' ) ?></span>
			<?php echo codeless_single_blog_shares() ?>
		</div>
	<?php endif; ?>

	<?php if( codeless_get_mod( 'single_blog_tags', true ) && codeless_single_blog_tags() != '' ): ?>
		<div class="entry-single-tags entry-single-tool">
			<?php echo codeless_single_blog_tags() ?>
		</div>
	<?php endif; ?>

</div>