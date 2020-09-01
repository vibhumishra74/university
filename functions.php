<?php

 function pagebanner($args = null){
         //php logic will live here
                if(!$args['title_a']){
                       $args['title_a'] = get_the_title();
                }
                if(!$args['subtitle_b']){
                       $args['subtitle_b'] = get_field('page_banner_subtitle');
                }
                if(!$args['photo']){
                        if(get_field('page_bannerbackground_image')){

                                $args['photo'] = get_field('page_bannerbackground_image')['sizes']['pagebanner'];
                        }else{
                                $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
                                // $args['photo'] = get_field()['sizes']['pagebanner'];
                        }
                }
         ?>                                                              
                <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div> 
        <!-- $pagebannerimage = get_field('page_bannerbackground_image'); echo $pagebannerimage['sizes']['pagebanner'] in plce of $args['photo']
                 page_bannerbackground_image & page_banner_subtitle defiend on custum field plugin Advanced Custom Fields by Elliot Condon and pagebanner defiend on function.php  -->
        <div class="page-banner__content container container--narrow">
        <!-- <?php print_r($pagebannerimage); ?> to check all info like how we know $pagebannerimage give array and have to pass url get_field is plugin function not wp  -->
        <h1 class="page-banner__title"><?php echo $args['title_a'] ?></h1>
        <div class="page-banner__intro">
                 <p> <?php echo $args['subtitle_b'] ?>.</p> <!-- //this called on page.php -->
        </div>
        </div>  
        </div>
         
         <?php
 }
function university_files(){
        wp_enqueue_script('google_map','//maps.googleapis.com/maps/api/js?key=AIzaSyBAPKbmBUmX14si5IgnsHhrjZNAjZ2ni2c',NULL,'1.0',true);
        //if alert show than delete search.js
        wp_enqueue_script('search',get_theme_file_uri('/js/modules/search.js'),NULL,'1.0',true);
        wp_enqueue_script('main_university_js',get_theme_file_uri('/js/scripts-bundled.js'),NULL,'1.0',true);
        wp_enqueue_style('google_font','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i');
        wp_enqueue_style('font_awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('university_main_styles',get_stylesheet_uri());
        // npm here
        // wp_enqueue_script('main_university_js','http://localhost:3000/bundled.js',NULL,'1.0',true);
}
 add_action('wp_enqueue_scripts','university_files');
 function university_feature(){
         add_theme_support('title-tag');
         add_theme_support('post-thumbnails');
         add_image_size('professorlandscape',400,260,true);
         add_image_size('professorportrait',480,650,true);
         add_image_size('pagebanner',1500,360,true);
         
        //  dynamic header link 
        //  register_nav_menu('headermenulocation','header menu location');
        //  register_nav_menu('footerlocation1','footer location1');
        //  register_nav_menu('footerlocation2','footer location2');
 }
 add_action('after_setup_theme','university_feature');
 

 function university_adjust_query($query){
         //for program
         if(!is_admin() AND is_post_type_archive('program')AND is_main_query()){
                 $query->set('orderby','title');
                 $query->set('order','ASC');
                 $query->set('post_per_page','-1');
         }
         // for display upcoming and outdated event toseprate page
         if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
                         $today = date('Ymd');
                        $query-> set('meta_key', 'event_date');
                        $query-> set('orderby', 'meta_value_num');
                        $query-> set('order', 'ASC');
                        $query-> set('meta_query', array(
                                array(
                                  'key' => 'event_date',
                                  'compare' => '>=',
                                  'value' => $today,
                                  'type' => 'numeric'
                                )
                              ));
                }
 }
 add_action('pre_get_posts','university_adjust_query');
function universitymapkey($api){
 $api['key'] =  'AIzaSyBAPKbmBUmX14si5IgnsHhrjZNAjZ2ni2c';
 return $api;
}
add_filter('acf/fields/google_map/api','universitymapkey');

// redirect subscribe out of admin on home page
function redirectsubstofrontend(){
        $ourcurrentusser = wp_get_current_user();
        if( count($ourcurrentusser->roles) == 1 AND $ourcurrentusser->roles[0] == 'subscriber') {
                wp_redirect(site_url('/'));
                exit;
        }
}
add_action('admin_init', 'redirectsubstofrontend');

// redirect subscribe out of admin on home page
function nosubadminbar(){
        $ourcurrentusser = wp_get_current_user();
        if( count($ourcurrentusser->roles) == 1 AND $ourcurrentusser->roles[0] == 'subscriber') {
                show_admin_bar(false);
                // exit;
        }
}
add_action('wp_loaded', 'nosubadminbar');

// redirect outof admin to home page after logout
add_action('admin_init','redirectsub');
function redirectsub(){
        $ourcurrentusser = wp_get_current_user();
        if(count($ourcurrentusser->roles)==1 AND $ourcurrentusser->roles[0]='subscriber'){
                wp_redirect(site_url('/'));
                exit;
        }
}
// customize login screen
add_filter('login_headerurl','ourheaderurl');
function ourheaderurl(){
        return esc_url(site_url('/'));
}
add_action('login_enqueue_scripts','ourlogincss');
function ourlogincss(){
        wp_enqueue_style('university_main_styles',get_stylesheet_uri());
        wp_enqueue_style('font_awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}
add_filter('login_headertitle','ourlogintitle');
function ourlogintitle(){
        return get_bloginfo('name');
}
// this exclude the file from being created file backup in all in one migration plugin
add_filter('ai1wm_exclude_content_from_export','ignorcertainfiles');
function ignorcertainfiles($exclude_filter){
        $exclude_filter[] = 'themes/fictional-university-themes/node_modules';
        return $exclude_filter;
}
?>