<?php
/**
 * Plugin Name: Disable Features
 * Plugin URI: https://github.com/newsuk/nuk-hyperlinks-update/
 * Description: It will disable all unnecessary WordPress features and speed up your website in an elegant way.
 * Author: Prem Tiwari
 * Author URI: https://premtiwari.in
 * Version: 1.0
 * Text Domain: disable-features
 *
 */

 declare( strict_types = 1 );

 use DisableFeatures\Plugin;

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
