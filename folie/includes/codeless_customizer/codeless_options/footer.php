<?php

Kirki::add_panel( 'cl_footer', array(
		'priority' => 10,
	    'type' => '',
	    'title'       => __( 'Footer', 'folie' ),
	    'description' => __( 'Footer Options and Layout', 'folie' ),
	) );


Kirki::add_section('cl_footer_general', array(
	'title' => __('General', 'folie') ,
	'description' => __('General Footer Options', 'folie') ,
	'panel' => 'cl_footer',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));


		Kirki::add_field( 'cl_folie', array(
			'settings' => 'show_footer',
			'label'    => __( 'Show Footer', 'folie' ),
			'description' => __( 'Switch On/Off Footer on website', 'folie' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'footer_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'footer_fullwidth',
			'label'    => __( 'Footer Fullwidth', 'folie' ),
			'description' => __( 'Switch On if you want footer content without container', 'folie' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
		    'active_callback'    => array(
				array(
					'setting'  => 'show_footer',
					'operator' => '==',
					'value'    => true,
					'transport' => 'postMessage'
				),
							
			),
		));
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'footer_layout',
			'label'    => __( 'Footer Layout', 'folie' ),
			'description' => __( 'Use this option to change layout of footer. You can use the UI on the page too.', 'folie' ),
			'section'  => 'cl_footer_general',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => '14_14_14_14',
			'choices'     => array(
			    '16_16_16_16_16_16'  => esc_attr__( '6 Columns', 'folie' ),
				'14_14_14_14'  => esc_attr__( '4 Columns', 'folie' ),
				'13_13_13'  => esc_attr__( '3 Columns', 'folie' ),
				'12_12'  => esc_attr__( '2 Columns', 'folie' ),
				'11'  => esc_attr__( '1 Column', 'folie' ),
				'14_34'  => esc_attr__( '1/4 3/4', 'folie' ),
				'34_14'  => esc_attr__( '3/4 1/4', 'folie' ),
				'13_23'  => esc_attr__( '1/3 2/3', 'folie' ),
				'23_13'  => esc_attr__( '2/3 1/3', 'folie' ),
			),
			'transport' => 'postMessage',
			'active_callback'    => array(
				array(
					'setting'  => 'show_footer',
					'operator' => '==',
					'value'    => true,
					'transport' => 'postMessage'
				),
							
			),
			'partial_refresh' => array(
		        'footer_layout' => array(
		            'selector'            => 'footer#colophon .footer-content-row',
		            'render_callback'     => 'codeless_build_footer_layout'
		        ),
		    ),
		) );


		Kirki::add_field( 'cl_folie', array(
			'settings' => 'footer_centered_content',
			'label'    => __( 'Footer Centered Content', 'folie' ),
			'description' => __( 'Switch to center content of column', 'folie' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
			'active_callback'    => array(
				array(
					'setting'  => 'footer_layout',
					'operator' => '==',
					'value'    => '11',
					'transport' => 'postMessage'
				),
							
			),
		
		) );


		Kirki::add_field( 'cl_folie', array(
			'settings' => 'show_copyright',
			'label'    => __( 'Show Copyright', 'folie' ),
			'description' => __( 'Switch On/Off Copyright on website', 'folie' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'footer_reveal_effect',
			'label'    => __( 'Footer Reveal Effect', 'folie' ),
			'description' => __( 'Switch On/Off to activate reveal footer effect', 'folie' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage'
		
		) );

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'footer_widget_distance',
			'label'       => esc_attr__( 'Distance between widgets', 'folie' ),
			'section'     => 'cl_footer_general',
			'into_group' => true,
			'default'     => '30',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'footer#colophon .widget',
					'units'  => 'px',
					'property' => 'padding-top'
				),
				array(
					'element' => 'footer#colophon .widget',
					'units'  => 'px',
					'property' => 'padding-bottom'
				),

			)
		));


