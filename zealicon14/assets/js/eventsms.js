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

            $.post(
            'zealicon14/event_add.php',
            {ename:id,request:"yes"},
            function(data){
            if(""!==data){    
                $("#event-register").html(data);
                $("#event-register").attr("title","Unregister for this event");
                $("#event-register").removeClass('reg');
                $("#event-register").addClass('unreg');
                
            }else{
                $("#event-register").html("Register");
                $("#event-register").attr("title","Register for this event");
                $("#event-register").removeClass('unreg');
                $("#event-register").addClass('reg');
                
            }
            },
            'html'    
            );
            
            $("#detail-window .menu").html(item.find('.roles').html());
            $("#detail-window .menu li[data-id="+id+"]").addClass("active");
            $('#detail-window .content .title').html(project.html());
            $('#detail-window .content .credits .contact p').load("events/Contact/"+id+".txt");
            $('#detail-window .content  .credits .prizes p').load("events/Prizes/"+id+".txt");
            if(isNaN(id))
			{
				$('.load').load("events/About/"+id+".txt");
				$('#event-register').show();
			}
			else
			{
				$(".load").html("<p style='text-align:center;padding:20px;'>Coming Soon....</p>");
				$('#detail-window .content .credits .contact p').html("<p style='text-align:center;padding:20px;'>Coming Soon....</p>");
				$('#detail-window .content .credits .prizes p').html("<p style='text-align:center;padding:20px;'>Coming Soon....</p>");
				$('#event-register').hide();
			}
              $('#detail-window .content .media li h2').removeClass("ective");
            $('#detail-window .content .media .about h2').addClass("ective");
          
            $('#detail-window').addClass('show');
            $('#detail-window .content').addClass('show');

        
        
        }, 500);
    }

	function getCookie(cookiename){
        var cookies,value,cookie,i;
        cookies = document.cookie.split(";");    
        for(i=0;i<cookies.length;i++){
            cookie = cookies[i].split("=");
            if(cookie[0].indexOf(cookiename)+1){
                value = cookie[1];
                break;
            }    
        }    
        return value;
    }
	
    function closeWindow() {
        isOpened = false;
        

		if(getCookie('email')) 
                $.post(
                    'zealicon14/studbrd.php', 
                function(data){
                $('#dashboard .content').html(data);
                
                },'html'    
                );    
				
        $('.projects').removeClass('opened');
        $('#detail-window').removeClass('show');
        setTimeout(function() {
            $('.panel').show();
            $("#nav").css('z-index', 2000);
            $("#top").css('opacity', 1);
            $("#site").width("100%");
            $('html,body').animate({scrollTop: scrollTop}, 300);
            item.height(220);
            $('body').removeClass('disable-scroll');

            $('#detail-window').hide();
            $("#nav").css("opacity", "1");
            
            $(".projects").addClass('disabled');
            $(".projects .item .panel").show();
            
            setTimeout(function() {
                $(".projects").removeClass('disabled');
            }, 500);
            
        }, 0);
    }

        function window_resizeHandler() {
        $('#detail-window').height($(window).height());
        $('#detail-window .project-detail').css('position', 'absolute');
        $('#detail-window .project-detail').offset({left: ($(window).width() - $('#detail-window .project-detail').width())/2});
        if(item)
            item.height($(window).height() + 200 - 8 - 228);
    }

    function registerEventHandler(){
        
        /*var span = $('#event-register');
        var id = $('#detail-window .menu li[class="active"]').data('id');

        if(span.text() === "Login to register for the event"){
            $('.project-detail > h1').click();
            setTimeout(function(){$('#nav a[title="Login"]').click();},600);
            
        }

        
        if(span.text() === "Register")
            $.post(
            'zealicon14/event_add.php',
            {ename:id},
            function(data){
            if(""!==data){    
                $("#event-register").html(data);
                $("#event-register").attr("title","Unregister for this event");
                $("#event-register").addClass('unreg');
                $("#event-register").removeClass('reg');
            }
            else{
                $("#event-register").html("Register");
                $("#event-register").addClass('reg');
                $("#event-register").removeClass('unreg')};
            },
            'html'    
            );
        
                
        if(span.text() === "Registered"){
            $.post(
            'zealicon14/event_add.php',
            {ename:id,delete:'true'},
            function(data){
            if(""!==data)    
                $("#event-register").html(data);
            else{
                $("#event-register").html("Register");
                $("#event-register").attr("title","Register for this event");
                $("#event-register").addClass('reg');
                $("#event-register").removeClass('unreg');
                }
            },
            'html'    
            );
        }*/
alert("Registration for events has been closed !! Try Next Year !!");
    }  
	function UrlCheck(url)
	{
		var http = new XMLHttpRequest();
		http.open('HEAD',url,false);
		http.send();
		return http.status!=404;
	}
    function eventTabCLickHandler(){
            $('#detail-window .content .media li h2').removeClass("ective");
            $(this).addClass("ective");
            var id = $('#detail-window .menu li[class="active"]').data('id');
            var file = $(this).text();
			  
			
			if(file=="Download")
			{
			if(UrlCheck("events/pdf/"+id+".pdf"))
			$(".load").html("<a href='events/pdf/"+id+".pdf'>Click Here To Download</a>");
			else
			$(".load").html("No files to download");
			}
			
			else
			{
			 console.log(this);
			 if(isNaN(id))
			    $(".load").load("events/"+file+"/"+id+".txt");
			 else
			 {
				$(".load").html("<p style='text-align:center;padding:20px;'>Coming Soon....</p>");
				$('#detail-window .content .credits .contact p').html("<p style='text-align:center;padding:20px;'>Coming Soon....</p>");
				$('#detail-window .content .credits .prizes p').html("<p style='text-align:center;padding:20px;'>Coming Soon....</p>");

			
			 }
			}
    }
    
    
    function init() 
	{
        $(window).resize(window_resizeHandler);
        window_resizeHandler();
        projects.click(project_clickHandler);
        projectsMenu.on('click','li',projectMenu_clickHandler);
        $('#detail-window h1').click(closeWindow);
		 $('#event-register').click(registerEventHandler);
		$('.project-detail .content  li h2').click(eventTabCLickHandler);
    }

    init();
});