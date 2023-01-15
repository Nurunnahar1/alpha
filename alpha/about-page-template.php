<?php
/*
*Template Name: About Page Template
*/ 
?>
 
<?php get_header(); ?>
<body <?php body_class(); ?>>
  
<?php get_template_part("template-parts/about-page/hero-page"); ?>
 
 <div class="posts">
      <?php  
      while(have_posts()){
         the_post();

         ?> 


      <div class="post" <?php body_class(); ?>>
         <div class="container">
            <div class="row">

               <div class="col-md-10 offset-md-1">
                              <h2 class="post-title text-center "><?php the_title(); ?></h2>
                              <p class="text-center">
                     <strong><?php the_author(); ?></strong><br>
                     <?php echo get_the_date(); ?>
                  </p>
                        </div>
            </div>
            <div class="row">

               <div class="row">
                  <div class="col-md-8 offset-md-2">
                   <?php 
                   if ( class_exists( 'Attachments' ) ){
                     ?>
                     <h2 class="text-center"><?php _e("Testimonials","alpha"); ?></h2>
                   <?php
                  }
                  ?>
                     <div class="testimonials slider text-center">
                   <?php 
                   if ( class_exists( 'Attachments' ) ){
                    $attachments= new Attachments("testimonials");
                         if ($attachments->exist()) {
                              while($attachment = $attachments->get()){
                                 ?>
                                    <div>

                                       <?php echo $attachments->image('thumbnail'); ?>
                                         <h4><?php echo esc_html($attachments->field('name')); ?></h4> 
                                         <p><?php echo esc_html($attachments->field('testimonial')); ?></p>
                                         <p>
                                            <?php echo esc_html($attachments->field('position')); ?><br>
                                            <strong><?php echo esc_html($attachments->field('company')); ?></strong>
                                         </p>
                                       </div>
                                <?php
                              }
                         }
                    }
                     ?>
                        
                     </div>
                  </div>
               </div>
      
               <div class="col-md-10 offset-md-1">
                  <p>
                        <?php
                        if(has_post_thumbnail()){
                           $thumbnail_url=get_the_post_thumbnail_url(null,"large");
                        
                       // echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                          printf('<a href="%s" data-featherlight="image">',$thumbnail_url);
                           the_post_thumbnail("large",array("class"=>"img-fluid"));
                           echo '</a>';
                        }
                        the_content(); 
                      
                        ?>
                  </p>

                  
                  
               </div>

            </div>
         </div>
      </div>

      <?php
      }
      ?>
      <div class="container post-pagination">
         <div class="row">
            <div class="col-md-4"> </div>
                <div class="col-md-8">
                
                        <?php
                        the_posts_pagination(array(
                            "screen_reader_text"=>'',
                            "prev_text"=>"New Posts",
                            "next_text"=>"Old Posts"
                        ));
                        
                        
                        ?>
                </div>
         </div>
      </div>
 </div>

 

<?php get_footer(); ?>




 