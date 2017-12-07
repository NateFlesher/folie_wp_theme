<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$output = '';

extract( $atts );

$post_meta = '';
if( is_single() && get_post_type( codeless_get_post_id() ) == 'post' && $type == 'modern' ){
    ob_start();
    get_template_part('template-parts/blog/parts/entry', 'meta');
    $post_meta = ob_get_clean();
}
                            


$title = (isset($title) && !empty($title) ) ? $title : get_the_title( codeless_get_post_id() ) ;

$output .= '<div class="cl_page_header cl-element cl-load-component '.$this->generateClasses('.cl_page_header').'" '.$this->generateStyle('.cl_page_header').'>';
    
    $output .= '<div class="cl-loading"></div>';

    $output .= '<div class="wrapper-layers cl-wait-for-load" data-delay="1">';
        
        $output .= '<div class="bg-layer '.$this->generateClasses('.cl_page_header .bg-layer').'" '.$this->generateStyle('.cl_page_header .bg-layer').' data-parallax-config=\'{ "speed": 0.3 }\'></div>';

        $output .= '<div class="overlay '.$this->generateClasses('.cl_page_header .overlay').'" '.$this->generateStyle('.cl_page_header .overlay').'></div>';

        $output .= '<div class="effect-wrapper"></div>';
    $output .= '</div>';
    $output .= '<div class="wrapper-content cl-wait-for-load" data-delay="2">';
        $output .= '<div class="container container-content">';
            $output .= '<div class="row">';
                    $output .= '<div class="col-sm-12">';
                        $output .= '<div class="title_part">';
                            $output .= '<h1 class="'.$this->generateClasses('.cl_page_header .title_part h1').'" '.$this->generateStyle('.cl_page_header .title_part h1').'>'.wp_kses($title, '', '').'</h1>';
                            if((int) $add_description)
                                $output .= '<span class="subtitle" '.$this->generateStyle('.cl_page_header .title_part .subtitle').'>'.wp_kses( $description, '', '' ).'</span>';
                            
                            $output .= $post_meta;

                        $output .= '</div>';

                        if($type == 'simple'){
                            $output .= '<div class="breadcrumbss">';
                                
                                $output .= '<ul class="page_parents pull-right" style="background-color: '. codeless_get_meta( 'page_bg_color', '#fff' ) .';">';
                                
                                    $output .= '<li>'.__('You are here', 'folie').'</li>';
                                    $output .= '<li class="home"><a href="'.esc_url(home_url()).'">'.__('Home', 'folie').'</a></li>';
                                        $page_parents = codeless_page_parents();
                                        
                                        for($i = count($page_parents) - 1; $i >= 0; $i-- ){
            
                                            $output .= '<li><a href="'.esc_url(get_permalink($page_parents[$i])).'">'.esc_html(get_the_title($page_parents[$i])).'</a></li>';
            
                                        }
                                    if(!is_front_page())  
                                        $output .= '<li class="active"><a href="'.esc_url(get_permalink()).'">'.esc_attr($title).'</a></li>';
        
                                $output .= '</ul>';
                            $output .= '</div>';
                        }
                        
                    $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</div>';
$output .= '</div>';

echo cl_remove_wpautop( $output );

?>