<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if( $carousel )
    wp_enqueue_style('owl-carousel', CODELESS_BASE_URL.'css/owl.carousel.min.css' );
?>

<div class="cl_clients cl-element <?php echo esc_attr( $this->generateClasses('.cl_clients') ) ?>" <?php $this->generateStyle('.cl_clients', '', true) ?>>
<?php $images = cl_atts_to_array($images); if( !empty($images) ): foreach($images as $img_id): ?>
	<div class="client-item">
		<img src="<?php echo esc_url( wp_get_attachment_url( $img_id ) ) ?>" alt="" />
		<?php if( $clients_style == 'overlay_title' ): ?>
			<div class="overlay-bg" <?php $this->generateStyle('.cl_clients .client-item .overlay-bg', '', true) ?>>
				<?php if( $show_title ): ?>
					<div class="inner"><?php echo get_the_title($img_id) ?></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
<?php endforeach; endif; ?>
</div>