<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
set_query_var( 'header', ['is_white_menu'=>false,'header_shadow'=>true] );
get_header(); 
$blog_title = 'Lorem ipsum dolor sit amet, consetetur';
$single_noticias_title = 'Ultimas noticias';
global $post;
$post_ID = $post->ID;
?>
<?php
while ( have_posts() ) :
	the_post();
	?>
<div class="thinus-singlepost-wrapper">


<header class="thinkus-single">

		<div class="thinkus-single__header__image">
			<?php echo get_the_post_thumbnail(get_the_ID(), array( 899, 607), array('class' => 'thinkus-post-image')); ?>
			
			<?php  
			set_query_var('post_id', get_the_ID());
			echo get_template_part( 'includes/templates-parts/post/get_category','display' ); 
			?>
		</div>
		<div class="thinkus-single__header__title">
			<h1 class="thinkus-single__header__title__text"><?php echo get_the_title(); ?></h1>
		</div>
</header>
<main id="thinkus-content" <?php post_class( 'site-main' ); ?> role="main">

	<div class="page-content">
		<?php the_content(); ?>
		
	</div>


	
	<?php
endwhile;?>

</main>
<aside class="thinkus-wrapper ultimas-noticias">
	<div class="ultimas-noticias">
		<h2 class="ultimas-noticias__title">
			<?php echo $single_noticias_title; ?>
		</h2>
		<hr/>
	</div>
	<div id="single-aside-carousel">
		<div class="swiper-wrapper">
	<?php
	 $the_query = new WP_Query(array(
		'post_type'			=> 'post',
		'posts_per_page'	=> -1,
	
	));

		if( $the_query ):
		while( $the_query->have_posts() ) : $the_query->the_post(); 
		echo '<article class="swiper-slide single-post-wrapper">';
		echo '<div class="post-wrapper__content">';
		echo get_template_part( 'includes/templates-parts/post/post','item' );
		echo '</div>';
		echo '</article>';
		endwhile;
		wp_reset_postdata();
		endif;
	?>
	</div>
	</div>

<button class="thinkus-button-prev">
        <i class="fa-solid fa-arrow-left"></i>
        </button>
        <button class="thinkus-button-next">
        <i class="fa-solid fa-arrow-right"></i>
        </button>

</aside>
</div>
<?php get_footer();?>


