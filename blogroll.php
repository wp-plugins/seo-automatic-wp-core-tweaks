<?php
//Delete blogroll links

if ($_REQUEST['action'] == "changecore") {
/*	 if ($_REQUEST['empty_blogroll'] == "ON") {
		if ( (!$wpdb->query("DELETE FROM $wpdb->links WHERE link_id != ''")) ) {
			$fail .= "<li>Blogroll links could not be deleted.</li>";
		} else {
			$success .= "<li>All Blogroll links have been deleted.</li>";
		}
	} else {
		$notused .= "<li>Blogroll has not been changed.</li>";
	}*/
} else {
	$options .= '<!--<li><input name="empty_blogroll" type="checkbox" value="ON" /> Delete <b>all</b> links in blogroll. <small><b>(Cannot be undone.)</b></small></li>-->';
} 

?>