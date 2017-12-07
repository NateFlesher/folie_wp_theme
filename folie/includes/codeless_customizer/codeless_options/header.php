<?php

/* Header Options ---------------------------------------- */


Kirki::add_panel('cl_header', array(
	'priority' => 10,
	'type' => '',
	'title' => __('Header', 'folie') ,
	'description' => __('All Header Options', 'folie') ,
));



/* -------------------- Layout --------------------- */

Kirki::add_section('cl_header_general', array(
	'title' => __('Layout', 'folie') ,
	'description' => __('General Header Layout, global header options', 'folie') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_container',
	'label' => __('Header Stretch', 'folie') ,
	'section' => 'cl_header_general',
	'type' => 'inlineselect',
	'default' => 'container',
	'priority' => 10,
	'choices' => array(
		'container' => esc_attr__('Into Container', 'folie') ,
		'container-fluid' => esc_attr__('Fullwidth', 'folie') ,
	) ,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_layout',
	'label' => __('Header Layout', 'folie') ,
	'description' => __('Select type of header to use', 'folie') ,
	'section' => 'cl_header_general',
	'type' => 'inlineselect',
	'default' => 'top',
	'priority' => 10,
	'choices' => array(
		'top' => esc_attr__('Top', 'folie') ,
		'left' => esc_attr__('Left', 'folie') ,
		'right' => esc_attr__('Right', 'folie') ,
		'bottom' => esc_attr__('Bottom', 'folie') ,
	) ,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_folie', array(
	'settings' => 'logo_position_left',
	'label' => __('Logo Position', 'folie') ,
	'description' => __('Select the position (alignment) of logo', 'folie') ,
	'section' => 'cl_header_general',
	'type' => 'inlineselect',
	'default' => 'center',
	'priority' => 10,
	'choices' => array(
		'flex-start' => 'Left',
		'center' => 'Center',
		'flex-end' => 'Right',
	) ,
	'active_callback' => array(
		array(
			'setting' => 'header_layout',
			'operator' => '==',
			'value' => array(
				'left',
				'right'
			) ,
			'transport' => 'postMessage'
		) ,
	) ,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.cl-h-cl_header_logo',
			'property' => 'justify-content'
		)
	)
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_forced_center',
	'label' => __('Force Center, Middle Column', 'folie') ,
	'description' => __('Switch On to force the middle column of the main Header Row to be centered.', 'folie') ,
	'section' => 'cl_header_general',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'folie') ,
		0 => esc_attr__('Off', 'folie') ,
	) ,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_boxed',
	'label' => __('Boxed (Outter) Header', 'folie') ,
	'section' => 'cl_header_general',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'folie') ,
		0 => esc_attr__('Off', 'folie') ,
	) ,
	'transport' => 'postMessage'
));




/* -------------------------- Logo ----------------------------- */

Kirki::add_section('cl_header_logo', array(
	'title' => __('Logo', 'folie') ,
	'description' => __('Logo Options', 'folie') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_folie', array(
	'settings' => 'logo_type',
	'label' => __('Logo Type', 'folie') ,
	'description' => __('Select font or image logo type', 'folie') ,
	'section' => 'cl_header_logo',
	'type' => 'inlineselect',
	'default' => 'image',
	'priority' => 10,
	'into_group' => true,
	'choices' => array(
		'font' => esc_attr__('Font Logo', 'folie') ,
		'image' => esc_attr__('Image Logo', 'folie')
	) ,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo_refresh_type' => array(
			'selector' => '#logo',
			'container_inclusive' => true,
			'render_callback' =>
			function ()
				{
				echo codeless_load_header_element('cl_header_logo');
				}

			,
		)
	)
));

Kirki::add_field('cl_folie', array(
	'settings' => 'logo',
	'label' => __('Default Logo', 'folie') ,
	'description' => __('Upload here the logo that is placed in top of the page', 'folie') ,
	'section' => 'cl_header_logo',
	'type' => 'image',
	'priority' => 10,
	'default' => get_template_directory_uri() . '/img/logo.png',
	'active_callback' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
			'transport' => 'postMessage'
		) ,
	) ,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo_refresh_default' => array(
			'selector' => '#logo',
			'container_inclusive' => true,
			'render_callback' =>
			function ()
				{
				echo codeless_load_header_element('cl_header_logo');
				}

			,
		)
	)
));

