<?php
//Add footer info
if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><b>ADD footer:<br /><small>(Changes here are controlled through hooks, NOT through your themes footer.php.  You may control the exact styling look you want using the class .scauto-footer and .scauto-footer-login in your style.css, - OR - Just re-run core tweaks, deselect ALL options on this page, and then select the UNDO option here for the footer links.)</small></b></li>';
}
if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['add_footer_copy'] == "ON") {
		if (!update_option('seo_core_footer_copy', 'on')) {
			$fail .= "<li>Footer information could not be added. Perhaps it's already added.</li>";
		} else {
			$success .= "<li>Copyright date was added to the footer.</li>";
		}
	} else {
		$notused .= "<li>Add copyright date to footer.</li>";
	}
} else {
	$options .= "<li><input type=\"checkbox\" name=\"add_footer_copy\" value=\"ON\"> Add the copyright date to the footer.</li>";
}


if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['add_footer_login'] == "ON") {
		if (!update_option('seo_core_footer_login', 'on')) {
			$fail .= "<li>Admin login could not be added to the footer. Perhaps it's already added.</li>";
		} else {
			$success .= "<li>Admin login has been added to the footer.</li>";
		}
	} else {
		$notused .= "<li>Add admin login to footer.</li>";
	}
} else {
	$options .= "<li><input type=\"checkbox\" name=\"add_footer_login\" value=\"ON\"> Add an admin login to the footer.</li>";
}

if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['add_footer_sitemap'] == "ON") {
		if (!update_option('seo_core_footer_sitemap', 'on')) {
			$fail .= "<li>Sitemap link could not be added to the footer. Perhaps it's already added.</li>";
		} else {
			$success .= "<li>Sitemap link has been added to the footer.</li>";
		}
	} else {
		$notused .= "<li>Add sitemap link to footer.</li>";
	}
} else {
	$options .= "<li><input type=\"checkbox\" name=\"add_footer_sitemap\" value=\"ON\"> Add the static sitemap link to the footer.</li>";
}

if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['add_footer_privacy'] == "ON") {
		if (!update_option('seo_core_footer_privacy', 'on')) {
			$fail .= "<li>Privacy policy could not be added to the footer. Perhaps it's already added.</li>";
		} else {
			$success .= "<li>Privacy policy link has been added to the footer.</li>";
		}
	} else {
		$notused .= "<li>Add privacy policy link to footer.</li>";
	}
} else {
	$options .= "<li><input type=\"checkbox\" name=\"add_footer_privacy\" value=\"ON\"> Add the privacy policy link to the footer.</li>";
}

//undo
if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><br /><b>UNDO footer additions:</b></li>';
}

if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['remove_footer_copy'] == "ON") {
		if (!update_option('seo_core_footer_copy', 'off')) {
			$fail .= "<li>Copyright date could not be removed. Maybe it wasn't turned on.</li>";
		} else {
			$success .= "<li>Copyright date was removed.</li>";
		}
	} else {
		$notused .= "<li>Remove copyright date.</li>";
	}
} else {
	$options .= "<li><input type=\"checkbox\" name=\"remove_footer_copy\" value=\"ON\"> Remove the copyright date from the footer. </li>";
}

if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['remove_footer_login'] == "ON") {
		if (!update_option('seo_core_footer_login', 'off')) {
			$fail .= "<li>Admin login could not be removed from footer. Maybe it wasn't turned on.</li>";
		} else {
			$success .= "<li>Admin login was removed.</li>";
		}
	} else {
		$notused .= "<li>Remove admin login.</li>";
	}
} else {
	$options .= "<li><input type=\"checkbox\" name=\"remove_footer_login\" value=\"ON\"> Remove admin login from the footer. </li>";
}

if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['remove_footer_sitemap'] == "ON") {
		if (!update_option('seo_core_footer_sitemap', 'off')) {
			$fail .= "<li>Sitemap could not be removed from footer. Maybe it wasn't turned on.</li>";
		} else {
			$success .= "<li>Sitemap link was removed.</li>";
		}
	} else {
		$notused .= "<li>Remove sitemap link.</li>";
	}
} else {
	$options .= "<li><input type=\"checkbox\" name=\"remove_footer_sitemap\" value=\"ON\"> Remove the static sitemap link from the footer. </li>";
}

if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['remove_footer_privacy'] == "ON") {
		if (!update_option('seo_core_footer_privacy', 'off')) {
			$fail .= "<li>Privacy policy could not be removed from footer. Maybe it wasn't turned on.</li>";
		} else {
			$success .= "<li>Privacy policy link was removed.</li>";
		}
	} else {
		$notused .= "<li>Remove privacy policy link.</li>";
	}
} else {
	$options .= "<li><input type=\"checkbox\" name=\"remove_footer_privacy\" value=\"ON\"> Remove the privacy policy link from the footer. </li>";
}
?>