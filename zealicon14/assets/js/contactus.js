$(function() {
    
 function init()
 {
  $('#condet li').click(condetClickHandler);
 
 }
 init();
   
 
});

function condetClickHandler()
{
$('#condet li').removeClass("on");
 $(this).addClass("on");
 var ctcpost = $(this).text();
 var calling = this.id;
 if((calling!="sponman")&&(calling!="stuser")&&(calling!="techhd")&&(calling!="hoshd")&&(calling!="hosec"))
 {
	$('#vcard1 .vc1head').html(ctcpost);
	$('#vcard1').slideUp(100);
	$('#vcard2').hide();
	if(calling=="festsec")
	{
	
		console.log(this);
		$('#vcard1 .vc1head').html("Festival Convenor");
		$('#vcard2 .vc2head').html("Festival Secretary");
		$('#vcard1 .vc1body').html("</br>Prof. R.B. Sharma </br> </br> +0120-2400104 </br> </br> <br/> ");
		$('#vcard2 .vc2body').html("</br>Priyank Mishra </br> </br> 9582168272 </br> </br> ncs@jssaten.ac.in");
		$('#vcard1').fadeOut(100).delay(100).slideDown(300);
		$('#vcard2').fadeOut(100).delay(100).slideDown(300);
		$('#vcard1').css('display', 'inline-block');
		$('#vcard2').css('display', 'inline-block');
		
		
	}
	
	else if(calling=="culthd")
		$('#vcard1 .vc1body').html("</br>Akshay Bhatnagar </br> </br> 9999635607 </br> </br>verve@jssaten.ac.in");
	else if(calling=="crthd")
		$('#vcard1 .vc1body').html("</br>Suyash Agrawal </br> </br> 8860134959 </br> </br>ncs@jssaten.ac.in");
	else if(calling=="resman")
		$('#vcard1 .vc1body').html("</br>Rajat Nigam </br> </br> 7838090884 </br> </br> spice@jssaten.ac.in");
	else if(calling=="merchman")
		$('#vcard1 .vc1body').html("</br>Manik Bhalla </br> </br> 9953226176  </br> </br> yfac@jssaten.ac.in");
	else if(calling=="evman")
		$('#vcard1 .vc1body').html("</br>Nikhil Garg </br> </br> 9810840655 </br> </br> oorja@jssaten.ac.in");
	else if(calling=="finhd")
		$('#vcard1 .vc1body').html("</br>Ashish Kumar </br> </br> 9711888148 </br> </br> ace@jssaten.ac.in");
	else if(calling=="pubhd")
		$('#vcard1 .vc1body').html("</br>Ajay Kumar </br> </br> 9015217067 </br> </br> optimist@jssaten.ac.in");
	else if(calling=="reghd")
		$('#vcard1 .vc1body').html("</br>Ashok Prakash Agrawal </br> </br> 7838235360 </br> </br> quanta@jssaten.ac.in");
	$('#vcard1').css('display', 'inline-block');
	$('#vcard1').slideDown(300);
	
	
 }
 else
 {
	if(calling=="sponman")
	{
		console.log(this);
		$('#vcard1 .vc1head').html(ctcpost);
		$('#vcard2 .vc2head').html(ctcpost);
		$('#vcard1 .vc1body').html("</br>Vishakha Rai </br> </br> 7838241402 </br> </br>  impetus@jssaten.ac.in");
		$('#vcard2 .vc2body').html("</br>Shubham Verma </br> </br>  8010462696 </br> </br>  Connoisseur@jssaten.ac.in");
		$('#vcard1').fadeOut(100).delay(100).slideDown(300);
		$('#vcard2').fadeOut(100).delay(100).slideDown(300);
		$('#vcard1').css('display', 'inline-block');
		$('#vcard2').css('display', 'inline-block');
	}
	else if(calling=="hoshd")
	{
		console.log(this);
		$('#vcard1 .vc1head').html(ctcpost);
		$('#vcard2 .vc2head').html(ctcpost);
   		$('#vcard1 .vc1body').html("</br>Anant Jain </br> </br> 8527304636 </br> </br> prayoga@jssaten.ac.in");
		$('#vcard2 .vc2body').html("</br>Prerna Sharma  </br> </br>9412801396 </br> </br> quizzoc@jssaten.ac.in");
		$('#vcard1').fadeOut(100).delay(100).slideDown(300);
		$('#vcard2').fadeOut(100).delay(100).slideDown(300);
		$('#vcard1').css('display', 'inline-block');
		$('#vcard2').css('display', 'inline-block');
	}
	else if(calling=="hosec")
	{
		console.log(this);
		$('#vcard1 .vc1head').html(ctcpost);
		$('#vcard2 .vc2head').html(ctcpost);
		$('#vcard1 .vc1body').html("</br>Tapas Kant Tiwari </br> </br> 9899812324 </br> </br> yantrashilpa@jssaten.ac.in");
		$('#vcard2 .vc2body').html("</br>Bharat Pratap singh  </br> </br>9711300044 </br> </br> yantrashilpa@jssaten.ac.in");
		$('#vcard1').fadeOut(100).delay(100).slideDown(300);
		$('#vcard2').fadeOut(100).delay(100).slideDown(300);
		$('#vcard1').css('display', 'inline-block');
		$('#vcard2').css('display', 'inline-block');
	}
	else
	{
        if(calling=="techhd")
        {
		console.log(this);
		$('#vcard1 .vc1head').html(ctcpost);
		$('#vcard2 .vc2head').html(ctcpost);
   		$('#vcard1 .vc1body').html("</br>Shivam Atri </br> </br>  8826786125 </br> </br> ncs@jssaten.ac.in");
		$('#vcard2 .vc2body').html("</br>Akash Sondhi  </br> </br>8010804118 </br> </br> ncs@jssaten.ac.in");
		$('#vcard1').css('display', 'inline-block');
		$('#vcard2').css('display', 'inline-block');
		$('#vcard1').fadeOut(100).delay(100).slideDown(300);
		$('#vcard2').fadeOut(100).delay(100).slideDown(300);
        }
        else
        {
        console.log(this);
		$('#vcard1 .vc1head').html(ctcpost);
		$('#vcard2 .vc2head').html(ctcpost);
		$('#vcard1 .vc1body').html("</br>Utkarsh Chandna </br> </br> 9910640569 </br> </br> lf@jssaten.ac.in");
		$('#vcard2 .vc2body').html("</br>Purva Khanna  </br> </br>9582862004 </br> </br> quizzoc@jssaten.ac.in");
		$('#vcard1').css('display', 'inline-block');
		$('#vcard2').css('display', 'inline-block');
		$('#vcard1').fadeOut(100).delay(100).slideDown(300);
		$('#vcard2').fadeOut(100).delay(100).slideDown(300);
            
        }
	}
 }
}

