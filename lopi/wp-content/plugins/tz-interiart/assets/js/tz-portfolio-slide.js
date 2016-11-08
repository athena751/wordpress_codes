/*
 * Method resize image
 */
function TzTemplateResizeImage(obj){

    var widthStage;
    var heightStage ;
    var widthImage;
    var heightImage;
    obj.each(function (i,el){
        heightStage = jQuery(this).height();
        widthStage = jQuery (this).width();
        var img_url = jQuery(this).find('img').attr('src');
        var image = new Image();
        image.src = img_url;
        image.onload = function() {
        }
        widthImage = image.naturalWidth;
        heightImage = image.naturalHeight;
        var tzimg	=	new resizeImage(widthImage, heightImage, widthStage, heightStage);
        jQuery(this).find('img').css ({ top: tzimg.top, left: tzimg.left, width: tzimg.width, height: tzimg.height });
    });
}

jQuery(document).ready(function(){

    // --------------------------------------------------
    // magnificPopup
    // --------------------------------------------------

    jQuery('.simple-ajax-popup-align-top').magnificPopup({
        type: 'ajax',
        alignTop: true,
        overflowY: 'scroll',
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function() {
                this.st.mainClass = this.st.el.attr('data-effect');
            },
            ajaxContentAdded: function() {
                jQuery('.tzPortfolio_Single_Slider').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: true,
                    directionNav: true,
                    prevText: "Previous",
                    nextText: "Next",
                    smoothHeight: true
                });

                jQuery('.tzPortfolio_Single_video').each(function(){
                    var $width_video = jQuery(this).width();
                    jQuery(this).css('height',(($width_video*9)/16)+'px');
                });

                jQuery('.tzPortfolio_Single_videoHtml5').each(function(){
                    var $width_html5 = jQuery(this).width();
                    jQuery(this).css('height',(($width_html5*9)/16)+'px');
                });

                // JQUERY VIDEO HTML5
                jQuery('.tzPortfolio_autoplay').on('click',function(){
                    jQuery(this).hide();
                    jQuery(this).parent().parent().find('.bg-video').hide();
                    jQuery(this).parent().parent().find('.tzPortfolio_pauses').show();
                    if (jQuery(this).parent().parent().find('.videoID')[0].paused)
                        jQuery(this).parent().parent().find('.videoID')[0].play();

                }) ;
                jQuery('.tzPortfolio_pauses').on('click',function(){
                    jQuery(this).hide();
                    jQuery(this).parent().parent().find('.bg-video').show();
                    jQuery(this).parent().parent().find('.tzPortfolio_autoplay').show();
                    if (jQuery(this).parent().parent().find('.videoID')[0].play)
                        jQuery(this).parent().parent().find('.videoID')[0].pause();

                });
            }
        },
        closeOnContentClick: false,
        midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });
});

jQuery(window).load(function(){
    TzTemplateResizeImage(jQuery('.tzPortfolioSlide_image'));
});