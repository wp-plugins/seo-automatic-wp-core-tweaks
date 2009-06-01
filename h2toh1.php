<?php
// Change H2 tags to H1 in the current theme.

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><b>Your theme files must have at least 766 file permission.<br />If selecting this option changes your font to a size you dislike, the adjustment must be made in your sytlesheet.<br />Ex: <code>h1 { font-size: 12px; }</code></b></li>';
}

if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['change_h2_h1'] == "ON") {
		$pageFile = get_single_template();
		$pageFile = str_replace("single", "page", $pageFile);
		$fh = fopen($pageFile, 'r');
		if ($fh == true) {
			$successh1 = "<li>H2 tags have been changed to H1 in your current theme.</li>";
		} else {
			$failh1 = "<li>H2 tags could not be changed. Be sure your theme files have at least 766 permission.</li>";
		}
		$fileContents = fread($fh, filesize($pageFile));
		fclose($fh);
		$fileContents = str_replace("h2", "h1", $fileContents); 
		$fileContents = str_replace("the_title", "single_post_title", $fileContents); 
		$fh = fopen($pageFile, 'w');
		if ($fh == true) {
			$successh1 = "<li>H2 tags have been changed to H1 in your current theme.</li>";
		} else {
			$failh1 = "<li>H2 tags could not be changed. Be sure your theme files have at least 766 permission.</li>";
		}
		fwrite($fh, $fileContents);
		fclose($fh);

		$pageFile = get_single_template();
		$fh = fopen($pageFile, 'r');
		if ($fh == true) {
			$successh1 = "<li>H2 tags have been changed to H1 in your current theme.</li>";
		} else {
			$failh1 = "<li>H2 tags could not be changed. Be sure your theme files have at least 766 permission.</li>";
		}
		$fileContents = fread($fh, filesize($pageFile));
		fclose($fh);
		$fileContents = str_replace("h2", "h1", $fileContents); 
		$fileContents = str_replace("the_title", "single_post_title", $fileContents); 
		$fh = fopen($pageFile, 'w');
		if ($fh == true) {
			$successh1 = "<li>H2 tags have been changed to H1 in your current theme.</li>";
		} else {
			$failh1 = "<li>H2 tags could not be changed. Be sure your theme files have at least 766 permission.</li>";
		}
		fwrite($fh, $fileContents);
		fclose($fh);
		$fail .= $failh1;
		$success .= $successh1;
	} else {
		$notused .= "<li>Change H2 to H1.</li>";
	}
} else {
	$options .= '<li><input name="change_h2_h1" type="checkbox" value="ON" /> Change H2 tags to H1</li>';
}

// Change H1 tags back to H2 in the current theme.

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><b>Remember, this will change ALL of your H1 tags back to H2.</b></li>';
}

if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['change_h1_h2'] == "ON") {
		$pageFile = get_single_template();
		$pageFile = str_replace("single", "page", $pageFile);
		$fh = fopen($pageFile, 'r');
		if ($fh == true) {
			$successh2 = "<li>H1 tags have been changed back to H2 in your current theme.</li>";
		} else {
			$failh2 = "<li>H1 tags could not be changed back to H2. Be sure your theme files have at least 766 permission.</li>";
		}
		$fileContents = fread($fh, filesize($pageFile));
		fclose($fh);
		$fileContents = str_replace("h1", "h2", $fileContents); 
		$fileContents = str_replace("the_title", "single_post_title", $fileContents); 
		$fh = fopen($pageFile, 'w');
		if ($fh == true) {
			$successh2 = "<li>H1 tags have been changed back to H2 in your current theme.</li>";
		} else {
			$failh2 = "<li>H1 tags could not be changed back to H2. Be sure your theme files have at least 766 permission.</li>";
		}
		fwrite($fh, $fileContents);
		fclose($fh);

		$pageFile = get_single_template();
		$fh = fopen($pageFile, 'r');
		if ($fh == true) {
			$successh2 = "<li>H1 tags have been changed back to H2 in your current theme.</li>";
		} else {
			$failh2 = "<li>H1 tags could not be changed back to H2. Be sure your theme files have at least 766 permission.</li>";
		}
		$fileContents = fread($fh, filesize($pageFile));
		fclose($fh);
		$fileContents = str_replace("h1", "h2", $fileContents); 
		$fileContents = str_replace("the_title", "single_post_title", $fileContents); 
		$fh = fopen($pageFile, 'w');
		if ($fh == true) {
			$successh2 = "<li>H1 tags have been changed back to H2 in your current theme.</li>";
		} else {
			$failh2 = "<li>H1 tags could not be changed back to H2. Be sure your theme files have at least 766 permission.</li>";
		}
		fwrite($fh, $fileContents);
		fclose($fh);
		$fail .= $failh2;
		$success .= $successh2;
	} else {
		$notused .= "<li>Undo Change H2 to H1</li>";
	}
} else {
	$options .= '<li><input name="change_h1_h2" type="checkbox" value="ON" /> Undo change of H2 tags to H1</li><li>&nbsp;</li>';
}