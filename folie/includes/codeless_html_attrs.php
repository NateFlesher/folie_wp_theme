<?php

/**
 * Manage All Body Classes
 * 
 * @since 1.0.0
 */
function codeless_manage_body_classes( $classes = '' ) {
   
    if( codeless_get_mod( 'nicescroll' ) )
        $classes[] = 'cl-smoothscroll';
    
    if( codeless_get_meta( 'header_color' ) != 'default' ) {
        $classes[] = 'cl-header-' . codeless_get_meta( 'header_color', 'dark' );
    }
    
    if( codeless_get_meta( 'transparent_header' ) ) {
        $classes[] = 'cl-header-transparent';
    }

    if( codeless_get_meta( 'one_page' ) ) {
        $classes[] = 'cl-one-page';
    }
    
    if( codeless_get_mod( 'search_type', 'creative' ) == 'creative' )
        $classes[] = 'cl-search-creative';

    if( codeless_get_mod( 'header_layout' ) == 'left' || codeless_get_mod( 'header_layout' ) == 'right' )
        $classes[] = 'cl-header-side';

    if( codeless_get_mod( 'header_forced_center', false ) )
        $classes[] = 'cl-header-forced-center';
    
    return $classes;
}

/* -------------------------------- Viewport ------------------------------------------------- */

/**
 * Manage all conditions for adding extra classes and attr on Viewport div 
 * for adding page transition effects
 *
 * Don't modify this, use add_filter for modify codeless_extra_classes_viewport
 * 
 * @since 1.0.0
 */
function codeless_extra_classes_viewport($classes){

    if(codeless_get_mod('codeless_page_transition', false) && ! is_customize_preview() )
        $classes[] = 'animsition';

    if( codeless_get_mod( 'layout_bordered', false ) )
        $classes[] = 'cl-layout-bordered';

    return $classes;
}


function codeless_extra_attr_viewport($attr){

    if(codeless_get_mod('codeless_page_transition', 1) && ! is_customize_preview() ){
        $attr[] = 'data-animsition-in-class='.codeless_get_mod('page_transition_in');
        $attr[] = 'data-animsition-in-duration='.codeless_get_mod('page_transition_in_duration');
        $attr[] = 'data-animsition-out-class='.codeless_get_mod('page_transition_out');
        $attr[] = 'data-animsition-out-duration='.codeless_get_mod('page_transition_out_duration');
    }    
    return $attr;
}



/* -------------------------------- Main Wrapper ------------------------------------------------- */
/**
 * Manage all conditions for adding extra classes and attr on Wrapper div 
 *
 * Don't modify this, use add_filter for modify codeless_extra_classes_wrapper
 * 
 * @since 1.0.0
 */
function codeless_extra_classes_wrapper($classes){

    if( codeless_get_mod('boxed_layout', 0) ){
        $classes[] = 'cl-boxed-layout';
    }    
    return $classes;
}



/* ----------------------------------------------------------------------------------------- */
/* -------------------------------- Header ------------------------------------------------- */

/**
 * Manage all conditions for adding extra classes on Header Container
 * Don't modify this, use add_filter for modify codeless_extra_classes_header
 * 
 * @since 1.0.0
 */
function codeless_extra_classes_header( $classes ) {
    
    $classes[] = 'header-' . codeless_get_mod( 'header_layout', 'top' );
    
    if( codeless_is_header_boxed() )
        $classes[] = 'boxed-style';
    
    $classes[] = 'menu_style-' . codeless_get_mod( 'header_menu_style' );
    
    if( codeless_get_mod( 'header_menu_style_full' ) )
        $classes[] = 'menu-full-style';
    else
        $classes[] = 'menu-text-style';
    
    if( codeless_get_mod( 'header_shadow', 1 ) )
        $classes[] = 'menu-with_shadow';
    
    if( codeless_get_meta( 'transparent_header' ) ) {
        $classes[] = 'cl-transparent';
    }
    
    if( codeless_get_meta( 'header_color' ) != 'default' ) {
        $classes[] = 'cl-header-' . codeless_get_meta( 'header_color' );
    }

    // Sticky
    if( codeless_get_mod( 'header_sticky', false ) ){
        $classes[] = 'cl-header-sticky';

        if( codeless_get_mod( 'header_sticky_shadow', true ) )
            $classes[] = 'cl-header-sticky-shadow';

        if( codeless_get_mod( 'header_top_nav_sticky', false ) )
            $classes[] = 'cl-header-top-nav-sticky';
    }

    return $classes;
    
}


/**
 * Manage all Attributes and data of header
 * 
 * @since 1.0.0
 */
