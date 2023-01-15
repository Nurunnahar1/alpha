<?php
add_action( 'cmb2_init', 'cmb2_add_image_info_metabox' );
function cmb2_add_image_info_metabox() {

    if(isset($_REQUEST['post']) || isset( $_REQUEST['post-ID'])){
        $post_id=empty( $_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post-ID'];
    }
    $post_format=get_post_format($post_id);
  if("image"==$post_format){

        $prefix = '_alpha_';

        $cmb = new_cmb2_box( array(
            'id'           => $prefix . 'image_information',
            'title'        => __( 'Image Information', 'alpha' ),
            'object_types' => array( 'post' ),
            'context'      => 'normal',
            'priority'     => 'default',
        ) );

        $cmb->add_field( array(
            'name' => __( 'Camera Model', 'alpha' ),
            'id' => $prefix . 'camera_model',
            'type' => 'text',
            'default' => 'canon',
        ) );

        $cmb->add_field( array(
            'name' => __( 'Location', 'alpha' ),
            'id' => $prefix . 'location',
            'type' => 'text',
        ) );

        $cmb->add_field( array(
            'name' => __( 'Date', 'alpha' ),
            'id' => $prefix . 'date',
            'type' => 'text_date',
        ) );

        $cmb->add_field( array(
            'name' => __( 'Licensed', 'alpha' ),
            'id' => $prefix . 'licensed',
            'type' => 'checkbox',
        ) );

        $cmb->add_field( array(
            'name' => __( 'License Information', 'alpha' ),
            'id' => $prefix . 'license_information',
            'type' => 'textarea',
            'attributes'=>array(
                'data-conditional-id'=>$prefix . 'licensed',
            ),
        ) );
 }

}

?>