Kirki::add_field('cl_folie', array(
	'settings' => 'logo_light',
	'label' => __('Logo Light', 'folie') ,
	'description' => __('Upload logo that will be shown on dark baackground or header', 'folie') ,
	'section' => 'cl_header_logo',
	'type' => 'image',
	'priority' => 10,
	'default' => get_template_directory_uri() . '/img/logo_light.png',
	'active_callback' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
			'transport' => 'postMessage'
		) ,
	) ,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo_refresh_light' => array(
			'selector' => '#logo',
			'container_inclusive' => true,
			'render_callback' =>
			function ()
				{
				echo codeless_load_header_element('cl_header_logo');
				}

			,
		)
	)
));

Kirki::add_field('cl_folie', array(
	'settings' => 'logo_height',
	'label' => __('Logo Height', 'folie') ,
	'description' => __('Define the Height of your logo', 'folie') ,
	'section' => 'cl_header_logo',
	'type' => 'number',
	'priority' => 10,
	'default' => 20,
	'choices' => array(
		'min' => 10,
		'max' => 300,
		'step' => 1,
	) ,
	'active_callback' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
			'transport' => 'postMessage'
		) ,
	) ,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '#logo img',
			'units' => 'px',
			'property' => 'height'
		)
	) ,
	'js_vars' => array(
		array(
			'suffix' => '!important'
		)
	)
));

Kirki::add_field('cl_folie', array(
	'settings' => 'logo_responsive_div',
	'label' => __('Logo Responsive', 'folie') ,
	'section' => 'cl_header_logo',
	'type' => 'groupdivider',
	'active_callback' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
			'transport' => 'postMessage'
		) ,
	) ,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'logo_responsive',
	'label' => __('Logo Responsive', 'folie') ,
	'section' => 'cl_header_logo',
	'type' => 'grouptitle',
	'active_callback' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
			'transport' => 'postMessage'
		) ,
	) ,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'logo_iphone',
	'label' => __('Logo Additional in iPhone', 'folie') ,
	'description' => __('Upload logo that will be shown only on iPhone', 'folie') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'type' => 'image',
	'priority' => 10,
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
			'transport' => 'postMessage'
		) ,
	) ,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'logo_ipad',
	'label' => __('Logo Additional in iPad', 'folie') ,
	'description' => __('Upload logo that will be shown only on iPad', 'folie') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'type' => 'image',
	'priority' => 10,
	'default' => '',
	'active_callback' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
			'transport' => 'postMessage'
		) ,
	) ,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'logo_height_ipad',
	'label' => __('Logo Height (iPad)', 'folie') ,
	'description' => __('Define the Height of your logo in iPad', 'folie') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'type' => 'number',
	'priority' => 10,
	'default' => 37,
	'choices' => array(
		'min' => 1,
		'max' => 100,
		'step' => 1,
	) ,
	'active_callback' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
			'transport' => 'postMessage'
		) ,
	) ,
	'output' => array(
		array(
			'element' => '#logo img',
			'units' => 'px',
			'property' => 'height',
			'media_query' => '@media (max-width: 991px)'
		)
	)
));

Kirki::add_field('cl_folie', array(
	'settings' => 'logo_height_iphone',
	'label' => __('Logo Height (iPhone)', 'folie') ,
	'description' => __('Define the Height of your logo in iPhone', 'folie') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'type' => 'number',
	'priority' => 10,
	'default' => 37,
	'choices' => array(
		'min' => 1,
		'max' => 100,
		'step' => 1,
	) ,
	'active_callback' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
			'transport' => 'postMessage'
		) ,
	) ,
	'output' => array(
		array(
			'element' => '#logo img',
			'units' => 'px',
			'property' => 'height',
			'media_query' => '@media (max-width: 480px)'
		)
	)
));

Kirki::add_field('cl_folie', array(
	'type' => 'text',
	'settings' => 'logo_font_text',
	'label' => esc_attr__('Logo Font', 'folie') ,
	'section' => 'cl_header_logo',
	'default' => 'Folie',
	'priority' => 10,
	'into_group' => true,
	'active_callback' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'font',
			'transport' => 'postMessage'
		) ,
	) ,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_folie', array(
	'type' => 'typography',
	'settings' => 'logo_font',
	'label' => esc_attr__('Logo Font Typography', 'folie') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'default' => array(
		'font-family' => 'Poppins',
		'variant' => '600',
		'font-size' => '28px',
		'line-height' => '',
		'letter-spacing' => '-1',
		'subsets' => array(
			'latin-ext'
		) ,
		'color' => '#222',
		'text-transform' => 'lowercase',
		'text-align' => 'left'
	) ,
	'priority' => 10,
	'transport' => 'postMessage',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('logo_font')
		) ,
	) ,
	'active_callback' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'font',
			'transport' => 'postMessage'
		) ,
	) ,
));


