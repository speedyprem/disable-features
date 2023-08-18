<?php declare( strict_types = 1 );

namespace DisableWordpressFeatures;
use DisableWordpressFeatures\AdminSettings;
/**
 * Main plugin class.
 */
class Plugin {

    public function __construct()
    {
        add_action( 'admin_menu',  array(new AdminSettings, 'Admin_menu_dwnSettings') );
        add_action( 'admin_menu',  array(new AdminSettings, 'dwf_admin_style') );
    }

}
