=== Core Tweaks WordPress Setup ===
Contributors: cyber49
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FC2PBBP6BY8QC
Tags: google, seo, permalinks, installation, common settings, post teaser, page link, page order, canonical, sitemap, h1, core tweaks, seo automatic, blog setup
Requires at least: 3.5
Tested up to: 3.6
Stable tag: 3.9

Primarily for use in <b>new WP installations</b>, the steps are based on an employee checklist from Search Commander, Inc. for setting up sites.

== Description ==
You should have no other plugins active while running this setup plugin, since it is primarily for new installations. 

Even before you add an SEO plugin, the steps after a WP installation can take 20 to 40 minutes. This plugin eliminates that time, putting all the options on one admin screen.  This plugin does not replace other SEO plugins. It does what they don't do; Properly prepare you for their installation.

[youtube http://www.youtube.com/v/UTXrUAccCts&hl=en_US&fs=1&rel=0&color1=0x006699&color2=0x54abd6]

This plugin extends the built-in features of WordPress, and has an import / export feature, saving you even more time for additional installations.

All of the "little things", from changing permalink structure, to deleting the Hello World post, to enabling XML, and lots more, are all accessible from a single admin page. 

This plug-in is designed to be a COMPANION to other plugins like All in one SEO, Headspace 2, or WordPress SEO (our favorite), and *is not* intended as a replacement for those. In fact, as they get better, we have disabled some of our features to avoid conflicts. 

= Features =
From one admin screen, click a button and make any or all of these changes...

1.	Change default post category name from "uncategorized" to: 
2.	Change default blogroll category name from "blogroll" to: 
3.	Turn OFF organization of uploads into month and year-based folders.
4.	Set the RSS feed to display only a summary.
5.	Change permalink structure to custom setting: 
6.	Add a page and shortcode for the integrated DDSiteMap Generator
7.	Create a privacy page with your contact information
8.	Add a Contact Page 
9.	Delete default "Hello World" post.
10.	Select a page to be displayed as your home page
11.	Change default post comments on articles.
12.	Delete default comment
13.	Set the main blog email
14.	Set the admin user's blog email
15.	Add new users
16.	Change the default page name from "about"
17.	Set the default page as the front page.
18.	Create the page to designate for displaying your blog posts, and name it: 
19.	Change the blog description tagline. 
20.	Delete all links in blogroll.
21.	Enable the Atom Publishing Protocol.
22.	Enable the WordPress, Movable Type, MetaWeblog and Blogger XML-RPC publishing protocols.
23.	Add a robots.txt file to your blog root.(This WILL overwrite any existing robots.txt file and cannot be undone.)
24.	Footer control
	*	Add a copyright date to the footer.
	*	Add an admin login to the footer.
	*	Add the static sitemap link to the footer.
	*	Add the privacy policy link to the footer.
25.	Advanced:
26.	Uploads Folder: You will need to have writable permission
27.	Attempt to create the uploads folder and set the permission to writable.
28.	Change H2 tags to H1
29.     Import / export your settings from another site. Once you set preferences the first time, just export. Then import that file on future domains, and you're done.

Note: 
As of September 2013 we have integrated the <a href="http://wordpress.org/plugins/our-profiles/" target="_blank">"Our Profiles" plugin</a>, adding a new menu item with a profiles page.

== Installation ==

After activation, go to the SEO Automatic > Core Tweaks admin screen and use the default choices or make choices of your own. 

Designed as a new setup assistant, this plug-in is usually installed before any others. If you've added other plugins and have them actice, deactivate them first to avoid potential conflicts, then REactivvate them after you run the setup process. 

[youtube http://www.youtube.com/v/UTXrUAccCts&hl=en_US&fs=1&rel=0&color1=0x006699&color2=0x54abd6]

== Frequently Asked Questions ==

= What is this plugin for? =

This plugin saves 20 to 40 minutes of post-installation time, properly setting up a new WordPress installation. 

It adds a new Admin menu item, SEO Automatic - with a sub-menu Core Tweaks, giving access on one page to all of the things that savvy programmers change for every installation. 

It also adds a second sub-menu item called "Our Profiles". When the profiles are filled in, users can add a shortcode on any page or post to display the links to their review profiles. 

For older themes that do not support custom menus, it also combines several other WP plugins for theme customization, turned off by default in the bottom of the admin screen.


= What if I already have a Wordpress site up and running? =

Then this plugin won't save you nearly as much time unless you've done little customization after your installation. Deactivate any plugins that are turned on, and be sure to UNcheck any options in the admin panel that you may have already completed, or that you don't need to change.

= Does core tweaks work with Windows servers? =

No - Windows servers are not currently supported, and never will be.

= What if I need more help? =
Please visit the <a href='http://www.seoautomatic.com/forum/wp-tweak-plugin/'>SEO Automatic Support Forum</a>, which should be pretty empty, since we have very few issues.

= Help! I have a missing/broken image on the privacy policy page created by Core Tweaks =

This has been corrected starting with version 3.71. The previous image supplied by freeprivacypolicy.com became unavailable and we didn't notice. 

If you have not edited your privacy policy after creation, either delete it and and use core tweaks to add one again after you have upgraded to 3.71 or higher, or much easier, manually edit your page to remove the broken image.

== Screenshots ==

1. Screenshot

== Changelog ==

= 3.9 =

* Addition of Our Profiles tool.

= 3.8.2 =

* Removed Page Order, Page link, and Post Teaser. The features of these plugins are now built-in to wordpress in more advanced ways. If you're site is currently using these plugins through Core Tweaks, they will continue to work, although you will not be able to change settings for them from the wp-admin menu. Once you've converted/adjusted from using them to the wordpress features, you can permanently deactivate them from the core tweaks settings page. (Note: once off, then can not be reactivated.)

= 3.8.1 =

* Added target="_blank" to main title of rss extended feed.

= 3.8 =

* Added ability to limit characters of rss extended feed content descriptions.
* In order to assure compatibility with the Yoast WordPress SEO plugin and eliminate confusion among users, we have removed the WP user field for "Google Profile URL.
* Changed wording on fail error message for the organize uploads by date option to prevent confusion with the checkbox.
* Added more information to the permalink setting to warn on existing permalink settings being changed.
* Readme.txt redone to include changelog correctly.
* Updated main SEO Automatic admin page with new links for other SEO Automatic plugins.

= 3.7.6 =

* Addition of setting import/export.
* Some wording change and set sitemap page creation to off by default.

= 3.7.5 =

* Banner addition to plugin download page.

= 3.7.4 =

* Wording change.

= 3.7.3 =

* Changes to privacy policy.
* Prevent HTML stripping from user profiles on/off option added.
* Added google profile url field to profile.

= 3.7.1 and 3.7.2 =

* Wording changes

= 3.7 =

* Updated Post Teaser to ***
* Separated all included plugins to be active or deactivated.
* Corrected uploads organization option to no reset on second run of core tweaks.
* Fixed privacy policy again.
* Revamped core tweaks admin home page and sidebars to be easier to edit between all SEO Automatic plugins.

= 3.6 =

* Added icons and images to plugin folder.
* Changed feeds from feedcommander to built-in wordpress rss.

= 3.5 =

* Updated Page Order plugin to *0a.

= 3.4 =

* Added on/off option for Post Teaser Plugin.

= 3.3 =

* Changed included image on privacy policy to a local image instead of external.
* Added FAQ on why image suddenly stopped working before **
* Edited wording on results page after running settings to clarify certain items better.

= 3.2 =

* Corrected some function naming to avoid conflicts.
* Added details on how the footer links work.
* Changed plugin name back to original.
* Added creation and try to set permissions on Google XML sitemap files.
* Added option to turn on and off full error reporting.
* Removed contact page pre-fill on the settings page.
* Added notation on how to increase post teasers.

= 3.0 =

* Updated Page Order to version *9.1
* Added privacy policy creation
* Added contact page creation with option for a google map
* Added remote publishing options.
* Added hook to footer for date, admin login, editing, privacy policy, and sitemap.
* Wording edits for clarification.

= 2.73 =

* Unchecked many options to get users to be more careful with settings.
* Updated messages and information to help users understand the results better.
* Changed layout and links.
* Removed out-dated help page and added more links to the forum.
* Logo change.

= 2.72 =

* Made a correction to the DD Sitemap Generator.

= 2.6 =

* Removed Canonical plugin since it's now included in All in One SEO plugin.
* Better Blogroll/Links-extended was removed until it is updated by the original developers. The widget options no longer save to the database.
* Updated Page Order plugin to version *8.*
* Updated Post Teaser to version *0.*
* Updated Sitemap Generator to version *1*
* Fixed the permission errors that were being seen.

= 2.5 =

* Update admin area to display properly in WP *8.

= 2.4 =

* Added the H2 to H1 theme change back in.
* Removed better blogroll temporarily until the issue of the links widget being removed and having to be readded is resolved.

= 2.2 =

* Updated robots.txt file contents.
* Screenshot at repository is working now.
* Removed all theme related tweaks except the H1 Hack.
* Updated home page and style of plugin admin area.
* Reorganized results for easier viewing of success and errored items.
* Added deselect all checkboxes option.

= 1.9 =

* Page link manager is upgraded to *0b.
* Cleaning up file structure of plugin zip.
* New initial admin user can be added.
* H1 hack now auto changes the_title() to single_post_title() so that the h1 hack of changeH1 in the custom metas will work easily.

= 1.8 =

* Robot meta tag is added to the header.
* Auto creation of sitemap page for DDSiteMap Gen and removed from navigation menu.
* Auto creation of a robots.txt file in the blog root.

= 1.7 =

* Added change of H2 to H1 tags for current theme.
* Canonical Plugin now integrated.
* Dagon Design Sitemap Generator integrated.

= 1.6 =

* Corrected Cheatin' Huh message, but need more testing by beta testers to be sure since this requires a fresh wordpress install.
* Added ability to change blog description/tagline.
* Added attempt to create uploads folder and set permission to 77* (Will work depending on what your hosting server allows.)
* Added uncheck option for the organize uploads by month/year.

= 0.9 thru 1.3 =

* Development versions and SVN testing

== Other Notes ==

1. We recommend disabling any other plugins before running the process to minimize potential confilcts. There will be no conflicts when you re-enable them.

2. Your .htaccess file should be writable for your permalinks to change.

3. The permalink option is "on" by default. If you've already set your permalinks and forgot to uncheck the option box, you can easily go back and change back to your original settings in wp-admin > Settings > Permalinks.

<a href='http://www.seoautomatic.com/plugins/'>SEO Automatic Plugins</a> | 
<a href='http://www.seoautomatic.com/plugins/wp-core-tweaks/'>SEO Automatic Core Tweaks</a>