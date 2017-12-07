<?php

/* Remove Page Title */
add_filter( 'woocommerce_show_page_title', function(){  return is_product_category(); } );

/* Change Position of Page Content (from Builder) */
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description' );
add_action( 'codeless_hook_content_begin', 'codeless_woocommerce_product_archive_description' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb',                 20, 0 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper',     10 );
remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_shop_loop', 'codeless_woocommerce_before_shop_loop_before', 10 );
add_action( 'woocommerce_before_shop_loop', 'codeless_woocommerce_before_shop_loop_after', 40 );

add_filter( 'loop_shop_columns', 'codeless_woocommerce_loop_shop_columns' );

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'woocommerce_product_additional_information_heading', '__return_false');
add_filter( 'woocommerce_product_description_heading', '__return_false');

// Shop Products: Extra Classes
add_filter( 'codeless_extra_classes_shop_products', 'codeless_extra_classes_shop_products' );
// Shop Products: Extra Attributes
add_filter( 'codeless_extra_attr_shop_products', 'codeless_extra_attr_shop_products' );

// Product Item: Extra Classes
add_filter( 'codeless_extra_classes_product_item', 'codeless_extra_classes_product_item' );
// Product Item: Extra Attributes
add_filter( 'codeless_extra_attr_product_item', 'codeless_extra_attr_product_item' );


add_action( 'woocommerce_before_shop_loop_item', 'codeless_woocommerce_before_shop_loop_item', 1 );
add_action( 'woocommerce_after_shop_loop_item', 'codeless_woocommerce_after_shop_loop_item', 9999 );


add_action( 'woocommerce_before_shop_loop', 'codeless_woocommerce_item_counter' );
add_action( 'woocommerce_before_shop_loop_item', 'codeless_woocommerce_item_counter_plus' );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
add_action( 'woocommerce_shop_loop_item_title', 'codeless_woocommerce_template_loop_product_title' );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );  
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close' );

add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 6 );

add_action( 'woocommerce_after_shop_loop_item_title', 'codeless_woo_switch_price_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 15 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 20 );
add_action( 'woocommerce_after_shop_loop_item_title', 'codeless_woo_switch_price_add_to_cart_close', 25 );



add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woocommerce_thumb_wrapper', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woocommerce_add_second_image', 11 );
add_action( 'woocommerce_before_shop_loop_item_title', 'codeless_woocommerce_thumb_wrapper_end', 999 );


add_filter( 'loop_shop_per_page', function(){ return 8; }, 20 );



// function that generate woocommerce plugin content
function codeless_woocommerce_content(){
	woocommerce_content();
}


/* Add Wrapper for result-count and orderby */
function codeless_woocommerce_before_shop_loop_before(){
	?>
		<div class="cl-woocommerce-results-title">
	<?php
}

function codeless_woocommerce_before_shop_loop_after(){
	?>
		</div><!-- .cl-woocommerce-results-title -->
	<?php
}


/**
 * Default loop columns on product archives
 *
 * @return integer products per row
 * @since  1.0.0
 */
function codeless_woocommerce_loop_shop_columns(){

	return apply_filters( 'codeless_loop_shop_columns', codeless_get_mod( 'shop_columns', 3 ) ); // 3 products per row

}



/**
 * Manage Classes of Shop Products
 * @since 1.0.0
 */
function codeless_extra_classes_shop_products( $classes ){
	global $woocommerce_loop;
    /*$classes[] =  'portfolio-layout-' . codeless_portfolio_layout();
    $classes[] =  'portfolio-style-' . codeless_portfolio_style();*/
    $classes[] = 'shop-products';
    $classes[] = 'grid-entries';

    if( codeless_get_mod( 'shop_animation', 'bottom-t-top' ) != 'none' )
        $classes[] = 'animated-entries';

    if( codeless_get_mod( 'shop_filters', 'disabled' ) != 'disabled' )
        $classes[] = 'filterable-entries';

    if( codeless_get_mod( 'shop_carousel', 0 ) || ( isset( $woocommerce_loop['name'] ) && $woocommerce_loop['name'] == 'related' )  )
    	$classes[] = 'owl-carousel cl-carousel owl-theme';
    
    return $classes;
}



/**
 * Manage Attributes of Shop Products
 * @since 1.0.0
 */