Kirki::add_field('cl_folie', array(
	'settings' => 'logo_font_responsive_color',
	'label' => __('Logo Font Responsive Color', 'folie') ,
	'section' => 'cl_header_logo',
	'type' => 'inlineselect',
	'default' => 'dark',
	'priority' => 10,
	'choices' => array(
		'light' => esc_attr__('Light', 'folie') ,
		'dark' => esc_attr__('Dark', 'folie') ,
	) ,
	'transport' => 'postMessage',
	'active_callback' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'font',
			'transport' => 'postMessage'
		) ,
	) ,
));



/* --------------------- MENU ------------------------------*/

Kirki::add_section('cl_header_menu', array(
	'title' => __('Menu Style', 'folie') ,
	'description' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_folie', array(
	'type' => 'inlineselect',
	'settings' => 'header_menu_style',
	'label' => 'Main Menu Style',
	'description' => 'Select the Main Navigation Items Style',
	'default' => 'simple',
	'choices' => array(
		'simple' => 'Simple',
		'border_top' => 'Border Top',
		'border_bottom' => 'Border Bottom',
		'border_left' => 'Border Left',
		'border_right' => 'Border Right',
		'border_effect' => 'Border Effect',
		'border_effect_two' => 'Border Effect 2',
		'background_color' => 'Background Color'
	) ,
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'transport' => 'postMessage'
));


Kirki::add_field('cl_folie', array(
	'type' => 'slider',
	'settings' => 'header_space_menu',
	'label' => 'Space between Menu Items',
	'default' => 13,
	'choices' => array(
		'min' => '0',
		'max' => '40',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container.header-top nav > ul > li, .header_container.header-bottom nav > ul > li',
			'units' => 'px',
			'property' => 'padding-left',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top nav > ul > li, .header_container.header-bottom nav > ul > li',
			'units' => 'px',
			'property' => 'padding-right',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-left nav > ul > li, .header_container.header-right nav > ul > li, .vertical-menu nav > ul > li',
			'units' => 'px',
			'property' => 'padding-top',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-left nav > ul > li, .header_container.header-right nav > ul > li, .vertical-menu nav > ul > li',
			'units' => 'px',
			'property' => 'padding-bottom',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
));



Kirki::add_field('cl_folie', array(
	'type' => 'inlineselect',
	'settings' => 'header_menu_border_style',
	'label' => 'Border Style',
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
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_menu_border_style') ,
			'property' => 'border-style'
		)
	) ,
	'active_callback' => array(
		array(
			'setting' => 'header_menu_style',
			'operator' => '==',
			'value' => array(
				'border_top',
				'border_bottom',
				'border_left',
				'border_right'
			) ,
			'transport' => 'postMessage'
		) ,
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'slider',
	'settings' => 'header_menu_border_width',
	'label' => 'Border Width',
	'default' => 1,
	'choices' => array(
		'min' => '0',
		'max' => '10',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'transport' => 'postMessage',
	'active_callback' => array(
		array(
			'setting' => 'header_menu_style',
			'operator' => '==',
			'value' => array(
				'border_top',
				'border_bottom',
				'border_left',
				'border_right'
			) ,
			'transport' => 'postMessage'
		) ,
	) ,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_menu_style_full',
	'label' => __('Style over full item', 'folie') ,
	'description' => __('Switch on if you want to apply the style over full menu item or switch off if you want only text to take the style.', 'folie') ,
	'section' => 'cl_header_menu',
	'type' => 'switch',
	'priority' => 10,
	'default' => 1,
	'choices' => array(
		1 => esc_attr__('On', 'folie') ,
		0 => esc_attr__('Off', 'folie') ,
	) ,
	'transport' => 'postMessage',
	'active_callback' => array(
		array(
			'setting' => 'header_menu_style',
			'operator' => '==',
			'value' => array(
				'border_top',
				'border_bottom',
				'border_left',
				'border_right',
				'background_color'
			) ,
			'transport' => 'postMessage'
		) ,
	) ,
));

Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'divider_menu_active',
		   'label'    => '',
		   'section'  => 'cl_header_menu',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'title_menu_active',
		   'label'    => __( 'Hover & Active Item Styles', 'folie' ),
		   'section'  => 'cl_header_menu',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
) );

Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'header_menu_border_color',
	'label' => 'Menu Item Active Border Color',
	'description' => 'Border color on menu item hover. Used on menu styles with borders only.',
	'default' => 'rgba(0,0,0,0.1)',
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'alpha' => true,
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_menu_border_color'),
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'header_menu_background_color',
	'label' => 'Menu Item Active BG Color',
	'description' => 'BG color on menu item hover. Used on menu styles with background only.',
	'default' => '#222',
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'alpha' => true,
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_menu_background_color'),
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'header_menu_font_color',
	'label' => 'Menu Item Active Font Color',
	'description' => 'Font color on menu item hover. Used on menu styles with background only.',
	'default' => '#fff',
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'alpha' => true,
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_menu_font_color'),
			'property' => 'color',
			'suffix' => '!important'
		)
	) ,
	'transport' => 'auto'
));






Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'divider_menu_main',
		   'label'    => '',
		   'section'  => 'cl_header_menu',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'title_menu_main',
		   'label'    => __( 'Main Menu Typography', 'folie' ),
		   'section'  => 'cl_header_menu',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
) );



