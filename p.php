<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/p.css">
	<link rel="stylesheet" type="text/css" href="css/vendor.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/cart.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 <script>
        function disableBack() { window.history.forward(); }
setTimeout("disableBack()", 0);
window.onunload = function () { null };
    </script>
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
        <a href="shop.php?eml=<?php echo $emml?>">Shop</a>
        <a href="orderhis.php?eml=<?php echo $emml?>">Order History</a>
        <a href="p.php?eml=<?php echo $emml?>"class="active">My Account</a>
        <a href="FAQ.php?eml=<?php echo $emml?>">FAQs</a>
        <a href="about.php?eml=<?php echo $emml?>">About Us</a>
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
					<div class="container rounded bg-white mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                
                            </div>
                            <div class="col-md-5 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Profile Detail:</h4>
                                    </div>
                                    <div class="row mt-2">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                <td class ="py-0"><img style="width: 350px;height 350px" src="<?php echo $row['img'] ?>" class="user-image rounded-circle" alt="User Image" /></td>
                                    <br><br>
                                    
                                </div>
                                        <div class="col-md-6"><label class="labels"><h5>Full Name:</h5></label><p><?php echo $row['Customer_name']; ?></p></div>
                                        <div class="col-md-12"><label class="labels"><h5>Phone Number:</h5></label><p><?php echo $row['Customer_HP']; ?></p></div>
                                        <div class="col-md-12"><label class="labels"><h5>Email Address:</h5></label><p><?php echo $row['Customer_email']; ?></p></div>
                                        <div class="col-md-12"><label class="labels"><h5>Address:</h5></label><p><?php echo $row['Customer_address_1']; ?><br><?php echo $row['Customer_address_2']; ?></p></div>
                                        <div class="col-md-12"><label class="labels"><h5>Postcode:</h5></label><p><?php echo $row['Customer_postcode']; ?></p></div>
                                    </div>
                                    <div class="buttons">
                                    <a href="upp.php?eml=<?php echo $emml?>"><button class="btn btn-primary px-4 ms-3">Update Profile Details</button><br><br><br>
                                    <a href="cp.php?eml=<?php echo $emml?>"><button class="btn btn-primary px-4 ms-3">Change Password</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
				</body>						
                <?php } ?>
<footer>
	<p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>

</html>
