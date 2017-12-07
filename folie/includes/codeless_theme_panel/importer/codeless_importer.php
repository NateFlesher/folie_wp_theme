<?php

class CodelessImporter{

	protected $tgmpa_url = 'themes.php?page=tgmpa-install-plugins';
	protected $tgmpa_instance;
	protected $tgmpa_menu_slug = 'tgmpa-install-plugins';
	protected $theme_name;

	var $process_list = array( 'install_plugins', 'import_widgets', 'import_content', 'import_options', 'import_menus' );

	public function __construct(){

		$current_theme = wp_get_theme();
		$this->theme_name = strtolower( preg_replace( '#[^a-zA-Z]#','',$current_theme->get( 'Name' ) ) );

		add_action('wp_ajax_cl_import_demo_data', array(&$this, 'ajax_handler'));
		add_action('tgmpa_load', array( &$this, 'tgmpa_load' ));

		if(class_exists( 'TGM_Plugin_Activation' ) && isset($GLOBALS['tgmpa'])) {
			add_action( 'init', array( &$this, 'get_tgmpa_instanse' ), 30 );
			add_action( 'init', array( &$this, 'set_tgmpa_url' ), 40 );
		}
	}

	public function ajax_handler(){
		$process = isset( $_POST['process']) ? $_POST['process'] : 0;
		
		$process_function = $this->process_list[$_POST['process']];
		$this->{'process_' . $process_function }();
	}

	public function process_install_plugins(){
		$response['message'] = 'process_install_plugins';

		$this->ajax_plugins();
	}

	public function process_import_widgets(){
		$dir = $_POST['demo'];
		$file = 'sidebar_widgets.txt';
		$options = $this->read_file($file, $dir);

		if($options){

			foreach ((array) $options['final_widget'] as $widget => $widget_params) {
				update_option( 'widget_' . $widget, $widget_params );
			}

			$this->import_sidebars_widgets($file, $dir);
			wp_send_json_success( array('message' => 'Widgets Successfully imported') );
			
		}else{
			wp_send_json_error( array('message' => 'Demo doesn\'t contain sidebar_widgets.txt file.') );
		}
		
	}

	public function process_import_options(){
		$dir = $_POST['demo'];
		$file = 'customizer.txt';

		$theme_mods = $this->read_file($file, $dir);

		if( $theme_mods && ! empty( $theme_mods ) ){
			foreach ((array) $theme_mods as $key => $val) {
				set_theme_mod( $key, $val );
			}

			$file = 'options.txt';
			$options = $this->read_file($file, $dir);

			if( $options ){
				foreach ((array) $options as $key => $val) {
					
					update_option( $key, $val );
				}
			}else{
				wp_send_json_error( array('message' => 'Options not loaded or files missed.') );
			}
		}

		wp_send_json_success( array('Success') );
	}

	public function process_import_content(){
		$dir = $_POST['demo'];
	    $attachments = true;

	    ob_start();

	    define('WP_LOAD_IMPORTERS', true);

	    
		require_once( get_template_directory() . '/includes/codeless_theme_panel/importer/wordpress-importer.php');
		
					
		$wp_import = new WP_Import();
		set_time_limit(0);
		$file = 'content.xml';
		$path = get_template_directory() . '/includes/codeless_demos_content/'.$dir.'/'. $file;
                
		$wp_import->fetch_attachments = $attachments;
		$value = $wp_import->import($path);

		ob_get_clean();
		if(is_wp_error($value)){
			$msg = $result->get_error_message();
			wp_send_json_error( array('message' => 'Error. Content can\'t be installed.' . $msg ) );
		}
		else {
			wp_send_json_success( array('message' => 'Content Successfully Installed') );
		}
	}

	public function process_import_menus(){
		global $wpdb;
		$dir = $_POST['demo'];
		$terms = $wpdb->prefix . "terms";
		$menus_data = $this->read_file('menu.txt', $dir);
			
		if($menus_data){
			$menu_array = array();
			if(is_array($menus_data) && !empty($menus_data)){
				foreach ($menus_data as $registered_menu => $menu_slug) {
					$term_rows = $wpdb->get_results($wpdb->prepare(
					  "SELECT * FROM $wpdb->terms where slug = '%s' ",
					  $menu_slug
					), ARRAY_A);
					
					if(isset($term_rows[0]['term_id'])) {
						$term_id_by_slug = $term_rows[0]['term_id'];
					} else {
						$term_id_by_slug = null; 
					}
					$menu_array[$registered_menu] = $term_id_by_slug;
					
				}
			}
				
			set_theme_mod('nav_menu_locations', array_map('absint', $menu_array ) );
			wp_send_json_success( array('message' => 'Menu Successfully Installed') );

		}else{
			wp_send_json_error( array('message' => 'Error. Menu can\'t installed.' ) );
		}
	}

	public function tgmpa_load( $status ) {
		return is_admin() || current_user_can( 'install_themes' );
	}

