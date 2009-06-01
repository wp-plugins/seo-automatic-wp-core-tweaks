<?php
// CHANGETITLE SECTION
function changethetitle($input) {
	global $wp_query;
	$pagenumber = $wp_query->post->ID;

	$key = "changeH1";
	$title = get_post_meta($pagenumber, $key, true);
	if ($title) {
		return $title;
	} else {
		return $input;
	}
}

?>