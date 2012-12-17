(function($){$.fn.filestyle=function(options){var settings={width:250};if(options){$.extend(settings,options);};return this.each(function(){var self=this;var wrapper=$("<div>").css({"width":settings.imagewidth+"px","float":"right","height":settings.imageheight+"px","background":"url("+settings.image+") 0 0 no-repeat","position":"relarive","background-position":"right","cursor":"pointer","display":"block","margin-bottom":"25px","margin-bottom":"40px","overflow":"hidden"});var filename=$('<input class="file rounded">').addClass($(self).attr("class")).css({"margin-bottom":"25px","width":settings.width+"px"});$(self).before(filename);$(self).wrap(wrapper);$(self).css({"position":"relative","cursor":"pointer","height":settings.imageheight+"px","width":settings.width+"px","display":"inline","cursor":"pointer","opacity":"0.0"});if($.browser.mozilla){if(/Win/.test(navigator.platform)){$(self).css("margin-left","-142px");}else{$(self).css("margin-left","-168px");};}else{$(self).css("margin-left",settings.imagewidth-settings.width+"px");};$(self).bind("change",function(){filename.val($(self).val());});});};})(jQuery);
$(function(){
    jQuery("input[type=file]").filestyle({
        image: "images/mapping/file.png",
        imageheight : 42,
        imagewidth : 227,
        width : 207
    });
});