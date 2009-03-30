<?php
//Credits for author at bottom. Thank you to WeyHan Ng (http://sandboxblogger.com/). This plugin was integrated into a single core tweak plugin for convenience.

if (!isset($post_teaser)) {
	pt_init();
}

class post_teaser {
	var $version = 3.10;
	var $debug = false;
	
	/*** Default option values ***/
	var $default_options = array();
	
	/*** Anything that doesn't really need to be configurable ***/
	var $static_options = array
		(
			'blocks' => 'p|li|dt|dd|address|form|pre|tr'
		);
	
	/*** Called once before any teasering. Puts the options into properties. ***/
	function post_teaser() {
		load_plugin_textdomain('post-teaser');
		$this->default_options['full_template'] = __('<a href="%permalink%" title="Permanent Link: %plain_title%" rel="nofollow">Permanent link to this post.</a>', 'post-teaser');
		$this->default_options['teaser_template'] = __('This is a preview of <q>%title%</q>. <a href="%permalink%" title="Permanent Link: %plain_title%" rel="nofollow">Read more.</a>', 'post-teaser');
		$this->default_options['target'] = '50';
		$this->default_options['word_mins'] = __(' mins', 'post-teaser');
		$this->default_options['word_secs'] = __(' secs', 'post-teaser');
		$this->default_options['time_separator'] = ':';
		$this->default_options['zero_counts'] = '0';
		$this->default_options['count_separator'] = ', ';
		$this->default_options['turn_off'] = '';
		$options = get_option('post_teaser');
		if (!$options) {
			add_option('post_teaser', $this->default_options);
			$options = $this->default_options;
		}
		foreach ($options as $option_name => $option_value)
			$this->{$option_name} = $option_value;
		foreach ($this->static_options as $option_name => $option_value)
			$this->{$option_name} = $option_value;
		
		if (strstr($this->full_template, '%reading_time%') || strstr($this->teaser_template, '%reading_time%'))
			$this->doing_reading_time = true;
		else
			$this->doing_reading_time = false;
		
		if (strstr($this->full_template, '%word_image_count%') || strstr($this->teaser_template, '%word_image_count%'))
			$this->doing_counts = true;
		else
			$this->doing_counts = false;
	}
	
