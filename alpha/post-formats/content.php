<?php
/*
* Template Name:content
*/ 
?>

<div <?php body_class(); ?>>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                     </h2>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <p>
                        <strong><?php the_author(); ?></strong><br>
                        <?php echo get_the_date(); ?>
                     </p>
                     <?php echo get_the_tag_list("<ul class=\"list-unstyled\"><li>","</li><li>","</li></ul>"); ?>
                     <?php
                     $alpha_format=get_post_format();
                     if($alpha_format=="audio"){
                        echo '<span class="dashicons dashicons-format-audio"></span>';
                     }elseif($alpha_format=="video"){
                        echo '<span class="dashicons dashicons-video-alt3"></span>';
                     }elseif($alpha_format=="link"){
                        echo '<span class="dashicons dashicons-admin-links"></span>';
                     }elseif($alpha_format=="gallery"){
                        echo '<span class="dashicons dashicons-format-gallery"></span>';
                     }elseif($alpha_format=="image"){
                        echo '<span class="dashicons dashicons-format-image"></span>';
                     }elseif($alpha_format=="quote"){
                        echo '<span class="dashicons dashicons-format-quote"></span>';
                     }
                     
                     ?>
                        
         
                  </div>
                  <div class="col-md-8">
                  <p>
                        <?php
                        if(has_post_thumbnail()){
                           $thumbnail_url=get_the_post_thumbnail_url(null,"large");
                        
                       // echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                          printf('<a href="%s" data-featherlight="image">',$thumbnail_url);
                           the_post_thumbnail("large",array("class"=>"img-fluid"));
                           echo '</a>';
                        }
                        // the_content(); 
                        // next_post_link();
                        // echo "</br>";
                        // previous_post_link();
                        ?>
                  </p>

                     
                        
                  </div>
               </div>
            </div>
         </div>