<?php
/**
 * Plugin Name: Corymbus Forms
 * Plugin URI: https://corymb.us/en/wordpress-plugin
 * Description: Easily embed Corymbus web pages and forms into WordPress
 * Version: 1.1.3
 * Author: Corymbus SAS
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: corymbus-forms
 * Domain Path: /languages
 */

if (!function_exists('corymbus_forms_shortcode')) {
    function corymbus_forms_shortcode($atts=array(), $content=null) {
        $atts = array_change_key_case( (array) $atts, CASE_LOWER );
        $pageAttr = "page";
        if (!array_key_exists($pageAttr, $atts)) {
            return sprintf('<span style="color: red">'.__('[Corymbus Forms: The <code>%s</code> attribute must be provided]', 'corymbus-forms').'</span>', $pageAttr);
        }
        $path = $atts[$pageAttr]; 
        if (!preg_match("/.+\/.+/", $path)) {
            return sprintf('<span style="color: red">'.__('[Corymbus Forms: The <code>%s</code> attribute should have a <code>xxxxxx/slug</code> format]', 'corymbus-forms').'</span>', $pageAttr);

        }
        $url = esc_url('https://srv.corymb.us/pages/'.$path);
        $contactId = "";
        if (array_key_exists('contact.id', $_GET)) {
            $contactId = $_GET["contact.id"];
        }
        else if (array_key_exists('contact_id', $_GET)) { // handle the replacement of contact.id with contact_id
            // https://wordpress.stackexchange.com/questions/274569/how-to-get-url-of-current-page-displayed/299898#299898?newreg=8254c6b4c396441991a6449bde0d14aa
            $contactId = $_GET["contact_id"];
        }
        if ($contactId) {
            $url = esc_url(add_query_arg('contact.id', $contactId, $url));
        }
        $ret = '<iframe src="'.$url.'" loading="lazy" ';
        foreach(array_keys($atts) as $key) {
            if ($key != $pageAttr) {
                $val = esc_attr($atts[$key]);
                $ret = $ret . ' ' . $key . '="' . $val . '"';
            }
        }
        $ret .= '></iframe>';
        return $ret;
    }
}

/**
 * Central location to create all shortcodes.
 */
if (!function_exists('corymbus_forms_shortcodes_init')) {
    function corymbus_forms_shortcodes_init() {
        add_shortcode('corymbus-forms', 'corymbus_forms_shortcode');
    }
    add_action('init', 'corymbus_forms_shortcodes_init');
}

// i18n
// to create the POT file:
// - docker exec -it xx bash
// - cd .../corymbus-forms
// - wp i18n make-pot . languages/corymbus-forms.pot  --allow-root --include=corymbus-forms.php
if (!function_exists('corymbus_forms_load_textdomain')) {
	function corymbus_forms_load_textdomain() {
		load_plugin_textdomain( 'corymbus-forms', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	}
	add_action( 'init', 'corymbus_forms_load_textdomain' );
}

