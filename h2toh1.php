<?php
// Change H2 tags to H1 in the current theme.
// Changes the_title() to single_post_title() in page.php and single.php so the h1 hack can work.

if (($_REQUEST['action'] == "changecore") && ($_REQUEST['change_h2_h1'] == "ON")) {
	$pageFile = get_single_template();
	$pageFile = str_replace("single", "page", $pageFile);
	$fh = fopen($pageFile, 'r');
	if ($fh == true) {
		$report = "H2 tags have been changed to H1 in your current theme.";
	} else {
		$report = "H2 tags could not be changed. Be sure your theme files have at least 766 permission.";
	}
	$fileContents = fread($fh, filesize($pageFile));
	fclose($fh);
	$fileContents = str_replace("h2", "h1", $fileContents); 
	$fileContents = str_replace("the_title", "single_post_title", $fileContents); 
	$fh = fopen($pageFile, 'w');
	if ($fh == true) {
		$report = "H2 tags have been changed to H1 in your current theme.";
	} else {
		$report = "H2 tags could not be changed. Be sure your theme files have at least 766 permission.";
	}
	fwrite($fh, $fileContents);
	fclose($fh);

	$pageFile = get_single_template();
	$fh = fopen($pageFile, 'r');
	if ($fh == true) {
		$report = "H2 tags have been changed to H1 in your current theme.";
	} else {
		$report = "H2 tags could not be changed. Be sure your theme files have at least 766 permission.";
	}
	$fileContents = fread($fh, filesize($pageFile));
	fclose($fh);
	$fileContents = str_replace("h2", "h1", $fileContents); 
	$fileContents = str_replace("the_title", "single_post_title", $fileContents); 
	$fh = fopen($pageFile, 'w');
	if ($fh == true) {
		$report = "H2 tags have been changed to H1 in your current theme.";
	} else {
		$report = "H2 tags could not be changed. Be sure your theme files have at least 766 permission.";
	}
	fwrite($fh, $fileContents);
	fclose($fh);
	echo $report;
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['change_h2_h1'] != "ON")) {
	echo "<p>Your theme files have not been changed.</p>";
} else {
?>
<p><input name="change_h2_h1" type="checkbox" value="ON" checked /> <?php _e('Change H2 tags to H1 and change the_title() to single_post_title() for the H1 Hack to work in your theme.<br /><small>(Your theme files must have at least 766 file permission.)</small>') ?></p>
<?php } 
