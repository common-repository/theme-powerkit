<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Recent Post Widgets.
 *
 * @package Theme Powerkit
 */
if (!function_exists('theme_powerkit_recent_post_widgets')) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function theme_powerkit_recent_post_widgets()
    {
        // Recent Post widget.
        register_widget('Theme_Powerkit_Sidebar_Recent_Post_Widget');
    }
endif;
add_action('widgets_init', 'theme_powerkit_recent_post_widgets');
// Recent Post widget
if (!class_exists('Theme_Powerkit_Sidebar_Recent_Post_Widget')) :
    /**
     * Recent Post.
     *
     * @since 1.0.0
     */
    class Theme_Powerkit_Sidebar_Recent_Post_Widget extends Theme_Powerkit_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'theme_powerkit_popular_post_widget',
                'description' => esc_html__('Displays post form selected category specific for popular post in sidebars.', 'theme-powerkit'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => esc_html__('Title:', 'theme-powerkit'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'post_category' => array(
                    'label' => esc_html__('Select Category:', 'theme-powerkit'),
                    'type' => 'dropdown-taxonomies',
                    'show_option_all' => esc_html__('All Categories', 'theme-powerkit'),
                ),
                'enable_counter' => array(
                    'label' => esc_html__('Enable Counter:', 'theme-powerkit'),
                    'type' => 'checkbox',
                    'default' => true,
                ),
                'enable_post_author' => array(
                    'label' => esc_html__('Enable Post Author:', 'theme-powerkit'),
                    'type' => 'checkbox',
                    'default' => true,
                ),
                'enable_post_date' => array(
                    'label' => esc_html__('Enable Post Date:', 'theme-powerkit'),
                    'type' => 'checkbox',
                    'default' => true,
                ),
                'post_number' => array(
                    'label' => esc_html__('Number of Posts:', 'theme-powerkit'),
                    'type' => 'number',
                    'default' => 4,
                    'css' => 'max-width:60px;',
                    'min' => 1,
                    'max' => 9,
                ),
            );
            parent::__construct('theme-powerkit-popular-sidebar-layout', esc_html__('TWP: Recent Post Widget', 'theme-powerkit'), $opts, array(), $fields);
        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget($args, $instance)
        {
            $params = $this->get_params($instance);
            echo $args['before_widget'];
            if (!empty($params['title'])) {
                echo $args['before_title'] . $params['title'] . $args['after_title'];
            }
            $enable_post_author = $params['enable_post_author'];
            $enable_post_date = $params['enable_post_date'];
            $qargs = array(
                'posts_per_page' => esc_attr($params['post_number']),
                'no_found_rows' => true,
            );
            if (absint($params['post_category']) > 0) {
                $qargs['category'] = absint($params['post_category']);
            }
            $all_posts = get_posts($qargs);
            ?>
            <?php global $post;
            $count = 1;
            ?>
            <?php if (!empty($all_posts)) : ?>
            <div class="tpk-recent-widget">
                <?php foreach ($all_posts as $key => $post) : ?>
                    <?php setup_postdata($post); ?>
                        <article <?php post_class('tpk-article-list'); ?> >
                            <div class="tpk-article-image">
                                <?php if (has_post_thumbnail()) {
                                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
                                } ?>
                                <a href="<?php the_permalink(); ?>" class="tpk-data-image tpk-image-small" data-image="<?php echo esc_url($thumb[0]); ?>"></a>
                                <?php if (true === $params['enable_counter']) { ?>
                                    <div class="tpk-trend-item">
                                        <span class="tpk-number"> <?php echo $count; ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="tpk-article-content">
                                <header class="entry-header">
                                    <h4 class="entry-title entry-title-small">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                </header>
                            </div>

                            <?php if( $enable_post_author || $enable_post_date ){ ?>
                                <footer class="tpk-article-footer">
                                    <div class="entry-meta">
                                        <div class="entry-meta-content">
                                            <?php if( $enable_post_author ){ ?>
                                                <div class="entry-meta-author">
                                                    <?php theme_powerkit_posted_by(); ?>
                                                </div>
                                            <?php } ?>

                                            <?php if( $enable_post_date ){ ?>
                                                <div class="entry-meta-date">
                                                    <?php theme_powerkit_posted_on(); ?>
                                                </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </footer>
                            <?php } ?>

                        </article>
                    <?php
                    $count++;
                endforeach; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
            <?php echo $args['after_widget'];
        }
    }
endif;