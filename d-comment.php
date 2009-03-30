<?php
//Delete default comment

$cat_set4 = "<input type=\"checkbox\" name=\"d_comment\" value=\"ON\" checked> Delete default comment.";

	$post_id = 1;
	$post = & get_post($post_id);

if (($_REQUEST['action'] == "changecore") && ($_REQUEST['d_comment'] == "ON")) {
	if ( !wp_delete_comment($post_id) ) {
		$cat_set4 = "Default comment could not be deleted. Perhaps it was already removed?";
	} else {
		$cat_set4 = "Default comment deleted.";
	}
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['helloworldpost'] != "ON")) {
	$cat_set4 = "Default comment was not selected to change.";
}
?>