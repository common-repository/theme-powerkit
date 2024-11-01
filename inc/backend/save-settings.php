<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$tpk_settings = array();

$tpk_settings[ 'tpk_enable_author_widget' ]  			= isset( $_POST[ 'tpk_enable_author_widget' ] ) ? sanitize_text_field( $_POST[ 'tpk_enable_author_widget' ] ) : '';

$tpk_settings[ 'tpk_enable_category_widget' ]  			= isset( $_POST[ 'tpk_enable_category_widget' ] ) ? sanitize_text_field( $_POST[ 'tpk_enable_category_widget' ] ) : '';

$tpk_settings[ 'tpk_enable_ad_widget' ]  			= isset( $_POST[ 'tpk_enable_ad_widget' ] ) ? sanitize_text_field( $_POST[ 'tpk_enable_ad_widget' ] ) : '';

$tpk_settings[ 'tpk_enable_recent_post_widget' ]  		= isset( $_POST[ 'tpk_enable_recent_post_widget' ] ) ? sanitize_text_field( $_POST[ 'tpk_enable_recent_post_widget' ] ) : '';

$tpk_settings[ 'tpk_enable_social_widget' ]  			= isset( $_POST[ 'tpk_enable_social_widget' ] ) ? sanitize_text_field( $_POST[ 'tpk_enable_social_widget' ] ) : '';

$tpk_settings[ 'tpk_enable_tab_posts_widget' ]  		= isset( $_POST[ 'tpk_enable_tab_posts_widget' ] ) ? sanitize_text_field( $_POST[ 'tpk_enable_tab_posts_widget' ] ) : '';

$tpk_settings[ 'tpk_google_webmaster_tools' ]  			= isset( $_POST[ 'tpk_google_webmaster_tools' ] ) ? sanitize_text_field( $_POST[ 'tpk_google_webmaster_tools' ] ) : '';

$tpk_settings[ 'tpk_verification_code_bing' ]  			= isset( $_POST[ 'tpk_verification_code_bing' ] ) ? sanitize_text_field( $_POST[ 'tpk_verification_code_bing' ] ) : '';

$tpk_settings[ 'tpk_verification_code_pinterest' ]  	= isset( $_POST[ 'tpk_verification_code_pinterest' ] ) ? sanitize_text_field( $_POST[ 'tpk_verification_code_pinterest' ] ) : '';


$tpk_settings[ 'tpk_verification_code_alexa' ]  		= isset( $_POST[ 'tpk_verification_code_alexa' ] ) ? sanitize_text_field( $_POST[ 'tpk_verification_code_alexa' ] ) : '';

$tpk_settings[ 'tpk_verification_code_yandex' ]  		= isset( $_POST[ 'tpk_verification_code_yandex' ] ) ? sanitize_text_field( $_POST[ 'tpk_verification_code_yandex' ] ) : '';

$tpk_settings[ 'tpk_enable_opengraph' ]  				= isset( $_POST[ 'tpk_enable_opengraph' ] ) ? sanitize_text_field( $_POST[ 'tpk_enable_opengraph' ] ) : '';

$tpk_settings[ 'tpk_open_graph_title' ]  				= isset( $_POST[ 'tpk_open_graph_title' ] ) ? sanitize_text_field( $_POST[ 'tpk_open_graph_title' ] ) : '';

$tpk_settings[ 'tpk_open_graph_desc' ]  				= isset( $_POST[ 'tpk_open_graph_desc' ] ) ? sanitize_text_field( $_POST[ 'tpk_open_graph_desc' ] ) : '';

$tpk_settings[ 'tpk_open_graph_site_name' ]  			= isset( $_POST[ 'tpk_open_graph_site_name' ] ) ? sanitize_text_field( $_POST[ 'tpk_open_graph_site_name' ] ) : '';

$tpk_settings[ 'tpk_open_graph_site_type' ]  			= isset( $_POST[ 'tpk_open_graph_site_type' ] ) ? sanitize_text_field( $_POST[ 'tpk_open_graph_site_type' ] ) : '';

$tpk_settings[ 'tpk_open_graph_url' ]  					= isset( $_POST[ 'tpk_open_graph_url' ] ) ? esc_url_raw( $_POST[ 'tpk_open_graph_url' ] ) : '';


$tpk_settings[ 'tpk_open_graph_locole' ]  				= isset( $_POST[ 'tpk_open_graph_locole' ] ) ? sanitize_text_field( $_POST[ 'tpk_open_graph_locole' ] ) : '';

$tpk_settings[ 'tpk_open_graph_home_image' ]  			= isset( $_POST[ 'tpk_open_graph_home_image' ] ) ? esc_url_raw( $_POST[ 'tpk_open_graph_home_image' ] ) : '';

