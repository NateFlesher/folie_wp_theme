<?php

/**
 * Folie functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Folie
 * @subpackage Functions
 * @since 1.0
 */

if ( ! isset( $content_width ) )
	$content_width = 1070;

// Load Codeless Framework Constants
require_once( get_template_directory() . '/includes/core/codeless_constants.php' );

// Load Customizer Control Types
include_once( get_template_directory() . '/includes/codeless_customizer/kirki/kirki.php' );

// Load Required Plugins Tool
require_once( get_template_directory().'/includes/core/codeless_required_plugins.php' );
//Demo Importer
require_once( get_template_directory().'/includes/codeless_theme_panel/importer/codeless_importer.php' );


/**
 * All Start here...
 * 
 * @since 1.0.0
 */
function codeless_setup(){

    // Register Nav Menus Locations to use
    codeless_navigation_menus();
    // Load Codeless Customizer files and Options
    codeless_load_customizer();
    // Load All Codeless Framework Files
    codeless_load_framework();
    // Load Codeless Modules
    codeless_load_modules();

    // Language and text-domain setup
    add_action('init', 'codeless_language_setup');

    // Register Scripts and Styles
    add_action('wp_enqueue_scripts', 'codeless_register_global_styles');
    add_action('wp_enqueue_scripts', 'codeless_register_global_scripts');

    // Https filters
    add_filter( 'https_ssl_verify', '__return_false' );
    add_filter( 'https_local_ssl_verify', '__return_false' );

    // WP features that this theme supports
    codeless_theme_support();
    // Create Custom Image Sizes
    codeless_images_sizes(); 
    

    // Widgets
    codeless_load_widgets();
    codeless_register_widgets();  

    // Megamenu Create
    new codeless_custom_menu();
}

add_action( 'after_setup_theme', 'codeless_setup' );


/**
 * After theme activation
 * 
 * @since 1.0.0
 */
function codeless_after_switch_theme(){
    wp_redirect('admin.php?page=codeless-panel');
}

add_action( 'after_switch_theme', 'codeless_after_switch_theme' );


/**
 * Load Customizer Related Options and Customizer Cotrols Classes
 * 
 * @since 1.0.0
 */
function codeless_load_customizer() {

    // Load and Initialize Codeless Customizer
    include_once( get_template_directory() . '/includes/codeless_customizer/codeless_customizer_config.php' );
}


/**
 * Load all Codeless Framework Files
 * 
 * @since 1.0.0
 */
function codeless_load_framework() {

    // Register all Theme Hooks (add_action, add_filter)
    require_once( get_template_directory() . '/includes/codeless_hooks.php' );

    // Codeless Routing Templates and Custom Type Queries
    require_once( get_template_directory().'/includes/core/codeless_routing.php' );
    

    // Register all theme related sidebars
    require_once( get_template_directory().'/includes/register/register_sidebars.php' );

    // Register Custom Post Types
    // Works with Codeless Builder activated
    // Plugin Territory
    require_once( get_template_directory().'/includes/register/register_custom_types.php' );

    // Load Codeless Post Like
    require_once( get_template_directory().'/includes/core/codeless_post_like.php' );

    // Load Megamenu
    require_once( get_template_directory().'/includes/core/codeless_megamenu.php' );

    // Load all functions that are responsable for Extra Classes and Extra Attrs
    require_once( get_template_directory().'/includes/codeless_html_attrs.php' );

    // Load all blog related functions
    require_once( get_template_directory().'/includes/codeless_functions_blog.php' );

    // Load all portfolio related functions
    require_once( get_template_directory().'/includes/codeless_functions_portfolio.php' );

    // Load Theme Panels
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_backpanel.php' );
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_theme_panel.php' );
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_image_sizes.php' );
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_modules.php' ); 
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_custom_sidebars.php' ); 
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_system_status.php' );
    
    // Image Resize - Module - Resize image only when needed
    require_once( get_template_directory().'/includes/core/codeless_image_resize.php' );

    // Load Comment Walker
    require_once( get_template_directory().'/includes/core/codeless_comment_walker.php' );
    
    // Codeless Icons List
    require_once( get_template_directory().'/includes/core/codeless_icons.php' );

    // Fallback Class for Header when Codeless Builder Plugin is not active
    require_once( get_template_directory().'/includes/core/codeless_header_fallback.php' );

    // Load Woocommerce Functions
    if( class_exists( 'Woocommerce' ) )
        require_once( get_template_directory().'/includes/codeless_functions_woocommerce.php' );
}

/**
 * Load All Modules
 * 
 * @since 1.0.0
 */
function codeless_load_modules(){
   require_once( get_template_directory().'/includes/codeless_modules/custom_portfolio_overlay_color.php' );
   require_once( get_template_directory().'/includes/codeless_modules/header_boxed_per_page.php' );
   require_once( get_template_directory().'/includes/codeless_modules/custom_header_background_per_page.php' );    
}


/**
 * Load Codeless Custom Widgets
 * 
 * @since 1.0.0
 */
function codeless_load_widgets() {
    require_once get_template_directory().'/includes/widgets/codeless_flickr.php';
    require_once get_template_directory().'/includes/widgets/codeless_mostpopular.php';
    require_once get_template_directory().'/includes/widgets/codeless_shortcodewidget.php';
    require_once get_template_directory().'/includes/widgets/codeless_socialwidget.php';
    require_once get_template_directory().'/includes/widgets/codeless_twitter.php';
    require_once get_template_directory().'/includes/widgets/codeless_ads.php';
}


/**
 * Setup Language Directory and theme text domain
 * 
 * @since 1.0.0
 */
function codeless_language_setup() {
    $lang_dir = get_template_directory() . '/lang';
    load_theme_textdomain('folie', $lang_dir);
} 


/**
 * Add Theme Supports
 * 
 * @since 1.0.0
 */
function codeless_theme_support(){
    add_theme_support( 'post-thumbnails' );
    
    add_theme_support('woocommerce');
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-slider' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support('nav_menus');
    add_theme_support( 'post-formats', array( 'quote', 'gallery','video', 'audio', 'link' ) ); 
    add_theme_support( "title-tag" );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    // Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
    add_editor_style();
}


/**
 * Regster Theme Related Image Sizes
 * 
 * @since 1.0.0
 */
function codeless_images_sizes(){
    // Empty
}


/**
 * Register Navigation Menus
 * 
 * @since 1.0.0
 */
function codeless_navigation_menus(){
    $navigations = array('main' => 'Main Navigation');

    foreach($navigations as $id => $name){ 
    	register_nav_menu($id, THEMETITLE.' '.$name); 
    }
}


/**
 * Regster Loaded Widgets
 * 
 * @since 1.0.0
 */
function codeless_register_widgets(){
	register_widget( 'CodelessTwitter' );
    register_widget( 'CodelessSocialWidget' );
    register_widget( 'CodelessFlickrWidget' );
    register_widget( 'CodelessShortcodeWidget' );
    register_widget( 'CodelessMostPopularWidget');
    register_widget( 'CodelessAdsWidget');
}


/**
 * Enqueue all needed styles
 * 
 * @since 1.0.0
 */
function codeless_register_global_styles(){ 

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('codeless-style', get_stylesheet_uri());

    wp_enqueue_style('codeless-front-elements', get_template_directory_uri() . '/css/codeless-front-elements.css');

    wp_enqueue_style('swiper-slider', get_template_directory_uri() . '/css/swiper.min.css');
    
    if( codeless_get_mod( 'codeless_page_transition' )) 
        wp_enqueue_style('animsition', get_template_directory_uri(). '/css/animsition.min.css'); 
    
    if( codeless_get_mod( 'blog_entry_overlay_icon' ) == 'lightbox' )
        wp_enqueue_style('ilightbox', get_template_directory_uri() . '/css/ilightbox/css/ilightbox.css' );
    
    if( function_exists('is_woocommerce') && ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) ){ 
        wp_enqueue_style('select2', get_template_directory_uri() . '/css/select2.min.css');
        wp_enqueue_style('codeless-woocommerce', get_template_directory_uri() . '/css/codeless-woocommerce.css');  
    }

    if( codeless_get_mod( 'search_type', 'creative' ) == 'creative' )
        wp_enqueue_style('codeless-creative-search', get_template_directory_uri() . '/css/codeless-creative-search.css');

    
    // Create Dynamic Styles
    wp_enqueue_style( 'codeless-dynamic', get_template_directory_uri() . '/css/codeless-dynamic.css');
    
    /* Load Custom Dynamic Style and enqueue them with wp_add_inline_style */
    ob_start();
    codeless_custom_dynamic_style();
    $styles = ob_get_clean();

    wp_add_inline_style( 'codeless-dynamic', apply_filters( 'codeless_register_styles', $styles ) );    
}


/**
 * Enqueue all global scripts
 * 
 * @since 1.0.0
 */
