<?php
// EXTEND RSS FUNCTION SECTION
function wp_tabbed_rss($args, $widget_args = 1) {
	extract($args, EXTR_SKIP);
	if ( is_numeric($widget_args) )
		$widget_args = array( 'number' => $widget_args );
	$widget_args = wp_parse_args( $widget_args, array( 'number' => -1 ) );
	extract($widget_args, EXTR_SKIP);

	$options = get_option('tabbed_rss');

	if ( !isset($options[$number]) )
		return;

	if ( isset($options[$number]['error']) && $options[$number]['error'] )
		return;

	$url = $options[$number]['url'];
	while ( strstr($url, 'http') != $url )
		$url = substr($url, 1);
	if ( empty($url) )
		return;

	require_once(ABSPATH . WPINC . '/rss.php');

	$rss = fetch_rss($url);
	$link = clean_url(strip_tags($rss->channel['link']));
	while ( strstr($link, 'http') != $link )
		$link = substr($link, 1);
	$desc = attribute_escape(strip_tags(html_entity_decode($rss->channel['description'], ENT_QUOTES)));
	$title = $options[$number]['title'];
	if ( empty($title) )
		$title = htmlentities(strip_tags($rss->channel['title']));
	if ( empty($title) )
		$title = $desc;
	if ( empty($title) )
		$title = __('Unknown Feed');
	$title = apply_filters('widget_title', $title );
	$url = clean_url(strip_tags($url));
	if ( file_exists(dirname(__FILE__) . '/rss.png') )
		$icon = str_replace(ABSPATH, site_url() . '/', dirname(__FILE__)) . '/rss.png';
	else
		$icon = includes_url('images/rss.png');
	$title = "<a class='rsswidget' href='$url' target='_blank' title='" . attribute_escape(__('Syndicate this content')) ."'><img style='background:orange;color:white;border:none;' width='14' height='14' src='$icon' alt='RSS' /></a> <a class='rsswidget' href='$link' target='_blank' title='$desc'>$title</a>";

	echo $before_widget;
	echo $before_title . $title . $after_title;

	wp_tabbed_rss_output( $rss, $options[$number] );

	echo $after_widget;
}

function wp_tabbed_rss_output( $rss, $args = array() ) {
	if ( is_string( $rss ) ) {
		require_once(ABSPATH . WPINC . '/rss.php');
		if ( !$rss = fetch_rss($rss) )
			return;
	} elseif ( is_array($rss) && isset($rss['url']) ) {
		require_once(ABSPATH . WPINC . '/rss.php');
		$args = $rss;
		if ( !$rss = fetch_rss($rss['url']) )
			return;
	} elseif ( !is_object($rss) ) {
		return;
	}

	extract( $args, EXTR_SKIP );

	$items = (int) $items;
	if ( $items < 1 || 20 < $items )
		$items = 10;
	$show_summary  = (int) $show_summary;
	$summary_chars = (int) $summary_chars;
	$show_author   = (int) $show_author;
	$show_date     = (int) $show_date;
	$open_new_tab   = (int) $open_new_tab;
	$dont_follow    = (int) $dont_follow;

	if ($open_new_tab) {
		$give_new_tab = " target='_blank'";
	} else {
		$give_new_tab = '';
	}

	if ($dont_follow) {
			$give_nofollow = " rel='nofollow'";
	} else {
		$give_nofollow = '';
	}

	if ( is_array( $rss->items ) && !empty( $rss->items ) ) {
		$rss->items = array_slice($rss->items, 0, $items);
		echo '<ul>';
		foreach ($rss->items as $item ) {
			while ( strstr($item['link'], 'http') != $item['link'] )
				$item['link'] = substr($item['link'], 1);
			$link = clean_url(strip_tags($item['link']));
			$title = attribute_escape(strip_tags($item['title']));
			if ( empty($title) )
				$title = __('Untitled');
			$desc = '';
			$summary = '';
			if ( isset( $item['description'] ) && is_string( $item['description'] ) )
				$desc = $summary = str_replace(array("\n", "\r"), ' ', attribute_escape(strip_tags(html_entity_decode($item['description'], ENT_QUOTES))));
			elseif ( isset( $item['summary'] ) && is_string( $item['summary'] ) )
				$desc = $summary = str_replace(array("\n", "\r"), ' ', attribute_escape(strip_tags(html_entity_decode($item['summary'], ENT_QUOTES))));

			if ( $show_summary ) {
				$desc = '';
				$summary = wp_specialchars( $summary );
				if ( $summary_chars != '' && $summary_chars != 0 ) {
					$summary = substr($summary, 0, $summary_chars);
				}
				$summary = "<div class='rssSummary'>$summary</div>";
			} else {
				$summary = '';
			}

			$date = '';
			if ( $show_date ) {
				if ( isset($item['pubdate']) )
					$date = $item['pubdate'];
				elseif ( isset($item['published']) )
					$date = $item['published'];

				if ( $date ) {
					if ( $date_stamp = strtotime( $date ) )
						$date = ' <span class="rss-date">' . date_i18n( get_option( 'date_format' ), $date_stamp ) . '</span>';
					else
						$date = '';
				}
			}

			$author = '';
			if ( $show_author ) {
				if ( isset($item['dc']['creator']) )
					$author = ' <cite>' . wp_specialchars( strip_tags( $item['dc']['creator'] ) ) . '</cite>';
				elseif ( isset($item['author_name']) )
					$author = ' <cite>' . wp_specialchars( strip_tags( $item['author_name'] ) ) . '</cite>';
			}

			if ( $link == '' ) {
				echo "<li>$title{$date}{$summary}{$author}</li>"; 
			} else {
				echo "<li style=\"padding-bottom: 4px;\"><a class='rsswidget' href='$link'".$give_new_tab.$give_nofollow." title='$desc'>$title</a>{$date}{$summary}{$author}</li>"; 
			}
}
		echo '</ul>';
	} else {
		echo '<ul><li>' . __( 'An error has occurred; the feed is probably down. Try again later.' ) . '</li></ul>';
	}
}

