<?php

Kirki::add_section( 'cl_layout', array(
	    'priority'    => 10,
	    'type' => '',
	    'title'       => __( 'Layout', 'folie' ),
	    'description' => __( 'Overall site layout options', 'folie' ),
	) );


		Kirki::add_field( 'cl_folie', array(
			'settings' => 'layout',
			'label'    => __( 'All Pages Layout', 'folie' ),
			'description' => __( 'The general website layout. This can be overwrite from Blog Layout and from single page/post layouts', 'folie' ),
			'section'  => 'cl_layout',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'fullwidth',
			'choices'     => array(
				'fullwidth'  => esc_attr__( 'Fullwidth', 'folie' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'folie' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'folie' ),
				'dual_sidebar'  => esc_attr__( 'Dual Sidebar', 'folie' )
			),
		) );


		Kirki::add_field( 'cl_folie', array(
			'settings' => 'boxed_layout',
			'label'    => __( 'Boxed Layout', 'folie' ),
			'description' => __( 'Switch on if you want to make all page boxed', 'folie' ),
			'section'  => 'cl_layout',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
		) );


		Kirki::add_field( 'cl_folie', array(
			'settings' => 'boxed_layout_width',
			'label'    => __( 'Boxed Wrapper Width', 'folie' ),
			'description' => __( 'Define boxed wrapper width in pixel.', 'folie' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '1200',
			'choices'     => array(
				'min'  => '970',
				'max'  => '1600',
				'step' => '10',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.cl-boxed-layout',
					'units' => 'px',
					'property' => 'width',
					'media_query' => '@media (min-width: 992px)'
				),
			)
		) );


		Kirki::add_field( 'cl_folie', array(
			'settings' => 'layout_container_width',
			'label'    => __( 'Site Container Width', 'folie' ),
			'description' => __( 'Define site container width in pixel. A max-width:100% is set to not destroy the layout on smaller screens. It\'s applied on min-width media screens: 1200px', 'folie' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '1100',
			'choices'     => array(
				'min'  => '970',
				'max'  => '1600',
				'step' => '10',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.container',
					'units' => 'px',
					'property' => 'width',
					'media_query' => '@media (min-width: 1200px)'
				),
			)
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'sidebar_sticky',
			'label'    => __( 'Sticky Sidebar', 'folie' ),
			'description' => __( 'Switch on if you want to make sidebar sticky on page scroll', 'folie' ),
			'section'  => 'cl_layout',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'sidebar_sticky_offset',
			'label'    => __( 'Sidebar Sticky Offset', 'folie' ),
			'description' => __( 'If you leave 0, sidebar will be sticky from top. If you select 2 for example, sidebar will be sticky only for the last 2 widgets of sidebar not for the all sidebar.', 'folie' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				'min'  => 0,
				'max'  => 15,
				'step' => 1,
			),
			'inline_control' => true,
			'transport' => 'postMessage',
			'active_callback'    => array(
				array(
					'setting'  => 'sidebar_sticky',
					'operator' => '==',
					'value'    => true,
					'transport' => 'postMessage'
				),
								
			),
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'layout_modern',
			'label'    => __( 'Layout Modern', 'folie' ),
			'description' => __( 'Switch if you want to make web layout with sidebar background color. You can change color on Styling ', 'folie' ),
			'section'  => 'cl_layout',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'layout_bordered',
			'label'    => __( 'Layout Bordered', 'folie' ),
			'description' => __( 'Add a transparent border of 20px around webpages (all pages).', 'folie' ),
			'section'  => 'cl_layout',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'refresh',
		) );
		
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'inner_content_padding_top',
			'label'    => __( 'Inner Content Distance from Top', 'folie' ),
			'description' => __( 'Define the default distance of Inner Content ( Content / Sidebar ) from Header ( Header / Page Header / Other inserted elements ). Usable with: Pages without page builder, blog, defined page templates, posts.', 'folie' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '75',
			'choices'     => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.inner-content-row, .single_blog_style-classic.cl-layout-fullwidth',
					'units' => 'px',
					'property' => 'padding-top'
				),
			)
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'inner_content_padding_bottom',
			'label'    => __( 'Inner Content Distance from Bottom', 'folie' ),
			'description' => __( 'Define the default distance of Inner Content ( Content / Sidebar ) from Footer. Usable with: Pages without page builder, blog, defined page templates, posts.', 'folie' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '75',
			'choices'     => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.inner-content-row',
					'units' => 'px',
					'property' => 'padding-bottom'
				),
			)
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_article_distance',
			'label'    => __( 'Distance between blog entries', 'folie' ),
			'description' => __( 'Define distance in pixel between Blog Entries in Blog Page', 'folie' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '75',
			'choices'     => array(
				'min'  => '0',
				'max'  => '160',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '#blog-entries article',
					'units' => 'px',
					'property' => 'margin-bottom'
				),
			)
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'portfolio_distance',
			'label'    => __( 'Distance between portfolio items', 'folie' ),
			'description' => __( 'Define distance in pixel between Portfolio Items', 'folie' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '15',
			'choices'     => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'postMessage',
			'output' => array(
				array(
					'element' => '#portfolio-entries .portfolio_item',
					'units' => 'px',
					'property' => 'padding'
				),
			)
		) );


?>