function codeless_register_global_scripts(){
    
    wp_enqueue_script( 'codeless-main', get_template_directory_uri() . '/js/codeless-main.js', array( 'jquery', 'imagesloaded' ) );
    wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'bowser', get_template_directory_uri() . '/js/bowser.min.js' );

   if( codeless_get_mod( 'codeless_page_transition', false )) 
        wp_enqueue_script('animation', get_template_directory_uri(). '/js/animsition.min.js'); 

    if( codeless_get_mod( 'nicescroll' ) )
        wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js' ); 

    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        // Load comment-reply.js
        wp_enqueue_script( 'comment-reply' );
    }

    wp_localize_script(
        'codeless-main',
        'codeless_global',
        array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'FRONT_LIB_JS' => get_template_directory_uri() . '/js/',
            'FRONT_LIB_CSS' => get_template_directory_uri() . '/css/',
            'postSwiperOptions' => codeless_get_post_slider_options(),
            'cl_btn_classes' => codeless_button_classes()
            // Blog Slider Data
            
        )
    );
}

/**
 * Load all styles from register_styles.php
 * Added with wp_add_inline_style on codeless_register_global_styles, action wp_enqueue_scripts
 * @since 1.0.0
 */
function codeless_custom_dynamic_style(){
    include get_template_directory().'/includes/register/register_styles.php';
}


/**
 * Apply Filters for given tag.
 * Use: add_filter('codeless_extra_classes_wrapper') for ex,
 * will add a custom class at wrapper html tag
 * 
 * @since 1.0.0
 * @version 1.0.3
 */
 
function codeless_extra_classes($tag){
    
    if( empty($tag) )
        return '';
      
    $classes = apply_filters('codeless_extra_classes_'.$tag, array()); 
    return (!empty($classes) ? implode(" ", $classes) : '');
}


/**
 * Apply Filters for given tag.
 * Use: add_filter('codeless_extra_attr_viewport') for ex,
 * will add a custom attr at viewport html tag
 * 
 * @since 1.0.0
 * @version 1.0.3
 */
 
function codeless_extra_attr($tag){
    
    if( empty($tag) )
        return '';
      
    $attrs = apply_filters('codeless_extra_attr_'.$tag, array()); 
    return (!empty($attrs) ? implode(" ", $attrs) : '');
}


/**
 * Core Function: Return the value of a specific Mod
 * 
 * @since 1.0.0
 */
function codeless_get_mod( $id, $default = '', $sub_array = '' ){

    //For Online

    global $codeless_online_mods, $cl_from_element;

    if( isset($cl_from_element[$id]) && !empty($cl_from_element[$id]) ){
        return $cl_from_element[$id];
    }

    if( isset($codeless_online_mods[$id])  && ! is_customize_preview() ){
        return $codeless_online_mods[$id];
    }

    if($default == '')
        $default = cl_theme_mod_default($id);


    if ( is_customize_preview() ) {
        
        if($sub_array == '')
            return get_theme_mod( $id, $default );
        else if(isset($var[$sub_array])){
            $var = get_theme_mod( $id, $default );
            return $var[$sub_array];
        }
    }
    
    global $cl_theme_mods;
    
    if ( ! empty( $cl_theme_mods ) ) {

        if ( isset( $cl_theme_mods[$id] ) ) {

            if($sub_array == '')
                return $cl_theme_mods[$id];
            else
                return $cl_theme_mods[$id][$sub_array];
        }

        else {
            return $default;
        }

    }

    else {

        if($sub_array == '')
            return get_theme_mod( $id, $default );
        else if(isset($var[$sub_array])){
            $var = get_theme_mod( $id, $default );
            return $var[$sub_array];
        }
    }

}


/**
 * Get the Default Value of a theme mod from Codeless Options
 * 
 * @since 1.0.0
 */
function cl_theme_mod_default($id){
    if( isset( Kirki::$fields[$id] ) && isset( Kirki::$fields[$id]['default'] ) && ! empty( Kirki::$fields[$id]['default'] ) )
        return Kirki::$fields[$id]['default'];
    else
        return '';
}


/**
 * Check if is neccesary to add extra HTML for container and inner row (make an inner container)
 * @since 1.0.0
 */
function codeless_is_inner_content(){
    $condition = false;

    // Condition to test if query is a blog
    if( ! codeless_is_blog_query() )
        $condition = true;


    if( (! codeless_page_from_builder() || 
            ( codeless_get_page_layout() != 'fullwidth' 
                && codeless_get_page_layout() != '' 
                && codeless_get_page_layout() != 'default' ) || 
            ( is_single() 
                && get_post_type() == 'post' 
                && codeless_get_post_style() != 'custom'  ) 
        )
        && $condition )

        return true;

    return false;
}


/**
 * Check if is modern layout
 * @since 1.0.0
 */
function codeless_is_layout_modern(){
    $layout_modern = codeless_get_mod( 'layout_modern' );

    if( codeless_get_meta( 'layout_modern' ) != 'default' &&  codeless_get_meta( 'layout_modern' ) != '' ){
        $layout_modern = codeless_get_meta( 'layout_modern' );
    }

    return $layout_modern;
}


/**
 * Loop Counter
 * @since 1.0.0
 */
function codeless_loop_counter( $i = false ){
    global $codeless_loop_counter;
    
    if( $i !== false )
        $codeless_loop_counter = $i;
    
    return $codeless_loop_counter;
}


/**
 * Select and output sidebar for current page
 * @since 1.0.0
 */
function codeless_get_sidebar(){
    
    // Get current page layout
    $layout = codeless_get_page_layout();
  
    // No sidebar if fullwidth layout
    if( $layout == 'fullwidth' )
        return;
    
    // Load custom sidebar template for dual
    if( $layout == 'dual_sidebar' ){
        get_sidebar( 'dual' );
        return;
    }
    
    // For left/right sidebar layouts get default sidebar template
    get_sidebar();
    
}


/**
 * Two functions used for creating a wrapper for sticky sidebar
 * @since 1.0.0
 */
function codeless_sticky_sidebar_wrapper(){
    echo '<div class="cl-sticky-wrapper">';
}
function codeless_sticky_sidebar_wrapper_end(){
    echo '</div><!-- .cl-sticky-wrapper -->';
}


/**
 * Determine if page uses a left/right sidebar or a fullwidth layout
 * @since 1.0.0 
 */
function codeless_get_page_layout(){
    
    global $codeless_page_layout;

    // Make a test and save at the global variable to make the function works faster
    if(!isset($codeless_page_layout) || empty($codeless_page_layout) || (isset($codeless_page_layout) && !$codeless_page_layout) || is_customize_preview() ){
    
        // Default 
        $codeless_page_layout = codeless_get_mod( 'layout', 'fullwidth' );
        
        
        // Check if query is a blog query
        if( codeless_is_blog_query() && codeless_get_mod( 'blog_layout' ) != 'none' )
            $codeless_page_layout = codeless_get_mod( 'blog_layout' );
        
        // Blog Post layout
        if( is_single() && get_post_type( codeless_get_post_id() ) == 'post' )
            $codeless_page_layout = codeless_get_mod( 'blog_post_layout', 'right_sidebar' );       
       
        // Add single page layout check here
        if( codeless_get_meta( 'page_layout', 'default' ) != 'default' )
            $codeless_page_layout = codeless_get_meta( 'page_layout', 'default');

        if( function_exists('is_product_category') && is_product_category() )
            $codeless_page_layout = codeless_get_mod( 'shop_category_layout', 'fullwidth' ); 

        if( is_archive() )
            $codeless_page_layout = codeless_get_mod( 'blog_archive_layout', 'fullwidth' );


        // if no sidebar is active return 'fullwidth'
        if( ! codeless_is_active_sidebar() )
            $codeless_page_layout = 'fullwidth';

        // Apply filter and return
        $codeless_page_layout = apply_filters( 'codeless_page_layout', $codeless_page_layout );

    }
    return $codeless_page_layout;
}



/**
 * Generate Content Column HTML class based on layout type
 * @since 1.0.0
 */
function codeless_content_column_class(){
    
    // Get page layout
    $layout = codeless_get_page_layout();
    
    // First part of class "col-sm-"
    $col_class = codeless_cols_prepend();
    
    if( $layout == 'fullwidth' )
        $col_class .= '12';
    elseif( $layout == 'dual_sidebar' )
        $col_class .= '6';
    else
        $col_class .= '9';
    
    return $col_class;
    
}


/**
 * HTML / CSS Column Class Prepend
 * @since 1.0.0
 */
function codeless_cols_prepend(){
    return apply_filters( 'codeless_cols_prepend', 'col-sm-' );
}


/**
 * Buttons Style (Classes)
 * @since 1.0.0
 * @version 1.0.3
 */
