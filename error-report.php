<?php
// Turn error reporting on and off
if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['e_reporting'] == "on") {
		if (!update_option('seoauto_core_e_report', 'on')) {
			$fail .= "<li>Error reporting could not be turned on.</li>";
		} else {
			$success .= "<li>Error reporting is turned on.</li>";
		}
	} elseif ($_REQUEST['e_reporting'] == "off") {
		if (!update_option('seoauto_core_e_report', 'off')) {
			$fail .= "<li>Error reporting could not be turned off.</li>";
		} else {
			$success .= "<li>Error reporting is turned off.</li>";
		}
	} else {
		$notused .= "<li>Error reporting is off by default.</li>";
	}
} else {
	$options .= "<li><input type=\"radio\" name=\"e_reporting\" value=\"on\"> Turn error reporting on.</li>";
	$options .= "<li><input type=\"radio\" name=\"e_reporting\" value=\"off\" checked> Turn error reporting off.</li>";
}

?>