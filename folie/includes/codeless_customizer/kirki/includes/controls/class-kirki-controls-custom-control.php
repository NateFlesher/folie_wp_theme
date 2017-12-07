<?php
/**
 * Modified by Codeless
 * Customizer Control: custom.
 *
 * Creates a new custom control.
 * Custom controls accept raw HTML/JS.
 *
 * @package     Kirki
 * @subpackage  Controls
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kirki_Controls_Custom_Control' ) ) {

	/**
	 * The "custom" control allows you to add any raw HTML.
	 */
	class Kirki_Controls_Custom_Control extends Kirki_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'kirki-custom';

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
		 
		public function to_json() {
			parent::to_json();
			
		}
		
		public function render(){
			
			?>
			
			<div class="tab_sections">
			<?php
			$this->render_content();
			?>
			
			<?php
		}
		
		public function enqueue() {
			wp_enqueue_script( 'kirki-custom' );
		}
		 
		protected function content_template1() {
			?>
			
			
							<# if(data.js_vars.subtype == 'show_tabs') { #>
								
								<div class="tab_sections">
								
									<# _.each( data.js_vars.tabs, function( label, id ) { #>
										<a href="#" class="<# if(data.default == id){ #> active <# } #>" data-tab="{{{ id }}}">{{ label }}</a> 
									<# }) #>
									
								</div>
									
							
							<# } #>
							
							
							
							<# if(data.js_vars.subtype == 'tab_start') { #>
								
								<div class="tab_section" id="tab-{{{ data.js_vars.tabid }}}">
									
							
							<# } #>
							
							
							<# if(data.js_vars.subtype == 'tab_end') { #>
								
								</div>

							<# } #>
							
							
							
							<# if(data.js_vars.subtype == 'group_start') { #>
								
								<div class="group" id="group-{{{ data.js_vars.groupid }}}">
									<h3>{{ data.js_vars.label }}</h3> 
									<div>
							
							<# } #>
							
							
							<# if(data.js_vars.subtype == 'group_end') { #>
									</div>
								</div>

							<# } #>
			
			<?php

		}
	}
}
