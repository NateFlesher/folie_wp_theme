<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<div class="cl_icon cl-element <?php echo esc_attr($this->generateClasses('.cl_icon')) ?>"  <?php $this->generateStyle('.cl_icon', '', true );?> ><a href="<?php echo esc_url($icon_link) ?>" target="<?php echo esc_attr($icon_target) ?>"  <?php if(!empty($hover_color)){ ?> onMouseOver="this.style.color='<?php echo wp_kses_post( $hover_color ) ?>'" onMouseOut="this.style.color='<?php echo wp_kses_post( $color ) ?>'" <?php } ?> > <i class="<?php echo esc_attr( $this->generateClasses('.cl_icon i') ) ?>" <?php $this->generateStyle('.cl_icon i', '', true );?> ></i></a></div> 