<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
wp_enqueue_style('odometer', CODELESS_BASE_URL.'css/odometer.css' );
wp_enqueue_script('odometer.min', CODELESS_BASE_URL.'js/odometer.min.js' );

?>

<div class="cl_counter cl-element animate_on_visible <?php echo esc_attr( $this->generateClasses('.cl_counter') ); ?>" <?php $this->generateStyle('.cl_counter', '', true); ?>>

    <div class="odometer" data-number="<?php echo cl_remove_wpautop($number) ?>" data-duration="<?php echo esc_attr( $duration ) ?>"></div>

</div>
        
