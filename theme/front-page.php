<?php

  function output_all_media_gallery_images () {
    $query_images_args = array(
      'post_type' => 'attachment',
      'post_mime_type' =>'image',
      'post_status' => 'inherit', 
      'posts_per_page' => -1,
    );

    $query_images = new WP_Query($query_images_args);

    foreach ( $query_images->posts as $image){
      echo wp_get_attachment_image( $image->ID,'large'); //, $size, $icon, $attr  
    }
  }

  add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
  remove_action('genesis_loop', 'genesis_do_loop');
  add_action('genesis_loop', 'output_all_media_gallery_images');

  genesis();
?>