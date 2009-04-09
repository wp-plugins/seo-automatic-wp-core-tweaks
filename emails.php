<?php
global $wpdb;
if (($_REQUEST['action'] == "changecore") && ($_REQUEST['email_1'] == "ON")) {
	if ( !update_option('admin_email',$_REQUEST['blog_email']) ) {
		echo "<p>Email entered is already set as the main blog email.</p>";
	} else {
		echo "<p>Main blog email has been set to ".$_REQUEST['blog_email'].".</p>";
	}
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['email_1'] != "ON")) {
	echo "<p>Main blog email has not been changed.</p>";
} else {
?>
<p><input name="email_1" type="checkbox" value="ON" checked /> <?php _e('Set the main blog email to: ') ?> <input name="blog_email" type="textbox" value="<?php echo get_option('admin_email'); ?>" /></p>
<?php } 

if (($_REQUEST['action'] == "changecore") && ($_REQUEST['email_2'] == "ON")) {
	if ( !$wpdb->query("UPDATE $wpdb->users SET user_email = '".$_REQUEST['admin_email']."' WHERE ID = '1'") ) {
		echo "<p>Email entered is already set as the admin email.</p>";
	} else {
		echo "<p>Admin email has been set to ".$_REQUEST['admin_email'].".</p>";
	}
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['email_2'] != "ON")) {
	echo "<p>Admin email has not been changed.</p>";
} else {
$original_admin_email = $wpdb->get_row("SELECT * FROM $wpdb->users WHERE id = 1", ARRAY_A);
?>
<p><input name="email_2" type="checkbox" value="ON" checked /> <?php _e('Set the admin user\'s blog email to: ') ?> <input name="admin_email" type="textbox" value="<?php echo $original_admin_email['user_email']; ?>" /></p>
<?php } 

if (($_REQUEST['action'] == "changecore") && ($_REQUEST['new_user'] == "ON")) {
	$new_login = $_REQUEST['new_login'];
	$new_pass = $_REQUEST['new_pass'];
	$new_nicename = strtolower($new_login);
	$new_email = $_REQUEST['new_email'];
	$new_status = 0;
	$new_display = $new_login;
	$userdata = array("user_login" => $new_login, "user_pass" => $new_pass,"user_nicename" => $new_nicename, "user_email" => $new_email,"user_status" => $new_status,"display_name" => $new_display);
	if ( !wp_insert_user( $userdata )) {
		echo "<p>New user could not be added.</p>";
	} else {
		echo "<p>New user has been added.</p>";
	}
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['new_user'] != "ON")) {
	echo "<p>New user was not added.</p>";
} else {
?>
<p><input name="new_user" type="checkbox" value="ON" checked /> <?php _e('Add new user: ') ?><br />
Username: <input type="text" size="20" name="new_login"> Password: <input type="text" size="20" name="new_pass"> Email:
<input type="text" size="20" name="new_email"></p>
<?php } ?>