<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$tpk_settings = get_option( 'tpk_options_settings' );
?>
<div class="tpk-plugin-wrapper">
    <header class="tpk-plugin-header">
        <h1 class="tpk-plugin-title"><?php esc_html_e('Theme Powerkit','theme-powerkit'); ?><span><?php esc_html_e('By ThemeinWP','theme-powerkit'); ?></span></h1>
    </header>
    <div class="tpk-plugin-content">
        <div class="tpk-content-primary">
            <div class="tpk-wraper-options tpk-wraper-options-1 tpk-block-panel">
                <form class="acft-plugin-settings-form" method="post" action="<?php echo esc_url( admin_url() . 'admin-post.php' )?>">
                    <input type="hidden" name="action" value="theme_powerkit_settings_options" />
                    <div class="tpk-section-tab">
                        <ul class="tpk-list-unstyled tpk-nav-tabs-list">
                            <?php
                            $insta_active = false;
                            if( isset( $_GET['access_token'] ) && $_GET['access_token'] ){
                                $insta_active = true;
                            }
                            ?>
                            <li class="tpk-nav-tabs">
                                <a id="tpk-widgets" class="tpk-tab <?php if( !$insta_active ){ ?>tpk-tab-active <?php } ?>" href="javascript:void(0)"><?php esc_html_e('Widgets','theme-powerkit'); ?></a>
                            </li>
                            <li class="tpk-nav-tabs tpk-custom-style">
                                <a id="tpk-webmaster" class="tpk-tab" href="javascript:void(0)"><?php esc_html_e('Webmaster Tools','theme-powerkit'); ?></a>
                            </li>
                            <li class="tpk-nav-tabs">
                                <a id="tpk-opengraph" class="tpk-tab" href="javascript:void(0)"><?php esc_html_e('Open Graph','theme-powerkit'); ?></a>
                            </li>
                            <li class="tpk-nav-tabs">
                                <a id="tpk-twitter" class="tpk-tab" href="javascript:void(0)"><?php esc_html_e('Twitter Summary','theme-powerkit'); ?></a>
                            </li>
                            <li class="tpk-nav-tabs">
                                <a id="tpk-views" class="tpk-tab" href="javascript:void(0)"><?php esc_html_e('Post Views','theme-powerkit'); ?></a>
                            </li>
                            <li class="tpk-nav-tabs">
                                <a id="tpk-ad" class="tpk-tab tpk-header-adsense-script-unactive tpk-sidebar-adsense-script-unactive tpk-article-top-adsense-script-unactive tpk-article-inline-adsense-script-unactive tpk-article-bottom-adsense-script-unactive tpk-footer-adsense-script-unactive" href="javascript:void(0)"><?php esc_html_e('AD Area','theme-powerkit'); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tpk-form-content">
                        <div id="tpk-widgets-content" class="tpk-content <?php if( !$insta_active ){ ?> tpk-content-active <?php } ?>">
                            <div class="tpk-options">
                                <h2 class="tpk-control-title"><?php esc_html_e('Enabling Widgets','theme-powerkit'); ?></h2>
                                <?php
                                $tpk_enable_author_widget = isset( $tpk_settings[ 'tpk_enable_author_widget' ] ) ? $tpk_settings[ 'tpk_enable_author_widget' ] : '1';
                                $tpk_enable_category_widget = isset( $tpk_settings[ 'tpk_enable_category_widget' ] ) ? $tpk_settings[ 'tpk_enable_category_widget' ] : '1';
                                $tpk_enable_ad_widget = isset( $tpk_settings[ 'tpk_enable_ad_widget' ] ) ? $tpk_settings[ 'tpk_enable_ad_widget' ] : '1';
                                $tpk_enable_recent_post_widget = isset( $tpk_settings[ 'tpk_enable_recent_post_widget' ] ) ? $tpk_settings[ 'tpk_enable_recent_post_widget' ] : '1';
                                $tpk_enable_social_widget = isset( $tpk_settings[ 'tpk_enable_social_widget' ] ) ? $tpk_settings[ 'tpk_enable_social_widget' ] : '1';
                                $tpk_enable_tab_posts_widget = isset( $tpk_settings[ 'tpk_enable_tab_posts_widget' ] ) ? $tpk_settings[ 'tpk_enable_tab_posts_widget' ] : '1';
                                ?>
                                <div class="tpk-option-settings">
                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-widget-checkbox" type="checkbox" name="tpk_enable_author_widget" <?php if( $tpk_enable_author_widget ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-widget-checkbox"><?php esc_html_e('Enable TWP: Author Widget','theme-powerkit'); ?></label>
                                    </div>
                                     <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="category-widget-checkbox" type="checkbox" name="tpk_enable_category_widget" <?php if( $tpk_enable_category_widget ){ ?> checked="checked" <?php } ?> />
                                        <label for="category-widget-checkbox"><?php esc_html_e('Enable TWP: Category Widget','theme-powerkit'); ?></label>
                                        
                                    </div>
                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="adbox-widget-checkbox" type="checkbox" name="tpk_enable_ad_widget" <?php if( $tpk_enable_ad_widget ){ ?> checked="checked" <?php } ?> />
                                        <label for="adbox-widget-checkbox"><?php esc_html_e('Enable TWP: AD Box Widget','theme-powerkit'); ?></label>
                                        
                                    </div>
                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="recent-widget-checkbox" type="checkbox" name="tpk_enable_recent_post_widget" <?php if( $tpk_enable_recent_post_widget ){ ?> checked="checked" <?php } ?> />
                                        <label for="recent-widget-checkbox" class="recent-widget-checkbox"><?php esc_html_e('Enable TWP: Recent Post Widget','theme-powerkit'); ?></label>
                                        
                                    </div>
                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="social-widget-checkbox" type="checkbox" name="tpk_enable_social_widget" <?php if( $tpk_enable_social_widget ){ ?> checked="checked" <?php } ?> />
                                        <label for="social-widget-checkbox" class="social-widget-checkbox"><?php esc_html_e('Enable TWP: Social Widget','theme-powerkit'); ?></label>
                                        
                                    </div>
                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="tab-widget-checkbox" type="checkbox" name="tpk_enable_tab_posts_widget" <?php if( $tpk_enable_tab_posts_widget ){ ?> checked="checked" <?php } ?> />
                                        <label for="tab-widget-checkbox" class="tab-widget-checkbox"><?php esc_html_e('Enable TWP: Tab Posts Widget','theme-powerkit'); ?></label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="tpk-options">
                                <h2 class="tpk-control-title"><?php esc_html_e('Display Text','theme-powerkit'); ?></h2>
                                <?php
                                $tpk_posted_by = isset( $tpk_settings[ 'tpk_posted_by' ] ) ? $tpk_settings[ 'tpk_posted_by' ] : '';
                                $tpk_posted_on = isset( $tpk_settings[ 'tpk_posted_on' ] ) ? $tpk_settings[ 'tpk_posted_on' ] : '';
                                
                                ?>
                                <div class="tpk-option-settings">
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Posted By Text','theme-powerkit'); ?></label>
                                        <input type="text" name="tpk_posted_by" value="<?php echo esc_attr($tpk_posted_by); ?>" />
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Posted On Text','theme-powerkit'); ?></label>
                                        <input type="text" name="tpk_posted_on" value="<?php echo esc_attr($tpk_posted_on); ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tpk-webmaster-content" class="tpk-content">
                            <div class="tpk-options">
                                <h2 class="tpk-control-title"><?php esc_html_e('Site Verification','theme-powerkit'); ?></h2>
                                <p><?php esc_html_e('You can use the boxes below to verify with different Webmaster Tools. If your site is already verified, you can skip this section. Enter the verify meta values for:','theme-powerkit'); ?></p>
                                <div class="tpk-option-settings">
                                    <?php 
                                    $tpk_google_webmaster_tools =  isset( $tpk_settings[ 'tpk_google_webmaster_tools' ] ) ? $tpk_settings['tpk_google_webmaster_tools'] : '';
                                    $tpk_verification_code_bing =  isset( $tpk_settings[ 'tpk_verification_code_bing' ] ) ? $tpk_settings['tpk_verification_code_bing'] : '';
                                    $tpk_verification_code_pinterest =  isset( $tpk_settings[ 'tpk_verification_code_pinterest' ] ) ? $tpk_settings['tpk_verification_code_pinterest'] : '';
                                    $tpk_verification_code_alexa =  isset( $tpk_settings[ 'tpk_verification_code_alexa' ] ) ? $tpk_settings['tpk_verification_code_alexa'] : '';
                                    $tpk_verification_code_yandex =  isset( $tpk_settings[ 'tpk_verification_code_yandex' ] ) ? $tpk_settings['tpk_verification_code_yandex'] : '';
                                    ?>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Google Webmaster Tools','theme-powerkit'); ?></label>
                                        <input type="text" name="tpk_google_webmaster_tools" value="<?php echo esc_attr($tpk_google_webmaster_tools); ?>" />
                                        
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Bing Webmaster Tools','theme-powerkit'); ?></label>
                                        <input type="text" name="tpk_verification_code_bing" value="<?php echo esc_attr($tpk_verification_code_bing); ?>" />
                                        
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Pinterest Site Verification','theme-powerkit'); ?></label>
                                        <input type="text" name="tpk_verification_code_pinterest" value="<?php echo esc_attr($tpk_verification_code_pinterest); ?>" />
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Alexa Verification ID','theme-powerkit'); ?></label>
                                        <input type="text" name="tpk_verification_code_alexa" value="<?php echo esc_attr($tpk_verification_code_alexa); ?>" />
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Yandex Webmaster Tools','theme-powerkit'); ?></label>
                                        <input type="text" name="tpk_verification_code_yandex" value="<?php echo esc_attr($tpk_verification_code_yandex); ?>" />
                                    </div>
                                </div>
                                <div class="tpk-options">
                                    <?php
                                    $tpk_header_script =  isset( $tpk_settings[ 'tpk_header_script' ] ) ? $tpk_settings['tpk_header_script'] : '';
                                     $tpk_footer_script =  isset( $tpk_settings[ 'tpk_footer_script' ] ) ? $tpk_settings['tpk_footer_script'] : '';
                                    ?>
                                    <h2 class="tpk-control-title"><?php esc_html_e('Additional Scripts','theme-powerkit'); ?></h2>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Custom Header Script','theme-powerkit'); ?></label>
                                        <textarea id="tpk-header-script" name="tpk_header_script" rows="4" cols="50"><?php echo $tpk_header_script; ?></textarea>
                                        
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Custom Footer Script','theme-powerkit'); ?></label>
                                        <textarea id="tpk-footer-script" name="tpk_footer_script" rows="4" cols="50"><?php echo $tpk_footer_script; ?></textarea>
                                        
                                    </div>
                                </div>
                                <div class="tpk-options">
                                    <?php
                                     $tpk_custom_css =  isset( $tpk_settings[ 'tpk_custom_css' ] ) ? $tpk_settings['tpk_custom_css'] : '';
                                    ?>
                                    <h2 class="tpk-control-title"><?php esc_html_e('Additional CSS','theme-powerkit'); ?></h2>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Add your own CSS code here to customize the appearance and layout of the plugin.','theme-powerkit'); ?></label>
                                        <textarea id="tpk-custom-css" name="tpk_custom_css" rows="4" cols="50"><?php echo $tpk_custom_css; ?></textarea>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tpk-opengraph-content" class="tpk-content">
                            <div class="tpk-options">
                                <h2 class="tpk-control-title"><?php esc_html_e('Open Graph Settings','theme-powerkit'); ?></h2>
                                <div class="tpk-option-settings">
                                    <?php 
                                    $tpk_enable_opengraph =  isset( $tpk_settings[ 'tpk_enable_opengraph' ] ) ? $tpk_settings['tpk_enable_opengraph'] : '1';
                                    $tpk_open_graph_title =  isset( $tpk_settings[ 'tpk_open_graph_title' ] ) ? $tpk_settings['tpk_open_graph_title'] : get_bloginfo('name');
                                    $tpk_open_graph_desc =  isset( $tpk_settings[ 'tpk_open_graph_desc' ] ) ? $tpk_settings['tpk_open_graph_desc'] : get_bloginfo('description');
                                    $tpk_open_graph_site_name =  isset( $tpk_settings[ 'tpk_open_graph_site_name' ] ) ? $tpk_settings['tpk_open_graph_site_name'] : get_bloginfo('description');
                                    $tpk_open_graph_site_type =  isset( $tpk_settings[ 'tpk_open_graph_site_type' ] ) ? $tpk_settings['tpk_open_graph_site_type'] : '';
                                    $tpk_open_graph_url =  isset( $tpk_settings[ 'tpk_open_graph_url' ] ) ? $tpk_settings['tpk_open_graph_url'] : home_url();
                                    $tpk_open_graph_locole =  isset( $tpk_settings[ 'tpk_open_graph_locole' ] ) ? $tpk_settings['tpk_open_graph_locole'] : 'en_US';
                                    $tpk_open_graph_home_image =  isset( $tpk_settings[ 'tpk_open_graph_home_image' ] ) ? $tpk_settings['tpk_open_graph_home_image'] : '';
                                    $tpk_open_graph_custom_meta =  isset( $tpk_settings[ 'tpk_open_graph_custom_meta' ] ) ? $tpk_settings['tpk_open_graph_custom_meta'] : '';
                                    $site_type = array(
                                                '' => esc_html__('--select--','theme-powerkit'),
                                                'website' => esc_html__('Website','theme-powerkit'),
                                                'video.episode' => esc_html__('video.episode','theme-powerkit'),
                                                'music.radio_station' => esc_html__('music.radio_station','theme-powerkit'),
                                                'music.song' => esc_html__('music.song','theme-powerkit'),
                                                'music.playlist' => esc_html__('music.playlist','theme-powerkit'),
                                                'video.movie' => esc_html__('video.movie','theme-powerkit'),
                                                'music.album' => esc_html__('music.album','theme-powerkit'),
                                                'video.tv_show' => esc_html__('video.tv_show','theme-powerkit'),
                                                'article' => esc_html__('Article','theme-powerkit'),
                                                'video.other' => esc_html__('video.other','theme-powerkit'),
                                                'profile' => esc_html__('Profile','theme-powerkit'),
                                                'book' => esc_html__('Book','theme-powerkit'),
                                            );
                                    ?>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt tpk-opt-switch">
                                        <label><?php esc_html_e('Enable Open Graph','theme-powerkit'); ?></label>
                                        <input id="power-opengraph-checkbox" type="checkbox" name="tpk_enable_opengraph" <?php if( $tpk_enable_opengraph  ){ ?> checked="checked" <?php } ?> />
                                        <label for="power-opengraph-checkbox" class="tpk-checkbox-label"></label>
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Title','theme-powerkit'); ?></label>
                                        <input type="text" name="tpk_open_graph_title" value="<?php echo esc_attr($tpk_open_graph_title); ?>" />
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Description','theme-powerkit'); ?></label>
                                        <input type="text" name="tpk_open_graph_desc" value="<?php echo esc_attr($tpk_open_graph_desc); ?>" />
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Sitename','theme-powerkit'); ?></label>
                                        <input type="text" name="tpk_open_graph_site_name" value="<?php echo esc_attr($tpk_open_graph_site_name); ?>" />
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Type','theme-powerkit'); ?></label>
                                        <select name="tpk_open_graph_site_type">
                                            <?php
                                            foreach( $site_type as $key => $value ){
                                                ?>
                                                <option <?php if( $tpk_open_graph_site_type == $key ){ ?> selected <?php } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('URL','theme-powerkit'); ?></label>
                                        <input type="text" name="tpk_open_graph_url" value="<?php echo esc_url($tpk_open_graph_url); ?>" />
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Locale','theme-powerkit'); ?></label>
                                        <input type="text" name="tpk_open_graph_locole" value="<?php echo esc_attr($tpk_open_graph_locole); ?>" />
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Default Open Graph Image.','theme-powerkit'); ?></label>
                                        <?php
                                        $image = '';
                                        if( $tpk_open_graph_home_image ){
                                            $image = '<img src="' . esc_url( $tpk_open_graph_home_image ) . '"/>';
                                        } ?>
                                        <div class="tpk-img-fields-wrap">
                                            <div class="attachment-media-view">
                                                <div class="tpk-img-fields-wrap">
                                                    <div class="tpk-attachment-media-view">
                                                        <div class="tpk-attachment-child tpk-uploader">
                                                            <button type="button" class="tpk-img-upload-button">
                                                                <span class="dashicons dashicons-upload tpk-icon tpk-icon-large"></span>
                                                            </button>
                                                            <input class="upload-id" name="tpk_open_graph_home_image" type="hidden" value="<?php echo esc_url($tpk_open_graph_home_image); ?>"/>
                                                        </div>
                                                        <div class="tpk-attachment-child tpk-thumbnail-image">
                                                            <button type="button" class="tpk-img-delete-button <?php if( $tpk_open_graph_home_image ){ echo 'tpk-img-show'; } ?>">
                                                                <span class="dashicons dashicons-no-alt tpk-icon"></span>
                                                            </button>
                                                            <div class="tpk-img-container">
                                                                <?php echo $image; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                
                                    </div>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Custom Meta','theme-powerkit'); ?></label>
                                        <textarea name="tpk_open_graph_custom_meta" rows="4" cols="50"><?php echo theme_powerkit_meta_sanitize($tpk_open_graph_custom_meta); ?></textarea>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tpk-twitter-content" class="tpk-content">
                            <div class="tpk-options">
                                <h2 class="tpk-control-title"><?php esc_html_e('Twitter Summary Settings','theme-powerkit'); ?></h2>
                                <div class="tpk-option-settings">
                                    <?php 
                                    $tpk_ed_twitter_summary =  isset( $tpk_settings[ 'tpk_ed_twitter_summary' ] ) ? $tpk_settings['tpk_ed_twitter_summary'] : '1';
                                    $tpk_twitter_summary_title =  isset( $tpk_settings[ 'tpk_twitter_summary_title' ] ) ? $tpk_settings['tpk_twitter_summary_title'] : get_bloginfo('name');
                                    $tpk_twitter_summary_desc =  isset( $tpk_settings[ 'tpk_twitter_summary_desc' ] ) ? $tpk_settings['tpk_twitter_summary_desc'] : get_bloginfo('description');
                                    $tpk_twitter_summary_user =  isset( $tpk_settings[ 'tpk_twitter_summary_user' ] ) ? $tpk_settings['tpk_twitter_summary_user'] : '';
                                    $tpk_twitter_summary_site_type =  isset( $tpk_settings[ 'tpk_twitter_summary_site_type' ] ) ? $tpk_settings['tpk_twitter_summary_site_type'] : '';
                                    $tpk_twitter_summary_home_default_image =  isset( $tpk_settings[ 'tpk_twitter_summary_home_default_image' ] ) ? $tpk_settings['tpk_twitter_summary_home_default_image'] : '';
                                    $tpk_twitter_summary_custom_meta =  isset( $tpk_settings[ 'tpk_twitter_summary_custom_meta' ] ) ? $tpk_settings['tpk_twitter_summary_custom_meta'] : '';
                                    $tpk_twitter_summary_site_type_list = array(
                                            '' => esc_html__('--select--','theme-powerkit'),
                                            'summary' => esc_html__('summary','theme-powerkit'),
                                            'summary_large_image' => esc_html__('Summary Large Image','theme-powerkit'),
                                            'app' => esc_html__('APP','theme-powerkit'),
                                            'player' => esc_html__('Player','theme-powerkit'),
                                            'lead_generation' => esc_html__('Lead Generation','theme-powerkit'),
                                            
                                        );
                                    ?>
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt tpk-opt-switch">
                                        <label><?php esc_html_e('Enable Twitter Summary','theme-powerkit'); ?></label>
                                        <input id="power-twitter-checkbox" type="checkbox" name="tpk_ed_twitter_summary" <?php if( !empty( $tpk_settings[ 'tpk_ed_twitter_summary' ] ) ){ ?> checked="checked" <?php } ?> />
                                        <label for="power-twitter-checkbox" class="tpk-checkbox-label"></label>
                                    </div>
                                </div>
                                <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                    <label><?php esc_html_e('Title','theme-powerkit'); ?></label>
                                    <input type="text" name="tpk_twitter_summary_title" value="<?php echo esc_attr($tpk_twitter_summary_title); ?>" />
                                </div>
                                <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                    <label><?php esc_html_e('Description','theme-powerkit'); ?></label>
                                    <input type="text" name="tpk_twitter_summary_desc" value="<?php echo esc_attr($tpk_twitter_summary_desc); ?>" />
                                </div>
                                <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                    <label><?php esc_html_e('Username','theme-powerkit'); ?></label>
                                    <input type="text" name="tpk_twitter_summary_user" value="<?php echo esc_attr($tpk_twitter_summary_user); ?>" />
                                </div>
                                <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                    <label><?php esc_html_e('Type','theme-powerkit'); ?></label>
                                    <select name="tpk_twitter_summary_site_type">
                                        <?php
                                        foreach( $tpk_twitter_summary_site_type_list as $key => $value ){
                                            ?>
                                            <option <?php if( $tpk_twitter_summary_site_type == $key ){ ?> selected <?php } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                    <label><?php esc_html_e('Default Twitter Summary Image.','theme-powerkit'); ?></label>
                                    <?php 
                                    $image = "";
                                    if( $tpk_twitter_summary_home_default_image ){
                                        $image = '<img src="' . esc_url( $tpk_twitter_summary_home_default_image ) . '"/>';
                                    } ?>
                                    <div class="tpk-img-fields-wrap">
                                        <div class="attachment-media-view">
                                            <div class="tpk-img-fields-wrap">
                                                <div class="tpk-attachment-media-view">
                                                    <div class="tpk-attachment-child tpk-uploader">
                                                        <button type="button" class="tpk-img-upload-button">
                                                            <span class="dashicons dashicons-upload tpk-icon tpk-icon-large"></span>
                                                        </button>
                                                        <input class="upload-id" name="tpk_twitter_summary_home_default_image" type="hidden" value="<?php echo esc_url($tpk_twitter_summary_home_default_image); ?>"/>
                                                    </div>
                                                    <div class="tpk-attachment-child tpk-thumbnail-image">
                                                        <button type="button" class="tpk-img-delete-button <?php if( $tpk_twitter_summary_home_default_image ){ echo 'tpk-img-show'; } ?>">
                                                            <span class="dashicons dashicons-no-alt tpk-icon"></span>
                                                        </button>
                                                        <div class="tpk-img-container">
                                                            <?php echo $image; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            
                                </div>
                                <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                    <label><?php esc_html_e('Custom Meta','theme-powerkit'); ?></label>
                                    <textarea name="tpk_twitter_summary_custom_meta" rows="4" cols="50"><?php echo theme_powerkit_meta_sanitize( $tpk_twitter_summary_custom_meta ); ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div id="tpk-views-content" class="tpk-content">
                            <div class="tpk-options">
                                <h2 class="tpk-control-title"><?php esc_html_e('Display Setting','theme-powerkit'); ?></h2>
                                <?php
                                $tpk_enable_post_views = isset( $tpk_settings[ 'tpk_enable_post_views' ] ) ? $tpk_settings[ 'tpk_enable_post_views' ] : '';
                                ?>
                                <div class="tpk-option-settings">
                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt tpk-opt-switch">
                                        <label><?php esc_html_e('Enable Post Views','theme-powerkit'); ?></label>
                                        <input id="power-views-checkbox" type="checkbox" name="tpk_enable_post_views" <?php if( $tpk_enable_post_views ){ ?> checked="checked" <?php } ?> />
                                        <label for="power-views-checkbox" class="tpk-checkbox-label"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="tpk-options">
                                <h2 class="tpk-control-title"><?php esc_html_e('How To Use','theme-powerkit'); ?></h2>
                                <div class="tpk-option-settings">
                                    <label>
                                        <?php esc_html_e("Please add ",'theme-powerkit'); ?>
                                        <code> echo do_shortcode('[tpk-track-visit]');</code>
                                        <?php esc_html_e("shortcode on single post under WP_Query loop for tracking visits and",'theme-powerkit'); ?>
                                        <code> echo do_shortcode('[tpk-visit-count]');</code>
                                        <?php esc_html_e("is to show count of vists.",'theme-powerkit'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>









                        <div id="tpk-ad-content" class="tpk-content">
                            
                            <div class="tpk-options">
                                <h2 class="tpk-control-title"><?php esc_html_e('Header AD','theme-powerkit'); ?></h2>
                                <?php
                                $tpk_enable_header_ad = isset( $tpk_settings[ 'tpk_enable_header_ad' ] ) ? $tpk_settings[ 'tpk_enable_header_ad' ] : '';
                                $tpk_header_ad_image = isset( $tpk_settings[ 'tpk_header_ad_image' ] ) ? $tpk_settings[ 'tpk_header_ad_image' ] : '';
                                $tpk_header_ad_type = isset( $tpk_settings[ 'tpk_header_ad_type' ] ) ? $tpk_settings[ 'tpk_header_ad_type' ] : 'image';
                                $tpk_header_ad_script = isset( $tpk_settings[ 'tpk_header_ad_script' ] ) ? $tpk_settings[ 'tpk_header_ad_script' ] : '';
                                $tpk_header_ad_image_link = isset( $tpk_settings[ 'tpk_header_ad_image_link' ] ) ? $tpk_settings[ 'tpk_header_ad_image_link' ] : '';
                                $tpk_ed_header_ad_desktop = isset( $tpk_settings[ 'tpk_ed_header_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_header_ad_desktop' ] : '1';
                                $tpk_ed_header_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_header_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_header_ad_tablet_landscape' ] : '1';
                                $tpk_ed_header_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_header_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_header_ad_tablet_portrait' ] : '1';
                                $tpk_ed_header_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_header_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_header_ad_tablet_mobile' ] : '1';
                                ?>
                                <div class="tpk-option-settings">
                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-ad-checkbox" type="checkbox" name="tpk_enable_header_ad" <?php if( $tpk_enable_header_ad ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-ad-checkbox"><?php esc_html_e('Enable TWP: Header AD','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Header AD Type','theme-powerkit'); ?></label>
                                        <select class="tpk-header-ad-type-select" name="tpk_header_ad_type">
                                            
                                            <option <?php if( $tpk_header_ad_type == 'image' ){ ?> selected <?php } ?> value="image"><?php echo esc_html( 'Image','theme-powerkit' ); ?></option>
                                            <option <?php if( $tpk_header_ad_type == 'adsense' ){ ?> selected <?php } ?> value="adsense"><?php echo esc_html( 'AdSense','theme-powerkit' ); ?></option>

                                                
                                        </select>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">

                                        <div class="tpk-header-ad-type-opt <?php if( $tpk_header_ad_type == 'image' ){ ?> tpk-header-ad-type-active <?php } ?> tpk-header-ad-type-image">

                                            <label><?php esc_html_e('Header AD Image.','theme-powerkit'); ?></label>
                                            <?php
                                            $image = '';
                                            if( $tpk_header_ad_image ){
                                                $image = '<img src="' . esc_url( $tpk_header_ad_image ) . '"/>';
                                            } ?>
                                            <div class="tpk-img-fields-wrap">
                                                <div class="attachment-media-view">
                                                    <div class="tpk-img-fields-wrap">
                                                        <div class="tpk-attachment-media-view">
                                                            <div class="tpk-attachment-child tpk-uploader">
                                                                <button type="button" class="tpk-img-upload-button">
                                                                    <span class="dashicons dashicons-upload tpk-icon tpk-icon-large"></span>
                                                                </button>
                                                                <input class="upload-id" name="tpk_header_ad_image" type="hidden" value="<?php echo esc_url($tpk_header_ad_image); ?>"/>
                                                            </div>
                                                            <div class="tpk-attachment-child tpk-thumbnail-image">
                                                                <button type="button" class="tpk-img-delete-button <?php if( $tpk_header_ad_image ){ echo 'tpk-img-show'; } ?>">
                                                                    <span class="dashicons dashicons-no-alt tpk-icon"></span>
                                                                </button>
                                                                <div class="tpk-img-container">
                                                                    <?php echo $image; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tpk-header-ad-type-opt <?php if( $tpk_header_ad_type == 'image' ){ ?> tpk-header-ad-type-active <?php } ?> tpk-header-ad-type-image">
                                            <label><?php esc_html_e('Image Link','theme-powerkit'); ?></label>
                                            <input type="text" name="tpk_header_ad_image_link" value="<?php echo esc_attr($tpk_header_ad_image_link); ?>" />
                                        </div>

                                        <div class="tpk-header-ad-type-opt <?php if( $tpk_header_ad_type == 'adsense' ){ ?> tpk-header-ad-type-active <?php } ?> tpk-header-ad-type-adsense">

                                           <label><?php esc_html_e('Header AdSense Script.','theme-powerkit'); ?></label>
                                        
                                            <textarea id="tpk-header-adsense-script" name="tpk_header_ad_script"><?php echo $tpk_header_ad_script; ?></textarea>

                                        </div>
                                                
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-header-ad-desktop" type="checkbox" name="tpk_ed_header_ad_desktop" <?php if( $tpk_ed_header_ad_desktop ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-header-ad-desktop"><?php esc_html_e('Enable Header AD On Desktop','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-header-ad-landscape" type="checkbox" name="tpk_ed_header_ad_tablet_landscape" <?php if( $tpk_ed_header_ad_tablet_landscape ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-header-ad-landscape"><?php esc_html_e('Enable Header AD On Landscape','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-header-ad-portrait" type="checkbox" name="tpk_ed_header_ad_tablet_portrait" <?php if( $tpk_ed_header_ad_tablet_portrait ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-header-ad-portrait"><?php esc_html_e('Enable Header AD On Portrait','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-header-ad-mobile" type="checkbox" name="tpk_ed_header_ad_tablet_mobile" <?php if( $tpk_ed_header_ad_tablet_mobile ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-header-ad-mobile"><?php esc_html_e('Enable Header AD On Mobile','theme-powerkit'); ?></label>
                                    </div>

                                </div>


                            </div>

                            <div class="tpk-options">
                                <h2 class="tpk-control-title"><?php esc_html_e('Sidebar AD','theme-powerkit'); ?></h2>
                                <?php
                                $tpk_enable_sidebar_ad = isset( $tpk_settings[ 'tpk_enable_sidebar_ad' ] ) ? $tpk_settings[ 'tpk_enable_sidebar_ad' ] : '';
                                $tpk_sidebar_ad_image = isset( $tpk_settings[ 'tpk_sidebar_ad_image' ] ) ? $tpk_settings[ 'tpk_sidebar_ad_image' ] : '';
                                $tpk_sidebar_ad_type = isset( $tpk_settings[ 'tpk_sidebar_ad_type' ] ) ? $tpk_settings[ 'tpk_sidebar_ad_type' ] : 'image';
                                $tpk_sidebar_ad_script = isset( $tpk_settings[ 'tpk_sidebar_ad_script' ] ) ? $tpk_settings[ 'tpk_sidebar_ad_script' ] : '';
                                $tpk_sidebar_ad_image_link = isset( $tpk_settings[ 'tpk_sidebar_ad_image_link' ] ) ? $tpk_settings[ 'tpk_sidebar_ad_image_link' ] : '';
                                $tpk_ed_sidebar_ad_desktop = isset( $tpk_settings[ 'tpk_ed_sidebar_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_sidebar_ad_desktop' ] : '1';
                                $tpk_ed_sidebar_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_sidebar_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_sidebar_ad_tablet_landscape' ] : '1';
                                $tpk_ed_sidebar_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_sidebar_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_sidebar_ad_tablet_portrait' ] : '1';
                                $tpk_ed_sidebar_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_sidebar_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_sidebar_ad_tablet_mobile' ] : '1';
                                ?>
                                <div class="tpk-option-settings">
                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-sidebar-ed-ad-checkbox" type="checkbox" name="tpk_enable_sidebar_ad" <?php if( $tpk_enable_sidebar_ad ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-sidebar-ed-ad-checkbox"><?php esc_html_e('Enable TWP: Sidebar AD','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Sidebar AD Type','theme-powerkit'); ?></label>
                                        <select class="tpk-sidebar-ad-type-select" name="tpk_sidebar_ad_type">
                                            
                                            <option <?php if( $tpk_sidebar_ad_type == 'image' ){ ?> selected <?php } ?> value="image"><?php echo esc_html( 'Image','theme-powerkit' ); ?></option>
                                            <option <?php if( $tpk_sidebar_ad_type == 'adsense' ){ ?> selected <?php } ?> value="adsense"><?php echo esc_html( 'AdSense','theme-powerkit' ); ?></option>

                                                
                                        </select>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">

                                        <div class="tpk-sidebar-ad-type-opt <?php if( $tpk_sidebar_ad_type == 'image' ){ ?> tpk-sidebar-ad-type-active <?php } ?> tpk-sidebar-ad-type-image">

                                            <label><?php esc_html_e('Sidebar AD Image.','theme-powerkit'); ?></label>
                                            <?php
                                            $image = '';
                                            if( $tpk_sidebar_ad_image ){
                                                $image = '<img src="' . esc_url( $tpk_sidebar_ad_image ) . '"/>';
                                            } ?>
                                            <div class="tpk-img-fields-wrap">
                                                <div class="attachment-media-view">
                                                    <div class="tpk-img-fields-wrap">
                                                        <div class="tpk-attachment-media-view">
                                                            <div class="tpk-attachment-child tpk-uploader">
                                                                <button type="button" class="tpk-img-upload-button">
                                                                    <span class="dashicons dashicons-upload tpk-icon tpk-icon-large"></span>
                                                                </button>
                                                                <input class="upload-id" name="tpk_sidebar_ad_image" type="hidden" value="<?php echo esc_url($tpk_sidebar_ad_image); ?>"/>
                                                            </div>
                                                            <div class="tpk-attachment-child tpk-thumbnail-image">
                                                                <button type="button" class="tpk-img-delete-button <?php if( $tpk_sidebar_ad_image ){ echo 'tpk-img-show'; } ?>">
                                                                    <span class="dashicons dashicons-no-alt tpk-icon"></span>
                                                                </button>
                                                                <div class="tpk-img-container">
                                                                    <?php echo $image; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tpk-sidebar-ad-type-opt <?php if( $tpk_sidebar_ad_type == 'image' ){ ?> tpk-sidebar-ad-type-active <?php } ?> tpk-sidebar-ad-type-image">
                                            <label><?php esc_html_e('Image Link','theme-powerkit'); ?></label>
                                            <input type="text" name="tpk_sidebar_ad_image_link" value="<?php echo esc_attr($tpk_sidebar_ad_image_link); ?>" />
                                        </div>

                                        <div class="tpk-sidebar-ad-type-opt <?php if( $tpk_sidebar_ad_type == 'adsense' ){ ?> tpk-sidebar-ad-type-active <?php } ?> tpk-sidebar-ad-type-adsense">

                                           <label><?php esc_html_e('Sidebar AdSense Script.','theme-powerkit'); ?></label>
                                        
                                            <textarea id="tpk-sidebar-adsense-script" name="tpk_sidebar_ad_script"><?php echo $tpk_sidebar_ad_script; ?></textarea>

                                        </div>
                                                
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-sidebar-ad-desktop" type="checkbox" name="tpk_ed_sidebar_ad_desktop" <?php if( $tpk_ed_sidebar_ad_desktop ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-sidebar-ad-desktop"><?php esc_html_e('Enable Sidebar AD On Desktop','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-sidebar-ad-landscape" type="checkbox" name="tpk_ed_sidebar_ad_tablet_landscape" <?php if( $tpk_ed_sidebar_ad_tablet_landscape ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-sidebar-ad-landscape"><?php esc_html_e('Enable Sidebar AD On Landscape','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-sidebar-ad-portrait" type="checkbox" name="tpk_ed_sidebar_ad_tablet_portrait" <?php if( $tpk_ed_sidebar_ad_tablet_portrait ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-sidebar-ad-portrait"><?php esc_html_e('Enable Sidebar AD On Portrait','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-sidebar-ad-mobile" type="checkbox" name="tpk_ed_sidebar_ad_tablet_mobile" <?php if( $tpk_ed_sidebar_ad_tablet_mobile ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-sidebar-ad-mobile"><?php esc_html_e('Enable Sidebar AD On Mobile','theme-powerkit'); ?></label>
                                    </div>

                                </div>
                            </div>

                            <div class="tpk-options">
                                <h2 class="tpk-control-title"><?php esc_html_e('Article Top AD','theme-powerkit'); ?></h2>
                                <?php
                                $tpk_enable_article_top_ad = isset( $tpk_settings[ 'tpk_enable_article_top_ad' ] ) ? $tpk_settings[ 'tpk_enable_article_top_ad' ] : '';
                                $tpk_article_top_ad_image = isset( $tpk_settings[ 'tpk_article_top_ad_image' ] ) ? $tpk_settings[ 'tpk_article_top_ad_image' ] : '';
                                $tpk_article_top_ad_type = isset( $tpk_settings[ 'tpk_article_top_ad_type' ] ) ? $tpk_settings[ 'tpk_article_top_ad_type' ] : 'image';
                                $tpk_article_top_ad_script = isset( $tpk_settings[ 'tpk_article_top_ad_script' ] ) ? $tpk_settings[ 'tpk_article_top_ad_script' ] : '';
                                $tpk_article_top_ad_image_link = isset( $tpk_settings[ 'tpk_article_top_ad_image_link' ] ) ? $tpk_settings[ 'tpk_article_top_ad_image_link' ] : '';
                                $tpk_ed_article_top_ad_desktop = isset( $tpk_settings[ 'tpk_ed_article_top_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_article_top_ad_desktop' ] : '1';
                                $tpk_ed_article_top_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_article_top_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_article_top_ad_tablet_landscape' ] : '1';
                                $tpk_ed_article_top_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_article_top_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_article_top_ad_tablet_portrait' ] : '1';
                                $tpk_ed_article_top_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_article_top_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_article_top_ad_tablet_mobile' ] : '1';
                                ?>
                                <div class="tpk-option-settings">
                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-article-top-ed-ad-checkbox" type="checkbox" name="tpk_enable_article_top_ad" <?php if( $tpk_enable_article_top_ad ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-article-top-ed-ad-checkbox"><?php esc_html_e('Enable TWP: Sidebar AD','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Sidebar AD Type','theme-powerkit'); ?></label>
                                        <select class="tpk-article-top-ad-type-select" name="tpk_article_top_ad_type">
                                            
                                            <option <?php if( $tpk_article_top_ad_type == 'image' ){ ?> selected <?php } ?> value="image"><?php echo esc_html( 'Image','theme-powerkit' ); ?></option>
                                            <option <?php if( $tpk_article_top_ad_type == 'adsense' ){ ?> selected <?php } ?> value="adsense"><?php echo esc_html( 'AdSense','theme-powerkit' ); ?></option>

                                                
                                        </select>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">

                                        <div class="tpk-article-top-ad-type-opt <?php if( $tpk_article_top_ad_type == 'image' ){ ?> tpk-article-top-ad-type-active <?php } ?> tpk-article-top-ad-type-image">

                                            <label><?php esc_html_e('Sidebar AD Image.','theme-powerkit'); ?></label>
                                            <?php
                                            $image = '';
                                            if( $tpk_article_top_ad_image ){
                                                $image = '<img src="' . esc_url( $tpk_article_top_ad_image ) . '"/>';
                                            } ?>
                                            <div class="tpk-img-fields-wrap">
                                                <div class="attachment-media-view">
                                                    <div class="tpk-img-fields-wrap">
                                                        <div class="tpk-attachment-media-view">
                                                            <div class="tpk-attachment-child tpk-uploader">
                                                                <button type="button" class="tpk-img-upload-button">
                                                                    <span class="dashicons dashicons-upload tpk-icon tpk-icon-large"></span>
                                                                </button>
                                                                <input class="upload-id" name="tpk_article_top_ad_image" type="hidden" value="<?php echo esc_url($tpk_article_top_ad_image); ?>"/>
                                                            </div>
                                                            <div class="tpk-attachment-child tpk-thumbnail-image">
                                                                <button type="button" class="tpk-img-delete-button <?php if( $tpk_article_top_ad_image ){ echo 'tpk-img-show'; } ?>">
                                                                    <span class="dashicons dashicons-no-alt tpk-icon"></span>
                                                                </button>
                                                                <div class="tpk-img-container">
                                                                    <?php echo $image; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tpk-article-top-ad-type-opt <?php if( $tpk_article_top_ad_type == 'image' ){ ?> tpk-article-top-ad-type-active <?php } ?> tpk-article-top-ad-type-image">
                                            <label><?php esc_html_e('Image Link','theme-powerkit'); ?></label>
                                            <input type="text" name="tpk_article_top_ad_image_link" value="<?php echo esc_attr($tpk_article_top_ad_image_link); ?>" />
                                        </div>

                                        <div class="tpk-article-top-ad-type-opt <?php if( $tpk_article_top_ad_type == 'adsense' ){ ?> tpk-article-top-ad-type-active <?php } ?> tpk-article-top-ad-type-adsense">

                                           <label><?php esc_html_e('Sidebar AdSense Script.','theme-powerkit'); ?></label>
                                        
                                            <textarea id="tpk-article-top-adsense-script" name="tpk_article_top_ad_script"><?php echo $tpk_article_top_ad_script; ?></textarea>

                                        </div>
                                                
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-article-top-ad-desktop" type="checkbox" name="tpk_ed_article_top_ad_desktop" <?php if( $tpk_ed_article_top_ad_desktop ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-article-top-ad-desktop"><?php esc_html_e('Enable Sidebar AD On Desktop','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-article-top-ad-landscape" type="checkbox" name="tpk_ed_article_top_ad_tablet_landscape" <?php if( $tpk_ed_article_top_ad_tablet_landscape ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-article-top-ad-landscape"><?php esc_html_e('Enable Sidebar AD On Landscape','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-article-top-ad-portrait" type="checkbox" name="tpk_ed_article_top_ad_tablet_portrait" <?php if( $tpk_ed_article_top_ad_tablet_portrait ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-article-top-ad-portrait"><?php esc_html_e('Enable Sidebar AD On Portrait','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-article-top-ad-mobile" type="checkbox" name="tpk_ed_article_top_ad_tablet_mobile" <?php if( $tpk_ed_article_top_ad_tablet_mobile ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-article-top-ad-mobile"><?php esc_html_e('Enable Sidebar AD On Mobile','theme-powerkit'); ?></label>
                                    </div>

                                </div>
                            </div>

                            <div class="tpk-options">
                                <h2 class="tpk-control-title"><?php esc_html_e('Article Bottom AD','theme-powerkit'); ?></h2>
                                <?php
                                $tpk_enable_article_bottom_ad = isset( $tpk_settings[ 'tpk_enable_article_bottom_ad' ] ) ? $tpk_settings[ 'tpk_enable_article_bottom_ad' ] : '';
                                $tpk_article_bottom_ad_image = isset( $tpk_settings[ 'tpk_article_bottom_ad_image' ] ) ? $tpk_settings[ 'tpk_article_bottom_ad_image' ] : '';
                                $tpk_article_bottom_ad_type = isset( $tpk_settings[ 'tpk_article_bottom_ad_type' ] ) ? $tpk_settings[ 'tpk_article_bottom_ad_type' ] : 'image';
                                $tpk_article_bottom_ad_script = isset( $tpk_settings[ 'tpk_article_bottom_ad_script' ] ) ? $tpk_settings[ 'tpk_article_bottom_ad_script' ] : '';
                                $tpk_article_bottom_ad_image_link = isset( $tpk_settings[ 'tpk_article_bottom_ad_image_link' ] ) ? $tpk_settings[ 'tpk_article_bottom_ad_image_link' ] : '';
                                $tpk_ed_article_bottom_ad_desktop = isset( $tpk_settings[ 'tpk_ed_article_bottom_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_article_bottom_ad_desktop' ] : '1';
                                $tpk_ed_article_bottom_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_landscape' ] : '1';
                                $tpk_ed_article_bottom_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_portrait' ] : '1';
                                $tpk_ed_article_bottom_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_mobile' ] : '1';
                                ?>
                                <div class="tpk-option-settings">
                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-article-bottom-ed-ad-checkbox" type="checkbox" name="tpk_enable_article_bottom_ad" <?php if( $tpk_enable_article_bottom_ad ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-article-bottom-ed-ad-checkbox"><?php esc_html_e('Enable TWP: Article Bottom AD','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Article Bottom AD Type','theme-powerkit'); ?></label>
                                        <select class="tpk-article-bottom-ad-type-select" name="tpk_article_bottom_ad_type">
                                            
                                            <option <?php if( $tpk_article_bottom_ad_type == 'image' ){ ?> selected <?php } ?> value="image"><?php echo esc_html( 'Image','theme-powerkit' ); ?></option>
                                            <option <?php if( $tpk_article_bottom_ad_type == 'adsense' ){ ?> selected <?php } ?> value="adsense"><?php echo esc_html( 'AdSense','theme-powerkit' ); ?></option>

                                                
                                        </select>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">

                                        <div class="tpk-article-bottom-ad-type-opt <?php if( $tpk_article_bottom_ad_type == 'image' ){ ?> tpk-article-bottom-ad-type-active <?php } ?> tpk-article-bottom-ad-type-image">

                                            <label><?php esc_html_e('Article Bottom AD Image.','theme-powerkit'); ?></label>
                                            <?php
                                            $image = '';
                                            if( $tpk_article_bottom_ad_image ){
                                                $image = '<img src="' . esc_url( $tpk_article_bottom_ad_image ) . '"/>';
                                            } ?>
                                            <div class="tpk-img-fields-wrap">
                                                <div class="attachment-media-view">
                                                    <div class="tpk-img-fields-wrap">
                                                        <div class="tpk-attachment-media-view">
                                                            <div class="tpk-attachment-child tpk-uploader">
                                                                <button type="button" class="tpk-img-upload-button">
                                                                    <span class="dashicons dashicons-upload tpk-icon tpk-icon-large"></span>
                                                                </button>
                                                                <input class="upload-id" name="tpk_article_bottom_ad_image" type="hidden" value="<?php echo esc_url($tpk_article_bottom_ad_image); ?>"/>
                                                            </div>
                                                            <div class="tpk-attachment-child tpk-thumbnail-image">
                                                                <button type="button" class="tpk-img-delete-button <?php if( $tpk_article_bottom_ad_image ){ echo 'tpk-img-show'; } ?>">
                                                                    <span class="dashicons dashicons-no-alt tpk-icon"></span>
                                                                </button>
                                                                <div class="tpk-img-container">
                                                                    <?php echo $image; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tpk-article-bottom-ad-type-opt <?php if( $tpk_article_bottom_ad_type == 'image' ){ ?> tpk-article-bottom-ad-type-active <?php } ?> tpk-article-bottom-ad-type-image">
                                            <label><?php esc_html_e('Image Link','theme-powerkit'); ?></label>
                                            <input type="text" name="tpk_article_bottom_ad_image_link" value="<?php echo esc_attr($tpk_article_bottom_ad_image_link); ?>" />
                                        </div>

                                        <div class="tpk-article-bottom-ad-type-opt <?php if( $tpk_article_bottom_ad_type == 'adsense' ){ ?> tpk-article-bottom-ad-type-active <?php } ?> tpk-article-bottom-ad-type-adsense">

                                           <label><?php esc_html_e('Article Bottom AdSense Script.','theme-powerkit'); ?></label>
                                        
                                            <textarea id="tpk-article-bottom-adsense-script" name="tpk_article_bottom_ad_script"><?php echo $tpk_article_bottom_ad_script; ?></textarea>

                                        </div>
                                                
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-article-bottom-ad-desktop" type="checkbox" name="tpk_ed_article_bottom_ad_desktop" <?php if( $tpk_ed_article_bottom_ad_desktop ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-article-bottom-ad-desktop"><?php esc_html_e('Enable Article Bottom AD On Desktop','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-article-bottom-ad-landscape" type="checkbox" name="tpk_ed_article_bottom_ad_tablet_landscape" <?php if( $tpk_ed_article_bottom_ad_tablet_landscape ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-article-bottom-ad-landscape"><?php esc_html_e('Enable Article Bottom AD On Landscape','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-article-bottom-ad-portrait" type="checkbox" name="tpk_ed_article_bottom_ad_tablet_portrait" <?php if( $tpk_ed_article_bottom_ad_tablet_portrait ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-article-bottom-ad-portrait"><?php esc_html_e('Enable Article Bottom AD On Portrait','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-article-bottom-ad-mobile" type="checkbox" name="tpk_ed_article_bottom_ad_tablet_mobile" <?php if( $tpk_ed_article_bottom_ad_tablet_mobile ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-article-bottom-ad-mobile"><?php esc_html_e('Enable Article Bottom AD On Mobile','theme-powerkit'); ?></label>
                                    </div>

                                </div>
                            </div>

                            <div class="tpk-options">
                                <h2 class="tpk-control-title"><?php esc_html_e('Footer AD','theme-powerkit'); ?></h2>
                                <?php
                                $tpk_enable_footer_ad = isset( $tpk_settings[ 'tpk_enable_footer_ad' ] ) ? $tpk_settings[ 'tpk_enable_footer_ad' ] : '';
                                $tpk_footer_ad_image = isset( $tpk_settings[ 'tpk_footer_ad_image' ] ) ? $tpk_settings[ 'tpk_footer_ad_image' ] : '';
                                $tpk_footer_ad_type = isset( $tpk_settings[ 'tpk_footer_ad_type' ] ) ? $tpk_settings[ 'tpk_footer_ad_type' ] : 'image';
                                $tpk_footer_ad_script = isset( $tpk_settings[ 'tpk_footer_ad_script' ] ) ? $tpk_settings[ 'tpk_footer_ad_script' ] : '';
                                $tpk_footer_ad_image_link = isset( $tpk_settings[ 'tpk_footer_ad_image_link' ] ) ? $tpk_settings[ 'tpk_footer_ad_image_link' ] : '';
                                $tpk_ed_footer_ad_desktop = isset( $tpk_settings[ 'tpk_ed_footer_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_footer_ad_desktop' ] : '1';
                                $tpk_ed_footer_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_footer_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_footer_ad_tablet_landscape' ] : '1';
                                $tpk_ed_footer_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_footer_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_footer_ad_tablet_portrait' ] : '1';
                                $tpk_ed_footer_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_footer_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_footer_ad_tablet_mobile' ] : '1';
                                ?>
                                <div class="tpk-option-settings">
                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-footer-ed-ad-checkbox" type="checkbox" name="tpk_enable_footer_ad" <?php if( $tpk_enable_footer_ad ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-footer-ed-ad-checkbox"><?php esc_html_e('Enable TWP: Footer AD','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                                        <label><?php esc_html_e('Footer AD Type','theme-powerkit'); ?></label>
                                        <select class="tpk-footer-ad-type-select" name="tpk_footer_ad_type">
                                            
                                            <option <?php if( $tpk_footer_ad_type == 'image' ){ ?> selected <?php } ?> value="image"><?php echo esc_html( 'Image','theme-powerkit' ); ?></option>
                                            <option <?php if( $tpk_footer_ad_type == 'adsense' ){ ?> selected <?php } ?> value="adsense"><?php echo esc_html( 'AdSense','theme-powerkit' ); ?></option>

                                                
                                        </select>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-opt-wrap-alt">

                                        <div class="tpk-footer-ad-type-opt <?php if( $tpk_footer_ad_type == 'image' ){ ?> tpk-footer-ad-type-active <?php } ?> tpk-footer-ad-type-image">

                                            <label><?php esc_html_e('Footer AD Image.','theme-powerkit'); ?></label>
                                            <?php
                                            $image = '';
                                            if( $tpk_footer_ad_image ){
                                                $image = '<img src="' . esc_url( $tpk_footer_ad_image ) . '"/>';
                                            } ?>
                                            <div class="tpk-img-fields-wrap">
                                                <div class="attachment-media-view">
                                                    <div class="tpk-img-fields-wrap">
                                                        <div class="tpk-attachment-media-view">
                                                            <div class="tpk-attachment-child tpk-uploader">
                                                                <button type="button" class="tpk-img-upload-button">
                                                                    <span class="dashicons dashicons-upload tpk-icon tpk-icon-large"></span>
                                                                </button>
                                                                <input class="upload-id" name="tpk_footer_ad_image" type="hidden" value="<?php echo esc_url($tpk_footer_ad_image); ?>"/>
                                                            </div>
                                                            <div class="tpk-attachment-child tpk-thumbnail-image">
                                                                <button type="button" class="tpk-img-delete-button <?php if( $tpk_footer_ad_image ){ echo 'tpk-img-show'; } ?>">
                                                                    <span class="dashicons dashicons-no-alt tpk-icon"></span>
                                                                </button>
                                                                <div class="tpk-img-container">
                                                                    <?php echo $image; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tpk-footer-ad-type-opt <?php if( $tpk_footer_ad_type == 'image' ){ ?> tpk-footer-ad-type-active <?php } ?> tpk-footer-ad-type-image">
                                            <label><?php esc_html_e('Image Link','theme-powerkit'); ?></label>
                                            <input type="text" name="tpk_footer_ad_image_link" value="<?php echo esc_attr($tpk_footer_ad_image_link); ?>" />
                                        </div>

                                        <div class="tpk-footer-ad-type-opt <?php if( $tpk_footer_ad_type == 'adsense' ){ ?> tpk-footer-ad-type-active <?php } ?> tpk-footer-ad-type-adsense">

                                           <label><?php esc_html_e('Footer AdSense Script.','theme-powerkit'); ?></label>
                                        
                                            <textarea id="tpk-footer-adsense-script" name="tpk_footer_ad_script"><?php echo $tpk_footer_ad_script; ?></textarea>

                                        </div>
                                                
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-footer-ad-desktop" type="checkbox" name="tpk_ed_footer_ad_desktop" <?php if( $tpk_ed_footer_ad_desktop ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-footer-ad-desktop"><?php esc_html_e('Enable Footer AD On Desktop','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-footer-ad-landscape" type="checkbox" name="tpk_ed_footer_ad_tablet_landscape" <?php if( $tpk_ed_footer_ad_tablet_landscape ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-footer-ad-landscape"><?php esc_html_e('Enable Footer AD On Landscape','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-footer-ad-portrait" type="checkbox" name="tpk_ed_footer_ad_tablet_portrait" <?php if( $tpk_ed_footer_ad_tablet_portrait ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-footer-ad-portrait"><?php esc_html_e('Enable Footer AD On Portrait','theme-powerkit'); ?></label>
                                    </div>

                                    <div class="tpk-opt-wrap tpk-checkbox-wrap">
                                        <input id="author-ed-footer-ad-mobile" type="checkbox" name="tpk_ed_footer_ad_tablet_mobile" <?php if( $tpk_ed_footer_ad_tablet_mobile ){ ?> checked="checked" <?php } ?> />
                                        <label for="author-ed-footer-ad-mobile"><?php esc_html_e('Enable Footer AD On Mobile','theme-powerkit'); ?></label>
                                    </div>

                                </div>
                            </div>

                        </div>








                    </div>
                    <?php /** Nonce Action **/
                    wp_nonce_field('tpk_options_nonce', 'tpk_options_nonce'); ?>
                    <input type="submit" class="tpk-button tpk-button-primary" value="<?php esc_html_e('Save Settings','theme-powerkit') ?>" id="tpk_form_submit" name="tpk_form_submit"/>
                </form>
            </div>
            <div class="tpk-wraper-options tpk-wraper-options-2 tpk-block-panel">
                <div>
                    <p><?php esc_html_e("Theme Powerkit is a simple and lightweight WordPress plugin to help you supercharge your WordPress site. There’re numerous plugins in the WordPress repository, however if you install them all, there’s inconsistency in their backend and frontend styles and possible plugin conflicts.",'theme-powerkit') ?></p>
                    <p><?php esc_html_e("That’s why we've created Theme Powerkit, essentials components for every WordPress blog or magazine.",'theme-powerkit') ?></p>
                </div>
                <div>
                    <h2><?php esc_html_e("Like this plugin?",'theme-powerkit') ?></h2>
                    <p><a href="<?php echo esc_url('https://wordpress.org/support/plugin/theme-powerkit/ratings/?filter=5'); ?>"><?php esc_html_e("Give it a 5 star rating",'theme-powerkit') ?></a> on WordPress.org.</p>
                    <p><?php esc_html_e("Like and follow",'theme-powerkit') ?> <a href="<?php echo esc_url('https://themeinwp.com/'); ?>">ThemeinWP</a> on <a href="<?php echo esc_url('https://www.facebook.com/themeinwp/'); ?>">Facebook</a> & <a href="<?php echo esc_url('https://twitter.com/themeinwp'); ?>">Twitter</a>.</p>
                </div>
            </div>
        </div>
        <div class="tpk-content-aside">
            <div class="tpk-aside-wrapper tpk-aside-wrapper-1 tpk-block-panel">
                <div class="tpk-theme-infos">
                    <div class="tpk-premium-themes">
                        <h3 class="tpk-control-title"><?php esc_html_e('Premium Themes','theme-powerkit'); ?></h3>
                        <p>
                            <?php esc_html_e('Check out our simple, clean and responsive Premium WordPress Themes that come with an array of crucial features with a superior functionality.','theme-powerkit'); ?>
                        </p>
                        <p>
                            <a href="<?php echo esc_url('https://www.themeinwp.com/theme/category/pro/'); ?>" class="tpk-button tpk-button-outline"><?php esc_html_e('Browse our premium themes.','theme-powerkit'); ?> <span class="dashicons dashicons-arrow-right-alt"></span></a>
                        </p>
                    </div>
                    <div class="tpk-free-themes">
                        <h3 class="tpk-control-title"><?php esc_html_e('Free Themes','theme-powerkit'); ?></h3>
                        <p>
                            <?php esc_html_e('Check out our collection of Free WordPress Themes that are clean, simple and feature-rich.','theme-powerkit'); ?>
                        </p>
                        <p>
                            <a href="<?php echo esc_url('https://www.themeinwp.com/theme/category/free/'); ?>" class="tpk-button tpk-button-outline"><?php esc_html_e('Browse our free themes.','theme-powerkit'); ?> <span class="dashicons dashicons-arrow-right-alt"></span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="tpk-aside-wrapper tpk-aside-wrapper-2 tpk-block-panel">
                <div>
                    <h2 class="tpk-control-title"><?php esc_html_e('Looking for help?','theme-powerkit'); ?></h2>
                    <p><?php esc_html_e('We have some resources available to help you in the right direction.','theme-powerkit'); ?></p>
                    <ul>
                        <li>
                            <a href="<?php echo esc_url('https://www.themeinwp.com/support/'); ?>"><?php esc_html_e('Create Support Ticket','theme-powerkit'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url('https://www.themeinwp.com/knowledgebase_category/theme-powerkit/'); ?>"><?php esc_html_e('Knowledge Base','theme-powerkit'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url('https://www.themeinwp.com/theme-powerkit/'); ?>"><?php esc_html_e('Frequently Asked Questions','theme-powerkit'); ?></a>
                        </li>
                    </ul>
                    <p><?php esc_html_e('If your answer can not be found in the resources listed above, please use the support forums on WordPress.org.','theme-powerkit'); ?></p>
                    <p><?php esc_html_e('Found a bug? Please open an issue on','theme-powerkit'); ?><a href="<?php echo esc_url(''); ?>"> <?php esc_html_e('Help Page','theme-powerkit'); ?></a></p>
                </div>
            </div>
        </div>
    </div>
</div>