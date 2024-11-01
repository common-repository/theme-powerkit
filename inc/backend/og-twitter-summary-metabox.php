<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Open Graph Metabox.
 *
 * @package Theme Powerkit
 */
add_action('add_meta_boxes', 'theme_powerkit_open_graph_metabox');
if (!function_exists('theme_powerkit_open_graph_metabox')):
    function theme_powerkit_open_graph_metabox()
    {
        add_meta_box(
            'theme_powerkit_post_open_graph_metabox',
            esc_html__('Theme Powerkit', 'theme-powerkit'),
            'theme_powerkit_post_og_callback',
            'post',
            'normal',
            'high'
        );
        add_meta_box(
            'theme_powerkit_post_open_graph_metabox',
            esc_html__('Theme Powerkit', 'theme-powerkit'),
            'theme_powerkit_post_og_callback',
            'page',
            'normal',
            'high'
        );
    }
endif;
/**
 * Callback function OG Metabox.
 */
if (!function_exists('theme_powerkit_post_og_callback')):
    function theme_powerkit_post_og_callback()
    {
        global $post;
        wp_nonce_field(basename(__FILE__), 'theme_powerkit_post_og_meta'); ?>
        <div class="tpk-tab-main">
            <div class="tpk-metabox-tab">
                <ul>
                    <li>
                        <a id="tpk-tab-og" class="tpk-tab-active" href="javascript:void(0)"><?php esc_html_e('Open Graph', 'theme-powerkit'); ?></a>
                    </li>
                    <li>
                        <a id="tpk-tab-ts" href="javascript:void(0)"><?php esc_html_e('Twitter Summary', 'theme-powerkit'); ?></a>
                    </li>
                </ul>
            </div>
            <div class="tpk-tab-content">
                <div id="tpk-tab-og-content" class="tpk-content-wrap tpk-tab-content-active">
                    <h3 class="tpk-meta-title"><?php esc_html_e('Open Graph Option', 'theme-powerkit'); ?></h3>
                    <div class="tpk-meta-panels tpk-twitter-panels">
                        <?php $tpk_og_ed = esc_attr(get_post_meta($post->ID, 'tpk_og_ed', true)); ?>
                        <div class="tpk-opt-wrap tpk-checkbox-wrap">
                            <input id="open-graph-checkbox" name="tpk_og_ed" type="checkbox" <?php if ($tpk_og_ed) { ?> checked="checked" <?php } ?> />
                            <label for="open-graph-checkbox"><?php esc_html_e('Disable Open Graph for this Post', 'theme-powerkit'); ?></label>
                        </div>
                        <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                            <label><?php esc_html_e('Title', 'theme-powerkit'); ?></label>
                            <input name="tpk_og_title" type="text" value="<?php echo esc_attr(get_post_meta($post->ID, 'tpk_og_title', true)); ?>"/>
                        </div>
                        <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                            <label><?php esc_html_e('Description', 'theme-powerkit'); ?></label>
                            <input name="tpk_og_desc" type="text" value="<?php echo esc_attr(get_post_meta($post->ID, 'tpk_og_desc', true)); ?>"/>
                        </div>
                        <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                            <label><?php esc_html_e('URL', 'theme-powerkit'); ?></label>
                            <input name="tpk_og_url" type="text" value="<?php echo esc_attr(get_post_meta($post->ID, 'tpk_og_url', true)); ?>"/>
                        </div>
                        <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                            <label><?php esc_html_e('Type', 'theme-powerkit'); ?></label>
                            <?php $tpk_og_type = get_post_meta($post->ID, 'tpk_og_type', true); ?>
                            <select name="tpk_og_type">
                                <option value=""><?php esc_html_e('--Select--', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_og_type == 'website') {
                                    echo 'selected';
                                } ?> value="website"><?php esc_html_e('Website', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_og_type == 'video.episode') {
                                    echo 'selected';
                                } ?> value="video.episode"><?php esc_html_e('video.episode', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_og_type == 'music.radio_station') {
                                    echo 'selected';
                                } ?> value="music.radio_station"><?php esc_html_e('music.radio_station', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_og_type == 'music.song') {
                                    echo 'selected';
                                } ?> value="music.song"><?php esc_html_e('music.song', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_og_type == 'music.playlist') {
                                    echo 'selected';
                                } ?> value="music.playlist"><?php esc_html_e('music.playlist', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_og_type == 'video.movie') {
                                    echo 'selected';
                                } ?> value="video.movie"><?php esc_html_e('video.movie', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_og_type == 'music.album') {
                                    echo 'selected';
                                } ?> value="music.album"><?php esc_html_e('music.album', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_og_type == 'video.tv_show') {
                                    echo 'selected';
                                } ?> value="video.tv_show"><?php esc_html_e('video.tv_show', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_og_type == 'article') {
                                    echo 'selected';
                                } ?> value="article"><?php esc_html_e('Article', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_og_type == 'video.other') {
                                    echo 'selected';
                                } ?> value="video.other"><?php esc_html_e('video.other', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_og_type == 'profile') {
                                    echo 'selected';
                                } ?> value="profile"><?php esc_html_e('Profile', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_og_type == 'book') {
                                    echo 'selected';
                                } ?> value="book"><?php esc_html_e('Book', 'theme-powerkit'); ?></option>
                            </select>
                        </div>
                        <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                            <label><?php esc_html_e('Custom Tags', 'theme-powerkit'); ?></label>
                            <textarea name="tpk_og_custom_meta"><?php echo theme_powerkit_meta_sanitize(get_post_meta($post->ID, 'tpk_og_custom_meta', true)); ?></textarea>
                        </div>
                        <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                            <label><?php esc_html_e('Image', 'theme-powerkit'); ?></label>
                            <?php
                            $tpk_og_image = esc_url(get_post_meta($post->ID, 'tpk_og_image', true));
                            $image = "";
                            if ($tpk_og_image) {
                                $image = '<img src="' . esc_url($tpk_og_image) . '"/>';
                            } ?>
                            <div class="tpk-img-fields-wrap">
                                <div class="attachment-media-view">
                                    <div class="tpk-img-fields-wrap">
                                        <div class="tpk-attachment-media-view">
                                            <div class="tpk-attachment-child tpk-uploader">
                                                <button type="button" class="tpk-img-upload-button">
                                                    <span class="dashicons dashicons-upload tpk-icon tpk-icon-large"></span>
                                                </button>
                                                <input class="upload-id" name="tpk_og_image" type="hidden"
                                                       value="<?php echo esc_url($tpk_og_image); ?>"/>
                                            </div>
                                            <div class="tpk-attachment-child tpk-thumbnail-image">
                                                <button type="button"
                                                        class="tpk-img-delete-button <?php if ($tpk_og_image) {
                                                            echo 'tpk-img-show';
                                                        } ?>">
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
                    </div>
                </div>
                <div id="tpk-tab-ts-content" class="tpk-content-wrap">
                    <h3 class="tpk-meta-title"><?php esc_html_e('Twitter Summary Option', 'theme-powerkit'); ?></h3>
                    <div class="tpk-meta-panels tpk-twitter-panels">
                        <?php $tpk_ts_ed = esc_attr(get_post_meta($post->ID, 'tpk_ts_ed', true)); ?>
                        <div class="tpk-opt-wrap tpk-checkbox-wrap">
                            <input id="twitter-summery-checkbox" name="tpk_ts_ed" type="checkbox" <?php if ($tpk_ts_ed) { ?> checked="checked" <?php } ?> />
                            <label for="twitter-summery-checkbox"><?php esc_html_e('Disable Twitter Summary for this Post', 'theme-powerkit'); ?></label>
                        </div>
                        <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                            <label><?php esc_html_e('Title', 'theme-powerkit'); ?></label>
                            <input name="tpk_twitter_summary_title" type="text" value="<?php echo esc_attr(get_post_meta($post->ID, 'tpk_twitter_summary_title', true)); ?>"/>
                        </div>
                        <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                            <label><?php esc_html_e('Description', 'theme-powerkit'); ?></label>
                            <input name="tpk_twitter_summary_desc" type="text" value="<?php echo esc_attr(get_post_meta($post->ID, 'tpk_twitter_summary_desc', true)); ?>"/>
                        </div>
                        <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                            <label><?php esc_html_e('Twitter Username', 'theme-powerkit'); ?></label>
                            <input name="tpk_twitter_summary_username" type="text" value="<?php echo esc_attr(get_post_meta($post->ID, 'tpk_twitter_summary_username', true)); ?>"/>
                        </div>
                        <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                            <label><?php esc_html_e('Twitter Card', 'theme-powerkit'); ?></label>
                            <?php $tpk_twitter_summary_type = get_post_meta($post->ID, 'tpk_twitter_summary_type', true); ?>
                            <select name="tpk_twitter_summary_type">
                                <option value=""><?php esc_html_e('--Select--', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_twitter_summary_type == 'summary') {
                                    echo 'selected';
                                } ?> value="summary"><?php esc_html_e('Summary', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_twitter_summary_type == 'summary_large_image') {
                                    echo 'selected';
                                } ?> value="summary_large_image"><?php esc_html_e('Summary Large Image', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_twitter_summary_type == 'music.radio_station') {
                                    echo 'selected';
                                } ?> value="music.radio_station"><?php esc_html_e('music.radio_station', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_twitter_summary_type == 'app') {
                                    echo 'selected';
                                } ?> value="app"><?php esc_html_e('APP', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_twitter_summary_type == 'player') {
                                    echo 'selected';
                                } ?> value="player"><?php esc_html_e('Player', 'theme-powerkit'); ?></option>
                                <option <?php if ($tpk_twitter_summary_type == 'lead_generation') {
                                    echo 'selected';
                                } ?> value="lead_generation"><?php esc_html_e('Lead Generation', 'theme-powerkit'); ?></option>
                            </select>
                        </div>
                        <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                            <label><?php esc_html_e('Custom Tags', 'theme-powerkit'); ?></label>
                            <textarea name="tpk_twitter_summary_custom_meta"><?php echo theme_powerkit_meta_sanitize(get_post_meta($post->ID, 'tpk_twitter_summary_custom_meta', true)); ?></textarea>
                        </div>
                        <div class="tpk-opt-wrap tpk-opt-wrap-alt">
                            <label><?php esc_html_e('Image', 'theme-powerkit'); ?></label>
                            <?php
                            $tpk_twitter_summary_image = esc_url(get_post_meta($post->ID, 'tpk_twitter_summary_image', true));
                            $image = "";
                            if ($tpk_twitter_summary_image) {
                                $image = '<img src="' . esc_url($tpk_twitter_summary_image) . '"/>';
                            } ?>
                            <div class="tpk-img-fields-wrap">
                                <div class="attachment-media-view">
                                    <div class="tpk-img-fields-wrap">
                                        <div class="tpk-attachment-media-view">
                                            <div class="tpk-attachment-child tpk-uploader">
                                                <button type="button" class="tpk-img-upload-button">
                                                    <span class="dashicons dashicons-upload tpk-icon tpk-icon-large"></span>
                                                </button>
                                                <input class="upload-id" name="tpk_twitter_summary_image"
                                                       type="hidden"
                                                       value="<?php echo esc_url($tpk_twitter_summary_image); ?>"/>
                                            </div>
                                            <div class="tpk-attachment-child tpk-thumbnail-image">
                                                <button type="button"
                                                        class="tpk-img-delete-button <?php if ($tpk_twitter_summary_image) {
                                                            echo 'tpk-img-show';
                                                        } ?>">
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
                    </div>
                </div>
            </div>
        </div>
    <?php }