function wp_tabbed_rss_control($widget_args) {
	global $wp_registered_widgets;
	static $updated = false;

	if ( is_numeric($widget_args) )
		$widget_args = array( 'number' => $widget_args );
	$widget_args = wp_parse_args( $widget_args, array( 'number' => -1 ) );
	extract($widget_args, EXTR_SKIP);

	$options = get_option('tabbed_rss');
	if ( !is_array($options) )
		$options = array();

	$urls = array();
	foreach ( $options as $option )
		if ( isset($option['url']) )
			$urls[$option['url']] = true;

	if ( !$updated && 'POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST['sidebar']) ) {
		$sidebar = (string) $_POST['sidebar'];

		$sidebars_widgets = wp_get_sidebars_widgets();
		if ( isset($sidebars_widgets[$sidebar]) )
			$this_sidebar =& $sidebars_widgets[$sidebar];
		else
			$this_sidebar = array();

		foreach ( $this_sidebar as $_widget_id ) {
			if ( 'wp_tabbed_rss' == $wp_registered_widgets[$_widget_id]['callback'] && isset($wp_registered_widgets[$_widget_id]['params'][0]['number']) ) {
				$widget_number = $wp_registered_widgets[$_widget_id]['params'][0]['number'];
				if ( !in_array( "rss-$widget_number", $_POST['widget-id'] ) ) // the widget has been removed.
					unset($options[$widget_number]);
			}
		}

		foreach( (array) $_POST['widget-rss'] as $widget_number => $tabbed_rss ) {
			if ( !isset($tabbed_rss['url']) && isset($options[$widget_number]) ) // user clicked cancel
				continue;
			$tabbed_rss = stripslashes_deep( $tabbed_rss );
			$url = sanitize_url(strip_tags($tabbed_rss['url']));
			$options[$widget_number] = wp_tabbed_rss_process( $tabbed_rss, !isset($urls[$url]) );
		}

		update_option('tabbed_rss', $options);
		$updated = true;
	}

	if ( -1 == $number ) {
		$title = '';
		$url = '';
		$items = 10;
		$error = false;
		$number = '%i%';
		$show_summary = 0;
		$summary_chars = 0;
		$show_author = 0;
		$show_date = 0;
		$open_new_tab = 0;
		$dont_follow = 0;
	} else {
		extract( (array) $options[$number] );
	}

	wp_tabbed_rss_form( compact( 'number', 'title', 'url', 'items', 'error', 'show_summary', 'summary_chars', 'show_author', 'show_date', 'open_new_tab', 'dont_follow' ) );
}

