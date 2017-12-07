<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$extracss = '';

if( ! isset( $row_id ) || empty( $row_id ) )
	$row_id = 'cl_row_' . str_replace( ".", '-', uniqid("", true) );

$video_wrapper = '';

$video_poster_image = '';

if($video == 'self'){
    
        $video_wrapper .= '<div class="video-section">';
		$video_wrapper .= '     <video poster="'.$video_poster_image.'" muted="muted" preload="auto" '.((int)$video_loop ? "loop" : "").' autoplay="true">';

		if (!empty($video_mp4))
		    $video_wrapper .= '		    <source type="video/mp4" src="'.$video_mp4.'" /> ';
		
		if (!empty($video_webm))
		    $video_wrapper .= '		    <source type="video/webm" src="'.$video_webm.'" /> ';
		    
		if (!empty($video_ogv))
		    $video_wrapper .= '		    <source type="video/ogv" src="'.$video_ogv.'" /> ';
	
		$video_wrapper .= '	    </video>';
		$video_wrapper .= '</div>';
		
}else{
        $video_wrapper .= '<div class="video-section social-video"  data-stream="'.$video.'" style="opacity:0;">';
	        $video_wrapper .= '<div class="cl-video-centered">';
				
			if ($video == 'youtube')
			    $video_wrapper .= '<iframe src="//www.youtube.com/embed/'.$video_youtube.'?rel=0&amp;wmode=transparent&amp;enablejsapi=1&amp;controls=0&amp;showinfo=0&amp;loop='.(int)$video_loop.'&amp;playlist='.$video_youtube.'"></iframe>';
	
	        if ($video == 'vimeo')
	            $video_wrapper .= '<iframe src="//player.vimeo.com/video/'.$video_vimeo.'?badge=0;api=1;background=1;autoplay=1;loop='.(int)$video_loop.'" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	
			$video_wrapper .= '</div>';
		$video_wrapper .= '</div>';
}


if( $columns_gap != '15' ){
	$this->addCustomCss( '#'.$row_id.' .row > .cl_cl_column > .cl_column, #'.$row_id.' .row > .cl_column{ padding-left: '. $columns_gap .'px; padding-right: '. $columns_gap .'px; }' );
}

if( $custom_width_bool ){
	$this->addCustomCss( '@media (min-width:1200px){ #'.$row_id.' > .container-content{ width:'.$custom_width.'px; } }' );
}


$output .= '<div id="'.$row_id.'" class="cl-row cl-element '.$this->generateClasses('.cl-row').' '.$extra_class.'" '.$this->generateStyle('.cl-row').'>';
   
    $output .= $video_wrapper;
    
    $output .= '<div class="bg-layer '.$this->generateClasses('.cl-row > .bg-layer').'" '.$this->generateStyle('.cl-row > .bg-layer').' data-parallax-config=\'{ "speed": 0.3 }\'></div>';
    $output .= '<div class="overlay '.$this->generateClasses('.cl-row > .overlay').'" '.$this->generateStyle('.cl-row > .overlay').'></div>';
    
    $output .= '<div class="'.$row_type.' container-content">';
        $output .= '<div class="row cl_row-sortable '.$this->generateClasses('.cl-row > div > .row').'">';
            $output .= cl_remove_wpautop($content);
        $output .= '</div>';
    $output .= '</div>';
    
$output .= '</div>';


echo cl_remove_wpautop( $output );

