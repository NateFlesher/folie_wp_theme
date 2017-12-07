<?php

Kirki::add_section( 'cl_blog', array(
	    'priority'    => 10,
	    'type' => '',
	    'title'       => __( 'Blog', 'folie' ),
	    'description' => __( 'All Blog Styles and options', 'folie' ),
	) );


		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_style',
			'label'    => __( 'Blog Style', 'folie' ),
			'description' => __( 'Select one of the blog styles that you want to use as a default template', 'folie' ),
			'section'  => 'cl_blog',
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
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_grid_layout',
			'label'    => __( 'Grid Layout', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => '4',
			'choices' => array(
				'2'	=> '2 Columns',
				'3'	=> '3 Columns',
				'4'	=> '4 Columns',
				'5'	=> '5 Columns',
			),
			'transport' => 'postMessage',
			'active_callback'    => array(
				array(
					'setting'  => 'blog_style',
					'operator' => '==',
					'value'    => array('grid', 'masonry'),
					'transport' => 'postMessage'
				),
								
			),
		) );
		
		Kirki::add_field( 'cl_folie', array(
		    'type' => 'slider',
		    'settings' => 'blog_grid_transition_duration',
			'label' => 'Grid Transition Duration',
			'default' => '0.4',
			'choices'     => array(
			'min'  => '0.0',
			'max'  => '5',
			'step' => '0.1',
							),
			'inline_control' => true,
			'section'  => 'cl_blog',
			'active_callback'    => array(
				array(
					'setting'  => 'blog_style',
					'operator' => '==',
					'value'    => array('grid', 'masonry'),
					'transport' => 'postMessage'
				),
								
			),
    	));
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_boxed',
			'label'    => __( 'Boxed (with shadow)', 'folie' ),
			'description' => __( 'Enable if you want to make this style boxed with small shadow around', 'folie' ),
			'section'  => 'cl_blog',
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
		    'type' => 'inlineselect',
		    'settings' => 'blog_button_style',
			'label' => 'Blog Button Style',
			'description' => 'Change from default to another style if you want to use another button style on blog',
			'default'     => 'material',
			'choices' => array(
				'default' => 'Default',
				'material' => 'Material',
				'text-effect' => 'Text Effect'
			),
			'inline_control' => true,
			'section'  => 'cl_styling',
			'transport' => 'postMessage'
    	));

		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_animation',
			'label'    => __( 'Animation Type', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'none',
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
			'settings' => 'blog_layout',
			'label'    => __( 'Blog Page Layout', 'folie' ),
			'description' => __( 'Overwrite the default all pages layout option, set a custom layout for blog', 'folie' ),
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'right_sidebar',
			'choices'     => array(
			    'none'  => esc_attr__( 'Use Default', 'folie' ),
				'fullwidth'  => esc_attr__( 'Fullwidth', 'folie' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'folie' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'folie' ),
				'dual_sidebar'  => esc_attr__( 'Dual Sidebar', 'folie' )
			),
		) );

		

		Kirki::add_field( 'cl_folie', array(
		    'type' => 'slider',
		    'settings' => 'blog_width',
			'label' => __( 'Set the exact blog width', 'folie' ),
			'description' => __( 'Set a custom width in percentage for your blog', 'folie' ),
			'default' => 100,
			'choices'     => array(
				'min'  => '20',
				'max'  => '100',
				'step' => '1',
			),
			'inline_control' => true,
			'section'  => 'cl_blog',
			'output' => array(
				array(
					'element' => '#blog-entries.blog_page',
					'units' => '%',
					'property' => 'width',
					'media_query' => '@media (min-width: 992px)'
				)
			),

			'transport' => 'auto'

    	));

    	Kirki::add_field( 'cl_folie', array(
		    'type' => 'inlineselect',
		    'settings' => 'blog_align',
			'label' => __( 'Set Blog Align', 'folie' ),
			'description' => __( 'Blog align', 'folie' ),
			'default' => 'center',
			'choices'     => array(
				
				'left'  => esc_attr__('left', 'folie' ),
				'center' => esc_attr__('center', 'folie' ),
				'right' => esc_attr__('right', 'folie' ),
			),
			'inline_control' => true,
			'section'  => 'cl_blog',
			'selector' => '#blog-entries',
			'selectClass' => '',

			'transport' => 'postMessage'

    	));

    	Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_archive_layout',
			'label'    => __( 'Blog Archives Layout', 'folie' ),
			'description' => __( 'Archives & Categories Layout', 'folie' ),
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'fullwidth',
			'choices'     => array(
			    'none'  => esc_attr__( 'Use Default', 'folie' ),
				'fullwidth'  => esc_attr__( 'Fullwidth', 'folie' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'folie' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'folie' ),
				'dual_sidebar'  => esc_attr__( 'Dual Sidebar', 'folie' )
			),
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_post_layout',
			'label'    => __( 'Blog Posts Layout', 'folie' ),
			'description' => __( 'Change the layout of blog posts, you can add custom sidebar for posts also.', 'folie' ),
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'right_sidebar',
			'choices'     => array(
				'fullwidth'  => esc_attr__( 'Fullwidth', 'folie' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'folie' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'folie' )
			),
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_post_style',
			'label'    => __( 'Blog Posts Style', 'folie' ),
			'description' => __( 'Change the style of blog posts, you can add custom style for each post.', 'folie' ),
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'modern',
			'choices'     => array(
				'classic'  => esc_attr__( 'Classic', 'folie' ),
				'modern'  => esc_attr__( 'Modern', 'folie' ),
				'custom'  => esc_attr__( 'Custom ( Build with Page Builder )', 'folie' )
			),
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_excerpt',
			'label'    => __( 'Enable auto excerpt', 'folie' ),
			'description' => __( 'If enabled you will see only a small part of content. If disabled all post will show', 'folie' ),
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			

		) );
		
		Kirki::add_field( 'cl_folie', array(
			'type'        => 'number',
			'settings'    => 'blog_excerpt_length',
			'label'       => esc_attr__( 'Excerpt Length', 'folie' ),
			'section'     => 'cl_blog',
			'into_group' => true,
			'default'     => '62',
			'priority'    => 10,
			
		));
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_share_buttons',
			'label'    => __( 'Blog Share Buttons', 'folie' ),
			'description' => __( 'Select Social share buttons that you want to use on blog page', 'folie' ),
			'section'  => 'cl_blog',
			'type'     => 'select',
			'multiple' => 6,
			'priority' => 10,
			'default'  => array('twitter', 'facebook'),
			'choices'     => array(
				'twitter'  => esc_attr__( 'Twitter', 'folie' ),
				'facebook'  => esc_attr__( 'facebook', 'folie' ),
				'google'  => esc_attr__( 'Google', 'folie' ),
				'whatsapp'  => esc_attr__( 'Whatsapp', 'folie' ),
				'linkedin'  => esc_attr__( 'LinkedIn', 'folie' ),
				'pinterest'  => esc_attr__( 'Pinterest', 'folie' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_share_buttons' => array(
		            'selector'            => '.entry-tool-share',
		            'render_callback'     => 'codeless_get_entry_tool_share'
		        ),
		    ),
		) );
		
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_overlay',
			'label'    => __( 'Blog Overlay Style', 'folie' ),
			'description' => __( 'Select the style of overlay of blog image on hover', 'folie' ),
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'color',
			'choices'     => array(
				'none'  => esc_attr__( 'None', 'folie' ),
				'color'  => esc_attr__( 'Color Overlay', 'folie' ),
				'zoom_color'  => esc_attr__( 'Zoom and Color', 'folie' ),
				'grayscale'  => esc_attr__( 'Grayscale', 'folie' ),
			),
			'transport' => 'refresh'
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_entry_overlay_icon',
			'label'    => __( 'Overlay Icon', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'arrow-right',
			'choices'     => array(
				'plus2'  => esc_attr__( 'Plus', 'folie' ),
				'arrow-right'  => esc_attr__( 'Arrow Right', 'folie' ),
				'expand2'  => esc_attr__( 'Expand', 'folie' ),
				'image2'  => esc_attr__( 'Image', 'folie' ),
				'lightbox' => esc_attr__( 'Lightbox', 'folie' ),
			),
			'transport' => 'postMessage'
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_image_link',
			'label'    => __( 'Entry Image Link', 'folie' ),
			'description' => __( 'Disable if you dont want that image linked with post', 'folie' ),
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_filters',
			'label'    => __( 'Blog Page Filterable', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'disabled',
			'choices'     => array(
				'disabled'  => esc_attr__( 'Disabled', 'folie' ),
				'small'  => esc_attr__( 'Small Square', 'folie' ),
				'fullwidth'  => esc_attr__( 'Fullwidth', 'folie' )
			),
			'transport' => 'postMessage'
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_filters_color',
			'label'    => __( 'Filter BG', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'dark',
			'choices' => array(
				'dark'	=> 'Dark',
				'light'	=> 'Light'
			),
			'transport' => 'postMessage',
			'active_callback'    => array(
				array(
					'setting'  => 'blog_filters',
					'operator' => '==',
					'value'    => array('fullwidth'),
					'transport' => 'postMessage'
				),
								
			),
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_lazyload',
			'label'    => __( 'Blog Lazyload', 'folie' ),
			
			'section'  => 'cl_blog',
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
		    		
		   'settings' => 'blog_divider_1',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'blog_post_meta',
		   'label'    => __( 'Post Entry Meta', 'folie' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_entry_meta_author',
			'label'    => __( 'Show Author Meta', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_meta_author' => array(
		            'selector'            => '.entry-meta',
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'meta' );
		            }
		        ),
		    ),
			
		) );
		
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_entry_meta_categories',
			'label'    => __( 'Show Categories Meta', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_meta_categories' => array(
		            'selector'            => '.entry-meta',
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'meta' );
		            }
		        ),
		    ),
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_entry_meta_date',
			'label'    => __( 'Show Date Meta', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_meta_date' => array(
		            'selector'            => '.entry-meta',
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'meta' );
		            }
		        ),
		    ),
		) );
		
		
		Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'blog_divider_2',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'blog_post_tools',
		   'label'    => __( 'Post Entry Tools', 'folie' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_entry_tools_share',
			'label'    => __( 'Show Share Buttons', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_tools_share' => array(
		            'selector'            => '.entry-tools',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'tools' );
		            }
		        ),
		    ),
		) );
		
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_entry_tools_comments_count',
			'label'    => __( 'Show Comments Count', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_tools_comments_count' => array(
		            'selector'            => '.entry-tools',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'tools' );
		            }
		        ),
		    ),
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_entry_tools_likes',
			'label'    => __( 'Show Post Likes', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_tools_likes' => array(
		            'selector'            => '.entry-tools',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'tools' );
		            }
		        ),
		    ),
		) );
		
		
		Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'blog_divider_4',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'blog_pagination',
		   'label'    => __( 'Pagination', 'folie' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_pagination_style',
			'label'    => __( 'Pagination Style', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'numbers',
			'choices'     => array(
				'numbers'  => esc_attr__( 'With Page Numbers', 'folie' ),
				'next_prev'  => esc_attr__( 'Next/Prev', 'folie' ),
				'load_more'  => esc_attr__( 'Load More Button', 'folie' ),
				'infinite_scroll'  => esc_attr__( 'Infinite Scroll', 'folie' ),
				
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_pagination_style' => array(
		            'selector'            => '.cl-blog-pagination',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	codeless_blog_pagination();
		            }
		        ),
		    ),
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_pagination_align',
			'label'    => __( 'Pagination Align', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'center',
			'transport' => 'postMessage',
			'choices'     => array(
				'left'  => esc_attr__( 'Left', 'folie' ),
				'center'  => esc_attr__( 'Center', 'folie' ),
				'right'  => esc_attr__( 'Right', 'folie' ),
				
			),
		) );
		
		
		
		
		
		Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'blog_divider_3',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'blog_post_slider',
		   'label'    => __( 'Post Slider', 'folie' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_slider_pagination',
			'label'    => __( 'Enable Slider Pagination', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_slider_nav',
			'label'    => __( 'Enable Slider Prev/Next', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_slider_loop',
			'label'    => __( 'Enable Slider Loop', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_slider_lazyload',
			'label'    => __( 'Enable Slider Lazy Load', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
		) );
		

		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_slider_effect',
			'label'    => __( 'Blog Slider Direction', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'scroll',
			'choices'     => array(
				'scroll'  => esc_attr__( 'Scroll', 'folie' ),
				'fade'  => esc_attr__( 'Fade', 'folie' ),
				'cube'  => esc_attr__( 'Cube', 'folie' ),
				'coverflow'  => esc_attr__( 'Coverflow', 'folie' ),
				'flip'  => esc_attr__( 'Flip', 'folie' ),
			),
		) );
		
		
		Kirki::add_field( 'cl_folie', array(
		    'type' => 'slider',
		    'settings' => 'blog_slider_speed',
			'label' => __( 'Blog Slider Speed', 'folie' ),
			'description' => __( 'Leave 0 to remove autoplay', 'folie' ),
			'default' => 0,
			'choices'     => array(
				'min'  => '0',
				'max'  => '5000',
				'step' => '100',
			),
			'inline_control' => true,
			'section'  => 'cl_blog',
			
    	));
		
		
		Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'blog_divider_10',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_folie', array(
		    		
		   'settings' => 'blog_single_blog_title',
		   'label'    => __( 'Single Blog', 'folie' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'blog_post_style',
			'label'    => __( 'Blog Post Style', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'inlineselect',
			'priority' => 10,
			'default'  => 'modern',
			'choices'     => array(
		      'classic'  => esc_attr__( 'Classic', 'folie' ),
		      'modern'  => esc_attr__( 'Modern', 'folie' ),
		      'custom'  => esc_attr__( 'Custom', 'folie' )
		   ),
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'single_blog_share',
			'label'    => __( 'Single Blog Shares', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'single_blog_tags',
			'label'    => __( 'Single Blog Tags', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
		) );
		
		Kirki::add_field( 'cl_folie', array(
			'settings' => 'single_blog_author_box',
			'label'    => __( 'Single Blog Author Info', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'single_blog_related',
			'label'    => __( 'Single Blog Related Posts', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
		) );

		Kirki::add_field( 'cl_folie', array(
			'settings' => 'single_blog_pagination',
			'label'    => __( 'Single Blog Pagination', 'folie' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'folie' ),
				0 => esc_attr__( 'Off', 'folie' ),
			),
		) );


		

?>