$(document).ready(function() {
    /*Vars and Inits*/

    var menuActive = false;
    var header = $('.header');

    setHeader();
    initPageMenu();
    initPopularSlider();

    $(window).on('resize', function() {
        setHeader();
        initTabLines();
    });

    /*Set Header*/

    function setHeader() {

        if (window.innerWidth > 991 && menuActive) {
            closeMenu();
        }
    }
    /*Init Page Menu*/

    function initPageMenu() {
        if ($('.page_menu').length && $('.page_menu_content').length) {
            var menu = $('.page_menu');
            var menuContent = $('.page_menu_content');
            var menuTrigger = $('.menu_trigger');

            //Open / close page menu
            menuTrigger.on('click', function() {
                if (!menuActive) {
                    openMenu();
                } else {
                    closeMenu();
                }
            });

            //Handle page menu
            if ($('.page_menu_item').length) {
                var items = $('.page_menu_item');
                items.each(function() {
                    var item = $(this);
                    if (item.hasClass("has-children")) {
                        item.on('click', function(evt) {
                            evt.preventDefault();
                            evt.stopPropagation();
                            var subItem = item.find('> ul');
                            if (subItem.hasClass('active')) {
                                subItem.toggleClass('active');
                                TweenMax.to(subItem, 0.3, { height: 0 });
                            } else {
                                subItem.toggleClass('active');
                                TweenMax.set(subItem, { height: "auto" });
                                TweenMax.from(subItem, 0.3, { height: 0 });
                            }
                        });
                    }
                });
            }
        }
    }

    function openMenu() {
        var menu = $('.page_menu');
        var menuContent = $('.page_menu_content');
        TweenMax.set(menuContent, { height: "auto" });
        TweenMax.from(menuContent, 0.3, { height: 0 });
        menuActive = true;
    }

    function closeMenu() {
        var menu = $('.page_menu');
        var menuContent = $('.page_menu_content');
        TweenMax.to(menuContent, 0.3, { height: 0 });
        menuActive = false;
    }
});
/*

11. Init Popular Categories Slider

*/

function initPopularSlider() {
    if ($('.popular_categories_slider').length) {
        var popularSlider = $('.popular_categories_slider');

        popularSlider.owlCarousel({
            loop: true,
            autoplay: false,
            nav: false,
            dots: false,
            responsive: {
                0: { items: 1 },
                575: { items: 2 },
                640: { items: 3 },
                768: { items: 4 },
                991: { items: 5 }
            }
        });

        if ($('.popular_categories_prev').length) {
            var prev = $('.popular_categories_prev');
            prev.on('click', function() {
                popularSlider.trigger('prev.owl.carousel');
            });
        }

        if ($('.popular_categories_next').length) {
            var next = $('.popular_categories_next');
            next.on('click', function() {
                popularSlider.trigger('next.owl.carousel');
            });
        }
    }
}