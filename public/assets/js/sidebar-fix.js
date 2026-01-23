
(function ($) {
    // USE STRICT
    "use strict";

    try {
        // Sidebar Toggler
        $('.js-arrow').each(function () {
            var that = $(this);
            that.on('click', function (e) {
                e.preventDefault();
                that.find(".arrow").toggleClass("up");
                that.toggleClass("open");
                that.parent().find('.js-sub-list').slideToggle("200");
            });
        });

    } catch (error) {
        console.log(error);
    }

})(jQuery);
