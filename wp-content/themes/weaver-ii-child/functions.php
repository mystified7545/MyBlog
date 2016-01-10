<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 1/6/2016
 * Time: 9:26 AM
 */

add_action('admin_init','hide_editor');

function hide_editor() {

    // Get the Post ID.
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
   // die($post_id);
    //echo("This is the value".$post_id);

    if( !isset( $post_id ) ) return;

   $post =  get_post($post_id);

    // Get the name of the Page Template file.
    //$template_file = get_post_meta($post_id, '_wp_page_template', true);

    //die($template_file);

    if(strtolower($post->post_title) == 'about'){ // edit the template name
        remove_post_type_support('page', 'editor');
    }
}
?>