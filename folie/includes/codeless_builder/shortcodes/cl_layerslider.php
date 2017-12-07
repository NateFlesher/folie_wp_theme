<?php

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if ( class_exists( 'LS_Sliders' ) ) 	
	$output .= do_shortcode( '[layerslider id="' . $slides . '"]' );
   
else
	$output .= esc_attr_e('There is no Layer Slider Plugin Installed', 'folie');


echo cl_remove_wpautop( $output );