function changeLocation() {
	var loc_id = $('#location-drop').val();
	$('#submitLoc').click(function() {
		if(loc_id != 0 || loc_id != "") {
			location.reload();
		}
		else {
			alert('Please Select a Location');
		}
	    
	});
	jQuery.ajax({
		url : my_ajax_url.ajax_url,
		type : 'post',
		data : {
			action : 'my_ajax_function',
			id : loc_id
		},
		success : function( response ) {
			jQuery('#ajax-response').html( response );
		}
	});
}