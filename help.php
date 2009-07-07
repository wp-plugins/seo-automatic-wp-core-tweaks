<?php
if (function_exists('plugins_url')) {
	$path=trailingslashit(plugins_url(basename(dirname(__FILE__))));
	} else {
	$path = dirname(__FILE__);
	$path = str_replace("\\","/",$path);
	$path = trailingslashit(get_bloginfo('wpurl')) . trailingslashit(substr($path,strpos($path,"wp-content/")));
}
	$blogpath = get_bloginfo('url');
	if (substr($blogpath, -1) != '/') {
		$blogpath.="/";
	}	
if (get_bloginfo('version') < 2.8) {
	echo '<style>.postbox-container { float: left; } #side-sortables { padding-left: 20px; }';
} else {
	echo '<style>';
}
?>
.postbox .inside { padding: 8px !important; }
#about-plugins a, #resources a {text-decoration: none;}
#about-plugins img, #resources img {float: left; padding-right: 3px;}
</style>

<div class="wrap">
<br />
<div id="dashboard-widgets-wrap">
<div id='dashboard-widgets' class='metabox-holder'>

<div class='postbox-container' style='width:60%;'>
<div id='normal-sortables' class='meta-box-sortables'>

<div id="main-admin-box" class="postbox">
<h3><span><img src="<?php echo $path;?>images/salogoletters.jpg" alt="SEO Automatic" /> Core Tweaks Help</span></h3>
<div class="inside">
<h2>Features</h2>
<ul>
<li>Page Order for menu now available in WP</li>
<li>Page Link Manager allows choice to not display page on menu</li>
<li>Post Teaser shows snippet of posts on category, archive and main pages</li>
<li>Change default post category name from &quot;Uncategorized&quot;</li>
<li>Change default blogroll category name from &quot;Blogroll&quot;</li>
<li>Delete default &quot;Hello World&quot; post</li>
<li>Delete default comment on the Hello World post</li>
<li>Change permalink structure to custom setting recommended by Scott &amp; others</li>
<li>Sets the Main Blog Email for convenience</li>
<li>Sets the Admin User's Email for convenience</li>
<li>Change the name of the default page that Wordpress adds from &quot;About&quot;.</li>
<li>Set that default page to the static front page of the blog if using WP as a CMS</li>
<li>Add and sets the page for displaying the posts for convenience</li>
<li>Change article feed to summary (if desired)</li>
<li>Remove all the blogroll links that are auto-installed by Wordpress</li>
</ul>
<h2>Change Log</h2>
<p>07/07/09</p>
<ol>
	<li>Update admin area to display properly in WP 2.8.</li>
</ol>
<br /><p>06/01/09</p>
<ol>
	<li>Added the H2 to H1 theme change back in.</li>
	<li>Removed better blogroll temporarily until the issue of the links widget being removed and having to be readded is 
	resolved.</li>
</ol>
<br /><p>05/18/09</p>
<ol>
	<li>Updated robots.txt file contents.</li>
	<li>Screenshot at repository is working now.</li>
	<li>Removed all theme related tweaks except the H1 Hack.</li>
	<li>Updated home page and style of plugin admin area.</li>
	<li>Reorganized results for easier viewing of success and errored items.</li>
	<li>Added deselect all checkboxes option.</li>
</ol>
<br /><p>03/25/09</p>
<ol>
	<li>Page link manager is upgraded to 1.0b.</li>
	<li>Cleaning up file structure of plugin zip.</li>
	<li>New initial admin user can be added.</li>
	<li>H1 hack now auto changes the_title() to single_post_title() so that the h1 hack of changeH1 in the custom metas will work 
	easily.</li>
</ol>
<br /><p>03/17/09</p>
<ol>
	<li>Robot meta tag is added to the header.</li>
	<li>Auto creation of sitemap page for DDSiteMap Gen and removed from navigation menu.</li>
	<li>Auto creation of a robots.txt file in the blog root.</li>
</ol>
<br /><p>03/16/09</p>
<ol>
	<li>Added change of H2 to H1 tags for current theme.</li>
	<li>Canonical Plugin now integrated.</li>
	<li>Dagon Design Sitemap Generator integrated.</li>
</ol>
<br /><p>02/06/2009</p>
<ol>
	<li>Corrected Cheatin' Huh message, but need more testing by beta testers to be sure since this requires a fresh wordpress 
	install.</li>
	<li>Added ability to change blog description/tagline.</li>
	<li>Added attempt to create uploads folder and set permission to 777. (Will work depending on what your hosting server 
	allows.)</li>
	<li>Added uncheck option for the organize uploads by month/year.</li>
