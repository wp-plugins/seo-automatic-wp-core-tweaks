<?php
//Add the robots.txt file to the root

if (($_REQUEST['action'] == "changecore") && ($_REQUEST['add_robots'] == "ON")) {
$robotsFile = ABSPATH."robots.txt";
if (file_exists($robotsFile)) {
	echo "Robots.txt file already exists.";
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
Disallow: /ANY-FOLDER-YOU-WANT/";

	fwrite($fh, $stringData);
	fclose($fh);
	if (file_exists($robotsFile)) {
		echo "<p>The robots.txt file was created.</p>";
	} else {
		echo "<p>The robots.txt file was not able to be created.</p>";
	}
}

} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['add_robots'] != "ON")) {
	echo "<p>The robots.txt file was not created.</p>";
} else {
?>
<p><input name="add_robots" type="checkbox" value="ON" checked /> <?php _e('Add a robots.txt file to your blog root.') ?></p>
<?php } ?>