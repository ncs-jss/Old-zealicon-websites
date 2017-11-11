$(function(){
   $("div.header").each(function(){
      
       var i = 1;
       var slides = $(this).children();

       function changeSlide() {
           var slide = slides[i%slides.length];
           slides.fadeOut();
           $(slide).fadeIn();
           var delay = 1500;
           if(i%slides.length == 0) delay = 2000;
           setTimeout(changeSlide, delay);

           i++;
       }

       setTimeout(changeSlide, 2000);
       
   });
});

$(function() {    
    var BORDER = 1200;
    function init() {
        $(window).scroll(scrollHandler);
    }
    function scrollHandler() {
        if($(window).scrollTop() > BORDER)
            $("body").addClass("scrolled");
        else
            $("body").removeClass("scrolled");
    }
    init();
});

$(function(){
    $('a[href^=#]').not(".disable-scroll").click(function(event){		
            event.preventDefault();
            
            if(!$(this.hash).length) return;
            
            var newScrollTop = $(this.hash).offset().top - 10;
            var shift = Math.abs($(document).scrollTop() - newScrollTop);
            
            $('html,body').animate({scrollTop: newScrollTop}, shift/3);
    });
});



