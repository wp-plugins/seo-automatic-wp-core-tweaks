<?php
//Add the robots.txt file to the root

if (($_REQUEST['action'] == "changecore") && ($_REQUEST['add_robots'] == "ON")) {
$robotsFile = ABSPATH."robots.txt";
if (file_exists($robotsFile)) {
	echo "Robots.txt file already exists.";
} else {
	$sitemap = get_bloginfo('url');
	if (substr($sitemap, -1) != '/') {
		$sitemap.="/";
	}
	$sitemap .= "sitemap.xml";
	$fh = fopen($robotsFile, 'w');
	$stringData = "
# - Go ahead and take it. This robots file for Wordpress was brought to you by GetWordpressed.com. 

Sitemap: ".$sitemap."

User-agent: *
Disallow: /wp-admin

User-agent: *
Disallow: /wp-includes

User-agent: *
Disallow: /wp-content/plugins

User-agent: *
Disallow: /wp-content-cache

User-agent: *
Disallow: /wp-content/themes

User-agent: *
Disallow: /trackback

User-agent: *
Disallow: /search

User-agent: *
Disallow: /rss

User-agent: *
Disallow: /cgi-bin

User-agent: *
Disallow: /webalizer

User-agent: *
Disallow: /awstats

User-agent: *
Disallow: /images

User-agent: *
Disallow: /modlogan";
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