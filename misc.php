<?php
// Set the blog description/tagline
if ($_REQUEST['action'] == "changecore") {
	$tagline = $_REQUEST['tagline'];
	if ( (!update_option("blogdescription", $tagline)) ) {
		echo "<p>The blog description/tagline, ".$tagline." could not be changed.</p>";
	} else {
		echo "<p>The blog description/tagline is: ".$tagline."</p>";
	}
} else {
?>
<p><input name="taglinecheck" type="checkbox" value="ON" checked /> <?php _e('Change the blog description/tagline. ') ?> <input name="tagline" type="text" id="tagline"  value="<?php form_option('blogdescription'); ?>" />
<?php 
} 

//Sets feed to summary
if (($_REQUEST['action'] == "changecore") && ($_REQUEST['feed_summary'] == "ON")) {
	if ( (!update_option('rss_use_excerpt','1')) ) {
		echo "<p>The article feed could not be set to summary. Perhaps it already is.</p>";
	} else {
		echo "<p>The article feed has been set to display summary.</p>";
	}
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['feed_summary'] != "ON")) {
	echo "<p>Article feed has not been changed.</p>";
} else {
?>
<p><input name="feed_summary" type="checkbox" value="ON" checked /> <?php _e('Set the Article feed to display summary. ') ?></p>
<?php } 

//Empty blogroll that wp installs
if (($_REQUEST['action'] == "changecore") && ($_REQUEST['empty_blogroll'] == "ON")) {

	if ( (!$wpdb->query("DELETE FROM $wpdb->links WHERE link_category='0'")) ) {
		echo "<p>Blogroll links could not be deleted.</p>";
	} else {
		echo "<p>All Blogroll links have been deleted.</p>";
	}
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['empty_blogroll'] != "ON")) {
	echo "<p>Blogroll has not been changed.</p>";
} else {
?>
<p><input name="empty_blogroll" type="checkbox" value="ON" /> <?php _e('Delete <b>all</b> links in blogroll.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><b>(Keep in mind this is meant for new installs. Checking this box will delete all links in the blogroll category.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you have already added links, you will want to manually delete the ones that WordPress auto-installs.)</b></small>') ?></p>
<?php } 

//Notify that wordpress version meta tag is removed
if (($_REQUEST['action'] == "changecore")) {
	echo "<p>Meta tag for Wordpress Version number is removed. (Automatic removal when plugin is activated.)</p>";
}
?>