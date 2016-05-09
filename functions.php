<?php
// use with: define( 'WP_DEFAULT_THEME', 'default-theme-folder-name' );
// This will install WP with custom default theme.
// We can use this to load our startup theme wich cleans WP of default posts, sets up slugs, and activates our real dev theme

// set the options to change
$option = array(
    // we don't want no description
    'blogdescription'               => '',
    // change category base
    // 'category_base'                 => '/cat',
    // change tag base
    // 'tag_base'                      => '/label',
    // disable comments
    'default_comment_status'        => 'closed',
    // disable trackbacks
    'use_trackback'                 => '',
    // disable pingbacks
    'default_ping_status'           => 'closed',
    // disable pinging
    'default_pingback_flag'         => '',
    // change the permalink structure
    'permalink_structure'           => '/%postname%/',
    // dont use year/month folders for uploads 
    'uploads_use_yearmonth_folders' => '',
    // don't use those ugly smilies
    'use_smilies'                   => '',   
);
 
// change the options!
foreach ( $option as $key => $value ) {  
    update_option( $key, $value );
}
 
// flush rewrite rules because we changed the permalink structure
global $wp_rewrite;
$wp_rewrite->flush_rules();
 
// delete the default comment, post and page
wp_delete_comment( 1 );
wp_delete_post( 1, TRUE );
wp_delete_post( 2, TRUE );
 
// we need to include the file below because the activate_plugin() function isn't normally defined in the front-end
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
// activate pre-bundled plugins
// activate_plugin( 'wp-super-cache/wp-cache.php' );

// switch the theme to "Headliner"
switch_theme( '_s' );
