<?php

function thinkus_settings_main_page(){
    $config ='thinkus_footer_config';
    $security = wp_create_nonce($config);
    $action = $config;
    $social_network = [
        "facebook_url"=>"https://www.facebook.com/thinkus",
        "twitter_url"=>"",
        "instagram_url"=>"https://www.instagram.com/think_us.22/?igshid=YmMyMTA2M2Y%3D",
        "linkedin_url"=>"https://www.linkedin.com/in/think-us-b06ab823b/",
        "youtube_url"=>"",
        "whatsapp_url"=>"https://api.whatsapp.com/send?phone=573237978803&text=Me%20interesa%20saber%20sobre"
    ];
    $footer_config_info = unserialize(get_option('footer_config'))?unserialize(get_option('footer_config')):[
     "footer_template_id"=>'',
     "displayfooter"=>true,
     "social_network"=>  $social_network
    ];
    
    $footer_template_id = $footer_config_info["footer_template_id"];
    $is_checked = $footer_config_info["displayfooter"] =='true'? 'checked': '';
    $facebook_url =$footer_config_info["social_network"]['facebook_url'] != ""?$footer_config_info["social_network"]['facebook_url']:$social_network['facebook_url'];
    $twitter_url = $footer_config_info["social_network"]['twitter_url'] != ""?$footer_config_info["social_network"]['twitter_url']:$social_network['twitter_url'];
    $instagram_url = $footer_config_info["social_network"]['instagram_url'] != ""?$footer_config_info["social_network"]['instagram_url']:$social_network['instagram_url'];
    $linkedin_url = $footer_config_info["social_network"]['linkedin_url'] != ""?$footer_config_info["social_network"]['linkedin_url']:$social_network['linkedin_url'];
    $youtube_url = $footer_config_info["social_network"]['youtube_url'] != ""?$footer_config_info["social_network"]['youtube_url']:$social_network['youtube_url'];
    $whatsapp_url = $footer_config_info["social_network"]['whatsapp_url'] != ""?$footer_config_info["social_network"]['whatsapp_url']:$social_network['whatsapp_url'];
    ?>
    <div class="thinkus__admin__container row pb-6 pt-6">
        <div class="thinkus__admin__container__header col-12">
            <h1 class="text-center">Configuraciones Thinkus</h1>
        </div>
        <div class="thinkus__admin__container__body">
            <div class="thinkus__admin__container__body__content">
                <div class="thinkus__admin__container__body__content__item">
                    <h2 class="text-center display-2">Sección del footer</h2>
                    <p class="text-center">
                        Crea tu footer desde elementor PRO y copia el id del template ([elementor-template id="<a href="<?php admin_url( 'edit.php?post_type=elementor_library&tabs_group=library' )?>"><u>71</u></a>"]) en el campo de texto de abajo.
                    </p>
                    <form action="" id="footer-form" method="post">
                        <input type="hidden" name="security" id="security"  value="<?php echo  $security; ?>">
                        <input type="hidden" name="action" id="action" value="<?php echo   $action; ?>">
                        
                        <div class="form-group row justify-content-center" style="margin-bottom:2em;">
                            <div class="col-4">
                                <div class="form-check form-switch">
                                    <label class="form-check-label" 
                                    style="display:block;margin-bottom:8px;text-align:center;font-weight:700;"  
                                    for="displayfooter">
                                       Mostrar footer copyright
                                    </label>
                                    <div class="d-flex justify-content-center">
                                        <input class="form-check-input" 
                                            type="checkbox"  
                                            role="switch"
                                            <?php
                                           echo $is_checked;
                                            ?> 
                                            id="displayfooter">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="" for="footer_template_id">
                                    <span style="display:block;margin-bottom:5px;text-align:center;font-weight:700;">
                                        ID del template
                                    </span>
                                    <input type="text" class="form-control " 
                                    id="footer_template_id" 
                                    name="footer_template_id" 
                                    placeholder=" ejemplo: 71" 
                                    value="<?php echo $footer_template_id; ?>">
                                </label>
                            </div>
                        </div>
                        <div class=" row justify-content-center" style="margin-bottom:2em;">
                                <h2 class="text-center display-2">Redes sociales</h2>
                                <div class="row justify-content-center">
                                    <div class="col-8">
                                        <h3>Facebook</h3>
                                        <label class="" for="facebook_url">
                                            
                                            <input type="text" class="form-control " 
                                            id="facebook_url" 
                                            name="facebook_url" 
                                            placeholder=" ejemplo: https://www.facebook.com/thinkus" 
                                            value="<?php echo $facebook_url;?>">
                                        </label>
                                    </div>
                                    <div class="col-8">
                                        <h3>Instagram</h3>
                                        <label class="" for="instagram_url">
                                          
                                            <input type="text" class="form-control " 
                                            id="instagram_url" 
                                            name="instagram_url" 
                                            placeholder=" ejemplo: https://www.instagram.com/thinkus" 
                                            value="<?php echo $instagram_url;?>">
                                        </label>
                                    </div>
                                    <div class="col-8">
                                        <h3>Linkedin</h3>
                                        <label class="" for="linkedin_url">
                                           
                                            <input type="text" class="form-control " 
                                            id="linkedin_url" 
                                            name="linkedin_url" 
                                            placeholder=" ejemplo: https://www.linkedin.com/in/think-us-b06ab823b/" 
                                            value="<?php echo $linkedin_url;?>">
                                        </label>
                                    </div>
                                    <div class="col-8">
                                        <h3>Twitter</h3>
                                        <label class="" for="twitter_url">
                                           
                                            <input type="text" class="form-control " 
                                            id="twitter_url" 
                                            name="twitter_url" 
                                            placeholder=" ejemplo: https://www.twitter.com/thinkus" 
                                            value="<?php echo $twitter_url;?>">
                                        </label>
                                    </div>
                                    <div class="col-8">
                                        <h3>Youtube</h3>
                                        <label class="" for="youtube_url">
                                           
                                            <input type="text" class="form-control " 
                                            id="youtube_url" 
                                            name="youtube_url" 
                                            placeholder=" ejemplo: https://www.youtube.com/c/thinkus" 
                                            value="<?php echo $youtube_url; ?>">
                                        </label>
                                    </div>
                                    <div class="col-8">
                                        <h3>Whatsapp</h3>
                                        <label class="" for="whatsapp_url">
                                            
                                            <input type="text" class="form-control " 
                                            id="whatsapp_url" 
                                            name="whatsapp_url" 
                                            placeholder=" ejemplo: https://api.whatsapp.com/send?phone=573237978803&text=Me%20interesa%20saber%20sobre" 
                                            value="<?php echo $whatsapp_url; ?>">
                                        </label>
                                    </div>
                                </div>
                        </div>
                        <div class="row justify-content-center align-items-center mt-4">
               <div class="col-3"><button type="submit" class="btn btn-primary">Guardar</button></div>
                </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
    <?php
}
if (!function_exists('thinkus_footer_config')) {
    function thinkus_footer_config(){
        if(isset($_POST['security']) && wp_verify_nonce($_POST['security'], 'thinkus_footer_config')){
            if(isset($_POST['action']) && $_POST['action']=='thinkus_footer_config'){
                $footer_data = serialize(array(
                    'footer_template_id'=> $_POST['footer_template_id'],
                    'displayfooter'=> $_POST['displayfooter'],
                    "social_network"=>[
                        "facebook_url"=> $_POST['facebook_url'],
                        "twitter_url"=> $_POST['twitter_url'],
                        "instagram_url"=> $_POST['instagram_url'],
                        "linkedin_url"=> $_POST['linkedin_url'],
                        "youtube_url"=> $_POST['youtube_url'],
                        "whatsapp_url"=> $_POST['whatsapp_url']
                    ]
               
                  ));
              $update =  update_option('footer_config',$footer_data);
            }
        }
        wp_send_json_success($_POST,200);
        wp_die();
    }
    add_action('wp_ajax_thinkus_footer_config', 'thinkus_footer_config');
    add_action('wp_ajax_nopriv_thinkus_footer_config', 'thinkus_footer_config');
}