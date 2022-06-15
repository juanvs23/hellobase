<?php
function gs_stone_settings_blog_page() {
    $config = 'gs_stone_blog_page_config';
    $security = wp_create_nonce($config);
    $action = $config;
    $blog_config_info = unserialize(get_option($config))?unserialize(get_option($config)):['is_white_menu' => false, 'is_menu_shadow' => false, 'blog_text' => '','elementor_id'=>''];
   $is_white_menu = $blog_config_info['is_white_menu']=='true'?'checked':'';
    $is_menu_shadow = $blog_config_info['is_menu_shadow']=='true'?'checked':'';
    $blog_text = $blog_config_info['blog_text']!=''?$blog_config_info['blog_text']:'';
    $elementor_id = $blog_config_info['elementor_id']!=''?$blog_config_info['elementor_id']:'';
    ?>
    <div class="gs_stone__admin__container row pb-6 pt-6">
        <div class="gs_stone__admin__container__header col-12">
            <h1 class="text-center">Configuración blog</h1>
        </div>
        <div class="gs_stone__admin__container__body">
            <form action="" id="<?php echo  $config;?>" method="post">
            <input type="hidden" name="security" id="security"  value="<?php echo  $security; ?>">
                        <input type="hidden" name="action" id="action" value="<?php echo   $action; ?>">
                <div class="row justify-content-center align-items-center">
                    <div class="col-8 ">
                        <div class="justify-content-center align-items-center  row">
                            <div class="form-check col-6 form-switch justify-content-center align-items-center d-flex">
                                <input class="form-check-input "  <?php echo   $is_menu_shadow;?> type="checkbox" role="switch" id="is_menu_shadow">
                                <label class="form-check-label" for="is_menu_shadow"><h3 class="ps-3">Sombra en el menu</h3></label>
                            </div>
                            <div class="form-check col-6 form-switch justify-content-center align-items-center d-flex">
                                <label class="form-check-label" for="is_white_menu"><h3 class="pe-3">Menu color Blanco</h3></label>
                                <input class="form-check-input" type="checkbox" role="switch" <?php echo  $is_white_menu;?> id="is_white_menu">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="elementor_id">
                            <h3 class="text-center">Id de plantilla de elementor</h3>
                          <input type="text" name="text_blog" maxlength="3" id="elementor_id" value="<?php echo   $elementor_id; ?>" class="form-control" placeholder="71">
                        </label>
                    </div>
                    <div class="col-6">
                        <label for="text_blog">
                            <h3 class="text-center">Texto del catalogo del blog</h3>
                          <input type="text" name="text_blog" maxlength="40" id="text_blog" value="<?php echo  $blog_text; ?>" class="form-control" placeholder="Lorem ipsum">
                        </label>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center mt-4">
               <div class="col-3"><button type="submit" class="btn btn-primary">Guardar</button></div>
                </div>
            </form>
        </div>
    </div>
    <?php
}

if (!function_exists('gs_stone_blog_page_config')) {
    function gs_stone_blog_page_config()
    {
    $config = 'gs_stone_blog_page_config';

        if(isset($_POST['security']) && wp_verify_nonce($_POST['security'],  $config)){
            if(isset($_POST['action']) && $_POST['action']== $config){
                /**
                 * formData.append("is_menu_shadow", is_menu_shadow.checked);
                 * formData.append("is_white_menu", is_white_menu.checked);
                 * formData.append("text_blog", text_blog.value);
                 */
                $blog_config = serialize([
                    'is_white_menu'=>$_POST['is_white_menu'],
                    'is_menu_shadow'=>$_POST['is_menu_shadow'],
                    'blog_text'=>isset($_POST['text_blog'])?$_POST['text_blog']:'',
                    'elementor_id'=>isset($_POST['elementor_id'])?$_POST['elementor_id']:''
                ]);
                    $update =  update_option( $config , $blog_config);

                wp_send_json_success( ['success'=>$update] ,200);
                wp_die();
            }
        }
    }
    add_action('wp_ajax_gs_stone_blog_page_config', 'gs_stone_blog_page_config');
    add_action('wp_ajax_gs_stone_blog_page_config', 'gs_stone_blog_page_config');
}