
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
                $result = mysqli_query($connect, "SELECT * FROM customer where Customer_ID=1");
                while($row = mysqli_fetch_assoc($result)) {
            ?>					
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<!-- Old password -->
								<div class="col-md-6">
									<label for="exampleInputPassword1" class="form-label">Old password *</label>
									<input type="password" class="form-control" id="exampleInputPassword1">
								</div>
								<!-- New password -->
								<div class="col-md-6">
									<label for="exampleInputPassword2" class="form-label">New password *</label>
									<input type="password" class="form-control" id="exampleInputPassword2">
								</div>
								<!-- Confirm password -->
								<div class="col-md-12">
									<label for="exampleInputPassword3" class="form-label">Confirm Password *</label>
									<input type="password" class="form-control" id="exampleInputPassword3">
								</div>
								<br>
								<div>
									<a href="myaccount.php"><button type="button"class="rbut" >Cancel</button></a>
									<a href="changepw.php"><button type="button"class="fbut" >Save</button></a>
								</div>
							</div>
						</div>
			<?php } ?>						
<footer>
        <p>&copy; 2024 JBPSTORE - Your Mobile Gadgets Shop. All rights reserved.</p>
</footer>