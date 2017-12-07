<?php
    
    Kirki::add_section( 'cl_styling', array(
    	    'title'          => __( 'Styling', 'folie' ),
    	    'description'    => __( 'All theme styling options', 'folie' ),
    	    'type'			 => '',
    	    'capability'     => 'edit_theme_options'
    	) );
		
		
		
		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'general_style_title',
		    'label'    => __( 'General', 'folie' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
	
	    Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'primary_color',
			'label' => 'Primary Accent Color',
			'default' => '#1fb4cc',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'primary_color', 'color' ),
					'property' => 'color',
					'suffix' => '!important'
				),
				array(
				    'element' => codeless_dynamic_css_register_tags( 'primary_color', 'background_color' ),
				    'property' => 'background-color' 
				),
				array(
				    'element' => codeless_dynamic_css_register_tags( 'primary_color', 'border-color' ),
				    'property' => 'border-color' 
				)
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'border_accent_color',
			'label' => 'Border Accent Color',
			'default' => '#ebebeb',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'border_accent_color', 'border-color' ),
					'property' => 'border-color',
					'suffix' => '!important'
				)
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'labels_accent_color',
			'label' => 'Labels, Span accent color',
			'description' => 'Used for prepended text (In, By, etc..), counter ("3" categories for example), quote icon, current pagination and more.',
			'default' => '#9b9b9b',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'labels_accent_color' ),
					'property' => 'color'
				)
			),
		    'transport' => 'auto' 
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'highlight_light_color',
			'label' => 'Highlighted area light',
			'description' => 'Areas like pagination buttons and other areas with light color highlight',
			'default' => '#dedede',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'highlight_light_color', 'background-color' ),
					'property' => 'background-color'
				)
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'highlight_dark_color',
			'label' => 'Highlighted area dark',
			'description' => 'Areas like loadmore button or small links like categories, widgets links, quote text and more.',
			'default' => '#303133',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'highlight_dark_color', 'color' ),
					'property' => 'color'
				),
				array(
					'element' => codeless_dynamic_css_register_tags( 'highlight_dark_color', 'background-color' ),
					'property' => 'background-color'
				)
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'other_area_links',
			'label' => 'Links Color',
			'description' => 'Other links that dont have the primary accent color, like sidebar links, cetegories links or date link',
			'default' => '#303133',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'other_area_links', 'color' ),
					'property' => 'color'
				)
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'layout_modern_bg_color',
			'label' => 'Modern Layout Sidebar BG Color',
			'description' => 'Used only on modern layout with full sidebar.',
			'default' => '#f7f7f7',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-layout-modern-bg',
					'property' => 'background-color'
				)
			),
		    'transport' => 'auto'
    	));

    	
			
		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'general_style_div',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));

		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'body_background_title',
		    'label'    => __( 'Body Background', 'folie' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));

		Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'body_bg_color',
			'label' => 'Body Overall Background Color',
			'default' => '',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-color',
					'suffix' => ''
				),
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field('cl_folie', array(
			'type' => 'image',
			'label' => 'Background Image',
			'settings' => 'body_bg_image',
			'default' => '',
			'inline_control' => true,
			'section' => 'cl_styling',
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-image'
				)
			),
		));

		Kirki::add_field('cl_folie', array(
			'type' => 'inlineselect',
			'settings' => 'body_bg_pos',
			'label' => 'Background Position',
			'default' => 'left top',
			'choices' => array(
				'left top' => 'left top',
				'left center' => 'left center',
				'left bottom' => 'left bottom',
				'right top' => 'right top',
				'right center' => 'right center',
				'right bottom' => 'right bottom',
				'center top' => 'center top',
				'center center' => 'center center',
				'center bottom' => 'center bottom',
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-position'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_folie', array(
			'type' => 'inlineselect',
			'settings' => 'body_bg_repeat',
			'label' => 'Background Repeat',
			'default' => 'no-repeat',
			'choices' => array(
				'repeat' => 'repeat',
				'repeat-x' => 'repeat-x',
				'repeat-y' => 'repeat-y',
				'no-repeat' => 'no-repeat'
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-repeat'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_folie', array(
			'type' => 'inlineselect',
			'settings' => 'body_bg_attachment',
			'label' => 'Background Attachment',
			'default' => 'scroll',
			'choices' => array(
				'scroll' => 'scroll',
				'fixed' => 'fixed'
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-attachment'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_folie', array(
			'type' => 'inlineselect',
			'settings' => 'body_bg_size',
			'label' => 'Background Size',
			'default' => 'auto',
			'choices' => array(
				'auto' => 'auto',
				'cover' => 'cover'
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-size'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_folie', array(
			'type' => 'inlineselect',
			'settings' => 'body_bg_blend',
			'label' => 'Background Blend Mode',
			'default' => 'normal',
			'choices' => array(
				'normal' => 'normal',
				'multiply' => 'multiply',
				'screen' => 'screen',
				'overlay' => 'overlay',
				'darken' => 'darken',
				'lighten' => 'lighten',
				'color-dodge' => 'color-dodg',
				'color-burn' => 'color-burn',
				'hard-light' => 'hard-light',
				'soft-light' => 'soft-light',
				'difference' => 'difference',
				'exclusion' => 'exclusion',
				'hue' => 'hue',
				'saturation' => 'saturation',
				'color' => 'color',
				'luminosity' => 'luminosity',
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-blend-mode'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'body_background_end_divider',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'typography_headings_style_title',
		    'label'    => __( 'Headings', 'folie' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'typography',
			'settings'    => 'headings_typo',
			'label'       => esc_attr__( 'General Headings Typography', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => array(
				'font-family'    => 'Poppins',
			),
			'priority'    => 10,
			'show_subsets' => false,
			'show_variants' => false,
			'transport' => 'postMessage',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'headings_typo' )
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h1_font_size',
			'label'       => esc_attr__( 'H1 Font Size', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '34',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h1_line_height',
			'label'       => esc_attr__( 'H1 Line-height', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '42',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'inlineselect',
			'settings'    => 'h1_text_transform',
			'label'       => esc_attr__( 'H1 Text Transform', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => 'None',
				'uppercase' => 'Uppercase'
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'inlineselect',
			'settings'    => 'h1_font_weight',
			'label'       => esc_attr__( 'H1 Font Weight', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '700',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h1_letter_space',
			'label'       => esc_attr__( 'H1 Letter Spacing', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '0',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'h1_dark_color',
			'label' => 'H1 Color (Dark)',
			'default' => '#383838',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));


    	
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'h1_light_color',
			'label' => 'H1 Color (Light)',
			'default' => '#ffffff',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h1:not(.custom_font), .light-text .h1',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'general_style_div_h2',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	
    	
    	Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h2_font_size',
			'label'       => esc_attr__( 'H2 Font Size', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '28',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h2_line_height',
			'label'       => esc_attr__( 'H2 Line-height', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '40',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'inlineselect',
			'settings'    => 'h2_text_transform',
			'label'       => esc_attr__( 'H2 Text Transform', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'uppercase',
			'priority'    => 10,
			'choices' => array(
				'none' => 'None',
				'uppercase' => 'Uppercase'
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'inlineselect',
			'settings'    => 'h2_font_weight',
			'label'       => esc_attr__( 'H2 Font Weight', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '600',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h2_letter_space',
			'label'       => esc_attr__( 'H2 Letter Spacing', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '0',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'h2_dark_color',
			'label' => 'H2 Color (Dark)',
			'default' => '#222',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'h2_light_color',
			'label' => 'H2 Color (Light)',
			'default' => '#ffffff',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h2:not(.custom_font), .light-text .h2',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'general_style_div_h3',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h3_font_size',
			'label'       => esc_attr__( 'H3 Font Size', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '18',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h3_line_height',
			'label'       => esc_attr__( 'H3 Line-height', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '24',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'inlineselect',
			'settings'    => 'h3_text_transform',
			'label'       => esc_attr__( 'H3 Text Transform', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => 'None',
				'uppercase' => 'Uppercase'
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'inlineselect',
			'settings'    => 'h3_font_weight',
			'label'       => esc_attr__( 'H3 Font Weight', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '800',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h3_letter_space',
			'label'       => esc_attr__( 'H3 Letter Spacing', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '0',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'h3_dark_color',
			'label' => 'H3 Color (Dark)',
			'default' => '#383838',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'h3_light_color',
			'label' => 'H3 Color (Light)',
			'default' => '#ffffff',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h3:not(.custom_font), .light-text .h3',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'general_style_div_h4',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h4_font_size',
			'label'       => esc_attr__( 'H4 Font Size', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '16',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h4_line_height',
			'label'       => esc_attr__( 'H4 Line-height', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '22',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'inlineselect',
			'settings'    => 'h4_text_transform',
			'label'       => esc_attr__( 'H4 Text Transform', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => 'None',
				'uppercase' => 'Uppercase'
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'inlineselect',
			'settings'    => 'h4_font_weight',
			'label'       => esc_attr__( 'H4 Font Weight', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '600',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h4_letter_space',
			'label'       => esc_attr__( 'H4 Letter Spacing', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '0',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'h4_dark_color',
			'label' => 'H4 Color (Dark)',
			'default' => '#303133',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'h4_light_color',
			'label' => 'H4 Color (Light)',
			'default' => '#ffffff',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h4:not(.custom_font), .light-text .h4',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'general_style_div_h5',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h5_font_size',
			'label'       => esc_attr__( 'H5 Font Size', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '14',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h5_line_height',
			'label'       => esc_attr__( 'H5 Line-height', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '24',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'inlineselect',
			'settings'    => 'h5_text_transform',
			'label'       => esc_attr__( 'H5 Text Transform', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'uppercase',
			'priority'    => 10,
			'choices' => array(
				'none' => 'None',
				'uppercase' => 'Uppercase'
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'inlineselect',
			'settings'    => 'h5_font_weight',
			'label'       => esc_attr__( 'H5 Font Weight', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '600',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h5_letter_space',
			'label'       => esc_attr__( 'H5 Letter Spacing', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '0',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'h5_dark_color',
			'label' => 'H5 Color (Dark)',
			'default' => '#303133',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'h5_light_color',
			'label' => 'H5 Color (Light)',
			'default' => '#ffffff',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h5:not(.custom_font), .light-text .h5',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'general_style_div_h6',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h6_font_size',
			'label'       => esc_attr__( 'H6 Font Size', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '12',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h6_line_height',
			'label'       => esc_attr__( 'H6 Line-height', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '24',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'inlineselect',
			'settings'    => 'h6_text_transform',
			'label'       => esc_attr__( 'H6 Text Transform', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'uppercase',
			'priority'    => 10,
			'choices' => array(
				'none' => 'None',
				'uppercase' => 'Uppercase'
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'inlineselect',
			'settings'    => 'h6_font_weight',
			'label'       => esc_attr__( 'H6 Font Weight', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '600',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'h6_letter_space',
			'label'       => esc_attr__( 'H6 Letter Spacing', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '1',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'h6_dark_color',
			'label' => 'H6 Color (Dark)',
			'default' => '#303133',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'h6_light_color',
			'label' => 'H6 Color (Light)',
			'default' => '#ffffff',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h6:not(.custom_font), .light-text .h6',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'general_style_div_h',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
		
		
		
		
		
		
		
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'typography',
			'settings'    => 'body_typo',
			'label'       => esc_attr__( 'Body Typography', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'show_subsets' => false,
			'default'     => array(
				'font-family'    => 'Source Sans Pro',
				'letter-spacing' => '0',
				'font-weight' => '400',
				'text-transform' => 'none',
				'font-size' => '14px',
				'line-height' => '24px',
				'color' => '#6a6a6a'
			),
			'priority'    => 10,
			'transport' => 'postMessage',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'body_typo' )
				),

			)
		));
		
		
		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'blog_style_div',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'blog_style_title',
		    'label'    => __( 'Blog', 'folie' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'typography',
			'settings'    => 'blog_entry_title',
			'label'       => esc_attr__( 'Blog Entry Title', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'show_subsets' => false,
			'show_variants' => true,
			'default'     => array(
				'letter-spacing' => '0.08em',
				'font-weight' => '700',
				'text-transform' => 'uppercase',
				'font-size' => '16px',
				'line-height' => '24px',
				'color' => '#303133'
			),
			'priority'    => 10,
			'transport' => 'postMessage',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'blog_entry_title' )
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'typography',
			'settings'    => 'single_blog_title',
			'label'       => esc_attr__( 'Single Blog Title', 'folie' ),
			'section'     => 'cl_styling',
			'show_variants' => true,
			'into_group' => true,
			'show_subsets' => false,
			'default'     => array(
				'letter-spacing' => '0',
				'font-weight' => '600',
				'text-transform' => 'none',
				'font-size' => '34px',
				'line-height' => '42px',
				'color' => '#303133'
			),
			'priority'    => 10,
			'transport' => 'postMessage',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'single_blog_title' )
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'typography',
			'settings'    => 'blog_entry_readmore',
			'label'       => esc_attr__( 'Blog Read More', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'show_subsets' => false,
			'default'     => array(
				'letter-spacing' => '0.00em',
				'font-weight' => '700',
				'text-transform' => 'uppercase',
				'font-size' => '13px',
				'line-height' => '20px',
				'color' => '#454545'
			),
			'priority'    => 10,
			'transport' => 'postMessage',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'blog_entry_readmore' )
				),

			)
		));

		Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'blog_overlay_color',
			'label' => 'Blog Overlay Color',
			'default' => 'rgba(31,180,204,0.92)',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'blog_overlay_color' ) ,
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));


    	Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'portfolio_style_div',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'portfolio_style_title',
		    'label'    => __( 'Portfolio', 'folie' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'typography',
			'settings'    => 'portfolio_item_categories',
			'label'       => esc_attr__( 'Portfolio Item Categories', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'show_subsets' => false,
			'default'     => array(
				'letter-spacing' => '0.00em',
				'font-weight' => '400',
				'text-transform' => 'none',
				'font-size' => '13px',
				'line-height' => '20px',
				'color' => '#999'
			),
			'priority'    => 10,
			'transport' => 'postMessage',
			'output'      => array(
				array(
					'element' => '.portfolio_item .portfolio-categories a, .portfolio_item .portfolio-categories'
				),

			)
		));



		
		
		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'style_buttons_div',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'buttons_title',
		    'label'    => __( 'Buttons', 'folie' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		Kirki::add_field( 'cl_folie', array(
		    'type' => 'inlineselect',
		    'settings' => 'button_style',
			'label' => 'Button Style',
			'default'     => 'material_square',
			'choices' => array(
				'material_square' => 'Material Square',
				'material_circular' => 'Material Circular',
				'text_effect' => 'Text Effect',
				'rounded_border' => 'Rounded Border'
			),
			'inline_control' => true,
			'section'  => 'cl_styling',
			'transport' => 'postMessage'
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'inlineselect',
		    'settings' => 'button_layout',
			'label' => 'Button Size Layout',
			'default'     => 'medium',
			'choices' => array(
				'extra-small' => 'Extra Small',
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large',
				'extra-large' => 'Extra Large',
			),
			'inline_control' => true,
			'section'  => 'cl_styling',
			'transport' => 'postMessage'
    	));


    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'inlineselect',
		    'settings' => 'button_font',
			'label' => 'Button Font',
			'default'     => 'medium',
			'choices' => array(
				'extra-small' => 'Extra Small',
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large',
				'extra-large' => 'Extra Large',
				'custom' => 'Custom',
			),
			'inline_control' => true,
			'section'  => 'cl_styling',
			'transport' => 'postMessage'
    	));


    	Kirki::add_field( 'cl_folie', array(
			'type'        => 'typography',
			'settings'    => 'button_font_custom',
			'label'       => esc_attr__( 'Button Typography', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => array(
				'letter-spacing' => '0.05em',
				'font-weight' => '600',
				'text-transform' => 'uppercase',
				'font-size' => '12px'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '.cl-btn.btn-font-custom'
				),

			),
			'active_callback'    => array(
				array(
					'setting'  => 'button_font',
					'operator' => '==',
					'value'    => 'custom',
					'transport' => 'postMessage'
				),
								
			),
		));

    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'button_bg_color',
			'label' => 'Button BG Color',
			'default' => '#0CABD3',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary)',
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'button_font_color',
			'label' => 'Button Font Color',
			'default' => '#ffffff',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary)',
					'property' => 'color'
				),
				
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'button_border_color',
			'label' => 'Button Border Color',
			'description' => 'Works only on button styles that support border color',
			'default' => 'rgba(0,0,0,0)',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary)',
					'property' => 'border-color'
				),
				
			),
		    'transport' => 'auto',
		    'active_callback'    => array(
				array(
					'setting'  => 'button_style',
					'operator' => '==',
					'value'    => 'rounded_border',
					'transport' => 'postMessage'
				),
								
			),
    	));

    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'number',
		    'settings' => 'button_border_width',
			'label' => 'Button Border Width',
			'description' => 'Works only on button styles that support border color',
			'default' => '1',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary)',
					'property' => 'border-width',
					'suffix' => 'px'
				),
				
			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
			),
		    'transport' => 'auto',
		    'active_callback'    => array(
				array(
					'setting'  => 'button_style',
					'operator' => '==',
					'value'    => 'rounded_border',
					'transport' => 'postMessage'
				),
								
			),
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'button_bg_color_hover',
			'label' => 'Button Hover BG Color',
			'default' => 'rgba(12,171,211,0.85)',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary):hover',
					'property' => 'background-color'
				),
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'button_font_color_hover',
			'label' => 'Button Hover Font Color',
			'default' => '#ffffff',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary):hover',
					'property' => 'color'
				),
				
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'button_border_color_hover',
			'label' => 'Button Hover Border Color',
			'description' => 'Works only on button styles that support border color',
			'default' => 'rgba(0,0,0,0)',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary):hover',
					'property' => 'border-color'
				),
				
			),
		    'transport' => 'auto',
		    'active_callback'    => array(
				array(
					'setting'  => 'button_style',
					'operator' => '==',
					'value'    => 'rounded_border',
					'transport' => 'postMessage'
				),
								
			),
    	));

    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'button_bg_color_light',
			'label' => 'Light Button BG Color',
			'default' => '#0CABD3',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text .cl-btn, .header_container.cl-header-light:not(.cl-responsive-header) .cl-btn',
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'button_font_color_light',
			'label' => 'Light Button Font Color',
			'default' => '#ffffff',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text .cl-btn, .header_container.cl-header-light:not(.cl-responsive-header) .cl-btn',
					'property' => 'color'
				),
				
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'button_border_color_light',
			'label' => 'Light Button Border Color',
			'description' => 'Works only on button styles that support border color',
			'default' => 'rgba(0,0,0,0)',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text .cl-btn, .header_container.cl-header-light:not(.cl-responsive-header) .cl-btn',
					'property' => 'border-color'
				),
				
			),
		    'transport' => 'auto',
		    'active_callback'    => array(
				array(
					'setting'  => 'button_style',
					'operator' => '==',
					'value'    => 'rounded_border',
					'transport' => 'postMessage'
				),
								
			),
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'button_bg_color_hover_light',
			'label' => 'Light Button Hover BG Color',
			'default' => 'rgba(12,171,211,0.85)',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text .cl-btn:hover, .header_container.cl-header-light:not(.cl-responsive-header) .cl-btn:hover',
					'property' => 'background-color'
				),
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'button_font_color_hover_light',
			'label' => 'Light Button Hover Font Color',
			'default' => '#ffffff',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text .cl-btn:hover, .header_container.cl-header-light:not(.cl-responsive-header) .cl-btn:hover',
					'property' => 'color'
				),
				
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'color',
		    'settings' => 'button_border_color_hover_light',
			'label' => 'Light Button Hover Border Color',
			'description' => 'Works only on button styles that support border color',
			'default' => 'rgba(0,0,0,0)',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-light .cl-btn, .header_container.cl-header-light:not(.cl-responsive-header) .cl-btn:hover',
					'property' => 'border-color'
				),
				
			),
		    'transport' => 'auto',
		    'active_callback'    => array(
				array(
					'setting'  => 'button_style',
					'operator' => '==',
					'value'    => 'rounded_border',
					'transport' => 'postMessage'
				),
								
			),
    	));
    	
    	Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'widget_typo',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'widget_title',
		    'label'    => __( 'Widgets', 'folie' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'typography',
			'settings'    => 'widgets_title_typography',
			'label'       => esc_attr__( 'Widgets Typography', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => array(
				'font-family'    => 'Poppins',
				'letter-spacing' => '0.05em',
				'font-weight' => '600',
				'text-transform' => 'uppercase',
				'font-size' => '12px'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'postMessage',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'widgets_title_typography' )
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'color',
			'settings'    => 'aside_title_widget',
			'label'       => esc_attr__( 'Sidebar Widget Title', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#303133',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'aside .widget-title',
					'property' => 'color'
				),

			)
		));
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'aside_widget_distance',
			'label'       => esc_attr__( 'Distance between widgets', 'folie' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '35',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'aside .widget',
					'units'  => 'px',
					'property' => 'padding-top'
				),
				array(
					'element' => 'aside .widget',
					'units'  => 'px',
					'property' => 'padding-bottom'
				),

			)
		));
    	
    	
    	Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'style_footer',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'style_footer_title',
		    'label'    => __( 'Footer', 'folie' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		
		



		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'style_copyright',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_folie', array(
		    
		    'settings' => 'style_copyright_title',
		    'label'    => __( 'Copyright', 'folie' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		
		
		

?>