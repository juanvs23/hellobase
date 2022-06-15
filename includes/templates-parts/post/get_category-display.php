<?php
$post_id=get_query_var( 'post_id' );

$terms = get_the_terms($post_id,'category');

?>
<div class="thinkus-categories-content">
    <?php
    foreach ($terms as $term) {
        $term_link = get_term_link($term);
        $color= get_field('color_de_las_categorias', $term)?'style="background-color:'.get_field('color_de_las_categorias', $term).';color:white;"':'';
        if (is_wp_error($term_link)) {
            continue;
        }
        echo '<a class="thinkus-category '.$term->slug.'" '.$color.'  href="' . esc_url($term_link) . '">' . $term->name . '</a>';
    }
    ?>
</div>
