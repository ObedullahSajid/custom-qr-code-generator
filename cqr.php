<?php

/*
Plugin Name: Custom QR Code Generator
Description: A WordPress plugin to generate and customize QR codes for various use cases.
Version: 1.0
Author: obedullah
Author URI: https://profiles.wordpress.org/obedullah/
License: GPL v3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/


// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin constants
define( 'CQR_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'CQR_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

define( 'CQR_VERSION', '1.0.0' );


// QR Admin File
if ( ! class_exists( 'QRcode' ) ) {
    require_once CQR_PLUGIN_PATH . 'includes/qr-admin.php';
}

// QR Generation Functions
if ( ! class_exists( 'QRcode' ) ) {
    require_once CQR_PLUGIN_PATH . 'includes/qr-generation.php';
}

// QR Shortcodes
if ( ! class_exists( 'QRcode' ) ) {
    require_once CQR_PLUGIN_PATH . 'includes/qr-shortcodes.php';
}


// Activation Hook
function cqr_activate_plugin() {
    // Placeholder for activation tasks
}
register_activation_hook( __FILE__, 'cqr_activate_plugin' );

// Deactivation Hook
function cqr_deactivate_plugin() {
    // Placeholder for deactivation tasks
}
register_deactivation_hook( __FILE__, 'cqr_deactivate_plugin' );

// Include QR Code Library
if ( ! class_exists( 'QRcode' ) ) {
    require_once CQR_PLUGIN_PATH . 'includes/phpqrcode/qrlib.php';
}



