<?php
// Turn error reporting on and off
if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['e_reporting'] == "ON") {
		if (!update_option('seoauto_core_e_report', 'on')) {
			$fail .= "<li>Error reporting could not be turned on. Maybe it's already on.</li>";
		} else {
			$success .= "<li>Error reporting is turned on.</li>";
		}
	} elseif ($_REQUEST['e_reporting'] == "OFF") {
		if (!update_option('seoauto_core_e_report', 'off')) {
			$fail .= "<li>Error reporting could not be turned off. Maybe it's already off.</li>";
		} else {
			$success .= "<li>Error reporting is turned off.</li>";
		}
	} else {
		$notused .= "<li>Error reporting is off by default.</li>";
	}
} else {
	$options .= "<li><input type=\"radio\" name=\"e_reporting\" value=\"ON\"> Turn error reporting on.</li>";
	$options .= "<li><input type=\"radio\" name=\"e_reporting\" value=\"OFF\" checked> Turn error reporting off.</li>";
}

?>