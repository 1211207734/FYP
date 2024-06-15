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
			if (isset($_GET['cod'])) {
				$co = $_GET['cod'];}
    
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
            <a href="cart.php?eml=<?php echo $emml?>&nt=<?php echo $npri ?>&cod=<?php echo $co ?>" class="checkout" style="width:100%; color:white; text-align:center; display:inline-block; padding:10px 0;margin-top:10px; background-color:#313bc9; border:none; cursor:pointer; text-decoration:none;">OK</a>
			</div>
		
		</form>
	</div>
</body>
				
				
</html>