function codeless_extra_attr_header( $attr ){

    if( codeless_get_mod( 'header_sticky', false ) ){
        $attr[] = 'data-sticky-content-color="'.codeless_get_mod( 'header_sticky_content', 'dark' ).'"';
    }

    return $attr;
}





/* ----------------------------------------------------------------------------------------- */
/* -------------------------------- Main --------------------------------------------------- */

/**
 * Manage all classes of Main Content Wrapper
 * @since 1.0.0
 */
function codeless_extra_classes_content( $classes ) {
    
    if( (int) codeless_is_layout_modern() ) {
        $classes[] = 'cl-layout-modern';
    }
    
    $classes[] = 'cl-layout-' . codeless_get_page_layout();
    
    
    // Useful for recognize area to add elements on Codeless Builder
    if( ( !codeless_is_inner_content() && ( !is_single() || ( is_single() && get_post_type() != 'post' ) ) ) || codeless_is_shop_page() )
        $classes[] = 'cl-content-builder';
    
    if( is_single() )
        $classes[] = 'single_blog_style-' . codeless_get_post_style();
    
    
    return $classes;
}


/**
 * Manage all conditions for adding extra classes on Inner Content
 * Don't modify this, use add_filter for modify codeless_extra_classes_inner_content
 * 
 * @since 1.0.0
 */
function codeless_extra_classes_inner_content( $classes ) {
    if( !codeless_get_meta( 'page_fullwidth_content', false ) )
        $classes[] = 'container';
    else
        $classes[] = 'container-fluid';
    
    return $classes;
}


/**
 * Manage all conditions for adding extra classes on Inner Content Row
 * Don't modify this, use add_filter for modify codeless_extra_classes_inner_content_row
 * 
 * @since 1.0.0
 */
function codeless_extra_classes_inner_content_row( $classes ) {
    $classes[] = 'row';
    return $classes;
}


/**
 * Manage all conditions for adding extra classes on Content Column
 * Don't modify this, use add_filter for modify codeless_extra_classes_content_column
 * 
 * @since 1.0.0
 */
function codeless_extra_classes_content_col( $classes ) {
    $classes[] = codeless_content_column_class();
    
    // Add col-sm-push-3
    if( ( codeless_get_page_layout() == 'left_sidebar' || codeless_get_page_layout() == 'dual_sidebar' ) )
        $classes[] = codeless_cols_prepend() . 'push-3';
    
    if( codeless_is_inner_content() && !is_single() )
        $classes[] = 'cl-content-builder';
    
    return $classes;
}





/* ----------------------------------------------------------------------------------------- */
/* -------------------------------- Sidebar ------------------------------------------------ */

/**
 * Manage all conditions for adding extra classes on #Secondary (sidebar)
 * Don't modify this, use add_filter for modify codeless_extra_classes_secondary
 * 
 * @since 1.0.0
 */
function codeless_extra_classes_secondary( $classes ) {
    
    // Add col-sm-3
    $classes[] = codeless_cols_prepend() . '3';
    
    if( codeless_get_page_layout() == 'left_sidebar' )
        $classes[] = codeless_cols_prepend() . 'pull-9';
    
    // Make sticky sidebar
    if( codeless_get_mod( 'sidebar_sticky', false ) )
        $classes[] = 'cl-sticky';
    
    return $classes;
}


/**
 * Add custom attributes to sidebar
 * 
 * @since 1.0.0
 */
function codeless_extra_attr_secondary( $attrs ) {
    
    // Make sticky sidebar
    if( codeless_get_mod( 'sidebar_sticky', false ) )
        $attrs[] = 'data-sticky-offset="' . (int) codeless_get_mod( 'sidebar_sticky_offset', 0 ) . '"';
    
    return $attrs;
}




/* ----------------------------------------------------------------------------------------- */
/* -------------------------------- Footer ------------------------------------------------- */


/**
 * Manage all classes of Footer Wrapper
 * @since 1.0.0
 */
function codeless_extra_classes_footer_wrapper( $classes ) {
    
    if( codeless_get_mod( 'footer_reveal_effect', 0 ) )
        $classes[] = 'reveal';
    
    return $classes;
}


/**
 * Manage all classes of Footer Content
 * Add Container static or container fluid for a fullwidth content footer
 * @since 1.0.0
 */
function codeless_extra_classes_footer_content( $classes ) {
    
    if( !codeless_get_mod( 'footer_fullwidth', 0 ) )
        $classes[] = 'container';
    else {
        $classes[] = 'container-fluid';
    }
    return $classes;
}

