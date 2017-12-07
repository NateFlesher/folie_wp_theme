<?php 
    
    extract( $element['params'] ); 

    global $cl_from_element;
    $cl_from_element['search_type'] = $search_type;

?>


<div class="extra_tools_wrapper">
    

    <?php if( ( int ) $search_button ): ?>
       
        <div class="search tool search-style-<?php echo esc_attr($search_type) ?>">

            <a href="#" id="header_search_btn" class="tool-link"><i class="cl-icon-search"></i></a>

            <?php if( $search_type == 'simple' ): ?>

                <div id="site-header-search" class="cl-submenu cl-hide-on-mobile">
                    <?php the_widget( 'WP_Widget_Search', 'title=', array('before_widget' => '<div class="header_search">', 'after_widget' => '</div>' ) ); ?>
                </div><!-- #site-header-search -->

            <?php endif; ?>

        </div><!-- .search.tool -->

    <?php endif; ?>
    

    <?php if( (int) $cart_button && function_exists( 'is_woocommerce' ) ): ?>

        <div class="shop tool">
            
            <?php 
                global $woocommerce;
                $cart_url = $woocommerce->cart->get_cart_url();
            ?>

            <a href="<?php echo esc_url($cart_url) ?>" class="tool-link">
                <i class="cl-icon-cart-55"></i>
                <span class="cart-total cl-cart-total-fragment"><?php echo WC()->cart->get_cart_contents_count() ?></span>
            </a>

            <?php if( ! is_cart() && ! is_checkout() ): ?>

                <div id="site-header-cart" class="cl-submenu cl-hide-on-mobile">
                        <?php the_widget( 'WC_Widget_Cart', 'title=', array('before_widget' => '<div class="header_cart">', 'after_widget' => '</div>' ) ); ?>
                </div><!-- #site-header-cart -->

            <?php endif; ?>

        </div><!-- .shop.tool -->

    <?php endif; ?>
    
    
    <?php if( ( int ) $side_nav_button ): ?>

        <div class="side_menu tool">Side Menu</div>

    <?php endif; ?>
    

</div>