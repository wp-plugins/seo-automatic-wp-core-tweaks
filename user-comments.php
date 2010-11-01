<?php
//Turn off post commenting
if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['default_comment_status'] == "ON") {
		if ( !update_option('default_comment_status','closed') ) {
			$fail .= "<li>Commenting could not be turned off. Perhaps it already is?</li>";
		} else {
			$success .= "<li>Commenting has been turned off.</li>";
		}
	} else {
		$notused .= "<li>Turn off comment posting.</li>";
	}
} else {
	$options .= '<li><input name="default_comment_status" type="checkbox" value="ON" /> Do not allow people to post comments on articles.<br /><small><b>(May be overridden at post/page level edit screens)</b></small></li>';
}
?>