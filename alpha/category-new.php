<?php
single_cat_title();
$alpha_current_term=get_queried_object();

// echo "<pre>";
// var_dump($alpha_current_term);

$alpha_term_thumbnail_id=get_field("thumbnail",$alpha_current_term);

// $file=get_field("thumbnail");
// $file_url=wp_get_attachment_url($file);

if($alpha_term_thumbnail_id){
    $file_thumb_details=wp_get_attachment_image_src($alpha_term_thumbnail_id);
    echo "<img src='".esc_url($file_thumb_details[0]) ."' />";
}
// <a target='_blank' href='{$file_url}'></a>
?>