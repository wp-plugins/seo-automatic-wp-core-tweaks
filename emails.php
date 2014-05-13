<?php
global $wpdb;
if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['email_1'] == "ON") {
			if ( !update_option('admin_email',$_REQUEST['blog_email']) ) {
				$fail .= "<liEmail entered is already set as the main blog email.</li>";
			} else {
				$success .= "<li>Main blog email has been set to ".$_REQUEST['blog_email'].".</li>";
			}
	} else {
		$notused .= "<li>Change main blog email.</li>";
	}
} else {
	$options .= '<li><input name="email_1" type="checkbox" value="ON" /> Set the main blog email to: <input name="blog_email" type="textbox" value="'.get_option('admin_email').'" /></li>';
}

if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['email_2'] == "ON") {
		if ( !$wpdb->query("UPDATE $wpdb->users SET user_email = '".$_REQUEST['admin_email']."' WHERE ID = '1'") ) {
			$fail .= "<li>Email entered is already set as the admin email.</li>";
		} else {
			$success .= "<li>Admin email has been set to ".$_REQUEST['admin_email'].".</li>";
		}
	} else {
		$notused .= "<li>Change admin email.</li>";
	}
} else {
	$original_admin_email = $wpdb->get_row("SELECT * FROM $wpdb->users WHERE id = 1", ARRAY_A);
	$options .= '<li><input name="email_2" type="checkbox" value="ON" /> Set the admin user\'s blog email to: <input name="admin_email" type="textbox" value="'.$original_admin_email['user_email'].'" /></li>';
} 

if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['new_user'] == "ON") {
		$new_login = $_REQUEST['new_login'];
		$new_pass = $_REQUEST['new_pass'];
		$new_nicename = strtolower($new_login);
		$new_email = $_REQUEST['new_email'];
		$new_display = $new_login;
		$role = 'administrator';
		$userdata = array("user_login" => $new_login, "user_pass" => $new_pass,"user_nicename" => $new_nicename, "user_email" => $new_email,"display_name" => $new_display,"role" => $role);
		if ( !wp_insert_user( $userdata )) {
			$fail .= "<li>New user could not be added.</li>";
		} else {
			$success .= "<li>New user has been added.</li>";
		}
	} else {
		$notused .= "<li>New user was not added.</li>";
	}
} else {
	$options .= '<li><input name="new_user" type="checkbox" value="ON" /> Add new ADMIN user: <br />';
	$options .= 'Username: <input type="text" size="20" name="new_login"> Password: <input type="text" size="20" name="new_pass"><br />Email: <input type="text" size="30" name="new_email"></li>';
}
?>