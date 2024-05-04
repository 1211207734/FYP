<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/account.css">
</head>
<header>
	<div class="logo">
		<h1>JBP<span>STORE</span></h1>
	</div>      
	
</header>

			<div class="title">
				<h3>My Profile Details</h3>
				<hr>
			</div>
            <?php
			if (isset($_GET['eml'])) {
				$emml = $_GET['eml'];}

				$connect= mysqli_connect("localhost","root","","jbp");
                $result = mysqli_query($connect, "SELECT * FROM customer where Customer_email='$emml'");
                while($row = mysqli_fetch_assoc($result)) {
            ?>
                
					<!-- Upload profile -->
					<div class="col-xxl-4">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Your profile photo</h4>
								<div class="text-center">
									<!-- Image upload -->
									<div class="square position-relative display-2 mb-3">
										<i class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i>
									</div>
									<!-- Button -->
									<input type="file" id="customFile" name="file" hidden="">
									<label class="btn btn-success-soft btn-block" for="customFile">Upload</label>
									<button type="button" class="btn btn-danger-soft">Remove</button>
									<!-- Content -->
									<p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size 300px x 300px</p>
								</div>
							</div>
						</div>
					</div>
				 <!-- Row END -->				
			
			<!-- Form START -->
					<!-- Contact detail -->
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Account details</h4>
								<!-- First Name -->
								<div class="col-md-6">
									<label class="form-label">Full Name :</label><br>
									<div><?php echo $row['Customer_name']; ?></div>
                                    
								</div>	
								<!-- Phone number -->
								<div class="col-md-6">
									<label class="form-label">Phone number :</label>
									<div><?php echo $row['Customer_HP']; ?></div>
								</div>
								<!-- Email -->
								<div class="col-md-6">
									<label for="inputEmail4" class="form-label">Email :</label>
									<div><?php echo $row['Customer_email']; ?></div>								</div>
								<!-- Mobile number -->
								<div class="col-md-6">
									<label class="form-label">Address :</label>
									<div><?php echo $row['Customer_address_1']; ?></div>
									<div><?php echo $row['Customer_address_2']; ?></div>
									<div><?php echo $row['Customer_poscode']; ?></td></div>
								</div>
								<br>
								<div>
									<a href="updateacc.php"><button type="button"class="fbut" >Update Profile Details</button></a>
									<a href="changepw.php"><button type="button"class="fbut" >Change Password</button></a>
								</div>
								
							</div>
						</div>
			<?php } ?>
<footer>
	<p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>

