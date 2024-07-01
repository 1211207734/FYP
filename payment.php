<!doctype html>
<html lang="en">
<head>
	<title>Card Details Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/card.css">
</head>
<?php
include('database.php');
$emml= isset($_GET['eml']) ? $_GET['eml'] : null;
	if (isset($_GET['tt'])) {
		$total = $_GET['tt'];}
		$co= isset($_GET['cod']) ? $_GET['cod'] : null;
		$tng= isset($_GET['ba']) ? $_GET['ba'] : null;

	$sql="SELECT Customer_name FROM customer WHERE Customer_ID = '$emml'";
	$result = mysqli_query($connect, $sql);
	$row = mysqli_fetch_assoc($result);
	$nn= $row['Customer_name'];

	$sql2 = "SELECT Card_name,RIGHT(Card_num,4)AS'nun',Card_edate FROM card WHERE Card_name = '$nn'";
	$result2 = mysqli_query($connect, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	if(!$row2){
		$prop = "";
		$pop = "hidden";
		$ppop = "hidden";
		$ppopp = "hidden";
		$np=$total;}
	else if(!$row2&&$tng!=null){
			$prop = "hidden";
			$pop = "hidden";
			$ppop = "";
			$ppopp = "hidden";
		}
	else if($tng!=null){
		$prop = "hidden";
		$pop = "hidden";
		$ppop = "hidden";
		$ppopp = "";
	}
	else{
		$prop = "hidden";
		$pop = "";
		$ppop = "hidden";
		$ppopp = "hidden";
	}

	
	
	?>
<body>
	<div class="modal" <?php echo $prop ?>>
		<form class="form" method="post">
			<div class="card-info">
				<div>Total Amount Needed to Pay : RM <?php echo $total ?></div>
				<div>Please Enter Your Card Details</div>
				<div><img src="images/visa-card.png" style="margin-right : 2%"><img src="images/master-card.png"></div>
				<div class="input_container">
					<label class="input_label">Card holder name</label>
					<input class="input_field" type="text" name="name" readonly value="<?php echo $row['Customer_name'] ?>" required>
				</div>
				<div class="input_container">
					<label class="input_label">Card Number</label>
					<input class="input_field" type="number" name="num"placeholder="0000 0000 0000 0000" required>
				</div>
				<div class="input_container">
					<label class="input_label">Expiry Date / CVV</label>
					<div class="split">
						<input class="input_field" style="width: 250px;" type="text" name="ed" placeholder="01/23" required>
						<input class="input_field" style="width: 110px;" type="number" name="cv" placeholder="CVV" required>
					</div>
				</div>
			</div>
			<div>
				<a href="cart.php?eml=<?php echo $emml?>" class="checkout" style="width:100%; color:white; text-align:center; display:inline-block; padding:10px 0; background-color:#313bc9; border:none; cursor:pointer; text-decoration:none;">Back to Cart</a>
			</div>
			<div>	
				<button class="checkout" style="cursor: pointer;width:100%;"name="save" >Proceed Payment</button>
			</div>
		</form>
	</div>

	<div class="modal" <?php echo $pop ?>>
		<form class="form" method="post">
			<div class="card-info">
				<div>Total Amount Needed to Pay : RM <?php echo $total ?></div>
				<div>Please Check Your Card Details</div>
				<div><img src="images/visa-card.png" style="margin-right : 2%"><img src="images/master-card.png"></div>
				<div class="input_container">
					<label class="input_label">Card holder name</label>
					<input readonly class="input_field" type="text" name="name" value="<?php echo $nn ?>" required>
				</div>
				<div class="input_container">
					<label class="input_label">Card Number</label>
					<input class="input_field" type="text" name="num" readonly value="**** **** **** <?php echo $row2['nun'] ?>" required>
				</div>
				
			</div>
			<div>
				<a href="cart.php?eml=<?php echo $emml?>" class="checkout" style="width:100%; color:white; text-align:center; display:inline-block; padding:10px 0; background-color:#313bc9; border:none; cursor:pointer; text-decoration:none;">Back to Cart</a>
			</div>
			<div>	
				<button class="checkout" style="cursor: pointer;width:100%;"name="check" >Proceed Payment</button>
				<button class="dlt" style="cursor: pointer;width:100%;"name="check" >Remove My Card</button>
			</div>
		</form>
	</div>

	<div class="modal" <?php echo $ppop ?>>
		<form class="form" method="post">
			<div class="card-info">
				<div>Total Amount Needed to Reload : RM <?php echo $tng ?></div>
				<div>Please Check Your Card Details</div>
				<div><img src="images/visa-card.png" style="margin-right : 2%"><img src="images/master-card.png"></div>
				<div class="input_container">
					<label class="input_label">Card holder name</label>
					<input readonly class="input_field" type="text" name="name" value="<?php echo $nn ?>" required>
				</div>
				<div class="input_container">
					<label class="input_label">Card Number</label>
					<input class="input_field" type="text" name="num" readonly value="**** **** **** <?php echo $row2['nun'] ?>" required>
				</div>
				
			</div>
			<div>
				<a href="tng.php?eml=<?php echo $emml?>&tt=<?php echo $total?>" class="checkout" style="width:100%; color:white; text-align:center; display:inline-block; padding:10px 0; background-color:#313bc9; border:none; cursor:pointer; text-decoration:none;">Back to TNG Reload Page</a>
			</div>
			<div>	
				<button class="checkout" style="cursor: pointer;width:100%;"name="ttng" >Proceed Ewallet Reload</button>
			</div>
		</form>
	</div>

	<div class="modal" <?php echo $ppopp ?>>
		<form class="form" method="post">
			<div class="card-info">
				<div>Total Amount Needed to Pay : RM <?php echo $tng ?></div>
				<div>Please Enter Your Card Details</div>
				<div><img src="images/visa-card.png" style="margin-right : 2%"><img src="images/master-card.png"></div>
				<div class="input_container">
					<label class="input_label">Card holder name</label>
					<input class="input_field" type="text" name="name" readonly value="<?php echo $row['Customer_name'] ?>" required>
				</div>
				<div class="input_container">
					<label class="input_label">Card Number</label>
					<input class="input_field" type="number" name="num"placeholder="0000 0000 0000 0000" required>
				</div>
				<div class="input_container">
					<label class="input_label">Expiry Date / CVV</label>
					<div class="split">
						<input class="input_field" style="width: 250px;" type="text" name="ed" placeholder="01/23" required>
						<input class="input_field" style="width: 110px;" type="number" name="cv" placeholder="CVV" required>
					</div>
				</div>
			</div>
			<div>
				<a href="cart.php?eml=<?php echo $emml?>" class="checkout" style="width:100%; color:white; text-align:center; display:inline-block; padding:10px 0; background-color:#313bc9; border:none; cursor:pointer; text-decoration:none;">Back to Cart</a>
			</div>
			<div>	
				<button class="checkout" style="cursor: pointer;width:100%;"name="ttngg" >Proceed Ewallet Reload</button>
			</div>
		</form>
	</div>
</body>
<?php
$connect= mysqli_connect("localhost","root","","jbp");
if(isset($_POST['check'])){
	 
	
	echo '<script type="text/javascript">';
	echo 'window.location.href = "checkout.php?eml='. $emml . '&tt='. $total . '&cod='.$co.'&pm=Card";';
	echo '</script>';

}

if(isset($_POST['dlt'])){
	$sql = "DELETE FROM card WHERE Card_name = '$nn'";
	if (mysqli_query($connect, $sql)) {
		echo '<script>';
		echo 'alert("Card removed successfully.");';
		echo 'window.location.href = "payment.php?eml=' . $emml . '&tt='.$total.'&cod='.$co.'";';
		echo '</script>';
	} else {
		echo '<script>';
		echo 'alert("Error removing card.");';
		echo 'window.location.href = "payment.php?eml=' . $emml . '&tt='.$total.'&cod='.$co.'";';
		echo '</script>';
	}
}

if(isset($_POST['ttnngg'])) {
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
		echo 'window.location.href = "checkout.php?eml='. $emml . '&tt='. $total . '&cod='.$co.'&pm=Card";';
		echo 'alert("Card Proceed Successfully!");';
		echo '</script>';
	
	} else {
	echo "<script type='text/javascript'>
	alert('Error executing SQL statement:'.mysqli_error($connect));
	</script>";
	}	
	
		
}

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
		echo 'window.location.href = "checkout.php?eml='. $emml . '&tt='. $total . '&cod='.$co.'&pm=Card";';
		echo 'alert("Card Proceed Successfully!");';
		echo '</script>';
	
	} else {
	echo "<script type='text/javascript'>
	alert('Error executing SQL statement:'.mysqli_error($connect));
	</script>";
	}	
	
		
}?>						
</html>
