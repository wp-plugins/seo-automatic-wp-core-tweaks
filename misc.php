<?php
// Set the blog description/tagline
if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['tagline'] == "ON") {
		$tagline = $_REQUEST['tagline'];
		if (!update_option("blogdescription", $tagline)) {
			$fail .= "<li>The blog description/tagline, ".$tagline." could not be changed.</li>";
		} else {
			$success .= "<li>The blog description/tagline is: ".$tagline."</li>";
		}
	} else {
		$notused .= "<li>Change blog description/tagline.</li>";
	}
} else {
	$tagline = get_bloginfo('description');
	$options .= '<li><input name="taglinecheck" type="checkbox" value="ON" checked /> Change the blog description tagline. <input name="tagline" type="text" id="tagline" value="'.$tagline.'" /></li>';
} 

//Sets feed to summary
if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['feed_summary'] == "ON") {
		if (!update_option('rss_use_excerpt','1')) {
			$fail .= "<li>The article feed could not be set to summary. Perhaps it already is.</li>";
		} else {
			$success .= "<li>The article feed has been set to display summary.</li>";
		}
	} else {
		$notused .= "<li>Set article feed to summary.</li>";
	}
} else {
	$options .= '<li><input name="feed_summary" type="checkbox" value="ON" checked /> Set the Article feed to display summary.</li>';
}

//Empty blogroll that wp installs
if ($_REQUEST['action'] != "changecore") {
	$options .= '<li></li><li><b>Keep in mind this is meant for new installs. Checking the box below will delete all links in the blogroll category. If you have already added links, you will want to manually delete the ones that WordPress auto-installs.</b></li>';
}

if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['empty_blogroll'] == "ON") {
		if ( (!$wpdb->query("DELETE FROM $wpdb->links WHERE link_category='0'")) ) {
			$fail .= "<li>Blogroll links could not be deleted.</li>";
		} else {
			$success .= "<li>All Blogroll links have been deleted.</li>";
		}
	} else {
		$notused .= "<li>Blogroll has not been changed.</li>";
	}
} else {
	$options .= '<li><input name="empty_blogroll" type="checkbox" value="ON" /> Delete <b>all</b> links in blogroll.</li>';
} 

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li>&nbsp;</li>';
}

//Notify that wordpress version meta tag is removed
if ($_REQUEST['action'] == "changecore") {
	$success .= "<li>Meta tag for Wordpress Version number is removed. (Automatic removal when plugin is activated.)</li>";
}


?>