function codeless_button_classes( $classes = array(), $overwrite = false, $postID = false ){
    
    if( !is_array( $classes ) )
        $classes = array();

    if( ! $overwrite ){
        $classes[] = 'cl-btn';

        $btn_style = codeless_get_mod( 'button_style', 'material_square' );

        if( codeless_is_blog_entry() )
            $btn_style = codeless_get_mod( 'blog_button_style', 'material_circular' );

        $classes[] = 'btn-style-' . $btn_style;
        $classes[] = 'btn-layout-' . codeless_get_mod( 'button_layout', 'medium' );
        $classes[] = 'btn-font-' . codeless_get_mod( 'button_font', 'medium' );
    }

    $classes = apply_filters( 'codeless_button_classes', $classes );
    
    return (!empty($classes) ? implode(" ", $classes) : '');
}


/**
 * Check if page it's generated from Codeless Builder or VC
 * @since 1.0.0
 */
function codeless_page_from_builder(){
    
    global $codeless_page_from_builder;
    
    if( ! isset( $codeless_page_from_builder ) || is_null( $codeless_page_from_builder ) ){
        
        $codeless_page_from_builder = false;
        $page = get_page( codeless_get_post_id() );
        
        if( is_object($page) ){
            $content = $page->post_content;
            preg_match_all('/\[vc_row(.*?)\]/', $content, $matches_vc );
            preg_match_all('/\[cl_page_header(.*?)\]/', $content, $matches_cl_page_header );
            preg_match_all('/\[cl_row(.*?)\]/', $content, $matches_cl_row );
            
            if ( isset($matches_vc[0]) && !empty($matches_vc[0]) )
                $codeless_page_from_builder = true;
            
            if ( isset($matches_cl_page_header[0]) && !empty($matches_cl_page_header[0]) ) 
                $codeless_page_from_builder = true;
            if ( isset($matches_cl_row[0]) && !empty($matches_cl_row[0]) )
                $codeless_page_from_builder = true;
        }else{
            $codeless_page_from_builder = false;
        }

    }

    if( is_customize_preview() && class_exists( 'Cl_Builder_Manager' ) )
        return true;
        
    return $codeless_page_from_builder;
}


/**
 * Convert Width (1/2 or 1/3 etc) to col-sm-6... 
 * @since 1.0.0
 */
function codeless_widthToSpan( $width ) {
    preg_match( '/(\d+)\/(\d+)/', $width, $matches );

    if ( ! empty( $matches ) ) {
        $part_x = (int) $matches[1];
        $part_y = (int) $matches[2];
        if ( $part_x > 0 && $part_y > 0 ) {
            $value = ceil( $part_x / $part_y * 12 );
            if ( $value > 0 && $value <= 12 ) {
                $width = codeless_cols_prepend() . $value;
            }
        }
    }

    return $width;
}

/**
 * Convert layout string (14_14_14_14) to an array of
 * 1/4, 1/4, 1/4, 1/4
 * @since 1.0.0
 */
function codeless_layoutToArray( $layout ){
    $layout_arr = explode( "_", $layout );
    $layout_ = array();

    foreach($layout_arr as $layout_col){
        $layout_col_arr = array();
        for ($i = 0, $l = strlen($layout_col); $i < $l; $i++) {
            $layout_col_arr[] = $layout_col{$i};
        }
        array_splice( $layout_col_arr, strlen($layout_col) / 2 , 0, '/' );
        $layout_[] = implode( '', $layout_col_arr );
    }
    
    return $layout_;
}


/**
 * Conditionals for showing footer and copyright
 * @since 1.0.0
 */
function codeless_show_footer(){  
    ?>
    <div id="footer-wrapper" class="<?php echo esc_attr( codeless_extra_classes( 'footer_wrapper' ) ) ?>">  
        <?php
            if( codeless_get_mod( 'show_footer', true ) )
                get_template_part( 'template-parts/footer/main' );
            if( codeless_get_mod( 'show_copyright', true ) )
                get_template_part( 'template-parts/footer/copyright' );
        ?>
    </div><!-- #footer-wrapper -->
    <?php
}



/**
 * Build Footer Layout and call dynamic sidebar
 * 
 * @since 1.0.0
 */
function codeless_build_footer_layout(){
    // Get Layout string
    $layout = codeless_get_mod( 'footer_layout', '14_14_14_14' );
    
    // Create array of columns
    $cols = codeless_layoutToArray($layout);
    
    // Center column if layout single column layout and option is set TRUE
    $centered_column = '';
    if( $layout == '11' && codeless_get_mod( 'footer_centered_content', 0 ) )
        $centered_column = 'center-column';


    // Generate Footer Output
    $i = 0;
    foreach( $cols as $col ){
        $i++;
        
        ?>
        
        <div class="footer-widget <?php echo esc_attr( codeless_widthToSpan( $col ) ) ?> <?php echo esc_attr( $centered_column ) ?>">
        
            <?php
                if( is_active_sidebar( 'footer-column-'.$i ) )
                    dynamic_sidebar( 'footer-column-'.$i );
            ?>
        
        </div><!-- Footer Widget -->
        
        <?php
    }
    
}

/**
 * Build Copyright
 * 
 * @since 1.0.0
 */
function codeless_build_copyright(){
    ?>

    <div class="copyright-widget <?php echo esc_attr( codeless_cols_prepend().'6' ) ?>">
        
            <?php
                if( is_active_sidebar( 'copyright-left' ) )
                    dynamic_sidebar( 'copyright-left' );
            ?>
        
    </div><!-- Copyright Widget -->

    <div class="copyright-widget <?php echo esc_attr( codeless_cols_prepend().'6' ) ?>">
        
            <?php

                 if( is_active_sidebar( 'copyright-right' ) )
                    dynamic_sidebar( 'copyright-right' );
            ?>
        
    </div><!-- Copyright Widget -->

    <?php
    
}


/**
 * Extract Page Header Shortcode from Content
 * @since 1.0.0
 */
function codeless_extract_page_header($content){
    $pattern = get_shortcode_regex(array('cl_page_header'));
    preg_match('/'.$pattern.'/s', $content, $matches);
    if (is_array($matches) && isset($matches[2]) ) {
       $shortcode = $matches[0];
       return $shortcode;
    }
}


/**
 * Add Default page title for core wordpress pages.
 * @since 1.0.0
 */
function codeless_add_default_page_title(){
    if( !codeless_page_from_builder() && is_page() && ! codeless_is_shop_page() ){
        the_title( '<h1 class="page-title">', '</h1>' );
        return;
    }
}


/**
 * Add content of Blog Page at the top of page before the loop
 * @since 1.0.0
 */
function codeless_add_page_header(){
        
    if( ( codeless_get_page_layout() == 'fullwidth' && ! codeless_is_blog_query() && ! is_single() ) || codeless_is_shop_page() )
        return false;

    if( is_single() && codeless_get_post_style() != 'custom' )
        return;



    $post = get_post( codeless_get_post_id() ); 
    setup_postdata($post);
    if( ! is_object( $post ) )
        return;
    
    $content    = $post->post_content;
    $page_header    = codeless_extract_page_header($content);

    $page_header    = str_replace(']]>', ']]&gt;', apply_filters( 'codeless_the_page_header' , $page_header ));

    echo apply_filters('the_content', $page_header ); 

        
    wp_reset_postdata();
}


/**
 * Displays the generated output from header builder
 * or output the default header layout
 * 
 * @since 1.0.0
 */
function codeless_show_header(){
    echo '<div class="header_container ' . esc_attr( codeless_extra_classes( 'header' ) ) . '" ' . codeless_extra_attr( 'header' ) . '>';

    // If Codeless-Builder is installed load from plugin, if not load the default class
    if( function_exists( 'cl_output_header' ) )
        cl_output_header(); 
    else{
        $cl_header = new CodelessHeaderOutput();
        $cl_header->output();
    }
    echo '</div>';    
  
}


/**
 * Default Header Data
 * 
 * @since 1.0.0
 */
function codeless_get_default_header(){
    $data = array(
        'main' => array ( 
            
            'left' => array ( 
                0 => array ( 
                    'id' => '8ead0c8d-2536', 
                    'type' => 'cl_header_logo', 
                    'order' => 0, 
                    'params' => array ( ), 
                    'row' => 'main', 
                    'col' => 'left', 
                    'from_content' => true, 
                ), 
                1 => array ( 
                    'id' => '688ebeea-7803', 
                    'type' => 'cl_header_menu', 
                    'order' => 2, 
                    'params' => array ( 'hamburger' => false ), 
                    'row' => 'main', 
                    'col' => 'left', 
                    'from_content' => true
                ), 
            ), 

            'right' => array ( 
                0 => array ( 
                    'id' => '0baeceb2-c63c', 
                    'type' => 'cl_header_tools', 
                    'order' => 0, 
                    'params' => array ( 
                        'search_button' => 1, 
                        'cart_button' => 1, 
                        'side_nav_button' => 0, 
                        'search_type' => 'simple'
                    ), 
                    'row' => 'main', 
                    'col' => 'right', 
                    'from_content' => true
                ), 
            ), 
        )
    );

    return apply_filters( 'codeless_default_header', $data );
}


function codeless_is_header_boxed(){
    return apply_filters( 'codeless_is_header_boxed', codeless_get_mod( 'header_boxed', false ) );
}


