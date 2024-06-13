<!doctype html>
<html lang="en">
<head>
	<title>Card Details Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/card.css">
</head>
<?php
if (isset($_GET['eml'])) {
	$emml = $_GET['eml'];}
	if (isset($_GET['tt'])) {
		$total = $_GET['tt'];}

        if (isset($_GET['dis'])) {
            $discou = $_GET['dis'];}
    
    $npri =$total - ($total * $discou);
	?>
<body>
	<div class="modal">
		<form class="form" method="post">
			<div class="card-info">
				<div>Total Amount Needed to Pay : RM<?php echo $total ?></div>
				<div>DISCOUNT REDEEM SUCCESSFULLY!</div>
				
				<div>DISCOUNT RATE IS <?php echo $discou*100 ?>%</div>
                <div>NEW TOTAL PRICE IS RM <?php echo $npri ?></div>
				
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
	$sql = "SELECT * from promotion where code = '$p'";
	
	if (mysqli_query($connect, $sql))
	{$dis=['discount'];
		echo '<script type="text/javascript">';
        echo 'alert("You got a DISCOUNT!");';
		echo 'window.location.href = "promoo.php?eml='. $emml . '&dis='.$dis.'&tt='.$total.'";';
		echo '</script>';
	} else {
	echo "<script type='text/javascript'>
	alert('INVALID CODE!');
	</script>";
	}	
	
		
} ?>						
				
</html>
