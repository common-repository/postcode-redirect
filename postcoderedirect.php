<?php

/**
 * Plugin Name: Postcode Redirect
 * Plugin URI: 
 * Description: Redirect A User To A Website URL Based On A Postcode. Redirect To Different URL's. Between Two And Ten URL's 
 * Requires at least: 6.3
 * Requires PHP: 7.4
 * Version: 5.0.0
 * Author: Paul Glover
 * Author URI: https://www.paulsplugins.com
 /* * License: GPL2 */
/* License URI:https://www.gnu.org/licenses/gpl-2.0.html
 
 Postcode Redirect is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 2 of the License, or
 any later version.
 
 Postcode Redirect is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.
 You should have received a copy of the GNU General Public License
 along with Postcode Redirect. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( !defined( 'ABSPATH' ) ) {
    header( 'HTTP/1.0 403 Forbidden' );
    exit;
}



// ... Your plugin's main file logic ...
if ( !class_exists( 'Postcode_Redirect' ) ) {
    class Postcode_Redirect
    {
        public function __construct()
        {
            define( 'postcode_redirect_plugin_dir', plugin_dir_path( __FILE__ ) );
            register_activation_hook( __FILE__, 'pr_activate' );
            add_action( 'wp_enqueue_scripts', 'insert_script' );
            add_action( 'admin_init', 'postcode_redirect_settings' );
            add_action( 'admin_menu', 'postcode_redirect_menu' );
            add_action( 'wp_ajax_redirect_ajax_call', 'redirect_postcode_ajax_call' );
            add_action( 'wp_ajax_nopriv_redirect_ajax_call', 'redirect_postcode_ajax_call' );
            add_shortcode( 'postcoderedirect', 'redirect_shortcode' );
           
            function insert_script()
            {
                wp_enqueue_style( 'poststyle', plugin_dir_url( __FILE__ ) . 'css/style.css' );
                wp_enqueue_script( 'jquery' );
                wp_enqueue_script(
                    'postlisten',
                    plugin_dir_url( __FILE__ ) . 'js/postlisten.js',
                    'postlisten',
                    '1.2',
                    true
                );
                wp_localize_script( 'postlisten', 'postlisten_vars', array(
                    'ajaxurl' => admin_url() . "admin-ajax.php",
                    'prneg'   => get_option( 'pr_neg' ),
                    'prwait'  => get_option( 'pr_wait' ),
                    'prwrong' => get_option( 'pr_wrong' ),
                    'pruse'   => get_option( 'pr_use' ),
                ) );
            }
            
            function postcode_redirect_menu()
            {
                // Create WordPress admin menu
                $page_title = 'Postcode Redirect Settings';
                $menu_title = 'Postcode Redirect';
                $capability = 'activate_plugins';
                $menu_slug = 'postcode-redirect';
                $function = 'postcode_redirect_admin';
                $icon_url = plugin_dir_url( __FILE__ ) . 'images/2020.ico';
                $position = 8;
                add_menu_page(
                    $page_title,
                    $menu_title,
                    $capability,
                    $menu_slug,
                    $function,
                    $icon_url,
                    $position
                );
            }
            
            function redirect_postcode_ajax_call()
            {
                $postcode = sanitize_text_field( $_POST['usercode'] );
                $postcode = str_replace( ' ', '', $postcode );
                $postcode = strtolower( $postcode );
                $length = strlen( $postcode );
                
                if ( $length > "7" or $length < "5" ) {
                    esc_html_e( "1" );
                    wp_die();
                }
                
                $x = 0;
                while ( $x < $length ) {
                    
                    if ( !preg_match( '/[0-9 a-z]/', $postcode[$x] ) ) {
                        esc_html_e( "1" );
                        wp_die();
                    }
                    
                    $x++;
                }
                $check = substr( $postcode, 0, $length - 3 );
                esc_html( $postcode = get_option( 'pr_postcodes1' ) );
                $postcode = explode( " ", $postcode );
                // put all postcdes in an array
                $url = $postcode[0];
                //get the redirect website url
                $postcode = array_slice( $postcode, 1 );
                // now remove website url from array
                foreach ( $postcode as $value ) {
                    
                    if ( $check === strtolower( $value ) ) {
                        esc_html_e( $url );
                        wp_die();
                        break;
                    }
                
                }
                esc_html( $postcode = get_option( 'pr_postcodes2' ) );
                $postcode = explode( " ", $postcode );
                // put all postcdes in an array
                $url = $postcode[0];
                //get the redirect website url
                $postcode = array_slice( $postcode, 1 );
                // now remove website url from array
                foreach ( $postcode as $value ) {
                    //routine to check values of array
                    $value = strtolower( $value );
                    //lowercase all postcodes
                    
                    if ( $check === $value ) {
                        esc_html_e( $url );
                        wp_die();
                        break;
                    }
                
                }
                esc_html_e( "2" );
                wp_die();
            }
            
            function redirect_shortcode()
            {
                //setup the shortcode form
                ob_start();
                include postcode_redirect_plugin_dir . "/form.php";
                $output = ob_get_clean();
                return $output;
            }
            
            function postcode_redirect_admin()
            {
                include postcode_redirect_plugin_dir . "/admin/admin.php";
            }
            
            function pr_fs_uninstall_cleanup()
            {
                delete_option( 'pr_postcodes1' );
                delete_option( 'pr_postcodes2' );
                delete_option( 'postcode_premium' );
                delete_option( 'pr_ask' );
                delete_option( 'pr_neg' );
                delete_option( 'pr_use' );
                delete_option( 'pr_wait' );
                delete_option( 'pr_wrong' );
            }
            
            function pr_activate()
            {
                //add default postcodes and messages
                add_option( 'pr_postcodes1', "http://www.example.com Pr1 Pr2 Pr3 Pr4 Pr5 Pr6 Pr7 Pr8 Pr9 Pr25 Pr26" );
                add_option( 'pr_postcodes2', "http://www.example.com Wn1 Wn2 Wn3 Wn4 Wn5 Wn6 Wn7 Wn8" );
                add_option( 'pr_ask', "Please Enter You Full Postcode....." );
                add_option( 'pr_neg', ".....We Are Sorry But We Cannot Redirect Your Postcode." );
                add_option( 'pr_use', ".....Use The UK Postcode Format" );
                add_option( 'pr_wait', ".....Please Wait While We Check Your Post Code." );
                add_option( 'pr_wrong', ".....Post Code Is Not Correct Format. Please Try Again." );
            }
            
            function postcode_redirect_settings()
            {
                // register default settings these have to be set here
                register_setting( 'postcode_redirect_settings', 'pr_postcodes1' );
                register_setting( 'postcode_redirect_settings', 'pr_postcodes2' );
                register_setting( 'postcode_redirect_settings', 'postcode_premium' );
                register_setting( 'postcode_redirect_settings', 'pr_ask' );
                register_setting( 'postcode_redirect_settings', 'pr_neg' );
                register_setting( 'postcode_redirect_settings', 'pr_use' );
                register_setting( 'postcode_redirect_settings', 'pr_wait' );
                register_setting( 'postcode_redirect_settings', 'pr_wrong' );
            }
        
        }
    
    }
}
$postcoderedirect = new Postcode_Redirect();
// get the plugin working