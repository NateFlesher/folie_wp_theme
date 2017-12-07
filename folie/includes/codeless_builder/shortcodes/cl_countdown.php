<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<div class="cl_countdown cl-element <?php echo esc_attr( $this->generateClasses('.cl_countdown') ); ?>" <?php $this->generateStyle('.cl_countdown', '', true); ?>>

</div>
        
