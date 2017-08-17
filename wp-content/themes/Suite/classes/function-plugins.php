<?php

/**
  * Array of plugin arrays. Required keys are name and slug.
  * If the source is NOT from the .org repo, then source is also required.
*/
$plugins = array(      
                array(
			        'name'                  => 'Advanced Custom Fields', 
			        'slug'                  => 'advanced-custom-fields',
			        'version'               => '4.4.11',			        
			    ),
			    array(
			        'name'                  => 'Contact Form 7', 
			        'slug'                  => 'contact-form-7',
			        'version'               => '4.8.1',			       
			    ),
			    array(
			        'name'                  => 'Custom Post Type UI', 
			        'slug'                  => 'custom-post-type-ui',
			        'version'               => '1.5.4',			       
			    ),
			    array(
			        'name'                  => 'WooCommerce', 
			        'slug'                  => 'woocommerce',
			        'version'               => '3.1.0',			       
			    ),
			    array(
			        'name'                  => 'Advanced Custom Fields: Repeater Field', 
			        'slug'                  => 'acf-repeater',
			        'source'                => get_template_directory_uri() . '/plugins/acf-repeater.zip',
			        'version'               => '1.0.1',			       
			    ),	    

			    
            );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
$config = array(
    'default_path' => '',                      
    'menu'         => 'tgmpa-install-plugins',
    'has_notices'  => true,                    
    'dismissable'  => true,                    
    'dismiss_msg'  => '',                     
    'is_automatic' => false,                   
    'message'      => '',                      
    'strings'      => array(
					        'page_title' => __( 'Install Required Plugins', 'tgmpa' ),
					        'menu_title' => __( 'Install Plugins', 'tgmpa' ),
					        'installing' => __( 'Installing Plugin: %s', 'tgmpa' ), 
					        'oops'       => __( 'Something went wrong with the plugin API.', 'tgmpa' ),

					        'notice_can_install_required' => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), 
					        'notice_can_install_recommended'=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), 
					        'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), 
					        'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), 
					        'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), 
					        'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
					        'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
					        'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
					        'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
					        'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
					        'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
					        'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
					        'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ),
					        'nag_type'                        => 'updated' 
                        )
    );

tgmpa( $plugins, $config );