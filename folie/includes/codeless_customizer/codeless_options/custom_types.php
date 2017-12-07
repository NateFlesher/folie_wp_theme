<?php

    Kirki::add_panel( 'cl_custom_types', array(
	    'priority'    => 20,
	    'type' => '',
	    'title'       => __( 'Custom Types', 'folie' ),
	    'description' => __( 'All Custom Types Options', 'folie' ),
	) );
	    
	    
	    Kirki::add_section( 'cl_custom_portfolio', array(
    	    'title'          => __( 'Portfolio', 'folie' ),
    	    'description'    => __( 'All Portfolio Page and single options', 'folie' ),
    	    'panel'          => 'cl_custom_types',
    	    'type'			 => '',
    	    'priority'       => 160,
    	    'capability'     => 'edit_theme_options'
    	) );

    	Kirki::add_section( 'cl_custom_staff', array(
    	    'title'          => __( 'Staff', 'folie' ),
    	    'description'    => __( 'All Staff (Members) options', 'folie' ),
    	    'panel'          => 'cl_custom_types',
    	    'type'			 => '',
    	    'priority'       => 160,
    	    'capability'     => 'edit_theme_options'
    	) );
 
    	Kirki::add_section( 'cl_custom_testimonial', array(
    	    'title'          => __( 'Testimonial', 'folie' ),
    	    'description'    => __( 'All Testimonial options', 'folie' ),
    	    'panel'          => 'cl_custom_types',
    	    'type'			 => '',
    	    'priority'       => 160,
    	    'capability'     => 'edit_theme_options'
    	) );
    	

    	Kirki::add_field( 'cl_folie', array(

			'settings' => 'portfolio_slug',
			'label'    => __( 'Portfolio Slug', 'folie' ),
			'description' => __( 'Used as prefix for portfolio items links', 'folie' ),
			'section'  => 'cl_custom_portfolio',
			'type'     => 'text',
			'default'  => 'portfolio_items',
			'transport' => 'postMessage'

			) );

    	Kirki::add_field( 'cl_folie', array(
			'settings' => 'single_portfolio_navigation',
			'label'    => __( 'Single Portfolio Nav ', 'folie' ),
			'description' => __( 'Turn On / Off Portfolio Navigation functionalities', 'folie' ),
			'section'  => 'cl_custom_portfolio',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'Enable', 'folie' ),
				0 => esc_attr__( 'Disable', 'folie' ),
			),
		) );

			
			

?>