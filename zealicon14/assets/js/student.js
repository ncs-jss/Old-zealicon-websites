$(function() {
    var registerspan =  $('#nav div span')[0];
    var register = $('#nav div  a')[0];
    var logoutspan =  $('#nav div >span')[1];
    var logout = $('#nav div a')[1];
    var loginspan =  $('#nav div >span')[2];
    var login = $('#nav div a')[2];
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
    
    function logoutClickHandler(){
    document.cookie ="email="+";max-age="+(0)+";path="+'/';
    document.cookie ="PHPSESSID="+";max-age="+(0)+";path="+'/';     
    document.cookie ="name="+";max-age="+(0)+";path="+'/';
    setTimeout(function(){window.location="";},100);    
    }
    
    function updateView() {
        if(getCookie('email')){ 
                $.post(
                    '../zealicon14/studbrd.php', 
                function(data){
                $('#dashboard .content').append(data);
                
                },'html'    
                );    
                registerspan.innerHTML= "Dashboard";
                register.innerHTML="<img src=assets/img/user.svg></img>";
                register.setAttribute("title","User");
                register.href= "#dashboard-header";
                logoutspan.innerHTML="Logout";
                logout.href = "#";
                loginspan.remove();
                login.remove();
                logout.innerHTML ="<img src=assets/img/logout.svg></img>";
                logout.setAttribute("id","logout");
                logout.setAttribute("title","logout");
                
                $('.hide').remove();
                
                $('#logout').click(logoutClickHandler);
                
        }else{
        
            $('.dash').remove();
        }
    }
    function initialise() {
        updateView();   
    }
    initialise();
});





$(document).ready(function() {
        $('#register-submit').click(function() {
            $('#reg-err').html('');
            var name =    $('#name').text(); 
            var college =       $('#college').text();
            var branch =     $('#branch').text();
            var tel =     $('#tel').text();
            var mail =      $('#mail').text();
            var pass =      $('#pass').text();
            var passconf =      $('#passconfirm').text();
            var flag = 0;
            
            if(""===name||""===college||""===branch||""===tel||""===mail||""===pass||""===passconf){
                $('#reg-err').html("*Please enter all the details");
                return;
            }
            tel = parseInt(tel);   
            if(tel.toString().length!==10){
                $('#reg-err').append("*Invalid mobile no.<br>.");
                flag=1;
            }
            if(pass!==passconf){
                $('#reg-err').append("*Passwords do not match.<br>");
                flag=1;
            }
            if(pass.length<=6){
                $('#reg-err').append("*Password is too short(Must be greator than 6 Characters). ");
                flag=1;
            }
            function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if( !emailReg.test( $email ) ) {
    return false;
  } else {
    return true;
  }
}
            if(!validateEmail(mail)){
                $('#reg-err').append("*Invalid Email ");
                flag=1;
            }

            if(flag)
                return;
            
            $.ajax({
                type: 'POST',
                data: {name:name,clgname:college,branch:branch,tel:tel,email:mail,pass1:pass,pass2:passconf },
                url: '../zealicon14/stureg.php',
                dataType: 'html',
                success: function(html, textStatus) {
                   if(""===html){
                   $('#reg-err').html("");
                    $('#register .text').html("You have been successfully registered!<br>Please <a href=#login-header>LOGIN</a> to Continue. ")   
                   }else    
                        $('#reg-err').html(html);
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred! ' + ( errorThrown ? errorThrown : xhr.status ));
                }
            });
        });
        
    
        $('#login-submit').click(function() {                
            $('#login-err').html('');
            var mail =      $('#lemail').text();
            var pass =      $('#lpass').text();
            if(""===mail||""===pass){
                $('#login-err').html('*Please enter all the details');
                return;
            }    
            
            $.ajax({
                type: 'POST',
                data: {username:mail,password:pass},
                url: '../zealicon14/stulogin.php',
                dataType: 'html',
                success: function(html, textStatus) {
                if(html.indexOf('*') +1){        
                    $('#login-err').html(html);
                }else{
                    response = html.split("+");  
                    document.cookie ="email="+encodeURIComponent(response[0])+";max-age="+(60*60*24*60)+";path="+'/';
                    document.cookie ="name="+response[1]+";max-age="+(60*60*24*60)+";path="+'/';        
                    window.location ="";    
                }
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('An error occurred! ' + ( errorThrown ? errorThrown : xhr.status ));
                }
            });
        });    
});