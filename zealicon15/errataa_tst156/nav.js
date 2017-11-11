$(function() {
    var link = $("#nav a");
    function link_clickHandler() {
            var item = $(this);
            spa = item.prev('span');
            spa.toggleClass('visible');
    }
    function initialise() {
        link.mouseenter(link_clickHandler);
        link.mouseleave(link_clickHandler);   
    }
    initialise();
});

