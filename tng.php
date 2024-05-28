<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>TNG E-wallet</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tng.css">
</head>
<style>
        .con {
			text-align: center;
            width: 400px;
            border: 10px solid black;
            padding: auto;
            margin: auto;
			font-size:20px;
        }

		.button {
			background-color: white;
			color: black;
			border: 2px solid #04AA6D; /* Green */
			transition-duration: 0.4s;
			width:auto;
		}
    </style>
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
	<div class="con">
		<div>Total Amount Needed to Pay : <?php echo $total ?> </div>
		<div>Balance of TNG Wallet : <a><?php echo $b=$row['Balance']?></a></div>
	
		<form method="post">
			<div>
				<a href="cart.php?eml=<?php echo $emml ?>">Back to Cart</a><button type="submit" name="pay">Proceed Payment</button>
			</div>
			<div>
				<button class="button" type="submit" name="r50">Reload RM50</button><button class="button" type="submit" name="r100">Reload RM100</button>
			</div>
			<?php
			if (isset($_POST['r50'])) {
				$b += 50;
				$update = mysqli_query($connect, "UPDATE tng SET Balance='$b' WHERE Customer_ID='$emml'");
				echo '<script>';
				echo 'alert("Reload RM50 Successfully!") ;';
				echo 'window.location.href = "tng.php?eml=' . $emml . '&tt='.$total.'";';	 
				echo '</script>';
				exit();
			}
			else if (isset($_POST['r100'])) {
				$b += 100;
				$update = mysqli_query($connect, "UPDATE tng SET Balance='$b' WHERE Customer_ID='$emml'");
				echo '<script>';
				echo 'alert("Reload RM100 Successfully!") ;';
				echo 'window.location.href = "tng.php?eml=' . $emml . '&tt='.$total.'";';	 
				echo '</script>';	
				exit();	
			}?>
		</form>
		</div>	
</body>
<?php }
if (isset($_POST['pay'])) {
	if ($b >= $total){
	 echo '<script>';
	 echo 'window.location.href = "checkout.php?eml='.$emml.'";';
	 echo '</script>';
	}

 	else {

	 echo '<script>';
	 echo 'alert("Low Balance ! Please Reload !") ;';	 
	 echo '</script>';  }                      
} 
?>
