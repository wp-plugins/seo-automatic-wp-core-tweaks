<div class="wrap">
<h1>SEO Automatic Admin Area</h1>
<p>You can access any of your modules from the site menu options or:</p>
<?php
if (function_exists('autoseo_add_pages')){
	echo "<a href=\"?page=seo-automatic-options\">SEO Automatic</a><br />";
}
if (function_exists('sc_settings')) {
	echo "<a href=\"?page=sc-wp-core-tweaks/settings.php\">Core Tweaks</a><br />";
}
if (function_exists('affiliate_menu')) {
	echo "<a href=\"?page=affiliate/files/admin/index.php\">Affiliate Site Generator</a><br />";
}
?>
<p>Please check out the entire suite of SEO automatic plugins here - <a target="_blank" href="http://www.seoautomatic.com/plugins/">http://www.seoautomatic.com/plugins/</a></p>
<p><div style="background-color: #e2e2e2;">
<?php 
        $url="http://www.feedcommander.com/free/rssread.php?src=http://www.seoautomatic.com/feed&title=n&lines=5&boxpadding=10&b_width=0&b_height=0&h_bar=n&v_bar=n&mq=n&mq_di=DOWN&mq_n=3&mq_dy=200&b_color=none&b_style=none&b_b_color=ffffff&b_b_weight=thin&t_font=&t_s_bold=y&t_s_italic=n&t_s_underline=y&t_s_marquee=n&t_size=16&t_align=center&t_color=&i_max_char=0&i_font=&i_s_bold=y&i_s_italic=n&i_s_underline=n&i_s_marquee=n&i_size=11&i_color=&c_max_char=200&c_font=&c_s_bold=n&c_s_italic=n&c_s_underline=n&c_s_marquee=n&c_size=11&c_align=left&c_color=&html=y"; 
        $ch = curl_init($url); 
        curl_setopt($ch, CURLOPT_HEADER, 0); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $results=curl_exec($ch); 
        curl_close($ch); 
        print("$results"); 
?></div></p>
</div>
