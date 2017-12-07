<?php
/**
 * Customizer Control: repeater.
 *
 * @package     Kirki
 * @subpackage  Controls
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kirki_Controls_Clelement_Control' ) ) {

	/**
	 * Repeater control
	 */
	class Kirki_Controls_Clelement_Control extends Kirki_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'clelement';

		/**
		 * The fields that each container row will contain.
		 *
		 * @access public
		 * @var array
		 */
		public $fields = array();

		/**
		 * Will store a filtered version of value for advenced fields (like images).
		 *
		 * @access protected
		 * @var array
		 */
		protected $filtered_value = array();

		/**
		 * The row label
		 *
		 * @access public
		 * @var array
		 */
		public $row_label = array();

		/**
		 * Constructor.
		 * Supplied `$args` override class property defaults.
		 * If `$args['settings']` is not defined, use the $id as the setting ID.
		 *
		 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
		 * @param string               $id      Control ID.
		 * @param array                $args    {@see WP_Customize_Control::__construct}.
		 **/
		public function __construct( $manager, $id, $args = array() ) {

			//$l10n = Kirki_l10n::get_strings();

			parent::__construct( $manager, $id, $args );

			// Set up defaults for row labels.
			$this->row_label = array(
				'type' => 'text',
				'value' => esc_attr__( 'row', 'folie' ),
				'field' => false,
			);

			// Validating args for row labels.
			if ( isset( $args['row_label'] ) && is_array( $args['row_label'] ) && ! empty( $args['row_label'] ) ) {

				// Validating row label type.
				if ( isset( $args['row_label']['type'] ) && ( 'text' === $args['row_label']['type'] || 'field' === $args['row_label']['type'] ) ) {
					$this->row_label['type'] = $args['row_label']['type'];
				}

				// Validating row label type.
				if ( isset( $args['row_label']['value'] ) && ! empty( $args['row_label']['value'] ) ) {
					$this->row_label['value'] = esc_attr( $args['row_label']['value'] );
				}

				// Validating row label field.
				if ( isset( $args['row_label']['field'] ) && ! empty( $args['row_label']['field'] ) && isset( $args['fields'][ esc_attr( $args['row_label']['field'] ) ] ) ) {
					$this->row_label['field'] = esc_attr( $args['row_label']['field'] );
				} else {

					// If from field is not set correctly, making sure standard is set as the type.
					$this->row_label['type'] = 'text';
				}
			}

			if ( empty( $this->button_label ) ) {
				$this->button_label = esc_attr__( 'Add new', 'folie' ) . ' ' . $this->row_label['value'];
			}

			if ( empty( $args['fields'] ) || ! is_array( $args['fields'] ) ) {
				$args['fields'] = array();
			}

			// An array to store keys of fields that need to be filtered.
			$media_fields_to_filter = array();

			foreach ( $args['fields'] as $key => $value ) {
				if ( ! isset( $value['default'] ) ) {
					$args['fields'][ $key ]['default'] = '';
				}

				if ( ! isset( $value['label'] ) ) {
					$args['fields'][ $key ]['label'] = '';
				}
				$args['fields'][ $key ]['id'] = $key;

				// We check if the filed is an uploaded media ( image , file, video, etc.. ).
				if ( isset( $value['type'] ) && ( 'image' === $value['type'] || 'cropped_image' === $value['type'] || 'upload' === $value['type'] ) ) {

					// We add it to the list of fields that need some extra filtering/processing.
					$media_fields_to_filter[ $key ] = true;
				}

				// If the field is a dropdown-pages field then add it to args.
				if ( isset( $value['type'] ) && ( 'dropdown-pages' === $value['type'] ) ) {

					//$l10n = Kirki_l10n::get_strings();
					$dropdown = wp_dropdown_pages(
						array(
							'name'              => '',
							'echo'              => 0,
							'show_option_none'  => esc_attr__( 'Select a Page', 'folie' ),
							'option_none_value' => '0',
							'selected'          => '',
						)
					);

					// Hackily add in the data link parameter.
					$dropdown = str_replace( '<select', '<select data-field="'.esc_attr( $args['fields'][ $key ]['id'] ).'"' . $this->get_link(), $dropdown );

					$args['fields'][ $key ]['dropdown'] = $dropdown;
				}
			}

			$this->fields = $args['fields'];

			// Now we are going to filter the fields.
			// First we create a copy of the value that would be used otherwise.
			$this->filtered_value = $this->value();
			if ( is_array( $this->filtered_value ) && ! empty( $this->filtered_value ) ) {

				// We iterate over the list of fields.
				foreach ( $this->filtered_value as &$filtered_value_field ) {

					if ( is_array( $filtered_value_field ) && ! empty( $filtered_value_field ) ) {

						// We iterate over the list of properties for this field.
						foreach ( $filtered_value_field as $key => &$value ) {

							// We check if this field was marked as requiring extra filtering (in this case image, cropped_images, upload).
							if ( array_key_exists( $key, $media_fields_to_filter ) ) {

								// What follows was made this way to preserve backward compatibility.
								// The repeater control use to store the URL for images instead of the attachment ID.
								// We check if the value look like an ID (otherwise it's probably a URL so don't filter it).
								if ( is_numeric( $value ) ) {

									// "sanitize" the value.
									$attachment_id = (int) $value;

									// Try to get the attachment_url.
									$url = wp_get_attachment_url( $attachment_id );

									$filename = basename( get_attached_file( $attachment_id ) );

									// If we got a URL.
									if ( $url ) {

										// 'id' is needed for form hidden value, URL is needed to display the image.
										$value = array(
											'id'  => $attachment_id,
											'url' => $url,
											'filename' => $filename,
										);
									}
								}
							}
						}
					}
				}
			}
		}

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @access public
		 */
		public function to_json() {
			parent::to_json();

			$fields = $this->fields;

			$this->json['fields'] = $fields;
			$this->json['row_label'] = $this->row_label;
			
			
			// If filtered_value has been set and is not empty we use it instead of the actual value.
			if ( is_array( $this->filtered_value ) && ! empty( $this->filtered_value ) ) {
				$this->json['value'] = $this->filtered_value;
			}
		}

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {

			// If we have a color picker field we need to enqueue the Wordpress Color Picker style and script.
			if ( is_array( $this->fields ) && ! empty( $this->fields ) ) {
				foreach ( $this->fields as $field ) {
					if ( isset( $field['type'] ) && 'color' === $field['type'] ) {
						wp_enqueue_script( 'wp-color-picker' );
						wp_enqueue_style( 'wp-color-picker' );
						break;
					}
				}

				foreach ( $this->fields as $field ) {
					if ( isset( $field['type'] ) && 'dropdown-pages' === $field['type'] ) {
						wp_enqueue_script( 'kirki-dropdown-pages' );
						break;
					}
				}
			}
			
			wp_enqueue_script( 'kirki-clelement' );
		}

		/**
		 * Render the control's content.
		 * Allows the content to be overriden without having to rewrite the wrapper in $this->render().
		 *
		 * @access protected
		 */
		protected function render_content() {
			?>
			<?php //$l10n = Kirki_l10n::get_strings(); ?>
			<?php if ( '' !== $this->tooltip ) : ?>
				<a href="#" class="tooltip hint--left" data-hint="<?php echo esc_html( $this->tooltip ); ?>"><span class='dashicons dashicons-info'></span></a>
			<?php endif; ?>
			<label class="element-meta">
				<?php if ( ! empty( $this->label ) ) : ?>
					<h2 class="customize-control-title"><?php echo esc_html( $this->label ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
				<?php endif; ?>
				<input type="hidden" <?php $this->input_attrs(); ?> value="" <?php echo wp_kses_post( $this->get_link() ); ?> />
			</label>

			<ul class="fields"></ul>


			<?php

			$this->repeater_js_template();

		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 * Class variables for this control class are available in the `data` JS object.
		 *
		 * @access public
		 */
		public function repeater_js_template() {
			//$l10n = Kirki_l10n::get_strings();
			
			?>
			<script type="text/html" class="customize-control-clelement-content">
				<# var field; #>
					
					
						<# _.each( data, function( field, i ) { #>
							
							<# if(typeof field.show != 'undefined' && !field.show){ return; } #>
							
							<# if(field.type == 'show_tabs') { #>
								
								<div class="tab_sections">
								
									<# _.each( field.tabs, function( label, id ) { #>
										<a href="#" class="<# if(field.default == id){ #> active <# } #>" data-tab="{{{ id }}}">{{ label }}</a> 
									<# }) #>
									
								</div>
									
							
							<# return; } #>
							
							
							
							<# if(field.type == 'tab_start') { #>
								
								<div class="tab_section" id="tab-{{{ field.tabid }}}">
									
							
							<# return; } #>
							
							
							<# if(field.type == 'tab_end') { #>
								
								</div>

							<# return; } #>
							
							
							
							<# if(field.type == 'group_start') { #>
								
								<div class="group" id="group-{{{ field.groupid }}}">
									<h3>{{ field.label }}</h3> 
									<div>
							
							<# return; } #>
							
							
							<# if(field.type == 'group_end') { #>
									</div>
								</div>

							<# return; } #>
							
							<# if(field.type == 'inline_text' || field.type == 'select_icon') {  return;  } #>
							
							
							<div class="element-field element-field-{{{ field.type }}} id-{{{ field.id }}} <# if ( field.cl_required != null ) { #> show_on_required <# } #> ">
								<div class="element-wrapper">
								<# if ( 'text' === field.type || 'url' === field.type || 'email' === field.type || 'tel' === field.type || 'date' === field.type ) { #>

									<label>
										<# if ( field.label ) { #>
											<span class="customize-control-title">{{ field.label }}</span>
										<# } #>

										<input type="{{field.type}}" name="" value="{{{ field.default }}}" data-field="{{{ field.id }}}">
									</label>

								<# } else if ( 'hidden' === field.type ) { #>

									<input type="hidden" data-field="{{{ field.id }}}" <# if ( field.default ) { #> value="{{{ field.default }}}" <# } #> />

								<# } else if ( 'checkbox' === field.type ) { #>

									<label>
										<input type="checkbox" value="true" data-field="{{{ field.id }}}" <# if ( field.default ) { #> checked="checked" <# } #> /> {{ field.label }}
										<# if ( field.description ) { #>
											{{ field.description }}
										<# } #>
									</label>

								<# } else if ( 'select' === field.type ) { #>

									<# if ( ! field.choices ) return; #>
									<# if ( field.tooltip ) { #>
										<a href="#" class="tooltip hint--left" data-hint="{{ field.tooltip }}"><span class='dashicons dashicons-info'></span></a>
									<# } #>
									<label>
										<# if ( field.label ) { #>
											<span class="customize-control-title">{{ field.label }}</span>
										<# } #>

										<select {{{ field.link }}} placeholder="Click to select..." data-field="{{{ field.id }}}" data-multiple="{{ field.multiple }}"<# if ( 1 < field.multiple ) { #> multiple<# } #>>
											<option></option>
											<# if ( 1 < field.multiple && field.default ) { #>
												<# for ( key in field.default ) { #>
													<option value="{{ field.default[ key ] }}" selected>{{ field.choices[ field.default[ key ] ] }}</option>
												<# } #>
												<# for ( key in field.choices ) { #>
													<# if ( field.default[ key ] in field.default ) { #>
													<# } else { #>
														<option value="{{ key }}">{{ field.choices[ key ] }}</option>
													<# } #>
												<# } #>
											<# } else { #>
												<# for ( key in field.choices ) { #>
													<option value="{{ key }}"<# if ( key === field.default ) { #>selected<# } #>>{{ field.choices[ key ] }}</option>
												<# } #>
											<# } #>
										</select>
									</label>

								<# } else if ( 'dropdown-pages' === field.type ) { #>

									<label>
										<# if ( field.label ) { #>
											<span class="customize-control-title">{{{ data.label }}}</span>
										<# } #>

										<div class="customize-control-content repeater-dropdown-pages">{{{ field.dropdown }}}</div>
									</label>

								<# } else if ( 'radio' === field.type ) { #>

									<label>
										<# if ( field.label ) { #>
											<span class="customize-control-title">{{ field.label }}</span>
										<# } #>


										<# _.each( field.choices, function( choice, i ) { #>
											<label>
												<input type="radio" name="{{{ field.id }}}{{ index }}" data-field="{{{ field.id }}}" value="{{{ i }}}" <# if ( field.default == i ) { #> checked="checked" <# } #>> {{ choice }} <br/>
											</label>
										<# }); #>
									</label>

								<# } else if ( 'radio-image' === field.type ) { #>

									<label>
										<# if ( field.label ) { #>
											<span class="customize-control-title">{{ field.label }}</span>
										<# } #>


										<# _.each( field.choices, function( choice, i ) { #>
											<input type="radio" id="{{{ field.id }}}_{{ index }}_{{{ i }}}" name="{{{ field.id }}}{{ index }}" data-field="{{{ field.id }}}" value="{{{ i }}}" <# if ( field.default == i ) { #> checked="checked" <# } #>>
												<label for="{{{ field.id }}}_{{ index }}_{{{ i }}}">
													<img src="{{ choice }}">
												</label>
											</input>
										<# }); #>
									</label>

								<# } else if ( 'color' === field.type ) { #>
									<div class="flex-box">
										
										<# var defaultValue = '';
								        if ( field.default ) {
								            if ( '#' !== field.default.substring( 0, 1 ) ) {
								                defaultValue = '#' + field.default;
								            } else {
								                defaultValue = field.default;
								            }
								            defaultValue = ' data-default-color=' + defaultValue; // Quotes added automatically.
								        } #>
								        <div class="info">
								            <# if ( field.label ) { #>
								                <span class="customize-control-title">{{{ field.label }}}</span>
								            <# } #>

								        </div>
								        <div class="action">
								            <input class="color-picker-hex" type="text" maxlength="7" placeholder="<?php esc_attr_e( 'Hex Value', 'folie' ); ?>"  value="{{{ field.default }}}" data-field="{{{ field.id }}}" data-alpha="{{{ field.alpha }}}" {{ defaultValue }} />
								        </div>
							        </div>

								<# } else if ( 'textarea' === field.type ) { #>

									<# if ( field.label ) { #>
										<span class="customize-control-title">{{ field.label }}</span>
									<# } #>

									<textarea rows="5" data-field="{{{ field.id }}}">{{ field.default }}</textarea>

								<# } else if ( field.type === 'image' || field.type === 'cropped_image' ) { #>
									<div class="customize-control-upload">
										<label>
											<# if ( field.label ) { #>
												<span class="customize-control-title">{{ field.label }}</span>
											<# } #>

										</label>
	
										<figure class="kirki-image-attachment <# if ( field.default ) { #> added_image <# } #>" data-placeholder="<?php esc_attr_e( 'No Image Selected', 'folie' ); ?>"  >
											<# if ( field.default ) { #>
												<# var defaultImageURL = ( field.default.url ) ? field.default.url : field.default; #>
												<# var type = (field.default.type) ? field.default.type : 'image';
												
												if( type != 'image' ){ #>
													<div>{{{ decodeURIComponent(field.default.title) }}}</div>
												<# }else{ #>
												<img src="{{{ decodeURIComponent(defaultImageURL) }}}">
												<# } #>
											<# } else { #>
												<?php esc_attr_e( 'No Image Selected', 'folie' ); ?>
											<# } #>
										</figure>
	
										<div class="actions">
											<button type="button" class="button remove-button<# if ( ! field.default ) { #> hidden<# } #>"><?php esc_attr_e( 'Remove', 'folie' ); ?></button>
											<button type="button" class="button upload-button" data-label="<?php esc_attr_e( 'Add Image', 'folie' ); ?>" data-alt-label="<?php esc_attr_e( 'Change Image', 'folie' ); ?>" >
												<# if ( field.default ) { #>
													<?php esc_attr_e( 'Change Image', 'folie' ); ?>
												<# } else { #>
													<?php esc_attr_e( 'Add Image', 'folie' ); ?>
												<# } #>
											</button>
											<# if ( field.default.id ) { #>
												<input type="hidden" class="hidden-field" value="{{{ field.default.id }}}" data-field="{{{ field.id }}}" >
											<# } else { #>
												<input type="hidden" class="hidden-field" value="{{{ field.default }}}" data-field="{{{ field.id }}}" >
											<# } #>
										</div>
									</div>

								<# } else if ( field.type === 'upload' ) { #>
									<div class="customize-control-upload">
										<label>
											<# if ( field.label ) { #>
												<span class="customize-control-title">{{ field.label }}</span>
											<# } #>

										</label>
	
										<figure class="kirki-file-attachment" data-placeholder="<?php esc_attr_e( 'No File Selected', 'folie' ); ?>" >
											<# if ( field.default ) { #>
												<# var defaultFilename = ( field.default.filename ) ? field.default.filename : field.default; #>
												<span class="file"><span class="dashicons dashicons-media-default"></span> {{ defaultFilename }}</span>
											<# } else { #>
												<?php esc_attr_e( 'No File Selected', 'folie' ) ?>
											<# } #>
										</figure>
	
										<div class="actions">
											<button type="button" class="button remove-button<# if ( ! field.default ) { #> hidden<# } #>"><?php esc_attr_e( 'Remove', 'folie' ); ?></button>
											<button type="button" class="button upload-button" data-label="<?php esc_attr_e( 'Add File', 'folie' ); ?>" data-alt-label="<?php esc_attr_e( 'Change File', 'folie' ); ?>" >
												<# if ( field.default ) { #>
													<?php esc_attr_e( 'Change File', 'folie' ); ?>
												<# } else { #>
													<?php esc_attr_e( 'Add File', 'folie' ); ?>
												<# } #>
											</button>
											<# if ( field.default.id ) { #>
												<input type="hidden" class="hidden-field" value="{{{ field.default.id }}}" data-field="{{{ field.id }}}" >
											<# } else { #>
												<input type="hidden" class="hidden-field" value="{{{ field.default }}}" data-field="{{{ field.id }}}" >
											<# } #>
										</div>
									</div>
								
								<# } else if ( field.type === 'switch' ) { #>
									<div class="customize-control-kirki-switch">
										<# if ( field.tooltip ) { #>
											<a href="#" class="tooltip hint--left" data-hint="{{ field.tooltip }}"><span class='dashicons dashicons-info'></span></a>
										<# } #>
							
										<div class="switch<# if ( field.choices['round'] ) { #> round<# } #> flex-box">
											<div class="info">
												<span class="customize-control-title">
													{{{ field.label }}}
												</span>
											</div>
											<div class="action">
												
												<input name="switch_{{ field.id }}" data-field="{{{ field.id }}}" id="switch_{{ field.id }}" class="switch_item" type="checkbox" value="{{ field.default }}" {{{ field.link }}}<# if ( 1 == parseInt(field.default) ) { #> checked<# } #> />
												<label class="switch-label" for="switch_{{ field.id }}">
												
												</label>
											</div>
										</div>
									</div>
								<# } else if( field.type === 'css_tool') { #>
									<div class="customize-control-css_tool cl_css-tool">
										
										<div class="cl_margin">
											<label>margin</label>
											<input type="text" name="margin_top" data-name="margin-top" class="cl_top" placeholder="-" data-attribute="margin" data-field="{{ field.id }}" value="{{ field.default[ 'margin-top' ] }}">
											<input type="text" name="margin_right" data-name="margin-right" class="cl_right" placeholder="-" data-attribute="margin" data-field="{{ field.id }}" value="{{ field.default[ 'margin-right' ] }}">
											<input type="text" name="margin_bottom" data-name="margin-bottom" class="cl_bottom" placeholder="-" data-attribute="margin" data-field="{{ field.id }}" value="{{ field.default[ 'margin-bottom' ] }}">
											<input type="text" name="margin_left" data-name="margin-left" class="cl_left" placeholder="-" data-attribute="margin" data-field="{{ field.id }}" value="{{ field.default[ 'margin-left' ] }}">      
											<div class="cl_border">
												<label>border</label>
												<input type="text" name="border_top_width" data-name="border-top-width" class="cl_top" placeholder="-" data-attribute="border" data-field="{{ field.id }}" value="{{ field.default[ 'border-top-width' ] }}">
												<input type="text" name="border_right_width" data-name="border-right-width" class="cl_right" placeholder="-" data-attribute="border" data-field="{{ field.id }}" value="{{ field.default[ 'border-right-width' ] }}">
												<input type="text" name="border_bottom_width" data-name="border-bottom-width" class="cl_bottom" placeholder="-" data-attribute="border" data-field="{{ field.id }}" value="{{ field.default[ 'border-bottom-width' ] }}">
												<input type="text" name="border_left_width" data-name="border-left-width" class="cl_left" placeholder="-" data-attribute="border" data-field="{{ field.id }}" value="{{ field.default[ 'border-left-width' ] }}">          
												<div class="cl_padding">
													<label>padding</label>
													<input type="text" name="padding_top" data-name="padding-top" class="cl_top" placeholder="-" data-attribute="padding" data-field="{{ field.id }}" value="{{ field.default[ 'padding-top' ] }}">
													<input type="text" name="padding_right" data-name="padding-right" class="cl_right" placeholder="-" data-attribute="padding" data-field="{{ field.id }}" value="{{ field.default[ 'padding-right' ] }}">
													<input type="text" name="padding_bottom" data-name="padding-bottom" class="cl_bottom" placeholder="-" data-attribute="padding" data-field="{{ field.id }}" value="{{ field.default[ 'padding-bottom' ] }}">
													<input type="text" name="padding_left" data-name="padding-left" class="cl_left" placeholder="-" data-attribute="padding" data-field="{{ field.id }}" value="{{ field.default[ 'padding-left' ] }}">              
													<div class="cl_content"></div>          
												</div>      
											</div>    
										</div>
									
									</div>
								<# } else if(field.type === 'multicheck') { #>
									
									<# if ( ! field.choices ) { return; } #>
									<div class="customize-control-kirki-multicheck ">
										<# if ( field.tooltip ) { #>
											<a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
										<# } #>
							
										<# if ( field.label ) { #>
											<span class="customize-control-title">{{ field.label }}</span>
										<# } #>
						
							
										<ul>
											<# for ( key in field.choices ) { #>
												<li>
													<label>
														<input type="checkbox" data-field="{{ field.id }}" value="{{ key }}"<# if ( _.contains( field.default, key ) ) { #> checked<# } #> />
														{{ field.choices[ key ] }}
													</label>
												</li>
											<# } #>
										</ul>
									</div>
								
								<# } else if(field.type === 'slider') { #>
									<div class="customize-control-kirki-slider">
										<# if ( field.tooltip ) { #>
											<a href="#" class="tooltip hint--left" data-hint="{{ field.tooltip }}"><span class='dashicons dashicons-info'></span></a>
										<# } #>
										<label>
											<# if ( field.label ) { #>
												<span class="customize-control-title">{{{ field.label }}}</span>
											<# } #>
											
											<div class="wrapper">
												<input type="range" min="{{ field.choices['min'] }}" max="{{ field.choices['max'] }}" step="{{ field.choices['step'] }}" value="{{ field.default }}" data-field="{{ field.id }}" {{{ field.link }}} data-reset_value="{{ data.default }}" />
												<div class="kirki_range_value">
													<input type="text" data-field="{{ field.id }}" {{{ field.link }}} value="{{ field.default }}" class="value" />
													<# if ( field.suffix ) { #>
														{{ field.suffix }}
													<# } #>
												</div>
												
											</div>
										</label>
									</div>
								
								<# } else if ( 'inline_select' === field.type ) { #>
									
									<div class="inline_select">
										<# if ( ! field.choices ) return; #>
										<# if ( field.tooltip ) { #>
											<a href="#" class="tooltip hint--left" data-hint="{{ field.tooltip }}"><span class='dashicons dashicons-info'></span></a>
										<# } #>
										<div class="flex-box">
											<div class="info">
												<# if ( field.label ) { #>
													<span class="customize-control-title">{{ field.label }}</span>
												<# } #>
												
											</div>
											<div class="action">
												<select {{{ field.link }}} data-field="{{{ field.id }}}" data-multiple="{{ field.multiple }}"<# if ( 1 < field.multiple ) { #> multiple<# } #>>
													<# if ( 1 < field.multiple && field.default ) { #>
														<# for ( key in field.default ) { #>
															<option value="{{ field.default[ key ] }}" selected>{{ field.choices[ field.default[ key ] ] }}</option>
														<# } #>
														<# for ( key in field.choices ) { #>
															<# if ( field.default[ key ] in field.default ) { #>
															<# } else { #>
																<option value="{{ key }}">{{ field.choices[ key ] }}</option>
															<# } #>
														<# } #>
													<# } else { #>
														<# for ( key in field.choices ) { #>
															<option value="{{ key }}"<# if ( key === field.default ) { #>selected<# } #>>{{ field.choices[ key ] }}</option>
														<# } #>
													<# } #>
												</select>
											</div>
										</div>
									</div>
								
								
								<# } else if( 'image_gallery' === field.type ){ #>

									<div class="customize-control-kirki-image_gallery customize-control-upload">
										<# if ( field.tooltip ) { #>
											<a href="#" class="tooltip hint--left" data-hint="{{ field.tooltip }}"><span class='dashicons dashicons-info'></span></a>
										<# } #>
										<label>
											<# if ( field.label ) { #>
												<span class="customize-control-title">{{{ field.label }}}</span>
											<# } #>
											
											<div class="image-gallery-attachments" data-field="{{ field.id }}">
												<# _.each( field.attachments, function( attachment ) { #>
													<div class="image-gallery-thumbnail-wrapper" data-post-id="{{ attachment.id }}">
														<img class="attachment-thumb" src="{{ attachment.url }}" draggable="false" alt="" />
													</div>
												<#	})#>
											</div>

											<div>
												<button type="button" class="button upload-button" id="image-gallery-modify-gallery">Modify Gallery</button>
											</div>
										</label>
									</div>

								<# } #>

								</div>

								<div class="description">
									
									<# if ( field.description ) { #>
											<span class="description customize-control-description">{{{ field.description }}}</span>
									<# } #>

								</div>
							</div>
						<# }); #>
						
					
			
			</script>

			<script type="text/html" id="tmpl-add-external-settings">
				<div class="embed-container" style="display: none;">
					<div class="embed-preview"></div>
				</div>
				<label class="setting width">
					<span><?php esc_attr_e( 'Width', 'folie' ); ?></span>
					<input type="text" class="alignment" data-setting="width" />
				</label>
				<label class="setting height">
					<span><?php esc_attr_e( 'Height', 'folie' ); ?></span>
					<input type="text" class="alignment" data-setting="height" />
				</label>
			</script>
			<?php
		}
	}
}