/**
 * Manage all classes of Footer Content Row
 * Add bootstrap row class
 * @since 1.0.0
 */
function codeless_extra_classes_footer_content_row( $classes ) {
    $classes[] = 'row';
    return $classes;
}


/**
 * Manage all classes of Copyright Content
 * Add Container static or container fluid for a fullwidth content footer
 * @since 1.0.0
 */
function codeless_extra_classes_copyright_content( $classes ) {
    
    if( !codeless_get_mod( 'footer_fullwidth', 0 ) )
        $classes[] = 'container';
    else {
        $classes[] = 'container-fluid';
    }
    return $classes;
}


/**
 * Manage all classes of Copyright Content Row
 * Add bootstrap row class
 * @since 1.0.0
 */
function codeless_extra_classes_copyright_content_row( $classes ) {
    $classes[] = 'row';
    return $classes;
}




/* ----------------------------------------------------------------------------------------- */
/* -------------------------------- Blog --------------------------------------------------- */


/**
 * Manage Classes of Blog Entries Div
 * @since 1.0.0
 */
function codeless_extra_classes_blog_entries( $classes ) {
    $classes[] = codeless_blog_style() . '-entries';
    
    if( codeless_blog_style() == 'media' )
        $classes[] = 'grid-entries';
    
    if( codeless_get_mod( 'blog_animation', 'none' ) != 'none' )
        $classes[] = 'animated-entries';
    
    if( codeless_get_mod( 'blog_filters', 'disabled' ) != 'disabled' )
        $classes[] = 'filterable-entries';

    if( codeless_is_blog_query() ){
        $classes[] = 'blog_page';
        $classes[] = 'blog_align_'.codeless_get_mod('blog_align');
    }
        
    return $classes;
}

/**
 * Manage Attributes of Blog Entries
 * @since 1.0.0
 */
function codeless_extra_attr_blog_entries( $attr ) {
    
    if( codeless_is_blog_isotope() ) {
        $attr[] = 'data-grid-cols="' . codeless_get_mod( 'blog_grid_layout', '4' ) . '"';
        $attr[] = 'data-transition-duration="' . codeless_get_mod( 'blog_transition_duration', '0.4' ) . '"';
    }
    
    return $attr;
}


/**
 * Blog Entry 
 * Blog Style, Blog Boxed Layout, Blog Animation
 * @since 1.0.0
 */
function codeless_extra_classes_entry( $classes ) {
    
    $blog_style = codeless_blog_style();
    
    $classes[] = $blog_style . '-style';
    
    if( $blog_style == 'timeline' )
        $classes[] = 'grid-style';
    
    if( codeless_get_mod( 'blog_boxed' ) )
        $classes[] = 'boxed-layout';
    
    // Add animation style class
    if( codeless_get_mod( 'blog_animation', 'none' ) != 'none' ) {
        $classes[] = 'animate_on_visible';
        $classes[] = codeless_get_mod( 'blog_animation' );
    }
    
    // Check if isotope is active and add necessary class
    if( codeless_is_blog_isotope() )
        $classes[] = 'cl-isotope-item';
    
    // Add large-featured or wide or default class for items that should look larger than others to create the masonry
    if( codeless_blog_style() == 'masonry' ) {
        $classes[] = 'cl-msn-size-' . codeless_get_meta( 'post_masonry_layout', 'default', get_the_ID() );
    }
    
    return $classes;
}


/**
 * Blog Entry Attr
 * Blog Animation
 * @since 1.0.0
 */
function codeless_extra_attr_entry( $attr ) {
    if( codeless_get_mod( 'blog_animation', 'none' ) != 'none' )
        $attr[] = 'data-speed="300"';
    
    $default_delay = 300;
    
    if( codeless_loop_counter() != 0 && codeless_blog_style() == 'timeline' )
        $counter = ( codeless_loop_counter() % 2 == 0 ) ? 2 : 1;
    else
        $counter = 1;
    
    if( codeless_loop_counter() != 0 && ( codeless_is_blog_isotope() || codeless_blog_style() == 'news' ) ) {
        
        $counter = codeless_loop_counter() % (int) codeless_get_mod( 'blog_grid_layout', 4 );
        if( $counter == 0 )
            $counter = (int) codeless_get_mod( 'blog_grid_layout', 4 );
        
        $default_delay = 100;
    }
    
    if( codeless_get_mod( 'blog_animation', 'none' ) != 'none' )
        $attr[] = 'data-delay="' . ( $default_delay * $counter ) . '"';
    
    return $attr;
}


