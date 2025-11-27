<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $title = 'My Website';

    public function __construct()
    {
        parent::__construct();

        // Load routes config
        $route_titles = $this->config->item('route_titles');

        // Get the first URI segment
        $segment = $this->uri->segment(1); // e.g., 'aboutus'

        if (!$segment) {
            $segment = 'home'; // default route
        }

        // Set the dynamic title
        if (isset($route_titles[$segment])) {
            $this->title = $route_titles[$segment];
        } else {
            // Fallback title if route not listed
            $this->title = ucfirst($segment);
        }
    }
}
