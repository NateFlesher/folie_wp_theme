<?php


/**
 * Returns true if the current Query is standart blog post.
 *
 * @since 1.0.0
 */
function codeless_is_blog_query() {
    
	// False by default
	$blog_bool = false;

	// Return true for blog archives
	if ( is_search() ) {
		$blog_bool = false; // Fixes wp bug
	} elseif (
		is_home() 
		|| is_category()
		|| is_tag()
		|| is_date()
		|| is_author()
		|| is_page_template( 'template-blog.php' )
		|| ( is_tax( 'post_format' ) && 'post' == get_post_type() )
	) {
		$blog_bool = true;
	}

	return $blog_bool;

}


/**
 * Return true if is blog entry (not single post)
 * @since 1.0.0
 */
function codeless_is_blog_entry(){
    if( get_post_type( codeless_get_post_id() ) == 'page' && get_post_type( get_the_ID() ) == 'post' 
                                                          && codeless_is_blog_query() 
                                                          && in_the_loop() )
        return true;

    return false;
}


/**
 * Return true if is single post, restrict when post is in related posts of SINGLE POST
 * @since 1.0.0
 */
function codeless_is_single_post(){
    if( ! is_single() || codeless_get_from_element( 'blog_from_element', false ) )
        return false;
    return true;
}


/**
 * Check if blog is isotope (grid or masonry)
 * @since 1.0.0
 */
function codeless_is_blog_isotope(){
    if( codeless_blog_style() == 'grid' || codeless_blog_style() == 'masonry' || codeless_blog_style() == 'media' )
        return true;
    return false;
}


/**
 * Retun Blog Post Style
 * @since 1.0.0
 */
function codeless_get_post_style(){
    // From overall options
    $style = codeless_get_mod( 'blog_post_style', 'modern' );

    // Single Post Style (from meta)
    $post_style = codeless_get_meta( 'post_style', 'modern' );
    if( $post_style != 'default' )
        $style = $post_style;

    // if style is modern but not featured image is set, return a classic style
    if( $style == 'modern' && ! has_post_thumbnail() )
        $style == 'classic';

    return apply_filters( 'codeless_post_style', $style );
}


/**
 * Return the blog style from theme options
 * or filtered value from codeless_blog_style
 * 
 * @since 1.0.0
 */
function codeless_blog_style(){
    
    // Get value from theme options
    $blog_style = codeless_get_mod( 'blog_style', 'default' );
    
    // Returns a filtered value
    return apply_filters( 'codeless_blog_style', $blog_style );
    
}


/**
 * Used only for blog pagination
 * Use conditionals to get the style of pagination
 * 
 * @since 1.0.0
 */
function codeless_blog_pagination( $the_query = false ){
    
    echo '<div class="cl-blog-pagination" data-container-id="blog-entries">';
    
    $pagination_style = codeless_get_mod( 'blog_pagination_style', 'numbers' );

    if ( $pagination_style == 'infinite_scroll' ) {
        echo codeless_infinite_scroll( 'infinite_scroll', $the_query );
    } elseif ( $pagination_style == 'next_prev' ) {
        echo codeless_nextprev_pagination('', 4, $the_query);
    } elseif ( $pagination_style == 'load_more' ){
        echo codeless_infinite_scroll( 'loadmore', $the_query );
    }else {
        codeless_number_pagination($the_query);
    }
    
    echo '</div>';
}


/**
 * Add twitterwidget on allowed media
 *
 * @since 1.0.0
 */
add_filter( 'media_embedded_in_content_allowed_types', 'codeless_media_embedded_in_content_allowed_types' );

function codeless_media_embedded_in_content_allowed_types($types){
    // used for twitter
    $types[] = 'blockquote';
    $types[] = 'script';
    return $types;
}


/**
 * Return the exact thumbnail size to use for blog post
 *
 * @since 1.0.0
 */
