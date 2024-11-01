<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Category Widgets.
 *
 * @package Theme Powerkit
 */
if ( !function_exists('theme_powerkit_category_widgets') ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
    **/

    function theme_powerkit_category_widgets(){
        // Recent Post widget.
        register_widget('Theme_Powerkit_Sidebar_Category_Widget');
    }

endif;
add_action('widgets_init', 'theme_powerkit_category_widgets');

// Recent Post widget
if ( !class_exists('Theme_Powerkit_Sidebar_Category_Widget') ) :

    /**
     * Recent Post.
     *
     * @since 1.0.0
    **/

    class Theme_Powerkit_Sidebar_Category_Widget extends Theme_Powerkit_Widget_Base{

        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
        **/

        function __construct(){

            $opts = array(
                'classname' => 'theme_powerkit_category_widget',
                'description' => esc_html__('Displays categories and posts.', 'theme-powerkit'),
                'customize_selective_refresh' => true,
            );
            $fields = array(
                'title' => array(
                    'label' => esc_html__('Title:', 'theme-powerkit'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'latest_test' => array(
                    'label' => esc_html__('Latest Text', 'theme-powerkit'),
                    'type' => 'text',
                    'class' => 'widefat',
                    'default' => esc_html__('Latest:', 'theme-powerkit'),
                ),
                'top_category' => array(
                    'label' => esc_html__('Top Categories:', 'theme-powerkit'),
                    'type' => 'number',
                    'default' => 5,
                    'css' => 'max-width:60px;',
                    'min' => 1,
                    'max' => 20,
                ),
                'enable_cat_desc' => array(
                    'label' => esc_html__('Enable Category Description:', 'theme-powerkit'),
                    'type' => 'checkbox',
                    'default' => true,
                ),
            );
            parent::__construct('theme-powerkit-category-layout', esc_html__('TWP: Category Widget', 'theme-powerkit'), $opts, array(), $fields);
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
            $params = $this->get_params( $instance );
            echo $args['before_widget'];
            if ( !empty( $params['title'] ) ) {
                echo $args['before_title'] . esc_html( $params['title'] ) . $args['after_title'];
            }
            $top_category = $params['top_category'];
            $enable_cat_desc = $params['enable_cat_desc'];
            $post_cat_lists = get_categories(
                array(
                    'hide_empty' => '0',
                    'exclude' => '1',
                )
            );
            $slug_counts = array();
            foreach( $post_cat_lists as $post_cat_list ){
                if( $post_cat_list->count >= 1 ){
                    $slug_counts[] = array( 
                        'count'         => $post_cat_list->count,
                        'slug'          => $post_cat_list->slug,
                        'name'          => $post_cat_list->name,
                        'cat_ID'        => $post_cat_list->cat_ID,
                        'description'   => $post_cat_list->category_description, 
                    );
                }
            }
            
            if( $slug_counts ){
                arsort( $slug_counts ); ?>
                <div class="tpk-category-widget">
                    <?php
                        $i = 1;
                        foreach( $slug_counts as $key => $slug_count ){
                            if( $i > $top_category){ break; }
                            
                            $cat_link           = get_category_link( $slug_count['cat_ID'] );
                            $cat_name           = $slug_count['name'];
                            $cat_slug           = $slug_count['slug'];
                            $cat_count          = $slug_count['count'];
                            $cat_description    = $slug_count['description']; ?>
                            <article class="tpk-article-list" >
                                <header class="tpk-category-header">
                                    <h3 class="entry-title entry-title-medium">
                                        <a href="<?php echo esc_url($cat_link); ?>">
                                            <span class="tpk-category-title"><?php echo esc_html($cat_name); ?></span>
                                            <span class="tpk-post-count"><?php echo absint($cat_count); ?></span>
                                        </a>
                                    </h3>
                                    <?php if ($enable_cat_desc && $cat_description) { ?>
                                    <div class="category-widget-description">
                                        <?php echo esc_html($cat_description); ?>
                                    </div>
                                    <?php } ?>
                                </header>
                                <?php
                                $cat_posts = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 1, 'category_name' => $cat_slug));
                                while ($cat_posts->have_posts()) {
                                    $cat_posts->the_post();

                                    $tpk_latest_text = $params['latest_test'];?>

                                    <div class="tpk-latest-article">
                                        <h4 class="entry-title entry-title-small">
                                            <span class="tpk-category-latest">
                                                <?php echo esc_html($tpk_latest_text); ?>
                                            </span>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    
                                <?php }
                                wp_reset_postdata(); ?>
                            </article>
                        <?php
                        $i++; }
                    ?>
                </div>
                <?php 
            }
            echo $args['after_widget'];
        }
    }
endif;