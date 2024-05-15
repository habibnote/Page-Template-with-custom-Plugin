<?php
/*
*
Plugin Name: Page Tempalte With Plugin
Description: Plugin for custom page template.
Version: 1.0
Author: Md. Habib
*/


function my_template_register( $temp ) {

    $temp['custom-template.php'] = __( 'Custom Template', 'textdomain' ); //write your cutom template name as value and write your file name as array key

    return $temp;
}
add_filter( 'theme_page_templates', 'my_template_register' );


function my_template_select( $template ) {
    
    global $post;
    $page_temp_slug = get_page_template_slug( $post->ID );

    if( isset( $page_temp_slug ) ) {
        $template = plugin_dir_path(__FILE__) . 'template/' . $page_temp_slug;
    }

    return $template;
}
add_filter( 'template_include', 'my_template_select' );