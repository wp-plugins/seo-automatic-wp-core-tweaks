<?php
//Add the robots.txt file to the root

if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['add_robots'] == "ON") {
		$robotsFile = ABSPATH."robots.txt";
		if (file_exists($robotsFile)) {
			$fail .= "<li>Robots.txt file already exists, so we did not overwrite it. Be sure to exclude unwanted directories manually.</li>";
		} else {
		//	$sitemap = get_bloginfo('url');
		//	if (substr($sitemap, -1) != '/') {
		//		$sitemap.="/";
		//	}
		//	$sitemap .= "sitemap.xml";
			$fh = fopen($robotsFile, 'w');
			$stringData = "
		   # Robots file created by SEO Automatic WP_Core Tweaks plugin http://www.seoautomatic.com
		   # Sorry if this overwrote your robots file, but hey, you left the box checked!
		   # I recommend using full url for XML sitemap path 

		Sitemap: /sitemap.xml

		User-agent: *

		Disallow: /wp-admin
		Disallow: /wp-includes/
		Disallow: /feed/
		Disallow: /trackback/
		Disallow: /cgi-bin/
		Disallow: /wp-content/plugins/seo-automatic-seo-tools/
		Disallow: /ANY-FOLDER-YOU-WANT/";

			fwrite($fh, $stringData);
			fclose($fh);
			if (file_exists($robotsFile)) {
				$success .= "<li>The robots.txt file was created.</li>";
			} else {
				$fail .= "<li>The robots.txt file was not able to be created.</li>";
			}
		}

		} else {
			$notused .= "<li>Create robots.txt file.</li>";
		}
} else {
	$options .= '<li><input name="add_robots" type="checkbox" value="ON" /> Add a robots.txt file to your blog root.<br /><small><b>(This WILL overwrite any existing robots.txt file and cannot be undone.)</b></small></li>';
}
?>