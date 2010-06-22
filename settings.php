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
#success li, #success h3 {color: #006600; }
#fail li, #fail h3 {color: #ff0000; }
#resources li { clear: both; }
#about-plugins li { clear: both; }
</style>

<div class="wrap">
<br />
<div id="dashboard-widgets-wrap">
<div id='dashboard-widgets' class='metabox-holder'>

<div class='postbox-container' style='width:60%;'>
<div id='normal-sortables' class='meta-box-sortables'>

<div id="main-admin-box" class="postbox">
<h3><span><img src="http://www.seoautomatic.com/favicon.ico" alt="SEO Automatic" /> Core Tweaks Admin</span></h3>
<div class="inside">
<?php

global $current_user;
get_currentuserinfo();
	if (!current_user_can('level_10'))
		wp_die(__('<p>Using the username "admin" is unwise, and in fact so dangerous, that we at SEOAutomatic.com simply can\'t allow you to continue to our "perfect setup" from here without a warning.</p><p>For security purposes, please create a new admin user and log in with that name. If you\'re SMART, then you\'ll delete the user "admin" altogether so you don\'t get your site hacked.</p><p>If you skip this step, and blow off use of our plugin, don\'t say we didn\'t warn you!</p>'));

//Set category names
include('cat-names.php');

//Try to create uploads folder and set to 777, uncheck organize by month/year
include('org-uploads.php');

//Set feeds to summary
include('feed-display.php');

//Set permalink structure - SKIPPED, COME BACK AND DO!
include('permalinks.php');

//Add sitemap page
include('sitemap-page.php');

//Add privacy policy
include('privacy-policy.php');

//Add contact page
include('contact.php');

//Try to create uploads folder and set to 777, uncheck organize by month/year
include('uploads.php');

//Remove default post
include('d-post.php');

//Remove default comment
include('d-comment.php');

//Set to not allow people to comment
include('user-comments.php');

//Change blog email and admin user email
include('emails.php');

//Change blog email and admin user email
include('edit-page-info.php');

//Misc items - blogroll, feed summary, blog tagline
include('misc.php');

//Remote publishing
include('remote-publishing.php');

//Add robots.txt file
include('robots.php');

//Add footer info
include('add-footer.php');

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li>&nbsp;</li><li>&nbsp;</li><li><b><br /><font color="#ff0000"><u>Advanced:</u><br /></b></li><li><b>Your theme files must have at least 766 file permission.</font><br />Premium WordPress themes sometimes have programmed "SEO options" that may prevent these items from working properly. Please consult your theme provider for support.</b></li><li>&nbsp;</li>';
}

//Change Add H1 Hack
include('h1hack.php');

//Change H2 to H1 in current theme
include('h2toh1.php');

?>

<script> 
function CheckAll()
{
count = document.corechanges.elements.length;
    for (i=0; i < count; i++) 
	{
	document.corechanges.elements[i].checked = 1;
	}
}
function UncheckAll(){
count = document.corechanges.elements.length;
    for (i=0; i < count; i++) 
	{
	document.corechanges.elements[i].checked = 0;
	}
}
</script>

