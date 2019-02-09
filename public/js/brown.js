

$(document).ready(function()
{


	$('.language_drop').on('change', function()
	{
		var locale = $(this).val();

		window.location.href = '/setlanguage/'+locale;

	});

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		beforeSend: function() {
			$('.loading').show();
		}
	});

	$('#home-registration #reg_email2, #reg_email').on('change', function()
	{
			var email = $(this).val();
			var ibox = $(this);
			var jqxhr = $.post( '/checkemail', {email: email} , function(response) {
			  	if(!response.response)
			  	{
			  		alert('Email Already Exist');
			  	}
			}).done(function() {
			    $('.loading').hide();
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
			$('.loading').hide();
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
		datePicker.datepicker({maxDate: new Date()});
	}

		$('body').on('click', '.add-friend' ,function()
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
						$('.loading').hide();
					},
					beforeSend: function()
					{
						$('.loading').show();
						btn.html('Adding...')
					},
					success: function(response)
					{
						if(response.status)
						{
							btn.html('Cancel Request');
							btn.addClass('cancel-friend');
							btn.removeClass('add-friend');
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


		$('body').on('click', '.cancel-friend', function()
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
						$('.loading').hide();
					},
					beforeSend: function()
					{
						$('.loading').show();
						btn.html('Cancelling...')
					},
					success: function(response)
					{
						if(response.status)
						{
							btn.html('Add Friend');
							btn.addClass('add-friend');
							btn.removeClass('cancel-friend');
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
						$('.loading').hide();
					},
					beforeSend: function()
					{
						$('.loading').show();
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
						$('.loading').hide();
					},
					beforeSend: function()
					{
						$('.loading').show();
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
		function chatRead()
		{
			var objDiv = document.getElementsByClassName('chat-history')[0];
			objDiv.scrollTop = objDiv.scrollHeight;
			//$('.chat-history').animate({ scrollTop: $('#chat-end').offset().top }, 'slow');
			var convId = $('#frm-chat-box').attr('convid');

			$('.chat-history ul li').each(function () {
				$('[id="' + this.id + '"]:gt(0)').remove();
			});

			$.ajax({
				url: '/chat/readall/'+convId,
				success: function(response)
				{

				}
			});
		}


		$('.cancel-chat-pop').on('click', function(){
			$('.chat-wrapper').fadeOut();
			return false;
		});

		$('.chat-now-btn').on('click', function(){
			var friendUserId = $(this).attr('userid');

			$.ajax({
				url: '/chat/initiate',
				data: { friendUserId: friendUserId },
				dataType: 'json',
				beforeSend: function()
				{
					$('.loading').show();
				},
				success: function(response)
				{
					if(response.id)
					{
						$.ajax({
							url: '/chat/recentmessages/'+response.id,
							data: { friendUserId: friendUserId },
							dataType: 'json',
							complete: function()
							{
								$('.loading').hide();	
							},
							success: function(resp)
							{
								$('.chat-history ul').html(resp.html);
								if(resp.lastMessageId)
									$('.chat-history ul').attr('lastmesg', resp.lastmessageId);
								
								$('#frm-chat-box').attr('convid', response.id);	
								$('.chat-wrapper').fadeIn();
								chatRead();
							}
						});
					}
				}
			});
		});


		// Recieve

		function retrieveMsgs()
		{
			var convId = $('#frm-chat-box').attr('convid');
			if(convId)
			{
				
				var lastMessageId = $('.chat-history ul').attr('lastmesg');
				$.ajax({
					url: '/chat/receivemessage/'+convId,
					data:{messageId: lastMessageId},
					success: function(response)
					{
						$('.chat-history ul').append(response.html);
						if(response.lastmessageId)
						{
							$('.chat-history ul').attr('lastmesg', response.lastmessageId);
							chatRead();
						}
					}
				});
			}

		}
		setTimeout(function(){
			setInterval(retrieveMsgs, 2000);
		}, 5000);

	}


	


	if($('#frm-chat-box').length > 0)
	{
		$('#frm-chat-box').on('submit', function()
		{
			var message = $('#message-to-send').val();
			var conversationId = $(this).attr('convid');

			$.ajax({

				url: '/chat/sendmessage/'+conversationId,
				data: {message: message},
				dataType: 'json',
				type: 'post',
				success: function(response)
				{
					if(response.html)
					{
						$('.chat-history ul').append(response.html);
						$('#message-to-send').val('');
						chatRead();
						// TODO: Prevent for Multiple Submission
					}
				}
			});

			return false;

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
				beforeSend: function()
				{
					$('.loading').show();
				},
				complete: function()
				{
					$('.loading').hide();
				},
				success: function(response)
				{
					$('.view-list').append(response.html);
					if(response.pageno)
					{
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

	function getUnread()
	{

		$.ajax({
			url: '/chat/getallunread',
			beforeSend: function()
			{

			},
			complete:function(){
				$('.loading').hide();
			},
			success: function(response)
			{
				if(response.totalUnread)
					$('.total-ud-count').html('('+response.totalUnread+')');
				
				$('#chat-message-list').html(response.html);
			}
		});

	}



	setInterval(getUnread, 5000);
	


	if($('.frm-register').length > 0)
	{
		$('.frm-register').on('submit', function()
		{
			var password = $(this).find('.password').first().val();
			var cPassword = $(this).find('.confirm-password').first().val();

			if(password != cPassword)
			{
				alert("Password Mismatch");
				return false;
			}

			$('.loading').show();

		});
	}

	if($('.login-check').length > 0)
	{
		$('.login-check').on('click', function()
		{
			alert("Please Register / Login!!!");
			window.scrollTo(0, 0);
			return false;
		});
	}





});