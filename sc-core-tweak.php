<?php
/*
Plugin Name: SEO Automatic WP Core Tweaks
Plugin URI: http://www.seoautomatic.com/plugins/wp-core-tweaks/
Description: Conceived by Scott Hendison and programmed by Heather Barger for Search Commander, Inc. to automate proper WP setup. It also extends the built-in features of WordPress menu management, an and combines several common plugins into one.  See <a href="admin.php?page=seo-automatic-wp-core-tweaks/settings.php">Settings > Core Tweaks</a> for options.
Version: 2.3
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
//			echo "Unknown error type: [$errno] $errstr<br />\n";
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

function sc_help() {
	include('help.php');
}

function core_menu() {
	global $menu;
	foreach ($menu as $i) {
		$key = array_search('toplevel_page_seo-automatic-options', $i);
		if ($key != '') {
			$menu_added = true;
		}
	}
	if ($menu_added) {
	} else {
		add_menu_page('SEO Automatic by Search Commander, Inc.', 'SEO Automatic', 'activate_plugins', 'seo-automatic-options', 'sc_index','http://www.seoautomatic.com/favicon.ico');
		add_submenu_page('seo-automatic-options', 'Admin', 'Admin', 'activate_plugins', 'seo-automatic-options', 'sc_index');
	}
	add_submenu_page('seo-automatic-options', 'Core Tweaks', 'Core Tweaks', 'activate_plugins', dirname(__FILE__) . '/settings.php', 'sc_settings');
	add_submenu_page('seo-automatic-options', 'Core Tweaks Help', 'Core Tweaks Help', 'activate_plugins', dirname(__FILE__) . '/help.php', 'sc_help');
}



do_action('admin_print_scripts-seo-automatic-wp-core-tweaks');


add_action('admin_menu', 'core_menu');

$current_plugins = get_option('active_plugins');

include('page-order.php'); //updated to version 2.8.3
include('page-link.php'); //v1.0b
include('post-teaser.php'); //updated to version 4.0.1
include('rss-extend.php');
include('change-header.php');
include('sitemap-generator.php'); //updated to version 3.17
include('meta_tags.php');

// HOOK EM UP

add_filter('single_post_title', 'changethetitle');
add_action('init', 'wp_tabbed_rss_init', 1);

//remove_action('wp_head', 'rsd_link');
//remove_action('wp_head', 'wlwmanifest_link');

function remove_generator() {
	return '';
}

add_filter('the_generator', 'remove_generator');
//
?>