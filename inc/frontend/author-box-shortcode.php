<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

if( !empty( $_POST['userid'] ) ){
	$userid = absint( $_POST['userid'] );
}else{
	if( is_single() ){
		$userid = $post->post_author;
	}else{
		$userid = 1;
	}
	
}
$tpk_show_author_email = '';
if( !empty( $_POST['email'] ) ){
	$tpk_show_author_email = esc_html( $_POST['email'] );
}

$tpk_show_author_url = '';
if( !empty( $_POST['url'] ) ){
	$tpk_show_author_url = esc_html( $_POST['url'] );
}

$tpk_show_author_title = '';
if( !empty( $_POST['title'] ) ){
	$tpk_show_author_title = esc_html( $_POST['title'] );
}

$tpk_show_author_role = '';
if( !empty( $_POST['role'] ) ){
	$tpk_show_author_role = esc_html( $_POST['role'] );
}

$author_img = get_avatar( $userid, 400, '', '', array('class' => 'avatar-img') );
$author_name = esc_html( get_the_author_meta('display_name', $userid) );
$author_user_url = esc_url( get_the_author_meta('user_url', $userid) );
$author_description = esc_html( get_the_author_meta('description', $userid) );
$author_email = esc_html( get_the_author_meta('user_email', $userid) );
$author_post_url = esc_url( get_author_posts_url( $userid ) );

$user_data = get_userdata( $userid );
$user_role = $user_data->roles[0];

$tpk_user_metabox_facebook = get_the_author_meta( 'tpk_user_metabox_facebook',$userid );
$tpk_user_metabox_twitter = get_the_author_meta( 'tpk_user_metabox_twitter',$userid );
$tpk_user_metabox_instagram = get_the_author_meta( 'tpk_user_metabox_instagram',$userid );
$tpk_user_metabox_pinterest = get_the_author_meta( 'tpk_user_metabox_pinterest',$userid );
$tpk_user_metabox_linkedin = get_the_author_meta( 'tpk_user_metabox_linkedin',$userid );
$tpk_user_metabox_youtube = get_the_author_meta( 'tpk_user_metabox_youtube',$userid );
$tpk_user_metabox_vimeo = get_the_author_meta( 'tpk_user_metabox_vimeo',$userid );
$tpk_user_metabox_whatsapp = get_the_author_meta( 'tpk_user_metabox_whatsapp',$userid );
$tpk_user_metabox_github = get_the_author_meta( 'tpk_user_metabox_github',$userid );
$tpk_user_metabox_wordpress = get_the_author_meta( 'tpk_user_metabox_wordpress',$userid );
$tpk_user_metabox_foursquare = get_the_author_meta( 'tpk_user_metabox_foursquare',$userid );
$tpk_user_metabox_vk = get_the_author_meta( 'tpk_user_metabox_vk',$userid );
$tpk_user_metabox_twitch = get_the_author_meta( 'tpk_user_metabox_twitch',$userid );
$tpk_user_metabox_tumblr = get_the_author_meta( 'tpk_user_metabox_tumblr',$userid );
$tpk_user_metabox_snapchat = get_the_author_meta( 'tpk_user_metabox_snapchat',$userid );
$tpk_user_metabox_skype = get_the_author_meta( 'tpk_user_metabox_skype',$userid );
$tpk_user_metabox_reddit = get_the_author_meta( 'tpk_user_metabox_reddit',$userid );
$tpk_user_metabox_stackoverflow = get_the_author_meta( 'tpk_user_metabox_stackoverflow',$userid );
$tpk_user_metabox_xing = get_the_author_meta( 'tpk_user_metabox_xing',$userid );
$tpk_user_metabox_delicious = get_the_author_meta( 'tpk_user_metabox_delicious',$userid );
$tpk_user_metabox_soundcloud = get_the_author_meta( 'tpk_user_metabox_soundcloud',$userid );
$tpk_user_metabox_behance = get_the_author_meta( 'tpk_user_metabox_behance',$userid );
$tpk_user_metabox_steam = get_the_author_meta( 'tpk_user_metabox_steam',$userid );
$tpk_user_metabox_dribbble = get_the_author_meta( 'tpk_user_metabox_dribbble',$userid );
$tpk_user_metabox_blogger = get_the_author_meta( 'tpk_user_metabox_blogger',$userid );
$tpk_user_metabox_flickr = get_the_author_meta( 'tpk_user_metabox_flickr',$userid );
$tpk_user_metabox_spotify = get_the_author_meta( 'tpk_user_metabox_spotify',$userid );
$tpk_user_metabox_rss = get_the_author_meta( 'tpk_user_metabox_rss',$userid );
?>

