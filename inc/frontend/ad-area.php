<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$tpk_settings = get_option( 'tpk_options_settings' );
$tpk_enable_header_ad = isset( $tpk_settings[ 'tpk_enable_header_ad' ] ) ? $tpk_settings[ 'tpk_enable_header_ad' ] : '';

function theme_powerkit_header_ad(){

	$tpk_settings = get_option( 'tpk_options_settings' );
	$tpk_header_ad_image = isset( $tpk_settings[ 'tpk_header_ad_image' ] ) ? $tpk_settings[ 'tpk_header_ad_image' ] : '';
	$tpk_header_ad_type = isset( $tpk_settings[ 'tpk_header_ad_type' ] ) ? $tpk_settings[ 'tpk_header_ad_type' ] : '';
	$tpk_header_ad_script = isset( $tpk_settings[ 'tpk_header_ad_script' ] ) ? $tpk_settings[ 'tpk_header_ad_script' ] : '';
	$tpk_header_ad_image_link = isset( $tpk_settings[ 'tpk_header_ad_image_link' ] ) ? $tpk_settings[ 'tpk_header_ad_image_link' ] : '';
	$tpk_ed_header_ad_desktop = isset( $tpk_settings[ 'tpk_ed_header_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_header_ad_desktop' ] : '';
	$tpk_ed_header_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_header_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_header_ad_tablet_landscape' ] : '1';
	$tpk_ed_header_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_header_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_header_ad_tablet_portrait' ] : '1';
	$tpk_ed_header_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_header_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_header_ad_tablet_mobile' ] : '1';

	$header_class_ad_ed = '';
	if( !$tpk_ed_header_ad_desktop ){

		$header_class_ad_ed .= ' article-top-disable-desktop';

	}
	if( !$tpk_ed_header_ad_tablet_landscape ){

		$header_class_ad_ed .= ' article-top-disable-tablate-landscape';

	}
	if( !$tpk_ed_header_ad_tablet_portrait ){

		$header_class_ad_ed .= ' article-top-disable-tablate-portrait';

	}
	if( !$tpk_ed_header_ad_tablet_mobile ){

		$header_class_ad_ed .= ' article-top-disable-mobilt';

	}

	if( $tpk_header_ad_type == 'adsense' ){

		if( $tpk_header_ad_script ){ ?>

			<div class="tpk-header-ad <?php echo $header_class_ad_ed; ?>">
				<div class="tpk-header-ad-adsense">
					<?php echo $tpk_header_ad_script; ?>
				</div>
			</div>

		<?php
		}

	}else{

		if( $tpk_header_ad_image ){ ?>

			<div class="tpk-header-ad <?php echo $header_class_ad_ed; ?>">
				<div class="tpk-header-ad-image">
					<a <?php if( $tpk_header_ad_image_link ){ ?>target="_blank" <?php } ?> href="<?php if( $tpk_header_ad_image_link ){ echo esc_url( $tpk_header_ad_image_link); }else{ echo 'javascript:void(0)'; } ?>"><img src="<?php echo esc_url( $tpk_header_ad_image ); ?>" alt="<?php esc_html_e('Header AD','theme-powerkit'); ?>" title="<?php esc_html_e('Header AD','theme-powerkit'); ?>"></a>
				</div>
			</div>
		
		<?php
		}

	}

};

if( $tpk_enable_header_ad ){ add_action('wp_head','theme_powerkit_header_ad',1); }

$tpk_enable_footer_ad = isset( $tpk_settings[ 'tpk_enable_footer_ad' ] ) ? $tpk_settings[ 'tpk_enable_footer_ad' ] : '';

function theme_powerkit_footer_ad(){

	$tpk_settings = get_option( 'tpk_options_settings' );
	$tpk_footer_ad_image = isset( $tpk_settings[ 'tpk_footer_ad_image' ] ) ? $tpk_settings[ 'tpk_footer_ad_image' ] : '';
	$tpk_footer_ad_type = isset( $tpk_settings[ 'tpk_footer_ad_type' ] ) ? $tpk_settings[ 'tpk_footer_ad_type' ] : '';
	$tpk_footer_ad_script = isset( $tpk_settings[ 'tpk_footer_ad_script' ] ) ? $tpk_settings[ 'tpk_footer_ad_script' ] : '';
	$tpk_footer_ad_image_link = isset( $tpk_settings[ 'tpk_footer_ad_image_link' ] ) ? $tpk_settings[ 'tpk_footer_ad_image_link' ] : '';
	$tpk_ed_footer_ad_desktop = isset( $tpk_settings[ 'tpk_ed_footer_ad_desktop' ] ) ? $tpk_settings[ 'tpk_ed_footer_ad_desktop' ] : '';
	$tpk_ed_footer_ad_tablet_landscape = isset( $tpk_settings[ 'tpk_ed_footer_ad_tablet_landscape' ] ) ? $tpk_settings[ 'tpk_ed_footer_ad_tablet_landscape' ] : '1';
	$tpk_ed_footer_ad_tablet_portrait = isset( $tpk_settings[ 'tpk_ed_footer_ad_tablet_portrait' ] ) ? $tpk_settings[ 'tpk_ed_footer_ad_tablet_portrait' ] : '1';
	$tpk_ed_footer_ad_tablet_mobile = isset( $tpk_settings[ 'tpk_ed_footer_ad_tablet_mobile' ] ) ? $tpk_settings[ 'tpk_ed_footer_ad_tablet_mobile' ] : '1';

	$footer_class_ad_ed = '';
	if( !$tpk_ed_footer_ad_desktop ){

		$footer_class_ad_ed .= ' article-top-disable-desktop';

	}
	if( !$tpk_ed_footer_ad_tablet_landscape ){

		$footer_class_ad_ed .= ' article-top-disable-tablate-landscape';

	}
	if( !$tpk_ed_footer_ad_tablet_portrait ){

		$footer_class_ad_ed .= ' article-top-disable-tablate-portrait';

	}
	if( !$tpk_ed_footer_ad_tablet_mobile ){

		$footer_class_ad_ed .= ' article-top-disable-mobilt';

	}

	if( $tpk_footer_ad_type == 'adsense' ){

		if( $tpk_footer_ad_script ){ ?>

			<div class="tpk-footer-ad <?php echo $footer_class_ad_ed; ?>">
				<div class="tpk-footer-ad-adsense">
					<?php echo $tpk_footer_ad_script; ?>
				</div>
			</div>

		<?php
		}

	}else{

		if( $tpk_footer_ad_image ){ ?>

			<div class="tpk-footer-ad <?php echo $footer_class_ad_ed; ?>">
				<div class="tpk-footer-ad-image">
					<a <?php if( $tpk_footer_ad_image_link ){ ?>target="_blank" <?php } ?> href="<?php if( $tpk_footer_ad_image_link ){ echo esc_url( $tpk_footer_ad_image_link); }else{ echo 'javascript:void(0)'; } ?>"><img src="<?php echo esc_url( $tpk_footer_ad_image ); ?>" alt="<?php esc_html_e('Footer AD','theme-powerkit'); ?>" title="<?php esc_html_e('Footer AD','theme-powerkit'); ?>"></a>
				</div>
			</div>
		
		<?php
		}

	}

};

if( $tpk_enable_footer_ad ){ add_action('wp_footer','theme_powerkit_footer_ad',1); }