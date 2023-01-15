<?php

define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the Settings screen
add_filter( 'attachments_default_instance', '__return_false' ); // disable the default 

function alpha_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'alpha' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),

  );

  $args = array(

    'label'         => 'My Attachments',
    'post_type'     => array( 'post' , ),
   // 'position'      => 'normal',
    'priority'      => 'high',
    'filetype'      => array("image"),
    'note'          => 'Attach Sidebar Image!',
   // 'append'        => true,
    'button_text'   => __( 'Attach Files', 'alpha' ),
    //'modal_text'    => __( 'Attach', 'attachments' ),
  // 'router'        => 'browse',
	//'post_parent'   => false,
    'fields'        => $fields,
  );

  $attachments->register( 'slider', $args ); 
}

add_action( 'attachments_register', 'alpha_attachments' );





function alpha_testimonial_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'name',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Name', 'alpha' ),    // label to display
                            
    ),
        array(
      'name'      => 'position',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Position', 'alpha' ),    // label to display
                            
    ),
      array(
      'name'      => 'company',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Company', 'alpha' ),    // label to display
                                
    ),

    array(
      'name'      => 'testimonial',                         // unique field name
      'type'      => 'textarea',                          // registered field type
      'label'     => __( 'Testimonial', 'alpha' ),    // label to display
      
    ),

  );

  $args = array(

    'label'         => 'Testimonials',
    'post_type'     => array(   'page' ),
    'priority'      => 'high',
    'filetype'      => array("image"),
    'note'          => 'Attach Testimonail!',
    'button_text'   => __( 'Attach Files', 'alpha' ),
    'fields'        => $fields,
  );

  $attachments->register( 'testimonials', $args ); 
}

add_action( 'attachments_register', 'alpha_testimonial_attachments' );