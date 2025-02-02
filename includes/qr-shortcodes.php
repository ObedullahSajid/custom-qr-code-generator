<?php
// Ensure this file is being included by WordPress and not accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Front-End Shortcode for QR Code Form
add_shortcode( 'cqr_qr_code_form', function( $atts ) {
    ob_start();
    
    // Handle form submission
    $qr_image = '';
    if ( isset( $_POST['cqr_generate'] ) ) {
        $data = sanitize_text_field( $_POST['cqr_data'] );
        $size = intval( $_POST['cqr_size'] );
        $ecc  = sanitize_text_field( $_POST['cqr_ecc'] );

        if ( $data ) {
            $qr_image = cqr_generate_qr_code( $data, null, $ecc, $size );
        }
    }

    // Handle reset form
    if ( isset( $_POST['cqr_reset'] ) ) {
        $qr_image = ''; // Reset the QR image
    }

    ?>
    <div class="cqr-container">
        <div class="cqr-form-column">
           
            <form method="post" action="">
                <table>
                    <tr>
                        <th><label for="cqr_data">Data to Encode:</label></th>
                        <td><input name="cqr_data" id="cqr_data" type="text" class="regular-text" required></td>
                    </tr>
                    <tr>
                        <th><label for="cqr_size">Size:</label></th>
                        <td><input name="cqr_size" id="cqr_size" type="number" value="5" min="1" max="10"></td>
                    </tr>
                    <tr>
                        <th><label for="cqr_ecc">Error Correction Level:</label></th>
                        <td>
                            <select name="cqr_ecc" id="cqr_ecc">
                                <option value="L">L - Low</option>
                                <option value="M">M - Medium</option>
                                <option value="Q">Q - Quartile</option>
                                <option value="H">H - High</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <p class="submit">
                    <input type="submit" name="cqr_generate" id="cqr_generate" class="button button-primary" value="Generate QR Code">
                </p>
            </form>
            
            <!-- Reset Button (Hidden until QR code is generated) -->
            <?php if ( $qr_image ): ?>
                <form method="post" action="">
                    <p>
                        <input type="submit" name="cqr_reset" class="button button-secondary" value="Reset QR Code">
                    </p>
                </form>
            <?php endif; ?>
        </div>
        
        <div class="cqr-image-column">
            <?php if ( $qr_image ): ?>
                <h2>Your QR Code</h2>
                <div>
                    <img src="<?php echo esc_attr( $qr_image ); ?>" alt="QR Code" class="qr-code-image">
                    <p>
                        <a href="<?php echo esc_attr( $qr_image ); ?>" download="generated-qr-code.png" class="download-button">Download QR Code</a>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <style>
        .cqr-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .cqr-form-column, .cqr-image-column {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cqr-form-column h2, .cqr-image-column h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .regular-text, select, input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .submit input[type="submit"] {
            background-color: #0073aa;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit input[type="submit"]:hover {
            background-color: #005f8f;
        }

        .qr-code-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
        }

        .download-button {
            background-color: #0073aa;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .download-button:hover {
            background-color: #005f8f;
        }

        table {
            width: 100%;
        }

        th {
            width: 30%;
            text-align: left;
        }

        td {
            width: 70%;
        }

        .button-secondary {
            background-color: #ccc;
            color: #333;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
        }

        .button-secondary:hover {
            background-color: #999;
        }

        @media (min-width: 768px) {
            .cqr-container {
                flex-direction: row;
                gap: 30px;
            }

            .cqr-form-column, .cqr-image-column {
                flex: 1;
            }
        }
    </style>
    <?php
    return ob_get_clean();
});
?>