Kirki::add_section('cl_footer_design', array(
	'title' => __('Main Footer Style', 'folie') ,
	'description' => __('Main Footer Design Options', 'folie') ,
	'panel' => 'cl_footer',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

		Kirki::add_field('cl_folie', array(
			'settings' => 'footer_design',
			'label' => __('Footer Box Design', 'folie') ,
			'section' => 'cl_footer_design',
			'type' => 'cssbox',
			'priority' => 1,
			'default' => array(
				'padding-top' => '60px',
				'padding-bottom' => '60px'
			) ,
			'into_group' => true,
			'transport' => 'postMessage',
		));


		Kirki::add_field('cl_folie', array(
			'type' => 'inlineselect',
			'settings' => 'footer_border_style',
			'label' => 'Outer Border Style',
			'default' => 'solid',
			'choices' => array(
				'solid' => 'solid',
				'dotted' => 'dotted',
				'dashed' => 'dashed',
				'double' => 'double',
				'groove' => 'groove',
				'ridge' => 'ridge',
				'inset' => 'inset',
				'outset' => 'outset',
			) ,
			'priority' => 1,
			'inline_control' => true,
			'section' => 'cl_footer_design',
			'priority' => 1,
			'output' => array(
				array(
					'element' => 'footer#colophon',
					'property' => 'border-style'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_folie', array(
			'type' => 'color',
			'settings' => 'footer_outer_border_color',
			'label' => 'Outer Border Color',
			'default' => 'rgba(235,235,235,0.17)',
			'inline_control' => true,
			'section' => 'cl_footer_design',
			'alpha' => true,
			'priority' => 1,
			'output' => array(
				array(
					'element' => 'footer#colophon',
					'property' => 'border-color'
				)
			) ,
			'transport' => 'auto'
		));


		Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'footer_bg_color',
			'label' => 'BG Color',
			'default' => '#1B1F21',
			'inline_control' => true,
			'alpha' => false,
			'priority' => 2,
			'section'  => 'cl_footer_design',
			'output' => array(
				array(
					'element' => 'footer#colophon, #copyright input, #copyright select, #copyright textarea ',
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'footer_dark_bg_color',
			'label' => 'Second Color',
			'description' => 'Used for inputs, textarea and other more darken area',
			'default' => '#383838',
			'inline_control' => true,
			'alpha' => false,
			'priority' => 2,
			'section'  => 'cl_footer_design',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'footer_dark_bg_color' ),
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'footer_button_bg_color',
			'label' => 'Button BG Color',
			'description' => 'Used for buttons',
			'default' => '#1b1b1b',
			'inline_control' => true,
			'alpha' => false,
			'priority' => 2,
			'section'  => 'cl_footer_design',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'footer_button_bg_color' ),
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
			'type'        => 'color',
			'settings'    => 'footer_title_widget',
			'label'       => esc_attr__( 'Widget Title', 'folie' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#ffffff',
			'priority' => 2,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'footer#colophon .widget-title, footer#colophon .rsswidget',
					'property' => 'color'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'color',
			'settings'    => 'footer_font_color',
			'label'       => esc_attr__( 'Body Font Color', 'folie' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#9E9E9E',
			'priority' => 2,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'footer#colophon',
					'property' => 'color'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'color',
			'settings'    => 'footer_link_color',
			'label'       => esc_attr__( 'Link Color', 'folie' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#D6D6D6',
			'priority' => 2,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'footer#colophon a, footer#colophon .widget_rss cite,  footer#colophon .widget_calendar thead th',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'color',
			'settings'    => 'footer_link_color_hover',
			'label'       => esc_attr__( 'Link Hover Color', 'folie' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#fff',
			'priority' => 2,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'footer#colophon a:hover',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'color',
			'settings'    => 'footer_border_color',
			'label'       => esc_attr__( 'Inner Borders Color', 'folie' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#2b2b2b',
			'priority' => 2,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'footer_border_color' ),
					'property' => 'border-color'
				),

			)
		));
		

		Kirki::add_section('cl_footer_copyright', array(
			'title' => __('Copyright Style', 'folie') ,
			'description' => __('Copyright Design Options', 'folie') ,
			'panel' => 'cl_footer',
			'type' => '',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		));
		
		Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'copyright_bg_color',
			'label' => 'BG Color',
			'default' => '#17191b',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_footer_copyright',
			'output' => array(
				array(
					'element' => '#copyright',
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'color',
			'settings'    => 'copyright_font_color',
			'label'       => esc_attr__( 'Body Font Color', 'folie' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#999',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#copyright',
					'property' => 'color'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'color',
			'settings'    => 'copyright_link_color',
			'label'       => esc_attr__( 'Link Color', 'folie' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#d1d1d1',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#copyright a',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'color',
			'settings'    => 'copyright_link_color_hover',
			'label'       => esc_attr__( 'Link Hover Color', 'folie' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#fff',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#copyright a:hover',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'color',
			'settings'    => 'copyright_border_color',
			'label'       => esc_attr__( 'Borders Color', 'folie' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#2b2b2b',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'copyright_border_color' ),
					'property' => 'border-color'
				),

			)
		));

		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'copyright_padding_top',
			'label'       => esc_attr__( 'Content Distance From Top', 'folie' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'default'     => '20',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#copyright',
					'units'  => 'px',
					'property' => 'padding-top'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'copyright_padding_bottom',
			'label'       => esc_attr__( 'Content Distance From Bottom', 'folie' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'default'     => '20',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#copyright',
					'units'  => 'px',
					'property' => 'padding-bottom'
				),

			)
		));
?>