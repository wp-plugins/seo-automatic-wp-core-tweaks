<?php
$parent_file = 'options-general.php';
$home_path = get_home_path();
global $wp_rewrite;
	if (($_REQUEST['action'] == "changecore") && ($_REQUEST['permchange'] == "ON")) :
	if ( isset($_POST['permalink_structure']) ) {
		//check_admin_referer('update-permalink');

		if ( isset($_POST['permalink_structure']) ) {
			$permalink_structure = $_POST['permalink_structure'];
			if (! empty($permalink_structure) )
				$permalink_structure = preg_replace('#/+#', '/', '/' . $_POST['permalink_structure']);
			$wp_rewrite->set_permalink_structure($permalink_structure);
		}
	}

	$permalink_structure = get_option('permalink_structure');

	if ( (!file_exists($home_path.'.htaccess') && is_writable($home_path)) || is_writable($home_path.'.htaccess') )
		$writable = true;
	else
		$writable = false;

	if ($wp_rewrite->using_index_permalinks())
		$usingpi = true;
	else
		$usingpi = false;

	$wp_rewrite->flush_rules();
endif; 
?>

<?php if (($_REQUEST['action'] == "changecore") && ($_REQUEST['permchange'] == "ON")) : ?>
<div id="message"><p><?php
$perm_ran = "YES";
if ( $permalink_structure && !$usingpi && !$writable )
	$fail .= '<li><b><font color="#FF0000">You should update your .htaccess now for the permalink structure to take effect.</font></b></li>';
else
	$success .= '<li>Permalink structure updated.</li>';
?></p></div>
<?php endif; ?>
<?php wp_nonce_field('update-permalink') ?>

<?php
$prefix = '';

if ( ! got_mod_rewrite() )
	$prefix = '/index.php';

$structures = array(
	'',
	$prefix . '/%year%/%monthnum%/%day%/%postname%/',
	$prefix . '/%year%/%monthnum%/%postname%/',
	$prefix . '/archives/%post_id%'
	);
?>

<?php if ($_REQUEST['action'] != "changecore") :  
	$options .= '<li><input type="hidden" name="selection" value="custom" class="tog" checked /><input type="checkbox" name="permchange" value="ON" checked> Change permalink structure to custom setting: <input type="text" size="40" name="permalink_structure" value="/%postname%/" /></li>';
	$options .= '<li><small><b><font color="#ff0000">Using this option will change existing permalink settings. If you\'ve used it unintentionally, you can change the setting back <a href="options-permalink.php">here</a>. We\'ve checked this box by default because it\'s important, but if your .htaccess file is not writable, then you\'ll get an error message telling you so. If you do get the error message, there\'s no harm done, but your permalinks will not be changed and you should make the file writable and try again.</font></b></small></li>';
	endif; ?>

	<?php if ( $permalink_structure && !$usingpi && !$writable ) : 
	  $fail .= '<li>If your <code>.htaccess</code> file were <a href="http://codex.wordpress.org/Changing_File_Permissions">writable</a>, we could do this automatically, but it isn&#8217;t so these are the mod_rewrite rules you should have in your <code>.htaccess</code> file. Click in the field and press <kbd>CTRL + a</kbd> to select all.	<form action="options-permalink.php" method="post">'.wp_nonce_field('update-permalink').'<p><textarea rows="5" style="width: 98%;" name="rules" id="rules">'.wp_specialchars($wp_rewrite->mod_rewrite_rules()).'</textarea></p></form></li>';
	 endif; ?>
<?php if (($_REQUEST['action'] == "changecore") && ($perm_ran != "YES") && ($_REQUEST['permchange'] != "ON")) { 
$notused .= "<li>Change permalinks.</li>";
 } 

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li>&nbsp;</li>';
}
 ?>