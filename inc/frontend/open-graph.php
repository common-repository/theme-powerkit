<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
* Open Graph Tools.
*
* @package Theme Powerkit
*/



add_action( 'wp_head', 'theme_powerkit_opengraph',1 );
/**
 * Open Graph Meta.
 *
 * @since  1.0.0
 *
 * @return void
 */
function theme_powerkit_opengraph() {
    
    $tpk_settings = get_option( 'tpk_options_settings' );
    $tpk_ed_open_graph =  isset( $tpk_settings[ 'tpk_enable_opengraph' ] ) ? $tpk_settings['tpk_enable_opengraph'] : '1';
    
    if( $tpk_ed_open_graph && ( is_home() || is_front_page() || is_page() || is_single() || is_archive() ) ){

        global $post;
        $post_id = $post->ID;
        
        $tpk_open_graph_title =  isset( $tpk_settings[ 'tpk_open_graph_title' ] ) ? $tpk_settings['tpk_open_graph_title'] : get_bloginfo('name');
        $tpk_open_graph_desc =  isset( $tpk_settings[ 'tpk_open_graph_desc' ] ) ? $tpk_settings['tpk_open_graph_desc'] : get_bloginfo('description');
        $tpk_open_graph_site_name =  isset( $tpk_settings[ 'tpk_open_graph_site_name' ] ) ? $tpk_settings['tpk_open_graph_site_name'] : get_bloginfo('description');
        $tpk_open_graph_site_type =  isset( $tpk_settings[ 'tpk_open_graph_site_type' ] ) ? $tpk_settings['tpk_open_graph_site_type'] : '';
        $tpk_open_graph_url =  isset( $tpk_settings[ 'tpk_open_graph_url' ] ) ? $tpk_settings['tpk_open_graph_url'] : home_url();
        $tpk_open_graph_locole =  isset( $tpk_settings[ 'tpk_open_graph_locole' ] ) ? $tpk_settings['tpk_open_graph_locole'] : 'en_US';
        $tpk_open_graph_home_default_image =  isset( $tpk_settings[ 'tpk_open_graph_home_image' ] ) ? $tpk_settings['tpk_open_graph_home_image'] : '';
        $tpk_open_graph_custom_meta =  isset( $tpk_settings[ 'tpk_open_graph_custom_meta' ] ) ? $tpk_settings['tpk_open_graph_custom_meta'] : '';

        $tpk_og_ed = false;
        if( is_single() || is_page() ){
            $tpk_og_ed = esc_html( get_post_meta( $post_id, 'tpk_og_ed', true ) ); 
            $tpk_og_type = esc_html( get_post_meta( $post->ID, 'tpk_og_type', true ) );
            $tpk_og_title = esc_html( get_post_meta( $post->ID, 'tpk_og_title', true ) );
            $tpk_og_desc = esc_html( get_post_meta( $post->ID, 'tpk_og_desc', true ) );
            $tpk_og_url = esc_html( get_post_meta( $post->ID, 'tpk_og_url', true ) );
            $tpk_og_custom_meta = theme_powerkit_meta_sanitize( get_post_meta( $post->ID, 'tpk_og_custom_meta', true ) );
            $tpk_og_image = esc_html( get_post_meta( $post->ID, 'tpk_og_image', true ) );

        }
        if( $tpk_og_ed && ( is_single() || is_page() ) ){
            return;
        }
        
        if( $tpk_open_graph_locole ){ ?>
            <meta property="og:locale" content="<?php echo esc_html( $tpk_open_graph_locole ); ?>">
        <?php }

        if( is_single() || is_page() ){

            if( $tpk_og_type ){
                $tpk_open_graph_site_type = $tpk_og_type;
            }
            if( $tpk_open_graph_site_type ){ ?>
                <meta property="og:type" content="<?php echo esc_html( $tpk_open_graph_site_type ); ?>">
            <?php }

        }else{

            if( $tpk_open_graph_site_type ){ ?>
                <meta property="og:type" content="<?php echo esc_html( $tpk_open_graph_site_type ); ?>">
            <?php }
            

        }

        if( $tpk_open_graph_site_name ){ ?>
            <meta property="og:site_name" content="<?php echo esc_html( $tpk_open_graph_site_name ); ?>">
        <?php }

        if( is_single() || is_page() || is_archive() ){

            if( is_single() || is_page() ){

                $tpk_open_graph_title = get_the_title( $post_id );
                if( $tpk_og_title ){
                    $tpk_open_graph_title = $tpk_og_title;
                } ?>
                <meta property="og:title" content="<?php echo esc_html( $tpk_open_graph_title ); ?>">

            <?php
            }else{

                $tpk_open_graph_title = get_the_archive_title( $before = '', $after = '' ); ?>
                <meta property="og:title" content="<?php echo esc_html( $tpk_open_graph_title ); ?>">

            <?php
            }

        }else{

            if( $tpk_open_graph_title ){ ?>
                <meta property="og:title" content="<?php echo esc_html( $tpk_open_graph_title ); ?>">
            <?php }

        }

        if( is_single() || is_page() ){

            if( has_excerpt() ){
              $tpk_open_graph_desc = esc_html( get_the_excerpt() );
            }else{
                
                $content_post = get_post($post_id);
                $content = $content_post->post_content;
                if( $content ){
                    $tpk_open_graph_desc = esc_html( wp_trim_words( $content,10,'...') );
                }

            }
            if( $tpk_og_desc ){
                $tpk_open_graph_desc = $tpk_og_desc;
            }

            if( $tpk_open_graph_desc ){
                ?>
                <meta property="og:description" content="<?php echo esc_html( $tpk_open_graph_desc ); ?>">
                <?php
            }

        }elseif( get_the_archive_description() && is_archive() ){

            if( get_the_archive_description() ){ ?>
                <meta property="og:description" content="<?php echo esc_html( get_the_archive_description() ); ?>">
            <?php }

        }else{
            if( $tpk_open_graph_desc ){ ?>
                <meta property="og:description" content="<?php echo esc_html( $tpk_open_graph_desc ); ?>">
            <?php }
        }

        if( is_single() || is_page() ){

            $tpk_open_graph_url = get_the_permalink();
            if( $tpk_og_url ){
                $tpk_open_graph_url = $tpk_og_url;
            } ?>
            <meta property="og:url" content="<?php echo esc_url( $tpk_open_graph_url ); ?>">
        <?php
        }else{

            if( $tpk_open_graph_url ){ ?>
                <meta property="og:url" content="<?php echo esc_url( $tpk_open_graph_url ); ?>">
            <?php }

        }

        if( is_single() || is_page() ){

            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'large' );

            if( $featured_image[0] ){

                $tpk_open_graph_home_default_image = $featured_image[0];

            }
            if( $tpk_og_image ){

                $tpk_open_graph_home_default_image = $tpk_og_image;

            }
            if( $tpk_open_graph_home_default_image ){ ?>
                
                <meta property="og:image" content="<?php echo esc_url( $tpk_open_graph_home_default_image ); ?>">
                <meta property="og:image:secure_url" content="<?php echo esc_url( $tpk_open_graph_home_default_image ); ?>" />
                <meta property="og:image:alt" content="<?php echo esc_url( $tpk_open_graph_title ); ?>" />

            <?php } ?>

        <?php
        }else{

            if( $tpk_open_graph_home_default_image ){ ?>
                
                <meta property="og:image" content="<?php echo esc_attr( $tpk_open_graph_home_default_image ); ?>">
                <meta property="og:image:secure_url" content="<?php echo esc_attr( $tpk_open_graph_home_default_image ); ?>" />
                <meta property="og:image:alt" content="<?php echo esc_attr( $tpk_open_graph_title ); ?>" />

            <?php }

        }

        if( is_single() || is_page() ){

            if( $tpk_og_custom_meta ){
                echo theme_powerkit_meta_sanitize( $tpk_og_custom_meta );
            }

        }else{
            if( $tpk_open_graph_custom_meta ){

                echo $tpk_open_graph_custom_meta;
            }
        }

    }

}