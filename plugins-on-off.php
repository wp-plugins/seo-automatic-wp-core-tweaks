<?php
if ($_REQUEST['action'] != "pluginsonoff") { $options2 = '<ul><li><p>We have removed three of these plugins due to author deprecation and lack of updates, and improved WordPress functionality as of 2012.</p>
<p>If your site is ALREADY using these options from a previous version of our plugin, they WILL continue to work, but users can no longer change any settings from the wp-admin menu. </p>
<p>If you are not using them, feel free to permanently deactivate by checking the appropriate checkbox.</p></li><li>&nbsp;</li>'; }

// Turn post teaser on and off
if ($_REQUEST['action'] == "pluginsonoff") {
	if ($_REQUEST['post_teaser_use'] == "on") {
		if (!update_option('seoauto_core_post_teaser_use', 'on')) {
			$fail .= "<li>Post teaser could not be turned on. Maybe it's already on.</li>";
		} else {
			$success .= "<li>Post Teaser is turned on.</li>";
		}
	} elseif ($_REQUEST['post_teaser_use'] == "off") {
		if (!update_option('seoauto_core_post_teaser_use', 'off')) {
			$fail .= "<li>Post Teaser could not be turned off. Maybe it's already off.</li>";
		} else {
			$success .= "<li>Post Teaser is turned off.</li>";
		}
	} else {
		$notused .= "<li>Post Teaser is off by default.</li>";
	}
} else {
	if (get_option('seoauto_core_post_teaser_use') != 'off') {
		$link = '<a href="options-general.php?page=seo-automatic-wp-core-tweaks/post-teaser.php">';
		$endlink = '</a>';
	}
	$options2 .= '<li><a href="http://wordpress.org/extend/plugins/post-teaser/" target="_blank">Post Teaser:</a> <span style="color: #ff0000">(Removed in 2/2013)</span><span color: #000;"> - Check to deactivate permanently: <input type="checkbox" name="post_teaser_use" value="off"></span> <span style="color: #dcdad1;"><input type="radio" name="post_teaser_use" value="on" disabled="disabled"> On <input type="radio" name="post_teaser_use" value="off" disabled="disabled"> Off <small><b>(Off by default.)</b></small> <!--<a href="options-general.php?page=seo-automatic-wp-core-tweaks/post-teaser.php">See the new post teaser options.</a>--><br />Post Teaser generates excerpts of your posts for the main, archive, and category pages. It also generates a line showing the estimated word count, image count, and reading time. These are all fully editable from the admin.<br />Access under Settings > '.$link.'Post Teaser'.$endlink.'</span></li><li>&nbsp;</li>';
}

// Turn page link on and off
if ($_REQUEST['action'] == "pluginsonoff") {
	if ($_REQUEST['page_link_use'] == "on") {
		if (!update_option('seoauto_core_page_link_use', 'on')) {
			$fail .= "<li>Page Link could not be turned on. Maybe it's already on.</li>";
		} else {
			$success .= "<li>Page Link is turned on.</li>";
		}
	} elseif ($_REQUEST['page_link_use'] == "off") {
		if (!update_option('seoauto_core_page_link_use', 'off')) {
			$fail .= "<li>Page Link could not be turned off. Maybe it's already off.</li>";
		} else {
			$success .= "<li>Page Link is turned off.</li>";
		}
	} else {
		$notused .= "<li>Page Link is off by default.</li>";
	}
} else {
	if (get_option('seoauto_core_page_link_use') != 'off') {
		$link2 = '<a href="tools.php?page=seo-automatic-wp-core-tweaks/page-link.php">';
		$endlink2 = '</a>';
	}
	$options2 .= '<li><a href="http://gmurphey.com/2006/10/05/wordpress-plugin-page-link-manager/" target="_blank">Page Link:</a> <span style="color: #ff0000">(Removed in 2/2013)</span><span color: #000;"> - Check to deactivate permanently: <input type="checkbox" name="page_link_use" value="off"></span> <span style="color: #dcdad1;"><input type="radio" name="page_link_use" value="on" disabled="disabled"> On <input type="radio" name="page_link_use" value="off" disabled="disabled"> Off <small><b>(Off by default.)</b></small><br />Exclude any pages you wish from main navigation. Still amazing for older style themes, this plugin is obsolete for 2011, and the WordPress Twenty-Ten default theme. Instead, use the built in WordPress custom menu options.<br />Access under Tools > '.$link2.'Page Links'.$endlink2.' and check / uncheck as desired.</span></li><li>&nbsp;</li>';
}

// Turn page order on and off
if ($_REQUEST['action'] == "pluginsonoff") {
	if ($_REQUEST['page_order_use'] == "on") {
		if (!update_option('seoauto_core_page_order_use', 'on')) {
			$fail .= "<li>Page Order could not be turned on. Maybe it's already on.</li>";
		} else {
			$success .= "<li>Page Order is turned on.</li>";
		}
	} elseif ($_REQUEST['page_order_use'] == "off") {
		if (!update_option('seoauto_core_page_order_use', 'off')) {
			$fail .= "<li>Page Order could not be turned off. Maybe it's already off.</li>";
		} else {
			$success .= "<li>Page Order is turned off.</li>";
		}
	} else {
		$notused .= "<li>Page Order is off by default.</li>";
	}
} else {
	if (get_option('seoauto_core_page_order_use') != 'off') {
		$link3 = '<a href="edit.php?post_type=page&page=mypageorder">';
		$endlink3 = '</a>';
	}
	$options2 .= '<li><a href="http://wordpress.org/extend/plugins/my-page-order/" target="_blank">Page Order:</a> <span style="color: #ff0000">(Removed in 2/2013)</span><span color: #000;"> - Check to deactivate permanently: <input type="checkbox" name="page_order_use" value="off"></span> <span style="color: #dcdad1;"><input type="radio" name="page_order_use" value="on" disabled="disabled"> On <input type="radio" name="page_order_use" value="off" disabled="disabled"> Off <small><b>(Off by default.)</b></small><br />Again, an amazing plugin that was ahead of its time, made obsolete buy custom menus. For themes that dont support them, try this!<br />Access under Pages > '.$link3.'My Page Order'.$endlink3.'</span></li></li>&nbsp;</li></li>';
}

// Turn Sitemap Generator on and off
if ($_REQUEST['action'] == "pluginsonoff") {
	if ($_REQUEST['dd_sitemap_use'] == "on") {
		if (!update_option('seoauto_core_dd_sitemap_use', 'on')) {
			$fail .= "<li>Sitemap Generator could not be turned on. Maybe it's already on.</li>";
		} else {
			$success .= "<li>Sitemap Generator is turned on.</li>";
		}
	} elseif ($_REQUEST['dd_sitemap_use'] == "off") {
		if (!update_option('seoauto_core_dd_sitemap_use', 'off')) {
			$fail .= "<li>Sitemap Generator could not be turned off. Maybe it's already off.</li>";
		} else {
			$success .= "<li>Sitemap Generator is turned off.</li>";
		}
	} else {
		$notused .= "<li>Sitemap Generator is off by default.</li>";
	}
} else {
	if (get_option('seoauto_core_dd_sitemap_use') != 'off') {
		$link4 = '<a href="options-general.php?page=seo-automatic-wp-core-tweaks/sitemap-generator.php">';
		$endlink4 = '</a>';
	}
	$options2 .= '<li><a href="http://www.dagondesign.com/articles/sitemap-generator-plugin-for-wordpress/" target="_blank">Sitemap Generator:</a> <input type="radio" name="dd_sitemap_use" value="on"> On <input type="radio" name="dd_sitemap_use" value="off" checked> Off <small><b>(Off by default.)</b></small><br/>This plugin creates a static sitemap (not to be confused with an XML sitemap) for your WordPress site. Simply placing the shortcode &lt;!-- ddsitemapgen --&gt; in your .html will show the options you\'ve selected in your admin, so the spiders and bots have a path to crawl each page and post.<br />Access under Settings > '.$link4.'DDSitemapGen'.$endlink4.'</li><li>&nbsp;</li>';
}

// Turn Sitemap Generator on and off
if ($_REQUEST['action'] == "pluginsonoff") {
	if ($_REQUEST['user_profile_html'] == "on") {
		if (!update_option('seoauto_core_user_profile_html', 'on')) {
			$fail .= "<li>Prevent HTML stripping from user profiles could not be set. Maybe it's already on.</li>";
		} else {
			$success .= "<li>Prevent HTML stripping from user profiles is on.</li>";
		}
	} elseif ($_REQUEST['user_profile_html'] == "off") {
		if (!update_option('seoauto_core_user_profile_html', 'off')) {
			$fail .= "<li>Prevent HTML stripping from user profiles could not be set. Maybe it's already off.</li>";
		} else {
			$success .= "<li>Prevent HTML stripping from user profiles is  off.</li>";
		}
	} else {
		$notused .= "<li>Prevent HTML stripping from user profiles is off by default.</li>";
	}
} else {
	if (get_option('seoauto_core_user_profile_html') != 'off') {
		$link4 = '<a href="profile.php">';
		$endlink4 = '</a>';
	}
	$options2 .= '<li>Prevent HTML stripping from user profiles: <input type="radio" name="user_profile_html" value="on"> On <input type="radio" name="user_profile_html" value="off" checked> Off <small><b>(Off by default.)</b></small><br/><!--This plugin creates a static sitemap (not to be confused with an XML sitemap) for your WordPress site. Simply placing the shortcode &lt;!-- ddsitemapgen --&gt; in your .html will show the options you\'ve selected in your admin, so the spiders and bots have a path to crawl each page and post.<br />--></li><li>&nbsp;</li>';
}

if ($_REQUEST['action'] != "pluginsonoff") { $options2 .= '</ul>'; }
?>