$tpk_settings[ 'tpk_open_graph_custom_meta' ]  			= isset( $_POST[ 'tpk_open_graph_custom_meta' ] ) ? theme_powerkit_meta_sanitize( $_POST[ 'tpk_open_graph_custom_meta' ] ) : '';

$tpk_settings[ 'tpk_ed_twitter_summary' ]  				= isset( $_POST[ 'tpk_ed_twitter_summary' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_twitter_summary' ] ) : '';

$tpk_settings[ 'tpk_twitter_summary_desc' ]  			= isset( $_POST[ 'tpk_twitter_summary_desc' ] ) ? sanitize_text_field( $_POST[ 'tpk_twitter_summary_desc' ] ) : '';

$tpk_settings[ 'tpk_twitter_summary_title' ]  			= isset( $_POST[ 'tpk_twitter_summary_title' ] ) ? sanitize_text_field( $_POST[ 'tpk_twitter_summary_title' ] ) : '';

$tpk_settings[ 'tpk_twitter_summary_user' ]  			= isset( $_POST[ 'tpk_twitter_summary_user' ] ) ? sanitize_text_field( $_POST[ 'tpk_twitter_summary_user' ] ) : '';

$tpk_settings[ 'tpk_twitter_summary_site_type' ]  		= isset( $_POST[ 'tpk_twitter_summary_site_type' ] ) ? sanitize_text_field( $_POST[ 'tpk_twitter_summary_site_type' ] ) : '';

$tpk_settings[ 'tpk_twitter_summary_home_default_image' ]  		= isset( $_POST[ 'tpk_twitter_summary_home_default_image' ] ) ? esc_url_raw( $_POST[ 'tpk_twitter_summary_home_default_image' ] ) : '';

$tpk_settings[ 'tpk_twitter_summary_custom_meta' ]  		= isset( $_POST[ 'tpk_twitter_summary_custom_meta' ] ) ? stripslashes( theme_powerkit_meta_sanitize( $_POST[ 'tpk_twitter_summary_custom_meta' ] ) ) : '';

$tpk_settings[ 'tpk_header_script' ]  		=  isset( $_POST[ 'tpk_header_script' ] ) ? stripslashes( $_POST[ 'tpk_header_script' ] ) : '';

$tpk_settings[ 'tpk_footer_script' ]  		=  isset( $_POST[ 'tpk_footer_script' ] ) ? stripslashes( $_POST[ 'tpk_footer_script' ] ) : '';

$tpk_settings[ 'tpk_custom_css' ]  		=  isset( $_POST[ 'tpk_custom_css' ] ) ? stripslashes( $_POST[ 'tpk_custom_css' ] ) : '';

$tpk_settings[ 'tpk_enable_post_views' ]  		=  isset( $_POST[ 'tpk_enable_post_views' ] ) ? sanitize_text_field( $_POST[ 'tpk_enable_post_views' ] ) : '';

$tpk_settings[ 'tpk_posted_by' ]  		=  isset( $_POST[ 'tpk_posted_by' ] ) ? sanitize_text_field( $_POST[ 'tpk_posted_by' ] ) : '';

$tpk_settings[ 'tpk_posted_on' ]  		=  isset( $_POST[ 'tpk_posted_on' ] ) ? sanitize_text_field( $_POST[ 'tpk_posted_on' ] ) : '';

$tpk_settings[ 'tpk_enable_header_ad' ]  		=  isset( $_POST[ 'tpk_enable_header_ad' ] ) ? sanitize_text_field( $_POST[ 'tpk_enable_header_ad' ] ) : '';

$tpk_settings[ 'tpk_header_ad_image' ]  			= isset( $_POST[ 'tpk_header_ad_image' ] ) ? esc_url_raw( $_POST[ 'tpk_header_ad_image' ] ) : '';

$tpk_settings[ 'tpk_header_ad_type' ]  			= isset( $_POST[ 'tpk_header_ad_type' ] ) ? sanitize_text_field( $_POST[ 'tpk_header_ad_type' ] ) : '';

$tpk_settings[ 'tpk_header_ad_script' ]  			= isset( $_POST[ 'tpk_header_ad_script' ] ) ? stripslashes( $_POST[ 'tpk_header_ad_script' ] ) : '';

$tpk_settings[ 'tpk_header_ad_image_link' ]  			= isset( $_POST[ 'tpk_header_ad_image_link' ] ) ? esc_url_raw( $_POST[ 'tpk_header_ad_image_link' ] ) : '';

$tpk_settings[ 'tpk_ed_header_ad_desktop' ]  			= isset( $_POST[ 'tpk_ed_header_ad_desktop' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_header_ad_desktop' ] ) : '';

$tpk_settings[ 'tpk_ed_header_ad_tablet_landscape' ]  			= isset( $_POST[ 'tpk_ed_header_ad_tablet_landscape' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_header_ad_tablet_landscape' ] ) : '';

$tpk_settings[ 'tpk_ed_header_ad_tablet_portrait' ]  			= isset( $_POST[ 'tpk_ed_header_ad_tablet_portrait' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_header_ad_tablet_portrait' ] ) : '';

$tpk_settings[ 'tpk_ed_header_ad_tablet_mobile' ]  			= isset( $_POST[ 'tpk_ed_header_ad_tablet_mobile' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_header_ad_tablet_mobile' ] ) : '';

$tpk_settings[ 'tpk_enable_sidebar_ad' ]         =  isset( $_POST[ 'tpk_enable_sidebar_ad' ] ) ? sanitize_text_field( $_POST[ 'tpk_enable_sidebar_ad' ] ) : '';

$tpk_settings[ 'tpk_sidebar_ad_image' ]              = isset( $_POST[ 'tpk_sidebar_ad_image' ] ) ? esc_url_raw( $_POST[ 'tpk_sidebar_ad_image' ] ) : '';

$tpk_settings[ 'tpk_sidebar_ad_type' ]           = isset( $_POST[ 'tpk_sidebar_ad_type' ] ) ? sanitize_text_field( $_POST[ 'tpk_sidebar_ad_type' ] ) : '';

$tpk_settings[ 'tpk_sidebar_ad_script' ]             = isset( $_POST[ 'tpk_sidebar_ad_script' ] ) ? stripslashes ( $_POST[ 'tpk_sidebar_ad_script' ] ) : '';

$tpk_settings[ 'tpk_sidebar_ad_image_link' ]             = isset( $_POST[ 'tpk_sidebar_ad_image_link' ] ) ? esc_url_raw( $_POST[ 'tpk_sidebar_ad_image_link' ] ) : '';

$tpk_settings[ 'tpk_ed_sidebar_ad_desktop' ]             = isset( $_POST[ 'tpk_ed_sidebar_ad_desktop' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_sidebar_ad_desktop' ] ) : '';

$tpk_settings[ 'tpk_ed_sidebar_ad_tablet_landscape' ]            = isset( $_POST[ 'tpk_ed_sidebar_ad_tablet_landscape' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_sidebar_ad_tablet_landscape' ] ) : '';

$tpk_settings[ 'tpk_ed_sidebar_ad_tablet_portrait' ]             = isset( $_POST[ 'tpk_ed_sidebar_ad_tablet_portrait' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_sidebar_ad_tablet_portrait' ] ) : '';

$tpk_settings[ 'tpk_ed_sidebar_ad_tablet_mobile' ]           = isset( $_POST[ 'tpk_ed_sidebar_ad_tablet_mobile' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_sidebar_ad_tablet_mobile' ] ) : '';

$tpk_settings[ 'tpk_enable_article_top_ad' ]         =  isset( $_POST[ 'tpk_enable_article_top_ad' ] ) ? sanitize_text_field( $_POST[ 'tpk_enable_article_top_ad' ] ) : '';

$tpk_settings[ 'tpk_article_top_ad_image' ]              = isset( $_POST[ 'tpk_article_top_ad_image' ] ) ? esc_url_raw( $_POST[ 'tpk_article_top_ad_image' ] ) : '';

$tpk_settings[ 'tpk_article_top_ad_type' ]           = isset( $_POST[ 'tpk_article_top_ad_type' ] ) ? sanitize_text_field( $_POST[ 'tpk_article_top_ad_type' ] ) : '';

$tpk_settings[ 'tpk_article_top_ad_script' ]             = isset( $_POST[ 'tpk_article_top_ad_script' ] ) ? stripslashes( $_POST[ 'tpk_article_top_ad_script' ] ) : '';

$tpk_settings[ 'tpk_article_top_ad_image_link' ]             = isset( $_POST[ 'tpk_article_top_ad_image_link' ] ) ? esc_url_raw( $_POST[ 'tpk_article_top_ad_image_link' ] ) : '';

$tpk_settings[ 'tpk_ed_article_top_ad_desktop' ]             = isset( $_POST[ 'tpk_ed_article_top_ad_desktop' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_article_top_ad_desktop' ] ) : '';

$tpk_settings[ 'tpk_ed_article_top_ad_tablet_landscape' ]            = isset( $_POST[ 'tpk_ed_article_top_ad_tablet_landscape' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_article_top_ad_tablet_landscape' ] ) : '';

$tpk_settings[ 'tpk_ed_article_top_ad_tablet_portrait' ]             = isset( $_POST[ 'tpk_ed_article_top_ad_tablet_portrait' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_article_top_ad_tablet_portrait' ] ) : '';

$tpk_settings[ 'tpk_ed_article_top_ad_tablet_mobile' ]           = isset( $_POST[ 'tpk_ed_article_top_ad_tablet_mobile' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_article_top_ad_tablet_mobile' ] ) : '';

$tpk_settings[ 'tpk_enable_article_bottom_ad' ]         =  isset( $_POST[ 'tpk_enable_article_bottom_ad' ] ) ? sanitize_text_field( $_POST[ 'tpk_enable_article_bottom_ad' ] ) : '';

$tpk_settings[ 'tpk_article_bottom_ad_image' ]              = isset( $_POST[ 'tpk_article_bottom_ad_image' ] ) ? esc_url_raw( $_POST[ 'tpk_article_bottom_ad_image' ] ) : '';

$tpk_settings[ 'tpk_article_bottom_ad_type' ]           = isset( $_POST[ 'tpk_article_bottom_ad_type' ] ) ? sanitize_text_field( $_POST[ 'tpk_article_bottom_ad_type' ] ) : '';

$tpk_settings[ 'tpk_article_bottom_ad_script' ]             = isset( $_POST[ 'tpk_article_bottom_ad_script' ] ) ? stripslashes( $_POST[ 'tpk_article_bottom_ad_script' ] ) : '';

$tpk_settings[ 'tpk_article_bottom_ad_image_link' ]             = isset( $_POST[ 'tpk_article_bottom_ad_image_link' ] ) ? esc_url_raw( $_POST[ 'tpk_article_bottom_ad_image_link' ] ) : '';

$tpk_settings[ 'tpk_ed_article_bottom_ad_desktop' ]             = isset( $_POST[ 'tpk_ed_article_bottom_ad_desktop' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_article_bottom_ad_desktop' ] ) : '';

$tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_landscape' ]            = isset( $_POST[ 'tpk_ed_article_bottom_ad_tablet_landscape' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_article_bottom_ad_tablet_landscape' ] ) : '';

$tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_portrait' ]             = isset( $_POST[ 'tpk_ed_article_bottom_ad_tablet_portrait' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_article_bottom_ad_tablet_portrait' ] ) : '';

$tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_mobile' ]           = isset( $_POST[ 'tpk_ed_article_bottom_ad_tablet_mobile' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_article_bottom_ad_tablet_mobile' ] ) : '';

$tpk_settings[ 'tpk_enable_footer_ad' ]         =  isset( $_POST[ 'tpk_enable_footer_ad' ] ) ? sanitize_text_field( $_POST[ 'tpk_enable_footer_ad' ] ) : '';

$tpk_settings[ 'tpk_footer_ad_image' ]              = isset( $_POST[ 'tpk_footer_ad_image' ] ) ? esc_url_raw( $_POST[ 'tpk_footer_ad_image' ] ) : '';

$tpk_settings[ 'tpk_footer_ad_type' ]           = isset( $_POST[ 'tpk_footer_ad_type' ] ) ? sanitize_text_field( $_POST[ 'tpk_footer_ad_type' ] ) : '';

$tpk_settings[ 'tpk_footer_ad_script' ]             = isset( $_POST[ 'tpk_footer_ad_script' ] ) ? stripslashes( $_POST[ 'tpk_footer_ad_script' ] ) : '';

$tpk_settings[ 'tpk_footer_ad_image_link' ]             = isset( $_POST[ 'tpk_footer_ad_image_link' ] ) ? esc_url_raw( $_POST[ 'tpk_footer_ad_image_link' ] ) : '';

$tpk_settings[ 'tpk_ed_footer_ad_desktop' ]             = isset( $_POST[ 'tpk_ed_footer_ad_desktop' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_footer_ad_desktop' ] ) : '';

$tpk_settings[ 'tpk_ed_footer_ad_tablet_landscape' ]            = isset( $_POST[ 'tpk_ed_footer_ad_tablet_landscape' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_footer_ad_tablet_landscape' ] ) : '';

$tpk_settings[ 'tpk_ed_footer_ad_tablet_portrait' ]             = isset( $_POST[ 'tpk_ed_footer_ad_tablet_portrait' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_footer_ad_tablet_portrait' ] ) : '';

$tpk_settings[ 'tpk_ed_footer_ad_tablet_mobile' ]           = isset( $_POST[ 'tpk_ed_footer_ad_tablet_mobile' ] ) ? sanitize_text_field( $_POST[ 'tpk_ed_footer_ad_tablet_mobile' ] ) : '';


// Update Option.
$status = update_option( 'tpk_options_settings', $tpk_settings );

if ( $status == TRUE ) {
    wp_redirect( admin_url() . 'admin.php?page=theme-powerkit' );
} else {
    wp_redirect( admin_url() . 'admin.php?page=theme-powerkit' );
}
exit;