	/*** For editing the plugin's configuration in the admin menu ***/
	function init_option_page() {
		if (isset($_POST['post_teaser_submit']) && $_POST['post_teaser_submit']) {
			if (isset($_POST['submit_update'])) {
				$new_options = array
					(
						'full_template' => trim(stripslashes($_POST['full_template'])),
						'teaser_template' => trim(stripslashes($_POST['teaser_template'])),
						'target' => (int) $_POST['target'],
						'word_mins' => $_POST['word_mins'],
						'word_secs' => $_POST['word_secs'],
						'time_separator' => $_POST['time_separator'],
						'zero_counts' => $_POST['zero_counts'],
						'count_separator' => $_POST['count_separator'],
						'turn_off' => $_POST['turn_off'] //add by heather
					);
				$new_options['count_separator'] = str_replace('&', '&amp;', $new_options['count_separator']);
				$new_options['zero_counts'] = $new_options['zero_counts'] ? '1' : '0';
				update_option('post_teaser', $new_options);
				header('Location: ' . get_settings('siteurl') . '/wp-admin/options-general.php?page=sc-core-tweaks/post-teaser.php&saved=true');
			} elseif (isset($_POST['submit_reset'])) {
				update_option('post_teaser', $this->default_options);
				header('Location: ' . get_settings('siteurl') . '/wp-admin/options-general.php?page=sc-core-tweaks/post-teaser.php&saved=true');
			}
			die;
		}
			
		if ($_GET['page'] == basename(__FILE__))
			add_action('admin_head', array(&$this, 'option_page_head'));
		add_options_page(__('Post Teaser', 'post-teaser'), __('Post Teaser', 'post-teaser'), 6, __FILE__, array(&$this, 'option_page'));
	}
	function option_page() {
			?>
			<?php if ($_GET['saved'] == 'true'): ?>
			<div style="background-color: rgb(207, 235, 247);" id="message" class="updated fade"><p><?php _e('Settings saved.', 'post-teaser') ?> <a href="<?php echo get_settings('siteurl'); ?>"><?php _e('View site &#187;', 'post-teaser') ?></a></p></div>
			<?php endif; ?>
			
			<div class="wrap"> 
			
			<h2><?php _e('Post Teaser Options', 'post-teaser') ?></h2>
			
			<p><?php _e('You can configure Post Teaser here. You might also be interested in <a href="http://wordpress.org/extend/plugins/post-teaser/" title="The Documentation page for Post Teaser">viewing the latest documentation</a>.', 'post-teaser') ?></p>
			
			<form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="post">
				<fieldset class="options clearfix">
				<legend><?php _e('Basic settings', 'post-teaser') ?></legend>
				<p><b>Check this box to turn the post teaser off:</b> <input type="checkbox" name="turn_off" value="ON" <?php if ($this->turn_off == "ON") { ?> checked<?php } ?>><br />(You can also overide individual post settings by using the custom metas. Enter <b>Teaser</b> as the key, and <b>showall</b> as the value.)</p><!--added by heather-->
				<p><?php printf(__('I would like the teaser to be as close to %s words as possible.', 'post-teaser'), '<input type="text" id="target" name="target" value="' . $this->target . '" />'); ?></p>
				
				<div class="right" id="key">
				<h3><?php _e('Placeholders', 'post-teaser') ?></h3>
				
				<p><?php _e('These will be replaced with the appropriate values when the plugin runs.', 'post-teaser') ?></p>
				
				<dl>
					<dt>%title%</dt>
					<dd><?php _e('The title of the post', 'post-teaser') ?></dd>
					
					<dt>%plain_title%</dt>
					<dd><?php _e('The title in plain text with no <abbr title="Hypertext Markup Language">HTML</abbr> (to go in the <code>title</code> attribute of a link, for instance)', 'post-teaser') ?></dd>
					
					<dt>%permalink%</dt>
					<dd><?php _e('The <abbr title="Uniform Resource Identifier">URI</abbr> of the post', 'post-teaser') ?></dd>
					
					<dt>%reading_time%</dt>
					<dd><?php _e('An estimation of how long it will take to read', 'post-teaser') ?></dd>
					
					<dt>%word_image_count%</dt>
					<dd><?php _e('A count of the number of words and images in the post', 'post-teaser') ?></dd>
				</dl>
				</div>
				
				<div class="left" id="templates">
				
				<div id="teaser_template_container">
				<p><?php _e('If the post is made into a teaser, I want the message to be in the following format:', 'post-teaser') ?></p>
				<textarea name="teaser_template" id="teaser_template" rows="4" cols="100" class="template"><?php echo htmlspecialchars($this->teaser_template); ?></textarea>
				</div>				
				
				<div id="full_template_container">
				<p><?php _e('If the post is displayed in full, I want the message to be in the following format:', 'post-teaser') ?></p>
				<textarea name="full_template" id="full_template" rows="4" cols="100" class="template"><?php echo htmlspecialchars($this->full_template); ?></textarea>
				</div>
				</div>
				</fieldset>
				
				<fieldset class="options">
				<legend><?php _e('Fine tuning', 'post-teaser') ?></legend>
				
				<p><?php _e('Show seconds like this:', 'post-teaser') ?> <span class="example">54 <input type="text" id="word_secs" name="word_secs" value="<?php echo $this->word_secs; ?>" /></span></p>
				
				<p><?php _e('Show minutes like this:', 'post-teaser') ?>
				<select id="time_separator" name="time_separator" class="example">
					<?php
					$separators = array
						(
							0 => ':',
							1 => '.',
							2 => '-'
						);
					foreach ($separators as $separator) {
						if ($separator == $this->time_separator)
							echo "<option value=\"$separator\" selected=\"selected\">3{$separator}34</option>";
						else
							echo "<option value=\"$separator\">3{$separator}34</option>";
					}
					?>
				</select>
				<input type="text" id="word_mins" name="word_mins" class="example" value="<?php echo $this->word_mins; ?>" />
				</p>
				
				<p><?php _e('Show word and image counts like this:', 'post-teaser') ?>
				<select name="count_separator" id="count_separator" class="example">
					<?php
					$separators = array
						(
							0 => ', ',
							1 => __(' and ', 'post-teaser'),
							2 => ' &amp; ',
							3 => ' + '
						);
					foreach ($separators as $separator) {
						if ($separator == $this->count_separator)
							echo "<option value=\"$separator\" selected=\"selected\">462 ". __('words', 'post-teaser'). $separator. '3 '. __('images', 'post-teaser'). '</option>';
						else
							echo "<option value=\"$separator\">462 ". __('words', 'post-teaser'). $separator. '3 '. __('images', 'post-teaser'). '</option>';
					}
					?>
				</select></p>
				
				<label>
				<?php if ($this->zero_counts == '1'): ?>
					<input type="checkbox" name="zero_counts" id="zero_counts" checked="checked" />
				<?php else: ?>
					<input type="checkbox" name="zero_counts" id="zero_counts" />
				<?php endif; ?>
				<?php _e("Show the count of images or words, even if it's zero", 'post-teaser') ?>
				</label>
				</fieldset>
				
				<p class="submit">
				<input type="hidden" name="post_teaser_submit" value="1" />
				<input type="submit" value="<?php _e('Reset to defaults', 'post-teaser') ?>" name="submit_reset" id="default-reset" />
				<input type="submit" value="<?php _e('Update Options', 'post-teaser')?> &#187;" name="submit_update" />
				</p>
			</form>
			</div>
			<?
	}
	function option_page_head() {
		?>
		<style type="text/css">
		.template {
			width: 100%;
		}
		.example {
			font-weight: bold;
		}
		.clearfix::after {
			content: "."; 
			display: block; 
			height: 0; 
			clear: both; 
			visibility: hidden;
		}
		/* Hides from IE-mac \*/
		* html .clearfix { height: 1%; }
		/* Holly Hack: End Hide */
		.right {
			float: right;
		}
		.left {
			float: left;
		}
		#key {
			width: 25%;
			background: #eee;
			border: 1px solid #69c;
			float: right;
			font-size: 90%;
			padding: 10px;
		}
		#key h3 {
			border-bottom: 1px solid #ccc;
			margin: 0;
		}
		#templates {
			width: 70%;
		}
		#key dt {
			font-weight: bold;
		}
		.preview {
			border: 1px solid #ccc;
			padding: 10px;
			border-top: none;
		}
		#templates h3 {
			margin: 20px 0 0 0;
			border: 1px solid #ccc;
			border-bottom: none;
			padding: 10px 10px 0 10px;
		}
		</style>
		<script type="text/javascript">
		//<![CDATA[
		var count_separator = '<?php echo $this->count_separator; ?>';
		var time_separator = '<?php echo $this->time_separator; ?>';
		var word_mins = '<?php echo $this->word_mins; ?>';
		function update_preview(textareaId, previewId) {
				template = document.getElementById(textareaId).value;
				template = template.replace('%title%', '<?php _e('An <em>example<\/em> post', 'post-teaser') ?>');
				template = template.replace('%plain_title%', '<?php _e('An example post', 'post-teaser') ?>');
				template = template.replace('%permalink%', '');
				template = template.replace('%word_image_count%', '462 <?php _e('words', 'post-teaser') ?>' + count_separator + '3 <?php _e('images', 'post-teaser') ?>');
				template = template.replace('%reading_time%', '3' + time_separator + '34 ' + word_mins);
				document.getElementById(previewId).innerHTML = template;
				template = null;
		}
		window.onload = function() {
				var container = document.getElementById('teaser_template_container');
				var insert = document.createElement('h3');
				insert.innerHTML = '<?php _e('Preview', 'post-teaser') ?>';
				container.appendChild(insert);
				
				insert = document.createElement('div');
				insert.id = 'teaser_template_preview';
				insert.className = 'preview';
				container.appendChild(insert);
				
				document.getElementById('teaser_template').onkeyup = function() { update_preview('teaser_template', 'teaser_template_preview'); };
				update_preview('teaser_template', 'teaser_template_preview');
				
				container = document.getElementById('full_template_container');
				insert = document.createElement('h3');
				insert.innerHTML = '<?php _e('Preview', 'post-teaser') ?>';
				container.appendChild(insert);
				
				insert = document.createElement('div');
				insert.id = 'full_template_preview';
				insert.className = 'preview';
				container.appendChild(insert);
				
				document.getElementById('full_template').onkeyup = function() { update_preview('full_template', 'full_template_preview'); };
				update_preview('full_template', 'full_template_preview');
				
				document.getElementById('count_separator').onchange = function() {
					count_separator = this.value;
					update_preview('full_template', 'full_template_preview');
					update_preview('teaser_template', 'teaser_template_preview');
				};
				document.getElementById('time_separator').onchange = function() {
					time_separator = this.value;
					update_preview('full_template', 'full_template_preview');
					update_preview('teaser_template', 'teaser_template_preview');
				};
				document.getElementById('word_mins').onkeyup = function() {
					word_mins = this.value;
					update_preview('full_template', 'full_template_preview');
					update_preview('teaser_template', 'teaser_template_preview');
				};
				
				document.getElementById('default-reset').onclick = function() {
					if (confirm('<?php _e('Do you really want to reset all your configuration to the default values?', 'post-teaser') ?>'))
						return true;
					else
						return false;
				}
				
				container, insert = null;
		};
		//]]>
		</script>
		<?php
	}
	
	/*** Debugging ***/
	var $debug_message;
	function debug($message) {
			if ($this->debug)
					$this->debug_message .= $message . "\n";
	}
	
	/*** Replaces placeholders with the relevant values ***/
	function placeholders($template) {
		$template = str_replace('%title%', the_title('', '', false), $template);
		$template = str_replace('%plain_title%', strip_tags(str_replace('"', '&quot;', the_title('', '', false))), $template);
		$template = str_replace('%permalink%', get_permalink(), $template);
		$template = str_replace('%word_image_count%', $this->word_image_count, $template);
		$template = str_replace('%reading_time%', $this->reading_time, $template);
		return $template;
	}
	
	/*** Counts words. PHP's str_word_count() only works for alphabetic characters ***/
	function word_count($text) {
		$text = strip_tags($text);
		$text = preg_split("/\s+/", $text);
		$count = count($text);
		return $count;
	}
	
	/*** The real business happens here. Every post is run through this method ***/
	function process($content) {
		global $feed, $single, $post, $cookiehash, $action, $pages, $page, $multipage, $sem_home_page;
		
		$matches = null;
		$matches2 = null;
		$auto_close = array();
		$this->debug_message = '';
		$meta = get_post_meta($post->ID, 'teaser', true);

		//added by heather
		if ($this->turn_off == "ON") {
			$meta = 'disable';
		}
		//end added by heather

		/*** Checks for when we don't want to teaser stuff ***/		
		if ($single)
			return $content;
		elseif (!empty($feed))
			return $content;
		elseif ((!empty($post->post_password)) && ($_COOKIE['wp-postpass_' . $cookiehash] != $post->post_password))
			return $content;
		elseif ($action == 'edit')
			return $content;
		elseif ($meta == 'disable')
			return $content;
		elseif (isset($sem_home_page) && is_home() && function_exists('sem_static_front')) // Semilogic static front page
			return $content;
		
		$this->debug('Starting teaser (got through the checks), version number is ' . $this->version);
		
		if ($meta == 'showall') {
			$this->debug('"showall" custom field detected');
			$showall = true;
		}
		
		/*** Deal with <!--more--> and <!--nextpage--> (this is very hackish) ***/
		$plain_content = $pages[$page-1];
		if (strstr($plain_content, '<!--more-->')) {
			$this->debug('A "more" tag has been detected... it will be replaced with the teaser text.');
			$matches[0] = preg_replace('!<a href="'. preg_quote(get_permalink()) . '#more-' . $post->ID . '".+?>.+?</a>!', '', $content);
			
			$matches[0] = preg_replace('!<p>\s+</p>!', '', $matches[0]);
			$matches[0] = preg_replace('!<br />\s*</p>!', '</p>', $matches[0]);
			
			// Get rid of any closing tags at the end of the content as there have
			// been some nesting validation issues (due to WP clashing) and they will be
			// automatically closed in order anyway (see below)
			$matches[0] = preg_replace('!(</([a-zA-Z1-9]+)>\s*)+\s*$!', '', $matches[0]);
			
			$i = 0;
			$content = $plain_content;
			$more = true;
		}
		if ($multipage) {
			$this->debug('A "nextpage" tag has been detected.');
			if ($more)
				$content_temp = $matches[0];
			else
				$content_temp = $content;
			$content = '';
			foreach ($pages as $item)
				$content .= $item;
		}
		if (($more || $multipage) && ($this->doing_reading_time || $this->doing_counts)) {
			remove_filter('the_content', 'pt_process');
			$content = apply_filters('the_content', $content);
			add_filter('the_content', 'pt_process');
			$content = str_replace(']]>', ']]&gt;', $content);
		}
		
		/*** Reading time ***/
		if ($this->doing_reading_time)
		{
			$this->debug('Start of reading time calculation');
			$average = $this->word_count($content) / 250 * 60;
			$min = (int) ($average / 60);
			$sec = round(fmod($average, 60));
			if ($sec < 10)
				$sec = '0' . $sec;
			if ($min == 0)
				$this->reading_time = ($min * 60 + $sec) . ' ' . $this->word_secs;
			else
				$this->reading_time = $min . $this->time_separator . $sec . ' ' . $this->word_mins;
			$this->debug("End of reading time calculation. Result = {$this->reading_time}, sec = $sec, min = $min");
		}
		
		/*** Word/image count ***/
		if ($this->doing_counts)
		{
			$this->debug('Start of word/image count calculation');
			$word_count = $this->word_count($content);
			if (!$this->zero_counts && $word_count == 0)
				$word_count = '';
			else
				$word_count .= ($word_count == 1) ? __(' word', 'post-teaser') : __(' words', 'post-teaser');
			
			$temp = preg_replace('/<img[^>]*class=\'wp-smiley\'[^>]*>/i', '', $content);
			$image_count = preg_match_all('/<img[^>]*>/i', $temp, $matches2);
			if (!$this->zero_counts && $image_count == 0)
				$image_count = "";
			else
				$image_count .= ($image_count == 1) ? __(' image', 'post-teaser') : __(' images', 'post-teaser');
			
			$this->word_image_count = $word_count;
			if ($word_count && $image_count)
				$this->word_image_count .= $this->count_separator;
			$this->word_image_count .= $image_count;
			$this->debug("End of word/image count calculation. Result = {$this->word_image_count}, words = $word_count, images = $image_count");
		}
		
		if ($multipage)
			$content = $content_temp;
		
		/***
		This is how it works:
			* Split posts into "blocks"
			* Find the first block which would produce a cumulative word count greater than the target
			* Decrement this value if the block before it is closer to the target
			* Decide whether to make a "teaser" of the post based on whether that chosen block is the last one.
				Exceptions:
					* If it has a <!--more--> tag, it's teasered regardless
					* If the post has a "teaser" custom field with a value of "showall", it will be returned in full regardless (and <!--more--> is over-ridden)
			* If the post is teasered:
				* Put all (X)HTML starting tags into an array
				* From this array, get the actual element names, and exclude self-closing tags (like <br />). What's left goes into $auto_close
				* Unset each element as a closing tag is found for it
				* The elements left over must have been chopped in half -- give them a closing tag				
		***/		
		if (!$more && !$showall) {
			preg_match_all("!.*?<({$this->blocks})[^>]*>.+?</\\1>!si", $content, $matches);
			$matches = $matches[0];
			$block_count = count($matches);
			$this->debug("Number of blocks: $block_count");
			
			$current_word_count = 0;
			$block_word_count = array();
			for ($i = 0; $current_word_count < $this->target && $i < $block_count; /* (increment is conditional, see below) */) {
				$block_word_count[$i] = $this->word_count($matches[$i]);
				$current_word_count += $block_word_count[$i];
				if ($current_word_count < $this->target)
					$i++;
			}
			$this->debug("Finished looping through on block #$i (starts at zero). Cumulative word count was $current_word_count. Target was {$this->target}.");
			
			if ($current_word_count >= $this->target && $i > 0) { // No need if it will definitely not be teasered
				$this_block_distance = $current_word_count - $this->target;
				$last_block_distance = $this->target - ($current_word_count - $block_word_count[$i]);
				$this->debug("Current block is $this_block_distance words from target, previous block is $last_block_distance words from target.");
				if ($this_block_distance > $last_block_distance) {
					$i--;
					$this->debug("Decremented to $i");
				}
			}
		}
		
		if (($i + 1 < $block_count || $more) && !$showall) {
			$this->debug('Post will be teasered');

			for ($j = 0; $j <= $i; $j++) {
				preg_match_all('!<(?:[a-zA-Z1-9]+)[^>]*>!i', $matches[$j], $matches2);
				$matches2 = $matches2[0];
				foreach ($matches2 as $id => $element) {
					if (preg_match('!^<([a-zA-Z1-9]+)[^>]*/>$!i', $element)) {
						unset($matches2[$id]);
						continue;
					}
					$element = preg_replace('!^<([a-zA-Z1-9]+)[^>]*>$!i', "$1", $element);
					$auto_close[] = $element;
				}
			}
			
			$content = '';
			for ($j = 0; $j <= $i; $j++) {
				$temp = $matches[$j];
				foreach ($auto_close as $id => $element) {
					$pos = strpos(" " . $temp, "</$element>"); // Space at front because 0 == false
					if ($pos) {
						$temp = substr_replace($temp, '', $pos, strlen("</$element>")); // Makes sure a closing tag is not counted more than once
						unset($auto_close[$id]);
					}
				}
				if (!$this->debug)
					$content .= $matches[$j];
				else
					$content .= "\n<!--[start $j, count: " . $block_word_count[$j] . "]-->\n" . $matches[$j] . "\n<!--[end $j]-->\n";
			}
			$auto_close = array_reverse($auto_close);
			foreach ($auto_close as $element)
				$content .= "</$element>";
			
			$template =& $this->teaser_template;
		} else {
			$this->debug('Post is being returned in full');
			$template =& $this->full_template;
		}
		$content .= "\n\n<div class=\"post-teaser\">" . post_teaser::placeholders($template) . '</div>';
		$this->debug('The End.');
		if ($this->debug)
			$content .= "\n\n<!-- \n" . $this->debug_message . "-->\n\n";
		return $content;
	}
	
	function replace_excerpt($excerpt) {
		return the_content();
	}
}

