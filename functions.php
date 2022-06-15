<?php
//constants
define('THINKUS_THEME_VERSION', '1.0');
define('THINKUS_THEME_DIR',__DIR__);
define('THINKUS_THEME_DATE', getdate());


/**
 * Functions
 */
//setup
function thinkus_widget_init(){

}
if(!function_exists('thinkus_general_localize')){
    function thinkus_general_localize(){
        return array(
            'admin_ajax' => admin_url('admin-ajax.php'),
            'project_url'=> get_stylesheet_directory_uri(),
            
        );
    };
}
//front styles - script
function thinkus_scripts_theme(){
    
    wp_enqueue_style( 'relaway-font','https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap', array(), THINKUS_THEME_VERSION, 'all' );
    //https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css
    wp_enqueue_style( 'fontAwesome-6','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css?display=swap', array('relaway-font'), THINKUS_THEME_VERSION, 'all' );

    wp_enqueue_style( 'think-main',get_stylesheet_directory_uri().'/assets/css/frontend/main.css', array('fontAwesome-6','relaway-font'), THINKUS_THEME_VERSION, 'all' );
    wp_enqueue_script('think-main',get_stylesheet_directory_uri().'/assets/js/frontend/main.js', array(), THINKUS_THEME_VERSION, true);
    wp_localize_script('think-main','thinkus_front_ajax',thinkus_general_localize());
}

//admin styles - script

function thinkus_scripts_admin() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
    if(!did_action('wp-color-picker')){
        wp_enqueue_style( 'wp-color-picker' );
    }
    wp_enqueue_style( 'thinkus_admin_main', get_stylesheet_directory_uri() . '/assets/css/admin/backoffice.css', 
    array(),  // if the parent theme code has a dependency, copy it to here
    THINKUS_THEME_VERSION
);
    wp_enqueue_script( 'thinkus_admin_main', get_stylesheet_directory_uri() . '/assets/js/admin/back.js', ['jquery','wp-color-picker'], THINKUS_THEME_VERSION, true );
    wp_localize_script('thinkus_admin_main','thinkus_admin_ajax',thinkus_general_localize());
}

//filter tags
function thinkus_font_family_attribute($tag, $handle, $src) {
    // if not your script, do nothing and return original $tag
    if('google-fonts-1'== $handle){
        return null;
    }
    if ( 'relaway-font' !== $handle ) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    //$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
    $tag = '<link  rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link id="'.$handle.'" href="'.esc_url( $src ).'" rel="stylesheet">';
    return $tag;
}
///excerpt with control
function thinkus_custom_excerpts($limit) {
    return wp_trim_words(get_the_excerpt(), $limit, '...');
}
/**
 * actions
 */
add_action('widgets_init', 'thinkus_widget_init');
add_action( 'wp_enqueue_scripts', 'thinkus_scripts_theme',9999 );
add_action( 'admin_enqueue_scripts', 'thinkus_scripts_admin',9999 );
/**
 * filters
 */
add_filter('style_loader_tag', 'thinkus_font_family_attribute' , 10, 3);

 /**
  * Requires
  */
require THINKUS_THEME_DIR . '/includes/extras/post-types/post-types.php';
require THINKUS_THEME_DIR . '/includes/extras/shortcodes/shortcodes.php';
require THINKUS_THEME_DIR . '/includes/extras/admins-pages/admins-pages.php';
require THINKUS_THEME_DIR . '/includes/extras/add_meta/add_meta.php';