Kirki::add_field('cl_folie', array(
	'type' => 'typography',
	'settings' => 'menu_font',
	'label' => esc_attr__('Menu Typography', 'folie') ,
	'section' => 'cl_header_menu',
	'into_group' => true,
	'default' => array(
		'font-family' => 'Poppins',
		'variant' => '600',
		'font-size' => '12px',
		'line-height' => '20px',
		'letter-spacing' => '0.5px',
		'color' => '#303133',
		'text-align' => 'center',
		'text-transform' => 'uppercase',
	) ,
	'priority' => 10,
	'transport' => 'postMessage',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('menu_font')
		) ,
	) ,
));


Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'divider_menu_dropdown',
		   'label'    => '',
		   'section'  => 'cl_header_menu',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'title_menu_dropdown',
		   'label'    => __( 'Dropdown Typography', 'folie' ),
		   'section'  => 'cl_header_menu',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
) );


Kirki::add_field('cl_folie', array(
	'type' => 'typography',
	'settings' => 'dropdown_hassubmenu_item',
	'label' => esc_attr__('Dropdown Items with submenu typography', 'folie'),
	'description' => esc_attr__('Except Main Navigation Items', 'folie'),
	'section' => 'cl_header_menu',
	'into_group' => true,
	'default' => array(
		'variant' => '600',
		'font-size' => '12px',
		'line-height' => '20px',
		'letter-spacing' => '0.5px',
		'color' => '#fff',
		'text-transform' => 'uppercase',
	) ,
	'priority' => 10,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => 'nav .codeless_custom_menu_mega_menu h6, nav .menu li ul.sub-menu li.hasSubMenu > a, .cl-mobile-menu nav > ul > li > a'
		) ,
	) ,
));
Kirki::add_field('cl_folie', array(
	'type' => 'typography',
	'settings' => 'dropdown_item_typography',
	'label' => esc_attr__('Dropdown Items typography', 'folie') ,
	'description' => esc_attr( 'All other items without Submenu, Except Main Navigation Items.', 'folie' ),
	'section' => 'cl_header_menu',
	'into_group' => true,
	'default' => array(
		'font-size' => '12px',
		'line-height' => '20px',
		'variant' => '400',
		'letter-spacing' => '0px',
		'color' => '#fff',
		'text-transform' => 'none',
	) ,
	'priority' => 10,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => 'nav .menu li ul.sub-menu li a, .cl-submenu a, .cl-submenu .empty, .tool .header_cart .total'
		) ,
	) ,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_mobile_menu_hamburger_color',
	'label' => __('Mobile Menu Hamburger Color', 'folie') ,
	'section' => 'cl_header_menu',
	'type' => 'inlineselect',
	'default' => 'dark',
	'priority' => 10,
	'choices' => array(
		'light' => esc_attr__('Light', 'folie') ,
		'dark' => esc_attr__('Dark', 'folie') ,
	) ,
	'transport' => 'postMessage',
));


