<?php
$social_network = unserialize(get_option('footer_config'))['social_network'];
$params= get_query_var( 'widget_params' );
$display = $params['display']? $params['display']: 'row';
$gap = $params['gap']? $params['gap']: '10';
$design = $params['design']? $params['design']: 'rounded';
$font_size = $params['font-size']? $params['font-size']: '28';
$size= $params['size'];
$align = $params['align']!='flex-start'? $params['align']: 'flex-start';
$facebook_url = $social_network['facebook_url']? $social_network['facebook_url']: '';
$twitter_url = $social_network['twitter_url']? $social_network['twitter_url']: '';
$instagram_url = $social_network['instagram_url']? $social_network['instagram_url']: '';
$linkedin_url = $social_network['linkedin_url']? $social_network['linkedin_url']: '';
$youtube_url = $social_network['youtube_url']? $social_network['youtube_url']: '';
$whatsapp_url = $social_network['whatsapp_url']? $social_network['whatsapp_url']: '';

$social_network_items = [
    'facebook'=>array(
        'url'=>$facebook_url,
        'icon'=>'fa-facebook-f',
        'title'=>'Facebook',
    ),
    'instagram'=>array(
        'url'=>$instagram_url,
        'icon'=>'fa-instagram',
        'title'=>'Instagram',
    ),
    'linkedin'=>array(
        'url'=>$linkedin_url,
        'icon'=>'fa-linkedin-in',
        'title'=>'Linkedin',
    ),
    'twitter'=>array(
        'url'=>$twitter_url,
        'icon'=>'fa-twitter',
        'title'=>'Twitter',
    ),
    'youtube'=>array(
        'url'=>$youtube_url,
        'icon'=>'fa-youtube',
        'title'=>'Youtube',
    ),
    'whatsapp'=>array(
        'url'=>$whatsapp_url,
        'icon'=>'fa-whatsapp',
        'title'=>'Whatsapp',
    ),
    ]

?>
<div class="social-list <?php echo $display;  ?>" style="gap:<?php echo $gap; ?>px;<?php 

if($align!='flex-start'){
    echo 'justify-content:'.$align.';';
}


?>" >



    <?php 
    foreach ($social_network_items as $social_network_item):
        if($social_network_item['url'] !=='' ):
            $title = $social_network_item['title'];
            ?>
             <a
            href="<?php echo $social_network_item['url']; ?>"
			class="<?php echo $design ?> social-element"
            target="_blank"
            style="font-size:<?php echo $font_size; ?>px;<?php if($size!=''){
    echo 'width:'.$size.'px;';
    echo 'height:'.$size.'px;';
}?>"
			title="<?php printf(__('ir a %s', 'Thinkus-child'), $title); ?>" >
                <i class="fa-brands <?php echo  $social_network_item['icon']; ?>"></i>
			</a>
            
            <?php
        endif;
    endforeach;?>
</div>