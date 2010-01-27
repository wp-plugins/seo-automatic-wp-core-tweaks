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
				$fail .= "<li>Unable to create the uploads folder. Your server may not allow this. Please create the folder manually.</li>";
			}
		}
	} else {
		$notused .= "<li>Creation of uploads folder.</li>";
	}
} else {
	$options .= "<li><input name=\"uploads_folder\" type=\"checkbox\" value=\"ON\" /> Try to create the uploads folder and set to 777 permissions. <b>(Checking this box requires you to have writable permission on your wp-content folder.)</b></li>";
} 
?>