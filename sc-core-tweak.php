<?php
/*
Plugin Name: Core Tweaks WordPress Setup
Plugin URI: http://www.seoautomatic.com/plugins/wp-core-tweaks/
Description: SEO Automatic - Search Commander, Inc. automated setup saves 20 to 40 minutes of post-install time, and does what your other SEO plugin won't. All of the "little things", from changing permalink structure to deleting the Hello World post, to enabling XML, and more, are all accessible from the <a href="admin.php?page=seo-automatic-wp-core-tweaks/settings.php">admin page</a>.
Version: 3.9.2.2
Author: cyber49
Author URI: http://www.searchcommander.com/contact/
*/
if (get_option('seoauto_core_e_report') == 'on') { $err_is = 'E_ALL'; } else { $err_is = 0; }
error_reporting($err_is);

$coretweaksversion = '3.9';

register_activation_hook(__FILE__,'seocoretweaks_activate');

function seocoretweaks_activate(){
	if (!get_option('seocoretweaks_ver') || get_option('seocoretweaks_ver') > $coretweaksversion)
		update_option('seocoretweaks_ver', $coretweaksversion);
}

function sc_index() {
	include('home.php');
}

function sc_settings() {
	include('settings.php');
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
		add_menu_page('SEO Automatic by Search Commander, Inc.', 'SEO Automatic', 'activate_plugins', 'seo-automatic-options', 'sc_index',plugins_url() . '/seo-automatic-wp-core-tweaks/images/favicon.png');
		add_submenu_page('seo-automatic-options', 'Admin', 'Admin', 'activate_plugins', 'seo-automatic-options', 'sc_index');
	}
	add_submenu_page('seo-automatic-options', 'Core Tweaks', 'Core Tweaks', 'activate_plugins', dirname(__FILE__) . '/settings.php', 'sc_settings');
	add_submenu_page(null, '', ' - export/import', 'activate_plugins', dirname(__FILE__) . '/export-import.php');
}

do_action('admin_print_scripts-seo-automatic-wp-core-tweaks');
add_action('admin_menu', 'core_menu');

$current_plugins = get_option('active_plugins');

if (!get_option('seocoretweaks_ver')) {
	update_option('seocoretweaks_ver', $coretweaksversion);
	//if (!get_option('seoauto_core_page_order_use')) { update_option('seoauto_core_page_order_use', 'on'); }
	//if (!get_option('seoauto_core_page_link_use')) { update_option('seoauto_core_page_link_use', 'on'); }
	//if (!get_option('seoauto_core_post_teaser_use')) { update_option('seoauto_core_post_teaser_use', 'on'); }
	if (!get_option('seoauto_core_dd_sitemap_use')) { update_option('seoauto_core_dd_sitemap_use', 'off'); }
	if (!get_option('seoauto_core_our_profiles')) { update_option('seoauto_core_our_profiles', 'off'); }
} elseif (get_option('seocoretweaks_ver') != $coretweaksversion) {
	update_option('seocoretweaks_ver', $coretweaksversion);
	if (!get_option('seoauto_core_our_profiles')) { update_option('seoauto_core_our_profiles', 'off'); }
}

if (get_option('seoauto_core_page_order_use') != 'off') { include('page-order.php'); } //updated to version 3.0a
if (get_option('seoauto_core_page_link_use') != 'off') { include('page-link.php'); } //v1.0b
if (get_option('seoauto_core_post_teaser_use') != 'off') { include('post-teaser.php'); } //updated to version 4.1.1
if (get_option('seoauto_core_dd_sitemap_use') != 'off') { include('sitemap-generator.php'); } //updated to version 3.17
if (get_option('seoauto_core_our_profiles') != 'off' && !function_exists('ourprofiles_init')) { include('our-profiles/our-profiles.php'); } //updated to version 3.17

//stop html removal of user profile
if (get_option('seoauto_core_user_profile_html') != 'off') { remove_filter('pre_user_description', 'wp_filter_kses'); } 

//include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
//if (!is_plugin_active('wordpress-seo/wp-seo.php')) {
//	include('google-profile-field.php');
//	add_filter('user_contactmethods', 'seoauto_add_google_profile', 10, 1);
//}

include('rss-extend.php');
include('change-header.php');
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

// show footer info if turned on
function seoauto_footer() {
	if (get_option('seo_core_footer_copy') == 'on' || get_option('seo_core_footer_login') == 'on' || get_option('seo_core_footer_sitemap') == 'on') {
		echo '<span class="scauto-footer"><small>';
	}
	if (get_option('seo_core_footer_copy') == 'on') {
		echo '&#169; '.date("Y");
	}
	if (get_option('seo_core_footer_sitemap') == 'on') {
		echo ' - <a href="'.get_permalink(get_option('seoauto_core_smid')).'">Sitemap</a>';
	}
	if (get_option('seo_core_footer_privacy') == 'on') {
		echo ' - <a href="'.get_permalink(get_option('seoauto_core_ppid')).'" rel="nofollow">Privacy Policy</a>';
	}

	if (get_option('seo_core_footer_copy') == 'on' || get_option('seo_core_footer_login') == 'on' || get_option('seo_core_footer_sitemap') == 'on') {
		echo '</small></span>';
	}
	if (get_option('seo_core_footer_login') == 'on') {
		echo '<div style="clear: top;" class="scauto-footer-login"><small><a href="'.wp_login_url(get_permalink()).'" title="Login">Admin</a>';
		if ( is_user_logged_in() ) { 
			echo ' - <a href="'. get_edit_post_link().'">Edit</a>';
		}
		echo '</small></div>';
	}
}

add_action('wp_footer', 'seoauto_footer');
?>