function codeless_get_post_thumbnail_size(){
    
    $blog = 'blog_entry';
    
    if( is_single() ){
        $blog = 'blog_post';
    }
    
    if( codeless_blog_style() == 'alternate' )
        $blog = 'blog_entry_small';
        
    if( codeless_blog_style() == 'grid' )
        $blog = 'blog_entry_small';

    if( codeless_blog_style() == 'news' )
        $blog = 'blog_entry_small';

    if( codeless_blog_style() == 'media' )
        $blog = 'blog_entry_small';

    if( codeless_get_mod( 'blog_image_size', 'theme_default' ) != 'theme_default' )
        $blog = codeless_get_mod( 'blog_image_size', 'theme_default' );
    
    return $blog;
}


/**
 * Generate Post Entry Meta
 * To use on blog templates.
 * 
 * @since 1.0.0
 */
function codeless_get_post_entry_meta(){
    
    $entry_meta = array();
    
    global $cl_from_element;
    if( isset($cl_from_element['blog_remove_meta']) && $cl_from_element['blog_remove_meta'] )
        return $entry_meta;

    // Add Author (By)
    if( codeless_get_mod( 'blog_entry_meta_author', true ) ){
        $entry_meta_ = array();
        $entry_meta_['id'] = 'entry-meta-author';
        $entry_meta_['prepend'] = esc_attr__( 'By', 'folie' );
        $entry_meta_['value'] = codeless_get_entry_meta_author();
        $entry_meta[] = $entry_meta_;
    }
    
    // Categories Listing
    if( codeless_get_mod( 'blog_entry_meta_categories', true ) ){
        $entry_meta_ = array();
        $entry_meta_['id'] = 'entry-meta-categories';
        $entry_meta_['prepend'] = esc_attr__( 'In', 'folie' );
        $entry_meta_['value'] = codeless_get_entry_meta_categories();
        $entry_meta[] = $entry_meta_;
    }
    
    // Date Posted
    if( codeless_get_mod( 'blog_entry_meta_date', true ) ){
        $entry_meta_ = array();
        $entry_meta_['id'] = 'entry-meta-date';
        $entry_meta_['prepend'] = esc_attr__( 'Posted', 'folie' );
        $entry_meta_['value'] = codeless_get_entry_meta_date();

        $entry_meta[] = $entry_meta_;
    }
    
    return apply_filters('codeless_post_entry_meta', $entry_meta);
}


/**
 * Generate Post Entry Meta Author
 * 
 * @since 1.0.0
 */
function codeless_get_entry_meta_author(){
    
    $author_name = get_the_author();
    
    // Sanitize to not show empty author on customize preview partial refresh
    if( empty( $author_name ) || is_customize_preview() )
        $author_name = __( 'admin', 'folie' );
    
    // Get the author name; wrap it in a link.
	$author = sprintf(
		/* translators: %s: post author */
		__( '%s', 'folie' ),
		'<span class="author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . $author_name . '</a></span>'
	);
	
	return $author;
}


/**
 * Generate Post Entry Meta Date
 * 
 * @since 1.0.0
 */
function codeless_get_entry_meta_date( $format = false ){
    
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
    $date = get_the_date();
    
    if( $format !== false )
        $date = get_the_date( $format );
    
	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		$date
	);

	// Wrap the time string in a link, and preface it with 'Posted on'.
	return sprintf(
		/* translators: %s: post date */
		__( '%s', 'folie' ),
		'<span class="time"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>'
	);
	
}


/**
 * Generate Post Entry Meta Categories
 * 
 * @since 1.0.0
 */
function codeless_get_entry_meta_categories(){
    
    /* translators: used between list items, there is a space after the comma */
	$separate_meta = __( ', ', 'folie' );

	// Get Categories for posts.
	$categories_list = get_the_category_list( $separate_meta );
	
	return sprintf(
		/* translators: %s: categories list */
		__( '%s', 'folie' ),
		'<span class="categories_list">'.$categories_list.'</span>'
	);
	
}


/**
 * Generate Post Entry Tools
 * To use on blog templates.
 * 
 * @since 1.0.0
 */
