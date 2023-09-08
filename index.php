
<html>
  <head>
  <script src="jquery-3.3.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
  </head>
</html>

<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['user']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql = "SELECT * FROM login WHERE  uid = '$myusername' and BINARY pass = '$mypassword' ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        // session_register("myusername");
		 $_SESSION['loggedin'] = TRUE;
         $_SESSION['login_user'] = $myusername;
          // Replace with the actual UID
         
//echo "<script>alert('Login Successful');window.location.href='main.php';</script>";
?>
<script>

swal.fire({
icon: 'success',
                title: 'Success',
                text: 'Login Successfully'
}).then(function() {
    window.location = "table.php";
});
        </script>

<?php
      }
	  else
	  {
      ?>
<script>

swal.fire({
icon: 'error',
                title: 'Invalid',
                text: 'Wrong ID or Password'
}).then(function() {
    window.location = "index.php";
});
        </script>
<?php
         //echo "<script>alert('Your Login Name or Password is invalid');window.location.href='index.php';</script>"; -->

		 exit();
      }

   }	


?>


<!DOCTYPE html>
<html>
    <head>

    <script src="jquery-3.3.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
   <link rel="icon" href="/fav.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/fav.ico" type="image/x-icon">
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css">
   <script> // Look at console
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
});</script> 
  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);
/* Look at console */
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  animation-name: launch;
  animation-duration: 4s;
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  border-radius: 10px;
}
.form h3 {
  font-size: 25px;
  font-weight: 300;
  margin-bottom: 10px;
  text-align: center;
  text-transform: uppercase;
  color:#0DB449;
  margin:20px;
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
  border-radius: 10px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #0DB449;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  border-radius: 10px;
}
.form button:hover,.form button:active,.form button:focus {
   background:#0DD749 ; 
  border: 40px;
  border-color:"blue";
  color:"blue";
  
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 16px;
}
.form .message a {
  color: #0DB449;
  text-decoration: none;
}
.form .login-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #0DB449;
}


@media only screen and (max-width: 400px) {
  .login-page {
    width: 100%;
    height: 100%;
  }
}

#create-username.error {
  color: red;
}

#create-password.error {
  color: red;
}

#create-email.error {
  color: red;
}



  </style>
</head>
    <body style="margin:50px; background-color:honeydew; ">
    <div class="login-page">
  <div class="form">
  <form method="post" action="#" class="login-form">
    <h3>Login</h3>
      <input id="login-username" type="text" placeholder="username" name="user"/>
      <input id="login-password" type="password" placeholder="password" name="pass"/>
      <button name="login-button" type="submit" id="sendUidBtn">login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
    <form action="insert.php" name="reg" method="post" class="register-form">
    <h3>Signup</h3>
      <input name="user" id="create-username" type="text" placeholder="username"/>
      
      <input name="email" id="create-email" type="text" placeholder="email address"/>
      <input name="pass" id="create-password" type="password" placeholder="password"/>
      <button name="reg" type="submit" id="create-button">create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    
  </div>
</div>
  
  
    </body>
</html>