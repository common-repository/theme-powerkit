(function (e) {
    "use strict";
    var n = window.TKP_JS || {};
    n.TkpBackground = function () {
        var pageSection = e(".tpk-data-image");
        pageSection.each(function (indx) {
            if (e(this).attr("data-image")) {
                e(this).css("background-image", "url(" + e(this).data("image") + ")");
            }
        });
    },

    n.TkpTab = function () {
        e('.tpk-nav-tabs .tab').on('click', function (event) {
            var tabid = e(this).attr('hsdata');
            e(this).closest('.tpk-tab-wrapper').find('.tpk-nav-tabs .tab').removeClass('theme-powerkit-active');
            e(this).addClass('theme-powerkit-active');
            e(this).closest('.tpk-tab-wrapper').find('.tab-content .tkb-tab-panel').removeClass('theme-powerkit-active');
            e(this).closest('.tpk-tab-wrapper').find('.content-' + tabid).addClass('theme-powerkit-active');
        });
    },

    e(document).ready(function () {
        n.TkpBackground(), n.TkpTab();
    })
})(jQuery);