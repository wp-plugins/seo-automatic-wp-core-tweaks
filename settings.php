<?php
include('thisplugin.php');
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
<h3><span><img src="<?php echo plugins_url(); ?>/seo-automatic-wp-core-tweaks/images/favicon.ico" alt="SEO Automatic" /> Core Tweaks Admin</span></h3>
<div class="inside">
<?php

global $current_user;
get_currentuserinfo();
	if (!current_user_can('level_10'))
		wp_die(__('<p>Using the username "admin" is unwise, and in fact so dangerous, that we at SEOAutomatic.com simply can\'t allow you to continue to our "perfect setup" from here without a warning.</p><p>For security purposes, please create a new admin user and log in with that name. If you\'re SMART, then you\'ll delete the user "admin" altogether so you don\'t get your site hacked.</p><p>If you skip this step, and blow off use of our plugin, don\'t say we didn\'t warn you!</p>'));

//Set category names
include('cat-names.php');

//Uncheck organize by month/year
include('org-uploads.php');

//Set feeds to summary
include('feed-display.php');

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><br /></li>';
}

//Set permalink structure - SKIPPED, COME BACK AND DO!
include('permalinks.php');

//Add sitemap page
include('sitemap-page.php');

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><br /></li>';
}

//Add privacy policy
include('privacy-policy.php');

//Add contact page
include('contact.php');

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><br /></li>';
}

//Remove default post
include('d-post.php');

//Set to not allow people to comment
include('user-comments.php');

//Remove default comment
include('d-comment.php');

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><br /></li>';
}

//Change blog email and admin user email
include('emails.php');

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><br /></li>';
}

//Change blog email and admin user email
include('edit-page-info.php');

//Blog tagline
include('tagline.php');

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><br /></li>';
}

//Blogroll
//REMOVED, BUT INCLUDED HIDDEN TO ALLOW IMPORT TO CONTINUE WORKING
include('blogroll.php');

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><br /></li>';
}

//Meta version
include('metaversion.php');

//Remote publishing
include('remote-publishing.php');

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><br /></li>';
}

//Add robots.txt file
include('robots.php');

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><br /></li>';
}

//Add footer info
include('add-footer.php');

//Add error reporting
if ($_REQUEST['action'] != "changecore") {
	$options .= '<li>&nbsp;</li><li><b><font color="#ff0000"><u>Error Reporting:</u></font></b> <small><b>(Off by default.)</b></small></li>';
	$options .= '<li><small><b>(If turned on, this will force showing <font color="#ff0000"><u>ALL</u></font> errors caused by <font color="#ff0000"><u>ALL</u></font> plugins and theme functions.<br />This is best used in debugging situations.)</b></small></li>';
}
include('error-report.php');

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li>&nbsp;</li><li>&nbsp;</li><li><b><br /><font color="#ff0000"><u>Advanced:</u></font><br /></b></li>';
}

//Try to create uploads folder and set to 777
//REMOVE, BUT STILL INCLUDED HIDDEN TO ALLOW IMPORT TO CONTINUE WORKING
include('uploads.php');

//Change Add H1 Hack
if ($_REQUEST['action'] != "changecore") {
	$options .= '<li>&nbsp;</li><li><b>H1 Hack: <small><font color="#ff0000">As of November 2010 we have removed the ability to change your H1 tag for a page or post, due to incompatibilities with the default WP 2010 theme. However, this can now be accomplished easily through use of WordPress custom menus.</font></small></b></li><li><br /></li>';
	//<b><font color="#ff0000">Your theme files must have at least 766 file permission.</font><br />Premium WordPress themes sometimes have programmed "SEO options" that may prevent these items from working properly. Please consult your theme provider for support.</b></li>
}
//include('h1hack.php');

//Change H2 to H1 in current theme
include('h2toh1.php');


//Turn plugins on or off
include('plugins-on-off.php');


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
	var x=document.getElementById('corechanges');
	for (var i=0;i<x.length;i++)
	  {
		if (x.elements[i].value.toLowerCase() == 'on') {
			document.corechanges.elements[i].checked = 0;
			document.corechanges.elements[i].value = 'OFF';
		}
		if (x.elements[i].value.toLowerCase() == 'off') {
			document.corechanges.elements[i].checked = 0;
		}	  
	}
}
</script>

