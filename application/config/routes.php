<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "home";
$route['404_override'] = '';
$route['aboutus'] = 'about/ourstory';
$route['contactus'] = 'contact/contactus';
$route['landowners'] = 'contact/landowners';

/* Optional: route titles array (for dynamic titles) */
$route['route_titles'] = [
    'home'       => 'Home',
    'aboutus'    => 'About Us',
    'contactus'  => 'Contact Us',
    'landowners' => 'Land Owners Query'
];
