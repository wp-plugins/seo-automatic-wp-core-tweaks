<div class="wrap">
<div style="float: right; margin-right: 200px;"><b><a href="?page=sc-wp-core-tweaks/help.php">Core Tweaks Help</a></b></div>
<h1>Core Tweaks</h1>

<?php

global $current_user;
get_currentuserinfo();
	if ( !($current_user->user_level > 6) )
		wp_die(__('You must be an admin user to make these changes. If you are and still receiving this message, please try changing the auto-generated password and login again. Another work-around is to create a new user with administrative permission.'));

//Set category names
include('files/cat-names.php');

//Remove default post
include('files/d-post.php');

//Remove default comment
include('files/d-comment.php');

?>

<p><form name="corechanges" id="corechanges" method="post" action="" class="validate">
<input type="hidden" name="action" value="changecore" />
<?php
	echo $cat_post_name;
	echo $cat_blogroll_name;
?></p>

<p><?php echo $cat_set1; ?></p>
<p><?php echo $cat_set2; ?></p>
<p><?php echo $cat_set3; ?></p>
<p><?php echo $cat_set4; ?></p>

<?php
//Try to create uploads folder and set to 777, uncheck organize by month/year
include('files/uploads.php');

//Set permalink structure
include('files/permalinks.php');

//Set to not allow people to comment
include('files/user-comments.php');

//Change blog email and admin user email
include('files/emails.php');

//Change blog email and admin user email
include('files/edit-page-info.php');

//Change H2 to H1 in current theme
include('files/h2toh1.php');

//Misc items - blogroll, feed summary, blog tagline
include('files/misc.php');

//Add sitemap page
include('files/sitemap-page.php');

//Add robots.txt file
include('files/robots.php');

?>



<p><?php echo $cat_set; ?></p>

</form>


</div>
