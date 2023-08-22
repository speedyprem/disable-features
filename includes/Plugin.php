<?php declare( strict_types = 1 );

namespace DisableFeatures;
use DisableFeatures\AdminSettings;
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

		// Remove WordPress Version Number.
		if ( ! empty( $option_values['hwvnswitch_value'] ) ) {
			add_filter('the_generator', '__return_empty_string');
		}

		// Disable Widget Blocks (use Classic Widgets).
		if ( ! empty( $option_values['dwbswitch_value'] ) ) {
			add_filter( 'use_widgets_block_editor', '__return_false' );
		}

		// Disable WordPress Admin Bar for all users.
		if ( ! empty( $option_values['dwabswitch_value'] ) ) {
			add_filter( 'show_admin_bar', '__return_false' );
		}

		// Remove Dashboard Welcome Panel.
		if ( ! empty( $option_values['rdwpswitch_value'] ) ) {
			add_action(
				'admin_init',
				function () {
					remove_action( 'welcome_panel', 'wp_welcome_panel' );
				}
			);
		}

		
		

	}

}