/*
Wrapper functions for calls to post_teaser member functions.
These functions were added to work around a change in WordPress 2.2 where the change will break Post Teaser in a very bad way.
*/
function pt_init() {
	global $post_teaser;
	$post_teaser = new post_teaser;
}

function pt_process($content) {
	global $post_teaser;
	return $post_teaser->process($content);
}

function pt_replace_excerpt($content) {
	global $post_teaser;
	return $post_teaser->replace_excerpt($content);
}

function pt_init_option_page() {
	global $post_teaser;
	$post_teaser->init_option_page();
}

add_filter('the_content', 'pt_process');
add_filter('the_excerpt', 'pt_replace_excerpt', 20); // Because Post Teaser does the same thing, better
add_action('admin_menu', 'pt_init_option_page');


//Plugin Name: Post Teaser
//Plugin URI: http://wordpress.org/extend/plugins/post-teaser/
//Description: Post Teaser generates a preview or "teaser" of a post for the main, archive and category pages, with a link underneath to go to the full post page. It includes features to generate a word count, image count, and an estimated reading time.
//Version: 3.10
//Author: WeyHan Ng
//Author URI: http://sandboxblogger.com/
/*
**** WARNING: DO NOT EDIT THIS FILE! YOU CAN CONFIGURE THE PLUGIN FROM THE "OPTIONS > POST TEASER" MENU ****

**** NOTE: PLEASE DO NOT EMAIL JONATHAN LEIGHTON FOR SUPPORT. Instead email <han at sandboxblogger dot com> for support. ****

Post Teaser -- A teaser plugin for WordPress
Copyright (C) Jonathan Leighton (j@jonathanleighton.com)
Copyright (C) WeyHan Ng (han@sandboxblogger.com)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with WordPress; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
?>