function codeless_get_post_entry_tools(){
    
    $entry_tools = array();
    
    // Add Share
    if( codeless_get_mod( 'blog_entry_tools_share', false ) ){
        $entry_tool_ = array();
        $entry_tool_['id'] = 'entry-tool-share';
        $entry_tool_['html'] = codeless_get_entry_tool_share();
        $entry_tools[] = $entry_tool_;
    }
    
    // Add Likes
    if( codeless_get_mod( 'blog_entry_tools_likes', false ) ){
        $entry_tool_ = array();
        $entry_tool_['id'] = 'entry-tool-likes';
        $entry_tool_['html'] = codeless_get_entry_tool_likes();
        $entry_tools[] = $entry_tool_;
    }
    
    // Add Comments Count
    if( codeless_get_mod( 'blog_entry_tools_comments_count', true ) && comments_open() ){
        $entry_tool_ = array();
        $entry_tool_['id'] = 'entry-tool-comments_count';
        $entry_tool_['html'] = codeless_get_entry_tool_comments_count();
        $entry_tools[] = $entry_tool_;
    }
    
    return apply_filters( 'codeless_post_entry_tools', $entry_tools );
}

/**
 * Generate Tool Share Output
 * 
 * @since 1.0.0
 */
function codeless_get_entry_tool_share(){
    
    $output = '<a href="#" class="show-share-buttons"><i class="' . apply_filters( 'codeless_entry_tool_share_icon', 'cl-icon-share2' ) . '"></i></a>';
    $output .= '<div class="share-buttons hidden">';
    
    $shares = codeless_share_buttons();
    
    if( !empty( $shares ) ){
        foreach( $shares as $social_id => $data ){
            $output .= '<a href="' . $data['link'] . '" title="Social Share ' . $social_id . '" target="_blank"><i class="' . $data['icon'] .'"></i></a>';
        }
    }
    $output .= '</div>';
    
    return $output;
}

/**
 * Generate blog entry comments_count
 * 
 * @since 1.0.0
 */
function codeless_get_entry_tool_comments_count(){
    
    ob_start();
    comments_number('0', '1', '%');

    $output = '<a href="' . get_permalink() . '#comments" class="comments"><i class="cl-icon-commenting-o"></i><span class="codeless-count">' . ob_get_contents() . '</span></a>';
    ob_get_clean();
    return $output;
}


/**
 * Generate blog entry like button
 * 
 * @since 1.0.0
 */
function codeless_get_entry_tool_likes(){

    $output = '';

    if( class_exists('Codeless_Post_Like') )
        $output = Codeless_Post_Like::like();

    return $output;
}


/**
 * Generate single blog post share buttons
 * 
 * @since 1.0.0
 */
function codeless_single_blog_shares(){
    $shares = codeless_share_buttons();

    $output = '<div class="single-share-buttons">';

    if( !empty( $shares ) ){
        foreach( $shares as $social_id => $data ){
            $output .= '<a href="' . $data['link'] . '" title="Social Share ' . $social_id . '" target="_blank"><i class="' . $data['icon'] .'"></i></a>';
        }
    }

    $output .= '</div>';
    
    return $output;
}


/**
 * Generate single blog footer Content
 * 
 * @since 1.0.0
 */

function codeless_single_blog_footer(){
    

    /**
     * Add into container if is single post built without page builder
     */ 
    if( is_single() && ! codeless_is_inner_content() ):

    ?>

    <div class="container content-container single-post-data-container">

    <?php endif;


        /**
         * Load Related Blog Items if it's active
         */
        if( codeless_get_mod( 'single_blog_share', false ) || ( codeless_get_mod( 'single_blog_tags', true ) && codeless_single_blog_tags() != '' )  )
            get_template_part( 'template-parts/blog/parts/single', 'tools' );

        /**
         * Single Blog Author Box
         */
        if( codeless_get_mod( 'single_blog_author_box', false )  )
            get_template_part( 'template-parts/blog/parts/single', 'author' );


        /**
         * Next Prev Post Navigation, if activated
         */

        if( codeless_get_mod( 'single_blog_pagination', true ) )
           the_post_navigation( array(
                            'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Post', 'folie' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . '<i class="cl-icon-arrow-left2"></i>' . '</span>%title</span>',
                            'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Post', 'folie' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . '<i class="cl-icon-arrow-right2"></i>' . '</span></span>',
                            'screen_reader_text' => ' '
                        ) );

       /**
         * Load Related Blog Items if it's active
         */

        if( codeless_get_mod( 'single_blog_related', false ) )
            get_template_part( 'template-parts/blog/parts/single', 'related' );


    /**
     * Add into container if is single post built without page builder
     */ 
    if( is_single() && ! codeless_is_inner_content() ):

    ?>

    </div><!-- single-post-data-container -->

    <?php endif; ?>

    <?php

    
}


