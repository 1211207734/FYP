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
			<div class="title">
				<h3>Update My Profile Details</h3>
				<hr>
			</div>
		<?php
			$connect= mysqli_connect("localhost","root","","jbp");
			$result = mysqli_query($connect, "SELECT * FROM customer where Customer_ID=1");
			while($row = mysqli_fetch_assoc($result)) {
		?>			
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
			<form class="file-upload">
				<div class="row mb-5 gx-5">
					<!-- Contact detail -->
					<div class="col-xxl-8 mb-5 mb-xxl-0">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Account details</h4>
								<!-- First Name -->
								<div class="col-md-6">
									<label class="form-label">Full Name *</label>
									<input type="text" class="form-control" placeholder="" aria-label="First name"  required value="Scaralet">
								</div>	
								<!-- Phone number -->
								<div class="col-md-6">
									<label class="form-label">Phone number *</label>
									<input type="text" class="form-control" placeholder="" aria-label="Phone number" value="(333) 000 555">
								</div>
								<!-- Email -->
								<div class="col-md-6">
									<label for="inputEmail4" class="form-label">Email *</label>
									<input type="email" class="form-control" id="inputEmail4" >
									required value="<?php echo echo $row['Customer_email']; ?>"
								</div>
								<!-- Mobile number -->
								<div class="col-md-6">
									<label class="form-label">Address *</label>
									<input type="text" class="form-control" placeholder="" aria-label="Address 1" value="+91 9852 8855 252">
									<input type="text" class="form-control" placeholder="" aria-label="Address 2" value="+91 9852 8855 252">
									<input type="text" class="form-control" placeholder="" aria-label="Poscode" value="00000">			
								</div>
								<br>
								<div>
									<a href="myaccount.php"><button type="button"class="rbut" >Cancel</button></a>
									<button type="button" class="but" >Save Changes</button>
								</div>
								
							</div>
						</div> <!-- Row END -->
					</div>
				</div>
			</form>
		<?php } ?>						
	
<footer>
	<p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>

