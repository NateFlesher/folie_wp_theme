<?php
/**
 * A simple object containing properties for fonts.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_Fonts' ) ) {

	/**
	 * The Kirki_Fonts object.
	 */
	final class Kirki_Fonts {

		/**
		 * The mode we'll be using to add google fonts.
		 * This is a todo item, not yet functional.
		 *
		 * @static
		 * @todo
		 * @access public
		 * @var string
		 */
		public static $mode = 'link';

		/**
		 * Holds a single instance of this object.
		 *
		 * @static
		 * @access private
		 * @var null|object
		 */
		private static $instance = null;

		/**
		 * An array of our google fonts.
		 *
		 * @static
		 * @access public
		 * @var null|object
		 */
		public static $google_fonts = null;

		/**
		 * The class constructor.
		 */
		private function __construct() {}

		/**
		 * Get the one, true instance of this class.
		 * Prevents performance issues since this is only loaded once.
		 *
		 * @return object Kirki_Fonts
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Compile font options from different sources.
		 *
		 * @return array    All available fonts.
		 */
		public static function get_all_fonts() {
			$standard_fonts = self::get_standard_fonts();
			$google_fonts   = self::get_google_fonts();
			return apply_filters( 'kirki/fonts/all', array_merge( $standard_fonts, $google_fonts ) );
		}

		/**
		 * Return an array of standard websafe fonts.
		 *
		 * @return array    Standard websafe fonts.
		 */
		 public static function get_standard_fonts() {
			//$i18n = Kirki_l10n::get_strings();
			$standard_fonts = array(
				'serif' => array(
					'label' => esc_attr__('Serif', 'folie'),
					'stack' => 'Georgia,Times,"Times New Roman",serif',
				),
				'sans-serif' => array(
					'label'  => esc_attr__('Sans Serif', 'folie'),
					'stack'  => 'Helvetica,Arial,sans-serif',
				),
				'monospace' => array(
					'label' =>esc_attr__('Monospace', 'folie'),
					'stack' => 'Monaco,"Lucida Sans Typewriter","Lucida Typewriter","Courier New",Courier,monospace',
				),
			);
			return apply_filters( 'kirki/fonts/standard_fonts', $standard_fonts );
		}

		/**
		 * Return an array of backup fonts based on the font-category
		 *
		 * @return array
		 */
		public static function get_backup_fonts() {
			$backup_fonts = array(
				'sans-serif'  => 'Helvetica, Arial, sans-serif',
				'serif'       => 'Georgia, serif',
				'display'     => '"Comic Sans MS", cursive, sans-serif',
				'handwriting' => '"Comic Sans MS", cursive, sans-serif',
				'monospace'   => '"Lucida Console", Monaco, monospace',
			);
			return apply_filters( 'kirki/fonts/backup_fonts', $backup_fonts );
		}

		/**
		 * Return an array of all available Google Fonts.
		 *
		 * @return array    All Google Fonts.
		 */
		public static function get_google_fonts() {

			if ( null === self::$google_fonts || empty( self::$google_fonts ) ) {

				$fonts = include wp_normalize_path( Kirki::$path . '/includes/webfonts.php' );

				$google_fonts = array();
				if ( is_array( $fonts ) ) {
					foreach ( $fonts['items'] as $font ) {
						$google_fonts[ $font['family'] ] = array(
							'label'    => $font['family'],
							'variants' => $font['variants'],
							'subsets'  => $font['subsets'],
							'category' => $font['category'],
						);
					}
				}

				self::$google_fonts = apply_filters( 'kirki/fonts/google_fonts', $google_fonts );

			}

			return self::$google_fonts;

		}

		/**
		 * Dummy function to avoid issues with backwards-compatibility.
		 * This is not functional, but it will prevent PHP Fatal errors.
		 *
		 * @static
		 * @access public
		 */
		public static function get_google_font_uri() {}

		/**
		 * Returns an array of all available subsets.
		 *
		 * @static
		 * @access public
		 * @return array
		 */
		public static function get_google_font_subsets() {
			//$i18n = Kirki_l10n::get_strings();
			return array(
				// 'all'          => $i18n['all'],
				'cyrillic'     => esc_attr__('Cyrillic', 'folie'),
				'cyrillic-ext' => esc_attr__('Cyrillic Extended', 'folie'),
				'devanagari'   => esc_attr__('Devanagari', 'folie'),
				'greek'        => esc_attr__('Greek', 'folie'),
				'greek-ext'    => esc_attr__('Greek Extended', 'folie'),
				'khmer'        => esc_attr__('Khmer', 'folie'),
				// 'latin'        => $i18n['latin'],
				'latin-ext'    => esc_attr__('Latin', 'folie'),
				'vietnamese'   => esc_attr__('Latin Extended', 'folie'),
				'hebrew'       => esc_attr__('Hebrew', 'folie'),
				'arabic'       => esc_attr__('Arabic', 'folie'),
				'bengali'      => esc_attr__('Bengali', 'folie'),
				'gujarati'     => esc_attr__('Gujarati', 'folie'),
				'tamil'        => esc_attr__('Tamil', 'folie'),
				'telugu'       => esc_attr__('Telugu', 'folie'),
				'thai'         => esc_attr__('Thai', 'folie'),
			);
		}

		/**
		 * Returns an array of all available variants.
		 *
		 * @static
		 * @access public
		 * @return array
		 */
		public static function get_all_variants() {
			$i18n = Kirki_l10n::get_strings_fonts();
			return array(
				'100'       => $i18n['ultra-light'],
				'100italic' => $i18n['ultra-light-italic'],
				'200'       => $i18n['light'],
				'200italic' => $i18n['light-italic'],
				'300'       => $i18n['book'],
				'300italic' => $i18n['book-italic'],
				'regular'   => $i18n['regular'],
				'italic'    => $i18n['italic'],
				'500'       => $i18n['medium'],
				'500italic' => $i18n['medium-italic'],
				'600'       => $i18n['semi-bold'],
				'600italic' => $i18n['semi-bold-italic'],
				'700'       => $i18n['bold'],
				'700italic' => $i18n['bold-italic'],
				'800'       => $i18n['extra-bold'],
				'800italic' => $i18n['extra-bold-italic'],
				'900'       => $i18n['ultra-bold'],
				'900italic' => $i18n['ultra-bold-italic'],
			);
		}

		

		/**
		 * Determine if a font-name is a valid google font or not.
		 *
		 * @static
		 * @access public
		 * @param string $fontname The name of the font we want to check.
		 * @return bool
		 */
		public static function is_google_font( $fontname ) {
			return ( array_key_exists( $fontname, self::$google_fonts ) );
		}

		/**
		 * Gets available options for a font.
		 *
		 * @static
		 * @access public
		 * @return array
		 */
		public static function get_font_choices() {
			$fonts = self::get_all_fonts();
			$fonts_array = array();
			foreach ( $fonts as $key => $args ) {
				$fonts_array[ $key ] = $key;
			}
			return $fonts_array;
		}
	}
}
