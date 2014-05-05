<?php
// Turn post teaser on and off
if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['post_teaser_use'] == "on") {
		if (!update_option('seoauto_core_post_teaser_use', 'on')) {
			$fail .= "<li>Post teaser could not be turned on. Maybe it's already on.</li>";
		} else {
			$success .= "<li>Post Teaser is turned on.</li>";
		}
	} elseif ($_REQUEST['post_teaser_use'] == "off") {
		if (!update_option('seoauto_core_post_teaser_use', 'off')) {
			$fail .= "<li>Post Teaser could not be turned off. Maybe it's already off.</li>";
		} else {
			$success .= "<li>Post Teaser is turned off.</li>";
		}
	} else {
		$notused .= "<li>Post Teaser is on by default.</li>";
	}
} else {
	$options .= "<li><input type=\"radio\" name=\"post_teaser_use\" value=\"on\" checked> Turn Post Teaser on.</li>";
	$options .= "<li><input type=\"radio\" name=\"post_teaser_use\" value=\"off\"> Turn Post Teaser off.</li>";
}

?>