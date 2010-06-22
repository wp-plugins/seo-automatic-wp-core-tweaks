DONE: 1. Can the error reporting be a checkbox OPTION? 

DONE (BUT SEE NOTES): 2. New feature to Upload a blank sitemap.xml and a blank sitemap.xml.gz and have them be writable - then, when the user downloads and activates the XML sitemap plugin it will work.

Make is unchecked by default - put it right after robots.txt option - and please add sm. warning "Note that this will overwrite any existing sitemap.xml file. This option is to be used in conjunction with [link to Arne deBrachold s XML sitemap plugin]  - (open in new window)

DONE: 3. Please change name BACK to SEO Automatic Core Tweaks - 
If there's room, I suppose you could please make it SEO Automatic Core Tweaks - Instant WP Setup

SEE NOTES: 4. Try to add sitemap and privacy to footer - links add, but they dont work. 

OFF BY DEFAULT, CHECKBOX TO TURN ON: 5. Other ideas? Remove error reporting? 

note i just tested on your server, /uploads didn't create - i didn't make the master wp-content writable -  I guess that's necessary, but seems risky
* NOTATION: I don't think that I really noticed this before, I always leave my wp-content set to 777 afterwards. But for testing, after the uploads folder was created, I set the permissions back down on the wp-content folder on a site on my hosting, and it actually gave a full illusion of the site being completely crashed. Plugins partially worked and themes stopped. So that's something good to know. Not sure if all hosting actually follows the same pattern till I test that out because I always follow the WP rule of making the wp-content folder writable. But I guess common sense does say that if it weren't writable, auto-upgrade, uploads, backups wouldn't be able to work either.


NOTES:
1. I did find that the sitemaps (I assume because they go in the root) didn't fail. But no doubt, we'll eventually run across a site that refuses to create and set permissions on those too just like when you change permalinks and sometimes have to manually do your htaccess. So I suppose that's one of those "depends on your hosting" things. If they fail, the fail message actually lets the user know if the file couldn't be created and/or permissions couldn't be set.

2. On the footer links, the only way I could duplicate that problem was to NOT create the sitemap or privacy page THROUGH core tweaks - or create more than one and delete the most recent created one. So if possibly one of those combos happened, I added some text explaining that those links wouldn't work unless the sitemap and privacy page creation option was used through core tweaks. (I have no way to assign the pages to the links unless the pages are created directly by core tweaks. - that was the only catch-22 of adding those in the footer.)
So as an example:
core tweaks was used, sitemap and/or privacy pages were made. Something was forgotten - so core tweaks was used again and maybe by accident the pages were created again - the footer links will use the page info for the last created pages. 
Now, realizing the mistake - if you manually delete the ones that were double created, you might have deleted the pages that the links were assigned to connect to.

(I think it's a bit too much info to toss right in the wp-admin page. But I did add the note that I mentioned above on it.)
So.... this is what I added to the FAQ section regarding that: 

= The footer links are not working. =

First, the footer links will only work if you have created the sitemap and/or privacy page directly through Core Tweaks. If you didn't, the footer links will not know which page they need to refer to and you will have to manually add your links in your theme.

Second possibility: if you did create the pages through Core Tweaks. Check your page list (wp-admin > Pages) and be sure that you have them in the list. If you already checked that and found that there were more than one of either or both of the pages, did you delete any?
To correct, the simplest method is to delete them (all sitemap and privacy pages created by core tweaks), then go back to core tweaks and use the Add option for those pages again. Now your footer links should work correctly and you can still turn the links on or off as much as you like.