/**
 * Return true if have widget on given page sidebar
 * 
 * @since 1.0.0
 */
function codeless_is_active_sidebar(){

    return is_active_sidebar( codeless_get_sidebar_name() );
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * 
 * @global int $content_width
 * @since 1.0.0
 */
function codeless_content_width() {
    
	global $content_width;
	
	if( codeless_get_page_layout() != 'fullwidth' ){
	    $content_width = 795;

        if( codeless_get_mod( 'layout_modern' ) )
            $content_width = 770;
	    
	    if( codeless_get_page_layout() == 'dual_sidebar' )
	        $content_width = 520;
	}

	// Blog Alternate
	if( codeless_is_blog_query() && codeless_blog_style() == 'alternate' && ! is_single() ){
	    $content_width = 500;
	}
	
	// Blog Grid
	if( codeless_is_blog_query() && codeless_blog_style() == 'grid' && ! is_single() ){
	    $content_width = 500;
	}

}
add_action( 'template_redirect', 'codeless_content_width' );


/**
 * Return the exact thumbnail size to use for portfolio
 *
 * @since 1.0.0
 */
function codeless_get_portfolio_thumbnail_size(){
    $portfolio = codeless_get_mod( 'portfolio_image_size', 'portfolio_entry' );
    return $portfolio;
}  

/**
 * Return the exact thumbnail size to use for team
 *
 * @since 1.0.0
 */
function codeless_get_team_thumbnail_size(){
    $team = codeless_get_mod( 'team_image_size', 'team_entry' );
    return $team;
}  


/**
 * Array of Custom Image Sizes
 * Can be modified by user in Theme Panel
 *
 * @since 1.0.0
 */
add_filter( 'codeless_image_sizes', 'codeless_image_sizes' );
function codeless_image_sizes(){
    
    $default = array(
        'blog_entry'  => array(
			'label'   => esc_html__( 'Blog Entry', 'folie' ),
			'width'   => 'blog_entry_image_width',
			'height'  => 'blog_entry_image_height',
			'crop'    => 'blog_entry_image_crop',
			'section' => 'blog',
            'description' => esc_html__('Used as default for all blog images.', 'folie' ),
		),
		
		'blog_entry_small'  => array(
			'label'   => esc_html__( 'Blog Entry Small', 'folie' ),
			'width'   => 'blog_entry_small_image_width',
			'height'  => 'blog_entry_small_image_height',
			'crop'    => 'blog_entry_small_image_crop',
			'section' => 'blog',
            'description' => esc_html__('Used for Blog Grid and Carousels, News, Media, Alternate', 'folie'),
			'defaults' => array( '1100', '880', 'center-center' )
		),	
		
		'blog_post'  => array(
			'label'   => esc_html__( 'Blog Post', 'folie' ),
			'width'   => 'blog_post_image_width',
			'height'  => 'blog_post_image_height',
			'crop'    => 'blog_post_image_crop',
			'section' => 'blog',
		),

        'portfolio_entry'  => array(
            'label'   => esc_html__( 'Portfolio Entry', 'folie' ),
            'width'   => 'portfolio_entry_image_width',
            'height'  => 'portfolio_entry_image_height',
            'crop'    => 'portfolio_entry_image_crop',
            'section' => 'portfolio',
            'description' => esc_html__('Used as default for all portfolio grid.', 'folie' ),
        ),

        'team_entry'  => array(
            'label'   => esc_html__( 'Team Entry', 'folie' ),
            'width'   => 'team_entry_image_width',
            'height'  => 'team_entry_image_height',
            'crop'    => 'team_entry_image_crop',
            'section' => 'team',
            'description' => esc_html__('Used as default for all team members', 'folie' ),
        ),

	);

    $custom = codeless_get_mod('cl_custom_img_sizes', array());
    if( empty( $custom ) )
        return $default;

    foreach( $custom as $new ){
        $default[$new] = array(
            'label'   => esc_html__( 'Custom', 'folie' ) . ': ' . $new,
            'width'   => $new . '_image_width',
            'height'  => $new . '_image_height',
            'crop'    => $new . '_image_crop',
            'section' => 'other',
            'description' => '',
        );
    }

    return $default;
}



/**
 * Array of image crop positions
 *
 * @since 1.0.0
 */
function codeless_image_crop_positions() {
	return array(
		''              => esc_html__( 'Default', 'folie' ),
		'left-top'      => esc_html__( 'Top Left', 'folie' ),
		'right-top'     => esc_html__( 'Top Right', 'folie' ),
		'center-top'    => esc_html__( 'Top Center', 'folie' ),
		'left-center'   => esc_html__( 'Center Left', 'folie' ),
		'right-center'  => esc_html__( 'Center Right', 'folie' ),
		'center-center' => esc_html__( 'Center Center', 'folie' ),
		'left-bottom'   => esc_html__( 'Bottom Left', 'folie' ),
		'right-bottom'  => esc_html__( 'Bottom Right', 'folie' ),
		'center-bottom' => esc_html__( 'Bottom Center', 'folie' ),
	);
}


/**
 * Resize the Image (first time only)
 * Replace SRC attr with the new url created
 * 
 * @since 1.0.0
 */
function codeless_post_thumbnail_attr( $attr, $attachment, $size){
    
    if( is_admin() )
        return $attr;
    
    $size_attr = array();
    $additional_sizes = codeless_wp_get_additional_image_sizes();
    
    
    if( get_post_type( get_the_ID() ) == 'post' && codeless_get_mod( 'blog_lazyload', false ) ){
        $attr['class'] .= ' lazyload ';
        $attr['data-original'] = codeless_get_attachment_image_src($attachment->ID, $size);
    }

    if( is_string( $size ) && ! isset($additional_sizes[ $size ] ) )
        return $attr;
    
    if( ! codeless_get_mod( 'optimize_image_resizing', true ) )
        return $attr;
        
    if( is_string( $size ) )
        $size_attr = $additional_sizes[ $size ];
      
    $image = codeless_image_resize( array(
		'image'  => $attachment->guid,
		'width'  => isset($size_attr['width']) ? $size_attr['width'] : '',
		'height' => isset($size_attr['height']) ? $size_attr['height'] : '',
		'crop'   => isset($size_attr['crop']) ? $size_attr['crop'] : ''
	));
	
	
	$image_meta = wp_get_attachment_metadata($attachment->ID);

    if( isset( $image['url'] ) && !empty( $image['url'] ) )
        $attr['src'] = $image['url'];
    
    // Replace old url and width with new cropped url and width
    if( isset( $attr['srcset'] ) && ! empty( $attr['srcset'] ) ){
        $attr['srcset'] = str_replace($attachment->guid, $image['url'], $attr['srcset']);

        if( ! empty( $image['width'] ) )
            $attr['srcset'] = str_replace($image_meta['width'], $image['width'], $attr['srcset']);
    }
    
    $attr['sizes'] = '(max-width: '.$image['width'].'px) 100vw, '.$image['width'].'px';

	return $attr;
} 

add_filter('wp_get_attachment_image_attributes', 'codeless_post_thumbnail_attr', 10, 3);


/**
 * Resize the Image (first time only)
 * Return the resized image url
 * 
 * @since 1.0.0
 */
function codeless_get_attachment_image_src( $attachment_id, $size = false ){
    
    if( $size === false )
        $size = 'full';
    
    $src = wp_get_attachment_image_src( $attachment_id, 'full' );
    
    $size_attr = array();
    $additional_sizes = codeless_wp_get_additional_image_sizes();
    
    if( is_array( $size ) || ! isset( $additional_sizes[ $size ] ) )
        return $src[0];
    
    $size_attr = $additional_sizes[ $size ];

    if( is_array( $size_attr ) && ! empty( $src ) ){
        
        $image = codeless_image_resize( array(
    		'image'  => $src[0],
    		'width'  => isset($size_attr['width']) ? $size_attr['width'] : '',
    		'height' => isset($size_attr['height']) ? $size_attr['height'] : '',
    		'crop'   => isset($size_attr['crop']) ? $size_attr['crop'] : ''
    	));
    	
    	return $image['url'];
    	
    }
	
	return $src[0];
	
}


/**
 * Removes width and height attributes from image tags
 *
 * @param string $html
 *
 * @return string
 * @since 1.0.0
 */
function codeless_remove_image_size_attributes( $html ) {
    return preg_replace( '/(width|height)="\d*"/', '', $html );
}
 
// Remove image size attributes from post thumbnails
add_filter( 'post_thumbnail_html', 'codeless_remove_image_size_attributes' );


/**
 * List of share buttons and links
 * 
 * @since 1.0.0
 */
function codeless_share_buttons( $for_element = false ){
    
    // Get current page URL 
    $url = urlencode(get_permalink());
 
    // Get current page title
    $title = str_replace( ' ', '%20', get_the_title());
        
    // Get Post Thumbnail for pinterest
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
    
    $shares = array();

    
    $share_option = codeless_get_mod( 'blog_share_buttons', array( 'twitter', 'facebook' ) );
    
    if( $for_element )
        $share_option = array( 'twitter', 'facebook', 'google', 'whatsapp', 'linkedin', 'pinterest' );
    
    // Construct sharing URL without using any script
    if( in_array( 'twitter', $share_option ) ){
        $shares['twitter']['link'] = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$url;
        $shares['twitter']['icon'] = 'cl-icon-twitter';
    }
    
    if( in_array( 'facebook', $share_option ) ){
        $shares['facebook']['link'] = 'https://www.facebook.com/sharer/sharer.php?u='.$url;
        $shares['facebook']['icon'] = 'cl-icon-facebook-f';
    }
    
    if( in_array( 'google', $share_option ) ){
        $shares['google']['link'] = 'https://plus.google.com/share?url='.$url;
        $shares['google']['icon'] = 'cl-icon-google';
    }
    
    if( in_array( 'whatsapp', $share_option ) ){
        $shares['whatsapp']['link'] = 'whatsapp://send?text='.$title . ' ' . $url;
        $shares['whatsapp']['icon'] = 'cl-icon-whatsapp';
    }
    
    if( in_array( 'linkedin', $share_option ) ){
        $shares['linkedin']['link'] = 'https://www.linkedin.com/shareArticle?mini=true&url='.$url.'&amp;title='.$title;
        $shares['linkedin']['icon'] = 'cl-icon-linkedin';
    }
    
    if( in_array( 'pinterest', $share_option ) ){
        $shares['pinterest']['link'] = 'https://pinterest.com/pin/create/button/?url='.$url.'&amp;media='.$thumbnail[0].'&amp;description='.$title;
        $shares['pinterest']['icon'] = 'cl-icon-pinterest';
    }
    
    
    return apply_filters( 'codeless_share_buttons', $shares, $title, $url, $thumbnail );
}


/**
 * Change default excerpt length
 *
 * @since 1.0.0
 */
function codeless_custom_excerpt_length( $length ) {
	return codeless_get_mod( 'blog_excerpt_length', 40 );
}
add_filter( 'excerpt_length', 'codeless_custom_excerpt_length', 990 );


/**
 * Get first url on content if post format is LINK
 *
 * @since 1.0.0
 */
function codeless_get_permalink( $id ){
    
    $link = get_permalink( $id );
    
    if( get_post_format() == 'link' )
        $link = get_url_in_content( get_the_content() );

    return $link;
    
}


/**
 * Returns fallback for Menu.
 * 
 * @since 1.0.0
 */

if(!function_exists('codeless_default_menu')){
  
    function codeless_default_menu($args){
        
      $current = "";
      if (is_front_page())
        $current = "class='current-menu-item'";
      
      echo "<ul class='menu'>";

        echo "<li $current><a href='".esc_url(home_url())."'>Home</a></li>";
        wp_list_pages('title_li=&sort_column=menu_order&number=2&depth=0');

      echo "</ul>";

    }
}


/**
 * Returns Header Element, used on codeless-customizer-options
 * 
 * @since 1.0.0
 */
if(!function_exists('codeless_load_header_element'))
{

    function codeless_load_header_element($element)
    {
        $output = '';      
        $template = locate_template('includes/codeless_builder/header-elements/'.$element.'.php');
        if(is_file($template)){
          ob_start();
            include( $template );
            $output = ob_get_contents();
            ob_end_clean();
        }
        return $output;
    }
}


/**
 * Basic Pagination Output of theme
 * 
 * @since 1.0.0
 */
function codeless_number_pagination( $query = false, $echo = true ) {
		
	// Get global $query
	if ( ! $query ) {
		global $wp_query;
		$query = $wp_query;
	}

	// Set vars
	$total  = $query->max_num_pages;
	$max    = 999999999;

	// Display pagination
	if ( $total > 1 ) {

		// Get current page
		if ( $current_page = get_query_var( 'paged' ) ) {
			$current_page = $current_page;
		} elseif ( $current_page = get_query_var( 'page' ) ) {
			$current_page = $current_page;
		} else {
			$current_page = 1;
		}

		// Get permalink structure
		if ( get_option( 'permalink_structure' ) ) {
			if ( is_page() ) {
				$format = 'page/%#%/';
			} else {
				$format = '/%#%/';
			}
		} else {
			$format = '&paged=%#%';
		}

		$args = apply_filters( 'codeless_pagination_args', array(
			'base'      => str_replace( $max, '%#%', html_entity_decode( get_pagenum_link( $max ) ) ),
			'format'    => $format,
			'current'   => max( 1, $current_page ),
			'total'     => $total,
			'mid_size'  => 3,
			'type'      => 'list',
			'prev_text' => '<span class="cl-pagination-prev"><i class="cl-icon-arrow-left"></i></span>',
			'next_text' => '<span class="cl-pagination-next"><i class="cl-icon-arrow-right"></i></span>'
		) );

		$align = codeless_get_mod( 'blog_pagination_align', 'left' );

        if( $echo )
            echo '<div class="cl-pagination cl-pagination-align-'. esc_attr( $align ) .'">'. paginate_links( $args ) .'</div>';
        else
            return '<div class="cl-pagination cl-pagination-align-'. esc_attr( $align ) .'">'. paginate_links( $args ) .'</div>';

	}

}


/**
 * Next/Prev Pagination
 *
 * @since 1.0.0
 */
function codeless_nextprev_pagination( $pages = '', $range = 4, $query = false ) {
	$output     = '';
	$showitems  = ($range * 2)+1; 
	global $paged;
	if ( empty( $paged ) ) $paged = 1;
		
	if ( $pages == '' ) {

        if( ! $query ){
		  global $wp_query;
          $query = $wp_query;
        }

		$pages = $query->max_num_pages;
		if ( ! $pages) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {

		$output .= '<div class="cl-pagination-jump">';
			$output .= '<div class="newer-posts">';
				$output .= get_previous_posts_link( '&larr; '. esc_html__( 'Newer Posts', 'folie' ), $query->max_num_pages );
			$output .= '</div>';
			$output .= '<div class="older-posts">';
				$output .= get_next_posts_link( esc_html__( 'Older Posts', 'folie' ) .' &rarr;', $query->max_num_pages );
			$output .= '</div>';
		$output .= '</div>';

		
		return $output;
	}
}

/**
 * Load More Button Pagination Style
 * 
 * @since 1.0.0
 */
function codeless_infinite_scroll( $type = '', $query = false ) {
	$max_num_pages = 0;
    if( $query )
        $max_num_pages = $query->max_num_pages;

	// Output pagination HTML
	$output = '';
	$output .= '<div class="cl-pagination-infinite '. $type .'" data-type="' . esc_attr( $type ) . '" data-end-text="' . esc_html__( 'No more posts to load', 'folie' ) . '" data-msg-text="' . esc_html__( 'Loading Content', 'folie' ) . '">';
		$output .= '<div class="older-posts">';
			$output .= get_next_posts_link( esc_html__( 'Older Posts', 'folie' ) .' &rarr;', $max_num_pages);
		$output .= '</div>';

        $output .= '<div class="cl-infinite-loader hidden"><span class="dot dot1"></span><span class="dot dot2"></span><span class="dot dot3"></span><span class="dot dot4"></span></div>';

		if( $type == 'loadmore' )
		    $output .= '<button id="cl_load_more_btn" class="' . codeless_button_classes() . '">' . esc_html__( 'Load More', 'folie' ) . '</button>';
	$output .= '</div>';

	return $output;

}


/**
 * Add Action for layout Modern on Content
 * 
 * @since 1.0.0
 */
function codeless_layout_modern(){
    if( (int) codeless_is_layout_modern() ){
        echo '<div class="cl-layout-modern-bg"></div>';
    }
}


/**
 * Get Sidebar Name to load for current page
 * 
 * @since 1.0.0
 */
function codeless_get_sidebar_name(){

    $sidebar = 'sidebar-pages';
    if( codeless_is_blog_query() || ( is_single() && get_post_type( codeless_get_post_id() ) == 'post' ) )
        $sidebar = 'sidebar-blog';

    if( codeless_is_shop_page() || ( function_exists('is_product_category') && is_product_category() ) )
        $sidebar = 'woocommerce';

    if( is_page() && is_registered_sidebar( 'sidebar-custom-page-' . codeless_get_post_id() ) )
        $sidebar = 'sidebar-custom-page-' . codeless_get_post_id();

    if( is_archive() ){
        $obj = get_queried_object();
        if( is_object($obj) && isset($obj->term_id) && is_registered_sidebar( 'sidebar-custom-category-' . $obj->term_id ) ){
            $sidebar = 'sidebar-custom-category-' . $obj->term_id;
        }
    }
    
    return $sidebar;
}


/**
 * Convert hexdec color string to rgb(a) string
 * 
 * @since 1.0.0
 */
function codeless_hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
    
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}


/**
 * Get Meta by ID
 * 
 * @since 1.0.0
 * @version 1.0.5
 */
function codeless_get_meta( $meta, $default = '', $postID = '' ){
    /* for online */
    global $codeless_online_mods;
    if( isset($codeless_online_mods[$meta])  && ! is_customize_preview() ){
        return $codeless_online_mods[$meta];
    }

    $id = codeless_get_post_id();
   
    if( $postID != '' )
        $id =  $postID;

    $value = get_post_meta( $id, $meta );
    
    $return = '';

    if( is_array( $value ) && ( count( $value ) == 1 || ( count($value) == 2 && $value[0] == $value[1] )  ) )
        $return = $value[0];
    else
        $return = $value;

    if( is_array( $value ) && empty( $value ) )
        $return = '';
 

    if( $default != '' && ( $return == '' || ! $return ) )
        return $default;
    
    return $return;
}


function codeless_page_background_color( $attr ){

    $bg_color = codeless_get_meta( 'page_bg_color' );
    if( $bg_color != '' )
        $attr[] = 'style="background-color:'.$bg_color.';"';

    return $attr;
}


/**
 * Core function that register a new post type
 * Codeless Builder plugin should be activated to work
 * 
 * @since 1.0.0
 */
function codeless_register_post_type( $args = array() ){

    if( ! is_array( $args ) || empty( $args ) || ! class_exists( 'Cl_Register_Post_Type' ) )
        return false;

    new Cl_Register_Post_Type( $args );

}



 /**
  * Core function for retrieve all terms for a custom taxonomy
  *
  * @since 1.0.0
  */
function codeless_get_terms( $term, $default_choice = false ){ 
    $return = array();
    if( $term == 'post' ){
        $categories = get_categories( array(
            'orderby' => 'name',
            'parent'  => 0
        ) );
 
        foreach ( $categories as $category ) {
            $return[ $category->term_id ] = $category->name;
        }
    }
    $terms = get_terms( $term );

    if( $default_choice )
        $return['all'] = esc_attr__( 'All', 'folie' );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $return[ $term->slug ] = $term->name; 
        }
    }

    return $return;
}


 /**
  * Core function for retrieve all posts for a custom taxonomy
  *
  * @since 1.0.0
  */