/* ---------------------- MAIN ROW ----------------------------- */

Kirki::add_section('cl_header_main', array(
	'title' => __('Main Header Row', 'folie') ,
	'description' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_design',
	'label' => __('Header Box Design', 'folie') ,
	'section' => 'cl_header_main',
	'type' => 'cssbox',
	'default' => array(
		'border-bottom-width' => '1px'
	) ,
	'into_group' => true,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_folie', array(
	'type' => 'slider',
	'settings' => 'header_space_el',
	'label' => 'Space between elements',
	'default' => 60,
	'choices' => array(
		'min' => '0',
		'max' => '80',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container.header-left > .main .header-el, .header_container.header-right > .main .header-el',
			'units' => 'px',
			'property' => 'margin-bottom',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top > .main .header-el, .header_container.header-bottom > .main .header-el',
			'units' => 'px',
			'property' => 'margin-right',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'slider',
	'settings' => 'header_width',
	'label' => 'Header Width',
	'default' => 260,
	'choices' => array(
		'min' => '100',
		'max' => '700',
		'step' => '5',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'active_callback' => array(
		array(
			'setting' => 'header_layout',
			'operator' => '==',
			'value' => array(
				'left',
				'right'
			) ,
			'transport' => 'postMessage'
		) ,
	) ,
	'transport' => 'postMessage'
));

Kirki::add_field('cl_folie', array(
	'type' => 'slider',
	'settings' => 'header_height',
	'label' => 'Header Height',
	'description' => 'Works on Top, Bottom Layouts or when outter boxed header is actived',
	'default' => 90,
	'choices' => array(
		'min' => '30',
		'max' => '600',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container.header-top > .main, .header_container.header-bottom > .main',
			'units' => 'px',
			'property' => 'height',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top > .main, .header_container.header-bottom > .main',
			'units' => 'px',
			'property' => 'line-height',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_custom_divider',
	'label' => __('Design Options', 'folie') ,
	'section' => 'cl_header_main',
	'type' => 'groupdivider',
	'into_group' => true,
));


Kirki::add_field('cl_folie', array(
	'settings' => 'header_custom_ti',
	'label' => __('Background', 'folie') ,
	'section' => 'cl_header_main',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'header_bg_color',
	'label' => 'Background Color',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_main',
	'alpha' => true,
	'output' => array(
		array(
			'element' => '.header_container > .main, .header_container.header-left, .heaer_container.header-right',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'image',
	'label' => 'Background Image',
	'settings' => 'header_bg_image',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_main',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'background-image'
		)
	),
));

Kirki::add_field('cl_folie', array(
	'type' => 'inlineselect',
	'settings' => 'header_bg_pos',
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
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'background-position'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'inlineselect',
	'settings' => 'header_bg_repeat',
	'label' => 'Background Repeat',
	'default' => 'no-repeat',
	'choices' => array(
		'repeat' => 'repeat',
		'repeat-x' => 'repeat-x',
		'repeat-y' => 'repeat-y',
		'no-repeat' => 'no-repeat'
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'background-repeat'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_border_divider',
	'label' => __('Design Options', 'folie') ,
	'section' => 'cl_header_main',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_border_ti',
	'label' => __('Border', 'folie') ,
	'section' => 'cl_header_main',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_folie', array(
	'type' => 'inlineselect',
	'settings' => 'header_border_style',
	'label' => 'Border Style',
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
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'border-style'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'header_border_color',
	'label' => 'Border Color',
	'default' => 'rgba(235,235,235,0.17)',
	'inline_control' => true,
	'section' => 'cl_header_main',
	'alpha' => true,
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_shadow',
	'label' => __('Add Shadow', 'folie') ,
	'description' => __('Not only border, but add a light shadow that will look awesome on white pages', 'folie') ,
	'section' => 'cl_header_main',
	'type' => 'switch',
	'priority' => 10,
	'default' => 1,
	'choices' => array(
		1 => esc_attr__('On', 'folie') ,
		0 => esc_attr__('Off', 'folie') ,
	) ,
	'transport' => 'postMessage'
));



/* ----------------------------- Top Nav --------------------------------------- */
Kirki::add_section('cl_header_top_row', array(
	'title' => __('Top Navigation Row', 'folie') ,
	'description' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_top_nav',
	'label' => __('Top Header Row', 'folie') ,
	'description' => __('Switch on to active Top Header Navigation Row, than you can add elements.', 'folie') ,
	'section' => 'cl_header_top_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'folie') ,
		0 => esc_attr__('Off', 'folie') ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_top_nav_sticky',
	'label' => __('Show on sticky', 'folie') ,
	'description' => __('Switch on to active Top Header Navigation Row on sticky', 'folie') ,
	'section' => 'cl_header_top_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'folie') ,
		0 => esc_attr__('Off', 'folie') ,
	) ,
	'active_callback' => array(
		array(
			'setting' => 'header_sticky',
			'operator' => '==',
			'value' => true,
			'transport' => 'postMessage'
		) ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_design_top',
	'label' => __('Header Box Design', 'folie') ,
	'section' => 'cl_header_top_row',
	'type' => 'cssbox',
	'default' => array(
		'border-bottom-width' => '0px'
	) ,
	'into_group' => true,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_folie', array(
	'type' => 'slider',
	'settings' => 'header_space_el_top',
	'label' => 'Space between elements',
	'default' => 60,
	'choices' => array(
		'min' => '0',
		'max' => '80',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'output' => array(
		array(
			'element' => '.header_container.header-left > .top_nav .header-el, .header_container.header-right > .top_nav .header-el',
			'units' => 'px',
			'property' => 'margin-bottom',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top > .top_nav .header-el, .header_container.header-bottom > .top_nav .header-el',
			'units' => 'px',
			'property' => 'margin-right',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'slider',
	'settings' => 'header_height_top',
	'label' => 'Height',
	'description' => 'Works on Top, Bottom Layouts or when outter boxed header is actived',
	'default' => 30,
	'choices' => array(
		'min' => '30',
		'max' => '600',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container.header-top > .top_nav, .header_container.header-bottom > .top_nav',
			'units' => 'px',
			'property' => 'height',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top > .top_nav, .header_container.header-bottom > .top_nav',
			'units' => 'px',
			'property' => 'line-height',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
));


Kirki::add_field('cl_folie', array(
	'settings' => 'header_typography_divider_top',
	'label' => __('Typography', 'folie') ,
	'section' => 'cl_header_top_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_custom_typography_top',
	'label' => __('Typography', 'folie') ,
	'section' => 'cl_header_top_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_overwrite_typography',
	'label' => __('Overwrite Default Typography', 'folie') ,
	'description' => __('Switch on to active custom typography for top navigation', 'folie') ,
	'section' => 'cl_header_top_row',
	'type' => 'switch',
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'folie') ,
		0 => esc_attr__('Off', 'folie') ,
	) ,
	'transport' => 'postMessage'
));

Kirki::add_field('cl_folie', array(
	'type' => 'typography',
	'settings' => 'header_top_typography',
	'label' => 'Typography Style',
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
		'letter-spacing' => '0',
		'font-weight' => '400',
		'text-transform' => 'none',
		'font-size' => '14px',
		'color' => '#6a6a6a'
	),
	'priority'    => 10,
	'transport' => 'postMessage',
	'output'      => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_top_typography'),
		),

	),
	'active_callback' => array(
		array(
			'setting' => 'header_overwrite_typography',
			'operator' => '==',
			'value' => true,
			'transport' => 'postMessage'
		) ,
	)
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_custom_divider_top',
	'label' => __('Design Options', 'folie') ,
	'section' => 'cl_header_top_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_custom_ti_top',
	'label' => __('Background', 'folie') ,
	'section' => 'cl_header_top_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'header_bg_color_top',
	'label' => 'Background Color',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'alpha' => true,
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'image',
	'label' => 'Background Image',
	'settings' => 'header_bg_image_top',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'background-image'
		)
	) ,
));

Kirki::add_field('cl_folie', array(
	'type' => 'inlineselect',
	'settings' => 'header_bg_pos_top',
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
	'section' => 'cl_header_top_row',
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'background-position'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'inlineselect',
	'settings' => 'header_bg_repeat_top',
	'label' => 'Background Repeat',
	'default' => 'no-repeat',
	'choices' => array(
		'repeat' => 'repeat',
		'repeat-x' => 'repeat-x',
		'repeat-y' => 'repeat-y',
		'no-repeat' => 'no-repeat'
	) ,
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'background-repeat'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_border_divider_top',
	'label' => __('Design Options', 'folie') ,
	'section' => 'cl_header_top_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_border_ti_top',
	'label' => __('Border', 'folie') ,
	'section' => 'cl_header_top_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_folie', array(
	'type' => 'inlineselect',
	'settings' => 'header_border_style_top',
	'label' => 'Border Style',
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
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'border-style'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'header_border_color_top',
	'label' => 'Border Color',
	'default' => 'rgba(235,235,235,0.17)',
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'alpha' => true,
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));






/* ----------------------------- Extra Row --------------------------------------- */

Kirki::add_section('cl_header_extra_row', array(
	'title' => __('Extra (Bottom) Row', 'folie') ,
	'description' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_extra',
	'label' => __('Extra Header Row', 'folie') ,
	'description' => __('Switch on to active Extra Header Navigation Row, than you can add elements.', 'folie') ,
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'folie') ,
		0 => esc_attr__('Off', 'folie') ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_design_extra',
	'label' => __('Box Design', 'folie') ,
	'section' => 'cl_header_extra_row',
	'type' => 'cssbox',
	'default' => array(
		'border-bottom-width' => '0px'
	) ,
	'into_group' => true,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_folie', array(
	'type' => 'slider',
	'settings' => 'header_space_el_extra',
	'label' => 'Space between elements',
	'default' => 60,
	'choices' => array(
		'min' => '0',
		'max' => '80',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'output' => array(
		array(
			'element' => '.header_container.header-left > .extra_row .header-el, .header_container.header-right > .extra_row .header-el',
			'units' => 'px',
			'property' => 'margin-bottom',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top > .extra_row .header-el, .header_container.header-bottom > .extra_row .header-el',
			'units' => 'px',
			'property' => 'margin-right',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'slider',
	'settings' => 'header_height_extra',
	'label' => 'Height',
	'description' => 'Works on Top, Bottom Layouts or when outter boxed header is actived',
	'default' => 40,
	'choices' => array(
		'min' => '30',
		'max' => '600',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container.header-top > .extra_row, .header_container.header-bottom > .extra_row',
			'units' => 'px',
			'property' => 'height'
		) ,
		array(
			'element' => '.header_container.header-top > .extra_row, .header_container.header-bottom > .extra_row',
			'units' => 'px',
			'property' => 'line-height'
		)
	) ,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_custom_divider_extra',
	'label' => __('Design Options', 'folie') ,
	'section' => 'cl_header_extra_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_custom_ti_extra',
	'label' => __('Background', 'folie') ,
	'section' => 'cl_header_extra_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'header_bg_color_extra',
	'label' => 'Background Color',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'alpha' => true,
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'image',
	'label' => 'Background Image',
	'settings' => 'header_bg_image_extra',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'background-image'
		)
	) ,
));

Kirki::add_field('cl_folie', array(
	'type' => 'inlineselect',
	'settings' => 'header_bg_pos_extra',
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
	'section' => 'cl_header_extra_row',
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'background-position'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'inlineselect',
	'settings' => 'header_bg_repeat_extra',
	'label' => 'Background Repeat',
	'default' => 'no-repeat',
	'choices' => array(
		'repeat' => 'repeat',
		'repeat-x' => 'repeat-x',
		'repeat-y' => 'repeat-y',
		'no-repeat' => 'no-repeat'
	) ,
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'background-repeat'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_border_divider_extra',
	'label' => __('Design Options', 'folie') ,
	'section' => 'cl_header_extra_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_border_ti_extra',
	'label' => __('Border', 'folie') ,
	'section' => 'cl_header_extra_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_folie', array(
	'type' => 'inlineselect',
	'settings' => 'header_border_style_extra',
	'label' => 'Border Style',
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
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'border-style'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'header_border_color_extra',
	'label' => 'Border Color',
	'default' => 'rgba(235,235,235,0.17)',
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'alpha' => true,
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));



Kirki::add_field('cl_folie', array(
	'settings' => 'header_extra_nav_sticky',
	'label' => __('Show on sticky', 'folie') ,
	'description' => __('Switch on to active Top Header Navigation Row on sticky', 'folie') ,
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'folie') ,
		0 => esc_attr__('Off', 'folie') ,
	) ,
	'active_callback' => array(
		array(
			'setting' => 'header_sticky',
			'operator' => '==',
			'value' => true,
			'transport' => 'postMessage'
		) ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_folie', array(
	'settings' => 'header_extra_row_sticky',
	'label' => __('Show on sticky', 'folie') ,
	'description' => __('Switch on to active Extra Header Row Row on sticky', 'folie') ,
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'folie') ,
		0 => esc_attr__('Off', 'folie') ,
	) ,
	'active_callback' => array(
		array(
			'setting' => 'header_sticky',
			'operator' => '==',
			'value' => true,
			'transport' => 'postMessage'
		) ,
	) ,
	'transport' => 'refresh'
));



