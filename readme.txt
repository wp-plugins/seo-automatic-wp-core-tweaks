=== Searchcommander WP_CORE_TWEAKS ===
Contributors: Heather Barger & Scott Hendison
Donate link: 
Tags: installation, common settings, post teaser, page link, page order, canonical, sitemap, h1, core tweaks, seo automatic
Requires at least: 2.7
Tested up to: 2.7
Stable tag: 1.1

Extends built-in features of Wordpress and combines common plugins into one.

== Description ==

Extends built-in features of Wordpress and combines common plugins into one. Core Tweaks was initially designed for quickening the installation process of new blogs, but is excellent for existing blogs also.

(DDSitemapGen is temporarily removed until the language file inclusion is worked out.)

== Installation ==

1. Unzip the download
2. Upload the entire folder: `sc-wp-core-tweaks` to the `/wp-content/plugins/` directory
3. If you are currently using any of the plugins included in sc-wp-core-tweaks, it's highly recommended to deactivate them before activating core tweaks.
3. Activate the plugin through the 'Plugins' menu in Wordpress
4. Set options in SEO Automatic > Core Tweaks for changing the Wordpress preinstalled installation options.
5. Post Teaser, Page Link Manager, Page Order, Canonical, and Dagon Design Sitemap Generator will automatically be installed with this plugin and can be found in the normal locations and used the same as always.

== Frequently Asked Questions ==

= What is this plugin for? =

Adds a new menu, "SEO Automatic", and a sub-menu named "Core Tweaks". This plugin saves a lot of time properly setting up a new Wordpress installation by allowing instant access for the things that must be changed for every installation. It also combines functionality of several other plugins.

= What if I already have a Wordpress site up and running? =

Then this plugin won't save you nearly as much time, but will combine several useful plugins into one.

= What if I forgot to deactivate one of the included plugins first? Or I'm getting a fatal error when trying to activate. =

Read the error note at the top. You should find a plugin name in the error. Deactivate it and try activating Core Tweaks again. Core Tweaks tries to automatically deactivate them for you, but can't always successfully turn them all off.

== Screenshots ==

1. screenshot-core-tweaks.jpg - `/trunk/screenshot-core-tweaks.jpg`

== Features ==

1. Page Order for menu now available in WP
2. Page Link Manager allows choice to not display page on menu
3. Post Teaser shows snippet of posts on category, archive and main pages
4. Change default post category name from "Uncategorized"
5. Change default blogroll category name from "Blogroll"
6. Delete default "Hello World" post
7. Delete default comment on the Hello World post
8. Change permalink structure to custom setting recommended by Scott & others
9. Sets the Main Blog Email for convenience
10. Sets the Admin User's Email for convenience
11. Change the name of the default page that Wordpress adds from "About".
12. Set that default page to the static front page of the blog if using WP as a CMS
13. Add and sets the page for displaying the posts for convenience
14. Change article feed to summary (if desired)
15. Remove all the blogroll links that are auto-installed by Wordpress

Added with version 1.0b

* Page link manager is upgraded to 1.0b.
* Cleaning up file structure of plugin zip.
* New initial admin user can be added.
* H1 hack now auto changes the_title() to single_post_title() so that the h1 hack of changeH1 in the custom metas will work easily.
* Robot meta tag is added to the header.
* Auto creation of sitemap page for DDSiteMap Gen and removed from navigation menu.
* Auto creation of a robots.txt file in the blog root.
* Added change of H2 to H1 tags for current theme.
* Canonical Plugin now integrated.
* Dagon Design Sitemap Generator integrated.

Added with version 0.9b

* Corrected Cheatin' Huh? message, but need more testing by beta testers to be sure since this requires a fresh wordpress install.
* Added ability to change blog description/tagline.
* Added attempt to create uploads folder and set permission to 777. (Will work depending on what your hosting server allows.)
* Added uncheck option for the organize uploads by month/year.

[SEO Automatic Plugins](http://www.seoautomatic.com/plugins/ "Other plugins from SEO Automatic") 
[SEO Automatic Core Tweaks](http://www.seoautomatic.com/plugins/wp-core-tweaks/ "Core Tweaks Homepage") 