<?php declare( strict_types = 1 );

namespace DisableWordpressFeatures;
use DisableWordpressFeatures\AdminSettings;
/**
 * Main plugin class.
 */
class Plugin {

    public function __construct()
    {
        add_action( 'admin_menu',  [new AdminSettings, 'Admin_menu_dwnSettings'] );
        add_action( 'admin_menu',  [new AdminSettings, 'dwf_admin_style'] );
        
    }

    // Funtion to diasblae the WordPress features.
    public function configuration_change() {

        $option_values = get_option( 'dwf_settings' ); 
        // Disable XML-RPC
        if ( ! empty( $option_values['dxmlrpcswitch_value'] ) ) {
            add_filter( 'xmlrpc_enabled', '__return_false' );
        }

        // Hide admin 'Screen Options' tab.
        if ( ! empty( $option_values['hsotswitch_value'] ) ) {
            add_filter('screen_options_show_screen', '__return_false');
        }

    }

}
