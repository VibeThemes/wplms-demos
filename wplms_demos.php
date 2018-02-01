<?php
/*
Plugin Name: WPLMS Demos
Plugin URI: http://www.VibeThemes.com
Description: WPLMS DEMOS by VibeThemes
Version: 1.0
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
				'link'=>'http://themes.vibethemes.com/wplms/skins/modern',
				'image'=>'http://themes.vibethemes.com/wplms/wp-content/uploads/2015/09/wplms_modern-460x314.png',
				'name' => 'Modern theme'
			),
			array(
				'link'=>'http://themes.vibethemes.com/wplms/skins/oneinstructor',
				'image'=>'http://themes.vibethemes.com/wplms/wp-content/uploads/2015/09/oneinstructor-460x364.png',
				'name' => 'One Instructor'
			),
			array(
				'link'=>'http://themes.vibethemes.com/wplms/skins/onecourse',
				'image'=>'http://themes.vibethemes.com/wplms/wp-content/uploads/2015/10/onecourse-460x296.png',
				'name' => 'One Course'
			),
			array(
				'link'=>'http://themes.vibethemes.com/wplms/skins/points_system',
				'image'=>'http://vibethemes.com/envato/wplms/wp-content/uploads/2015/03/points_system-768x552.png',
				'name' => 'Points System'
			),
			array(
				'link'=>'http://themes.vibethemes.com/wplms/skins/childone',
				'image'=>'http://themes.vibethemes.com/wplms/wp-content/uploads/2015/10/childone-460x326.png',
				'name' => 'Child One'
			),
			array(
				'link'=>'http://themes.vibethemes.com/wplms/skins/default',
				'image'=>'http://themes.vibethemes.com/wplms/wp-content/uploads/2015/10/default-460x331.png',
				'name' => 'Default theme'
			),
		);
		
		add_action('wp_footer',array($this,'generate'));
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
				<div class="title"> WPLMS Demos</div>
				<div class="wplms_demo_container">
					<ul>
					<?php
						foreach($this->settings as $theme){
							echo '<li><a href="'.$theme['link'].'"><img src="'.$theme['image'].'" title="'.$theme['name'].'" /></a></li>';
						}
					?>
					</ul>
				</div>
				<div class="buynow"><a href="http://themeforest.net/item/wplms-learning-management-system/6780226">Buy Now</a></div>
			</div>
		</div>
		<?php
	}

	function get_css(){
		?>
		<style>
		#wplms_demos_slide_panel{
			position:fixed;
			top:100px;
			right:0;
			border-radius:2px 2px 0 0;
			width:200px;
			background:#FFF;
			z-index:99;
			opacity:1;
			box-shadow: 0 1px 1px rgba(0,0,0,.6);
			webkit-transition: all 0.2s ease-in-out;
		    -moz-transition: all 0.2s ease-in-out;
		    -o-transition: all 0.2s ease-in-out;
	  	    transition: all 0.2s ease-in-out;
		}
		.wplms_demos{position:relative;}
		#wplms_demos_slide_panel.close{
			-webkit-transform: translate3d(200px, 0, 0);
			transform: translate3d(200px, 0, 0);
		}
		#wplms_demos_slide_panel span{
			position:absolute;
			top:0;
			left:-40px;
			z-index:99;
			padding:10px;
			display:block;
			border-radius:2px 2px 0 0;
			background:#444;
			color:#FFF;line-height:1;
		}
		#wplms_demos_slide_panel span:after{
			content: "\f229";
			font-family: 'dashicons';
			color:#FFF;line-height:1;
			font-size:20px;
		}
		#wplms_demos_slide_panel .title{
			padding:10px;
			text-align:center;
			font-size: 14px;font-weight:600;text-transform:uppercase;
		}
		#wplms_demos_slide_panel .buynow{
			margin:10px 0;
			text-align:center;
			font-size:11px;font-weight:600;text-transform:uppercase;
		}
		#wplms_demos_slide_panel .buynow a{
			padding:8px 20px; display:inline-block;
			color:#FFF; border-radius:4px;
			background:#82b440;font-weight:600;
		    -webkit-box-shadow: 0 2px 0 #6f9a37;
    		box-shadow: 0 2px 0 #6f9a37;
		}
		#wplms_demos_slide_panel .wplms_demo_container{
			height:400px;
			background:#444;
			padding:10px;
			overflow-y:scroll;
		}#wplms_demos_slide_panel .wplms_demo_container img{border-radius:4px; box-shadow:0 1px 1px #333;}
		#wplms_demos_slide_panel .wplms_demo_container li{
			list-style:none;
			border:10px solid #444;
			display:block;
		}
		</style>
		<?php
	}

	function get_js(){
		?>
		<script>
			jQuery(document).ready(function($){
				$('#wplms_demos_slide_panel span').click(function(){
					if($('html').hasClass('csstransitions')){
						$('#wplms_demos_slide_panel').toggleClass('close');
					}else{
						$('#wplms_demos_slide_panel').toggle(200);
					}
				});
			});
		</script>
		<?php
	}
}

add_action( 'init', 'wplms_demos_update');
function wplms_demos_update() {
	require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'update.php' );
	$config = array(
		'base'      => plugin_basename( __FILE__ ), //required
		'dashboard' => true,
		'repo_uri'  => 'http://www.vibethemes.com/',  //required
		'repo_slug' => 'wplms-demos',  //required
	);
	new WPLMS_Demos_Update( $config );
}

wplms_demos_init::init();	