/**
 * Generate single blog post tags list
 * 
 * @since 1.0.0
 */
function codeless_single_blog_tags(){
    $tags = get_the_tag_list( '', '' );
    return $tags;
}


/**
 * Options to pass at Swiper Initialization
 * Only for Slider Post
 * 
 * @since 1.0.0
 */
function codeless_get_post_slider_options(){
    $data = array(
        'effect' => codeless_get_mod( 'blog_slider_effect', 'scroll' ),
        'lazyLoading' => (bool) codeless_get_mod( 'blog_slider_lazyload', 0 ),
        'autoplay' => (codeless_get_mod( 'blog_slider_speed', '' ) == 0 ? '' : codeless_get_mod( 'blog_slider_speed' ) ),
        'loop' => (bool) codeless_get_mod( 'blog_slider_loop', 0 )
    );

    
    if( codeless_get_mod( 'blog_slider_lazyload', false ) )
        $data['preloadImages'] = false;
        
    if( codeless_get_mod( 'blog_slider_pagination', true ) ){
        $data['pagination'] = '.swiper-pagination';
        $data['paginationClickable'] = true;
    } 
    
    if( codeless_get_mod( 'blog_slider_nav', true ) ){
        $data['nextButton'] = '.swiper-button-next';
        $data['prevButton'] = '.swiper-button-prev';
    }
    
    return apply_filters( 'codeless_post_slider_options', $data );
}


function codeless_entry_overlay_icon( $custom = '' ){
    $icon = codeless_get_mod( 'blog_entry_overlay_icon', 'arrow-right' );
    if( $custom != '' )
        $icon = $custom;

    return 'cl-icon-' . apply_filters( 'codeless_entry_overlay_icon', $icon );
}

/**
 * Generate Overlay for blog entries
 * 
 * @since 1.0.0
 */
function codeless_blog_overlay(){
    $blog_overlay = codeless_get_mod( 'blog_overlay', 'color' );
    $blog_overlay_icon = codeless_get_mod( 'blog_entry_overlay_icon', 'arrow-right' );

    $icon = '';

    if( $blog_overlay != 'none' ): ?>

    <div class="entry-overlay entry-overlay-<?php echo esc_attr($blog_overlay) ?>">

    <?php if( $blog_overlay_icon == 'lightbox' ): $icon = 'search'; ?>
        <a href="<?php the_post_thumbnail_url() ?>" class="lightbox entry-lightbox"> 
    <?php endif; ?>

            <i class="<?php echo codeless_entry_overlay_icon( $icon ) ?>"></i>

    <?php if( $blog_overlay_icon == 'lightbox' ): ?>
        </a>
    <?php endif; ?>

    <?php endif; ?>
        
        <?php if( codeless_get_mod( 'blog_image_link', true ) && $blog_overlay_icon != 'lightbox' ): ?>
        <a class="entry-link" href="<?php the_permalink() ?>" title="<?php the_title() ?>"></a>
        <?php endif; ?>
    
    <?php if( codeless_get_mod( 'blog_overlay', 'color' ) != 'none' ): ?>
    </div><!-- Entry Overlay -->
    <?php endif;

}


/**
 * Load filterable template if needed
 * 
 * @since 1.0.0
 * @version 1.0.7
 */
function codeless_blog_filterable(){

    if( ! codeless_is_blog_query() || ( ! is_page() && ! is_home() ) )
        return;

    if( codeless_get_mod( 'blog_filters' ) != 'disabled' )
        get_template_part( 'template-parts/blog/parts/filters' );
}


/**
 * Add wrapper for creating Grid for News Blog
 * @since 1.0.0
 */
