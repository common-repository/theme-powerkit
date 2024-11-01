<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_shortcode( 'tpk-track-visit', 'theme_powerkit_set_post_view' );
add_shortcode( 'tpk-visit-count', 'theme_powerkit_get_post_view' );

function theme_powerkit_get_post_view() {

    $count = absint( get_post_meta( get_the_ID(), 'post_views_count', true ) );
    return $count;

}

// Track Count While Visit Page
function theme_powerkit_set_post_view() {

    if( !current_user_can('editor') && !current_user_can('administrator') ) {
        
        $key = 'post_views_count';
        $post_id = get_the_ID();
        $count = absint( get_post_meta( $post_id, $key, true ) );
        $count++;
        update_post_meta( $post_id, $key, $count );

        $date = esc_html( current_time('Y-m-d') );
        $visited_data = array();
        $visited_data =  get_option('tpk_visited_date');
        
        if( empty( $visited_data) ){
            $visited_data = array();
        }

        if( array_key_exists( $date,$visited_data ) ){
            
            $i = 0;
            $id_array = array();

            foreach( $visited_data[$date] as $value ){
                
                $id_array[] = absint( $value['post_id'] );

                if( $value['post_id'] == $post_id ){

                    $value['post_id'];
                    $newvisit = absint( $value['post_visited']+1 );
                    $visited_data[$date][$i]['post_visited'] = absint( $newvisit );

                }

            $i++;
            }

            if( !in_array($post_id, $id_array) ){

                $visited_data[$date][] = array('post_id' => absint( $post_id ), 'post_visited' => '1' );
            }

        }else{
            $visited_data[$date] = array(
                    array('post_id' => absint( $post_id ), 'post_visited' => '1' ),
                );
        }

        $visited =  array( 
            $date => array(
                array('post_id' => absint( $post_id ), 'post_visited' => '1' ),
            ),
        );

        $visited_data = array_slice($visited_data, 0, 100, true);

        update_option('tpk_visited_date',$visited_data);
    
    }

}


function theme_powerkit_posts_visits($days){

    $visited = array();
    $visited =  get_option('tpk_visited_date');
    $id_views_lists = array();

    if( $visited ){

        foreach( $visited as $key => $value ){
            

            $now = time();
            $your_date = strtotime( $key );
            $datediff = $now - $your_date;
            $datediff = round($datediff / (60 * 60 * 24));

            if( $datediff <= $days ){

                foreach( $value as $value2 ){

                    if( array_key_exists( $value2['post_id'], $id_views_lists) ){

                        $visited_posts = absint( $id_views_lists[$value2['post_id']] ) + absint( $value2['post_visited'] );
                        $id_views_lists[ $value2['post_id'] ] = absint( $visited_posts );

                    }else{
                        $id_views_lists[ $value2['post_id'] ] = absint( $value2['post_visited'] );
                    }
                }

            }

        }
    }
    return $id_views_lists;

}
// Column Name
function theme_powerkit_posts_column_views( $columns ) {

    $columns['post_views'] = esc_html__('Views','theme-powerkit');
    return $columns;

}

// Show views count on post list column
function theme_powerkit_posts_custom_column_views( $column ) {

    if ( $column === 'post_views') {
        echo absint( theme_powerkit_get_post_view() );
    }

}
add_filter( 'manage_posts_columns', 'theme_powerkit_posts_column_views' );
add_action( 'manage_posts_custom_column', 'theme_powerkit_posts_custom_column_views' );