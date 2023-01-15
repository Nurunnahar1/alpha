<?php
if ( class_exists( 'Attachments' ) ){
  require_once get_theme_file_path('/lib/attachment.php');
}

require_once get_theme_file_path('/inc/tgm.php');
//require_once get_theme_file_path('/inc/acf-mb.php');
require_once get_theme_file_path('/inc/cmb2-mb.php');
 if(site_url()=="http://localhost/alpha"){
     define("VERSION",time());
 }else{
     define("VERSION",wp_get_theme()->get("Version"));
 }

function alpha_bootstrapping(){
   load_theme_textdomain("alpha");
   add_theme_support("post-thumbnails");
   add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
    add_image_size( 'alpha-square', 400, 400, true ); //center center
    add_image_size( 'alpha-square-new1', 401, 401, array("left","top") );
    add_image_size( 'alpha-square-new2', 500, 500, array("center","center") );
    add_image_size( 'alpha-square-new3', 600, 600, array("right","center") );
    
   add_theme_support("title-tag");
   add_theme_support("custom-background");
   add_theme_support( 'post-formats',  array ( 'aside', 'gallery', 'quote', 'image', 'video','audio','link' ) );
   add_theme_support("custom-header");
   $alpha_custom_logo=array(
    "width"=>'100',
    "height"=>'100'
   );
   add_theme_support("custom-logo",$alpha_custom_logo);
  
   register_nav_menu("topmenu",__("Top Menu","alpha")); 
   register_nav_menu("footermenu",__("Footer Menu","alpha")); 

   add_image_size('alpha_square',400, 400);
   add_image_size('alpha_portrail',400, 9999);
   add_image_size('alpha_landscape',9999, 400);
   add_image_size('alpha_landscape_hardcode',600, 400);
}
 add_action("after_setup_theme","alpha_bootstrapping");

 function alpha_assets(){
   
   wp_enqueue_style("bootstrap","//cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css");
   wp_enqueue_style("featherlight-css","//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");
   wp_enqueue_style("dashicons");
   wp_enqueue_style("tiny-slider","//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css");
   wp_enqueue_style("alpha",get_stylesheet_uri());

   wp_enqueue_script("featherlight-js","//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js",array("jquery"),"0.0.1",true);
   wp_enqueue_script("tiny-js","//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js",null,"0.0.1",true);
   wp_enqueue_script("alphamainjs",get_theme_file_uri('/assets/js/main.js'),null,"VERSION",true);

 }
 add_action("wp_enqueue_scripts","alpha_assets");


function alpha_sidebar(){
  register_sidebar(
    array(
      'name'          =>__('Single Post Sidebar','alpha'),
      'id'            =>'sidebar-1',
      'description'   =>__('Right Sidebar','alpha'),
      'bafore_widget' =>'<section id="%1$s" class="widget %2$s">',
      'after_widget'  =>'</section>',
      'before_title'  =>'<h2 class="widget-title">',
      'after-title'   =>'</h2>'
    )
    );
  register_sidebar(
    array(
      'name'          =>__('Footer Left','alpha'), 
      'id'            =>'footer-left',
      'description'   =>__('Widgetized Area On The Left Side','alpha'),
      'bafore_widget' =>'<section id="%1$s" class="widget %2$s">',
      'after_widget'  =>'</section>',
      'before_title'  =>'',
      'after-title'   =>''
    )
    );
  register_sidebar(
    array(
      'name'          =>__('Footer Right','alpha'),
      'id'            =>'footer-right',
      'description'   =>__('Widgetized Area On The Right Side','alpha'),
      'bafore_widget' =>'<section id="%1$s" class="widget %2$s">',
      'after_widget'  =>'</section>',
      'before_title'  =>'',
      'after-title'   =>''
    )
    );
}
add_action("widgets_init","alpha_sidebar");

function alpha_the_excerpt($excerpt){
  if(!post_password_required()){
    return $excerpt;
  }else{
    echo get_the_password_form();
  }
}
add_filter("the_excerpt","alpha_the_excerpt");

function alpha_protected_title_change(){
  return "%s";
}
add_filter("protected_title_format","alpha_protected_title_change");

function alpha_menu_item_class($classes ,$item){
  $classes[]="list-inline-item";
  return $classes;
}
add_filter("nav_menu_css_class","alpha_menu_item_class",10,2);

if(!function_exists("alpha_about_page_template_banner")){
  function alpha_about_page_template_banner(){
      if(is_page()){
        $alpha_feat_image=get_the_post_thumbnail_url(null,"large");
    
    ?>
    <style>
      .page-header{
        background-image: url(<?php echo $alpha_feat_image; ?>);
      }
    </style>
    <?php
    
      }
      if(is_front_page()){
        if(current_theme_supports("custom-header")){
    ?>
    <style>
      .header{
        background-image:url(<?php echo header_image(); ?>);
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
    
    <?php
        }
      }
    }
    add_action("wp_head","alpha_about_page_template_banner");
}
//add_filter('acf/settings/show_admin','__return_false');

 


function alpha_admin_assets($hook ) {
 if("post.php"==$hook){
  wp_enqueue_script( "admin-js",get_theme_file_uri("/assets/js/admin.js"),array("jquery"),VERSION,true );
 }
  
}
add_action( 'admin_enqueue_scripts', 'alpha_admin_assets' );

 function alpha_highlight_search_result($test){
  if (is_search()) {
    $pattern='/('.join('|',explode('aaa',get_search_query())).')/i';
    $text=preg_replace( $pattern,'<span class="search_highlight">\0</span>',$test);
  }
  return $test;
 }

add_filter('the_content','alpha_highlight_search_result');
add_filter('the_excerpt','alpha_highlight_search_result');
add_filter('the_title','alpha_highlight_search_result');


  
?>