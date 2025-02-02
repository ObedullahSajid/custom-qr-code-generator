<?php
// Ensure this file is being included by WordPress and not accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// QR Code Generation Functionality
function cqr_generate_qr_code( $data, $output_file = null, $ecc = 'L', $size = 5 ) {
    if ( empty( $data ) ) {
        return false;
    }

    // Adjust the size for high error correction level
    if ( $ecc === 'H' && $size < 7 ) {
        $size = 7; // Set minimum size for 'H' error correction to ensure proper rendering
    }

    // Generate the QR Code
    if ( $output_file ) {
        QRcode::png( $data, $output_file, $ecc, $size );
    } else {
        ob_start();
        QRcode::png( $data, null, $ecc, $size );
        $qr_image = ob_get_clean();
        return 'data:image/png;base64,' . base64_encode( $qr_image );
    }

    return true;
}
?>