	(function(){
		
//This function is moved to modal handler in moodalEffects.js
//		eventNav.on('click','li',function(){
			//event.preventDefault();
//			console.log($(this).attr('data-category'));
			//showModal($(this).attr('data-category'));			
//		});

		function showModal(category){
			console.log(category);
			//Showing the top navigation on modal
			//Removing highlight classes if any		
			$('#modal-nav li').removeClass('highlight anyotheryouwant');			
			
			//Adding opened and classes for highlight current category
			$('#modal-nav li[data-category = '+category+']').addClass('highlight anyotheryouwant');			
			$('#modal-nav li[data-category = '+category+'] a[data-category = '+category+']').addClass('highlight anyotheryouwant');			
			
			//showing lower portions
//			showEventModal(id);

			//Attaching eventlistner for top navigation
//			$('#modal-nav li').on('click',function(){
//				showEventModal($(this).attr('data-category'));
//			});
		
		}


		function showEventModal(category){
			var categoryId = category ;
			$('#event-modal[data-id='+id+']').removeClass('hidden any other');
			$('#event-modal[data-id='+id+']').addClass('visible any other');
			$('#event-modal[data-id='+id+']').addClass('visible any other');	
			showEvent('',id);
			$('#event-modal aside li').off('click');	
			$('#event-modal[data-id='+id+'] aside li').on('click',function(){
				showEvent($(this).attr('data-id'),categoryId);
			})

		}

		function  showEvent(eventId,id){
			$('#event-modal[data-id='+id+'] aside li').removeClass('highlight any otheryouwant');
			
			if(eventId === ''){
				$('#event-modal[data-id='+id+'] aside li').first().addClass('highlight-it anyother you want');
				$('#event-modal[data-id='+id+'] div .event-details').first().addClass('visible any other you want');
				$('#event-modal[data-id='+id+'] div .event-details').first().removeClass('hidden any other you want');
			}else{
				$('#event-modal[data-id='+id+'] aside li[data-id='+eventId+']').addClass('highlight-it anyother you want');
				$('#event-modal[data-id='+id+'] div[data-id='+eventId+'].event-details').addClass('visible any other you want');
				$('#event-modal[data-id='+id+'] div[data-id='+eventId+'].event-details').removeClass('hidden any other you want');
			}
		}

		function eventModalClose(){
			$('#modal-nav').removeClass('highlight anyotheryouwant');
			$('#modal-nav').addClass('hidden otheryouwant');		
			$('#event-modal').removeClass('visible or any other');
			$('#event-modal').addClass('hidden or any other');
			$('#event-modal aside li').removeClass('highlight-it or any othet');
			$('#event-modal div.eventdetails').removeClass('visible or any other');
			$('#event-modal div.eventdetails').addClass('hidden or any other');
			$('#event-modal aside li').off('click');
			$('#modal-nav li').off('click');
		}


	}());

