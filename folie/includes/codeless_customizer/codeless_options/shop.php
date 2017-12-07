<?php

Kirki::add_section( 'cl_shop', array(
	    'priority'    => 10,
	    'type' => '',
	    'title'       => __( 'Shop', 'folie' ),
	    'description' => __( 'All Shop Options', 'folie' ),
	) );


		Kirki::add_field( 'cl_folie', array(
			'settings' => 'shop_columns',
			'label'    => __( 'Shop Columns', 'folie' ),
			'description' => __( 'Select number of items to display per Row on SHOP Page', 'folie' ),
			'section'  => 'cl_shop',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => '3',
			'choices'     => array(
				'2'  => esc_attr__( '2 Columns', 'folie' ),
				'3'  => esc_attr__( '3 Columns', 'folie' ),
				'4'  => esc_attr__( '4 Columns', 'folie' ),
				'5'  => esc_attr__( '5 Columns', 'folie' ),
				'6'  => esc_attr__( '6 Columns', 'folie' ),
			),
		) );

		Kirki::add_field( 'cl_folie', array(
		    'type' => 'slider',
		    'settings' => 'shop_item_distance',
			'label' => 'Distance between items',
			'default' => '15',
			'choices'     => array(
			'min'  => '0',
			'max'  => '30',
			'step' => '1',
							),
			'inline_control' => true,
			'section'  => 'cl_shop',
			'transport' => 'postMessage'
    	));

    	Kirki::add_field( 'cl_folie', array(
				'settings' => 'shop_animation',
				'label'    => __( 'Animation Type', 'folie' ),
				
				'section'  => 'cl_shop',
				'type'     => 'inlineselect',
				'priority' => 10,
				'default'  => 'bottom-t-top',
				'choices' => array(
					'none'	=> 'None',
					'top-t-bottom' =>	'Top-Bottom',
					'bottom-t-top' =>	'Bottom-Top',
					'right-t-left' => 'Right-Left',
					'left-t-right' => 'Left-Right',
					'alpha-anim' => 'Fade-In',	
					'zoom-in' => 'Zoom-In',	
					'zoom-out' => 'Zoom-Out',
					'zoom-reverse' => 'Zoom-Reverse',
				),
				'transport' => 'postMessage'
	) );

    	Kirki::add_field( 'cl_folie', array(
			'settings' => 'shop_item_heading',
			'label'    => __( 'Shop Item Heading', 'folie' ),
			'section'  => 'cl_shop',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'h6',
			'choices'     => array(
				'h1'  => esc_attr__( 'H1', 'folie' ),
				'h2'  => esc_attr__( 'H2', 'folie' ),
				'h3'  => esc_attr__( 'H3', 'folie' ),
				'h4'  => esc_attr__( 'H4', 'folie' ),
				'h5'  => esc_attr__( 'H5', 'folie' ),
				'h6'  => esc_attr__( 'H6', 'folie' ),
			),
			'transport' => 'postMessage'
		) );


    	Kirki::add_field( 'cl_folie', array(
			'settings' => 'shop_pagination_style',
			'label'    => __( 'Shop Pagination Style', 'folie' ),
			'section'  => 'cl_shop',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'numbers',
			'choices'     => array(
				'numbers'  => esc_attr__( 'With Page Numbers', 'folie' ),
				'next_prev'  => esc_attr__( 'Next/Prev', 'folie' ),
				'load_more'  => esc_attr__( 'Load More Button', 'folie' ),
				'infinite_scroll'  => esc_attr__( 'Infinite Scroll', 'folie' ),
			),
			'transport' => 'refresh'
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'shop_category_layout',
			'label'    => __( 'Shop Categories Layout', 'folie' ),
			'description' => __( 'Select shop Product Categories page layout.', 'folie' ),
			'section'  => 'cl_shop',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'fullwidth',
			'choices'     => array(
				'fullwidth'  => esc_attr__( 'Fullwidth', 'folie' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'folie' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'folie' )
			),
		) );

		
?>