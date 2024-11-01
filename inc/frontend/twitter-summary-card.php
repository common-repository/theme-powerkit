<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
* Open Graph Tools.
*
* @package Theme Powerkit
*/



add_action( 'wp_head', 'theme_powerkit_twitter_summary_card',1 );
/**
 * Open Graph Meta.
 *
 * @since  1.0.0
 *
 * @return void
 */
function theme_powerkit_twitter_summary_card() {
    
    $tpk_settings = get_option( 'tpk_options_settings' );
    $tpk_ed_twitter_summary =  isset( $tpk_settings[ 'tpk_ed_twitter_summary' ] ) ? $tpk_settings['tpk_ed_twitter_summary'] : '1';

    if( $tpk_ed_twitter_summary && ( is_home() || is_front_page() || is_page() || is_single() || is_archive() ) ){

        global $post;
        $post_id = $post->ID;
        
        $tpk_twitter_summary_title =  isset( $tpk_settings[ 'tpk_twitter_summary_title' ] ) ? $tpk_settings['tpk_twitter_summary_title'] : get_bloginfo('name');
        $tpk_twitter_summary_desc =  isset( $tpk_settings[ 'tpk_twitter_summary_desc' ] ) ? $tpk_settings['tpk_twitter_summary_desc'] : get_bloginfo('description');
        $tpk_twittwer_summary_user =  isset( $tpk_settings[ 'tpk_twitter_summary_user' ] ) ? $tpk_settings['tpk_twitter_summary_user'] : '';
        $tpk_twitter_summary_site_type =  isset( $tpk_settings[ 'tpk_twitter_summary_site_type' ] ) ? $tpk_settings['tpk_twitter_summary_site_type'] : '';
        $tpk_twitter_summary_home_default_image =  isset( $tpk_settings[ 'tpk_twitter_summary_home_default_image' ] ) ? $tpk_settings['tpk_twitter_summary_home_default_image'] : '';
        $tpk_twitter_summary_custom_meta =  isset( $tpk_settings[ 'tpk_twitter_summary_custom_meta' ] ) ? $tpk_settings['tpk_twitter_summary_custom_meta'] : '';

        if( is_single() || is_page() ){

            $tpk_ts_ed = esc_html( get_post_meta( $post_id, 'tpk_ts_ed', true ) ); 
            if( $tpk_ts_ed ){
                return;
            }

            $tpk_twitter_summary_title_metabox = esc_html( get_post_meta( $post->ID, 'tpk_twitter_summary_title', true ) );
            $tpk_twitter_summary_desc_metabox = esc_html( get_post_meta( $post->ID, 'tpk_twitter_summary_desc', true ) );
            $tpk_twitter_summary_username_metabox = esc_html( get_post_meta( $post->ID, 'tpk_twitter_summary_username', true ) );
            $tpk_twitter_summary_type_metabox = esc_html( get_post_meta( $post->ID, 'tpk_twitter_summary_type', true ) );
            $tpk_twitter_summary_custom_meta_metabox = theme_powerkit_meta_sanitize( get_post_meta( $post->ID, 'tpk_twitter_summary_custom_meta', true ) );
            $tpk_twitter_summary_image_metabox = esc_url( get_post_meta( $post->ID, 'tpk_twitter_summary_image', true ) );

            if( $tpk_twitter_summary_username_metabox ){
                $tpk_twittwer_summary_user = $tpk_twitter_summary_username_metabox;
            }

            if( $tpk_twittwer_summary_user ){ ?>
                <meta property="twitter:site" content="<?php echo esc_attr( $tpk_twittwer_summary_user ); ?>">
                <meta property="twitter:creator" content="<?php echo esc_attr( $tpk_twittwer_summary_user ); ?>">
            <?php }

        }else{

            if( $tpk_twittwer_summary_user ){ ?>
                <meta property="twitter:site" content="<?php echo esc_attr( $tpk_twittwer_summary_user ); ?>">
                <meta property="twitter:creator" content="<?php echo esc_attr( $tpk_twittwer_summary_user ); ?>">
            <?php }

        }

        if( is_single() || is_page() ){

            if( $tpk_twitter_summary_type_metabox ){
                $tpk_twitter_summary_site_type = $tpk_twitter_summary_type_metabox;
            }
            if( $tpk_twitter_summary_site_type ){ ?>
                <meta property="twitter:card" content="<?php echo esc_attr( $tpk_twitter_summary_site_type ); ?>">
            <?php }

        }else{

            if( $tpk_twitter_summary_site_type ){ ?>
                <meta property="twitter:card" content="<?php echo esc_attr( $tpk_twitter_summary_site_type ); ?>">
            <?php }

        }

        if( is_single() || is_page() || is_archive() ){

            if( is_single() || is_page() ){

                $tpk_twitter_summary_title = get_the_title( $post_id );

                if( $tpk_twitter_summary_title_metabox ){
                    $tpk_twitter_summary_title = $tpk_twitter_summary_title_metabox;
                } ?>
                <meta property="twitter:title" content="<?php echo esc_attr( $tpk_twitter_summary_title ); ?>">

            <?php }else{

                $tpk_twitter_summary_title = get_the_archive_title( $before = '', $after = '' ); ?>
                <meta property="twitter:title" content="<?php echo esc_attr( $tpk_twitter_summary_title ); ?>">

            <?php
            }

        }else{

            if( $tpk_twitter_summary_title ){ ?>
                <meta property="twitter:title" content="<?php echo esc_attr( $tpk_twitter_summary_title ); ?>">
            <?php }

        }

        if( is_single() || is_page()){

            if( has_excerpt() ){
              $tpk_twitter_summary_desc = esc_html( get_the_excerpt() );
            }else{
                
                $content_post = get_post($post_id);
                $content = $content_post->post_content;
                if( $content ){
                    $tpk_twitter_summary_desc = esc_html( wp_trim_words( $content,20,'...') );
                }

            }

            if( $tpk_twitter_summary_desc_metabox ){
                $tpk_twitter_summary_desc = $tpk_twitter_summary_desc_metabox;
            }
            if( $tpk_twitter_summary_desc ){ ?>
                <meta property="twitter:description" content="<?php echo esc_attr( $tpk_twitter_summary_desc ); ?>">
            <?php
            }

        }else{
            if( $tpk_twitter_summary_desc ){ ?>
                <meta property="twitter:description" content="<?php echo esc_attr( $tpk_twitter_summary_desc ); ?>">
            <?php }
        }

        if( is_single() || is_page() ){

            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'large' );

            if( $featured_image[0] ){

                $tpk_twitter_summary_home_default_image = $featured_image[0];

            }
            if( $tpk_twitter_summary_image_metabox ){
                $tpk_twitter_summary_home_default_image = $tpk_twitter_summary_image_metabox;
            }
            if( $tpk_twitter_summary_home_default_image ){ ?>
                
                <meta property="twitter:image" content="<?php echo esc_attr( $tpk_twitter_summary_home_default_image ); ?>">

            <?php } ?>

        <?php
        }else{

            if( $tpk_twitter_summary_home_default_image ){ ?>
                
                <meta property="twitter:image" content="<?php echo esc_attr( $tpk_twitter_summary_home_default_image ); ?>">

            <?php }

        }
        
        if( is_single() || is_page() ){

            if( $tpk_twitter_summary_custom_meta_metabox ){
                echo theme_powerkit_meta_sanitize( $tpk_twitter_summary_custom_meta_metabox );
            }

        }else{
            if( $tpk_twitter_summary_custom_meta ){

                echo $tpk_twitter_summary_custom_meta;
            }
        }

    }

}