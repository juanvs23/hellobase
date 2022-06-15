<?php
$header_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-1',
	'fallback_cb' => false,
	'echo' => false,
] );

$is_white =get_query_var( 'header' )?get_query_var( 'header' )['is_white_menu']:false;

$is_white_color = get_field('navegador_en_texto_blanco')||$is_white?'white-menu':'';


?>
<?php if ( $header_nav_menu ) : ?>
		<div class="navigation-section <?php  echo $is_white_color; ?>">
            <button class="button-menu-trigger">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="site-navigation" role="navigation">
			    <?php echo $header_nav_menu; ?>
		    </nav>
        </div>
	<?php endif; ?>