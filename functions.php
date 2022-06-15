<?php
//constants
define('gs_stone_THEME_VERSION', '1.0');
define('gs_stone_THEME_DIR',__DIR__);
define('gs_stone_THEME_DATE', getdate());


/**
 * Functions
 */
//setup
function gs_stone_widget_init(){

}
if(!function_exists('gs_stone_general_localize')){
    function gs_stone_general_localize(){
        return array(
            'admin_ajax' => admin_url('admin-ajax.php'),
            'project_url'=> get_stylesheet_directory_uri(),
            
        );
    };
}
//front styles - script
function gs_stone_scripts_theme(){
    
    wp_enqueue_style( 'relaway-font','https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap', array(), gs_stone_THEME_VERSION, 'all' );
    //https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css
    wp_enqueue_style( 'fontAwesome-6','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css?display=swap', array('relaway-font'), gs_stone_THEME_VERSION, 'all' );

    wp_enqueue_style( 'gs_stone-main',get_stylesheet_directory_uri().'/assets/css/frontend/main.css', array('fontAwesome-6','relaway-font'), gs_stone_THEME_VERSION, 'all' );
    wp_enqueue_script('gs_stone-main',get_stylesheet_directory_uri().'/assets/js/frontend/main.js', array(), gs_stone_THEME_VERSION, true);
    wp_localize_script('gs_stone-main','gs_stone_front_ajax',gs_stone_general_localize());
}

//admin styles - script

function gs_stone_scripts_admin() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
    if(!did_action('wp-color-picker')){
        wp_enqueue_style( 'wp-color-picker' );
    }
    wp_enqueue_style( 'gs_stone_admin_main', get_stylesheet_directory_uri() . '/assets/css/admin/backoffice.css', 
    array(),  // if the parent theme code has a dependency, copy it to here
    gs_stone_THEME_VERSION
);
    wp_enqueue_script( 'gs_stone_admin_main', get_stylesheet_directory_uri() . '/assets/js/admin/back.js', ['jquery','wp-color-picker'], gs_stone_THEME_VERSION, true );
    wp_localize_script('gs_stone_admin_main','gs_stone_admin_ajax',gs_stone_general_localize());
}

//filter tags
function gs_stone_font_family_attribute($tag, $handle, $src) {
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
function gs_stone_custom_excerpts($limit) {
    return wp_trim_words(get_the_excerpt(), $limit, '...');
}
/**
 * actions
 */
add_action('widgets_init', 'gs_stone_widget_init');
add_action( 'wp_enqueue_scripts', 'gs_stone_scripts_theme',9999 );
add_action( 'admin_enqueue_scripts', 'gs_stone_scripts_admin',9999 );
/**
 * filters
 */
add_filter('style_loader_tag', 'gs_stone_font_family_attribute' , 10, 3);

 /**
  * Requires
  */
require gs_stone_THEME_DIR . '/includes/extras/post-types/post-types.php';
require gs_stone_THEME_DIR . '/includes/extras/shortcodes/shortcodes.php';
require gs_stone_THEME_DIR . '/includes/extras/admins-pages/admins-pages.php';
require gs_stone_THEME_DIR . '/includes/extras/add_meta/add_meta.php';
