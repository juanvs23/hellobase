<?php

/**
 * Register a custom menu page.
 */
function gs_stone_settings_pages() {
   //add_menu_page( $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $function:callable, $icon_url:string, $position:integer|null );
   // add_submenu_page( $parent_slug:string, $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $function:callable, $position:integer|null )

   add_menu_page( 
        'Configuraciones gs_stone', 
        'Configuración gs_stone', 
        'manage_options',
        'configuraciones_gs_stone', 
        'gs_stone_settings_main_page', 
        'dashicons-admin-generic',
        2
    );
   
  add_submenu_page( 
    'configuraciones_gs_stone', 
    'Blog', 
    'Configuración del Blog', 
    'manage_options', 
    'configurar_blog', 
    'gs_stone_settings_blog_page', 
    2 );
      
}
add_action( 'admin_menu', 'gs_stone_settings_pages' );

require gs_stone_THEME_DIR. '/includes/extras/admins-pages/pages/main_page.php';
require gs_stone_THEME_DIR. '/includes/extras/admins-pages/pages/blog_page.php';