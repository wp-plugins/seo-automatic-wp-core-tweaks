<?php
// Set the blog description/tagline
if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['taglinecheck'] == "ON") {
		$tagline = $_REQUEST['tagline'];
		$currenttagline = get_bloginfo('description');
		if (!update_option('blogdescription', $tagline)) {
			if ($tagline == $currenttagline) {
				if ($tagline == '') { $tagline = '(blank)'; }
				$fail .= "<li>The blog description/tagline is already set to: ".$tagline."</li>";
			} else {
				$fail .= "<li>The blog description/tagline, ".$tagline." could not be changed.</li>";
			}
		} else {
			$success .= "<li>The blog description/tagline is: ".$tagline."</li>";
		}
	} else {
		$notused .= "<li>Change blog description/tagline.</li>";
	}
} else {
	$tagline = get_bloginfo('description');
	$options .= '<li><input name="taglinecheck" type="checkbox" value="ON" /> Change the blog description tagline. <input name="tagline" type="text" id="tagline" value="'.$tagline.'" /></li>';
} 

if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['empty_blogroll'] == "ON") {
		if ( (!$wpdb->query("DELETE FROM $wpdb->links WHERE link_id != ''")) ) {
			$fail .= "<li>Blogroll links could not be deleted.</li>";
		} else {
			$success .= "<li>All Blogroll links have been deleted.</li>";
		}
	} else {
		$notused .= "<li>Blogroll has not been changed.</li>";
	}
} else {
	$options .= '<li><input name="empty_blogroll" type="checkbox" value="ON" /> Delete <b>all</b> links in blogroll. <b>(Cannot be undone.)</b></li>';
} 

//Notify that wordpress version meta tag is removed
if ($_REQUEST['action'] == "changecore") {
	$success .= "<li>Meta tag for Wordpress Version number is removed. (Automatic removal when plugin is activated.)</li>";
}


?>