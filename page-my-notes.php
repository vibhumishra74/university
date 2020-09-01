<?php get_header(); ?>
<?php
if(!is_user_logged_in()){
 wp_redirect(esc_url(site_url('/')));
 exit;
}

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
      <ul class="min-list link-list" id ='mynotes'>
            <?php $usernotes = new wp_Query (array(
                'post_type' => 'note', // this note from mu-plug in folder
                'posts_per_page'=> -1,
                'author' => get_current_user_id()
            ));
            while ($usernotes->have_posts()) {
                $usernotes->the_post();?>
            <li>
                <input class="note-title-field" type="text" value="<?php echo esc_attr(get_the_title()); ?>">
                <span class='edit-note'> <i class="fa fa-pencil" aria-hidden='true'></i> Edit</span>
                <span class='delete-note'> <i class="fa fa-trash-o" aria-hidden='true'></i> Delete</span>
                <textarea class="note-body-field" name="" id="" cols="30" rows="10"><?php echo esc_attr(wp_strip_all_tags(get_the_content())); ?></textarea>
            </li>
            <?php }
            ?>
      </ul>

  </div>   
  <?php };
    ?>
    <?php get_footer(); ?>