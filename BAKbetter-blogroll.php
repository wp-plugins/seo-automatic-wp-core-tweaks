<?php
function add_nofollow_chkbox_content_1(){
	add_meta_box('nofo','Set rel= to nofollow','add_nofollow_chkbox_content','link','side');
}
function xfn_external_check($class, $value = '', $deprecated = '') {
	global $link;

	$link_rel = isset( $link->link_rel ) ? $link->link_rel : ''; // In PHP 5.3: $link_rel = $link->link_rel ?: '';
	$rels = preg_split('/\s+/', $link_rel);

	if ('' != $value && in_array($value, $rels) ) {
		$checkmark = ' checked';
		return $checkmark;
	}
}
function add_nofollow_chkbox_content(){
	echo '<label for="nofo"><input class="valinp" type="checkbox" name="nofo" value="nofollow" id="nofo"'.xfn_external_check('nofo', 'nofollow').$checkmark.' />nofollow</label>';
}



if(is_admin()){
	add_action('admin_menu', 'add_nofollow_chkbox_content_1');
}

function widget_betterblogroll_init() {

if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') ) 
		return;
		
		function widget_betterblogroll($args) {
		
			// "$args is an array of strings that help widgets to conform to
			// the active theme: before_widget, before_title, after_widget,
			// and after_title are the array keys." - These are set up by the theme
			extract($args);
			// These are our own options
			$options = get_option('widget_betterblogroll');
			$bbw_title = $options['title'];  // Title in sidebar for widget
			$bbw_number = $options['show'];  // # of Posts we are showing
			$bbw_explanation = $options['explanation']; //Using this to control new tab
			$bbw_use_cat = $options['use_cat'] ? '1': '0';//should the category be shown in the list?
			$bbw_limit_cat=$options['limit_cat']; //Limit the blogroll to a particular category
			$bbw_limit_cat_not=$options['limit_cat_not'] ? 'NOT': ''; //saying NOT in query
			$bbw_clean_limit_cat = implode ("','",explode(",",$bbw_limit_cat));
			$bbw_use_images = $options['use_images'] ? '1': '0';//should the link's image be shown?
			$bbw_use_link_name = $options['use_link_name'] ? '1': '0';//should the link name be shown in the list?
			$bbw_use_nofollow = $options['use_nofollow'];//If links are not trusted (paid links), they can be set to nofollow.
			$all_nofollow_links = $bbw_use_nofollow;
			$new_tab = $bbw_explanation;
			if (!$bbw_number || $bbw_number<1) $bbw_number = 10;
			if (!$bbw_title) $bbw_title = 'Links(Extended)';
			$bbw_use_link_name = 1;
		// Output
			
			global $wpdb;
			if ($bbw_limit_cat){
				$querystr = "SELECT DISTINCT link_url, name, link_name, link_target, link_image, link_description, link_rel FROM $wpdb->links INNER JOIN ($wpdb->term_relationships INNER JOIN( $wpdb->terms INNER JOIN $wpdb->term_taxonomy ON $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id) ON $wpdb->term_taxonomy.term_taxonomy_id=$wpdb->term_relationships.term_taxonomy_id)ON $wpdb->links.link_id=$wpdb->term_relationships.object_id WHERE $wpdb->term_taxonomy.taxonomy='link_category' AND $wpdb->links.link_visible = 'Y' AND $wpdb->terms.name $bbw_limit_cat_not IN ('$bbw_clean_limit_cat') ORDER BY rand() LIMIT $bbw_number";	
			}else{
				$querystr = "SELECT DISTINCT link_url, name, link_name, link_target, link_image, link_description, link_rel FROM $wpdb->links INNER JOIN ($wpdb->term_relationships INNER JOIN( $wpdb->terms INNER JOIN $wpdb->term_taxonomy ON $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id) ON $wpdb->term_taxonomy.term_taxonomy_id=$wpdb->term_relationships.term_taxonomy_id)ON $wpdb->links.link_id=$wpdb->term_relationships.object_id WHERE $wpdb->term_taxonomy.taxonomy='link_category' AND $wpdb->links.link_visible = 'Y' ORDER BY rand() LIMIT $bbw_number";	
			}	
			$bbwlinks = $wpdb->get_results($querystr, OBJECT);
			
			echo $before_widget . $before_title . $bbw_title . $after_title;

			echo '<ul>';
			if (!empty($bbwlinks)) {
				
				foreach ($bbwlinks as $bbwlink) {
					$bbw_link_url = $bbwlink->link_url;
					$bbw_link_cat = $bbwlink->name;
					$bbw_link_name = $bbwlink->link_name;
					$bbw_link_desc = $bbwlink->link_description;
					$bbw_link_image = $bbwlink->link_image;
					$bbw_link_target = $bbwlink->link_target;
					$bbw_link_rel = $bbwlink->link_rel;
echo "<br />".$new_tab."<br />";
					echo '<li><a';
					if (($bbw_use_nofollow == '1') || ($all_nofollow_links == '1')) {
						echo ' rel="nofollow"';
					}elseif($bbw_link_rel){
						echo ' rel="'.$bbw_link_rel.'"';
					}else{
					}
					if ($new_tab == '1') {
						echo ' target="_blank"';
					}elseif($bbw_link_target){
						echo ' target="'.$bbw_link_target.'"';
					}else{
					}
					if ($bbw_explanation){
						echo ' target="_blank"';}
					echo ' href="'.$bbw_link_url.'" title="'.$bbw_link_desc.'">';
					if (($bbw_use_images)&&($bbw_link_image)){
						echo '<img src="'.$bbw_link_image.'" alt="Click to visit '.$bbw_link_name.'" /><br />';}
					if ($bbw_use_link_name){
						echo $bbw_link_name;}
					echo '</a>';
					if ($bbw_use_cat) {echo ' <small>('.$bbw_link_cat.')</small>';}
					echo '</li>';
				}
			} else echo "<li>No Blogroll Links</li>";
			echo '</ul>';
			echo $after_widget;
		}


		// Settings form
	function widget_betterblogroll_control() {
		// Get options
		$options = get_option('widget_betterblogroll');
		// options exist? if not set defaults
		if ( !is_array($options) )
			$options = array('title'=>'', 'show'=>10);
		
		// form posted?
		if ( $_POST['betterblogroll-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['title'] = strip_tags(stripslashes($_POST['betterblogroll-title']));
			$options['show'] = strip_tags(stripslashes($_POST['betterblogroll-show']));
			$options['explanation'] = isset($_POST['betterblogroll-explanation']);
			$options['use_cat'] = isset($_POST['betterblogroll-use_cat']);
			$options['limit_cat'] = strip_tags(stripslashes($_POST['betterblogroll-limit_cat']));
			$options['limit_cat_not'] = isset($_POST['betterblogroll-limit_cat_not']);
			$options['use_images'] = isset($_POST['betterblogroll-use_images']);
			$options['use_link_name'] = isset($_POST['betterblogroll-use_link_name']);
			$options['use_nofollow'] = isset($_POST['betterblogroll-use_nofollow']);
			update_option('widget_betterblogroll', $options);
		}

		// Get options for form fields to show
		$bbw_title = htmlspecialchars($options['title'], ENT_QUOTES);
		$bbw_number = htmlspecialchars($options['show'], ENT_QUOTES);
		$bbw_explanation = $options['explanation'] ? 'checked="checked"' : '';
		$bbw_use_cat = $options['use_cat'] ? 'checked="checked"' : '';
		$bbw_limit_cat = htmlspecialchars($options['limit_cat'], ENT_QUOTES);
		$bbw_limit_cat_not = $options['limit_cat_not'] ? 'checked="checked"' : '';
		$bbw_use_images = $options['use_images'] ? 'checked="checked"' : '';
		$bbw_use_link_name = $options['use_link_name'] ? 'checked="checked"' : '';
		$bbw_use_nofollow = $options['use_nofollow'] ? 'checked="checked"' : '';
		// The form fields
		echo '<p style="text-align:left;">
				<label for="betterblogroll-title">' . __('Title:') . ' 
				<input style="width: 200px;" id="betterblogroll-title" name="betterblogroll-title" type="text" value="'.$bbw_title.'" />
				</label></p>';
		echo '<p style="text-align:left;">
				<label for="betterblogroll-show">' . __('Number of Links to Show:') . ' 
				<input style="width: 25px;" id="betterblogroll-show" name="betterblogroll-show" type="text" value="'.$bbw_number.'" />
				</label></p>';
		/*echo '<p style="text-align:left;">
				<label for="betterblogroll-use_link_name">' . __('Show Text Links?:') . ' 
				<input class="checkbox" type="checkbox" '.$bbw_use_link_name.' id="betterblogroll-use_link_name" name="betterblogroll-use_link_name" />
				</label></p>';*/
		echo '<p style="text-align:left;">
				<label for="betterblogroll-use_images">' . __('Show Images?:') . ' 
				<input class="checkbox" type="checkbox" '.$bbw_use_images.' id="betterblogroll-use_images" name="betterblogroll-use_images" />
				</label></p>';
		echo '<p style="text-align:left;">
				<label for="betterblogroll-use_cat">' . __('Show Link Categories?:') . ' 
				<input class="checkbox" type="checkbox" '.$bbw_use_cat.' id="betterblogroll-use_cat" name="betterblogroll-use_cat" />
				</label></p>';
		echo '<p style="text-align:left;">
				<label for="betterblogroll-limit_cat">' . __('Show Only Links From These Categories:<br/>(comma separated, blank for all)') . ' 
				<input style="width: 200px; id="betterblogroll-limit_cat" name="betterblogroll-limit_cat" type="text" value="'.$bbw_limit_cat.'" />
				</label></p>';
		echo '<p style="text-align:left;">
				<label for="betterblogroll-limit_cat_not">' . __('Check Here To Hide The Above Categories:') . ' 
				<input class="checkbox" type="checkbox" '.$bbw_limit_cat_not.' id="betterblogroll-limit_cat_not" name="betterblogroll-limit_cat_not" />
				</label></p>';
		echo '<p style="text-align:left;">
				<label for="betterblogroll-explanation">' . __('Open links in a new tab/window?:') . ' 
				<input class="checkbox" type="checkbox" '.$bbw_explanation.' id="betterblogroll-explanation" name="betterblogroll-explanation" />
				</label></p>';
		echo '<p style="text-align:left;">
				<label for="betterblogroll-use_nofollow">' . __('Set Links To Nofollow?:') . ' 
				<input class="checkbox" type="checkbox" '.$bbw_use_nofollow.' id="betterblogroll-use_nofollow" name="betterblogroll-use_nofollow" />
				</label></p>';
		
		echo '<input type="hidden" id="betterblogroll-submit" name="betterblogroll-submit" value="1" />';
	}
	
	// Register widget for use
	//register_sidebar_widget(array('Links(Extended)', 'widgets'), 'widget_betterblogroll');

	// Register settings for use, 300x500 pixel form
	//register_widget_control(array('Links(Extended)', 'widgets'), 'widget_betterblogroll_control', 325, 350);

	blogroll_extended_register();
}

function blogroll_extended_register() {
	unregister_sidebar_widget('links');

	if ( !$options = get_option('links-1') )
		$options = array();

	$widget_ops = array('classname' => 'widget_betterblogroll', 'description' => __( 'Links - Extended version' ));
	$control_ops = array('width' => 400, 'height' => 200);
	$name = __('Links(Extended)');
	$id = false;
	foreach ( array_keys($options) as $o ) {
		// Old widgets can have null values for some reason
		if ( !isset($options[$o]['url']) || !isset($options[$o]['title']) || !isset($options[$o]['items']) )
			continue;
		$id = "links-$o"; // Never never never translate an id
		wp_register_sidebar_widget($id, $name, 'widget_betterblogroll', $widget_ops, array( 'number' => $o ));
		wp_register_widget_control($id, $name, 'widget_betterblogroll_control', $control_ops, array( 'number' => $o ));
	}

	// If there are none, we register the widget's existance with a generic template
	if ( !$id ) {
	wp_register_sidebar_widget( 'links-1', $name, 'widget_betterblogroll', $widget_ops, array( 'number' => -1 ) );
	wp_register_widget_control( 'links-1', $name, 'widget_betterblogroll_control', $control_ops, array( 'number' => -1 ) );
	}
}
?>