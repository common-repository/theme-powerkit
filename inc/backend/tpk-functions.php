<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! function_exists( 'theme_powerkit_meta_sanitize' ) ) :

	/**
	 * Sanitize Meta Bozes.
	 */
	function theme_powerkit_meta_sanitize( $input ) {

		$allowed_html = array(
						    'meta' => array(
						        'property' => array(),
						        'content' => array(),
						        'name' => array(),
						    ),
						);

		return wp_kses( $input, $allowed_html );

	}

endif;

if ( ! function_exists( 'theme_powerkit_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function theme_powerkit_posted_by() {
		
		$tpk_settings = get_option( 'tpk_options_settings' );
		$tpk_posted_by = isset( $tpk_settings[ 'tpk_posted_by' ] ) ? $tpk_settings[ 'tpk_posted_by' ] : '';

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( $tpk_posted_by.' %s', 'post author', 'theme-powerkit' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'theme_powerkit_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function theme_powerkit_posted_on() {

		$tpk_settings = get_option( 'tpk_options_settings' );
        $tpk_posted_on = isset( $tpk_settings[ 'tpk_posted_on' ] ) ? $tpk_settings[ 'tpk_posted_on' ] : '';

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( $tpk_posted_on.' %s', 'post date', 'theme-powerkit' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if( !function_exists( 'theme_powerkit_fonts_url' ) ) :

    //Google Fonts URL
    function theme_powerkit_fonts_url(){

        $fonts_url = '';
        $fonts = array();

        $aioes_font = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';

        $aioes_fonts = array();
        $aioes_fonts[] = $aioes_font;

        $aioes_fonts_stylesheet = '//fonts.googleapis.com/css?family=';

        $i = 0;
        for ( $i = 0; $i < count( $aioes_fonts ); $i++ ) {

            if ( 'off' !== sprintf( _x( 'on', '%s font: on or off', 'theme-powerkit' ), $aioes_fonts[$i] ) ) {
                $fonts[] = $aioes_fonts[$i];
            }

        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urldecode( implode( '|', $fonts ) ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw($fonts_url);
    }

endif;