/**
 * modalEffects.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
var ModalEffects = function() {

	function init() {

		var overlay = document.querySelector( '.md-overlay' );

		[].slice.call( document.querySelectorAll( '.md-trigger' ) ).forEach( function( el, i ) {

			var modal = document.querySelector( '#' + el.getAttribute( 'data-modal' ) ),
				close = modal.querySelector( '.md-close' );

			function removeModal( hasPerspective ) {
				classie.remove( modal, 'md-show' );

				if( hasPerspective ) {
					classie.remove( document.documentElement, 'md-perspective' );
				}
			}

			function removeModalHandler() {
				removeModal( classie.has( el, 'md-setperspective' ) ); 
			}

			el.addEventListener( 'click', function( ev ) {
				classie.add( modal, 'md-show' );
				showModal($(this).attr('data-category'));
				//overlay.removeEventListener( 'click', removeModalHandler);
				//overlay.addEventListener( 'click', removeModalHandler );

				if( classie.has( el, 'md-setperspective' ) ) {
					setTimeout( function() {
						classie.add( document.documentElement, 'md-perspective' );
					}, 25 );
				}
			});

			close.addEventListener( 'click', function( ev ) {
				ev.stopPropagation();
				eventModalClose();
				removeModalHandler();
			});

		} );

	}


			function showModal(category){
				//Showing the top navigation on modal
				//Removing highlight classes if any		
				$('#modal-nav li').removeClass('highlight');			
				$('#modal-nav li a').removeClass('highlight');
				//Adding opened and classes for highlight current category
				$('#modal-nav li[data-category = '+category+']').addClass('highlight');			
				$('#modal-nav li[data-category = '+category+'] a[data-category = '+category+']').addClass('highlight');			
				
				//showing lower portions
				showEventModal(category);

				//Attaching eventlistner for top navigation
				$('#modal-nav li').on('click',function(){
					$('#modal-nav li').removeClass('highlight');
					$('#modal-nav li a').removeClass('highlight');

				$('#modal-1 .event-details').html('');
				 $('#modal-1 .sidebar').html('');
					showEventModal($(this).attr('data-category'));
				});
			
			}


			function showEventModal(category){
				var categoryId = category;
				$('#modal-nav li[data-category = '+category+']').addClass('highlight anyotheryouwant');							
				$('#modal-nav li[data-category = '+category+'] a[data-category = '+category+']').addClass('highlight anyotheryouwant');					

				var eventNav = $('#modal-data-'+categoryId+' #modal-data-nav').html();
				$('#modal-1 .sidebar').html(eventNav);

				showEvent(-1,categoryId);

				$('#modal-1 .sidebar li').off('click');					
				$('#modal-1 .sidebar li').on('click',function(){
					showEvent($(this).attr('data-id'),categoryId);
				})

			}

			function  showEvent(eventId,id){
				$('#modal-1 .sidebar li').removeClass('highlight');
				var eventDetails;
				if(eventId === -1){
					eventDetails = $('#modal-data-'+id+' #modal-data-content').first().html();
					$('#modal-1 .sidebar li').first().addClass('highlight');
				}else{
					$('#modal-1 .sidebar li[data-id='+eventId+']').addClass('highlight');
					eventDetails=$('#modal-data-'+id+' #modal-data-content[data-id='+eventId+']').html();
				}
				
				$('#modal-1 .event-details').html(eventDetails);
			}

			function eventModalClose(){
				$('#modal-nav').removeClass('highlight');
				$('#modal-1 sidebar li').removeClass('highlight o');
				$('#modal-1 sidebar li').off('click');
				$('#modal-1 li').off('click');
			}











	init();

}
ModalEffects();