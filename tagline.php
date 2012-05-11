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

?>