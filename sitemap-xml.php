<?php
//Add the Google sitemap files to the root

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li><br />Add Google sitemap files: <small><b>(Note that this will overwrite any existing sitemap.xml or sitemap.xml.gz files. This option is to be used in conjunction with <a href="http://www.arnebrachhold.de/projects/wordpress-plugins/google-xml-sitemaps-generator/" target="_blank">Arne deBrachold\'s XML sitemap plugin</a>.)</b></small></li>';
}

if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['add_google_sitemaps_xml'] == "ON") {
		$googleXML = ABSPATH."sitemap.xml";
		if (file_exists($googleXML)) {
			$fail .= "<li>sitemap.xml file already exists, so we did not overwrite it.</li>";
		} else {
			$fh = fopen($googleXML, 'w');
			$stringData = "";
			fwrite($fh, $stringData);
			fclose($fh);
			if (file_exists($googleXML)) {
				$success .= "<li>The sitemap.xml file was created.</li>";
				if (chmod($googleXML, 0777)) {
					$success .= "<li>The sitemap.xml file permission was set to 777.</li>";
				} else {
					$fail .= "<li>The sitemap.xml file was create, but permission was unable to be set to 777.</li>";
				}
			} else {
				$fail .= "<li>The sitemap.xml file was not able to be created.</li>";
			}
		}

		} else {
			$notused .= "<li>Create sitemap.xml file.</li>";
		}
} else {
	$options .= '<li><input name="add_google_sitemaps_xml" type="checkbox" value="ON" /> Add the Google sitemaps.xml file to your blog root. <small><b>(Cannot be undone (aside from manual FTP).)</b></small></li>';
}

if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['add_google_sitemaps_xmlgz'] == "ON") {
		$googlexmlgz = ABSPATH."sitemap.xml.gz";
		if (file_exists($googlexmlgz)) {
			$fail .= "<li>sitemap.xml.gz file already exists, so we did not overwrite it.</li>";
		} else {
			$fh = fopen($googlexmlgz, 'w');
			$stringData = "";
			fwrite($fh, $stringData);
			fclose($fh);
			if (file_exists($googlexmlgz)) {
				$success .= "<li>The sitemap.xml.gz file was created.</li>";
				if (chmod($googlexmlgz, 0777)) {
					$success .= "<li>The sitemap.xml.gz file permission was set to 777.</li>";
				} else {
					$fail .= "<li>The sitemap.xml.gz file was created, but permission was unable to be set to 777.</li>";
				}
			} else {
				$fail .= "<li>The sitemap.xml.gz file was not able to be created.</li>";
			}
		}

		} else {
			$notused .= "<li>Create sitemap.xml.gz file.</li>";
		}
} else {
	$options .= '<li><input name="add_google_sitemaps_xmlgz" type="checkbox" value="ON" /> Add the Google sitemaps.xml.gz file to your blog root. <small><b>(Cannot be undone (aside from manual FTP).)</b></small></li>';
}

if ($_REQUEST['action'] != "changecore") {
	$options .= '<li>&nbsp;</li>';
}
?>