<?php

// Display excerpt if auto excerpts are enabled in the admin
if ( codeless_get_mod( 'blog_excerpt', true ) && ( ! is_single() || codeless_get_from_element('blog_from_element', false) ) ) :

    if( get_the_excerpt() == '' ){
        $content    = get_the_content();
        $content    = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $content);
        echo  wp_trim_words( $content, codeless_get_mod('blog_excerpt_length', 40), ' [...]' );
    }
    else
        the_excerpt();

// If excerpts are disabled, display full content
else :
    
    codeless_hook_post_content_begin();

    $content    = get_the_content();

    $content    = str_replace(']]>', ']]&gt;', apply_filters( 'codeless_the_content' , $content ));

    $page_header = codeless_extract_page_header($content);
    $content    = codeless_strip_shortcode_gallery( str_replace($page_header, '', $content ) );

    echo apply_filters('the_content', $content ); 

    codeless_hook_post_content_end();
            			
endif; 
			
wp_link_pages( array(
    'before'      => '<div class="page-links">' . __( 'Pages:', 'folie' ),
    'after'       => '</div>',
    'link_before' => '<span class="page-number">',
    'link_after'  => '</span>',
));