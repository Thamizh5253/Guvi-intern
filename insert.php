<html>
  <head>
  <script src="jquery-3.3.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
  </head>
</html>



<?php 
include("config.php");


if (isset($_POST['reg']))
	{
	  $name = $_POST['user'];
	  
	  $pass = $_POST['pass'];
	 
	  $email = $_POST['email'];
	//   $id=1;
	$query = "SELECT uid FROM login WHERE uid = '$name'";
	$result = $db->query($query);
	
	if ($result->num_rows > 0) {
		
		
		?>
		<script>
		
		swal.fire({
		icon: 'error',
						title: 'Invalid',
						text: 'USER ID ALREADY EXIST'
		}).then(function() {
			window.location = "index.php";
		});
				</script>
		<?php
	}
	else if ($email=="Enter a valid email" ||$name=="No special characters or spaces." ||$pass=="Password length should be atleast 8" ) {
		
		
		?>
		<script>
		
		swal.fire({
		icon: 'error',
						title: 'Invalid',
						text: 'Enter A Valid Data...'
		}).then(function() {
			window.location = "index.php";
		});
				</script>
		<?php
	}
	
	// $check="SELECT uid FROM login Where uid=$name";
    // if ($db->query($check) === TRUE){
		
		
	// 	echo "<script>alert('Already Registered');window.location.href='index.php';</script>";
		  
		
	// }
	else{
	$query="INSERT INTO login (uid ,pass,mail) VALUES ('$name', '$pass','$email')";
    // $id=$id+1;
	
	
		if ($db->query($query) === TRUE) 
			{	
		// echo "<script>alert('Registration Successful');window.location.href='index.php';</script>";
	?>
			<script>

swal.fire({
icon: 'success',
                title: 'Resgistered',
                text: 'Successfully Registered'
}).then(function() {
    window.location = "index.php";
});
        </script>
		<?php
	}
	
	
	
}
	}
?>