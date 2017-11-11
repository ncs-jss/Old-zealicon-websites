$(document).ready(
		function()
		{
		 $('#zlogo').hover(								//Show Menu Options on Logo Hover
		 
function()
		 {
			$('#about').removeClass('inv');
			$('#gallery').removeClass('inv');
			$('#like').removeClass('inv');
			$('#contact').removeClass('inv');
			$('#about').addClass('nlink');
			$('#gallery').addClass('nlink2');
			$('#like').addClass('lkanim');
			$('#contact').addClass('conanim');
		 });
		 
		 //Hover Events on Buttoned Options
		 
		 $('#about').hover(
		 function()
		 {
			$('#htext').removeClass('inv');
			$('#htext').text('About Us');
		 });
		 $('#about').mouseout(
		 function()
		 {
			$('#htext').addClass('inv');
		 });
		 
		 $('#gallery').hover(
		 function()
		 {
			$('#htext').removeClass('inv');
			$('#htext').text('Gallery');
		 });
		 $('#gallery').mouseout(
		 function()
		 {
			$('#htext').addClass('inv');
		 });
		 
		 $('#like').hover(
		 function()
		 {
			$('#lklabel').removeClass('inv');
		 });
		 $('#like').mouseout(
		 function()
		 {
			$('#lklabel').addClass('inv');
		 });
		 
		 $('#contact').hover(
		 function()
		 {
			$('#conlabel').removeClass('inv');
		 });
		 $('#contact').mouseout(
		 function()
		 {
			$('#conlabel').addClass('inv');
		 });
		 
		 $('#csmain').hover(
		  function()
		  {
			$('#csmain').fadeOut(300);
			$('#csmain').text('The Site will be LIVE Soon');
			$('#csmain').fadeIn(300);
		  });
		  $('#csmain').mouseout(
		  function()
		  {
			$('#csmain').fadeOut(300);
			$('#csmain').text('Coming Soon');
			$('#csmain').fadeIn(300);
		  });
		   
		}
		);

		function showmenu()
			{
				$('#abt_top').addClass('inv');
				$('#show_abt').addClass('inv');
				$('#zlogo').toggleClass('pflip');
			}
		
		function clkabout()
			{
				$('#abt_top').fadeIn(300);
				$('#show_abt').slideToggle(600);
				$('#view_soc').slideUp(600);
				$('#view_contact').slideUp(600);
				$('#zlogo').toggleClass('pflip');	
			}
		function clklike()
			{
				$('#abt_top').fadeIn(300);
				$('#view_soc').slideToggle(600);
				$('#show_abt').slideUp(600);
				$('#view_contact').slideUp(600);
				$('#zlogo').toggleClass('pflip');	
			}
		function clkcontact()
			{
				$('#abt_top').fadeIn(300);
				$('#view_contact').slideToggle(600);
				$('#view_soc').slideUp(600);
				$('#show_abt').slideUp(600);
				$('#zlogo').toggleClass('pflip');	
			}
		function closetp()
			{
				$('#abt_top').fadeOut(300);
				$('#show_abt').slideUp( 300 );
				$('#zlogo').toggleClass('pflip');
			}