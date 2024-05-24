<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>TNG E-wallet</title>
    <link rel="stylesheet" href="css/tng.css">
</head>
<?php
if (isset($_GET['eml'])) {
	$emml = $_GET['eml'];}
	?>
<header>
	<div>
		<h1><a href="cart.php?eml=<?php echo $emml ?>">Back to Cart</a><img src="images/tng.png" class="mlogo"></h1>
	</div>  
</header>    