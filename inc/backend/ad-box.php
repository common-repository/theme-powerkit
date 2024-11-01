<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * AD Box Widgets.
 *
 * @package Theme Powerkit
 */
if ( !function_exists('theme_powerkit_ad_boxs') ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
    **/

    function theme_powerkit_ad_boxs(){
        // Recent Post widget.
        register_widget('Theme_Powerkit_Sidebar_Ad_Box');
    }

endif;
add_action('widgets_init', 'theme_powerkit_ad_boxs');

// Recent Post widget
if ( !class_exists('Theme_Powerkit_Sidebar_Ad_Box') ) :

    /**
     * Recent Post.
     *
     * @since 1.0.0
    **/

    class Theme_Powerkit_Sidebar_Ad_Box extends Theme_Powerkit_Widget_Base{

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
        **/

        function __construct(){

            $opts = array(
                'classname' => 'theme_powerkit_ad_box',
                'description' => esc_html__('Widget will display advertise.', 'theme-powerkit'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => esc_html__('Title:', 'theme-powerkit'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'show_ad_from' => array(
                    'label' => esc_html__('Show AD From:', 'theme-powerkit'),
                    'type' => 'select',
                    'default' => 'sidebar',
                    'options' => array(
                        'header' => esc_html__('Header', 'theme-powerkit'),
                        'article-top' => esc_html__('Article Top', 'theme-powerkit'),
                        'article-inline' => esc_html__('Article Inline', 'theme-powerkit'),
                        'article-bottom' => esc_html__('Article Bottom', 'theme-powerkit'),
                        'sidebar' => esc_html__('Sidebar', 'theme-powerkit'),
                        'footer' => esc_html__('Footer', 'theme-powerkit'),
                    ),
                ),
            );
            parent::__construct('theme-powerkit-ad-box', esc_html__('TWP: AD Box', 'theme-powerkit'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
        **/
        function widget( $args, $instance ){

            $tpk_settings = get_option( 'tpk_options_settings' );
            $params = $this->get_params( $instance );
            echo $args['before_widget'];

            $show_ad_from = $params['show_ad_from'];
            if ( !empty( $params['title'] ) ) {
                
                echo $args['before_title'] . esc_html( $params['title'] ) . $args['after_title'];

            }

            if( $show_ad_from == 'header' ){

                $tpk_ed_header_ad_desktop = isset( $tpk_settings[ 'tpk_ed_header_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_header_ad_desktop' ] : '';
                $tpk_ed_header_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_header_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_header_ad_tablet_landscape' ] : '1';
                $tpk_ed_header_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_header_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_header_ad_tablet_portrait' ] : '1';
                $tpk_ed_header_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_header_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_header_ad_tablet_mobile' ] : '1';

                $class_ad_ed = '';
                if( !$tpk_ed_header_ad_desktop ){

                    $class_ad_ed .= ' header-disable-desktop';

                }
                if( !$tpk_ed_header_ad_tablet_landscape ){

                    $class_ad_ed .= ' header-disable-tablate-landscape';

                }
                if( !$tpk_ed_header_ad_tablet_portrait ){

                    $class_ad_ed .= ' header-disable-tablate-portrait';

                }
                if( !$tpk_ed_header_ad_tablet_mobile ){

                    $class_ad_ed .= ' header-disable-mobilt';

                }
                $ad_type = isset( $tpk_settings[ 'tpk_header_ad_type' ] ) ? $tpk_settings[ 'tpk_header_ad_type' ] : 'image';

                if( $ad_type == 'adsense' ){

                    $adsense_script = isset( $tpk_settings[ 'tpk_header_ad_script' ] ) ? $tpk_settings[ 'tpk_header_ad_script' ] : '';

                }else{

                    $ad_image = isset( $tpk_settings[ 'tpk_header_ad_image' ] ) ? $tpk_settings[ 'tpk_header_ad_image' ] : '';
                    $ad_link = isset( $tpk_settings[ 'tpk_header_ad_image_link' ] ) ? $tpk_settings[ 'tpk_header_ad_image_link' ] : '';

                }

            }elseif( $show_ad_from == 'article-top' ){

                $tpk_ed_article_top_ad_desktop = isset( $tpk_settings[ 'tpk_ed_article_top_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_article_top_ad_desktop' ] : '';
                $tpk_ed_article_top_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_article_top_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_article_top_ad_tablet_landscape' ] : '1';
                $tpk_ed_article_top_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_article_top_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_article_top_ad_tablet_portrait' ] : '1';
                $tpk_ed_article_top_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_article_top_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_article_top_ad_tablet_mobile' ] : '1';

                $class_ad_ed = '';
                if( !$tpk_ed_article_top_ad_desktop ){

                    $class_ad_ed .= ' article-top-disable-desktop';

                }
                if( !$tpk_ed_article_top_ad_tablet_landscape ){

                    $class_ad_ed .= ' article-top-disable-tablate-landscape';

                }
                if( !$tpk_ed_article_top_ad_tablet_portrait ){

                    $class_ad_ed .= ' article-top-disable-tablate-portrait';

                }
                if( !$tpk_ed_article_top_ad_tablet_mobile ){

                    $class_ad_ed .= ' article-top-disable-mobilt';

                }

                $ad_type = isset( $tpk_settings[ 'tpk_article_top_ad_type' ] ) ? $tpk_settings[ 'tpk_article_top_ad_type' ] : 'image';

                if( $ad_type == 'adsense' ){

                    $adsense_script = isset( $tpk_settings[ 'tpk_article_top_ad_script' ] ) ? $tpk_settings[ 'tpk_article_top_ad_script' ] : '';

                }else{

                    $ad_image = isset( $tpk_settings[ 'tpk_article_top_ad_image' ] ) ? $tpk_settings[ 'tpk_article_top_ad_image' ] : '';
                    $ad_link = isset( $tpk_settings[ 'tpk_article_top_ad_image_link' ] ) ? $tpk_settings[ 'tpk_article_top_ad_image_link' ] : '';

                }

            }elseif( $show_ad_from == 'article-inline' ){
                
                $tpk_ed_article_inline_ad_desktop = isset( $tpk_settings[ 'tpk_ed_article_inline_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_article_inline_ad_desktop' ] : '';
                $tpk_ed_article_inline_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_article_inline_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_article_inline_ad_tablet_landscape' ] : '1';
                $tpk_ed_article_inline_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_article_inline_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_article_inline_ad_tablet_portrait' ] : '1';
                $tpk_ed_article_inline_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_article_inline_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_article_inline_ad_tablet_mobile' ] : '1';

                $class_ad_ed = '';
                if( !$tpk_ed_article_inline_ad_desktop ){

                    $class_ad_ed .= ' article-inline-disable-desktop';

                }
                if( !$tpk_ed_article_inline_ad_tablet_landscape ){

                    $class_ad_ed .= ' article-inline-disable-tablate-landscape';

                }
                if( !$tpk_ed_article_inline_ad_tablet_portrait ){

                    $class_ad_ed .= ' article-inline-disable-tablate-portrait';

                }
                if( !$tpk_ed_article_inline_ad_tablet_mobile ){

                    $class_ad_ed .= ' article-inline-disable-mobilt';

                }

                $ad_type = isset( $tpk_settings[ 'tpk_article_inline_ad_type' ] ) ? $tpk_settings[ 'tpk_article_inline_ad_type' ] : 'image';

                if( $ad_type == 'adsense' ){

                    $adsense_script = isset( $tpk_settings[ 'tpk_article_inline_ad_script' ] ) ? $tpk_settings[ 'tpk_article_inline_ad_script' ] : '';

                }else{

                    $ad_image = isset( $tpk_settings[ 'tpk_article_inline_ad_image' ] ) ? $tpk_settings[ 'tpk_article_inline_ad_image' ] : '';
                    $ad_link = isset( $tpk_settings[ 'tpk_article_inline_ad_image_link' ] ) ? $tpk_settings[ 'tpk_article_inline_ad_image_link' ] : '';

                }

            }
            elseif( $show_ad_from == 'article-bottom' ){
                
                $tpk_ed_article_bottom_ad_desktop = isset( $tpk_settings[ 'tpk_ed_article_bottom_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_article_bottom_ad_desktop' ] : '';
                $tpk_ed_article_bottom_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_landscape' ] : '1';
                $tpk_ed_article_bottom_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_portrait' ] : '1';
                $tpk_ed_article_bottom_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_article_bottom_ad_tablet_mobile' ] : '1';

                $class_ad_ed = '';
                if( !$tpk_ed_article_bottom_ad_desktop ){

                    $class_ad_ed .= ' article-bottom-disable-desktop';

                }
                if( !$tpk_ed_article_bottom_ad_tablet_landscape ){

                    $class_ad_ed .= ' article-bottom-disable-tablate-landscape';

                }
                if( !$tpk_ed_article_bottom_ad_tablet_portrait ){

                    $class_ad_ed .= ' article-bottom-disable-tablate-portrait';

                }
                if( !$tpk_ed_article_bottom_ad_tablet_mobile ){

                    $class_ad_ed .= ' article-bottom-disable-mobilt';

                }

                $ad_type = isset( $tpk_settings[ 'tpk_article_bottom_ad_type' ] ) ? $tpk_settings[ 'tpk_article_bottom_ad_type' ] : 'image';

                if( $ad_type == 'adsense' ){

                    $adsense_script = isset( $tpk_settings[ 'tpk_article_bottom_ad_script' ] ) ? $tpk_settings[ 'tpk_article_bottom_ad_script' ] : '';

                }else{

                    $ad_image = isset( $tpk_settings[ 'tpk_article_bottom_ad_image' ] ) ? $tpk_settings[ 'tpk_article_bottom_ad_image' ] : '';
                    $ad_link = isset( $tpk_settings[ 'tpk_article_bottom_ad_image_link' ] ) ? $tpk_settings[ 'tpk_article_bottom_ad_image_link' ] : '';

                }

            }
            elseif( $show_ad_from == 'footer' ){
                
                $tpk_ed_footer_ad_desktop = isset( $tpk_settings[ 'tpk_ed_footer_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_footer_ad_desktop' ] : '';
                $tpk_ed_footer_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_footer_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_footer_ad_tablet_landscape' ] : '1';
                $tpk_ed_footer_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_footer_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_footer_ad_tablet_portrait' ] : '1';
                $tpk_ed_footer_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_footer_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_footer_ad_tablet_mobile' ] : '1';

                $class_ad_ed = '';
                if( !$tpk_ed_footer_ad_desktop ){

                    $class_ad_ed .= ' footer-disable-desktop';

                }
                if( !$tpk_ed_footer_ad_tablet_landscape ){

                    $class_ad_ed .= ' footer-disable-tablate-landscape';

                }
                if( !$tpk_ed_footer_ad_tablet_portrait ){

                    $class_ad_ed .= ' footer-disable-tablate-portrait';

                }
                if( !$tpk_ed_footer_ad_tablet_mobile ){

                    $class_ad_ed .= ' footer-disable-mobilt';

                }

                $ad_type = isset( $tpk_settings[ 'tpk_footer_ad_type' ] ) ? $tpk_settings[ 'tpk_footer_ad_type' ] : 'image';

                if( $ad_type == 'adsense' ){

                    $adsense_script = isset( $tpk_settings[ 'tpk_footer_ad_script' ] ) ? $tpk_settings[ 'tpk_footer_ad_script' ] : '';

                }else{

                    $ad_image = isset( $tpk_settings[ 'tpk_footer_ad_image' ] ) ? $tpk_settings[ 'tpk_footer_ad_image' ] : '';
                    $ad_link = isset( $tpk_settings[ 'tpk_footer_ad_image_link' ] ) ? $tpk_settings[ 'tpk_footer_ad_image_link' ] : '';

                }

            }else{

                $tpk_ed_sidebar_ad_desktop = isset( $tpk_settings[ 'tpk_ed_sidebar_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_sidebar_ad_desktop' ] : '';
                $tpk_ed_sidebar_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_sidebar_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_sidebar_ad_tablet_landscape' ] : '1';
                $tpk_ed_sidebar_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_sidebar_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_sidebar_ad_tablet_portrait' ] : '1';
                $tpk_ed_sidebar_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_sidebar_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_sidebar_ad_tablet_mobile' ] : '1';

                $class_ad_ed = '';
                if( !$tpk_ed_sidebar_ad_desktop ){

                    $class_ad_ed .= ' sidebar-disable-desktop';

                }
                if( !$tpk_ed_sidebar_ad_tablet_landscape ){

                    $class_ad_ed .= ' sidebar-disable-tablate-landscape';

                }
                if( !$tpk_ed_sidebar_ad_tablet_portrait ){

                    $class_ad_ed .= ' sidebar-disable-tablate-portrait';

                }
                if( !$tpk_ed_sidebar_ad_tablet_mobile ){

                    $class_ad_ed .= ' sidebar-disable-mobilt';

                }

                $ad_type = isset( $tpk_settings[ 'tpk_sidebar_ad_type' ] ) ? $tpk_settings[ 'tpk_sidebar_ad_type' ] : 'image';

                if( $ad_type == 'adsense' ){

                    $adsense_script = isset( $tpk_settings[ 'tpk_sidebar_ad_script' ] ) ? $tpk_settings[ 'tpk_sidebar_ad_script' ] : '';

                }else{

                    $ad_image = isset( $tpk_settings[ 'tpk_sidebar_ad_image' ] ) ? $tpk_settings[ 'tpk_sidebar_ad_image' ] : '';
                    $ad_link = isset( $tpk_settings[ 'tpk_sidebar_ad_image_link' ] ) ? $tpk_settings[ 'tpk_sidebar_ad_image_link' ] : '';

                }
                
            }

            if( $ad_type == 'adsense' && $adsense_script ){ ?>

                <div class="tpk-sidebar-ad <?php echo $class_ad_ed; ?>">
                    <div class="tpk-sidebar-ad-adsense">
                        <?php echo $adsense_script; ?>
                    </div>
                </div>
            
            <?php
            }else{

                if( $ad_image ){ ?>

                    <div class="tpk-sidebar-ad <?php echo $class_ad_ed; ?>">
                        <div class="tpk-sidebar-ad-image">
                            <a <?php if( $ad_link ){ ?>target="_blank" <?php } ?> href="<?php if( $ad_link ){ echo esc_url( $ad_link); }else{ echo 'javascript:void(0)'; } ?>"><img src="<?php echo esc_url( $ad_image ); ?>" alt="<?php esc_html_e('sidebar AD','theme-powerkit'); ?>" title="<?php esc_html_e('sidebar AD','theme-powerkit'); ?>"></a>
                        </div>
                    </div>

                <?php
                }

            }

            echo $args['after_widget'];
        }
    }
endif;