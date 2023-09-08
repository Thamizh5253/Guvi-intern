 // Look at console
$(document).ready(function() {
	var loginUsername;
	var loginPassword;
	var account = [loginUsername, loginPassword];
  
	
  
	$('#create-button').on('click', function() {
		var createUsernameEntry = $("#create-username").val();
		var createPasswordEntry = $("#create-password").val();
		var createEmailEntry = $("#create-email").val();
    var createUsernameValid = false;
    var createPasswordValid = false;
    var createEmailValid = false;
    var createUsernameObject = $("#create-username");
    var createPasswordObject = $("#create-password");
    var createEmailObject = $("#create-email");
    var validate = /^\s*[a-zA-Z0-9,\s]+\s*$/;
    var validateEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   
    if(!validate.test(createUsernameEntry) || (createUsernameEntry).length == 0) {
      $(createUsernameObject).addClass("error")
      //
      $(createUsernameObject).val("No special characters or spaces.")
    } else {
      createUsernameValid = true;
      var createUsername = $(createUsernameObject).val();
    }
    
    if( (createPasswordEntry).length < 8) {
      $(createPasswordObject).addClass("error");
      $(createPasswordObject).val("Password length should be atleast 8");
    } else {
      createPasswordValid = true;
      var createPassword = $(createPasswordObject).val();
    }
    
    if(!validateEmail.test(createEmailEntry)) {
      $(createEmailObject).addClass("error");
      $(createEmailObject).val("Enter a valid email");
    } else {
      createEmailValid = true;
      console.log("Account Email " + createEmailObject.val())
    }
      
    $(createUsernameObject).on('click', function () {
      $(this).val("");  
      $(this).removeClass("error");
    });
    
    $(createPasswordObject).on('click', function () {
      $(this).val("");  
      $(this).removeClass("error");
    });
    
    $(createEmailObject).on('click', function () {
      $(this).val("");
      $(this).removeClass("error");
    });
    
		account = [createUsername, createPassword];
		console.log("Account Username " + account[0]);
		console.log("Account Password " + account[1]);
    
		if(createUsernameValid == true && createPasswordValid == true && createEmailValid == true) {
      $('form').animate({
			height: "toggle",
			opacity: "toggle"
		}, "fast");
    }
	});
  
	$('.message a').on('click', function() {
		$('form').animate({
			height: "toggle",
			opacity: "toggle"
		}, "fast");
	});
});