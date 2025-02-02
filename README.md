=== Custom QR Code Generator ===
Contributors: obedullah
Tags: QR code, generator, WordPress, shortcode, admin panel
Requires at least: 5.0
Tested up to: 6.7.1
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPL-3.0-or-later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

A WordPress plugin to generate QR codes with custom data, size, and error correction level. Includes a shortcode for frontend display and an admin panel for settings.

== Description ==

Custom QR Code Generator is a powerful WordPress plugin that allows users to generate QR codes easily. It supports different error correction levels, customizable sizes, and provides a user-friendly shortcode for displaying the QR code generator on any page or post.

**Features:**
- Generate QR codes dynamically.
- Choose error correction level (L, M, Q, H).
- Customize the QR code size.
- Fully responsive design.
- Includes an admin panel for managing settings.
- Provides a shortcode `[cqr_qr_code_form]` for easy embedding.
- Download generated QR codes as images.

GitHub Repository: [View on GitHub](https://github.com/ObedullahSajid/custom-qr-code-generator/)

== Installation ==

1. Download the plugin from the GitHub repository or WordPress Plugin Directory.
2. Upload the plugin folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.
4. Go to **QR Code Generator** in the WordPress admin menu to configure settings.
5. Use the shortcode `[cqr_qr_code_form]` in any page or post to display the QR code generator.

== Frequently Asked Questions ==

= How do I generate a QR code? =
Simply use the `[cqr_qr_code_form]` shortcode on any post or page. Users can enter the data, select the error correction level, and generate a QR code.

= Can I download the generated QR code? =
Yes, after generating the QR code, a download button will be available.

= What error correction levels are supported? =
The plugin supports:
- L (Low)
- M (Medium)
- Q (Quartile)
- H (High)

= The QR code is not generating when error correction is set to high. What should I do? =
Ensure that the size is set to at least 7 when using error correction level **H**. The plugin automatically adjusts the size for proper rendering.

= Where can I get support? =
For support, open an issue on the [GitHub repository](https://github.com/ObedullahSajid/custom-qr-code-generator/issues).


== Changelog ==

= 1.0.0 =
* Initial release.
* Added shortcode functionality.
* Added admin panel for settings.
* Support for different error correction levels.
* Fully responsive design.

== Upgrade Notice ==

= 1.0.0 =
This is the first stable release. No upgrade steps required.

== License & Credits ==

This plugin is licensed under the **GPL-3.0-or-later**.  
License details: [https://www.gnu.org/licenses/gpl-3.0.html](https://www.gnu.org/licenses/gpl-3.0.html)  

It uses the **phpqrcode** library for QR code generation.  

phpqrcode Library: [https://sourceforge.net/projects/phpqrcode/](https://sourceforge.net/projects/phpqrcode/)
