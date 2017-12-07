<?php

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if ( class_exists( 'RevSlider' ) ) 	
	$output .= do_shortcode( '[rev_slider ' . $slides . ']' );
else
	$output .= esc_attr_e('There is no RevSlider Plugin Installed', 'folie');


echo cl_remove_wpautop( $output );