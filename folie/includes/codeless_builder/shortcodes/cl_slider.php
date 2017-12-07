<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$slider_id = 'cl_slider_' . uniqid();

?>

<div id="<?php echo esc_attr( $slider_id ) ?>" class="swiper-container cl-element cl_slider <?php echo esc_attr( $this->generateClasses('.cl_slider') ) ?>" <?php $this->generateStyle('.cl_slider', '', true) ?>>
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper" >
    	<!-- Slides -->
    	<?php echo cl_remove_wpautop($content); ?>

    </div>

    <?php if( $pagination ): ?>
    <!-- If we need pagination -->
    <div class="swiper-pagination cl-slider-pagination"></div>
    <?php endif; ?>
    
    <?php if( $navigation ): ?>
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev cl-slider-nav swiper-button-white"></div>
    <div class="swiper-button-next cl-slider-nav swiper-button-white"></div>
    <?php endif; ?>

</div>