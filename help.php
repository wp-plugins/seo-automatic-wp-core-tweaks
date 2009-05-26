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
?>
<script type='text/javascript' src='<?php echo $blogpath;?>wp-includes/js/jquery/jquery.js?ver=1.2.6'></script>
<script type='text/javascript' src='<?php echo $blogpath;?>wp-admin/js/common.js?ver=20081210'></script>
<script type='text/javascript' src='<?php echo $blogpath;?>wp-includes/js/jquery/jquery.color.js?ver=2.0-4561'></script>
<script type='text/javascript'>
/* <![CDATA[ */
	wpAjax = {
		noPerm: "You do not have permission to do that.",
		broken: "An unidentified error has occurred."
	}
	try{convertEntities(wpAjax);}catch(e){};
/* ]]> */
</script>
<script type='text/javascript' src='<?php echo $blogpath;?>wp-includes/js/wp-ajax-response.js?ver=20081210'></script>
<script type='text/javascript'>
/* <![CDATA[ */
	wpListL10n = {
		url: "<?php echo $blogpath;?>wp-admin/admin-ajax.php"
	}
/* ]]> */
</script>
<script type='text/javascript' src='<?php echo $blogpath;?>wp-includes/js/wp-lists.js?ver=20081210'></script>
<script type='text/javascript' src='<?php echo $blogpath;?>wp-includes/js/jquery/ui.core.js?ver=1.5.2'></script>
<script type='text/javascript' src='<?php echo $blogpath;?>wp-includes/js/jquery/ui.resizable.js?ver=1.5.2'></script>
<script type='text/javascript' src='<?php echo $blogpath;?>wp-includes/js/jquery/ui.sortable.js?ver=1.5.2c'></script>
<script type='text/javascript'>
/* <![CDATA[ */
	postboxL10n = {
		requestFile: "<?php echo $blogpath;?>wp-admin/admin-ajax.php"
	}
/* ]]> */
</script>
<script type='text/javascript' src='<?php echo $blogpath;?>wp-admin/js/postbox.js?ver=20081210'></script>
<script type='text/javascript' src='<?php echo $blogpath;?>wp-admin/js/dashboard.js?ver=20081210'></script>
<style>
.postbox .inside { padding: 8px !important; }
#about-plugins a, #resources a {text-decoration: none;}
#about-plugins img, #resources img {float: left; padding-right: 3px;}
</style>
<div class="wrap">
<br />
<div id="dashboard-widgets-wrap">
<div id='dashboard-widgets' class='metabox-holder'>
<div id='side-info-column' class='inner-sidebar'>
<div id='side-sortables' class='meta-box-sortables'>
<div id="about-plugins" class="postbox " >
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Core Tweaks</span></h3>
<div class="inside">
<ul>
	<li><img src="<?php echo $path;?>images/icon-help.jpg" alt="SEO Automatic" /> <a href="?page=seo-automatic-wp-core-tweaks/settings.php">Back</a></li>
	<li><img src="<?php echo $path;?>images/icon-forum.jpg" alt="" /> <a href="http://www.seoautomatic.com/forum/wp-tweak-plugin/" target="_blank">Support Forum</a></li>
	<li><img src="<?php echo $path;?>images/icon-bug.jpg" alt="" /> <a href="http://www.seoautomatic.com/forum/wp-tweak-plugin/report-a-bug/" target="_blank">Bug Reporting</a></li>
</ul>
</div>
</div>
<div id="about-plugins" class="postbox " >
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>About</span></h3>
<div class="inside">

<ul>
	<li><img src="<?php echo $path;?>images/salogoletters.jpg" alt="SEO Automatic" /> <a href="http://www.seoautomatic.com/" target="_blank"> Entire Suite of Plugins</a></li>
	<li><img src="<?php echo $path;?>images/icon-feature.jpg" alt="" /> <a href="http://www.seoautomatic.com/forum/" target="_blank">Suggestions</a></li>
	<li><img src="<?php echo $path;?>images/icon-email.jpg" alt="" /> <a href="http://www.seoautomatic.com/category/development/feed/" target="_blank">Get Notified</a></li>
	<li><img src="<?php echo $path;?>images/icon-forum.jpg" alt="" /> <a href="http://www.seoautomatic.com/forum/" target="_blank">Support Forum</a></li>
	<li><img src="<?php echo $path;?>images/icon-bug.jpg" alt="" /> <a href="http://www.seoautomatic.com/forum/" target="_blank">Bug Reporting</a></li>
	<li><form action="https://www.paypal.com/cgi-bin/webscr" method="post"><input type="hidden" name="cmd" value="_s-xclick" /><input type="hidden" name="hosted_button_id" value="5701868" /><input type="image" src="<?php echo $path;?>images/donate.jpg" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" /><img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"></form></li>
</ul>

</div>
</div>
<div id="resources" class="postbox " >
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Resources</span></h3>
<div class="inside">
<ul>
	<li><img src="<?php echo $path;?>images/icon-searchcommander.ico" alt="SEO Automatic" /> <a href="http://www.searchcommander.com/seo-tools/" target="_blank"> SEO Tools</a></li>
	<li><img src="<?php echo $path;?>images/fclogoletters.gif" alt="" /> <a href="http://www.feedcommander.com" target="_blank">RSS Feed Commander</a></li>
	<li><img src="<?php echo $path;?>images/salogoletters.jpg" alt="" /> <a href="http://www.seoautomatic.com/instant-seo-review/" target="_blank">Instant SEO Review</a></li>
	<li><img src="<?php echo $path;?>images/icon-wordpress.gif" alt="" /> <a href="http://www.getwordpressed.com/installation/" target="_blank">Site Matched WP Themes</a></li>
	<li><img src="<?php echo $path;?>images/icon-searchcommander.ico" alt="" /> <a href="http://www.pdxtc.com/wp-admin/" target="_blank">Scott Hendison's Blog</a></li>
</ul>
</div>
</div>
</div></div>

<div id='post-body' class="has-sidebar">
<div id='dashboard-widgets-main-content' class='has-sidebar-content'>
<div id='normal-sortables' class='meta-box-sortables'>
<div id="main-admin-box" class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span><img src="<?php echo $path;?>images/salogoletters.jpg" alt="SEO Automatic" /> Core Tweaks Help</span></h3>
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
<h2>Added with version 1.0b</h2>
<ul>
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
</ul>
<h2>Added with version 0.9b</h2>
<ul>
<li>Corrected Cheatin' Huh? message, but need more testing by beta testers to be sure since this requires a fresh wordpress install.</li>
<li>Added ability to change blog description/tagline.</li>
<li>Added attempt to create uploads folder and set permission to 777. (Will work depending on what your hosting server allows.)</li>
<li>Added uncheck option for the organize uploads by month/year.</li>
</ul>
<br />
<p><b>For more information visit the <a href="http://www.seoautomatic.com/plugins/wp-core-tweaks/" target="_blank">SEO Automatic Core Tweaks home page</a>.</b></p>
</div></div>

</div>
<div class="clear"></div>
</div><!-- dashboard-widgets-wrap -->

</div><!-- wrap -->