<div class="tpk-author-details">
    <div class="author-details-wrapper">
        <div class="tpk-row">
            <div class="tpk-column tpk-column-two tpk-column-mobile">
                <div class="author-image">
                    <?php echo wp_kses_post( $author_img ); ?>
                </div>
            </div>

            <div class="tpk-column tpk-column-eight tpk-column-mobile">
                <div class="author-details">
                    <?php if( $tpk_show_author_title ){ ?>
                        <header class="tpk-plugin-title tpk-author-title">
                            <h2><?php echo esc_html( $tpk_show_author_title ); ?></h2>
                        </header>
                    <?php } ?>

                    <h4 class="author-name">
                        <a href="<?php echo esc_url( $author_post_url ); ?>">
                            <?php echo esc_html( $author_name ); ?>
                        </a>
                    </h4>

                    <?php if ( $author_description ) { ?>
                        <div class="author-description"><?php echo esc_html( $author_description ); ?></div>
                    <?php } ?>

                    <?php if ( $author_email && $tpk_show_author_email ) { ?>
                        <div class="author-email">
                            <a href="mailto: <?php echo esc_html( $author_email ); ?>">
                                <i class="tpk-icon tpk-mail-envelope"></i> <?php echo esc_html( $author_email ); ?>
                            </a>
                        </div>
                    <?php } ?>

                    <?php if ( $author_user_url && $tpk_show_author_url ) { ?>
                        <div class="author-url">

                            <a href="<?php echo esc_url( $author_user_url ); ?>" target="_blank">
                                <i class="tpk-icon tpk-sphere"></i><?php echo esc_url( $author_user_url ); ?>
                            </a>
                        </div>
                    <?php } ?>

                    <?php if ( $user_role && $tpk_show_author_role ) { ?>
                        <div class="author-role">
                                <i class="tpk-icon tpk-person"></i> <?php echo esc_html( $user_role ); ?>
                        </div>
                    <?php } ?>

                </div>

                <div class="author-social-links">

                	<?php if( $tpk_user_metabox_facebook){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_facebook ); ?>"><i class="tpk-icon tpk-facebook"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_twitter){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_twitter ); ?>"><i class="tpk-icon tpk-twitter"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_instagram){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_instagram ); ?>"><i class="tpk-icon tpk-instagram"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_pinterest){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_pinterest ); ?>"><i class="tpk-icon tpk-pinterest-p"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_linkedin){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_linkedin ); ?>"><i class="tpk-icon tpk-linkedin"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_youtube){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_youtube ); ?>"><i class="tpk-icon tpk-youtube-play"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_vimeo){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_vimeo ); ?>"><i class="tpk-icon tpk-vimeo"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_whatsapp){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_whatsapp ); ?>"><i class="tpk-icon tpk-whatsapp"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_github){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_github ); ?>"><i class="tpk-icon tpk-github"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_wordpress){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_wordpress ); ?>"><i class="tpk-icon tpk-wordpress"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_foursquare){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_foursquare ); ?>"><i class="tpk-icon tpk-foursquare"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_vk){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_vk ); ?>"><i class="tpk-icon tpk-vk"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_twitch){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_twitch ); ?>"><i class="tpk-icon tpk-twitch"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_tumblr){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_tumblr ); ?>"><i class="tpk-icon tpk-tumblr"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_snapchat){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_snapchat ); ?>"><i class="tpk-icon tpk-snapchat-ghost"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_skype){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_skype ); ?>"><i class="tpk-icon tpk-skype"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_reddit){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_reddit ); ?>"><i class="tpk-icon tpk-reddit-alien"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_stackoverflow){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_stackoverflow ); ?>"><i class="tpk-icon tpk-stack-overflow"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_xing){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_xing ); ?>"><i class="tpk-icon tpk-xing"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_delicious){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_delicious ); ?>"><i class="tpk-icon tpk-delicious"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_soundcloud){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_soundcloud ); ?>"><i class="tpk-icon tpk-soundcloud"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_behance){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_behance ); ?>"><i class="tpk-icon tpk-behance"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_steam){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_steam ); ?>"><i class="tpk-icon tpk-steam"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_dribbble){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_dribbble ); ?>"><i class="tpk-icon tpk-dribbble"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_blogger){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_blogger ); ?>"><i class="tpk-icon tpk-blogger"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_flickr){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_flickr ); ?>"><i class="tpk-icon tpk-flickr"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_spotify){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_spotify ); ?>"><i class="tpk-icon tpk-spotify"></i></a>
                    <?php } ?>

                    <?php if( $tpk_user_metabox_rss){ ?>
                        <a target="_blank" href="<?php echo esc_url( $tpk_user_metabox_rss ); ?>"><i class="tpk-icon tpk-rss"></i></a>
                    <?php } ?>

                </div>

            </div>
        </div>
    </div>
</div>
