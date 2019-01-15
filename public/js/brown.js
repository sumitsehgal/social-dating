

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

});