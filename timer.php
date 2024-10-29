<?php
/*
Plugin Name: Timer Plugin
Plugin URI: http://nitinmaurya.com/
Description: This is Timer Plugin. So you can set any date as countdown. It shows days left.
Version: 1.0
Author: Nitin Maurya
Author URI: http://nitinmaurya.com/
License: A "Slug" license name e.g. GPL2
*/
register_activation_hook(__FILE__,'timerandchat_install');
function timerandchat_install(){
	global $wp_version;
	if(version_compare($wp_version, "3.2.1", "<")) {
		deactivate_plugins(basename(__FILE__));
		wp_die("This plugin requires WordPress version 3.2.1 or higher.");
	}
}
add_action('admin_menu','user_menu');
function user_menu(){
		add_options_page('Timer Settings', 'Timer Settings', 'read', 'timer_setting', 'timer_setting');
		
}
function timer_setting(){
	$option_name1 = 'timer_year' ;
	$option_name2 = 'timer_month' ;
	$option_name3 = 'timer_date' ;
	$option_name4 = 'timer_msg';
	if($_REQUEST['act']=='timer'){
		
		$new_value1 = $_REQUEST['year'] ;
		if ( get_option( $option_name1 ) !== false ) {
			update_option( $option_name1, $new_value1 );
		} else {
			$deprecated = null;
			$autoload = 'no';
			add_option( $option_name1, $new_value1, $deprecated, $autoload );
		}
		
		
		$new_value2 = $_REQUEST['month'] ;
		if ( get_option( $option_name2 ) !== false ) {
			update_option( $option_name2, $new_value2 );
		} else {
			$deprecated = null;
			$autoload = 'no';
			add_option( $option_name2, $new_value2, $deprecated, $autoload );
		}	
		
		
		$new_value3 = $_REQUEST['date'] ;
		if ( get_option( $option_name3 ) !== false ) {
			update_option( $option_name3, $new_value3 );
		} else {
			$deprecated = null;
			$autoload = 'no';
			add_option( $option_name3, $new_value3, $deprecated, $autoload );
		}
		
		$new_value4 = $_REQUEST['timer_msg'] ;
		if ( get_option( $option_name4 ) !== false ) {
			update_option( $option_name4, $new_value4 );
		} else {
			$deprecated = null;
			$autoload = 'no';
			add_option( $option_name4, $new_value4, $deprecated, $autoload );
		}
	}
	
	$year=get_option( $option_name1 );
	$month=get_option( $option_name2 );
	$date=get_option( $option_name3 );
	$timer_msg=get_option( $option_name4 );
	require_once('timersetting.php');
}


function timer_action(){
$option_name1 = 'timer_year' ;
$option_name2 = 'timer_month' ;
$option_name3 = 'timer_date' ;
$option_name4 = 'timer_msg';
$year=get_option( $option_name1 );
$month=get_option( $option_name2 );
$date=get_option( $option_name3 );	
$msg=get_option( $option_name4 );	
$month=$month-1;

$script='<script>jQuery(function(){
	
	var note = jQuery("#note"),
		ts = new Date('.$year.', '.$month.', '.$date.'),
		newYear = true;
	
	if((new Date()) > ts){
		ts = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}
		
	jQuery("#countdown").countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? "":"s" ) + ", ";
			message += hours + " hour" + ( hours==1 ?"":"s" ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? "":"s" ) + " and ";
			message += seconds + " second" + ( seconds==1 ? "":"s" ) + " <br />";
			
			';
			if(isset($msg) && !empty($msg)){
			$script.='message += "'.$msg.'";';
			}
			
			
			$script.='note.html(message);
		}
	});
	
});</script>';

echo $script;
echo '<div id="countdown"></div><p id="note"></p>';


}

function timer_addcss() { 
	//wp_enqueue_style('style_addcss', '/' . PLUGINDIR . '/timer/assets/css/styles.css' ); 
	wp_enqueue_style('devices_addcss', '/' . PLUGINDIR . '/timer/assets/countdown/jquery.countdown.css' );
	wp_enqueue_script( 'countdown', '/' . PLUGINDIR . '/timer/assets/countdown/jquery.countdown.js', array(), '1.0.0', true );
	
	
} 

function wptuts_options_enqueue_scripts() {  
			wp_enqueue_script('jquery');
           	timer_addcss();
			
			
}  


add_action( 'wp_enqueue_scripts', 'wptuts_options_enqueue_scripts' );
add_action('wp_init', 'wptuts_options_enqueue_scripts');
add_shortcode('showtimer', 'timer_action');


?>