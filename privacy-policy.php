<?php
// Add the privacy policy page
	global $wpdb;

if ($_REQUEST['action'] == "changecore") {
	 if ($_REQUEST['privacy_policy'] == "ON") {

if ($_REQUEST['privacy_contact_email'] != '') {
	$privacy_contact_email = str_replace('@', ' (at) ', $_REQUEST['privacy_contact_email']);
}
if ($_REQUEST['privacy_contact_name'] != '') { 
	$privacy_contact_name = $_REQUEST['privacy_contact_name'];
}

$info = array(
'post_status' => 'publish', 
'post_type' => 'page',
'post_author' => 1,
'ping_status' => get_option('default_ping_status'), 
'post_parent' => 0,
'menu_order' => 0,
'to_ping' =>  '',
'pinged' => '',
'post_password' => '',
'guid' => '',
'post_content_filtered' => '',
'post_excerpt' => '',
'import_id' => 0,
'post_name' => 'privacy-policy',
'post_title' => 'Privacy Policy',
'post_content' => "<strong>What information do we collect?</strong> <br /><br />We collect information from you when you register on our site, place an order, subscribe to our newsletter or fill out a form.  <br /><br />When ordering or registering on our site, as appropriate, you may be asked to enter your: name, e-mail address, mailing address, phone number or credit card information. You may, however, visit our site anonymously.<br /><br /><strong>What do we use your information for?</strong> <br /><br />Any of the information we collect from you may be used in one of the following ways: <br /><br />&#149; To personalize your experience<br />(your information helps us to better respond to your individual needs)<br /><br />&#149; To improve our website<br />(we continually strive to improve our website offerings based on the information and feedback we receive from you)<br /><br />&#149; To improve customer service<br />(your information helps us to more effectively respond to your customer service requests and support needs)<br /><br />&#149; To process transactions<br />Your information, whether public or private, will not be sold, exchanged, transferred, or given to any other company for any reason whatsoever, without your consent, other than for the express purpose of delivering the purchased product or service requested.<br /><br />&#149; To send periodic emails<br />The email address you provide for order processing, will only be used  to send you information and updates pertaining to your order.If you decide to opt-in to our mailing list, you will receive emails that may include company news, updates, related product or service information, etc.<br /><br /><br /><br />Note: If at any time you would like to unsubscribe from receiving future emails, simply click on the unsubscribe options at the bottom of every email..<br/><br /><br /><br /><strong>How do we protect your information?</strong> <br /><br />We implement a variety of security measures to maintain the safety of your personal information when you place an order or access your personal information. <br /> <br />We offer the use of a secure server. All supplied sensitive/credit information is transmitted via Secure Socket Layer (SSL) technology and then encrypted into our Payment gateway providers database only to be accessible by those authorized with special access rights to such systems, and are required to keep the information confidential.<br /><br />After a transaction, your private information (credit cards, social security numbers, financials, etc.) will not be stored on our servers.<br /><br /><strong>Do we use cookies?</strong> <br /><br />Yes (Cookies are small files that a site or its service provider transfers to your computers hard drive through your Web browser (if you allow) that enables the sites or service providers systems to recognize your browser and capture and remember certain information<br /><br /> We use cookies to help us remember and process the items in your shopping cart, understand and save your preferences for future visits and compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.<br /><br />If you prefer, you can choose to have your computer warn you each time a cookie is being sent, or you can choose to turn off all cookies via your browser settings. Like most websites, if you turn your cookies off, some of our services may not function properly. However, you can still place orders over the telephone.<br /><br /><strong>Do we disclose any information to outside parties?</strong> <br /><br />We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others rights, property, or safety. However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.<br /><br /><strong>Third party links</strong> <br /><br /> Occasionally, at our discretion, we may include or offer third party products or services on our website. These third party sites have separate and independent privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites. Nonetheless, we seek to protect the integrity of our site and welcome any feedback about these sites.<br /><br /><strong>California Online Privacy Protection Act Compliance</strong><br /><br />Because we value your privacy we have taken the necessary precautions to be in compliance with the California Online Privacy Protection Act. We therefore will not distribute your personal information to outside parties without your consent.<br /><br />As part of the California Online Privacy Protection Act, all users of our site may make any changes to their information at anytime by logging into their control panel and going to the 'Edit Profile' page.<br /><br /><strong>Childrens Online Privacy Protection Act Compliance</strong> <br /><br />We are in compliance with the requirements of COPPA (Childrens Online Privacy Protection Act), we do not collect any information from anyone under 13 years of age. Our website, products and services are all directed to people who are at least 13 years old or older.<br /><br /><strong>Online Privacy Policy Only</strong> <br /><br />This online privacy policy applies only to information collected through our website and not to information collected offline.<br /><br /><strong>Your Consent</strong> <br /><br />By using our site, you consent to our websites privacy policy (obtained from <a style='text-decoration:none; color:#3C3C3C;' href='http://www.freeprivacypolicy.com/' target='_blank'>Trustguard</a>).<br /><br /><strong>Changes to our Privacy Policy</strong> <br /><br />If we decide to change our privacy policy, we will post those changes on this page. <br /><br />This policy was last modified on July, 2010<br /><br /><strong>Contacting Us</strong> <br /><br />If there are any questions regarding this privacy policy you may contact us using the information below. <br /><br /><div style='float:right; text-align:center; padding-bottom: 15px; padding-left: 15px; padding-right: 13px;'><br /><br /><br /> <img style='border:none;' src='".plugins_url()."/seo-automatic-wp-core-tweaks/images/freeprivacy.jpg' alt='FreePrivacyPolicy.com' /></div>".$privacy_contact_name."<br />".$privacy_contact_email);

$post_id = wp_insert_post($info);
	if ($post_id != 0) {
		$excludedPages = get_option('gdm_excluded_pages');
		$excludedPages[] = $post_id;
		update_option('gdm_excluded_pages', $excludedPages);
		update_option('seoauto_core_ppid', $post_id);
		wp_cache_delete('all_page_ids', 'pages');
		$success .= "<li>The privacy policy was created.</li>";
	} else {
		$fail .= "<li>The privacy policy was not able to be created.</li>";
	}
	} else {
		$notused .= "<li>Create privacy policy.</li>";
	}
} else {
	$options .= '<li><input name="privacy_policy" type="checkbox" value="ON" /> Create a privacy page with your contact information using text provided by FreePrivacyPolicy.com.<p>Company Name <input type="text" name="privacy_contact_name" size="20" value="Company Name"> &nbsp;&nbsp; Email <input type="text" name="privacy_contact_email" size="20" value="Email"></p></li>';
} 
?>