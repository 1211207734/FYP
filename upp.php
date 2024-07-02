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
                                        <h4 class="text-right">Profile Settings</h4>
                                    </div>
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    

									<form method="post" enctype="multipart/form-data">
										<body>
											<div class="text-center">
                                           <div id="imagePreview"> </div><br>
                                           <button id="removeImageButton">Remove Image</button>    <input type="file" id="uploadInput" name="profileImage" accept="image/*">
												
												<br>
												
											</div>
											<script>
												document.getElementById('uploadInput').addEventListener('change', function(event) {
												const file = event.target.files[0];
												const reader = new FileReader();

												reader.onload = function(e) {
													const imagePreview = document.getElementById('imagePreview');
													imagePreview.innerHTML = `<img style="width: 350px; height:350px" src="${e.target.result}" alt="Preview">`;
													document.getElementById('uploadInput').style.display = 'none';
													document.getElementById('removeImageButton').style.display = 'block';
												}

												reader.readAsDataURL(file);
												});

												document.getElementById('removeImageButton').addEventListener('click', function() {
												const imagePreview = document.getElementById('imagePreview');
												imagePreview.innerHTML = '';
												imagePreview.style.display = 'none';
												document.getElementById('removeImageButton').style.display = 'none';
												document.getElementById('uploadInput').value = ''; // Reset the file input
												});
											</script>
                                            <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size 300px X 300px</p>
										</body>
                                    
                                </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels">Full Name</label>
                                        <input type="text" class="form-control" placeholder="" name="fullname" value="<?php echo $row['Customer_name']; ?>"></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="" name="phone" value="<?php echo $row['Customer_HP']; ?>"></div>
                                        
                                        <div class="col-md-12"><label class="labels">Email ID</label>
                                        <input readonly type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo $row['Customer_email']; ?>"></div>
                                        
                                        <div class="col-md-12"><label class="labels">Address Line 1</label>
                                        <input type="text" class="form-control" placeholder="" name="a1" value="<?php echo $row['Customer_address_1']; ?>"></div>
                                        
                                        <div class="col-md-12"><label class="labels">Address Line 2</label>
                                        <input type="text" class="form-control" placeholder="" name="a2" value="<?php echo $row['Customer_address_2']; ?>"></div>
                                        
                                        <div class="col-md-12"><label class="labels">Postcode</label>
                                        <input type="text" class="form-control" placeholder="" name="pos" value="<?php echo $row['Customer_postcode']; ?>"></div>
 
                                    </div>
                                    <br>
                                    <a href="p.php?eml=<?php echo $emml?>">
                                    <button type="button"class="btn btn-primary profile-button" >Cancel</button></a>
                                
                                    <button class="btn btn-primary profile-button" type="submit" name="save">Save Changes</button>
                                </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
				</body>						
                <?php }
                if(isset($_POST['save'])) {
                    // Retrieve form data
                    $f = $_POST['fullname'];
                    $p = $_POST['phone'];
                    $email = $_POST['email'];
                    $a1 = $_POST['a1'];
                    $a2 = $_POST['a2'];
                    $pos = $_POST['pos'];
                    $fn=basename($_FILES['profileImage']['name']);
                    $ft=basename($_FILES['profileImage']['tmp_name']);
                    $folder="images/user/".$fn;
            
                    
            
            
            
                    // Validate and sanitize form data (you may need more validation)
                    // Connect to your MySQL database
                    //$connect= mysqli_connect("localhost","root","","jbp");
            
                
            
                    // Prepare SQL statement
                    $sql = "UPDATE `customer` SET Customer_name='$f', Customer_HP='$p', Customer_email='$email', Customer_address_1='$a1', Customer_address_2='$a2', Customer_postcode='$pos', img='$folder' WHERE Customer_ID='$emml'";
                    mysqli_query($connect,$sql);
                    if (mysqli_query($connect, $sql)&&move_uploaded_file($ft,$folder))
                    {
                    
                        echo '<script type="text/javascript">';
                        echo 'window.location.href = "p.php?eml='.$emml.'";';
                        echo 'alert("Profile Updated Successfully.");';
                        echo '</script>';
                    
                    } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Error executing SQL statement:".mysqli_error($connect));';
                    echo '</script>';
                    }	
                    
                    
                    
                } ?>
                <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener to the "Save Changes" button
            document.querySelector('button[name="save"]').addEventListener('click', function(event) {
                // Submit the form
                document.querySelector('form').submit();
                // Redirect to p.php after showing the alert
                window.location.href = "p.php?eml=<?php echo $emml ?>";
                // Show alert message after form submission
                alert("Profile Updated Successfully.");
                
                
            });
        });
    </script>
                
<footer>
	<p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>

</html>
