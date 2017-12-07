<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'kirki';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'folie' ),
				'background-image'      => esc_attr__( 'Background Image', 'folie' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'folie' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'folie' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'folie' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'folie' ),
				'inherit'               => esc_attr__( 'Inherit', 'folie' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'folie' ),
				'cover'                 => esc_attr__( 'Cover', 'folie' ),
				'contain'               => esc_attr__( 'Contain', 'folie' ),
				'background-size'       => esc_attr__( 'Background Size', 'folie' ),
				'fixed'                 => esc_attr__( 'Fixed', 'folie' ),
				'scroll'                => esc_attr__( 'Scroll', 'folie' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'folie' ),
				'left-top'              => esc_attr__( 'Left Top', 'folie' ),
				'left-center'           => esc_attr__( 'Left Center', 'folie' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'folie' ),
				'right-top'             => esc_attr__( 'Right Top', 'folie' ),
				'right-center'          => esc_attr__( 'Right Center', 'folie' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'folie' ),
				'center-top'            => esc_attr__( 'Center Top', 'folie' ),
				'center-center'         => esc_attr__( 'Center Center', 'folie' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'folie' ),
				'background-position'   => esc_attr__( 'Background Position', 'folie' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'folie' ),
				'on'                    => esc_attr__( 'ON', 'folie' ),
				'off'                   => esc_attr__( 'OFF', 'folie' ),
				'all'                   => esc_attr__( 'All', 'folie' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'folie' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'folie' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'folie' ),
				'greek'                 => esc_attr__( 'Greek', 'folie' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'folie' ),
				'khmer'                 => esc_attr__( 'Khmer', 'folie' ),
				'latin'                 => esc_attr__( 'Latin', 'folie' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'folie' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'folie' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'folie' ),
				'arabic'                => esc_attr__( 'Arabic', 'folie' ),
				'bengali'               => esc_attr__( 'Bengali', 'folie' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'folie' ),
				'tamil'                 => esc_attr__( 'Tamil', 'folie' ),
				'telugu'                => esc_attr__( 'Telugu', 'folie' ),
				'thai'                  => esc_attr__( 'Thai', 'folie' ),
				'serif'                 => _x( 'Serif', 'font style', 'folie' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'folie' ),
				'monospace'             => _x( 'Monospace', 'font style', 'folie' ),
				'font-family'           => esc_attr__( 'Font Family', 'folie' ),
				'font-size'             => esc_attr__( 'Font Size', 'folie' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'folie' ),
				'line-height'           => esc_attr__( 'Line Height', 'folie' ),
				'font-style'            => esc_attr__( 'Font Style', 'folie' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'folie' ),
				'top'                   => esc_attr__( 'Top', 'folie' ),
				'bottom'                => esc_attr__( 'Bottom', 'folie' ),
				'left'                  => esc_attr__( 'Left', 'folie' ),
				'right'                 => esc_attr__( 'Right', 'folie' ),
				'center'                => esc_attr__( 'Center', 'folie' ),
				'justify'               => esc_attr__( 'Justify', 'folie' ),
				'color'                 => esc_attr__( 'Color', 'folie' ),
				'add-image'             => esc_attr__( 'Add Image', 'folie' ),
				'change-image'          => esc_attr__( 'Change Image', 'folie' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'folie' ),
				'add-file'              => esc_attr__( 'Add File', 'folie' ),
				'change-file'           => esc_attr__( 'Change File', 'folie' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'folie' ),
				'remove'                => esc_attr__( 'Remove', 'folie' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'folie' ),
				'variant'               => esc_attr__( 'Variant', 'folie' ),
				'subsets'               => esc_attr__( 'Subset', 'folie' ),
				'size'                  => esc_attr__( 'Size', 'folie' ),
				'height'                => esc_attr__( 'Height', 'folie' ),
				'spacing'               => esc_attr__( 'Spacing', 'folie' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'folie' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'folie' ),
				'light'                 => esc_attr__( 'Light 200', 'folie' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'folie' ),
				'book'                  => esc_attr__( 'Book 300', 'folie' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'folie' ),
				'regular'               => esc_attr__( 'Normal 400', 'folie' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'folie' ),
				'medium'                => esc_attr__( 'Medium 500', 'folie' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'folie' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'folie' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'folie' ),
				'bold'                  => esc_attr__( 'Bold 700', 'folie' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'folie' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'folie' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'folie' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'folie' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'folie' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'folie' ),
				'add-new'           	=> esc_attr__( 'Add new', 'folie' ),
				'row'           		=> esc_attr__( 'row', 'folie' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'folie' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'folie' ),
				'back'                  => esc_attr__( 'Back', 'folie' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'folie' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'folie' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'folie' ),
				'none'                  => esc_attr__( 'None', 'folie' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'folie' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'folie' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'folie' ),
				'initial'               => esc_attr__( 'Initial', 'folie' ),
				'select-page'           => esc_attr__( 'Select a Page', 'folie' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'folie' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'folie' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'folie' ),
			);



			

			$config = apply_filters( 'kirki/config', array() );

			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}


		public static function get_strings_fonts($config_id = 'global'){
			$translation_strings = array(
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'folie' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'folie' ),
				'light'                 => esc_attr__( 'Light 200', 'folie' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'folie' ),
				'book'                  => esc_attr__( 'Book 300', 'folie' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'folie' ),
				'regular'               => esc_attr__( 'Normal 400', 'folie' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'folie' ),
				'medium'                => esc_attr__( 'Medium 500', 'folie' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'folie' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'folie' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'folie' ),
				'bold'                  => esc_attr__( 'Bold 700', 'folie' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'folie' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'folie' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'folie' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'folie' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'folie' ),
			);

			return $translation_strings;
		}
	}
}
