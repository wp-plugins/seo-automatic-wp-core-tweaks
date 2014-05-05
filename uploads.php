<?php
//Try to add uploads folder
if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['uploads_folder'] == "ON") {
		$upload_path = get_option('upload_path');
		if (file_exists($upload_path)) {
			$success .= "<li>Upload folder already exists. You may want to check that it has the correct permission settings.</li>";
		} else {
			$return_val = mkdir($upload_path, 0777);
			$return_val = ( $return_val ? "created" : "not created" );	
			if ($return_val == "created") {
				$success .= "<li>Upload folder has been created, but if you have issues with not being able to upload, double check that the file has been set to the correct permission for your server.</li>";
			} else {
				$fail .= "<li>Unable to create the uploads folder. Your server may not allow this. Please create the folder manually at wp-content/uploads.</li>";
			}
		}
	} else {
		$notused .= "<li>Creation of uploads folder.</li>";
	}
} else {
	$options .= "<li><b>Uploads Folder: <font color=\"#ff0000\"><small>You will need to have writable permission in the /wp-content folder for this to work. Otherwise, you will need to manually add the uploads folder so users can upload pictures into posts, etc.</small></font></b><br /><input name=\"uploads_folder\" type=\"checkbox\" value=\"ON\" /> Attempt to create the uploads folder and set the permission to writable.</li>";
} 
?>