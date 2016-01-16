<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 1/6/2016
 * Time: 9:26 AM
 */

add_action('admin_init','hide_editor');

function hide_editor() {
    $post=get_pagepost();

    if(strtolower($post->post_title) == 'about'){ // edit the template name
        remove_post_type_support('page', 'editor');
    }
}

//add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars');

function my_toolbars( $toolbars )
{
    // Uncomment to view format of $toolbars
    /*
    echo '< pre >';
        print_r($toolbars);
    echo '< /pre >';
    die;
    */

    // Add a new toolbar called "Very Simple"
    // - this toolbar has only 1 row of buttons
    $toolbars['Simplest' ] = array();
    $toolbars['Simplest' ][1] = array('bold' , 'italic' , 'underline' );

    // Edit the "Full" toolbar and remove 'code'
    // - delet from array code from http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
    if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
    {
        unset( $toolbars['Full' ][2][$key] );
    }

    // remove the 'Basic' toolbar completely
    unset( $toolbars['Basic' ] );
    unset( $toolbars['Full' ]);
    // return $toolbars - IMPORTANT!
    return $toolbars;
}

function get_pagepost()
{
    // Get the Post ID.
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    echo("from inside".absint($post_id));

    if( !isset( $post_id ) ) return;
    $post =  get_post($post_id);

    // Get the name of the Page Template file.
    //$template_file = get_post_meta($post_id, '_wp_page_template', true);
    //die($template_file);
    return $post;
}
?>