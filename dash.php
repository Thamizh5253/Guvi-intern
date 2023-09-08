<html>
  <head>
  <script src="jquery-3.3.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
  </head>
</html>



<?php 
include("config.php");
// include("index.php");

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) 
{
	header('Location:index.php');
	exit();
}
else
{   
	$user=$_SESSION['login_user'];
   // echo $user;
}
         
if (isset($_POST['up']))
	{
      $name = $_POST['name'];
	  $age = $_POST['age'];
	  $ph = $_POST['ph'];
	  $dob = $_POST['dob'];
      $gen = $_POST['gen'];
	  $mail = $_POST['mail'];
	
  	$query="UPDATE login
    SET uid='$name',mail='$mail',dob='$dob',age='$age',ph='$ph',gen='$gen'
    WHERE uid='$user'";
    
	
	
		if ($db->query($query) === TRUE) 
			{	
		
	?>
			<script>

swal.fire({
icon: 'success',
                title: 'Resgistered',
                text: 'Your data is Added to our DB'
}).then(function() {
    window.location = "table.php";
});
        </script>
		
		<?php
	}
	
	else{

        ?>
         <script>
		
		swal.fire({
		icon: 'error',
						title: 'Invalid',
						text: 'Unable To Save'
		}).then(function() {
			window.location = "dash.php";
		});
				</script> 
		<?php
	}
	
	
	
}
	
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="guvi.ico">
    <title>DASHBOARD</title>
    
    
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div style="background-color:#4869E1;" id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item" style="background-color:#0db449;"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="material-icons">person</i><span class="hide-menu"> <?= $user ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="table.php" class="sidebar-link"><i class="material-icons">chevron_right</i><span class="hide-menu"> Details </span></a></li>
                                <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="material-icons">chevron_right</i><span class="hide-menu"> Edit </span></a></li>

                                <li class="sidebar-item"><a href="password.php" class="sidebar-link"><i class="material-icons">chevron_right</i><span class="hide-menu"> Change Password </span></a></li>
                                <li class="sidebar-item"><a id="logoutBtn" href="#" class="sidebar-link"><i class="material-icons">chevron_right</i><span class="hide-menu"> Logout </span></a></li>

                            </ul>
                        
                        
                        </li>
                            
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ... (your existing code) ... -->

<div class="page-wrapper" style="background-color:honeydew;">
    <div class="container-fluid" style="background-color:honeydew;">
        <!-- Your form goes here -->
        <div class="row">
        <div style="background-color:honeydew;"class="col-md-6 mx-auto">
                <div style="background-color:honeydew;" class="card">
                    <div class="card-body" >
                        
                        <form action="#" method='post' name="up" style="margin:20px;animation-name: launch;animation-duration: 4s;position: relative;z-index: 1;background-color:honeydew;max-width: 360px;margin: 0 auto 100px;padding: 45px;text-align: center;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);border-radius: 10px;">
                        <h5   style="color:#0db449;"class="card-title">Edit Profile</h5>

                        <div class="form-group">
                                
                                <input name="name"type="text" class="form-control" id="name" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                
                                <input name="age" type="text" class="form-control" id="name" placeholder="Enter your age">
                            </div>
                            <div class="form-group">
                                
                                <input name="mail"type="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                
                                <input name="ph"type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
                            </div>
                            <div class="form-group"><label for="date">Date of Birth</label>
                                <input  name="dob"class="form-control" type="date" id="date">
                                </div>
                                <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gen"class="form-control" id="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                                </select></div>
                            
                            <button  name="up" type="submit" style="background-color:#0db449; color:white; border:1px solid #0db449 " class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of your form -->
    </div>

    <footer   style="background-color:honeydew;" class="footer text-center">
    Designed and Developed by <a href="https://www.linkedin.com/in/thamizharasan-p/">THAMIZH</a> With Passion.
    </footer>
</div>

<!-- ... (the rest of your code) ... -->

        <!-- ============================================================== -->
       
        
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
   
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
<!-- Script for AJAX logout -->
<script>
$(document).ready(function() {
  $("#logoutBtn").click(function() {
    $.ajax({
      type: "POST",
      url: "logout.php",
      dataType: "json",
      success: function(response) {
        if (response.success) {
          // Redirect to index.php or another page after successful logout
          window.location.href = "index.php";
        } else {
          console.error("Logout failed.");
        }
      },
      error: function() {
        console.error("AJAX request failed.");
      }
    });
  });
});
</script>
</body>

</html>