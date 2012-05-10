<?php
// Change category information
global $wpdb;
//Set the default post category name
if ($_REQUEST['action'] == "changecore") {
	$cat_1 = $_REQUEST['cat_1'];
	$cat_1_nice = str_replace(" ", "-", $cat_1);
	$cat_1_nice = strtolower($cat_1_nice);
	if ((isset($_POST['submit'])) && ($_REQUEST['d_post'] == "ON")) { 
		$default_cat_setting = array('cat_ID'=>'1',
			'cat_name'=>$cat_1,
			'category_nicename'=>$cat_1_nice,
			'category_parent'=>'-1',
			'category_description'=>'');
		if ( wp_update_category($default_cat_setting) )
			$success .= "<li>Default post category is set to ".$cat_1."</li>";
		else
			$success .= "<li>Default post category is set to ".$cat_1."</li>";
			//$fail .= "<li>Default category is not changed. You either do not have sufficient permission as an admin user or an error has occured.</li> ";
	} else {
		$notused .= "<li>Change default post category name.</li>";
	} 
} else {
		$options .= "<li><input type=\"checkbox\" name=\"d_post\" value=\"ON\" checked> Change default post category name from \"uncategorized\" to: <input type=\"text\" name=\"cat_1\" size=\"20\" value=\"General\" /></li>";
}


//Set the default blogroll name
if ($_REQUEST['action'] == "changecore") {
	$cat_2 = $_REQUEST['cat_2'];
	$cat_2_nice = str_replace(" ", "-", $cat_2);
	$cat_2_nice = strtolower($cat_2_nice);
	if ((isset($_POST['submit'])) && ($_REQUEST['d_blogroll'] == "ON")) {
		$default_cat_setting = array('cat_ID'=>'2',
			'cat_name'=>$cat_2,
			'category_nicename'=>$cat_2_nice,
			'category_description'=>'');
		if ( wp_update_category($default_cat_setting) ) {
			$success .= "<li>Default link category is set to ".$cat_2."</li>";
		}	else {
			$success .= "<li>Default link category is set to ".$cat_2."</li>";
			//$fail .= "<li>Default category is not changed. You either do not have sufficient permission as an admin user or an error has occured.</li>";
		}
	} else {
		$notused .= "<li>Change default blogroll category name.</li>";
	} 
} else {
	$options .= "<li><input type=\"checkbox\" name=\"d_blogroll\" value=\"ON\" checked> Change default blogroll category name from \"blogroll\" to: <input type=\"text\" name=\"cat_2\" size=\"20\" value=\"Related\" /></li>";
}
?>