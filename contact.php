<?php
// Add the sitemap page for ddsitemap generator
	global $wpdb;

if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['contact_page'] == "ON") {
$contact_email = str_replace('@', ' (at) ', $_REQUEST['contact_email']);
if ($_REQUEST['contact_name'] != '') { $c_page_data = '<b>'.$_REQUEST['contact_name'].'</b><br />'; }
if ($_REQUEST['contact_co_name'] != '') { $c_page_data .= '<b>'.$_REQUEST['contact_co_name'].'</b><br />'; }
if ($_REQUEST['contact_address'] != '') { $c_page_data .= $_REQUEST['contact_address'].'<br />'; }
if ($_REQUEST['contact_city'] != '') { $c_page_data .= $_REQUEST['contact_city'].', '; }
if ($_REQUEST['contact_state'] != '') { $c_page_data .= $_REQUEST['contact_state'].' '; }
if ($_REQUEST['contact_zip'] != '') { $c_page_data .= $_REQUEST['contact_zip'].'<br /><br />'; }
if ($_REQUEST['contact_phone'] != '') { $c_page_data .= '<b>Phone:</b> '.$_REQUEST['contact_phone'].'<br />'; }
if ($_REQUEST['contact_fax'] != '') { $c_page_data .= '<b>Fax:</b> '.$_REQUEST['contact_fax'].'<br />'; }
if ($_REQUEST['contact_email'] != '') { $c_page_data .= '<b>Email:</b> '.$contact_email.'<br /><br />'; }
if ($_REQUEST['contact_map'] == "ON") {
	$c_address = $_REQUEST['contact_address'].','.$_REQUEST['contact_city'].','.$_REQUEST['contact_state'].','.$_REQUEST['contact_zip'];
	$c_address = str_replace(' ', '+', $c_address);
	$c_map = '<div align="center"><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q='.$c_address.'&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q='.$c_address.'" style="color:#0000FF;text-align:left">View Larger Map</a></small></div>';
	$c_page_data .= $c_map;
}

$info = array(
'post_status' => 'publish', 
'post_type' => 'page',
'post_author' => 1,
'ping_status' => get_option('default_ping_status'), 
'post_parent' => 0,
'menu_order' => 0,
'to_ping' =>  '',
'pinged' => '',
'post_password' => '',
'guid' => '',
'post_content_filtered' => '',
'post_excerpt' => '',
'import_id' => 0,
'post_name' => 'contact',
'post_title' => 'Contact',
'post_content' => $c_page_data);

	if (wp_insert_post($info)) {

	  $wpdb->query($sql);
	  $post_id = $wpdb->insert_id;
	  $wpdb->query("UPDATE $wpdb->posts SET guid = '" . get_permalink($post_id) . "' WHERE ID = '$post_id'");

		$excludedPages = get_option('gdm_excluded_pages');
		$excludedPages[] = $post_id;
		update_option('gdm_excluded_pages', $excludedPages);
		wp_cache_delete('all_page_ids', 'pages');
		$success .= "<li>The contact page was created.</li>";
	} else {
		$fail .= "<li>The contact page was not able to be created.</li>";
	}
	} else {
		$notused .= "<li>Create contact page.</li>";
	}
} else {
	$options .= '<li><br /><input name="contact_page" type="checkbox" value="ON" /> Add a Contact Page using the following information:<br /> <small><b>* Do not use double quotes</b></small>
	<p>	Name <input type="text" name="contact_name" size="20" value=""> Company Name <input type="text" name="contact_co_name" size="20" value=""></p>
	<p>Address <input type="text" name="contact_address" size="55" value="">
	<br />City <input type="text" name="contact_city" size="20" value="">, State <input type="text" name="contact_state" size="5" value=""> Zip <input type="text" name="contact_zip" size="10" value="">
	<br /><input type="checkbox" name="contact_map" value="ON"> <small><b>Add a Google Map to this address</b></small></p>
	<p>Phone <input type="text" name="contact_phone" size="20" value=""> Fax <input type="text" name="contact_fax" size="20" value="">
	<br />Email <input type="text" name="contact_email" size="20" value=""></p></li>';
} 
?>