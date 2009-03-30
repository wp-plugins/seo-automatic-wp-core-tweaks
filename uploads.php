<?php
if (($_REQUEST['action'] == "changecore") && ($_REQUEST['uploads_folder'] == "ON")) {
	$upload_path = get_option('upload_path');
	if (file_exists($upload_path)) {
		echo "Upload folder already exists.";
	} else {
		$return_val = mkdir($upload_path, 0777);
		$return_val = ( $return_val ? "created" : "not created" );	
		if ($return_val == "created") {
			echo "Upload folder has been created, but if you have issues with not being able to upload, double check that the file has been set to the correct permission for your server.";
		} else {
			echo "Unable to create the uploads folder. Your server may not allow this. Please create the folder manually.";
		}
	}
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['uploads_folder'] != "ON")) {
	echo "<p>Did not attempt to create the uploads folder.</p>";
} else {
?>
<p><input name="uploads_folder" type="checkbox" value="ON" checked /> <?php _e('Try to create the uploads folder and set to 777 permissions. ') ?></p>
<?php } 

if (($_REQUEST['action'] == "changecore") && ($_REQUEST['yr_mnth'] == "ON")) {
	if ( (!update_option('uploads_use_yearmonth_folders','')) ) {
		echo "<p>Could not uncheck organize my uploads into month- and year-based folders.</p>";
	} else {
		echo "<p>Will not be organizing uploads into month- and year-based folders.</p>";
	}
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['yr_mnth'] != "ON")) {
	update_option('uploads_use_yearmonth_folders','1');
	echo "<p>Organizing of uploads into month- and year-based folders is on.</p>";
} else {
?>
<p><input name="yr_mnth" type="checkbox" value="ON" checked /> <?php _e('Do not organize my uploads into month- and year-based folders.') ?></p>
<?php } ?>