/* ---------------------------- Dropdown & Mobile -------------------------------- */

Kirki::add_section('cl_header_dropdown', array(
	'title' => __('Dropdown & Mobile Styles', 'folie') ,
	'description' => __('All styles of dropdown, megamenu and mobile', 'folie') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));
Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'dropdown_bg_color',
	'label' => 'Background Color',
	'default' => '#303133',
	'inline_control' => true,
	'section' => 'cl_header_dropdown',
	'alpha' => true,
	'output' => array(
		array(
			'element' => 'nav .codeless_custom_menu_mega_menu, nav .menu > li > ul.sub-menu, nav .menu > li > ul.sub-menu ul, .cl-mobile-menu, .cl-submenu, .tool .tool-link .cart-total',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'dropdown_item_hover_bg',
	'label' => 'Item Hover BG Color',
	'default' => '#383838',
	'inline_control' => true,
	'section' => 'cl_header_dropdown',
	'alpha' => true,
	'output' => array(
		array(
			'element' => 'nav .menu li > ul.sub-menu li:hover, #site-header-cart .cart_list li:hover, #site-header-search input[type="search"]',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));
Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'dropdown_item_hover_color',
	'label' => 'Item Hover Font Color',
	'default' => '#b1b1b1',
	'inline_control' => true,
	'section' => 'cl_header_dropdown',
	'alpha' => true,
	'output' => array(
		array(
			'element' => 'nav .menu li ul.sub-menu li a:hover, #site-header-search input[type="search"]',
			'property' => 'color',
			'suffix' => '!important'
		)
	) ,
	'transport' => 'auto'
));
Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'dropdown_borders_color',
	'label' => 'Separators Color',
	'default' => '#3a3a3a',
	'inline_control' => true,
	'section' => 'cl_header_dropdown',
	'alpha' => true,
	'output' => array(
		array(
			'element' => 'nav .codeless_custom_menu_mega_menu > ul > li, #site-header-cart ul li, #site-header-search input[type="search"]',
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));


