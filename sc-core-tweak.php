<?php
/*
Plugin Name: Search Commander WP_Core_Tweaks Plugin
Plugin URI: http://www.seoautomatic.com/plugins/wp-core-tweaks/
Description: Conceived by Scott Hendison and programmed by Heather Barger for Search Commander, Inc. to automate proper WP setup. It also extends the built-in features of WordPress menu management, an and combines several common plugins into one.  See <a href="/wp-admin/options-general.php?page=sc-wp-core-tweaks/settings.php">Settings > Core Tweaks</a> for options.
Version: 0.9b
*/
function core_menu() {
add_options_page('Core Tweaks', 'Core Tweaks', 10, dirname(__FILE__) . '/settings.php');
}

add_action('admin_menu', 'core_menu');

$current_plugins = get_option('active_plugins');
if (in_array('page_link_manager.php', $current_plugins)) {
	deactivate_plugins('page_link_manager.php');
}
if (in_array('my-page-order/mypageorder.php', $current_plugins)) {
	deactivate_plugins('my-page-order/mypageorder.php');
}
if (in_array('post-teaser.php', $current_plugins)) {
	deactivate_plugins('post-teaser.php.php');
}


include('page-order.php');
include('page-link.php');
include('post-teaser.php');

include('rss-extend.php');

include('change-header.php');

include('better-blogroll.php');

// HOOK EM UP
add_action('edit_page_form', 'gdm_page_links_page_edit');
add_action('widgets_init', 'widget_betterblogroll_init');
add_filter('single_post_title', 'changethetitle');
add_action('init', 'wp_tabbed_rss_init', 1);

//remove_action('wp_head', 'rsd_link');
//remove_action('wp_head', 'wlwmanifest_link');

function remove_generator() {
	return '';
}

add_filter('the_generator', 'remove_generator');
?>