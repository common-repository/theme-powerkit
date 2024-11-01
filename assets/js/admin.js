(function ($) {

    // Code Editor
    $('.tpk-nav-tabs').click(function(){
      if( $(this).hasClass('tpk-custom-style') ){
        $(this).removeClass('tpk-custom-style');
        console.log(theme_powerkit_data.cm_setting);
        if( $('#tpk-header-script').length ) {
            wp.codeEditor.initialize( $('#tpk-header-script'), theme_powerkit_data.cm_setting );
        }
        if( $('#tpk-footer-script').length ) {
            wp.codeEditor.initialize( $('#tpk-footer-script'), theme_powerkit_data.cm_setting );
        }
        if( $('#tpk-custom-css').length ) {
            wp.codeEditor.initialize( $('#tpk-custom-css'), theme_powerkit_data.cm_setting_css );
        }
      }
    });

    // Social Share Sortable
    $('.tpk-social-re-oprder').sortable({
        axis: 'y',
        containment: "parent",
        update:function(event,ui){
                    var profile_array = [];
                    $('.tpk-social-share-wrap input[type="checkbox"]').each(function(){
                    profile_array.push($(this).attr('data-key')) ;
                    });
                    var social_networks_orders = profile_array.join(',');
                    $('#tpk_social_share_options').val(social_networks_orders);
                }
    });

    // Admin setting page tab
    $('.tpk-tab').click(function(){
        var id = $(this).attr('id');
        $('.tpk-tab').removeClass('tpk-tab-active');
        $(this).addClass('tpk-tab-active');
        $('.tpk-content').removeClass('tpk-content-active');
        $('#'+id+'-content').addClass('tpk-content-active');
    });

    // Social Sortable Toggle
    $('.tpk-toggle-control').click(function(){
        $(this).closest('.tpk-social-share-options').find('.tpk-social-control').slideToggle();
    });

    // Clear Catch
    $('#tpk-insta-cache').click(function(){
        $(this).addClass('tpk-button-loading');
        var ajaxurl = theme_powerkit_data.ajax_url;
        var data = {
            'action': 'theme_powerkit_clear_cache',
            '_wpnonce': theme_powerkit_data.ajax_nonce,
        };
 
        $.post(ajaxurl, data, function( response ) {
            $('#tpk-insta-cache').removeClass('tpk-button-loading');
        });
    });

    // Media Upload
    $('.tpk-img-upload-button').click( function(){
        event.preventDefault();
        var imgContainer = $(this).closest('.tpk-img-fields-wrap').find( '.tpk-thumbnail-image .tpk-img-container'),
        removeimg = $(this).closest('.tpk-img-fields-wrap').find( '.tpk-img-delete-button'),
        imgIdInput = $(this).siblings('.upload-id');
        var frame;
        // Create a new media frame
        frame = wp.media({
            title: theme_powerkit_data.upload_image,
            button: {
            text: theme_powerkit_data.use_imahe
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });
        // When an image is selected in the media frame...
        frame.on( 'select', function() {
            // Get media attachment details from the frame state
            var attachment = frame.state().get('selection').first().toJSON();
            // Send the attachment URL to our custom image input field.
            imgContainer.html( '<img src="'+attachment.url+'" />' );
            removeimg.addClass('tpk-img-show');
            // Send the attachment id to our hidden input
            imgIdInput.val( attachment.url ).trigger('change');
        });
        // Finally, open the modal on click
        frame.open();
    });

    // DELETE IMAGE LINK
    $('.tpk-img-delete-button').click( function(){
        event.preventDefault();
        var imgContainer = $(this).closest('.tpk-img-fields-wrap').find( '.tpk-thumbnail-image .tpk-img-container');
        var removeimg = $(this).closest('.tpk-img-fields-wrap').find( '.tpk-img-delete-button');
        var imgIdInput = $(this).closest('.tpk-img-fields-wrap').find( '.upload-id');
        // Clear out the preview image
        imgContainer.find('img').remove();
        removeimg.removeClass('tpk-img-show');
        // Delete the image id from the hidden input
        imgIdInput.val( '' ).trigger('change');
    });

    // Metabox Tab
    $('.tpk-metabox-tab a').click(function (){
        var tabid = $(this).attr('id');
        $('.tpk-metabox-tab a').removeClass('tpk-tab-active');
        $(this).addClass('tpk-tab-active');
        $('.tpk-tab-content .tpk-content-wrap').hide();
        $('.tpk-tab-content #'+tabid+'-content').show();
        $('.tpk-tab-content .tpk-content-wrap').removeClass('tpk-tab-content-active');
        $('.tpk-tab-content #'+tabid+'-content').addClass('tpk-tab-content-active');
    });

    if(  theme_powerkit_data.tpk_header_ad_type == 'adsense' ){

        $('#tpk-ad').click(function(){

          if( $(this).hasClass('tpk-header-adsense-script-unactive') ){

            $(this).removeClass('tpk-header-adsense-script-unactive');
            wp.codeEditor.initialize($('#tpk-header-adsense-script'), theme_powerkit_data.cm_settings);

          }

        });

    }

    $('.tpk-header-ad-type-select').change(function(){

        var selectedValue = this.value;
        $('.tpk-header-ad-type-opt').removeClass('tpk-header-ad-type-active');
        $('.tpk-header-ad-type-'+selectedValue).addClass('tpk-header-ad-type-active');

        if( selectedValue == 'adsense' ){

            if( $('#tpk-ad').hasClass('tpk-header-adsense-script-unactive') ){

                $('#tpk-ad').removeClass('tpk-header-adsense-script-unactive');
                wp.codeEditor.initialize($('#tpk-header-adsense-script'), theme_powerkit_data.cm_settings);

              }

        }

    });

    if(  theme_powerkit_data.tpk_sidebar_ad_type == 'adsense' ){

        $('#tpk-ad').click(function(){

          if( $(this).hasClass('tpk-sidebar-adsense-script-unactive') ){

            $(this).removeClass('tpk-sidebar-adsense-script-unactive');
            wp.codeEditor.initialize($('#tpk-sidebar-adsense-script'), theme_powerkit_data.cm_settings);

          }

        });

    }

    $('.tpk-sidebar-ad-type-select').change(function(){

        var selectedValue = this.value;
        $('.tpk-sidebar-ad-type-opt').removeClass('tpk-sidebar-ad-type-active');
        $('.tpk-sidebar-ad-type-'+selectedValue).addClass('tpk-sidebar-ad-type-active');

        if( selectedValue == 'adsense' ){

            if( $('#tpk-ad').hasClass('tpk-sidebar-adsense-script-unactive') ){

                $('#tpk-ad').removeClass('tpk-sidebar-adsense-script-unactive');
                wp.codeEditor.initialize($('#tpk-sidebar-adsense-script'), theme_powerkit_data.cm_settings);

              }

        }

    });

    if(  theme_powerkit_data.tpk_article_top_ad_type == 'adsense' ){

        $('#tpk-ad').click(function(){

          if( $(this).hasClass('tpk-article-top-adsense-script-unactive') ){

            $(this).removeClass('tpk-article-top-adsense-script-unactive');
            wp.codeEditor.initialize($('#tpk-article-top-adsense-script'), theme_powerkit_data.cm_settings);

          }

        });

    }

    $('.tpk-article-top-ad-type-select').change(function(){

        var selectedValue = this.value;
        $('.tpk-article-top-ad-type-opt').removeClass('tpk-article-top-ad-type-active');
        $('.tpk-article-top-ad-type-'+selectedValue).addClass('tpk-article-top-ad-type-active');

        if( selectedValue == 'adsense' ){

            if( $('#tpk-ad').hasClass('tpk-article-top-adsense-script-unactive') ){

                $('#tpk-ad').removeClass('tpk-article-top-adsense-script-unactive');
                wp.codeEditor.initialize($('#tpk-article-top-adsense-script'), theme_powerkit_data.cm_settings);

              }

        }

    });

    if(  theme_powerkit_data.tpk_article_inline_ad_type == 'adsense' ){

        $('#tpk-ad').click(function(){

          if( $(this).hasClass('tpk-article-inline-adsense-script-unactive') ){

            $(this).removeClass('tpk-article-inline-adsense-script-unactive');
            wp.codeEditor.initialize($('#tpk-article-inline-adsense-script'), theme_powerkit_data.cm_settings);

          }

        });

    }

    $('.tpk-article-inline-ad-type-select').change(function(){

        var selectedValue = this.value;
        $('.tpk-article-inline-ad-type-opt').removeClass('tpk-article-inline-ad-type-active');
        $('.tpk-article-inline-ad-type-'+selectedValue).addClass('tpk-article-inline-ad-type-active');

        if( selectedValue == 'adsense' ){

            if( $('#tpk-ad').hasClass('tpk-article-inline-adsense-script-unactive') ){

                $('#tpk-ad').removeClass('tpk-article-inline-adsense-script-unactive');
                wp.codeEditor.initialize($('#tpk-article-inline-adsense-script'), theme_powerkit_data.cm_settings);

              }

        }

    });

    if(  theme_powerkit_data.tpk_article_bottom_ad_type == 'adsense' ){

        $('#tpk-ad').click(function(){

          if( $(this).hasClass('tpk-article-bottom-adsense-script-unactive') ){

            $(this).removeClass('tpk-article-bottom-adsense-script-unactive');
            wp.codeEditor.initialize($('#tpk-article-bottom-adsense-script'), theme_powerkit_data.cm_settings);

          }

        });

    }

    $('.tpk-article-bottom-ad-type-select').change(function(){

        var selectedValue = this.value;
        $('.tpk-article-bottom-ad-type-opt').removeClass('tpk-article-bottom-ad-type-active');
        $('.tpk-article-bottom-ad-type-'+selectedValue).addClass('tpk-article-bottom-ad-type-active');

        if( selectedValue == 'adsense' ){

            if( $('#tpk-ad').hasClass('tpk-article-bottom-adsense-script-unactive') ){

                $('#tpk-ad').removeClass('tpk-article-bottom-adsense-script-unactive');
                wp.codeEditor.initialize($('#tpk-article-bottom-adsense-script'), theme_powerkit_data.cm_settings);

              }

        }

    });

    if(  theme_powerkit_data.tpk_footer_ad_type == 'adsense' ){

        $('#tpk-ad').click(function(){

          if( $(this).hasClass('tpk-footer-adsense-script-unactive') ){

            $(this).removeClass('tpk-footer-adsense-script-unactive');
            wp.codeEditor.initialize($('#tpk-footer-adsense-script'), theme_powerkit_data.cm_settings);

          }

        });

    }

    $('.tpk-footer-ad-type-select').change(function(){

        var selectedValue = this.value;
        $('.tpk-footer-ad-type-opt').removeClass('tpk-footer-ad-type-active');
        $('.tpk-footer-ad-type-'+selectedValue).addClass('tpk-footer-ad-type-active');

        if( selectedValue == 'adsense' ){

            if( $('#tpk-ad').hasClass('tpk-footer-adsense-script-unactive') ){

                $('#tpk-ad').removeClass('tpk-footer-adsense-script-unactive');
                wp.codeEditor.initialize($('#tpk-footer-adsense-script'), theme_powerkit_data.cm_settings);

              }

        }

    });
    
}(jQuery));