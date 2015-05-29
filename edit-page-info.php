<?php
if ($_REQUEST['action'] != "changecore") {
	$options .= "<li></li><li><small><b style=\"color: #009900;\">If you're using this installation of WordPress as an entire site, and not just a blog, then you need to define which \"page\" to use as the home page, and which page WP should use to display your blog posts. Change the name of the existing default page, and create your posts page here.</b></small></li>";
}

//Set install about page to Home
if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['page_2'] == "ON") {
		if (!$wpdb->query("UPDATE $wpdb->posts SET post_title = '".$_REQUEST['about_page']."' WHERE ID = '2'")) {
			$fail .= "<li>Default page name couldn't be changed. Perhaps it is already the name you want.</li>";
		} else {
			if (!$wpdb->query("UPDATE $wpdb->posts SET post_name = '".strtolower($_REQUEST['about_page'])."' WHERE ID = '2'")) { 
				$fail .= "<li>Page slug was not changed.</li>";
			}
			$success .= "<li>Default page name has been set to ".$_REQUEST['about_page']." and the slug set to ".strtolower($_REQUEST['about_page']).".</li>";
		}
	} else {
		$notused .= "<li>Change default page name.</li>";
	}
} else {
	$options .= '<li><input name="page_2" type="checkbox" value="ON" /> Change the default page name from "Sample Page" to: <input name="about_page" size="15" type="textbox" value="Home" /></li>';
} 

//Sets frontpage and turns on the static pages
if ($_REQUEST['action'] == "changecore") {
	 if (($_REQUEST['set_home'] == "ON") && ($_REQUEST['about_page'] != '')) {
		update_option('show_on_front','page');
		$find_page = $_REQUEST['about_page'];
		$find_page_id = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_title = '".$find_page."'");
		if ( (!update_option('page_on_front',$find_page_id->ID)) ) {
			$fail .= "<li>The front page could not be set to ".$find_page.". It may already be set.</li>";
		} else {
			$success .= "<li>The front page has been set to ".$find_page.".</li>";
		}
	} else {
		$notused .= "<li>Set front page.</li>";
	}
} else {
	$options .= '<li><input name="set_home" type="checkbox" value="ON" /> Set the default page above as the front page.</li>';
} 

//Remove default post
include('d-post.php');

//Creates the blog posts page and set the static show post page to it. Also turns on static pages in case it's not on.
if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['news_2'] == "ON") {
		update_option('show_on_front','page');
		$posts_page = $_REQUEST['posts_page'];
		$add_page = array();
		$add_page['post_title'] = $posts_page;
		$add_page['post_status'] = 'publish';
		$add_page['post_author'] = 1;
		$add_page['post_category'] = array(0);
		$add_page['post_name'] = strtolower($posts_page);
		$add_page['post_type'] = 'page';

		if (!wp_insert_post($add_page)) {
			$fail .= "<li>The ".$posts_page." posts page could not be created.</li>";
		} else {
			$find_new_page = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_title = '".$posts_page."'");
			if (!update_option('page_for_posts',$find_new_page->ID)) {
				$fail .= "<li>The posts page could not be set to ".$posts_page." for displaying posts.</li>";
			} else {
				$success .= "<li>".$posts_page." has been created and set as the posts page.</li>";
			}
		}
	} else {
	$notused .= "<li>Add or change posts page.</li>";
	}
} else {
	$options .= '<li><input name="news_2" type="checkbox" value="ON" /> Create the page to designate for displaying your blog posts, and name it: <input name="posts_page" type="textbox" value="Company News" /></li>';
}
?>