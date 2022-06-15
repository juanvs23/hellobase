<?php
/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$footer_config_info = unserialize(get_option('footer_config'));
/**
 * Array ( [footer_template_id] => 68 
 * 		   [displayfooter] => true 
 * 		   [social_network] => 
 * 				Array ( 
 * 						[facebook_url] => https://www.facebook.com/gs_stone 
 * 						[twitter_url] => 
 * 						[instagram_url] => 
 * 						[linkedin_url] => https://www.linkedin.com/in/think-us-b06ab823b/ 
 * 						[youtube_url] => 
 * 						[whatsapp_url] => https://api.whatsapp.com/send?phone=573237978803&text=Me%20interesa%20saber%20sobre 
 * 						) 
 * 		)
 */			


$show_copyright_footer = $footer_config_info['displayfooter'] =='true'? true: false;//general copyright footer
$footer_template_id = $footer_config_info['footer_template_id'];//general footer template
$page_footer = get_field('footer_personalizado_para_la_pagina');//show custom footer by page
$hide_copyright_by_page = get_field('ocultar_copyright');//hide copyright by page

if($page_footer){
 
  echo do_shortcode( '[elementor-template id="'.$page_footer.'"]' );
}else{
	echo do_shortcode( '[elementor-template id="'.$footer_template_id.'"]' );
}
echo $hide_copyright_by_page;
if($show_copyright_footer && !$hide_copyright_by_page): ?>
<footer id="site-footer" class="gs_stone-footer" role="contentinfo">
	
	<p class="text-copyright">
		<?php printf(__('© Copyright Conocimiento Corporativo %d.<br> All rights reserved', 'gs_stone-child'),gs_stone_THEME_DATE['year']); ?>
	</p>
</footer>
<div class="social-network-widget">
	<div id="social-widget" class="social-network-wrapper-widget">
		<?php
		$widget_params=[
			'display'=>'column',
			'gap'=>'13',
			'design'=>'circle',
			'font-size'=>'32'
		];
		set_query_var( 'widget_params', $widget_params );
		get_template_part( 'includes/templates-parts/socialnetwork','items' );
		?>
	</div>
	<div class="button-trigger">
		<buttton 
			id="button-trigger" 
			class="circle social-element" 
			title="<?php printf(__('Abrir redes sociales', 'gs_stone-child')); ?>" >
				<i class="fa-solid fa-comments"></i>
			</buttton>
	</div>
</div>

<?php endif; ?>