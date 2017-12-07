<?php
/**
 * Customizer Control: dimension
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

if ( ! class_exists( 'Kirki_Controls_Cssbox_Control' ) ) {

	/**
	 * A text control with validation for CSS units.
	 */
	class Kirki_Controls_Cssbox_Control extends Kirki_Customize_Control {

		/**
		 * The control type.
		 * 
		 * @access public
		 * @var string
		 */
		public $type = 'kirki-cssbox';

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_script( 'kirki-cssbox' );
		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see Kirki_Customize_Control::to_json()}.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access protected
		 */
		protected function content_template() {
			?>
			<# if ( data.tooltip ) { #>
				<a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
			<# } #>
			<label class="customizer-text">
				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
				<# } #>
				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>
				
				<# data.value = (_.isObject(data.value) ? data.value : JSON.parse(data.value) ) #>
				<div class="customize-control-css_tool cl_css-tool">
				    <div class="cl_margin">
						<label>margin</label>
						<input type="text" name="margin_top" data-name="margin-top" class="cl_top" placeholder="-" data-attribute="margin" data-field="{{ data.id }}" value="{{ data.value[ 'margin-top' ] }}">
						<input type="text" name="margin_right" data-name="margin-right" class="cl_right" placeholder="-" data-attribute="margin" data-field="{{ data.id }}" value="{{ data.value[ 'margin-right' ] }}">
						<input type="text" name="margin_bottom" data-name="margin-bottom" class="cl_bottom" placeholder="-" data-attribute="margin" data-field="{{ data.id }}" value="{{ data.value[ 'margin-bottom' ] }}">
						<input type="text" name="margin_left" data-name="margin-left" class="cl_left" placeholder="-" data-attribute="margin" data-field="{{ data.id }}" value="{{ data.value[ 'margin-left' ] }}">      
						<div class="cl_border">
							<label>border</label>
							<input type="text" name="border_top_width" data-name="border-top-width" class="cl_top" placeholder="-" data-attribute="border" data-field="{{ data.id }}" value="{{ data.value[ 'border-top-width' ] }}">
							<input type="text" name="border_right_width" data-name="border-right-width" class="cl_right" placeholder="-" data-attribute="border" data-field="{{ data.id }}" value="{{ data.value[ 'border-right-width' ] }}">
							<input type="text" name="border_bottom_width" data-name="border-bottom-width" class="cl_bottom" placeholder="-" data-attribute="border" data-field="{{ data.id }}" value="{{ data.value[ 'border-bottom-width' ] }}">
							<input type="text" name="border_left_width" data-name="border-left-width" class="cl_left" placeholder="-" data-attribute="border" data-field="{{ data.id }}" value="{{ data.value[ 'border-left-width' ] }}">          
							<div class="cl_padding">
							    <label>padding</label>
								<input type="text" name="padding_top" data-name="padding-top" class="cl_top" placeholder="-" data-attribute="padding" data-field="{{ data.id }}" value="{{ data.value[ 'padding-top' ] }}">
								<input type="text" name="padding_right" data-name="padding-right" class="cl_right" placeholder="-" data-attribute="padding" data-field="{{ data.id }}" value="{{ data.value[ 'padding-right' ] }}">
								<input type="text" name="padding_bottom" data-name="padding-bottom" class="cl_bottom" placeholder="-" data-attribute="padding" data-field="{{ data.id }}" value="{{ data.value[ 'padding-bottom' ] }}">
								<input type="text" name="padding_left" data-name="padding-left" class="cl_left" placeholder="-" data-attribute="padding" data-field="{{ data.id }}" value="{{ data.value[ 'padding-left' ] }}">              
								<div class="cl_content"></div>          
							</div>      
						</div>    
					</div>
									
				</div>
				
			</label>
			<?php
		}
	}
}