function wp_tabbed_rss_form( $args, $inputs = null ) {
	$default_inputs = array( 'url' => true, 'title' => true, 'items' => true, 'show_summary' => true, 'summary_chars' => true,  'show_author' => true, 'show_date' => true, 'open_new_tab' => true, 'dont_follow' => true );
	$inputs = wp_parse_args( $inputs, $default_inputs );
	extract( $args );
	$number = attribute_escape( $number );
	$title  = attribute_escape( $title );
	$url    = attribute_escape( $url );
	$items  = (int) $items;
	if ( $items < 1 || 20 < $items )
		$items  = 10;
	$show_summary   = (int) $show_summary;
	$summary_chars  = (int) $summary_chars;
	$show_author    = (int) $show_author;
	$show_date      = (int) $show_date;
	$open_new_tab   = (int) $open_new_tab;
	$dont_follow    = (int) $dont_follow;

	if ( $inputs['url'] ) :
?>
	<p>
		<label for="rss-url-<?php echo $number; ?>"><?php _e('Enter the RSS feed URL here:'); ?>
			<input class="widefat" id="rss-url-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][url]" type="text" value="<?php echo $url; ?>" />
		</label>
	</p>
<?php endif; if ( $inputs['title'] ) : ?>
	<p>
		<label for="rss-title-<?php echo $number; ?>"><?php _e('Give the feed a title (optional):'); ?>
			<input class="widefat" id="rss-title-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][title]" type="text" value="<?php echo $title; ?>" />
		</label>
	</p>
<?php endif; if ( $inputs['items'] ) : ?>
	<p>
		<label for="rss-items-<?php echo $number; ?>"><?php _e('How many items would you like to display?'); ?>
			<select id="rss-items-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][items]">
				<?php
					for ( $i = 1; $i <= 20; ++$i )
						echo "<option value='$i' " . ( $items == $i ? "selected='selected'" : '' ) . ">$i</option>";
				?>
			</select>
		</label>
	</p>
<?php endif; if ( $inputs['show_summary'] ) : ?>
	<p>
		<label for="rss-show-summary-<?php echo $number; ?>">
			<input id="rss-show-summary-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][show_summary]" type="checkbox" value="1" <?php if ( $show_summary ) echo 'checked="checked"'; ?>/>
			<?php _e('Display item content?'); ?>
		</label>
	</p>
<?php endif; if ( $inputs['summary_chars'] ) : ?>
	<p>
		<label for="rss-summary-chars-<?php echo $number; ?>">
			<input id="rss-summary-chars-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][summary_chars]" type="textbox" style="width: 25px; height: 10px;" value="<?php if ( $summary_chars ) echo $summary_chars; ?>" />
			<?php _e('Characters to show in item content? (0 or blank = show all, uncheck the box above for display item summary if you want to hide it.)'); ?>
		</label>
	</p>
<?php endif; if ( $inputs['open_new_tab'] ) : ?>
	<p>
		<label for="rss-open_new_tab-<?php echo $number; ?>">
			<input id="rss-open_new_tab-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][open_new_tab]" type="checkbox" value="1" <?php if ( $open_new_tab ) echo 'checked="checked"'; ?>/>
			<?php _e('Open links in a new tab/window?'); ?>
		</label>
	</p>
<?php endif; if ( $inputs['dont_follow'] ) : ?>
	<p>
		<label for="rss-dont_follow-<?php echo $number; ?>">
			<input id="rss-dont_follow-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][dont_follow]" type="checkbox" value="1" <?php if ( $dont_follow ) echo 'checked="checked"'; ?>/>
			<?php _e('Set links to NOFOLLOW?'); ?>
		</label>
	</p>
<?php endif; if ( $inputs['show_author'] ) : ?>
	<p>
		<label for="rss-show-author-<?php echo $number; ?>">
			<input id="rss-show-author-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][show_author]" type="checkbox" value="1" <?php if ( $show_author ) echo 'checked="checked"'; ?>/>
			<?php _e('Display item author if available?'); ?>
		</label>
	</p>
<?php endif; if ( $inputs['show_date'] ) : ?>
	<p>
		<label for="rss-show-date-<?php echo $number; ?>">
			<input id="rss-show-date-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][show_date]" type="checkbox" value="1" <?php if ( $show_date ) echo 'checked="checked"'; ?>/>
			<?php _e('Display item date?'); ?>
		</label>
	</p>
	<input type="hidden" name="widget-rss[<?php echo $number; ?>][submit]" value="1" />
<?php
	endif;
	foreach ( array_keys($default_inputs) as $input ) :
		if ( 'hidden' === $inputs[$input] ) :
			$id = str_replace( '_', '-', $input );
?>
	<input type="hidden" id="rss-<?php echo $id; ?>-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][<?php echo $input; ?>]" value="<?php echo $$input; ?>" />
<?php
		endif;
	endforeach;
}

