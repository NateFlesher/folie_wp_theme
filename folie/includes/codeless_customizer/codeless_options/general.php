<?php



	Kirki::add_panel( 'cl_general', array(
	    'priority'    => 10,
	    'type' => '',
	    'title'       => __( 'General', 'folie' ),
	    'description' => __( 'All General Options of theme', 'folie' ),
	) );




	/* General */
	Kirki::add_section( 'cl_general_options', array(
	    'title'          => __( 'Site Options', 'folie' ),
	    'description'    => __( 'Some options about responsive, favicon and other theme features.', 'folie' ),
	    'panel'          => 'cl_general',
	    'type'           => '',
	    'priority'       => 160,
	    'capability'     => 'edit_theme_options'
	) );


		Kirki::add_field( 'cl_folie', array(
			'settings' => 'responsive_layout',
			'label'    => __( 'Responsive Layout', 'folie' ),
			'description' => __( 'Turn On / Off Responsive functionalities', 'folie' ),
			'section'  => 'cl_general_options',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'transport' => 'postMessage',
			'choices'     => array(
				1  => esc_attr__( 'Enable', 'folie' ),
				0 => esc_attr__( 'Disable', 'folie' ),
			),
		) );




		Kirki::add_field( 'cl_folie', array(
			'settings' => 'nicescroll',
			'label'    => __( 'Smooth scroll', 'folie' ),
			'description' => __('Active smoothscroll over pages to make scrolling more fluid to create better user experience', 'folie' ),
			'section'  => 'cl_general_options',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'transport' => 'postMessage',
			'choices'     => array(
				1  => esc_attr__( 'Enable', 'folie' ),
				0 => esc_attr__( 'Disable', 'folie' ),
			),
		) );


		Kirki::add_field( 'cl_folie', array(
			'settings' => 'favicon',
			'label'    => __( 'Favicon', 'folie' ),
			'description' => __( 'Upload favion for website', 'folie' ),
			'section'  => 'cl_general_options',
			'type'     => 'image',
			'default' => '',
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'page_comments',
			'label'    => __( 'Page Comments', 'folie' ),
			'description'    => __( 'Enable this option to active comments in normal pages.', 'folie' ),
			'section'  => 'cl_general_options',
			'type'     => 'switch',
			'priority' => 10,
			'transport' => 'postMessage',
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'Enable', 'folie' ),
				0 => esc_attr__( 'Disable', 'folie' ),
			),
		) );

		/*Kirki::add_field( 'cl_folie', array(
			'settings' => 'theme_disabled_vc',
			'label'    => __( 'VC Theme-Disabled Features', 'folie' ),
			'description'    => __( 'By enable this, all features and elements that are disabled should be enable again.', 'folie' ),
			'section'  => 'cl_general_options',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'Enable', 'folie' ),
				0 => esc_attr__( 'Disable', 'folie' ),
			),
		) );*/

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'back_to_top',
			'label'    => __( 'Back To Top', 'folie' ),
			'description'    => __( 'Enable this option to show the "Back to Top" button on site', 'folie' ),
			'section'  => 'cl_general_options',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'Show', 'folie' ),
				0 => esc_attr__( 'Hide', 'folie' ),
			),
			'transport' => 'postMessage'
		) );

		

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'textarea',
			'settings'    => '404_error_message',
			'label'       => esc_attr__( '404 Error Message', 'folie' ),
			'section'     => 'cl_general_options',
			'default'     => __('It looks like nothing was found at this location. Maybe try a search?', 'folie' ),
			'priority'    => 10,
			
			'active_callback'    => array(
				array(
					'setting'  => 'logo_type',
					'operator' => '==',
					'value'    => 'font',
				),
			),
			'transport' => 'postMessage'
		) );






	

		

	/* Page Transitions */
	Kirki::add_section( 'cl_general_transitions', array(
	    'title'          => __( 'Page Transitions', 'folie' ),
	    'description'    => __( 'Options to enable page transitions with various effects', 'folie' ),
	    'panel'          => 'cl_general',
	    'priority'       => 160,
	    'type'			 => '',
	    'capability'     => 'edit_theme_options'
	) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'codeless_page_transition',
			'label'    => __( 'On/Off Page Transitions', 'folie' ),
			'section'  => 'cl_general_transitions',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'Enable', 'folie' ),
				0 => esc_attr__( 'Disable', 'folie' ),
			),
		) );

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'select',
			'settings'    => 'page_transition_in',
			'label'       => __( 'Page Transition In Effect', 'folie' ),
			'section'     => 'cl_general_transitions',
			'default'     => 'fade-in',
			'priority'    => 10,
			'multiple'    => 1,
			'choices'     => array(
				'fade-in' => 'fade-in',
                'fade-in-up-sm' => 'fade-in-up-sm',
                'fade-in-up' => 'fade-in-up',
                'fade-in-up-lg' => 'fade-in-up-lg',
                'fade-in-down-sm' => 'fade-in-down-sm',
                'fade-in-down-lg' => 'fade-in-down-lg',
                'fade-in-down' => 'fade-in-down',
                'fade-in-left-sm' => 'fade-in-left-sm',
                'fade-in-left' => 'fade-in-left',
                'fade-in-left-lg' => 'fade-in-left-lg',
                'fade-in-right-sm' => 'fade-in-right-sm',
                'fade-in-right' => 'fade-in-right',
                'fade-in-right-lg' => 'fade-in-right-lg',
			),
			
			'active_callback'    => array(
				array(
					'setting'  => 'codeless_page_transition',
					'operator' => '==',
					'value'    => 1,
				),
			),
		) );


		Kirki::add_field( 'cl_folie', array(
			'settings' => 'page_transition_in_duration',
			'label'    => __( 'Page Transition In Duration', 'folie' ),
			'section'  => 'cl_general_transitions',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => 1000,
			'choices'     => array(
				'min' => '0',
				'max' => '10000',
				'step' => '50'
			),
			
			'active_callback'    => array(
				array(
					'setting'  => 'codeless_page_transition',
					'operator' => '==',
					'value'    => 1,
				),
			),
		) );


		Kirki::add_field( 'cl_folie', array(
			'type'        => 'select',
			'settings'    => 'page_transition_out',
			'label'       => __( 'Page Transition Out Effect', 'folie' ),
			'section'     => 'cl_general_transitions',
			'default'     => 'fade-out',
			'priority'    => 10,
			'multiple'    => 1,
			'choices'     => array(
				'fade-out' => 'fade-out',
                'fade-out-up-sm' => 'fade-out-up-sm',
                'fade-out-up' => 'fade-out-up',
                'fade-outout-up-lg' => 'fade-out-up-lg',
                'fade-out-down-sm' => 'fade-out-down-sm',
                'fade-out-down-lg' => 'fade-out-down-lg',
                'fade-out-down' => 'fade-out-down',
                'fade-out-left-sm' => 'fade-out-left-sm',
                'fade-out-left' => 'fade-out-left',
                'fade-out-left-lg' => 'fade-out-left-lg',
                'fade-out-right-sm' => 'fade-out-right-sm',
                'fade-out-right' => 'fade-out-right',
                'fade-out-right-lg' => 'fade-out-right-lg',
			),
			
			'active_callback'    => array(
				array(
					'setting'  => 'codeless_page_transition',
					'operator' => '==',
					'value'    => 1,
				),
			),
		));

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'page_transition_out_duration',
			'label'    => __( 'Page Transition Out Duration', 'folie' ),
			'section'  => 'cl_general_transitions',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => 1000,
			'choices'     => array(
				'min' => '0',
				'max' => '10000',
				'step' => '50'
			),
			
			'active_callback'    => array(
				array(
					'setting'  => 'codeless_page_transition',
					'operator' => '==',
					'value'    => 1,
				),
			),
		) );




	/* Custom Codes */
	Kirki::add_section( 'cl_general_custom_codes', array(
	    'title'          => __( 'Custom Codes', 'folie' ),
	    'description'    => __( 'HTML, JS, CSS custom codes. Add Google Analytics or anything else.', 'folie' ),
	    'panel'          => 'cl_general',
	    'priority'       => 160,
	    'type'			 => '',
	    'capability'     => 'edit_theme_options'
	) );


		Kirki::add_field( 'cl_folie', array(
			'type'        => 'code',
			'settings'    => 'custom_css',
			'label'       => __( 'Custom CSS', 'folie' ),
			'section'     => 'cl_general_custom_codes',
			'default'     => '',
			'priority'    => 10,
			'choices'     => array(
				'language' => 'css',
				'theme'    => 'monokai',
				'height'   => 250,
			),
			'transport' => 'postMessage'
		) );

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'code',
			'settings'    => 'custom_js',
			'label'       => __( 'Custom JS', 'folie' ),
			'section'     => 'cl_general_custom_codes',
			'default'     => '',
			'priority'    => 10,
			'choices'     => array(
				'language' => 'js',
				'theme'    => 'monokai',
				'height'   => 250,
			),
			'transport' => 'postMessage'
		) );

		Kirki::add_field( 'cl_folie', array(
			'type'        => 'code',
			'settings'    => 'custom_html',
			'label'       => __( 'Custom HTML', 'folie' ),
			'section'     => 'cl_general_custom_codes',
			'default'     => '',
			'priority'    => 10,
			'choices'     => array(
				'language' => 'html',
				'theme'    => 'monokai',
				'height'   => 250,
			),
			'transport' => 'postMessage'
		) );
		
		
		
		
		global $cl_theme_mod_defaults;
		/*Kirki::add_field( 'cl_folie', array(
			'type'        => 'codelessheader',
			'settings'    => 'header_builder',
			'label'       => __( 'Header Builder', 'folie' ),
			'section'     => 'cl_general_custom_codes',
			'default'     => $cl_theme_mod_defaults['header_builder'],
			'priority'    => 10,
			'choices'     => array(
				'language' => 'html',
				'theme'    => 'monokai',
				'height'   => 250,
			),
			'transport' => 'postMessage'
	
			
		) );*/
		
		
		

		





?>