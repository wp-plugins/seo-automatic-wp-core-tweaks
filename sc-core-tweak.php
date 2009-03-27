<?php
/*
Plugin Name: Search Commander WP_Core_Tweaks Plugin
Plugin URI: http://www.seoautomatic.com/plugins/wp-core-tweaks/
Description: Conceived by Scott Hendison and programmed by Heather Barger for Search Commander, Inc. to automate proper WP setup. It also extends the built-in features of WordPress menu management, an and combines several common plugins into one.  See <a href="/wp-admin/options-general.php?page=sc-wp-core-tweaks/settings.php">Settings > Core Tweaks</a> for options.
Version: 1.1
*/
//error_reporting(E_ALL);
//if(!function_exists('myErrorHandler')){
//function myErrorHandler($errno, $errstr, $errfile, $errline) {
//	switch ($errno) {
//	case E_USER_ERROR:
//		echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
//		echo "  Fatal error on line $errline in file $errfile";
//		echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
//		echo "Aborting...<br />\n";
//		exit(1);
//		break;
//
//	case E_USER_WARNING:
//		echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
//		break;
//
//	case E_USER_NOTICE:
//		echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
//		break;
//
//	default:
//		if (substr_count($errstr, "ob_end_") > 0) {
//		} elseif (substr_count($errstr, "Undefined index") > 0) {
//		} elseif (substr_count($errstr, "Undefined offset") > 0) {
//		} elseif (substr_count($errstr, "Use of undefined constant") > 0) {
//		} else {
//			//echo "Unknown error type: [$errno] $errstr<br />\n";
//		}
//    }
//
//    /* Don't execute PHP internal error handler */
//    return true;
//}
//}
//$old_error_handler = set_error_handler("myErrorHandler");

function sc_index() {
	include('home.php');
}

function sc_settings() {
	include('settings.php');
}

function core_menu() {
	if (function_exists('autoseo_add_pages')){
		add_submenu_page('seo-automatic-options', 'Core Tweaks', 'Core Tweaks', 'activate_plugins', dirname(__FILE__) . '/settings.php', 'sc_settings');	}
	else{
		add_menu_page('SEO Automatic by Search Commander, Inc.', 'SEO Automatic', 'activate_plugins', dirname(__FILE__) . '/index.php', 'sc_index','http://www.seoautomatic.com/favicon.ico');
		add_submenu_page(dirname(__FILE__) . '/index.php', 'Core Tweaks', 'Core Tweaks', 'activate_plugins', dirname(__FILE__) . '/settings.php', 'sc_settings');
	}
}

add_action('admin_menu', 'core_menu');

$current_plugins = get_option('active_plugins');
if (in_array('page_link_manager.php', $current_plugins)) {
	deactivate_plugins('page_link_manager.php');
}
if (in_array('page-link-manager/page-link-manager.php', $current_plugins)) {
	deactivate_plugins('page-link-manager/page-link-manager.php');
}
if (in_array('my-page-order/mypageorder.php', $current_plugins)) {
	deactivate_plugins('my-page-order/mypageorder.php');
}
if (in_array('post-teaser.php', $current_plugins)) {
	deactivate_plugins('post-teaser.php.php');
}
if (in_array('sitemap-generator/sitemap-generator.php', $current_plugins)) {
	deactivate_plugins('sitemap-generator/sitemap-generator.php');
}

include('files/page-order.php');
include('files/page-link.php');
include('files/post-teaser.php');
include('files/rss-extend.php');
include('files/change-header.php');
include('files/better-blogroll.php');
include('files/canonical.php');
//include('files/sitemap-generator.php');
include('files/meta_tags.php');

// HOOK EM UP
//add_action('edit_page_form', 'gdm_page_links_page_edit');
add_action('widgets_init', 'widget_betterblogroll_init');
add_filter('single_post_title', 'changethetitle');
add_action('init', 'wp_tabbed_rss_init', 1);
add_action('wp_head', 'sc_core_metas');

//remove_action('wp_head', 'rsd_link');
//remove_action('wp_head', 'wlwmanifest_link');

function remove_generator() {
	return '';
}

add_filter('the_generator', 'remove_generator');
?>