function codeless_news_grid_item_wrapper(){
    if( codeless_get_mod( 'blog_news' ) == 'grid_1' ){

        if( codeless_loop_counter() == 1 )
            echo '<div class="first-wrap flex-wrap full-height large-text parent-wrap">';

        if( codeless_loop_counter() == 2 )
            echo '<div class="second-wrap flex-wrap semi-height full-width-img parent-wrap">';

        if( codeless_loop_counter() == 3 )
            echo '<div class="inner-wrap flex-wrap full-height-img semi-wrap">';

    } else if( codeless_get_mod( 'blog_news' ) == 'grid_2' ){

        if( codeless_loop_counter() == 1 )
            echo '<div class="first-wrap flex-wrap full-height large-text parent-wrap">';

        if( codeless_loop_counter() == 2 )
            echo '<div class="second-wrap flex-wrap semi-height semi-width full-height-img parent-wrap">';


    } else if( codeless_get_mod( 'blog_news' ) == 'grid_3' ){

        if( codeless_loop_counter() == 1 )
            echo '<div class="first-wrap flex-wrap full-height large-text parent-wrap">';

        if( codeless_loop_counter() == 2 )
            echo '<div class="second-wrap flex-wrap onethird-height full-width-img parent-wrap">';


    }
    
}

/**
 * Close wrapper for creating Grid for News Blog
 * @since 1.0.0
 */
function codeless_news_grid_item_wrapper_close(){
    if( codeless_get_mod( 'blog_news' ) == 'grid_1' ){

        if( codeless_loop_counter() == 4 )
            echo '</div><!-- .inner-wrap -->';
        if( codeless_loop_counter() == 1 || codeless_loop_counter() == 4 )
            echo '</div><!-- .parent-wrap -->';

    } else if( codeless_get_mod( 'blog_news' ) == 'grid_2' ){

        if( codeless_loop_counter() == 1 || codeless_loop_counter() == 5 )
            echo '</div><!-- .parent-wrap -->';

    } else if( codeless_get_mod( 'blog_news' ) == 'grid_3' ){

        if( codeless_loop_counter() == 1 || codeless_loop_counter() == 4 )
            echo '</div><!-- .parent-wrap -->';

    }
    
}


/**
 * Modify Blog News excerpt length
 * @since 1.0.0
 */
function codeless_blog_news_excerpt_length(){
    return 20;
}


/**
 * Retun related post of blog single post
 * @since 1.0.0
 */
function codeless_single_post_related(){
    
    if( ! class_exists( 'Cl_Builder_Manager' ) )
        return;

    codeless_shortcode_add('cl_blog', 'cl_do_shortcode');

    $cols = '2';
    if( codeless_get_page_layout() == 'fullwidth' )
        $cols = '3';

    $module_related = '[cl_blog blog_grid_layout="'.$cols.'" blog_button_style="text-effect" blog_animation="bottom-t-top" blog_remove_meta="0" carousel="1" related="'.get_the_ID().'" blog_remove_meta="0"]';
    
    return do_shortcode( stripslashes( $module_related ) );
}



/**
 * Add Blog Post Modern Style Page Header
 * @since 1.0.0
 */
function codeless_add_post_header(){
    if( is_single() && codeless_get_post_style() == 'modern' && get_post_type() == 'post' && class_exists( 'Cl_Builder_Manager' ) ){
        codeless_shortcode_add('cl_page_header', 'cl_do_shortcode');
        $module_page_header = '[cl_page_header type="modern" height="465" text_color="light-text" background_image="{\'id\':\''.get_post_thumbnail_id( codeless_get_post_id() ).'\'}_-_json" background_position="center" overlay="color" overlay_color="#161616" typography="custom_font" title_font_size="64" title_font_weight="700" title_line_height="76" desc_font_size="20" desc_line_height="32" overlay_opacity="0.8"]';
        echo do_shortcode( stripslashes( $module_page_header ) );

    }
}


/**
 * Codeless modify password form.
 * @since 1.0.0
 */
function codeless_password_form( $post ){
    $post = get_post( $post );
    $label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
    $output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
    <p>' . esc_html__( 'This content is password protected. To view it please enter your password below:', 'folie' ) . '</p>
    <p><label for="' . $label . '">' . esc_html__( 'Password:', 'folie' ) . ' <input name="post_password" id="' . $label . '" type="password" size="20" /></label> <input type="submit" name="Submit" class="'.codeless_button_classes().'" value="' . esc_attr_x( 'Enter', 'post password form', 'folie' ) . '" /></p></form>
    ';
  
    return $output;
}

add_filter( 'the_password_form', 'codeless_password_form' );

?>