function regchrgclk(pgcon)
{	
	var chrgtext='<div class="text en"><span class="content"><b>Zealicon 2014 Registration Charges</b></br></br><table><tr><th></th><th>Individual (Technical+ Cultural)</th><th>Individual (Technical+ Cultural+ Lan Gaming)</th></tr><td>For JSS Students</td> <td> 150 </td><td> 200</td> </tr> <tr> <td>For Non-JSS Students</td> <td> NA </td> <td> 200 </td></tr> </table> </br> </span></div> ';
	var timetxt='<div class="text en"><span class="content"><b>Registration Timing (Offline Registrations):</b></br>11th April- 2.00 pm to 4.30 pm</br>12th April- 8.30 am to 3.30 pm</br>13th April- 8.30am to 3.30 pm</br>14th April- 9.00 am to 11.00 am</br></br><b>*</b> Students registering for team events have to form their team on spot</br><b>*</b> College ID is compulsory for registration</br><b>*</b> Payment will be taken during Offline Registrations at the help desk</span></div>';
	var basetxt='<div class="text en"> <span class="content"> <p> <b style="text-shadow: 1px 1px #fff">Zealicon</b> is the annual techno-management cum cultural fest of JSS Academy of Technical Education, Noida . <br> <br> Zealicon celebrates the spirit of creation by inaugurating a plethora of technical competitions and cultural events. The fest  not only, empowers the participant\'s cognizance towards the contemporary technologies of every engineering discipline but also,creates an ambience of vigour through cultural events. <br> <br> We welcome you all to be a part of this spectacular fiesta and we assure you that you will "FEEL THE ZEAL"...... </p>	</span>  </div>';
	if(pgcon==1)
	{
		$("#about").html(chrgtext);
		$("#about").attr("onclick","regchrgclk(2)");
	}
	else 	if(pgcon==2)
	{
		$("#about").html(timetxt);
		$("#about").attr("onclick","regchrgclk(0)");
	}
	else 	if(pgcon==0)
	{
		$("#about").html(basetxt);
		$("#about").attr("onclick","regchrgclk(1)");
	}
}

function regdetclk()
{
	$("#register").html(timetxt);
}
 