<?php
/**
 * Create the Theme Panel
 *
 * @package Folie WordPress Theme
 * @subpackage Framework
 * @version 1.0.0 
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! class_exists( 'CodelessThemePanel' ) ) {

	class CodelessThemePanel {
	    
	    public function __construct() {
			
			add_action( 'admin_menu', array( 'CodelessThemePanel', 'add_menu_page' ), 0 );
			
		}
		
		public static function add_menu_page(){
		    add_menu_page(
				esc_html__( 'Codeless Panel', 'folie' ),
				'Codeless',
				'manage_options',
				'codeless-panel',
				'',
				'dashicons-admin-generic',
				null
			);

			add_submenu_page(
				'codeless-panel',
				esc_html__( 'Home', 'folie' ),
				esc_html__( 'Home', 'folie' ),
				'administrator',
				'codeless-panel',
				array( 'CodelessThemePanel', 'createPage' )
			);
		}

		public static function createPage(){
			?>

			<div class="cl-page">

				<div class="cl-row">
					<div id="register" class="cl-box">
						<?php include_once (get_template_directory(). '/includes/codeless_theme_panel/views/register.php'); ?>
					</div>
				</div>

				<div class="cl-row">
					<div id="setup-wizard" class="cl-box">
						<?php include_once (get_template_directory(). '/includes/codeless_theme_panel/views/setup-wizard.php'); ?>
					</div>
					<div id="support" class="cl-box">
						<?php include_once (get_template_directory(). '/includes/codeless_theme_panel/views/support.php'); ?>
					</div>
					
				</div>

				<div class="cl-row">
					<div id="updates" class="cl-box">
						<?php include_once (get_template_directory(). '/includes/codeless_theme_panel/views/updates.php'); ?>
					</div>

					<?php if(1 != 1):  ?>
						<div id="annoucements" class="cl-box">
							<?php include_once (get_template_directory(). '/includes/codeless_theme_panel/views/annoucements.php'); ?>
						</div>
					<?php endif; ?>
				</div>

			</div>

			<?php
		}
	    
	}
	
	if( is_admin() )
    	new CodelessThemePanel();
    
}