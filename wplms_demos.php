<?php
/*
Plugin Name: WPLMS Demos
Plugin URI: http://www.VibeThemes.com
Description: WPLMS DEMOS by VibeThemes
Version: 1.4
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
				'link'=>'https://wplms.io/demos/demo14/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2019/04/wplms_demo14.jpg',
				'name' => 'DEMO 14'
			),
			array(
				'link'=>'https://wplms.io/demos/demo12/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2019/03/wplms_demo13.jpg',
				'name' => 'DEMO 13'
			),
			array(
				'link'=>'https://wplms.io/demos/demo12/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2019/02/wplms_demo12.jpg',
				'name' => 'DEMO 12'
			),
			array(
				'link'=>'https://wplms.io/demos/demo11/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2019/02/wplms_demo11.jpg',
				'name' => 'DEMO 11'
			),
			array(
				'link'=>'https://wplms.io/demos/demo10/',
				'image'=>'http://wplms.io/demos/wp-content/uploads/2018/05/wplms_demo10.jpg',
				'name' => 'DEMO 10'
			),
			array(
				'link'=>'https://wplms.io/demos/demo9/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/02/demo9-310x412.jpg',
				'name' => 'DEMO 9'
			),
			array(
				'link'=>'https://wplms.io/demos/demo8/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/01/demo8-550x1024-310x577.jpg',
				'name' => 'DEMO 8'
			),
			array(
				'link'=>'https://wplms.io/demos/demo7/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/01/demo7-554x1024-310x573.jpg',
				'name' => 'DEMO 7'
			),
			array(
				'link'=>'https://wplms.io/demos/demo6/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/01/demo6-310x431.jpg',
				'name' => 'DEMO 6'
			),
			array(
				'link'=>'https://wplms.io/demos/demo5/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/01/demo5-310x429.jpg',
				'name' => 'DEMO 5'
			),
			array(
				'link'=>'https://wplms.io/demos/demo4/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/01/demo4-310x463.jpg',
				'name' => 'DEMO 4'
			),
			array(
				'link'=>'https://wplms.io/demos/demo3/',
				'image'=>'http://wplms.io/demos/wp-content/uploads/2018/01/demo3-310x464.jpg',
				'name' => 'DEMO 3'
			),
			array(
				'link'=>'https://wplms.io/demos/demo2/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/01/demo2-310x463.jpg',
				'name' => 'DEMO 2'
			),
			array(
				'link'=>'https://wplms.io/demos/demo1/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/01/demo1-310x463.jpg',
				'name' => 'DEMO 1'
			),
			array(
				'link'=>'https://wplms.io/demos/rtl/',
				'image'=>'http://wplms.io/demos/wp-content/uploads/2018/02/rtl-310x520.jpg',
				'name' => 'RTL'
			),
			array(
				'link'=>'https://wplms.io/demos/multisite/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/01/multisite-310x212.png',
				'name' => 'MultiSite'
			),

			array(
				'link'=>'https://wplms.io/demos/modern/',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/01/wplms_modern-310x212.png',
				'name' => 'Modern theme'
			),
			array(
				'link'=>'https://wplms.io/demos/oneinstructor',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/01/oneinstructor-310x245.png',
				'name' => 'One Instructor'
			),
			array(
				'link'=>'https://wplms.io/demos/onecourse',
				'image'=>'http://wplms.io/demos/wp-content/uploads/2018/01/onecourse-310x200.png',
				'name' => 'One Course'
			),
			array(
				'link'=>'https://wplms.io/demos/points_system',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/01/points_system-310x223.png',
				'name' => 'Points System'
			),
			array(
				'link'=>'https://wplms.io/demos/childone',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/01/childone-310x220.png',
				'name' => 'Child One'
			),
			array(
				'link'=>'https://wplms.io/demos/default',
				'image'=>'https://wplms.io/demos/wp-content/uploads/2018/01/default-310x223-310x223.png',
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
				<div class="title"> <a href="https://wplms.io" target="_blank" style="font-size: 16px;color: #222;font-weight: 800;">WPLMS : LMS for WP</a><a href="http://themeforest.net/item/wplms-learning-management-system/6780226" class="buynow main">Buy Now</a></div>
				<div class="wplms_demo_container">
					<div class="title_content">
						<p>4 years, 17000+ sales, Mobile Apps.<br>For Instructors, Schools, Academy and MOOCs. <a href="http://vibethemes.com/wplms-the-best-education-theme-wordpress/" style="border-bottom: 1px dotted #fff;padding-bottom: 5px;color: #82b440;" target="_blank">see more reasons !</a></p>
						
					</div>
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
			top:50px;
			right:0;
			width:320px;
			height:calc(100% - 100px);
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
			content:"\f013";font-family:'fontawesome';
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
			height:calc(100vh - 100px);
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
			jQuery(document).ready(function($){
				$('#wplms_demos_slide_panel span').click(function(){
					$('#wplms_demos_slide_panel').toggleClass('open');
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
		'repo_uri'  => 'https://wplms.io/',  //required
		'repo_slug' => 'wplms-demos',  //required
	);
	new WPLMS_Demos_Update( $config );
}

wplms_demos_init::init();	



