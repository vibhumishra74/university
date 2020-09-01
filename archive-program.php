<?php
get_header();
pagebanner(array(
  'title_a' => 'All Program',
  'subtitle_b' => 'There is something for every one have look around.',
));
?>

<!-- <div class="page-banner">
  <div class="page-banner__bg-image"
    style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg');?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"> All Program </h1>  
      <div class="page-banner__intro">
        <p> There is something for every one have look around.</p>
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
<ul class ="link-list min-list">
   <?php 
   while (have_posts()) {
   the_post(); ?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
   
<?php };
  echo paginate_links();
?> 
</ul>

</div>

<?php
get_footer();
?>