<?php
// Add the sitemap page for ddsitemap generator

if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['add_sitemap'] == "ON") {
	$check_page = $wpdb->get_row("SELECT * FROM `".$wpdb->posts."` WHERE `post_content` LIKE '<!-- ddsitemapgen -->' LIMIT 1",ARRAY_A);

	if ($check_page == '') {
	$post_date =date("Y-m-d H:i:s");
	$post_date_gmt =gmdate("Y-m-d H:i:s");

	  if($wp_version >= 2.1) {
		$sql ="INSERT INTO ".$wpdb->posts."
		(post_author, post_date, post_date_gmt, post_content, post_content_filtered, post_title, post_excerpt,  post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_parent, menu_order, post_type)
		VALUES
		('1', '$post_date', '$post_date_gmt', '<!-- ddsitemapgen -->', '', 'Site-Map', '', 'publish', 'closed', 'closed', '', 'site-map', '', '', '$post_date', '$post_date_gmt', '$post_parent', '0', 'page')";
			} else {      
		$sql ="INSERT INTO ".$wpdb->posts."
		(post_author, post_date, post_date_gmt, post_content, post_content_filtered, post_title, post_excerpt,  post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_parent, menu_order)
		VALUES
		('1', '$post_date', '$post_date_gmt', '<!-- ddsitemapgen -->', '', 'Site-Map', '', 'static', 'closed', 'closed', '', 'site-map', '', '', '$post_date', '$post_date_gmt', '$post_parent', '0')";
			}

	  $wpdb->query($sql);
	  $post_id = $wpdb->insert_id;
	  $wpdb->query("UPDATE $wpdb->posts SET guid = '" . get_permalink($post_id) . "' WHERE ID = '$post_id'");

		$excludedPages = get_option('gdm_excluded_pages');
		$excludedPages[] = $post_id;
		update_option('gdm_excluded_pages', $excludedPages);

		wp_cache_delete('all_page_ids', 'pages');
		$wp_rewrite->flush_rules();
		$success .= "<li>The sitemap was created.</li>";
		} else {
			$fail .= "<li>The sitemap was not created. Perhaps it already exists.</li>";
		}
	} else {
		$notused .= "<li>Create sitemap.</li>";
	}
} else {
	$options .= '<li><input name="add_sitemap" type="checkbox" value="ON" checked /> Add the SiteMap page for DDSiteMap Generator.</li>';
} 
?>