<?php
if (($_REQUEST['action'] == "changecore") && ($_REQUEST['default_comment_status'] == "ON")) {
	if ( !update_option('default_comment_status','closed') ) {
		echo "<p>Commenting could not be turned off. Perhaps it already is?</p>";
	} else {
		echo "<p>Commenting has been turned off.</p>";
	}
} elseif (($_REQUEST['action'] == "changecore") && ($_REQUEST['default_comment_status'] != "ON")) {
	echo "<p>Posting to comments has not been changed.</p>";
} else {
?>
<p><input name="default_comment_status" type="checkbox" value="ON" checked /> <?php _e('Do not allow people to post comments on the article') ?></p>
<?php } ?>