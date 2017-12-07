<?php

if( function_exists( 'register_sidebar' ) ) {
    
    function codeless_register_sidebars_init() {
        global $cl_redata;
        
        register_sidebar( array(
             'name' => __( 'Sidebar Blog', 'folie' ),
            'id' => 'sidebar-blog',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );
        
        register_sidebar( array(
             'name' => __( 'Sidebar Pages', 'folie' ),
            'id' => 'sidebar-pages',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );
        
        
        $cols = codeless_layoutToArray( codeless_get_mod( 'footer_layout', '14_14_14_14' ) );
        
        for( $i = 1; $i <= count( $cols ); $i++ ) {
            register_sidebar( array(
                 'name' => __( 'Footer Column ' . $i, 'folie' ),
                'id' => 'footer-column-' . $i,
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>' 
            ) );
        }
        
        
        register_sidebar( array(
             'name' => __( 'Copyright Left', 'folie' ),
            'id' => 'copyright-left',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );
        
        register_sidebar( array(
             'name' => __( 'Copyright Right', 'folie' ),
            'id' => 'copyright-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );
        
        
        $custom_pages_sidebars = codeless_get_custom_sidebar_pages();


        if( ! empty( $custom_pages_sidebars ) ):
                foreach( $custom_pages_sidebars as $page_id => $page_name ) {
                    
                    if( $page_id != "" )
                        register_sidebar( array(
                             'name' => __( 'Page', 'folie' ) . ': ' . get_the_title( $page_id ) . '',
                            'id' => 'sidebar-custom-page-' . $page_id,
                            'before_widget' => '<div id="%1$s" class="widget %2$s">',
                            'after_widget' => '</div>',
                            'before_title' => '<h3 class="widget-title">',
                            'after_title' => '</h3>' 
                        ) );
                    
                    
                }
        endif;
        
        
        
        $custom_categories_sidebars = codeless_get_custom_sidebar_categories();


        if( ! empty( $custom_categories_sidebars ) ):
                foreach( $custom_categories_sidebars as $category_id => $category_name ) {
                    
                    if( $page_id != "" )
                        register_sidebar( array(
                             'name' => __( 'Category', 'folie' ) . ': ' . $category_name . '',
                            'id' => 'sidebar-custom-category-' . $category_id,
                            'before_widget' => '<div id="%1$s" class="widget %2$s">',
                            'after_widget' => '</div>',
                            'before_title' => '<h3 class="widget-title">',
                            'after_title' => '</h3>' 
                        ) );
                    
                    
                }
        endif;
        
        
        
        if( class_exists( 'Woocommerce' ) ) {
            register_sidebar( array(
                 'name' => __( 'Sidebar Woocommerce', 'folie' ),
                'id' => 'woocommerce',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>' 
            ) );
        }
        
        
        register_sidebar( array(
             'name' => __( 'Search Page', 'folie' ),
            'id' => 'search-dynamic',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );
        
        
    }
    add_action( 'widgets_init', 'codeless_register_sidebars_init' );
    
}

?>