<?php

require_once get_template_directory(). '/plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'codeless_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function codeless_required_plugins() {

  /**
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(

    
    array(
        'name' => 'Envato Market',
        'slug' => 'envato-market',
        'source' => get_template_directory() . '/plugins/envato-market.zip',
        'required' => true,
        'version' => '1.0.0-RC2',
        'force_activation' => false,
        'force_deactivation' => false,
        'external_url' => '',
    ),


    array(
        'name' => 'Codeless Builder',
        'slug' => 'codeless-builder',
        'source' => get_template_directory() . '/plugins/codeless-builder.zip',
        'required' => true,
        'version' => '1.1.0',
        'force_activation' => false,
        'force_deactivation' => true,
        'external_url' => '',
    ),

    array(
        'name' => 'Codeless Add External Media',
        'slug' => 'codeless-add-external-media',
        'source' => get_template_directory() . '/plugins/codeless-add-external-media.zip',
        'required' => true,
        'version' => '1.0.0',
        'force_activation' => false,
        'force_deactivation' => false,
        'external_url' => '',
    ),

    array(
      'name'      => 'Contact Form 7',
      'slug'       => 'contact-form-7',
      'required'  => true
    ),

    array(
      'name'      => 'Customize Posts',
      'slug'       => 'customize-posts',
      'required'  => true,
    )
  );

  // Change this to your theme text domain, used for internationalising strings
  $theme_text_domain = 'folie'; 

  /**
   * Array of configuration settings. Amend each line as needed.
   * If you want the default strings to be available under your own theme domain,
   * leave the strings uncommented.
   * Some of the strings are added into a sprintf, so see the comments at the
   * end of each line for what each argument will be.
   */
  $config = array(
    'domain'          => $theme_text_domain,          // Text domain - likely want to be the same as your theme.
    'default_path'    => '',                          // Default absolute path to pre-packaged plugins
    
   
    'menu'            => 'install-required-plugins',  // Menu slug
    'has_notices'       => true,                        // Show admin notices or not
    'is_automatic'      => false,             // Automatically activate plugins after installation or not
    'message'       => '',              // Message to output right before the plugins table
    'strings'         => array(
      'page_title'                            => __( 'Install Required Plugins', 'folie' ),
      'menu_title'                            => __( 'Install Plugins', 'folie' ),
      'installing'                            => __( 'Installing Plugin: %s', 'folie' ), // %1$s = plugin name
      'oops'                                  => __( 'Something went wrong with the plugin API.', 'folie' ),
      'notice_can_install_required'           => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'folie' ), // %1$s = plugin name(s)
      'notice_can_install_recommended'      => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'folie' ), // %1$s = plugin name(s)
      'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'folie' ), // %1$s = plugin name(s)
      'notice_can_activate_required'          => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'folie' ), // %1$s = plugin name(s)
      'notice_can_activate_recommended'     => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'folie' ), // %1$s = plugin name(s)
      'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'folie' ), // %1$s = plugin name(s)
      'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'folie' ), // %1$s = plugin name(s)
      'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'folie' ), // %1$s = plugin name(s)
      'install_link'                  => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'folie' ),
      'activate_link'                 => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'folie' ),
      'return'                                => __( 'Return to Required Plugins Installer', 'folie' ),
      'plugin_activated'                      => __( 'Plugin activated successfully.', 'folie' ),
      'complete'                  => __( 'All plugins installed and activated successfully. %s', 'folie' ), // %1$s = dashboard link
      'nag_type'                  => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
    )
  );

  tgmpa( $plugins, $config );

}

if (class_exists('ThemeCheckMain')) {

    add_action('themecheck_checks_loaded', 'disable_checks');

}


function disable_checks() {
    global $themechecks;

    $checks_to_disable = array(
        'IncludeCheck',
        'I18NCheck',
        'AdminMenu',
        'Bad_Checks',
        'MalwareCheck',
        'Theme_Support',
        'CustomCheck',
        'EditorStyleCheck',
        'IframeCheck',
    );

    foreach($themechecks as $keyindex => $check) {
        if ($check instanceof themecheck) {
            $check_class = get_class($check);
            if (in_array($check_class, $checks_to_disable)) {
                unset($themechecks[$keyindex]);
            }
        }
    }
}

?>