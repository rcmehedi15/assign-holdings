<?php

$CI = &get_instance();
$query = "select *from siteinfo";

$siteinfo = $CI->db->query($query)->row();


if($siteinfo) {
    define('SITE_NAME', $siteinfo->name);
	define('SITE_TITLE', $siteinfo->metatitle);
	define('SITE_METAKEYS', $siteinfo->metakeys);
	define('SITE_METADESCRIPTION', $siteinfo->metadescription);
	define('SITE_LOGO', $siteinfo->logo);
	define('SITE_FAVICON', $siteinfo->favicon);
	
	
	define('SITE_PHONE', $siteinfo->phone);
	define('SITE_ADDRESS', $siteinfo->address);
	define('SITE_EMAIL', $siteinfo->email);
	
	
	
}
else{
	define('SITE_NAME', 'Real Estate');
	define('SITE_TITLE', 'Real Estate');
	define('SITE_METAKEYS', 'real estate');
	define('SITE_METADESCRIPTION', 'Best real estate');
	define('SITE_LOGO', '');
	define('SITE_FAVICON', '');
	
	
	define('SITE_PHONE', '0123456789');
	define('SITE_ADDRESS', 'Dhaka, Bangladesh');
	define('SITE_EMAIL', 'info@realestate.com');
}

?>