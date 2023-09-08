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
    //echo $user;
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
    <link rel="icon" href="guvi.ico" type="image/x-icon">
    <link rel="shortcut icon" href="guvi.ico" type="image/x-icon">
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="guvi.ico"> -->
    <title>DASHBOARD</title>
    <style>
       
        
   td {
    border: 1px solid #0db449;
    padding: 8px;
    text-align: center;
    
  }

  th {
    border: 1px solid #0db449;
    color:'white';
    /* border-radius: 25px 25px 0px 0px; */
    background-color: #0db449;
  }

  tr:nth-child(even) {
    background-color: honeydew;
  }

  tr:nth-child(odd) {
    background-color: honeydew;
  }
    </style>
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
                        <li class="sidebar-item" style="background-color:#0db449;"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="material-icons">person</i><span class="hide-menu"> <?= $user ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="material-icons">chevron_right</i><span class="hide-menu"> Details </span></a></li>
                                <li class="sidebar-item"><a href="dash.php" class="sidebar-link"><i class="material-icons">chevron_right</i><span class="hide-menu"> Edit </span></a></li>
                                <!-- <li class="sidebar-item"><a href="index.php" class="sidebar-link"><i class="fa fa-power-off m-r-5 m-l-5"></i><span class="hide-menu"> Logout </span></a></li> -->

                                <li class="sidebar-item"><a href="password.php" class="sidebar-link"><i class="material-icons">chevron_right</i><span class="hide-menu"> Change Password </span></a></li>
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

<div class="page-wrapper" style="background-color:honeydew;">
    <div class="container-fluid" style="background-color:honeydew;">
        <!-- Your form goes here -->
        <table class="table" style=" border-collapse: collapse;
    width: 50%;
    margin: auto;margin-top: 40px;  background-color:honeydew; ">
  
  <?php
										$query2 = "SELECT * FROM login where uid='$user'";
										$query_run2 = mysqli_query($db, $query2);

										if(mysqli_num_rows($query_run2) > 0)
										{
											foreach($query_run2 as $student2)
											{
                                    ?>
                                    
  
    <th style="color:white; text-align:center" colspan="2">User Data</th>
    
  
    
    <tr>
        <td>Name</td>
    <td><?= $student2['uid'] ?></td>
  </tr>
  <tr>
    <td>Mail Id</td>
    <td><?= $student2['mail'] ?></td>
  </tr>
  <tr>
    <td>Date Of Birth</td>
    <td><?= $student2['dob'] ?></td>
  </tr>
  <tr>
    <td>Age</td>
    <td><?= $student2['age'] ?></td>
  </tr>
  <tr>
    <td>Phone</td>
    <td><?= $student2['ph'] ?></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><?= $student2['gen'] ?></td>
  </tr>
  <?php
											
                      				}
                                }
                            ?>
</table>
    </div>

    <footer   style="background-color:honeydew; " class="footer text-center">
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