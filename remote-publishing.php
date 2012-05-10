<?php
//Set remote publishing options

if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['atom_pub'] == "ON") {
		if (!update_option('enable_app', 1)) {
			$fail .= "<li>Not able to enable the atom publishing protocol.</li>";
		} else {
			$success .= "<li>Atom publishing protocol enabled.</li>";
		}
	} else {
		$notused .= "<li>Atom publishing protocol.</li>";
	}
} else {
	$options .= "<li><input type=\"checkbox\" id=\"atom_pub\" value=\"OFF\" onclick=\"setCheckedRight('atom_pub')\"> Enable the Atom Publishing Protocol.</li>";
}

if ($_REQUEST['action'] == "changecore") {
	if ($_REQUEST['xmlrpc_pub'] == "ON") {
		if (!update_option('enable_xmlrpc', 1)) {
			$fail .= "<li>Not able to enable the WordPress, Movable Type, MetaWeblog and Blogger XML-RPC publishing protocols.</li>";
		} else {
			$success .= "<li>The WordPress, Movable Type, MetaWeblog and Blogger XML-RPC publishing protocols are enabled.</li>";
		}
	} else {
		$notused .= "<li>WordPress, Movable Type, MetaWeblog and Blogger XML-RPC publishing protocols.</li>";
	}
} else {
	$options .= "<li><input type=\"checkbox\" id=\"xmlrpc_pub\" value=\"OFF\" onclick=\"setCheckedRight('xmlrpc_pub')\"> Enable the WordPress, Movable Type, MetaWeblog and Blogger XML-RPC publishing protocols. </li>";
}
?>