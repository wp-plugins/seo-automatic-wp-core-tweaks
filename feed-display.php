<?php
//Sets feed to summary
if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['feed_summary'] == "ON") {
		if (!update_option('rss_use_excerpt','1')) {
			$fail .= "<li>The article feed could not be set to summary. Perhaps it already is.</li>";
		} else {
			$success .= "<li>The article feed has been set to display summary.</li>";
		}
	} else {
		$notused .= "<li>Set article feed to summary.</li>";
	}
} else {
	$options .= '<li><input name="feed_summary" type="checkbox" value="ON" checked /> Set the RSS feed to display only a summary.</li>';
}
?>