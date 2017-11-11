$(function() {
    var projects = $(".projects .item .panel .roles li");
    var projectsMenu = $("#detail-window .project-detail .menu");
    var item;
    var scrollTop;
    var isOpened;
    var project;
    function project_clickHandler() {
        showItem($(this).data('id'));
    }
    
    function projectMenu_clickHandler(event) {
        showItem($(this).data('id'));
    }
    
    function showItem(id) {    
        $("#nav").css('z-index', 10);
        $("#top").css('opacity', 0);
        project = $(".projects .item .panel .roles li[data-id="+id+"]");
        item =project.parent().parent().parent();
        $("#detail-window .menu li").removeClass("active");
        $("#detail-window .menu li[data-id="+id+"]").addClass("active");
        
        if(!isOpened)
            scrollTop = $(document).scrollTop();
            $("#site").width($("#site").width());        
            $(".projects .item").not(item).height(220);
            item.height($(window).height() + 200 - 8 - 228);
            $(".projects .item .panel").show();
            item.find('.panel').hide();
        if(isOpened){
            $('.panel').hide();
        }
        $('.panel').hide();
        if(isOpened)
            $(document).scrollTop(item.offset().top + 210 - 228);
        else
            $('html,body').animate({scrollTop: item.offset().top + 210 - 228}, 500);

        $('body').addClass('disable-scroll');
        $('#detail-window .content').removeClass('show');
        $('#detail-window').show();
        $('#detail-window').scrollTop(0);
        $("#nav").css("opacity", "0");
        
        setTimeout(function() {
            
            $('.projects').addClass('opened');
            isOpened = true;
            $('#detail-window .content .title').html(project.html());
            
            $("#detail-window .menu").html(item.find('.roles').html());
            $("#detail-window .menu li[data-id="+id+"]").addClass("active");
			$('#detail-window .content').load('events/about/'+id+'.txt');
            $('#detail-window .content iframe').each(function(){
               $(this).attr('src', $(this).data('id'));
            });
            
            $('#detail-window').addClass('show');
            $('#detail-window .content').addClass('show');
        }, 500);
    }

    function closeWindow() {
        isOpened = false;
        
        $('.projects').removeClass('opened');
        $('#detail-window').removeClass('show');
        setTimeout(function() {
            $('.panel').show();
            $("#nav").css('z-index', 2000);
            $("#top").css('opacity', 1);
            $("#site").width("100%");
            $('html,body').animate({scrollTop: scrollTop}, 500);
            item.height(220);
            $('body').removeClass('disable-scroll');

            $('#detail-window').hide();
            $("#nav").css("opacity", "1");
            
            $(".projects").addClass('disabled');
            $(".projects .item .panel").show();
            
            setTimeout(function() {
                $(".projects").removeClass('disabled');
            }, 500);
            
        }, 300);
    }

        function window_resizeHandler() {
        $('#detail-window').height($(window).height());
        
        $('#detail-window .project-detail').css('position', 'absolute');
        $('#detail-window .project-detail').offset({left: ($(window).width() - $('#detail-window .project-detail').width())/2});
        
        if(item)
            item.height($(window).height() + 200 - 8 - 228);
    }

    function init() {
        $(window).resize(window_resizeHandler);
        window_resizeHandler();
        projects.click(project_clickHandler);
        projectsMenu.on('click','li',projectMenu_clickHandler);
        $('#detail-window h1').click(closeWindow);
    }

    init();
});