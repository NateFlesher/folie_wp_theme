<?php
/**
 * Customizer Control: sortable.
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

if ( ! class_exists( 'Kirki_Controls_Codelessheader_Control' ) ) {

	/**
	 * Sortable control (uses checkboxes).
	 */
	class Kirki_Controls_Codelessheader_Control extends Kirki_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'kirki-codelessheader';

		/**
		 * Constructor.
		 * Supplied `$args` override class property defaults.
		 * If `$args['settings']` is not defined, use the $id as the setting ID.
		 *
		 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
		 * @param string               $id      Control ID.
		 * @param array                $args    {@see WP_Customize_Control::__construct}.
		 */
		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			add_filter( 'customize_sanitize_' . $id, array( $this, 'customize_sanitize' ) );
		}

		/**
		 * Unserialize the setting before saving on DB.
		 *
		 * @param string $value Serialized settings.
		 * @return array
		 */
		public function customize_sanitize( $value ) {
			$value = maybe_unserialize( $value );
			return $value;
		}

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_script( 'kirki-codelessheader' );
			
		}

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @access public
		 */
		public function to_json() {
			parent::to_json();

			

			$values = $this->value() == '' ? array_keys( $this->choices ) : $this->value();
			$filtered_values = array();
			

			$this->json['filteredValues'] = $filtered_values;
			

			$this->json['invisibleKeys'] = array_diff( array_keys( $this->choices ), $filtered_values );

			$this->json['inputAttrs'] = maybe_serialize( $this->input_attrs() );
			
			$this->json['elements'] = array(
				array(
					'type' => 'switch',
					'options' => array(
						'label' => 'Element 1',
						'choices' => array(
							'on' => 'On',
							'off' => 'Off',
							1 => 'Enabled',
							0 => 'Disabled'
						),
						'id' => 'navigation_bool',
						'value' => 1
					)
				)	
				
			);

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
	

			
		

			<?php
		}
	}
}
