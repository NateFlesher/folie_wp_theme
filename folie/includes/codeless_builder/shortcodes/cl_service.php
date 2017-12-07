<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$output = '<div class="cl_service cl-element '.$this->generateClasses('.cl_service').'" '.$this->generateStyle('.cl_service').'>';
	
	$output .= '<div class="icon_wrapper '.$this->generateClasses('.cl_service > .icon_wrapper').'" '.$this->generateStyle('.cl_service > .icon_wrapper').'>';

		$output .= '<div class="wrapper-form" '.$this->generateStyle('.cl_service > .icon_wrapper .wrapper-form').'>';

			if( $media == 'type_icon' )
				$output .= '<i class="'.$this->generateClasses('.cl_service > .icon_wrapper i').'" '.$this->generateStyle('.cl_service > .icon_wrapper i').'></i>';
			else
				if( $media == 'type_svg' ){
					$animated = ($animation_icon) ? 'animated' : '';

					$output .= '<svg perspectiveAspectRatio="xMinYMax meet" '.$this->generateStyle('.cl_service > .icon_wrapper svg').'  class="icon-svg '.$animated.' cl-svg-'.str_replace('cl-icon-', '', $icon).'"><use xlink:href="'.get_template_directory_uri().'/css/fonts/codeless-svg-defs.svg'.'#cl-svg-'.str_replace('cl-icon-', '', $icon).'"></use></svg>';
				}
			else
				if( $media == 'type_custom' ){
					$image = cl_atts_to_array($image);
					$img_id = isset($image['id']) ? $image['id'] : 0;


					$output .= '<img src="' . codeless_get_attachment_image_src( $img_id, $image_size ) .'" alt="" />';

				}
			if( $service_link != '' ){
				$output .= '<a href="'.esc_url($service_link).'"></a>';
			}

		$output .= '</div><!-- wrapper-form -->';

	$output .= '</div><!-- icon_wrapper -->';

	$output .= '<div class="box-content">';
		$output .= '<h3 class="'.$this->generateClasses('.cl_service .box-content > h3').'" '.$this->generateStyle('.cl_service .box-content > h3').'>';

			if( $service_link != '' )
				$output .= '<a href="'.esc_url($service_link).'">';
				
			$output .= wp_kses_post($title);

			if( $service_link != '' )
				$output .= '</a>';
			

		$output .= '</h3>';

		if( $subtitle_bool )
			$output .= '<span class="subtitle '.$this->generateClasses('.cl_service .box-content > .subtitle').' " '.$this->generateStyle('.cl_service .box-content > .subtitle').'>'.wp_kses_post( cl_remove_wpautop( $subtitle ) ).'</span>';
		
		$output .= '<div class="content" '.$this->generateStyle('.cl_service .box-content > .content').'>'.cl_remove_wpautop( $content, true ).'</div>';
	$output .= '</div><!-- box-content -->';	

$output .= '</div><!-- cl_service -->';

echo cl_remove_wpautop( $output );

?>