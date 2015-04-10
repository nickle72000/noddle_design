<?php
/********** Put your own function here *************/




function your_css_and_js() {

wp_enqueue_style( 'script-name1',get_template_directory_uri().'/css/midnight_blue.css');

wp_enqueue_script( 'script-name',get_template_directory_uri().'/js/jquery.heapbox-0.9.4.min.js');
}
add_action( 'wp_enqueue_scripts','your_css_and_js');

wp_enqueue_scripts();