function codeless_get_items_by_term( $term ){ 
    $return = array();
    
    $posts_array = get_posts(
        array(
            'posts_per_page' => -1,
            'post_type' => $term,
        )
    );
    if( ! empty( $posts_array ) && ! is_wp_error( $posts_array )  ){
        $return[ 'none' ] = 'None';
        foreach ( $posts_array as $post ) {
            $return[ $post->ID ] = $post->post_title; 
        }
    }

    return $return; 
}


 /**
  * Core function for retrieve get option value from element
  *
  * @since 1.0.0
  */
function codeless_get_from_element( $id, $default = '' ){
    global $cl_from_element;
    if( isset($cl_from_element[$id]) )
        return $cl_from_element[$id];
    else
        return $default;
}


/**
 * List of socials to use on Team
 * @since 1.0.0
 */
function codeless_get_team_social_list(){
    $list = array(
        array( 'id' => 'twitter', 'icon' => 'cl-icon-twitter' ),
        array( 'id' => 'facebook', 'icon' => 'cl-icon-facebook-f' ),
        array( 'id' => 'linkedin', 'icon' => 'cl-icon-linkedin' ),
        array( 'id' => 'whatsapp', 'icon' => 'cl-icon-whatsapp' ),
        array( 'id' => 'pinterest', 'icon' => 'cl-icon-pinterest' ),
        array( 'id' => 'google', 'icon' => 'cl-icon-google' ),
    );

    return apply_filters( 'codeless_team_social_list', $list );
}