function codeless_extra_attr_shop_products( $attr ){
    global $woocommerce_loop;
    $attr[] = 'data-grid-cols="'. codeless_woocommerce_loop_shop_columns() .'"';

    if( codeless_get_mod( 'shop_carousel', 0 ) || ( isset($woocommerce_loop['name']) && $woocommerce_loop['name'] == 'related' ) ){
	    $attr[] = 'data-carousel-nav="'.codeless_get_mod( 'shop_carousel_nav', false ).'"';
	    $attr[] = 'data-carousel-dots="'. ( $woocommerce_loop['name'] == 'related' ? true : codeless_get_mod( 'shop_carousel_dots', false ) ).'"';
	}
	
    return $attr;
}


/**
 * Shop Product Item 
 * Style, Layout, Animation
 * @since 1.0.0
 */
function codeless_extra_classes_product_item( $classes ){
    
    $classes[] = 'product_item';


    // Add animation style class
    if( codeless_get_mod( 'shop_animation', 'bottom-t-top' ) != 'none' ){
        $classes[] = 'animate_on_visible';
        $classes[] = codeless_get_mod( 'shop_animation', 'bottom-t-top' );
    }
    
    // Check if isotope is active and add necessary class
    $classes[] = 'cl-isotope-item';
    
    // Add large-featured or wide or default class for items that should look larger than others to create the masonry
    /*if( codeless_portfolio_layout() == 'masonry' ){
        $classes[] = 'cl-msn-size-'. codeless_get_meta( 'portfolio_masonry_layout', 'default', get_the_ID() );
    }*/

    // Portfolio Boxed
   /* if( codeless_get_meta( 'portfolio_boxed', 0 ) )
        $classes[] = 'portfolio_boxed';*/

    
    return $classes;
}


/**
 * Portfolio Item Attr
 * Item Animation
 * @since 1.0.0
 */
function codeless_extra_attr_product_item( $attr ){
    if( codeless_get_mod( 'shop_animation', 'bottom-t-top' ) != 'none' )
        $attr[] = 'data-speed="300"';
    
    $default_delay = 300;
    $counter = 1;

    if( codeless_loop_counter() != 0  ){

        $counter = codeless_loop_counter();

        if( $counter > codeless_woocommerce_loop_shop_columns() )
        	$counter = $counter % codeless_woocommerce_loop_shop_columns();

        if( $counter == 0 )
            $counter = codeless_woocommerce_loop_shop_columns();

        $default_delay = 100;
    }
    
    if( codeless_get_mod( 'shop_animation', 'bottom-t-top' ) != 'none' )
        $attr[] = 'data-delay="'. ( $default_delay * $counter ) .'"';
        
    return $attr;
}

/* Add Inner Wrapper on Product Item */
function codeless_woocommerce_before_shop_loop_item(){
	?>
		<div class="inner-wrapper" style="padding: <?php echo codeless_get_mod( 'shop_item_distance', 15 ); ?>px;">
	<?php
}
function codeless_woocommerce_after_shop_loop_item(){
	?>
		</div><!-- .inner-wrapper -->
	<?php
}


function codeless_woocommerce_item_counter(){
	$i = 1;
    codeless_loop_counter($i);
}

function codeless_woocommerce_item_counter_plus(){
	$i = codeless_loop_counter();
    codeless_loop_counter( ++$i );
}

function codeless_woocommerce_template_loop_product_title() {
	echo '<h3 class="'.codeless_get_mod( 'shop_item_heading', 'h4' ).' custom_font">' . get_the_title() . '</h3>';
}


function codeless_woo_switch_price_add_to_cart(){
	?>

		<div class="cl-price-button-switch">

	<?php
}


function codeless_woo_switch_price_add_to_cart_close(){
	?>

		</div><!-- .cl-price-button-switch -->

	<?php
}

function codeless_woocommerce_thumb_wrapper(){
	
	global $product;
	$next_id = 0;

	$ids = $product->get_gallery_image_ids();
	if( !empty( $ids ) ){
		$i = array_slice($ids, 0, 1);
		$next_id = (int) array_shift($i) ;
	}
	$extra_class = '';
	if( $next_id != 0 ){
		$extra_class = 'with_two_img';
	}

	?>
		<div class="cl-thumb-wrapper <?php echo esc_attr( $extra_class ) ?>">
			<div class="overlay"></div>
	<?php
}