	private function _get_plugins() {
			$instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
			$plugins = array(
				'all'      => array(), // Meaning: all plugins which still have open actions.
				'install'  => array(),
				'update'   => array(),
				'activate' => array(),
			);
			
			foreach ( $instance->plugins as $slug => $plugin ) {
				if ( $instance->is_plugin_active( $slug ) && false === $instance->does_plugin_have_update( $slug ) ) {
					// No need to display plugins if they are installed, up-to-date and active.
					continue;
				} else {
					$plugins['all'][ $slug ] = $plugin;

					if ( ! $instance->is_plugin_installed( $slug ) ) {
						$plugins['install'][ $slug ] = $plugin;
					} else {

						if ( $instance->can_plugin_activate( $slug ) ) {
							$plugins['activate'][ $slug ] = $plugin;
						}
					}
				}
			}
			return $plugins;
	}

	public function ajax_plugins() {

			$json = array();
			// send back some json we use to hit up TGM
			$plugins = $this->_get_plugins();

			$json['active'] = array(
						'url' => admin_url( $this->tgmpa_url ),
						'plugin' => array( ),
						'tgmpa-page' => $this->tgmpa_menu_slug,
						'plugin_status' => 'all',
						'_wpnonce' => wp_create_nonce( 'bulk-plugins' ),
						'action' => 'tgmpa-bulk-activate',
						'action2' => -1,
						'message' => __( 'Activating Plugin','folie' ),
			);

			$json['install'] = array(
						'url' => admin_url( $this->tgmpa_url ),
						'plugin' => array( ),
						'tgmpa-page' => $this->tgmpa_menu_slug,
						'plugin_status' => 'all',
						'_wpnonce' => wp_create_nonce( 'bulk-plugins' ),
						'action' => 'tgmpa-bulk-install',
						'action2' => -1,
						'message' => __( 'Installing Plugin','folie' ),
			);


			// what are we doing with this plugin?
			foreach ( $plugins['activate'] as $slug => $plugin ) {
				
				$json['active']['plugin'][] = $slug;
				
			}
			
			foreach ( $plugins['install'] as $slug => $plugin ) {
				
				$json['install']['plugin'][] = $slug;
				$json['active']['plugin'][] = $slug;
			}

			if ( $json && ( !empty($json['active']['plugin']) || !empty($json['install']['plugin']) ) ) {
			
				wp_send_json_success( array( 'plugins' => $json ) );
			} else {
				wp_send_json_success( array( 'message' => __( 'No plugins to install or activate', 'folie' ) ) );
			}
			exit;

	}

		/**
		 * Get configured TGMPA instance
		 *
		 * @access public
		 * @since 1.1.2
		 */
		public function get_tgmpa_instanse(){
			$this->tgmpa_instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
		}

		/**
		 * Update $tgmpa_menu_slug and $tgmpa_parent_slug from TGMPA instance
		 *
		 * @access public
		 * @since 1.1.2
		 */
		public function set_tgmpa_url(){

			$this->tgmpa_menu_slug = ( property_exists($this->tgmpa_instance, 'menu') ) ? $this->tgmpa_instance->menu : $this->tgmpa_menu_slug;
			$this->tgmpa_menu_slug = apply_filters($this->theme_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug);

			$tgmpa_parent_slug = ( property_exists($this->tgmpa_instance, 'parent_slug') && $this->tgmpa_instance->parent_slug !== 'themes.php' ) ? 'admin.php' : 'themes.php';

			$this->tgmpa_url = apply_filters($this->theme_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug.'?page='.$this->tgmpa_menu_slug);

		}
        


		function import_sidebars_widgets($file, $dir){
			$widgets = get_option("sidebars_widgets");

			unset($widgets['array_version']);

			$data = $this->read_file($file, $dir);

			if ( is_array($data['sidebars']) ) {
			
				$widgets = array_merge( (array) $widgets, (array) $data['sidebars'] );
				
				unset($widgets['wp_inactive_widgets']);
				
				$widgets = array_merge(array('wp_inactive_widgets' => array()), $widgets);
				$widgets['array_version'] = 3;
				
				update_option('sidebars_widgets', $widgets);
			}
		}

		// Read the file that will be written
		public function read_file($file, $dir){
			$content = "";
			
			$file = get_template_directory() . '/includes/codeless_demos_content/'.$dir.'/'. $file;
			
			if ( file_exists($file) ) {
				
				$content = $this->get_content($file);
				
			} else {
				$this->message = __("File doesn't exist", "folie");
			}
			
			if ($content) {

				if( ! empty( $content ) ){
					$unserialized_content = unserialize(base64_decode($content));

					if ($unserialized_content) {

						return $unserialized_content;
					}
				}else{
					return '';
				}
			}
			return false;
		}

		function get_content( $file ) {
			$content = '';
			if ( function_exists('realpath') )
				$filepath = realpath($file);
			if ( !$filepath || !@is_file($filepath) )
				return '';

			if( ini_get('allow_url_fopen') ) {
				$method = 'fopen';
			} else {
				$method = 'file_get_contents';
			}
			if ( $method == 'fopen' ) {
				$handle = fopen( $filepath, 'rb' );

				if( $handle !== false ) {
					while (!feof($handle)) {
						$content .= fread($handle, filesize( $filepath ) );
					}
					fclose( $handle );
				}
				return $content;
			} else {
				return file_get_contents($filepath);
			}
		}

}

if( is_admin() )
	new CodelessImporter();

?>