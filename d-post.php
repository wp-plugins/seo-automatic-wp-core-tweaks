<?php
//Delete hello world post

$cat_set3 = "<input type=\"checkbox\" name=\"helloworldpost\" value=\"ON\" checked> Delete default \"Hello World\" post.";

	$post_id = 1;
	$post = & get_post($post_id);

if (($_REQUEST['action'] == "changecore") && ($_REQUEST['helloworldpost'] == "ON")) {
	if ( $post->post_type == 'attachment' ) {
		if ( ! wp_delete_attachment($post_id) ) {
			$cat_set3 = "Default post could not be deleted. Perhaps it was already removed?";
		} else {
			$cat_set3 = "Default post deleted (typically name Hello World)";
		}
	} else {
		if ( !wp_delete_post($post_id) ) {
			$cat_set3 = "Default post could not be deleted. Perhaps it was already removed?";
		} else {
			$cat_set3 = "Default post deleted (typically name Hello World)";
		}
	}
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['helloworldpost'] != "ON")) {
	$cat_set3 = "Default post was not selected to change.";
}
?>