<?php if (($_REQUEST['action'] != "changecore") && ($_REQUEST['action'] != "pluginsonoff")) { ?>
<p>The steps and actions on this page are primarily used for a brand new WP setup, and are based on an employee checklist from <a href="http://www.pdxtc.com/wpblog/wordpress/wordpress-checklist-now-a-plug-in/" target="_blank" rel="nofollow">Search Commander, Inc.</a></p>
<p>This plugin is designed to compliment, not replace, either the <a href="http://wordpress.org/extend/plugins/all-in-one-seo-pack/" target="_blank" rel="nofollow">All in one SEO pack</a> or <a href="http://wordpress.org/extend/plugins/headspace2/" target="_blank" rel="nofollow">Headspace plugin</a>, but you should have no 
other plugins active while running the SEO Automatic Core Tweaks process.</p>
<p>We also work very well with the definitive plugin for professional SEOs by Joost de Valk, his <a href="http://wordpress.org/extend/plugins/wordpress-seo/" target="_blank">"Wordpress SEO plugin"</a>.</p>
<p>To see a short video of how to use this plugin, <a href="http://www.seoautomatic.com/plugins/wp-core-tweaks/" target="_blank">click here</a> and if you need support, please <a href="http://www.seoautomatic.com/forum/wp-tweak-plugin/" target="_blank">visit the forum</a> (which should be pretty empty since our stuff works).</p>
<p>
<b>READ ME FIRST:</b>
<p>After running these processes, there will be a couple of new things added to the WordPress admin screen that you'll find handy.</p>
<ol>
	<li>Your RSS widget - Under Appearance &gt; Widgets you'll notice that we have enhanced it, allowing you to nofollow the links or to open them in a new window.</li>
	<li>If you use the options below to create contact or privacy pages, any future edits will be done in the pages &gt; edit screen as usual.</li>
	<li>Permalink structure:
	<p>One of the important things you'll want to do is change the default permalink structure so we've left it on by default. In order for our plug-in to be able to do that for you, the .htaccess file must be writable, so if you get a permalinks error message, and do not know how to change your permissions for .htaccess, then ask your webhost. No harm is done with an error message.</p></li>
</ol>
<p><b>Unchecked Default Options:<br>
</b>There are many options below that are not checked, but if you know what you're doing, many are likely something you plan to do anyway.</p>
<p>Note at the very bottom, there is one THEME SPECIFIC change available to change your H2 tags to H1's. This is UNchecked by default, because most new themes will allow this. However, if you need to use it, note the the permissions of your theme pages: single.php and page.php files must be 766.</p>

<b>Import your own Core Tweaks Setup File or export the existing settings below.</b><br />
<div id="nonieimport" style="display: none;"><input type="file" id="nonieimportfile" name="file" /> 
<span class="readBytesButtons">
  <button>Import</button>
</span></div>

<div id="ieimport" style="display: none;"><input type="file" id="ieimportfile" name="file" /> 
<span class="readIEBytesButtons">
  <input type="button" value="Import" id="button-ie">
</span></div>

<script>
function bindEvent(el, eventName, eventHandler) {
  if (el.addEventListener){
    el.addEventListener(eventName, eventHandler, false); 
  } else if (el.attachEvent){
    el.attachEvent('on'+eventName, eventHandler);
  }
}
if (window.File && window.FileReader && window.FileList && window.Blob) {
  function readBlob(opt_startByte, opt_stopByte) {

    var files = document.getElementById('nonieimportfile').files;
    if (!files.length) {
      alert('Please select a file!');
      return;
    }

    var file = files[0];
    var start = parseInt(opt_startByte) || 0;
    var stop = parseInt(opt_stopByte) || file.size - 1;

    var reader = new FileReader();

    // If we use onloadend, we need to check the readyState.
    reader.onloadend = function(evt) {
      if (evt.target.readyState == FileReader.DONE) { // DONE == 2
		var t = new Array();
		var t = evt.target.result.split(',');
		var x=document.getElementById('corechanges');
		for (var i=0;i<x.length;i++)
		  {
			x.elements[i].value = t[i];
			if (x.elements[i].value.toLowerCase() == 'on') {
				document.corechanges.elements[i].checked = 1;
			}
			if (x.elements[i].value.toLowerCase() == 'off') {
				document.corechanges.elements[i].checked = 0;
			}
		  }
      }
    };
    if (file.webkitSlice) {
      var blob = file.webkitSlice(start, stop + 1);
    } else if (file.mozSlice) {
      var blob = file.mozSlice(start, stop + 1);
    }
    reader.readAsBinaryString(blob);
  }
  
  document.querySelector('.readBytesButtons').addEventListener('click', function(evt) {
    if (evt.target.tagName.toLowerCase() == 'button') {
      var startByte = evt.target.getAttribute('data-startbyte');
      var endByte = evt.target.getAttribute('data-endbyte');
      readBlob(startByte, endByte);
    }
  }, false);
  toggle_visibility('nonieimport');
} else {
	function readFileInIE(filePath) {
		try {
			var fso = new ActiveXObject("Scripting.FileSystemObject");
			
			var file = fso.OpenTextFile(filePath, 1);
			
			var fileContent = file.ReadAll();

			file.Close();

			var t = new Array();
			var t = fileContent.split(',');
			var x=document.getElementById('corechanges');

			for (var i=0;i<x.length;i++)
			  {
				x.elements[i].value = t[i];
				if (x.elements[i].value.toLowerCase() == 'on') {
					x.elements[i].checked = 1;
				}
				if (x.elements[i].value.toLowerCase() == 'off') {
					x.elements[i].checked = 0;
				}
			  }
		 } catch (e) {
			if (e.number == -2146827859) {
				alert('Unable to access local files due to browser security settings. Our suggestion is to use FireFox or Chrome browsers instead. If one of those browsers are unavailable to you, go to Tools->Internet Options->Security->Custom Level. ' + 
					'Find the setting for "Initialize and script ActiveX controls not marked as safe" and change it to "Enable" or "Prompt"'); 
			}
		}
	}   
	bindEvent(document.getElementById('button-ie'), 'click', function () {
	  readFileInIE(document.getElementById('ieimportfile').value);
	});
	toggle_visibility('ieimport');
}
function toggle_visibility(id) {
   var e = document.getElementById(id);
   if(e.style.display == 'block')
	  e.style.display = 'none';
   else
	  e.style.display = 'block';
}
</script>

<p><!--<a href="javascript: CheckAll();">Select All</a> | --><a href="javascript: UncheckAll();">Deselect All</a></p>

<p><form name="corechanges" id="corechanges" method="post" action="" class="validate">
<input type="hidden" name="action" value="changecore" />

<ul><?php echo $options; ?></ul>

<p><input type="submit" class="button" name="submit" value="Make the Changes." /></p>

</form>

<p><!--<a href="javascript: CheckAll();">Select All</a> |--><a href="javascript: UncheckAll();">Deselect All</a></p>
<?php 
$main_dir = wp_upload_dir(); 
$upload_dir = $main_dir['basedir'];
$download_dir = $main_dir['baseurl'];
$dir_writable = substr(sprintf('%o', fileperms($upload_dir)), -4) == "0777" ? "true" : "false";
if($dir_writable == "false") { 
	echo '<b><font color="#ff0000">Export Disabled: Your uploads folder must exist and be writable with 777 permission to create an export.</font></b>';
} else {
	if ($_GET['type'] == 'export') {
		$exportFile = $upload_dir.'/seoauto-coretweaks.csv';
		$fh = fopen($exportFile, 'w') or die("Your uploads folder must exist and be writable to create an export of your settings.");
		fwrite($fh, $_GET['data']);
		fclose($fh);
	?>
		<a id="downloadLink" href="<?php echo $download_dir; ?>/seoauto-coretweaks.csv"> </a>
<?php } ?>
	<script type="text/javascript">
	var t = new Array();
	function export_coretweaks() {
		var x=document.getElementById('corechanges');
		for (var i=0;i<x.length;i++)
		  {
			if (x.elements[i].value == "ON" || x.elements[i].value == "OFF") {
				if (x.elements[i].checked == true) {
					x.elements[i].value = "ON";
				}
				if (x.elements[i].checked == false) {
					x.elements[i].value = "OFF";
				}
			}
			t.push(x.elements[i].value);
		  }
		uriContent = "data:text/csv," + encodeURIComponent(t);
		location.href = "admin.php?page=seo-automatic-wp-core-tweaks/settings.php&type=export&data=" + encodeURIComponent(t);

	}
	</script>
	<form id="coretweaks-export">
	<input type="button" class="button" value="Export Settings" onclick="export_coretweaks()" /> (Import settings from another site at the top of this page.)
	</form>
<?php } ?>
</div></div>
<script>
function setCheckedRight(eid) {
	if (document.getElementById(eid).value == 'ON') {
		document.getElementById(eid).value = 'OFF';
	} else {
		document.getElementById(eid).value = 'ON';
	}
}
</script>

<div id="main-admin-box" class="postbox">
<h3><span><img src="<?php echo plugins_url(); ?>/seo-automatic-wp-core-tweaks/images/favicon.ico" alt="SEO Automatic" /> Activate or Deactivate Included Plugins</span><div style="float: right;margin-top: -5px;"><input class="button" type="button" onclick="toggle_visibility('pluginssection');" value="Show/Hide"></div></h3>
<div class="inside" id="pluginssection">
<p><form name="pluginsonoff" id="pluginsonoff" method="post" action="" class="validate">
<input type="hidden" name="action" value="pluginsonoff" />

<ul><?php echo $options2; ?></ul>

<p><input type="submit" class="button" name="submit" value="Set Plugins" /></p>

</form>
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

<?php if ($_REQUEST['action'] != "pluginsonoff") { ?>
<div id="unused" class="postbox">
<h3><span>Options not chosen:</span></h3>
<div class="inside">
<ul><?php echo $notused; ?></ul>
</div></div>
<?php } ?>
<?php } ?>

</div></div>

<?php include('seoauto-sidebar.php'); ?>

<div class="clear"></div>
</div><!-- dashboard-widgets-wrap -->

</div></div><!-- wrap -->
<?php 
function send_user_file() {
	$main_dir = wp_upload_dir(); 
	$upload_dir = $main_dir['basedir'];
	$dir_writable = substr(sprintf('%o', fileperms($upload_dir)), -4) == "0777" ? "true" : "false";
	if($dir_writable == "true" && $_REQUEST['type'] == 'export') { 
		?><script>document.getElementById('downloadLink').click();</script>
	<?php }
}
add_action(shutdown, 'send_user_file');
?>