<?php if ($_REQUEST['action'] != "changecore") { ?>
<p>The steps and actions on this page are primarily used for a brand new WP setup, and are based on an employee checklist from <a href="http://www.pdxtc.com/wpblog/wordpress/wordpress-checklist-now-a-plug-in/" target="_blank" rel="nofollow">Search Commander, Inc.</a></p>
<p>This plugin is designed to compliment, not replace, either the <a href="http://wordpress.org/extend/plugins/all-in-one-seo-pack/" target="_blank" rel="nofollow">All in one SEO pack</a> or <a href="http://wordpress.org/extend/plugins/headspace2/" target="_blank" rel="nofollow">Headspace plugin</a>, but you should have no 
other plugins active while running the SEO Automatic Core Tweaks process.</p>
<p>To see a short video of how to use this plugin, <a href="http://www.seoautomatic.com/plugins/wp-core-tweaks/" target="_blank">click here</a> and if you need support, please <a href="http://www.seoautomatic.com/forum/wp-tweak-plugin/" target="_blank">visit the forum</a>.</p>
<p>
<b>READ ME FIRST:</b>
<p>After running these processes, there will be a couple of new things added the WordPress admin screen that you'll find handy.</p>
<ol>
	<li>Reorder your static page menu pages and sub pages. Look under Pages &gt; My Page Order on the menu to drag and drop as needed.</li>
	<li>Exclude any pages you wish from main navigation. Look in the Tools &gt; Page Links menu item and check / uncheck as desired.</li>
	<li>A new page navigation widget will be added. Look in the widget options for checkbox page selection to include or remove.</li>
	<li>Enhanced RSS widget - Under Appearance &gt; Widgets you'll notice that we have enhanced it, allowing you to nofollow the links or to open them in a new window.</li>
	<li>There will be a static sitemap page automatically added, but there are additional options are under Settings &gt; DDsitemapGen</li>
	<li>You'll see that the Post Teaser options are available under Settings &gt; Post Teaser</li>
	<li>If you create contact or privacy pages, future edits will be done in the pages &gt; edit screen as usual.</li>
	<li>Permalink structure:
	<p>One of the most important things you'll want to do is change the default permalink structure. In order for our plug-in to be able to do that for you, the .htaccess file must be writable.</p>
	<p>To avoid getting an error message, if you cannot change the permissions for .htaccess, then simply UNcheck the &quot;Change Permalinks&quot; option below.</p></li>
</ol>
<p><b>Unchecked Options:<br>
</b>There are many options below that are not checked by default, but may be something you plan to do anyway, so they have been added here for your convenience.</p>
<p>Note that at the very bottom, there are several THEME SPECIFIC changes, which are UNchecked by default. If you plan to use them, the permissions of your theme files must be 766.</p>

<p><!--<a href="javascript: CheckAll();">Select All</a> | --><a href="javascript: UncheckAll();">Deselect All</a></p>

<p><form name="corechanges" id="corechanges" method="post" action="" class="validate">
<input type="hidden" name="action" value="changecore" />

<ul><?php echo $options; ?></ul>

<p><input type="submit" class="button" name="submit" value="Make the Changes." /></p>

</form>

<p><!--<a href="javascript: CheckAll();">Select All</a> |--><a href="javascript: UncheckAll();">Deselect All</a></p>
</div></div>

<?php } else { ?>
<p>If you see errors above, please check below in the red box "Unable to complete" for an explanation in English.</p>
</div></div>

<div id="success" class="postbox">
<h3><span>Successful Changes:</span></h3>
<div class="inside">
<ul><?php echo $success; ?></ul>
</div></div>

<div id="fail" class="postbox">
<h3><span>Unable to complete:</span></h3>
<div class="inside">
<ul><?php if ($fail == '') { ?><li>No Problems Occurred.</li><?php } else { echo $fail; } ?></ul>
<p>If you don't understand what this means, <a href="http://www.seoautomatic.com/forum/wp-tweak-plugin/" target="_blank">please report it...</a></p>
</div></div>

<div id="unused" class="postbox">
<h3><span>Options not chosen:</span></h3>
<div class="inside">
<ul><?php echo $notused; ?></ul>
</div></div>
<?php } ?>

</div></div>

<div class='postbox-container' style='width:35%;'>
<div id='side-sortables' class='meta-box-sortables'>

<div id="about-plugins" class="postbox " >
<h3><span>About</span></h3>
<div class="inside">
<a href="http://www.seoautomatic.com/plugins/" target="_blank"><img src="http://www.seoautomatic.com/plugin-home/images/logo-2010.jpg" alt="SEO Automatic" width="262" height="166" /></a>
<br />
<ul>
	<li><img src="http://www.seoautomatic.com/favicon.ico" height="16" width="16" alt="SEO Automatic" /> <a href="http://www.seoautomatic.com/pricing-plans/white-label/" target="_blank"> White Label Options</a></li>
	<li style="margin-left: -4px;"><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="5701868">
<input type="image" src="http://www.plugin-central.org/images/donate.jpg" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" onclick="this.form.target='_blank';return true;">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</li>
</ul>

</div></div>

<div id="resources" class="postbox" >
<h3><span>Resources</span></h3>
<div class="inside">
<ul>
	<li><img src="http://www.seoautomatic.com/favicon.ico" height="16" width="16" alt="" /> <a href="http://www.seoautomatic.ourtoolbar.com/" target="_blank">Search Commander, Inc. Toolbar</a></li>
	<li><img src="http://www.seoautomatic.com/favicon.ico" height="16" width="16" alt="SEO Automatic" /> <a href="http://www.seoautomatic.com/unique-tools/" target="_blank"> SEO Automatic Tools</a></li>
	<li><img src="http://www.seoautomatic.com/favicon.ico" height="16" width="16" alt="" /> <a href="http://www.getwordpressed.com/about/" target="_blank">Site Matched WP Themes</a></li>
</ul>
</div></div>

</div></div>
<div class="clear"></div>
</div><!-- dashboard-widgets-wrap -->

</div><!-- wrap -->
