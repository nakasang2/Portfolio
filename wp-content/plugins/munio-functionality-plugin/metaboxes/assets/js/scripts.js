 jQuery(document).ready(function($){

	'use strict';

	/**
	* Load media uploader on pages with our custom metabox
	*/
	jQuery('.clapat-media-metabox').each( function(){
		
		// Set all variables to be used in scope
	  var frame,
		  metaBox = $(this), // Your meta box id here
		  addImgLink = metaBox.find('.upload-clapat-metabox-img'),
		  delImgLink = metaBox.find( '.delete-clapat-metabox-img'),
		  imgContainer = metaBox.find( '.clapat-metabox-img-container'),
		  imgIdInput = metaBox.find( '.clapat-metabox-img-id' ),
		  imgUrlInput = metaBox.find( '.clapat-metabox-img-url' );
	  
			// ADD IMAGE LINK
			addImgLink.on( 'click', function( event ){
			
				event.preventDefault();
				
				// If the media frame already exists, reopen it.
				if ( frame ) {
				  frame.open();
				  return;
				}
				
				// Create a new media frame
				frame = wp.media({
				  title: 'Select or Upload Media',
				  button: {
					text: 'Use this media'
				  },
				  multiple: false  // Set to true to allow multiple files to be selected
				});

			
				// When an image is selected in the media frame...
				frame.on( 'select', function() {
			  
					// Get media attachment details from the frame state
					var attachment = frame.state().get('selection').first().toJSON();

					// Clear out the preview image
					imgContainer.html( '' );
					
					// Send the attachment URL to our custom image input field.
					var thumb_url  = '';
					if( attachment.sizes.thumbnail == null ){
						
						if( attachment.sizes.medium == null ){
							thumb_url = attachment.url;
						}
						else{
							thumb_url = attachment.sizes.medium.url;
						}
					}
					else{
						
						thumb_url = attachment.sizes.thumbnail.url;
					}
					imgContainer.append( '<img src="' + thumb_url + '" alt="" style="max-width:100%;"/>' );

					// Send the attachment id to our hidden input
					imgIdInput.val( attachment.id );
					
					// Send the attachment url to our url text field
					imgUrlInput.val( attachment.url );

					// Hide the add image link
					addImgLink.addClass( 'hidden' );

					// Unhide the remove image link
					delImgLink.removeClass( 'hidden' );
				});

				// Finally, open the modal on click
				frame.open();
		  });
	  
	  
		  // DELETE IMAGE LINK
		  delImgLink.on( 'click', function( event ){

				event.preventDefault();

				// Clear out the preview image
				imgContainer.html( '' );

				// Un-hide the add image link
				addImgLink.removeClass( 'hidden' );

				// Hide the delete image link
				delImgLink.addClass( 'hidden' );

				// Delete the image id from the hidden input
				imgIdInput.val( '' );
			
				// Delete the image url from the url input
				imgUrlInput.val( '' );

		  });
		  
	});
	
	// Show / hide fields depending on their parent's value
	$('div[attr-depends-on]').each(function() {
				
		var name = $(this).attr("attr-depends-on");
		var element = $('#' + name);
		var value = '';
		if( element.attr('type') == 'checkbox' ){
				
			value = element.prop('checked');
		}
		else{
				
			value = element.val();
		}
		var operator = $(this).attr("attr-depends-op");
		var test_value = $(this).attr("attr-depends-val");
		(test_value == value) ? $(this).show() : $(this).hide();
				
	});
	
	// Event handlers for metabox fields changing their value
	jQuery('.clapat-metabox-event').each( function(){
		
		$(this).on( 'change', function(){
			
			var name = $(this).attr('name');
			var value = '';
			if( $(this).attr('type') == 'checkbox' ){
				
				value = $(this).prop('checked');
			}
			else{
				
				value = $(this).val();
			}
			
			// visually notify the user that the value has been changed and data needs to be saved
			notifyDataChanged();
			
			// check if the current field has dependents; will show - hide them depending on the current value
			$('div[attr-depends-on="' + name + '"]').each(function() {
				
				var operator = $(this).attr("attr-depends-op");
				var test_value = $(this).attr("attr-depends-val");
				(test_value == value) ? $(this).show() : $(this).hide();
				
			});
		});
	});
	
	function notifyDataChanged(){
		
		$('.clapat-metabox-notice-save').show(500);
	}
	
	// Multiple sections options
	// Get all elements with class="tablinks" and remove the class "active"
	$('.tablinks').on( 'click', function( event ){
	
		// Reset the active class
		$('.tablinks').removeClass('active');
		$('.tabcontent').removeClass('active');
		
		// Add active class to the active tab
		var tab_id = $(this).attr('tab-id');
		$(this).addClass('active');
		$('#clapat_metabox_tab_' + tab_id).addClass('active');
		
		event.preventDefault();
	});
		
});