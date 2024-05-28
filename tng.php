<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>TNG E-wallet</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tng.css">
</head>
<?php
include('database.php');
if (isset($_GET['eml'])) {
    $emml = $_GET['eml'];}
	if (isset($_GET['tt'])) {
		$total = $_GET['tt'];}
	$connect= mysqli_connect("localhost","root","","jbp");
	$result = mysqli_query($connect, "SELECT * FROM tng where Customer_ID='$emml'");
	while($row = mysqli_fetch_assoc($result)) {
?>
<header>
	<div>
		<img src="images/tng.png" class="mlogo">
	</div>  
</header>
<body>
	
	<div>Total Amount Needed to Pay : <?php echo $total ?> </div>
	<div>Balance of TNG Wallet : <a><?php echo $row['Balance']?></a></div>
	
	<div>
	<a href="cart.php?eml=<?php echo $emml ?>">Back to Cart</a>
	<a href="checkout.php?eml=<?php echo $emml ?>">Proceed Payment</a>
	</div>
	<div>
	<button class="button">Reload RM50</button><button class="button">Reload RM100</button>
	</div>
	
</body>
<?php }