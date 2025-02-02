<?php
// Ensure this file is being included by WordPress and not accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Add a new menu item to the WordPress Admin menu
function cqr_add_admin_menu() {
    add_menu_page(
        'Custom QR Code Generator', // Page title
        'QR Code Generator',        // Menu title
        'manage_options',           // Capability needed to access this menu
        'custom-qr-code-generator', // Menu slug
        'cqr_admin_page',           // Callback function to display the page content
        'dashicons-admin-tools',    // Icon to display in the menu
        30                          // Position of the menu item
    );
}
add_action( 'admin_menu', 'cqr_add_admin_menu' );

// Callback function to display the admin page content
function cqr_admin_page() {
    // Check if the user has the necessary permissions
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'You do not have sufficient permissions to access this page.' );
    }

    // Display plugin settings page content
    ?>
    <div class="wrap">
        <h1>Custom QR Code Generator</h1>
        <p>Welcome to the Custom QR Code Generator plugin settings page. From here, you can configure the QR code settings.</p>

        <form method="post" action="options.php">
            <?php
            // Output settings fields
            settings_fields( 'cqr_plugin_settings' );
            do_settings_sections( 'custom-qr-code-generator' );
            ?>

            <h2>QR Code Settings</h2>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><label for="cqr_ecc">Default Error Correction Level</label></th>
                    <td>
                        <select name="cqr_ecc" id="cqr_ecc">
                            <option value="L" <?php selected( get_option( 'cqr_ecc' ), 'L' ); ?>>L - Low</option>
                            <option value="M" <?php selected( get_option( 'cqr_ecc' ), 'M' ); ?>>M - Medium</option>
                            <option value="Q" <?php selected( get_option( 'cqr_ecc' ), 'Q' ); ?>>Q - Quartile</option>
                            <option value="H" <?php selected( get_option( 'cqr_ecc' ), 'H' ); ?>>H - High</option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><label for="cqr_size">Default QR Code Size</label></th>
                    <td><input type="number" name="cqr_size" id="cqr_size" value="<?php echo esc_attr( get_option( 'cqr_size', 5 ) ); ?>" min="1" max="10" /></td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Register settings
function cqr_register_settings() {
    // Register settings so they can be saved
    register_setting( 'cqr_plugin_settings', 'cqr_ecc' );
    register_setting( 'cqr_plugin_settings', 'cqr_size' );
}
add_action( 'admin_init', 'cqr_register_settings' );
?>
