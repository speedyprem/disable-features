<?php
/**
 * Plugin Name: Disable Features
 * Plugin URI:  https://github.com/newsuk/nuk-hyperlinks-update/
 * Description: It will disable all unnecessary WordPress features and speed up your website in an elegant way.
 * Version:     1.0
 * Author:      Prem Tiwari
 * Author URI:  https://premtiwari.in
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: disable-features
 */

 declare( strict_types = 1 );

 use DWF\Plugin;

defined( 'ABSPATH' ) || die;

/**
 * Initialize the plugin.
 *
 * @return void
 */
if ( ! class_exists( Plugin::class ) && is_readable( __DIR__ . '/vendor/autoload.php' ) ) {
    include __DIR__ . '/vendor/autoload.php';
}

$obj = new Plugin();

$obj->configuration_change();
