<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="css/cart.css">

</head>
<?php
include('database.php');
if (isset($_GET['eml'])) {
    $emml = $_GET['eml'];}
	$connect= mysqli_connect("localhost","root","","jbp");
	$sql = "SELECT Product_name,Product_price,Product_stock,Product_details FROM products INNER JOIN cart ON products.Product_ID=cart.Product_ID where Customer_ID='$emml'";
	$result = mysqli_query($connect, $sql);

?>
	<body>
		<main class="page">
			<section class="shopping-cart dark">
				<div class="container">
					<div class="block-heading">
					<h2>Shopping Cart</h2>
					<p>The Price Below is Included Shipping Fees</p>
					</div>
					<div class="content">
						<div class="row">
							<?php
							while($row = mysqli_fetch_assoc($result)) {
							?>
								<div class="col-md-12 col-lg-8">
									<div class="items">
										<div class="product">
											<div class="row">
												<div class="col-md-3">
													<img src="images/<?php echo $row['Product_name']?>.jpg" class="img-fluid mx-auto d-block image">
												</div>
												<div class="col-md-8">
													<div class="info">
														<div class="row">
															<div class="col-md-5 product-name">
																<div class="product-name">
																	<a href="#"><?php echo $row['Product_name']?></a>
																	<div class="product-info">
																		<div>Details: </div>
																		<div><?php echo $row['Product_details'];?></div>
																	</div>
																</div>
															</div>
															<div class="col-md-4 quantity">
																<label for="quantity">Quantity:</label>
																<input id="quantity" type="number" value ="1" class="form-control quantity-input">
															</div>
															<div class="col-md-3 price">
																<?php echo $row['Product_price'];?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
							<div class="col-md-12 col-lg-4">
								<div class="summary">
									<h3>Summary</h3>
									<div class="summary-item"><span class="text">Subtotal</span><span class="price">$360</span></div>
									<div class="summary-item"><span class="text">Discount</span><span class="price">$0</span></div>
									<div class="summary-item"><span class="text">Shipping</span><span class="price">$0</span></div>
									<div class="summary-item"><span class="text">Total</span><span class="price">$360</span></div>
									<div><a href="payment.php?eml=<?php echo $emml ?>"><button type="button"class="btn btn-primary btn-lg "style="width:48%; margin-right : 10px;" >Add Card</button></a><a href="ewallet.php?eml=<?php echo $emml ?>"><button type="button" class="btn btn-primary btn-lg"style="width:48%;">E-Wallet</button></a></div>
									<button type="button" class="btn btn-primary btn-lg btn-block" name="out">Checkout</button>
								</div>
							</div>
						</div> 
					</div>
				</div>
			</section>
		</main>
	</body>
	<?php 
	if(isset($_POST['out'])) {
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
		$sql = "UPDATE `customer` SET Customer_name='$f', Customer_HP='$p', Customer_email='$email', Customer_address_1='$a1', Customer_address_2='$a2', Customer_postcode='$pos' WHERE Customer_ID='$emml'";
		mysqli_query($connect,$sql);
		if (mysqli_query($connect, $sql))
		{
		
			echo '<script type="text/javascript">';
			echo 'window.location.href = "myaccount.php?eml='.$emml.'";';
			echo 'alert("Profile Updated Successfully.");';
			echo '</script>';
		
		} else {
		echo "<script type='text/javascript'>
		alert('Error executing SQL statement:'.mysqli_error($connect));
		</script>";
		}	
		
		
		
	} ?>						
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
