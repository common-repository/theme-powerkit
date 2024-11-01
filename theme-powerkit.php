<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * @package Theme Powerkit
 * @version 1.0.0
 */

/*
* Plugin Name: Theme Powerkit
* Version: 1.0.3
* Plugin URI: https://www.themeinwp.com/theme-powerkit/
* Description: Theme Powerkit is WordPress free plugin with multiple feature. Plugin have 5 useful widget like Auther, Category,Recent Posts, Social Icon and Tab Posts Widgets and also, this plugin have webmaster verification meta field, Open Graph, Twitter Summery Card and you can add script before header and after footer as well.
* Author: ThemeInWP
* Author URI: https://www.themeinwp.com/
* Tested up to: 5.4.2
* Requires PHP: 5.5
* Text Domain: theme-powerkit
*/
  if ( ! defined( 'THEME_POWERKIT_LANG_DIR' ) ) {
	    define( 'THEME_POWERKIT_LANG_DIR', basename( dirname( __FILE__ ) ) . '/languages/' );
	}

  if ( ! class_exists( 'Theme_Powerkit_Class' ) ) {

    class Theme_Powerkit_Class{

    	function __construct(){
    		
    		if( isset( $_GET['page'] ) ){

	    		$current_page = $_GET['page'];
	    		add_action('in_admin_header', function () {

				  if ( !$current_page = 'theme-powerkit' ) return;

				  remove_all_actions('admin_notices');
				  remove_all_actions('all_admin_notices');

				}, 1000);
	    	}

	    	
	    	add_action( 'init', array( $this, 'theme_powerkit_plugin_text_domain' ) );
	    	register_activation_hook( __FILE__, array( $this, 'theme_powerkit_activation_default_value' ) );
	    	add_action( 'admin_enqueue_scripts',array( $this, 'theme_powerkit_admin_scripts' ) );
	    	add_action( 'wp_enqueue_scripts',array( $this, 'theme_powerkit_frontend_scripts' ) );
	    	add_action( 'admin_menu', array( $this, 'theme_powerkit_backend_menu' ) );
	    	add_action( 'admin_post_theme_powerkit_settings_options', array( $this, 'theme_powerkit_settings_options' ) );
	    	add_filter( 'body_class', array( $this,'theme_powerkit_body_class') );
	    	add_filter( 'user_contactmethods', array( $this, 'theme_powerkit_user_fields') );
	    	add_action( 'wp_footer', array( $this,'theme_powerkit_footer_scripts' ) );
			add_action( 'wp_head', array( $this,'theme_powerkit_header_scripts' ) );
			add_action( 'wp_head', array( $this,'theme_powerkit_verification_meta' ) );
			add_action( 'wp_enqueue_scripts', array( $this,'theme_powerkit_custom_css' ) );
			add_shortcode( 'theme-powerkit-ab', array( $this, 'theme_powerkit_frontend_author_box_shortcode' ) );
			add_filter('the_content', array($this, 'booster_extension_frontend_the_content'));

	    	$tpk_settings = get_option( 'tpk_options_settings' );

	    	$tpk_enable_post_views = isset( $tpk_settings[ 'tpk_enable_post_views' ] ) ? $tpk_settings[ 'tpk_enable_post_views' ] : '1';

	    	$tpk_enable_author_widget = isset( $tpk_settings[ 'tpk_enable_author_widget' ] ) ? $tpk_settings[ 'tpk_enable_author_widget' ] : '1';

            $tpk_enable_category_widget = isset( $tpk_settings[ 'tpk_enable_category_widget' ] ) ? $tpk_settings[ 'tpk_enable_category_widget' ] : '1';

             $tpk_enable_ad_widget = isset( $tpk_settings[ 'tpk_enable_ad_widget' ] ) ? $tpk_settings[ 'tpk_enable_ad_widget' ] : '1';

            $tpk_enable_recent_post_widget = isset( $tpk_settings[ 'tpk_enable_recent_post_widget' ] ) ? $tpk_settings[ 'tpk_enable_recent_post_widget' ] : '1';

            $tpk_enable_social_widget = isset( $tpk_settings[ 'tpk_enable_social_widget' ] ) ? $tpk_settings[ 'tpk_enable_social_widget' ] : '1';

            $tpk_enable_tab_posts_widget = isset( $tpk_settings[ 'tpk_enable_tab_posts_widget' ] ) ? $tpk_settings[ 'tpk_enable_tab_posts_widget' ] : '1';

			if( $tpk_enable_post_views ){

				include_once 'inc/backend/tpk-views-count.php';

			}

		    include_once 'inc/backend/tpk-functions.php';
	    	include_once 'inc/backend/widget-base-class.php';

	    	if( $tpk_enable_author_widget ){
		    	include_once 'inc/backend/tpk-author.php';
		    }
		    if( $tpk_enable_social_widget ){
		    	include_once 'inc/backend/social-link.php';
		    }
	    	if( $tpk_enable_tab_posts_widget ){
		    	include_once 'inc/backend/tab-posts.php';
		    }
	    	if( $tpk_enable_recent_post_widget ){
		    	include_once 'inc/backend/recent-post.php';
		    }
	    	if( $tpk_enable_category_widget ){
	    		include_once 'inc/backend/category.php';
	    	}

	    	if( $tpk_enable_ad_widget ){
	    		include_once 'inc/backend/ad-box.php';
	    	}


	    	include_once 'inc/backend/og-twitter-summary-metabox.php';

	    	include_once 'inc/frontend/open-graph.php';
	    	include_once 'inc/frontend/twitter-summary-card.php';
	    	include_once 'inc/frontend/ad-area.php';
	    	
	    }

	    function theme_powerkit_body_class($classes) {
			   
		    $classes[] = 'theme-powerkit';
		    return $classes;
		    
		}

	    // loads plugin text domain.
	    function theme_powerkit_plugin_text_domain(){

	        load_plugin_textdomain( 'theme-powerkit', false, THEME_POWERKIT_LANG_DIR );

	    }

	    function theme_powerkit_admin_scripts() {

	    	$fonts_url = theme_powerkit_fonts_url();
		    if (!empty($fonts_url)) {
		        wp_enqueue_style('theme-powerkit-google-fonts', $fonts_url, array(), null);
		    }
	    	wp_enqueue_media();
	    	wp_enqueue_script( 'wp-theme-plugin-editor');
	    	$cm_setting = wp_enqueue_code_editor( array( 'type' => 'text/javascript' ) );
	    	$cm_setting_css = wp_enqueue_code_editor( array('type' => 'text/css') );

	    	wp_enqueue_script( 'theme-powerkit-widget', plugin_dir_url( __FILE__ )  . 'assets/js/widget.js', array('jquery','jquery-ui-core','jquery-ui-sortable'), '', true );
			wp_enqueue_script( 'theme-powerkit-admin', plugin_dir_url( __FILE__ )  . 'assets/js/admin.js', array('jquery','jquery-ui-core','jquery-ui-sortable'), '', true );
			wp_enqueue_style( 'theme-powerkit-admin-style', plugin_dir_url( __FILE__ )  . 'assets/css/admin.css' );

			$ajax_nonce = wp_create_nonce('theme_powerkit_ajax_nonce');
			$return_url = urlencode( admin_url( 'admin.php?page=theme-powerkit') );
			
			$tpk_settings = get_option( 'tpk_options_settings' );
			$tpk_header_ad_type = isset( $tpk_settings[ 'tpk_header_ad_type' ] ) ? $tpk_settings[ 'tpk_header_ad_type' ] : 'image';
			$tpk_sidebar_ad_type = isset( $tpk_settings[ 'tpk_sidebar_ad_type' ] ) ? $tpk_settings[ 'tpk_sidebar_ad_type' ] : 'image';
			$tpk_article_top_ad_type = isset( $tpk_settings[ 'tpk_article_top_ad_type' ] ) ? $tpk_settings[ 'tpk_article_top_ad_type' ] : 'image';
			$tpk_article_inline_ad_type = isset( $tpk_settings[ 'tpk_article_inline_ad_type' ] ) ? $tpk_settings[ 'tpk_article_inline_ad_type' ] : 'image';
			$tpk_article_bottom_ad_type = isset( $tpk_settings[ 'tpk_article_bottom_ad_type' ] ) ? $tpk_settings[ 'tpk_article_bottom_ad_type' ] : 'image';
			$tpk_footer_ad_type = isset( $tpk_settings[ 'tpk_footer_ad_type' ] ) ? $tpk_settings[ 'tpk_footer_ad_type' ] : 'image';

			wp_localize_script(
		        'theme-powerkit-admin', 
		        'theme_powerkit_data',
		        array(
					'upload_image'   =>  esc_html__('Choose Image','theme-powerkit'),
					'use_imahe'   =>  esc_html__('Select','theme-powerkit'),
					'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
					'ajax_nonce' => $ajax_nonce,
					'cm_setting' => $cm_setting,
					'cm_setting_css' => $cm_setting_css,
					'return_url' => $return_url,
					'tpk_header_ad_type' => $tpk_header_ad_type,
					'tpk_sidebar_ad_type' => $tpk_sidebar_ad_type,
					'tpk_article_top_ad_type' => $tpk_article_top_ad_type,
					'tpk_article_inline_ad_type' => $tpk_article_inline_ad_type,
					'tpk_article_bottom_ad_type' => $tpk_article_bottom_ad_type,
					'tpk_footer_ad_type' => $tpk_footer_ad_type,
		         )
		    );

		}

		function theme_powerkit_frontend_scripts() {

			wp_enqueue_style( 'theme-powerkit-admin-social-icons', plugin_dir_url( __FILE__ )  . 'assets/css/social-icons.min.css' );
			wp_enqueue_script( 'theme-powerkit-frontend-script', plugin_dir_url( __FILE__ )  . 'assets/js/frontend.js', array('jquery'), '', true );
			wp_enqueue_style( 'theme-powerkit-admin-style', plugin_dir_url( __FILE__ )  . 'assets/css/style.css' );

		}

	    // Add Backend Menu
	    function theme_powerkit_backend_menu(){

	    	add_menu_page( 'Theme Powerkit', 'Theme Powerkit', 'manage_options', 'theme-powerkit', array( $this, 'theme_powerkit_main_page' ),  'dashicons-theme-powerkit' );

	    }

	    // Add user social meta
	    function theme_powerkit_user_fields( $contact_methods ){

	        $contact_methods['tpk_user_metabox_facebook'] = __('Facebook', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_twitter'] = __('Twitter', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_instagram'] = __('Instagram', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_pinterest'] = __('Pinterest', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_linkedin'] = __('LinkedIn', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_youtube'] = __('Youtube', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_vimeo'] = __('Vimeo', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_whatsapp'] = __('Whatsapp', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_github'] = __('Github', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_wordpress'] = __('WordPress', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_foursquare'] = __('FourSquare', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_vk'] = __('VK', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_twitch'] = __('Twitch', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_tumblr'] = __('Tumblr', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_snapchat'] = __('Snapchat', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_skype'] = __('Skype', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_reddit'] = __('Reddit', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_stackoverflow'] = __('Stack Overflow', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_xing'] = __('Xing', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_delicious'] = __('Delicious', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_soundcloud'] = __('SoundCloud', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_behance'] = __('Behance', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_steam'] = __('Steam', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_dribbble'] = __('Dribbble', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_blogger'] = __('Blogger', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_flickr'] = __('Flickr', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_spotify'] = __('spotify', 'theme-powerkit');
	        $contact_methods['tpk_user_metabox_rss'] = __('RSS', 'theme-powerkit');

	        return $contact_methods;
	    }

	    // Settings Form
	    function theme_powerkit_main_page(){

	    	include('inc/backend/main-page.php');

	    }

	    // Saving Form Values
	    function theme_powerkit_settings_options(){

	        if( isset( $_POST['tpk_options_nonce'],$_POST['tpk_form_submit'] ) &&  wp_verify_nonce( $_POST['tpk_options_nonce'], 'tpk_options_nonce' ) && current_user_can('manage_options')  ){

		            include( 'inc/backend/save-settings.php' );

	        } else {

	            die( 'No script kiddies please!' );

	        }

	    }

	    // Update options on theme activate
	    function theme_powerkit_activation_default_value(){

	    	if( empty( get_option( 'tpk_options_settings' ) ) ){
			    include( 'inc/backend/activation.php' );
			}

		}

		// Header Script
		function theme_powerkit_header_scripts() {
		 
		    $tpk_settings = get_option( 'tpk_options_settings' );
		    $addtional_js_head =  isset( $tpk_settings[ 'tpk_header_script' ] ) ? $tpk_settings['tpk_header_script'] : '';
		    if ( '' === $addtional_js_head ) {

		        return;

		    }

		    ?>
		    <script type="text/javascript">
		        jQuery(function ($) {
		            "use strict";
		            <?php echo $addtional_js_head . "\n"; ?>
		        });
		    </script>
		    <?php

		}

		// Author Box Shortcode.
		function theme_powerkit_frontend_author_box_shortcode( $args ){

			ob_start();

			if(  !is_single() && !is_archive() )
			return;

			if( isset( $args['userid'] ) ){
				$userid = $args['userid'];
				$_POST["userid"] = absint( $userid );
			}
			if( isset( $args['email'] ) ){
				$email = $args['email'];
				$_POST["email"] = esc_html( $email );
			}

			if( isset( $args['url'] ) ){
				$url = $args['url'];
				$_POST["url"] = esc_html( $url );
			}

			if( isset( $args['title'] ) ){
				$title = $args['title'];
				$_POST["title"] = esc_html( $title );
			}
			if( isset( $args['role'] ) ){
				$role = $args['role'];
				$_POST["role"] = esc_html( $role );
			}
			include( 'inc/frontend/author-box-shortcode.php' );

			$html = ob_get_contents();
            ob_get_clean();
            return $html;

		}

		// Footer Script
		function theme_powerkit_footer_scripts() {
		 	
		 	$tpk_settings = get_option( 'tpk_options_settings' );
		    $addtional_js_footer =  isset( $tpk_settings[ 'tpk_footer_script' ] ) ? $tpk_settings['tpk_footer_script'] : '';

		    if ( '' === $addtional_js_footer ) {

		        return;

		    }

		    ?>
		    <script type="text/javascript">
		        jQuery(function ($) {
		            "use strict";
		            <?php echo $addtional_js_footer . "\n"; ?>
		        });
		    </script>
		    <?php

		}

		// Webmasters Verifications
		function theme_powerkit_verification_meta() {
		    
		    $tpk_settings = get_option( 'tpk_options_settings' );

		    $tpk_google_webmaster_tools =  isset( $tpk_settings[ 'tpk_google_webmaster_tools' ] ) ? $tpk_settings['tpk_google_webmaster_tools'] : '';
            $tpk_verification_code_bing =  isset( $tpk_settings[ 'tpk_verification_code_bing' ] ) ? $tpk_settings['tpk_verification_code_bing'] : '';
            $tpk_verification_code_pinterest =  isset( $tpk_settings[ 'tpk_verification_code_pinterest' ] ) ? $tpk_settings['tpk_verification_code_pinterest'] : '';
            $tpk_verification_code_alexa =  isset( $tpk_settings[ 'tpk_verification_code_alexa' ] ) ? $tpk_settings['tpk_verification_code_alexa'] : '';
            $tpk_verification_code_yandex =  isset( $tpk_settings[ 'tpk_verification_code_yandex' ] ) ? $tpk_settings['tpk_verification_code_yandex'] : '';
		    
		    if( $tpk_google_webmaster_tools ){ ?>
		    	<meta name="google-site-verification" content="<?php echo esc_attr( $tpk_google_webmaster_tools ); ?>">
		    <?php }

		    if( $tpk_verification_code_bing ){ ?>
		    	<meta name="msvalidate.01" content="<?php echo esc_attr( $tpk_verification_code_bing ); ?>">
		    <?php }

		    if( $tpk_verification_code_pinterest ){ ?>
		    	<meta name="p:domain_verify" content="<?php echo esc_attr( $tpk_verification_code_pinterest ); ?>">
		    <?php }

		    if( $tpk_verification_code_alexa ){ ?>
		    	<meta name="alexaVerifyID" content="<?php echo esc_attr( $tpk_verification_code_alexa ); ?>">
		    <?php }

		    if( $tpk_verification_code_yandex ){ ?>
		    	<meta name="yandex-verification" content="<?php echo esc_attr( $tpk_verification_code_yandex ); ?>">
		    <?php }

		}

		function theme_powerkit_custom_css() {

			$tpk_settings = get_option( 'tpk_options_settings' );
		    $tpk_custom_css =  isset( $tpk_settings[ 'tpk_custom_css' ] ) ? $tpk_settings['tpk_custom_css'] : '';
		    wp_add_inline_style('theme-powerkit-admin-style', $tpk_custom_css);
		    
		}

		function booster_extension_frontend_the_content($content){

            if ( in_array( 'get_the_excerpt', $GLOBALS['wp_current_filter'] ) )
                return $content;
            if ( is_single() && 'post' == get_post_type() ) {

                $beforecontent = '';
                $after_content = '';
                $all_content = '';

                $tpk_settings = get_option( 'tpk_options_settings' );
                $tpk_enable_article_top_ad = isset( $tpk_settings[ 'tpk_enable_article_top_ad' ] ) ? $tpk_settings[ 'tpk_enable_article_top_ad' ] : '';
                $tpk_enable_article_bottom_ad = isset( $tpk_settings[ 'tpk_enable_article_bottom_ad' ] ) ? $tpk_settings[ 'tpk_enable_article_bottom_ad' ] : '';

                if( $tpk_enable_article_top_ad ){

					$tpk_article_top_ad_image = isset( $tpk_settings[ 'tpk_article_top_ad_image' ] ) ? $tpk_settings[ 'tpk_article_top_ad_image' ] : '';
					$tpk_article_top_ad_type = isset( $tpk_settings[ 'tpk_article_top_ad_type' ] ) ? $tpk_settings[ 'tpk_article_top_ad_type' ] : '';
					$tpk_article_top_ad_script = isset( $tpk_settings[ 'tpk_article_top_ad_script' ] ) ? $tpk_settings[ 'tpk_article_top_ad_script' ] : '';
					$tpk_article_top_ad_image_link = isset( $tpk_settings[ 'tpk_article_top_ad_image_link' ] ) ? $tpk_settings[ 'tpk_article_top_ad_image_link' ] : '';
					$tpk_ed_article_top_ad_desktop = isset( $tpk_settings[ 'tpk_ed_article_top_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_article_top_ad_desktop' ] : '';
					$tpk_ed_article_top_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_article_top_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_article_top_ad_tablet_landscape' ] : '1';
					$tpk_ed_article_top_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_article_top_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_article_top_ad_tablet_portrait' ] : '1';
					$tpk_ed_article_top_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_article_top_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_article_top_ad_tablet_mobile' ] : '1';

					$article_top_class_ad_ed = '';
					if( !$tpk_ed_article_top_ad_desktop ){

						$article_top_class_ad_ed .= ' article-top-disable-desktop';

					}
					if( !$tpk_ed_article_top_ad_tablet_landscape ){

						$article_top_class_ad_ed .= ' article-top-disable-tablate-landscape';

					}
					if( !$tpk_ed_article_top_ad_tablet_portrait ){

						$article_top_class_ad_ed .= ' article-top-disable-tablate-portrait';

					}
					if( !$tpk_ed_article_top_ad_tablet_mobile ){

						$article_top_class_ad_ed .= ' article-top-disable-mobilt';

					}
					if( $tpk_article_top_ad_type == 'adsense' ){

						if( $tpk_article_top_ad_script ){

							$beforecontent .= '<div class="tpk-article-top-ad '.$article_top_class_ad_ed.'">';
							$beforecontent .= '<div class="tpk-article-top-ad-adsense">';
							$beforecontent .= $tpk_article_top_ad_script;
							$beforecontent .= '</div>';
							$beforecontent .= '</div>';

						
						}

					}else{

						if( $tpk_article_top_ad_image ){

							$treget = '';
							if( $tpk_article_top_ad_image_link ){
								$treget = 'target="_blank"'; 
							}
							if( $tpk_article_top_ad_image_link ){ 
								$ad_link = esc_url( $tpk_article_top_ad_image_link);
							}else{
								$ad_link = 'javascript:void(0)';
							}

							$beforecontent .= '<div class="tpk-article-top-ad '.$article_top_class_ad_ed.'">';
							$beforecontent .= '<div class="tpk-article-top-ad-image">';
							$beforecontent .= '<a '.$treget.' href="'.$ad_link.'"><img src="'.esc_url( $tpk_article_top_ad_image ).'" alt="'.esc_html__('Header AD','theme-powerkit').'" title="'.esc_html__('Header AD','theme-powerkit').'"></a>';
							$beforecontent .= '</div>';
							$beforecontent .= '</div>';
						
						
						}

					}
				}
                
                if( $tpk_enable_article_bottom_ad ){

					$tpk_article_bottom_ad_image = isset( $tpk_settings[ 'tpk_article_bottom_ad_image' ] ) ? $tpk_settings[ 'tpk_article_bottom_ad_image' ] : '';
					$tpk_article_bottom_ad_type = isset( $tpk_settings[ 'tpk_article_bottom_ad_type' ] ) ? $tpk_settings[ 'tpk_article_bottom_ad_type' ] : '';
					$tpk_article_bottom_ad_script = isset( $tpk_settings[ 'tpk_article_bottom_ad_script' ] ) ? $tpk_settings[ 'tpk_article_bottom_ad_script' ] : '';
					$tpk_article_bottom_ad_image_link = isset( $tpk_settings[ 'tpk_article_bottom_ad_image_link' ] ) ? $tpk_settings[ 'tpk_article_bottom_ad_image_link' ] : '';
					$tpk_ed_article_bottom_ad_desktop = isset( $tpk_settings[ 'tpk_ed_article_bottom_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_article_bottom_ad_desktop' ] : '';
					$tpk_ed_article_bottom_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_landscape' ] : '1';
					$tpk_ed_article_bottom_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_portrait' ] : '1';
					$tpk_ed_article_bottom_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_mobile' ] : '1';

					$article_bottom_class_ad_ed = '';
					if( !$tpk_ed_article_bottom_ad_desktop ){

						$article_bottom_class_ad_ed .= ' article-top-disable-desktop';

					}
					if( !$tpk_ed_article_bottom_ad_tablet_landscape ){

						$article_bottom_class_ad_ed .= ' article-top-disable-tablate-landscape';

					}
					if( !$tpk_ed_article_bottom_ad_tablet_portrait ){

						$article_bottom_class_ad_ed .= ' article-top-disable-tablate-portrait';

					}
					if( !$tpk_ed_article_bottom_ad_tablet_mobile ){

						$article_bottom_class_ad_ed .= ' article-top-disable-mobilt';

					}

					if( $tpk_article_bottom_ad_type == 'adsense' ){

						if( $tpk_article_bottom_ad_script ){

							$after_content .= '<div class="tpk-article-bottom-ad '.$article_bottom_class_ad_ed.'">';
							$after_content .= '<div class="tpk-article-bottom-ad-adsense">';
							$after_content .= $tpk_article_bottom_ad_script;
							$after_content .= '</div>';
							$after_content .= '</div>';

						
						}

					}else{

						if( $tpk_article_bottom_ad_image ){

							$treget = '';
							if( $tpk_article_bottom_ad_image_link ){
								$treget = 'target="_blank"'; 
							}
							if( $tpk_article_bottom_ad_image_link ){ 
								$ad_link = esc_url( $tpk_article_bottom_ad_image_link);
							}else{
								$ad_link = 'javascript:void(0)';
							}

							$after_content .= '<div class="tpk-article-bottom-ad '.$article_bottom_class_ad_ed.'">';
							$after_content .= '<div class="tpk-article-bottom-ad-image">';
							$after_content .= '<a  href="'.esc_url( $tpk_article_bottom_ad_image_link).'"><img src="'.esc_url( $tpk_article_bottom_ad_image ).'" alt="'.esc_html__('Header AD','theme-powerkit').'" title="'.esc_html__('Header AD','theme-powerkit').'"></a>';
							$after_content .= '</div>';
							$after_content .= '</div>';
						
						
						}

					}
				}

                $all_content .= $beforecontent . $content . $after_content;
                return $all_content;

            } else {
                return $content;
            }
        }


    }

    $GLOBALS[ 'theme_powerkit_global' ] = new Theme_Powerkit_Class();
}