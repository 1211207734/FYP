<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="css/account.css">
</head>
<header>
	<div class="logo">
		<h1>JBP<span>STORE</span></h1>
	</div>      
	
	
</header>
<style>
  #imagePreview {
    width: 200px;
    height: 200px;
    border: 2px dashed #aaa;
    margin-top: 10px;
    display: none;
  }

  #imagePreview img {
    max-width: 100%;
    max-height: 100%;
  }

  #removeImageButton {
    margin-top: 10px;
    display: none;
  }
</style>
<div class="title">
	<h3>Update My Profile Details</h3>
	<hr>
</div>
		<?php
		if (isset($_GET['eml'])) {
			$emml = $_GET['eml'];}
			$connect= mysqli_connect("localhost","root","","jbp");
			$result = mysqli_query($connect, "SELECT * FROM customer where Customer_email='$emml'");
			while($row = mysqli_fetch_assoc($result)) {
		
			
			

		?>	
				<body>		
					<!-- Upload profile -->
					<div class="col-xxl-4">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Upload your profile photo</h4>
								<div class="text-center">
									<!-- Image upload -->
									<div class="square position-relative display-2 mb-3">
										<i class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i>
									</div>

									<form method="post" enctype="multipart/form-data">
										<body>
											<div class="text-center">
												<input type="file" id="uploadInput" name="profileImage" accept="image/*">
												<div id="imagePreview"></div>
												<button id="removeImageButton">Remove Image</button>
											</div>
											<script>
												document.getElementById('uploadInput').addEventListener('change', function(event) {
												const file = event.target.files[0];
												const reader = new FileReader();

												reader.onload = function(e) {
													const imagePreview = document.getElementById('imagePreview');
													imagePreview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
													imagePreview.style.display = 'block';
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
										</body>
										<!-- Content -->
										<p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size 300px x 300px</p>
									</form>
								</div>
							</div>
						</div>
					</div>
					<form method="post">
						<div class="bg-secondary-soft px-4 py-5 rounded">
								<h4 class="mb-4 mt-0">Account details</h4>
								<!-- First Name -->
								<div class="col-md-6">
									<label class="form-label">Full Name *</label>
									<input type="text" class="form-control" placeholder="" aria-label="First name"  name="fullname"	value="<?php echo $row['Customer_name']; ?>">
								</div>	
								<!-- Phone number -->
								<div class="col-md-6">
									<label class="form-label">Phone number *</label>
									<input type="text" class="form-control" placeholder="" aria-label="Phone number" name="phone" value="<?php echo $row['Customer_HP']; ?>">
								</div>
								<!-- Email -->
								<div class="col-md-6">
									<label for="inputEmail4" class="form-label">Email *</label>
									<input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo $row['Customer_email']; ?>">
									
								</div>
								<!-- Mobile number -->
								<div class="col-md-6">
									<label class="form-label">Address *</label>
									<input type="text" class="form-control" placeholder="" aria-label="Address 1" name="a1" value="<?php echo $row['Customer_address_1']; ?>">
									<input type="text" class="form-control" placeholder="" aria-label="Address 2" name="a2" value="<?php echo $row['Customer_address_2']; ?>">
									<input type="text" class="form-control" placeholder="" aria-label="Poscode" name="pos" value="<?php echo $row['Customer_postcode']; ?>">			
								</div>
								<br>
								<div>
									<a href="myaccount.php?eml=<?php echo $emml?>"><button type="button"class="rbut" >Cancel</button></a>
									<button type="submit" class="but" name="save" >Save Changes</button>
								</div>
						</div> <!-- Row END -->
					</form>	
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


		// Validate and sanitize form data (you may need more validation)
		// Connect to your MySQL database
		//$connect= mysqli_connect("localhost","root","","jbp");

	

		// Prepare SQL statement
		$sql = "UPDATE `customer` SET Customer_name='$f', Customer_HP='$p', Customer_email='$email', Customer_address_1='$a1', Customer_address_2='$a2', Customer_postcode='$pos' WHERE Customer_email='$emml'";
		mysqli_query($connect,$sql);
		if (mysqli_query($connect, $sql))
		{
		
			echo '<script type="text/javascript">
			alert("Profile Updated Successfully.");</script>';
			header("refresh:0.5; location=myaccount.php?eml=".$email);
		
		} else {
		echo "<script type='text/javascript'>
		alert('Error executing SQL statement:'.mysqli_error($connect));
		</script>";
		}	
		
		
		
	} ?>						
	
<footer>
	<p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>

