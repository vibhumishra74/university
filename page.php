<?php get_header(); ?>
<?php
  while (have_posts()) {
      the_post();
      pagebanner(array(
        'title_a' => 'this is title from code in page.php',
        // 'subtitle_b' => 'this is subtitle',
        'photo' => 'https://images.unsplash.com/photo-1593642532454-e138e28a63f4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80'
      ));
      ?>
 
      <!-- <php the_content(); ?> -->
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
  <?php $theparent = wp_get_post_parent_id(get_the_ID());
     if($theparent) {; ?>
      <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theparent); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theparent); ?></a> <span class="metabox__main"><?php the_title(); ?></span></p>
    </div>
     <?php };
  ?>
   
   <?php 

      $testarry = get_pages(array(
        'child_of' => get_the_ID()
      ));
    if($theparent or $testarry) { ?>
    
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php echo get_permalink($theparent); ?>"><?php echo get_the_title($theparent); ?></a></h2>
      <ul class="min-list">
        <?php
        if($theparent){
            $findchildrenof = $theparent;
        }else{
          $findchildrenof = get_the_ID();
        }
            wp_list_pages(array(
              'title_li'=>NULL,
              'child_of'=> $findchildrenof
            ));
        ?>
      </ul>
    </div>
        <?php  }?>
    <div class="generic-content">
      <p><?php the_content();?>.</p>
    </div>

  </div>   
  <?php };
    ?>
    <?php get_footer(); ?>