/**
 * Manage all classes of Entry Content div
 * @since 1.0.0
 */
function codeless_extra_classes_entry_content( $classes ) {
    if( ( is_single() && codeless_page_from_builder() ) || ( is_single() && !codeless_page_from_builder() && is_customize_preview() ) )
        $classes[] = 'cl-content-builder';
    
    return $classes;
}



/* ----------------------------------------------------------------------------------------- */
/* -------------------------------- Portfolio ---------------------------------------------- */

/**
 * Portfolio Item 
 * Style, Layout, Animation
 * @since 1.0.0
 */
function codeless_extra_classes_portfolio_item( $classes ) {
    
    $classes[] = 'portfolio_item';
    
    
    // Add animation style class
    if( codeless_get_mod( 'portfolio_animation', 'none' ) != 'none' ) {
        $classes[] = 'animate_on_visible';
        $classes[] = codeless_get_mod( 'portfolio_animation' );
    }
    
    // Check if isotope is active and add necessary class
    $classes[] = 'cl-isotope-item';
    
    // Add large-featured or wide or default class for items that should look larger than others to create the masonry
    if( codeless_portfolio_layout() == 'masonry' ) {
        $classes[] = 'cl-msn-size-' . codeless_get_meta( 'portfolio_masonry_layout', 'default', get_the_ID() );
    }
    
    // Portfolio Boxed
    if( codeless_get_meta( 'portfolio_boxed', 0 ) )
        $classes[] = 'portfolio_boxed';
    
    
    return $classes;
}


/**
 * Portfolio Item Attr
 * Item Animation
 * @since 1.0.0
 */
function codeless_extra_attr_portfolio_item( $attr ) {
    if( codeless_get_mod( 'portfolio_animation', 'none' ) != 'none' )
        $attr[] = 'data-speed="300"';
    
    $default_delay = 300;
    $counter       = 1;
    
    if( codeless_loop_counter() != 0 && ( codeless_portfolio_layout() == 'grid' || codeless_portfolio_layout() == 'masonry' ) ) {
        if( codeless_portfolio_layout() == 'grid' )
            $counter = codeless_loop_counter();
        
        if( codeless_portfolio_layout() == 'masonry' )
            $counter = codeless_loop_counter() % codeless_get_meta( 'portfolio_columns', 4 );
        
        if( $counter == 0 )
            $counter = codeless_get_meta( 'portfolio_columns', 4 );
        
        $default_delay = 100;
    }
    
    if( codeless_get_mod( 'portfolio_animation', 'none' ) != 'none' )
        $attr[] = 'data-delay="' . ( (int)$default_delay * (int)$counter ) . '"';
    if( codeless_get_from_element( 'portfolio_distance', '15' ) != '15' )
        $attr[] = 'style="padding:' . codeless_get_from_element( 'portfolio_distance', '15' ) . 'px;"';
    
    return $attr;
}




/* ----------------------------------------------------------------------------------------- */
/* -------------------------------- Team Items --------------------------------------------- */

/**
 * Team Item 
 * Animation
 * @since 1.0.0
 */
function codeless_extra_classes_team_item( $classes ) {
    
    // Add animation style class
    if( codeless_get_from_element( 'team_animation', 'none' ) != 'none' ) {
        $classes[] = 'animate_on_visible';
        $classes[] = codeless_get_from_element( 'team_animation' );
    }
    
    return $classes;
}


/**
 * Team Item Attr
 * Item Animation
 * @since 1.0.0
 */
function codeless_extra_attr_team_item( $attr ) {
    if( codeless_get_from_element( 'team_animation', 'none' ) != 'none' )
        $attr[] = 'data-speed="300"';
    
    $default_delay = 300;
    $counter       = 1;
    
    if( codeless_loop_counter() != 0 ) {
        if( codeless_portfolio_layout() == 'grid' )
            $counter = codeless_loop_counter();
        
        if( $counter == 0 )
            $counter = codeless_get_from_element( 'team_grid_layout', 4 );
        
        if( ( $counter > codeless_get_from_element( 'team_grid_layout', 4 ) ) )
            $counter = $counter % codeless_get_from_element( 'team_grid_layout', 4 );
        
        $default_delay = 100;
    }
    
    if( codeless_get_mod( 'team_animation', 'none' ) != 'none' )
        $attr[] = 'data-delay="' . ( $default_delay * $counter ) . '"';
    
    if( codeless_get_from_element( 'team_items_distance', '15' ) )
        $attr[] = 'style="padding:' . codeless_get_from_element( 'team_items_distance', '15' ) . 'px;"';
    
    return $attr;
}

?>