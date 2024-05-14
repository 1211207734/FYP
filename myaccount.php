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
                $result = mysqli_query($connect, "SELECT * FROM customer where Customer_ID='$emml'");
                while($row = mysqli_fetch_assoc($result)) {
            ?>
				<body>
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
									<!-- Content -->
								</div>
							</div>
						</div>
					</div>
				 <!-- Row END -->				
			
					<!-- Form START -->
					<!-- Contact detail -->
						
					<div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white">Account Details ：</span>
                    <h5 class="mt-2 mb-0">Full Name : </h5>
                    <div><?php echo $row['Customer_name']; ?></div>
                    
                    <h5 class="mt-2 mb-0">Phone Number : </h5>
                  <div><?php echo $row['Customer_HP']; ?></div>
                    <h5 class="mt-2 mb-0">Email : </h5>
                  <div><?php echo $row['Customer_email']; ?></div>
                    <h5 class="mt-2 mb-0">Address : </h5>
                   <div><?php echo $row['Customer_address_1']; ?></div>
									<div><?php echo $row['Customer_address_2']; ?></div>
                   <h5 class="mt-2 mb-0">PostCode : </h5>
                  <div><?php echo $row['Customer_postcode']; ?></td></div>
                    </div>
                    
                    <div class="buttons">
                        
                 
                        <a href="home.php?eml=<?php echo $emml?>"><button class="btn btn-primary px-4 ms-3">Home</button>
                      <a href="updateacc.php?eml=<?php echo $emml?>"><button class="btn btn-primary px-4 ms-3">Update Profile Details</button>
                      <a href="changepw.php?eml=<?php echo $emml?>"><button class="btn btn-primary px-4 ms-3">Change Password</button>
                    </div>
                    
                    
                </div>
								<br>
								<br>
							</div>
					
				</body>						
			<?php } ?>
<footer>
	<p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>

