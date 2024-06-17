<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/cp.css">
	<link rel="stylesheet" type="text/css" href="css/vendor.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/cart.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<header>
	<div class="logo">
		<h1>JBP<span>STORE</span></h1>
	</div>      
</header>
<div class="topnav" id="myTopnav">
        <a href="home.php?eml=<?php echo $emml?>" >Home</a>
        <a href="shoptry.php?eml=<?php echo $emml?>&cid=1">Shop</a>
        <a href="orderhis.php?eml=<?php echo $emml?>">Order History</a>
        <a href="myaccount.php?eml=<?php echo $emml?>"class="active">My Account</a>
        <a href="FAQ.php">FAQs</a>
        <a href="about.html">About Us</a>
        <a href="loginregister.php">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
				<body>
					<div class="container rounded bg-white mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <div class="square position-relative display-2 mb-3">
										<i class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i>
									</div>

									<form method="post" enctype="multipart/form-data">
									
                                </div>
                            </div>
                            <div class="col-md-5 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Change Password</h4>
                                    </div>
									<?php
									$connect= mysqli_connect("localhost","root","","jbp");
									if (isset($_GET['eml'])) {
										$emml = $_GET['eml'];}
									$result = mysqli_query($connect, "SELECT Customer_password FROM customer where Customer_ID='$emml'");
									while($row = mysqli_fetch_assoc($result)) {
									?>
									<form method="post">
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels">Old Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" value=""></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">New Password:</label>
                                        <input type="password" class="form-control" id="npassword" name="npassword" value=""></div>
                                        
                                        <div class="col-md-12"><label class="labels">Confirm New Password:</label>
                                        <input type="password" class="form-control" id="cpassword" name="cpassword" value=""></div>
                                    </div>
                                    <div class="mt-5 text-center">
									<a href="p.php?eml=<?php echo $emml?>">
                                    <button type="button"class="btn btn-primary profile-button" >Cancel</button></a>
										<button type="submit" class="btn btn-primary profile-button" name="save" >Save Changes</button>
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
	$sql = "UPDATE `customer` SET Customer_password='$npw' WHERE Customer_ID ='$emml'";
	mysqli_query($connect,$sql);
	if (mysqli_query($connect, $sql)) {
		echo '<script type="text/javascript">';
		echo 'window.location.href = "p.php?eml='.$emml.'";';
		echo 'alert("Password Updated Successfully.");';
		echo '</script>';
	
	} else {
	echo '<script type="text/javascript">
	alert("Error executing SQL statement: " . mysqli_error($connect));
	</script>';
	}	
} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
				</body>						
                
                
<footer>
	<p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>

</html>
