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
</style>

<div class="wrap">
<br />
<div id="dashboard-widgets-wrap">
<div id='dashboard-widgets' class='metabox-holder'>

<div class='postbox-container' style='width:60%;'>
<div id='normal-sortables' class='meta-box-sortables'>

<div id="main-admin-box" class="postbox">
<h3><span><img src="<?php echo $path;?>images/salogoletters.jpg" alt="SEO Automatic" /> Core Tweaks Admin</span></h3>
<div class="inside">
<?php

global $current_user;
get_currentuserinfo();
	if ( !($current_user->user_level > 6) )
		wp_die(__('<p>Using the username "admin" is unwise, and in fact so dangerous, that we at SEOAutomatic.com simply can\'t allow you to continue to our "perfect setup" from here without a warning.</p><p>For security purposes, please create a new admin user and log in with that name. If you\'re SMART, then you\'ll delete the user "admin" altogether so you don\'t get your site hacked.</p><p>If you skip this step, and blow off use of our plugin, don\'t say we didn\'t warn you!</p>'));

//Set category names
include('cat-names.php');

//Remove default post
include('d-post.php');

//Remove default comment
include('d-comment.php');

//Try to create uploads folder and set to 777, uncheck organize by month/year
include('uploads.php');

//Set permalink structure - SKIPPED, COME BACK AND DO!
include('permalinks.php');

//Set to not allow people to comment
include('user-comments.php');

//Change blog email and admin user email
include('emails.php');

//Change blog email and admin user email
include('edit-page-info.php');

//Misc items - blogroll, feed summary, blog tagline
include('misc.php');

//Add sitemap page
include('sitemap-page.php');

//Add robots.txt file
include('robots.php');

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
<p>These setting and change recommendations are primarily used for new WP setup, and are based on an employee checklist at <a href="http://www.pdxtc.com/wpblog/wordpress/wordpress-checklist-now-a-plug-in/" target="_blank" rel="nofollow">Search Commander, Inc.</a></p><p>It is designed to compliment, not replace, either the <a href="http://wordpress.org/extend/plugins/all-in-one-seo-pack/" target="_blank" rel="nofollow">All in one SEO pack</a> or <a href="http://wordpress.org/extend/plugins/headspace2/" target="_blank" rel="nofollow">Headpace plugin</a>, and should save a lot of time on every installation.</p><p>We recommend that you have <b>no other plugins active</b> while running the Core Tweaks process.</p>

<p>Notes before running:</p>

<p>Please note that that we do recommend using this for the title tag (likely in your /themename/header.php file):
</p><p><b><code>&lt;title&gt;&lt;?php wp_title(''); if (!is_home() && !is_front_page()) { print(" | "); } bloginfo('name'); ?&gt;&lt;/title&gt;</code></b></p><p> Aditionally, that title tag will be necessary if you plan on using the THEME SPECIFIC H1 / H2 hacks at the bottom of this screen.</p>

<p>Note that the THEME SPECIFIC changes are UNchecked by default. If you plan to use them, the permissions of your themes .php files must be 777. You can always come back here later after choosing your theme - UNCHECK ALL (since you've already done it all once) then scroll to the bottom and run the H1 stuff, which allows you to do things:</p>
a. Have a different headline on the page than it says on the menu item.<br />b. Have that headline be an H1 instead of an H2

<p><!--<a href="javascript: CheckAll();">Select All</a> | --><a href="javascript: UncheckAll();">Deselect All</a></p>

<p><form name="corechanges" id="corechanges" method="post" action="" class="validate">
<input type="hidden" name="action" value="changecore" />

<ul><?php echo $options; ?></ul>

<p><input type="submit" class="button" name="submit" value="Make the Changes." /></p>

</form>

<p><!--<a href="javascript: CheckAll();">Select All</a> | --><a href="javascript: UncheckAll();">Deselect All</a></p>
</div></div>

<?php } else { ?>
<p>Check below for Errors:</p>
</div></div>

<div id="success" class="postbox">
<h3><span>Successful Changes:</span></h3>
<div class="inside">
<ul><?php echo $success; ?></ul>
</div></div>

<div id="fail" class="postbox">
<h3><span>Errors:</span></h3>
<div class="inside">
<ul><?php if ($fail == '') { ?><li>No Errors Occurred.</li><?php } else { echo $fail; } ?></ul>
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

<div id="about-this-plugin" class="postbox " >
<h3><span>Core Tweaks</span></h3>
<div class="inside">
<ul>
	<li><img src="<?php echo $path;?>images/icon-help.jpg" alt="SEO Automatic" /> <a href="?page=seo-automatic-wp-core-tweaks/help.php">Core Tweaks Help</a></li>
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
	<li><img src="<?php echo $path;?>images/icon-searchcommander.ico" alt="" /> <a href="http://www.pdxtc.com/wpblog/" target="_blank">Scott Hendison's Blog</a></li>
</ul>
</div></div>

</div></div>
<div class="clear"></div>
</div><!-- dashboard-widgets-wrap -->

</div><!-- wrap -->
