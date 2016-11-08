jQuery(document).ready(function(){
    "use strict";

    var $_hWindow  = jQuery(window).height();
    jQuery('.tzUnder_Construction_Countdown').css('height',$_hWindow+'px');

    var $nav;
    $nav = jQuery('.tzbutton');
    $nav.onePageNav_btn({
        currentClass: 'current',
        changeHash: false,
        scrollSpeed: 2200,
        scrollOffset: 0,
        scrollThreshold: 0.5,
        filter: '',
        easing: '',
        begin: function () {
            //I get fired when the animation is starting
        },
        end: function () {
            //I get fired when the animation is ending
        },
        scrollChange: function ($currentListItem) {
            //I get fired when you enter a section and I pass the list item of the section
        }
    });

}) ;

jQuery(window).load(function(){
    "use strict";

    var height_about   = jQuery(".tzUnder_Construction_Section").height();
    var height_about_pad = height_about - 100;
    var height_about_left = jQuery(".tzUnder_Construction_About").height();

    if( height_about_left > height_about_pad ){
        jQuery('.tzUnder_Construction_About').css('height',height_about_pad+'px');

        var content=jQuery(".tzUnder_Construction_About");

        content.mCustomScrollbar({
            scrollInertia:300,
            scrollButtons:{enable:true}
        });

    }
});