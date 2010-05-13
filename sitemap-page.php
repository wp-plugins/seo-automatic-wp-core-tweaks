<?php
// Add the sitemap page for ddsitemap generator
	global $wpdb;

if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['add_sitemap'] == "ON") {
	$check_page = $wpdb->get_row("SELECT * FROM `".$wpdb->posts."` WHERE `post_content` LIKE '<!-- ddsitemapgen -->' LIMIT 1",ARRAY_A);
	if ($check_page['post_content'] == '') {
//	$post_date =date("Y-m-d H:i:s");
//	$post_date_gmt =gmdate("Y-m-d H:i:s");

$info = array(
'post_status' => 'publish', 
'post_type' => 'page',
'post_author' => 1,
'ping_status' => get_option('default_ping_status'), 
'post_parent' => 0,
'menu_order' => 0,
'to_ping' =>  '',
'pinged' => '',
'post_password' => '',
'guid' => '',
'post_content_filtered' => '',
'post_excerpt' => '',
'import_id' => 0,
'post_name' => 'site-map',
'post_title' => 'Site-Map',
'post_content' => '<!-- ddsitemapgen -->');
wp_insert_post($info);

	  $wpdb->query($sql);
	  $post_id = $wpdb->insert_id;
	  $wpdb->query("UPDATE $wpdb->posts SET guid = '" . get_permalink($post_id) . "' WHERE ID = '$post_id'");

		$excludedPages = get_option('gdm_excluded_pages');
		$excludedPages[] = $post_id;
		update_option('gdm_excluded_pages', $excludedPages);
		update_option('seoauto_core_smid', $post_id);
		wp_cache_delete('all_page_ids', 'pages');
		//$wp_rewrite->flush_rules();
		$success .= "<li>The sitemap was created.</li>";
		} else {
			$fail .= "<li>The sitemap was not created. Perhaps it already exists.</li>";
		}
	} else {
		$notused .= "<li>Create sitemap.</li>";
	}
} else {
	$options .= '<li><input name="add_sitemap" type="checkbox" value="ON" checked /> Add the SiteMap page for DDSiteMap Generator.<br /><small><b>(Not an XML sitemap)</b></small></li>';
} 
?>