<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if( $carousel )
    wp_enqueue_style('owl-carousel', CODELESS_BASE_URL.'css/owl.carousel.min.css' );

if( $lightbox )
	wp_enqueue_style('ilightbox', CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css' );

?>

<div class="cl_gallery cl-element <?php echo esc_attr( $this->generateClasses('.cl_gallery') ) ?>" <?php $this->generateStyle('.cl_gallery', '', true) ?>>
<?php $images = cl_atts_to_array($images); if( !empty($images) ): foreach($images as $img_id): ?>
	<div class="gallery-item"  <?php $this->generateStyle('.cl_gallery .gallery-item', '', true) ?>>
		<div class="inner-wrapper">
			<?php echo codeless_generate_image( $img_id, $image_size ); ?>
			<?php if( $lightbox ): ?>
				<div class="overlay">
				    <a href="<?php echo esc_url( wp_get_attachment_url( $img_id ) ) ?>" class="lightbox entry-lightbox"><i class="cl-icon-search"></i></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endforeach; endif; ?>
</div>