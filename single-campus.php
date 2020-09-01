<?php 
// the_ID(); this show id of this current page
get_header(); ?>
<?php
  while (have_posts()) {
      the_post();
      pagebanner();
      ?>

<!-- <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p> dont forget me to replace later.</p>
      </div>
    </div>  
  </div> -->
  <div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('campus'); ?>"><i class="fa fa-home" aria-hidden="true"></i>All Campus</a> <span class="metabox__main"><?php the_title(); ?></span></p>
    </div>
     <div class="generic-content">
       <?php  the_content(); ?>
     </div>
     <div class ="acf-map">
   <?php 
  
   $maplocation = get_field('map_location');
   
   ?>
<!-- <li><a href="<?php the_permalink(); ?>"><?php the_title();
 $maplocation = get_field('map_location');
 echo $maplocation['lng']; ?></a></li> -->
 <div class = "marker" data-lat='<?php echo $maplocation["lat"]; ?>' data-lng = '<?php echo $maplocation["lng"]; ?>'><h3><?php echo $maplocation['address'] ?></h3></div>
   
<?php //};
//   echo paginate_links();
?> 
<!-- </ul> -->
</div>
     <?php

               $relatedprofessor = new WP_Query(array(
             'posts_per_page' => -1,
             'post_type' => 'professor',
            //  'meta_key' =>'event_date',
             'orderby' => 'title',
             'order' => 'asc',
             'meta_query' => array(
               
               array(
                   'key' => 'related_programs',
                   'compare' => 'LIKE',
                   'value' => '"'.get_the_ID() .'"' // this will filter out related program with related event
               )
             )
           ));
         if($relatedprofessor->have_posts()){ //for this we dublicated custom field in plugin related_programs location in or section
                
            echo '<hr class="section--break">';
            echo '<h2 class="headline headline--medium"> '. get_the_title().' Professor</h2>';
            echo "<ul class='professor-cards' >";
            while ($relatedprofessor-> have_posts()) {
             $relatedprofessor->the_post();?>
            <li class="professor-card__list-item">
                  <a class="professor-card" href="<?php the_permalink(); ?>"><?php the_title(); ?>
                    <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorlandscape'); ?>" alt="professor title">
                    <span class="professor-card__name"> <?php the_post_thumbnail(); ?></span>
                  </a>
            </li>

            <?php };
            echo "</ul>";

         }
            wp_reset_postdata();

           $today = date('Ymd');
           $homepageevents = new WP_Query(array(
             'posts_per_page' => 2,
             'post_type' => 'event',
             'meta_key' =>'event_date',
             'orderby' => 'meta_value_num',
             'order' => 'asc',
             'meta_query' => array(
               array(
                 'key' => 'event_date',
                 'compare' => '>=',
                 'value' => $today,
                 'type' => 'numeric'
               ),
               array(
                   'key' => 'related_programs',
                   'compare' => 'LIKE',
                   'value' => '"'.get_the_ID() .'"' // this will filter out related program with related event
               )
             )
           ));
         if($homepageevents->have_posts()){
                
            echo '<hr class="section--break">';
            echo '<h2 class="headline headline--medium">upcoming '. get_the_title().' event</h2>';
            while ($homepageevents-> have_posts()) {
             $homepageevents->the_post();
             get_template_part('template-parts/event-excerpt');
             ?>
<!--              
           <div class="event-summary">
             <a class="event-summary__date t-center" href="#">
               <span class="event-summary__month"><?php 
               $eventdate = new datetime(get_field('event_date'));
               echo $eventdate-> format('M');
                ?></span>
               <span class="event-summary__day"><?php echo $eventdate-> format('d'); ?></span>
             </a>
             <div class="event-summary__content">
               <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
               <p><?php if(has_excerpt()){
                echo get_the_excerpt();
               } else{
                 echo wp_trim_words(get_the_content(),18);
               } ?>  <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a></p>
             </div>
           </div> -->
 
            <?php };

         }
            ?>
         
  </div>
      
  <?php };
    ?>
<?php get_footer(); ?>