</ol>
<br /><p>Version 1.0b</p>
<ol>
<li>Page link manager is upgraded to 1.0b.</li>
<li>Cleaning up file structure of plugin zip.</li>
<li>New initial admin user can be added.</li>
<li>H1 hack now auto changes the_title() to single_post_title() so that the h1 hack of changeH1 in the custom metas will work 
easily.</li>
<li>Robot meta tag is added to the header.</li>
<li>Auto creation of sitemap page for DDSiteMap Gen and removed from navigation menu.</li>
<li>Auto creation of a robots.txt file in the blog root.</li>
<li>Added change of H2 to H1 tags for current theme.</li>
<li>Canonical Plugin now integrated.</li>
<li>Dagon Design Sitemap Generator integrated.</li>
</ol>
<br /><p>Version 0.9b</p>
<ol>
<li>Corrected Cheatin' Huh? message, but need more testing by beta testers to be sure since this requires a fresh wordpress install.</li>
<li>Added ability to change blog description/tagline.</li>
<li>Added attempt to create uploads folder and set permission to 777. (Will work depending on what your hosting server allows.)</li>
<li>Added uncheck option for the organize uploads by month/year.</li>
</ol>
<br />
<p><b>For more information visit the <a href="http://www.seoautomatic.com/plugins/wp-core-tweaks/" target="_blank">SEO Automatic Core Tweaks home page</a>.</b></p>
</div></div>

</div></div>

<div class='postbox-container' style='width:35%;'>
<div id='side-sortables' class='meta-box-sortables'>

<div id="about-this-plugin" class="postbox " >
<h3><span>Core Tweaks</span></h3>
<div class="inside">
<ul>
	<li><img src="<?php echo $path;?>images/icon-help.jpg" alt="SEO Automatic" /> <a href="?page=seo-automatic-wp-core-tweaks/settings.php">Back to Settings</a></li>
	<li><img src="<?php echo $path;?>images/icon-forum.jpg" alt="" /> <a href="http://www.seoautomatic.com/forum/wp-tweak-plugin/" target="_blank">Support Forum</a></li>
	<li><img src="<?php echo $path;?>images/icon-bug.jpg" alt="" /> <a href="http://www.seoautomatic.com/forum/wp-tweak-plugin/report-a-bug/" target="_blank">Bug Reporting</a></li>
	<li><img src="<?php echo $path;?>images/icon-branding.jpg" alt="" /> <a href="http://www.seoautomatic.com/development/brandable-core-tweaks-plugin/" target="_blank">Remove Branding</a></li>
</ul>
</div></div>


<div id="about-plugins" class="postbox " >
<h3><span>About</span></h3>
<div class="inside">
<ul>
	<li><img src="<?php echo $path;?>images/salogoletters.jpg" alt="SEO Automatic" /> <a href="http://www.seoautomatic.com/plugins/" target="_blank"> Entire Suite of Plugins</a></li>
	<li><img src="<?php echo $path;?>images/icon-feature.jpg" alt="" /> <a href="http://www.seoautomatic.com/forum/" target="_blank">Suggestions</a></li>
	<li><img src="<?php echo $path;?>images/icon-email.jpg" alt="" /> <a href="http://www.seoautomatic.com/category/development/feed/" target="_blank">Get Notified</a></li>
	<li><img src="<?php echo $path;?>images/icon-forum.jpg" alt="" /> <a href="http://www.seoautomatic.com/forum/" target="_blank">Support Forum</a></li>
	<li><img src="<?php echo $path;?>images/icon-bug.jpg" alt="" /> <a href="http://www.seoautomatic.com/forum/" target="_blank">Bug Reporting</a></li>
	<li><form action="https://www.paypal.com/cgi-bin/webscr" method="post"><input type="hidden" name="cmd" value="_s-xclick" /><input type="hidden" name="hosted_button_id" value="5701868" /><input type="image" src="<?php echo $path;?>images/donate.jpg" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" /><img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"></form></li>
</ul>
</div></div>

<div id="resources" class="postbox" >
<h3><span>Resources</span></h3>
<div class="inside">
<ul>
	<li><img src="<?php echo $path;?>images/icon-searchcommander.ico" alt="SEO Automatic" /> <a href="http://www.searchcommander.com/seo-tools/" target="_blank"> SEO Tools</a></li>
	<li><img src="<?php echo $path;?>images/fclogoletters.gif" alt="" /> <a href="http://www.feedcommander.com" target="_blank">RSS Feed Commander</a></li>
	<li><img src="<?php echo $path;?>images/salogoletters.jpg" alt="" /> <a href="http://www.seoautomatic.com/instant-seo-review/" target="_blank">Instant SEO Review</a></li>
	<li><img src="<?php echo $path;?>images/icon-wordpress.gif" alt="" /> <a href="http://www.getwordpressed.com/installation/" target="_blank">Site Matched WP Themes</a></li>
	<li><img src="<?php echo $path;?>images/icon-searchcommander.ico" alt="" /> <a href="http://www.pdxtc.com/wp-admin/" target="_blank">Scott Hendison's Blog</a></li>
</ul>
</div></div>

</div></div>
<div class="clear"></div>
</div><!-- dashboard-widgets-wrap -->

</div><!-- wrap -->
