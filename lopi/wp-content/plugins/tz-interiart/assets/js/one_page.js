jQuery(document).ready(function() {
    "use strict";

    var $nav;
    $nav = jQuery('.tz-nav');
    $nav.onePageNav({
        currentClass: 'current-one-page',
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

});