/**
 * Strip Gallery Shortcode from Content
 * @since 1.0.0
 */
function codeless_strip_shortcode_gallery( $content ) {
    preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if( false !== $pos ) {
                    return substr_replace( $content, '', $pos, strlen( $shortcode[0] ) );
                }
            }
        }
    }

    return $content;
}


/**
 * Print list of Social for Team ID
 * @since 1.0.0
 */
function codeless_team_socials( ){
    $list = codeless_get_team_social_list();
    $output = '';
    if( empty($list) )
        return;
 
    foreach($list as $social){
        $link = codeless_get_meta( $social['id'] . '_link', '', get_the_ID());

        if( $link != '' ){
            $output .= '<a href="'.esc_url( $link ).'"><i class="'.esc_attr( $social['icon'] ).'"></i></a>';
        }
    }

    
    return $output;
}


/**
 * Creative Search HTML hooked
 * @since 1.0.0
 */
function codeless_creative_search(){
    ?>
    <svg class="hidden">
            <defs>
                <symbol id="icon-cross" viewBox="0 0 24 24">
                    
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                </symbol>
            </defs>
    </svg>
    <div class="creative-search">
            <button id="btn-search-close" class="btn btn--search-close" aria-label="Close search form"><svg class="icon icon--cross"><use xlink:href="#icon-cross"></use></svg></button>
            <div class="search__inner search__inner--up">
                <form class="search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input class="search__input" name="s" type="search" placeholder="Search" autocomplete="off" spellcheck="false" />
                    <span class="search__info"><?php esc_html_e( 'Hit enter to search or ESC to close', 'folie' ) ?></span>
                </form>
            </div>
            <div class="search__inner search__inner--down light-text">
                <div class="search__related">

                    <div class="search__suggestion">
                        <?php if( is_active_sidebar( 'search-dynamic' ) ) dynamic_sidebar( 'search-dynamic' ); ?>
                    </div>
                    <div class="search__suggestion">
                        <h3><?php esc_attr_e('May We Suggest?', 'folie' ) ?></h3>
                        <?php echo codeless_all_tags_html() ?>
                    </div>
                    
                </div>
            </div>
    </div><!-- /search -->
    <?php
}


/**
 * Return HTMl of all tags with appropiate link
 * @since 1.0.0
 */
function codeless_all_tags_html(){
    $tags = get_tags();
    $html = '<div class="post_tags">';
    foreach ( $tags as $tag ) {
        $tag_link = get_tag_link( $tag->term_id );
                
        $html .= " <a href='". esc_url($tag_link). "' title='". esc_attr( $tag->name )." Tag' class='".esc_attr( $tag->slug )."'>";
        $html .= "#". esc_attr( $tag->name )."</a>";
    }
    $html .= '</div>';
    return $html;
}


/**
 * Generate an image HTML tag from thumnail ID, size, lazyload
 * If no thumbnail id, a placeholder will return
 * @since 1.0.0
 */
function codeless_generate_image( $id, $size, $lazyload = false ){
    $attr = array();

    if( $lazyload ){
        $attr['class'] = 'lazyload';
        $attr['data-original'] = codeless_get_attachment_image_src( $id, $size );
    }



    if( $id != 0 )
        return wp_get_attachment_image($id, $size, false, $attr );
}


/**
 * Replace post thumbnail empty html with a placeholder image
 *
 * @since 1.0.0
 */
function codeless_the_post_thumbnail_placeholder($html, $post_id, $post_thumbnail_id){
    if( $html == '' && ! $post_thumbnail_id )
        $html  = '<img class="placeholder-img" src="' . CODELESS_BASE_URL.'img/placeholder-img.png' . '" alt="" />';

    return $html;
}
add_filter( 'post_thumbnail_html', 'codeless_the_post_thumbnail_placeholder', 9, 3 );



/**
 * Return a list of all image sizes
 *
 * @since 1.0.0
 */
function codeless_get_additional_image_sizes(){
    $add = codeless_wp_get_additional_image_sizes();
    $array = array('theme_default' => 'default', 'full' => 'full');

    foreach($add as $size => $val){
        $array[$size] = $size . ' - ' . $val['width'] . 'x' . $val['height'];
    }

    return $array;
}


/**
 * Check function for WP versions lower than WP 4.7
 *
 * @since 1.0.3
 */
function codeless_wp_get_additional_image_sizes(){
    if( function_exists( 'wp_get_additional_image_sizes' ) )
        return wp_get_additional_image_sizes();
    
    return array();
}


/**
 * Check if is a shop page
 * @since 1.0.0
 */
function codeless_is_shop_page(){
    if( class_exists( 'woocommerce' ) && is_shop() )
        return true;
    return false;
}


/**
 * return Page Parents
 * @since 1.0.0
 */
function codeless_page_parents() {
    global $post, $wp_query, $wpdb;
    
    if( (int) codeless_get_post_id() != 0 ){
      
        $post = $wp_query->post;

        if( is_object( $post ) ){

            $parent_array = array();
            $current_page = $post->ID;
            $parent = 1;

            while( $parent ) {

                $sql = $wpdb->prepare("SELECT ID, post_parent FROM $wpdb->posts WHERE ID = %d; ", array($current_page) );
                $page_query = $wpdb->get_row($sql);
                $parent = $current_page = $page_query->post_parent;
                if( $parent )
                    $parent_array[] = $page_query->post_parent;
                
            }

            return $parent_array;

        }
      
    }
    
}

