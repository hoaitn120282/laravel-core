jQuery.fn.exists = function(){return this.length>0;};
jQuery(document).ready(function($) {
    if ($('ul[init="lightSlider"]').exists()) {
        $('ul[init="lightSlider"]').lightSlider({
            gallery:true,
            item:1,
            thumbItem:5,
            slideMargin: 0,
            speed:500,
            auto:false,
            loop:true,
            onSliderLoad: function() {
                $('ul[init="lightSlider"]').removeClass('cS-hidden');
            }     
        }); 
    }

    if ($('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top').addClass('show');
                } else {
                    $('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
    /**** Check and remove class ****/
    if (window.innerWidth <= 769) {
        $(".language-select ul").removeClass("dropdown-menu").addClass('list-inline');
    }

    $(window).on('resize', function(){
        location.reload();
        if (window.innerWidth <= 769) {
            $(".language-select ul").removeClass("dropdown-menu").addClass('list-inline');
        }
    });

});