function codeless_woocommerce_thumb_wrapper_end(){
	?>
			<span class="cl-learnmore"><?php esc_attr_e( 'View Details', 'folie' ) ?><i class="cl-icon-arrow-right2"></i></span>
		</div><!-- .cl-thumb-wrapper -->
	<?php
}


function codeless_woocommerce_add_second_image(){
	global $product;
	$next_id = 0;

	$ids = $product->get_gallery_image_ids();

	if( !empty( $ids ) ){
		$i = array_slice($ids, 0, 1);
		$next_id = (int) array_shift($i) ;
	}

	if( $next_id != 0 ){
		$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' );

		echo wp_get_attachment_image( $next_id, $image_size, '', array( "class" => "second-img" ) );

	}


	?>

	<?php
}


/**
 * Used only for shop pagination
 * Use conditionals to get the style of pagination
 * 
 * @since 1.0.0
 */
function codeless_woocommerce_pagination(){
    

    global $wp_query;

    $pages = $wp_query->max_num_pages;

    if ( ! $pages) {
        $pages = 1;
    }

    if ( 1 == $pages )
        return false;

    echo '<div class="cl-shop-pagination" data-container-id="shop-entries">';
    
    $pagination_style = codeless_get_mod( 'shop_pagination_style', 'numbers' );

    if ( $pagination_style == 'infinite_scroll' ) {
        echo codeless_infinite_scroll();
    } elseif ( $pagination_style == 'next_prev' ) {
        echo codeless_nextprev_pagination();
    } elseif ( $pagination_style == 'load_more' ){
        echo codeless_infinite_scroll('loadmore');
    }else {
        codeless_number_pagination();
    }
    
    echo '</div>';
}


	/**
	 * Show a shop page description on product archives.
	 *
	 * @subpackage	Archives
	 */
function codeless_woocommerce_product_archive_description() {
		if ( is_post_type_archive( 'product' ) ) {
			$shop_page   = get_post( wc_get_page_id( 'shop' ) );
			setup_postdata($shop_page);
			if ( $shop_page ) {
				$description = $shop_page->post_content;
				$description = apply_filters('the_content', apply_filters( 'codeless_the_content' , $description ) );
				if ( $description ) {
					echo '<div class="page-description">' . $description . '</div>';
				}
			}
			wp_reset_postdata();
		}
}


function codeless_woocommerce_element(){

	if( is_shop() )
		return;

	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_before_shop_loop', 'codeless_woocommerce_before_shop_loop_before', 10 );
	remove_action( 'woocommerce_before_shop_loop', 'codeless_woocommerce_before_shop_loop_after', 40 );
}

codeless_woocommerce_element();



add_action( 'woocommerce_before_single_product_summary', 'codeless_woocommerce_single_images_wrapper', 5 );
add_action( 'woocommerce_before_single_product_summary', 'codeless_woocommerce_single_images_wrapper_end', 25 );

function codeless_woocommerce_single_images_wrapper(){
	?>
	<div class="cl-product-info">
		<div class="cl-images-wrapper">
	<?php
}

function codeless_woocommerce_single_images_wrapper_end(){
	?>
		</div><!-- cl-images-wrapper -->
	<?php
}


add_action( 'woocommerce_after_single_product_summary', 'codeless_woocommerce_single_wrapper_end', 1 );
function codeless_woocommerce_single_wrapper_end(){
	?>
	</div><!-- .cl-product-info -->
	<?php
}

add_action( 'woocommerce_share', 'codeless_woocommerce_shares' );
function codeless_woocommerce_shares(){
	echo '<div class="cl-woo-share">';
    
    $shares = codeless_share_buttons();
    
    if( !empty( $shares ) ){
        foreach( $shares as $social_id => $data ){
            echo '<a href="' . esc_url( $data['link'] ) . '" title="Social Share ' . esc_attr( $social_id ) . '" target="_blank"><i class="' . esc_attr( $data['icon'] ) .'"></i></a>';
        }
    }
    echo '</div>';

}


if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'codeless_cart_update_count' );
} else {
	add_filter( 'add_to_cart_fragments', 'codeless_cart_update_count' );
}

function codeless_cart_update_count( $fragments ){
	ob_start();
	echo '<span class="cl-cart-total-fragment cart-total">' . WC()->cart->get_cart_contents_count() . '</span>';

	$fragments['.cl-cart-total-fragment'] = ob_get_clean();

	return $fragments;
}

?>