// Expects unescaped data
function wp_tabbed_rss_process( $tabbed_rss, $check_feed = true ) {
	$items = (int) $tabbed_rss['items'];
	if ( $items < 1 || 20 < $items )
		$items = 10;
	$url           = sanitize_url(strip_tags( $tabbed_rss['url'] ));
	$title         = trim(strip_tags( $tabbed_rss['title'] ));
	$show_summary  = (int) $tabbed_rss['show_summary'];
	$summary_chars  = (int) $tabbed_rss['summary_chars'];
	$show_author   = (int) $tabbed_rss['show_author'];
	$show_date     = (int) $tabbed_rss['show_date'];
	$open_new_tab     = (int) $tabbed_rss['open_new_tab'];
	$dont_follow     = (int) $tabbed_rss['dont_follow'];

	if ( $check_feed ) {
		require_once(ABSPATH . WPINC . '/rss.php');
		$rss = fetch_rss($url);
		$error = false;
		$link = '';
		if ( !is_object($rss) ) {
			$url = wp_specialchars(__('Error: could not find an RSS or ATOM feed at that URL.'), 1);
			$error = sprintf(__('Error in RSS %1$d'), $widget_number );
		} else {
			$link = clean_url(strip_tags($rss->channel['link']));
			while ( strstr($link, 'http') != $link )
				$link = substr($link, 1);
		}
	}

	return compact( 'title', 'url', 'link', 'items', 'error', 'show_summary', 'summary_chars', 'show_author', 'show_date', 'open_new_tab', 'dont_follow' );
}

function wp_tabbed_rss_register() {
	if ( !$options = get_option('tabbed_rss') )
		$options = array();
	$widget_ops = array('classname' => 'tabbed_rss', 'description' => __( 'RSS/Atom Feeds - Extended version' ));
	$control_ops = array('width' => 400, 'height' => 200, 'id_base' => 'rss');
	$name = __('RSS(Extended)');

	$id = false;
	foreach ( array_keys($options) as $o ) {
		// Old widgets can have null values for some reason
		if ( !isset($options[$o]['url']) || !isset($options[$o]['title']) || !isset($options[$o]['items']) )
			continue;
		$id = "rss-$o"; // Never never never translate an id
		wp_register_sidebar_widget($id, $name, 'wp_tabbed_rss', $widget_ops, array( 'number' => $o ));
		wp_register_widget_control($id, $name, 'wp_tabbed_rss_control', $control_ops, array( 'number' => $o ));
	}

	// If there are none, we register the widget's existance with a generic template
	if ( !$id ) {
		wp_register_sidebar_widget( 'rss-1', $name, 'wp_tabbed_rss', $widget_ops, array( 'number' => -1 ) );
		wp_register_widget_control( 'rss-1', $name, 'wp_tabbed_rss_control', $control_ops, array( 'number' => -1 ) );
	}
}

function wp_tabbed_rss_init() {
	if ( !is_blog_installed() )
		return;

	wp_tabbed_rss_register();

	do_action('tabbed_rss_init');

}
?>