<?php
/* 
Plugin Name: Change Attachment Parent
Plugin URI: http://lacquerhead.ca/2009/07/change-attachment-parent/
Description: Change the associated parent of a media attachment.
Author: Joel Sholdice
Version: 0.3
Author URI: http://lacquerhead.ca/
*/

add_filter('attachment_fields_to_edit', 'addparentfield', 10, 2);
add_filter('attachment_fields_to_save', 'updateparent', 11, 2);

function addparentfield( $form_fields, $post ) {
    $form_fields['post_parent']['tr']='';
    $form_fields['post_parent']['input']='text';
    $form_fields['post_parent']['value']=$post->post_parent;
    $form_fields['post_parent']['helps']=get_the_title($post->post_parent);
    $form_fields['post_parent']['label']='Parent Post ID';
    return $form_fields;
}

function updateparent($post, $attachment) {
    //$sql="UPDATE `wp_posts` SET `post_parent` = '$_POST[post_parent]' WHERE `ID`='$attachment[ID]';";
    //mysql_query($sql);
    $post[post_parent]=$attachment[post_parent];
    return $post;
}

?>
