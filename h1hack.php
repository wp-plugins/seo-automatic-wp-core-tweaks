<?php
// Changes the_title() to single_post_title() in page.php and single.php so the h1 hack can work.

if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['add_h1hack'] == "ON") {
		$pageFile = get_single_template();
		$pageFile = str_replace("single", "page", $pageFile);
		$fh = fopen($pageFile, 'r');
		if ($fh == true) {
			$success_hack = "<li>The H1 Hack has been applied to your current theme.</li>";
		} else {
			$fail_hack = "<li>The H1 Hack was not able to be applied. Be sure your theme files have at least 766 permission.</li>";
		}
		$fileContents = fread($fh, filesize($pageFile));
		fclose($fh);
		//$fileContents = str_replace("h2", "h1", $fileContents); 
		$fileContents = str_replace("the_title", "single_post_title", $fileContents); 
		$fh = fopen($pageFile, 'w');
		if ($fh == true) {
			$success_hack = "<li>The H1 Hack has been applied to your current theme.</li>";
		} else {
			$fail_hack = "<li>The H1 Hack was not able to be applied. Be sure your theme files have at least 766 permission.</li>";
		}
		fwrite($fh, $fileContents);
		fclose($fh);

		$pageFile = get_single_template();
		$fh = fopen($pageFile, 'r');
		if ($fh == true) {
			$success_hack = "<li>The H1 Hack has been applied to your current theme.</li>";
		} else {
			$fail_hack = "<li>The H1 Hack was not able to be applied. Be sure your theme files have at least 766 permission.</li>";
		}
		$fileContents = fread($fh, filesize($pageFile));
		fclose($fh);
		//$fileContents = str_replace("h2", "h1", $fileContents); 
		$fileContents = str_replace("the_title", "single_post_title", $fileContents); 
		$fh = fopen($pageFile, 'w');
		if ($fh == true) {
			$success_hack = "<li>The H1 Hack has been applied to your current theme.</li>";
		} else {
			$fail_hack = "<li>The H1 Hack was not able to be applied. Be sure your theme files have at least 766 permission.</li>";
		}
		fwrite($fh, $fileContents);
		fclose($fh);
		$fail .= $fail_hack;
		$success .= $success_hack;
	} else {
		$notused .= "<li>H1 Hack.</li>";
	}
} else {
	$options .= '<li><input name="add_h1hack" type="checkbox" value="ON" /> Want the ability to change your H1 tag regardless of the page name? We\'ve added an <a href="http://www.getwordpressed.com/seo/h1-hack-for-wordpress-pages/" rel="nofollow" target="_blank">H1 hack</a> - <b>In order for this to work, replace your title tag in header.php with <code>&lt;title&gt;&lt;?php wp_title(\'\'); if (!is_home() &amp;&amp; !is_front_page()) { print(" | "); } bloginfo(\'name\'); ?&gt;&lt;/title&gt;</code> first.</b></li>';
} 

?>