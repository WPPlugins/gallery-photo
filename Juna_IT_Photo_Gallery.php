<?php
	/*
		Plugin Name: Gallery Photo
		Plugin URI: http://juna-it.com/index.php/gallery-photo/
		Description: TNew revolutionary Photo Gallery from Juna IT. This Gallery plugin will save your precious time, which will make the process of creating pictures easily and simple. You just need to install and configure it for a few minutes.
		Version: 1.0.5
		Author: Juna-IT
		Author URI: http://juna-it.com/
		License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
	*/
	add_action('widgets_init', function() {
	 	register_widget('Juna_IT_Photo_Gallery');
	});
	require_once('Photo_Gallery_Widget.php');
	require_once('Ajax_in_Photo_Gallery.php');
	require_once('Juna_IT_Photo_Gallery_Shortcode.php');
	
	add_action('wp_enqueue_scripts','Juna_IT_Photo_Gallery_Style');
	function Juna_IT_Photo_Gallery_Style(){
		wp_register_style( 'Juna_IT_Photo_Gallery_Style1', plugins_url('/Style/component_JIG.css', __FILE__) ); 
		wp_register_style( 'Juna_IT_Photo_Gallery_Style2', plugins_url('/Style/styleJIG.css', __FILE__) );
		wp_register_style( 'Juna_IT_Photo_Gallery_Style3', plugins_url('/Style/Juna_IT_Photo_Gallery_Widget.css', __FILE__) );
		wp_register_style( 'Juna_IT_Photo_Gallery_Style4', plugins_url('/Style/styleTIG.css', __FILE__) );
		wp_register_style( 'Juna_IT_Photo_Gallery_Style5', plugins_url('/Style/stylePop.min.css', __FILE__) );
		wp_register_style( 'Juna_IT_Photo_Gallery_Style7', plugins_url('/Style/colorbox.css', __FILE__) );
		wp_register_style( 'fontawesome-csss2', plugins_url('/Style/junaiticons.css', __FILE__) ); 
		wp_enqueue_style( 'Juna_IT_Photo_Gallery_Style1' );
		wp_enqueue_style( 'Juna_IT_Photo_Gallery_Style2' );
		wp_enqueue_style( 'Juna_IT_Photo_Gallery_Style3' );
		wp_enqueue_style( 'Juna_IT_Photo_Gallery_Style4' );
		wp_enqueue_style( 'Juna_IT_Photo_Gallery_Style5' );
		wp_enqueue_style( 'Juna_IT_Photo_Gallery_Style6' );
		wp_enqueue_style( 'Juna_IT_Photo_Gallery_Style7' );
		wp_enqueue_style( 'fontawesome-csss2' );
		
		wp_register_script('Juna_IT_Photo_Gallery_widget',plugins_url('Scripts/Juna_IT_Photo_Gallery_Widget.js',__FILE__),array('jquery','jquery-ui-core','jquery-ui-datepicker',"jquery-effects-core"));
		wp_localize_script('Juna_IT_Photo_Gallery', 'object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script( 'Juna_IT_Photo_Gallery' );
		wp_enqueue_script( 'Juna_IT_Photo_Gallery_widget' );
	}
	add_action("admin_menu", 'Juna_IT_Photo_Gallery_Admin_Menu' );
	function Juna_IT_Photo_Gallery_Admin_Menu() 
	{
		add_menu_page('Juna_IT_Photo_Gallery_Admin_Menu','Photo Gallery','manage_options','Juna_IT_Photo_Gallery_Admin_Menu','Manage_Juna_IT_Photo_Gallery_Admin_Menu',plugins_url('/Images/admin.png',__FILE__));
 		add_submenu_page( 'Juna_IT_Photo_Gallery_Admin_Menu', 'Juna_IT_Photo_Gallery_Admin_Menu_page_1', 'Gallery Manager', 'manage_options', 'Juna_IT_Photo_Gallery_Admin_Menu', 'Manage_Juna_IT_Photo_Gallery_Admin_Menu');
		add_submenu_page( 'Juna_IT_Photo_Gallery_Admin_Menu', 'Juna_IT_Photo_Gallery_Admin_Menu_page_2', 'General Options', 'manage_options', 'Juna_IT_Photo_Gallery_Admin_Menu_General_Options', 'Manage_Juna_IT_Photo_Gallery_Admin_Menu_submenu_2');
		add_submenu_page( 'Juna_IT_Photo_Gallery_Admin_Menu', 'Juna-IT Products', 'Juna-IT Products', 'manage_options', 'Juna_IT_Products_Photo', 'Manage_Juna_IT_Products_Photo_Gallery');
	}
	function Manage_Juna_IT_Photo_Gallery_Admin_Menu()
	{
		require_once('Juna_IT_Photo_Gallery_Admin_Menu.php');
		require_once('Scripts/Juna_IT_Photo_Gallery_Submenu1.js.php');
		require_once('Style/Juna_IT_Photo_Gallery_Submenu1.css.php');
	}
	function Manage_Juna_IT_Photo_Gallery_Admin_Menu_submenu_2()
	{
		require_once('Juna_IT_Photo_Gallery_Admin_Menu_General_Options.php');
		require_once('Scripts/Juna_IT_Photo_Gallery_Submenu2.js.php');
		require_once('Style/Juna_IT_Photo_Gallery_Submenu2.css.php');
	}
	function Manage_Juna_IT_Products_Photo_Gallery(){
		require_once('Juna-IT-Products.php');
	}
	add_action('admin_init', function() {
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
		
		wp_register_script('Juna_IT_Photo_Gallery', plugins_url('Scripts/Juna_IT_Photo_Gallery_Admin.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Juna_IT_Photo_Gallery', 'object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script('Juna_IT_Photo_Gallery');
		wp_register_style('Juna_IT_Photo_Gallery', plugins_url('Style/Juna_IT_Photo_Gallery_Admin_Style.css', __FILE__ ));
		wp_enqueue_style('Juna_IT_Photo_Gallery');
		wp_register_style( 'fontawesome-csss', plugins_url('/Style/junaiticons.css', __FILE__)); 
   		wp_enqueue_style( 'fontawesome-csss' );	 
	});
	
	
	register_activation_hook(__FILE__,'Juna_IT_Photo_Gallery_wp_activate');
	/*function load_wp_media_files() {
	    wp_enqueue_media();
	}
	add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );*/
	function Juna_IT_Photo_Gallery_wp_activate()
	{
		require_once('Juna_IT_Photo_Gallery_Install.php');
	}
?>