<?php
get_header();
pagebanner(array(
  'title_a' => 'All Event',
  'subtitle_b' => 'see what is going on in our world.',
));
?>
<!-- 
<div class="page-banner">
  <div class="page-banner__bg-image"
    style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg');?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"> All Event </h1>  
      <div class="page-banner__intro">
        <p> see what is going on in our world.</p>
      </div>
    </div>  
  </div> -->

    


    
    <!-- <?php if(is_category()){
        single_cat_title();
    }
    if(is_author()){
       echo "posts by "; the_author();
    } ?> -->
    <!-- <?php the_archive_title(); ?>
    </h1>
    <div class="page-banner__intro">
      <p><?php the_archive_description(); ?></p>
    </div>
  </div>
</div> -->

<div class="container container--narrow page-section">
   <?php while (have_posts()) {
   the_post(); 
   get_template_part('template-parts/event-excerpt')?>
  <!-- <div class="post-item"> 
    <h2 class="headline  headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h2>
    <div class="metabox">
      <p>posted by <?php the_author_posts_link(); ?> on <?php the_time('d:F:Y'); ?> in <?php echo get_the_category_list(',') ?></p>
    </div>
    <div class="generic-content">
      <!- <?php the_content(); ?> ->
      <?php the_excerpt(); ?>
      <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">continue reading&raquo;</a></p>
    </div>
  </div> -->
   <!-- <div class="event-summary">
   <a class="event-summary__date t-center" href="#">
              <span class="event-summary__month"><?php 
              $eventdate = new datetime(get_field('event_date'));
              echo $eventdate-> format('M');
               ?></span>
              <span class="event-summary__day"><?php echo $eventdate-> format('d'); ?></span>
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <p> <?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
            </div>
          </div> -->
<?php };
  echo paginate_links();
?> 
<hr class='section-break'>
<p>Lookin for recap of past event? <a href="<?php echo "site url('/past-event')" ?>"> check out our past event</a></p>
</div>

<?php
get_footer();
?>