<?php
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
		$setsmbutton = ' checked';
	}
	if (get_option('seoauto_core_dd_sitemap_use') != 'on') {
		$setsmbutoff = ' checked';
	}
	$options2 .= '<li><a href="http://www.dagondesign.com/articles/sitemap-generator-plugin-for-wordpress/" target="_blank">Sitemap Generator:</a> <input type="radio" name="dd_sitemap_use" value="on"'.$setsmbutton.'> On <input type="radio" name="dd_sitemap_use" value="off"'.$setsmbutoff.'> Off <small><b>(Off by default.)</b></small><br/>This plugin creates a static sitemap (not to be confused with an XML sitemap) for your WordPress site. Simply placing the shortcode &lt;!-- ddsitemapgen --&gt; in your .html will show the options you\'ve selected in your admin, so the spiders and bots have a path to crawl each page and post.<br />Access under Settings > '.$link4.'DDSitemapGen'.$endlink4.'</li><li>&nbsp;</li>';
}

// Turn Our Profiles on and off
if ($_REQUEST['action'] == "pluginsonoff") {
	if ($_REQUEST['our_profiles'] == "on") {
		if (!update_option('seoauto_core_our_profiles', 'on')) {
			$fail .= "<li>Our Profiles could not be turned on. Maybe it's already on.</li>";
		} else {
			$success .= "<li>Our Profiles is turned on.</li>";
		}
	} elseif ($_REQUEST['our_profiles'] == "off") {
		if (!update_option('seoauto_core_our_profiles', 'off')) {
			$fail .= "<li>Our Profiles could not be turned off. Maybe it's already off.</li>";
		} else {
			$success .= "<li>Our Profiles is turned off.</li>";
		}
	} else {
		$notused .= "<li>Our Profiles is off by default.</li>";
	}
} else {
	if (get_option('seoauto_core_our_profiles') != 'off') {
		$link4 = '<a href="options-general.php?page=our-profiles-config">';
		$endlink4 = '</a>';
		$setopbutton = ' checked';
	}
	if (get_option('seoauto_core_our_profiles') != 'on') {
		$setopbutoff = ' checked';
	}
	
	$options2 .= '<li><a href="http://wordpress.org/plugins/our-profiles/" target="_blank">Our Profiles:</a> <input type="radio" name="our_profiles" value="on"'.$setopbutton.'> On <input type="radio" name="our_profiles" value="off"'.$setopbutoff.'> Off <small><b>(Off by default.)</b></small><br/>This plugin lets the user fill in their profile URLs in the admin, then use a shortcode on a page or post to display the logos and links for 23 different services. If the review service allows it, like Yelp, you can copy / paste that URL to link people directly to "Leave a Review".<br />Access SEO Automatic > '.$link4.'Our Profiles'.$endlink4.'</li><li>&nbsp;</li>';
}

// Prevent HTML stripping on user profiles on and off
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