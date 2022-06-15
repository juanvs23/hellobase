<?php
/* 
Template Name: Archives
*/
$blog_page_config= 'gs_stone_blog_page_config';
$header = unserialize(get_option($blog_page_config));
/*
 [is_white_menu] => true [is_menu_shadow] => true 
*/
set_query_var( 'header', ['is_white_menu'=>$header['is_white_menu']] );
get_header(); 

$blog_title = term_description()?term_description(): $header['blog_text'] ;

echo '<div class="gs_stone-header">';
echo do_shortcode( '[elementor-template id="'.$header['elementor_id'].'"]' );
echo '</div>';
echo '<div class="gs_stone-content">';
echo '<div class="controller-wrapper">';
echo '<div class="controller-text">';
echo'<h2>'.$blog_title.'</h2>';
echo '</div>';
echo '<div class="controller-button">';
echo ' <button class="gs_stone-button-prev">
        <i class="fa-solid fa-arrow-left"></i>
        </button>
        <button class="gs_stone-button-next">
        <i class="fa-solid fa-arrow-right"></i>
        </button>';
echo '</div>';


echo '</div>';
echo '<div id="swipper-archive" class="gs_stone-content__container">';
echo '<div class="swiper-wrapper">';
$count = 0;
while ( have_posts() ) {
    the_post();
$count++;
if($count==1){
    echo '<section class="swiper-slide post-wrapper">';
   
}


    echo '<article class="post-wrapper__content">';
    echo get_template_part( 'includes/templates-parts/post/post','item' );
    echo '</article>';

   
    
if(is_integer($count / 4 )){
    echo '</section>';
    echo '<section class="swiper-slide post-wrapper">';
}
   

        
       
   

}
echo '</div>';
echo '</div>';
echo '</div>';

get_footer(); ?>