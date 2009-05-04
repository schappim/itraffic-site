$(document).ready(function(){
	//jquery form submit script adapted from http://trevordavis.net/blog/tutorial/ajax-forms-with-jquery/
	$("#sendEmail").submit(function(){				   				   
		$(".contact-messages").html('<div class="box error"><ul class="no-margin"></ul></div>').hide();
		var hasError = false;
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		
		var mailToVal = $("#mailTo").val();
		var subjectVal = $("#subject").val();
		
		var nameVal = $("#name").val();
		if(nameVal == '') {
			$(".contact-messages ul").append('<li>You forgot to enter your name.</li>');
			hasError = true;
		}
		
		var emailFromVal = $("#mail").val();
		if(emailFromVal == '') {
			$(".contact-messages ul").append('<li>You forgot to enter your email address.</li>');
			hasError = true;
		} else if(!emailReg.test(emailFromVal)) {	
			$(".contact-messages ul").append('<li>Please enter a valid email address.</li>');
			hasError = true;
		}
			
		var messageVal = $("#message").val();
		if(messageVal == '') {
			$(".contact-messages ul").append('<li>You forgot to enter your message.</li>');
			hasError = true;
		}
			
		if(hasError) {
			$(".contact-messages").fadeIn(400);
		}else{
			$(".contact-messages").show().html('<p><img src="img/ajax-loader.gif" alt="Loading" id="loading" /></p>');
			$(this).ajaxSubmit(function(){
				$(".contact-messages").hide().html('<div class="box success">Thanks ! Your email has been sent</div>').fadeIn(400);
			}); 
			/*$.post("contact.php",
			{ mailTo: mailToVal, email: emailFromVal, name:nameVal, subject: subjectVal, message: messageVal },
			function(data){
				$(".contact-messages").hide().html('<div class="box success">Thanks ! Your email has been sent</div>').fadeIn(400);
			});*/
			
		}
		return false;
	});				
});
