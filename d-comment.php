<?php
//Delete default comment

if ($_REQUEST['action'] == "changecore") {
	$post_id = 1;
	$post = & get_post($post_id);
	if ($_REQUEST['d_comment'] == "ON") {
		if ( !wp_delete_comment($post_id) ) {
			$fail .= "<li>Default comment could not be deleted. Perhaps it was already removed or did not exist in the initial wordpress install?</li>";
		} else {
			$success .= "<li>Default comment deleted.</li>";
		}
	} else {
		$notused .= "<li>Default comment removal.</li>";
	}
} else {
	$options .= "<li><input type=\"checkbox\" name=\"d_comment\" value=\"ON\"> Delete default comment.<br /><small><b>(Cannot be undone.)</b></small></li>";
}
?>