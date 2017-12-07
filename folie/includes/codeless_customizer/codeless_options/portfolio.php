<?php

    Kirki::add_panel( 'cl_custom_types', array(
	    'priority'    => 10,
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
		    			'settings' => 'portfolio_style',
		    			'label'    => __( 'Portfolio Style', 'folie' ),
		    			'description' => __( 'Select style of portfolio pages', 'folie' ),
		    			'section'  => 'cl_custom_portfolio',
		    			'type'     => 'inlineselect',
						'priority' => 10,
						'default'  => 'default',
						'choices'     => array(
							'default'  => esc_attr__( 'Default', 'folie' ),
							'alternate'  => esc_attr__( 'Alternate', 'folie' ),
							'minimal'  => esc_attr__( 'Minimal', 'folie' ),
							'timeline'  => esc_attr__( 'Timeline', 'folie' ),
							'grid'  => esc_attr__( 'Grid', 'folie' ),
							'masonry' => esc_attr__( 'Masonry', 'folie' ),
						),
		    			'transport' => 'postMessage',
		
		    		) );

?>