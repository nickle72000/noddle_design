<?php
/********** Put your own function here *************/

function your_css_and_js() {

wp_enqueue_style( 'script-name1',get_template_directory_uri().'/css/midnight_blue.css');

wp_enqueue_script( 'script-name',get_template_directory_uri().'/js/jquery.heapbox-0.9.4.min.js');
}
add_action( 'wp_enqueue_scripts','your_css_and_js');

wp_enqueue_scripts();


 function registerglobal() {

               $args = func_get_args();

               while (list(,$key) = each ($args)) {

                       if (isset($_GET[$key])){ $value = $_GET[$key];}
                       else if (isset($_POST[$key])){ $value = $_POST[$key];}
                       else if (isset($_FILES[$key])){ $value = $_FILES[$key];}else{ $value=''; }

                       if (isset($value)) {

                               if (!ini_get ('magic_quotes_gpc')) {

                                       if (!is_array($value))
                                               $value = addslashes($value);
                                       else
                                               $value = slasharray($value);
                               }

                               $GLOBALS[$key] = $value;
							   
                               unset($value);
                       }
               }
       }
