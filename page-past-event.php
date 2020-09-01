<?php
get_header();
pagebanner(array(
  'title_a' => 'Past Events',
  'subtitle_b' => 'A recape of our past Event.',
));
?>
<!-- 
<div class="page-banner">
  <div class="page-banner__bg-image"
    style="background-image: url(<php echo get_theme_file_uri('/images/ocean.jpg');?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"> Past Events </h1>  
      <div class="page-banner__intro">
        <p> A recape of our past Event.</p>
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
   <?php
     
     $today = date('Ymd');
     $pastevent = new WP_Query(array(
         'paged' => get_query_var('paged',1),
    //    'posts_per_page' => 1,
       'post_type' => 'event',
       'meta_key' =>'event_date',
       'orderby' => 'meta_value_num',
       'order' => 'asc',
       'meta_query' => array(
         array(
           'key' => 'event_date',
           'compare' => '<',
           'value' => $today,
           'type' => 'numeric'
         )
       )
     ));
   while ($pastevent->have_posts()) {
    $pastevent->the_post();
    get_template_part('template-parts/event-excerpt') ?>
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
  echo paginate_links(array(
      'total' => $pastevent->max_num_pages
  ));
?> 

</div>

<?php
get_footer();
?>