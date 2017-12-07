<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


?>
<div class="swiper-slide cl-slide <?php echo esc_attr( $this->generateClasses('.cl-slide') ); ?>">
       <?php echo cl_remove_wpautop($content); ?>

       <?php if( $add_scroll_svg ): ?>

       		<?php codeless_get_extra_template( 'slider_scroll_svg' ) ?>

       <?php endif; ?>
</div>