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
	//exit();
}
else
{   
	$user=$_SESSION['login_user'];
    echo $user;
}
   
if (isset($_POST['up']))
	{
      $pass = $_POST['pass'];
	  $cpass = $_POST['cpass'];
	  
	
	
	if ($pass != $cpass) {
		
		
		?>
		<script>
		
		swal.fire({
		icon: 'error',
						title: 'Wrong',
						text: 'Password Not Matched'
		}).then(function() {
			window.location = "#";
		});
				</script>
		<?php
	}
    else if (strlen($pass)<8) {
		
		
		?>
		<script>
		
		swal.fire({
		icon: 'error',
						title: 'Invalid',
						text: 'Password length should be atleast 8'
		}).then(function() {
			window.location = "#";
		});
				</script>
		<?php
	}
	
	else{
	$query="UPDATE login
    SET pass='$pass'
    WHERE uid='$user'";
    // $id=$id+1;
	
	
		if ($db->query($query) === TRUE) 
			{	
		// echo "<script>alert('Registration Successful');window.location.href='index.php';</script>";
	?>
			<script>

swal.fire({
icon: 'success',
                title: 'Resgistered',
                text: 'Password Changed Successfully'
}).then(function() {
    window.location = "table.php";
});
        </script><?php
		$_SESSION['loggedin'] = TRUE;
         $_SESSION['login_user'] =$user;
	}
	
	
	
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
    <link rel="icon" type="image/png" sizes="16x16" href="gu.ico">
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

<body style="background-color:honeydew;">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div style="background-color:honeydew;" id="main-wrapper">
        
        
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
                        <li class="sidebar-item" style="background-color:#0db449;"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="material-icons">person</i><span class="hide-menu"> <?= $user?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="table.php" class="sidebar-link"><i class="material-icons">chevron_right</i><span class="hide-menu"> Details </span></a></li>
                                <li class="sidebar-item"><a href="dash.php" class="sidebar-link"><i class="material-icons">chevron_right</i><span class="hide-menu"> Edit </span></a></li>

                                <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="material-icons">chevron_right</i><span class="hide-menu"> Change Password </span></a></li>
                                <li class="sidebar-item"><a id="logoutBtn"  href="#" class="sidebar-link"><i class="material-icons">chevron_right</i><span class="hide-menu"> Logout </span></a></li>

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

<div class="page-wrapper">
    <div class="container-fluid" style="background:honeydew;">
        <!-- Your form goes here -->
        <div class="row" style="background-color:honeydew;">
        <div class="col-md-6 mx-auto" style="background-color:honeydew;">
                <div class="card">
                    <div class="card-body" style="background-color:honeydew;" >
                        
                        <form action="#" method='post' name='up' style="margin:20px; background-color:honeydew; animation-name: launch;animation-duration: 4s;position: relative;z-index: 1;max-width: 360px;margin: 0 auto 100px;padding: 45px;text-align: center;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);border-radius: 10px;">
                        <h5 style="color:#0db449 class="card-title">Change Password </h5>

                        <div class="form-group">
                                
                                <input name="pass"type="text" class="form-control" id="pass" placeholder="Enter your new Password">
                            </div>
                            <div class="form-group">
                                
                                <input name="cpass" type="text" class="form-control" id="name" placeholder="Confirm your Password">
                            </div>
                            
                            <button  name="up" type="submit" style="background-color:#0db449; color:white; border:1px solid #0db449 " class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of your form -->
    </div>

    <footer class="footer text-center" style="background-color:honeydew;">
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