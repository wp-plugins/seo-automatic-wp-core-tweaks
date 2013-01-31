<?php
//Turn organization of uploads into year and month off
if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['yr_mnth'] == "ON") {
		if ( (!update_option('uploads_use_yearmonth_folders','')) ) {
			$fail .= "<li>The uploads folder was not changed, since it was already set to *not* be organized by month and year.</li>";
		} else {
			$success .= "<li>Organizing uploads into month- and year-based folders is turned off.</li>";
		}
	} else {
		//update_option('uploads_use_yearmonth_folders','1');
		$notused .= "<li>Organization of uploads folders.</li>";
	} 
} else {
	$options .= "<li><input name=\"yr_mnth\" type=\"checkbox\" value=\"ON\" checked /> Turn OFF organization of uploads into month and year-based folders.</li>";
}
?>