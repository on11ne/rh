/**
 * Created with JetBrains PhpStorm.
 * User: Victor
 * Date: 15.11.12
 * Time: 17:32
 * To change this template use File | Settings | File Templates.
 */
$(document).ready(function() {

    // Using custom configuration
    $("#slider").carouFredSel({
        items				: 1,
        prev: {
            button:'#slider-prev',
            key:'left'
        },
        next: {
            button:'#slider-next',
            key:'right'
        },
        auto: {
            play:true,
            timeoutDuration:10000
        },
        direction			: "left",
        scroll : {
            fx:'fade',
            items			: 1,
            easing			: "swing",
            duration		: 500,
            pauseOnHover	: true
        }
    });
    $('.fancybox').fancybox({
        fitToView	: true,
        autoSize	: true,
        openEffect	: 'none',
        closeEffect	: 'none',
        padding : 50
    });
});