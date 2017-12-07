<?php

// Register Portfolio

$argsPortfolio = array(

	'post_type' => 'portfolio',

	'taxonomy' => 'portfolio_entries',

	'labels' => array( 

		'name' => _x('Portfolio Items', 'post type general name', 'folie' ),

		'singular_name' => _x('Portfolio Entry', 'post type singular name', 'folie' ),

		'add_new' => _x('Add New', 'portfolio', 'folie' ),

		'add_new_item' => __('Add New Portfolio Entry', 'folie' ),

		'edit_item' => __('Edit Portfolio Entry', 'folie' ),

		'new_item' => __('New Portfolio Entry', 'folie' ),

		'view_item' => __('View Portfolio Entry', 'folie' ),

		'search_items' => __('Search Portfolio Entries', 'folie' ),

		'not_found' =>  __('No Portfolio Entries found', 'folie' ),

		'not_found_in_trash' => __('No Portfolio Entries found in Trash', 'folie' ), 

		'parent_item_colon' => ''

	),

	'taxonomy_label' => __( 'Portfolio Categories', 'folie' ),

	'slugRule' => codeless_get_mod( 'portfolio_slug', 'portfolio' ),

	'show_in_customizer' => true

);



codeless_register_post_type( $argsPortfolio );



// Register Staff

$argsStaff = array(

	'post_type' => 'staff',

	'taxonomy' => 'staff_entries',

	'labels' => array(

		'name' => _x('Team', 'post type general name', 'folie' ),

		'singular_name' => _x('Staff Entry', 'post type singular name', 'folie' ),

		'add_new' => _x('Add New', 'staff', 'folie' ),

		'add_new_item' => __('Add New Staff Entry', 'folie' ),

		'edit_item' => __('Edit Staff Entry', 'folie' ),

		'new_item' => __('New Staff Entry', 'folie' ),

		'view_item' => __('View Staff Entry', 'folie' ),

		'search_items' => __('Search Staff Entries', 'folie' ),

		'not_found' =>  __('No Staff Entries found', 'folie' ),

		'not_found_in_trash' => __('No Staff Entries found in Trash', 'folie' ), 

		'parent_item_colon' => ''
	),

	'taxonomy_label' => __( 'Staff Categories', 'folie' ),

	'slugRule' => codeless_get_mod( 'staff_slug', 'staff' ),

	'show_in_customizer' => true

);


codeless_register_post_type( $argsStaff );



// Register Testimonial

$argsTestimonial = array(

	'post_type' => 'testimonial',

	'taxonomy' => 'testimonial_entries',

	'labels' => array(

		'name' => _x('Testimonials', 'post type general name', 'folie' ),

		'singular_name' => _x('Testimonial Entry', 'post type singular name', 'folie' ),

		'add_new' => _x('Add New', 'testimonial', 'folie' ),

		'add_new_item' => __('Add New Testimonial Entry', 'folie' ),

		'edit_item' => __('Edit Testimonial Entry', 'folie' ),

		'new_item' => __('New Testimonial Entry', 'folie' ),

		'view_item' => __('View Testimonial Entry', 'folie' ),

		'search_items' => __('Search Testimonial Entries', 'folie' ),

		'not_found' =>  __('No Testimonial Entries found', 'folie' ),

		'not_found_in_trash' => __('No Testimonial Entries found in Trash', 'folie' ), 

		'parent_item_colon' => ''

	),

	'taxonomy_label' => __( 'Testimonial Categories', 'folie' ),

	'slugRule' => codeless_get_mod( 'testimonial_slug', 'testimonial' ),

	'show_in_customizer' => true


);


codeless_register_post_type( $argsTestimonial );



// Register Content Blocks

$argsContentBlocks = array(

	'post_type' => 'content_block',

	'taxonomy' => 'content_blocks',

	'labels' => array(

		'name' => _x('Content Blocks', 'post type general name', 'folie' ),

		'singular_name' => _x('Content Block', 'post type singular name', 'folie' ),

		'add_new' => _x('Add New', 'content_block', 'folie' ),

		'add_new_item' => __('Add New Content Block', 'folie' ),

		'edit_item' => __('Edit Content Block', 'folie' ),

		'new_item' => __('New Content Block', 'folie' ),

		'view_item' => __('View Content Block', 'folie' ),

		'search_items' => __('Search Content Blocks', 'folie' ),

		'not_found' =>  __('No Content Blocks found', 'folie' ),

		'not_found_in_trash' => __('No Content Blocks found in Trash', 'folie' ), 

		'parent_item_colon' => ''

	),

	'taxonomy_label' => __( 'Content Blocks Categories', 'folie' ),

	'slugRule' => codeless_get_mod( 'content_block_slug', 'content_block' ),

	'show_in_customizer' => false


);


codeless_register_post_type( $argsContentBlocks );

?>