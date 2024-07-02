<!doctype html>
<html lang="en">
<head>
	<title>Card Details Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/card.css">
 <script>
        function disableBack() { window.history.forward(); }
setTimeout("disableBack()", 0);
window.onunload = function () { null };
    </script>
</head>
<?php
if (isset($_GET['eml'])) {
	$emml = $_GET['eml'];}
	if (isset($_GET['tt'])) {
		$total = $_GET['tt'];}
	?>
<body>
	<div class="modal">
		<form class="form" method="post">
			<div class="card-info">
				<div>Total Amount Needed to Pay : <?php echo $total ?></div>
				<div>Please Enter Your promo code</div>
				
				<div class="input_container">
					<label class="input_label">Promo Code</label>
					<input class="input_field" type="text" name="name" placeholder="PROMO CODE" required>
				</div>
				
				
			</div>
			<div>
            <button type="submit" class="checkout" style="cursor: pointer;width:100%;"name="save" >CONFIRM</button>
            <a href="cart.php?eml=<?php echo $emml?>" class="checkout" style="width:100%; color:white; text-align:center; display:inline-block; padding:10px 0;margin-top:10px; background-color:#313bc9; border:none; cursor:pointer; text-decoration:none;">CANCEL</a>
			</div>
		
		</form>
	</div>
</body>
<?php
$connect= mysqli_connect("localhost","root","","jbp");
if(isset($_POST['save'])) {
	// Retrieve form data
	$p = $_POST['name'];
	
	// Prepare SQL statement
	$sql = "SELECT * from promotion where code = '$p' and status='active'";
    $re=mysqli_query($connect, $sql);
    $di=mysqli_fetch_assoc($re);
	$dis=$di['discount'];
	if (mysqli_num_rows($re) > 0)
	{
		echo '<script type="text/javascript">';
        echo 'alert("You got a DISCOUNT!");';
		echo 'window.location.href = "promoo.php?eml='. $emml . '&dis='. $dis .'&tt='. $total .'&cod='. $p .'";';
		echo '</script>';
	} else {
		echo '<script type="text/javascript">';
        echo 'alert("Invalid Code!");';
		echo 'window.location.href = "promo.php?eml='. $emml . '&tt='. $total .'";';
		echo '</script>';

	exit();
	}	
	
		
} ?>						
				
</html>
