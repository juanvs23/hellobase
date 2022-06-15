<?php

function thinkus_social_network_shortcode($atts){
    $atts = shortcode_atts(
        array(
            'display' => 'row',
            'gap' => '13px',
            'design' => 'rounded',
            'font-size'=>'28',
            'align'=>'flex-start',
            'size'=>'',

        ),
        $atts,
        'social_network'
    );
    ob_start();
    echo '<div class="social-networkwrapper">';
    set_query_var( 'widget_params',$atts );
    get_template_part( 'includes/templates-parts/socialnetwork','items' );
    echo '</div>';
    return ob_get_clean();
}
add_shortcode( 'thinkus_show_social_network', 'thinkus_social_network_shortcode' );
