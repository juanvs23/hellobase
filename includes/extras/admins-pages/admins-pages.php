<?php

/**
 * Register a custom menu page.
 */
function thinkus_settings_pages() {
   //add_menu_page( $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $function:callable, $icon_url:string, $position:integer|null );
   // add_submenu_page( $parent_slug:string, $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $function:callable, $position:integer|null )

   add_menu_page( 
        'Configuraciones Thinkus', 
        'Configuración Thinkus', 
        'manage_options',
        'configuraciones_thinkus', 
        'thinkus_settings_main_page', 
        'dashicons-admin-generic',
        2
    );
   
  add_submenu_page( 
    'configuraciones_thinkus', 
    'Blog', 
    'Configuración del Blog', 
    'manage_options', 
    'configurar_blog', 
    'thinkus_settings_blog_page', 
    2 );
      
}
add_action( 'admin_menu', 'thinkus_settings_pages' );

require THINKUS_THEME_DIR. '/includes/extras/admins-pages/pages/main_page.php';
require THINKUS_THEME_DIR. '/includes/extras/admins-pages/pages/blog_page.php';