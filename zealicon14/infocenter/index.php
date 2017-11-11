<?php
	/*This file redirects to JSS Infocentre. 
	Please do not alter the contents of the file
	When placed in the root of a subdomain as "index", this file can be used to open the Infocenter directly when the subdomain is accessed
	*/
	$webhost['name']="JSS Website";
	$webhost['site']="http://www.jssaten.ac.in";
	$webhost['id']="JSSsite";
	$cid=$webhost['id'];
	$expire=time()+60*60;
	setcookie("redirected_from", "$cid", $expire);
	header("Location:http://info.zealicon.in/test");
?>