<?php
//Set install about page to Home
if (($_REQUEST['action'] == "changecore") && ($_REQUEST['page_2'] == "ON")) {
	if (!$wpdb->query("UPDATE $wpdb->posts SET post_title = '".$_REQUEST['about_page']."' WHERE ID = '2'")) {
		echo "<p>Default page name couldn't be changed. Perhaps it is already the name you want.</p>";
	} else {
		if (!$wpdb->query("UPDATE $wpdb->posts SET post_name = '".strtolower($_REQUEST['about_page'])."' WHERE ID = '2'")) { 
			echo "<p>Slug was not changed.</p>";
		}
		echo "<p>Default page name has been set to ".$_REQUEST['about_page']." and the slug set to ".strtolower($_REQUEST['about_page']).".</p>";
	}
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['page_2'] != "ON")) {
	echo "<p>Default page name has not been changed.</p>";
} else {
?>
<p><input name="page_2" type="checkbox" value="ON" checked /> <?php _e('Change the default page name to: ') ?> <input name="about_page" type="textbox" value="Home" />&nbsp;
<?php } 

//Sets frontpage and turns on the static pages
if (($_REQUEST['action'] == "changecore") && ($_REQUEST['set_home'] == "ON") && ($_REQUEST['about_page'] != '')) {
	update_option('show_on_front','page');
	$find_page = $_REQUEST['about_page'];
	$find_page_id = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_title = '".$find_page."'");
	if ( (!update_option('page_on_front',$find_page_id->ID)) ) {
		echo "<p>The front page could not be set to ".$find_page.". It may already be set.</p>";
	} else {
		echo "<p>The front page has been set to ".$find_page.".</p>";
	}
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['set_home'] != "ON")) {
	echo "<p>Front page has not been changed.</p>";
} else {
?>
<input name="set_home" type="checkbox" value="ON" checked /> <?php _e('And set as the front page. ') ?></p>
<?php } 

//Creates the blog posts page and set the static show post page to it. Also turns on static pages in case it's not on.
if (($_REQUEST['action'] == "changecore") && ($_REQUEST['news_2'] == "ON")) {
	update_option('show_on_front','page');
	$posts_page = $_REQUEST['posts_page'];
	$add_page = array();
	$add_page['post_title'] = $posts_page;
	$add_page['post_status'] = 'publish';
	$add_page['post_author'] = 1;
	$add_page['post_category'] = array(0);
	$add_page['post_name'] = strtolower($posts_page);
	$add_page['post_type'] = 'page';

	if ( (!wp_insert_post($add_page)) ) {
		echo "<p>The ".$posts_page." posts page could not be created.</p>";
	} else {
		$find_new_page = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_title = '".$posts_page."'");
		if ( (!update_option('page_for_posts',$find_new_page->ID)) ) {
			echo "<p>The posts page could not be set to ".$posts_page." for displaying posts.</p>";
		} else {
			echo "<p>".$posts_page." has been created and set as the posts page.</p>";
		}
	}
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['news_2'] != "ON")) {
	echo "<p>Posts page has not been changed or added.</p>";
} else {
?>
<p><input name="news_2" type="checkbox" value="ON" checked /> <?php _e('Add and set the page to display posts to: ') ?> <input name="posts_page" type="textbox" value="Company News" /></p>
<?php } ?>