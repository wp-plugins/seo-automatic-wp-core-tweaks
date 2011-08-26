<?php
function seoauto_add_google_profile( $contactmethods ) {
	$fullline = '<a name="googleline"></a>Google Profile URL <a href="#googleline" onclick=\'window.open ("'.plugins_url().'/seo-automatic-wp-core-tweaks/google-profile-code.htm","googlecodewindow","menubar=0,resizable=1,location=0,toolbar=0,width=625,height=250");\'>?</a>';
	// Add Google Profile URL (code from Yoast plugin, used only if yoast is not active)
	$contactmethods['google_profile'] = $fullline;
	return $contactmethods;
}
?>