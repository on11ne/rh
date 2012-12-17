/**
 * Created with JetBrains PhpStorm.
 * User: Victor
 * Date: 13.12.12
 * Time: 19:44
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $('.fancybox').fancybox({
        fitToView	: true,
        autoSize	: true,
        openEffect	: 'none',
        closeEffect	: 'none',
        padding : 50
    });
	$('.scrollpane #scroller').jScrollPane({
		showArrows:false,
		scrollbarWidth: 23,
		scrollbarMargin:30,
		verticalDragMinHeight: 400,
		verticalDragMaxHeight: 400,
		autoReinitialise: true
	});
});