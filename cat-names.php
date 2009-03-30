<?php
// Change category information
$cat_set = "<input type=\"submit\" class=\"button\" name=\"submit\" value=\"Change common defaults automatically.\" />";
$cat_post_name = "<input type=\"checkbox\" name=\"d_post\" value=\"ON\" checked> Change default post category name to: <input type=\"text\" name=\"cat_1\" size=\"20\" value=\"General\" /><br />";
$cat_blogroll_name = "<input type=\"checkbox\" name=\"d_blogroll\" value=\"ON\" checked> Change default blogroll category name to: <input type=\"text\" name=\"cat_2\" size=\"20\" value=\"Related\" /><br />";


if ($_REQUEST['action'] == "changecore") {

$cat_1 = $_REQUEST['cat_1'];
$cat_2 = $_REQUEST['cat_2'];
$cat_1_nice = str_replace(" ", "-", $cat_1);
$cat_2_nice = str_replace(" ", "-", $cat_2);
$cat_1_nice = strtolower($cat_1);
$cat_2_nice = strtolower($cat_2);

//Set the default post category name
if ((isset($_POST['submit'])) && ($_REQUEST['d_post'] == "ON")) { 
	$default_cat_setting = array('cat_ID'=>'1',
		'cat_name'=>$cat_1,
		'category_nicename'=>$cat_1_nice,
		'category_parent'=>'-1',
		'category_description'=>'');
	if ( wp_update_category($default_cat_setting) )
		$cat_set1 = "Default post category is set to ".$cat_1;
	else
		$cat_set1 = "Default category is not changed. You either do not have sufficient permission as an admin user or an error has occured.";
} else {
	$cat_set1 = "The default post category name was not selected to be changed.";
}

//Set the default blogroll name
if ((isset($_POST['submit'])) && ($_REQUEST['d_blogroll'] == "ON")) {
	$default_cat_setting = array('cat_ID'=>'2',
		'cat_name'=>$cat_2,
		'category_nicename'=>$cat_2_nice,
		'category_description'=>'');
	if ( wp_update_category($default_cat_setting) )
		$cat_set2 = "Default link category is set to ".$cat_2;
	else
		$cat_set2 = "Default category is not changed. You either do not have sufficient permission as an admin user or an error has occured.";
} else {
	$cat_set2 = "The default blogroll category name was not selected to be changed.";
}

$cat_set = "Changes are done!";
$cat_post_name = "";
$cat_blogroll_name = "";
}

?>