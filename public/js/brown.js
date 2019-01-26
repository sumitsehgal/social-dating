

$(document).ready(function()
{

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('#home-registration #reg_email2').on('change', function()
	{
			var email = $(this).val();
			var ibox = $(this);
			var jqxhr = $.post( '/checkemail', {email: email} , function(response) {
			  	if(!response.response)
			  	{
			  		alert('Email Already Exist');
			  	}
			}).done(function() {
			    
			  })
			  .fail(function() {
			    
			  })
			  .always(function() {
			    
			  });

	});



	

//	Login 
	$('#lgn-frm').on('submit', function()
	{
		var action =$(this).attr('action');
		var jqxhr = $.post( action, {email: $('#lg-email').val(), password: $('#lg-pass').val()} , function(response) {
		  console.log(response);
		  window.location = '/home';
		}).done(function() {
		    	
		  })
		  .fail(function(response) {
		  	console.log(response);
		    if(response.responseJSON.message != "")
		    {
		    	$('#errs').html(response.responseJSON.message);
		    }
		  })
		  .always(function() {
		    
		  });
	 
		 return false;
	});


	// Registration 
	// $('#home-registration').on('submit', function()
	// {
	// 	var action =$(this).attr('action');
	// 	var jqxhr = $.post( action, {email: 'check@test.com'} , function() {
	// 	  alert( "success" );
	// 	}).done(function() {
	// 	    alert( "second success" );
	// 	  })
	// 	  .fail(function() {
	// 	    alert( "error" );
	// 	  })
	// 	  .always(function() {
	// 	    alert( "finished" );
	// 	  });
	 
	// 	 return false;
	// });

	var datePicker = $('.datetime');
	if(datePicker.length > 0)
	{
		datePicker.datepicker();
	}



	if($('.add-friend').length > 0)
	{

		$('.add-friend').on('click', function()
		{
			var friendId = $('.add-friend').attr('userid');
			var btn = $(this);
			if(friendId)
			{
				$.ajax({
					url: '/addfriend/'+friendId,
					type: 'get',
					dataType: 'json',
					complete: function()
					{

					},
					beforeSend: function()
					{
						btn.html('Adding...')
					},
					success: function(response)
					{
						if(response.status)
						{
							btn.html('Cancel Request');
						}
						else
						{
							alert('There is Some Problem. Please Try Again...');
							window.location.reload();
						}
					}
				})
			}
		});
	}


	if($('.cancel-friend').length > 0)
	{

		$('.cancel-friend').on('click', function()
		{
			var friendId = $('.cancel-friend').attr('userid');
			var btn = $(this);
			if(friendId)
			{
				$.ajax({
					url: '/cancelfriend/'+friendId,
					type: 'get',
					dataType: 'json',
					complete: function()
					{

					},
					beforeSend: function()
					{
						btn.html('Cancelling...')
					},
					success: function(response)
					{
						if(response.status)
						{
							btn.html('Add Friend');
						}
						else
						{
							alert('There is Some Problem. Please Try Again...');
							window.location.reload();
						}
					}
				})
			}
		});
	}


	if($('.approve-request').length > 0)
	{

		$('.approve-request').on('click', function()
		{
			var friendId = $('.approve-request').attr('userid');
			var btn = $(this);
			if(friendId)
			{
				$.ajax({
					url: '/approvefriend/'+friendId,
					type: 'get',
					dataType: 'json',
					complete: function()
					{

					},
					beforeSend: function()
					{
						btn.html('Accepting...')
					},
					success: function(response)
					{
						if(response.status)
						{
							btn.html('Friend');
							btn.parents('.request-outer').first().fadeOut();
						}
						else
						{
							alert('There is Some Problem. Please Try Again...');
							window.location.reload();
						}
					}
				})
			}
		});
	}



	if($('.decline-request').length > 0)
	{

		$('.decline-request').on('click', function()
		{
			var friendId = $('.decline-request').attr('userid');
			var btn = $(this);
			if(friendId)
			{
				$.ajax({
					url: '/declinefriend/'+friendId,
					type: 'get',
					dataType: 'json',
					complete: function()
					{

					},
					beforeSend: function()
					{
						btn.html('Deleting...')
					},
					success: function(response)
					{
						if(response.status)
						{
							btn.html('UnFriend');
							btn.parents('.request-outer').first().fadeOut();
						}
						else
						{
							alert('There is Some Problem. Please Try Again...');
							window.location.reload();
						}
					}
				})
			}
		});
	}


	if($('.chat-now-btn').length > 0)
	{
		$('.chat-now-btn').on('click', function(){
			$('.chat-wrapper').fadeIn();
		});
	}

	if($('.view-more').length > 0)
	{
		$('.view-more').on('click', function()
		{
			var pageNo = $(this).attr('pageno');

			$.ajax({

				url: '/listusers?page='+pageNo,
				dataType: 'json',
				success: function(response)
				{
					$('.view-list').append(response.html);
					if(response.pageno)
					{
						console.log(response.pageno);
						$('.view-more').attr('pageno', response.pageno);
					}
					else
					{
						$('.view-more').remove();
					}
				}

			});

			return false;
		});
	}


});