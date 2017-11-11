$(function() {

    var people = $(".people .item");
    var scrollTop;

    function people_clickHandler() {
        var item = $(this);
        
        if(item.hasClass('show')) {
            //$('html,body').animate({scrollTop: scrollTop}, 500);
            item.removeClass('show');            
            item.find('.detail').slideUp();
        }
        else {
            $(".people .item").removeClass("show");
            $(".people .detail").hide();
            
            scrollTop = $(document).scrollTop();
            $('html,body').animate({scrollTop: item.offset().top}, 500);
            item.addClass('show');
            item.find('.detail').slideDown();
            
        }        
    }
    
    function init() {
        people.click(people_clickHandler);
    }

    init();
});

$(function() {
    var link = $("#nav a");
    var link2 = $("#nav-right a");
    function link_clickHandler() {
            var item = $(this);
            spa = item.prev('span');
            spa.toggleClass('visible');
    }
    function initialise() {
        link.mouseenter(link_clickHandler);
        link.mouseleave(link_clickHandler);   
		link2.mouseenter(link_clickHandler);
        link2.mouseleave(link_clickHandler);
	}
    initialise();
});

