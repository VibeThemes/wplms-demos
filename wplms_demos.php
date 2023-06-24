<?php
/*
Plugin Name: WPLMS Demos
Plugin URI: http://www.VibeThemes.com
Description: WPLMS DEMOS by VibeThemes
Version: 1.8
Requires at least: WP 3.8, BuddyPress 1.9 
Tested up to: 2.0.1
License: (Themeforest License : http://themeforest.net/licenses)
Author: Mr.Vibe 
Author URI: http://www.VibeThemes.com
Network: true
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class wplms_demos_init{

	public static $instance;
    
    public static function init(){
    	
        if ( is_null( self::$instance ) )
            self::$instance = new wplms_demos_init();
        return self::$instance;
    }

	private function __construct(){
	    
		$this->settings = array(
			array(
				'link'=>'https://demos.wplms.io/main/',
				'image'=>plugins_url('main_demo.jpg',__FILE__),
				'name' => 'Main demo'
			),
		    array(
				'link'=>'https://demos.wplms.io/startup/',
				'image'=>plugins_url('startup_demo.png',__FILE__),
				'name' => 'Startup demo'
			),
			array(
				'link'=>'https://demos.wplms.io/mooc/',
				'image'=>'https://demos.wplms.io/learningcenter/wp-content/uploads/2022/12/mooc-1.png',
				'name' => 'Mooc demo'
			),
			array(
				'link'=>'https://demos.wplms.io/instructor/',
				'image'=>'https://vt-tfimages.s3.amazonaws.com/instructor_demo1.png',
				'name' => 'Instructor demo'
			),
			array(
				'link'=>'https://demos.wplms.io/learningcenter/',
				'image'=>'https://vt-tfimages.s3.amazonaws.com/4.09-1.png',
				'name' => 'Learning Center'
			),
			array(
				'link'=>'https://demos.wplms.io/quizmaster',
				'image'=>'https://vt-tfimages.s3.amazonaws.com/4.09-3.png',
				'name' => 'Quiz Master'
			),
			array(
				'link'=>'https://demos.wplms.io/academy/',
				'image'=>'https://demos.wplms.io/academy/wp-content/uploads/2020/09/academy.png',
				'name' => 'Academy Demo'
			),
			array(
				'link'=>'https://demos.wplms.io/',
				'image'=>'https://demos.wplms.io/academy/wp-content/uploads/2020/09/base_demo.png',
				'name' => 'Base Demo'
			)
		);
		
		add_action('wp_footer',array($this,'generate'));
		add_action('woocommerce_order_status_changed',[$this,'auto_complete_by_payment_method']);
        add_action('bp_signup_pre_validate',[$this,'pre_validate']);
        add_filter('bp_after_bp_core_signups_add_args_parse_args',[$this,'parse_args']);
	}	

	function generate(){
		
		$this->get_css();	
		$this->get_dom();
		$this->get_js();
	}

	function get_dom(){

		?>
		<div id="wplms_demos_slide_panel">
			<div class="wplms_demos">
				<span></span>
				<div class="title"> <a href="https://demos.wplms.io" target="_blank" style="font-size: 16px;color: #222;font-weight: 800;">WPLMS : LMS for WP</a><a href="http://themeforest.net/item/wplms-learning-management-system/6780226" class="buynow main">Buy Now</a></div>
				<div class="wplms_demo_container">
					<ul>
					<?php
						foreach($this->settings as $theme){
							echo '<li><a href="'.$theme['link'].'"><img src="'.$theme['image'].'" title="'.$theme['name'].'" /></a></li>';
						}
					?>
					</ul>
				</div>
			</div>
		</div>
		<?php
	}

	function get_css(){
		?>
		<style>
		#wplms_demos_slide_panel{
			position:fixed;
			top:150px;
			right:0;
			width:320px;
			height:calc(100% - 300px);
			background:#FFF;
			z-index:99;
			opacity:1;
			border-radius:0 0 0 5px;
			box-shadow: 0 1px 10px rgba(0,0,0,.2);
			transform: translate3d(320px, 0, 0);
			-webkit-transition: all 0.2s ease-in-out;
		    -moz-transition: all 0.2s ease-in-out;
		    -o-transition: all 0.2s ease-in-out;
	  	    transition: all 0.2s ease-in-out;
		}#wplms_demos_slide_panel .wplms_demo_container li a {
		    max-height: 120px;
		    overflow: hidden;
		    display: inline-block;
		    border-radius: 5px;
		}
		.wplms_demos{position:relative;}
		#wplms_demos_slide_panel.open{
			-webkit-transform: translate3d(0px, 0, 0);
			transform: translate3d(0px, 0, 0);
		}
		.title_content{padding: 0 15px 10px;font-size: 16px;line-height: 1.3;color:#fff;}
		#wplms_demos_slide_panel span{
			position:absolute;
			top:0;
			left:-40px;
			z-index:99;
			padding:11px;
			display:block;
			border-radius:2px 0 0 2px;
			background:#444;
			color:#FFF;line-height:1;
		}
		#wplms_demos_slide_panel span:after{
			content:"\e71e";font-family:'vicon';
			color:#FFF;line-height:1;
			font-size:20px;
		}
		#wplms_demos_slide_panel .title{
			padding:10px;
			text-align:center;
			font-size: 14px;font-weight:600;text-transform:uppercase;
		}

		#wplms_demos_slide_panel a.buynow{
		    padding: 5px 10px;
		    display: inline-block;
		    color: #FFF;
		    margin: -3px 0 0 10px;
		    border-radius: 4px;
		    font-size: 11px;
		    background: #82b440;
		    font-weight: 600;
		    float: right;
		    margin-top: -;
		    -webkit-box-shadow: 0 2px 0 #6f9a37;
		    box-shadow: 0 2px 0 #6f9a37;
		}
		#wplms_demos_slide_panel .wplms_demo_container{
			height:calc(100vh - 300px);
			background:#444;
			padding:10px;
			overflow-y:scroll;
		}

		#wplms_demos_slide_panel .wplms_demo_container ul{
		    display: grid;
		    grid-template-columns: 1fr 1fr;
		    grid-gap: 10px;
		    justify-content: space-evenly;
		}
		#wplms_demos_slide_panel .wplms_demo_container li:hover{
			box-shadow: 0 8px 20px 0 rgba(0,0,0,0.2);
		   -webkit-transform: perspective(400px) translateY(-2px);
		   -moz-transform: perspective(400px) translateY(-2px);
		   -o-transform: perspective(400px) translateY(-2px);
		   transform: perspective(400px) translateY(-2px);
		}
		</style>
		<?php
	}

	function get_js(){
		?>
		<script>
			document.addEventListener('DOMContentLoaded',function(){
				document.querySelector('#wplms_demos_slide_panel span').addEventListener('click',function(){
					document.querySelector('#wplms_demos_slide_panel').classList.toggle('open');
				});
			});
		</script>
		<?php
	}
	
	
    
    
    function auto_complete_by_payment_method($order_id)
    {
    
        if ( ! $order_id ) {
        return;
        }
    
        global $product;
        $order = wc_get_order( $order_id );
        
        if ($order->data['status'] == 'processing' || $order->data['status'] == 'on-hold') {
        $payment_method=$order->get_payment_method();
        if ($payment_method=="cod")
        {
        $order->update_status( 'completed' );
        }
        
        }
    
    }
    
    
    function pre_validate(){
    	if(!empty($_POST['signup_email'])){
    		$email = esc_attr($_POST['signup_email']);
    
    		$response = wp_remote_get(esc_url_raw("https://emailverifier.reoon.com/api/v1/verify?email=$email&key=uD22Vz5J81Tvuqcl8xKsOWj5SQl5Dzvx&mode=power"));
    		$api_response = json_decode( wp_remote_retrieve_body( $response ), true );
    		if(!empty($api_response) && $api_response['status'] == 'safe'){
    
    		}else{
    			wp_die('Unable to verify email');
    		}
    	}
    }
    
    
    
    
    function parse_args($args){
    	$response = wp_remote_get(esc_url_raw("https://emailverifier.reoon.com/api/v1/verify?email=".$args['user_email']."&key=uAJdSYQHYWQvWuPQwtyCXKOet0yr7l73&mode=power"));
    		$api_response = json_decode( wp_remote_retrieve_body( $response ), true );
    		if(!empty($api_response) && $api_response['status'] == 'safe'){
    
    		}else{
    			unset($args['user_login']);
    			unset($args['user_email']);
    			wp_die('Unable to register user');
    		}
    	return $args;
    }

}

add_action( 'init', 'wplms_demos_update');
function wplms_demos_update() {
	require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'update.php' );
	$config = array(
		'base'      => plugin_basename( __FILE__ ), //required
		'dashboard' => true,
		'repo_uri'  => 'https://wplms.io/',  //required
		'repo_slug' => 'wplms-demos',  //required
	);
	new WPLMS_Demos_Update( $config );
}

wplms_demos_init::init();	

