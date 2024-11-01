<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Author Widgets.
 *
 * @package Theme Powerkit
 */

if ( !function_exists('theme_powerkit_author_widgets') ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function theme_powerkit_author_widgets(){

        // Auther widget.
        register_widget('Theme_Powerkit_Author_widget');

    }
endif;
add_action('widgets_init', 'theme_powerkit_author_widgets');

/*Video widget*/
if ( !class_exists('Theme_Powerkit_Author_widget') ) :

    /**
     * Author widget Class.
     *
     * @since 1.0.0
     */
    class Theme_Powerkit_Author_widget extends Theme_Powerkit_Widget_Base
    {

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'theme_powerkit_author_widget',
                'description' => esc_html__('Displays authors details in post.', 'theme-powerkit'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => esc_html__('Title:', 'theme-powerkit'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'image_bg_url' => array(
                    'label' => esc_html__('Widget Background Image:', 'theme-powerkit'),
                    'type'  => 'image',
                ),
                'author-name' => array(
                    'label' => esc_html__('Name:', 'theme-powerkit'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'description' => array(
                    'label' => esc_html__('Description:', 'theme-powerkit'),
                    'type'  => 'textarea',
                    'class' => 'widget-content widefat'
                ),
                'image_url' => array(
                    'label' => esc_html__('Author Image:', 'theme-powerkit'),
                    'type'  => 'image',
                ),
                'url-fb' => array(
                   'label' => esc_html__('Facebook URL:', 'theme-powerkit'),
                   'type' => 'url',
                   'class' => 'widefat',
                    ),
                'url-tw' => array(
                   'label' => esc_html__('Twitter URL:', 'theme-powerkit'),
                   'type' => 'url',
                   'class' => 'widefat',
                    ),
                'url-lt' => array(
                   'label' => esc_html__('Linkedin URL:', 'theme-powerkit'),
                   'type' => 'url',
                   'class' => 'widefat',
                    ),
                'url-ig' => array(
                   'label' => esc_html__('Instagram URL:', 'theme-powerkit'),
                   'type' => 'esc_html__',
                   'class' => 'widefat',
                    ),
            );

            parent::__construct( 'theme-powerkit-author-layout', esc_html__('TWP: Author Profile Widget', 'theme-powerkit'), $opts, array(), $fields );
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget( $args, $instance )
        {

            $params = $this->get_params($instance);

            echo $args['before_widget'];

            if ( ! empty( $params['title'] ) ) {
                echo $args['before_title'] . $params['title'] . $args['after_title'];
            } ?>

            <div class="tpk-author-panel <?php if( $params['image_bg_url'] ){ echo "tpk-author-panel-bg"; } ?>">
                <?php if ( ! empty( $params['image_bg_url'] ) ) { ?>
                    <div class="tpk-author-background tpk-data-image" data-image="<?php echo esc_url( $params['image_url'] ); ?>">
                    </div>
                <?php } ?>
                <div class="tpk-author-avatar">
                    <?php if ( ! empty( $params['image_url'] ) ) { ?>
                        <div class="tpk-profile-image tpk-data-image" data-image="<?php echo esc_url( $params['image_url'] ); ?>">
                        </div>
                    <?php } ?>
                </div>
                <div class="tpk-author-details">
                    <?php if ( ! empty( $params['author-name'] ) ) { ?>
                        <h3 class="tpk-author-name"><?php echo esc_html( $params['author-name'] );?></h3>
                    <?php } ?>
                    <?php if ( ! empty( $params['description'] ) ) { ?>
                        <div class="tpk-author-info"><?php echo wp_kses_post( $params['description']); ?></div>
                    <?php } ?>
                </div>
                <div class="tpk-author-social">
                    <?php if ( ! empty( $params['url-fb'] ) ) { ?>
                        <a href="<?php echo esc_url( $params['url-fb'] ); ?>" target="_blank"><i class="tpk-icon tpk-facebook"></i></a>
                    <?php } ?>
                    <?php if ( ! empty( $params['url-tw'] ) ) { ?>
                        <a href="<?php echo esc_url( $params['url-tw'] ); ?>" target="_blank"><i class="tpk-icon tpk-twitter"></i></a>
                    <?php } ?>
                    <?php if ( ! empty( $params['url-lt'] ) ) { ?>
                        <a href="<?php echo esc_url( $params['url-lt'] ); ?>" target="_blank"><i class="tpk-icon tpk-linkedin"></i></a>
                    <?php } ?>
                    <?php if ( ! empty( $params['url-ig'] ) ) { ?>
                        <a href="<?php echo esc_url( $params['url-ig'] ); ?>" target="_blank"><i class="tpk-icon tpk-instagram"></i></a>
                    <?php } ?>
                </div>
            </div>
            <?php echo $args['after_widget'];
        }
    }
endif;