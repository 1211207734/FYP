<!doctype html>
<html lang="en">
<head>
	<title>Card Details Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/card.css">
</head>
<body>
	<div class="modal">
		<form class="form" method="post">
			<div class="card-info">
				<div class="input_container">
					<label class="input_label">Card holder name</label>
					<input class="input_field" type="text" name="name" placeholder="Enter your full name">
				</div>
				<div class="input_container">
					<label class="input_label">Card Number</label>
					<input class="input_field" type="number" name="num"placeholder="0000 0000 0000 0000">
				</div>
				<div class="input_container">
					<label class="input_label">Expiry Date / CVV</label>
					<div class="split">
						<input class="input_field" style="width: 250px;" type="text" name="ed" placeholder="01/23">
						<input class="input_field" style="width: 110px;" type="number" name="cv" placeholder="CVV">
					</div>
				</div>
			</div>
			<button class="checkout" style="cursor: pointer;"name="save" >Save Card Detail</button>
		</form>
	</div>
</body>
<?php
if (isset($_GET['eml'])) {
	$emml = $_GET['eml'];}
$connect= mysqli_connect("localhost","root","","jbp");
if(isset($_POST['save'])) {
	// Retrieve form data
	$n = $_POST['name'];
	$num = $_POST['num'];
	$date = $_POST['ed'];
	$cvv = $_POST['cv'];

	// Prepare SQL statement
	$sql = "INSERT INTO card (Card_name,Card_num,Card_edate,Card_cv) values ('$n','$num','$date','$cvv')";
	
	if (mysqli_query($connect, $sql))
	{
		echo '<script type="text/javascript">';
		echo 'window.location.href = "cart.php?eml='.$emml.'";';
		echo 'alert("Card Save Successfully!");';
		echo '</script>';
	
	} else {
	echo "<script type='text/javascript'>
	alert('Error executing SQL statement:'.mysqli_error($connect));
	</script>";
	}	
	
		
} ?>						
</html>