/* ----------------- Sticky -------------  */

Kirki::add_section('cl_header_sticky', array(
	'title' => __('Sticky', 'folie') ,
	'description' => __('Make header sticky', 'folie') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));
Kirki::add_field('cl_folie', array(
	'settings' => 'header_sticky',
	'label' => __('Sticky', 'folie') ,
	'description' => __('By switch this option, your header will be sticky', 'folie') ,
	'section' => 'cl_header_sticky',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'folie') ,
		0 => esc_attr__('Off', 'folie') ,
	) ,
	'transport' => 'postMessage'
));
Kirki::add_field('cl_folie', array(
	'type' => 'color',
	'settings' => 'header_sticky_bg',
	'label' => 'Sticky BG Color',
	'default' => '#ffffff',
	'inline_control' => true,
	'section' => 'cl_header_sticky',
	'alpha' => true,
	'output' => array(
		array(
			'element' => '.header_container.cl-header-sticky-ready',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));
Kirki::add_field('cl_folie', array(
	'settings' => 'header_sticky_content',
	'label' => __('Sticky Content Color', 'folie') ,
	'section' => 'cl_header_sticky',
	'type' => 'inlineselect',
	'default' => 'dark',
	'priority' => 10,
	'choices' => array(
		'light' => esc_attr__('Light', 'folie') ,
		'dark' => esc_attr__('Dark', 'folie') ,
	) ,
	'transport' => 'postMessage',
));
Kirki::add_field('cl_folie', array(
	'settings' => 'header_sticky_shadow',
	'label' => __('Add Shadow', 'folie') ,
	'section' => 'cl_header_sticky',
	'type' => 'switch',
	'priority' => 10,
	'default' => 1,
	'choices' => array(
		1 => esc_attr__('On', 'folie') ,
		0 => esc_attr__('Off', 'folie') ,
	) ,
	'transport' => 'postMessage'
));


?>