/**
 * List Revolution Slides
 * @since 1.0.0
 */
function codeless_get_rev_slides(){

    if ( class_exists( 'RevSlider' ) ) {
        $slider = new RevSlider();
            $arrSliders = $slider->getArrSliders();

            $revsliders = array();
            if ( $arrSliders ) {
                foreach ( $arrSliders as $slider ) {
                    /** @var $slider RevSlider */
                    $revsliders[ $slider->getAlias() ] = $slider->getTitle() ;
                    $revsliders[ 0 ] = 'none';
                }
            } else {
                $revsliders[ 0 ] = 'none';
            }
        return (array) $revsliders;    
    }        
}


/**
 * List LayerSlider Slides
 * @since 1.0.0
 */
function codeless_get_layer_slides(){

    if( class_exists( 'LS_Sliders' )){
            $ls = LS_Sliders::find( array(
                'limit' => 999,
                'order' => 'ASC',
            ) );
            $layer_sliders = array();
            if ( ! empty( $ls ) ) {
                foreach ( $ls as $slider ) {
                    $layer_sliders[  $slider['id'] ] =  $slider['name'];
                }
            } else {
                $layer_sliders[ 0 ] = 'none';
            }
         return (array) $layer_sliders;   
    }

}


/**
 * List Google Fonts
 * @since 1.0.0
 */
function codeless_get_google_fonts(){
    $return = array('theme_default' => 'Theme Default');

    $google_fonts   = Kirki_Fonts::get_google_fonts();
    $standard_fonts = Kirki_Fonts::get_standard_fonts();

    $google_fonts = array_combine(array_keys($google_fonts), array_keys($google_fonts));
    $standard_fonts = array_combine(array_keys($standard_fonts), array_keys($standard_fonts));
    $return = array_merge($return, $google_fonts, $standard_fonts);

    return $return;
}  


/**
 * Add bordered style layout
 * @since 1.0.0
 */
function codeless_layout_bordered(){
    if( ! codeless_get_mod( 'layout_bordered', false ) )
        return;
    ?>
    <div class="cl-layout-border-container">
        <div class="top"></div>
        <div class="bottom"></div>
        <div class="left"></div>
        <div class="right"></div>
    </div><!-- .cl-layout-border-container -->
    <?php
}  


/**
 * in Future to update
 * @since 1.0.0
 */
function codeless_complex_esc( $data ){
    return $data;
}


/**
 * Generate Palettes for Colorpicker
 * @since 1.0.0
 */
function codeless_generate_palettes(){
    return array(
        codeless_get_mod( 'primary_color' ),
        codeless_get_mod( 'border_accent_color' ),
        codeless_get_mod( 'labels_accent_color' ),
        codeless_get_mod( 'highlight_light_color' ),
        codeless_get_mod( 'other_area_links' ),
        codeless_get_mod( 'h1_dark_color' ),
        codeless_get_mod( 'h1_light_color' )
    );
}


/**
 * Load extra template parts for codeless-builder
 * @since 1.0.5
 */
function codeless_get_extra_template($template){
    include( get_template_directory() . '/template-parts/extra/' . $template . '.php' );
}


/**
 * Get a list of all registered sidebars
 * @since 1.0.5
 */
function codeless_get_registered_sidebars(){
    global $wp_registered_sidebars;
    $array = get_option( 'sidebars_widgets' );
    if( empty($array) )
        return array();

    $sidebars = array();

    foreach($array as $key => $val){
        if( $key == 'wp_inactive_widgets' )
            continue;
        if( isset( $wp_registered_sidebars[$key] ) ){

            $sidebars[$key] = $wp_registered_sidebars[$key]['name'];
        }
    }

    return $sidebars;
}


/**
 * Get a list of all custom sidebars per page
 * @since 1.0.5
 */
function codeless_get_custom_sidebar_pages(){
    $pages = codeless_get_mod( 'codeless_custom_sidebars_pages' );
    $return = array();

    if( ! empty( $pages ) ){

            foreach($pages as $page)
                $return[(int)$page] = get_the_title( (int)$page );
        
        return $return;
    }

    return array();

}


/**
 * Get a list of all custom sidebars per categories
 * @since 1.0.5
 */
function codeless_get_custom_sidebar_categories(){
    $categories = codeless_get_mod( 'codeless_custom_sidebars_categories' );
    $return = array();

    if( ! empty( $categories ) ){

            foreach($categories as $category){

                $category_name = get_the_category_by_ID( (int)$category );
                $return[(int)$category] = $category_name;
            }
        
        return $return;
    }

    return array();

}


/**
 * Returns the list of css html tags for each option
 * 
 * @since 1.0.0
 * @version 1.0.7
 */
