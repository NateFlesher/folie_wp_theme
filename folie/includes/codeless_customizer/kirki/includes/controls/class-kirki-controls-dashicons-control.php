<?php
/**
 * Customizer Control: dashicons.
 *
 * @package     Kirki
 * @subpackage  Controls
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       2.2.4
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kirki_Controls_Dashicons_Control' ) ) {

	/**
	 * Dashicons control (modified radio).
	 */
	class Kirki_Controls_Dashicons_Control extends Kirki_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'kirki-dashicons';

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @access public
		 */
		public function to_json() {
			parent::to_json();
			$this->json['icons'] = Codeless_Icons::get_icons();
		}

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_script( 'kirki-dashicons' );
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
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{ data.label }}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
			<div class="icons-wrapper">
				<h4>Codeless Icons</h4>
				<# for ( key in data.icons) { #>
					<input class="dashicons-select" type="radio" value="{{ data.icons[key] }}" name="_customize-dashicons-radio-{{ data.id }}" id="{{ data.id }}{{ data.icons[key] }}" {{{ data.link }}}<# if ( data.value === data.icons[key] ) { #> checked="checked"<# } #>>
						<label for="{{ data.id }}{{ data.icons[key] }}">
							<i class="{{ data.icons[key] }}"></i>
						</label>
					</input>
				<# } #>
			</div>
			<?php
		}
	}
}
