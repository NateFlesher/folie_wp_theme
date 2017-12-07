<?php

    global $cl_theme_mod_defaults;


	
	Kirki::add_section( 'cl_codeless_page_builder', array(
	    'title'          => __( 'Page Builder', 'folie' ),
	    'description'    => __( 'Options for adding an additional element on header', 'folie' ),
	    'panel'          => '',
	    'type'			 => '',
	    'priority'       => 160,
	    'capability'     => 'edit_theme_options'
	) );
	
	/* Row */
	
	cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Row', 'folie' ),
			'section'     => 'cl_codeless_page_builder',
			'description' => 'Manage all options of the selected Row',
			//'priority'    => 10,
			'icon'		  => 'icon-software-layout',
			'transport'   => 'postMessage',
			'paddingPositions' => array('top', 'bottom'),
			'settings'    => 'cl_row',
			'is_container' => true,
			'is_root'	  => true,
			'fields' => array(
				
				
				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => 'General',
						'design' => 'Design'
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'General',
					'tabid' => 'general'
				),
				
					/* ----------------------------------------------- */
					
					'row_layout_start' => array(
						'type' => 'group_start',
						'label' => 'Layout',
						'groupid' => 'layout'
					),
						
						
				
						'row_type' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Type', 'folie' ),
							'default'     => 'container',
							'choices' => array(
								'container' => 'Into Container',
								'container-fluid' => 'Stretch Content'
							),
							'selector' => '.cl-row > .container, .cl-row > .container-fluid',
							'selectClass' => ' '
						),
						
						/*'row_vertical_stretch' => array(
							'type'     => 'select',
							'priority' => 10,
							'label'       => esc_attr__( 'Vertical Stretch', 'folie' ),
							'description' => esc_attr__( 'Select the type of row to use, this option can be overrided by Design Tool', 'folie' ),
							'default'     => 'with_padd',
							'choices' => array(
								'with_padd' => 'With Padding',
								'no_padd' => 'No Padding (Fullheigt Stretch)'
							),
							'selector' => '.cl-row > div > .row',
							'selectClass' => ' '
						),*/
						
						'fullheight' => array(
							'type'        => 'switch',
							'label'       => __( 'Full Height Row', 'folie' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl-row > div > .row',
							'addClass' => 'cl_row-fullheight cl_row-flex'
						),
						
						
						
						'content_pos' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Content Position', 'folie' ),
							'description' => esc_attr__( 'Change position of columns and elements into the fullheight Row', 'folie' ),
							'default'     => 'middle',
							'choices' => array(
								'middle' => 'Middle',
								'top' => 'Top',
								'bottom' => 'Bottom',
								'stretch' => 'Stretch'
							),
							'selector' => '.cl-row > div > .row',
							'selectClass' => 'cl_row-cp-',
							
							'cl_required'    => array(
								array(
									'setting'  => 'fullheight',
									'operator' => '==',
									'value'    => 1,
								),
							),
							
						),

						'custom_width_bool' => array(
							'type'        => 'switch',
							'label'       => __( 'Custom Container Width', 'folie' ),
							'description' => 'Switch on to add a custom width for container only for this row. Switch Off to leave the default container width.',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							
						),

						'custom_width' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Container Width', 'folie' ),
							'description' => esc_attr__( 'Is applied only for media screen (min-width: 1200px)', 'folie' ),
							'default'     => codeless_get_mod('layout_container_width', 1100),
							'choices'     => array(
								'min'  => '0',
								'max'  => '1600',
								'step' => '10',
							),
							'suffix' => 'px',
							'selector' => '.cl-row > .container-content',
							'css_property' => 'width',
							'media_query' => '(min-width: 1200px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_width_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

						
					
					'row_layout_end' => array(
						'type' => 'group_end',
						'label' => 'Row Layout',
						'groupid' => 'layout'
					),
					
					/* ----------------------------------------------------- */
					
					'columns_start' => array(
						'type' => 'group_start',
						'label' => 'Columns',
						'groupid' => 'columns'
					),
						
						
						'columns_gap' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Columns Gap', 'folie' ),
							'default'     => '15',
							'choices'     => array(
								'min'  => '0',
								'max'  => '35',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.row > .cl_cl_column > .cl_column, .row > .cl_column',
							'css_property' => array('padding-left', 'padding-right')
						),
						
						
						'equal_height' => array(
							'type'        => 'switch',
							'label'       => __( 'Equal Columns Height', 'folie' ),
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl-row > div > .row',
							'addClass' => 'cl_row-equal_height cl_row-flex'
						), 

						'col_responsive' => array(
							'type'        => 'inline_select',
							'label'       => __( 'Responsive Columns', 'folie' ),
							'description' => 'This option will change the width of columns on tablets sizes from (768px to 992px). Important option to build responsive perfect layouts.',
							'default'     => 'none',
							'priority'    => 10,
							'choices'     => array(
								'none' => 'None',
								'full'  => esc_attr__( 'Fullwidth Columns', 'folie' ),
								'half' => esc_attr__( 'Half Width Columns', 'folie' ),
								'one_third' => esc_attr__( 'One / Third Width Columns', 'folie' ),
							),
							'selector' => '.cl-row > div > .row',
							'selectClass' => 'cl-col-tablet-'
						),
						
					'columns_end' => array(
						'type' => 'group_end',
						'label' => 'Columns',
						'groupid' => 'columns'
					),
					
					/* --------------------------------------------- */
					
					'row_info_start' => array(
						'type' => 'group_start',
						'label' => 'Attributes',
						'groupid' => 'attr'
					),
					
						'row_disabled' => array(
							'type'        => 'switch',
							'label'       => __( 'Disable Row', 'folie' ),
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl-row',
							'addClass' => 'disabled_row'
						),
						
						'row_id' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Row Id', 'folie' ),
							'description' => esc_attr__( 'This is useful when you want to add unique identifier to row.', 'folie' ),
							'default'     => '',
						),
						
						'extra_class' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Extra Class', 'folie' ),
							'description' => esc_attr__( 'Add extra class identifiers to this row, that can be used for various custom styles.', 'folie' ),
							'default'     => '',
						),

						'anchor_label' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Anchor Label', 'folie' ),
							'description' => esc_attr__( 'Used on Vertical Codeless Slider', 'folie' ),
							'default'     => '',
							'selector' => '.cl-row',
							'htmldata' => 'anchor'
						),
						
			
					'row_info_end' => array(
						'type' => 'group_end',
						'label' => 'Attributes',
						'groupid' => 'attr'
					),
					
					/* --------------------------------------------- */
				
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
							'selector' => '.cl-row > .bg-layer'
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
							'selector' => '.cl-row > .bg-layer',
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
							'selector' => '.cl-row > .bg-layer',
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
					
					
					/* ---------------------------------------------- */
				
					
					'video_start' => array(
						'type' => 'group_start',
						'label' => 'Video',
						'groupid' => 'video'
					),
					
					
						'video' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Video Background', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'self' =>	'Self-Hosted',
								'youtube' =>	'Youtube',
								'vimeo' => 'Vimeo'
							),
							'customJS' => 'inlineEdit_videoSection'
						),
						
						'video_mp4' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Video Mp4', 'folie' ),
							
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'self',
								),
							),
							'customJS' => 'inlineEdit_videoSection'
						),
						'video_webm' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Video Webm', 'folie' ),
							
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'self',
								),
							),
							'customJS' => 'inlineEdit_videoSection'
						),
						'video_ogv' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Video Ogv', 'folie' ),
							
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'self',
								),
							),
							'customJS' => 'inlineEdit_videoSection'
						),

						
						'video_youtube' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Youtube ID', 'folie' ),
							
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'youtube',
								),
							
							),
							'customJS' => 'inlineEdit_videoSection'
						),
						
						'video_vimeo' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Vimeo ID', 'folie' ),
							
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'vimeo',
								),
							
							),
							'customJS' => 'inlineEdit_videoSection'
						),
						
						'video_loop' => array(
							'type'        => 'switch',
							'label'       => __( 'Video Loop', 'folie' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'customJS' => 'inlineEdit_videoSection'
						),

					'video_end' => array(
						'type' => 'group_end',
						'label' => 'Video',
						'groupid' => 'video'
					),
					
					/* ----------------------------------------------- */
					
					
					
					
					/* ---------------------------------------------- */
				
					
					'responsive_start' => array(
						'type' => 'group_start',
						'label' => 'Responsive',
						'groupid' => 'responsive'
					),
					
					
						'device_visibility' => array(
							'type'     => 'multicheck',
							'priority' => 10,
							'label'       => esc_attr__( 'Devices Visibility', 'folie' ),
							
							'default'     => '',
							'choices' => array(
								'hidden-xs' => esc_attr__( 'Hide on Phones (less-than-768px)', 'folie' ),
								'hidden-sm' => esc_attr__( 'Hide on Tables (large-then-768px)', 'folie' ),
								'hidden-md' => esc_attr__( 'Hide on Medium Desktops (large-then-992px) ', 'folie' ),
								'hidden-lg' => esc_attr__( 'Hide on Large Desktops (large-then-1200px)', 'folie' ),
							),
							'selector' => '.cl-row',
							'selectClass' => '',
						),
					
					'responsive_end' => array(
						'type' => 'group_end',
						'label' => 'Responsive',
						'groupid' => 'responsive'
					),
					
					/* ----------------------------------------------- */
				
				
				
				
				'general_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'general'
				),
				
				
				/*-------------------------------------------------------*/
				
				
				'design_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'Design',
					'tabid' => 'design'
				),
					
					/* ------------------------------------------ */
					
					'panel' => array(
						'type' => 'group_start',
						'label' => 'Box',
						'groupid' => 'design_panel'
					),
				
						'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl-row',
							'css_property' => '',
							'default' => array('padding-top' => '45px', 'padding-bottom' => '45px')
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => 'Text Color',
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => 'Dark',
								'light-text' => 'Light'
							),
							'selector' => '.cl-row',
							'selectClass' => ''
						),
					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'design_panel'
					),
					
					/* ------------------------------------------ */
				
					'background_color_group' => array(
						'type' => 'group_start',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
						'background_color' => array(
							'type' => 'color',
							'label' => 'Background Color',
							'default' => '',
							'selector' => '.cl-row > .bg-layer',
							
							'css_property' => 'background-color',
							'alpha' => true
						),
					
					'background_color_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
					/* ------------------------------------------- */
					
					'background_image_group' => array(
						'type' => 'group_start',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
					
						'background_image' => array(
							'type'        => 'image',
							'label'       => __( '', 'folie' ),
							'default'     => '',
							'priority'    => 10,
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-image'
						),
						
						'background_position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'folie' ),
							
							'default'     => 'left top',
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
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-position',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),

						'background_size' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'folie' ),
							
							'default'     => 'cover',
							'choices' => array(
								'cover' => 'Cover',
								'auto' => 'auto',
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-size',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_repeat' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Repeat', 'folie' ),
							
							'default'     => 'no-repeat',
							'choices' => array(
								'repeat' => 'repeat',
								'repeat-x' => 'repeat-x',
								'repeat-y' => 'repeat-y',
								'no-repeat' => 'no-repeat'
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => array('background-repeat'),
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_attachment' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Attachment', 'folie' ),
							
							'default'     => 'scroll',
							'choices' => array(
								'scroll' => 'scroll',
								'fixed' => 'fixed',
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-attachment',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_blend' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Blend', 'folie' ),
							
							'default'     => 'normal',
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
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-blend-mode',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'parallax' => array(
							'type'        => 'switch',
							'label'       => __( 'Parallax', 'folie' ),
							'description'       => __( 'Works with smoothscroll active only.', 'folie' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl-row',
							'addClass' => 'cl-parallax',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
					
					'background_image_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
				
					/* ---------------------------------------------------- */
					
					'overlay_group' => array(
						'type' => 'group_start',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
				
						'overlay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Backgrund', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'color' => 'Color',
								'gradient' => 'Gradient'
							)
							
						),
						
						'overlay_color' => array(
							'type' => 'color',
							'label' => 'Overlay Color',
							'default' => '',
							'selector' => '.cl-row > .overlay',
							'css_property' => 'background-color',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'color',
								),
							),
							'alpha' => false
						),
						
						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Gradient', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'azure_pop' =>	'Azure Pop',
								'love_couple' => 'Love Couple',
								'disco' => 'Disco',
								'limeade' => 'Limeade',
								'dania' => 'Dania',
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => 'Sun Horizon',
								'blood_red' => 'Blood Red',
								'sherbert' => 'Sherbert',
								'firewatch' => 'Firewatch',
								'frost' => 'Frost',
								'mauve' => 'Mauve',
								'deep_sea' => 'Deep Sea',
								'solid_vault' => 'Solid Vault',
								'deep_space' =>	'Deep Space',
								'suzy' => 'Suzy'
								
								
							),
							'selector' => '.cl-row > .overlay',
							'selectClass' => 'cl-gradient-',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'gradient',
								),
							),
						),
						
						'overlay_opacity' => array(
							'type' => 'slider',
							'label' => 'Overlay Opacity',
							'default' => '0.8',
							'selector' => '.cl-row > .overlay',
							'css_property' => 'opacity',
							'choices'     => array(
								'min'  => '0',
								'max'  => '1',
								'step' => '0.05',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
				
					'overlay_group_end' => array(
						'type' => 'group_end',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
				
					/* ------------------------------------------ */
					
					
					'border_style_start' => array(
						'type' => 'group_start',
						'label' => 'Border Style',
						'groupid' => 'border'
					),
					
						'border_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Border Style', 'folie' ),
							
							'default'     => 'solid',
							'choices' => array(
								'solid'	=> 'solid',
								'dotted' =>	'dotted',
								'dashed' =>	'dashed',
								'double' => 'double',
								'groove' => 'groove',
								'ridge' => 'ridge',	
								'inset' => 'inset',	
								'outset' => 'outset',
							),
							'selector' => '.cl-row',
							'css_property' => 'border-style'
						),
						
						'border_color' => array(
							'type' => 'color',
							'label' => 'Border Color',
							'default' => '',
							'selector' => '.cl-row',
							'css_property' => 'border-color',
							'alpha' => true
						),
					
					'border_style_end' => array(
						'type' => 'group_end',
						'label' => 'Border Style',
						'groupid' => 'border'
					),
					
					/* --------------------------------------------------- */

				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'design'
				),
			),
			
		) );
		

		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Row', 'folie' ),
			'section'     => 'cl_codeless_page_builder',
			'description' => 'Manage all options of the selected Row',
			//'priority'    => 10,
			
			'transport'   => 'postMessage',
			'settings'    => 'cl_row_inner',
			'is_container' => true,
			'marginPositions' => array('top'),
			'fields' => array(
				'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl-row_inner',
							'css_property' => '',
							'default' => array('margin-top' => '35px'),
				),
			)
		));
		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Column', 'folie' ),
			'section'     => 'cl_codeless_page_builder',
			//'priority'    => 10,
			
			'transport'   => 'postMessage',
			'settings'    => 'cl_column',
			'paddingPositions' => array('top', 'bottom', 'left', 'right'),
			'is_container' => true,
			'fields' => array(
				'width' => array(
					'type'     => 'select',
					'priority' => 10,
					'label'       => esc_attr__( 'Link Text', 'folie' ),
					'description' => esc_attr__( 'This will be the label for your link', 'folie' ),
					'default'     => '1/1',
					'show' => false,
					'choices'     => array(
						'1/12' => '1 Column',
						'1/6' => '2 Columns',
						'1/4' => '3 Columns',
						'1/3' => '4 Columns',
						'5/12' => '5 Columns',
						'1/2' => '6 Columns',
						'7/12' => '7 Columns',
						'2/3' => '8 Columns',
						'3/4' => '9 Columns',
						'5/6' => '10 Columns',
						'11/12' => '11 Columns',
						'1/1' => '12 Columns',
					),
				),
				
				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => 'General',
						'design' => 'Design'
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'General',
					'tabid' => 'general'
				),
				
					'column_info_start' => array(
						'type' => 'group_start',
						'label' => 'Attributes',
						'groupid' => 'attr'
					),
							

						'horizontal_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Horizontal Align', 'folie' ),
							'description' => esc_attr__( 'Horizontal Alignment of elements into this column(container)', 'folie' ),
							'default'     => 'left',
							'choices' => array(
								'left' => 'Left',
								'middle' => 'Middle',
								'right' => 'Right'
							),
							'selector' => '.cl_column',
							'selectClass' => 'align-h-',
							
						),

						'vertical_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Vertical Align', 'folie' ),
							'description' => esc_attr__( 'Vertical Alignment of elements into this column(container)', 'folie' ),
							'default'     => 'top',
							'choices' => array(
								'top' => 'Top',
								'middle' => 'Middle',
								'bottom' => 'Bottom'
							),
							'selector' => '.cl_column',
							'selectClass' => 'align-v-',
							
						),

						'col_sticky' => array(
							'type'        => 'switch',
							'label'       => __( 'Sticky Column', 'folie' ),
							'description' => 'Make this Column sticky on this page',
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'cl-sticky'
						),

						'col_disabled' => array(
							'type'        => 'switch',
							'label'       => __( 'Disable Column', 'folie' ),
							'description' => 'Make this Column invisible in this Page',
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'disabled_col'
						),

						'col_id' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Column Id', 'folie' ),
							'description' => esc_attr__( 'This is useful when you want to add unique identifier to columns.', 'folie' ),
							'default'     => '',
						),
						
						'extra_class' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Extra Class', 'folie' ),
							'description' => esc_attr__( 'Add extra class identifiers to this column, that can be used for various custom styles.', 'folie' ),
							'default'     => '',
						),

						'custom_link' => array(

							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Column Link', 'folie' ),
							'default'     => '#',
							'reloadTemplate' => true
						),

						'column_effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Effect on hover', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'image_zoom' => 'Image Zoom'
							),
							'selector' => '.cl_column',
							'selectClass' => 'effect-',
							
						),
						
			
					'column_info_end' => array(
						'type' => 'group_end',
						'label' => 'Attributes',
						'groupid' => 'attr'
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
							'selector' => '.cl_column'
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
							'selector' => '.cl_column',
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
							'selector' => '.cl_column',
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
					
				'general_tab_end' => array(
					'type' => 'tab_end',
					'label' => 'General',
					'tabid' => 'general'
				),
					
					
				'design_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'Design',
					'tabid' => 'design'
				),
					
					/* ------------------------------------------ */
					
					'panel' => array(
						'type' => 'group_start',
						'label' => 'Box',
						'groupid' => 'design_panel'
					),
				
						'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_column > .cl_col_wrapper',
							'css_property' => '',
							'default' => array('padding-top' => '20px', 'padding-bottom' => '20px'),
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => 'Text Color',
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => 'Dark',
								'light-text' => 'Light'
							),
							'selector' => '.cl_column',
							'selectClass' => ''
						),
					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'design_panel'
					),
					
					/* ------------------------------------------ */
				
					'background_color_group' => array(
						'type' => 'group_start',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
						'background_color' => array(
							'type' => 'color',
							'label' => 'Background Color',
							'default' => '',
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-color',
							'alpha' => true
						),
					
					'background_color_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
					/* ------------------------------------------- */
					
					'background_image_group' => array(
						'type' => 'group_start',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
					
						'background_image' => array(
							'type'        => 'image',
							'label'       => __( '', 'folie' ),
							'default'     => '',
							'priority'    => 10,
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-image'
						),
						
						'background_position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'folie' ),
							
							'default'     => 'left top',
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
							),
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-position',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_repeat' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Repeat', 'folie' ),
							
							'default'     => 'no-repeat',
							'choices' => array(
								'repeat' => 'repeat',
								'repeat-x' => 'repeat-x',
								'repeat-y' => 'repeat-y',
								'no-repeat' => 'no-repeat'
							),
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => array('background-repeat', array('background-size', array('no-repeat' => 'cover', 'other' => 'auto') ) ),
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_attachment' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Attachment', 'folie' ),
							
							'default'     => 'scroll',
							'choices' => array(
								'scroll' => 'scroll',
								'fixed' => 'fixed',
							),
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-attachment',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_blend' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Blend', 'folie' ),
							
							'default'     => 'normal',
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
							),
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-blend-mode',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						
					
					'background_image_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
				
					/* ---------------------------------------------------- */
					
					'overlay_group' => array(
						'type' => 'group_start',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
				
						'overlay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Backgrund', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'color' => 'Color',
								'gradient' => 'Gradient'
							)
							
						),
						
						'overlay_color' => array(
							'type' => 'color',
							'label' => 'Overlay Color',
							'default' => '',
							'selector' => '.cl_column > .cl_col_wrapper > .overlay',
							'css_property' => 'background-color',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'color',
								),
							),
							'alpha' => false
						),
						
						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Gradient', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'azure_pop' =>	'Azure Pop',
								'love_couple' => 'Love Couple',
								'disco' => 'Disco',
								'limeade' => 'Limeade',
								'dania' => 'Dania',
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => 'Sun Horizon',
								'blood_red' => 'Blood Red',
								'sherbert' => 'Sherbert',
								'firewatch' => 'Firewatch',
								'frost' => 'Frost',
								'mauve' => 'Mauve',
								'deep_sea' => 'Deep Sea',
								'solid_vault' => 'Solid Vault',
								'deep_space' =>	'Deep Space',
								'suzy' => 'Suzy'
								
								
							),
							'selector' => '.cl_column > .cl_col_wrapper > .overlay',
							'selectClass' => 'cl-gradient-',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'gradient',
								),
							),
						),
						
						'overlay_opacity' => array(
							'type' => 'slider',
							'label' => 'Overlay Opacity',
							'default' => '0.8',
							'selector' => '.cl_column > .cl_col_wrapper > .overlay',
							'css_property' => 'opacity',
							'choices'     => array(
								'min'  => '0',
								'max'  => '1',
								'step' => '0.05',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
				
					'overlay_group_end' => array(
						'type' => 'group_end',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
				
					/* ------------------------------------------ */
					
					
					'border_style_start' => array(
						'type' => 'group_start',
						'label' => 'Border Style',
						'groupid' => 'border'
					),
					
						'border_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Border Style', 'folie' ),
							
							'default'     => 'solid',
							'choices' => array(
								'solid'	=> 'solid',
								'dotted' =>	'dotted',
								'dashed' =>	'dashed',
								'double' => 'double',
								'groove' => 'groove',
								'ridge' => 'ridge',	
								'inset' => 'inset',	
								'outset' => 'outset',
							),
							'selector' => '.cl_column > .cl_col_wrapper',
							'css_property' => 'border-style'
						),
						
						'border_color' => array(
							'type' => 'color',
							'label' => 'Border Color',
							'default' => '',
							'selector' => '.cl_column > .cl_col_wrapper',
							'css_property' => 'border-color',
							'alpha' => true
						),

						'border_rounded' => array(
							'type'        => 'switch',
							'label'       => __( 'Border Rounded', 'folie' ),
							
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'cl-border-rounded'
						),
					
					'border_style_end' => array(
						'type' => 'group_end',
						'label' => 'Border Style',
						'groupid' => 'border'
					),
					
					/* --------------------------------------------------- */

				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'design'
				),
				
					
			),
			
		) );
		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Column', 'folie' ),
			'section'     => 'cl_codeless_page_builder',
			//'priority'    => 10,
			
			'transport'   => 'postMessage',
			'settings'    => 'cl_column_inner',
			'paddingPositions' => array('top', 'bottom', 'left', 'right'),
			'is_container' => true,
			'fields' => array(



				'width' => array(
					'type'     => 'select',
					'priority' => 10,
					'label'       => esc_attr__( 'Link Text', 'folie' ),
					'description' => esc_attr__( 'This will be the label for your link', 'folie' ),
					'default'     => '1/1',
					'show' => false,
					'choices'     => array(
						'1/12' => '1 Column',
						'1/6' => '2 Columns',
						'1/4' => '3 Columns',
						'1/3' => '4 Columns',
						'5/12' => '5 Columns',
						'1/2' => '6 Columns',
						'7/12' => '7 Columns',
						'2/3' => '8 Columns',
						'3/4' => '9 Columns',
						'5/6' => '10 Columns',
						'11/12' => '11 Columns',
						'1/1' => '12 Columns',
					),
				),

				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => 'General',
						'design' => 'Design'
					)
				),
				
				'gen_tab_start' => array(
						'type' => 'tab_start',
						'label' => 'General',
						'tabid' => 'general'
					),

				'inline_elements' => array(
							'type'        => 'switch',
							'label'       => __( 'Inline Elements', 'folie' ),
							'description' => 'By activating this, elements of this column will be shown inline.',
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_column_inner',
							'addClass' => 'cl-inline-column'
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
							'selector' => '.cl_column_inner',
							'customJS' => array('front' => 'animations')
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
							'selector' => '.cl_column_inner',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'customJS' => array('front' => 'animations')
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
							'selector' => '.cl_column_inner',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'customJS' => array('front' => 'animations')
						),
					
					'animation_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'animation'
					),

					'gen_tab_end' => array(
						'type' => 'tab_end',
						'label' => 'General',
						'tabid' => 'general'
					),

					'design_tab_start' => array(
						'type' => 'tab_start',
						'label' => 'Design',
						'tabid' => 'design'
					),
				
					/* ------------------------------------------ */
					
					'panel' => array(
						'type' => 'group_start',
						'label' => 'Box',
						'groupid' => 'design_panel'
					),
				
						'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_column_inner > .wrapper',
							'css_property' => '',
							'default' => array('padding-top' => '10px', 'padding-bottom' => '10px'),
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => 'Text Color',
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => 'Dark',
								'light-text' => 'Light'
							),
							'selector' => '.cl_column_inner',
							'selectClass' => ''
						),
					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'design_panel'
					),
					
					/* ------------------------------------------ */
				
					'background_color_group' => array(
						'type' => 'group_start',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
						'background_color' => array(
							'type' => 'color',
							'label' => 'Background Color',
							'default' => '',
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-color',
							'alpha' => true
						),
					
					'background_color_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
					/* ------------------------------------------- */
					
					'background_image_group' => array(
						'type' => 'group_start',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
					
						'background_image' => array(
							'type'        => 'image',
							'label'       => __( '', 'folie' ),
							'default'     => '',
							'priority'    => 10,
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-image'
						),
						
						'background_position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'folie' ),
							
							'default'     => 'left top',
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
							),
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-position',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_repeat' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Repeat', 'folie' ),
							
							'default'     => 'no-repeat',
							'choices' => array(
								'repeat' => 'repeat',
								'repeat-x' => 'repeat-x',
								'repeat-y' => 'repeat-y',
								'no-repeat' => 'no-repeat'
							),
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => array('background-repeat', array('background-size', array('no-repeat' => 'cover', 'other' => 'auto') ) ),
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_attachment' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Attachment', 'folie' ),
							
							'default'     => 'scroll',
							'choices' => array(
								'scroll' => 'scroll',
								'fixed' => 'fixed',
							),
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-attachment',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_blend' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Blend', 'folie' ),
							
							'default'     => 'normal',
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
							),
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-blend-mode',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						
					
					'background_image_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
				
					/* ---------------------------------------------------- */
					
					'overlay_group' => array(
						'type' => 'group_start',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
				
						'overlay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Backgrund', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'color' => 'Color',
								'gradient' => 'Gradient'
							)
							
						),
						
						'overlay_color' => array(
							'type' => 'color',
							'label' => 'Overlay Color',
							'default' => '',
							'selector' => '.cl_column_inner > .wrapper > .overlay',
							'css_property' => 'background-color',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'color',
								),
							),
							'alpha' => false
						),
						
						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Gradient', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'azure_pop' =>	'Azure Pop',
								'love_couple' => 'Love Couple',
								'disco' => 'Disco',
								'limeade' => 'Limeade',
								'dania' => 'Dania',
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => 'Sun Horizon',
								'blood_red' => 'Blood Red',
								'sherbert' => 'Sherbert',
								'firewatch' => 'Firewatch',
								'frost' => 'Frost',
								'mauve' => 'Mauve',
								'deep_sea' => 'Deep Sea',
								'solid_vault' => 'Solid Vault',
								'deep_space' =>	'Deep Space',
								'suzy' => 'Suzy'
								
								
							),
							'selector' => '.cl_column_inner > .wrapper > .overlay',
							'selectClass' => 'cl-gradient-',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'gradient',
								),
							),
						),
						
						'overlay_opacity' => array(
							'type' => 'slider',
							'label' => 'Overlay Opacity',
							'default' => '0.8',
							'selector' => '.cl_column_inner > .wrapper > .overlay',
							'css_property' => 'opacity',
							'choices'     => array(
								'min'  => '0',
								'max'  => '1',
								'step' => '0.05',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
				
					'overlay_group_end' => array(
						'type' => 'group_end',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
				
					/* ------------------------------------------ */
					
					
					'border_style_start' => array(
						'type' => 'group_start',
						'label' => 'Border Style',
						'groupid' => 'border'
					),
					
						'border_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Border Style', 'folie' ),
							
							'default'     => 'solid',
							'choices' => array(
								'solid'	=> 'solid',
								'dotted' =>	'dotted',
								'dashed' =>	'dashed',
								'double' => 'double',
								'groove' => 'groove',
								'ridge' => 'ridge',	
								'inset' => 'inset',	
								'outset' => 'outset',
							),
							'selector' => '.cl_column_inner > .wrapper',
							'css_property' => 'border-style'
						),
						
						'border_color' => array(
							'type' => 'color',
							'label' => 'Border Color',
							'default' => '',
							'selector' => '.cl_column_inner > .wrapper',
							'css_property' => 'border-color',
							'alpha' => true
						),
					
					'border_style_end' => array(
						'type' => 'group_end',
						'label' => 'Border Style',
						'groupid' => 'border'
					),
					
					/* --------------------------------------------------- */

				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'design'
				),
				
				
			),
			
		) );


		/* Page Header */
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Page Header', 'folie' ),
			'section'     => 'cl_codeless_page_builder',
			'icon'		  => 'icon-software-layout-header',
			//'priority'    => 10,
			'transport'   => 'postMessage',
			'settings'    => 'cl_page_header',
			'shiftClick'  => 'h1_dark_color',
			'marginPositions' => array('top'),
			'is_container' => false,
			'is_root'	  => true,
			'fields' => array(
				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => 'General',
						'design' => 'Design'
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'General',
					'tabid' => 'general'
				),
					
					'title' => array(
						'type'     => 'inline_text',
						'only_text' => true,
						'priority' => 10,
						'selector' => '.cl_page_header h1',
						'label'       => esc_attr__( 'Title', 'folie' ),
						'default'     => '',
					),
					
					
					'type' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Page Header Style', 'folie' ),
							
							'default'     => 'simple',
							'choices' => array(
								'simple'	=> 'Simple',
								'modern' =>	'Modern'
								
							),

							'selector' => '.cl_page_header',
							'selectClass' => '',
							'reloadTemplate' => true
							
					),



					
					'modern_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Modern Title Position', 'folie' ),
							
							'default'     => 'center',
							'choices' => array(
								'left_center'	=> 'Left Center',
								'center' =>	'Center',
								'right_center' => 'Right Center',
								'left_bottom' => 'Left Bottom',
								'center_bottom' => 'Center Bottom',
								'right_bottom' => 'Right Bottom',
								
							),
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'modern',
								),
							),
							
							'selector' => '.cl_page_header',
							'selectClass' => 'modern-'
							
					),
					
					
					
						
					'add_description' => array(
							'type'        => 'switch',
							'label'       => __( 'Description or second title', 'folie' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'reloadTemplate' => true,
							
					),
					
					'description' => array(
						'type'     => 'inline_text',
						'only_text' => true,
						'priority' => 10,
						'selector' => '.cl_page_header span.subtitle',
						'label'       => esc_attr__( 'Description', 'folie' ),
						'default'     => __('click to edit description', 'folie' ),
					),
					

					'modern_effect' => array(
							'type'        => 'inline_select',
							'label'       => __( 'Effect', 'folie' ),
							'default'     => 'none',
							'priority'    => 10,
							'choices'     => array(
								'none' => esc_attr__( 'None', 'folie' ),
								'gradient_shadow'  => esc_attr__( 'Gradient Shadow', 'folie' )
							),
							'selector' => '.cl_page_header',
							'selectClass' => 'modern-effect-',
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'modern',
								),
							),
						),
					
					
				
				
				
				'general_tab_end' => array(
					'type' => 'tab_end',
					'label' => 'General',
					'tabid' => 'general'
				),
				
				
				'design_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'Design',
					'tabid' => 'design'
				),
					
					/* ------------------------------------------ */
					
					'panel' => array(
						'type' => 'group_start',
						'label' => 'Box',
						'groupid' => 'design_panel'
					),
				
						'height' => array(
	
							'type' => 'slider',
							'label' => 'Height',
							'default' => '80',
							'selector' => '.cl_page_header',
							'css_property' => 'height',
							'choices'     => array(
								'min'  => '40',
								'max'  => '600',
								'step' => '5',
								'suffix' => 'px'
							),
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => 'Text Color',
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => 'Dark',
								'light-text' => 'Light'
							),
							'selector' => '.cl_page_header',
							'selectClass' => ''
						),


					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'design_panel'
					),
					
					/* ------------------------------------------ */
				
					'background_color_group' => array(
						'type' => 'group_start',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
						'background_color' => array(
							'type' => 'color',
							'label' => 'Background Color',
							'default' => '#f5f5f5',
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-color',
							'alpha' => true
						),
					
					'background_color_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
					/* ------------------------------------------- */
					
					'background_image_group' => array(
						'type' => 'group_start',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
					
						'background_image' => array(
							'type'        => 'image',
							'label'       => __( '', 'folie' ),
							'default'     => '',
							'priority'    => 10,
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-image'
						),
						
						'background_position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'folie' ),
							
							'default'     => 'left top',
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
							),
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-position',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_repeat' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Repeat', 'folie' ),
							
							'default'     => 'no-repeat',
							'choices' => array(
								'repeat' => 'repeat',
								'repeat-x' => 'repeat-x',
								'repeat-y' => 'repeat-y',
								'no-repeat' => 'no-repeat'
							),
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => array('background-repeat', array('background-size', array('no-repeat' => 'cover', 'other' => 'auto') ) ),
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_attachment' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Attachment', 'folie' ),
							
							'default'     => 'scroll',
							'choices' => array(
								'scroll' => 'scroll',
								'fixed' => 'fixed',
							),
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-attachment',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_blend' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Blend', 'folie' ),
							
							'default'     => 'normal',
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
							),
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-blend-mode',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'parallax' => array(
							'type'        => 'switch',
							'label'       => __( 'Parallax', 'folie' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_page_header',
							'addClass' => 'cl-parallax',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
					
					'background_image_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
				
					/* ---------------------------------------------------- */
					
					'overlay_group' => array(
						'type' => 'group_start',
						'label' => 'Overlay & Border',
						'groupid' => 'overlay'
					),
				
						'overlay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Backgrund', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'color' => 'Color',
								'gradient' => 'Gradient'
							)
							
						),
						
						'overlay_color' => array(
							'type' => 'color',
							'label' => 'Overlay Color',
							'default' => '',
							'selector' => '.cl_page_header .overlay',
							'css_property' => 'background-color',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'color',
								),
							),
							'alpha' => false
						),
						
						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Gradient', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'azure_pop' =>	'Azure Pop',
								'love_couple' => 'Love Couple',
								'disco' => 'Disco',
								'limeade' => 'Limeade',
								'dania' => 'Dania',
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => 'Sun Horizon',
								'blood_red' => 'Blood Red',
								'sherbert' => 'Sherbert',
								'firewatch' => 'Firewatch',
								'frost' => 'Frost',
								'mauve' => 'Mauve',
								'deep_sea' => 'Deep Sea',
								'solid_vault' => 'Solid Vault',
								'deep_space' =>	'Deep Space',
								'suzy' => 'Suzy'
								
								
							),
							'selector' => '.cl_page_header .overlay',
							'selectClass' => 'cl-gradient-',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'gradient',
								),
							),
						),
						
						'overlay_opacity' => array(
							'type' => 'slider',
							'label' => 'Overlay Opacity',
							'default' => '0.8',
							'selector' => '.cl_page_header .overlay',
							'css_property' => 'opacity',
							'choices'     => array(
								'min'  => '0',
								'max'  => '1',
								'step' => '0.05',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
						
						'border_color' => array(
							'type' => 'color',
							'label' => 'Border Color',
							'default' => '#ebebeb',
							'selector' => '.cl_page_header',
							'css_property' => 'border-color',
							'alpha' => true
						),

						'add_border_top' => array(
							'type'        => 'switch',
							'label'       => __( 'Border Top', 'folie' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_page_header',
							'addClass' => 'border_top',
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'simple',
								),
							),
						),
					
					'add_border_bottom' => array(
							'type'        => 'switch',
							'label'       => __( 'Border Bottom', 'folie' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_page_header',
							'addClass' => 'border_bottom',
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'simple',
								),
							),
						),
				
					'overlay_group_end' => array(
						'type' => 'group_end',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
					
					'typography_start' => array(
						'type' => 'group_start',
						'label' => 'Typography',
						'groupid' => 'typography'
					),


					'typography' => array(
							'type'        => 'inline_select',
							'label'       => __( 'Title Typography', 'folie' ),
							'description' => 'Select one of the predefined title typography styles on Styling Section or select "Custom Font" if you want to edit the typography of Title. SHIFT-CLICK on Element if you want to modify one of the predefined Style',
							'default'     => 'h1',
							'priority'    => 10,
							'selector' => '.cl_page_header .title_part h1',
							'selectClass' => 'custom_font ',
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'folie' ),
								'h2' => esc_attr__( 'H2', 'folie' ),
								'h3' => esc_attr__( 'H3', 'folie' ),
								'h4' => esc_attr__( 'H4', 'folie' ),
								'h5' => esc_attr__( 'H5', 'folie' ),
								'h6' => esc_attr__( 'H6', 'folie' ),
								'custom_font' => esc_attr__( 'Custom Font', 'folie' ),
							),
						),

					
					'title_font_size' => array(
	
							'type' => 'slider',
							'label' => 'Title Font Size',
							'default' => '18',
							'selector' => '.cl_page_header .title_part h1',
							'css_property' => 'font-size',
							'choices'     => array(
								'min'  => '14',
								'max'  => '72',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
						),

					'title_font_weight' => array(
	
							'type' => 'inline_select',
							'label' => 'Title Font Weight',
							'default' => '600',
							'selector' => '.cl_page_header .title_part h1',
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
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
						),
						
					'title_line_height' => array(
	
							'type' => 'slider',
							'label' => 'Title Line Height',
							'default' => '22',
							'selector' => '.cl_page_header .title_part h1',
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
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
						),
					
					'title_transform' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Title Text Transform', 'folie' ),
							
							'default'     => 'none',
							'selector' => '.cl_page_header .title_part h1',
							'css_property' => 'text-transform',
							'choices' => array(
								'none' => 'None',
								'uppercase' => 'Uppercase'
							),
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
							
						),

						'title_color' => array(
							'type'     => 'color',
							'priority' => 10,
							'label'       => esc_attr__( 'Title Color', 'folie' ),
							
							'default'     => '',
							'selector' => '.cl_page_header .title_part h1',
							'css_property' => 'color',
							
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
							
						),
						
					
						
					
					'desc_color' => array(
							'type' => 'color',
							'label' => 'Subtitle Color',
							'default' => '',
							'selector' => '.cl_page_header .title_part .subtitle',
							'css_property' => 'color',
							'alpha' => true
					),
					
					'desc_font_size' => array(
	
							'type' => 'slider',
							'label' => 'Subtitle Font Size',
							'default' => '14',
							'selector' => '.cl_page_header .title_part .subtitle',
							'css_property' => 'font-size',
							'choices'     => array(
								'min'  => '14',
								'max'  => '60',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px'
						),

					'desc_font_weight' => array(
	
							'type' => 'inline_select',
							'label' => 'Subtitle Font Weight',
							'default' => '300',
							'selector' => '.cl_page_header .title_part .subtitle',
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
							)
						),
						
					'desc_line_height' => array(
	
							'type' => 'slider',
							'label' => 'Subtitle Line Height',
							'default' => '18',
							'selector' => '.cl_page_header .title_part .subtitle',
							'css_property' => 'line-height',
							'choices'     => array(
								'min'  => '20',
								'max'  => '80',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px'
						),
						
					'desc_transform' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Subtitle Text Transform', 'folie' ),
							
							'default'     => 'none',
							'selector' => '.cl_page_header .title_part .subtitle',
							'css_property' => 'text-transform',
							'choices' => array(
								'none' => 'None',
								'uppercase' => 'Uppercase'
							)
							
						),
						
					
					
					'typography_end' => array(
						'type' => 'group_end',
						'label' => 'Typography',
						'groupid' => 'typography'
					),
					
					
				
					/* ------------------------------------------ */
	
					/* --------------------------------------------------- */

				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'design'
				),
				
				
			),
			
		) );

 		/* Text */
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Text', 'folie' ),
			'section'     => 'cl_codeless_page_builder',
			//'priority'    => 10,
			'icon'		  => 'icon-software-font-smallcaps',
			'transport'   => 'postMessage',
			'settings'    => 'cl_text',
			'is_container' => false,
			'marginPositions' => array('top'),
			'fields' => array(
				'content' => array(
					'type'     => 'inline_text',
					'priority' => 10,
					'selector' => '.cl-text',
					'label'       => esc_attr__( 'Text', 'folie' ),
					'description' => esc_attr__( 'This will be the label for your link', 'folie' ),
					'default'     => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores ',
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

					
					'text_font_size' => array(
	
							'type' => 'slider',
							'label' => 'Text Font Size',
							'default' => '14',
							'selector' => '.cl-text',
							'css_property' => 'font-size',
							'choices'     => array(
								'min'  => '14',
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


				'responsive_start' => array(
					'type' => 'group_start',
					'label' => 'Responsive',
					'groupid' => 'responsive' 
				),

					'custom_responsive_992_bool' => array(
							'type'        => 'switch',
							'label'       => __( 'Custom Max-width:992px', 'folie' ),
							'description' => 'Add a custom size for this heading for screens smaller than 992px',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							
						),

						'custom_responsive_992_size' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Font size Max-width:992px', 'folie' ),
							'description' => esc_attr__( 'Add a custom size for this heading for screens smaller than 992px', 'folie' ),
							'default'     => '24px',
							'selector' => '.cl-text',
							'css_property' => 'font-size',
							'media_query' => '(max-width: 992px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_992_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

						'custom_responsive_992_line_height' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Line Height Max-width:992px', 'folie' ),
							'description' => esc_attr__( 'Add a custom line height for this heading for screens smaller than 992px', 'folie' ),
							'default'     => '30px',
							'selector' => '.cl-text',
							'css_property' => 'line-height',
							'media_query' => '(max-width: 992px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_992_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

					'custom_responsive_768_bool' => array(
							'type'        => 'switch',
							'label'       => __( 'Custom Max-width:768px', 'folie' ),
							'description' => 'Add a custom size for this heading for screens smaller than 768px',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							
						),

						'custom_responsive_768_size' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Font size Max-width:768px', 'folie' ),
							'description' => esc_attr__( 'Add a custom size for this heading for screens smaller than 768px', 'folie' ),
							'default'     => '18px',
							'selector' => '.cl-text',
							'css_property' => 'font-size',
							'media_query' => '(max-width: 768px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_768_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

						'custom_responsive_768_line_height' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Line Height Max-width:768px', 'folie' ),
							'description' => esc_attr__( 'Add a custom line height for this heading for screens smaller than 768px', 'folie' ),
							'default'     => '26px',
							'selector' => '.cl-text',
							'css_property' => 'line-height',
							'media_query' => '(max-width: 768px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_768_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),


				'responsive_end' => array(
					'type' => 'group_end',
					'label' => 'Responsive',
					'groupid' => 'responsive'
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

				'css_style' => array(
					'type' => 'css_tool',
					'label' => 'Tool',
					'selector' => '.cl-text',
					'css_property' => '',
					'default' => array('margin-top' => '35px')
				),
			),
			
		) );

 		/* Custom Heading */
 		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Custom Heading', 'folie' ),
			'section'     => 'cl_codeless_page_builder',
			//'priority'    => 10,
			'icon'		  => 'icon-software-character',
			'transport'   => 'postMessage',
			'settings'    => 'cl_custom_heading',
			'marginPositions' => array('top'),
			'is_container' => false,
			'fields' => array(
				'content' => array(
					'type'     => 'inline_text',
					'priority' => 10,
					'selector' => '.cl-custom-heading',
					'label'       => esc_attr__( 'Text', 'folie' ),
					'description' => esc_attr__( 'This will be the label for your link', 'folie' ),
					'default'     => 'Custom Heading',
				),

				'option_start' => array(
						'type' => 'group_start',
						'label' => 'Options',
						'groupid' => 'options'
					),

				'tag' => array(
							'type'        => 'inline_select',
							'label'       => __( 'Heading Tag', 'folie' ),
							'description' => '',
							'default'     => 'h2',
							'priority'    => 10,
							'selector' => '.cl-custom-heading',
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'folie' ),
								'h2' => esc_attr__( 'H2', 'folie' ),
								'h3' => esc_attr__( 'H3', 'folie' ),
								'h4' => esc_attr__( 'H4', 'folie' ),
								'h5' => esc_attr__( 'H5', 'folie' ),
								'h6' => esc_attr__( 'H6', 'folie' ),
							),
				),

				'option_end' => array(
						'type' => 'group_end',
						'label' => 'Options',
						'groupid' => 'options'
					),

				'typography_start' => array(
						'type' => 'group_start',
						'label' => 'Typography',
						'groupid' => 'typography'
					),
 
				'typography' => array(
							'type'        => 'inline_select',
							'label'       => __( 'Title Typography', 'folie' ),
							'description' => 'Select one of the predefined title typography styles on Styling Section or select "Custom Font" if you want to edit the typography of Title. SHIFT-CLICK on Element if you want to modify one of the predefined Style',
							'default'     => 'h2',
							'priority'    => 10,
							'selector' => '.cl-custom-heading',
							'selectClass' => 'custom_font ',
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'folie' ),
								'h2' => esc_attr__( 'H2', 'folie' ),
								'h3' => esc_attr__( 'H3', 'folie' ),
								'h4' => esc_attr__( 'H4', 'folie' ),
								'h5' => esc_attr__( 'H5', 'folie' ),
								'h6' => esc_attr__( 'H6', 'folie' ),
								'custom_font' => esc_attr__( 'Custom Font', 'folie' ),
							),
						),

					
					'text_font_family' => array(
	
							'type' => 'inline_select',
							'label' => 'Font Family',
							'default' => 'theme_default',
							'selector' => '.cl-custom-heading',
							'css_property' => 'font-family',
							'choices'     => codeless_get_google_fonts(),
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
						),

					'text_font_size' => array(
	
							'type' => 'slider',
							'label' => 'Font Size',
							'default' => '22',
							'selector' => '.cl-custom-heading',
							'css_property' => 'font-size',
							'choices'     => array(
								'min'  => '14',
								'max'  => '160',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
						),

					'text_font_weight' => array(
	
							'type' => 'inline_select',
							'label' => 'Font Weight',
							'default' => '700',
							'selector' => '.cl-custom-heading',
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
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
						),
						
					'text_line_height' => array(
	
							'type' => 'slider',
							'label' => 'Line Height',
							'default' => '34',
							'selector' => '.cl-custom-heading',
							'css_property' => 'line-height',
							'choices'     => array(
								'min'  => '20',
								'max'  => '200',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
						),

					'text_letterspace' => array(
		
								'type' => 'slider',
								'label' => 'Letter-Spacing',
								'default' => '0',
								'selector' => '.cl-custom-heading',
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
										'setting'  => 'typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),
					
					'text_transform' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Text Transform', 'folie' ),
							
							'default'     => 'uppercase',
							'selector' => '.cl-custom-heading',
							'css_property' => 'text-transform',
							'choices' => array(
								'none' => 'None',
								'uppercase' => 'Uppercase'
							),
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
							
						),
						
					
						
					
					'text_color' => array(
							'type' => 'color',
							'label' => 'Color',
							'default' => '',
							'selector' => '.cl-custom-heading',
							'css_property' => 'color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
					),

				'typography_end' => array(
						'type' => 'group_end',
						'label' => 'Typography',
						'groupid' => 'typography'
				),


				'responsive_start' => array(
					'type' => 'group_start',
					'label' => 'Responsive',
					'groupid' => 'responsive' 
				),

					'custom_responsive_992_bool' => array(
							'type'        => 'switch',
							'label'       => __( 'Custom Max-width:992px', 'folie' ),
							'description' => 'Add a custom size for this heading for screens smaller than 992px',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							
						),

						'custom_responsive_992_size' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Font size Max-width:992px', 'folie' ),
							'description' => esc_attr__( 'Add a custom size for this heading for screens smaller than 992px', 'folie' ),
							'default'     => '24px',
							'selector' => '.cl-custom-heading',
							'css_property' => 'font-size',
							'media_query' => '(max-width: 992px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_992_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

						'custom_responsive_992_line_height' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Line Height Max-width:992px', 'folie' ),
							'description' => esc_attr__( 'Add a custom line height for this heading for screens smaller than 992px', 'folie' ),
							'default'     => '30px',
							'selector' => '.cl-custom-heading',
							'css_property' => 'line-height',
							'media_query' => '(max-width: 992px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_992_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

					'custom_responsive_768_bool' => array(
							'type'        => 'switch',
							'label'       => __( 'Custom Max-width:768px', 'folie' ),
							'description' => 'Add a custom size for this heading for screens smaller than 768px',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							
						),

						'custom_responsive_768_size' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Font size Max-width:768px', 'folie' ),
							'description' => esc_attr__( 'Add a custom size for this heading for screens smaller than 768px', 'folie' ),
							'default'     => '18px',
							'selector' => '.cl-custom-heading',
							'css_property' => 'font-size',
							'media_query' => '(max-width: 768px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_768_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

						'custom_responsive_768_line_height' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Line Height Max-width:768px', 'folie' ),
							'description' => esc_attr__( 'Add a custom line height for this heading for screens smaller than 768px', 'folie' ),
							'default'     => '26px',
							'selector' => '.cl-custom-heading',
							'css_property' => 'line-height',
							'media_query' => '(max-width: 768px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_768_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),


				'responsive_end' => array(
					'type' => 'group_end',
					'label' => 'Responsive',
					'groupid' => 'responsive'
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
							'selector' => '.cl-custom-heading'
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
							'selector' => '.cl-custom-heading',
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
							'selector' => '.cl-custom-heading',
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

				'box_start' => array(
						'type' => 'group_start',
						'label' => 'Box Design',
						'groupid' => 'box'
				),
					'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.cl-custom-heading',
						'css_property' => '',
						'default' => array('margin-top' => '35px')
					),

					'border_style' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Border Style', 'folie' ),
								
								'default'     => 'solid',
								'choices' => array(
									'solid'	=> 'solid',
									'dotted' =>	'dotted',
									'dashed' =>	'dashed',
									'double' => 'double',
									'groove' => 'groove',
									'ridge' => 'ridge',	
									'inset' => 'inset',	
									'outset' => 'outset',
								),
								'selector' => '.cl-custom-heading',
								'css_property' => 'border-style'
							),
							
					'border_color' => array(
						'type' => 'color',
						'label' => 'Border Color',
						'default' => '',
						'selector' => '.cl-custom-heading',
						'css_property' => 'border-color',
						'alpha' => true
					),
				'box_end' => array(
						'type' => 'group_end',
						'label' => 'Box Design',
						'groupid' => 'box'
				),
			),
			
		) );

 		/* Button */
 		cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Button', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-signs',
				'transport'   => 'postMessage',
				'settings'    => 'cl_button',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'btn_title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '.cl-btn span',
						'label'       => esc_attr__( 'Text', 'folie' ),
						'description' => esc_attr__( 'This will be the label for your link', 'folie' ),
						'default'     => 'View More',
						'only_text' => true
					),

					'overwrite_style' => array (

							'type' => 'switch',
							'priority' => 10,
							'default'=> 0,
							'label' => esc_attr__( 'Overwrite the default button style', 'folie' ),
						    'choices' => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							
							),		

				     ),

					

					'button_style' => array(

						'type' => 'inline_select',
						'priority' => 10,
						'label' => 'Button Style',
						'default'=> 'material_square',
						'choices' => array(

							'material_square' => 'Material Square',
							'material_circular' => 'Material Circular',
							'text_effect' => 'Text Effect',
							'rounded_border' => 'Rounded Border'
		
						),

						'selector' => '.cl-btn',
						'selectClass' => 'btn-style-',
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),
					),

					'button_layout' =>  array(

						'type' => 'inline_select',
						'priority' => 10,
						'label' => 'Button Layout',
						'default' => 'medium',
						'choices'=> array(

							'extra-small' => 'Extra Small',
							'small' => 'Small',
							'medium' => 'Medium',
							'large' => 'Large',
							'extra-large' => 'Extra Large',
						
						),

						'selector'=> '.cl-btn',
						'selectClass' => 'btn-layout-',
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),
					),

					'button_font' => array(

						'type' => 'inline_select',
						'priority' => 10,
						'label' => 'Button Font',
						'default'  => 'medium',
						'choices' => array(

							'extra-small' => 'Extra Small',
							'small' => 'Small',
							'medium' => 'Medium',
							'large' => 'Large',
							'extra-large' => 'Extra Large',
							'custom' => 'Custom',

						),


						'selector'=> '.cl-btn',
						'selectClass' => 'btn-font-',
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),
					),

					'button_bg_color'=> array(

						'type' => 'color',
						'priority'=> 10,
						'label' => 'Button Background Color',
						'default' => '#0CABD3',
						'selector' => '.cl-btn',
						'css_property' => 'background-color',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),
					),

					'button_bg_color_hover'=> array(

						'type' => 'color',
						'priority'=> 10,
						'label' => 'Button Background Color on Hover',
						'default' => '#0CABD3',
						'selector' => '.cl-btn',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),

					),

					'button_font_color' => array(

						'type' => 'color',
				        'priority'=> 10,
						'label' => 'Button Font Color', 
						'default'=> '#ffffff',
						'selector'=> '.cl-btn',
						'css_property'=> 'color',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),
					),

					'button_font_color_hover' => array(

						'type' => 'color',
				        'priority'=> 10,
						'label' => 'Button Font Color on Hover', 
						'default'=> '#ffffff',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),

					),



					'button_border_color' => array(
						
						'type'=> 'color',
						'priority'=> 10,
						'label'=> 'Button Border Color',
						'default' => 'transparent',
						'selector' => '.cl-btn-custom',
						'css_property' => 'border-color',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'button_border_active',
								'operator' => '!=',
								'value'    => 0,

							),	

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),

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
							'default' => array('margin-top' => '35px')
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
							'selector' => '.cl-btn-div'
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
							'selector' => '.cl-btn-div',
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
							'selector' => '.cl-btn-div',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							)
						),
				)
			));

 		/* Divider */
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Divider', 'folie' ),
			'section'     => 'cl_codeless_page_builder',
			//'priority'    => 10,
			'icon'		  => 'icon-arrows-minus',
			'transport'   => 'postMessage',
			'settings'    => 'cl_divider',
			'use_on_header' => true,
			'is_container' => false,
			'marginPositions' => array('top'),
			'fields' => array(
				'height' => array(
					'type'     => 'slider',
					'label' => 'Divider height',
					'default' => '1',
					'selector' => '.cl_divider .inner',
					'css_property' => 'border-top-width',
					'choices'     => array(
								'min'  => '0',
								'max'  => '30',
								'step' => '1',
								'suffix' => 'px'
							),
				    'suffix' => 'px',

					'label'       => esc_attr__( 'Divider Height', 'folie' ),
					'description' => esc_attr__( 'Set the divider height', 'folie' )
					
				),

				'width_full' => array(
	
							'type'        => 'switch',
							'label'       => __( 'Set divider fullwidth', 'folie' ),
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
						),
					
					
				'width' => array(
	
							'type' => 'slider',
							'label' => 'Set the divider width',
							'default' => '300',
							'selector' => '.cl_divider .wrapper',
							'css_property' => 'width',
							'choices'     => array(
								'min'  => '1',
								'max'  => '1070',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',

							'cl_required'    => array(
								array(
									'setting'  => 'width_full',
									'operator' => '==',
									'value'    => 0,
								),
							),
						),


				'color' => array(
							'type' => 'color',
							'label' => 'Set Color',
							'default' => '#222',
							'selector' => '.cl_divider .inner',
							'css_property' => 'border-color',
							'alpha' => true
							
					),

				'border_style' => array(
							'type' => 'inline_select',
							'label' => 'Set the border style',
							'default' => 'solid',
							'selector' => '.cl_divider .inner',
							'css_property' => 'border-style',
							'choices'     => array(
								'solid'	=> 'solid',
								'dotted' =>	'dotted',
								'dashed' =>	'dashed',
								'double' => 'double',
								'groove' => 'groove',
								'ridge' => 'ridge',	
								'inset' => 'inset',	
								'outset' => 'outset'
							
							),
							
							
					),

				'align' => array( 

						    'type' => 'inline_select',
							'label' => 'Set the border align',
							'default' => '',
							'selector' => '.cl_divider .wrapper',
							'choices'     => array(
								'left_divider'	=> 'left',
								'center_divider' =>	'center',
								'right_divider' =>	'right',
								
															
							),
							'selectClass' => '',
							'cl_required'    => array(
								array(
									'setting'  => 'width_full',
									'operator' => '==',
									'value'    => 0,
								),
							),


					),


				'divider_style' => array(
	
							'type' => 'inline_select',
							'label' => 'Select the style of the divider',
							'default' => 'simple',
							'selector' => '.cl_divider .wrapper',
							'choices'     => array(
								'simple' => 'Simple',
								'two' => 'Two Borders',
								'icon' => 'With Centred Icon'
							
							),
							'reloadTemplate' => true
							
						),
						
				'icon' => array(
							'type'     => 'select_icon',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Icon', 'folie' ),
							'default'     => 'cl-icon-camera2',
							'selector' => '.cl_divider i',
							'selectClass' => ' ',
							'cl_required'    => array(
								array(
									'setting'  => 'divider_style',
									'operator' => '==',
									'value'    => 'icon',
								),
							),
						),

				'color_icon' => array(
							'type'     => 'color',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon Color', 'folie' ),
							'default'     => '#222',
							'selector' => '.cl_divider .wrapper > i',
							'css_property' => 'color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'divider_style',
									'operator' => '==',
									'value'    => 'icon',
								),
							),
						),

				'size_icon' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon size', 'folie' ),
							'default'     => '10',
							'selector' => '.cl_divider .wrapper > i',
							'css_property'=> 'font-size',
							'choices'     => array(
								'min'  => '0',
								'max'  => '30',
								'step' => '1'
								
							),
				            'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'divider_style',
									'operator' => '==',
									'value'    => 'icon',
								),
							),
						),

				'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.cl_divider',
						'css_property' => '',
						'default' => array('margin-top' => '35px')
					),
					
					
	
				),
	
			
		));


 		
		
		
		
		
 		/* Media */
 		cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Media', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-photo',
				'transport'   => 'postMessage',
				'settings'    => 'cl_media',
				'is_container' => false,
				'css_dependency' => array(CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css'),
				'marginPositions' => array('top'),
				'fields' => array(
						'media_type' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Media Type', 'folie' ),
							
							'default'     => 'image',
							'choices' => array(
								'image'	=> 'Image / Embed',
								'video' =>	'Video with Placeholder',
								'live' => 'Live Photo'
							),
							'selector' => '.cl_media',
							'selectClass' => 'type-', 
							'reloadTemplate' => true 
						),

						'position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Position', 'folie' ),
							
							'default'     => 'stretch',
							'choices' => array(
								'left'	=> 'Left',
								'center' =>	'Center',
								'right' => 'Right',
								'stretch' => 'stretch' 
							),
							'selector' => '.cl_media',
							'selectClass' => 'position_'
						),

						'image' => array(
							'type'        => 'image',
							'label'       => __( 'Upload Image', 'folie' ),
							'default'     => '',
							'priority'    => 10,
							'image_get' => 'id',
							'reloadTemplate' => true,
						),

						'video_mov' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Mov', 'folie' ),
								'description' => esc_attr__( 'Add this video if you want to use it for live photo', 'folie' ),
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'media_type',
										'operator' => '==',
										'value'    => 'live',
									),
								),
								'reloadTemplate' => true
							),

						'lightbox' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Lightbox on hover', 'folie' ),
							'description' => esc_attr__( 'Show lightbox icon on image hover', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),

							'reloadTemplate' => true,
						),

						'lazyload' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Lazyload Image', 'folie' ),
							'description' => esc_attr__( 'Image will be loaded only when it\'s on viewport', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),

							'reloadTemplate' => true,
						),

						'shadow' => array(
								'type'        => 'switch',
								'label'       => __( 'Shadow', 'folie' ),
								'description' => 'Switch on/off shadow',
								'default'     => 1,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'folie' ),
									'off' => esc_attr__( 'Off', 'folie' ),
								),

								'selector' => '.cl_media',
								'addClass' => 'add-shadow'
							),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => __( 'Image Size', 'folie' ),
								'description' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">Image Sizes Section</a>",
								'default'     => 'full',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),

						'custom_width_bool' => array(
								'type'        => 'switch',
								'label'       => __( 'Custom Width?', 'folie' ),
								'description' => 'Add a custom width for this media',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'folie' ),
									'off' => esc_attr__( 'Off', 'folie' ),
								),
								'selector' => '.cl_media',
								'addClass' => 'cl-custom-width'
							),

						'custom_width' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Set Custom Width', 'folie' ),
							
							'default'     => '400px',
						
							'selector' => '.cl_media .inner',
							'css_property' => 'width',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_width_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

						'custom_link' => array(

							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Link', 'folie' ),
							'default'     => '#',
							'reloadTemplate' => true
						),

						'video_start' => array(
							'type' => 'group_start',
							'label' => 'Video',
							'groupid' => 'video'
						),
						
						
							'video' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Background', 'folie' ),
								
								'default'     => 'none',
								'choices' => array(
									'none'	=> 'None',
									'self' =>	'Self-Hosted',
									'youtube' =>	'Youtube',
									'vimeo' => 'Vimeo'
								),
								'reloadTemplate' => true
								//'customJS' => 'inlineEdit_videoSection'
							),
							
							'video_mp4' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Mp4', 'folie' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'self',
									),
								),
								'reloadTemplate' => true
							),
							'video_webm' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Webm', 'folie' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'self',
									),
								),
								'reloadTemplate' => true
							),
							'video_ogv' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Ogv', 'folie' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'self',
									),
								),
								'reloadTemplate' => true
							),

							
							
							'video_youtube' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Youtube ID', 'folie' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'youtube',
									),
								
								),
								'reloadTemplate' => true
							),
							
							'video_vimeo' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Vimeo ID', 'folie' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'vimeo',
									),
								
								),
								'reloadTemplate' => true
							),
							
							'video_loop' => array(
								'type'        => 'switch',
								'label'       => __( 'Video Loop', 'folie' ),
								'description' => 'Switch on/off video loop',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'folie' ),
									'off' => esc_attr__( 'Off', 'folie' ),
								),
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '!=',
										'value'    => 'none',
									),
								),
								'reloadTemplate' => true
							),

							'autoplay' => array(
								'type'        => 'switch',
								'label'       => __( 'Autoplay', 'folie' ),
								'description' => 'Switch on when video is used with Image Placeholder',
								'default'     => 1,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'folie' ),
									'off' => esc_attr__( 'Off', 'folie' ),
								),

								'reloadTemplate' => true
							),

							'height' => array(
								'type'     => 'slider',
								'priority' => 10,
								'label'       => esc_attr__( 'Video / Embed Height', 'folie' ),
								'description' => esc_attr__( 'Use this only for embed links and for video with image placeholder.', 'folie' ),
								'default'     => '400',
								'choices'     => array(
									'min'  => '0',
									'max'  => '1000',
									'step' => '10',
								),
								'suffix' => 'px',
								'selector' => '.cl_media iframe, .cl_media video',
								'css_property' => 'height',
								
								
							),

						'video_end' => array(
							'type' => 'group_end',
							'label' => 'Video',
							'groupid' => 'video'
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
							'selector' => '.cl_media'
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
							'selector' => '.cl_media',
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
							'selector' => '.cl_media',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							)
						),

						'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_media',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));

 		/* Gallery */
 		cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Gallery', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-picture-multiple',
				'transport'   => 'postMessage',
				'settings'    => 'cl_gallery',
				'is_container' => false,
				'css_dependency' => array( CODELESS_BASE_URL.'css/owl.carousel.min.css' ),
				'marginPositions' => array('top'),
				'fields' => array(

					'carousel' => array(
							'type'        => 'switch',
							'label'       => __( 'Carousel', 'folie' ),
							'description' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_gallery',
							'addClass' => 'cl-carousel owl-carousel owl-theme',
							'reloadTemplate' => true
					),

					'carousel_view_items' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Items', 'folie' ),
							
							'default'     => '6',
							'choices' => array(
								'1' =>	'1 items',
								'2' =>	'2 items',
								'3' =>	'3 items',
								'4' => '4 items',
								'5' => '5 items',
								'6' => '6 items',
								'7' => '7 items',
							),
							'selector' => '.cl_gallery',
							'htmldata' => 'items',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'reloadTemplate' => true
					),

					'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want carousel navigation', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_gallery',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),

						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'folie' ),
							'default'     => 1,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_gallery',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),

						),

					'images' => array(
						'type'     => 'image_gallery',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Images', 'folie' ),
						
						'reloadTemplate' => true,
					),

					'items_per_row' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Items per Row', 'folie' ),
							
							'default'     => 'all',
							'choices' => array(
								'all'	=> 'All',
								'2' =>	'2 items',
								'3' =>	'3 items',
								'4' => '4 items',
								'5' => '5 items',
								'6' => '6 items',
								'7' => '7 items',
							),
							'selector' => '.cl_gallery',
							'selectClass' => 'items_',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 0,
								),
							),
					),

					'distance' => array(
	
							'type' => 'slider',
							'label' => 'Distance between items',
							'default' => '10',
							'selector' => '.cl_gallery .gallery-item',
							'css_property' => 'padding',
							'choices'     => array(
								'min'  => '0',
								'max'  => '60',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
						),


					'lightbox' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Lightbox on hover', 'folie' ),
							'description' => esc_attr__( 'Show lightbox icon on image hover', 'folie' ),
							'default'     => 1,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_gallery',
							'addClass' => 'with-lightbox',
							'reloadTemplate' => true,
							

						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => __( 'Image Size', 'folie' ),
								'description' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">Image Sizes Section</a>",
								'default'     => 'full',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),


					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_gallery',
							'css_property' => '',
							'default' => array('margin-top' => '35px')
					),
				)
			));

 		/* Service */
 		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Service', 'folie' ),
			'section'     => 'cl_codeless_page_builder',
			'description' => 'Manage all options of the selected Row',
			//'priority'    => 10,
			'icon'		  => 'icon-arrows-circle-check',
			'transport'   => 'postMessage',
			'settings'    => 'cl_service',
			'marginPositions' => array('top'),

			'predefined'  => array(
				'simple_left_icon' => array(
					'photo' => get_template_directory_uri().'/img/predefined_elements/cl_service/simple_left_icon.png',
					'label' => 'Simple Left Icon',
					'content' => '[cl_service media="type_icon" title="Better Performance" icon="cl-icon-laptop2" css_style="{\'margin-top\':\'55px\'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top" animation_delay="0"]A technology that renders via GPU, power saver, dependency manager, faster load. Load only scripts that needed for page.[/cl_service]'
				),
				'simple_top_icon' => array(
					'photo' => get_template_directory_uri().'/img/predefined_elements/cl_service/simple_top_icon.png',
					'label' => 'Simple Top Icon',
					'content' => '[cl_service media="type_icon" layout_type="media_top" title="Experienced Support Team" icon="cl-icon-profile-male" css_style="{\'margin-top\':\'50px\'}_-_json" icon_font_size="42" wrapper_size="30" animation="bottom-t-top" animation_delay="100"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service]'
				),
			),


			'is_container' => false,
			'shiftClick' => array( 
					array( 'option' => 'h5_font_size', 'selector' => '.box-content h3' ) 
			),
			'fields' => array(

				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => 'General',
						'design' => 'Design'
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'General',
					'tabid' => 'general'
				),
				
					/* ----------------------------------------------- */
					
					'options_start' => array(
						'type' => 'group_start',
						'label' => 'Layout',
						'groupid' => 'layout'
					),
						
						'media' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Media Type', 'folie' ),
							
							'default'     => 'type_text',
							'choices' => array(
								'type_text' => 'Only Text',
								'type_icon' => 'Icon',
								'type_svg' => 'SVG',
								'type_custom' => 'Custom IMG'
							),
							'selector' => '.cl_service',
							'reloadTemplate' => true,
							'selectClass' => ''
						),

						'image' => array(
							'type'        => 'image',
							'label'       => __( 'Upload Image', 'folie' ),
							'default'     => '',
							'priority'    => 10,
							'image_get' => 'id',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_custom',
								),
							),
						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => __( 'Image Size', 'folie' ),
								'description' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">Image Sizes Section</a>",
								'default'     => 'full',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
						),

						'animation_icon' => array(
							'type'        => 'switch',
							'label'       => __( 'SVG Animation', 'folie' ),
							'description' => 'Switch to animate SVG on load',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_svg',
								),
							),
						),	
				
						'layout_type' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Layout Type', 'folie' ),
							'description' => esc_attr__( 'Select layout type of service element', 'folie' ),
							'default'     => 'media_aside',
							'choices' => array(
								'media_aside' => 'Media Aside',
								'media_top' => 'Media Top'
							),
							'selector' => '.cl_service',
							'selectClass' => '',
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '!=',
									'value'    => 'type_text',
								),
							),
						),

						'layout_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Align Content and Icon', 'folie' ),
							'description' => esc_attr__( 'Select the align of content and layout of service element', 'folie' ),
							'default'     => 'align_left',
							'choices' => array(
								'align_left' => 'Align Left',
								'align_center' => 'Align Center',
								'align_right' => 'Align Right'
							),
							'selector' => '.cl_service',
							'selectClass' => ''
						),

						'title' => array(
							'type'     => 'inline_text',
							'priority' => 10,
							'selector' => '.cl_service .box-content > h3',
							'label'       => esc_attr__( 'Title', 'folie' ),
							'default'     => 'Custom Service Title',
						),

						'subtitle' => array(
							'type'     => 'inline_text',
							'priority' => 10,
							'selector' => '.cl_service .box-content > .subtitle',
							'label'       => esc_attr__( 'Subtitle', 'folie' ),
							'default'     => 'Custom Subtitle for service',
						),

						'content' => array(
							'type'     => 'inline_text',
							'priority' => 10,
							'selector' => '.cl_service .box-content > .content',
							'label'       => esc_attr__( 'Content', 'folie' ),
							'default'     => 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled',
						),

						'icon' => array(
							'type'     => 'select_icon',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Icon', 'folie' ),
							'default'     => 'cl-icon-camera2',
							'selector' => '.cl_service > .icon_wrapper i',
							'selectClass' => ' ',
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_icon',
								),
							),
						),

						'wrapper' => array(
							
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon Wrapper', 'folie' ),
							'description' => esc_attr__( 'Select the type of wrapper around Icon if you want one', 'folie' ),
							'default'     => 'wrapper_none',
							'choices' => array(
								'wrapper_none' => 'None',
								'wrapper_circle' => 'Circle',
								'wrapper_square' => 'Square',
								//'wrapper_hexagon' => 'Hexagon'
							),
							'selector' => '.cl_service > .icon_wrapper',
							'selectClass' => '',
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '!=',
									'value'    => 'type_text',
								),
							),
						),

						'hover_effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Hover Effect', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'wrapper_accent_color' => 'Wrapper Accent Color'
							),
							'selector' => '.cl_service',
							'selectClass' => 'cl-hover-'
						),

						'service_link' => array(
							'type'     => 'text',
							'priority' => 10,
							'selector' => '',
							'label'       => esc_attr__( 'Service Link', 'folie' ),
							'default'     => ''
						),

					'options_end' => array(
						'type' => 'group_end',
						'label' => 'Layout',
						'groupid' => 'layout'
					),

					
					'extra_start' => array(
						'type' => 'group_start',
						'label' => 'Extra',
						'groupid' => 'extra'
					),

						'subtitle_bool' => array(

							'type'        => 'switch',
							'label'       => __( 'Add subtitle', 'folie' ),
							'description' => 'Switch On if you want a custom subtitle after Primary Title',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'reloadTemplate' => true
						),

						


					'extra_end' => array(
						'type' => 'group_end',
						'label' => 'Extra',
						'groupid' => 'extra'
					),

				'general_tab_end' => array(
					'type' => 'tab_end',
					'label' => 'General',
					'tabid' => 'general'
				),
				'design_tab_begin' => array(
					'type' => 'tab_start',
					'label' => 'Design',
					'tabid' => 'design'
				),

					'panel' => array(
						'type' => 'group_start',
						'label' => 'Box',
						'groupid' => 'design_panel'
					),
				
						'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_service',
							'css_property' => '',
							'default' => array('margin-top' => '35px')
						),

						'box_border_color' => array(
							'type' => 'color',
							'label' => 'Box Border Color',
							'default' => 'rgba(0,0,0,0.0)',
							'selector' => '.cl_service',
							'css_property' => 'border-color',
							'alpha' => true,
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => 'Text Color',
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => 'Dark',
								'light-text' => 'Light'
							),
							'selector' => '.cl_service',
							'selectClass' => ''
						),
					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'design_panel'
					),

					'icon_start' => array(
						'type' => 'group_start',
						'label' => 'Style and Distances',
						'groupid' => 'icon'
					),

						'icon_font_size' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Icon Size', 'folie' ),
							'description' => esc_attr__( 'Change Icon size by moving the slider', 'folie' ),
							'default'     => '36',
							'choices'     => array(
								'min'  => '14',
								'max'  => '120',
								'step' => '1',
							),
							'suffix' => 'px', 
							'selector' => '.cl_service > .icon_wrapper i',
							'css_property' => 'font-size',
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_icon',
								),
							),
						),

						'icon_color' => array(
							'type' => 'color',
							'label' => 'Icon Color',
							'default' => codeless_get_mod('primary_color'),
							'selector' => '.cl_service > .icon_wrapper i',
							'css_property' => 'color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_icon',
								),
							),
						),
						'svg_color' => array(
							'type' => 'color',
							'label' => 'SVG Color',
							'default' => codeless_get_mod('primary_color'),
							'selector' => '.cl_service > .icon_wrapper svg',
							'css_property' => 'stroke',
							'alpha' => false,
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_svg',
								),
							),
						),

						'wrapper_bg_color' => array(
							'type' => 'color',
							'label' => 'Wrapper BG Color',
							'default' => 'rgba(0,0,0,0)',
							'selector' => '.cl_service > .icon_wrapper .wrapper-form',
							'css_property' => 'background-color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'wrapper',
									'operator' => '!=',
									'value'    => 'wrapper_none',
								),
							),
						),

						'wrapper_border_color' => array(
							'type' => 'color',
							'label' => 'Wrapper Border Color',
							'default' => 'rgba(0,0,0,0.5)',
							'selector' => '.cl_service > .icon_wrapper .wrapper-form',
							'css_property' => 'border-color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'wrapper',
									'operator' => '!=',
									'value'    => 'wrapper_none',
								),
							),
						),

						'wrapper_box_shadow' => array(

							'type'        => 'switch',
							'label'       => __( 'Add Shadow', 'folie' ),
							'description' => 'Switch On to add shadow to icon wrapper',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_service > .icon_wrapper',
							'addClass' => 'with-shadow'
						),


						'wrapper_size' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Wrapper and SVG Size', 'folie' ),
							'description' => esc_attr__( 'Change Wrapper size by moving the slider. Can be used for SVG size too.', 'folie' ),
							'default'     => '72',
							'choices'     => array(
								'min'  => '30',
								'max'  => '240',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service > .icon_wrapper .wrapper-form',
							'css_property' => array('width', 'height'),
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '!=',
									'value'    => 'type_text',
								)
							),
						),

						'wrapper_distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon and Wrapper Distance', 'folie' ),
							'description' => esc_attr__( 'Icon and Wrapper distance from content', 'folie' ),
							'default'     => '20',
							'choices'     => array(
								'min'  => '0',
								'max'  => '140',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service > .icon_wrapper',
							'css_property' => array('padding-right', 'padding-bottom', 'padding-left'),
						),

						'title_distance_top' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance Title From Top', 'folie' ),
							'description' => esc_attr__( 'Drag to change the distance of the title from top of element', 'folie' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '30',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service .box-content > h3',
							'css_property' => 'margin-top',

						),

						'title_content_distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance beetween Title and Content', 'folie' ),
							'description' => esc_attr__( 'Drag to change the distance of the content from Title', 'folie' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '140',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service .box-content > .content',
							'css_property' => 'margin-top',
							
						),
						'title_subtitle_distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance beetween Title and Subtitle', 'folie' ),
							'description' => esc_attr__( 'Drag to change the distance of the title from subtitle', 'folie' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '140',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service .box-content > .subtitle',
							'css_property' => 'margin-top',
							'cl_required'    => array(
								array(
									'setting'  => 'subtitle_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
							
						),


					'icon_end' => array(
						'type' => 'group_end',
						'label' => 'Icon',
						'groupid' => 'icon'
					),



					'typography_start' => array(
						'type' => 'group_start',
						'label' => 'Typography',
						'groupid' => 'typography',
					),

						'title_typography' => array(
							'type'        => 'inline_select',
							'label'       => __( 'Title Typography', 'folie' ),
							'description' => 'Select one of the predefined title typography styles on Styling Section or select "Custom Font" if you want to edit the typography of Title. SHIFT-CLICK on Element if you want to modify one of the predefined Style',
							'default'     => 'h5',
							'priority'    => 10,
							'selector' => '.cl_service .box-content > h3',
							'selectClass' => 'custom_font ',
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'folie' ),
								'h2' => esc_attr__( 'H2', 'folie' ),
								'h3' => esc_attr__( 'H3', 'folie' ),
								'h4' => esc_attr__( 'H4', 'folie' ),
								'h5' => esc_attr__( 'H5', 'folie' ),
								'h6' => esc_attr__( 'H6', 'folie' ),
								'custom_font' => esc_attr__( 'Custom Font', 'folie' ),
							),
						),	


						'title_font_size' => array(
		
								'type' => 'slider',
								'label' => 'Title Font Size',
								'default' => '16',
								'selector' => '.cl_service .box-content > h3',
								'css_property' => 'font-size',
								'choices'     => array(
									'min'  => '14',
									'max'  => '72',
									'step' => '1',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),

						'title_font_weight' => array(
		
								'type' => 'inline_select',
								'label' => 'Title Font Weight',
								'default' => '600',
								'selector' => '.cl_service .box-content > h3',
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
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),
							
						'title_line_height' => array(
		
								'type' => 'slider',
								'label' => 'Title Line Height',
								'default' => '22',
								'selector' => '.cl_service .box-content > h3',
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
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),

						'title_letterspace' => array(
		
								'type' => 'slider',
								'label' => 'Title Letter-space',
								'default' => '1',
								'selector' => '.cl_service .box-content > h3',
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
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),
						
						'title_transform' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Title Text Transform', 'folie' ),
								
								'default'     => 'uppercase',
								'selector' => '.cl_service .box-content > h3',
								'css_property' => 'text-transform',
								'choices' => array(
									'none' => 'None',
									'uppercase' => 'Uppercase'
								),
								'cl_required'    => array(
									array(
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
								
							),

						'title_color' => array(
								'type' => 'color',
								'label' => 'Title Color',
								'default' => '#444444',
								'selector' => '.cl_service .box-content > h3',
								'css_property' => 'color',
								'alpha' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
						),
							
						
						
						'custom_desc_typography' => array(
							'type'        => 'switch',
							'label'       => __( 'Content Typography', 'folie' ),
							'description' => 'Switch On if you want to modify default typography of content',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
						),	
						
						
						
						'desc_font_size' => array(
		
								'type' => 'slider',
								'label' => 'Content Font Size',
								'default' => '14',
								'selector' => '.cl_service .box-content > .content',
								'css_property' => 'font-size',
								'choices'     => array(
									'min'  => '14',
									'max'  => '60',
									'step' => '1',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
							),

						'desc_font_weight' => array(
		
								'type' => 'inline_select',
								'label' => 'Content Font Weight',
								'default' => '400',
								'selector' => '.cl_service .box-content > .content',
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
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
							),
							
						'desc_line_height' => array(
		
								'type' => 'slider',
								'label' => 'Content Line Height',
								'default' => '22',
								'selector' => '.cl_service .box-content > .content',
								'css_property' => 'line-height',
								'choices'     => array(
									'min'  => '20',
									'max'  => '80',
									'step' => '1',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
							),
							
						'desc_transform' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Content Text Transform', 'folie' ),
								
								'default'     => 'none',
								'selector' => '.cl_service .box-content > .content',
								'css_property' => 'text-transform',
								'choices' => array(
									'none' => 'None',
									'uppercase' => 'Uppercase'
								),
								'cl_required'    => array(
									array(
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
								
							),
						'desc_color' => array(
								'type' => 'color',
								'label' => 'Content Color',
								'default' => '#6a6a6a',
								'selector' => '.cl_service .box-content > .content',
								'css_property' => 'color',
								'alpha' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
						),


						'subtitle_typography' => array(
							'type'        => 'inline_select',
							'label'       => __( 'Subtitle Typography', 'folie' ),
							'description' => 'Select typography style of Subtitle',
							'default'     => 'default',
							'priority'    => 10,
							'selector' => '.cl_service .box-content > .subtitle',
							'selectClass' => '',
							'choices'     => array(
								'default'  => esc_attr__( 'Default', 'folie' ),
								'custom_font' => esc_attr__( 'Custom Font', 'folie' ),
							),
							'cl_required'    => array(
									array(
										'setting'  => 'subtitle_bool',
										'operator' => '==',
										'value'    => true,
									),
							),
						),	


						'subtitle_font_size' => array(
		
								'type' => 'slider',
								'label' => 'Subtitle Font Size',
								'default' => '14',
								'selector' => '.cl_service .box-content > .subtitle',
								'css_property' => 'font-size',
								'choices'     => array(
									'min'  => '14',
									'max'  => '72',
									'step' => '1',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),

						'subtitle_font_weight' => array(
		
								'type' => 'inline_select',
								'label' => 'Subtitle Font Weight',
								'default' => '400',
								'selector' => '.cl_service .box-content > .subtitle',
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
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),
							
						'subtitle_line_height' => array(
		
								'type' => 'slider',
								'label' => 'Subtitle Line Height',
								'default' => '18',
								'selector' => '.cl_service .box-content > .subtitle',
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
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),

						'subtitle_letterspace' => array(
		
								'type' => 'slider',
								'label' => 'Subtitle Letter-space',
								'default' => '0',
								'selector' => '.cl_service .box-content > .subtitle',
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
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),
						
						'subtitle_transform' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Subtitle Text Transform', 'folie' ),
								
								'default'     => 'none',
								'selector' => '.cl_service .box-content > .subtitle',
								'css_property' => 'text-transform',
								'choices' => array(
									'none' => 'None',
									'uppercase' => 'Uppercase'
								),
								'cl_required'    => array(
									array(
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
								
							),

						'subtitle_color' => array(
								'type' => 'color',
								'label' => 'Subtitle Color',
								'default' => '#a7a7a7',
								'selector' => '.cl_service .box-content > .subtitle',
								'css_property' => 'color',
								'alpha' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
						),




					'typography_end' => array(
						'type' => 'group_end',
						'label' => 'Typography',
						'groupid' => 'typography',
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
							'selector' => '.cl_service'
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
							'selector' => '.cl_service',
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
							'selector' => '.cl_service',
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


				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => 'Design',
					'tabid' => 'design'
				),
			)
		));

 		/* Portfolio */
 		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Portfolio', 'folie' ),
			'section'     => 'cl_codeless_page_builder',
			'description' => 'Create Portfolio Element',
			//'priority'    => 10,
			'icon'		  => 'icon-arrows-squares',
			'transport'   => 'postMessage',
			'settings'    => 'cl_portfolio',
			'css_dependency' => array( CODELESS_BASE_URL.'css/codeless-portfolio.css', CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css', CODELESS_BASE_URL.'css/owl.carousel.min.css', CODELESS_BASE_URL.'css/codeless-image-filters.css'),
			'marginPositions' => array('top'),
			'is_container' => false,
			'fields' => array(

				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => 'General',
						'overlay' => 'Overlay'
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'General',
					'tabid' => 'general'
				),
				
					/* ----------------------------------------------- */
					
					'options_start' => array(
						'type' => 'group_start',
						'label' => 'Layout',
						'groupid' => 'layout'
					),

						


						'layout' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Layout', 'folie' ),
							'default'     => 'grid',
							'choices' => array(
								'grid' => 'Grid',
								'masonry' => 'Masonry',
								'inline' => 'Inline'
							),
							'selector' => '#portfolio-entries',
							'selectClass' => 'portfolio-layout-',
							'reloadTemplate' => true,
							
						),

						'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'folie' ),
							'default'     => 'only_media',
							'choices' => array(
								'classic' => 'Classic',
								'classic_excerpt' => 'Classic Excerpt',
								'media_title' => 'Media and Title',
								'only_media' => 'Only Media'
							),
							'selector' => '#portfolio-entries',
							'selectClass' => 'portfolio-style-',
							'reloadTemplate' => true
							
						),

						'columns' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Columns', 'folie' ),
							'default'     => '3',
							'choices'     => array(
							  '1'  => esc_attr__( '1 Column', 'folie' ),
						      '2'  => esc_attr__( '2 Columns', 'folie' ),
						      '3' => esc_attr__( '3 Columns', 'folie' ),
						      '4' => esc_attr__( '4 Columns', 'folie' ),
						      '5' => esc_attr__( '5 Columns', 'folie' ),
						   ),
							'selector' => '#portfolio-entries', 
							'htmldata' => 'grid-cols',
							'customJS' => array('front' => 'init_cl_portfolio'),
							'reloadTemplate' => true
							
						),

						'distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Columns (Items) Gap', 'folie' ),
							'default'     => '15',
							'choices'     => array(
								'min'  => '0',
								'max'  => '35',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '#portfolio-entries .portfolio_item',
							'css_property' => 'padding',
							'customJS' => array('front' => 'init_cl_portfolio')
						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => __( 'Image Size', 'folie' ),
								'description' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">Image Sizes Section</a>",
								'default'     => 'portfolio_entry',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),

						'portfolio_justify' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Justify Gallery', 'folie' ),
							'default'     => 0,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off'  => esc_attr__( 'Off', 'folie' )
							),
							'reloadTemplate' => true,
							'addClass' => 'cl-justify-gallery',
							'selector' => '#portfolio-entries',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => false,
								),
							),
							
						),

						'portfolio_justify_rowheight' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Justify Row Height', 'folie' ),
							'default'     => '200',
							'choices'     => array(
								'min'  => '120',
								'max'  => '1100',
								'step' => '5',
							),
							'suffix' => '',
							'selector' => '#portfolio-entries',
							'htmldata' => 'rowheight',
							'customJS' => array('front' => 'init_cl_portfolio'),
							array(
									'setting'  => 'portfolio_justify',
									'operator' => '==',
									'value'    => true,
							),
						),

						'portfolio_justify_margins' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Justify Item Margins', 'folie' ),
							'default'     => '15',
							'choices'     => array(
								'min'  => '0',
								'max'  => '100',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '#portfolio-entries',
							'htmldata' => 'margins',
							'customJS' => array('front' => 'init_cl_portfolio'),
							array(
									'setting'  => 'portfolio_justify',
									'operator' => '==',
									'value'    => true,
							),
						),


					'options_end' => array(
						'type' => 'group_end',
						'label' => 'Layout',
						'groupid' => 'layout'
					),


					'carousel_start' => array(
						'type' => 'group_start',
						'label' => 'Carousel',
						'groupid' => 'carousel'
					),
						'carousel' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want carousel', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '#portfolio-entries',
							'addClass' => 'owl-carousel cl-carousel owl-theme',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio')
						),	


						'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '#portfolio-entries',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => true,
								),
							),
						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '#portfolio-entries',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'), 
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => true,
								),
							),
						),	

					'carousel_end' => array(
						'type' => 'group_end',
						'label' => 'Carousel',
						'groupid' => 'carousel'
					),

					'extra_style' => array(
						'type' => 'group_start',
						'label' => 'Extra Style',
						'groupid' => 'extra'
					),

						'portfolio_item_title_style' => array(
							'type'        => 'inline_select',
							'label'       => __( 'Title Style', 'folie' ),
							'description' => '',
							'default'     => 'h4',
							'priority'    => 10,
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'folie' ),
								'h2' => esc_attr__( 'H2', 'folie' ),
								'h3' => esc_attr__( 'H3', 'folie' ),
								'h4' => esc_attr__( 'H4', 'folie' ),
								'h5' => esc_attr__( 'H5', 'folie' ),
								'h6' => esc_attr__( 'H6', 'folie' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'style',
									'operator' => '!=',
									'value'    => 'only_media',
								),
							),
							'reloadTemplate' => true
						),

						

						'portfolio_pagination_style' => array( 
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Pagination', 'folie' ),
							'default'     => 'numbers',
							'choices'     => array(
								'none'  => esc_attr__( 'None', 'folie' ),
								'numbers'  => esc_attr__( 'Page Numbers', 'folie' ),
								'next_prev'  => esc_attr__( 'Next/Prev', 'folie' ),
								'load_more'  => esc_attr__( 'Load More', 'folie' ),
								'infinite_scroll'  => esc_attr__( 'Infinite', 'folie' ),
								
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => false,
								),
							),

						),

						'portfolio_filters' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Filters', 'folie' ),
							'default'     => 'disabled',
							'choices'     => array(
								'disabled'  => esc_attr__( 'Disabled', 'folie' ),
								'small'  => esc_attr__( 'Small Square', 'folie' ),
								'fullwidth'  => esc_attr__( 'Fullwidth', 'folie' )
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => false,
								),
							),
							
						),

						'portfolio_filters_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Filter Align', 'folie' ),
							'default'     => 'center',
							'choices'     => array(
								'left'  => esc_attr__( 'Left', 'folie' ),
								'center'  => esc_attr__( 'Center', 'folie' ),
								'right'  => esc_attr__( 'Right', 'folie' ),
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_filters',
									'operator' => '!=',
									'value'    => 'disabled',
								),
							),
							
						),

						'portfolio_filters_color' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Filter Color Type', 'folie' ),
							'default'     => 'dark',
							'choices'     => array(
								'dark'  => esc_attr__( 'Dark', 'folie' ),
								'light'  => esc_attr__( 'Light', 'folie' )
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_filters',
									'operator' => '==',
									'value'    => 'fullwidth',
								),
							),
							
						),



						'filter_fullwidth_shadow' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Fullwidth Filter with Shadow', 'folie' ),
							'default'     => 0,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off'  => esc_attr__( 'Off', 'folie' )
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_filters',
									'operator' => '==',
									'value'    => 'fullwidth',
								),
							),
							
						),

						'filter_fullwidth_sticky' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Fullwidth Filter Sticky', 'folie' ),
							'default'     => 0,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off'  => esc_attr__( 'Off', 'folie' )
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_filters',
									'operator' => '==',
									'value'    => 'fullwidth',
								),
							),
							
						),



						'image_filter' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Images Filter', 'folie' ),
							'description' => esc_attr__( 'Applied on portfolio images', 'folie' ),
							'default'     => 'normal',
							'choices' => array(
								'normal' => 'normal',
								'darken' => 'darken',
								'_1977' => '1977',
								'aden' => 'aden',
								'brannan' => 'brannan',
								'brooklyn' => 'brooklyn',
								'clarendon' => 'clarendon',
								'earlybird' => 'earlybird',
								'gingham' => 'gingham',
								'hudson' => 'hudson',
								'inkwell' => 'inkwell',
								'kelvin' => 'kelvin',
								'lark' => 'lark',
								'lofi' => 'lo-Fi',
								'maven' => 'maven',
								'mayfair' => 'mayfair',
								'moon' => 'moon',
								'nashville' => 'nashville',
								'perpetua' => 'perpetua',
								'reyes' => 'reyes',
								'rise' => 'rise',
								'slumber' => 'slumber',
								'stinson' => 'stinson',
								'toaster' => 'toaster',
								'valencia' => 'valencia',
								'walden' => 'walden',
								'willow' => 'willow',
								'xpro2' => 'x-pro II'
							),
							'reloadTemplate' => true
						),

						

						'boxed' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Boxed Style', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want to add a boxed shadow. Works only on Classic and Classic with Excerpt', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '#portfolio-entries',
							'addClass' => 'portfolio_boxed',
						),	

						'portfolio_animation' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => __( 'Animation', 'folie' ),
							'description' => __( '', 'folie' ),
							'default'     => 'bottom-t-top',
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

							'reloadTemplate' => true,
						),




					'extra_style_end' => array(
						'type' => 'group_end',
						'label' => 'Extra Style',
						'groupid' => 'extra'
					),


					'query_start' => array(
						'type' => 'group_start',
						'label' => 'Query',
						'groupid' => 'query'
					),	

						'categories' => array(
							'type'     => 'select',
							'multiple' => 100,
							'priority' => 10,
							'label'       => esc_attr__( 'Categories', 'folie' ),
							'default'     => '',
							'choices' => codeless_get_terms( 'portfolio_entries' ),
							'reloadTemplate' => true,
						),

						'posts_per_page' => array(
							'type' => 'text',
							'label'    => __( 'Items per page', 'folie' ),
							'description' => __( 'Maximal number of items that will show in one portfolio page', 'folie' ),
							'default'  => 12,
							'reloadTemplate' => true
						),

						'orderby' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'folie' ),
							'default'     => 'date',

							'choices'     => array(
								'none' => __('No order', 'folie'),
								'ID' => __('Post ID', 'folie'),
								'author' => __('Author', 'folie'),
								'title' => __('Title', 'folie'),
								'name' => __('Name (slug)', 'folie'),
								'date' => __('Date', 'folie'),
								'modified' => __('Modified', 'folie'),
							),

							'reloadTemplate' => true,
						),


						'order' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order', 'folie' ),
							'default'     => 'DESC',

							'choices'     => array(
								'DESC' => __('Descending', 'folie'),
								'ASC' => __('Ascending', 'folie'),				
							),
							'reloadTemplate' => true
						),

						'portfolio_custom_link_target' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Link Target', 'folie' ),
							'default'     => '_self',

							'choices'     => array(
								'_self' => __('_self', 'folie'),
								'_blank' => __('_blank', 'folie'),				
							),
							'reloadTemplate' => true
						),



					'query_end' => array(
						'type' => 'group_end',
						'label' => 'Query',
						'groupid' => 'query'
					),

				'general_tab_end' => array(
						'type' => 'tab_end',
						'label' => 'General',
						'tabid' => 'general'
				),	

				'overlay_start' => array(
						'type' => 'tab_start',
						'label' => 'Overlay',
						'tabid' => 'overlay'
				),

					'overlay_layout' => array(
						'type' => 'group_start',
						'label' => 'Overlay Layout',
						'groupid' => 'overlay_layout'
					),
						'portfolio_overlay' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'folie' ),
							
							'default'     => 'color',

							'choices'     => array(
								'none'  => esc_attr__( 'None', 'folie' ),
								'color'  => esc_attr__( 'Color Overlay', 'folie' ),
								'zoom_color'  => esc_attr__( 'Zoom and Color', 'folie' ),
								'grayscale'  => esc_attr__( 'Grayscale Hover', 'folie' ),
								'two_icons' => esc_attr__( 'Two Icons', 'folie' )
							),
							'reloadTemplate' => true
						),

						

						'portfolio_overlay_layout' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Layout', 'folie' ),
							'description' => esc_attr__( 'Position of content into the overlay ( icons, title, tags )', 'folie' ),
							'default'     => 'center',

							'choices'     => array(
								'center'  => esc_attr__( 'Center', 'folie' ),
								'icon_top_content_bottom'  => esc_attr__( 'Icon Top / Content Bottom', 'folie' ),
								'content_top'  => esc_attr__( 'Content Top / Icon Bottom', 'folie' )
							),
							'selector' => '#portfolio-entries',
							'selectClass' => 'overlay-layout-'
						),

						'portfolio_overlay_title_bool' => array(
							'type'        => 'switch',
							'label'       => __( 'Show Title', 'folie' ),
							'description' => '',
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'reloadTemplate' => true
						),

						'portfolio_overlay_title_style' => array(
							'type'        => 'inline_select',
							'label'       => __( 'Title Style', 'folie' ),
							'description' => '',
							'default'     => 'h5',
							'priority'    => 10,
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'folie' ),
								'h2' => esc_attr__( 'H2', 'folie' ),
								'h3' => esc_attr__( 'H3', 'folie' ),
								'h4' => esc_attr__( 'H4', 'folie' ),
								'h5' => esc_attr__( 'H5', 'folie' ),
								'h6' => esc_attr__( 'H6', 'folie' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_overlay_title_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
							'reloadTemplate' => true
						),

						'portfolio_overlay_categories_bool' => array(
							'type'        => 'switch',
							'label'       => __( 'Show Categories', 'folie' ),
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'reloadTemplate' => true
						),

						'portfolio_overlay_icon_bool' => array(
							'type'        => 'switch',
							'label'       => __( 'Show Icon', 'folie' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'reloadTemplate' => true
						),

						'portfolio_overlay_icon' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon', 'folie' ),
							
							'default'     => 'plus2',

							'choices'     => array(
								'plus2'  => esc_attr__( 'Plus', 'folie' ),
								'arrow-right'  => esc_attr__( 'Arrow Right', 'folie' ),
								'expand2'  => esc_attr__( 'Expand', 'folie' ),
								'lightbox' => esc_attr__( 'Lightbox', 'folie' ),
								'lightbox_link' => esc_attr__( 'Lightbox & Link', 'folie' ),
							),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_overlay_icon_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
						),


						'portfolio_overlay_distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance', 'folie' ),
							'description' => esc_attr__( 'Distance between portfolio overlay and photo corners', 'folie' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '100',
								'step' => '5',
							),
							'suffix' => 'px',
							'selector' => '#portfolio-entries .entry-overlay',
							'css_property' => 'padding'
						),

					'overlay_layout_end' => array(
						'type' => 'group_end',
						'label' => 'Overlay Layout',
						'groupid' => 'overlay_layout'
					),


					'overlay_design' => array(
						'type' => 'group_start',
						'label' => 'Overlay Design',
						'groupid' => 'overlay_design'
					),

						'portfolio_overlay_color' => array(

							'type' => 'color',
							'label' => 'BG Color',
							'default' => 'rgba(31, 180, 204, 0.86)',
							'selector' => '#portfolio-entries .portfolio_item .entry-overlay .overlay-wrapper',
							'css_property' => 'background-color',
							'alpha' => true
							
						),

						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Bg Color', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'azure_pop' =>	'Azure Pop',
								'love_couple' => 'Love Couple',
								'disco' => 'Disco',
								'limeade' => 'Limeade',
								'dania' => 'Dania',
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => 'Sun Horizon',
								'blood_red' => 'Blood Red',
								'sherbert' => 'Sherbert',
								'firewatch' => 'Firewatch',
								'frost' => 'Frost',
								'mauve' => 'Mauve',
								'deep_sea' => 'Deep Sea',
								'solid_vault' => 'Solid Vault',
								'deep_space' =>	'Deep Space',
								'suzy' => 'Suzy'
								
								
							),
							'selector' => '#portfolio-entries .portfolio_item .entry-overlay .overlay-wrapper',
							'selectClass' => 'cl-gradient-',
						
						),

						'portfolio_overlay_content_color' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Content Color', 'folie' ),
							'default'     => 'light-text',

							'choices'     => array(
								'light-text'  => esc_attr__( 'Light', 'folie' ),
								'dark-text'  => esc_attr__( 'Dark', 'folie' )
							),

							'reloadTemplate' => true,
							'selector' => '#portfolio-entries .entry-overlay',
							'selectClass' => ''
						),
						

						'portfolio_overlay_content_animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Content Animation', 'folie' ),
							'default'     => 'alpha-anim',
							'choices' => array(
								'none'	=> 'None',
								'top-t-bottom' =>	'Top-Bottom',
								'bottom-t-top' =>	'Bottom-Top',
								'left-t-right' => 'Left-Right',
								'alpha-anim' => 'Fade-In',	
							
							),
							'selector' => '#portfolio-entries',
							'selectClass' => 'overlay-anim_'
						),

					'overlay_design_end' => array(
						'type' => 'group_end',
						'label' => 'Overlay Design',
						'groupid' => 'overlay_design'
					),

				'overlay_end' => array(
						'type' => 'tab_end',
						'label' => 'Overlay',
						'tabid' => 'overlay'
				),


				

			)
 		));

 		/* Codeless Slider */
 		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Codeless Slider', 'folie' ),
			'section'     => 'cl_codeless_page_builder',
			'description' => 'Codeless Slider',
			//'priority'    => 10,
			'icon'		  => 'icon-basic-webpage-multiple',
			'transport'   => 'postMessage',
			'settings'    => 'cl_slider',
			'is_root'	  => true,
			'marginPositions' => array('top'),
			'is_container' => true,
			'fields' => array(
				'slider_height' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Slider Height', 'folie' ),
							'description' => esc_attr__( 'This is used as slider height. All slides inherit this value', 'folie' ),
							'default'     => '400',
							'choices'     => array(
								'min'  => '200',
								'max'  => '2000',
								'step' => '5',
							),
							'suffix' => 'px', 
							'selector' => '.cl_slider',
							'css_property' => 'height'
				),

				'fullheight' => array(
							'type'        => 'switch',
							'label'       => __( 'Full Height Slider', 'folie' ),
							'description' => 'Stretch Slider in a fullscreen style.',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_slider',
							'addClass' => 'cl_slider-fullheight',
							'customJS' => array('front' => 'fullHeightSlider'),
				),

				

				'fullheight_responsive' => array(
							'type'        => 'switch',
							'label'       => __( 'Force Fullheight on responsive', 'folie' ),
							'description' => 'Active to force fullheight slider on responsive devices',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_slider',
							'addClass' => 'cl_slider-force-fullheight',
							'customJS' => array('front' => 'fullHeightSlider'),
				),

				'navigation' => array(
							'type'        => 'switch',
							'label'       => __( 'Prev / Next Buttons', 'folie' ),
							'description' => 'Switch on/off navigation buttons',
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'navigation',
						),

				'navigation_style' => array(
							'type'        => 'inline_select',
							'label'       => __( 'Navigation Style', 'folie' ),
							'description' => 'Switch on/off navigation buttons',
							'default'     => 'lateral',
							'priority'    => 10,
							'choices'     => array(
								'lateral' => 'Lateral',
								'rounded_left_bottom' => 'Rounded Left Bottom'
							),
							'selector' => '.cl_slider',
							'htmldata' => 'navigation-style',
						),

				'pagination' => array(
							'type'        => 'switch',
							'label'       => __( 'Pagination Buttons', 'folie' ),
							'description' => 'Switch on/off pagination buttons',
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'pagination',
						),

				'pagination_style' => array(
							'type'        => 'inline_select',
							'label'       => __( 'Pagination Style', 'folie' ),
							'description' => 'Switch on/off pagination buttons',
							'default'     => 'round',
							'priority'    => 10,
							'choices'     => array(
								'round' => 'Rounded',
								'lines' => 'Lines'
							),
							'selector' => '.cl_slider',
							'htmldata' => 'pagination-style',
						),
				'effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Effect', 'folie' ),
							'description' => esc_attr__( 'Need reload to function properly. Test it in website frontpage or make a reload here.', 'folie' ),
							'default'     => 'fade',
							'choices' => array(
								'fade' => 'Fade',
								'slide' => 'Slide',
								'cube' => 'Cube',
								'coverflow' => 'Coverflow',
								'flip' => 'Flip',
								'interleave' => 'Interleave',
								'softscale' => 'SoftScale'
							),
							'selector' => '.cl_slider',
							'htmldata' => 'effect',
							'customJS' => array('front' => 'codelessSlider')
						),
				'direction' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Direction', 'folie' ),
							'description' => esc_attr__( 'Need reload to function properly. Test it in website frontpage or make a reload here.', 'folie' ),
							'default'     => 'horizontal',
							'choices' => array(
								'horizontal' => 'Horizontal',
								'vertical' => 'Vertical',
								
							),
							'selector' => '.cl_slider',
							'htmldata' => 'direction'
						),
				'responsive_plain_slider' => array(
							'type'        => 'switch',
							'label'       => __( 'Slider as Plain in responsive', 'folie' ),
							'description' => 'By switch this on slider will show as plain sections not as slider in responsive devices. Works only with Vetical Slider',
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_slider',
							'cl_required'    => array(
								array(
									'setting'  => 'direction',
									'operator' => '==',
									'value'    => 'vertical',
								),
							),
							'addClass' => 'cl_slider-responsive-plain',
				),
				'speed' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Transition Speed', 'folie' ),
							'description' => esc_attr__( 'Need reload to function properly. Test it in website frontpage or make a reload here.', 'folie' ),
							'default'     => '300',
							'selector' => '.cl_slider',
							'htmldata' => 'speed'
						),
				'autoplay' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Autoplay, delay between slides in ms', 'folie' ),
							'description' => esc_attr__( 'Leave 0 if you dont want an autoplay slider', 'folie' ),
							'default'     => '6500',
							'selector' => '.cl_slider',
							'htmldata' => 'autoplay'
						),
				'loop' => array(
							'type'        => 'switch',
							'label'       => __( 'Loop', 'folie' ),
							'description' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'loop',
						),

				'anchor_labels' => array(
							'type'        => 'switch',
							'label'       => __( 'Show Anchor Labels', 'folie' ),
							'description' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'anchors',
						),
				'mousewheel' => array(
							'type'        => 'switch',
							'label'       => __( 'Mousewheel', 'folie' ),
							'description' => 'Useful in vertical sliders',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'mousewheel',
						),

				'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_slider',
							'css_property' => '',
							'default' => ''
					),
			)
		));

			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Codeless Slide', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				'description' => 'Add new slide for codeless slider',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-elaboration-browser-star',
				'transport'   => 'postMessage',
				'settings'    => 'cl_slide',
				'hide_from_list' => true,
				'is_container' => true,
				'fields' => array(
					'animation_slide' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'cinemagraphs_first' => 'Cinemagraphs 1',
								'cinemagraphs_two' => 'Cinemagraphs 2'
								
							),
							'selector' => '.cl-slide',
							'selectClass' => 'cl-slide-animation animation--'
					),

					'add_scroll_svg' => array(
							'type'        => 'switch',
							'label'       => __( 'Scroll SVG Bottom', 'folie' ),
							'description' => __( 'By activate this a new SVG Mouse Scroll indication will show on this slide.', 'folie' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							)
							
					),
				)
			));

			/* Testimonial */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Testimonial', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-message-multiple',
				'transport'   => 'postMessage',
				'settings'    => 'cl_testimonial',
				'is_container' => false,
				'css_dependency' => array( CODELESS_BASE_URL.'css/owl.carousel.min.css'),
				'marginPositions' => array('top'),
				'fields' => array(

					'carousel_start' => array(
						'type' => 'group_start',
						'label' => 'Carousel',
						'groupid' => 'carousel'
					),	
						'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want carousel navigation', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '#testimonial-entries',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true

						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '#testimonial-entries',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,

						),	

					'carousel_end' => array(
						'type' => 'group_end',
						'label' => 'Carousel',
						'groupid' => 'carousel'
					),

					'query_start' => array(
						'type' => 'group_start',
						'label' => 'Query',
						'groupid' => 'query'
					),	

						'categories' => array(
							'type'     => 'select',
							'multiple' => 100,
							'priority' => 10,
							'label'       => esc_attr__( 'Categories', 'folie' ),
							
							'default'     => '',
							'choices' => codeless_get_terms( 'testimonial_entries' ),
							'reloadTemplate' => true,
						),

						'posts_per_page' => array(
							'type' => 'text',
							'label'    => __( 'Items per page', 'folie' ),
							'description' => __( 'Maximal number of items that will show', 'folie' ),
							'default'  => 12,
							'reloadTemplate' => true
						),

						'orderby' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'folie' ),
							
							'default'     => 'date',
							'multiple' => false,
							'choices'     => array(
								'none' => __('No order', 'folie'),
								'ID' => __('Post ID', 'folie'),
								'author' => __('Author', 'folie'),
								'title' => __('Title', 'folie'),
								'name' => __('Name (slug)', 'folie'),
								'date' => __('Date', 'folie'),
								'modified' => __('Modified', 'folie'),
							),

							'reloadTemplate' => true,
						),


						'order' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'folie' ),
							
							'default'     => 'DESC',
							'multiple' => false,
							'choices'     => array(
								'DESC' => __('Descending', 'folie'),
								'ASC' => __('Ascending', 'folie'),				
							),
							'reloadTemplate' => true
						),



					'query_end' => array(
						'type' => 'group_end',
						'label' => 'Query',
						'groupid' => 'query'
					),

				)

			));

			/* Blog */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Blog', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-archive-full',
				'transport'   => 'postMessage',
				'settings'    => 'cl_blog',
				'is_container' => false,
				'marginPositions' => array('top'),
				'css_dependency' => array( CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css', CODELESS_BASE_URL.'css/owl.carousel.min.css', CODELESS_BASE_URL.'css/codeless-image-filters.css'),
				'fields' => array(
					'general_group_start' => array(
						'type' => 'group_start',
						'label' => 'General',
						'groupid' => 'general'
					),	

						'blog_style' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => __( 'Blog Style', 'folie' ),
							'description' => __( 'Select one of the blog styles that you want to use as a default template', 'folie' ),
							'default'     => 'grid',
							'choices'     => array(
								'default'  => esc_attr__( 'Default', 'folie' ),
								'alternate'  => esc_attr__( 'Alternate', 'folie' ),
								'minimal'  => esc_attr__( 'Minimal', 'folie' ),
								'timeline'  => esc_attr__( 'Timeline', 'folie' ),
								'grid'  => esc_attr__( 'Grid', 'folie' ),
								'masonry' => esc_attr__( 'Masonry', 'folie' ),
								'news' => esc_attr__( 'News', 'folie' ),
								'media' => esc_attr__( 'Only Media', 'folie' )
							),

							'reloadTemplate' => true,
						),


						'blog_news' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => __( 'News Grid Layout', 'folie' ),
							'description' => __( 'Select one of the blog news grid layouts.', 'folie' ),
							'default'     => 'grid_1',
							'choices' => array(
								'grid_1' => 'Layout 1',
								'grid_2' => 'Layout 2',
								'grid_3' => 'Layout 3',
							),
							'selector' => '.cl_blog > #blog-entries',
							'selectClass' => 'news-layout-',
							'cl_required'    => array(
								array(
									'setting'  => 'blog_style',
									'operator' => '==',
									'value'    => 'news',
								),
							),
							'reloadTemplate' => true,
						),


						'blog_simple' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Blog Simplified', 'folie' ),
							'description' => esc_attr__( 'By Switch On this, a custom simplified style will be supplied. Blog Element will look awesome!', 'folie' ),
							'default'     => 1,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'cl_required'    => array(
								array(
									'setting'  => 'blog_style',
									'operator' => '==',
									'value'    => 'grid',
								),
							),
							'selector' => '.cl_blog',
							'addClass' => 'blog-simplified',
						),	

						'blog_simple_font' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Blog Simplified Font', 'folie' ),
							'description' => esc_attr__( 'By Switch On this, a custom font size (16px) will apply for Blog Title. This option works only on blog simplified', 'folie' ),
							'default'     => 1,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_blog',
							'addClass' => 'blog-simplified-font',
							'cl_required'    => array(
								array(
									'setting'  => 'blog_simple',
									'operator' => '==',
									'value'    => true,
								),
							),
						),	




						'blog_grid_layout' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => __( 'Grid Layout', 'folie' ),
							'description' => __( '', 'folie' ),
							'default'     => '3',
							'choices' => array(
								'2'	=> '2 Columns',
								'3'	=> '3 Columns',
								'4'	=> '4 Columns',
								'5'	=> '5 Columns',
							),

							'reloadTemplate' => true,
						),

						'blog_pagination' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Blog Pagination', 'folie' ),
							
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'reloadTemplate' => true

						),	


						'blog_animation' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => __( 'Animation Type', 'folie' ),
							'description' => __( '', 'folie' ),
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

							'reloadTemplate' => true,
						),

						'blog_remove_meta' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Remove Blog Meta', 'folie' ),
							'description' => esc_attr__( 'By switch ON this option, will be removed all meta of blogs (author, date, categories). If you want you can switch this option OFF and manage them directly from General Blog Section', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'reloadTemplate' => true

						),	


						'image_filter' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Images Filter', 'folie' ),
							'description' => esc_attr__( 'Applied on blog images', 'folie' ),
							'default'     => 'normal',
							'choices' => array(
								'normal' => 'normal',
								'darken' => 'darken',
								'_1977' => '1977',
								'aden' => 'aden',
								'brannan' => 'brannan',
								'brooklyn' => 'brooklyn',
								'clarendon' => 'clarendon',
								'earlybird' => 'earlybird',
								'gingham' => 'gingham',
								'hudson' => 'hudson',
								'inkwell' => 'inkwell',
								'kelvin' => 'kelvin',
								'lark' => 'lark',
								'lofi' => 'lo-Fi',
								'maven' => 'maven',
								'mayfair' => 'mayfair',
								'moon' => 'moon',
								'nashville' => 'nashville',
								'perpetua' => 'perpetua',
								'reyes' => 'reyes',
								'rise' => 'rise',
								'slumber' => 'slumber',
								'stinson' => 'stinson',
								'toaster' => 'toaster',
								'valencia' => 'valencia',
								'walden' => 'walden',
								'willow' => 'willow',
								'xpro2' => 'x-pro II'
							),
							'reloadTemplate' => true
						),

						'blog_image_lazyload' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Lazyload Image', 'folie' ),
							'description' => esc_attr__( 'Image will be loaded only when it\'s on viewport', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),

							'reloadTemplate' => true,
						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => __( 'Image Size', 'folie' ),
								'description' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">Image Sizes Section</a>. When leaved default, for grid, alternate, news, media styles will be use the 'blog_entry_small' for other styles the 'blog_entry' ",
								'default'     => 'theme_default',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),


					'general_group_end' => array(
						'type' => 'group_end',
						'label' => 'General',
						'groupid' => 'general'
					),


					'carousel_start' => array(
						'type' => 'group_start',
						'label' => 'Carousel',
						'groupid' => 'carousel'
					),	

						'carousel' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want carousel', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_blog > #blog-entries',
							'addClass' => 'owl-carousel cl-carousel owl-theme',
							'reloadTemplate' => true,
						),	

						'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want carousel navigation', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_blog > #blog-entries',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true

						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'folie' ),
							'default'     => 1,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_blog > #blog-entries',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,

						),	

					'carousel_end' => array(
						'type' => 'group_end',
						'label' => 'Carousel',
						'groupid' => 'carousel'
					),

					'query_start' => array(
						'type' => 'group_start',
						'label' => 'Query',
						'groupid' => 'query'
					),	

						'categories' => array(
							'type'     => 'select',
							'multiple' => 100,
							'priority' => 10,
							'label'       => esc_attr__( 'Categories', 'folie' ),
							
							'default'     => '',
							'choices' => codeless_get_terms( 'post' ),
							'reloadTemplate' => true,
						),

						'posts_per_page' => array(
							'type' => 'text',
							'label'    => __( 'Items per page', 'folie' ),
							'description' => __( 'Maximal number of items that will show', 'folie' ),
							'default'  => 6,
							'reloadTemplate' => true
						),

						'orderby' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'folie' ),
							
							'default'     => 'date',
							'multiple' => false,
							'choices'     => array(
								'none' => __('No order', 'folie'),
								'ID' => __('Post ID', 'folie'),
								'author' => __('Author', 'folie'),
								'title' => __('Title', 'folie'),
								'name' => __('Name (slug)', 'folie'),
								'date' => __('Date', 'folie'),
								'modified' => __('Modified', 'folie'),
							),

							'reloadTemplate' => true,
						),


						'order' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'folie' ),
							
							'default'     => 'DESC',
							'multiple' => false,
							'choices'     => array(
								'DESC' => __('Descending', 'folie'),
								'ASC' => __('Ascending', 'folie'),				
							),
							'reloadTemplate' => true
						),



					'query_end' => array(
						'type' => 'group_end',
						'label' => 'Query',
						'groupid' => 'query'
					),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.cl_blog',
						'css_property' => '',
						'default' => array('margin-top' => '35px')
					),

				)
			));

 			/* Team */
 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Team', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-postcard-multiple',
				'transport'   => 'postMessage',
				'settings'    => 'cl_team',
				'is_container' => false,
				'css_dependency' => array( CODELESS_BASE_URL.'css/owl.carousel.min.css'),
				'marginPositions' => array('top'),
				'fields' => array(

					'general_start' => array(
						'type' => 'group_start',
						'label' => 'General',
						'groupid' => 'general'
					),	

						'is_single' => array(
							'type'        => 'switch',
							'label'       => __( 'Single Team', 'folie' ),
							'description' => 'Switch On to show only one Team Member.',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_team',
							'addClass' => 'is_single',
							'reloadTemplate' => true
						),

						'style' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'folie' ),
							
							'default'     => 'simple',

							'choices'     => array(
								'simple' => __('Simple', 'folie'),
								'photo' => __('Only Photo', 'folie')
							),
							'selector' => '.cl_team',
							'selectClass' => 'style-',

							'reloadTemplate' => true,
							
						),

						'grid_layout' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => __( 'Layout', 'folie' ),
							'description' => __( '', 'folie' ),
							'default'     => '3',
							'choices' => array(
								'2'	=> '2 Columns',
								'3'	=> '3 Columns',
								'4'	=> '4 Columns',
								'5'	=> '5 Columns',
								'6'	=> '6 Columns',
							),
							'selector' => '.cl_team',
							'htmldata' => 'columns',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),

						'team_items_distance' => array(
								'type'     => 'slider',
								'priority' => 10,
								'label'       => esc_attr__( 'Distance between Team Members', 'folie' ),
								
								'default'     => '15',
								'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '5',
								),
								'suffix' => 'px',
								'selector' => '.cl_team .team-item',
								'css_property' => 'padding'
							),

						'carousel' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want carousel', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							
							),
							'selector' => '.cl_team',
							'addClass' => 'owl-carousel cl-carousel owl-theme',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'teamCarousel')
						),	


						'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want carousel navigation', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_team',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'teamCarousel'),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_team',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'), 
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),	


						'title_typography' => array(
							'type'        => 'inline_select',
							'label'       => __( 'Title Typography', 'folie' ),
							'description' => 'Select one of the predefined title typography styles on Styling Section',
							'default'     => 'h3',
							'priority'    => 10,
							'selector' => '.cl_team .team-name',
							'selectClass' => 'custom_font ',
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'folie' ),
								'h2' => esc_attr__( 'H2', 'folie' ),
								'h3' => esc_attr__( 'H3', 'folie' ),
								'h4' => esc_attr__( 'H4', 'folie' ),
								'h5' => esc_attr__( 'H5', 'folie' ),
								'h6' => esc_attr__( 'H6', 'folie' ),
							),
						),


						'team_animation' => array(
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
							'reloadTemplate' => true
						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => __( 'Image Size', 'folie' ),
								'description' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">Image Sizes Section</a>",
								'default'     => 'team_entry',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),


					'general_end' => array(
						'type' => 'group_end',
						'label' => 'General',
						'groupid' => 'general'
					),	


 					'query_start' => array(
						'type' => 'group_start',
						'label' => 'Query',
						'groupid' => 'query'
					),	

						'team_id' => array(
							'type'     => 'select',
							'priority' => 10,
							'label'       => esc_attr__( 'Items', 'folie' ),
							
							'default'     => '',
							'choices' => codeless_get_items_by_term( 'staff' ),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 1,
								),
							)
						),

						'categories' => array(
							'type'     => 'select',
							'multiple' => 100,
							'priority' => 10,
							'label'       => esc_attr__( 'Categories', 'folie' ),
							
							'default'     => '',
							'choices' => codeless_get_terms( 'staff_entries' ),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),

						'posts_per_page' => array(
							'type' => 'text',
							'label'    => __( 'Items per page', 'folie' ),
							'description' => __( 'Maximal number of items that will show in one portfolio page', 'folie' ),
							'default'  => 12,
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),

						'orderby' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'folie' ),
							
							'default'     => 'date',

							'choices'     => array(
								'none' => __('No order', 'folie'),
								'ID' => __('Post ID', 'folie'),
								'author' => __('Author', 'folie'),
								'title' => __('Title', 'folie'),
								'name' => __('Name (slug)', 'folie'),
								'date' => __('Date', 'folie'),
								'modified' => __('Modified', 'folie'),
							),

							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),


						'order' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'folie' ),
							
							'default'     => 'DESC',

							'choices'     => array(
								'DESC' => __('Descending', 'folie'),
								'ASC' => __('Ascending', 'folie'),				
							),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),



					'query_end' => array(
						'type' => 'group_end',
						'label' => 'Query',
						'groupid' => 'query'
					),


					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_team',
							'css_property' => '',
							'default' => array('margin-top' => '35px')
						),



				)
			));
			
 			/* Shop */
			if( class_exists('woocommerce') ){
			
				cl_builder_map(array(
					'type'        => 'clelement',
					'label'       => esc_attr__( 'Shop', 'folie' ),
					'section'     => 'cl_codeless_page_builder',
					//'priority'    => 10,
					'icon'		  => 'icon-ecommerce-cart',
					'transport'   => 'postMessage',
					'settings'    => 'cl_woocommerce',
					'css_dependency' => array( CODELESS_BASE_URL.'css/codeless-woocommerce.css', CODELESS_BASE_URL.'css/owl.carousel.min.css'),
					'is_container' => false,
					'fields' => array(

						'shortcode' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Select Action', 'folie' ),
								'description' => esc_attr__( 'Select one of Woocommerce elements that you want to add', 'folie' ),
								'default'     => 'recent_products',
								'choices' => array(
									'archive' => 'Archive with pagination',
									'recent_products' => 'Recent Products',
									'featured_products' => 'Featured Products',
									'product_category' => 'Product Category',
									'sale_products' => 'Sale Products',
									'best_selling_products' => 'Best Selling Products',
									'top_rated_products' => 'Top Rated Products',
								
								),
								'selector' => '.cl_woocommerce',
								'selectClass' => 'action-',
								'reloadTemplate' => true
							),

						'columns' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Columns', 'folie' ),
								'default'     => '3',
								'choices'     => array(
							      '2'  => esc_attr__( '2 Columns', 'folie' ),
							      '3' => esc_attr__( '3 Columns', 'folie' ),
							      '4' => esc_attr__( '4 Columns', 'folie' ),
							      '5' => esc_attr__( '5 Columns', 'folie' ),
							      '6' => esc_attr__( '6 Columns', 'folie' ),
							   ),
								'reloadTemplate' => true
								
							),

							'category' => array(
								'type'     => 'inline_select', 
								'priority' => 10,
								'label'       => esc_attr__( 'Category', 'folie' ),
								'default'     => '',
								'choices' => codeless_get_terms( 'product_cat', true ),
								'reloadTemplate' => true,
							),

							'per_page' => array(
								'type' => 'text',
								'label'    => __( 'Items per page', 'folie' ),
								'description' => __( 'Maximal number of items that will show', 'folie' ),
								'default'  => 12,
								'reloadTemplate' => true
							),

							'orderby' => array(

								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Order By', 'folie' ),
								'default'     => 'date',

								'choices'     => array(
									'none' => __('No order', 'folie'),
									'ID' => __('Post ID', 'folie'),
									'author' => __('Author', 'folie'),
									'title' => __('Title', 'folie'),
									'name' => __('Name (slug)', 'folie'),
									'date' => __('Date', 'folie'),
									'modified' => __('Modified', 'folie'),
								),

								'reloadTemplate' => true,
							),


							'order' => array(

								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Order', 'folie' ),
								'default'     => 'DESC',

								'choices'     => array(
									'DESC' => __('Descending', 'folie'),
									'ASC' => __('Ascending', 'folie'),				
								),
								'reloadTemplate' => true
							),

							'carousel' => array(
								'type'        => 'switch',
								'label'       => __( 'Carousel', 'folie' ),
								'description' => '',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'folie' ),
									'off' => esc_attr__( 'Off', 'folie' ),
								),
								'reloadTemplate' => true
						    ),

						    'carousel_nav' => array(
								'type'     => 'switch',
								'priority' => 10,
								'label'       => esc_attr__( 'Carousel Nav', 'folie' ),
								'default'     => 0,
								'choices' => array(
									'on' => 'On',
									'off' => 'Off'
								
								),
								
								'reloadTemplate' => true,
								
								'cl_required'    => array(
									array(
										'setting'  => 'carousel',
										'operator' => '==',
										'value'    => true,
									),
								),
							),	



							'carousel_dots' => array(
								'type'     => 'switch',
								'priority' => 10,
								'label'       => esc_attr__( 'Carousel Dots', 'folie' ),
								'default'     => 0,
								'choices' => array(
									'on' => 'On',
									'off' => 'Off'
								
								),
								
								'reloadTemplate' => true,
								
								'cl_required'    => array(
									array(
										'setting'  => 'carousel',
										'operator' => '==',
										'value'    => true,
									),
								),
							),

							'filters' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Filters', 'folie' ),
								'default'     => 'disabled',
								'choices'     => array(
									'disabled'  => esc_attr__( 'Disabled', 'folie' ),
									'small'  => esc_attr__( 'Small Square', 'folie' ),
									'fullwidth'  => esc_attr__( 'Fullwidth', 'folie' )
								),
								'reloadTemplate' => true,
								
								'cl_required'    => array(
									array(
										'setting'  => 'carousel',
										'operator' => '==',
										'value'    => false,
									),
								),
								
							),	

							'distance' => array(
								'type'     => 'slider',
								'priority' => 10,
								'label'       => esc_attr__( 'Columns (Items) Gap', 'folie' ),
								'default'     => '15',
								'choices'     => array(
									'min'  => '0',
									'max'  => '35',
									'step' => '1',
								),
								'suffix' => 'px',
								'selector' => '#shop-entries .product_item .inner-wrapper',
								'css_property' => 'padding',
								'customJS' => array('front' => 'init_cl_woocommerce')
							),

							'animation' => array(

								'type'     => 'inline_select',
								'priority' => 10,
								'label'    => __( 'Animation', 'folie' ),
								'description' => __( '', 'folie' ),
								'default'     => 'bottom-t-top',
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

								'reloadTemplate' => true,
							),

							'product_title' => array(
								'type'        => 'inline_select',
								'label'       => __( 'Product Title Style', 'folie' ),
								'description' => '',
								'default'     => 'h5',
								'priority'    => 10,
								'choices'     => array(
											'h1'  => esc_attr__( 'H1', 'folie' ),
											'h2' => esc_attr__( 'H2', 'folie' ),
											'h3' => esc_attr__( 'H3', 'folie' ),
											'h4' => esc_attr__( 'H4', 'folie' ),
											'h5' => esc_attr__( 'H5', 'folie' ),
											'h6' => esc_attr__( 'H6', 'folie' ),
								),
								'reloadTemplate' => true
							),

							'pagination_style' => array( 
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Pagination', 'folie' ),
								'default'     => 'numbers',
								'choices'     => array(
									'none'  => esc_attr__( 'None', 'folie' ),
									'numbers'  => esc_attr__( 'Page Numbers', 'folie' ),
									'next_prev'  => esc_attr__( 'Next/Prev', 'folie' ),
									'load_more'  => esc_attr__( 'Load More', 'folie' ),
									'infinite_scroll'  => esc_attr__( 'Infinite', 'folie' ),
									
								),
								'reloadTemplate' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'shortcode',
										'operator' => '==',
										'value'    => 'archive',
									),
									array(
										'setting'  => 'carousel',
										'operator' => '==',
										'value'    => false,
									),
								),

							),

					)
				));
			}

 			/* Clients */
 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Clients', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-cards-hearts',
				'transport'   => 'postMessage',
				'settings'    => 'cl_clients',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(

					'carousel' => array(
							'type'        => 'switch',
							'label'       => __( 'Carousel', 'folie' ),
							'description' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_clients',
							'addClass' => 'cl-carousel owl-carousel owl-theme',
							'reloadTemplate' => true
					),

					'carousel_view_items' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Items', 'folie' ),
							
							'default'     => '6',
							'choices' => array(
								'2' =>	'2 items',
								'3' =>	'3 items',
								'4' => '4 items',
								'5' => '5 items',
								'6' => '6 items',
								'7' => '7 items',
							),
							'selector' => '.cl_clients',
							'htmldata' => 'items',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'reloadTemplate' => true,
					),

					'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want carousel navigation', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_clients',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),

						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'folie' ),
							'description' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'folie' ),
							'default'     => 1,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_clients',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),

						),

					'images' => array(
						'type'     => 'image_gallery',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Clients Images', 'folie' ),
						
						'reloadTemplate' => true,
					),

					'items_per_row' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Items per Row', 'folie' ),
							
							'default'     => 'all',
							'choices' => array(
								'all'	=> 'All',
								'2' =>	'2 items',
								'3' =>	'3 items',
								'4' => '4 items',
								'5' => '5 items',
								'6' => '6 items',
								'7' => '7 items',
							),
							'selector' => '.cl_clients',
							'selectClass' => 'items_',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 0,
								),
							),
					),

					'clients_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'Only Image',
								'overlay_title' => 'Overlay Title'
							),
							'selector' => '.cl_clients',
							'selectClass' => 'style_'
					),

					'overlay_color' => array(
							'type' => 'color',
							'label' => 'Overlay BG Color',
							'default' => 'rgba(255,255,255,0.85)',
							'selector' => '.cl_clients .client-item .overlay-bg',
							
							'css_property' => 'background-color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'clients_style',
									'operator' => '==',
									'value'    => 'overlay_title',
								),
							),
					),

					'autoplay_timeout' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Autoplay Timeout', 'folie' ),
						
						'default'     => '5000',
						'htmldata' => 'autoplay-timeout',
						'selector' => '.cl_clients',
						'reloadTemplate' => true
					),

					'show_title' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Show Title in overlay', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'clients_style',
									'operator' => '==',
									'value'    => 'overlay_title',
								),
							),

						),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_clients',
							'css_property' => '',
							'default' => array('margin-top' => '35px')
					),
				)
			));

 			/* Empty Space */
 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Empty Space', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-arrows-expand-vertical1',
				'transport'   => 'postMessage',
				'settings'    => 'cl_empty',
				'marginPositions' => array('top'),
				'is_container' => false,
				'fields' => array(
					'space' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Space in Pixels', 'folie' ),
						
						'selector' => '.cl_empty',
						'css_property' => 'height',
						'default'     => '60px'
					),

					'responsive' => array(
							'type'        => 'switch',
							'label'       => __( 'Custom Responsive', 'folie' ),
							'description' => 'Stretch Row in a fullscreen style.',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
					),

					'custom_767' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Space Max-Width:767px (Phones)', 'folie' ),
							'description' => esc_attr__( 'Is applied only for media screen (max-width:767px)', 'folie' ),
							'default'     => '60',
							
							'suffix' => 'px',
							'selector' => '.cl_empty',
							'css_property' => 'height',
							'media_query' => '(max-width: 767px)',
							'cl_required'    => array(
								array(
									'setting'  => 'responsive',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

					'custom_1024' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Space Max-Width:1024px ( Tablet )', 'folie' ),
							'description' => esc_attr__( 'Is applied only for media screen (max-width:1024px)', 'folie' ),
							'default'     => '60',
							
							'suffix' => 'px',
							'selector' => '.cl_empty',
							'css_property' => 'height',
							'media_query' => '(max-width: 1024px)',
							'cl_required'    => array(
								array(
									'setting'  => 'responsive',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),
				)
			));

			/* Counter */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Counter', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-clessidre',
				'transport'   => 'postMessage',
				'settings'    => 'cl_counter',
				'css_dependency' => array(CODELESS_BASE_URL.'css/odometer.css'),
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'number' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Number Counter', 'folie' ),
						
						'default'     => '124',
						'reloadTemplate' => true,
						'customJS' => array('front' => 'animations')
					),

					'duration' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Animation Duration', 'folie' ),
						
						'default'     => '2000',
						'reloadTemplate' => true,
						'customJS' => array('front' => 'animations')
					),

					'align' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Align', 'folie' ),
							
							'default'     => 'center',
							'multiple' => false,
							'choices'     => array(
								'left' => __('Left', 'folie'),
								'center' => __('Center', 'folie'),	
								'right' => __('Right', 'folie'),			
							),
							'selector' => '.cl_counter',
							'selectClass' => 'align-'
						),

					'custom_color' => array(
							'type'        => 'switch',
							'label'       => __( 'Custom Color', 'folie' ),
							'description' => 'Custom Color',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
					),

					'color' => array(
							'type' => 'color',
							'label' => 'Color',
							'default' => '#222222',
							'selector' => '.cl_counter',
							'css_property' => 'color',
							'alpha' => true,
							'suffix' => '!important',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_color',
									'operator' => '==',
									'value'    => true,
								),
							),
					),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_counter',
							'css_property' => '',
					),
				)
			));

			/* Countdown */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Countdown', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-clessidre',
				'transport'   => 'postMessage',
				'settings'    => 'cl_countdown',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'dt' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '.cl_countdown',
						'label'       => esc_attr__( 'Date Countdown', 'folie' ),
						
						'default'     => '2021/01/01',
						'reloadTemplate' => true,
						'htmldata' => 'dt'

					),

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'folie' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'large' =>	'Large'
							),
							'selector' => '.cl_countdown',
							'selectClass' => ''
						),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_countdown',
							'css_property' => '',
					),
				)
			));

 			/* Progress Bar */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Progress Bar', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-battery-half',
				'transport'   => 'postMessage',
				'settings'    => 'cl_progress_bar',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Space in Pixels', 'folie' ),
						
						'selector' => '.cl_progress_bar .title',
						'default' => 'Development'
					),

					'percentage' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Percentage', 'folie' ),
							
							'default'     => '50',
							'choices'     => array(
								'min'  => '0',
								'max'  => '100',
								'step' => '1',
							),
							'suffix' => '', 
							'selector' => '.cl_progress_bar',
							'htmldata' => 'percentage',
							'customJS' => 'inlineEdit_progress_percentage'
					),

					'color' => array(
							'type' => 'color',
							'label' => 'Progress Bar Color',
							'default' => codeless_get_mod('primary_color'),
							'selector' => '.cl_progress_bar .bar',
							
							'css_property' => 'background-color',
							'alpha' => true
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
							'selector' => '.cl_progress_bar'
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
							'selector' => '.cl_progress_bar',
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
							'selector' => '.cl_progress_bar',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							)
						),

						'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_progress_bar',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));

 			/* Google Map */
 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Google Map', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-geolocalize-05',
				'transport'   => 'postMessage',
				'settings'    => 'cl_map',
				'marginPositions' => array('top'),
				'is_container' => false,
				'fields' => array(
					'api_key' => array(
						'type' => 'text',
						'label' => 'Api Key',
						'description' => "Generate an API key <a target=\"_blank\" href=\"https://developers.google.com/maps/documentation/javascript/get-api-key\">here</a>, if you don't have one.",
						'selector' => '.cl_map',
						'customJS' => 'inlineEdit_loadGoogleApi',				

					),
					'lat_lon' => array(
						'type' => 'text',
						'label' => 'Latitude & Longitude',
						'description' => "1. On your computer, visit Google Maps.<br />
2. Right-click a location on the map.<br />
3. Select What's here?.<br />
4. A card appears at the bottom of the screen with more info.<br />",
						'selector' => '.cl_map',
						'reloadTemplate' => true,

					),

					'height' => array(
	
							'type' => 'slider',
							'label' => 'Map Height',
							'default' => '400',
							'selector' => '.cl-map-element',
							'css_property' => 'height',
							'choices'     => array(
								'min'  => '40',
								'max'  => '1000',
								'step' => '5',
								'suffix' => 'px'
							),
						),

					'fullheight' => array(
							'type'        => 'switch',
							'label'       => __( 'Full Height Map', 'folie' ),
							'description' => 'Stretch Map height 100%',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'folie' ),
								'off' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_map',
							'addClass' => 'cl-map-fullheight',
							'customJS' => 'inlineEdit_mapFullHeight'
					),

					'zoom' => array(
								'type'     => 'slider',
								'priority' => 10,
								'label'       => esc_attr__( 'Map Zoom', 'folie' ),
								
								'default'     => '14',
								'choices'     => array(
									'min'  => '0',
									'max'  => '19',
									'step' => '1',
								),
								'suffix' => '',
								'selector' => '.cl_map',
								'htmldata' => 'zoom',
								'customJS' => array('front' => 'codelessGMap')
							),

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'folie' ),
							'description' => esc_attr__( 'Map Style, leave normal for the default style.', 'folie' ),
							'default'     => 'normal',
							'choices' => array(
								'normal' => 'Normal',
								'ultra_light_labels' => 'Ultra Light Labels',
								'shades_grey' => 'Shades Of Grey',
								'subtle_grayscale' => 'Subtle Grayscale',
								'blue_water' => 'Blue Water',
								'apple_style' => 'Apple Maps Style'
							),
							'selector' => '.cl_map',
							'htmldata' => 'style',
							'customJS' => array('front' => 'codelessGMap')
							
							
							
						),


					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_media',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));


 			/* Contact Form 7 */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Contact Form 7', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-mail',
				'transport'   => 'postMessage',
				'settings'    => 'cl_contact_form7',
				'marginPositions' => array('top'),
				'is_container' => false,
				'fields' => array(
					
					'id' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Form', 'folie' ),
							'description' => 'Select one of the created contact forms. Or create a new form <a href="'.admin_url('admin.php?page=wpcf7-new').'" target="_blank">here</a>',
							'default'     => 'none',
							'choices' => codeless_get_items_by_term('wpcf7_contact_form'),
							'reloadTemplate' => true
					),


					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'folie' ),
							'description' => 'Select one of the predefined styles or leave "none" and add your custom style in css.',
							'default'     => 'simple',
							'choices' => array(
								'none' => 'None',
								'simple' => 'Simple Vertical',
								'dark' => 'Simple Dark'
							),
							'selector' => '.cl_contact_form7',
							'selectClass' => 'style-'
					),



					

					'css_style' => array( 
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_contact_form7',
							'css_property' => '',
							'default' => array('margin-top' => '35px')
						),
				)
			));


			
			/* Toggles */

 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Toggles', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-software-paragraph-space-before',
				'transport'   => 'postMessage',
				'settings'    => 'cl_toggles',
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'folie' ),
							'description' => 'Select one of the predefined styles or leave "none" and add your custom style in css.',
							'default'     => 'simple',
							'choices' => array(
								'none' => 'None',
								'simple' => 'Simple'
							),
							'selector' => '.cl_toggles',
							'selectClass' => 'style-'
					),

					'accordion' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Accordion', 'folie' ),
							'description' => esc_attr__( 'Make this togggles element function as a accordion', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_toggles',
							'htmldata' => 'accordion',
							'customJS' => array('front' => 'codelessToggles')
						),

					'css_style' => array( 
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_toggles',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));


			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Toggle', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-software-paragraph-space-before',
				'transport'   => 'postMessage',
				'settings'    => 'cl_toggle',
				'hide_from_list' => true,
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'is_active' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Active by default', 'folie' ),
							'description' => esc_attr__( 'Make active this toggle by default by switch this option ON', 'folie' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_toggle .title',
							'addClass' => 'open'
						),

					'title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'only_text' => true,
						'selector' => '.cl_toggle > .title > a',
						'label'       => esc_attr__( 'Text', 'folie' ),
						'description' => esc_attr__( 'This will be the label for your link', 'folie' ),
						'default'     => 'Toggle Title',
					),
				)
			));

			/* Tabs */

 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Tabs', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-software-paragraph-space-before',
				'transport'   => 'postMessage',
				'settings'    => 'cl_tabs',
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'folie' ),
							'description' => 'Select one of the predefined styles or leave "none" and add your custom style in css.',
							'default'     => 'simple',
							'choices' => array(
								'none' => 'None',
								'simple' => 'Simple'
							),
							'selector' => '.cl_tabs',
							'selectClass' => 'style-'
					),

		
					'css_style' => array( 
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_tabs',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));

 			
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Tab', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-software-paragraph-space-before',
				'transport'   => 'postMessage',
				'settings'    => 'cl_tab',
				'hide_from_list' => true,
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '.tab-pane',
						'for_tab_title' => true,
						'label'       => esc_attr__( 'Tab Title', 'folie' ),
						'default'     => '',
						'only_text'  => true
					),

					'tab_id' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Tab ID', 'folie' ),
						'description' => esc_attr__( 'Use an unique ID', 'folie' ),
						'default'     => 'tab',
					),

					
				)
			));

			/* List */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'List', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-todo-txt',
				'transport'   => 'postMessage',
				'settings'    => 'cl_list',
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'type' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Type', 'folie' ),
							'description' => 'Select type of list',
							'default'     => 'ul',
							'choices' => array(
								'ul' => 'Unordered List',
								'ol' => 'Ordered List'
							),
							'customJS' => 'inlineEdit_listType'
					),

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'folie' ),
							'description' => 'Select one of the predefined styles or leave "none" and add your custom style in css.',
							'default'     => 'simple',
							'choices' => array(
								'none' => 'None',
								'simple' => 'Simple'

							),
							'selector' => '.cl_list',
							'selectClass' => 'style-'
					),

					

					'distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance between items', 'folie' ),
							'description' => esc_attr__( 'Distance between list items in pixel', 'folie' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '20',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_list .cl_list_item',
							'css_property' => array('padding-top','padding-bottom'),
						),



					'css_style' => array( 
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_list',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));


			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'List Item', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-todo-txt',
				'transport'   => 'postMessage',
				'settings'    => 'cl_list_item',
				'hide_from_list' => true,
				'is_container' => false,
				'fields' => array(

					'custom_icon' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Icon', 'folie' ),
							'description' => esc_attr__( 'Switch to add a custom icon to list items', 'folie' ),
							'default'     => 1,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_list_item',
							'addClass' => 'with_icon',
							'reloadTemplate' => true
						),

					'icon' => array(
							'type'     => 'select_icon',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Icon', 'folie' ),
							'default'     => 'cl-icon-plus2',
							'selector' => '.cl_list_item > i',
							'selectClass' => ' ',
							
					),

					'content' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '.cl_list_item > .text',
						'label'       => esc_attr__( 'Text', 'folie' ),
						'description' => esc_attr__( 'This will be the label for your link', 'folie' ),
						'default'     => 'Sample. Click to modify',
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
							'selector' => '.cl_list_item',
							'customJS' => array('front' => 'animations')
						),
						
						'animation_delay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Delay between items', 'folie' ),
							
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
							'selector' => '.cl_list_item',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),

							'customJS' => array('front' => 'animations')
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
							'selector' => '.cl_list_item',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'customJS' => array('front' => 'animations')
						),
					
					'animation_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'animation'
					),
				)
			));


			/* Icon */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Icon', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-clubs',
				'transport'   => 'postMessage',
				'settings'    => 'cl_icon',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					
					'icon' => array(
							'type'     => 'select_icon',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Icon', 'folie' ),
							'default'     => 'cl-icon-camera2',
							'selector' => '.cl_icon i',
							'selectClass' => ' '
								
					),

					'icon_link' => array(

							'type' => 'text',
							'priority' => 10,
							'label' => esc_attr__('Set the hyperlink', 'folie'),
							'default' => '#',
							'selector' => '.cl_icon'

					),

					'icon_target' => array(

							'type' => 'inline_select',
							'priority'=> 10,
							'label' => esc_attr__('Set link loading mode', 'folie'),
							'default' => '_blank',
							'selector' => '.cl_icon',
							'choices' =>array(

								'_blank' => 'New window',
								'_self' => 'Same Window',
								'_parent' => 'Parent Window',
								'_top' => 'Top Window',


						),

					),

					'size' => array(
							'type'     => 'slider',
							'label' => 'Font size',
							'default' => '15',
							'selector' => '.cl_icon i',
							'css_property' => 'font-size',
							'choices'     => array(
										'min'  => '0',
										'max'  => '100',
										'step' => '1',
										'suffix' => 'px'
									),
						    'suffix' => 'px',

							'label'       => esc_attr__( 'Icon Font Size', 'folie' )
							
						
					),

					

					'color' => array(

							'type' => 'color',
							'label' => 'Set Color',
							'default' => '#222',
							'selector' => '.cl_icon i',
							'css_property' => 'color',
							'alpha' => true
								
					),

					'hover_color' => array(

							'type' => 'color',
							'label' => 'Set Hover Color',
							'default' => '#222',
							'selector' => '.cl_icon > a',
							'alpha' => false
								
					),


					'align' => array(

							'type' => 'inline_select',
							'label' => 'Icon Alignment',
							'default' => 'left',
							'selector' => '.cl_icon',
							'css_property' => 'text-align',
							'choices' => array(

								'left' => 'Left',
								'right' => 'Right',
								'center' => 'Center'
								
							)

						),


					'line_height' => array(

							'type'     => 'slider',
							'label' => 'Line Height',
							'default' => '10',
							'selector' => '.cl_icon i',
							'css_property' => 'line-height',
							'choices'     => array(
										'min'  => '0',
										'max'  => '100',
										'step' => '1',
										'suffix' => 'px'
									),
						    'suffix' => 'px',

							'label'       => esc_attr__( 'Set Line Height', 'folie' )
							
						
					),


					

					'css_style' => array(

							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_icon',
							'css_property' => '',
							'default' => array('margin-top' => '35px')

						),
						
						
		
					),
		
				
			));



		/* Share Icons */
		
		cl_builder_map(array(

			'type'        => 'clelement',
			'label'       => esc_attr__( 'Share Icons', 'folie' ),
			'section'     => 'cl_codeless_page_builder',
			//'priority'    => 10,
			'icon'		  => 'icon-basic-share',
			'transport'   => 'postMessage',
			'settings'    => 'cl_share',
			'is_container' => false,
			'marginPositions' => array('top'),
			'fields' => array(
		
				'add_facebook' => array(

							'type'        => 'switch',
							'label'       => __( 'Add Facebook Share Icon', 'folie' ),
							'default'     => '1',
							'priority'    => 10,
							'choices'     => array(
								'1'  => esc_attr__( 'On', 'folie' ),
								'0' => esc_attr__( 'Off', 'folie' ),
							),
							
							'reloadTemplate' => true,
							'selector' => '.cl_share i'


					),



				


				'add_twitter' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Twitter Share Icon', 'folie' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true



					),


				

				'add_linkedin' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Linkedin Share Icon', 'folie' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true



					),

				



				'add_pinterest' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Pinterest Share Icon', 'folie' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true



					),

				

			

			   'add_google_plus'=> array(

			   			'type'        => 'switch',
						'label'       => __( 'Add Google Plus Share Icon', 'folie' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true




			   	),


			   'add_whatsapp' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Whatsapp Share Icon', 'folie' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true



					),



			   'target' => array(

						'type' => 'inline_select',
						'priority'=> 10,
						'label' => esc_attr__('Set link loading mode', 'folie'),
						'default' => '_blank',
						'selector' => '.cl_share',
						'choices' =>array(

							'_blank' => 'New window',
							'_self' => 'Same Window',
							'_parent' => 'Parent Window',
							'_top' => 'Top Window',


					),

				),

		

				'size' => array(
						'type'     => 'slider',
						'label' => 'Font size',
						'default' => '15',
						'selector' => '.cl_share i',
						'css_property' => 'font-size',
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Icon Font Size', 'folie' )
						
					
				),

				

				'color' => array(

						'type' => 'color',
						'label' => 'Set Color',
						'default' => '#222',
						'selector' => '.cl_share > a',
						'css_property' => 'color',
						'alpha' => true
							
				),

				'hover_color' => array(

						'type' => 'color',
						'label' => 'Set Hover Color',
						'default' => '#222',
						'selector' => '.cl_share > a',
						'alpha' => false
							
				),


				'border' => array(

						'type' => 'inline_select',
						'label' => esc_attr__( 'Set the border style', 'folie' ),
						'default' => 'none',
						'selector' => '.cl_share',
						'choices' => array(

								'round' => 'Rounded Style',
								'square' => 'Square Style',
								'none' => 'None'

							),
						'selectClass' => ''
						

					),

				'bcolor' => array(

						'type' => 'color',
						'label' => 'Border Color',
						'default' => '#222',
						'selector' => '.cl_share',
						'css_property' => 'border-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),


				),	

				'bgcolor' => array(

						'type' => 'color',
						'label' => 'Background Color',
						'default' => 'transparent',
						'selector' => '.cl_share',
						'css_property' => 'background-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),
							
				),

				'padding' => array(
						'type'     => 'slider',
						'label' => 'Icon Size',
						'default' => '38',
						'selector' => '.cl_share',
						'css_property' => array('width', 'height'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Wrapper Size', 'folie' ),
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),

						
					
				),	

				'display' => array(

						'type' => 'inline_select',
						'label' => 'Icon Display Mode',
						'default' => 'inline-block',
						'selector' => '.cl_share',
						'css_property' => 'display',
						'choices' => array(

							'inline-block' => 'Inline',
							'block' => 'Block'
							
							
						),


				),


				'margin'=> array(

						'type' => 'slider',
						'label' => 'Set the margin between icons',
						'default' => '5',
						'selector' => '.cl_share',
						'css_property' => array('margin-left', 'margin-right'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',
						'label'       => esc_attr__( 'Set Space Between Icons', 'folie' ),
						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'inline-block',
								),
							),



				),


				'margintop'=> array(

						'type' => 'slider',
						'label' => 'Set the margin between icons',
						'default' => '5',
						'selector' => '.cl_share',
						'css_property' => array('margin-top', 'margin-bottom'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',
						'label'       => esc_attr__( 'Set Space Between Icons', 'folie' ),
						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'block',
								),
							)



				),


				'align' => array(

						'type' => 'inline_select',
						'label' => 'Icon Alignment',
						'default' => 'left',
						'selector' => '.cl_sharediv',
						'css_property' => 'text-align',
						'choices' => array(

							'left' => 'Left',
							'right' => 'Right',
							'center' => 'Center'
							
						),

						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'inline-block',
								),
							)

					),


				'line_height' => array(

						'type'     => 'slider',
						'label' => 'Line Height',
						'default' => '37',
						'selector' => '.cl_share i',
						'css_property' => 'line-height',
						'choices'     => array( 
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Set Line Height', 'folie' )
						
					
				),



				'css_style' => array(

						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.cl_icon',
						'css_property' => '',
						'default' => array('margin-top' => '35px')

					),

			
			),	
		));




		/* Social Icons */
		cl_builder_map(array(

			'type'        => 'clelement',
			'label'       => esc_attr__( 'Social Icons', 'folie' ),
			'section'     => 'cl_codeless_page_builder',
			'use_on_header' => true,
			//'priority'    => 10,
			'icon'		  => 'icon-basic-share',
			'transport'   => 'postMessage',
			'settings'    => 'cl_socialicon',
			'is_container' => false,
			'marginPositions' => array('top'),
			'fields' => array(
		
				'add_facebook' => array(

							'type'        => 'switch',
							'label'       => __( 'Add Facebook Icon', 'folie' ),
							'default'     => '1',
							'priority'    => 10,
							'choices'     => array(
								'1'  => esc_attr__( 'On', 'folie' ),
								'0' => esc_attr__( 'Off', 'folie' ),
							),
							'selector' => '.cl_socialicon i',
							'reloadTemplate' => true



					),


			 	'facebook_link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Set the Facebook icon hyperlink', 'folie' ),
						'default'     => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_facebook',
									'operator' => '==',
									'value'    => '1',
								),
							),
							
				),


			 	'add_instagram' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Instagram Icon', 'folie' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),



				'instagram_link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Set the instagram icon hyperlink', 'folie' ),
						'default'     => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_instagram',
									'operator' => '==',
									'value'    => '1',
								),
							),
							
				),


				'add_twitter' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Twitter Icon', 'folie' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),


				'twitter_link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Set the twitter icon hyperlink', 'folie' ),
						'default'     => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_twitter',
									'operator' => '==',
									'value'    => '1',
								),
							),
							
				),


				'add_email' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Email Icon', 'folie' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),


				'email_link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Set the email icon hyperlink', 'folie' ),
						'default'     => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_email',
									'operator' => '==',
									'value'    => '1',
								),
							),
							
				),


				'add_linkedin' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Linkedin Icon', 'folie' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'linkedin_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Linkedin hyperlink', 'folie'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_linkedin',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),



				'add_pinterest' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Pinterest Icon', 'folie' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'pinterest_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Pinterest hyperlink', 'folie'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_pinterest',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),

				'add_youtube' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Youtube Icon', 'folie' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),


				'youtube_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Youtube hyperlink', 'folie'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_youtube',
									'operator' => '==',
									'value'    => '1',
								),
							),

				),

				'add_vimeo' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Vimeo Icon', 'folie' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),



				'vimeo_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Viemo hyperlink', 'folie'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_vimeo',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),


				'add_soundcloud' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Soundcloud Icon', 'folie' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'soundcloud_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Soundcloud hyperlink', 'folie'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_soundcloud',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),

				'add_slack' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Slack Icon', 'folie' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'slack_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Slack hyperlink', 'folie'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_slack',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),

				'add_skype' => array(

						'type'        => 'switch',
						'label'       => __( 'Add Skype Icon', 'folie' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'skype_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set skype hyperlink', 'folie'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_skype',
									'operator' => '==',
									'value'    => '1',
								),
					
						),		
				),

			   'add_google_plus'=> array(

			   			'type'        => 'switch',
						'label'       => __( 'Add Google Plus Icon', 'folie' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true

			   	),

			   'google_plus_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Google Plus hyperlink', 'folie'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_google_plus',
									'operator' => '==',
									'value'    => '1',
								),
					
						),

				),

			    'add_github'=> array(

			   			'type'        => 'switch',
						'label'       => __( 'Add Github Icon', 'folie' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true




			   	),


			   	'github_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Github hyperlink', 'folie'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_github',
									'operator' => '==',
									'value'    => '1',
								),
					
						),

				),

				'add_dribbble'=> array(

			   			'type'        => 'switch',
						'label'       => __( 'Add Dribbble Icon', 'folie' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true




			   	),


				'dribbble_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Dribbble hyperlink', 'folie'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_dibbble',
									'operator' => '==',
									'value'    => '1',
								),
					
						),


				),

				'add_behance'=> array(

			   			'type'        => 'switch',
						'label'       => __( 'Add Behance Icon', 'folie' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'folie' ),
							'0' => esc_attr__( 'Off', 'folie' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true




			   	),

				'behance_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Behance hyperlink', 'folie'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_behance',
									'operator' => '==',
									'value'    => '1',
								),
					
						),

				),

				'target' => array(

						'type' => 'inline_select',
						'priority'=> 10,
						'label' => esc_attr__('Set link loading mode', 'folie'),
						'default' => '_blank',
						'selector' => '.cl_socialicon',
						'choices' =>array(

							'_blank' => 'New window',
							'_self' => 'Same Window',
							'_parent' => 'Parent Window',
							'_top' => 'Top Window',


					),

				),

		

				'size' => array(
						'type'     => 'slider',
						'label' => 'Font size',
						'default' => '15',
						'selector' => '.cl_socialicon i',
						'css_property' => 'font-size',
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Icon Font Size', 'folie' )
						
					
				),

				

				'color' => array(

						'type' => 'color',
						'label' => 'Icon Color',
						'default' => '#222',
						'selector' => '.cl_socialicon > a',
						'css_property' => 'color',
						'alpha' => true
							
				),

				'color_hover' => array(

						'type' => 'color',
						'label' => 'Icon Color Hover',
						'default' => '',
						'alpha' => false
							
				),

				'bgcolor' => array(

						'type' => 'color',
						'label' => 'Background Color',
						'default' => 'transparent',
						'selector' => '.cl_socialicon',
						'css_property' => 'background-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),
							
				),

				'bgcolor_hover' => array(

						'type' => 'color',
						'label' => 'Background Color Hover',
						'default' => 'transparent',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),
							
				),


				'border' => array(

						'type' => 'inline_select',
						'label' => esc_attr__( 'Set the border style', 'folie' ),
						'default' => 'none',
						'selector' => '.cl_socialicon',
						'choices' => array(

								'round' => 'Rounded Style',
								'square' => 'Square Style',
								'none' => 'None'

							),
						'selectClass' => ''
						

					),

				'bcolor' => array(

						'type' => 'color',
						'label' => 'Border Color',
						'default' => '#222',
						'selector' => '.cl_socialicon',
						'css_property' => 'border-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),


				),	

				'bcolor_hover' => array(

						'type' => 'color',
						'label' => 'Border Color Hover',
						'default' => '',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),


				),	

				

				'padding' => array(
						'type'     => 'slider',
						'label' => 'Icon Size',
						'default' => '38',
						'selector' => '.cl_socialicon',
						'css_property' => array('width', 'height'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Icon Size', 'folie' ),
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),

						
					
				),	

				'display' => array(

						'type' => 'inline_select',
						'label' => 'Icon Display Mode',
						'default' => 'inline-block',
						'selector' => '.cl_socialicon',
						'css_property' => 'display',
						'choices' => array(

							'inline-block' => 'Inline',
							'block' => 'Block'
							
							
						),


				),


				'margin'=> array(

						'type' => 'slider',
						'label' => 'Set the margin between icons',
						'default' => '5',
						'selector' => '.cl_socialicon',
						'css_property' => array('margin-left', 'margin-right'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',
						'label'       => esc_attr__( 'Set Space Between Icons', 'folie' ),
						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'inline-block',
								),
							),



				),


				'margintop'=> array(

						'type' => 'slider',
						'label' => 'Set the margin between icons',
						'default' => '5',
						'selector' => '.cl_socialicon',
						'css_property' => array('margin-top', 'margin-bottom'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',
						'label'       => esc_attr__( 'Set Space Between Icons', 'folie' ),
						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'block',
								),
							),



				),


				'align' => array(

						'type' => 'inline_select',
						'label' => 'Icon Alignment',
						'default' => 'left',
						'selector' => '.cl_socialicondiv',
						'css_property' => 'text-align',
						'choices' => array(

							'left' => 'Left',
							'right' => 'Right',
							'center' => 'Center'
							
						),

						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'inline-block',
								),
							),

					),


				'line_height' => array(

						'type'     => 'slider',
						'label' => 'Line Height',
						'default' => '37',
						'selector' => '.cl_socialicon i',
						'css_property' => 'line-height',
						'choices'     => array( 
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Set Line Height', 'folie' )
						
					
				),


				'device_visibility' => array(
							'type'     => 'multicheck',
							'priority' => 10,
							'label'       => esc_attr__( 'Devices Visibility', 'folie' ),
							
							'default'     => '',
							'choices' => array(
								'hidden-xs' => esc_attr__( 'Hide on Phones (less-than-768px)', 'folie' ),
								'hidden-sm' => esc_attr__( 'Hide on Tables (large-then-768px)', 'folie' ),
								'hidden-md' => esc_attr__( 'Hide on Medium Desktops (large-then-992px) ', 'folie' ),
								'hidden-lg' => esc_attr__( 'Hide on Large Desktops (large-then-1200px)', 'folie' ),
							),
							'selector' => '.cl_socialicondiv',
							'selectClass' => '',
				),

					

				'css_style' => array(

						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.cl_icon',
						'css_property' => '',
						'default' => array('margin-top' => '35px')

				),

				
			)


		));

 		cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Revolution Slider', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-arrows-keyboard-right',
				'transport'   => 'postMessage',
				'settings'    => 'cl_revslider',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					
					'slides' => array(
						'type' => 'inline_select',
						'label' => esc_attr__('Select slide', 'folie'),
						'description' => 'Select one of the created slides. Or create a new slider <a href="'.admin_url('admin.php?page=revslider').'" target="_blank">here</a>',
						'default' => '',
						'choices' => codeless_get_rev_slides(),
						'reloadTemplate' => true
						),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.rev_slider_wrapper',
						'css_property' => '',
						'default' => array('margin-top' => '35px')
					),
				),

			
		));


		cl_builder_map(array(
				
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Layer Slider', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-arrows-keyboard-right',
				'transport'   => 'postMessage',
				'settings'    => 'cl_layerslider',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					
					'slides' => array(
						'type' => 'inline_select',
						'label' => esc_attr__('Select slide', 'folie'),
						'description' => 'Select one of the created slides. Or create a new slider <a href="'.admin_url('admin.php?page=layerslider').'" target="_blank">here</a>',
						'default' => '1',
						'choices' => codeless_get_layer_slides(),
						'reloadTemplate' => true
						),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.ls-container',
						'css_property' => '',
						'default' => array('margin-top' => '35px')
					),
				),

			
		));


		cl_builder_map(array(
				
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Custom Code', 'folie' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-arrows-expand-vertical1',
				'transport'   => 'postMessage',
				'settings'    => 'cl_custom_code',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					
					'code' => array(
						'type' => 'textarea',
						'label' => esc_attr__('Add Custom Code', 'folie'),
						'description' => 'Add Custom HTML or a Shortcode',
						'default' => '',
						'reloadTemplate' => true
					),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.cl_custom_code',
						'css_property' => '',
						'default' => array('margin-top' => '35px')
					),
				),

			
		));

?>