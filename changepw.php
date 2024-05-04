
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/account.css">
</head>

<header>
    <div class="logo">
        <h1>JBP<span>STORE</span></h1>
    </div>      
</header>
<div class="title">
	<h3>Change My Password</h3>
	<hr>
</div>
			<?php
				$connect= mysqli_connect("localhost","root","","jbp");
                $result = mysqli_query($connect, "SELECT Customer_password FROM customer where Customer_ID=1");
                while($row = mysqli_fetch_assoc($result)) {
            ?>			
					<form method="post">
						<div class="bg-secondary-soft px-4 py-5 rounded">
								<div class="row g-3">
									<!-- Old password -->
									<div class="col-md-6">
										<label for="exampleInputPassword1" class="form-label">Old password *</label>
										<input type="password" class="form-control" id="password" name="password">
									</div>
									<!-- New password -->
									<div class="col-md-6">
										<label for="exampleInputPassword2" class="form-label">New password *</label>
										<input type="password" class="form-control" id= "npassword" name="npassword">
									</div>
									<!-- Confirm password -->
									<div class="col-md-12">
										<label for="exampleInputPassword3" class="form-label">Confirm Password *</label>
										<input type="password" class="form-control" id= "cpassword" name="cpassword">
									</div>
									<br>
									<div>
										<a href="myaccount.php"><button type="button"class="rbut" >Cancel</button></a>
										<button type="submit" class="fbut" name="save" >Save</button>
									</div>
								</div>
							</div>
					</form>
			<?php 
			$pw = $row['Customer_password'];}

if(isset($_POST['save'])) {
	// Retrieve form data
	
	$opw = $_POST['password'];
	$npw = $_POST['npassword'];
	$cpw = $_POST['cpassword'];

	// Validate and sanitize form data (you may need more validation)
	// Connect to your MySQL database
	//$connect= mysqli_connect("localhost","root","","jbp");
	if($opw != $pw) {
		echo '<script type="text/javascript">
		alert("Invalid Old Password!");
		</script>';
		exit();
	  }

	if($npw != $cpw) {
		echo '<script type="text/javascript">
		alert("Confirm Password does not match with New Password");
		</script>';
		exit();
	  }


	// Prepare SQL statement
	$sql = "UPDATE `customer` SET Customer_password='$npw' WHERE Customer_ID = 1";
	mysqli_query($connect,$sql);
	if (mysqli_query($connect, $sql)) {
		echo '<script type="text/javascript">';
		echo 'alert("Password Updated Successfully.");';
		echo 'window.location.href = "myaccount.php";';
		echo '</script>';
	
	} else {
	echo '<script type="text/javascript">
	alert("Error executing SQL statement: " . mysqli_error($connect));
	</script>';
	}	
} ?>										
<footer>
        <p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>