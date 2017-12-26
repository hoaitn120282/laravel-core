jQuery.fn.exists = function(){return this.length>0;};
jQuery(document).ready(function($) {
    if ($('.menu-item-has-children').exists()) {
        $('.menu-item-has-children').hover(function () {
            $(this).addClass('menu-item-has-children-hover');
        }, function () {
            $(this).removeClass('menu-item-has-children-hover')
        })
    }

    $('.tips-slide').owlCarousel({
        items: 1,
        margin: 30,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:1,
                nav:false
            }
        }
    });

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

/**** Update *****/
if ($('.new-detail').exists()) {
    $(function() {
    $('.new-detail .new-content h3').matchHeight();
    $('.new-detail .new-content i').matchHeight();
    $('.new-detail .new-content p').matchHeight();
    $('.tip-detail h3').matchHeight();
    $('.tip-detail p').matchHeight();
});
}



});