endif;
// Save metabox value.
add_action('save_post', 'theme_powerkit_save_og_meta');
if (!function_exists('theme_powerkit_save_og_meta')):
    function theme_powerkit_save_og_meta($post_id)
    {
        global $post;
        if (!isset($_POST['theme_powerkit_post_og_meta']) || !wp_verify_nonce(wp_unslash($_POST['theme_powerkit_post_og_meta']), basename(__FILE__)))
            return;
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id))
                return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
        /**
         * Open Graph
         **/
        $tpk_og_ed_old = esc_html(get_post_meta($post_id, 'tpk_og_ed', true));
        $tpk_og_ed_news = sanitize_text_field(wp_unslash($_POST['tpk_og_ed']));
        $tpk_og_title_old = esc_html(get_post_meta($post_id, 'tpk_og_title', true));
        $tpk_og_title_news = sanitize_text_field(wp_unslash($_POST['tpk_og_title']));
        $tpk_og_desc_old = esc_html(get_post_meta($post_id, 'tpk_og_desc', true));
        $tpk_og_desc_news = sanitize_text_field(wp_unslash($_POST['tpk_og_desc']));
        $tpk_og_url_old = esc_url(get_post_meta($post_id, 'tpk_og_url', true));
        $tpk_og_url_news = esc_url_raw(wp_unslash($_POST['tpk_og_url']));
        $tpk_og_type_old = esc_html(get_post_meta($post_id, 'tpk_og_type', true));
        $tpk_og_type_news = sanitize_text_field(wp_unslash($_POST['tpk_og_type']));
        $tpk_og_custom_meta_old = theme_powerkit_meta_sanitize(get_post_meta($post_id, 'tpk_og_custom_meta', true));
        $tpk_og_custom_meta_news = theme_powerkit_meta_sanitize(wp_unslash($_POST['tpk_og_custom_meta']));
        $tpk_og_image_old = esc_url(get_post_meta($post_id, 'tpk_og_image', true));
        $tpk_og_image_news = esc_url_raw(wp_unslash($_POST['tpk_og_image']));
        if ($tpk_og_ed_news && $tpk_og_ed_news != $tpk_og_ed_old) {
            update_post_meta($post_id, 'tpk_og_ed', $tpk_og_ed_news);
        } elseif ('' == $tpk_og_ed_news && $tpk_og_ed_old) {
            delete_post_meta($post_id, 'tpk_og_ed', $tpk_og_ed_old);
        }
        if ($tpk_og_title_news && $tpk_og_title_news != $tpk_og_title_old) {
            update_post_meta($post_id, 'tpk_og_title', $tpk_og_title_news);
        } elseif ('' == $tpk_og_title_news && $tpk_og_title_old) {
            delete_post_meta($post_id, 'tpk_og_title', $tpk_og_title_old);
        }
        if ($tpk_og_desc_news && $tpk_og_desc_news != $tpk_og_desc_old) {
            update_post_meta($post_id, 'tpk_og_desc', $tpk_og_desc_news);
        } elseif ('' == $tpk_og_desc_news && $tpk_og_desc_old) {
            delete_post_meta($post_id, 'tpk_og_desc', $tpk_og_desc_old);
        }
        if ($tpk_og_url_news && $tpk_og_url_news != $tpk_og_url_old) {
            update_post_meta($post_id, 'tpk_og_url', $tpk_og_url_news);
        } elseif ('' == $tpk_og_url_news && $tpk_og_url_old) {
            delete_post_meta($post_id, 'tpk_og_url', $tpk_og_url_old);
        }
        if ($tpk_og_type_news && $tpk_og_type_news != $tpk_og_type_old) {
            update_post_meta($post_id, 'tpk_og_type', $tpk_og_type_news);
        } elseif ('' == $tpk_og_type_news && $tpk_og_type_old) {
            delete_post_meta($post_id, 'tpk_og_type', $tpk_og_type_old);
        }
        if ($tpk_og_custom_meta_news && $tpk_og_custom_meta_news != $tpk_og_custom_meta_old) {
            update_post_meta($post_id, 'tpk_og_custom_meta', $tpk_og_custom_meta_news);
        } elseif ('' == $tpk_og_custom_meta_news && $tpk_og_custom_meta_old) {
            delete_post_meta($post_id, 'tpk_og_custom_meta', $tpk_og_custom_meta_old);
        }
        if ($tpk_og_image_news && $tpk_og_image_news != $tpk_og_image_old) {
            update_post_meta($post_id, 'tpk_og_image', $tpk_og_image_news);
        } elseif ('' == $tpk_og_image_news && $tpk_og_image_old) {
            delete_post_meta($post_id, 'tpk_og_image', $tpk_og_image_old);
        }
        /**
         * Twitter SUmmary
         **/
        $tpk_ts_ed_old = esc_html(get_post_meta($post_id, 'tpk_ts_ed', true));
        $tpk_ts_ed_news = sanitize_text_field(wp_unslash($_POST['tpk_ts_ed']));
        $tpk_twitter_summary_title_old = esc_html(get_post_meta($post_id, 'tpk_twitter_summary_title', true));
        $tpk_twitter_summary_title_news = sanitize_text_field(wp_unslash($_POST['tpk_twitter_summary_title']));
        $tpk_twitter_summary_desc_old = esc_html(get_post_meta($post_id, 'tpk_twitter_summary_desc', true));
        $tpk_twitter_summary_desc_news = sanitize_text_field(wp_unslash($_POST['tpk_twitter_summary_desc']));
        $tpk_twitter_summary_username_old = esc_html(get_post_meta($post_id, 'tpk_twitter_summary_username', true));
        $tpk_twitter_summary_username_news = sanitize_text_field(wp_unslash($_POST['tpk_twitter_summary_username']));
        $tpk_twitter_summary_type_old = esc_html(get_post_meta($post_id, 'tpk_twitter_summary_type', true));
        $tpk_twitter_summary_type_news = sanitize_text_field(wp_unslash($_POST['tpk_twitter_summary_type']));
        $tpk_twitter_summary_custom_meta_old = theme_powerkit_meta_sanitize(get_post_meta($post_id, 'tpk_twitter_summary_custom_meta', true));
        $tpk_twitter_summary_custom_meta_news = theme_powerkit_meta_sanitize(wp_unslash($_POST['tpk_twitter_summary_custom_meta']));
        $tpk_twitter_summary_image_old = esc_url(get_post_meta($post_id, 'tpk_twitter_summary_image', true));
        $tpk_twitter_summary_image_news = esc_url_raw(wp_unslash($_POST['tpk_twitter_summary_image']));
        if ($tpk_ts_ed_news && $tpk_ts_ed_news != $tpk_ts_ed_old) {
            update_post_meta($post_id, 'tpk_ts_ed', $tpk_ts_ed_news);
        } elseif ('' == $tpk_ts_ed_news && $tpk_ts_ed_old) {
            delete_post_meta($post_id, 'tpk_ts_ed', $tpk_ts_ed_old);
        }
        if ($tpk_twitter_summary_title_news && $tpk_twitter_summary_title_news != $tpk_twitter_summary_title_old) {
            update_post_meta($post_id, 'tpk_twitter_summary_title', $tpk_twitter_summary_title_news);
        } elseif ('' == $tpk_twitter_summary_title_news && $tpk_twitter_summary_title_old) {
            delete_post_meta($post_id, 'tpk_twitter_summary_title', $tpk_twitter_summary_title_old);
        }
        if ($tpk_twitter_summary_desc_news && $tpk_twitter_summary_desc_news != $tpk_twitter_summary_desc_old) {
            update_post_meta($post_id, 'tpk_twitter_summary_desc', $tpk_twitter_summary_desc_news);
        } elseif ('' == $tpk_twitter_summary_desc_news && $tpk_twitter_summary_desc_old) {
            delete_post_meta($post_id, 'tpk_twitter_summary_desc', $tpk_twitter_summary_desc_old);
        }
        if ($tpk_twitter_summary_username_news && $tpk_twitter_summary_username_news != $tpk_twitter_summary_username_old) {
            update_post_meta($post_id, 'tpk_twitter_summary_username', $tpk_twitter_summary_username_news);
        } elseif ('' == $tpk_twitter_summary_username_news && $tpk_twitter_summary_username_old) {
            delete_post_meta($post_id, 'tpk_twitter_summary_username', $tpk_twitter_summary_username_old);
        }
        if ($tpk_twitter_summary_type_news && $tpk_twitter_summary_type_news != $tpk_twitter_summary_type_old) {
            update_post_meta($post_id, 'tpk_twitter_summary_type', $tpk_twitter_summary_type_news);
        } elseif ('' == $tpk_twitter_summary_type_news && $tpk_twitter_summary_type_old) {
            delete_post_meta($post_id, 'tpk_twitter_summary_type', $tpk_twitter_summary_type_old);
        }
        if ($tpk_twitter_summary_custom_meta_news && $tpk_twitter_summary_custom_meta_news != $tpk_twitter_summary_custom_meta_old) {
            update_post_meta($post_id, 'tpk_twitter_summary_custom_meta', $tpk_twitter_summary_custom_meta_news);
        } elseif ('' == $tpk_twitter_summary_custom_meta_news && $tpk_twitter_summary_custom_meta_old) {
            delete_post_meta($post_id, 'tpk_twitter_summary_custom_meta', $tpk_twitter_summary_custom_meta_old);
        }
        if ($tpk_twitter_summary_image_news && $tpk_twitter_summary_image_news != $tpk_twitter_summary_image_old) {
            update_post_meta($post_id, 'tpk_twitter_summary_image', $tpk_twitter_summary_image_news);
        } elseif ('' == $tpk_twitter_summary_image_news && $tpk_twitter_summary_image_old) {
            delete_post_meta($post_id, 'tpk_twitter_summary_image', $tpk_twitter_summary_image_old);
        }
    }
endif;