<?php get_header(); ?>
<?php
  while (have_posts()) {
      the_post();
      pagebanner();
      ?>

<!-- <div class="page-banner"> -->
    <!-- <div class="page-banner__bg-image" style="background-image: url(<php $pagebannerimage = get_field('page_bannerbackground_image'); echo $pagebannerimage['sizes']['pagebanner'] ?>);"></div>  -->
     <!-- page_bannerbackground_image & page_banner_subtitle defiend on custum field plugin Advanced Custom Fields by Elliot Condon and pagebanner defiend on function.php  -->
    <!-- <div class="page-banner__content container container--narrow"> -->
    <!-- <php print_r($pagebannerimage); ?> to check all info like how we know $pagebannerimage give array and have to pass url get_field is plugin function not wp  -->
    <!--  <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p> <php the_field('page_banner_subtitle') ?>.</p>
      </div>
    </div>  
  </div> -->
  <div class="container container--narrow page-section">
 
     <div class="generic-content">
      <div class="row group">
      <div class="one-third">
      <?php the_post_thumbnail('professorportrait'); ?>
      </div>
      <div class="two-third">
      <?php  the_content(); ?>
      </div>
      </div>
     </div>
    <?php 
    $relatedprogram = get_field('related_programs'); //get_field from plugin and related_programs from plugin custom field custum field program

    if($relatedprogram){

      echo '<hr class="section-break">';
      echo '<h2 class="headline headline--medium">Subject(s) Taught</h2>';
      echo "<ul class='link-list min-list'>";
      foreach($relatedprogram as $program){
      ?>
      <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
      <?php };
      echo '</ul>';
    }
    ?>
  </div>
      
  <?php };
    ?>
<?php get_footer(); ?>