<?php
//Delete hello world post

if ($_REQUEST['action'] == "changecore") {
	$post_id = 1;
	$post = & get_post($post_id);
	 if ($_REQUEST['helloworldpost'] == "ON") {
		if ( $post->post_type == 'attachment' ) {
			if ( ! wp_delete_attachment($post_id) ) {
				$fail .= "<li>Default post could not be deleted. Perhaps it was already removed?</li>";
			} else {
				$success .= "<li>Default post deleted (typically name Hello World)</li>";
			}
		} else {
			if ( !wp_delete_post($post_id) ) {
				$fail .= "<li>Default post could not be deleted. Perhaps it was already removed?</li>";
			} else {
				$success .= "<li>Default post deleted (typically name Hello World)</li>";
			}
		}
	} else {
		$notused .= "<li>Default post removal.</li>";
	}
} else {
	$options .= "<li><input type=\"checkbox\" name=\"helloworldpost\" value=\"ON\"> Delete default \"Hello World\" post.<br /><small><b>(Cannot be undone.)<br />Deleting this post will leave you with no blog posts, indicating a 404 error on your home page - SO  - check the box above to set your home page.</b></small></li>";
}
?>