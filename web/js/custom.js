$(document).ready(function(){

	// post ajax request on click of user delete button
	$('.delete').on('click', function(event) {
		//read user_id from data-id
		var user_id = $(this).attr('data-id');
		var form_data = {'user_id': user_id};
		$.ajax({
			url: '/index.php/user/delete_user',
			data: form_data,
			dataType: 'json',
			type: 'post',
			context: this,
			success: function(data, textStatus, jqXHR)
			{
				if(data.success === true) {
					//remove table row on success
					$(this).closest('tr').remove();
				} else {
					alert(data.message);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});
});

