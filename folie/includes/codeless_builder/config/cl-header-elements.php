<?php

    global $cl_theme_mod_defaults;

 
	
	Kirki::add_section( 'cl_codeless_header_builder', array(
	    'title'          => __( 'Header Builder', 'folie' ),
	    'description'    => __( 'Options for adding an additional element on header', 'folie' ),
	    'panel'          => '',
	    'type'			 => '',
	    'priority'       => 160,
	    'capability'     => 'edit_theme_options'
	) );
	
	
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Menu', 'folie' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'icon'		  => 'icon-basic-todo-txt',
			'transport'   => 'postMessage',
			'settings'    => 'cl_header_menu',
			'fields'	  => array(

				'general' => array(
						'type' => 'group_start',
						'label' => 'General',
						'groupid' => 'general'
				),

					'vertical_menu' => array( 
						'type'        => 'switch',
						'label'       => __( 'Vertical Menu', 'folie' ),
						'description' => 'Works only on fullscreen overlay menu or other vertical header type.',
						'default'     => 0,
						'priority'    => 10,
						'choices'     => array(
							'on'  => esc_attr__( 'On', 'folie' ),
							'off' => esc_attr__( 'Off', 'folie' ),
						),
						'selector' => '#navigation',
						'addClass' => 'vertical-menu',
					),

				'general_end' => array(
						'type' => 'group_end',
						'label' => 'General',
						'groupid' => 'general'
				),

				'hamburger_start' => array(
						'type' => 'group_start',
						'label' => 'Hamburger Menu',
						'groupid' => 'hamburger'
				),
					'hamburger' => array(
						'type'        => 'switch',
						'label'       => __( 'Hamburger Menu', 'folie' ),
						'description' => 'Switch On to make this menu appear as Hamburger menu. Select one of styles below.',
						'default'     => 0,
						'priority'    => 10,
						'choices'     => array(
							'on'  => esc_attr__( 'On', 'folie' ),
							'off' => esc_attr__( 'Off', 'folie' ),
						),
						'reloadTemplate' => true
					),

					'hamburger_style' => array(
						'type'     => 'inline_select',
						'priority' => 10,
						'label'       => esc_attr__( 'Hamburger Menu Style', 'folie' ),
						'default'     => 'overlay',
						'choices' => array(
							'overlay' => 'Fullscreen Overlay',
							'half_overlay' => 'Half Overlay'
						),
						'reloadTemplate' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'hamburger',
								'operator' => '==',
								'value'    => 1,
							),
						),
					),

					'hamburger_half_overlay_width' => array(
	
							'type' => 'slider',
							'label' => 'Overlay Width',
							'default' => '40',
							'selector' => '.cl-half-overlay-menu',
							'css_property' => 'width',
							'choices'     => array(
								'min'  => '10',
								'max'  => '100',
								'step' => '1',
								'suffix' => '%'
							),
							'suffix' => '%',
							'cl_required'    => array(
								array(
									'setting'  => 'hamburger_style',
									'operator' => '==',
									'value'    => 'half_overlay',
								),
							),
						),

					'hamburger_overlay_text' => array(
						'type'     => 'inline_select',
						'priority' => 10,
						'label'       => esc_attr__( 'Hamburger Overlay Text', 'folie' ),
						'default' => 'light-text',
						'choices' => array(
							'dark-text' => 'Dark',
							'light-text' => 'Light'
						),
						'selector' => '.cl-fullscreen-overlay-menu',
						'selectClass' => ' ',

						'cl_required'    => array(
							array(
								'setting'  => 'hamburger',
								'operator' => '==',
								'value'    => 1,
							),
						),
					),

					'hamburger_overlay_bg' => array(
						'type' => 'color',
						'label' => 'Background Color',
						'default' => 'rgba(0,0,0,0.9)',
						'selector' => '.cl-fullscreen-overlay-menu',
								
						'css_property' => 'background-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'hamburger',
								'operator' => '==',
								'value'    => 1,
							),
						),
					),

				'hamburger_end' => array(
						'type' => 'group_end',
						'label' => 'Hamburger',
						'groupid' => 'hamburger'
				),

				'Animation_start' => array(
						'type' => 'group_start',
						'label' => 'Animation',
						'groupid' => 'animation'
				),

					'item_animation' => array(
						'type'     => 'inline_select',
						'priority' => 10,
					    'label'       => esc_attr__( 'Items Animation Effect', 'folie' ),
					    
						'default'     => 'none',
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
						'selector' => '#navigation nav > ul > li'
					),

					'animation_delay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Delay between items', 'folie' ),
							
							'default'     => '100',
							'choices' => array(
								'none'	=> 'None',
								'100' =>	'ms 100',
								'200' =>	'ms 200',
								'300' =>	'ms 300',
								'400' =>	'ms 400',
								'500' =>	'ms 500',
								'600' =>	'ms 600',
								'700' =>	'ms 700',
								'800' =>	'ms 800',
								'900' =>	'ms 900',
								'1000' =>	'ms 1000',
								'1100' =>	'ms 1100',
								'1200' =>	'ms 1200',
								'1300' =>	'ms 1300',
								'1400' =>	'ms 1400',
								'1500' =>	'ms 1500',
								'1600' =>	'ms 1600',
								'1700' =>	'ms 1700',
								'1800' =>	'ms 1800',
								'1900' =>	'ms 1900',
								'2000' =>	'ms 2000',
							
							),
							
							'cl_required'    => array(
								array(
									'setting'  => 'item_animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
						
						'animation_speed' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Speed', 'folie' ),
							
							'default'     => '500',
							'choices' => array(
								'none'	=> 'None',
								'100' =>	'ms 100',
								'200' =>	'ms 200',
								'300' =>	'ms 300',
								'400' =>	'ms 400',
								'500' =>	'ms 500',
								'600' =>	'ms 600',
								'700' =>	'ms 700',
								'800' =>	'ms 800',
								'900' =>	'ms 900',
								'1000' =>	'ms 1000'
								
							
							),
							'selector' => '#navigation nav > ul > li',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'item_animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),

				'animation_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'animation'
				),

			)
			
		));
		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Logo', 'folie' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-star',
			'settings'    => 'cl_header_logo',
			'open_section' => 'logo_type'
			
		));
		
		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Tools', 'folie' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-settings',
			'settings'    => 'cl_header_tools',
			'fields'	  => array(
					
						'search_group' => array(
							'type' => 'group_start',
							'label' => 'Search',
							'groupid' => 'search'
						), 
						
							'search_button' => array(
								'type'        => 'switch',
								'label'       => __( 'Search button', 'folie' ),
								'description' => 'Activate to show search button',
								'default'     => 1,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'folie' ),
									'off' => esc_attr__( 'Off', 'folie' ),
								),
								'reloadTemplate' => true
							),

							'search_type' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Search Style', 'folie' ),
								'default'     => 'creative',
								'choices' => array(
									'simple' => 'Simple',
									'creative' => 'Creative'
								),
								'reloadTemplate' => true
							),
							
						'search_group_end' => array(
							'type' => 'group_end',
							'label' => 'Search Tool',
							'groupid' => 'search'
						),
						
						'shop_group' => array(
							'type' => 'group_start',
							'label' => 'Shop',
							'groupid' => 'shop'
						),
						
							'cart_button' => array(
								'type'        => 'switch',
								'label'       => __( 'Show Cart', 'folie' ),
								'description' => 'Show Cart if WooCommerce installed',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'folie' ),
									'off' => esc_attr__( 'Off', 'folie' ),
								),
								'reloadTemplate' => true
							),
							
						'shop_group_end' => array(
							'type' => 'group_end',
							'label' => 'Shop Tools',
							'groupid' => 'shop'
						),
						
						'side_nav_group' => array(
							'type' => 'group_start',
							'label' => 'Side Navigation',
							'groupid' => 'side_nav'
						),
						
							'side_nav_button' => array(
								'type'        => 'switch',
								'label'       => __( 'Active Side Nav', 'folie' ),
								'description' => 'Activate to add an extra side navigation',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'folie' ),
									'off' => esc_attr__( 'Off', 'folie' ),
								),
								'reloadTemplate' => true
							), 
							
						'side_nav_group_end' => array(
							'type' => 'group_end',
							'label' => 'Side Navigation',
							'groupid' => 'side_nav'
						),
			),
			
		));


		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Button', 'folie' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-signs',
			'settings'    => 'cl_header_button',
			'fields'	  => array(
					
					'btn_title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '.cl-btn span',
						'label'       => esc_attr__( 'Text', 'folie' ),
						'description' => esc_attr__( 'This will be the label for your link', 'folie' ),
						'default'     => 'View More',
						'only_text' => true
					),

					'link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Link', 'folie' ),
						'default'     => '#'
					),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl-btn-div',
							'css_property' => '',
					),
			),
			
		)); 

		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Icon Text', 'folie' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-signs',
			'settings'    => 'cl_header_icon_text',
			'fields'	  => array(
					
					'text_title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '.cl-icon-text .title',
						'label'       => esc_attr__( 'Text', 'folie' ),
						'description' => esc_attr__( 'This will be the label for your link', 'folie' ),
						'default'     => 'Text for this element. Click to Edit.'
					),

					'icon' => array(
						'type'     => 'select_icon',
						'priority' => 10,
						'label'       => esc_attr__( 'Select Icon', 'folie' ),
						'default'     => 'cl-icon-camera2',
						'selector' => '.cl-icon-text i',
						'selectClass' => ' ',
					),

					'icon_color' => array(
							'type' => 'color',
							'label' => 'Icon Color',
							'default' => codeless_get_mod( 'primary_color' ),
							'selector' => '.cl-icon-text i',
							'css_property' => 'color',
							'alpha' => true,
					),

			),
			
		));

		/* Text */
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Text', 'folie' ),
			'section'     => 'cl_codeless_header_builder',
			//'priority'    => 10,
			'icon'		  => 'icon-software-font-smallcaps',
			'transport'   => 'postMessage',
			'settings'    => 'cl_header_text',

			'fields' => array(
				'content' => array(
					'type'     => 'inline_text',
					'priority' => 10,
					'selector' => '.cl-text',
					'label'       => esc_attr__( 'Text', 'folie' ),
					'description' => esc_attr__( 'This will be the label for your link', 'folie' ),
					'default'     => 'Welcome to Folie WP Theme',
				),

				'hide_responsive' => array(
								'type'        => 'switch',
								'label'       => __( 'Hide on Responsive', 'folie' ),
								'description' => 'Switch On to hide from responsive Header',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'folie' ),
									'off' => esc_attr__( 'Off', 'folie' ),
								),
								'reloadTemplate' => true
				), 

				'margin_paragraphs' => array(
	
							'type' => 'slider',
							'label' => 'Distance between paragraphs',
							'default' => '10',
							'selector' => '.cl-text p',
							'css_property' => array('margin-top', 'margin-bottom'),
							'choices'     => array(
								'min'  => '0',
								'max'  => '40',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
						),

				'typography_start' => array(
						'type' => 'group_start',
						'label' => 'Typography',
						'groupid' => 'typography'
					),

					'custom_typography' => array(
							'type'        => 'switch',
							'label'       => __( 'Custom Typography', 'folie' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
						),

					
					'text_font_family' => array(
	
							'type' => 'inline_select',
							'label' => 'Font Family',
							'default' => 'theme_default',
							'selector' => '.cl-text',
							'css_property' => 'font-family',
							'choices'     => codeless_get_google_fonts(),
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

					'text_font_size' => array(
	
							'type' => 'slider',
							'label' => 'Text Font Size',
							'default' => '14',
							'selector' => '.cl-text',
							'css_property' => 'font-size',
							'choices'     => array(
								'min'  => '12',
								'max'  => '72',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

					'text_font_weight' => array(
	
							'type' => 'inline_select',
							'label' => 'Title Font Weight',
							'default' => '400',
							'selector' => '.cl-text',
							'css_property' => 'font-weight',
							'choices'     => array(
								'100' => '100',
								'200' => '200',
								'300' => '300',
								'400' => '400',
								'500' => '500',
								'600' => '600',
								'700' => '700',
								'800' => '800'
							),
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),
						
					'text_line_height' => array(
	
							'type' => 'slider',
							'label' => 'Line Height',
							'default' => '20',
							'selector' => '.cl-text',
							'css_property' => 'line-height',
							'choices'     => array(
								'min'  => '20',
								'max'  => '100',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),
					
					'text_transform' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Text Transform', 'folie' ),
							
							'default'     => 'none',
							'selector' => '.cl-text',
							'css_property' => 'text-transform',
							'choices' => array(
								'none' => 'None',
								'uppercase' => 'Uppercase'
							),
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
							
						),

						'text_letterspace' => array(
		
								'type' => 'slider',
								'label' => 'Letter-Spacing',
								'default' => '0',
								'selector' => '.cl-text',
								'css_property' => 'letter-spacing',
								'choices'     => array(
									'min'  => '0',
									'max'  => '4',
									'step' => '0.05',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'custom_typography',
										'operator' => '==',
										'value'    => 1,
									),
								),
							),
						

						'text_color' => array(
							'type' => 'color',
							'label' => 'Color',
							'default' => '',
							'selector' => '.cl-text',
							'css_property' => 'color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
					),
					
						
				

				'typography_end' => array(
						'type' => 'group_end',
						'label' => 'Typography',
						'groupid' => 'typography'
				),


					'animation_start' => array(
						'type' => 'group_start',
						'label' => 'Animation',
						'groupid' => 'animation'
					),
					
						'animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Effect', 'folie' ),
							
							'default'     => 'none',
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
							'selector' => '.cl-text'
						),
						
						'animation_delay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Delay', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'100' =>	'ms 100',
								'200' =>	'ms 200',
								'300' =>	'ms 300',
								'400' =>	'ms 400',
								'500' =>	'ms 500',
								'600' =>	'ms 600',
								'700' =>	'ms 700',
								'800' =>	'ms 800',
								'900' =>	'ms 900',
								'1000' =>	'ms 1000',
								'1100' =>	'ms 1100',
								'1200' =>	'ms 1200',
								'1300' =>	'ms 1300',
								'1400' =>	'ms 1400',
								'1500' =>	'ms 1500',
								'1600' =>	'ms 1600',
								'1700' =>	'ms 1700',
								'1800' =>	'ms 1800',
								'1900' =>	'ms 1900',
								'2000' =>	'ms 2000',
							
							),
							'selector' => '.cl-text',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
						
						'animation_speed' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Speed', 'folie' ),
							
							'default'     => '400',
							'choices' => array(
								'none'	=> 'None',
								'100' =>	'ms 100',
								'200' =>	'ms 200',
								'300' =>	'ms 300',
								'400' =>	'ms 400',
								'500' =>	'ms 500',
								'600' =>	'ms 600',
								'700' =>	'ms 700',
								'800' =>	'ms 800',
								'900' =>	'ms 900',
								'1000' =>	'ms 1000'
								
							
							),
							'selector' => '.cl-text',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
					
					'animation_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'animation'
					),
			),
			
		) );


		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Widget', 'folie' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-gear',
			'settings'    => 'cl_header_widget',
			'fields'	  => array(
					
					'widget_sidebar' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Widgetized Area', 'folie' ),
							'description' => esc_attr__( 'Select the widgetized area that you want to add', 'folie' ),
							'default'     => '',
							'choices' => codeless_get_registered_sidebars(),
							'reloadTemplate' => true,
						),

			),
			
		));
?>