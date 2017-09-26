<?php
/*-----------------------------------------------------------------------------------*/
/* Enable shortdoces in sidebar default Text widget
/*-----------------------------------------------------------------------------------*/
add_filter('widget_text', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
/* Rooms
/*-----------------------------------------------------------------------------------*/
// add_shortcode('rooms', 'theme_shortcode_rooms');   
// function theme_shortcode_rooms($attr, $content)
// {        
//     ob_start();  
//     get_template_part('/includes/rooms');  
//     $ret = ob_get_contents();  
//     ob_end_clean();  
//     return $ret;    
// }