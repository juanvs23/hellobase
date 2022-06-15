<?php

echo '<div class="post-wrapper__container">';

echo '<div class="post-wrapper__content__image">';
echo '<a href="'.get_the_permalink().'">';
echo   get_the_post_thumbnail(get_the_ID(), array( 478, 322), array('class' => 'gs_stone-post-image'));

echo '</a>';
			set_query_var('post_id', get_the_ID());
			echo get_template_part( 'includes/templates-parts/post/get_category','display' ); 
			
echo '</div>';
echo '<a href="'.get_the_permalink().'" class="post-wrapper__content__text">';
echo '<h2 class="post-wrapper__content__text__title">'.get_the_title().'</h2>';
echo '<div class="post-wrapper__content__text__content">'.gs_stone_custom_excerpts(15). '</div>';
echo '</a>';
echo '</div>';