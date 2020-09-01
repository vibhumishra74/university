<?php
get_header();
pagebanner(array(
  'title_a' => 'our campuses',
  'subtitle_b' => 'we have several conveniently located campuses.',
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
<!-- <ul class ="link-list min-list">  this is from archive program -->
<div class ="acf-map">
   <?php 
   while (have_posts()) {
   the_post(); 
   $maplocation = get_field('map_location');
   
   ?>
<!-- <li><a href="<?php the_permalink(); ?>"><?php the_title();
 $maplocation = get_field('map_location');
 echo $maplocation['lng']; ?></a></li> -->
 <div class = "marker" data-lat='<?php echo $maplocation["lat"]; ?>' data-lng = '<?php echo $maplocation["lng"]; ?>'><h3><a href="<?php the_permalink(); ?>"><?php echo $maplocation['address'] ?></a></h3></div>
   
<?php };
//   echo paginate_links();
?> 
<!-- </ul> -->
</div>
</div>

<?php
get_footer();
?>