function codeless_dynamic_css_register_tags( $option = false, $suboption = false ){
    $data = array();
    $tag_list = '';
    
    // Primary Color
    $data['primary_color'] = array();
    // Font Color
    $data['primary_color']['color'] = array(
        '.header_container:not(.cl-header-light) nav > ul > li a:hover',
        
        'body:not(.cl-one-page) .header_container:not(.cl-header-light) nav > ul > li.current-menu-item > a',
        'body.cl-one-page .header_container:not(.cl-header-light) nav > ul > li.current-menu-item-onepage > a',

        'aside .widget ul li a:hover',
        'aside .widget_rss cite',
        'h1 > a:hover, h2 > a:hover, h3 > a:hover, h4 > a:hover, h5 > a:hover, h6 > a:hover',
        '.cl-pagination a:hover',
        'mark.highlight',
        '#blog-entries article .entry-readmore:hover',
        '.cl_team.style-simple .team-item .team-position',
        '.cl_team.style-photo .team-item .team-position',
        '.cl_toggles.style-simple .cl_toggle .title[aria-expanded="true"]',
        '.cl_counter',
        '.single-post .nav-links > div a .nav-title:hover',
        '.shop-products .product_item .cl-price-button-switch a',
        '.woocommerce div.product p.price, .woocommerce div.product span.price',
        '.single-post article .entry-content > a',
        '.cl_tabs.style-simple .cl-nav-tabs li.active a'

    );
    // Background Color
    $data['primary_color']['background_color'] = array(
        '.header_container.menu_style-border_effect #navigation nav > ul > li > a:hover:after', 
        '.header_container.menu_style-border_effect #navigation nav > ul > li.current-menu-item > a:after', 
        'article.format-gallery .swiper-pagination-bullet-active',
        '.cl-pagination-jump > div a:hover',
        '.shop-products .product_item .onsale, .cl-product-info .onsale',
        '.woocommerce .widget_price_filter .ui-slider .ui-slider-range',
        '.widget_product_categories ul li.current-cat > a:before',
        '.cl-header-light .tool .tool-link .cart-total',
        '.search__inner--down',
        '.cl_blog .news-entries article:hover .post-categories li',
        '.header_container.menu_style-border_effect_two #navigation nav > ul > li > a:hover:after, .header_container.menu_style-border_effect_two #navigation nav > ul > li.current-menu-item > a:after'
    );

    $data['primary_color']['border-color'] = array(
        '.woocommerce div.product .woocommerce-tabs ul.tabs li.active',
       
    );
    
    
    // Border Accent Color
    $data['border_accent_color']['border-color'] = array(
        'article.sticky',
        'aside .widget',
        'aside .widget_categories select',
        'aside .widget_archive select',
        'aside .widget_search input[type="search"]',
        'input:focus,textarea:focus,select:focus, button:focus',
        '#blog-entries .default-style .entry-tools',
        '#blog-entries .default-style .entry-tools .entry-tool-single',
        '.grid-entries article .grid-holder .grid-holder-inner',
        '#blog-entries .grid-style .grid-holder .entry-tools-wrapper',
        '.masonry-entries article .grid-holder .grid-holder-inner',
        '.portfolio-style-classic .portfolio_item .entry-wrapper-content',
        '.portfolio-style-classic_excerpt .portfolio_item .entry-wrapper-content',
        '.cl_contact_form7.style-simple input:not(.cl-btn), .cl_contact_form7.style-simple  textarea , .cl_contact_form7.style-simple  select',
        '.cl_toggles.style-simple .cl_toggle > .title',
        '.single-post .entry-single-tags a',
        '.single-post .post-navigation',
        'article.comment',
        '#respond.comment-respond textarea',
        '#respond.comment-respond .comment-form-author input, #respond.comment-respond .comment-form-email input, #respond.comment-respond .comment-form-url input',
        'aside .widget_product_search input[type="search"]',
        '.cl-product-info .product_meta',
        '.single-post .cl-layout-fullwidth .cl-comments',
        '.post-password-form input[type="password"]'

    );
    
    // Labels accent color
    $data['labels_accent_color'] = array(
        'article .entry-meta-single .entry-meta-prepend',
        'article.format-quote .entry-content i',
        'article.format-quote .entry-content .quote-entry-author',
        'aside .widget_categories ul li',
        'aside .widget_archive ul li',
        'aside .widget_recent_entries .post-date',
        'aside .widget_recent_comments .recentcomments',
        'aside .widget_rss .rss-date',
        'article .entry-tools i',
        'article.minimal-style .entry-meta-single a',
        '.cl_contact_form7.style-simple label',
        '#respond.comment-respond .comment-form-author input, #respond.comment-respond .comment-form-email input, #respond.comment-respond .comment-form-url input, #respond.comment-respond .comment-form-comment textarea',
        '#respond.comment-respond p > label',
        'article.comment .comment-reply-link, article.comment .comment-edit-link',
        '.woocommerce-result-count',
        '.widget_product_categories ul li .count',
        '.cl-product-info .product_meta a, .cl-product-info .product_meta span',
        '.woocommerce div.product .woocommerce-tabs ul.tabs li a',
        '.widget_twitter li .content .date, .widget_most_popular li .content .date'

    );
    
    
    // Highligh color light
    $data['highlight_light_color']['background-color'] = array(
        '.cl-pagination span.current',
        '.cl-pagination-jump > div > a',
        '.cl_progress_bar .progress',
        '.single-post .entry-single-tools .single-share-buttons a',
        '.btn-priority_secondary',
        '.cl-filters.cl-filter-fullwidth.cl-filter-color-light'


    );
    
    // Highlight color dark
    $data['highlight_dark_color']['background-color'] = array(
        'article .entry-tools .entry-tool-share .share-buttons',
        '#cl_load_more_btn',
        '.cl-filters.cl-filter-fullwidth.cl-filter-color-dark',
        '.cl-pagination-jump > div > a:hover',
        '.cl-mobile-menu-button span, .cl-hamburger-menu span',
        '.single-post .entry-single-tags a:hover',
        '.single-post .entry-single-tools .single-share-buttons a:hover',
        '.shop-products .product_item .cl-learnmore'
        
    );

    $data['highlight_dark_color']['color'] = array(
        'article .entry-tools .entry-tool-likes .item-liked i',
        '.btn-priority_secondary'
    );

    $data['other_area_links']['color'] = array(
        'article .entry-tools .codeless-count',
        'article .entry-meta-single a',
        'article.format-quote .entry-content .quote-entry-content p, article.format-quote .entry-content .quote-entry-content a',
        'aside .widget ul li a',
        '.cl-pagination a',
        '.cl-pagination span.current',
        '.cl-pagination-jump a',
        '.cl_progress_bar .labels'
    );
    
    
    //Logo Font
    $data['logo_font'] = array(
        '.cl-h-cl_header_logo .logo_font'    
    );
    
    // Headings Typography
    $data['headings_typo'] = array(
        'h1,h2,h3,h4,h5,h6',
        'article.default-style.format-quote .entry-content',
        'aside .widget_calendar caption',
        '.cl_page_header .title_part .subtitle',
        '.cl_team.style-simple .team-item .team-position',
        '.cl_team.style-photo .team-item .team-position',
        '.single_blog_style-modern .cl_page_header .entry-meta-single, .single_blog_style-custom .cl_page_header .entry-meta-single',
        '.woocommerce-result-count',
        '.select2-container--default .select2-selection--single .select2-selection__rendered',
        '.select2-results__option',
        '.shop-products .product_item .onsale, .cl-product-info .onsale',
        '.woocommerce div.product .woocommerce-tabs ul.tabs li a'
    );

    $data['blog_entry_readmore'] = array(
        '#blog-entries article .entry-readmore'
    );
    
    // Body Typography
    $data['body_typo'] = array(
        'html',
        'body',
        '.light-text .breadcrumbss .page_parents'
    ); 
    
    // Heading Menu Typography
    $data['menu_font'] = array(
        '.header_container nav ul li a'  
    );
    
    // Widgets Typography
    $data['widgets_title_typography'] = array(
        'aside .widget-title',
        'footer#colophon .widget-title'
    );
    
    // Blog Entry Typography
    $data['blog_entry_title'] = array(
        'article.hentry h2.entry-title'
    );
    
    // Single Blog Typography
    $data['single_blog_title'] = array(
        'article.post h1.entry-title'
    );
    
    
    // Header Menu Border Style
    $data['header_menu_border_style'] = array(
        '.header_container.menu_style-border_top.menu-full-style nav > ul > li', 
        '.header_container.menu_style-border_bottom.menu-full-style nav > ul > li', 
        '.header_container.menu_style-border_left.menu-full-style nav > ul > li', 
        '.header_container.menu_style-border_right.menu-text-style nav > ul > li > a', 
        '.header_container.menu_style-border_top.menu-text-style nav > ul > li > a', 
        '.header_container.menu_style-border_bottom.menu-text-style nav > ul > li > a', 
        '.header_container.menu_style-border_left.menu-text-style nav > ul > li > a', 
        '.header_container.menu_style-border_right.menu-text-style nav > ul > li > a'
    );

    // Blog Image Overlay Color
    $data['blog_overlay_color'] = array(
        'article .entry-overlay-color .entry-overlay',
        'article .entry-overlay-zoom_color .entry-overlay'
    );
    
    
    // Footer Border Color
    $data['footer_border_color'] = array(
        'footer#colophon .widget',
        'footer#colophon input, footer#colophon select, footer#colophon textarea'
    );

    $data['copyright_border_color'] = array(
        '#copyright .widget',
        '#copyright input, #copyright select, #copyright textarea'
    );
    
    // Footer Dark BG Color
    $data['footer_dark_bg_color'] = array(
        'footer#colophon input[type="text"], footer#colophon select, footer#colophon textarea, footer#colophon input[type="email"]',
        'footer#colophon .social_widget .social-icons-widget.circle li',
        'footer#colophon table tbody td'
        
    );

    $data['footer_button_bg_color'] = array(
        'footer#colophon input[type="submit"]'
    );



    // Header menu styles
    $data['header_menu_border_color'] = array(
        '.header_container.menu_style-border_top.menu-full-style #navigation nav > ul > li:hover,
         .header_container.menu_style-border_top.menu-full-style #navigation nav > ul > li.current-menu-item,
         .header_container.menu_style-border_bottom.menu-full-style #navigation nav > ul > li:hover, 
         .header_container.menu_style-border_bottom.menu-full-style #navigation nav > ul > li.current-menu-item,
         .header_container.menu_style-border_left.menu-full-style #navigation nav > ul > li:hover, 
         .header_container.menu_style-border_left.menu-full-style #navigation nav > ul > li.current-menu-item,
         .header_container.menu_style-border_right.menu-full-style #navigation nav > ul > li:hover, 
         .header_container.menu_style-border_right.menu-full-style #navigation nav > ul > li.current-menu-item',

        '.header_container.menu_style-border_top.menu-text-style #navigation nav > ul > li > a:hover, 
         .header_container.menu_style-border_top.menu-text-style #navigation nav > ul > li.current-menu-item > a,
         .header_container.menu_style-border_bottom.menu-text-style #navigation nav > ul > li > a:hover, 
         .header_container.menu_style-border_bottom.menu-text-style #navigation nav > ul > li.current-menu-item > a,
         .header_container.menu_style-border_left.menu-text-style #navigation nav > ul > li > a:hover, 
         .header_container.menu_style-border_left.menu-text-style #navigation nav > ul > li.current-menu-item > a,
         .header_container.menu_style-border_right.menu-text-style #navigation nav > ul > li > a:hover, 
         .header_container.menu_style-border_right.menu-text-style #navigation nav > ul > li.current-menu-item > a'
    );

    $data['header_menu_background_color'] = array(
        '.header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li:hover, 
         .header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li.current-menu-item, 
         .header_container.menu_style-background_color.menu-text-style #navigation nav > ul > li > a:hover, 
         .header_container.menu_style-background_color.menu-text-style #navigation nav > ul > li.current-menu-item > a'
    );

    $data['header_menu_font_color'] = array(
        '.header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li:hover, 
         .header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li.current-menu-item, 
         .header_container.menu_style-background_color.menu-text-style #navigation nav > ul > li > a:hover, 
         .header_container.menu_style-background_color.menu-text-style #navigation nav > ul > li.current-menu-item > a',

        '.header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li:hover a,
        .header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li.current-menu-item > a'
    );


    $data['header_top_typography'] = array(
        '.header_container .top_nav.header-row'
    );
    
    
    $data = apply_filters( 'codeless_dynamic_css_register_tags', $data );
    
    if( ! $option ){
        return $data;
    }
        
    
    if( ! $suboption && isset( $data[ $option ] ) && ! is_array( $data[ $option ][0] ) )
        return ( ! empty( $data[ $option ] ) ? implode( ", ", $data[ $option ] ) : ' ' );
    
    if( isset( $data[ $option ][ $suboption ] ) )
        return ( ! empty( $data[ $option ][ $suboption ] ) ? implode( ", ", $data[ $option ][ $suboption ] ) : ' ' );
}


?>