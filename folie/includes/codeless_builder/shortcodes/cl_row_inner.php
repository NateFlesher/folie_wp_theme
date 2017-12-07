<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$output .= '<div class="cl-row_inner cl-element '.$this->generateClasses('.cl-row_inner').'" '.$this->generateStyle('.cl-row_inner').'>';

        $output .= '<div class="row cl_row-sortable">';
            $output .= cl_remove_wpautop($content);
        $output .= '</div>';

$output .= '</div>';


echo cl_remove_wpautop( $output );

