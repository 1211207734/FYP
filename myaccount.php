<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/account.css">
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
<?php
			if (isset($_GET['eml'])) {
				$emml = $_GET['eml'];}
				?>
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
        <a href="FAQ.html">FAQs</a>
        <a href="about.html">About Us</a>
        <a href="loginregister.php">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>


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
							<div class="phot">
								<h4>Your profile photo</h4>
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
						
					<div id="content">
                    <span class="bg-secondary p-1 px-4 rounded text-white">Account Details :</span>
                    <h4 class="mt-2 mb-0">Full Name : </h4>
                    <div><?php echo $row['Customer_name']; ?></div>
                    
                    <h4 class="mt-2 mb-0">Phone Number : </h4>
                  <div id="cc"><?php echo $row['Customer_HP']; ?></div>
                    <h4 class="mt-2 mb-0">Email : </h4>
                  <div id="cc"><?php echo $row['Customer_email']; ?></div>
                    <h4 class="mt-2 mb-0">Address : </h4>
                   <div id="cc"><?php echo $row['Customer_address_1']; ?></div>
									<div><?php echo $row['Customer_address_2']; ?></div>
                   <h4 class="mt-2 mb-0">PostCode : </h4>
                  <div id="cc"><?php echo $row['Customer_postcode']; ?></td></div>
                    
				  <div class="buttons">
                        
                 
                    	<a href="home.php?eml=<?php echo $emml?>"><button class="btn btn-primary px-4 ms-3">Home</button>
                      	<a href="upp.php?eml=<?php echo $emml?>"><button class="btn btn-primary px-4 ms-3">Update Profile Details</button>
                      	<a href="changepw.php?eml=<?php echo $emml?>"><button class="btn btn-primary px-4 ms-3">Change Password</button></a>
                    </div>
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

</html>
